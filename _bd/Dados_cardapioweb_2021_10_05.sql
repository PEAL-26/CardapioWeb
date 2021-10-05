-- --------------------------------------------------------
-- Servidor:                     localhost
-- Versão do servidor:           5.7.24 - MySQL Community Server (GPL)
-- OS do Servidor:               Win64
-- HeidiSQL Versão:              11.3.0.6295
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

-- Copiando dados para a tabela cardapio_web_db.categoria: ~20 rows (aproximadamente)
/*!40000 ALTER TABLE `categoria` DISABLE KEYS */;
INSERT INTO `categoria` (`id`, `nome`) VALUES
	(17, 'BEBIDAS'),
	(20, 'CAIPIS'),
	(9, 'CAMARÕES'),
	(11, 'CARNES'),
	(19, 'CERVEJA E CHOPP'),
	(21, 'COQUETÉIS'),
	(22, 'DESTILADOS'),
	(14, 'DIETAS ESPECIAIS'),
	(23, 'ENTRADINHAS'),
	(12, 'FRANGO E SUÍNO'),
	(6, 'Frutos do Mar'),
	(7, 'FRUTOSDOMAR'),
	(8, 'LAGOSTAS'),
	(13, 'MENU INFANTIL'),
	(10, 'PEIXES'),
	(4, 'Petiscos e Entradas'),
	(5, 'Saladas'),
	(15, 'SOBREMESAS'),
	(18, 'SUCOS'),
	(16, 'TORTAS INTEIRAS');
/*!40000 ALTER TABLE `categoria` ENABLE KEYS */;

