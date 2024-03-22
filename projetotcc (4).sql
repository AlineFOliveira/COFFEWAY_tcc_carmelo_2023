-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 22-Mar-2024 às 01:13
-- Versão do servidor: 10.1.38-MariaDB
-- versão do PHP: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `projetotcc`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `adm`
--

CREATE TABLE `adm` (
  `id` int(11) NOT NULL,
  `nome_completo` char(90) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cpf` varchar(90) COLLATE utf8mb4_unicode_ci NOT NULL,
  `endereco` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telefone` varchar(18) COLLATE utf8mb4_unicode_ci NOT NULL,
  `loja_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `adm`
--

INSERT INTO `adm` (`id`, `nome_completo`, `cpf`, `endereco`, `telefone`, `loja_id`) VALUES
(3, 'Kerolaine', '4444444', 'Rua abacate, 300', '444444444', 1),
(4, 'Aline Ferreira de Oliveira', '555555555', 'Rua Não Sei, 333', '45999998888', 1),
(6, 'Alessandra UHL', '66666666', 'rua uruguai 1013', '45999339393', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `carrinho`
--

CREATE TABLE `carrinho` (
  `id` int(11) NOT NULL,
  `id_cliente` int(11) NOT NULL,
  `data_pedido` date NOT NULL,
  `valor_total` decimal(10,2) NOT NULL,
  `situacao` varchar(90) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tipo_pagamento` int(11) DEFAULT NULL,
  `numero_cartao_debito` varchar(220) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `numero_cartao_credito` varchar(220) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `carrinho`
--

INSERT INTO `carrinho` (`id`, `id_cliente`, `data_pedido`, `valor_total`, `situacao`, `tipo_pagamento`, `numero_cartao_debito`, `numero_cartao_credito`) VALUES
(8, 10, '2023-11-11', '24.00', 'Finalizado', 1, '44444444444', '66666666'),
(10, 12, '2023-11-11', '12.00', 'Finalizado', 2, NULL, '6666666'),
(17, 12, '2023-11-11', '12.00', 'Aguardando', NULL, NULL, NULL),
(23, 11, '2023-11-13', '21.00', 'Finalizado', 2, NULL, ''),
(63, 9, '2023-11-15', '24.00', 'Em Andamento', 1, NULL, '8888888'),
(64, 20, '2023-11-15', '28.00', 'Em Andamento', 1, NULL, '66666666'),
(65, 21, '2023-11-22', '6.50', 'Em Andamento', 2, NULL, '4444444444444'),
(66, 22, '2023-11-22', '12.50', 'Em Andamento', 2, NULL, '44444444444'),
(68, 24, '2023-11-22', '8.50', 'Finalizado', 2, NULL, '44444444444444');

-- --------------------------------------------------------

--
-- Estrutura da tabela `cliente`
--

CREATE TABLE `cliente` (
  `id` int(11) NOT NULL,
  `nome_completo` char(90) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cpf` varchar(90) COLLATE utf8mb4_unicode_ci NOT NULL,
  `endereco` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telefone` varchar(18) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `cliente`
--

INSERT INTO `cliente` (`id`, `nome_completo`, `cpf`, `endereco`, `telefone`) VALUES
(9, 'banana', '11122233344', 'Rua Feliz 0001', '45999339393'),
(10, 'Clientela primária de teste', '11122233344', 'Rua Feliz 0001', '45999339393'),
(11, 'sil', '03144444444', 'Rua Feliz 000', '4444'),
(12, 'Edycleuton ramos lima', '1176025194', 'rua uruguai 1013', '45988058196'),
(20, 'Romeu 1', '555555555', 'Rua abacate, 300', '55555555'),
(21, 'Ciclano Junior Silva', '4111111111111', 'Rua abacate, 300', '45111111111111'),
(22, 'Julieta Silva', '1111111111', 'Rua abacate, 300', '45999999999'),
(24, 'Fausto Silva', '1111111111', 'Rua abacate, 300', '45999998888');

-- --------------------------------------------------------

--
-- Estrutura da tabela `login`
--

CREATE TABLE `login` (
  `id` int(11) NOT NULL,
  `id_cliente` int(11) DEFAULT NULL,
  `id_adm` int(11) DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `senha` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `login`
--

INSERT INTO `login` (`id`, `id_cliente`, `id_adm`, `email`, `senha`) VALUES
(11, 9, NULL, 'banana@banana.com', '123'),
(12, 10, NULL, 'cliente@cliente.com', '123'),
(13, 11, NULL, 'silbananinha@gmail.com', '2020'),
(20, NULL, 3, 'kero@email.com', '1010'),
(21, 12, NULL, 'edycleuton19@gmail.com', 'edy123'),
(26, NULL, 4, 'aline@email.com', '1010'),
(28, NULL, 6, 'alessandra@email.com', '123'),
(34, 20, NULL, 'romeu@email.com', '123'),
(35, 21, NULL, 'ciclano@teste.com', '123'),
(36, 22, NULL, 'julieta@teste.com', '123'),
(38, 24, NULL, 'fausto@teste.com', '123');

-- --------------------------------------------------------

--
-- Estrutura da tabela `loja`
--

CREATE TABLE `loja` (
  `id` int(11) NOT NULL,
  `cnpj` varchar(14) COLLATE utf8mb4_unicode_ci NOT NULL,
  `uf` char(2) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rua` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telefone` varchar(18) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(90) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `loja`
--

INSERT INTO `loja` (`id`, `cnpj`, `uf`, `rua`, `telefone`, `email`) VALUES
(1, '11111222222222', 'PR', 'Avenida Imaginária, Nº 707', '45 0000000000', 'email@email.com');

-- --------------------------------------------------------

--
-- Estrutura da tabela `pagamento`
--

CREATE TABLE `pagamento` (
  `id` int(11) NOT NULL,
  `tipo` char(90) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `pagamento`
--

INSERT INTO `pagamento` (`id`, `tipo`) VALUES
(1, 'Débito'),
(2, 'Crédito');

-- --------------------------------------------------------

--
-- Estrutura da tabela `pedido`
--

CREATE TABLE `pedido` (
  `id` int(11) NOT NULL,
  `id_cliente` int(11) NOT NULL,
  `id_produto` int(11) NOT NULL,
  `quantidade_total` int(11) NOT NULL,
  `nome_produto` char(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `valor_total` decimal(10,2) NOT NULL,
  `data` date NOT NULL,
  `situacao` varchar(90) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `pedido`
--

INSERT INTO `pedido` (`id`, `id_cliente`, `id_produto`, `quantidade_total`, `nome_produto`, `valor_total`, `data`, `situacao`) VALUES
(2, 10, 5, 1, 'Omelete', '12.00', '2023-11-11', 'feito'),
(3, 12, 9, 2, 'Café Preto', '6.00', '2023-11-11', 'feito'),
(4, 12, 5, 1, 'Omelete', '12.00', '2023-11-11', 'feito'),
(6, 12, 5, 1, 'Omelete', '12.00', '2023-11-11', 'aguardando'),
(11, 11, 9, 3, 'Café Preto', '9.00', '2023-11-13', 'feito'),
(12, 11, 5, 1, 'Omelete', '12.00', '2023-11-13', 'feito'),
(22, 10, 15, 1, 'Muffins', '6.00', '2023-11-15', 'feito'),
(27, 10, 10, 2, 'Café com leite', '10.00', '2023-11-15', 'feito'),
(29, 10, 9, 2, 'Café Preto', '6.00', '2023-11-15', 'feito'),
(30, 10, 5, 3, 'Omelete', '36.00', '2023-11-15', 'feito'),
(31, 10, 9, 1, 'Café Preto', '3.00', '2023-11-15', 'feito'),
(32, 10, 10, 1, 'Café com leite', '5.00', '2023-11-15', 'feito'),
(33, 10, 5, 2, 'Omelete', '24.00', '2023-11-15', 'feito'),
(39, 9, 5, 1, 'Omelete', '12.00', '2023-11-15', 'feito'),
(40, 9, 12, 1, 'Sanduíche (veg)', '18.00', '2023-11-15', 'feito'),
(41, 9, 9, 2, 'Café Preto', '6.00', '2023-11-15', 'feito'),
(42, 9, 10, 2, 'Café com leite', '10.00', '2023-11-15', 'feito'),
(43, 9, 11, 2, 'Café expresso', '14.00', '2023-11-15', 'feito'),
(44, 20, 10, 1, 'Café com leite', '5.00', '2023-11-15', 'feito'),
(45, 20, 9, 1, 'Café Preto', '3.00', '2023-11-15', 'feito'),
(46, 21, 9, 1, 'Café Preto', '3.00', '2023-11-22', 'feito'),
(48, 21, 13, 1, 'Pão de queijo', '3.50', '2023-11-22', 'feito'),
(49, 22, 9, 1, 'Café Preto', '3.00', '2023-11-22', 'feito'),
(51, 22, 13, 1, 'Pão de queijo', '3.50', '2023-11-22', 'feito'),
(55, 24, 10, 1, 'Café com leite', '5.00', '2023-11-22', 'feito'),
(57, 24, 13, 1, 'Pão de queijo', '3.50', '2023-11-22', 'feito');

-- --------------------------------------------------------

--
-- Estrutura da tabela `produto`
--

CREATE TABLE `produto` (
  `id` int(11) NOT NULL,
  `nome` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `descricao` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `preco` decimal(10,2) NOT NULL,
  `imagem_url` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tipo` char(90) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `produto`
--

INSERT INTO `produto` (`id`, `nome`, `descricao`, `preco`, `imagem_url`, `tipo`) VALUES
(5, 'Omelete', '(Opcional: tomate e pão e queijo)', '12.00', 'omelete.jpg', 'comida'),
(9, 'Café Preto', '(Com adoçante ou sem)', '3.00', 'cafepreto.jpg', 'bebida'),
(10, 'Café com leite', '(Com adoçante ou sem)', '5.00', 'cafecomleite.jpg', 'bebida'),
(11, 'Café expresso', NULL, '7.00', 'cafeexpresso.png', 'bebida'),
(12, 'Sanduíche (veg)', '(Pão, queijo, salada, ovo)', '18.00', 'sanduicheVeg.png', 'comida'),
(13, 'Pão de queijo', NULL, '3.50', 'paodequeijo.jpg', 'comida'),
(14, 'PETITE GATEAU ', '', '25.00', 'petitgateau.png', 'comida'),
(15, 'Muffins', NULL, '6.00', 'muffins.png', 'comida'),
(16, 'Donuts', NULL, '10.00', 'donuts.png', 'comida'),
(17, 'Smoothie', '(Frutas vermelhas)', '12.00', 'smoothie1.png', 'bebida'),
(18, 'Cappuccino', NULL, '18.00', 'cappuccino.png', 'bebida'),
(19, 'Limonada', NULL, '7.00', 'limonada.png', 'bebida');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `adm`
--
ALTER TABLE `adm`
  ADD PRIMARY KEY (`id`),
  ADD KEY `loja_id` (`loja_id`);

--
-- Indexes for table `carrinho`
--
ALTER TABLE `carrinho`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_cliente` (`id_cliente`),
  ADD KEY `carrinho_ibfk_2` (`tipo_pagamento`);

--
-- Indexes for table `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_cliente` (`id_cliente`),
  ADD KEY `id_adm` (`id_adm`);

--
-- Indexes for table `loja`
--
ALTER TABLE `loja`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pagamento`
--
ALTER TABLE `pagamento`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pedido`
--
ALTER TABLE `pedido`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_cliente` (`id_cliente`),
  ADD KEY `id_produto` (`id_produto`);

--
-- Indexes for table `produto`
--
ALTER TABLE `produto`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `adm`
--
ALTER TABLE `adm`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `carrinho`
--
ALTER TABLE `carrinho`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

--
-- AUTO_INCREMENT for table `cliente`
--
ALTER TABLE `cliente`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `loja`
--
ALTER TABLE `loja`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `pagamento`
--
ALTER TABLE `pagamento`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `pedido`
--
ALTER TABLE `pedido`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT for table `produto`
--
ALTER TABLE `produto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `adm`
--
ALTER TABLE `adm`
  ADD CONSTRAINT `adm_ibfk_1` FOREIGN KEY (`loja_id`) REFERENCES `loja` (`id`);

--
-- Limitadores para a tabela `carrinho`
--
ALTER TABLE `carrinho`
  ADD CONSTRAINT `carrinho_ibfk_1` FOREIGN KEY (`id_cliente`) REFERENCES `cliente` (`id`),
  ADD CONSTRAINT `carrinho_ibfk_2` FOREIGN KEY (`tipo_pagamento`) REFERENCES `pagamento` (`id`);

--
-- Limitadores para a tabela `login`
--
ALTER TABLE `login`
  ADD CONSTRAINT `login_ibfk_1` FOREIGN KEY (`id_cliente`) REFERENCES `cliente` (`id`),
  ADD CONSTRAINT `login_ibfk_2` FOREIGN KEY (`id_adm`) REFERENCES `adm` (`id`);

--
-- Limitadores para a tabela `pedido`
--
ALTER TABLE `pedido`
  ADD CONSTRAINT `pedido_ibfk_1` FOREIGN KEY (`id_cliente`) REFERENCES `cliente` (`id`),
  ADD CONSTRAINT `pedido_ibfk_2` FOREIGN KEY (`id_produto`) REFERENCES `produto` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
