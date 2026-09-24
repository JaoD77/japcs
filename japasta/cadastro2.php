<?php
if(!isset($_SESSION)) session_start();

if(!isset($_SESSION['CPF_cad'])){
    header('Location: cadastro1.php');
    exit;
}
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Cadastro — Dados de Acesso — JAPCS</title>
  <link rel="stylesheet" href="css/style.css">
</head>
<body>

<header>
  <a class="logo" href="index.php">JAPCS</a>
  <nav>
    <a class="nav-a" href="index.php">Vitrine</a>
    <a class="nav-a" href="carrinho.php">Carrinho</a>
    <a class="nav-a" href="login.php">Entrar</a>
  </nav>
</header>

<div class="pagina-centralizada">

  <div class="barra-etapas">
    <div class="barra-etapas-item">
      <div class="barra-etapas-numero">1</div>
      Dados Pessoais
    </div>
    <div class="barra-etapas-divisor"></div>
    <div class="barra-etapas-item barra-etapas-item-ativa">
      <div class="barra-etapas-numero">2</div>
      Acesso
    </div>
  </div>

  <?php if(isset($_SESSION['erro_cad2'])): ?>
    <div class="alerta alerta-erro"><?= $_SESSION['erro_cad2'] ?></div>
    <?php unset($_SESSION['erro_cad2']); ?>
  <?php endif; ?>

  <div class="alerta alerta-info">
    Olá, <strong><?= $_SESSION['Nome_cad'] ?></strong>! Agora crie seu login e senha.
  </div>

  <div class="caixa-form">
    <div class="caixa-form-titulo">Dados de Acesso</div>

    <form method="POST" action="salvar_login.php">

      <div class="campo-formulario">
        <label class="campo-label" for="login">Login</label>
        <input type="text" id="login" name="login" placeholder="ex: JaoDale" required autocomplete="off">
      </div>

      <div class="campo-formulario">
        <label class="campo-label" for="senha">Senha</label>
        <input type="password" id="senha" name="senha" placeholder="Mínimo 6 caracteres" required minlength="6">
      </div>

      <div class="campo-formulario">
        <label class="campo-label" for="senha2">Confirmar Senha</label>
        <input type="password" id="senha2" name="senha2" placeholder="Repita a senha" required>
      </div>

      <button type="submit" name="b_salvar_login" class="btn btn-primario btn-largo">
        Finalizar Cadastro
      </button>

    </form>
  </div>

</div>

<footer class="rodape">
  &copy; <?= date('Y') ?> JAPCS — Criado Para Fins Educativos
</footer>

</body>
</html>
