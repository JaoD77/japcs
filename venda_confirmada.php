<?php
if(!isset($_SESSION)) session_start();

if(!isset($_SESSION['Logado']) || $_SESSION['Logado'] != 'ok'){
    header('Location: login.php');
    exit;
}

if(!isset($_SESSION['dados_venda'])){
    header('Location: index.php');
    exit;
}

$venda        = $_SESSION['dados_venda'];
$nome_usuario = isset($_SESSION['NomeCompleto']) ? $_SESSION['NomeCompleto'] : $_SESSION['Nome'];

unset($_SESSION['dados_venda']);
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Pedido Confirmado — JAPCS</title>
  <link rel="stylesheet" href="css/style.css">
</head>
<body>

<header>
  <a class="logo" href="index.php">JAPCS</a>
  <nav>
    <a class="nav-a" href="index.php">Vitrine</a>
    <a class="nav-a" href="sair.php">Sair (<?= $_SESSION['Nome'] ?>)</a>
  </nav>
</header>

<div class="pagina-centralizada">
  <div class="caixa-form">

    <div class="confirmacao-icone">✅</div>
    <div class="confirmacao-titulo">Pedido Confirmado!</div>
    <div class="confirmacao-subtitulo">
      Obrigado, <strong><?= $nome_usuario ?></strong>!
      Seu pedido foi registrado com sucesso.
    </div>

    <div class="confirmacao-numero">
      <div class="confirmacao-numero-label">Número do Pedido</div>
      #<?= $venda['numero'] ?>
    </div>

    <div class="resumo-caixa">
      <div class="resumo-titulo">Itens do Pedido</div>
      <?php foreach($venda['produtos'] as $item): ?>
      <div class="resumo-linha">
        <div class="resumo-linha-nome"><?= $item['nome'] ?> (x<?= $item['quantidade'] ?>)</div>
        <div class="resumo-linha-valor">R$ <?= number_format($item['preco'] * $item['quantidade'], 2, ',', '.') ?></div>
      </div>
      <?php endforeach; ?>
      <div class="resumo-linha resumo-linha-total">
        <div class="resumo-linha-nome">TOTAL</div>
        <div class="resumo-linha-total-valor">R$ <?= number_format($venda['total'], 2, ',', '.') ?></div>
      </div>
    </div>

    <div class="resumo-caixa">
      <div class="resumo-titulo">Detalhes</div>
      <div class="resumo-linha">
        <div class="resumo-linha-nome">Pagamento</div>
        <div class="resumo-linha-valor"><?= $venda['pagamento'] ?></div>
      </div>
      <div class="resumo-linha">
        <div class="resumo-linha-nome">Data / Hora</div>
        <div class="resumo-linha-valor"><?= $venda['data'] ?></div>
      </div>
    </div>

    <a href="index.php" class="btn btn-primario btn-largo">← Continuar Comprando</a>

  </div>
</div>

<footer class="rodape">
  &copy; <?= date('Y') ?> JAPCS — Criado Para Fins Educativos
</footer>

</body>
</html>