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

     if(empty($_SESSION['Status']) || $_SESSION['Status'] != 1){
        header("Location: index.php");
    }

	include 'conexao.php';	
	include 'nav.php';
	include 'cabecalho.html';

    $consultaCat = $cn->query("select * from tbl_categoria");
    $consultaMarca = $cn->query("select * from tbl_marca");

	?>
	
	
	<div class="container-fluid">
	
		<div class="row">
		
			<div class="col-sm-4 col-sm-offset-4">
				
				<h2>Cadastro de Produto</h2>
				
				<form method="post" action="insprod.php" name="incluiProd" enctype="multipart/form-data">
					
					<div class="form-group">					
					
					<label for="sltcat">Categoria</label>
					
					<select class="form-control" name="sltcat">
					  <option value="">Selecione</option>
                      <?php while($listaCat = $consultaCat->fetch(PDO::FETCH_ASSOC)) { ?>
					  <option value="<?php echo $listaCat['cd_categoria']; ?>"><?php echo $listaCat['ds_categoria']; ?></option>	
                      <?php } ?>				
					</select>
			
					</div>
					
					<div class="form-group">
				
						<label for="txtinstrumento">Nome do Instrumento</label>
						<input name="txtinstrumento" type="text" class="form-control" required id="txtinstrumento">
					</div>
				
				    <div class="form-grouprca">
					<label for="sltmarca">Marca</label>
					
					<select class="form-control" name="sltmarca">
					  <option value="">Selecione</option>
					  <?php while($listaMarca = $consultaMarca->fetch(PDO::FETCH_ASSOC)) { ?>
					  <option value="<?php echo $listaMarca['cd_marca']; ?>"><?php echo $listaMarca['nm_marca']; ?></option>	
                      <?php } ?>
					</select>
					
					</div>					
					
					<div class="form-group">
				
					<label for="txtitens">Itens do Produto</label>
					
					<input type="number" class="form-control" name="txtitens" required id="txtitens">

					</div>
					
					
					<div class="form-group">
				
					<label for="txtpreco">Preço</label>
					
					<input type="text" class="form-control"  name="txtpreco"  required id="txtpreco">

					</div>
					
					
					<div class="form-group">
				
					<label for="txtqtde">Quantidade em Estoque</label>
					
					<input type="number" class="form-control" name="txtqtde" required id="txtqtde">

					</div>
					
					
					<div class="form-group">
				
					<label for="txtresumo">Resumo Instrumento</label>
					
						<textarea rows="5" class="form-control" name="txtresumo"></textarea>
						

					</div>					
					
					
					<div class="form-group">
				
					<label for="txtfoto1">Foto Principal</label>
					
					<input type="file" accept="image/*" class="form-control" name="txtfoto1" required id="txtfoto1">

					</div>
					
					<div class="form-group">
				
					<label for="sltlanc">Lançamento?</label>
					
					<select class="form-control" name="sltlanc">
					  <option value="">Selecione</option>
					  <option value="S">Sim</option>
					  <option value="N">Não</option>					  
					</select>
						

					</div>
					
							
				<button type="submit" class="btn btn-lg btn-default">
					
					<span class="glyphicon glyphicon-pencil"> Cadastrar </span>
					
				</button>
				
				</form>
				
			</div>
		</div>
	</div>
	
	<?php include 'footer.html' ?>
	
	
	
	
</body>
</html>