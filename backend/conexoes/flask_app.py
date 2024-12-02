import socket
import os
import logging
import subprocess
from flask import Flask, request, jsonify
from flask_cors import CORS
from dotenv import load_dotenv

# Configurando logging para arquivo e terminal
log_format = '%(asctime)s - %(levelname)s - %(message)s'
logging.basicConfig(
    # filename='C:/Users/justi/OneDrive/Documentos/USCS/TCC/LibrasASL-master-main/backend/logs/flask_app.log',  # Arquivo de log
    filename=os.path.join(os.path.dirname(__file__),
                          '..', 'logs/flask_app.log'),
    level=logging.DEBUG,  # Nível de logging
    format=log_format,
    datefmt='%Y-%m-%d %H:%M:%S'
)

# Configurando para imprimir logs importantes no terminal
console = logging.StreamHandler()
console.setLevel(logging.INFO)  # Definir o nível de log para o console (ex: INFO)
formatter = logging.Formatter(log_format)
console.setFormatter(formatter)
logging.getLogger('').addHandler(console)

class SocketServerClient:
    def __init__(self):
        load_dotenv()
        self.host = os.getenv("SOCKET_HOST")
        self.port = int(os.getenv("SOCKET_PORT"))
        logging.info(f"Socket client configurado para {self.host}:{self.port}")

    def send_to_server(self, data):
        try:
            with socket.socket(socket.AF_INET, socket.SOCK_STREAM) as sock:
                logging.info("Conectando ao servidor socket...")
                sock.connect((self.host, self.port))
                logging.info(f"Enviando dados para o servidor socket: {data}")
                sock.sendall(data.encode('utf-8'))
                logging.info("Dados enviados com sucesso.")
        except Exception as e:
            logging.error(f"Erro ao enviar dados para o servidor socket: {e}")
            raise

class FlaskApp:
    def __init__(self):
        self.app = Flask(__name__)
        CORS(self.app)
        self.client = SocketServerClient()
        logging.info("Aplicação Flask inicializada.")

    def configure_routes(self):

        @self.app.route('/start-socket', methods=['POST'])
        def start_socket():
            try:
                subprocess.run(['python', os.path.join(os.path.dirname(__file__), '_socket_app.py')])
            except:
                logging.info("Não foi possível inicialziar a conexão _socket_app.py")
            data = request.get_json()
            if not data:
                return jsonify({"error": "No data provided"}), 400  # dados ausentes

            try:
                self.client.send_to_server(str(data))
                return jsonify({"message": "Data sent to socket server successfully"}), 200 
            except Exception as e:
                logging.error(f"Error sending data to socket: {e}")
                return jsonify({"error": f"Failed to send data to socket server: {str(e)}"}), 500  # erro interno



        @self.app.route('/send-data', methods=['POST'])
        def send_data():
            try:
                data = request.get_json()
                if not data:
                    logging.warning("Nenhum dado recebido na requisição.")
                    return jsonify({"error": "No data provided"}), 400

                message = str(data)
                logging.info(f"Dados recebidos do frontend: {message}")
                # self.client.send_to_server(message)

                logging.info("Resposta enviada para o cliente.")
                return jsonify({"message": "Data sent to socket server"}), 200

            except Exception as e:
                logging.error(f"Erro no endpoint /send-data: {e}")
                return jsonify({"error": str(e)}), 500

    def run(self):
        # try:
            # subprocess.run(['python', os.path.join(os.path.dirname(__file__), '_socket_app.py')])
        # except:
            # logging.info("Não foi possível inicialziar a conexão _socket_app.py")
        logging.info("Servidor Flask iniciado na porta 5000.")
        self.app.run(debug=True, port=5000)


if __name__ == '__main__':
    app = FlaskApp()
    app.configure_routes()
    try:
        app.run()
    except Exception as e:
        logging.critical(f"Erro crítico ao executar o servidor Flask: {e}")