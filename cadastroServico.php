<?php

session_start();

$nome = $_SESSION['usuario']->nome;
$idUsuario = $_SESSION['usuario']->idUsuario ;

$con;
$idServico = $_POST['idServico'];
$categoria = $_POST['categoria'];
$nomeServico = $_POST['nomeServico'];
$valorServico = $_POST['valorServico'];
$estado = $_POST['estado'];
$cidade = $_POST['cidade'];
$endereco = $_POST['endereco'];
$descricao = $_POST['descricao'];
$fixo = $_POST['fixo'];
$celular = $_POST['celular'];
$email = $_POST['email'];

try{
	$con = new PDO("mysql:host=localhost; dbname=projetopi","root","");

}
catch(PDOException $erro){
	echo "erro" ;
}

if($con != null){

try{					  

if(isset($_POST['idServico'])){

$sql = $con->prepare("UPDATE `servicos` SET `tiposervicoId`='$categoria',`nomeServico`='$nomeServico',`valorServico`='$valorServico ',`estado`='$estado',`cidade`='$cidade ',`endereco`='$endereco',`descricao`='$descricao',`emailContato`='$email',`telefoneFixo`='$fixo ',`celular`='$celular' WHERE idServico = $idServico");

$sql->execute();
$sql->fetchAll(PDO::FETCH_CLASS);

}
else{
	$sql = $con->prepare("INSERT INTO servicos(idPrestador ,tiposervicoId, nomePrestador, nomeServico, valorServico, estado, cidade, endereco, descricao, emailContato, telefoneFixo, celular, dataCricacao) 
												VALUES ($idUsuario,'$categoria','$nome','$nomeServico','$valorServico','$estado','$cidade','$endereco','$descricao','$email','$fixo','$celular',now())"); 					  
}
	$sql->execute();
	$sql->fetchAll(PDO::FETCH_CLASS);
	
	$_SESSION['service-success'] = true;
	
	header("Location: logado.php");
	
}

catch(String $erro ){
	
	header("Location: logado.php");

}

}

else{
	
	header("Location: logado.php");

}
