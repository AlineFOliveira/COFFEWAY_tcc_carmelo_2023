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
        <div class="menuAdmArea">
            <p class="titulo">Dashboard</p>
        

            <div class="menuAdm">
                

                <a href="admProdutos.php"><div class="menuAdmCaixa">ProdutoS</div></a>
                <a href="admClientes.php"><div class="menuAdmCaixa">CLIENTES</div></a>
                <a href="admAdministradores.php"><div class="menuAdmCaixa">ADMINISTRADORES</div></a>
                <a href="listarEndereco.php"><div class="menuAdmCaixa">ENDERECO</div></a>
            </div>
        </div>
        
    </section>


</body>

</html>