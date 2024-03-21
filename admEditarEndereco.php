<?php
session_start();
include_once('config/conexao.php');

$idEndereco = $_GET['idEndereco'];

$sql = "SELECT cnpj, uf, rua, telefone, email FROM loja WHERE id = $idEndereco";
$result = mysqli_query($conexao, $sql);

// Verifique se a consulta retornou algum resultado
if ($result) {
    // Extrai os dados do produto
    $row = mysqli_fetch_assoc($result);
    $cnpj = $row['cnpj'];
    $uf = $row['uf'];
    $rua = $row['rua'];
    $telefone = $row['telefone'];
    $email = $row['email'];
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/styleAdm.css">
    <title>CoffeWay - Alterar Endereço</title>
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

        <div class="areaAltEnd">
            <div class="tituloTopoArea">
                <div class="textoTopo">
                    <a class="setaVoltar" href="listarEndereco.php">
                        <svg width="51" height="45" viewBox="0 0 51 45" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M24.4194 0.927712C25.0134 1.52191 25.3471 2.3277 25.3471 3.16788C25.3471 4.00807 25.0134 4.81386 24.4194 5.40806L10.8168 19.0107H47.5277C48.3681 19.0107 49.174 19.3445 49.7683 19.9387C50.3625 20.533 50.6963 21.3389 50.6963 22.1793C50.6963 23.0196 50.3625 23.8255 49.7683 24.4198C49.174 25.014 48.3681 25.3478 47.5277 25.3478H10.8168L24.4194 38.9504C24.9966 39.548 25.316 40.3484 25.3088 41.1792C25.3015 42.01 24.9683 42.8047 24.3808 43.3922C23.7934 43.9797 22.9986 44.3129 22.1678 44.3201C21.3371 44.3273 20.5367 44.008 19.9391 43.4308L0.927712 24.4194C0.333699 23.8252 0 23.0194 0 22.1793C0 21.3391 0.333699 20.5333 0.927712 19.9391L19.9391 0.927712C20.5333 0.333699 21.3391 0 22.1793 0C23.0194 0 23.8252 0.333699 24.4194 0.927712Z" fill="#220404" />
                        </svg>

                    </a>
                    <p class="tituloCadastro">EDITAR ENDEREÇO</p>
                </div>
            </div>
            <div class="areaAltEndCaixa">

                <form action="enderecos/editarEndereco.php" class="endLoja" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="idEndereco" value="<?php echo $idEndereco; ?>">
                    <div class="wrapper">
                        <div class="wrapperInputLonger">
                            <label>CNPJ</label>
                            <input type="text" name="cnpj" value="<?php echo $cnpj; ?>" required>
                        </div>
                        <div class="wrapperInput">
                            <label>Uf</label>
                            <input type="text" name="uf" value="<?php echo $uf; ?>"required>
                        </div>

                    </div>
                    <label>Endereco</label>
                        <input type="text" name="rua" value="<?php echo $rua; ?>" required>
                    <div class="wrapper">
                        <div class="wrapperInputLonger">
                            <label>Email</label>
                            <input type="email" name="email" value="<?php echo $email; ?>" required>
                        </div>
                        <div class="wrapperInput">
                            <label>Telefone</label>
                            <input type="text" name="tel" value="<?php echo $telefone; ?>" required>
                        </div>

                    </div>
                    
                        
                        
                    <input type="submit" class="btnAltAdm" name="submit" value="Concluir">



                </form>
                <!-- <div class="cadlojaImg">
                        <a href="">
                            <svg width="37" height="37" viewBox="0 0 37 37" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M27.3248 0.601846C27.7103 0.216484 28.2331 0 28.7781 0C29.3232 0 29.8459 0.216484 30.2314 0.601846L36.3982 6.76859C36.7835 7.15406 37 7.67681 37 8.22188C37 8.76695 36.7835 9.2897 36.3982 9.67518L17.8979 28.1754C17.5125 28.5609 16.9898 28.7776 16.4446 28.7777H10.2779C9.73273 28.7777 9.20988 28.5611 8.82439 28.1756C8.43889 27.7901 8.22232 27.2673 8.22232 26.7221V20.5554C8.22244 20.0102 8.43908 19.4875 8.82461 19.1021L27.3248 0.601846ZM12.3335 21.4064V24.6665H15.5936L32.0383 8.22188L28.7781 4.96173L12.3335 21.4064ZM0 8.22188C0 7.13153 0.433139 6.08584 1.20413 5.31485C1.97512 4.54386 3.02081 4.11072 4.11116 4.11072H14.3891C14.9342 4.11072 15.4571 4.32729 15.8426 4.71279C16.2281 5.09828 16.4446 5.62113 16.4446 6.1663C16.4446 6.71147 16.2281 7.23432 15.8426 7.61982C15.4571 8.00531 14.9342 8.22188 14.3891 8.22188H4.11116V32.8888H28.7781V22.6109C28.7781 22.0658 28.9947 21.5429 29.3802 21.1574C29.7657 20.7719 30.2885 20.5554 30.8337 20.5554C31.3789 20.5554 31.9017 20.7719 32.2872 21.1574C32.6727 21.5429 32.8893 22.0658 32.8893 22.6109V32.8888C32.8893 33.9792 32.4561 35.0249 31.6851 35.7959C30.9142 36.5669 29.8685 37 28.7781 37H4.11116C3.02081 37 1.97512 36.5669 1.20413 35.7959C0.433139 35.0249 0 33.9792 0 32.8888V8.22188Z" fill="white" />
                            </svg>
                        </a>
                    </div> -->

            </div>
        </div>
    </section>


</body>

</html>