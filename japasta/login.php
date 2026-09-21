<?php
if(!isset($_SESSION)) session_start();

if(isset($_SESSION['Logado']) && $_SESSION['Logado'] == 'ok'){
    header('Location: carrinho.php');
    exit;
}
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Login — JAPCS</title>
  <link rel="stylesheet" href="css/style.css">
</head>
<body>

<header>
  <a class="logo" href="index.php">JAPCS</a>
  <nav>
    <a class="nav-a" href="index.php">Vitrine</a>
    <a class="nav-a" href="carrinho.php">Carrinho</a>
    <a class="nav-a" href="login.php">Entrar</a>
    <a class="nav-a" href="cadastro1.php">Cadastrar</a>
  </nav>
</header>

<div class="pagina-centralizada">

  <?php if(isset($_SESSION['msg_login'])): ?>
    <div class="alerta alerta-info"><?= $_SESSION['msg_login'] ?></div>
    <?php unset($_SESSION['msg_login']); ?>
  <?php endif; ?>

  <?php if(isset($_SESSION['erro_login'])): ?>
    <div class="alerta alerta-erro"><?= $_SESSION['erro_login'] ?></div>
    <?php unset($_SESSION['erro_login']); ?>
  <?php endif; ?>

  <div class="caixa-form">
    <div class="caixa-form-titulo">Entrar na Conta</div>

    <form method="POST" action="validar_login.php">
      <div class="campo-formulario">
        <label class="campo-label" for="login">Login</label>
        <input type="text" id="login" name="login" placeholder="Seu usuário" required>
      </div>
      <div class="campo-formulario">
        <label class="campo-label" for="senha">Senha</label>
        <input type="password" id="senha" name="senha" placeholder="••••••••" required>
      </div>
      <button type="submit" name="b_login" class="btn btn-primario btn-largo">Entrar</button>
    </form>

    <div class="caixa-form-links">
      <a class="caixa-form-link" href="cadastro1.php">Não tem conta? Cadastre-se</a>
      <a class="caixa-form-link" href="index.php">← Voltar à vitrine</a>
    </div>
  </div>

</div>

<footer class="rodape">
  &copy; <?= date('Y') ?> JAPCS — Criado Para Fins Educativos
</footer>

</body>
</html>