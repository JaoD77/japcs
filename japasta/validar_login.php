<?php
if (!isset($_SESSION)) session_start();
include "app/cons.php";
require_once "app/DLL.php";

if (!isset($_POST['b_login'])) {
    header('Location: login.php');
    exit;
}

extract($_POST);

$senha_salva = 0;
$id_usuario  = 0;

$consulta  = "SELECT * FROM login WHERE Login = '$login'";
$resultado = banco($server, $user, $password, $db, $consulta);

if ($linha = $resultado->fetch_assoc()) {
    $senha_salva = $linha['Senha'];
    $id_usuario  = $linha['IdUsuario'];
}

if (md5($senha) != $senha_salva) {
    $_SESSION['erro_login'] = 'Login ou senha incorretos. Tente novamente.';
    header('Location: login.php');
    exit;
}

// Login válido — cria sessão
$_SESSION['Logado'] = 'ok';
$_SESSION['Nome']   = $login;

$consulta  = "SELECT * FROM usuarios WHERE Id = '$id_usuario'";
$resultado = banco($server, $user, $password, $db, $consulta);

if ($dados = $resultado->fetch_assoc()) {
    $_SESSION['CPF']          = $dados['CPF'];
    $_SESSION['NomeCompleto'] = $dados['Nome'];
    $_SESSION['Endereco']     = $dados['Endereco'];
    $_SESSION['Cidade']       = $dados['Cidade'];
    $_SESSION['Estado']       = $dados['Estado'];
} else {
    $_SESSION['NomeCompleto'] = $login;
}

// Redireciona para onde o usuário queria ir
if (isset($_SESSION['redirect_apos_login'])) {
    $destino = $_SESSION['redirect_apos_login'];
    unset($_SESSION['redirect_apos_login']);
    header('Location: '.$destino);
    exit;
}

if (!empty($_SESSION['carrinho'])) {
    header('Location: carrinho.php');
    exit;
}

header('Location: index.php');
exit;
?>
