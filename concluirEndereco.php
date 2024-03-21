<?php
session_start();
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/styleAdm.css">
    <title>CoffeWay - Selecionar Cardápio</title>
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
                        <li><a href="#sobreNos">PEDIDOS</a></li>
                        <li>
                            <a href="cliente.php">
                                <div class="admLogado"><?php echo $_SESSION['user_name']; ?><strong>ADM</strong></div>
                            </a>
                        </li>
                        <li>

                    </ul>
                </nav>
            </div>
    </header>

    <section class="areaEstilizada">
        <div class="concluirEnderecoArea">
            <div class="concluirEndereco">
            ENDEREÇO ALTERADO
            </div>

        </div>
    </section>


</body>

</html>