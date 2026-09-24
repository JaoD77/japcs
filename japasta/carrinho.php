<?php
if(!isset($_SESSION)) session_start();

if(!isset($_SESSION['Logado']) || $_SESSION['Logado'] != 'ok'){
    $_SESSION['msg_login']           = 'Faça login para ver seu carrinho.';
    $_SESSION['redirect_apos_login'] = 'carrinho.php';
    header('Location: login.php');
    exit;
}

if(isset($_GET['remover'])){
    $idx = intval($_GET['remover']);
    if(isset($_SESSION['carrinho'][$idx])){
        array_splice($_SESSION['carrinho'], $idx, 1);
    }
    header('Location: carrinho.php');
    exit;
}

if(isset($_GET['mais'])){
    $idx = intval($_GET['mais']);
    if(isset($_SESSION['carrinho'][$idx])){
        $_SESSION['carrinho'][$idx]['quantidade']++;
    }
    header('Location: carrinho.php');
    exit;
}

if(isset($_GET['menos'])){
    $idx = intval($_GET['menos']);
    if(isset($_SESSION['carrinho'][$idx])){
        $_SESSION['carrinho'][$idx]['quantidade']--;
        if($_SESSION['carrinho'][$idx]['quantidade'] <= 0){
            array_splice($_SESSION['carrinho'], $idx, 1);
        }
    }
    header('Location: carrinho.php');
    exit;
}

$carrinho = isset($_SESSION['carrinho']) ? $_SESSION['carrinho'] : [];
$total    = 0;
foreach($carrinho as $item) $total += $item['preco'] * $item['quantidade'];
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Carrinho — JAPCS</title>
  <link rel="stylesheet" href="css/style.css">
</head>
<body>

<header>
  <a class="logo" href="index.php">JAPCS</a>
  <nav>
    <a class="nav-a" href="index.php">Vitrine</a>
    <a class="nav-a" href="carrinho.php">Carrinho</a>
    <a class="nav-a" href="sair.php">Sair (<?= $_SESSION['Nome'] ?>)</a>
  </nav>
</header>

<div class="pagina-centralizada pagina-media">

  <div class="caixa-form">
    <div class="caixa-form-titulo">Meu Carrinho</div>

    <?php if(empty($carrinho)): ?>

      <div class="alerta alerta-info">
        Seu carrinho está vazio. <a class="caixa-form-link" href="index.php">Ver produtos</a>
      </div>

    <?php else: ?>

      <div class="carrinho-lista">
        <?php foreach($carrinho as $i => $item): ?>
        <div class="carrinho-item">
          <div class="carrinho-item-nome"><?= $item['nome'] ?></div>
          <div class="carrinho-item-qtd">
            <a href="carrinho.php?menos=<?= $i ?>">−</a>
            &nbsp;x<?= $item['quantidade'] ?>&nbsp;
            <a href="carrinho.php?mais=<?= $i ?>">+</a>
          </div>
          <div class="carrinho-item-preco">R$ <?= number_format($item['preco'] * $item['quantidade'], 2, ',', '.') ?></div>
          <a href="carrinho.php?remover=<?= $i ?>" class="btn btn-remover">✕ Remover</a>
        </div>
        <?php endforeach; ?>
      </div>

      <div class="carrinho-total">
        Total: <strong>R$ <?= number_format($total, 2, ',', '.') ?></strong>
      </div>

      <a href="confirmar.php" class="btn btn-primario btn-largo">Finalizar Compra →</a>
      <a href="index.php" class="btn btn-fantasma btn-largo">← Continuar Comprando</a>

    <?php endif; ?>
  </div>

</div>

<footer class="rodape">
  &copy; <?= date('Y') ?> JAPCS — Criado Para Fins Educativos
</footer>

</body>
</html>
