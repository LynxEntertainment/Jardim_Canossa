-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 19, 2016 at 06:15 AM
-- Server version: 5.7.14
-- PHP Version: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `jardim_canossa`
--

-- --------------------------------------------------------

--
-- Table structure for table `foto`
--

CREATE TABLE `foto` (
  `id_foto` int(11) NOT NULL,
  `FK_galeria` int(11) NOT NULL,
  `caminho_foto` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `galeria`
--

CREATE TABLE `galeria` (
  `id_galeria` int(11) NOT NULL,
  `data_galeria` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Triggers `galeria`
--
DELIMITER $$
CREATE TRIGGER `excluir_foto` AFTER DELETE ON `galeria` FOR EACH ROW DELETE FROM foto
WHERE FK_galeria = OLD.id_galeria
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `galeria_idioma`
--

CREATE TABLE `galeria_idioma` (
  `FK_idioma` int(11) NOT NULL,
  `FK_galeria` int(11) NOT NULL,
  `titulo_galeria` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `descricao_galeria` varchar(500) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Stand-in structure for view `galeria_join`
-- (See below for the actual view)
--
CREATE TABLE `galeria_join` (
`id_galeria` int(11)
,`titulo_galeria` varchar(50)
,`descricao_galeria` varchar(500)
,`data_galeria` datetime
,`idioma_galeria` varchar(5)
);

-- --------------------------------------------------------

--
-- Table structure for table `idioma`
--

CREATE TABLE `idioma` (
  `id_idioma` int(11) NOT NULL,
  `nome_idioma` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `sigla_idioma` varchar(5) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `idioma`
--

INSERT INTO `idioma` (`id_idioma`, `nome_idioma`, `sigla_idioma`) VALUES
(1, 'Português Brasileiro', 'por'),
(2, 'Inglês', 'eng'),
(3, 'Italiano', 'ita');

-- --------------------------------------------------------

--
-- Table structure for table `usuario`
--

CREATE TABLE `usuario` (
  `id_usuario` int(11) NOT NULL,
  `nome_usuario` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `sobrenome_usuario` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `login_usuario` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `senha_usuario` varchar(32) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `usuario`
--

INSERT INTO `usuario` (`id_usuario`, `nome_usuario`, `sobrenome_usuario`, `login_usuario`, `senha_usuario`) VALUES
(1, 'José Elias', 'Fernandes', 'ZeEliasF', '9bf63332e64256c5e7f9d66cb3b1831d');

-- --------------------------------------------------------

--
-- Structure for view `galeria_join`
--
DROP TABLE IF EXISTS `galeria_join`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `galeria_join`  AS  select `galeria_idioma`.`FK_galeria` AS `id_galeria`,`galeria_idioma`.`titulo_galeria` AS `titulo_galeria`,`galeria_idioma`.`descricao_galeria` AS `descricao_galeria`,`galeria`.`data_galeria` AS `data_galeria`,`idioma`.`sigla_idioma` AS `idioma_galeria` from ((`galeria_idioma` join `galeria` on((`galeria_idioma`.`FK_galeria` = `galeria`.`id_galeria`))) join `idioma` on((`galeria_idioma`.`FK_idioma` = `idioma`.`id_idioma`))) ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `foto`
--
ALTER TABLE `foto`
  ADD PRIMARY KEY (`id_foto`,`FK_galeria`),
  ADD KEY `FK_galeria` (`FK_galeria`);

--
-- Indexes for table `galeria`
--
ALTER TABLE `galeria`
  ADD PRIMARY KEY (`id_galeria`);

--
-- Indexes for table `galeria_idioma`
--
ALTER TABLE `galeria_idioma`
  ADD PRIMARY KEY (`FK_idioma`,`FK_galeria`),
  ADD KEY `FK_galeria` (`FK_galeria`);

--
-- Indexes for table `idioma`
--
ALTER TABLE `idioma`
  ADD PRIMARY KEY (`id_idioma`);

--
-- Indexes for table `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id_usuario`),
  ADD UNIQUE KEY `login_usuario` (`login_usuario`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `foto`
--
ALTER TABLE `foto`
  MODIFY `id_foto` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `galeria`
--
ALTER TABLE `galeria`
  MODIFY `id_galeria` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `idioma`
--
ALTER TABLE `idioma`
  MODIFY `id_idioma` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
