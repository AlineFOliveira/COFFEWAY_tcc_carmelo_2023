<?php
session_start();
include_once('config/conexao.php');



$id_adm = $_SESSION['user_id'];

$sqlAdmInfo = "SELECT * FROM adm WHERE id= $id_adm LIMIT 1 ";
$resultAdmInfo = mysqli_query($conexao, $sqlAdmInfo);

$row = mysqli_fetch_assoc($resultAdmInfo);
$nome = $row['nome_completo'];
$cpf = $row['cpf'];
$endereco = $row['endereco'];
$telefone = $row['telefone'];



if (isset($_GET['DeletConta'])) {

  // Consulta SQL para excluir o Endereco com base no ID
  $sqlAdm = "DELETE FROM adm WHERE id = $id_adm";
  $sqlLogin = "DELETE FROM login WHERE id_adm = $id_adm";
  $resultLogin = mysqli_query($conexao, $sqlLogin);
  $resultAdm = mysqli_query($conexao, $sqlAdm);
  

  if ($resultAdm && $resultLogin) {
      // Destruir todas as variáveis de sessão
      session_unset();

      // Destruir a sessão
      session_destroy();
      // Redirecionar para a tela de sucesso após a exclusão
      header('Location: excluirTelaCliente.php');
      exit();
  } else {
      echo "Erro ao excluir o Endereco.";
  }
}


?>




<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/styleAdm.css"> <!-- Adicione seu CSS para estilização aqui -->
    <title>Seu Carrinho</title>
</head>

<body>
    <header>
        <div class="container header">
            <div class="logo">
                <a href=""><img class="logo" src="assets/images/logo.png" /></a>
            </div>
            <div class="menu">
                <nav>
                    <ul>
                        <li><a href="dashboard.php">DASHBOARD</a></li>
                        <li><a href="admPedidos.php">PEDIDOS</a></li>
                        <li>
                            <a href="adm.php">
                                <div class="admLogado"><?php echo $_SESSION['user_name']; ?><strong>ADM</strong></div>
                            </a>
                        </li>
                        <li>

                    </ul>
                </nav>
            </div>
    </header>
    <section class="carrinho areaEstilizada">
        <div class="carrinhoArea">

            <div class="clienteCaixa">
                <div class="clienteCaixaTopo">
                    <h3 style="text-transform: uppercase;"><?php echo $nome; ?></h3>

                    <form action="" method="get">
                      <input class="deletConta" type="submit" name="DeletConta" value="Deletar Conta">
                    </form>
                </div>

                <div class="clienteInfoArea">
                  <div class="clienteInfo">
                    <p><strong>Cpf: </strong><?php echo $cpf; ?></p>
                  </div>
                  <div class="clienteInfo">
                    <p><strong>Endereço: </strong><?php echo $endereco; ?></p>
                  </div>
                  <div class="clienteInfo">
                    <p><strong>Telefone: </strong><?php echo $telefone; ?></p>
                  </div>
                </div>
                <div class="clienteBotoesArea">
                    <form action="editarAdmLogin.php" method="get">
                      <input type="hidden" name="id" value="<?php echo $id_adm; ?>">
                      <input class="clienteBotaoEditar" name="admEditar" type="submit" value="Editar">
                    </form>
                    <a class="clienteBotaoLogout" href="logout.php">LOGOUT</a>
                </div>
                
            </div>

            
                
    </section>
    <footer>
        <!-- Inclua seu rodapé aqui, se necessário -->
    </footer>

   
</body>

</html>




</div>
</body>
</html>