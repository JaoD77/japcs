<?php
if(!isset($_SESSION)) session_start();

if(!isset($_SESSION['Logado']) || $_SESSION['Logado'] != 'ok'){
    header('Location: login.php');
    exit;
}
$carrinho = isset($_SESSION['carrinho']) ? $_SESSION['carrinho'] : [];
if(empty($carrinho)){
    header('Location: carrinho.php');
    exit;
}
$total = 0;
foreach($carrinho as $item) $total += $item['preco'] * $item['quantidade'];
$nome_usuario = isset($_SESSION['NomeCompleto']) ? $_SESSION['NomeCompleto'] : $_SESSION['Nome'];
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Confirmar Compra — JAPCS</title>
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
    <div class="caixa-form-titulo">Confirmar Compra</div>

    <div class="resumo-caixa">
      <div class="resumo-titulo">Produtos</div>
      <?php foreach($carrinho as $item): ?>
      <div class="resumo-linha">
        <div class="resumo-linha-nome"><?= $item['nome'] ?> (x<?= $item['quantidade'] ?>)</div>
        <div class="resumo-linha-valor">R$ <?= number_format($item['preco'] * $item['quantidade'], 2, ',', '.') ?></div>
      </div>
      <?php endforeach; ?>
      <div class="resumo-linha resumo-linha-total">
        <div class="resumo-linha-nome">TOTAL</div>
        <div class="resumo-linha-total-valor">R$ <?= number_format($total, 2, ',', '.') ?></div>
      </div>
    </div>

    <div class="resumo-caixa">
      <div class="resumo-titulo">Seus Dados</div>
      <div class="resumo-linha">
        <div class="resumo-linha-nome">Nome</div>
        <div class="resumo-linha-valor"><?= $nome_usuario ?></div>
      </div>
      <div class="resumo-linha">
        <div class="resumo-linha-nome">Login</div>
        <div class="resumo-linha-valor"><?= $_SESSION['Nome'] ?></div>
      </div>
      <?php if(!empty($_SESSION['Endereco'])): ?>
      <div class="resumo-linha">
        <div class="resumo-linha-nome">Endereço</div>
        <div class="resumo-linha-valor"><?= $_SESSION['Endereco'] ?></div>
      </div>
      <?php endif; ?>
      <?php if(!empty($_SESSION['Cidade'])): ?>
      <div class="resumo-linha">
        <div class="resumo-linha-nome">Cidade / UF</div>
        <div class="resumo-linha-valor"><?= $_SESSION['Cidade'] ?> / <?= $_SESSION['Estado'] ?></div>
      </div>
      <?php endif; ?>
    </div>

    <form method="POST" action="salvar_venda.php">
      <div class="resumo-caixa">
        <div class="resumo-titulo">Forma de Pagamento</div>
        <div class="pagamento-opcoes">
          <div class="pagamento-opcao">
            <input type="radio" name="pagamento" id="pix" value="PIX" checked>
            <label for="pix">PIX — 5% de desconto</label>
          </div>
          <div class="pagamento-opcao">
            <input type="radio" name="pagamento" id="boleto" value="Boleto">
            <label for="boleto">Boleto Bancário</label>
          </div>
          <div class="pagamento-opcao">
            <input type="radio" name="pagamento" id="cartao" value="Cartão de Crédito">
            <label for="cartao">Cartão de Crédito (até 12x)</label>
          </div>
        </div>
      </div>
      <button type="submit" name="b_confirmar" class="btn btn-sucesso btn-largo">
        Confirmar Compra
      </button>
    </form>

    <a href="carrinho.php" class="btn btn-fantasma btn-largo">← Voltar ao Carrinho</a>

  </div>
</div>

<footer class="rodape">
  &copy; <?= date('Y') ?> JAPCS — Criado Para Fins Educativos
</footer>

</body>
</html>