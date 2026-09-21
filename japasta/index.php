<?php
if(!isset($_SESSION)) session_start();
require 'produtos.php';
$produtos = isset($produtos) && is_array($produtos) ? $produtos : [];
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>JAPCS — Peças e PCs Gamer</title>
  <link rel="stylesheet" href="css/style.css">
</head>
<body>

<header>
  <a class="logo" href="index.php">JAPCS</a>
  <nav>
    <a class="nav-a" href="index.php">Vitrine</a>
    <a class="nav-a" href="carrinho.php">Carrinho
      <?php if(!empty($_SESSION['carrinho'])): ?>
        <div class="nav-emblema-carrinho"><?= count($_SESSION['carrinho']) ?></div>
      <?php endif; ?>
    </a>
    <?php if(isset($_SESSION['Logado']) && $_SESSION['Logado'] == 'ok'): ?>
      <a class="nav-a" href="sair.php">Sair (<?= $_SESSION['Nome'] ?>)</a>
    <?php else: ?>
      <a class="nav-a" href="login.php">Entrar</a>
      <a class="nav-a" href="cadastro1.php">Cadastrar</a>
    <?php endif; ?>
  </nav>
</header>

<div class="banner">
  <h1 class="banner-titulo">Hardware de <em>Alta Performance</em><br>Para Quem Joga de Verdade</h1>
  <p class="banner-subtitulo">Peças selecionadas e PCs montados com garantia e preço justo</p>
</div>

<?php if(isset($_SESSION['msg_vitrine'])): ?>
  <div class="aviso-vitrine">
    <div class="alerta alerta-sucesso"><?= $_SESSION['msg_vitrine'] ?></div>
  </div>
  <?php unset($_SESSION['msg_vitrine']); ?>
<?php endif; ?>
<div class="titulo-secao">Produtos em Destaque</div>
<div class="grade-produtos">
  <?php foreach($produtos as $p): ?>
  <div class="produto-card">

    <div class="produto-imagem">
      <img src="<?= $p['img'] ?>" alt="<?= $p['nome'] ?>" class="produto-img">
    </div>

    <div class="produto-corpo">
      <div class="produto-categoria"><?= $p['cat'] ?></div>
      <div class="produto-nome"><?= $p['nome'] ?></div>
      <div class="produto-descricao"><?= $p['desc'] ?></div>
    </div>

    <div class="produto-rodape">
      <div class="produto-preco">
        <div class="produto-preco-legenda">à partir de</div>
        R$ <?= number_format($p['preco'], 2, ',', '.') ?>
      </div>
      <form method="POST" action="adicionar_carrinho.php">
        <input type="hidden" name="produto_id"    value="<?= $p['id'] ?>">
        <input type="hidden" name="produto_nome"  value="<?= $p['nome'] ?>">
        <input type="hidden" name="produto_preco" value="<?= $p['preco'] ?>">
        <button type="submit" name="b_adicionar" class="btn btn-primario">+ Carrinho</button>
      </form>
    </div>

  </div>
  <?php endforeach; ?>
</div>

<footer class="rodape">
  &copy; <?= date('Y') ?> JAPCS — Criado Para Fins Educativos
</footer>

</body>
</html>
