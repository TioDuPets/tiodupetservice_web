-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 05/10/2024 às 19:56
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
-- Estrutura para tabela `agendamento_hospedagem`
--

CREATE TABLE `agendamento_hospedagem` (
  `id` int(11) NOT NULL,
  `pet_id` int(11) NOT NULL,
  `cliente_id` int(11) NOT NULL,
  `checkin` date NOT NULL,
  `checkout` date NOT NULL,
  `observacoes` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `agendamento_hospedagem`
--

INSERT INTO `agendamento_hospedagem` (`id`, `pet_id`, `cliente_id`, `checkin`, `checkout`, `observacoes`) VALUES
(1, 6, 5, '0000-00-00', '2024-10-06', ''),
(4, 6, 5, '2024-10-04', '2024-10-05', ''),
(5, 6, 5, '2024-10-04', '2024-10-05', ''),
(6, 11, 5, '2024-10-04', '2024-10-07', ''),
(7, 6, 5, '2024-10-04', '2024-10-05', ''),
(8, 6, 5, '2024-10-04', '2024-10-26', ''),
(9, 7, 7, '2024-10-05', '2024-10-06', ''),
(10, 7, 10, '2024-10-27', '2024-11-09', '');

-- --------------------------------------------------------

--
-- Estrutura para tabela `agendamento_petsitter`
--

CREATE TABLE `agendamento_petsitter` (
  `id` int(11) NOT NULL,
  `data_hora` datetime NOT NULL,
  `pet_id` int(11) NOT NULL,
  `cliente_id` int(11) NOT NULL,
  `observacoes` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `agendamento_petsitter`
--

INSERT INTO `agendamento_petsitter` (`id`, `data_hora`, `pet_id`, `cliente_id`, `observacoes`) VALUES
(1, '2024-10-05 08:00:00', 6, 5, ''),
(2, '2024-10-06 08:00:00', 6, 5, ''),
(3, '2024-10-05 22:43:00', 6, 5, ''),
(4, '2024-10-05 22:57:00', 6, 5, '');

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
(5, 'Bruno Lima', '789.123.456-00', '(41) 97654-32', 'bruno.lima@email.com', 'Rua da Paz', '654', 'Bloco B', 'Centro', '56789-012', 'Curitiba', 'PR'),
(6, 'Juliana Rocha', '456.789.123-00', '(51) 98765-43', 'juliana.rocha@email.com', 'Rua das Oliveiras', '987', 'Apto 303', 'Jardim Botânico', '67890-123', 'Porto Alegre', 'RS'),
(7, 'Fernando Alves', '147.258.369-00', '(21) 91234-56', 'fernando.alves@email.com', 'Av. Getúlio Vargas', '852', 'Sala 12', 'Copacabana', '78901-234', 'Rio de Janeiro', 'RJ'),
(8, 'Paula Mendes', '258.369.147-00', '(11) 92345-67', 'paula.mendes@email.com', 'Rua das Acácias', '753', 'Casa', 'Moema', '89012-345', 'São Paulo', 'SP'),
(10, 'Larissa Santos', '741.852.963-00', '(81) 91234-56', 'larissa.santos@email.com', 'Av. Boa Viagem', '159', 'Bloco A', 'Boa Viagem', '01234-567', 'Recife', 'PE'),
(21, 'har', '36925814789', '999999999', 'jardel@email.com', 'rua dos 9', '9', 'casa', 'jd dos 9', '99999999', 'numeor 9', '99');

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

--
-- Despejando dados para a tabela `lead`
--

INSERT INTO `lead` (`id`, `servico`, `data_lead`, `nome`, `telefone`, `email`, `lead_contatado`) VALUES
(17, 'Hospedagem', '2024-10-11', 'Seiya', '19991229845', 'asdfs@dgd.com', 'Não'),
(18, '', '0000-00-00', 'Jardel Lezier Foresto', '19991234567', 'jardel@fatec.com.br', 'Não');

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
(6, 'Bella', 'Fêmea', 'Cachorro', 'Poodle', 'Branco', 1, 'Pequeno', '123789'),
(7, 'Max', 'Macho', 'Cachorro', 'Bulldog', 'Cinza', 3, 'Médio', '456789'),
(10, 'Daisy', 'Fêmea', 'Cachorro', 'Shih Tzu', 'Marrom e Branco', 4, 'Pequeno', '654987'),
(11, 'Thor', 'Macho', 'Cachorro', 'Pastor Alemão', 'Preto e Marrom', 6, 'Grande', '901234'),
(15, 'Lineu', 'Femea', 'Canina', 'Não definida', 'Banca', 645, 'Médio', '465464');

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
(4, 'Creche', 'Cuidados', 500.00),
(5, 'Pet Sitter', 'Cuidados', 100.00),
(6, 'Pet Taxi', 'Transporte', 60.00),
(7, 'Adestramento', 'Treinamento', 180.00);

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
(4, 'VeterinárioTeste', '(71) 99876-54', 'ana.costa@email.com', 'Av. Atlântica', '321', 'Casa', 'Barra', '45678-901', 'Salvador', 'BA');

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `agendamento_hospedagem`
--
ALTER TABLE `agendamento_hospedagem`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pet_id` (`pet_id`),
  ADD KEY `cliente_id` (`cliente_id`);

--
-- Índices de tabela `agendamento_petsitter`
--
ALTER TABLE `agendamento_petsitter`
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
-- AUTO_INCREMENT de tabela `agendamento_hospedagem`
--
ALTER TABLE `agendamento_hospedagem`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de tabela `agendamento_petsitter`
--
ALTER TABLE `agendamento_petsitter`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `avaliacao_aprovadas`
--
ALTER TABLE `avaliacao_aprovadas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `avaliacao_recusadas`
--
ALTER TABLE `avaliacao_recusadas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `avaliacao_solicitadas`
--
ALTER TABLE `avaliacao_solicitadas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `cliente`
--
ALTER TABLE `cliente`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT de tabela `lead`
--
ALTER TABLE `lead`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de tabela `matricula_creche`
--
ALTER TABLE `matricula_creche`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `pet`
--
ALTER TABLE `pet`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de tabela `servico`
--
ALTER TABLE `servico`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de tabela `veterinario`
--
ALTER TABLE `veterinario`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `agendamento_hospedagem`
--
ALTER TABLE `agendamento_hospedagem`
  ADD CONSTRAINT `agendamento_hospedagem_ibfk_1` FOREIGN KEY (`pet_id`) REFERENCES `pet` (`id`),
  ADD CONSTRAINT `agendamento_hospedagem_ibfk_2` FOREIGN KEY (`cliente_id`) REFERENCES `cliente` (`id`);

--
-- Restrições para tabelas `agendamento_petsitter`
--
ALTER TABLE `agendamento_petsitter`
  ADD CONSTRAINT `agendamento_petsitter_ibfk_1` FOREIGN KEY (`pet_id`) REFERENCES `pet` (`id`),
  ADD CONSTRAINT `agendamento_petsitter_ibfk_2` FOREIGN KEY (`cliente_id`) REFERENCES `cliente` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
