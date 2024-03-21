<?php
include_once('../config/conexao.php');







if (isset($_POST['submit'])) {
    
    $cnpj = ($_POST['cnpj']);
    $uf = ($_POST['uf']);
    $rua = $_POST['rua'];
    $tel = ($_POST['tel']);
    $email = ($_POST['email']);
    

    $sql_Endereco = "INSERT INTO loja(cnpj, uf, rua, telefone, email) 
    VALUES ('$cnpj', '$uf', '$rua', '$tel', '$email')";


    $result_Endereco = mysqli_query($conexao, $sql_Endereco);
    
}
