# -- coding: utf-8 --
from sklearn.metrics import multilabel_confusion_matrix, accuracy_score
from tensorflow.keras.layers import LSTM, Dense, Input, Dropout
from sklearn.model_selection import train_test_split
from sklearn.model_selection import cross_val_score
from tensorflow.keras.callbacks import TensorBoard
from tensorflow.keras.utils import to_categorical
from tensorflow.keras.models import load_model
from tensorflow.keras.models import Sequential

from sklearn.model_selection import KFold
from matplotlib import pyplot as plt
from sklearn.utils import shuffle
from scipy import stats

import mediapipe as mp
import tensorflow as tf
import numpy as np
import time
import json
import cv2
import os

# from tensorflow.keras.utils import to_categorical

# import tensorflow as tf
# tf.get_logger().setLevel('e')  # Only show errors, not info or warnings.


class RecognitionModel:

    def __init__(self) -> None:
        self.mp_holistic = mp.solutions.holistic
        self.mp_drawing = mp.solutions.drawing_utils
        self.cap = cv2.VideoCapture(0)
        self.result = None
        self.result_trainer = None
        self.DATA_PATH = os.path.join('MP_Data') # Path for exported data, numpy arrays
        self.actions = np.array(['hello', 'thanks', 'euteamo'])  # Actions that we try to detect
        self.no_sequences = 30  # Thirty videos worth of data
        self.sequence_length = 30  # Videos are going to be 30 frames in length
        self.start_folder = 0  # Folder count start
        self.log_dir = os.path.join('Logs')
        self.tb_callback = TensorBoard(log_dir=self.log_dir)
        self.colors = [(245,117,16), (117,245,16), (16,117,245)]
        self.model = load_model("shuffle3.keras")


    def mediapipe_detector(self, image, model):
        image = cv2.cvtColor(image, cv2.COLOR_BGR2RGB) # COLOR CONVERSION BGR 2 RGB
        image.flags.writeable = False                  # Image is no longer writeable
        results = model.process(image)                 # Make prediction
        image.flags.writeable = True                   # Image is now writeable 
        image = cv2.cvtColor(image, cv2.COLOR_RGB2BGR) # COLOR COVERSION RGB 2 BGR
        return image, results
    
    def draw_landmarks(self, image, results):
        self.mp_drawing.draw_landmarks(image, results.face_landmarks, self.mp_holistic.FACE_CONNECTIONS) # Draw face connections
        self.mp_drawing.draw_landmarks(image, results.pose_landmarks, self.mp_holistic.POSE_CONNECTIONS) # Draw pose connections
        self.mp_drawing.draw_landmarks(image, results.left_hand_landmarks, self.mp_holistic.HAND_CONNECTIONS) # Draw left hand connections
        self.mp_drawing.draw_landmarks(image, results.right_hand_landmarks, self.mp_holistic.HAND_CONNECTIONS) # Draw right hand connections
        return self.mp_drawing
    
    def draw_styled_landmarks(self, image, results):
        # Draw face connections
        self.mp_drawing.draw_landmarks(image, results.face_landmarks, self.mp_holistic.FACEMESH_TESSELATION, 
                                self.mp_drawing.DrawingSpec(color=(80,110,10), thickness=1, circle_radius=1), 
                                self.mp_drawing.DrawingSpec(color=(80,256,121), thickness=1, circle_radius=1)
                                ) 
        # Draw pose connections
        self.mp_drawing.draw_landmarks(image, results.pose_landmarks, self.mp_holistic.POSE_CONNECTIONS,
                                self.mp_drawing.DrawingSpec(color=(80,22,10), thickness=2, circle_radius=4), 
                                self.mp_drawing.DrawingSpec(color=(80,44,121), thickness=2, circle_radius=2)
                                ) 
        # Draw left hand connections
        self.mp_drawing.draw_landmarks(image, results.left_hand_landmarks, self.mp_holistic.HAND_CONNECTIONS, 
                                self.mp_drawing.DrawingSpec(color=(121,22,76), thickness=2, circle_radius=4), 
                                self.mp_drawing.DrawingSpec(color=(121,44,250), thickness=2, circle_radius=2)
                                ) 
        # Draw right hand connections  
        self.mp_drawing.draw_landmarks(image, results.right_hand_landmarks, self.mp_holistic.HAND_CONNECTIONS, 
                                       self.mp_drawing.DrawingSpec(color=(245,117,66), thickness=2, circle_radius=4), 
                                       self.mp_drawing.DrawingSpec(color=(245,66,230), thickness=2, circle_radius=2)) 
        return self.mp_drawing

    def extract_keypoints(self, result):
        pose = []
        for res in result.pose_landmarks.landmark:
            test = np.array([res.x, res.y, res.z, res.visibility])
            pose.append(test)

        pose = np.array([[res.x, res.y, res.z, res.visibility] for res in result.pose_landmarks.landmark]).flatten() if result.pose_landmarks else np.zeros(132)
        face = np.array([[res.x, res.y, res.z] for res in result.face_landmarks.landmark]).flatten() if result.face_landmarks else np.zeros(1404)
        lh = np.array([[res.x, res.y, res.z] for res in result.left_hand_landmarks.landmark]).flatten() if result.left_hand_landmarks else np.zeros(21*3)
        rh = np.array([[res.x, res.y, res.z] for res in result.right_hand_landmarks.landmark]).flatten() if result.right_hand_landmarks else np.zeros(21*3)

        print(np.concatenate([pose, face, lh, rh]))
        return np.concatenate([pose, face, lh, rh])

    def creating_paths(self): # 4. Creating paths to save collections

        for action in self.actions:
            for sequence in range(self.no_sequences):
                try:
                    os.makedirs(os.path.join(self.DATA_PATH, action, str(sequence)))
                except:
                    pass

    def building_and_training_model(self):
        label_map = {label:num for num, label in enumerate(self.actions)}
        sequences, labels = [], []
        for action in self.actions:
            for sequence in np.array(os.listdir(os.path.join(self.DATA_PATH, action))).astype(int):
                window = []
                for frame_num in range(self.sequence_length):
                    res = np.load(os.path.join(self.DATA_PATH, action, str(sequence), "{}.npy".format(frame_num)))
                    window.append(res)
                sequences.append(window)
                labels.append(label_map[action])
        
        X = np.array(sequences)  # Convert list 'sequences' to array numpy and save in 'X'
        y = to_categorical(labels).astype(int)  # Convert labels to category format and number integer
        #  X_train, X_test, y_train, y_test = train_test_split(X, y, test_size=0.30, shuffle=True, random_state=42)
        return train_test_split(X, y, test_size=0.30, shuffle=True, random_state=42)  # Splits data into training and testing, shuffling before splitting, with fixed random seed
    
    # def setting_sequencial_model(self):
    #     X_train, X_test, y_train, y_test = RecognitionModel.building_and_training_model(self)

    #     # model = Sequential()
    #     # model.add(Input(shape=(30, 1662)))  # Define correct enter value
    #     # model.add(LSTM(64, return_sequences=True, activation='relu'))
    #     # model.add(LSTM(128, return_sequences=True, activation='relu'))
    #     # model.add(LSTM(64, return_sequences=False, activation='relu'))
    #     # model.add(Dense(64, activation='relu'))
    #     # model.add(Dense(32, activation='relu'))
    #     # model.add(Dense(len(self.actions), activation='softmax'))  # Using len(self.actions) to define output 
    #     # model.compile(optimizer='Adam', loss='categorical_crossentropy', metrics=['categorical_accuracy'])  
    #     # model.fit(X_train, y_train, epochs=10, callbacks=[self.tb_callback])  
    #     self.model = model

    #     return model, X_test, y_test
    
    def define_predict(self):
        X_train, X_test, y_train, y_test = RecognitionModel.building_and_training_model(self)

