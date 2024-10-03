@echo off
REM Ativar o ambiente virtual
call .\venv\Scripts\activate

REM Iniciar o Flask App
start cmd /k "python .\conexoes\flask_app.py"

REM Iniciar o Socket App
start cmd /k "python .\conexoes\socket_app.py"
