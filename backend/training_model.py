from sklearn.metrics import multilabel_confusion_matrix, accuracy_score
from tensorflow.keras.layers import LSTM, Dense, Input, Dropout
from sklearn.model_selection import train_test_split
from sklearn.model_selection import cross_val_score
from tensorflow.keras.callbacks import TensorBoard
from tensorflow.keras.utils import to_categorical
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
        self.DATA_PATH = os.path.join('MP_Data_Train') # Path for exported data, numpy arrays
        self.actions = np.array(['hello', 'thanks', 'euteamo'])  # Actions that we try to detect
        self.no_sequences = 5  # Thirty videos worth of data
        self.sequence_length = 5  # Videos are going to be 30 frames in length
        self.start_folder = 0  # Folder count start
        self.log_dir = os.path.join('Logs')
        self.tb_callback = TensorBoard(log_dir=self.log_dir)
        self.colors = [(245,117,16), (117,245,16), (16,117,245)]


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

    def setting_mediapipe_model(self):
        with self.mp_holistic.Holistic(min_detection_confidence=0.5, min_tracking_confidence=0.5) as holistic:
            while self.cap.isOpened():

                # Read feed
                ret, frame = self.cap.read()

                image, results = RecognitionModel.mediapipe_detector(self, frame, holistic)
                self.result = results
                
                RecognitionModel.draw_styled_landmarks(self, image, results)

                cv2.imshow('Recognition Training Sign', image)

                if cv2.waitKey(10) & 0xFF == ord('q'):
                    break
            self.cap.release()
            cv2.destroyAllWindows()

    def extract_keypoints(self, result):
        pose = []
        for res in result.pose_landmarks.landmark:
            test = np.array([res.x, res.y, res.z, res.visibility])
            pose.append(test)

        pose = np.array([[res.x, res.y, res.z, res.visibility] for res in result.pose_landmarks.landmark]).flatten() if result.pose_landmarks else np.zeros(132)
        face = np.array([[res.x, res.y, res.z] for res in result.face_landmarks.landmark]).flatten() if result.face_landmarks else np.zeros(1404)
        lh = np.array([[res.x, res.y, res.z] for res in result.left_hand_landmarks.landmark]).flatten() if result.left_hand_landmarks else np.zeros(21*3)
        rh = np.array([[res.x, res.y, res.z] for res in result.right_hand_landmarks.landmark]).flatten() if result.right_hand_landmarks else np.zeros(21*3)

        return np.concatenate([pose, face, lh, rh])

    def result_test(self, result):
        result_test = RecognitionModel.extract_keypoints(self, result)
        np.save('1', result_test)
        np.load('1.npy')

    def creating_paths(self): # 4. Creating paths to save collections

        for action in self.actions:
            for sequence in range(self.no_sequences):
                try:
                    os.makedirs(os.path.join(self.DATA_PATH, action, str(sequence)))
                except:
                    pass

    def collecting_keypoints(self):  # Set mediapipe model 
        '''
        cv2.imshow: Show string in the video
        ord('q'): Press 'q' to interrupt any short video 
        '''
        print("\nSTARTING COLLECTION")
        with self.mp_holistic.Holistic(min_detection_confidence=0.5, min_tracking_confidence=0.5) as holistic:
            
            for action in self.actions:
                for sequence in range(self.start_folder, self.start_folder + self.no_sequences):  # Loop through sequences aka videos
                    for frame_num in range(self.sequence_length):  # Loop through video length aka sequence length
                        
                        ret, frame = self.cap.read()  # Read feed
                        image, results = RecognitionModel.mediapipe_detector(self, frame, holistic)  # Make detections
                        if results.pose_landmarks == None:
                            pass
                        else:
                            # self.result_trainer = results
                            
                            RecognitionModel.draw_styled_landmarks(self, image, results)  # Draw landmarks
                            
                            if frame_num == 0:  # Apply wait logic 
                                cv2.putText(image, 'Starting Collection', (120,200), 
                                        cv2.FONT_HERSHEY_SIMPLEX, 1, (0,255, 0), 4, cv2.LINE_AA)
                                cv2.putText(image, 'Frames collected To {} Video Num {}'.format(action, sequence), (15,12), 
                                        cv2.FONT_HERSHEY_SIMPLEX, 0.5, (0, 0, 255), 1, cv2.LINE_AA)
                                cv2.imshow('Recognition Training Sign', image) 
                                cv2.waitKey(1000)
                            else: 
                                cv2.putText(image, 'Frames collected To {} Video Num {}'.format(action, sequence), (15,12), 
                                        cv2.FONT_HERSHEY_SIMPLEX, 0.5, (0, 0, 255), 1, cv2.LINE_AA)
                                cv2.imshow('Recognition Training Sign', image)

                            
                            # ---  Export keypoints
                            keypoints = RecognitionModel.extract_keypoints(self, results)
                            npy_path = os.path.join(self.DATA_PATH, action, str(sequence), str(frame_num))
                            np.save(npy_path, keypoints)

                            RecognitionModel.result_test(self, results)


                            # Break gracefully
                            if cv2.waitKey(10) & 0xFF == ord('q'):
                                break

            self.cap.release()
            cv2.destroyAllWindows()

    def building_and_training_model(self):
        label_map = {label:num for num, label in enumerate(self.actions)}
        sequences, labels = [], []
        for action in self.actions:
            for sequence in np.array(os.listdir(os.path.join(self.DATA_PATH, action))).astype(int):
                window = []
                try:

                    for frame_num in range(self.sequence_length):
                        res = np.load(os.path.join(self.DATA_PATH, action, str(sequence), "{}.npy".format(frame_num)))
                        window.append(res)
                    sequences.append(window)
                    labels.append(label_map[action])
                except FileNotFoundError as err:
                    print(err)
                    pass
        X = np.array(sequences)  # Convert list 'sequences' to array numpy and save in 'X'
        y = to_categorical(labels).astype(int)  # Convert labels to category format and number integer
        #  X_train, X_test, y_train, y_test = train_test_split(X, y, test_size=0.30, shuffle=True, random_state=42)
        return train_test_split(X, y, test_size=0.30, shuffle=True, random_state=42)  # Splits data into training and testing, shuffling before splitting, with fixed random seed
    
    def setting_sequencial_model(self):
        X_train, X_test, y_train, y_test = RecognitionModel.building_and_training_model(self)

        model = Sequential()
        model.add(Input(shape=(30, 1662)))  # Define correct enter value
        model.add(LSTM(64, return_sequences=True, activation='relu'))
        model.add(LSTM(128, return_sequences=True, activation='relu'))
        model.add(LSTM(64, return_sequences=False, activation='relu'))
        model.add(Dense(64, activation='relu'))
        model.add(Dense(32, activation='relu'))
        model.add(Dense(len(self.actions), activation='softmax'))  # Using len(self.actions) to define output 
        model.compile(optimizer='Adam', loss='categorical_crossentropy', metrics=['categorical_accuracy'])  
        model.fit(X_train, y_train, epochs=10, callbacks=[self.tb_callback])  

        return model, X_test, y_test
    
    # def define_predict(self):

    #     model, X_test,y_test = RecognitionModel.setting_sequencial_model(self)
    #     res = model.predict(X_test)
    #     model.save('shuffle3.keras')
    #     return res
    
    def test_confusion_matrix_and_accuracy(self):

        model, X_test, y_test = RecognitionModel.setting_sequencial_model(self)
        yhat = model.predict(X_test)
        
        ytrue = np.argmax(y_test, axis=1).tolist()  # Converts the actual labels (y_test) to their corresponding class indices, transforming into a list
        yhat = np.argmax(yhat, axis=1).tolist()  # Converts predictions (yhat) to their corresponding class indices, transforming into a list
        model.save('shuffle3.keras')
        
        print(multilabel_confusion_matrix(ytrue, yhat))  # Calculate the confusion matrix for multilabel problems, comparing actual labels (ytrue) and predictions (yhat)
        print(accuracy_score(ytrue, yhat))

    def execute_train(self):
        RecognitionModel.creating_paths(self)
        RecognitionModel.collecting_keypoints(self)
        RecognitionModel.test_confusion_matrix_and_accuracy(self)

C1 = RecognitionModel()
# C1.test_confusion_matrix_and_accuracy()
C1.execute_train()  
