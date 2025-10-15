<?php 

include 'conexao.php';

$nome = $_POST['txtnome'];
$senha = $_POST['txtsenha'];
$email = $_POST['txtemail'];
$end = $_POST['txtendereco'];
$cidade = $_POST['txtcidade'];
$cep = $_POST['txtcep'];

// echo $nome.'<br>';
// echo $senha.'<br>'; 
// echo $email.'<br>';
// echo $end.'<br>';
// echo $cidade.'<br>';
// echo $cep.'<br>';


$consulta = $cn->query("select ds_email from tbl_usuario where ds_email = '$email' ");
$exibe = $consulta->fetch(PDO::FETCH_ASSOC);

if ($consulta->rowCount() == 1) {
    header('Location:erro1.php');
} else {
    $incluir = $cn->query("insert into tbl_usuario (nm_usuario, ds_senha, ds_email, ds_endereco, ds_cidade, no_cep, ds_status) values ('$nome', '$senha', '$email', '$end', '$cidade', '$cep', '0') ");
    header('Location:ok.php');
}

?>