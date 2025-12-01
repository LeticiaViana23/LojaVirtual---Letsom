<?php

include 'conexao.php';  
include 'resize-class.php'; 

$cd_instrumento = $_GET['cd_altera']; 


$consulta = $cn->query("SELECT ds_instrumento FROM tbl_instrumento WHERE cd_instrumento='$cd_instrumento'"); 


$exibe = $consulta->fetch(PDO::FETCH_ASSOC);



$categoria = $_POST['sltcat']; 
$instrumento = $_POST['txtinstrumento'];
$marca = $_POST['sltmarca'];
$nitens = $_POST['txtitens'];
$preco = $_POST['txtpreco'];
$resumo = $_POST['txtresumo'];
$qtde = $_POST['txtqtde'];
$lanc = $_POST['sltlanc'];


$remover1='.';  
$preco = str_replace($remover1, '', $preco); 
$remover2=',';
$preco = str_replace($remover2, '.', $preco);

$recebe_foto1 = $_FILES['txtfoto1'];  


$destino = "img/";  


if (!empty($recebe_foto1['name'])) { 

	preg_match("/\.(jpg|jpeg|png|gif){1}$/i",$recebe_foto1['name'],$extencao1); 
	$img_nome1 = md5(uniqid(time())).".".$extencao1[1]; 

	$upload_foto1=1; 

}

else {  
	
	$img_nome1=$exibe['ds_instrumento'];
	$upload_foto1=0;  
	
}
	

try {
	
	$alterar = $cn->query("UPDATE tbl_instrumento SET  
	
	cd_categoria = '$categoria',
	nm_instrumento = '$instrumento',
	cd_marca = '$marca',
	no_itens= '$nitens',
	vl_preco = '$preco',
	qt_estoque = '$qtde', 
	ds_resumo = '$resumo',
	ds_instrumento = '$img_nome1',
	sg_lancamento = '$lanc'	
	
	WHERE cd_instrumento = '$cd_instrumento' 	
	"); 
	
	
	if ($upload_foto1==1) {  
		
		
		move_uploaded_file($recebe_foto1['tmp_name'], $destino.$img_nome1);
		
	}
	
	header('location:adm.php');  
	
} catch(PDOException $e) {  
	
	
	echo $e->getMessage();  
	
}



?>