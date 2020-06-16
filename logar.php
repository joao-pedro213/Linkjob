<?php
session_start();
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge"/>

    <title>Linkjob Login</title>

    <link rel="stylesheet" type="text/css" href="css/stylelogin.css">
    <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="//cdnjs.cloudflare.com/ajax/libs/jquery.bootstrapvalidator/0.5.2/css/bootstrapValidator.min.css" />
    <link rel="stylesheet" type="text/css" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">

    <style>
        small.help-block {
            color: #F44336 !important;
        }
    </style>
</head>

<body>

    <div class="conteudo">

        <div class="modal fade" id="janela">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Vamos lá...</h5>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>

                    <div class="modal-body">
                        <h5>Informe os dados abaixo para se cadastrar!</h5><br><br>

                        <!-- dados cadastrados com sucesso! -->

                        <?php

                        if (isset($_SESSION['user-registred'])) {

                        ?>

                            <script>
                                setTimeout(() => {
                                    alert('Usuário cadastrado com sucesso!');
                                }, 100);
                            </script>

                        <?php

                        }

                        unset($_SESSION['user-registred']);

                        ?>

                        <!-- tratamento de erros -->

                        <?php

                        if (isset($_SESSION['user_error'])) {

                        ?>

                            <div class="alert alert-danger" id="error" role="alert" align="center">
                                Este endereço de e-mail já se encontra cadastrado!
                            </div>

                        <?php

                        }

                        unset($_SESSION['user_error']);

                        ?>


                        <form action="cadastro.php" method="POST" id="myForm">

                            <div class="form-group">
                                <label for="email">Digite o e-mail</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                            <span class="fa fa-envelope"></span>
                                        </span>
                                    </div>
                                    <input class="form-control" id="email" name="email" type="email" maxlength="64" placeholder="Seu e-mail">
                                </div>
                            </div>

                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="senha">Digite a senha</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">
                                                <span class="fa fa-lock"></span>
                                            </span>
                                        </div>
                                        <input class="form-control" id="novaSenha" name="novaSenha" type="password" maxlength="64" placeholder="Sua senha">
                                    </div>
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="senha">Digite a senha novamente</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">
                                                <span class="fa fa-lock"></span>
                                            </span>
                                        </div>
                                        <input class="form-control" id="novaSenha2" name="novaSenha2" type="password" maxlength="64" placeholder="Confirme sua senha">
                                    </div>
                                </div><br>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-7">
                                    <label for="text">Nome</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">
                                                <span class="fa fa-user"></span>
                                            </span>
                                        </div>
                                        <input class="form-control" id="novoNome" name="novoNome" type="text" placeholder="Seu nome">
                                    </div>
                                </div>

                                <div class="form-group col">
                                    <label for="sexo">Sexo</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">
                                                <span class="fa fa-venus-mars"></span>
                                            </span>
                                        </div>
                                        <select class="form-control" id="sexo" id="novoSexo" name="novoSexo">
                                            <option value="" data-default disabled selected></option>
                                            <option value="M">Masculino</option>
                                            <option value="F">Feminino</option>
                                            <option>Outros</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="modal-footer">
                                <button type="submit" class="btn btn-success" id="confirm">Confirmar</button>
                                <button type="button" class="btn btn-outline-secondary" id="close" data-dismiss="modal">Fechar</button>
                            </div>

                        </form>

                    </div>

                </div>
            </div>
        </div>

        <div class="primeira-coluna">
            <button id="inicio" class="btn btn-primary">Home</button>
        </div>

        <div class="segunda-coluna">

            <div class="social-midia alinhar">
                <h2 class="title title-second">Login de Usuario</h2>
            </div><br>

            <?php

            if (isset($_SESSION['not-authenticated'])) {

            ?>

                <div class="alert alert-danger" role="alert" align="center" style="width: 345.05px">
                    Usuário ou senha inválidos!
                </div>

            <?php
            }

            unset($_SESSION['not-authenticated']);

            ?>

            <form class="formulario" method="POST" action="login.php">

                <div class="form-group">
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text">
                                <span class="fa fa-envelope"></span>
                            </span>
                        </div>
                        <input class="form-control" type="email" placeholder="Seu e-mail" name="usuario" id="usuario">
                    </div>
                </div>

                <div class="form-group">
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text">
                                <span class="fa fa-lock"></span>
                            </span>
                        </div>
                        <input class="form-control" type="password" placeholder="Sua senha" name="senha" id="senha">
                    </div>
                </div>
                
                <button class="btn btn-second" id="login" type="submit">Entrar</button>
            </form>
        </div>

        <div class="terceira-coluna">
            
            <div class="content-terceira">
                <h2 class="title title-primary">Link Job</h2>
                <h2 class="title title-primary">Olá novamente!</h2>
                <p class="decricao decricao-primary">Para continuar entre com seus dados</p>
                <p class="decricao decricao-primary">se é sua primeira vez:</p>

                <button id="btnT" class="btn btn-outline-light" data-toggle="modal" data-target="#janela">Cadastre-se</button>
            </div>

        </div>
    </div>

    <script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    <script type="text/javascript" src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-validator/0.5.3/js/bootstrapValidator.min.js"></script>
    <script type="text/javascript" src="js/logar.js"></script>

</body>

</html>