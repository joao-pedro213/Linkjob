<?php
$con;
$banco;
try{

	$banco = new PDO("mysql:host=localhost; dbname=projetopi","root","");
echo "ok" ;
}

catch(PDOException $erro){
	echo "Erro ao conectar ao banco" . $erro -> getMessage();
}

?>