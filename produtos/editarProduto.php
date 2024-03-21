<?php
session_start();
include_once('../config/conexao.php');


if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    // Recupere os dados enviados pelo formulário
    $idProduto = $_POST['idProduto'];
    $nome = $_POST['nome'];
    $descricao = $_POST['descricao'];
    $tipo = $_POST['tipo'];
    $preco = $_POST['preco'];

    // Processar a imagem, se necessário
    if (!empty($_FILES['file']['name'])) {
        $arquivo = $_FILES['file'];
        $arquivoNovo = explode('.', $arquivo['name']);

        if ($arquivoNovo[sizeof($arquivoNovo) - 1] != 'jpg' && $arquivoNovo[sizeof($arquivoNovo) - 1] != 'png' && $arquivoNovo[sizeof($arquivoNovo) - 1] != 'jpeg') {
            die('Não pode esse arquivo');
        } else {
            move_uploaded_file($arquivo['tmp_name'], '../assets/images/' . $arquivo['name']);
            $imagem_url = $_FILES['file']['name'];

            // Atualizar o registro no banco de dados com a nova imagem
            $sql = "UPDATE produto SET nome = '$nome', descricao = '$descricao', tipo = '$tipo', preco = '$preco', imagem_url = '$imagem_url' WHERE id = $idProduto";
        }
    } else {
        // Atualizar o registro no banco de dados sem alterar a imagem
        $sql = "UPDATE produto SET nome = '$nome', descricao = '$descricao', tipo = '$tipo', preco = '$preco' WHERE id = $idProduto";
    }
    mysqli_set_charset($conexao, "utf8");
    $result = mysqli_query($conexao, $sql);

    if ($result) {
        // Redirecionar para a página de sucesso após a atualização
        header('Location: sucesso.php');
        exit();
    } else {
        echo "Erro ao atualizar o produto.";
    }
} else {
    // Se o formulário não foi enviado por POST, você pode lidar com isso de acordo com a sua lógica.
}
?>
