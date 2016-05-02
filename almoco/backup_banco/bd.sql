-- --------------------------------------------------------
-- Servidor:                     localhost
-- Versão do servidor:           10.1.10-MariaDB - mariadb.org binary distribution
-- OS do Servidor:               Win32
-- HeidiSQL Versão:              9.3.0.4984
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Copiando estrutura do banco de dados para almoco
DROP DATABASE IF EXISTS `almoco`;
CREATE DATABASE IF NOT EXISTS `almoco` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `almoco`;


-- Copiando estrutura para tabela almoco.almoco
DROP TABLE IF EXISTS `almoco`;
CREATE TABLE IF NOT EXISTS `almoco` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_pessoa` int(11) NOT NULL DEFAULT '0',
  `id_cardapio` int(11) NOT NULL DEFAULT '0',
  `opcoes` varchar(100) NOT NULL DEFAULT '0',
  `data` date DEFAULT NULL,
  `dia_semana` varchar(10) DEFAULT NULL,
  `semana` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=48 DEFAULT CHARSET=latin1;

-- Copiando dados para a tabela almoco.almoco: ~18 rows (aproximadamente)
DELETE FROM `almoco`;
/*!40000 ALTER TABLE `almoco` DISABLE KEYS */;
INSERT INTO `almoco` (`id`, `id_pessoa`, `id_cardapio`, `opcoes`, `data`, `dia_semana`, `semana`) VALUES
	(14, 24, 1, 'arroz, feijão, teste', NULL, 'Terça', 17),
	(15, 24, 1, 'arroz, feijão, teste', NULL, 'Sexta', 17),
	(31, 53, 1, 'arroz, feijão, teste', NULL, 'Terça', 18),
	(32, 59, 1, 'arroz, feijão, teste', NULL, 'Segunda', 18),
	(33, 59, 1, 'arroz, feijão, teste', NULL, 'Terça', 18),
	(34, 59, 1, 'arroz, teste', NULL, 'Quinta', 18),
	(35, 59, 2, 'arroz', NULL, 'Segunda', NULL),
	(36, 59, 2, 'arroz', NULL, 'Terça', NULL),
	(37, 59, 2, 'arroz', NULL, 'Quarta', NULL),
	(38, 53, 1, 'arroz', NULL, 'Segunda', NULL),
	(39, 53, 1, 'arroz', NULL, 'Terça', NULL),
	(40, 53, 1, 'arroz', NULL, 'Sexta', NULL),
	(41, 53, 6, 'feijão', NULL, 'Quarta', NULL),
	(42, 53, 6, 'feijão', NULL, 'Quinta', NULL),
	(43, 63, 2, 'feijão, teste', NULL, 'Segunda', NULL),
	(44, 63, 2, 'feijão, teste', NULL, 'Quarta', NULL),
	(45, 63, 2, 'feijão, teste', NULL, 'Sexta', NULL),
	(46, 63, 6, 'arroz', NULL, 'Terça', NULL),
	(47, 63, 6, 'arroz', NULL, 'Quinta', NULL);
/*!40000 ALTER TABLE `almoco` ENABLE KEYS */;


-- Copiando estrutura para tabela almoco.cardapio
DROP TABLE IF EXISTS `cardapio`;
CREATE TABLE IF NOT EXISTS `cardapio` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cardapio` varchar(50) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- Copiando dados para a tabela almoco.cardapio: ~0 rows (aproximadamente)
DELETE FROM `cardapio`;
/*!40000 ALTER TABLE `cardapio` DISABLE KEYS */;
INSERT INTO `cardapio` (`id`, `cardapio`) VALUES
	(1, 'a');
/*!40000 ALTER TABLE `cardapio` ENABLE KEYS */;


