-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 17-Dez-2020 às 04:53
-- Versão do servidor: 10.4.17-MariaDB
-- versão do PHP: 8.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `donationsforeducation`
--
CREATE DATABASE IF NOT EXISTS `donationsforeducation` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE `donationsforeducation`;

-- --------------------------------------------------------

--
-- Estrutura da tabela `donors`
--

DROP TABLE IF EXISTS `donors`;
CREATE TABLE IF NOT EXISTS `donors` (
  `nome` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sobrenome` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `genero` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Prefiro não informar',
  `email` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telefone` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `senha` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `carteira` varchar(42) COLLATE utf8mb4_unicode_ci NOT NULL,
  `imagem` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'default.png',
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `donors`
--

INSERT INTO `donors` (`nome`, `sobrenome`, `genero`, `email`, `telefone`, `senha`, `carteira`, `imagem`) VALUES
('Cole', 'Mackenzie', 'Masculino', 'cole.arts@gmail.com', '(11) 99872-5226', 'Cole@rtes123', '0x58300x4B0897b0513fdC7C541B6d9D7E929C4e53', '16081756765fdad03c371c1.png'),
('Anne', 'Shirley Cuthbert Blythe', 'Feminino', 'cordelia@gmail.com', '(11) 94002-8922', 'annecomume', '0x583031D1113aD414F02576BD6afaBfb302140225', '16081701225fdaba8a266e1.png'),
('Gilbert', 'Blythe', 'Masculino', 'meninogilberto@gmail.com', '(11) 99602-8724', 'gilberto123', '0x583031D1113aD414F02576BD6afaBfb302140225', '16081708345fdabd521f8e2.png');

-- --------------------------------------------------------

--
-- Estrutura da tabela `students`
--

DROP TABLE IF EXISTS `students`;
CREATE TABLE IF NOT EXISTS `students` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `student` varchar(42) COLLATE utf8mb4_unicode_ci NOT NULL,
  `goal` decimal(11,2) NOT NULL,
  `collected` decimal(11,2) NOT NULL DEFAULT 0.00,
  `etnia_cor` int(11) NOT NULL,
  `pcd` int(11) NOT NULL,
  `tipoArea` int(11) NOT NULL,
  `curso` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `students`
--

INSERT INTO `students` (`id`, `student`, `goal`, `collected`, `etnia_cor`, `pcd`, `tipoArea`, `curso`) VALUES
(1, '0x14723A09ACff6D2A60DcdF7aA4AFf308FDDC160C', '100.00', '10.00', 1, 1, 1, 3),
(2, '0xCA35b7d915458EF540aDe6068dFe2F44E8fa733c', '120.00', '80.55', 2, 1, 2, 2),
(3, '0x0A098Eda01Ce92ff4A4CCb7A4fFFb5A43EBC70DC', '150.00', '54.00', 3, 2, 2, 4);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
