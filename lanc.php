<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    <style type="text/css">
        .navbar {
            margin-bottom: 0;
        }
    </style>

</head>

<body>
    <?php 
        include 'nav.php'; 
        include 'cabecalho.html';  
        include 'conexao.php';

        $consulta = $cn->query('select cd_instrumento, nm_instrumento,vl_preco,ds_instrumento,qt_estoque from vw_instrumento where sg_lancamento = "S"');
    ?>



    <div class="container-fluid">
        <div class="row">
            <?php while($exibe = $consulta->fetch(PDO::FETCH_ASSOC)){ ?>

                <div class="col-sm-3">
                    <img src="img/<?php echo $exibe['ds_instrumento']; ?>.png" class="img-responsive" style="width:100%" alt="Image">
                    <div><h3><b><?php echo mb_strimwidth ($exibe['nm_instrumento'],0,30,'...'); ?></b></h3></div>
                    <div><h4>R$ <?php echo number_format ($exibe['vl_preco'],2,',','.'); ?></h4></div>

                    <div class="text-center">
                        <a href="detalhes.php?cd=<?php echo $exibe['cd_instrumento']; ?>">
                        <button class="btn btn-ig btn-block btn-info">
                            <span class="glyphicon glyphicon-info-sign"> </span> Detalhes
                        </button>
                        </a>
                    </div>

                     <div class="text-center">
                        
                        <?php if($exibe['qt_estoque'] > 0){ ?>

                        <button class="btn btn-ig btn-block btn-success">
                            <span class="glyphicon glyphicon-shopping-cart"> </span> Comprar 
                        </button>
                        <?php } else { ?>
                            <button class="btn btn-ig btn-block btn-danger" disabled>
                                <span class="glyphicon glyphicon-remove-circle"> </span> Indisponível
                            </button>
                            <?php } ?>

                        <!-- <button class="btn btn-ig btn-block btn-warning">
                            <span class="glyphicon glyphicon-heart"> </span> Favoritar
                        </button>
                        <button class="btn btn-ig btn-block btn-danger">
                            <span class="glyphicon glyphicon-share"> </span> Compartilhar
                        </button> -->
                    </div>
                </div>

            <?php } ?>

        </div> <!-- Fim Row -->
    </div> <!-- Fim Container -->

    <?php include 'footer.html'; ?>
</body>

</html>