CREATE DATABASE IF NOT EXISTS japcs
  CHARACTER SET utf8mb4
  COLLATE utf8mb4_unicode_ci;

USE japcs;

DROP TABLE IF EXISTS vendas;
DROP TABLE IF EXISTS produtos;
DROP TABLE IF EXISTS login;
DROP TABLE IF EXISTS usuarios;


CREATE TABLE usuarios (
  Id        INT          NOT NULL AUTO_INCREMENT,
  Nome      VARCHAR(150) DEFAULT NULL,
  CPF       VARCHAR(11)  DEFAULT NULL,
  Endereco  VARCHAR(150) DEFAULT NULL,
  Bairro    VARCHAR(80)  DEFAULT NULL,
  Cidade    VARCHAR(80)  DEFAULT NULL,
  Estado    VARCHAR(2)   DEFAULT NULL,
  CEP       VARCHAR(9)   DEFAULT NULL,
  PRIMARY KEY (Id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE login (
  Id     INT         NOT NULL AUTO_INCREMENT,
  Login  VARCHAR(50) DEFAULT NULL,
  Senha  VARCHAR(32) DEFAULT NULL,
  CPF    VARCHAR(11) DEFAULT NULL,
  PRIMARY KEY (Id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE produtos (
  Id         INT           NOT NULL AUTO_INCREMENT,
  Codigo     VARCHAR(20)   DEFAULT NULL,
  Nome       VARCHAR(200)  DEFAULT NULL,
  Categoria  VARCHAR(50)   DEFAULT NULL,
  Preco      DECIMAL(10,2) DEFAULT NULL,
  Imagem     VARCHAR(150)  DEFAULT NULL,
  Descricao  TEXT          DEFAULT NULL,
  PRIMARY KEY (Id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE vendas (
  Id            INT          NOT NULL AUTO_INCREMENT,
  NumVenda      VARCHAR(30)  DEFAULT NULL,
  Login         VARCHAR(50)  DEFAULT NULL,
  NomeCompleto  VARCHAR(150) DEFAULT NULL,
  Produtos      TEXT         DEFAULT NULL,
  Data          VARCHAR(30)  DEFAULT NULL,
  Total         VARCHAR(20)  DEFAULT NULL,
  Pagamento     VARCHAR(30)  DEFAULT NULL,
  PRIMARY KEY (Id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


INSERT INTO usuarios (Id, Nome, CPF, Endereco, Bairro, Cidade, Estado, CEP) VALUES
(1, 'paranhos',                '99999999999', 'rua sim',    'centro',        'eunapolios', 'PE', '99999-999'),
(2, 'arthur',                  '66666666699', 'Rua nao',    'centro',        'Eunapolos',  'AM', '666666-66'),
(3, 'Arthur',                  '11111111111', 'RUa',        'A',             'EU',         'PI', '11111111'),
(4, 'everton buriti oliveira', '07011355570', 'rua E, 74',  'Arnaldo moura', 'Eunapolis',  'BA', '4525790');

INSERT INTO login (Id, Login, Senha, CPF) VALUES
(1, 'parara',                  'e8d51627e43048876a29f4b89a79d460', '99999999999'),
(2, 'artur',                   'd8dc79b0d619897f546a1b73db0e5713', '66666666699'),
(3, 'ATS',                     'e10adc3949ba59abbe56e057f20f883e', '11111111111'),
(4, 'Everton Buriti Oliveira', 'd20f3602321385b82cb15a741a6865c1', '07011355570');

INSERT INTO produtos (Id, Codigo, Nome, Categoria, Preco, Imagem, Descricao) VALUES
(1,  'pv1',      'Placa de Vídeo AsRock AMD Radeon RX 7600 Challenger Pro OC, 8GB, GDDR6, FSR, Ray Tracing', 'Placa de Vídeo', 1649.90,  'img/PV1.jpg',      '8GB GDDR6, FSR, Ray Tracing, 256 Bit — ótimo custo-benefício para 1080p.'),
(2,  'pv2',      'Placa de Vídeo Biostar AMD Radeon RX 580 2048SP, 8GB, GDDR5, 256 Bit',                     'Placa de Vídeo', 839.00,   'img/PV2.jpg',      '8GB GDDR5, 256 Bit — entrada acessível no mundo gamer 1080p.'),
(3,  'pv3',      'Placa de Vídeo Asus AMD Radeon RX 9060 XT Prime OC, 16GB, GDDR6, FSR, Ray Tracing',        'Placa de Vídeo', 2999.90,  'img/PV3.jpg',      '16GB GDDR6, FSR, Ray Tracing — top de linha AMD para 1440p e 4K.'),
(4,  'monitor1', 'Monitor Gamer Acer Nitro ED270, 27 Pol, VA, Curvo, FHD, 1ms, 240Hz, FreeSync',            'Monitor',        1299.99,  'img/Monitor1.jpg', '27" curvo VA, 240Hz, 1ms, FreeSync — imersão total nos games.'),
(5,  'monitor2', 'Monitor Gamer AOC, 21.5 Pol, VA, FHD, 1ms, 120Hz, Adaptive-Sync, HDMI/VGA',                'Monitor',        470.00,   'img/Monitor2.jpg', '21.5" VA, 120Hz, 1ms, Adaptive-Sync — entrada acessível no setup gamer.'),
(6,  'monitor3', 'Monitor Gamer Acer Nitro KG273 G0bi, 27 Pol, IPS, FHD, 1ms, 120Hz, Adaptive Sync',         'Monitor',        845.00,   'img/Monitor3.jpg', '27" IPS, 120Hz, 1ms, Adaptive Sync — cores vibrantes e ângulo de visão amplo.'),
(7,  'pm1',      'Placa Mãe AsRock Z890 Pro RS, DDR5, LGA1851, ATX, Chipset Intel Z890',                     'Placa-Mãe',      2090.00,  'img/PM1.jpg',      'LGA1851, DDR5, ATX, Chipset Z890 — pronta para Intel Core Ultra série 2.'),
(8,  'pm2',      'Placa Mãe Asus Prime A620M-E, DDR5, Socket AMD AM5, M-ATX, Chipset A620',                  'Placa-Mãe',      630.00,   'img/PM2.jpg',      'AM5, DDR5, M-ATX, Chipset A620 — excelente custo-benefício para Ryzen.'),
(9,  'pm3',      'Placa Mãe Gigabyte Z890 Aorus Pro Ice, DDR5, LGA1851, ATX, Chipset Intel Z890',            'Placa-Mãe',      3999.99,  'img/PM3.jpg',      'LGA1851, DDR5, ATX, Z890 — máxima performance para Intel Core Ultra.'),
(10, 'pc1',      'PC Gamer Japcs DeepCool, Intel Core Ultra 9 285, GeForce RTX 5080 16GB, 32GB DDR5',        'PC Montado',     22100.00, 'img/PC1.jpg',      'Topo absoluto: Core Ultra 9 285, RTX 5080 16GB, 32GB DDR5. Montado e certificado.'),
(11, 'pc2',      'PC Gamer Japcs DeepCool, AMD Ryzen 7 9800X3D, GeForce RTX 5070 12GB',                      'PC Montado',     17102.00, 'img/PC2.jpg',      'Melhor CPU para games: Ryzen 7 9800X3D + RTX 5070 12GB. Montado e certificado.'),
(12, 'pc3',      'PC Gamer Japcs DeepCool, Intel i7-12700KF, GeForce RTX 5070 12GB, 16GB DDR5',              'PC Montado',     12599.00, 'img/PC3.jpg',      'Alta performance: i7-12700KF + RTX 5070 12GB, 16GB DDR5. Montado e certificado.');

INSERT INTO vendas (Id, NumVenda, Login, NomeCompleto, Produtos, Data, Total, Pagamento) VALUES
(1, '202609141122092215', 'parara',                  'paranhos',                'Placa de Vídeo Asus AMD Radeon RX 9060 XT Prime OC, 16GB, GDDR6, FSR, Ray Tracing x3 (R$ 8.999,70)',            '14/09/2026 11:22:09', '8999.70',  'PIX'),
(2, '202609141134592790', 'artur',                   'arthur',                  'Placa de Vídeo Asus AMD Radeon RX 9060 XT Prime OC, 16GB, GDDR6, FSR, Ray Tracing x3 (R$ 8.999,70)',            '14/09/2026 11:34:59', '8999.70',  'PIX'),
(3, '202609141152194016', 'ATS',                     'Arthur',                  'Placa de Vídeo Biostar AMD Radeon RX 580 2048SP, 8GB, GDDR5, 256 Bit x1 (R$ 839,00)',                           '14/09/2026 11:52:19', '839.00',   'PIX'),
(4, '202609141309243529', 'Everton Buriti Oliveira', 'everton buriti oliveira', 'PC Gamer Japcs DeepCool, Intel Core Ultra 9 285, GeForce RTX 5080 16GB, 32GB DDR5 x3 (R$ 66.300,00)',           '14/09/2026 13:09:24', '66300.00', 'Cartão de Crédito');
