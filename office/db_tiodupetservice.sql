-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 11/10/2024 às 09:40
-- Versão do servidor: 10.4.28-MariaDB
-- Versão do PHP: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `db_tiodupetservice`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `agendamentos`
--

CREATE TABLE `agendamentos` (
  `id` int(11) NOT NULL,
  `tipo` varchar(50) DEFAULT NULL,
  `start` datetime DEFAULT NULL,
  `end` datetime DEFAULT NULL,
  `pet_id` int(11) DEFAULT NULL,
  `cliente_id` int(11) DEFAULT NULL,
  `observacoes` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `agendamentos`
--

INSERT INTO `agendamentos` (`id`, `tipo`, `start`, `end`, `pet_id`, `cliente_id`, `observacoes`) VALUES
(3, 'Hospedagem', '2024-10-13 12:00:00', '2024-10-19 12:00:00', 1, 1, ''),
(4, 'Pet Sitter', '2024-10-11 07:34:00', '2024-10-11 08:34:00', 2, 2, ''),
(5, 'Pet Sitter', '2024-10-11 09:38:00', '2024-10-11 10:38:00', 3, 4, ''),
(6, 'Hospedagem', '2024-10-21 12:00:00', '2024-10-23 12:00:00', 5, 4, '');

-- --------------------------------------------------------

--
-- Estrutura para tabela `avaliacao_aprovadas`
--

CREATE TABLE `avaliacao_aprovadas` (
  `id` int(11) NOT NULL,
  `nome_avaliador` varchar(255) NOT NULL,
  `estrelas` int(11) DEFAULT NULL CHECK (`estrelas` between 1 and 5),
  `descricao` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `avaliacao_recusadas`
--

CREATE TABLE `avaliacao_recusadas` (
  `id` int(11) NOT NULL,
  `nome_avaliador` varchar(255) NOT NULL,
  `estrelas` int(11) DEFAULT NULL CHECK (`estrelas` between 1 and 5),
  `descricao` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `avaliacao_solicitadas`
--

CREATE TABLE `avaliacao_solicitadas` (
  `id` int(11) NOT NULL,
  `nome_avaliador` varchar(255) NOT NULL,
  `estrelas` int(11) DEFAULT NULL CHECK (`estrelas` between 1 and 5),
  `descricao` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `cliente`
--

CREATE TABLE `cliente` (
  `id` int(10) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `cpf` varchar(14) NOT NULL,
  `telefone` varchar(13) NOT NULL,
  `email` varchar(100) NOT NULL,
  `endereco` varchar(100) DEFAULT NULL,
  `numero` varchar(10) DEFAULT NULL,
  `complemento` varchar(20) DEFAULT NULL,
  `bairro` varchar(50) NOT NULL,
  `cep` varchar(10) NOT NULL,
  `cidade` varchar(50) NOT NULL,
  `estado` varchar(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `cliente`
--

INSERT INTO `cliente` (`id`, `nome`, `cpf`, `telefone`, `email`, `endereco`, `numero`, `complemento`, `bairro`, `cep`, `cidade`, `estado`) VALUES
(1, 'Ana Silva', '123.456.789-01', '(11)987654321', 'ana.silva@email.com', 'Rua das Flores', '123', 'Apto 101', 'Centro', '01234-567', 'São Paulo', 'SP'),
(2, 'João Pereira', '987.654.321-00', '(21)912345678', 'joao.pereira@email.com', 'Avenida Brasil', '456', 'Casa', 'Jardim América', '87654-321', 'Rio de Janeiro', 'RJ'),
(3, 'Maria Souza', '321.654.987-12', '(31)998765432', 'maria.souza@email.com', 'Rua da Paz', '789', '', 'São Bento', '54321-098', 'Belo Horizonte', 'MG'),
(4, 'Carlos Oliveira', '123.789.456-09', '(41)912349876', 'carlos.oliveira@email.com', 'Alameda Santos', '321', 'Sala 3', 'Centro', '09876-543', 'Curitiba', 'PR'),
(5, 'Fernanda Lima', '987.123.654-00', '(51)998123456', 'fernanda.lima@email.com', 'Travessa do Sol', '147', 'Casa 2', 'Vila Nova', '13579-246', 'Porto Alegre', 'RS'),
(6, 'Roberto Costa', '456.987.123-45', '(61)911234567', 'roberto.costa@email.com', 'Rua das Acácias', '654', '', 'Lago Norte', '76543-210', 'Brasília', 'DF'),
(7, 'Juliana Ferreira', '789.123.456-78', '(71)912341234', 'juliana.ferreira@email.com', 'Estrada Velha', '852', 'Bloco B', 'Piatã', '65432-109', 'Salvador', 'BA'),
(8, 'Paulo Henrique', '654.321.987-09', '(81)998761122', 'paulo.henrique@email.com', 'Rua Mar Vermelho', '963', 'Apto 302', 'Boa Viagem', '98765-432', 'Recife', 'PE'),
(9, 'Tatiane Rocha', '321.987.654-32', '(91)912345678', 'tatiane.rocha@email.com', 'Rua Verde', '741', 'Casa', 'Cidade Nova', '12345-678', 'Belém', 'PA'),
(10, 'Rafael Santos', '987.321.654-00', '(51)997654321', 'rafael.santos@email.com', 'Avenida Central', '258', 'Cobertura', 'Centro', '87654-210', 'Porto Alegre', 'RS');

-- --------------------------------------------------------

--
-- Estrutura para tabela `lead`
--

CREATE TABLE `lead` (
  `id` int(10) NOT NULL,
  `servico` varchar(10) NOT NULL,
  `data_lead` date NOT NULL,
  `nome` varchar(100) NOT NULL,
  `telefone` varchar(13) NOT NULL,
  `email` varchar(100) NOT NULL,
  `lead_contatado` varchar(3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `matricula_creche`
--

CREATE TABLE `matricula_creche` (
  `id` int(11) NOT NULL,
  `id_servico` int(11) DEFAULT NULL,
  `id_pet` int(11) DEFAULT NULL,
  `id_veterinario` int(11) DEFAULT NULL,
  `id_cliente` int(11) DEFAULT NULL,
  `data_matricula` date DEFAULT current_timestamp(),
  `status` varchar(20) DEFAULT NULL,
  `horario_entrada` time DEFAULT NULL,
  `horario_saida` time DEFAULT NULL,
  `data_fim` date DEFAULT NULL,
  `observacao` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `matricula_creche`
--

INSERT INTO `matricula_creche` (`id`, `id_servico`, `id_pet`, `id_veterinario`, `id_cliente`, `data_matricula`, `status`, `horario_entrada`, `horario_saida`, `data_fim`, `observacao`) VALUES
(15, 13, 22, 33, 33, '2024-10-11', 'Ativa', '08:00:00', '17:00:00', '2024-12-31', '');

-- --------------------------------------------------------

--
-- Estrutura para tabela `pet`
--

CREATE TABLE `pet` (
  `id` int(10) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `sexo` varchar(50) NOT NULL,
  `especie` varchar(30) NOT NULL,
  `raca` varchar(50) DEFAULT NULL,
  `cor` varchar(50) DEFAULT NULL,
  `idade` int(3) DEFAULT NULL,
  `porte` varchar(20) DEFAULT NULL,
  `rga` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `pet`
--

INSERT INTO `pet` (`id`, `nome`, `sexo`, `especie`, `raca`, `cor`, `idade`, `porte`, `rga`) VALUES
(1, 'Bobby', 'M', 'Cão', 'Labrador', 'Amarelo', 3, 'Grande', '12345'),
(2, 'Luna', 'F', 'Gato', 'Siamês', 'Branco', 2, 'Pequeno', '67890'),
(3, 'Max', 'M', 'Cão', 'Golden Retriever', 'Dourado', 4, 'Grande', '54321'),
(4, 'Mia', 'F', 'Cão', 'Poodle', 'Branco', 5, 'Médio', '98765'),
(5, 'Toby', 'M', 'Cão', 'Bulldog', 'Marrom', 6, 'Médio', '13579'),
(6, 'Bella', 'F', 'Gato', 'Persa', 'Cinza', 1, 'Pequeno', '24680'),
(7, 'Charlie', 'M', 'Cão', 'Beagle', 'Tricolor', 3, 'Médio', '11223'),
(8, 'Simba', 'M', 'Gato', 'Maine Coon', 'Preto', 2, 'Grande', '33445'),
(9, 'Nina', 'F', 'Cão', 'Shih Tzu', 'Preto e Branco', 3, 'Pequeno', '55667'),
(10, 'Leo', 'M', 'Gato', 'Bengal', 'Dourado', 4, 'Médio', '77889');

-- --------------------------------------------------------

--
-- Estrutura para tabela `servico`
--

CREATE TABLE `servico` (
  `id` int(10) NOT NULL,
  `servico` varchar(50) NOT NULL,
  `tipo` varchar(50) NOT NULL,
  `preco` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `servico`
--

INSERT INTO `servico` (`id`, `servico`, `tipo`, `preco`) VALUES
(13, 'Creche-Mensal', 'Creche', 500.00);

-- --------------------------------------------------------

--
-- Estrutura para tabela `veterinario`
--

CREATE TABLE `veterinario` (
  `id` int(10) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `telefone` varchar(13) NOT NULL,
  `email` varchar(100) NOT NULL,
  `endereco` varchar(100) DEFAULT NULL,
  `numero` varchar(10) DEFAULT NULL,
  `complemento` varchar(20) DEFAULT NULL,
  `bairro` varchar(50) NOT NULL,
  `cep` varchar(10) NOT NULL,
  `cidade` varchar(50) NOT NULL,
  `estado` varchar(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `veterinario`
--

INSERT INTO `veterinario` (`id`, `nome`, `telefone`, `email`, `endereco`, `numero`, `complemento`, `bairro`, `cep`, `cidade`, `estado`) VALUES
(1, 'Dr. João Mendes', '(11)912345678', 'joao.mendes@vetclinic.com', 'Avenida Paulista', '1000', 'Sala 5', 'Bela Vista', '01310-000', 'São Paulo', 'SP'),
(2, 'Dra. Mariana Oliveira', '(21)923456789', 'mariana.oliveira@clinicavet.com', 'Rua Voluntários da Pátria', '456', 'Apto 101', 'Botafogo', '22270-000', 'Rio de Janeiro', 'RJ'),
(3, 'Dr. Lucas Silva', '(31)934567890', 'lucas.silva@vetbelo.com', 'Avenida Afonso Pena', '123', 'Sala 12', 'Centro', '30130-000', 'Belo Horizonte', 'MG'),
(4, 'Dra. Fernanda Costa', '(41)945678901', 'fernanda.costa@vetsul.com', 'Rua XV de Novembro', '789', '', 'Centro', '80020-310', 'Curitiba', 'PR'),
(5, 'Dr. Ricardo Almeida', '(51)956789012', 'ricardo.almeida@vetporto.com', 'Avenida Ipiranga', '654', 'Loja 2', 'Centro Histórico', '90010-000', 'Porto Alegre', 'RS'),
(6, 'Dra. Júlia Martins', '(61)967890123', 'julia.martins@vetbras.com', 'Setor Hospitalar', '321', 'Consultório 8', 'Asa Norte', '70390-000', 'Brasília', 'DF'),
(7, 'Dr. Felipe Souza', '(71)978901234', 'felipe.souza@clinvet.com', 'Rua Direita da Piedade', '852', '', 'Nazaré', '40000-000', 'Salvador', 'BA'),
(8, 'Dra. Paula Ribeiro', '(81)989012345', 'paula.ribeiro@recifevet.com', 'Avenida Boa Viagem', '963', 'Bloco A', 'Boa Viagem', '51020-000', 'Recife', 'PE'),
(9, 'Dr. Gabriel Nogueira', '(91)990123456', 'gabriel.nogueira@vetbelem.com', 'Travessa Dom Pedro I', '147', '', 'Umarizal', '66055-000', 'Belém', 'PA'),
(10, 'Dra. Carolina Rocha', '(51)901234567', 'carolina.rocha@vetpoa.com', 'Rua Padre Chagas', '258', 'Sala 202', 'Moinhos de Vento', '90570-080', 'Porto Alegre', 'RS');

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `agendamentos`
--
ALTER TABLE `agendamentos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pet_id` (`pet_id`),
  ADD KEY `cliente_id` (`cliente_id`);

--
-- Índices de tabela `avaliacao_aprovadas`
--
ALTER TABLE `avaliacao_aprovadas`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `avaliacao_recusadas`
--
ALTER TABLE `avaliacao_recusadas`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `avaliacao_solicitadas`
--
ALTER TABLE `avaliacao_solicitadas`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `cpf` (`cpf`);

--
-- Índices de tabela `lead`
--
ALTER TABLE `lead`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `matricula_creche`
--
ALTER TABLE `matricula_creche`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `pet`
--
ALTER TABLE `pet`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `servico`
--
ALTER TABLE `servico`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `veterinario`
--
ALTER TABLE `veterinario`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `agendamentos`
--
ALTER TABLE `agendamentos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de tabela `avaliacao_aprovadas`
--
ALTER TABLE `avaliacao_aprovadas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `avaliacao_recusadas`
--
ALTER TABLE `avaliacao_recusadas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `avaliacao_solicitadas`
--
ALTER TABLE `avaliacao_solicitadas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `cliente`
--
ALTER TABLE `cliente`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT de tabela `lead`
--
ALTER TABLE `lead`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT de tabela `matricula_creche`
--
ALTER TABLE `matricula_creche`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de tabela `pet`
--
ALTER TABLE `pet`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT de tabela `servico`
--
ALTER TABLE `servico`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de tabela `veterinario`
--
ALTER TABLE `veterinario`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `agendamentos`
--
ALTER TABLE `agendamentos`
  ADD CONSTRAINT `agendamentos_ibfk_1` FOREIGN KEY (`pet_id`) REFERENCES `pet` (`id`),
  ADD CONSTRAINT `agendamentos_ibfk_2` FOREIGN KEY (`cliente_id`) REFERENCES `cliente` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
