<?php
session_start();
include_once('../config/conexao.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    

    // Recupere os dados enviados pelo formulário
    $idEndereco = $_POST['idEndereco'];
    $cnpj = $_POST['cnpj'];
    $uf = $_POST['uf'];
    $rua = $_POST['rua'];
    $telefone = $_POST['tel'];
    $email = $_POST['email'];


    $sqlEndereco = "UPDATE loja SET cnpj = '$cnpj', uf = '$uf', rua = '$rua', telefone = '$telefone', email = '$email' WHERE id = $idEndereco";

    $resultEndereco = mysqli_query($conexao, $sqlEndereco);
    if ($resultEndereco) {
        // Redirecionar para a tela de sucesso após a exclusão
        header('Location: ../concluirEndereco.php');
        exit();
    } else {
        echo "<h2>Erro ao excluir o Endereco.<h2>";
    }
} else {
    // Se o formulário não foi enviado por POST, você pode lidar com isso de acordo com a sua lógica.
}
?>
