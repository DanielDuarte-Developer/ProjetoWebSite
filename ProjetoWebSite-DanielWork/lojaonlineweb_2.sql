-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 22-Dez-2023 às 12:04
-- Versão do servidor: 10.4.28-MariaDB
-- versão do PHP: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `lojaonlineweb`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `dadoslogin`
--

CREATE TABLE `dadoslogin` (
  `email` varchar(25) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `apelido` varchar(30) NOT NULL,
  `password` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `dadoslogin`
--

INSERT INTO `dadoslogin` (`email`, `nome`, `apelido`, `password`) VALUES
('albert@gmail.com', 'Albert', 'Robert', '1234');

-- --------------------------------------------------------

--
-- Estrutura da tabela `dadosmoradautilizador`
--

CREATE TABLE `dadosmoradautilizador` (
  `id_dados` int(11) NOT NULL,
  `morada` varchar(60) NOT NULL,
  `codigo_Postal` varchar(50) NOT NULL,
  `cidade` varchar(50) NOT NULL,
  `num_Telefone` int(9) NOT NULL,
  `nif` int(9) NOT NULL,
  `person_email` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `encomendas`
--

CREATE TABLE `encomendas` (
  `num_Pedido` int(11) NOT NULL,
  `produto_id` int(11) NOT NULL,
  `person_email` varchar(30) NOT NULL,
  `dados_id` int(11) NOT NULL,
  `preco` decimal(10,2) NOT NULL,
  `quantidade` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `produtos`
--

CREATE TABLE `produtos` (
  `Id_Produto` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `preco` decimal(10,2) NOT NULL,
  `descricao_curta` varchar(70) NOT NULL,
  `Tipo` varchar(30) NOT NULL,
  `url` varchar(200) NOT NULL,
  `descricao_detalhada` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `produtos`
--

INSERT INTO `produtos` (`Id_Produto`, `nome`, `preco`, `descricao_curta`, `Tipo`, `url`, `descricao_detalhada`) VALUES
(2, 'Laptop ProX', 799.99, 'Potente laptop para produtividade profissional.', 'Eletrônicos', 'https://img.pccomponentes.com/articles/37/379930/1865-microsoft-surface-pro-x-microsoft-sq1-8-gb-256gb-ssd-13-tactil.jpg', 'O Laptop ProX é equipado com um processador de última geração, oferecendo desempenho excepcional para suas tarefas diárias. Sua tela de alta resolução proporciona uma experiência visual imersiva, e a bateria de longa duração garante que você esteja sempre conectado.'),
(3, 'Smartphone Samsung X1000', 699.99, 'Smartphone da última geração com câmara de alta resolução e desempenho', 'mobile', 'https://s3.chip7.pt/323598/conversions/c7ElO3GT-page.webp', 'O Smartphone Samsung X1000 redefine a experiência móvel. A sua camara de 48MP permite capturar cada detalhe, enquanto o processador de última geração garante um desempenho fluido. Com um ecra de AMOLED impressionante, este smartphone oferece qualidade visual incomparável.'),
(4, 'Auscultadores Sem Fios SonicBlast V2', 129.99, 'Experimente a liberdade sem fios com qualidade de som premium.', 'Imagem e Som', 'https://img.pccomponentes.com/articles/35/356296/1476-creative-sound-blaster-jam-v2-auriculares-inalambricos-bluetooth-negros.jpg', 'Os Auscultadores Sem Fios SonicBlast V2 proporcionam uma experiência sonora envolvente. Com conectividade Bluetooth, cancelamento de ruído e bateria de longa duração, estes auscultadores são ideais para audiófilos e amantes de música.'),
(5, 'Câmara Digital ProCapture 5000', 899.99, 'Capture momentos especiais com detalhes incríveis usando esta câmara p', 'Imagem e Som', 'https://dtz3um9jw7ngl.cloudfront.net/p/l/4010961S/4010961S.jpg', 'A Câmara Digital ProCapture 5000 é projetada para fotógrafos profissionais e entusiastas. Com um sensor de alta resolução, recursos avançados de foco automático e gravação em 4K, esta câmara oferece qualidade excepcional para as suas criações visuais.'),
(6, 'Monitor Gamer LG UltraGear 27', 449.99, 'Desfrute de uma experiência de jogo imersiva com uma alta taxa de atua', 'Imagem e Som', 'https://img.globaldata.pt/products/27GQ50F-B_1.jpg', 'O Monitor Gamer UltraVision 27\" proporciona imagens nítidas e taxas de atualização elevadas para uma experiência de jogo excepcional. O seu design ergonómico e a tecnologia anti-cintilação garantem conforto visual prolongado.'),
(7, 'Tablet ElitePad Pro 12.9', 799.99, 'Potência e versatilidade num tablet projetado para a máxima produtivid', 'Mobile', 'https://www.notebookcheck.net/fileadmin/Notebooks/News/_nc/HP_ElitePad_1000_G2_stylus.jpg', 'O Tablet ElitePad Pro 12.9 oferece um desempenho poderoso e um ecrã expansivo para facilitar a produtividade. Com funcionalidades avançadas e uma longa duração da bateria, é a escolha ideal para profissionais em movimento.');

-- --------------------------------------------------------

--
-- Estrutura da tabela `reviews`
--

CREATE TABLE `reviews` (
  `id_review` int(11) NOT NULL,
  `nome_utilizador` varchar(20) NOT NULL,
  `comentario` varchar(100) NOT NULL,
  `rating` int(2) NOT NULL,
  `produto_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `reviews`
--

INSERT INTO `reviews` (`id_review`, `nome_utilizador`, `comentario`, `rating`, `produto_id`) VALUES
(2, 'manuel', 'Muito bom dispositivo', 4, 3),
(11, 'Albert Robert', 'Achei Medio', 3, 3),
(12, 'Albert Robert', 'Depois de alguns testes não achei pratico pois não fica confortável nas orelha,\r\nmas em geral qualid', 2, 4),
(13, 'Albert Robert', 'Laptop Caro', 3, 2);

-- --------------------------------------------------------

--
-- Estrutura da tabela `utilizadordados`
--

CREATE TABLE `utilizadordados` (
  `id_utilizador` int(11) NOT NULL,
  `email` varchar(60) NOT NULL,
  `data_nascimento` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `utilizadordados`
--

INSERT INTO `utilizadordados` (`id_utilizador`, `email`, `data_nascimento`) VALUES
(4, 'albert@gmail.com', '2023-12-14');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `dadoslogin`
--
ALTER TABLE `dadoslogin`
  ADD PRIMARY KEY (`email`);

--
-- Índices para tabela `dadosmoradautilizador`
--
ALTER TABLE `dadosmoradautilizador`
  ADD PRIMARY KEY (`id_dados`),
  ADD KEY `FK_utilizadores` (`person_email`);

--
-- Índices para tabela `encomendas`
--
ALTER TABLE `encomendas`
  ADD PRIMARY KEY (`num_Pedido`),
  ADD KEY `FK_Produtos` (`produto_id`),
  ADD KEY `FK_EmailUtilizador` (`person_email`),
  ADD KEY `FK_DadosMorada` (`dados_id`);

--
-- Índices para tabela `produtos`
--
ALTER TABLE `produtos`
  ADD PRIMARY KEY (`Id_Produto`);

--
-- Índices para tabela `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id_review`),
  ADD KEY `FK_ProdutoID` (`produto_id`);

--
-- Índices para tabela `utilizadordados`
--
ALTER TABLE `utilizadordados`
  ADD PRIMARY KEY (`id_utilizador`),
  ADD KEY `Fk_credenciais` (`email`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `dadosmoradautilizador`
--
ALTER TABLE `dadosmoradautilizador`
  MODIFY `id_dados` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de tabela `encomendas`
--
ALTER TABLE `encomendas`
  MODIFY `num_Pedido` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `produtos`
--
ALTER TABLE `produtos`
  MODIFY `Id_Produto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de tabela `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id_review` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de tabela `utilizadordados`
--
ALTER TABLE `utilizadordados`
  MODIFY `id_utilizador` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `encomendas`
--
ALTER TABLE `encomendas`
  ADD CONSTRAINT `FK_DadosMorada` FOREIGN KEY (`dados_id`) REFERENCES `dadosmoradautilizador` (`id_dados`),
  ADD CONSTRAINT `FK_EmailUtilizador` FOREIGN KEY (`person_email`) REFERENCES `dadoslogin` (`email`),
  ADD CONSTRAINT `FK_Produtos` FOREIGN KEY (`produto_id`) REFERENCES `produtos` (`Id_Produto`);

--
-- Limitadores para a tabela `reviews`
--
ALTER TABLE `reviews`
  ADD CONSTRAINT `FK_ProdutoID` FOREIGN KEY (`produto_id`) REFERENCES `produtos` (`Id_Produto`);

--
-- Limitadores para a tabela `utilizadordados`
--
ALTER TABLE `utilizadordados`
  ADD CONSTRAINT `Fk_credenciais` FOREIGN KEY (`email`) REFERENCES `dadoslogin` (`email`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
