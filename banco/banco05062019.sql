-- --------------------------------------------------------
-- Servidor:                     sql177.main-hosting.eu
-- Versão do servidor:           10.2.23-MariaDB - MariaDB Server
-- OS do Servidor:               Linux
-- HeidiSQL Versão:              10.1.0.5464
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Copiando estrutura do banco de dados para u270517400_ag
CREATE DATABASE IF NOT EXISTS `u270517400_ag` /*!40100 DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci */;
USE `u270517400_ag`;

-- Copiando estrutura para tabela u270517400_ag.eventos
CREATE TABLE IF NOT EXISTS `eventos` (
  `id_evento` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `color` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `start_date` date NOT NULL,
  `start_hora` time NOT NULL,
  `fim_date` date NOT NULL,
  `fim_hora` time NOT NULL,
  `info_add` longtext COLLATE utf8_unicode_ci NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `id_pet` int(11) unsigned NOT NULL,
  PRIMARY KEY (`id_evento`),
  KEY `FK_eventos_pets` (`id_pet`),
  CONSTRAINT `FK_eventos_pets` FOREIGN KEY (`id_pet`) REFERENCES `pets` (`id_pet`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Copiando dados para a tabela u270517400_ag.eventos: ~2 rows (aproximadamente)
/*!40000 ALTER TABLE `eventos` DISABLE KEYS */;
INSERT INTO `eventos` (`id_evento`, `title`, `color`, `start_date`, `start_hora`, `fim_date`, `fim_hora`, `info_add`, `status`, `id_pet`) VALUES
	(1, 'Banho e tosa', '#0000FF', '2019-03-08', '12:03:08', '2019-03-08', '13:00:00', 'cssjdgsavkshviasudsiucsdui', 1, 17),
	(2, 'Vacina', '#FFFF00', '2019-03-08', '13:12:00', '2019-03-08', '14:00:00', 'fyckgkkyjyjyjh', 1, 17),
	(3, 'Vacina', '#FFFF00', '2019-12-23', '23:00:00', '0000-00-00', '00:00:00', 'uisosduouofuououiodsusi', 1, 14),
	(4, 'Vacina', '#FFFF00', '2019-03-07', '13:00:00', '2019-03-02', '14:31:00', 'yaugauycakscksaycfayfu', 1, 15),
	(5, 'Vacina', '#FFFF00', '2019-03-07', '13:00:00', '0000-00-00', '00:00:00', 'hijfwkjkqwefwlfweofwilelh', 1, 14),
	(6, 'Banho e tosa', '#0000FF', '2019-03-05', '14:00:00', '2019-03-05', '15:00:00', 'cdshbidwdibiid\r\n', 1, 14),
	(7, 'Banho e tosa', '#0000FF', '2019-03-06', '16:00:00', '2019-03-06', '17:00:00', 'dvsdvsfbdsfbdsgbdbdbdsbfd', 1, 17),
	(8, 'Banho e tosa', '#0000FF', '2019-03-06', '18:00:00', '2019-03-06', '17:00:00', 'dvsdvsfbdsfbdsgbdbdbdsbfd', 1, 17),
	(9, 'Vernifugo', '#008000', '2019-04-10', '13:00:00', '0000-00-00', '00:00:00', 'sdfbfbbab vfvavasva bdfbfbfb', 1, 14),
	(10, 'Vacina', '#FFFF00', '2019-05-24', '16:00:00', '2019-05-24', '17:00:00', 'yucdciyagiaooiahso', 1, 14),
	(11, 'Banho e tosa', '#0000FF', '2019-05-24', '13:00:00', '2019-05-24', '14:00:00', 'vsdjvndssv', 1, 17),
	(12, 'Vernifugo', '#008000', '2019-05-27', '18:00:00', '2019-05-27', '19:00:00', 'djsnvovwnvdodwo', 1, 2),
	(13, 'Banho e tosa', '#0000FF', '2019-05-29', '16:00:00', '2019-05-29', '17:00:00', 'vkds dkd kjskjs n jslkjsklklj', 1, 2),
	(14, 'Vernifugo', '#008000', '2019-05-29', '17:00:00', '2019-05-29', '18:00:00', ' j ndj sdj ldsj jd  djk jd j klj kalj ', 1, 17),
	(15, 'Vacina', '#FFFF00', '2019-06-04', '22:00:00', '2019-06-04', '00:00:00', 'sdhvbsovosbovsaia', 1, 17);
/*!40000 ALTER TABLE `eventos` ENABLE KEYS */;

-- Copiando estrutura para tabela u270517400_ag.pets
CREATE TABLE IF NOT EXISTS `pets` (
  `id_pet` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `nome_pet` varchar(30) CHARACTER SET utf8 NOT NULL,
  `raca` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `especie` varchar(30) CHARACTER SET utf8 NOT NULL,
  `sexo` varchar(5) CHARACTER SET utf8 NOT NULL,
  `idade` int(3) NOT NULL,
  `peso` float NOT NULL,
  `info_add` longtext CHARACTER SET utf8 NOT NULL,
  `id_propri` int(11) unsigned NOT NULL,
  PRIMARY KEY (`id_pet`),
  KEY `id_propri` (`id_propri`),
  CONSTRAINT `FK_pets_proprietario` FOREIGN KEY (`id_propri`) REFERENCES `proprietario` (`id_propri`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Copiando dados para a tabela u270517400_ag.pets: ~7 rows (aproximadamente)
/*!40000 ALTER TABLE `pets` DISABLE KEYS */;
INSERT INTO `pets` (`id_pet`, `nome_pet`, `raca`, `especie`, `sexo`, `idade`, `peso`, `info_add`, `id_propri`) VALUES
	(2, 'kiara', 'pudou', 'Canino', 'Macho', 21, 23.34, 'scsvdsvsavsadvsa', 6),
	(8, 'dara', 'pudou', 'Canino', 'Femia', 3, 6.89, 'Ela e preguiçosa e morde!', 6),
	(11, 'figo', 'vira-lata', 'Felino', 'Macho', 3, 3.45, 'sakdcbksdjvpabvdbj', 6),
	(14, 'jair', 'vira-lata', 'Canino', 'Macho', 5, 5.98, 'sdjkvalnvlkjv wkpoafnawioo odoisadhfoa osdjf´sajó sdiodjio diçdjoj sdioadj´jf adojado aopjo´djof j´dkoDFÃDJFO ADOPA ADCIOO´DS ´KVO ´ój´rrjpoo rofdojdfóvj´dfvjp joffovjoovjov ásfovs´vjoj´sfjvófjvjfvojdopvpjvjx pokojfvjsojvdsfvjspovjs´pasojvosovjsop jasdvjoj svpoj sjvoj sdvsj jsdoi´jovsj´sdoj vdsjsd´vjodsvj ´sd sdjsdv josdopdsjopvasj sdvksdvjopvjsfokpoadsjv opsdvj podsvjpodsjvsojv sdv~jsdovjsojovkospdjv sadvosjdvopjsadovjos adsjopdsjvsdopjv sodvjsjvójs vvjopvjsopjv jskvokspvjasopj sdjpõsjvopjsa ojss~pojvospjv.\r\nhfoasdboasjbvvadspsa sdiovjpsdioviosajdsiv iodsjiosdjsaio sdvjóidsjvio odsfjoisdj isdjisdj´jsdios´dsoopj´sdojosad ´posdosdpo  ´sdojpo ddópoojospdjosdpo opsdoodjodsodpvo  opsdfsdod[ sdodspjvpojds osdjfopsdfjs jsdodofásj  ssjsdópdfjop sdosd´fjsdpofj sdosdopds[fposo poasdofjodsjopsdf dsop´dsjposdffpdsj sdopojsodfjsdopo sd.', 13),
	(15, 'thor', 'Sem raça', 'Felino', 'Femia', 5, 6.89, 'Lorem ipsum porta ad litora quisque posuere tristique mauris inceptos, bibendum lacus ultricies integer quisque pharetra lacus luctus non duis, luctus congue sapien lobortis eget donec phasellus scelerisque. commodo nec mollis donec ac mauris aliquet neque, dapibus neque feugiat hac sollicitudin morbi leo proin, augue malesuada diam nullam lorem potenti. orci ullamcorper feugiat nullam lorem enim ut ornare urna ut, est rhoncus vitae tellus donec at suscipit eget, id dictum in ultricies interdum laoreet dolor orci. eget vestibulum suspendisse sapien auctor habitasse volutpat amet massa, sollicitudin scelerisque curae cras vulputate ante mi posuere, fringilla dui bibendum proin egestas risus rutrum. \r\nLorem ipsum porta ad litora quisque posuere tristique mauris inceptos, bibendum lacus ultricies integer quisque pharetra lacus luctus non duis, luctus congue sapien lobortis eget donec phasellus scelerisque. commodo nec mollis donec ac mauris aliquet neque, dapibus neque feugiat hac sollicitudin morbi leo proin, augue malesuada diam nullam lorem potenti. orci ullamcorper feugiat nullam lorem enim ut ornare urna ut, est rhoncus vitae tellus donec at suscipit eget, id dictum in ultricies interdum laoreet dolor orci. eget vestibulum suspendisse sapien auctor habitasse volutpat amet massa, sollicitudin scelerisque curae cras vulputate ante mi posuere, fringilla dui bibendum proin egestas risus rutrum. \r\nLorem ipsum porta ad litora quisque posuere tristique mauris inceptos, bibendum lacus ultricies integer quisque pharetra lacus luctus non duis, luctus congue sapien lobortis eget donec phasellus scelerisque. commodo nec mollis donec ac mauris aliquet neque, dapibus neque feugiat hac sollicitudin morbi leo proin, augue malesuada diam nullam lorem potenti. orci ullamcorper feugiat nullam lorem enim ut ornare urna ut, est rhoncus vitae tellus donec at suscipit eget, id dictum in ultricies interdum laoreet dolor orci. eget vestibulum suspendisse sapien auctor habitasse volutpat amet massa, sollicitudin scelerisque curae cras vulputate ante mi posuere, fringilla dui bibendum proin egestas risus rutrum. \r\nLorem ipsum porta ad litora quisque posuere tristique mauris inceptos, bibendum lacus ultricies integer quisque pharetra lacus luctus non duis, luctus congue sapien lobortis eget donec phasellus scelerisque. commodo nec mollis donec ac mauris aliquet neque, dapibus neque feugiat hac sollicitudin morbi leo proin, augue malesuada diam nullam lorem potenti. orci ullamcorper feugiat nullam lorem enim ut ornare urna ut, est rhoncus vitae tellus donec at suscipit eget, id dictum in ultricies interdum laoreet dolor orci. eget vestibulum suspendisse sapien auctor habitasse volutpat amet massa, sollicitudin scelerisque curae cras vulputate ante mi posuere, fringilla dui bibendum proin egestas risus rutrum. ', 13),
	(16, 'dara', 'podou', 'Canino', 'Femia', 5, 5.98, 'Lorem ipsum porta ad litora quisque posuere tristique mauris inceptos, bibendum lacus ultricies integer quisque pharetra lacus luctus non duis, luctus congue sapien lobortis eget donec phasellus scelerisque. commodo nec mollis donec ac mauris aliquet neque, dapibus neque feugiat hac sollicitudin morbi leo proin, augue malesuada diam nullam lorem potenti. orci ullamcorper feugiat nullam lorem enim ut ornare urna ut, est rhoncus vitae tellus donec at suscipit eget, id dictum in ultricies interdum laoreet dolor orci. eget vestibulum suspendisse sapien auctor habitasse volutpat amet massa, sollicitudin scelerisque curae cras vulputate ante mi posuere, fringilla dui bibendum proin egestas risus rutrum. \r\nLorem ipsum porta ad litora quisque posuere tristique mauris inceptos, bibendum lacus ultricies integer quisque pharetra lacus luctus non duis, luctus congue sapien lobortis eget donec phasellus scelerisque. commodo nec mollis donec ac mauris aliquet neque, dapibus neque feugiat hac sollicitudin morbi leo proin, augue malesuada diam nullam lorem potenti. orci ullamcorper feugiat nullam lorem enim ut ornare urna ut, est rhoncus vitae tellus donec at suscipit eget, id dictum in ultricies interdum laoreet dolor orci. eget vestibulum suspendisse sapien auctor habitasse volutpat amet massa, sollicitudin scelerisque curae cras vulputate ante mi posuere, fringilla dui bibendum proin egestas risus rutrum. \r\nLorem ipsum porta ad litora quisque posuere tristique mauris inceptos, bibendum lacus ultricies integer quisque pharetra lacus luctus non duis, luctus congue sapien lobortis eget donec phasellus scelerisque. commodo nec mollis donec ac mauris aliquet neque, dapibus neque feugiat hac sollicitudin morbi leo proin, augue malesuada diam nullam lorem potenti. orci ullamcorper feugiat nullam lorem enim ut ornare urna ut, est rhoncus vitae tellus donec at suscipit eget, id dictum in ultricies interdum laoreet dolor orci. eget vestibulum suspendisse sapien auctor habitasse volutpat amet massa, sollicitudin scelerisque curae cras vulputate ante mi posuere, fringilla dui bibendum proin egestas risus rutrum. \r\nLorem ipsum porta ad litora quisque posuere tristique mauris inceptos, bibendum lacus ultricies integer quisque pharetra lacus luctus non duis, luctus congue sapien lobortis eget donec phasellus scelerisque. commodo nec mollis donec ac mauris aliquet neque, dapibus neque feugiat hac sollicitudin morbi leo proin, augue malesuada diam nullam lorem potenti. orci ullamcorper feugiat nullam lorem enim ut ornare urna ut, est rhoncus vitae tellus donec at suscipit eget, id dictum in ultricies interdum laoreet dolor orci. eget vestibulum suspendisse sapien auctor habitasse volutpat amet massa, sollicitudin scelerisque curae cras vulputate ante mi posuere, fringilla dui bibendum proin egestas risus rutrum. \r\nLorem ipsum porta ad litora quisque posuere tristique mauris inceptos, bibendum lacus ultricies integer quisque pharetra lacus luctus non duis, luctus congue sapien lobortis eget donec phasellus scelerisque. commodo nec mollis donec ac mauris aliquet neque, dapibus neque feugiat hac sollicitudin morbi leo proin, augue malesuada diam nullam lorem potenti. orci ullamcorper feugiat nullam lorem enim ut ornare urna ut, est rhoncus vitae tellus donec at suscipit eget, id dictum in ultricies interdum laoreet dolor orci. eget vestibulum suspendisse sapien auctor habitasse volutpat amet massa, sollicitudin scelerisque curae cras vulputate ante mi posuere, fringilla dui bibendum proin egestas risus rutru.\r\nLorem ipsum porta ad litora quisque posuere tristique mauris inceptos, bibendum lacus ultricies integer quisque pharetra lacus luctus non duis, luctus congue sapien lobortis eget donec phasellus scelerisque. commodo nec mollis donec ac mauris aliquet neque, dapibus neque feugiat hac sollicitudin morbi leo proin, augue malesuada diam nullam lorem potenti. orci ullamcorper feugiat nullam lorem enim ut ornare urna ut, est rhoncus vitae tellus donec at suscipit eget, id dictum in ultricies interdum laoreet dolor orci. eget vestibulum suspendisse sapien auctor habitasse volutpat amet massa, sollicitudin scelerisque curae cras vulputate ante mi posuere, fringilla dui bibendum proin egestas risus rutrum. ', 13),
	(17, 'Bidu', 'Pudou', 'Canino', 'Macho', 4, 4.9, 'vsduvasg vusaivga siuviugv iugdvouasv ugSIU DGVS ugvu asdv iuasiudg voiad sgvi uasu gads uguiagduf gasudgf xasugfo iuads fusadiufgi sadugfiuasdgiofug adsuifgiudsguid sgiufgadsugf iuasgdiofugasioufi udfuasgiU IGidugiasg diuHIUAIO GWIOGFUGF IUSDFGSDUG liugfiud giuegr iuggasi', 14);
/*!40000 ALTER TABLE `pets` ENABLE KEYS */;

-- Copiando estrutura para tabela u270517400_ag.proprietario
CREATE TABLE IF NOT EXISTS `proprietario` (
  `id_propri` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `cpf` varchar(11) CHARACTER SET utf8 NOT NULL DEFAULT '0',
  `nome_propri` varchar(30) CHARACTER SET utf8 NOT NULL DEFAULT '0',
  `pais` varchar(30) CHARACTER SET utf8 NOT NULL DEFAULT '0',
  `estado` varchar(30) CHARACTER SET utf8 NOT NULL DEFAULT '0',
  `cidade` varchar(30) CHARACTER SET utf8 NOT NULL DEFAULT '0',
  `bairro` varchar(30) CHARACTER SET utf8 NOT NULL DEFAULT '0',
  `rua` varchar(30) CHARACTER SET utf8 NOT NULL DEFAULT '0',
  `numero` varchar(50) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `telefone` varchar(50) CHARACTER SET utf8 NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_propri`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Copiando dados para a tabela u270517400_ag.proprietario: ~2 rows (aproximadamente)
/*!40000 ALTER TABLE `proprietario` DISABLE KEYS */;
INSERT INTO `proprietario` (`id_propri`, `cpf`, `nome_propri`, `pais`, `estado`, `cidade`, `bairro`, `rua`, `numero`, `telefone`) VALUES
	(6, '34235252534', 'Tonya jamyle', 'brasil', 'minas gerais', 'contagem', 'sapucaias', 'esmeralda', '144', '23 4432349930'),
	(13, '34567623456', 'joaqui da Silva', 'brasil', 'minas gerais', 'contagem', 'tropical', '4', '123', '55 31 989976756'),
	(14, '65876543876', 'Pricila', 'brasil', 'MG', 'Contagem', 'Citrolandia', '4', '122', '31 24536787');
/*!40000 ALTER TABLE `proprietario` ENABLE KEYS */;

-- Copiando estrutura para tabela u270517400_ag.usuarios
CREATE TABLE IF NOT EXISTS `usuarios` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `email` varchar(50) CHARACTER SET utf8 NOT NULL DEFAULT '0',
  `senha` varchar(32) CHARACTER SET utf8 NOT NULL DEFAULT '0',
  `nome` varchar(100) CHARACTER SET utf8 NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Copiando dados para a tabela u270517400_ag.usuarios: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `usuarios` DISABLE KEYS */;
INSERT INTO `usuarios` (`id`, `email`, `senha`, `nome`) VALUES
	(1, 'igorsiqueira.adm@gmail.com', '698dc19d489c4e4db73e28a713eab07b', 'teste');
/*!40000 ALTER TABLE `usuarios` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
