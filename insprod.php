<?php

include 'conexao.php';  
include 'resize-class.php';


$cd_cat = $_POST['sltcat']; 
$nome_instrumento = $_POST['txtinstrumento'];
$cd_marca = $_POST['sltmarca'];
$noitens = $_POST['txtitens'];
$preco = $_POST['txtpreco'];
$qtde = $_POST['txtqtde'];
$resumo = $_POST['txtresumo'];
$lanc = $_POST['sltlanc'];

$remover1='.';  
$preco = str_replace($remover1, '', $preco); 
$remover2=','; 
$preco = str_replace($remover2, '.', $preco); 

$recebe_foto1 = $_FILES['txtfoto1'];

$destino = "img/";   



preg_match("/\.(jpg|jpeg|png|gif){1}$/i",$recebe_foto1['name'],$extencao1);


$img_nome1 = md5(uniqid(time())).".".$extencao1[1];


try {  
	
	$inserir=$cn->query("INSERT INTO tbl_instrumento(cd_categoria, nm_instrumento, cd_marca, no_itens, vl_preco, qt_estoque, ds_resumo, ds_instrumento, sg_lancamento) VALUES ('$cd_cat', '$nome_instrumento', '$cd_marca', '$noitens', '$preco', '$qtde', '$resumo', '$img_nome1', '$lanc')");
	
    move_uploaded_file($recebe_foto1['tmp_name'], $destino.$img_nome1);             

    header("Location: adm.php");
	
}catch(PDOException $e) {   
	
	
	echo $e->getMessage();
	
}

?>