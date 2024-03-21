<?php
session_start();
include_once('../config/conexao.php');

if (isset($_GET['ExcluirProduto'])) {
    $id_do_produto = $_GET['idProduto'];

    // Consulta SQL para excluir o produto com base no ID
    $sql = "DELETE FROM produto WHERE id = $id_do_produto";
    $result = mysqli_query($conexao, $sql);

    if ($result) {
        // Redirecionar para a tela de sucesso após a exclusão
        header('Location: ../excluir.php');
        exit();
    } else {
        echo "Erro ao excluir o produto.";
    }
}

?>