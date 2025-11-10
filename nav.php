<nav class="navbar navbar-light" style="background-color: #e3f2fd;">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#"><img src="./img/logo.png" alt="Logo"></a>
    </div>
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li><a href="index.php">Home<span class="sr-only">(current)</span></a></li>
        <li><a href="lanc.php">Lançamentos</a></li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Categorias<span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="categoria.php?cat=Violão">Violão</a></li>
            <li><a href="categoria.php?cat=Guitarras">Guitarra</a></li>
            <li><a href="categoria.php?cat=Baterias">Baterias</a></li>
            <li><a href="categoria.php?cat=Sopro">Sopro</a></li>
            <li><a href="categoria.php?cat=Microfone">Microfone</a></li>
          </ul>
        </li>
      </ul>
      <form class="navbar-form navbar-left" role="search" name=frmpesquisa method="get" action="busca.php">
        <div class="form-group">
          <input type="text" class="form-control" placeholder="Buscar" name="txtBuscar">
        </div>
        <button type="submit" class="btn btn-default">Pesquisar</button>
      </form>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="#">Contato</a></li>

        <?php if(empty($_SESSION['ID'])){ ?>

        <li><a href="formlogon.php"><span class="glyphicon glyphicon-log-in"> Login</a></li>

        <?php } else { 

          if($_SESSION['Status'] == 0) {
          $consulta_usuario = $cn->query("SELECT nm_usuario FROM tbl_usuario WHERE cd_usuario = " . $_SESSION['ID']);
          $exibe_usuario = $consulta_usuario->fetch(PDO::FETCH_ASSOC); 
        ?>
        <li><a href="#"><span class="glyphicon glyphicon-user"> <?php echo $exibe_usuario['nm_usuario']; ?></a></li>
        <li><a href="sair.php"><span class="glyphicon glyphicon-log-out"> Logoff</a></li>

        <?php } else { ?>
                <li><a href="adm.php"><button class="btn btn-ig btn-block btn-danger">Administrador</button></a></li>
                <li><a href="sair.php"><span class="glyphicon glyphicon-log-out"> Logoff</a></li>

        <?php } }?>

      </ul>
    </div>
  </div>
</nav>