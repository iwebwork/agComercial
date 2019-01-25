-- --------------------------------------------------------
-- Servidor:                     127.0.0.1
-- Versão do servidor:           5.6.17 - MySQL Community Server (GPL)
-- OS do Servidor:               Win32
-- HeidiSQL Versão:              10.0.0.5460
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Copiando estrutura do banco de dados para u270517400_ag
CREATE DATABASE IF NOT EXISTS `u270517400_ag` /*!40100 DEFAULT CHARACTER SET utf8 */;
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

-- Copiando dados para a tabela u270517400_ag.events: ~2 rows (aproximadamente)
/*!40000 ALTER TABLE `events` DISABLE KEYS */;
INSERT INTO `events` (`id`, `title`, `color`, `start`, `end`) VALUES
	(1, 'almoço', '#0071c5', '2018-12-04 15:00:00', '2018-12-04 16:00:00'),
	(2, 'reuniao', '#40e0d0', '2018-12-05 14:50:00', '2018-12-05 16:00:00');
/*!40000 ALTER TABLE `events` ENABLE KEYS */;

-- Copiando estrutura para tabela u270517400_ag.pets
CREATE TABLE IF NOT EXISTS `pets` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `nome_pet` varchar(30) CHARACTER SET utf8 NOT NULL,
  `especie` varchar(30) CHARACTER SET utf8 NOT NULL,
  `raca` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `sexo` varchar(5) CHARACTER SET utf8 NOT NULL,
  `idade` int(3) NOT NULL,
  `peso` float NOT NULL,
  `info_add` varchar(1000) CHARACTER SET utf8 NOT NULL,
  `id_propri` int(11) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_propri` (`id_propri`),
  CONSTRAINT `FK_pets_proprietario` FOREIGN KEY (`id_propri`) REFERENCES `proprietario` (`id_propri`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Copiando dados para a tabela u270517400_ag.pets: ~9 rows (aproximadamente)
/*!40000 ALTER TABLE `pets` DISABLE KEYS */;
INSERT INTO `pets` (`id`, `nome_pet`, `especie`, `raca`, `sexo`, `idade`, `peso`, `info_add`, `id_propri`) VALUES
	(2, 'kiara', 'Canino', 'pudou', 'Macho', 21, 23.34, 'scsvdsvsavsadvsa', 6),
	(7, 'bidu', 'Canino', 'pich', 'Femia', 13, 12.32, 'cwwqcqwvqsvsdcscsccss', 6),
	(8, 'dara', 'Canino', 'vira-lata', 'Femia', 3, 6.89, 'Ela e preguiçosa e morde!', 6),
	(9, 'thor', 'Canino', 'pudou', 'Macho', 5, 9.89, 'Ele não pode usar shampoo, pois tem alergia.', 12),
	(10, 'clara', 'Canino', 'pudou', 'Femia', 6, 5.89, 'Ela e nervosa.', 12),
	(11, 'figo', 'Canino', 'pich', 'Macho', 3, 3.45, 'sakdcbksdjvpabvdbj', 6),
	(13, 'brenner', 'Canino', 'pich', 'Macho', 3, 4.56, 'E preguiçoso', 13),
	(14, 'jair', 'Canino', 'pich', 'Macho', 5, 5.98, 'Não usa shampoo.', 13),
	(15, 'fiona', 'Canino', 'pudou', 'Femia', 5, 5.98, 'E alérgica a shampoo.', 14);
/*!40000 ALTER TABLE `pets` ENABLE KEYS */;

-- Copiando estrutura para tabela u270517400_ag.proprietario
CREATE TABLE IF NOT EXISTS `proprietario` (
  `id_propri` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `cpf` varchar(11) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `nome_propri` varchar(30) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `pais` varchar(30) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `estado` varchar(30) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `cidade` varchar(30) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `bairro` varchar(30) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `rua` varchar(30) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `numero` varchar(50) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `telefone` varchar(50) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_propri`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Copiando dados para a tabela u270517400_ag.proprietario: ~4 rows (aproximadamente)
/*!40000 ALTER TABLE `proprietario` DISABLE KEYS */;
INSERT INTO `proprietario` (`id_propri`, `cpf`, `nome_propri`, `pais`, `estado`, `cidade`, `bairro`, `rua`, `numero`, `telefone`) VALUES
	(6, '34235252534', 'tania', 'brasil', 'minas gerais', 'contagem', 'sapucaias', 'esmeralda', '144', '23 4432349930'),
	(12, '98786735625', 'Igor', 'brasil', 'minas gerais', 'belo horizonte', 'são luiz', 'rubi', '234', '31 998786775'),
	(13, '34567623456', 'joaqui', 'brasil', 'minas gerais', 'contagem', 'tropical', '4', '123', '31 989976756'),
	(14, '56725367286', 'Flora', 'brasil', 'minas gerais', 'Contagem', 'Tropical', '34', '31', '31 998907889');
/*!40000 ALTER TABLE `proprietario` ENABLE KEYS */;

-- Copiando estrutura para tabela u270517400_ag.usuarios
CREATE TABLE IF NOT EXISTS `usuarios` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `email` varchar(50) CHARACTER SET utf8 NOT NULL DEFAULT '0',
  `senha` varchar(32) CHARACTER SET utf8 NOT NULL DEFAULT '0',
  `nome` varchar(100) CHARACTER SET utf8 NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Copiando dados para a tabela u270517400_ag.usuarios: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `usuarios` DISABLE KEYS */;
INSERT INTO `usuarios` (`id`, `email`, `senha`, `nome`) VALUES
	(1, 'teste@teste.com', '698dc19d489c4e4db73e28a713eab07b', 'teste');
/*!40000 ALTER TABLE `usuarios` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
