# Documentação do sistema web LinkJob

Functions utilizadas no JavaScript:

###### inputValidate()

Esta função é responsável por realizar uma primeira validação dos campos de input do formulário de login antes de mandar os dados para o backend.

```
function inputValidate() {
  let emailInput = document.querySelector('#usuario').value,
      senhaInput = document.querySelector('#senha').value;

  emailInput == "" && senhaInput == "" ? alert("Digite os dados para fazer login!") : console.log("Passou no teste!");
}
```

###### closeModal()

É uma função responsável por reiniciar as mensagens de sucesso e erro ao fechar um modal de cadastro de usuário ou serviço.

``` 
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
```

###### getIndexPage()

Esta função é responsável por redirecionar o usuário para o index ao clicar no botão "Home".

```
function getIndexPage() {
  window.location.href = "index.php";
}
```