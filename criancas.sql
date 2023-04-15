-- --------------------------------------------------------
-- Servidor:                     127.0.0.1
-- Versão do servidor:           10.4.18-MariaDB - mariadb.org binary distribution
-- OS do Servidor:               Win64
-- HeidiSQL Versão:              11.3.0.6295
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Copiando estrutura do banco de dados para criancas
CREATE DATABASE IF NOT EXISTS `criancas` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;
USE `criancas`;

-- Copiando estrutura para tabela criancas.cadastro
CREATE TABLE IF NOT EXISTS `cadastro` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `nomecompleto` varchar(50) DEFAULT NULL,
  `nomedamae` varchar(50) DEFAULT NULL,
  `datanascimento` date DEFAULT NULL,
  `numerodosus` bigint(15) DEFAULT NULL,
  `vacinaatomar` varchar(70) DEFAULT NULL,
  `datacadastro` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=utf8mb4;

-- Copiando dados para a tabela criancas.cadastro: ~4 rows (aproximadamente)
/*!40000 ALTER TABLE `cadastro` DISABLE KEYS */;
INSERT INTO `cadastro` (`id`, `nomecompleto`, `nomedamae`, `datanascimento`, `numerodosus`, `vacinaatomar`, `datacadastro`) VALUES
	(24, 'Guilherme Miranda', 'Maria José', '2021-04-02', 999999999, 'Hepatite B - 1ª dose', '2021-04-26 09:44:34'),
	(26, 'Caio Soares', 'Francisca Maria', '2021-04-02', 1111111111111, 'VOP (vacina oral contra a poliomielite, Sabin) - 1ª dose', '2021-04-27 13:41:58'),
	(28, 'Mariana Miranda', 'Marileia Miranda', '2000-01-01', 1000000000000, 'VOP (vacina oral contra a poliomielite, Sabin) - 2ª dose', '2021-04-27 13:43:06'),
	(29, 'Gabriel Santos', 'Sofia de Lima ', '2021-04-16', 1564896145664, 'Antipneumocócica 10 valente conjugada - 2ª dose', '2021-04-27 13:43:43');
/*!40000 ALTER TABLE `cadastro` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
cadastro