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


class RecognitionModel:

    def __init__(self) -> None:
        """
        Initializes Mediapipe components, dataset parameters, and model configurations.
        """
        self.mp_holistic = mp.solutions.holistic
        self.mp_drawing = mp.solutions.drawing_utils
        self.cap = cv2.VideoCapture(0)
        self.result = None
        self.result_trainer = None
        self.DATA_PATH = os.path.join('MP_Data_Train')
        self.actions = np.array(['ola', 'Nao', 'Thank you', 'Tudo Bem', 'Sim'])  # Actions that we try to detect
        self.no_sequences = 30  # Thirty videos worth of data
        self.sequence_length = 30  # Videos are going to be 30 frames in length
        self.start_folder = 0  # Folder count start
        self.log_dir = os.path.join('Logs')
        self.tb_callback = TensorBoard(log_dir=self.log_dir)
        self.colors = [(245,117,16), (117,245,16), (16,117,245)]


    def mediapipe_detector(self, image, model):
        """
        en - Detects landmarks in a frame using Mediapipe.
        pt - Detecta pontos de referência em um quadro usando o Mediapipe. 
        Args:
            en - image (ndarray): The input frame.
            pt - Imagem (ndarray): Entrada do frame.

            en - model: Mediapipe holistic model instance.
            pt - modelo: Instância de modelo holístico do Mediapipe.

        Returns:
            en - tuple: Processed image and detection results.
            pt - tupla: Processamento de imagem e detecção dos resultados.
        """

        image = cv2.cvtColor(image, cv2.COLOR_BGR2RGB) # COLOR CONVERSION BGR 2 RGB
        image.flags.writeable = False                  # Image is no longer writeable
        results = model.process(image)                 # Make prediction
        image.flags.writeable = True                   # Image is now writeable 
        image = cv2.cvtColor(image, cv2.COLOR_RGB2BGR) # COLOR COVERSION RGB 2 BGR
        return image, results
    
    def draw_landmarks(self, image, results):
        """
        en - Draws landmarks on the image using Mediapipe utilities.
        pt - Desenha pontos de referência na imagem usando funções do Mediapipe.

        Args:
            en - image (ndarray): The frame to draw landmarks on.
            pt - Imagem (ndattay): Esqueleto dos pontos de referência.
            
            en - results: Mediapipe holistic results.
            pt - resultados: Resultados holísticos extraído utilizando mediapipe.

        Returns:
            en - object: Drawing instance with landmarks added.
            pt - Retorno: Esqueleto com pontos de referências adicionados.  
        """
               
        self.mp_drawing.draw_landmarks(image, results.face_landmarks, self.mp_holistic.FACE_CONNECTIONS) # Draw face connections | Desenho das conexões de reconhecimento facial.
        self.mp_drawing.draw_landmarks(image, results.pose_landmarks, self.mp_holistic.POSE_CONNECTIONS) # Draw pose connections | Desenho das conexões de reconhecimento dos ombros
        self.mp_drawing.draw_landmarks(image, results.left_hand_landmarks, self.mp_holistic.HAND_CONNECTIONS) # Draw left hand connections | Desenhho das conexões de reconhecimento da mão esquerda.
        self.mp_drawing.draw_landmarks(image, results.right_hand_landmarks, self.mp_holistic.HAND_CONNECTIONS) # Draw right hand connections| Desenhho das conexões de reconhecimento da mão direita.
        
        return self.mp_drawing
    
    def draw_styled_landmarks(self, image, results):
        """
        en - Draws stylized landmarks for the face, pose, and hands on an image using MediaPipe.
        pt - Desenha landmarks estilizados para o rosto, pose e mãos em uma imagem usando o MediaPipe.

        Args:
            en - image (numpy.ndarray): Image on which the landmarks will be drawn.
            pt - image (numpy.ndarray): Imagem na qual os landmarks serão desenhados.
            
            en - results (object): MediaPipe processing results containing detected landmarks.
            pt - results (object): Resultado do processamento do MediaPipe contendo os landmarks detectados.

        Returns:
            en - mp.solutions.drawing_utils: Instance of MediaPipe drawing utility after method execution.
            pt - mp.solutions.drawing_utils: Instância do utilitário de desenho do MediaPipe após a execução do método.

        Obs: 
            self.mp_drawing.DrawingSpec(color -> tuple, thickness -> int, circle_radius -> int), 
            en - Specifies the drawing style for the landmark's primary and secondary lines with color, thickness, and circle radius.
            pt - Especifica o estilo de desenho para as linhas primárias e secundárias do landmark com cor, espessura e raio do círculo.            
        """               
        self.mp_drawing.draw_landmarks(image, results.face_landmarks, self.mp_holistic.FACEMESH_TESSELATION, 
                                self.mp_drawing.DrawingSpec(color=(80,110,10), thickness=1, circle_radius=1), 
                                self.mp_drawing.DrawingSpec(color=(80,256,121), thickness=1, circle_radius=1)
                                ) 
        self.mp_drawing.draw_landmarks(image, results.pose_landmarks, self.mp_holistic.POSE_CONNECTIONS,
                                self.mp_drawing.DrawingSpec(color=(80,22,10), thickness=2, circle_radius=4), 
                                self.mp_drawing.DrawingSpec(color=(80,44,121), thickness=2, circle_radius=2)
                                ) 
        self.mp_drawing.draw_landmarks(image, results.left_hand_landmarks, self.mp_holistic.HAND_CONNECTIONS, 
                                self.mp_drawing.DrawingSpec(color=(121,22,76), thickness=2, circle_radius=4), 
                                self.mp_drawing.DrawingSpec(color=(121,44,250), thickness=2, circle_radius=2)
                                ) 
        self.mp_drawing.draw_landmarks(image, results.right_hand_landmarks, self.mp_holistic.HAND_CONNECTIONS, 
                                       self.mp_drawing.DrawingSpec(color=(245,117,66), thickness=2, circle_radius=4), 
                                       self.mp_drawing.DrawingSpec(color=(245,66,230), thickness=2, circle_radius=2)) 
        return self.mp_drawing

    def setting_mediapipe_model(self):
        """
        en- Initializes the MediaPipe holistic model and processes frames from the webcam to detect and display landmarks.
            Captures video frames, processes them with the MediaPipe model, and displays the results with drawn landmarks.
            Press 'q' to exit the video capture.

        pt - Inicializa o modelo holístico do MediaPipe e processa os quadros da webcam para detectar e exibir os marcos.
            Captura os quadros do vídeo, os processa com o modelo MediaPipe e exibe os resultados com os marcos desenhados.
            Pressione 'q' para sair da captura de vídeo.
        """
                
        with self.mp_holistic.Holistic(min_detection_confidence=0.5, min_tracking_confidence=0.5) as holistic:
            while self.cap.isOpened():  # Loop to detect the camera on | Loop para detecar a camera ativa 

                ret, frame = self.cap.read()

                image, results = RecognitionModel.mediapipe_detector(self, frame, holistic)  #  Applying mediapipe_detector function | Aplicando a função mediapipe_detector
                self.result = results
                
                RecognitionModel.draw_styled_landmarks(self, image, results)  # Applying draw_syled_landmarks function | Aplicando a função draw_syled_landmarks 

                cv2.imshow('Recognition Training Sign', image) # Display images with draw landmarks | Exibe a imagem com os pontos de referências.  

                if cv2.waitKey(10) & 0xFF == ord('q'):
                    break
            self.cap.release()
            cv2.destroyAllWindows()

    def extract_keypoints(self, result):
        """
        en - Extracts keypoints from pose, face, left hand, and right hand landmarks.
        pt -  Extrai os pontos-chave da pose, face, mão esquerda e mão direita.

        Highlighted function | Função destacada:
            np_array.flatten() -> en - Used to transform a matrix array into a one-dimensional array.
                                  pt - Utilizado para transformar matrizes de listas em uma lista unidimensional contendo todos os valores

        Variables | váriaveis:
            en - pose: A flattened array of shape containing the pose landmarks with their (x, y, z) coordinates and visibility values.
            pt - pose: Lista unidimensionada contendo os pontos de referencia dos ombros em formato de coordenadas x, y, z.

            en - face: A flattened array of shape containing the face landmarks with their (x, y, z) coordinates.
            pt - face: Lista unidimensionada contendo os pontos de referencia da face em formato de coordenadas x, y, z.
            
            en - lh: A flattened array of shape containing the left hand landmarks with their (x, y, z) coordinates.
            pt - mão esquerda: Lista unidimensionada contendo os pontos de referencia da mão esquerda em formato de coordenadas x, y, z.

            en - rh: A flattened array of shape containing the right hand landmarks with their (x, y, z) coordinates.
            pt - mão direita: Lista unidimensionada contendo os pontos de referencia da mão direita em formato de coordenadas x, y, z.

        return:
            en - Return all values concatenates um a numpy array.
            pt - Retorna todos os valores concatenados dentro de uma lista numpy.
        """
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
        """
        en - Execution extract_keypoints function, a result variable is requires.
        pt - Execução da função extract_keypoints, é preciso informar uma varíavel para ter efetividade na execução da função
        """
        result_test = RecognitionModel.extract_keypoints(self, result)
        np.save('1', result_test)
        np.load('1.npy')

    def creating_paths(self):  
        """
        en - Create paths to save collected keypoints
        pt - Cria as pastas para salvar os pontos de referência.  
        """
        for action in self.actions:
            for sequence in range(self.no_sequences):
                try:
                    os.makedirs(os.path.join(self.DATA_PATH, action, str(sequence)))
                except:
                    pass

    def collecting_keypoints(self):  
        """
        en - Collects and saves keypoints from video frames for a set of actions. 
            Each frame is processed to extract pose landmarks, draw them on the image, 
            and save the keypoints to a specified directory. The process continues for 
            multiple actions and sequences, with frames displayed and keypoints stored 
            in numpy format.

        pt - Coleta e salva os pontos de referências do vídeo para um conjunto de ações. 
            Cada frame é processado para extrair pontos de referência, desenhá-los na imagem, 
            e salvar as coordenadas em um diretório especificado. O processo continua por 
            múltiplas ações e sequências, com quadros exibidos e coordenadas sendo armazenadas 
            em formato numpy.

        en - Breaks the loop if 'q' is pressed during frame display.
        pt - Para encerramento imediato, pressione a tecla 'q' durante a captura dos frames.
        """
        with self.mp_holistic.Holistic(min_detection_confidence=0.5, min_tracking_confidence=0.5) as holistic:
            
            for action in self.actions:
                for sequence in range(self.start_folder, self.start_folder + self.no_sequences):  # Loop through sequences aka videos | Loop repetidamente até atingir a quantidade de pastas determinadas na variável self.start_folder
                    for frame_num in range(self.sequence_length):  # Loop through video length aka sequence length | Define a quantidade de repetições com base no tamanho da sequencia de frames definida na variável self.sequence_length
                        
                        ret, frame = self.cap.read()  # Read feed
                        image, results = RecognitionModel.mediapipe_detector(self, frame, holistic)  # Make detections | Faz as detecções através da função mediapipe_detector
                        if results.pose_landmarks == None:
                            pass
                        else:

                            RecognitionModel.draw_styled_landmarks(self, image, results)  # Draw landmarks | Aplica as marcações dos pontos de reconhecimento com a função draw_styled_landmarks
                            
                            if frame_num == 0:  # Apply wait logic | Aplicação do tempo de espera do treinamento 
                                cv2.putText(image, 'Starting Collection', (120,200), 
                                        cv2.FONT_HERSHEY_SIMPLEX, 1, (0,255, 0), 4, cv2.LINE_AA)
                                cv2.putText(image, 'Frames collected To {} Video Num {}'.format(action, sequence), (15,12), 
                                        cv2.FONT_HERSHEY_SIMPLEX, 0.5, (0, 0, 255), 1, cv2.LINE_AA)
                                cv2.imshow('Recognition Training Sign', image) 
                                cv2.waitKey(1250)
                            else: 
                                cv2.putText(image, 'Frames collected To {} Video Num {}'.format(action, sequence), (15,12), 
                                        cv2.FONT_HERSHEY_SIMPLEX, 0.5, (0, 0, 255), 1, cv2.LINE_AA)
                                cv2.imshow('Recognition Training Sign', image)
                            
                            keypoints = RecognitionModel.extract_keypoints(self, results)
                            npy_path = os.path.join(self.DATA_PATH, action, str(sequence), str(frame_num))
                            np.save(npy_path, keypoints)

                            RecognitionModel.result_test(self, results)

                            if cv2.waitKey(10) & 0xFF == ord('q'):
                                break

            self.cap.release()
            cv2.destroyAllWindows()

    def building_and_training_model(self):
        """
        en - Loads and processes keypoints from saved .npy files for each action and sequence.
             Converts the keypoints into windows of frames, associates each sequence with its label, 
             and splits the data into training and testing sets.
        pt - Carrega e processa as coordenadas de arquivos .npy salvos para cada ação e sequência.
             Converte os coordenadas em janelas de quadros, associa cada sequência ao seu rótulo, 
             e divide os dados em conjuntos de treinamento e teste.
             
        Returns:
            en - Tuple: (X, y) - The split data (features and labels) for model training and testing.
            pt - Tupla: (X, y) - Os dados divididos (recursos e rótulos) para treinamento e teste de modelo.

        Function | Função:
            train_test_split() -> en - Used to split data arrays or matrices into random training and testing subsets.
                                  pt - Usado para dividir listas ou matrizes de dados em subconjuntos aleatórios de treinamento e teste
            Applyed: train_test_split(X, y, test_size=0.30, shuffle=True, random_state=42)
            Explain: X, Y - Data input to train | Dados de entrada para treinamento
                     test_size - Proportion of the data to be used for training | Percentual de dados que serão utilizados no treinamento
                     shuffle - Data shuffling to ensure data division between training and testing, avoiding bias | Embaralhamento dos dados para garantir a divisão dos dados entre treinamento e teste, evitando viés.
                     random_state - Determines the division of data for each run | Determina a divisão dos dados a cada execução
        
        Variable:
            label_map: 
                en - Creates a dictionary that maps each self.actions label to a unique number, based on the index of each list item.
                pt - Cria um dicionário que mapeia cada rótulo self.actions para um número exclusivo, com base no índice de cada item da lista.
        """
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

        X = np.array(sequences)
        y = to_categorical(labels).astype(int)  # Convert labels to category format and number integer
        return train_test_split(X, y, test_size=0.30, shuffle=True, random_state=42)
    
    def setting_sequencial_model(self):
        """
        en - Builds and compiles a sequential LSTM model for action recognition, 
             using training data and outputs the trained model, along with test data.
        pt - Configuração do modelo utilizando a biblioteca LSTM voltada a treinamento e 
             reconhecimento gestual com rede neural.

        Returns:
            model (Sequential): The compiled LSTM model | Modelo LSTM compilado
            X_test (ndarray): The test input data | Dados para teste
            y_test (ndarray): The test labels | Rótulos de teste
        """
                
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
        model.fit(X_train, y_train, epochs=170, callbacks=[self.tb_callback])  

        return model, X_test, y_test

    def test_confusion_matrix_and_accuracy(self):
        """
        en - Evaluates the trained model on the test set, calculates the multilabel confusion matrix, 
             and computes the accuracy score. The trained model is saved to a file.
        pt - Avalia o modelo treinado no conjunto de teste, calcula a matriz de confusão rótulada, 
             e calcula a precisão. O modelo treinado é salvo em um arquivo.
        
        ytrue. Predicts labels for the test set | Conjunto de rótulos para testes.
        yhat. Converts true labels and predicted labels into class indices | Converte rótulos verdadeiros e rótulos previstos em índices classificados.
        
        Returns:
            None -> en - This method is just for evaluating accuracy and making predictions, so it does not require a return value.
                    pt - Este método serve apenas para avaliar a precisão e fazer previsões, não requer um valor de retorno.

        Functions | Funções:
            multilabel_confusion_matrix -> Generates the confusion matrix to evaluate the accuracy of predictions for labels classification tasks | Gera a matriz de confusão para avaliar a precisão das previsões para tarefas de classificação rótulos
            accuracy_score -> Calculte the accuracy on the test set | Calcule a precisão no conjunto de teste

        """
        model, X_test, y_test = RecognitionModel.setting_sequencial_model(self)
        yhat = model.predict(X_test)
        
        ytrue = np.argmax(y_test, axis=1).tolist()
        yhat = np.argmax(yhat, axis=1).tolist()  
        
        model.save('shuffle3.keras')
        
        print(multilabel_confusion_matrix(ytrue, yhat))
        print(accuracy_score(ytrue, yhat))

    def execute_train(self):
        """
        en - Run methods
        pt - Executa os métodos
        """
        RecognitionModel.creating_paths(self)
        RecognitionModel.collecting_keypoints(self)
        RecognitionModel.test_confusion_matrix_and_accuracy(self)

C1 = RecognitionModel()
C1.execute_train()  
