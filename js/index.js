const btnLogin = document.querySelector('#login'),
      body = document.querySelector('#body'),
      btnReg = document.querySelector('#reg');

btnLogin.addEventListener('click', () => {
  window.location.href = "logar.php"
});

btnReg.addEventListener('click', () => {
  window.location.href = "logar.php"

  let modalElement = document.querySelector('#btnT');

  modalElement.click();
})

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