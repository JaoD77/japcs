<?php
// ─────────────────────────────────────────────
//  produtos.php — Catálogo de produtos da JAPCS
//  Inclua com: require 'produtos.php';
// ─────────────────────────────────────────────

$produtos = [

    // ── Placas de Vídeo ──────────────────────
    [
        'id'    => 'pv1',
        'nome'  => 'Placa de Vídeo AsRock AMD Radeon RX 7600 Challenger Pro OC, 8GB, GDDR6, FSR, Ray Tracing',
        'cat'   => 'Placa de Vídeo',
        'preco' => 1649.90,
        'img'   => 'img/PV1.jpg',
        'desc'  => '8GB GDDR6, FSR, Ray Tracing, 256 Bit — ótimo custo-benefício para 1080p.',
    ],
    [
        'id'    => 'pv2',
        'nome'  => 'Placa de Vídeo Biostar AMD Radeon RX 580 2048SP, 8GB, GDDR5, 256 Bit',
        'cat'   => 'Placa de Vídeo',
        'preco' => 839.00,
        'img'   => 'img/PV2.jpg',
        'desc'  => '8GB GDDR5, 256 Bit — entrada acessível no mundo gamer 1080p.',
    ],
    [
        'id'    => 'pv3',
        'nome'  => 'Placa de Vídeo Asus AMD Radeon RX 9060 XT Prime OC, 16GB, GDDR6, FSR, Ray Tracing',
        'cat'   => 'Placa de Vídeo',
        'preco' => 2999.90,
        'img'   => 'img/PV3.jpg',
        'desc'  => '16GB GDDR6, FSR, Ray Tracing — top de linha AMD para 1440p e 4K.',
    ],

    // Monitores
    [
        'id'    => 'monitor1',
        'nome'  => 'Monitor Gamer Acer Nitro ED270, 27 Pol, VA, Curvo, FHD, 1ms, 240Hz, FreeSync',
        'cat'   => 'Monitor',
        'preco' => 1299.99,
        'img'   => 'img/Monitor1.jpg',
        'desc'  => '27" curvo VA, 240Hz, 1ms, FreeSync — imersão total nos games.',
    ],
    [
        'id'    => 'monitor2',
        'nome'  => 'Monitor Gamer AOC, 21.5 Pol, VA, FHD, 1ms, 120Hz, Adaptive-Sync, HDMI/VGA',
        'cat'   => 'Monitor',
        'preco' => 470.00,
        'img'   => 'img/Monitor2.jpg',
        'desc'  => '21.5" VA, 120Hz, 1ms, Adaptive-Sync — entrada acessível no setup gamer.',
    ],
    [
        'id'    => 'monitor3',
        'nome'  => 'Monitor Gamer Acer Nitro KG273 G0bi, 27 Pol, IPS, FHD, 1ms, 120Hz, Adaptive Sync',
        'cat'   => 'Monitor',
        'preco' => 845.00,
        'img'   => 'img/Monitor3.jpg',
        'desc'  => '27" IPS, 120Hz, 1ms, Adaptive Sync — cores vibrantes e ângulo de visão amplo.',
    ],

    // Placas-Mãe
    [
        'id'    => 'pm1',
        'nome'  => 'Placa Mãe AsRock Z890 Pro RS, DDR5, LGA1851, ATX, Chipset Intel Z890',
        'cat'   => 'Placa-Mãe',
        'preco' => 2090.00,
        'img'   => 'img/PM1.jpg',
        'desc'  => 'LGA1851, DDR5, ATX, Chipset Z890 — pronta para Intel Core Ultra série 2.',
    ],
    [
        'id'    => 'pm2',
        'nome'  => 'Placa Mãe Asus Prime A620M-E, DDR5, Socket AMD AM5, M-ATX, Chipset A620',
        'cat'   => 'Placa-Mãe',
        'preco' => 630.00,
        'img'   => 'img/PM2.jpg',
        'desc'  => 'AM5, DDR5, M-ATX, Chipset A620 — excelente custo-benefício para Ryzen.',
    ],
    [
        'id'    => 'pm3',
        'nome'  => 'Placa Mãe Gigabyte Z890 Aorus Pro Ice, DDR5, LGA1851, ATX, Chipset Intel Z890',
        'cat'   => 'Placa-Mãe',
        'preco' => 3999.99,
        'img'   => 'img/PM3.jpg',
        'desc'  => 'LGA1851, DDR5, ATX, Z890 — máxima performance para Intel Core Ultra.',
    ],

    // PCs Montados
    [
        'id'    => 'pc1',
        'nome'  => 'PC Gamer Japcs DeepCool, Intel Core Ultra 9 285, GeForce RTX 5080 16GB, 32GB DDR5',
        'cat'   => 'PC Montado',
        'preco' => 22100.00,
        'img'   => 'img/PC1.jpg',
        'desc'  => 'Topo absoluto: Core Ultra 9 285, RTX 5080 16GB, 32GB DDR5. Montado e certificado.',
    ],
    [
        'id'    => 'pc2',
        'nome'  => 'PC Gamer Japcs DeepCool, AMD Ryzen 7 9800X3D, GeForce RTX 5070 12GB',
        'cat'   => 'PC Montado',
        'preco' => 17102.00,
        'img'   => 'img/PC2.jpg',
        'desc'  => 'Melhor CPU para games: Ryzen 7 9800X3D + RTX 5070 12GB. Montado e certificado.',
    ],
    [
        'id'    => 'pc3',
        'nome'  => 'PC Gamer Japcs DeepCool, Intel i7-12700KF, GeForce RTX 5070 12GB, 16GB DDR5',
        'cat'   => 'PC Montado',
        'preco' => 12599.00,
        'img'   => 'img/PC3.jpg',
        'desc'  => 'Alta performance: i7-12700KF + RTX 5070 12GB, 16GB DDR5. Montado e certificado.',
    ],

];