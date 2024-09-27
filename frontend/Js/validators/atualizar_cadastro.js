// Selecione os formulários
const atualizarDadosForm = document.querySelector("#atualizar-dados-form");
const atualizarSenhaForm = document.querySelector("#atualizar-senha-form");

// Configurando os métodos dos formulários
atualizarDadosForm.method = "POST";
atualizarSenhaForm.method = "POST";

// Seleciona os campos do formulário de atualização de dados
const nameInput = document.querySelector("#inputName");
const surnameInput = document.querySelector("#inputSurname");
const emailInput = document.querySelector("#inputEmail");
const userInput = document.querySelector("#inputUser");

// Seleciona os campos do formulário de alteração de senha
const oldPasswordInput = document.querySelector("#inputOldPassword");
const newPasswordInput = document.querySelector("#inputNewPassword");
const confirmNewPasswordInput = document.querySelector("#inputConfirmNewPassword");

// Divs para feedback
const feedbackDiv = document.querySelector("#validationMessage");
const passwordMatchDiv = document.querySelector("#passwordMatchMessage");

// Função para validar os dados pessoais
function validatePersonalData() {
  const inputs = [nameInput, surnameInput, emailInput, userInput];
  let isValid = true;

  inputs.forEach(input => {
    if (input.value.trim() === "") {
      input.classList.add("is-invalid");
      isValid = false;
    } else {
      input.classList.remove("is-invalid");
    }
  });

  return isValid;
}

// Função para validar as senhas
function validatePasswords() {
  const feedbackArray = [];
  const minLength = 8;

  if (newPasswordInput.value !== confirmNewPasswordInput.value) {
    feedbackArray.push("As novas senhas não correspondem.");
  }

  if (newPasswordInput.value.length < minLength) {
    feedbackArray.push("Nova senha deve conter no mínimo 8 caracteres.");
  } else {
    if (!/[A-Z]/.test(newPasswordInput.value)) {
      feedbackArray.push("Nova senha deve conter pelo menos uma letra maiúscula.");
    }
    if (!/[a-z]/.test(newPasswordInput.value)) {
      feedbackArray.push("Nova senha deve conter pelo menos uma letra minúscula.");
    }
    if (!/[0-9]/.test(newPasswordInput.value)) {
      feedbackArray.push("Nova senha deve conter pelo menos um número.");
    }
    if (!/[!@#$%^&*(),.?":{}|<>]/.test(newPasswordInput.value)) {
      feedbackArray.push("Nova senha deve conter pelo menos um caractere especial.");
    }
  }

  // Configurando o texto do feedback
  passwordMatchDiv.innerHTML = feedbackArray.join("<br/>");

  return feedbackArray.length === 0;
}

// Validação dos formulários ao submeter
atualizarDadosForm.addEventListener("submit", function (event) {
  event.preventDefault();
  if (validatePersonalData()) {
    $.ajax({
      type: "POST",
      url: "../php/atualizar_dados.php",
      data: {
        inputName: nameInput.value,
        inputSurname: surnameInput.value,
        inputEmail: emailInput.value,
        inputUser: userInput.value,
        termosUso: true

      },
      success: function (response) {
        // Limpa o feedback anterior
        feedbackDiv.innerHTML = "";
        feedbackDiv.classList.remove("alert", "alert-success", "alert-danger"); // Remove classes de alerta anteriores

        if (!response.success) {
          let errorMessage = "";
          for (let key in response) {
            if (key !== "success") {
              errorMessage += response[key] + "<br/>";
            }
          }
          feedbackDiv.innerHTML = errorMessage;
          feedbackDiv.classList.add("alert", "alert-danger"); // Adiciona classes de alerta de erro
        } else {
          feedbackDiv.innerHTML = "Dados atualizados com sucesso!";
          feedbackDiv.classList.add("alert", "alert-success"); // Adiciona classes de alerta de sucesso
        }

        // Exibe o feedback
        feedbackDiv.style.display = "block"; // Certifica-se de que a div está visível

        // Define um temporizador para ocultar a mensagem após 3 segundos
        setTimeout(function () {
          feedbackDiv.style.display = "none"; // Oculta a div após 3 segundos
        }, 7000);
      },


      error: function () {
        alert("Erro ao enviar o formulário via AJAX.");
      },
    });
  }
});

atualizarSenhaForm.addEventListener("submit", function (event) {
  event.preventDefault();
  if (validatePasswords()) {
    $.ajax({
      type: "POST",
      url: "../php/atualizar_senha.php",
      data: {
        inputOldPassword: oldPasswordInput.value,
        inputNewPassword: newPasswordInput.value,
      },
      success: function (response) {
        if (!response.success) {
          let errorMessage = "";
          for (let key in response) {
            if (key !== "success") {
              errorMessage += response[key] + "<br/>";
            }
          }
          feedbackDiv.innerHTML = errorMessage;
        } else {
          feedbackDiv.innerHTML = "Senha atualizada com sucesso!";
          feedbackDiv.classList.remove("text-danger");
          feedbackDiv.classList.add("text-success");
        }
      },
      error: function () {
        alert("Erro ao enviar o formulário via AJAX.");
      },
    });
  }
});
