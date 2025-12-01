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

    if(empty($_SESSION['ID'])){
        header('Location:formlogon.php');
    }
	
	include 'conexao.php';	
	include 'nav.php';
	include 'cabecalho.html';
	
    $cd_Usuario = $_SESSION['ID']; 
    $consultaVenda = $cn->query("SELECT * FROM vw_venda WHERE cd_cliente='$cd_Usuario'");
	?>
	
<div class="container-fluid">
	
<div class="row">
        
        <div class="col-sm-12 text-center" style="margin-top: 15px;">
            <h2>Minhas Compras</h2>			
        </div>

</div>
	
	<div class="row" style="margin-top: 15px;">
		
		<div class="col-sm-1 col-sm-offset-1"><h4> Data<h4> </div>
		<div class="col-sm-2"><h4>Ticket</h4></div>
	</div>		
	
<?php while($exibeVenda = $consultaVenda->fetch(PDO::FETCH_ASSOC)){ ?>
    <div class="row" style="margin-top: 15px;">
		
		<div class="col-sm-1 col-sm-offset-1"><?php echo date('d/m/Y',strtotime($exibeVenda['dt_venda']));?> </div>
		<div class="col-sm-2"><a href="ticket.php?ticket=<?php echo $exibeVenda['no_ticket'];?>"><?php echo $exibeVenda['no_ticket'];?></a></div>

				
	</div>	
    <?php } ?>
	
</div>
	
	<?php
	
	include 'footer.html';
	
	?>
	
</body>
</html>