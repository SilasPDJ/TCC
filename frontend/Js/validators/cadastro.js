// Selecione o formulário
const form = document.querySelector("#cadastro-form");

// Configurando o action, ou seja, destino do formulário (ajax...)
// form.action = "/frontend/php/cadastro.php"
form.method = "POST"

// Seleciona os campos do formulário
const nameInput = document.querySelector("#inputName");
const surnameInput = document.querySelector("#inputSurname");
const bornDateInput = document.querySelector("#inputBornDate");
const emailInput = document.querySelector("#inputEmail");
const passwordInput = document.querySelector("#inputPassword");
const confirmPasswordInput = document.querySelector("#inputConfirmPassword");
// const termosUsoCheckbox = document.querySelector("#termosUso");
const feedbackErrorDiv = document.querySelector("#feedback-error")

// --- Para testes
// nameInput.value = "OlaTest2"
// surnameInput.value = "Sobrenome2"
// emailInput.value = 'Olaemail2@gmail.com'
// userInput.value = "OlaTestUser2"
// passwordInput.value = "9021daksdddddddlDSKADDLK00"
// confirmPasswordInput.value = passwordInput.value
// termosUsoCheckbox.checked = true
// 

// settando alguns atributos dos inputs PATTERNS

function setMinLengthPatternAndTitle(inputElement, minLength) {
  // Função auxiliar que configura o mínimo de caracteres permitido no input
  if (inputElement) {
    inputElement.setAttribute('pattern', '.{' + minLength + ',}');
    inputElement.setAttribute('title', 'Deve conter pelo menos ' + minLength + ' caracteres');
  }
}
setMinLengthPatternAndTitle(nameInput, 3);
setMinLengthPatternAndTitle(surnameInput, 3);

const $inputs = jQuery(form).find("input");
let feedbackArray = [];
$('#btCadastrar').prop('disabled', true);

// Validando os inputs ao digitar
$inputs.on("input change blur", function (event) {
  const $input = $(this);
  const value = $input.val().trim();

  const isValidEmail = function (email) {
    const regex = /^[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,}$/;
    return regex.test(email);
  };
  const isValidBornDate = function (date) {
    const today = new Date();
    const birthDate = new Date(date);

    // Verifica se a data de nascimento é válida
    if (isNaN(birthDate.getTime())) {
      return false;
    }

    // Verifica se a data de nascimento é uma data futura
    return birthDate < today;
  };

  const isBornDateInvalid = this === bornDateInput && !isValidBornDate(value);
  const isEmailInvalid = this === emailInput && !isValidEmail(value);

  if ($input.is(":invalid") ||
    value === "" ||
    isBornDateInvalid || isEmailInvalid) {
    if (event.type === "blur") {
      $input.addClass("is-invalid");

    }
  } else {
    $input.removeClass("is-invalid");
  }

  // Verificando se todos os inputs são válidos
  let isFormValid = true;
  $inputs.each(function () {
    const $input = $(this);
    const value = $input.val().trim();

    if (!$input.is(":valid") || (this === emailInput && !isValidEmail(value)) || !$input) {
      isFormValid = false;
    }
  });

  // Ativa ou desativa o botão de envio com base na validade do formulário
  $('#btCadastrar').prop('disabled', !isFormValid || feedbackArray?.length > 0);

});


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
      feedbackArray.push("As senhas não coincidem.");
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
    console.log(feedbackText)

    $(matchDiv).html(feedbackText);
  });
}

const passwordMatchDiv = $('#passwordMatchMessage')
const validationDiv = $('#validationMessage')

ValidatePasswords(passwordInput, confirmPasswordInput, passwordMatchDiv)


// Após submits & chama ajax
form.addEventListener("submit", function (event) {
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

  // Validação direto do php...

  if (isValid) {
    console.log('isValid')
    $.ajax({
      type: "POST",
      url: "../../php/inserir_cadastro.php",
      data: {
        inputName: nameInput.value,
        inputSurname: surnameInput.value,
        inputBornDate: bornDateInput.value,
        inputEmail: emailInput.value,
        inputPassword: passwordInput.value,
        inputConfirmPassword: confirmPasswordInput.value,
      },
      success: function (response) {
        console.log(response.success)
        if (!response.success) {
          let errorMessage = "";
          for (let key in response) {
            if (key !== "success") {
              errorMessage += response[key] + "<br/>";
            }
          }
          $(validationDiv).html(errorMessage).removeClass("text-success").addClass("text-danger");
        } else {
          console.log('Redirecionando...');
          window.location.href = '/'; // ou o caminho correto
        }
      },
      error: function (e) {
        let errorMessage;
        for (let key in response) {
          if (key !== "success") {
            errorMessage += response[key] + "<br/>";
          }
        }
        $(validationDiv).html(errorMessage).removeClass("text-success").addClass("text-danger");
      },
    });
  } else {
    return
  }
});
