-- --------------------------------------------------------
-- Servidor:                     sql177.main-hosting.eu
-- Versão do servidor:           10.2.18-MariaDB - MariaDB Server
-- OS do Servidor:               Linux
-- HeidiSQL Versão:              9.5.0.5196
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Copiando estrutura do banco de dados para u270517400_ag
CREATE DATABASE IF NOT EXISTS `u270517400_ag` /*!40100 DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci */;
USE `u270517400_ag`;

-- Copiando estrutura para tabela u270517400_ag.events
CREATE TABLE IF NOT EXISTS `events` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(220) NOT NULL DEFAULT '0',
  `color` varchar(10) NOT NULL DEFAULT '0',
  `start` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `end` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- Exportação de dados foi desmarcado.
-- Copiando estrutura para tabela u270517400_ag.pets
CREATE TABLE IF NOT EXISTS `pets` (
  `id_pet` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nome_pet` varchar(30) CHARACTER SET utf8 NOT NULL,
  `especie` varchar(30) CHARACTER SET utf8 NOT NULL,
  `sexo` varchar(1) CHARACTER SET utf8 NOT NULL,
  `idade` int(3) NOT NULL,
  `peso` float NOT NULL,
  `info_add` varchar(300) CHARACTER SET utf8 NOT NULL,
  `id_pro` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id_pet`),
  KEY `FK_pets_proprietario` (`id_pro`),
  CONSTRAINT `FK_pets_proprietario` FOREIGN KEY (`id_pro`) REFERENCES `proprietario` (`id_propri`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Exportação de dados foi desmarcado.
-- Copiando estrutura para tabela u270517400_ag.proprietario
CREATE TABLE IF NOT EXISTS `proprietario` (
  `id_propri` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `cpf` varchar(11) CHARACTER SET utf8 NOT NULL DEFAULT '0',
  `nome_propri` varchar(30) CHARACTER SET utf8 NOT NULL DEFAULT '0',
  `pais` varchar(30) CHARACTER SET utf8 NOT NULL DEFAULT '0',
  `estado` varchar(30) CHARACTER SET utf8 NOT NULL DEFAULT '0',
  `cidade` varchar(30) CHARACTER SET utf8 NOT NULL DEFAULT '0',
  `bairro` varchar(30) CHARACTER SET utf8 NOT NULL DEFAULT '0',
  `rua` varchar(30) CHARACTER SET utf8 NOT NULL DEFAULT '0',
  `numero` int(11) NOT NULL DEFAULT 0,
  `info_add` varchar(50) CHARACTER SET utf8 NOT NULL DEFAULT '0',
  `telefone` varchar(50) CHARACTER SET utf8 NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_propri`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Exportação de dados foi desmarcado.
-- Copiando estrutura para tabela u270517400_ag.usuarios
CREATE TABLE IF NOT EXISTS `usuarios` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `email` varchar(50) CHARACTER SET utf8 NOT NULL DEFAULT '0',
  `senha` varchar(32) CHARACTER SET utf8 NOT NULL DEFAULT '0',
  `nome` varchar(100) CHARACTER SET utf8 NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Exportação de dados foi desmarcado.
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