#         model, X_test,y_test = RecognitionModel.setting_sequencial_model(self)
        res = self.model.predict(X_test)
        # model.save('shuffle3.keras')
        return res
    
    def test_confusion_matrix_and_accuracy(self):
        X_train, X_test, y_train, y_test = RecognitionModel.building_and_training_model(self)

        # model, X_test, y_test = RecognitionModel.setting_sequencial_model(self)
        yhat = self.model.predict(X_test)
        ytrue = np.argmax(y_test, axis=1).tolist()  # Converts the actual labels (y_test) to their corresponding class indices, transforming into a list
        yhat = np.argmax(yhat, axis=1).tolist()  # Converts predictions (yhat) to their corresponding class indices, transforming into a list

        multilabel_confusion_matrix(ytrue, yhat)  # Calculate the confusion matrix for multilabel problems, comparing actual labels (ytrue) and predictions (yhat)
        accuracy_score(ytrue, yhat)

    def testing_on_real_time(self, input_frame):      

        try:
            output_frame = input_frame.copy()
            for num, prob in enumerate(RecognitionModel.define_predict(self)):
                cv2.rectangle(output_frame, (0,60+num*40), (int(prob*100), 90+num*40), self.colors[num], -1)
                cv2.putText(output_frame, self.actions[num], (0, 85+num*40), cv2.FONT_HERSHEY_SIMPLEX, 1, (255,255,255), 2, cv2.LINE_AA)

        except TypeError as err:
            print(f"\n{err}")
            #input("")

        return output_frame
    
    def execution_recognition_model(self):
        sequence = []
        sentence = []
        predictions = []
        threshold = 0.5
        # self.cap

        # Carregar o modelo salvo
        with self.mp_holistic.Holistic(min_detection_confidence=0.5, min_tracking_confidence=0.5) as holistic:
            while self.cap.isOpened():
                ret, frame = self.cap.read()  # Read feed
                if not ret:
                    break

                image, results = RecognitionModel.mediapipe_detector(self, frame, holistic)  # Make detections

                if results.pose_landmarks is not None:
                    RecognitionModel.draw_styled_landmarks(self, image, results)  # Draw landmarks

                    # Extrair os keypoints
                    keypoints = RecognitionModel.extract_keypoints(self, results)
                    sequence.append(keypoints)
                    sequence = sequence[-30:]  # Limitar sequência a 30 frames
                    
                    if len(sequence) == 30:
                        # Fazer a predição usando o modelo carregado
                        res = self.model.predict(np.expand_dims(sequence, axis=0))[0]
                        print(self.actions[np.argmax(res)])
                        predictions.append(np.argmax(res))                 
                        
                        if np.unique(predictions[-10:])[0] == np.argmax(res): 
                            if res[np.argmax(res)] > threshold: 
                                if len(sentence) > 0: 
                                    if self.actions[np.argmax(res)] != sentence[-1]:
                                        sentence.append(self.actions[np.argmax(res)])
                                else:
                                    sentence.append(self.actions[np.argmax(res)])

                        if len(sentence) > 5: 
                            sentence = sentence[-5:]

                        image = RecognitionModel.testing_on_real_time(self, image)  # Viz probabilities
                    
                    # Mostrar a frase na tela
                    cv2.rectangle(image, (0, 0), (640, 40), (245, 117, 16), -1)
                    cv2.putText(image, ' '.join(sentence), (3, 30), 
                                cv2.FONT_HERSHEY_SIMPLEX, 1, (255, 255, 255), 2, cv2.LINE_AA)

                cv2.imshow('Recognition Training Sign', image)  # Show to screen

                if cv2.waitKey(10) & 0xFF == ord('q'):  # Break gracefully
                    break
                    
            self.cap.release()
            cv2.destroyAllWindows()


C1 = RecognitionModel()
# C1.test_confusion_matrix_and_accuracy()
C1.execution_recognition_model()  