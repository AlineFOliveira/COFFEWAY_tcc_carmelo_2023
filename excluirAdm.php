<?php
session_start();
include_once('config/conexao.php');

if (isset($_GET['delet'])) {
    $id = $_GET['id'];

    // Consulta SQL para excluir o Endereco com base no ID
    $sqlCliente = "DELETE FROM adm WHERE id = $id";
    $sqlLogin = "DELETE FROM login WHERE id_adm = $id";
    $resultLogin = mysqli_query($conexao, $sqlLogin);
    $resultCliente = mysqli_query($conexao, $sqlCliente);
    

    if ($resultCliente && $resultLogin) {
        // Redirecionar para a tela de sucesso após a exclusão
        header('Location: excluir.php');
        exit();
    } else {
        echo "Erro ao excluir o Endereco.";
    }
}

?>