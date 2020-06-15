<!DOCTYPE html>

<?php
header("content-type: text/html;charset=utf-8");
?>

<html lang="pt-br">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />

    <title>LinkJob - Buscar Serviço</title>

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:400,500&display=swap" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css" />
    <link rel="stylesheet" href="css/style.css" />
    <link rel="stylesheet" href="css/servico.css" />

    <style>
        .dataTables_filter {
            display: none;
        }

        fieldset {
            border: 1.5px solid #dee2e6;
            border-radius: 8px;
            max-width: auto;
        }

        body {
            font-size: 1rem;
        }
    </style>
</head>

<body>

    <?php
    session_start();
    if (isset($_SESSION['usuario'])) {
        $usuario = $_SESSION['usuario'];
    }
    ?>

    <header>

        <nav class="navbar navbar-expand-sm navbar-dark">

            <a class="navbar-brand" href="index.php">LinkJob</a>

            <button class="navbar-toggler" data-toggle="collapse" data-target="#navbarSupportedContent">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="navbar-collapse collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">

                    <?php
                    if (!isset($_SESSION["usuario"])) {
                    ?>

                        <!-- o usuário não está logado -->

                        <li class="new-item">
                            <a class="nav-link" href="index.php">Página inicial</a>
                        </li>

                        <li class="new-item">
                            <a class="nav-link" href="index.php#two" data-page="template-one">Sobre o LinkJob</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="index.php#three" data-page="template-two">Como usar</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link active" href="buscarServico.php">Buscar Serviço</a>
                        </li>

                </ul>

                <a class="btn btn-outline-light my-2 my-sm-0" href="logar.php" id="login">Entrar</a>

            <?php
                    } else {
                        $nome = $_SESSION['usuario']->nome;
                        $email = $_SESSION['usuario']->email;
                        $sexo = $_SESSION['usuario']->sexo;
                        $wcm = "Bem vindo(a)";
                        $pos = strpos($nome, " ");

                        if ($pos > 0) {
                            $nomeReduzido = substr($nome, 0, $pos);
                        } else {
                            $nomeReduzido = $nome;
                        }

                        switch ($sexo) {
                            case "M":
                                $wcm = "Bem vindo";
                                break;

                            case "F":
                                $wcm = "Bem vinda";
                                break;

                            default:
                                $wcm;
                        }
            ?>

                <!-- o usuário está logado -->

                <li class="new-item">
                    <a class="nav-link" href="logado.php">Página inicial</a>
                </li>

                <li class="new-item">
                    <a class="nav-link" href="logado.php#two" data-page="template-one">Sobre o LinkJob</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="logado.php#three" data-page="template-two">Como usar</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link active" href="buscarServico.php">Buscar Serviço</a>
                </li>

                </ul>

                <ul class="navbar-nav ml-auto my-2 my-sm-0">

                    <li class="nav-item dropdown">

                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <?php echo "$wcm, $nomeReduzido"; ?>
                        </a>

                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="#">Minha conta</a>
                            <a class="dropdown-item" href="servicos.html">Meus serviços</a>
                        </div>

                    </li>

                    <li class="nav-item">

                        <button type="button" class="btn btn-outline-light btn-circle" onclick='if (window.confirm("Você deseja realmente sair?")) { window.location.href = "index.php?sair=true";  };' title="Sair" style="border-radius: 35px;">
                            <i class="fas fa-power-off"></i>
                        </button>

                    </li>

                </ul>

            <?php
                    }
            ?>

            </div>
        </nav>
    </header>



    <div class="container mb-3 mt-3">

        <fieldset style="padding: 30px ">

            <legend style="width: auto;">Pesquisar por</legend>

            <div class="row">

                <div class="col-md-3">

                    <label>Categoria</label>
                    <input type="text" class="form-control" id="search-by-category" placeholder="Pesquisar...">

                </div>

                <div class="col-md-4">

                    <label>Serviço</label>
                    <input type="text" class="form-control" id="search-by-service" placeholder="Pesquisar...">

                </div>

                <div class="col-md-2">

                    <label>Estado</label>
                    <input type="text" class="form-control" id="search-by-state" placeholder="Pesquisar...">

                </div>

                <div class="col-md-3">

                    <label>Cidade</label>
                    <input type="text" class="form-control" id="search-by-city" placeholder="Pesquisar...">

                </div>

        </fieldset>

        <br>

        <table class="table table-striped table-bordered" style="width:100%;" id="mydatatable">

            <thead>
                <tr>
                    <th>Nome Prestador</th>
                    <th>Categoria</th>
                    <th>Serviço Prestado</th>
                    <th>Estado</th>
                    <th>Cidade</th>
                    <th>Preço</th>
                    <th>Descrição</th>
                </tr>
            </thead>

            <tbody>

                <?php

                include('banco.php');

                $sql = "SELECT ts.nomeTipo, s.* FROM servicos s inner join tiposervico ts on ts.idTipo = tiposervicoId ";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {

                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo       "<td>" . $row["nomePrestador"] . "</td>
                        <td>" . $row["nomeTipo"] . "</td>
                        <td>" . $row["nomeServico"] . "</td>
                        <td>" . $row["estado"] . "</td>
                        <td>" . $row["cidade"] . "</td>
                        <td>" . $row["valorServico"] . "</td>
                        <td class='text-center'><button class='btn btn-success btn-sm' data-toggle='modal' data-target='#verMais" . $row["idServico"] . "'>Ver Mais</button>              
                    </td>
                 </tr>";
                    }
                }
                ?>

            </tbody>

        </table>

        <?php

        include('banco.php');

        $sql = "SELECT ts.nomeTipo, s.* FROM servicos s inner join tiposervico ts on ts.idTipo = tiposervicoId ";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {

            while ($row = $result->fetch_assoc()) {

                $email = "<a href='logar.php'>Entre</a> para ter acesso!";
                $wap = "<a href='logar.php'>Entre</a> para ter acesso!";
                $fixo = "<a href='logar.php'>Entre</a> para ter acesso!";

                if (isset($usuario)) {

                    $email = $row["emailContato"];
                    $wap = $row["celular"];
                    $fixo = $row["telefoneFixo"];

                    if ($fixo == "") {
                        $fixo = "Telefone para contato não informado.";
                    };
                    
                    if ($wap == "") {
                        $wap = "Celular para contato não informado.";
                    };
                }
                echo
                    "
                <div class='modal fade' id='verMais" . $row["idServico"] . "'> 
                  <div class='modal-dialog modal-dialog-centered'>
                      <div class='modal-content'>
                          <div class='modal-header'>
                              <h5 class='modal-title'>Informações</h5>
                              <button type='button' class='close' data-dismiss='modal'>&times;</button>
                          </div> 
                      <div class='modal-body'>
                         
                      <label><b>Prestador</b></label>

                          <div class='row'>
                            
                            <div class='col-md-2' style='display: flex;'> 
                                <i class='fa fa-user-tie' id='user-icon'
                                style='  padding: 5px;
                                border: 1.5px solid #dee2e6;              
                                border-radius: 8px;'></i>
                            </div>

                            <div class='col-md-8 ml-5'
                            style='  padding: 5px;
                            border: 1.5px solid #dee2e6;              
                            border-radius: 8px;'> 
                                
                                <label><b>Nome:</b> </label> " . $row["nomePrestador"] . " <br>
                                <label><b>Categoria:</b> </label> " . $row["nomeTipo"] . " <br>
                                <label><b>Categoria:</b> </label> " . $row["nomeServico"] . " <br>
                            </div>

                          </div><br>
                          
                            <label><b>Dados de contato</b></label>
                            
                            <div class='row-md-10'
                            style='  padding: 5px;
                                border: 1.5px solid #dee2e6;              
                                border-radius: 8px;'> 
                                
                                
                                <label> <b>Telefone:</b> </label> " . $fixo . " <br>
                                <label> <b>WhatsApp:</b> </label> " . $wap . "<br>
                                <label> <b>E-mail:</b> </label> " . $email . "

                            </div><br>
                         
                          
                          <label><b>Descrição do Serviço</b> </label> 
                          <div class='row-md-10'
                          style='  padding: 5px;
                          border: 1.5px solid #dee2e6;              
                          border-radius: 8px;'>"

                        . $row["descricao"] . " </div><br>
                          

                          <label style='color: green;'><b>Preço:</b> </label> R$" . $row["valorServico"] . "
                      </div> 
                      <div class='modal-footer'>
                          <button type='button' class='btn btn-outline-secondary' data-dismiss='modal'>Ok</button>
                      </div>
                      </div>
                  </div> 
              </div> ";
            }
        } else {

            echo "0 results";
        }

        $conn->close();

        ?>

    </div>

    <?php
    if (!isset($_SESSION["usuario"])) {
    ?>

        <!-- o usuário não está logado -->

        <footer class="page-footer font-small unique-color-dark pt-4">

            <div class="container">

                <ul class="list-unstyled list-inline text-center py-2">


                    <li class="list-inline-item">
                        <p style="color: #ffffff">Para dúvidas, críticas e sugestões envie um e-mail para: linkjob_team@hotmail.com</p>
                    </li><br>

                    <li class="list-inline-item">
                        <h5 class="mb-1" style="color: #ffffff">Cadastre-se gratuitamente clicando
                            <a id="reg" href="logar.php" style="color: #ffffff; text-decoration: underline;">aqui!</a></h5>
                    </li>

                </ul>

            </div>

            <div class="footer-copyright text-center py-3" style="color: #ffffff">© 2020 Copyright:
                <a href="index.php" style="color: #ffffff"> linkjob.com</a>
            </div>
        </footer>

    <?php
    } else {
    ?>

        <!-- o usuário está logado -->

        <footer class="page-footer font-small unique-color-dark pt-4">

            <div class="container">

                <ul class="list-unstyled list-inline text-center py-2">


                    <li class="list-inline-item">
                        <p style="color: #ffffff">Para dúvidas, críticas e sugestões envie um e-mail para: linkjob_team@hotmail.com</p>
                    </li><br>

                    <li class="list-inline-item">
                        <h5 class="mb-1" style="color: #ffffff">Com &#129505;, equipe do LinkJob</h5>
                    </li>

                </ul>

            </div>

            <div class="footer-copyright text-center py-3" style="color: #ffffff">© 2020 Copyright:
                <a href="index.php" style="color: #ffffff"> linkjob.com</a>
            </div>
        </footer>

    <?php
    }
    ?>

    <script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script type="text/javascript" src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
    <script type="text/javascript" src="js/buscarServico.js"></script>
</body>

</html>