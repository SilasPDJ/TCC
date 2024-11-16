import os
import socket
import subprocess
import logging
import signal
import sys


class SocketServer:
    def __init__(self, host, port, log_file):
        self.host = host
        self.port = port
        self.running = True
        self.configure_logging(log_file)

    def configure_logging(self, log_file):
        logging.basicConfig(
            filename=log_file,
            level=logging.DEBUG,
            format='%(asctime)s - %(levelname)s - %(message)s',
            datefmt='%Y-%m-%d %H:%M:%S'
        )

    def log_info(self, message):
        logging.info(message)
        print(message)

    def log_error(self, message):
        logging.error(message)
        print(message)

    def process_data(self, data):
        self.log_info(f"Processing data: {data}")
        try:
            python_file = os.path.join(os.path.dirname(__file__), "..", "recognition_/leitura_sinais.py")

            # Caminho para o executável Python dentro do ambiente virtual
            python_executable = os.path.join(os.path.dirname(__file__), "..", "venv", "Scripts", "python")

            result = subprocess.run(
                [python_executable, python_file],
                capture_output=True,
                text=True,
                check=True
            )
            self.log_info(f"Script output: {result.stdout.strip()}")
            if result.stderr:
                self.log_error(f"Script errors: {result.stderr.strip()}")
        except subprocess.CalledProcessError as e:
            self.log_error(f"Script failed with return code {e.returncode} and error: {e.stderr.strip()}")
        except Exception as e:
            self.log_error(f"Error running script: {e}")

    def signal_handler(self, sig, frame):
        self.log_info("Signal received, shutting down...")
        self.running = False

    def start(self):
        signal.signal(signal.SIGINT, self.signal_handler)
        self.log_info("Starting socket server...")

        try:
            with socket.socket(socket.AF_INET, socket.SOCK_STREAM) as server_socket:
                server_socket.bind((self.host, self.port))
                server_socket.listen()
                self.log_info(f"Socket server is running on {self.host}:{self.port}")

                while self.running:
                    try:
                        client_socket, addr = server_socket.accept()
                        with client_socket:
                            self.log_info(f"Connected by {addr}")
                            data = client_socket.recv(1024)
                            
                            if not data:
                                self.log_info(f"No data received. Closing connection with {addr}.")
                                break
                            
                            self.log_info(f"Data received from {addr}: {data.decode('utf-8')}")
                            self.process_data(data.decode('utf-8'))
                    except Exception as e:
                        self.log_error(f"Error during socket communication: {e}")
        finally:
            self.log_info("Socket server has been stopped.")

if __name__ == "__main__":
    server = SocketServer(
        host='localhost',
        port=5001,
        # log_file='C:/Users/justi/OneDrive/Documentos/USCS/TCC/LibrasASL-master-main/backend/logs/socket_server.log'
        log_file=os.path.join(os.path.dirname(__file__),
                              '..', 'logs/socket_server.log'),

    )
    server.start()