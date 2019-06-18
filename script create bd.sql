-- --------------------------------------------------------
-- Servidor:                     127.0.0.1
-- Versão do servidor:           5.6.20-log - MySQL Community Server (GPL)
-- OS do Servidor:               Win32
-- HeidiSQL Versão:              10.1.0.5464
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Copiando estrutura do banco de dados para financas_gabriel_elizio
CREATE DATABASE IF NOT EXISTS `financas_gabriel_elizio` /*!40100 DEFAULT CHARACTER SET utf8 COLLATE utf8_bin */;
USE `financas_gabriel_elizio`;

-- Copiando estrutura para tabela financas_gabriel_elizio.categoria
CREATE TABLE IF NOT EXISTS `categoria` (
  `id_categoria` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `DESC_CATEGORIA` varchar(255) NOT NULL,
  `OBS_CATEGORIA` varchar(255) NOT NULL,
  PRIMARY KEY (`id_categoria`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8;

-- Copiando dados para a tabela financas_gabriel_elizio.categoria: ~21 rows (aproximadamente)
/*!40000 ALTER TABLE `categoria` DISABLE KEYS */;
INSERT INTO `categoria` (`id_categoria`, `DESC_CATEGORIA`, `OBS_CATEGORIA`) VALUES
	(1, 'ALIMENTAÃ‡ÃƒO', 'DESPESAS COM ALIMENTAÃ‡ÃƒO'),
	(2, 'CONDOMINIO', 'DESPESAS DE COIDOMINIO.'),
	(3, 'ENERGIA ELÃ‰TRICA', 'CONTAS DA CEMIG.'),
	(4, 'FARMÃCIA', 'FARMÃCIA'),
	(5, 'PRESENTE', 'PRESENTES'),
	(6, 'CASA', 'COMPRAS PARA CASA'),
	(7, 'IMPOSTOS', 'DIVIDAS COM IMPOSTOS DIVERSOS.'),
	(8, 'TELEFONE', 'GASTOS COM TELEFONE'),
	(9, 'AUTOMÃ“VEL', 'DESPESAS COM AUTOMÃ“VEL'),
	(10, 'VESTUÃRIO', 'SAPATOS,ROUPAS,ETC'),
	(11, 'INFORMÃTICA', 'INFORMÃTICA'),
	(12, 'COSMETICOS', 'PRODUTOS DE BELEZA'),
	(13, 'FILHO', 'DESPESAS COM O HERDEIRO'),
	(14, 'SUPERMERCADO', 'COMPRAS PARA CASA'),
	(15, 'COMBUSTÃVEL', 'COMBUSTÃVEL'),
	(16, 'SALÃƒO BELEZA', 'CORTES,UNHAS,ETC'),
	(17, 'ENTRETERIMENTO', 'CINEMAS E TEATROS,ETC'),
	(18, 'OUTROS', 'OUTROS'),
	(19, 'ESPORTES', 'ACADEMIA, MUSCULACAO'),
	(21, 'GAMES', 'JOGOS  E VIDEO-GAMES'),
	(22, 'ELETRODOMÃ‰STICO', 'ELETRODOMÃ‰STICO');
/*!40000 ALTER TABLE `categoria` ENABLE KEYS */;

-- Copiando estrutura para tabela financas_gabriel_elizio.forma_pagamento
CREATE TABLE IF NOT EXISTS `forma_pagamento` (
  `ID_FORMA_PAGAMENTO` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `FORMA_PAGAMENTO` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `DESC_FORMA_PAGAMENTO` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`ID_FORMA_PAGAMENTO`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- Copiando dados para a tabela financas_gabriel_elizio.forma_pagamento: ~10 rows (aproximadamente)
/*!40000 ALTER TABLE `forma_pagamento` DISABLE KEYS */;
INSERT INTO `forma_pagamento` (`ID_FORMA_PAGAMENTO`, `FORMA_PAGAMENTO`, `DESC_FORMA_PAGAMENTO`) VALUES
	(1, 'DÃ‰BITO LU BB', 'DÃ‰BITO NO BB DO LU.'),
	(2, 'DEBITO KIKI BB', 'DEBITO NA CC. DA KIKI'),
	(3, 'C.C ITAUCARD', 'CARTÃƒO DE CRÃ‰DITO ITAUCARD'),
	(4, 'C.C NUBANK', 'CARTÃƒO DE CRÃ‰DITO NUBANK'),
	(5, 'DÃ‰BITO BRADESCO', 'DÃ‰BITO AUTOMÃTICO BRADESCO'),
	(7, 'DINHEIRO', 'PAGAMENTO EM CÃ‰DULAS DE DINHEIRO'),
	(8, 'C.C. INTER', 'CARTÃƒO DE CRÃ‰DITO INTER'),
	(9, 'C.C. SANTANDER PRIME', 'CARTÃƒO DE CRÃ‰DITO SANTANDER PRIME'),
	(10, 'DÃ‰BITO CAIXA', 'DÃ‰BITO EM CONTA POUPANÃ‡A CAIXA'),
	(11, 'C.C MASTERCARD', 'CARTÃƒO DE CRÃ‰DITO MASTERCARD');
/*!40000 ALTER TABLE `forma_pagamento` ENABLE KEYS */;

-- Copiando estrutura para tabela financas_gabriel_elizio.movimentacoes
CREATE TABLE IF NOT EXISTS `movimentacoes` (
  `idFINANCAS` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `DESCRICAO` varchar(255) NOT NULL,
  `VALOR` float NOT NULL,
  `CATEGORIA` varchar(255) NOT NULL,
  `DATA_PAGAMENTO` date DEFAULT NULL,
  `DATA_VENCIMENTO` date DEFAULT NULL,
  `FORMA_PAGAMENTO` varchar(255) DEFAULT NULL,
  `TIPO` varchar(255) DEFAULT NULL,
  `SITUACAO` varchar(255) NOT NULL,
  `PARCELA` varchar(255) NOT NULL,
  `PARCELADO` varchar(4) NOT NULL,
  `LANCAMENTO` varchar(255) NOT NULL,
  `idUSUARIO` int(11) DEFAULT NULL,
  PRIMARY KEY (`idFINANCAS`)
) ENGINE=InnoDB AUTO_INCREMENT=92 DEFAULT CHARSET=utf8;

-- Copiando dados para a tabela financas_gabriel_elizio.movimentacoes: ~30 rows (aproximadamente)
/*!40000 ALTER TABLE `movimentacoes` DISABLE KEYS */;
INSERT INTO `movimentacoes` (`idFINANCAS`, `DESCRICAO`, `VALOR`, `CATEGORIA`, `DATA_PAGAMENTO`, `DATA_VENCIMENTO`, `FORMA_PAGAMENTO`, `TIPO`, `SITUACAO`, `PARCELA`, `PARCELADO`, `LANCAMENTO`, `idUSUARIO`) VALUES
	(1, 'Conta de Ãgua', 150.5, 'Casa', '2019-05-28', '2019-06-06', 'DÃ‰BITO BRADESCO', 'DÃ©bito', 'Pendente', 'Não', '0', '', NULL),
	(2, 'Conta de Luz', 160.3, 'ENERGIA ELÃ‰TRICA', '2019-05-28', '2019-06-10', 'DINHEIRO', 'DÃ©bito', 'Pago', 'NÃ£o', '0', '', NULL),
	(3, 'Pizzaria Minas', 39, 'ALIMENTAÃ‡ÃƒO', '2019-05-29', '2019-05-29', 'DEBITO KIKI BB', 'DÃ©bito', 'Pago', 'NÃ£o', '0', '', NULL),
	(6, 'DeclaraÃ§Ã£o Imposto de Renda 2019', 100, 'IMPOSTOS', '2019-05-29', '2019-05-30', 'C.C NUBANK', 'CrÃ©dito', 'Pago', 'NÃ£o', '0', '', NULL),
	(7, 'Material Escolar', 230, 'FILHO', '2019-06-04', '2019-06-04', 'C.C ITAUCARD', 'CrÃ©dito', 'Pago', 'NÃ£o', '0', '', NULL),
	(57, 'Teclado Razer', 700, 'INFORMÃTICA', '2019-05-31', '2019-06-11', 'DINHEIRO', 'CrÃ©dito', 'Pago', 'NÃ£o', '0', '', NULL),
	(68, 'Geladeira', 200, 'ELETRODOMÃ‰STICO', '2019-05-30', '2019-05-17', 'C.C MASTERCARD', 'CrÃ©dito', 'Pago', 'Sim', '10', 'Despeza', NULL),
	(69, 'Geladeira', 200, 'ELETRODOMÃ‰STICO', '0000-00-00', '2019-06-17', 'C.C MASTERCARD', 'CrÃ©dito', 'Pendente', 'Sim', '10', 'Despeza', NULL),
	(70, 'Geladeira', 200, 'ELETRODOMÃ‰STICO', '0000-00-00', '2019-07-17', 'C.C MASTERCARD', 'CrÃ©dito', 'Pendente', 'Sim', '10', 'Despeza', NULL),
	(71, 'Geladeira', 200, 'ELETRODOMÃ‰STICO', '0000-00-00', '2019-08-17', 'C.C MASTERCARD', 'CrÃ©dito', 'Pendente', 'Sim', '10', 'Despeza', NULL),
	(72, 'Geladeira', 200, 'ELETRODOMÃ‰STICO', '0000-00-00', '2019-09-17', 'C.C MASTERCARD', 'CrÃ©dito', 'Pendente', 'Sim', '10', 'Despeza', NULL),
	(73, 'Geladeira', 200, 'ELETRODOMÃ‰STICO', '0000-00-00', '2019-10-17', 'C.C MASTERCARD', 'CrÃ©dito', 'Pendente', 'Sim', '10', 'Despeza', NULL),
	(74, 'Geladeira', 200, 'ELETRODOMÃ‰STICO', '0000-00-00', '2019-11-17', 'C.C MASTERCARD', 'CrÃ©dito', 'Pendente', 'Sim', '10', 'Despeza', NULL),
	(75, 'Geladeira', 200, 'ELETRODOMÃ‰STICO', '0000-00-00', '2019-12-17', 'C.C MASTERCARD', 'CrÃ©dito', 'Pendente', 'Sim', '10', 'Despeza', NULL),
	(76, 'Geladeira', 200, 'ELETRODOMÃ‰STICO', '0000-00-00', '2020-01-17', 'C.C MASTERCARD', 'CrÃ©dito', 'Pendente', 'Sim', '10', 'Despeza', NULL),
	(77, 'Geladeira', 200, 'ELETRODOMÃ‰STICO', '0000-00-00', '2020-02-17', 'C.C MASTERCARD', 'CrÃ©dito', 'Pendente', 'Sim', '10', 'Despeza', NULL),
	(78, 'teste', 3750, 'CASA', '2019-05-31', '2019-05-31', 'C.C ITAUCARD', 'CrÃ©dito', 'Pago', 'Sim', '4', 'Despeza', NULL),
	(79, 'teste', 3750, 'CASA', '0000-00-00', '0000-00-00', 'C.C ITAUCARD', 'CrÃ©dito', 'Pendente', 'Sim', '4', 'Despeza', NULL),
	(80, 'teste', 3750, 'CASA', '0000-00-00', '2019-07-31', 'C.C ITAUCARD', 'CrÃ©dito', 'Pendente', 'Sim', '4', 'Despeza', NULL),
	(81, 'teste', 3750, 'CASA', '0000-00-00', '2019-08-31', 'C.C ITAUCARD', 'CrÃ©dito', 'Pendente', 'Sim', '4', 'Despeza', NULL),
	(82, 'almoÃ§o do dia', 1.4, 'ALIMENTAÃ‡ÃƒO', '2019-06-11', '2019-06-11', 'C.C. INTER', 'DÃ©bito', 'Pago', 'Sim', '10', 'Despeza', 380),
	(83, 'almoÃ§o do dia', 1.4, 'ALIMENTAÃ‡ÃƒO', '0000-00-00', '2019-07-11', 'C.C. INTER', 'DÃ©bito', 'Pendente', 'Sim', '10', 'Despeza', 380),
	(84, 'almoÃ§o do dia', 1.4, 'ALIMENTAÃ‡ÃƒO', '0000-00-00', '2019-08-11', 'C.C. INTER', 'DÃ©bito', 'Pendente', 'Sim', '10', 'Despeza', 380),
	(85, 'almoÃ§o do dia', 1.4, 'ALIMENTAÃ‡ÃƒO', '0000-00-00', '2019-09-11', 'C.C. INTER', 'DÃ©bito', 'Pendente', 'Sim', '10', 'Despeza', 380),
	(86, 'almoÃ§o do dia', 1.4, 'ALIMENTAÃ‡ÃƒO', '0000-00-00', '2019-10-11', 'C.C. INTER', 'DÃ©bito', 'Pendente', 'Sim', '10', 'Despeza', 380),
	(87, 'almoÃ§o do dia', 1.4, 'ALIMENTAÃ‡ÃƒO', '0000-00-00', '2019-11-11', 'C.C. INTER', 'DÃ©bito', 'Pendente', 'Sim', '10', 'Despeza', 380),
	(88, 'almoÃ§o do dia', 1.4, 'ALIMENTAÃ‡ÃƒO', '0000-00-00', '2019-12-11', 'C.C. INTER', 'DÃ©bito', 'Pendente', 'Sim', '10', 'Despeza', 380),
	(89, 'almoÃ§o do dia', 1.4, 'ALIMENTAÃ‡ÃƒO', '0000-00-00', '2020-01-11', 'C.C. INTER', 'DÃ©bito', 'Pendente', 'Sim', '10', 'Despeza', 380),
	(90, 'almoÃ§o do dia', 1.4, 'ALIMENTAÃ‡ÃƒO', '0000-00-00', '2020-02-11', 'C.C. INTER', 'DÃ©bito', 'Pendente', 'Sim', '10', 'Despeza', 380),
	(91, 'almoÃ§o do dia', 1.4, 'ALIMENTAÃ‡ÃƒO', '0000-00-00', '2020-03-11', 'C.C. INTER', 'DÃ©bito', 'Pendente', 'Sim', '10', 'Despeza', 380);
/*!40000 ALTER TABLE `movimentacoes` ENABLE KEYS */;

-- Copiando estrutura para tabela financas_gabriel_elizio.usuario
CREATE TABLE IF NOT EXISTS `usuario` (
  `COD_Usuario` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `cpf` varchar(255) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `login` varchar(255) NOT NULL,
  `senha` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `perfil` int(11) NOT NULL,
  `cont_acesso` int(10) DEFAULT '0',
  `path_avatar` varchar(1024) DEFAULT 'img\\avatar.png',
  `ultimo_acesso` varchar(255) DEFAULT 'Nunca Acessou',
  `informacoes` varchar(1024) DEFAULT 'Sem Informações',
  PRIMARY KEY (`COD_Usuario`),
  UNIQUE KEY `ConstraintUnicos` (`cpf`,`login`,`email`)
) ENGINE=InnoDB AUTO_INCREMENT=382 DEFAULT CHARSET=latin1;

-- Copiando dados para a tabela financas_gabriel_elizio.usuario: ~3 rows (aproximadamente)
/*!40000 ALTER TABLE `usuario` DISABLE KEYS */;
INSERT INTO `usuario` (`COD_Usuario`, `cpf`, `nome`, `login`, `senha`, `email`, `perfil`, `cont_acesso`, `path_avatar`, `ultimo_acesso`, `informacoes`) VALUES
	(379, '112.145.164-14', 'teste', 'teste2', '698dc19d489c4e4db73e28a713eab07b', 'teste@hotmail.com', 0, 0, 'img\\avatar.png', 'Nunca Acessou', 'Sem Informações'),
	(380, '123', '123', '123', '202cb962ac59075b964b07152d234b70', '123', 0, 0, 'img\\avatar.png', 'Nunca Acessou', 'Sem Informações'),
	(381, '123456', 'Gabriel', 'admin', '202cb962ac59075b964b07152d234b70', 'admin@teste.com', 0, 0, 'img\\avatar.png', 'Nunca Acessou', 'Sem Informações');
/*!40000 ALTER TABLE `usuario` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
