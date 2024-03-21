<?php
session_start();
include_once('config/conexao.php');

$id = $_GET['id'];

$sql = "SELECT nome_completo, cpf, endereco, telefone FROM adm WHERE id = $id";
$resultAdm = mysqli_query($conexao, $sql);

$sqlLogin = "SELECT email, senha FROM login WHERE id_adm = $id";
$resultAdmLogin = mysqli_query($conexao, $sqlLogin);

if ($resultAdm && $resultAdmLogin) {
    $row = mysqli_fetch_assoc($resultAdm);
    $rowLogin = mysqli_fetch_assoc($resultAdmLogin);

    $nome = $row['nome_completo'];
    $cpf = $row['cpf'];
    $endereco = $row['endereco'];
    $telefone = $row['telefone'];
    $email = $rowLogin['email'];
    $senha = $rowLogin['senha'];
} else {
    echo "Deu erro";
}

if (isset($_POST['submit'])) {
    $id = $_POST['id'];
    $nomeNovo = $_POST['nome'];
    $emailNovo = $_POST['email'];
    $cpfNovo = $_POST['cpf'];
    $telefoneNovo = $_POST['tel'];
    $enderecoNovo = $_POST['endereco'];
    $senhaNova = $_POST['senha'];
    $confirmarSenha = $_POST['confirmar_senha'];

    // Verifica se as senhas são iguais
    if ($senhaNova !== $confirmarSenha) {
        echo '<script type="text/javascript">alert("As senhas não coincidem.");</script>';
    } else {
        $sqlUpdateAdm = "UPDATE adm SET nome_completo = '$nomeNovo', cpf = '$cpfNovo', endereco = '$enderecoNovo', telefone = '$telefoneNovo' WHERE id = $id";
        $resultUpdateAdm = mysqli_query($conexao, $sqlUpdateAdm);

        $sqlUpdateLogin = "UPDATE login SET email = '$emailNovo'";

        if (!empty($senhaNova)) {
            // Se a nova senha não estiver vazia, atualize-a
            $sqlUpdateLogin .= ", senha = '$senhaNova'";
        }

        $sqlUpdateLogin .= " WHERE id_adm = $id";

        $resultUpdateLogin = mysqli_query($conexao, $sqlUpdateLogin);

        if ($resultUpdateAdm && $resultUpdateLogin) {
            echo '<script type="text/javascript">alert("Editado com sucesso.");</script>';
            echo '<script type="text/javascript">window.location = "listarAdm.php";</script>'; // Redirecionar para a página de listagem de administradores após a atualização
        } else {
            echo "Erro ao atualizar os dados.";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/styleLogin.css">
    <title>Editar Adm</title>
</head>

<body>
    <form action="" class="login" method="post">
        <input type="hidden" name="id" value="<?php echo $id; ?>">
        <h2>Editar Adm</h2>
        <div class="box-user">
            <input type="text" name="nome" value="<?php echo $nome; ?>" required>
            <label>Nome Completo</label>
        </div>
        <div class="box-user">
            <input type="text" name="email" value="<?php echo $email; ?>" required>
            <label>Email</label>
        </div>
        <div class="box-user-dividido">
            <div class="box-user direita">
                <input type="number" name="cpf" value="<?php echo $cpf; ?>" required>
                <label>Cpf</label>
            </div>
            <div class="box-user esquerda">
                <input type="tel" name="tel" value="<?php echo $telefone; ?>" required>
                <label>Telefone</label>
            </div>
        </div>
        <div class="box-user">
            <input type="text" name="endereco" value="<?php echo $endereco; ?>" required>
            <label>Endereço</label>
        </div>
        <div class="box-user-dividido">
            <div class="box-user direita">
                <input type="password" name="senha" value="<?php echo $senha; ?>" required>
                <label>Nova Senha</label>
            </div>
            <div class="box-user esquerda">
                <input type="password" name="confirmar_senha" required>
                <label>Confirmar senha</label>
            </div>
        </div>
        <div class="backButton">
            <a href="listarAdm.php"><svg width="51" height="45" viewBox="0 0 51 45" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M24.4194 0.927712C25.0134 1.52191 25.3471 2.3277 25.3471 3.16788C25.3471 4.00807 25.0134 4.81386 24.4194 5.40806L10.8168 19.0107H47.5277C48.3681 19.0107 49.174 19.3445 49.7683 19.9387C50.3625 20.533 50.6963 21.3389 50.6963 22.1793C50.6963 23.0196 50.3625 23.8255 49.7683 24.4198C49.174 25.014 48.3681 25.3478 47.5277 25.3478H10.8168L24.4194 38.9504C24.9966 39.548 25.316 40.3484 25.3088 41.1792C25.3015 42.01 24.9683 42.8047 24.3808 43.3922C23.7934 43.9797 22.9986 44.3129 22.1678 44.3201C21.3371 44.3273 20.5367 44.008 19.9391 43.4308L0.927712 24.4194C0.333699 23.8252 0 23.0194 0 22.1793C0 21.3391 0.333699 20.5333 0.927712 19.9391L19.9391 0.927712C20.5333 0.333699 21.3391 0 22.1793 0C23.0194 0 23.8252 0.333699 24.4194 0.927712Z" fill="#F4EDE7" />
                </svg></a>
            <input type="submit" name="submit" class="btn" value="Editar">
        </div>
    </form>
</body>

</html>