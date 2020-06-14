<?php
session_start();

$con = null;
$usuario = $_POST['usuario'];
$senha = $_POST['senha'];

try {
    $con = new PDO("mysql:host=localhost; dbname=projetopi; charset=utf8", "root", "");
} catch (PDOException $erro) {
    echo "Connection failed: " . $erro->getMessage();
}

if ($con != null) {
    $sql = $con->prepare("SELECT idUsuario, email, senha, nome, sexo, data_criacao FROM login where email='$usuario' and senha = '$senha'");
    $sql->execute();
    $usuarios = $sql->fetchAll(PDO::FETCH_CLASS);

    if ($usuarios != null) {
        $_SESSION['usuario'] = $usuarios[0];
        header("Location: logado.php");
        die();
    }

    if ($usuario == "" && $senha == "") {
        header("Location: logar.php");
        die();
    } else {
        $_SESSION['not-authenticated'] = true;
        header("Location: logar.php");
        die();
    }
}

?>