<?php
session_start();
include_once('config/conexao.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['finalizar'])) {
    $id_cliente = $_POST['id_Cliente'];
    $formaPagamento = $_POST['formaPagamento'];
    $totalPrice = $_POST['totalPrice'];

    $sqlAltValor = "UPDATE carrinho SET valor_total = $totalPrice WHERE id_cliente = $id_cliente";
    $resultAltValor = mysqli_query($conexao, $sqlAltValor);

    if (!$resultAltValor) {
        echo "Erro na consulta: " . mysqli_error($conexao);
    } else {
        echo "Valor atualizado com sucesso!";
    }

    $sqlAltPagamento = "UPDATE carrinho SET tipo_pagamento = '$formaPagamento' WHERE id_cliente = $id_cliente";
    $resultAltPagamento = mysqli_query($conexao, $sqlAltPagamento);  //atualiza a forma de pagamento

    if (!$resultAltPagamento) {
        echo "Erro na consulta: " . mysqli_error($conexao);
    } else {
        echo "Pagamento atualizado com sucesso!";
    }

    if ($formaPagamento == 1) {
        header("Location: cartaoDeDebito.php");
        exit(); // Certifique-se de sair após o redirecionamento
    }

    if ($formaPagamento == 2) {
        header("Location: cartaoDeCredito.php");
        exit(); // Certifique-se de sair após o redirecionamento
    }

    // Remova os echos abaixo se não forem necessários
    echo $totalPrice;
    echo $id_cliente;
    echo $formaPagamento;
}
?>
