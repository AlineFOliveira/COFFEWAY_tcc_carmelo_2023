<?php
session_start();
include_once('config/conexao.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['remover'])) {
        $produto_id = $_POST['produto_id'];
        $id_cliente = $_SESSION['user_id'];
        $quantCarrinho = $_POST['quantCarrinho'];

        // Verifique se o pedido existe antes de excluí-lo para evitar erros
        $sqlVerificarPedido = "SELECT id FROM pedido WHERE id_cliente = $id_cliente AND id_produto = $produto_id";
        $resultVerificarPedido = mysqli_query($conexao, $sqlVerificarPedido);

        if (mysqli_num_rows($resultVerificarPedido) > 0) {
            // Exclua o pedido da tabela
            $sqlRemoverPedido = "DELETE FROM pedido WHERE id_cliente = $id_cliente AND id_produto = $produto_id";
            $resultRemoverPedido = mysqli_query($conexao, $sqlRemoverPedido);

            $sqlAltCarrinho = "SELECT valor_total FROM carrinho WHERE id_cliente = $id_cliente";
            $resultAltCarrinho = mysqli_query($conexao, $sqlAltCarrinho);

            $row = mysqli_fetch_assoc($resultAltCarrinho);
            $valorAntigo = $row['valor_total'];

            $valorNovo = $valorAntigo - $quantCarrinho;

            $sqlAtualizarValor = "UPDATE carrinho SET valor_total = $valorNovo WHERE id_cliente = $id_cliente";
            $resultAtualizarValor = mysqli_query($conexao, $sqlAtualizarValor);

            if ($resultRemoverPedido && $resultAtualizarValor) {
                // Pedido removido com sucesso, redirecione para a página do carrinho
                header("Location: carrinho.php");
            } else {
                echo "Erro ao remover o pedido.";
            }
        } else {
            echo "Pedido não encontrado ou não pertence ao usuário.";
        }

        // Verificar se não há mais pedidos no carrinho
        $sqlVerificarCarrinhoVazio = "SELECT id FROM pedido WHERE id_cliente = $id_cliente";
        $resultVerificarCarrinhoVazio = mysqli_query($conexao, $sqlVerificarCarrinhoVazio);

        if (mysqli_num_rows($resultVerificarCarrinhoVazio) == 0) {
            // Não há mais pedidos no carrinho, então exclua o carrinho
            $sqlExcluirCarrinho = "DELETE FROM carrinho WHERE id_cliente = $id_cliente";
            $resultExcluirCarrinho = mysqli_query($conexao, $sqlExcluirCarrinho);

            if ($resultExcluirCarrinho) {
                // Carrinho excluído com sucesso
            } else {
                echo "Erro ao excluir o carrinho.";
            }
        }
    } else {
        echo "ID do produto não especificado.";
    }
} else {
    echo "Método de requisição inválido.";
}
