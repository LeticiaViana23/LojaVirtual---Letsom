<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Minha Loja - Logon de usuário</title>
	
<meta name="viewport" content="width=device-width, initial-scale=1">
	

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	
<script src="jquery.mask.js"></script>

<script>
	
	

$(document).ready(function(){
	
$('#preco').mask('000.000.000.000.000,00', {reverse: true});	
	
});
	
</script>
	
<style>

.navbar{
	margin-bottom: 0;
}
	
	
</style>
	
	
	
	
</head>

<body>
	
<?php
	
	
	session_start();	
	
		if(empty($_SESSION['Status']) || $_SESSION['Status']!=1){
		header('location:index.php');
	}
	
	
	$cd = $_GET['id'];
	$cd2 = $_GET['id2'];
	$cd3 = $_GET['id3'];
	
	
	include 'conexao.php';	
	include 'nav.php';
	include 'cabecalho.html';
	
	
	$consulta = $cn->query("SELECT * FROM tbl_instrumento WHERE cd_instrumento='$cd'");	
	$exibe = $consulta->fetch(PDO::FETCH_ASSOC);
	
	$consultaCat = $cn->query("SELECT cd_categoria, ds_categoria FROM tbl_categoria where cd_categoria='$cd2' union select cd_categoria, ds_categoria FROM tbl_categoria where cd_categoria !='$cd2'");
	
	$consultaMarca = $cn->query("SELECT cd_marca, nm_marca FROM tbl_marca where cd_marca='$cd3' union select cd_marca, nm_marca FROM tbl_marca where cd_marca !='$cd3'");
	
	?>
	
	
	<div class="container-fluid">
	
		<div class="row">
		
			<div class="col-sm-4 col-sm-offset-4">
				
				<h2>Alteração de produto</h2>
				
				<form method="post" action="alterarProduto.php?cd_altera=<?php echo $cd;?>" name="incluiProd" enctype="multipart/form-data">
				
					
				
					<div class="form-group">					

						<label for="sltcat">Categoria</label>

						<select class="form-control" name="sltcat">
							<?php					
								while($exibecat = $consultaCat->fetch(PDO::FETCH_ASSOC)){
							?>
							<option value="<?php echo $exibecat['cd_categoria'];?>"><?php echo $exibecat['ds_categoria'];?></option>;
							<?php }	?>	
						</select>
					</div>
					
					<div class="form-group">
				
						<label for="txtinstrumento">Nome do Instrumento</label>
						<input type="text" name="txtinstrumento" value="<?php echo $exibe['nm_instrumento']; ?>"  class="form-control" required id="txtinstrumento">
					</div>
					
					<div class="form-group">					

						<label for="sltmarca">Marca</label>

						<select class="form-control" name="sltmarca">
							<?php					
								while($exibemarca = $consultaMarca->fetch(PDO::FETCH_ASSOC)){
							?>
							<option value="<?php echo $exibemarca['cd_marca'];?>"><?php echo $exibemarca['nm_marca'];?></option>;
							<?php }	?>	
						</select>
					</div>
		
					
					<div class="form-group">
				
					<label for="txtitens">Quantidade de itens</label>
					
					<input type="number" class="form-control" value="<?php echo $exibe['no_itens']; ?>" name="txtitens" required id="txtitens">

					</div>
					
					<div class="form-group">
				
					<label for="preco">Preço</label>
					
					<input type="text" class="form-control" required name="txtpreco" value="<?php echo $exibe['vl_preco']; ?>" id="preco">

					</div>
					
					<div class="form-group">
				
					<label for="txtqtde">Quantidade em Estoque</label>
					
					<input type="number" class="form-control" name="txtqtde" value="<?php echo $exibe['qt_estoque']; ?>" required id="txtqtde">

					</div>
					
					<div class="form-group">
				
					<label for="txtresumo">Informações Instrumento</label>
					
						<textarea rows="5" class="form-control" name="txtresumo"><?php echo $exibe['ds_resumo']; ?></textarea>
						

					</div>
					
					<div class="form-group">
				
					<label for="txtfoto1">Foto Principal</label>
					
					<input type="file" accept="image/*" class="form-control" name="txtfoto1" id="foto1">

					</div>
					
					<div class="form-group">
						
					<img src="img/<?php echo $exibe['ds_instrumento']; ?>" width="100px" >
						
					</div>
					
					<div class="form-group">
				
					<label for="sltlanc">Lançamento?</label>
					
					<select class="form-control" name="sltlanc">					  				
					
					<option value="S" <?=($exibe['sg_lancamento'] == 'S')?'selected':''?>>Sim</option>	<option value="N" <?=($exibe['sg_lancamento'] == 'N')?'selected':''?>>Não</option>	  
					</select>
						

					</div>
						
					<button type="submit" class="btn btn-lg btn-default">
					
					<span class="glyphicon glyphicon-pencil"> Alterar </span>
					
				</button>
				
				</form>
				
			</div>
		</div>
	</div>
	
	<?php include 'footer.html' ?>
	
</body>
</html>