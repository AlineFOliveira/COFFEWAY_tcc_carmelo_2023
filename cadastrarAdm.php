<?php
include_once('config/conexao.php');

/*  $sqlLoja = "SELECT id, rua FROM loja WHERE id = ?";
    $resultCliente = mysqli_query($conexao, $sql); */


if (isset($_POST['submit'])) {
    $nome = ($_POST['nome']);
    $email = ($_POST['email']);
    $cpf = ($_POST['cpf']);
    $telefone = ($_POST['tel']);
    $Endereco = ($_POST['Endereco']);
    $senha = ($_POST['senha']);

    $sql_cliente = "INSERT INTO adm(nome_completo, cpf, endereco, telefone, loja_id) 
        VALUES ('$nome', '$cpf', '$Endereco', '$telefone', 1)";

    $result_cliente = mysqli_query($conexao, $sql_cliente);

    if ($result_cliente) {
        // Obtém o ID do cliente recém-cadastrado
        $id = mysqli_insert_id($conexao);

        // Insere o novo login associado ao ID do cliente
        $sql_login = "INSERT INTO login(id_adm, email, senha) 
                          VALUES ('$id', '$email', '$senha')";

        $result_login = mysqli_query($conexao, $sql_login);

        if ($result_login) {
            // Inserções bem-sucedidas
            echo '<script type="text/javascript">alert("Cadastrado com sucesso.");</script>';
            echo '<script type="text/javascript">window.location = "admAdministradores.php";</script>';
        } else {
            // Erro ao inserir dados
            echo "Erro ao cadastrar os dados de login.";
        }
    } else {
        // Erro ao inserir dados
        echo "Erro ao cadastrar os dados de cliente.";
    }

    /*  $sql_login = "INSERT INTO login(email, senha) 
        VALUES ('$email', '$senha')";

        $result_login = mysqli_query($conexao, $sql_login);
        echo mysqli_insert_id($conexao);

        if ($result_cliente && $result_login) {
            // Inserções bem-sucedidas
            echo "Dados cadastrados com sucesso.";
        } else {
            // Erro ao inserir dados
            echo "Erro ao cadastrar os dados.";
        } */
};




?>





<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/styleLogin.css">
    <title>Tela de Cadastrar</title>
</head>

<body>
    <form class="login" action="" method="post">
        <h2>Cadastrar ADM</h2>
        <div class="box-user">
            <input type="text" name="nome" required>
            <label>Nome Completo</label>
        </div>
        <div class="box-user">
            <input type="text" name="email" required>
            <label>Email</label>
        </div>
        <div class="box-user-dividido">
            <div class="box-user direita">
                <input type="number" name="cpf" required>
                <label>Cpf</label>
            </div>
            <div class="box-user esquerda">
                <input type="tel" name="tel" required>
                <label>Telefone</label>
            </div>
        </div>
        <div class="box-user">
            <input type="text" name="Endereco" required>
            <label>Endereço</label>
        </div>
        
        <label>Loja</label>
        <div class="box-user-dividido">
            <div class="box-user direita">
                <input type="password" name="senha" required>
                <label>Senha</label>
            </div>
            <div class="box-user esquerda">
                <input type="password" name="" required>
                <label>Confirmar senha</label>
            </div>
        </div>
        <div class="backButton">
            <a href="admAdministradores.php"><svg width="51" height="45" viewBox="0 0 51 45" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M24.4194 0.927712C25.0134 1.52191 25.3471 2.3277 25.3471 3.16788C25.3471 4.00807 25.0134 4.81386 24.4194 5.40806L10.8168 19.0107H47.5277C48.3681 19.0107 49.174 19.3445 49.7683 19.9387C50.3625 20.533 50.6963 21.3389 50.6963 22.1793C50.6963 23.0196 50.3625 23.8255 49.7683 24.4198C49.174 25.014 48.3681 25.3478 47.5277 25.3478H10.8168L24.4194 38.9504C24.9966 39.548 25.316 40.3484 25.3088 41.1792C25.3015 42.01 24.9683 42.8047 24.3808 43.3922C23.7934 43.9797 22.9986 44.3129 22.1678 44.3201C21.3371 44.3273 20.5367 44.008 19.9391 43.4308L0.927712 24.4194C0.333699 23.8252 0 23.0194 0 22.1793C0 21.3391 0.333699 20.5333 0.927712 19.9391L19.9391 0.927712C20.5333 0.333699 21.3391 0 22.1793 0C23.0194 0 23.8252 0.333699 24.4194 0.927712Z" fill="#F4EDE7" />
                </svg></a>
            <input name="submit" class="btn" type="submit" value="Cadastrar">
        </div>


    </form>
</body>

</html>