<?php
session_start();
include_once('../config/conexao.php');

if (isset($_GET['ExcluirEndereco'])) {
    $id_do_Endereco = $_GET['idEndereco'];

    // Consulta SQL para excluir o Endereco com base no ID
    $sql = "DELETE FROM loja WHERE id = $id_do_Endereco";
    $result = mysqli_query($conexao, $sql);

    if ($result) {
        // Redirecionar para a tela de sucesso após a exclusão
        header('Location: ../excluir.php');
        exit();
    } else {
        echo "Erro ao excluir o Endereco.";
    }
}

?>