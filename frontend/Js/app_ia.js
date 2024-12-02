document.getElementById('reloadPageLink').addEventListener('click', function (event) {
  event.preventDefault(); // Impede o comportamento padrão de recarregar a página ao clicar no link
  location.reload(); // Recarrega a página
});

const SERVER = "http://127.0.0.1:5000";
const LANGUAGE = "Portuguese";
const DATA = {
  selectedLanguage: LANGUAGE,
  message: "Iniciando captura de gestos."
};

window.addEventListener('load', function () {
  fetch(`${SERVER}/start-socket`, {
    method: 'POST',
    headers: {
      'Content-Type': 'application/json',
    },
    body: JSON.stringify(DATA),
  })
    .then(response => response.json())
    .then(data => {
      // Faça algo com os dados retornados
    })
    .catch(error => {
      console.error('Erro:', error);
    });

});


document.getElementById('sendDataBtn').addEventListener('click', function () {
  const button = this;
  const loadingSpinner = document.getElementById('loadingSpinner');
  const disclaimerRefresh = document.getElementById('disclaimerRefresh')
  const disclaimerSuccess = document.getElementById('disclaimerSuccess')
  const disclaimerError = document.getElementById('disclaimerError')

  // Desativa o botão e mostra o spinner
  button.disabled = true;
  loadingSpinner.classList.remove('d-none');



  fetch(`${SERVER}/send-data`, {
    method: 'POST',
    headers: {
      'Content-Type': 'application/json',
    },
    body: JSON.stringify(DATA),
  })
    .then(response => response.json())
    .then(data => {
      disclaimerSuccess.classList.remove('d-none')
      disclaimerSuccess.classList.remove('d-none')
    })
    .catch((error) => {
      button.disabled = false;
      disclaimerError.classList.remove('d-none')
    })
    .finally(() => {
      // Habilita o botão e esconde o spinner após o carregamento
      // button.disabled = false;
      loadingSpinner.classList.add('d-none');
      disclaimerRefresh.classList.remove('d-none')
    });
});