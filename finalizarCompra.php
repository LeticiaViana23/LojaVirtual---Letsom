<?php

session_start();  

include 'conexao.php';


$data = date('Y-m-d');  
$ticket = uniqid();  
$cd_user = $_SESSION['ID']; 

foreach ($_SESSION['carrinho'] as $cd => $qnt)  {
    $consulta = $cn->query("SELECT vl_preco FROM tbl_instrumento WHERE cd_instrumento='$cd'");
    $exibe = $consulta->fetch(PDO::FETCH_ASSOC);
    $preco = $exibe['vl_preco'];
    
	
	$inserir = $cn->query("INSERT INTO tbl_venda(no_ticket,cd_cliente,cd_instrumento,qt_intrumento,vl_item,dt_venda)  VALUES
	('$ticket','$cd_user','$cd','$qnt','$preco','$data')");
	
}

include 'fim.php';


?>