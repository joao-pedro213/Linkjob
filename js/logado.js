const btnClose = document.querySelector('#close'),
      btnCloseSpan = document.querySelector('.close');

/* fechando o modal */

btnClose.addEventListener('click', closeModal);
btnCloseSpan.addEventListener('click', closeModal);

function closeModal() {

  let getExx = document.querySelectorAll('.help-block');
  let getSuccess = document.querySelector('#success');

  if (getExx != null) {
    $('#myForm').bootstrapValidator("resetForm", true);
    getExx = null;
  }

  if (getSuccess != null) {
    document.querySelector('#success').remove();
    getSuccess = null;
  }

};

/* identifica se ao atualizar a pagina existe algum elemento refente a inserção de cadastro */

window.onload = () => {
  const getSuccess = document.querySelector('#success');

  if (getSuccess != null) {
    let modalElement = document.querySelector('#btnT');
    modalElement.click();
  };
};

/* animando os cards */

$('document').ready(() => {
  $('.card').hover(
    function () {
      $(this).animate({
        marginTop: "-=1%",
      }, 200);
    },

    function () {
      $(this).animate({
        marginTop: "0%"
      }, 200);
    }
  )
});

/* criando as máscaras do formulário de cadastro de serviço */

$("#fixo").mask("(99) 9999-9999");
$("#celular").mask("(99) 99999-9999");
$("#valorServico").mask('000000000000000,00', { reverse: true });

/* validação do formulário de cadastro de serviço */

$(document).ready(function () {
  let validator = $("#myForm").bootstrapValidator({

    fields: {

      nomeServico: {

        message: "Este campo é obrigatório.",
        validators: {
          notEmpty: {
            message: "Este campo é obrigatório."
          },

          stringLength: {
            min: 5,
            max: 50,
            message: "O serviço deve ter entre 5 a 10 caracteres."
          }
        }

      },

      valorServico: {

        message: "Este campo é obrigatório.",
        validators: {
          notEmpty: {
            message: "Este campo é obrigatório."
          }
        }

      },

      email: {

        message: "Este campo é obrigatório.",
        validators: {
          notEmpty: {
            message: "Este campo é obrigatório."
          },

          emailAddress: {
            message: "Endereço de e-mail inválido."
          }
        }

      },

      categoria: {

        message: "Campo obrigatório.",
        validators: {
          notEmpty: {
            message: "Escolha uma categoria."
          }
        }

      },

      estado: {

        message: "Campo obrigatório.",
        validators: {
          notEmpty: {
            message: "Escolha um estado."
          }
        }
      },

      cidade: {
        
        message: "Campo obrigatório.",
        validators: {
          notEmpty: {
            message: "Escolha uma cidade."
          }
        }
      },

      descricao: {

        message: "Campo obrigatório.",
        validators: {
          notEmpty: {
            message: "Digite uma breve descrição do serviço prestado."
          }
        }
      }

    }
  });
});