-- Copiando dados para a tabela cardapio_web_db.produto: ~56 rows (aproximadamente)
/*!40000 ALTER TABLE `produto` DISABLE KEYS */;
INSERT INTO `produto` (`id`, `categoria_id`, `nome`, `descricao`, `valor`, `imagem`) VALUES
	(10, 4, 'Meio Camarão Coco Brasil (3 pessoas)', '9 Camarões empanados recheados com catupiry servidos sobre cremoso arroz com camarões e molho de moqueca. Servido com batata palha e farofa de pão.', 166.00, 'assets/imagens/a6c8e7cbc59a4062b38cf790b7048741.jpeg'),
	(12, 6, 'Paella Caldosa Coco Bambu c / Lagosta (2 pessoas)', 'Arroz caldoso com camarão, lula, polvo, peixe, lagosta, e mexilhão, refogado com pimentões, ervilha, especiarias e um leve toque de açafrão. Servidos na paellera. Rico em sabor e apresentação. ', 298.00, 'assets/imagens/a6c8e7cbc59a4062b38cf790b70487411.jpeg'),
	(13, 6, 'Paella Caldosa Coco Bambu c / Lagosta (3-4 pessoas)', 'Arroz caldoso com camarão, lula, polvo, peixe, lagosta, e mexilhão, refogado com pimentões, ervilha, especiarias e um leve toque de açafrão. Servidos na paellera. Rico em sabor e apresentação.', 447.00, 'assets/imagens/396532.jpeg'),
	(14, 5, 'Batata Frita Especial', 'Batatas fritas cobertas com queijo mussarela derretido e bacon crocante.', 32.00, 'assets/imagens/a6c8e7cbc59a4062b38cf790b70487412.jpeg'),
	(15, 5, 'Berinjela à Parmegiana', 'Fatias de berinjela assadas ao forno, servidas ao molho parmegiana e gratinadas com queijos mussarela e parmesão.', 47.00, 'assets/imagens/a6c8e7cbc59a4062b38cf790b70487413.jpeg'),
	(17, 7, 'Meio Camarão Coco Brasil (3 pessoas)', 'Arroz caldoso com camarão, lula, polvo, peixe, lagosta, e mexilhão, refogado com pimentões, ervilha, especiarias e um leve toque de açafrão. Servidos na paellera. Rico em sabor e apresentação. ', 447.00, 'assets/imagens/a6c8e7cbc59a4062b38cf790b7048741.jpeg'),
	(18, 7, 'Meio Camarão Coco Brasil (3 pessoas)', 'Arroz caldoso com camarão, lula, polvo, peixe, lagosta, e mexilhão, refogado com pimentões, ervilha, especiarias e um leve toque de açafrão. Servidos na paellera. Rico em sabor e apresentação. ', 447.00, 'assets/imagens/a6c8e7cbc59a4062b38cf790b7048741.jpeg'),
	(19, 7, 'Meio Camarão Coco Brasil (3 pessoas)', 'Arroz caldoso com camarão, lula, polvo, peixe, lagosta, e mexilhão, refogado com pimentões, ervilha, especiarias e um leve toque de açafrão. Servidos na paellera. Rico em sabor e apresentação. ', 447.00, 'assets/imagens/a6c8e7cbc59a4062b38cf790b7048741.jpeg'),
	(20, 8, 'Meio Camarão Coco Brasil (3 pessoas)', 'Arroz caldoso com camarão, lula, polvo, peixe, lagosta, e mexilhão, refogado com pimentões, ervilha, especiarias e um leve toque de açafrão. Servidos na paellera. Rico em sabor e apresentação. ', 447.00, 'assets/imagens/a6c8e7cbc59a4062b38cf790b7048741.jpeg'),
	(21, 8, 'Meio Camarão Coco Brasil (3 pessoas)', 'Arroz caldoso com camarão, lula, polvo, peixe, lagosta, e mexilhão, refogado com pimentões, ervilha, especiarias e um leve toque de açafrão. Servidos na paellera. Rico em sabor e apresentação. ', 447.00, 'assets/imagens/a6c8e7cbc59a4062b38cf790b7048741.jpeg'),
	(22, 8, 'Meio Camarão Coco Brasil (3 pessoas)', 'Arroz caldoso com camarão, lula, polvo, peixe, lagosta, e mexilhão, refogado com pimentões, ervilha, especiarias e um leve toque de açafrão. Servidos na paellera. Rico em sabor e apresentação. ', 447.00, 'assets/imagens/a6c8e7cbc59a4062b38cf790b7048741.jpeg'),
	(23, 9, 'Meio Camarão Coco Brasil (3 pessoas)', 'Arroz caldoso com camarão, lula, polvo, peixe, lagosta, e mexilhão, refogado com pimentões, ervilha, especiarias e um leve toque de açafrão. Servidos na paellera. Rico em sabor e apresentação. ', 447.00, 'assets/imagens/a6c8e7cbc59a4062b38cf790b7048741.jpeg'),
	(24, 9, 'Meio Camarão Coco Brasil (3 pessoas)', 'Arroz caldoso com camarão, lula, polvo, peixe, lagosta, e mexilhão, refogado com pimentões, ervilha, especiarias e um leve toque de açafrão. Servidos na paellera. Rico em sabor e apresentação. ', 447.00, 'assets/imagens/a6c8e7cbc59a4062b38cf790b7048741.jpeg'),
	(25, 9, 'Meio Camarão Coco Brasil (3 pessoas)', 'Arroz caldoso com camarão, lula, polvo, peixe, lagosta, e mexilhão, refogado com pimentões, ervilha, especiarias e um leve toque de açafrão. Servidos na paellera. Rico em sabor e apresentação. ', 447.00, 'assets/imagens/a6c8e7cbc59a4062b38cf790b7048741.jpeg'),
	(26, 10, 'Meio Camarão Coco Brasil (3 pessoas)', 'Arroz caldoso com camarão, lula, polvo, peixe, lagosta, e mexilhão, refogado com pimentões, ervilha, especiarias e um leve toque de açafrão. Servidos na paellera. Rico em sabor e apresentação. ', 447.00, 'assets/imagens/a6c8e7cbc59a4062b38cf790b7048741.jpeg'),
	(27, 10, 'Meio Camarão Coco Brasil (3 pessoas)', 'Arroz caldoso com camarão, lula, polvo, peixe, lagosta, e mexilhão, refogado com pimentões, ervilha, especiarias e um leve toque de açafrão. Servidos na paellera. Rico em sabor e apresentação. ', 447.00, 'assets/imagens/a6c8e7cbc59a4062b38cf790b7048741.jpeg'),
	(28, 10, 'Meio Camarão Coco Brasil (3 pessoas)', 'Arroz caldoso com camarão, lula, polvo, peixe, lagosta, e mexilhão, refogado com pimentões, ervilha, especiarias e um leve toque de açafrão. Servidos na paellera. Rico em sabor e apresentação. ', 447.00, 'assets/imagens/a6c8e7cbc59a4062b38cf790b7048741.jpeg'),
	(29, 11, 'Meio Camarão Coco Brasil (3 pessoas)', 'Arroz caldoso com camarão, lula, polvo, peixe, lagosta, e mexilhão, refogado com pimentões, ervilha, especiarias e um leve toque de açafrão. Servidos na paellera. Rico em sabor e apresentação. ', 447.00, 'assets/imagens/a6c8e7cbc59a4062b38cf790b7048741.jpeg'),
	(30, 11, 'Meio Camarão Coco Brasil (3 pessoas)', 'Arroz caldoso com camarão, lula, polvo, peixe, lagosta, e mexilhão, refogado com pimentões, ervilha, especiarias e um leve toque de açafrão. Servidos na paellera. Rico em sabor e apresentação. ', 447.00, 'assets/imagens/a6c8e7cbc59a4062b38cf790b7048741.jpeg'),
	(31, 11, 'Meio Camarão Coco Brasil (3 pessoas)', 'Arroz caldoso com camarão, lula, polvo, peixe, lagosta, e mexilhão, refogado com pimentões, ervilha, especiarias e um leve toque de açafrão. Servidos na paellera. Rico em sabor e apresentação. ', 447.00, 'assets/imagens/a6c8e7cbc59a4062b38cf790b7048741.jpeg'),
	(32, 12, 'Meio Camarão Coco Brasil (3 pessoas)', 'Arroz caldoso com camarão, lula, polvo, peixe, lagosta, e mexilhão, refogado com pimentões, ervilha, especiarias e um leve toque de açafrão. Servidos na paellera. Rico em sabor e apresentação. ', 447.00, 'assets/imagens/a6c8e7cbc59a4062b38cf790b7048741.jpeg'),
	(33, 12, 'Meio Camarão Coco Brasil (3 pessoas)', 'Arroz caldoso com camarão, lula, polvo, peixe, lagosta, e mexilhão, refogado com pimentões, ervilha, especiarias e um leve toque de açafrão. Servidos na paellera. Rico em sabor e apresentação. ', 447.00, 'assets/imagens/a6c8e7cbc59a4062b38cf790b7048741.jpeg'),
	(34, 12, 'Meio Camarão Coco Brasil (3 pessoas)', 'Arroz caldoso com camarão, lula, polvo, peixe, lagosta, e mexilhão, refogado com pimentões, ervilha, especiarias e um leve toque de açafrão. Servidos na paellera. Rico em sabor e apresentação. ', 447.00, 'assets/imagens/a6c8e7cbc59a4062b38cf790b7048741.jpeg'),
	(35, 13, 'Meio Camarão Coco Brasil (3 pessoas)', 'Arroz caldoso com camarão, lula, polvo, peixe, lagosta, e mexilhão, refogado com pimentões, ervilha, especiarias e um leve toque de açafrão. Servidos na paellera. Rico em sabor e apresentação. ', 447.00, 'assets/imagens/a6c8e7cbc59a4062b38cf790b7048741.jpeg'),
	(36, 13, 'Meio Camarão Coco Brasil (3 pessoas)', 'Arroz caldoso com camarão, lula, polvo, peixe, lagosta, e mexilhão, refogado com pimentões, ervilha, especiarias e um leve toque de açafrão. Servidos na paellera. Rico em sabor e apresentação. ', 447.00, 'assets/imagens/a6c8e7cbc59a4062b38cf790b7048741.jpeg'),
	(37, 13, 'Meio Camarão Coco Brasil (3 pessoas)', 'Arroz caldoso com camarão, lula, polvo, peixe, lagosta, e mexilhão, refogado com pimentões, ervilha, especiarias e um leve toque de açafrão. Servidos na paellera. Rico em sabor e apresentação. ', 447.00, 'assets/imagens/a6c8e7cbc59a4062b38cf790b7048741.jpeg'),
	(38, 14, 'Meio Camarão Coco Brasil (3 pessoas)', 'Arroz caldoso com camarão, lula, polvo, peixe, lagosta, e mexilhão, refogado com pimentões, ervilha, especiarias e um leve toque de açafrão. Servidos na paellera. Rico em sabor e apresentação. ', 447.00, 'assets/imagens/a6c8e7cbc59a4062b38cf790b7048741.jpeg'),
	(39, 14, 'Meio Camarão Coco Brasil (3 pessoas)', 'Arroz caldoso com camarão, lula, polvo, peixe, lagosta, e mexilhão, refogado com pimentões, ervilha, especiarias e um leve toque de açafrão. Servidos na paellera. Rico em sabor e apresentação. ', 447.00, 'assets/imagens/a6c8e7cbc59a4062b38cf790b7048741.jpeg'),
	(40, 14, 'Meio Camarão Coco Brasil (3 pessoas)', 'Arroz caldoso com camarão, lula, polvo, peixe, lagosta, e mexilhão, refogado com pimentões, ervilha, especiarias e um leve toque de açafrão. Servidos na paellera. Rico em sabor e apresentação. ', 447.00, 'assets/imagens/a6c8e7cbc59a4062b38cf790b7048741.jpeg'),
	(41, 15, 'Meio Camarão Coco Brasil (3 pessoas)', 'Arroz caldoso com camarão, lula, polvo, peixe, lagosta, e mexilhão, refogado com pimentões, ervilha, especiarias e um leve toque de açafrão. Servidos na paellera. Rico em sabor e apresentação. ', 447.00, 'assets/imagens/a6c8e7cbc59a4062b38cf790b7048741.jpeg'),
	(42, 15, 'Meio Camarão Coco Brasil (3 pessoas)', 'Arroz caldoso com camarão, lula, polvo, peixe, lagosta, e mexilhão, refogado com pimentões, ervilha, especiarias e um leve toque de açafrão. Servidos na paellera. Rico em sabor e apresentação. ', 447.00, 'assets/imagens/a6c8e7cbc59a4062b38cf790b7048741.jpeg'),
	(43, 15, 'Meio Camarão Coco Brasil (3 pessoas)', 'Arroz caldoso com camarão, lula, polvo, peixe, lagosta, e mexilhão, refogado com pimentões, ervilha, especiarias e um leve toque de açafrão. Servidos na paellera. Rico em sabor e apresentação. ', 447.00, 'assets/imagens/a6c8e7cbc59a4062b38cf790b7048741.jpeg'),
	(44, 16, 'Meio Camarão Coco Brasil (3 pessoas)', 'Arroz caldoso com camarão, lula, polvo, peixe, lagosta, e mexilhão, refogado com pimentões, ervilha, especiarias e um leve toque de açafrão. Servidos na paellera. Rico em sabor e apresentação. ', 447.00, 'assets/imagens/a6c8e7cbc59a4062b38cf790b7048741.jpeg'),
	(45, 16, 'Meio Camarão Coco Brasil (3 pessoas)', 'Arroz caldoso com camarão, lula, polvo, peixe, lagosta, e mexilhão, refogado com pimentões, ervilha, especiarias e um leve toque de açafrão. Servidos na paellera. Rico em sabor e apresentação. ', 447.00, 'assets/imagens/a6c8e7cbc59a4062b38cf790b7048741.jpeg'),
	(46, 16, 'Meio Camarão Coco Brasil (3 pessoas)', 'Arroz caldoso com camarão, lula, polvo, peixe, lagosta, e mexilhão, refogado com pimentões, ervilha, especiarias e um leve toque de açafrão. Servidos na paellera. Rico em sabor e apresentação. ', 447.00, 'assets/imagens/a6c8e7cbc59a4062b38cf790b7048741.jpeg'),
	(47, 17, 'Meio Camarão Coco Brasil (3 pessoas)', 'Arroz caldoso com camarão, lula, polvo, peixe, lagosta, e mexilhão, refogado com pimentões, ervilha, especiarias e um leve toque de açafrão. Servidos na paellera. Rico em sabor e apresentação. ', 447.00, 'assets/imagens/a6c8e7cbc59a4062b38cf790b7048741.jpeg'),
	(48, 17, 'Meio Camarão Coco Brasil (3 pessoas)', 'Arroz caldoso com camarão, lula, polvo, peixe, lagosta, e mexilhão, refogado com pimentões, ervilha, especiarias e um leve toque de açafrão. Servidos na paellera. Rico em sabor e apresentação. ', 447.00, 'assets/imagens/a6c8e7cbc59a4062b38cf790b7048741.jpeg'),
	(49, 17, 'Meio Camarão Coco Brasil (3 pessoas)', 'Arroz caldoso com camarão, lula, polvo, peixe, lagosta, e mexilhão, refogado com pimentões, ervilha, especiarias e um leve toque de açafrão. Servidos na paellera. Rico em sabor e apresentação. ', 447.00, 'assets/imagens/a6c8e7cbc59a4062b38cf790b7048741.jpeg'),
	(50, 18, 'Meio Camarão Coco Brasil (3 pessoas)', 'Arroz caldoso com camarão, lula, polvo, peixe, lagosta, e mexilhão, refogado com pimentões, ervilha, especiarias e um leve toque de açafrão. Servidos na paellera. Rico em sabor e apresentação. ', 447.00, 'assets/imagens/a6c8e7cbc59a4062b38cf790b7048741.jpeg'),
	(51, 18, 'Meio Camarão Coco Brasil (3 pessoas)', 'Arroz caldoso com camarão, lula, polvo, peixe, lagosta, e mexilhão, refogado com pimentões, ervilha, especiarias e um leve toque de açafrão. Servidos na paellera. Rico em sabor e apresentação. ', 447.00, 'assets/imagens/a6c8e7cbc59a4062b38cf790b7048741.jpeg'),
	(52, 18, 'Meio Camarão Coco Brasil (3 pessoas)', 'Arroz caldoso com camarão, lula, polvo, peixe, lagosta, e mexilhão, refogado com pimentões, ervilha, especiarias e um leve toque de açafrão. Servidos na paellera. Rico em sabor e apresentação. ', 447.00, 'assets/imagens/a6c8e7cbc59a4062b38cf790b7048741.jpeg'),
	(53, 19, 'Meio Camarão Coco Brasil (3 pessoas)', 'Arroz caldoso com camarão, lula, polvo, peixe, lagosta, e mexilhão, refogado com pimentões, ervilha, especiarias e um leve toque de açafrão. Servidos na paellera. Rico em sabor e apresentação. ', 447.00, 'assets/imagens/a6c8e7cbc59a4062b38cf790b7048741.jpeg'),
	(54, 19, 'Meio Camarão Coco Brasil (3 pessoas)', 'Arroz caldoso com camarão, lula, polvo, peixe, lagosta, e mexilhão, refogado com pimentões, ervilha, especiarias e um leve toque de açafrão. Servidos na paellera. Rico em sabor e apresentação. ', 447.00, 'assets/imagens/a6c8e7cbc59a4062b38cf790b7048741.jpeg'),
	(55, 19, 'Meio Camarão Coco Brasil (3 pessoas)', 'Arroz caldoso com camarão, lula, polvo, peixe, lagosta, e mexilhão, refogado com pimentões, ervilha, especiarias e um leve toque de açafrão. Servidos na paellera. Rico em sabor e apresentação. ', 447.00, 'assets/imagens/a6c8e7cbc59a4062b38cf790b7048741.jpeg'),
	(56, 20, 'Meio Camarão Coco Brasil (3 pessoas)', 'Arroz caldoso com camarão, lula, polvo, peixe, lagosta, e mexilhão, refogado com pimentões, ervilha, especiarias e um leve toque de açafrão. Servidos na paellera. Rico em sabor e apresentação. ', 447.00, 'assets/imagens/a6c8e7cbc59a4062b38cf790b7048741.jpeg'),
	(57, 20, 'Meio Camarão Coco Brasil (3 pessoas)', 'Arroz caldoso com camarão, lula, polvo, peixe, lagosta, e mexilhão, refogado com pimentões, ervilha, especiarias e um leve toque de açafrão. Servidos na paellera. Rico em sabor e apresentação. ', 447.00, 'assets/imagens/a6c8e7cbc59a4062b38cf790b7048741.jpeg'),
	(58, 20, 'Meio Camarão Coco Brasil (3 pessoas)', 'Arroz caldoso com camarão, lula, polvo, peixe, lagosta, e mexilhão, refogado com pimentões, ervilha, especiarias e um leve toque de açafrão. Servidos na paellera. Rico em sabor e apresentação. ', 447.00, 'assets/imagens/a6c8e7cbc59a4062b38cf790b7048741.jpeg'),
	(59, 21, 'Meio Camarão Coco Brasil (3 pessoas)', 'Arroz caldoso com camarão, lula, polvo, peixe, lagosta, e mexilhão, refogado com pimentões, ervilha, especiarias e um leve toque de açafrão. Servidos na paellera. Rico em sabor e apresentação. ', 447.00, 'assets/imagens/a6c8e7cbc59a4062b38cf790b7048741.jpeg'),
	(60, 21, 'Meio Camarão Coco Brasil (3 pessoas)', 'Arroz caldoso com camarão, lula, polvo, peixe, lagosta, e mexilhão, refogado com pimentões, ervilha, especiarias e um leve toque de açafrão. Servidos na paellera. Rico em sabor e apresentação. ', 447.00, 'assets/imagens/a6c8e7cbc59a4062b38cf790b7048741.jpeg'),
	(61, 21, 'Meio Camarão Coco Brasil (3 pessoas)', 'Arroz caldoso com camarão, lula, polvo, peixe, lagosta, e mexilhão, refogado com pimentões, ervilha, especiarias e um leve toque de açafrão. Servidos na paellera. Rico em sabor e apresentação. ', 447.00, 'assets/imagens/a6c8e7cbc59a4062b38cf790b7048741.jpeg'),
	(62, 22, 'Meio Camarão Coco Brasil (3 pessoas)', 'Arroz caldoso com camarão, lula, polvo, peixe, lagosta, e mexilhão, refogado com pimentões, ervilha, especiarias e um leve toque de açafrão. Servidos na paellera. Rico em sabor e apresentação. ', 447.00, 'assets/imagens/a6c8e7cbc59a4062b38cf790b7048741.jpeg'),
	(63, 22, 'Meio Camarão Coco Brasil (3 pessoas)', 'Arroz caldoso com camarão, lula, polvo, peixe, lagosta, e mexilhão, refogado com pimentões, ervilha, especiarias e um leve toque de açafrão. Servidos na paellera. Rico em sabor e apresentação. ', 447.00, 'assets/imagens/a6c8e7cbc59a4062b38cf790b7048741.jpeg'),
	(64, 22, 'Meio Camarão Coco Brasil (3 pessoas)', 'Arroz caldoso com camarão, lula, polvo, peixe, lagosta, e mexilhão, refogado com pimentões, ervilha, especiarias e um leve toque de açafrão. Servidos na paellera. Rico em sabor e apresentação. ', 447.00, 'assets/imagens/a6c8e7cbc59a4062b38cf790b7048741.jpeg'),
	(65, 23, 'Meio Camarão Coco Brasil (3 pessoas)', 'Arroz caldoso com camarão, lula, polvo, peixe, lagosta, e mexilhão, refogado com pimentões, ervilha, especiarias e um leve toque de açafrão. Servidos na paellera. Rico em sabor e apresentação. ', 447.00, 'assets/imagens/a6c8e7cbc59a4062b38cf790b7048741.jpeg'),
	(66, 23, 'Meio Camarão Coco Brasil (3 pessoas)', 'Arroz caldoso com camarão, lula, polvo, peixe, lagosta, e mexilhão, refogado com pimentões, ervilha, especiarias e um leve toque de açafrão. Servidos na paellera. Rico em sabor e apresentação. ', 447.00, 'assets/imagens/a6c8e7cbc59a4062b38cf790b7048741.jpeg'),
	(67, 23, 'Meio Camarão Coco Brasil (3 pessoas)', 'Arroz caldoso com camarão, lula, polvo, peixe, lagosta, e mexilhão, refogado com pimentões, ervilha, especiarias e um leve toque de açafrão. Servidos na paellera. Rico em sabor e apresentação. ', 447.00, 'assets/imagens/a6c8e7cbc59a4062b38cf790b7048741.jpeg'),
	(68, 17, 'Teste', 'Teste', 400.00, 'assets/imagens/icon_bug_32x32.png');
/*!40000 ALTER TABLE `produto` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
