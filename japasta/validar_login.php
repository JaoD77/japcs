<?php
if(!isset($_SESSION)) session_start();
include "app/cons.php";
require_once "app/DLL.php";

if(!isset($_POST['b_login'])){
    header('Location: login.php');
    exit;
}

$login = $_POST['login'];
$senha = $_POST['senha'];

$senha_salva = 0;
$cpf_ref     = '';

$consulta  = "SELECT * FROM login WHERE Login = '$login'";
$resultado = banco($server, $user, $password, $db, $consulta);

if($linha = $resultado->fetch_assoc()){
    $senha_salva = $linha['Senha'];
    $cpf_ref     = $linha['CPF'];
}

if(md5($senha) != $senha_salva){
    $_SESSION['erro_login'] = 'Login ou senha incorretos. Tente novamente.';
    header('Location: login.php');
    exit;
}

// Login válido — cria sessão
$_SESSION['Logado'] = 'ok';
$_SESSION['Nome']   = $login;
$_SESSION['CPF']    = $cpf_ref;

$consulta  = "SELECT * FROM usuarios WHERE CPF = '$cpf_ref'";
$resultado = banco($server, $user, $password, $db, $consulta);

if($dados = $resultado->fetch_assoc()){
    $_SESSION['NomeCompleto'] = $dados['Nome'];
    $_SESSION['Endereco']     = $dados['Endereco'];
    $_SESSION['Cidade']       = $dados['Cidade'];
    $_SESSION['Estado']       = $dados['Estado'];
} else {
    $_SESSION['NomeCompleto'] = $login;
}

// Redireciona para onde o usuário queria ir
if(isset($_SESSION['redirect_apos_login'])){
    $destino = $_SESSION['redirect_apos_login'];
    unset($_SESSION['redirect_apos_login']);
    header('Location: '.$destino);
    exit;
}

if(!empty($_SESSION['carrinho'])){
    header('Location: carrinho.php');
    exit;
}

header('Location: index.php');
exit;
?>