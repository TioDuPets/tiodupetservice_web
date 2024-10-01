-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 02/10/2024 às 00:17
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
  `pet_id` int(11) NOT NULL,
  `cliente_id` int(11) NOT NULL,
  `checkin` date NOT NULL,
  `checkout` date NOT NULL,
  `observacoes` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `agendamentos`
--

INSERT INTO `agendamentos` (`id`, `pet_id`, `cliente_id`, `checkin`, `checkout`, `observacoes`) VALUES
(5, 6, 5, '2024-10-03', '2024-10-17', ''),
(6, 7, 5, '2024-10-05', '2024-10-06', '');

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
(10, 'Larissa Santos', '741.852.963-00', '(81) 91234-56', 'larissa.santos@email.com', 'Av. Boa Viagem', '159', 'Bloco A', 'Boa Viagem', '01234-567', 'Recife', 'PE');

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
(11, 'Thor', 'Macho', 'Cachorro', 'Pastor Alemão', 'Preto e Marrom', 6, 'Grande', '901234');

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
(4, 'Creche', 'Cuidados', 80.00),
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
(4, 'Ana Costa', '(71) 99876-54', 'ana.costa@email.com', 'Av. Atlântica', '321', 'Casa', 'Barra', '45678-901', 'Salvador', 'BA'),
(5, 'Bruno Lima', '(41) 97654-32', 'bruno.lima@email.com', 'Rua da Paz', '654', 'Bloco B', 'Centro', '56789-012', 'Curitiba', 'PR'),
(6, 'Juliana Rocha', '(51) 98765-43', 'juliana.rocha@email.com', 'Rua das Oliveiras', '987', 'Apto 303', 'Jardim Botânico', '67890-123', 'Porto Alegre', 'RS'),
(7, 'Fernando Alves', '(21) 91234-56', 'fernando.alves@email.com', 'Av. Getúlio Vargas', '852', 'Sala 12', 'Copacabana', '78901-234', 'Rio de Janeiro', 'RJ'),
(8, 'Paula Mendes', '(11) 92345-67', 'paula.mendes@email.com', 'Rua das Acácias', '753', 'Casa', 'Moema', '89012-345', 'São Paulo', 'SP');

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
-- AUTO_INCREMENT de tabela `cliente`
--
ALTER TABLE `cliente`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT de tabela `lead`
--
ALTER TABLE `lead`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de tabela `pet`
--
ALTER TABLE `pet`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de tabela `servico`
--
ALTER TABLE `servico`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de tabela `veterinario`
--
ALTER TABLE `veterinario`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

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
