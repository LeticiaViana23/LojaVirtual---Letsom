<?php

include 'conexao.php';  

$cd=$_GET['id'];  


$pasta = "img/"; 


$consulta = $cn->query("SELECT * FROM tbl_instrumento WHERE cd_instrumento='$cd'");


$exibe = $consulta->fetch(PDO::FETCH_ASSOC);


$excluir = $cn->query("DELETE FROM tbl_instrumento WHERE cd_instrumento='$cd'");

$foto1=$exibe['ds_instrumento']; 

if ($foto1!="") {  
	
	unlink($pasta.$foto1);
	
}

header('location:lista.php');

?>