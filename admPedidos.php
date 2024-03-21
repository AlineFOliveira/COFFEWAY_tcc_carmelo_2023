<?php
session_start();

include_once('config/conexao.php');

// Consulta SQL para buscar informações dos Enderecos
$sqlBuscarPedAguardando = "SELECT * FROM carrinho WHERE situacao = 'Em Andamento'";
$resultPedAguardando = mysqli_query($conexao, $sqlBuscarPedAguardando);


if(isset ($_POST['finPedido'])){
    $idCliente = $_POST['idCliente'];

    $sqlFinPedido = "UPDATE carrinho SET situacao = 'Finalizado' WHERE id_cliente = $idCliente AND situacao = 'Em Andamento'";

    $resultFinPedido = mysqli_query($conexao, $sqlFinPedido);
}

/**$sqlDeletPedido = "DELETE FROM pedido WHERE id_cliente = $id_cliente";
    $resultDeletPedido = mysqli_query($conexao, $sqlDeletPedido); */

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/styleAdm.css">
    <title>CoffeWay - Cadastrar Endereco</title>
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

            <div class="tituloTopoArea">
                <div class="textoTopo">

                    <p class="tituloCadastro">GERENCIAR PEDIDOS</p>
                </div>
            </div>

            <section class="listarPedidosArea">

                <div class="listarPedidosCaixa">
                    <P class="pedidosAguardando"> PEDIDOS AGUARDANDO</P>
                    <?php


                    // Loop para percorrer os resultados da consulta
                    while ($row = mysqli_fetch_assoc($resultPedAguardando)) {
                        $id = $row['id'];
                        $id_cliente = $row['id_cliente'];
                        $data = $row['data_pedido'];
                        $valor = $row['valor_total'];

                        $sqlPedidoCliente = "SELECT * FROM cliente WHERE id = $id_cliente";
                        $resultPedidoCliente = mysqli_query($conexao, $sqlPedidoCliente);

                        $rowCliente = mysqli_fetch_assoc($resultPedidoCliente);

                        $nomeCliente = $rowCliente['nome_completo'];
                        $endCliente = $rowCliente['endereco'];
                        $telCliente = $rowCliente['telefone'];

                        $sqlBuscarProdutos = "SELECT * FROM pedido WHERE id_cliente = $id_cliente AND situacao = 'feito'";
                        $resultBuscarProdutos = mysqli_query($conexao, $sqlBuscarProdutos);

                    ?>
                        <div class="listarPedidosCaixas">

                            <div class="listarPedidosDesc">
                                <h3 style="text-transform: uppercase;"><?php echo $nomeCliente; ?></h3>
                                <p><strong>Endereço:</strong> <?php echo $endCliente; ?></p>
                                <p><strong>Telefone:</strong> <?php echo $telCliente; ?></p>
                                <p><strong>Data do Pedido:</strong> <?php echo $data; ?></p>
                                <br>
                                <h3>PRODUTOS:</h3>
                                <?php
                                while ($rowProduto = mysqli_fetch_assoc($resultBuscarProdutos)) {

                                    $idProduto = $rowProduto['id'];
                                    $nomeProduto = $rowProduto['nome_produto'];
                                    $quantProduto = $rowProduto['quantidade_total'];
                                    $valorProduto = $rowProduto['valor_total'];

                                ?>
                                    <h4><?php 
                                        echo " - ";
                                        echo $nomeProduto; ?></h4>
                                    <p><strong>Quantidade:</strong> <?php echo $quantProduto; ?></p>
                                    
                                    <br>

                                <?php

                                }

                                ?>

                                <p>
                                <h3>VALOR TOTAL: $<?php echo $valor; ?></h3>

                            </div>
                            <div class="listarPedidosBotoes">
                                <form action="" method="post">

                                    <input type="hidden" name="idCliente" value="<?php echo $id_cliente; ?>">
                                    <input class="listarPedidosEditar" name="finPedido" type="submit" value="FINALIZAR">
                                </form>




                            </div>
                        </div>
                    <?php
                    }


                    ?>

                </div>
            </section>
            <section class="listarPedidosArea">

                <div class="listarPedidosCaixa" style="margin-bottom: 40px">
                    <P class="pedidosAguardando"> PEDIDOS FINALIZADOS</P>
                    <?php
                    

                    $sqlPedidosFinalizado = "SELECT * FROM carrinho WHERE situacao = 'Finalizado'";
                    $resultPedidosFinalizado = mysqli_query($conexao, $sqlPedidosFinalizado);
                    
                    // Loop para percorrer os resultados da consulta
                    while ($rowFin = mysqli_fetch_assoc($resultPedidosFinalizado)) {
                        
                        $id = $rowFin['id'];
                        $id_cliente = $rowFin['id_cliente'];
                        $data = $rowFin['data_pedido'];
                        $valor = $rowFin['valor_total'];

                        $sqlPedidoCliente = "SELECT * FROM cliente WHERE id = $id_cliente";
                        $resultPedidoCliente = mysqli_query($conexao, $sqlPedidoCliente);

                        $rowCliente = mysqli_fetch_assoc($resultPedidoCliente);

                        $nomeCliente = $rowCliente['nome_completo'];
                        

                        $sqlBuscarProdutos = "SELECT * FROM pedido WHERE id_cliente = $id_cliente AND situacao = 'feito'";
                        $resultBuscarProdutos = mysqli_query($conexao, $sqlBuscarProdutos);

                    ?>
                        <div class="listarPedidosCaixas" >

                            <div class="listarPedidosDesc">
                                <h3 style="text-transform: uppercase;"><?php echo $nomeCliente; ?></h3>
                              
                                <h3>PRODUTOS:</h3>
                                <?php
                                while ($rowProduto = mysqli_fetch_assoc($resultBuscarProdutos)) {

                                    $idProduto = $rowProduto['id'];
                                    $nomeProduto = $rowProduto['nome_produto'];
                                    $quantProduto = $rowProduto['quantidade_total'];
                                    $valorProduto = $rowProduto['valor_total'];

                                ?>
                                    <h4><?php 
                                        echo " - ";
                                        echo $nomeProduto; ?></h4>
                                    <p><strong>Quantidade:</strong> <?php echo $quantProduto; ?></p>
                                    
                                    <br>

                                <?php

                                }

                                ?>

                                <p>
                                <h3>VALOR TOTAL: $<?php echo $valor; ?></h3>

                            </div>
                            
                        </div>
                    <?php
                    }


                    ?>

                </div>
            </section>
        </div>

    </section>


</body>

</html>