-- Copiando estrutura para tabela almoco.cardapio_x_dia
DROP TABLE IF EXISTS `cardapio_x_dia`;
CREATE TABLE IF NOT EXISTS `cardapio_x_dia` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_dia` int(11) DEFAULT NULL,
  `id_cardapio` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

-- Copiando dados para a tabela almoco.cardapio_x_dia: ~1 rows (aproximadamente)
DELETE FROM `cardapio_x_dia`;
/*!40000 ALTER TABLE `cardapio_x_dia` DISABLE KEYS */;
INSERT INTO `cardapio_x_dia` (`id`, `id_dia`, `id_cardapio`) VALUES
	(6, 1, 1);
/*!40000 ALTER TABLE `cardapio_x_dia` ENABLE KEYS */;


-- Copiando estrutura para tabela almoco.ci_session
DROP TABLE IF EXISTS `ci_session`;
CREATE TABLE IF NOT EXISTS `ci_session` (
  `id` varchar(40) NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `timestamp` int(10) unsigned NOT NULL DEFAULT '0',
  `data` blob NOT NULL,
  PRIMARY KEY (`id`),
  KEY `ci_sessions_timestamp` (`timestamp`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Copiando dados para a tabela almoco.ci_session: ~57 rows (aproximadamente)
DELETE FROM `ci_session`;
/*!40000 ALTER TABLE `ci_session` DISABLE KEYS */;
INSERT INTO `ci_session` (`id`, `ip_address`, `timestamp`, `data`) VALUES
	('0141d31f0f6f5983a8651bdd031f58371173f292', '::1', 1462049473, _binary 0x5F5F63695F6C6173745F726567656E65726174657C693A313436323034393232323B6C6F6761646F7C693A313B706573736F617C733A373A226761627269656C223B69645F706573736F617C733A323A223539223B69645F70657266696C7C733A313A2231223B636F756E74735F74656D705F706573736F617C693A303B),
	('0465309198d316630a1d20c2259553298e443b55', '::1', 1462044530, _binary 0x5F5F63695F6C6173745F726567656E65726174657C693A313436323034343233333B6C6F6761646F7C693A313B706573736F617C733A373A226761627269656C223B69645F706573736F617C733A323A223539223B69645F70657266696C7C733A313A2231223B),
	('0c7025fd05c830dc2ba70a7a2ca8ed621557bf1f', '::1', 1462105669, _binary 0x5F5F63695F6C6173745F726567656E65726174657C693A313436323130353430363B6C6F6761646F7C693A313B706573736F617C733A373A226761627269656C223B69645F706573736F617C733A323A223539223B69645F70657266696C7C733A313A2231223B636F756E74735F74656D705F706573736F617C693A303B),
	('101702229d57eedf04c87f2952c3d975592f8d53', '::1', 1462103220, _binary 0x5F5F63695F6C6173745F726567656E65726174657C693A313436323130333035303B6C6F6761646F7C693A313B706573736F617C733A373A226761627269656C223B69645F706573736F617C733A323A223539223B69645F70657266696C7C733A313A2231223B),
	('10d3fbff8587d39c62455be291f4db38b24154ee', '::1', 1462049377, _binary 0x5F5F63695F6C6173745F726567656E65726174657C693A313436323034393232303B),
	('10e6ae3f186d254db68c620fe404d788e503839d', '::1', 1462048004, _binary 0x5F5F63695F6C6173745F726567656E65726174657C693A313436323034373731313B6C6F6761646F7C693A313B706573736F617C733A373A226761627269656C223B69645F706573736F617C733A323A223539223B69645F70657266696C7C733A313A2231223B636F756E74735F74656D705F706573736F617C693A303B),
	('16212dd3892490ea3943c6d0bda10dc2a65a95be', '::1', 1462106374, _binary 0x5F5F63695F6C6173745F726567656E65726174657C693A313436323130363336313B6C6F6761646F7C693A313B706573736F617C733A373A226761627269656C223B69645F706573736F617C733A323A223539223B69645F70657266696C7C733A313A2231223B636F756E74735F74656D705F706573736F617C693A303B),
	('17c4838c633e9fe55ef4bc5c64d81ed8b3b838b3', '::1', 1462043187, _binary 0x5F5F63695F6C6173745F726567656E65726174657C693A313436323034323936393B706573736F617C733A373A226761627269656C223B69645F706573736F617C733A323A223539223B69645F70657266696C7C733A313A2231223B636F756E74735F74656D705F706573736F617C693A303B6C6F6761646F7C693A313B),
	('23be192d0c77225c1408509b77d2660021d57907', '::1', 1462039144, _binary 0x5F5F63695F6C6173745F726567656E65726174657C693A313436323033393134303B),
	('2de4e13311dadbc2857879d99244457a9075a448', '::1', 1462108117, _binary 0x5F5F63695F6C6173745F726567656E65726174657C693A313436323130383131373B6C6F6761646F7C693A313B706573736F617C733A373A226761627269656C223B69645F706573736F617C733A323A223539223B69645F70657266696C7C733A313A2231223B636F756E74735F74656D705F706573736F617C693A303B),
	('32c6cc91126e0ca3c3935ef57772c664231e926d', '::1', 1462046928, _binary 0x5F5F63695F6C6173745F726567656E65726174657C693A313436323034363732303B6C6F6761646F7C693A313B706573736F617C733A373A226761627269656C223B69645F706573736F617C733A323A223539223B69645F70657266696C7C733A313A2231223B636F756E74735F74656D705F706573736F617C693A303B),
	('366562c7ebac71319e9a96d64118dad34776f65a', '::1', 1462038402, _binary 0x5F5F63695F6C6173745F726567656E65726174657C693A313436323033383430323B),
	('377808e53969baed83b2800bfa45a080ce680e41', '::1', 1462040970, _binary 0x5F5F63695F6C6173745F726567656E65726174657C693A313436323034303934393B),
	('3e5b0e295a6200c7fa55e9bf2ec860d5da2fc22f', '::1', 1462104302, _binary 0x5F5F63695F6C6173745F726567656E65726174657C693A313436323130343330323B),
	('3eeced4840b0644cf782587d90bba62f7c05fb6a', '::1', 1462048218, _binary 0x5F5F63695F6C6173745F726567656E65726174657C693A313436323034383031343B6C6F6761646F7C693A313B706573736F617C733A373A226761627269656C223B69645F706573736F617C733A323A223539223B69645F70657266696C7C733A313A2231223B636F756E74735F74656D705F706573736F617C693A303B),
	('4a30b2995d3abf7fefdc0d17bed0b4a04434cb23', '::1', 1462044972, _binary 0x5F5F63695F6C6173745F726567656E65726174657C693A313436323034343834383B6C6F6761646F7C693A313B706573736F617C733A373A226761627269656C223B69645F706573736F617C733A323A223539223B69645F70657266696C7C733A313A2231223B636F756E74735F74656D705F706573736F617C693A303B),
	('5149c66dc69041f55da0f6d894a60829a527062f', '::1', 1462038442, _binary 0x5F5F63695F6C6173745F726567656E65726174657C693A313436323033383433363B6C6F6761646F7C693A313B706573736F617C733A373A226761627269656C223B69645F706573736F617C733A323A223539223B69645F70657266696C7C733A313A2231223B),
	('56ad03b47f7e392fe6e7b63f57b72b65bc8afd35', '::1', 1462104303, _binary 0x5F5F63695F6C6173745F726567656E65726174657C693A313436323130343330333B),
	('5a908e708dcaca62bb6dd4327476761a800c19f1', '127.0.0.1', 1462195947, _binary 0x5F5F63695F6C6173745F726567656E65726174657C693A313436323139353934373B),
	('5b75c3791c12fe15d935a54d226ec15589877aa5', '::1', 1462108112, _binary 0x5F5F63695F6C6173745F726567656E65726174657C693A313436323130383131323B),
	('5daa5453bcd2b5773254f5d22f544076c6f27e2d', '::1', 1462040549, _binary 0x5F5F63695F6C6173745F726567656E65726174657C693A313436323034303534393B),
	('6dcaa225b064bc1065a25929e87ffe634ba527bc', '::1', 1462041205, _binary 0x5F5F63695F6C6173745F726567656E65726174657C693A313436323034313038313B706573736F617C733A373A226761627269656C223B69645F706573736F617C733A323A223539223B69645F70657266696C7C733A313A2231223B),
	('74faec12442d3323e0a692140eca2fc04b27ed31', '::1', 1462041079, _binary 0x5F5F63695F6C6173745F726567656E65726174657C693A313436323034313036303B),
	('7830ceb2449dd2210ee4109150d9ba3b464faf16', '::1', 1462101605, _binary 0x5F5F63695F6C6173745F726567656E65726174657C693A313436323130313630353B),
	('799bb7cdd909e39dd0c6182ec4283460a1b19ad0', '::1', 1462039557, _binary 0x5F5F63695F6C6173745F726567656E65726174657C693A313436323033393530393B706573736F617C733A373A226761627269656C223B69645F706573736F617C733A323A223539223B69645F70657266696C7C733A313A2231223B6C6F6761646F7C693A313B),
	('8b06c3d26db818dc9c15799d04b3a74a110ecf3e', '::1', 1462039433, _binary 0x5F5F63695F6C6173745F726567656E65726174657C693A313436323033393134363B706573736F617C733A373A226761627269656C223B69645F706573736F617C733A323A223539223B69645F70657266696C7C733A313A2231223B6C6F6761646F7C693A313B),
	('8ef09ba712739805d27320e4c5e69da490dade8b', '::1', 1462047639, _binary 0x5F5F63695F6C6173745F726567656E65726174657C693A313436323034373633393B),
	('9005b3d9797f39f7d9de8d21cf8557739aa9fc46', '::1', 1462102124, _binary 0x5F5F63695F6C6173745F726567656E65726174657C693A313436323130323037363B6C6F6761646F7C693A313B706573736F617C733A373A226761627269656C223B69645F706573736F617C733A323A223539223B69645F70657266696C7C733A313A2231223B),
	('91e77efa2709809573774a8ea8cb18f92fa0c468', '::1', 1462101605, _binary 0x5F5F63695F6C6173745F726567656E65726174657C693A313436323130313630353B),
	('999113694dd648b3fae1f69e637448c792f707db', '::1', 1462040637, _binary 0x5F5F63695F6C6173745F726567656E65726174657C693A313436323034303534333B706573736F617C733A373A226761627269656C223B69645F706573736F617C733A323A223539223B69645F70657266696C7C733A313A2231223B6C6F6761646F7C693A313B),
	('9d8e19d8cc277d67bcac0b773850e7d18cc70611', '::1', 1462101641, _binary 0x5F5F63695F6C6173745F726567656E65726174657C693A313436323130313334393B6C6F6761646F7C693A313B706573736F617C733A373A226761627269656C223B69645F706573736F617C733A323A223539223B69645F70657266696C7C733A313A2231223B),
	('a671485770f611ece3c5e11da20414626fdf564a', '::1', 1462106210, _binary 0x5F5F63695F6C6173745F726567656E65726174657C693A313436323130363032383B6C6F6761646F7C693A313B706573736F617C733A373A226761627269656C223B69645F706573736F617C733A323A223539223B69645F70657266696C7C733A313A2231223B636F756E74735F74656D705F706573736F617C693A303B),
	('a9e2d23482fa049c071d22b06d36b4a63d86ad48', '::1', 1462041052, _binary 0x5F5F63695F6C6173745F726567656E65726174657C693A313436323034313032373B),
	('ac6349ec4395a6eab588c6e117c69bf8620008a6', '::1', 1462102593, _binary 0x5F5F63695F6C6173745F726567656E65726174657C693A313436323130323339313B6C6F6761646F7C693A313B706573736F617C733A373A226761627269656C223B69645F706573736F617C733A323A223539223B69645F70657266696C7C733A313A2231223B),
	('b0975ca2eb2e339c082e375babb5cf2ade6164e8', '::1', 1462048988, _binary 0x5F5F63695F6C6173745F726567656E65726174657C693A313436323034383830323B6C6F6761646F7C693A313B706573736F617C733A373A226761627269656C223B69645F706573736F617C733A323A223539223B69645F70657266696C7C733A313A2231223B636F756E74735F74656D705F706573736F617C693A303B),
	('b4fd92fdb1072ac199972b5f44b8c25b4855085b', '::1', 1462038408, _binary 0x5F5F63695F6C6173745F726567656E65726174657C693A313436323033383339303B6C6F6761646F7C693A313B706573736F617C733A373A226761627269656C223B69645F706573736F617C733A323A223539223B69645F70657266696C7C733A313A2231223B),
	('b59566d822deeefc95a1b2b6d1124824da38ba58', '::1', 1462048730, _binary 0x5F5F63695F6C6173745F726567656E65726174657C693A313436323034383438333B6C6F6761646F7C693A313B706573736F617C733A373A226761627269656C223B69645F706573736F617C733A323A223539223B69645F70657266696C7C733A313A2231223B636F756E74735F74656D705F706573736F617C693A303B),
	('b83dbbb5f0e0c6902a5caa62adcb5b6e10b48265', '::1', 1462041621, _binary 0x5F5F63695F6C6173745F726567656E65726174657C693A313436323034313632313B706573736F617C733A373A226761627269656C223B69645F706573736F617C733A323A223539223B69645F70657266696C7C733A313A2231223B),
	('bbeae1d5e5b3474c640df7e0d9a746f8918e08e1', '::1', 1462043529, _binary 0x5F5F63695F6C6173745F726567656E65726174657C693A313436323034333237393B706573736F617C733A373A226761627269656C223B69645F706573736F617C733A323A223539223B69645F70657266696C7C733A313A2231223B636F756E74735F74656D705F706573736F617C693A303B6C6F6761646F7C693A313B),
	('c2893dbec8a10746c5126cb70718d978b87fd1c0', '::1', 1462101346, _binary 0x5F5F63695F6C6173745F726567656E65726174657C693A313436323130313334363B),
	('c46c28db9db902eeab6f5de14fcfac42ef9d8f85', '::1', 1462050277, _binary 0x5F5F63695F6C6173745F726567656E65726174657C693A313436323035303032363B6C6F6761646F7C693A313B706573736F617C733A373A226761627269656C223B69645F706573736F617C733A323A223539223B69645F70657266696C7C733A313A2231223B636F756E74735F74656D705F706573736F617C693A303B),
	('c4dd79ff08d6e2ed47cba98f0f30d0e7d2f376fb', '::1', 1462106021, _binary 0x5F5F63695F6C6173745F726567656E65726174657C693A313436323130353732363B6C6F6761646F7C693A313B706573736F617C733A373A226761627269656C223B69645F706573736F617C733A323A223539223B69645F70657266696C7C733A313A2231223B636F756E74735F74656D705F706573736F617C693A303B),
	('cd75b1feb37aedfbdaa830ca595f9df1c796e52f', '::1', 1462039124, _binary 0x5F5F63695F6C6173745F726567656E65726174657C693A313436323033393132343B),
	('d18fa9c3a295f25d79427a558a79a10fb39abe85', '::1', 1462105219, _binary 0x5F5F63695F6C6173745F726567656E65726174657C693A313436323130353031383B6C6F6761646F7C693A313B706573736F617C733A373A226761627269656C223B69645F706573736F617C733A323A223539223B69645F70657266696C7C733A313A2231223B636F756E74735F74656D705F706573736F617C693A303B),
	('d46b065b93356e1d84537e8cb78c7230a45479bd', '::1', 1462040999, _binary 0x5F5F63695F6C6173745F726567656E65726174657C693A313436323034303939393B),
	('dd972eb08442d08aab55c9e8285d45e6722a4f94', '::1', 1462044835, _binary 0x5F5F63695F6C6173745F726567656E65726174657C693A313436323034343534323B6C6F6761646F7C693A313B706573736F617C733A373A226761627269656C223B69645F706573736F617C733A323A223539223B69645F70657266696C7C733A313A2231223B636F756E74735F74656D705F706573736F617C693A303B),
	('e0b9e406d144c41a279145d61fb1f7a96981310e', '::1', 1462040994, _binary 0x5F5F63695F6C6173745F726567656E65726174657C693A313436323034303937353B),
	('e0fa9fcc0a5e261c1b3591a72c391d30a819ba6b', '::1', 1462046718, _binary 0x5F5F63695F6C6173745F726567656E65726174657C693A313436323034363731383B),
	('e221bdd5e9f871224f07667e2e60fe868b4cbcf6', '::1', 1462045552, _binary 0x5F5F63695F6C6173745F726567656E65726174657C693A313436323034353330343B6C6F6761646F7C693A313B706573736F617C733A373A226761627269656C223B69645F706573736F617C733A323A223539223B69645F70657266696C7C733A313A2231223B636F756E74735F74656D705F706573736F617C693A303B),
	('e630f2d908a0acac5322abe563945da10552fe43', '::1', 1462047674, _binary 0x5F5F63695F6C6173745F726567656E65726174657C693A313436323034373338353B6C6F6761646F7C693A313B706573736F617C733A373A226761627269656C223B69645F706573736F617C733A323A223539223B69645F70657266696C7C733A313A2231223B636F756E74735F74656D705F706573736F617C693A303B),
	('f2806f283df446593b94209a9202e41ec68ca180', '::1', 1462042847, _binary 0x5F5F63695F6C6173745F726567656E65726174657C693A313436323034323536393B706573736F617C733A363A22666C61766961223B69645F706573736F617C733A323A223633223B69645F70657266696C7C733A313A2232223B636F756E74735F74656D705F706573736F617C693A303B),
	('f3a8ae51382381abd226a9d77c53d0d673ef8af6', '::1', 1462104707, _binary 0x5F5F63695F6C6173745F726567656E65726174657C693A313436323130343532333B6C6F6761646F7C693A313B706573736F617C733A373A226761627269656C223B69645F706573736F617C733A323A223539223B69645F70657266696C7C733A313A2231223B636F756E74735F74656D705F706573736F617C693A303B),
	('f7365ed9828ad0d8caf76d1aa343c110adc6c25f', '::1', 1462040940, _binary 0x5F5F63695F6C6173745F726567656E65726174657C693A313436323034303933363B706573736F617C733A373A226761627269656C223B69645F706573736F617C733A323A223539223B69645F70657266696C7C733A313A2231223B),
	('f9276fe00748478ec62ccfb5aa8179d8ca579eae', '::1', 1462103012, _binary 0x5F5F63695F6C6173745F726567656E65726174657C693A313436323130323733313B6C6F6761646F7C693A313B706573736F617C733A373A226761627269656C223B69645F706573736F617C733A323A223539223B69645F70657266696C7C733A313A2231223B),
	('fab806f82ae8fc8895520290695b2cfb9a5f5f5d', '::1', 1462042554, _binary 0x5F5F63695F6C6173745F726567656E65726174657C693A313436323034323235383B706573736F617C733A373A226761627269656C223B69645F706573736F617C733A323A223539223B69645F70657266696C7C733A313A2231223B6C6F6761646F7C693A313B),
	('fb6a8e29695b304207953d7efb31d063271651f7', '::1', 1462103489, _binary 0x5F5F63695F6C6173745F726567656E65726174657C693A313436323130333335393B6C6F6761646F7C693A313B706573736F617C733A373A226761627269656C223B69645F706573736F617C733A323A223539223B69645F70657266696C7C733A313A2231223B636F756E74735F74656D705F706573736F617C693A303B),
	('fc7afc18d4fe081613634b059b29a372b0620d6e', '::1', 1462044226, _binary 0x5F5F63695F6C6173745F726567656E65726174657C693A313436323034343130383B706573736F617C733A373A226761627269656C223B69645F706573736F617C733A323A223539223B69645F70657266696C7C733A313A2231223B),
	('fc81c751cd8ed83a65ed079f01e364f641c270dc', '127.0.0.1', 1462195960, _binary 0x5F5F63695F6C6173745F726567656E65726174657C693A313436323139353935323B706573736F617C733A373A226761627269656C223B69645F706573736F617C733A323A223539223B69645F70657266696C7C733A313A2231223B);
/*!40000 ALTER TABLE `ci_session` ENABLE KEYS */;


-- Copiando estrutura para tabela almoco.opcoes
DROP TABLE IF EXISTS `opcoes`;
CREATE TABLE IF NOT EXISTS `opcoes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `opcao` varchar(50) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- Copiando dados para a tabela almoco.opcoes: ~2 rows (aproximadamente)
DELETE FROM `opcoes`;
/*!40000 ALTER TABLE `opcoes` DISABLE KEYS */;
INSERT INTO `opcoes` (`id`, `opcao`) VALUES
	(1, 'arroz'),
	(2, 'feijão'),
	(3, 'teste');
