<?php
    $servidor = "localhost";
    $usuario = "root";
    $senha = "";
    $nomebanco = "projetotcc";

    $conexao = mysqli_connect($servidor, $usuario, $senha, $nomebanco);
    mysqli_set_charset($conexao, "utf8mb4");
    

    /* if(!$conexao){
        die("Falha na conexão".mysqli_connect_error());
    }else{
        echo"Conectado";
    } */

?>