<?php

session_start();
$con;
$novoEmail = $_POST['email'];
$novasen = $_POST['novaSenha'];
$novasen2 = $_POST['novaSenha2'];
$novoNome = $_POST['novoNome'];
$novoSexo = $_POST['novoSexo'];

try {

	$con = new PDO("mysql:host=localhost; dbname=projetopi", "root", "");
} catch (PDOException $erro) {

	echo "erro na conexão com banco de dados";
}

/* se o e-mail de usuário já se encontrar cadastrado no sistema */

$select = $con->query("SELECT * FROM login WHERE email = '$novoEmail'")->fetchAll();

$count = count($select);

if ($count > 0) {

	$_SESSION['user_error'] = true;

	header("Location: logar.php");

	die();
}

if ($con != null) {

	try {

		$sql = $con->prepare("INSERT INTO login(email, senha, nome, sexo, data_criacao) VALUES ('$novoEmail','$novasen','$novoNome','$novoSexo',now())");
		$sql->execute();
		$sql->fetchAll(PDO::FETCH_CLASS);

		$_SESSION['user-registred'] = true;
	} catch (String $erro) {

		$_SESSION['register-result'] = "Erro ao cadastrar Usuário ";
	}

	header("Location: logar.php");
} else {

	$_SESSION['not-registred'] = true;

	echo "Erro ao realizar conexão com banco de dados.";
}