/*!40000 ALTER TABLE `opcoes` ENABLE KEYS */;


-- Copiando estrutura para tabela almoco.perfil
DROP TABLE IF EXISTS `perfil`;
CREATE TABLE IF NOT EXISTS `perfil` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `perfil` varchar(50) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- Copiando dados para a tabela almoco.perfil: ~2 rows (aproximadamente)
DELETE FROM `perfil`;
/*!40000 ALTER TABLE `perfil` DISABLE KEYS */;
INSERT INTO `perfil` (`id`, `perfil`) VALUES
	(1, 'Administrador'),
	(2, 'Comum');
/*!40000 ALTER TABLE `perfil` ENABLE KEYS */;


-- Copiando estrutura para tabela almoco.pessoas
DROP TABLE IF EXISTS `pessoas`;
CREATE TABLE IF NOT EXISTS `pessoas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(50) DEFAULT NULL,
  `id_perfil` varchar(50) DEFAULT NULL,
  `sobrenome` varchar(50) DEFAULT NULL,
  `telefone` varchar(200) DEFAULT NULL,
  `email` varchar(200) DEFAULT NULL,
  `senha` varchar(50) DEFAULT NULL,
  `excluido` int(11) DEFAULT '0',
  `data_cadatsro` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `data_exclusao` datetime DEFAULT NULL,
  `id_usuario_exclusao` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=65 DEFAULT CHARSET=utf8;

-- Copiando dados para a tabela almoco.pessoas: ~5 rows (aproximadamente)
DELETE FROM `pessoas`;
/*!40000 ALTER TABLE `pessoas` DISABLE KEYS */;
INSERT INTO `pessoas` (`id`, `nome`, `id_perfil`, `sobrenome`, `telefone`, `email`, `senha`, `excluido`, `data_cadatsro`, `data_exclusao`, `id_usuario_exclusao`) VALUES
	(53, 'lincoln2', '2', NULL, NULL, 'lincoln@gmail.com', '1', 1, '2016-04-30 12:06:22', '0000-00-00 00:00:00', 59),
	(59, 'gabriel', '1', NULL, NULL, 'gabriel@teste.com', '1', 0, '2016-04-30 11:53:52', NULL, NULL),
	(60, 'iii', '1', NULL, NULL, 'iiii@ii.net', '1', 0, '2016-04-30 11:53:52', NULL, NULL),
	(61, 'iiii', '1', NULL, NULL, 'iiiii@ddddddddd.com', '1', 1, '2016-04-30 12:00:01', '2016-04-30 12:00:01', 59),
	(63, 'flavia', '2', NULL, NULL, 'flavia@teste.com', '1', 0, '2016-04-30 15:59:27', NULL, NULL),
	(64, 'iiii', '1', NULL, NULL, 'iiii@tffgfff.com', '1', 0, '2016-04-30 16:32:38', NULL, NULL);
/*!40000 ALTER TABLE `pessoas` ENABLE KEYS */;


-- Copiando estrutura para tabela almoco.semana
DROP TABLE IF EXISTS `semana`;
CREATE TABLE IF NOT EXISTS `semana` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `dia_semana` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

-- Copiando dados para a tabela almoco.semana: ~5 rows (aproximadamente)
DELETE FROM `semana`;
/*!40000 ALTER TABLE `semana` DISABLE KEYS */;
INSERT INTO `semana` (`id`, `dia_semana`) VALUES
	(1, 'Segunda'),
	(2, 'Terça'),
	(3, 'Quarta'),
	(4, 'Quinta'),
	(5, 'Sexta');
/*!40000 ALTER TABLE `semana` ENABLE KEYS */;


-- Copiando estrutura para tabela almoco.semana_cardapio
DROP TABLE IF EXISTS `semana_cardapio`;
CREATE TABLE IF NOT EXISTS `semana_cardapio` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_semana` int(11) NOT NULL DEFAULT '0',
  `id_cardapio` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

-- Copiando dados para a tabela almoco.semana_cardapio: ~4 rows (aproximadamente)
DELETE FROM `semana_cardapio`;
/*!40000 ALTER TABLE `semana_cardapio` DISABLE KEYS */;
INSERT INTO `semana_cardapio` (`id`, `id_semana`, `id_cardapio`) VALUES
	(1, 1, 1),
	(2, 1, 2),
	(3, 2, 1),
	(4, 3, 1),
	(5, 4, 1);
/*!40000 ALTER TABLE `semana_cardapio` ENABLE KEYS */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;