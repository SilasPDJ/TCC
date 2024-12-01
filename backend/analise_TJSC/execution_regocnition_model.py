import os
import cv2
import numpy as np
import mediapipe as mp
from tensorflow.keras.models import load_model

class RecognitionModelRefactored:
    def __init__(self) -> None:
        self.mp_holistic = mp.solutions.holistic
        self.mp_drawing = mp.solutions.drawing_utils
        self.cap = cv2.VideoCapture(0)
        self.DATA_PATH = os.path.join('MP_Data')  
        self.actions = np.array(['hello', 'thanks', 'euteamo'])
        self.no_sequences = 30 
        self.sequence_length = 30
        self.colors = [(245, 117, 16), (117, 245, 16), (16, 117, 245)]
        self.model = load_model("shuffle3.keras")
        self.threshold = 0.5

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
        image = cv2.cvtColor(image, cv2.COLOR_BGR2RGB)
        image.flags.writeable = False
        results = model.process(image)
        image.flags.writeable = True
        image = cv2.cvtColor(image, cv2.COLOR_RGB2BGR)
        return image, results

    def draw_landmarks(self, image, results):
        """
        en - Draws landmarks on the image using Mediapipe utilities.
        pt - Desenha pontos de referência na imagem usando funções do Mediapipe.

        Args:
            en - image (ndarray): The frame to draw landmarks on.
            pt - Imagem (ndarray): Esqueleto dos pontos de referência.
            
            en - results: Mediapipe holistic results.
            pt - resultados: Resultados holísticos extraídos utilizando mediapipe.

        Returns:
            en - object: Drawing instance with landmarks added.
            pt - Retorna: Esqueleto com pontos de referência adicionados.  
        """
        self.mp_drawing.draw_landmarks(image, results.pose_landmarks, self.mp_holistic.POSE_CONNECTIONS)
        
        self.mp_drawing.draw_landmarks(
            image,
            results.face_landmarks,
            self.mp_holistic.FACEMESH_TESSELATION,
            self.mp_drawing.DrawingSpec(color=(80, 110, 10), thickness=1, circle_radius=1),
            self.mp_drawing.DrawingSpec(color=(80, 256, 121), thickness=1, circle_radius=1)
        )
        
        self.mp_drawing.draw_landmarks(image, results.left_hand_landmarks, self.mp_holistic.HAND_CONNECTIONS)
        self.mp_drawing.draw_landmarks(image, results.right_hand_landmarks, self.mp_holistic.HAND_CONNECTIONS)

    def extract_keypoints(self, results):
        """
        en - Extracts keypoints from pose, face, left hand, and right hand landmarks.
        pt -  Extrai os pontos-chave da pose, face, mão esquerda e mão direita.

        Highlighted function | Função destacada:
            np_array.flatten() -> en - Used to transform a matrix array into a one-dimensional array.
                                  pt - Utilizado para transformar matrizes de listas em uma lista unidimensional contendo todos os valores

        Variables | Váriáveis:
            en - pose: A flattened array of shape containing the pose landmarks with their (x, y, z) coordinates and visibility values.
            pt - pose: Lista unidimensional contendo os pontos de referência dos ombros em formato de coordenadas x, y, z.

            en - face: A flattened array of shape containing the face landmarks with their (x, y, z) coordinates.
            pt - face: Lista unidimensional contendo os pontos de referência da face em formato de coordenadas x, y, z.
            
            en - lh: A flattened array of shape containing the left hand landmarks with their (x, y, z) coordinates.
            pt - mão esquerda: Lista unidimensional contendo os pontos de referência da mão esquerda em formato de coordenadas x, y, z.

            en - rh: A flattened array of shape containing the right hand landmarks with their (x, y, z) coordinates.
            pt - mão direita: Lista unidimensional contendo os pontos de referência da mão direita em formato de coordenadas x, y, z.

        return:
            en - Return all values concatenated into a numpy array.
            pt - Retorna todos os valores concatenados dentro de uma lista numpy.
        """
        pose = np.array([[res.x, res.y, res.z, res.visibility] for res in results.pose_landmarks.landmark]).flatten() if results.pose_landmarks else np.zeros(132)
        face = np.array([[res.x, res.y, res.z] for res in results.face_landmarks.landmark]).flatten() if results.face_landmarks else np.zeros(1404)
        lh = np.array([[res.x, res.y, res.z] for res in results.left_hand_landmarks.landmark]).flatten() if results.left_hand_landmarks else np.zeros(63)
        rh = np.array([[res.x, res.y, res.z] for res in results.right_hand_landmarks.landmark]).flatten() if results.right_hand_landmarks else np.zeros(63)
        return np.concatenate([pose, face, lh, rh])

    def predict_action(self, sequence):
        """ 
        en - Predicts the action based on a sequence of key points.
        pt - Faz a predição da ação a partir de uma sequência de keypoints.
        """
        prediction = self.model.predict(np.expand_dims(sequence, axis=0))[0]
        return prediction

    def visualize_probabilities(self, image, predictions):
        """
        en - Draws prediction results on the image with colored rectangles and action labels.
        pt - Mostra os resultados das predições na imagem conforme o gesto está sendo reconhecido.

        Args:
            en - image (ndarray): The image to draw on.
            pt - Imagem (ndarray): Imagem que mostra a probabilidade do gesto reconhecido
            
            en - predictions (list): List of predicted probabilities for each action.
            pt - previsões (lista): Lista de probabilidades previstas para cada ação.

        Returns:
            en - ndarray: The image with drawn rectangles and action labels.
            pt - ndarray: A imagem com retângulos desenhados e rótulos de ação.
        """
        for num, prob in enumerate(predictions):
            cv2.rectangle(image, (0, 60 + num * 40), (int(prob * 100), 90 + num * 40), self.colors[num], -1)
            cv2.putText(image, self.actions[num], (0, 85 + num * 40), 
                        cv2.FONT_HERSHEY_SIMPLEX, 1, (255, 255, 255), 2, cv2.LINE_AA)
        return image

    def execution_recognition_model(self):
        """
        en - Performs real-time action recognition by processing video frames from a camera feed.
        pt - Reconhece ações em tempo real através do reconhecimento de gestos por meio de uma câmara.

        en - The method uses MediaPipe to detect and track body landmarks, extracts keypoints, 
            and classifies actions based on a sequence of keypoints. Predictions are displayed 
            on the screen along with the action labels. If a certain action is predicted consistently 
            across multiple frames, it is appended to a sentence which is also shown on the screen.
        pt - O método utiliza o MediaPipe para detectar e seguir os pontos de referência do corpo, extrai as coordenadas
            e classifica as ações com base numa sequência de coordenadas. As previsões são apresentadas 
            no lado esquerdo do display juntamente com as etiquetas das ações.

        en - The process continues until the user exits the video feed by pressing the 'q' key.
        pt - Pressione 'q' para sair da captura de vídeo.

        Attributes:
            sequence_length (int): The length of the sequence of keypoints used for action recognition. | Tamanho das coordenadas utilizada em cada reconhecimento.
            cap (cv2.VideoCapture): The camera feed object for video capture. | Captura de camera para coletar os frames.
            mp_holistic (mediapipe.solutions.Holistic): MediaPipe's holistic model for pose and hand detection. | Modelo holístico do MediaPipe para deteção de pose e mão.
            mediapipe_detector (function): Function to process the frame and detect landmarks using MediaPipe. | Função para detetar e processar os pontos de referência utilizando o MediaPipe.
            extract_keypoints (function): Function to extract keypoints from detected landmarks. | Função para extrair os pontos detectados na leitura do gesto.
            predict_action (function): Function to predict the action based on extracted keypoints. | Função para prever a ação com base nos dados extraídos.
            visualize_probabilities (function): Function to visualize the action prediction probabilities. | Função para visualizar as probabilidades de previsão de ações.
        """
        sequence, sentence, predictions = [], [], []
        
        with self.mp_holistic.Holistic(min_detection_confidence=0.5, min_tracking_confidence=0.5) as holistic:
            while self.cap.isOpened():
                ret, frame = self.cap.read()
                if not ret:
                    break

                image, results = self.mediapipe_detector(frame, holistic)

                if results.pose_landmarks:
                    self.draw_landmarks(image, results)

                    keypoints = self.extract_keypoints(results)
                    sequence.append(keypoints)
                    sequence = sequence[-self.sequence_length:]

                    if len(sequence) == self.sequence_length:
                        res = self.predict_action(sequence)
                        predictions.append(np.argmax(res))
                        print(f"Res: {res}")
                        print(f"Prediction: {self.actions[np.argmax(res)]}")

                        if predictions[-10:].count(np.argmax(res)) > 8 and res[np.argmax(res)] > self.threshold:
                            if not sentence or sentence[-1] != self.actions[np.argmax(res)]:
                                sentence.append(self.actions[np.argmax(res)])
                            if len(sentence) > 5:
                                sentence = sentence[-5:]

                        image = self.visualize_probabilities(image, res)

                    cv2.rectangle(image, (0, 0), (640, 40), (245, 117, 16), -1)
                    cv2.putText(image, ' '.join(sentence), (3, 30), 
                                cv2.FONT_HERSHEY_SIMPLEX, 1, (255, 255, 255), 2, cv2.LINE_AA)

                cv2.imshow('Recognition Training Sign', image)
                if cv2.waitKey(10) & 0xFF == ord('q'):
                    break

        self.cap.release()
        cv2.destroyAllWindows()


if __name__ == "__main__":
    recognition_model = RecognitionModelRefactored()
    recognition_model.execution_recognition_model()
