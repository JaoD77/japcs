<?php
if(!isset($_SESSION)) session_start();
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Cadastro — Dados Pessoais — JAPCS</title>
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
    <div class="barra-etapas-item barra-etapas-item-ativa">
      <div class="barra-etapas-numero">1</div>
      Dados Pessoais
    </div>
    <div class="barra-etapas-divisor"></div>
    <div class="barra-etapas-item">
      <div class="barra-etapas-numero">2</div>
      Acesso
    </div>
  </div>

  <?php if(isset($_SESSION['erro_cad1'])): ?>
    <div class="alerta alerta-erro"><?= $_SESSION['erro_cad1'] ?></div>
    <?php unset($_SESSION['erro_cad1']); ?>
  <?php endif; ?>

  <div class="caixa-form">
    <div class="caixa-form-titulo">Dados Pessoais</div>

    <form method="POST" action="salvar_usuario.php">

      <div class="campo-formulario">
        <label class="campo-label" for="nome">Nome Completo</label>
        <input type="text" id="nome" name="nome" placeholder="João: Me 10 Paranhos" required>
      </div>

      <div class="campo-formulario">
        <label class="campo-label" for="cpf">CPF</label>
        <input type="text" id="cpf" name="cpf" placeholder="000.000.000-00" maxlength="14" required>
      </div>

      <div class="campo-formulario">
        <label class="campo-label" for="endereco">Endereço</label>
        <input type="text" id="endereco" name="endereco" placeholder="Rua do ifba sla, 123" required>
      </div>

      <div class="campos-duplos">
        <div class="campo-formulario">
          <label class="campo-label" for="bairro">Bairro</label>
          <input type="text" id="bairro" name="bairro" placeholder="Centro" required>
        </div>
        <div class="campo-formulario">
          <label class="campo-label" for="cep">CEP</label>
          <input type="text" id="cep" name="cep" placeholder="00000-000" maxlength="9" required>
        </div>
      </div>

      <div class="campos-duplos">
        <div class="campo-formulario">
          <label class="campo-label" for="cidade">Cidade</label>
          <input type="text" id="cidade" name="cidade" placeholder="Eunapolis" required>
        </div>
        <div class="campo-formulario">
          <label class="campo-label" for="estado">Estado</label>
          <select id="estado" name="estado" required>
            <option value="">Selecione</option>
            <?php
            foreach(['AC','AL','AP','AM','BA','CE','DF','ES','GO','MA','MT','MS',
                     'MG','PA','PB','PR','PE','PI','RJ','RN','RS','RO','RR','SC',
                     'SP','SE','TO'] as $estado){
                echo "<option value='$estado'>$estado</option>";
            }
            ?>
          </select>
        </div>
      </div>

      <button type="submit" name="b_salvar_usuario" class="btn btn-primario btn-largo">
        Continuar → Etapa 2
      </button>

    </form>

    <div class="caixa-form-links">
      <a class="caixa-form-link" href="login.php">Já tem conta? Faça login</a>
    </div>

  </div>
</div>

<footer class="rodape">
  &copy; <?= date('Y') ?> JAPCS — Criado Para Fins Educativos
</footer>

</body>
</html>