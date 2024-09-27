// Selecione os formulários
const atualizarDadosForm = document.querySelector("#atualizar-dados-form");
const atualizarSenhaForm = document.querySelector("#atualizar-senha-form");

const $inputsDados = jQuery(atualizarDadosForm).find("input");
const $inputsSenhas = jQuery(atualizarSenhaForm).find("input");
let feedbackArray = [];

$('#btAtualizarDados').prop('disabled', true);


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


// Validando os inputs ao digitar
function validaInputsAoDigitar(inputs, button) {
  $(inputs).on("input change blur", function (event) {
    const $input = $(this);
    const value = $input.val().trim();

    const isValidEmail = function (email) {
      const regex = /^[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,}$/;
      return regex.test(email);
    };

    if ($input.is(":invalid") || (this === emailInput && !isValidEmail(value)) || value === "") {
      if (event.type === "blur") {
        $input.addClass("is-invalid");

      }
    } else {
      $input.removeClass("is-invalid");
    }

    // Verificando se todos os inputs são válidos
    let isFormValid = true;
    $(inputs).each(function () {
      const $input = $(this);
      const value = $input.val().trim();

      if (!$input.is(":valid") || (this === emailInput && !isValidEmail(value)) || !$input) {
        isFormValid = false;
      }
    });

    // Ativa ou desativa o botão de envio com base na validade do formulário
    $(button).prop('disabled', !isFormValid || feedbackArray?.length > 0);

  });
}


function ValidatePasswords(inputSenha, inputConfirmarSenha, matchDiv) {
  // O selector dos inputs deve ser em javascript, não jQuery
  $(inputSenha).add(inputConfirmarSenha).on("input", function () {
    feedbackArray = []
    const senha = $(inputSenha).val();
    const confirmarSenha = $(inputConfirmarSenha).val();

    // Validando critérios de senha
    const minLength = 8;

    // Limpa as classes de feedback
    $(matchDiv).removeClass("text-success").addClass("text-danger");

    if (senha !== confirmarSenha && confirmarSenha) {
      feedbackArray.push("As senhas não correspondem.");
    }
    if (senha.length < minLength) {
      feedbackArray.push("Senha deve conter no mínimo 8 caracteres.");
    } else {
      if (!/[A-Z]/.test(senha)) {
        feedbackArray.push("Senha deve conter pelo menos uma letra maiúscula.");
      }

      if (!/[a-z]/.test(senha)) {
        feedbackArray.push("Senha deve conter pelo menos uma letra minúscula.");
      }

      if (!/[0-9]/.test(senha)) {
        feedbackArray.push("Senha deve conter pelo menos um número.");
      }

      if (!/[!@#$%^&*'(),.?":{}|<>]/.test(senha)) {
        feedbackArray.push("Senha deve conter pelo menos um caractere especial.");
      }

    }

    // Configurando o texto do feedback
    let feedbackText = '';
    for (let feedback of feedbackArray) {
      feedbackText += `${feedback}<br/>`;
    }
    feedbackText += "<br/>";

    $(matchDiv).html(feedbackText);
  });
}

validaInputsAoDigitar($inputsDados, $('#btAtualizarDados'))
validaInputsAoDigitar($inputsSenhas, $('#btAtualizarSenha'))

ValidatePasswords(newPasswordInput, confirmNewPasswordInput, passwordMatchDiv)

function recarregaNavbar() {
  $.ajax({
    url: '../html/utils/navbar.php',
    success: function (navbarContent) {
      $('header').html(navbarContent);
      console.log(navbarContent, 'hihi')
    }
  });
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
          feedbackDiv.classList.add("alert", "alert-danger");
        } else {
          feedbackDiv.innerHTML = "Dados atualizados com sucesso!";
          feedbackDiv.classList.add("alert", "alert-success");
          recarregaNavbar()
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

  const $inputs = $(this).find("input");

  let isValid = true;

  $inputs.each(function () {
    const $input = $(this);

    // Valida se o valor está vazio...
    const trimmedValue = $input.val().trim();
    isValid = trimmedValue !== "";
    $input.toggleClass('is-invalid', !isValid);

  });

  if (isValid) {
    $.ajax({
      type: "POST",
      url: "../php/atualizar_senha.php",
      data: {
        inputOldPassword: oldPasswordInput.value,
        inputNewPassword: newPasswordInput.value,
      },
      success: function (response) {
        alert('hello')
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
          // recarregaNavbar()
        }
      },
      error: function () {
        alert("Erro ao enviar o formulário via AJAX.");
      },
    });
  }
});
