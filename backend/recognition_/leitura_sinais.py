import cv2
import mediapipe as mp
import openpyxl # type: ignore
import os

'''
import warnings
warnings.filterwarnings('ignore', category=UserWarning, module='google.protobuf.symbol_database')
'''

class HandGestureDetector:
    def __init__(self, output_file="C:/Users/justi/OneDrive/Documentos/USCS/TCC/LibrasASL-master-main/backend/logs/hand_gestures_data.xlsx"):
        self.cap = cv2.VideoCapture(0)
        self.hands = mp.solutions.hands.Hands(min_detection_confidence=0.7, min_tracking_confidence=0.5)
        self.mp_draw = mp.solutions.drawing_utils
        self.output_file = output_file
        self.frame_count = 0
        self.initialize_excel()

    def initialize_excel(self):
        if not os.path.exists(self.output_file):
            workbook = openpyxl.Workbook()
            sheet = workbook.active
            sheet.title = "Hand Gestures Data"
            header = ["frame"] + [f"{axis}_landmark_{i}" for i in range(21) for axis in ("x", "y", "z")]
            sheet.append(header)
            workbook.save(self.output_file)

    def capture_frame(self):
        ret, frame = self.cap.read()
        if not ret:
            return None
        return frame

    def process_frame(self, frame):
        frame_rgb = cv2.cvtColor(frame, cv2.COLOR_BGR2RGB)
        results = self.hands.process(frame_rgb)
        return results

    def save_landmarks_to_excel(self, results):
        if results.multi_hand_landmarks:
            workbook = openpyxl.load_workbook(self.output_file)
            sheet = workbook.active
            for hand_landmarks in results.multi_hand_landmarks:
                row = [self.frame_count]
                for landmark in hand_landmarks.landmark:
                    row.extend([landmark.x, landmark.y, landmark.z])
                sheet.append(row)
            workbook.save(self.output_file)
            print(f"Frame {self.frame_count} saved to {self.output_file}")

    def run(self):
        try:
            while True:
                frame = self.capture_frame()
                if frame is None:
                    break

                results = self.process_frame(frame)

                if results.multi_hand_landmarks:
                    for hand_landmarks in results.multi_hand_landmarks:
                        self.mp_draw.draw_landmarks(frame, hand_landmarks, mp.solutions.hands.HAND_CONNECTIONS)

                cv2.imshow("Hand Gesture Detection", frame)
                self.frame_count += 1

                key = cv2.waitKey(1) & 0xFF
                if key == ord('s') and results.multi_hand_landmarks:
                    self.save_landmarks_to_excel(results)

                if key == ord('q'):
                    break

        finally:
            self.cap.release()
            cv2.destroyAllWindows()
            self.hands.close()

if __name__ == "__main__":
    detector = HandGestureDetector()
    detector.run()
