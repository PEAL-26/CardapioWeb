CREATE DATABASE IF NOT EXISTS `cardapio_web_db`;
USE `cardapio_web_db`;

CREATE TABLE IF NOT EXISTS `categoria` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(70) NOT NULL,
  `tipo_id` tinyint(3) unsigned zerofill DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `index_nome_categoria` (`nome`),
  KEY `FK_categoria_tipo` (`tipo_id`),
  CONSTRAINT `FK_categoria_tipo` FOREIGN KEY (`tipo_id`) REFERENCES `tipo` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=latin1;

CREATE TABLE IF NOT EXISTS `produto` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `categoria_id` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `descricao` text,
  `valor` decimal(18,2) NOT NULL,
  `imagem` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `index_nome_produro` (`nome`),
  KEY `fk_produto_reference_categori` (`categoria_id`),
  CONSTRAINT `fk_produto_reference_categori` FOREIGN KEY (`categoria_id`) REFERENCES `categoria` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=96 DEFAULT CHARSET=latin1;

CREATE TABLE IF NOT EXISTS `tipo` (
  `id` tinyint(3) unsigned NOT NULL AUTO_INCREMENT,
  `nome` varchar(20) NOT NULL,
  `ordem` tinyint(4) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `nome` (`nome`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

INSERT INTO `tipo` (`id`, `nome`, `ordem`) VALUES
	(1, 'Prato', 1),
	(2, 'Acompanhate', 2),
	(3, 'Bebida', 3);

CREATE TABLE IF NOT EXISTS `usuario` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(70) NOT NULL,
  `email` varchar(150) NOT NULL,
  `senha` text NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `index_email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

INSERT INTO `usuario` (`id`, `nome`, `email`, `senha`) VALUES
	(3, 'Admin', 'admin@admin.com', '$2y$10$iaJPO6CS5QmBOPhsc66VeewshwA8sbALHxuOxtEYMjmw4AQtH58.i');

