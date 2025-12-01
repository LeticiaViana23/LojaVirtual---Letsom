<!doctype html>

<html lang="pt-br">
<head>
<meta charset="utf-8">
<title>Minha Loja</title>
	
	<meta name="viewport" content="width=device-width, initial-scale=1">
	
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	
	
	<style>
	
	.navbar{
		margin-bottom: 0;
	}
	
	
	</style>
	
	
	
</head>

<body>	
	
	<?php
	
	session_start();
	
	include 'conexao.php';	
	include 'nav.php';
	include 'cabecalho.html';

	if(!empty($_GET['cd'])){

	$cd_instrumento = $_GET['cd'];

	$consulta = $cn->query("select * from vw_instrumento where cd_instrumento = '$cd_instrumento'");
	$exibe = $consulta->fetch(PDO::FETCH_ASSOC);
	} else {
		header("Location: index.php");
	}

	?>
	
<div class="container-fluid">
	
	
	
	<div class="row">
		
		 <div class="col-sm-4 col-sm-offset-1">
			 
			 <h1>Detalhes do Produto</h1>
			 
			 <img src="img/<?php echo $exibe['ds_instrumento']; ?>" class="img-responsive" style="width:100%;">
		
			
		</div>
		
				
 		 <div class="col-sm-7"><h1><?php echo $exibe['nm_instrumento']; ?></h1>
		
		<p><?php echo $exibe['ds_resumo']; ?></p>
		
		<p><b>Quantidade de itens: </b><?php echo $exibe['no_itens']; ?></p>

		<p><b>Categoria: </b><?php echo $exibe['ds_categoria']; ?></p>
		
		<p><b>Preço: </b>R$ <?php echo number_format ($exibe['vl_preco'],2,',','.'); ?></p>
			 
			 
		<a href="carrinho.php?cd=<?php echo $exibe['cd_instrumento']; ?>">
            <button class="btn btn-lg btn-success">Comprar</button>
        </a>
				
		</div>		
	

	
</div>
	
	<?php
	
	include 'footer.html';
	
	?>
	
</body>
</html>