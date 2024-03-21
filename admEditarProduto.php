<?php
session_start();
include_once('config/conexao.php');

$idProduto = $_GET['idProduto'];

$sql = "SELECT nome, descricao, preco, imagem_url, tipo FROM produto WHERE id = $idProduto";
mysqli_set_charset($conexao, "utf8");
$result = mysqli_query($conexao, $sql);

// Verifique se a consulta retornou algum resultado
if ($result) {
    // Extrai os dados do produto
    $row = mysqli_fetch_assoc($result);
    $nome = $row['nome'];
    $descricao = $row['descricao'];
    $preco = $row['preco'];
    $tipo = $row['tipo'];
    $imagem_url = $row['imagem_url'];
}
?>




<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/styleAdm.css">
    <title>CoffeWay - Cadastrar Produto</title>
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

    <section class="areaEstilizada">
        <div class="areaCadastroLogin">
            <div class="tituloTopoArea">
                <div class="textoTopo">
                    <a class="setaVoltar" href="listarProduto.php">
                        <svg width="51" height="45" viewBox="0 0 51 45" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M24.4194 0.927712C25.0134 1.52191 25.3471 2.3277 25.3471 3.16788C25.3471 4.00807 25.0134 4.81386 24.4194 5.40806L10.8168 19.0107H47.5277C48.3681 19.0107 49.174 19.3445 49.7683 19.9387C50.3625 20.533 50.6963 21.3389 50.6963 22.1793C50.6963 23.0196 50.3625 23.8255 49.7683 24.4198C49.174 25.014 48.3681 25.3478 47.5277 25.3478H10.8168L24.4194 38.9504C24.9966 39.548 25.316 40.3484 25.3088 41.1792C25.3015 42.01 24.9683 42.8047 24.3808 43.3922C23.7934 43.9797 22.9986 44.3129 22.1678 44.3201C21.3371 44.3273 20.5367 44.008 19.9391 43.4308L0.927712 24.4194C0.333699 23.8252 0 23.0194 0 22.1793C0 21.3391 0.333699 20.5333 0.927712 19.9391L19.9391 0.927712C20.5333 0.333699 21.3391 0 22.1793 0C23.0194 0 23.8252 0.333699 24.4194 0.927712Z" fill="#220404" />
                        </svg>

                    </a>
                    <p class="tituloCadastro">EDITAR PRODUTO</p>
                </div>
            </div>

            <div class="areaCadastroCaixa">


                <form action="produtos/editarProduto.php" class="admCadastros" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="idProduto" value="<?php echo $idProduto; ?>">

                    <!-- Adicione os campos preenchidos com os dados do produto -->
                    <label>Nome do Produto</label>
                    <input type="text" name="nome" required value="<?php echo $nome; ?>">

                    <label>Descrição</label>
                    <textarea name="descricao" id="descProduto" cols="30" rows="10"><?php echo $descricao; ?></textarea>

                    <div class="wrapperEspecial">
                        <!-- Adicione o campo 'tipo' selecionado -->
                        <div class="wrapperEspecialEscolha">
                            <input type="radio" id="comida" name="tipo" value="comida" <?php if ($tipo == 'comida') echo 'checked'; ?>>
                            <label for="comida">Comida</label>
                        </div>
                        <div class="wrapperEspecialEscolha">
                            <input type="radio" id="bebida" name="tipo" value="bebida" <?php if ($tipo == 'bebida') echo 'checked'; ?>>
                            <label for="bebida">Bebida</label><br>
                        </div>
                    </div>

                    <input type="file" id="fileInput" name="file" />
                    <img style="border-radius: 20px; width:100%;" src="assets/images/<?php echo $imagem_url; ?>" alt="Imagem atual do produto">
                    <div class="wrapper">
                        <div class="wrapperInput">
                            <label>Preço</label>
                            <input type="text" name="preco" required value="<?php echo $preco; ?>">
                        </div>
                        <!-- Adicione o campo de imagem com a imagem atual do produto -->
                        
                        <input type="submit" class="btnCadAdm" name="acao" value="Atualizar">
                        
                    </div>
                </form>


            </div>
        </div>
    </section>


</body>

</html>