<?php
include_once('../config/conexao.php');







if (isset($_POST['acao'])) {
    $arquivo = $_FILES['file'];
    $arquivoNovo = explode('.', $arquivo['name']);

    if ($arquivoNovo[sizeof($arquivoNovo) - 1] != 'jpg' && $arquivoNovo[sizeof($arquivoNovo) - 1] != 'png' && $arquivo[sizeof($arquivo) - 1] != 'jpeg') {
        die('Não pode esse arquivo');
    } else {
        echo 'deu certo';
        move_uploaded_file($arquivo['tmp_name'], '../assets/images/' . $arquivo['name']);

        $nome = ($_POST['nome']);
        $descricao = ($_POST['descricao']);
        $tipo = $_POST['tipo'];
        $preco = ($_POST['preco']);
        $imagem_url = $_FILES['file']['name'];
        echo $imagem_url;
        echo $tipo;

        $sql_Produto = "INSERT INTO Produto(nome, descricao, preco, imagem_url, tipo) 
        VALUES ('$nome', '$descricao', '$preco', '$imagem_url', '$tipo')";


        $result_Produto = mysqli_query($conexao, $sql_Produto);
    }
}
