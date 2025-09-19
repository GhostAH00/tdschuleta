-- drop database tdszuphpdb02;

-- Database:
CREATE DATABASE
  IF NOT EXISTS `tdszuphpdb02`
    DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
   
USE `tdszuphpdb02`;
 
-- --------------------------------------------------------
-- Estrutura da tabela `produtos`
CREATE TABLE `produtos` (
  `id` int(11) NOT NULL,
  `tipo_id` int(11) NOT NULL,
  `descricao` varchar(100) NOT NULL,
  `resumo` varchar(1000) DEFAULT NULL,
  `valor` decimal(9,2) DEFAULT NULL,
  `imagem` varchar(50) DEFAULT NULL,
  `destaque` bit NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
 
-- Extraindo dados da tabela `produtos`
INSERT INTO `produtos` (`id`, `tipo_id`, `descricao`, `resumo`, `valor`, `imagem`, `destaque`) VALUES
(1, 1, 'Picanha', 'Escolhi a melhor parte da peça, selei com manteiga de alho e finalizei no ponto perfeito porque picanha boa não se esconde, ela se revela no sabor.', 49.90, 'chu_01.png', 1),
(2, 1, 'Costela', 'Cozida lentamente por horas, a costela chega à mesa soltando do osso, envolta em um molho rústico que respeita cada fibra da carne é tradição com técnica.', 49.90, 'chu_06.png', 1),
(3, 1, 'Alcatra com alho', 'A alcatra entra na grelha com respeito, e o alho dourado. É o tipo de corte que não precisa de firula. só fogo bem tratado, carne de qualidade e aquele tempero.', 39.90, 'chu_07.png', 0),
(4, 1, 'Frango desossado com ervas', 'O frango desossado com ervas frescas é a síntese do cuidado: cada folha escolhida, cada minuto na brasa, aromático e memorável.', 29.90, 'chu_11.png', 1),
(5, 1, 'Tulipa apimentada', 'A tulipa é pequena no tamanho, mas gigante na personalidade. Marinada com pimentas escolhidas a dedo, ela chega na brasa pra mostrar que sabor se mede em intensidade.', 27.90, 'chu_08.png', 0),
(6, 1, 'Espetinho de frango com bacon', 'O frango traz leveza e suculência, o bacon chega com crocância e ousadia. Juntos, eles criam uma harmonia que só o fogo sabe revelar.', 24.90, 'chu_10.png', 0),
(7, 1, 'Torresmo crocante', 'Torresmo bom não se mede no tamanho, mas no barulho que faz quando quebra. Crocante por fora, macio por dentro.', 19.90, 'chu_12.png', 0),
(8, 1, 'Linguiça porco', 'A linguiça é o manifesto do sabor popular: carne bem temperada, envolta em tripa e selada na brasa com orgulho.', 21.90, 'chu_02.png', 0),
(9, 1, 'Pernil fatiado', 'O pernil é carne de respeito. Fica horas no fogo, absorvendo cada tempero como se fosse segredo de família.', 34.90, 'chu_13.png', 1),
(10, 1, 'Salmão com crosta de ervas', 'O salmão entra na brasa com elegância, mas é a crosta de ervas que transforma o prato em experiência. Cada folha, cada aroma, cada toque verde é pensado pra realçar o sabor da carne firme e suculenta.', 59.90, 'chu_14.png', 1),
(11, 1, 'Sardinha com limão', 'A sardinha é daquelas que não pedem licença chegam com cheiro de mar, pele crocante e sabor direto ao ponto. Quando o limão entra em cena, não é só tempero: é contraste, é frescor, é aquele toque ácido que acorda o paladar e faz a brasa valer a pena.', 24.90, 'chu_15.png', 0),
(12, 1, 'Tilápia na folha de bananeira', 'A folha de bananeira não é só embalagem é tradição, é técnica, é sabor. A tilápia cozinha envolta em aromas, protegida do fogo direto, absorvendo tudo que a natureza oferece.', 32.90, 'chu_16.png', 0);

-- Indexes for table `produtos`
ALTER TABLE `produtos`
  ADD PRIMARY KEY (`id`);
 
-- AUTO_INCREMENT for table `produtos`
ALTER TABLE `produtos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
 
-- Estrutura para tabela `tipos`
CREATE TABLE `tipos` (
  `id` int(11) NOT NULL,
  `sigla` varchar(3) NOT NULL,
  `rotulo` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
 
-- Despejando dados para a tabela `tipos`
INSERT INTO `tipos` (`id`, `sigla`, `rotulo`) VALUES
(1, 'chu', 'Churrasco'),
(2, 'sob', 'Sobremesa');
 
-- Índices de tabela `tipos`
ALTER TABLE `tipos`
  ADD PRIMARY KEY (`id`);
 
-- AUTO_INCREMENT de tabela `tipos`
ALTER TABLE `tipos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
 
-- Estrutura para tabela `tipos`
CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `login` varchar(30) NOT NULL,
  `senha` varchar(32) NOT NULL,
  `nivel` CHAR(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
 
-- Inserindo Dados na Tabela `usuarios'
INSERT INTO `usuarios`
  (`id`, `login`, `senha`, `nivel`)
  VALUES
    (1, 'senac', md5('1234'), 'adm'),
    (2, 'joao', md5('456'), 'cli'),
    (3, 'maria', md5('789'), 'com'),
    (4, 'well', md5('1234'), 'adm');
 
-- Índices de tabela `tipos`
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `login_uniq`(`login`);
 
-- AUTO_INCREMENT de tabela `tipos`
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
 
-- Chave estrangeira
ALTER TABLE `produtos`
  ADD CONSTRAINT `tipo_id_fk` FOREIGN KEY (`tipo_id`)
  REFERENCES `tipos`(`id`)
    ON DELETE no action
    ON UPDATE no action;  
   
-- Criando a view vw_produtos
CREATE VIEW vw_produtos AS
  SELECT  	p.id,
			p.tipo_id,
            t.sigla,
            t.rotulo,
            p.descricao,
            p.resumo,
            p.valor,
            p.imagem,
            p.destaque
    FROM produtos p
    JOIN tipos t
  WHERE p.tipo_id=t.id;
COMMIT;