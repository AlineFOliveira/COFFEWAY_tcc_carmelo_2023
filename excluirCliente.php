<?php
session_start();
include_once('config/conexao.php');

if (isset($_GET['ExcluirEndereco'])) {
    $id = $_GET['id'];

    // Consulta SQL para excluir o Endereco com base no ID
    $sqlDeletPedido = $sqlCliente = "DELETE FROM pedido WHERE id_cliente = $id";
    $resultDeletPedido = mysqli_query($conexao, $sqlDeletPedido);
  
    $sqlDeletCarrinho = $sqlCliente = "DELETE FROM carrinho WHERE id_cliente = $id";
    $resultDeletCarrinho = mysqli_query($conexao, $sqlDeletCarrinho);
  
    // Consulta SQL para excluir o Endereco com base no ID

    $sqlCliente = "DELETE FROM cliente WHERE id = $id";
    $sqlLogin = "DELETE FROM login WHERE id_cliente = $id";
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