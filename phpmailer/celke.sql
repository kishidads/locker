-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Tempo de geração: 29-Nov-2021 às 17:21
-- Versão do servidor: 8.0.27
-- versão do PHP: 8.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `celke`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `sits_usuarios`
--

DROP TABLE IF EXISTS `sits_usuarios`;
CREATE TABLE IF NOT EXISTS `sits_usuarios` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nome_situacao` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `sits_usuarios`
--

INSERT INTO `sits_usuarios` (`id`, `nome_situacao`) VALUES
(1, 'Ativo'),
(2, 'Inativo'),
(3, 'Aguardando Confirmação');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
CREATE TABLE IF NOT EXISTS `usuarios` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nome` varchar(220) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(220) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `senha` varchar(220) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `chave` varchar(220) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sits_usuario_id` int NOT NULL DEFAULT '3',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `nome`, `email`, `senha`, `chave`, `sits_usuario_id`) VALUES
(1, 'Cesar', 'cesar@celke.com.br', '$2y$10$N3TSzBpjifKOE2GEDoBhvOwr6gci538CoAjRpy6PWpBEXMbzI2b5y', NULL, 1),
(2, 'Cesar 2', 'cesar2@celke.com.br', '$2y$10$uvr4t.BXBJkn7vofJ5sGleNvA54xG18T5TftkHztj0KMg9V2DCn0O', NULL, 3),
(3, 'Cesar 3', 'cesar3@celke.com.br', '$2y$10$fpq5cwdPlqtUtdFX9/nExO0I1yaZ1K.R0wAvxa9XMVpPJA/7BF37O', NULL, 3),
(4, 'Cesar 4', 'cesar4@celke.com.br', '$2y$10$YK/u8URmJL8JEBgWTsJYiO1gpo/Imil.9XUBF5ISS5sPcmOnrZER6', NULL, 3),
(5, 'Cesar 5', 'cesar5@celke.com.br', '$2y$10$iaREbWAlJESc1QcZb.SPTOOlrGmlwPZsFz6p7AMeMLo4oIXUlGnua', NULL, 3),
(6, 'Cesar', 'cesar6@celke.com.br', '$2y$10$3PRUYfJVOQhlwrfNfapxCeNpldDv/CAzdmHyIYap1F.lzsRhTUnA6', NULL, 3),
(7, 'Cesar 7', 'cesar7@celke.com.br', '$2y$10$NKzBDlM5o2vER6T7SUTxTemUepeJEgHavbP7RsljaLocvXVMAIwyS', NULL, 3),
(8, 'Cesar', 'cesar8@celke.com.br', '$2y$10$bzDh7c//tVLVy5kW/2KaGe2bO7fUz1qgMPV34OQk9zAHG17HMt3t.', NULL, 3),
(9, 'Cesar 9', 'cesar9@celke.com.br', '$2y$10$cklB1FqRrGo4RhNt6pItguRSOhgAlCblpa/xzOyX1jAaCheAfrJga', NULL, 3),
(10, 'Cesar 10', 'cesar10@celke.com.br', '$2y$10$XkmqCq8hyS1GMBvKFDyFLOke6c1ph/3OitxCa9PeZ6Rhl83YGdJpe', NULL, 3),
(11, 'Cesar 11', 'cesar11@celke.com.br', '$2y$10$MbfgHvpmAQ.Cqv4ERt9bFurWRjveeU7Rh2zq73klmge0/BKRwPXm2', NULL, 3),
(12, 'Cesar 12', 'cesar12@celke.com.br', '$2y$10$Oy3yM424iH8KNUDpvyGuruZdOwEUctc0VyOuFQCXsTe7m18fPDAT2', NULL, 3),
(13, 'Cesar 13', 'cesar13@celke.com.br', '$2y$10$9TKJXT9rdJXA5qGHD3A8CexI0xqikbB2sC3AYiAsjqCPD6jYY79mi', NULL, 3),
(14, 'Cesar 14', 'cesar14@celke.com.br', '$2y$10$oQ0zSqSqryqFALWnUm9ZjONpi9oE3/YgH28.P9oQKSWQrLPuWsg4i', NULL, 3),
(15, 'Cesar 15', 'cesar15@celke.com.br', '$2y$10$K.yIPFl1W4LWVFQYsmL2VeIoWigPm91U3PhMVU0vAXD0pBzTQCAmS', NULL, 3),
(16, 'Cesar 16', 'cesar16@celke.com.br', '$2y$10$CcNDNTt8Bgtmt9H5PD.KM.nphgW4ftJ0Jhi2abCwQ2kjNrPiHfBTu', NULL, 3),
(17, 'Cesar 17', 'cesar17@celke.com.br', '$2y$10$fCMfvhXTTJ.Xk1Bt4CczneM/t51E0peg1vEo975.T31wYAq6z1d9K', NULL, 1),
(18, 'Cesar 18', 'cesar18@celke.com.br', '$2y$10$cqJ.qr/k35ZvD.qGB9b2kepDwYlJd2s7Hr5mJgCxm/oqZRreeA5/.', NULL, 1),
(19, 'Cesar 19', 'cesar19@celke.com.br', '$2y$10$FKCczuBIWgoaa0YRZJ1HR.1aGpQrBZb75fs3zpgYgxFyQP.Xj7CBO', NULL, 1),
(20, 'Cesar', 'cesar20@celke.com.br', '$2y$10$8WrFVkIAhdNOH9aYkvT.w.aVbzIvd3geb1Vcd06ZFbn3hMExxv/pK', NULL, 1),
(21, 'Cesar', 'cesar21@celke.com.br', '$2y$10$fWBEyDmsbJHxsa91dzeNjOOVCubM3OXexiZOD3cVddj7SzNUOgrD.', NULL, 1);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
