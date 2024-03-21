<?php

session_start();

include_once('config/conexao.php');
$email = $_POST['email'];
$senha = $_POST['senha'];

$sql = "SELECT * FROM login WHERE email = '$email' AND senha = '$senha'";
$result = mysqli_query($conexao, $sql);


if (mysqli_num_rows($result) < 1) {

    header("Location: login.php?erro=1");
    exit();

    /* echo "Não existe"; */
} else {
    /* echo "existe"; */

    $row = mysqli_fetch_assoc($result);
    if ($row['id_adm'] !== null) {
        // Usuário é um administrador, redirecionar para adm.php
        if ($row['id_adm'] !== null) {
            // Usuário é um administrador, redirecionar para adm.php
            $id_adm = intval($row['id_adm']); // Defina $id_adm aqui
            $_SESSION['user_type'] = 'adm';
            $_SESSION['user_id'] = $id_adm; // Defina o user_id com $id_adm
            $sqlNome = "SELECT nome_completo FROM adm WHERE id = $id_adm";
            $resultNome = mysqli_query($conexao, $sqlNome);
            if ($resultNome && mysqli_num_rows($resultNome) > 0) {
                $cliente_info = mysqli_fetch_assoc($resultNome);
                $nome_completo = $cliente_info['nome_completo'];
                $primeiro_nome = explode(" ", $nome_completo)[0];
                $_SESSION['user_name'] = strtoupper($primeiro_nome);
                header("Location: dashboard.php");
                exit();
            }
        } else {
            echo "deu um errinho";
        }
    } else {
        $id_cliente = intval($row['id_cliente']);
        $sqlNome = "SELECT nome_completo FROM cliente WHERE id = $id_cliente";
        $resultNome = mysqli_query($conexao, $sqlNome);
        // Usuário é um cliente
        if ($resultNome && mysqli_num_rows($resultNome) > 0) {
            $cliente_info = mysqli_fetch_assoc($resultNome);
            $nome_completo = $cliente_info['nome_completo'];
            $primeiro_nome = explode(" ", $nome_completo)[0];
            $_SESSION['user_type'] = 'cliente';
            $_SESSION['user_id'] = $id_cliente;
            $_SESSION['user_name'] = strtoupper($primeiro_nome);
            header("Location: index.php");
            exit();
        } else {
            echo "deu um errinho";
        }
    }
}
