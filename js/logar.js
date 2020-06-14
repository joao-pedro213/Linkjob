const body = document.querySelector('#body'),
      btnInicio = document.querySelector('#inicio'),
      btnClose = document.querySelector('#close'),
      btnCloseSpan = document.querySelector('.close'),
      btnLogin = document.querySelector('#login');

var getExx = document.querySelector('#error');

btnInicio.addEventListener('click', getIndexPage);
btnClose.addEventListener('click', closeModal);
btnCloseSpan.addEventListener('click', closeModal);
btnLogin.addEventListener('click', inputValidate);

/* identifica se ao atualizar a pagina existe algum elemento refente a erros de cadastro */

window.onload = () => {
  if (getExx != null) {
    let modalElement = document.querySelector('#btnT');

    modalElement.click();
  }
};

function getIndexPage() {
  window.location.href = "index.php";
}

function closeModal() {
  let getExxVal = document.querySelectorAll('.help-block');

  if (getExx != null) {
    document.querySelector('#error').remove();

    getExx = null;
  }

  if (getExxVal != null) {
    $('#myForm').bootstrapValidator("resetForm", true);

    getExxVal = null;
  }
};

function inputValidate() {
  let emailInput = document.querySelector('#usuario').value,
      senhaInput = document.querySelector('#senha').value;

  emailInput == "" && senhaInput == "" ? alert("Digite os dados para fazer login!") : console.log("Passou no teste!");
}

/* criando a validação do formulário de cadastro de usuário */

$(document).ready(function () {

  let validator = $("#myForm").bootstrapValidator({

    fields: {
      email: {

        message: "Este campo é obrigatório.",
        validators: {
          notEmpty: {
            message: "Este campo é obrigatório."
          },
          emailAddress: {
            message: "Endereço de e-mail inválido."
          },
          stringLength: {
            min: 10,
            max: 64,
            message: "O endereço de email deve ter pelo menos 10 caracteres."
          }
        }

      },

      novaSenha: {

        message: "Este campo é obrigatório",
        validators: {
          notEmpty: {
            message: "Este campo é obrigatório."
          },

          stringLength: {
            min: 6,
            message: "A senha precisa ter no mínimo 6 caracteres."
          }
        }

      },

      novaSenha2: {

        message: "Este campo é obrigatório",
        validators: {
          notEmpty: {
            message: "Este campo é obrigatório."
          },
          identical: {
            field: "novaSenha",
            message: "A confirmação precisa ser igual a senha."
          }
        }

      },

      novoNome: {

        message: "Este campo é obrigatório",
        validators: {
          notEmpty: {
            message: "Este campo é obrigatório."
          },
          stringLength: {
            min: 4,
            max: 40,
            message: "O nome precisa ter no mínimo 4 caracteres."
          }
        }

      },

      novoSexo: {

        message: "Este campo é obrigatório",
        validators: {
          notEmpty: {
            message: "Este campo é obrigatório."
          }
        }

      }
    }

  });
});