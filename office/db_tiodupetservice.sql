-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 19/10/2024 às 02:12
-- Versão do servidor: 10.4.28-MariaDB
-- Versão do PHP: 8.3.12

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
  `id_agendamento` int(10) NOT NULL,
  `id_pet` int(10) DEFAULT NULL,
  `id_cliente` int(10) DEFAULT NULL,
  `id_servico` int(10) DEFAULT NULL,
  `tipo` varchar(50) DEFAULT NULL,
  `start` datetime NOT NULL,
  `end` datetime NOT NULL,
  `dia_completo` tinyint(1) DEFAULT 0,
  `status` varchar(50) DEFAULT 'pendente',
  `observacoes` text DEFAULT NULL,
  `data_reserva` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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

--
-- Despejando dados para a tabela `avaliacao_aprovadas`
--

INSERT INTO `avaliacao_aprovadas` (`id`, `nome_avaliador`, `estrelas`, `descricao`) VALUES
(1, 'Avaliador', 5, 'Ficou TOP!!!');

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

--
-- Despejando dados para a tabela `avaliacao_recusadas`
--

INSERT INTO `avaliacao_recusadas` (`id`, `nome_avaliador`, `estrelas`, `descricao`) VALUES
(3, 'Avaliador3', 3, 'Precisa melhorar ');

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

--
-- Despejando dados para a tabela `avaliacao_solicitadas`
--

INSERT INTO `avaliacao_solicitadas` (`id`, `nome_avaliador`, `estrelas`, `descricao`) VALUES
(2, 'Avaliador2', 5, 'Muito bom');

-- --------------------------------------------------------

--
-- Estrutura para tabela `cliente`
--

