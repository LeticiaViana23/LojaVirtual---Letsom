<?php 

    $servidor = "Localhost";
    $usuario = "projeto";
    $senha = "leticia123";  
    $banco = "db_lojavirtual";  

    $cn =  new PDO("mysql:host=$servidor;dbname=$banco", $usuario, $senha);
?>