CREATE TABLE `cliente` (
  `id_cliente` int(10) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `cpf` varchar(14) NOT NULL,
  `telefone` varchar(13) NOT NULL,
  `email` varchar(100) NOT NULL,
  `endereco` varchar(100) NOT NULL,
  `numero` varchar(10) NOT NULL,
  `complemento` varchar(20) NOT NULL,
  `bairro` varchar(50) NOT NULL,
  `cep` varchar(10) NOT NULL,
  `cidade` varchar(50) NOT NULL,
  `estado` varchar(2) NOT NULL,
  `data_cadastro` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `lead`
--

CREATE TABLE `lead` (
  `id` int(11) NOT NULL,
  `servico` varchar(255) NOT NULL,
  `data_lead` datetime DEFAULT current_timestamp(),
  `nome` varchar(255) NOT NULL,
  `telefone` varchar(15) NOT NULL,
  `email` varchar(255) NOT NULL,
  `contato_prefere` enum('email','telefone','whatsapp') NOT NULL,
  `horario_prefere` enum('manha','tarde') NOT NULL,
  `receber_novidades` tinyint(1) DEFAULT 0,
  `consentimento_dados` tinyint(1) DEFAULT 0,
  `data_consentimento` datetime NOT NULL,
  `politica_privacidade` varchar(255) NOT NULL,
  `lead_contatado` enum('Sim','Não') DEFAULT 'Não'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `lead`
--

INSERT INTO `lead` (`id`, `servico`, `data_lead`, `nome`, `telefone`, `email`, `contato_prefere`, `horario_prefere`, `receber_novidades`, `consentimento_dados`, `data_consentimento`, `politica_privacidade`, `lead_contatado`) VALUES
(1, 'Hospedagem', '2024-10-16 01:42:05', 'LeatTeste', '19912345678', 'lead@email.com', 'whatsapp', 'manha', 1, 1, '2024-10-16 01:42:05', 'https://link-da-politica-de-privacidade.com', 'Não');

-- --------------------------------------------------------

--
-- Estrutura para tabela `matricula_creche`
--

CREATE TABLE `matricula_creche` (
  `id_matricula_creche` int(10) NOT NULL,
  `id_servico` int(10) DEFAULT NULL,
  `id_pet` int(11) DEFAULT NULL,
  `id_cliente` int(11) DEFAULT NULL,
  `id_veterinario` int(11) DEFAULT NULL,
  `data_matricula` date DEFAULT current_timestamp(),
  `dia_completo` tinyint(1) DEFAULT 0,
  `status` varchar(50) DEFAULT 'pendente',
  `horario_entrada` time DEFAULT NULL,
  `horario_saida` time DEFAULT NULL,
  `data_fim` date DEFAULT NULL,
  `observacao` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `pet`
--

CREATE TABLE `pet` (
  `id_pet` int(10) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `sexo` varchar(50) DEFAULT NULL,
  `especie` varchar(30) NOT NULL,
  `raca` varchar(50) DEFAULT NULL,
  `cor` varchar(50) DEFAULT NULL,
  `idade` int(3) DEFAULT NULL,
  `porte` varchar(20) NOT NULL,
  `rga` varchar(50) DEFAULT NULL,
  `foto_pet` varchar(255) DEFAULT NULL,
  `id_cliente` int(11) DEFAULT NULL,
  `id_veterinario` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `servico`
--

CREATE TABLE `servico` (
  `id_servico` int(10) NOT NULL,
  `servico` varchar(50) NOT NULL,
  `tipo` varchar(50) NOT NULL,
  `preco` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `usuario` varchar(255) NOT NULL,
  `senha` varchar(255) NOT NULL,
  `funcao` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `nome`, `usuario`, `senha`, `funcao`) VALUES
(1, 'Teste Usuário', 'master', '$2y$10$Cem/2C3LYH5wVcEsJ5aUmuH.HmZMyg/J/ehIVv5hPAEZIl7grIkhG', 'admin');

-- --------------------------------------------------------

--
-- Estrutura para tabela `veterinario`
--

CREATE TABLE `veterinario` (
  `id_veterinario` int(10) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `telefone` varchar(13) NOT NULL,
  `email` varchar(100) DEFAULT NULL,
  `endereco` varchar(100) DEFAULT NULL,
  `numero` varchar(10) DEFAULT NULL,
  `complemento` varchar(20) DEFAULT NULL,
  `bairro` varchar(50) DEFAULT NULL,
  `cep` varchar(10) DEFAULT NULL,
  `cidade` varchar(50) DEFAULT NULL,
  `estado` varchar(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `agendamentos`
--
ALTER TABLE `agendamentos`
  ADD PRIMARY KEY (`id_agendamento`),
  ADD KEY `id_cliente` (`id_cliente`),
  ADD KEY `id_pet` (`id_pet`),
  ADD KEY `id_servico` (`id_servico`);

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
  ADD PRIMARY KEY (`id_cliente`),
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
  ADD PRIMARY KEY (`id_matricula_creche`),
  ADD KEY `id_servico` (`id_servico`),
  ADD KEY `id_pet` (`id_pet`),
  ADD KEY `id_cliente` (`id_cliente`),
  ADD KEY `id_veterinario` (`id_veterinario`);

--
-- Índices de tabela `pet`
--
ALTER TABLE `pet`
  ADD PRIMARY KEY (`id_pet`),
  ADD KEY `id_cliente` (`id_cliente`),
  ADD KEY `id_veterinario` (`id_veterinario`);

--
-- Índices de tabela `servico`
--
ALTER TABLE `servico`
  ADD PRIMARY KEY (`id_servico`);

--
-- Índices de tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `usuario` (`usuario`);

--
-- Índices de tabela `veterinario`
--
ALTER TABLE `veterinario`
  ADD PRIMARY KEY (`id_veterinario`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `agendamentos`
--
ALTER TABLE `agendamentos`
  MODIFY `id_agendamento` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `avaliacao_aprovadas`
--
ALTER TABLE `avaliacao_aprovadas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de tabela `avaliacao_recusadas`
--
ALTER TABLE `avaliacao_recusadas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de tabela `avaliacao_solicitadas`
--
ALTER TABLE `avaliacao_solicitadas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de tabela `cliente`
--
ALTER TABLE `cliente`
  MODIFY `id_cliente` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `lead`
--
ALTER TABLE `lead`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT de tabela `matricula_creche`
--
ALTER TABLE `matricula_creche`
  MODIFY `id_matricula_creche` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `pet`
--
ALTER TABLE `pet`
  MODIFY `id_pet` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `servico`
--
ALTER TABLE `servico`
  MODIFY `id_servico` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT de tabela `veterinario`
--
ALTER TABLE `veterinario`
  MODIFY `id_veterinario` int(10) NOT NULL AUTO_INCREMENT;

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `agendamentos`
--
ALTER TABLE `agendamentos`
  ADD CONSTRAINT `agendamentos_ibfk_1` FOREIGN KEY (`id_cliente`) REFERENCES `cliente` (`id_cliente`) ON DELETE CASCADE,
  ADD CONSTRAINT `agendamentos_ibfk_2` FOREIGN KEY (`id_pet`) REFERENCES `pet` (`id_pet`) ON DELETE CASCADE,
  ADD CONSTRAINT `agendamentos_ibfk_3` FOREIGN KEY (`id_servico`) REFERENCES `servico` (`id_servico`);

--
-- Restrições para tabelas `matricula_creche`
--
ALTER TABLE `matricula_creche`
  ADD CONSTRAINT `matricula_creche_ibfk_1` FOREIGN KEY (`id_servico`) REFERENCES `servico` (`id_servico`),
  ADD CONSTRAINT `matricula_creche_ibfk_2` FOREIGN KEY (`id_pet`) REFERENCES `pet` (`id_pet`) ON DELETE CASCADE,
  ADD CONSTRAINT `matricula_creche_ibfk_3` FOREIGN KEY (`id_cliente`) REFERENCES `cliente` (`id_cliente`) ON DELETE CASCADE,
  ADD CONSTRAINT `matricula_creche_ibfk_4` FOREIGN KEY (`id_veterinario`) REFERENCES `veterinario` (`id_veterinario`) ON DELETE SET NULL;

--
-- Restrições para tabelas `pet`
--
ALTER TABLE `pet`
  ADD CONSTRAINT `pet_ibfk_1` FOREIGN KEY (`id_cliente`) REFERENCES `cliente` (`id_cliente`) ON DELETE SET NULL,
  ADD CONSTRAINT `pet_ibfk_2` FOREIGN KEY (`id_veterinario`) REFERENCES `veterinario` (`id_veterinario`) ON DELETE SET NULL;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
