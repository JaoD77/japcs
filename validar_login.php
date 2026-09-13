<?php
if(!isset($_SESSION)) session_start();

if(!isset($_POST['b_login'])){
    header('Location: login.php');
    exit;
}

$login = $_POST['login'];
$senha = $_POST['senha'];

$arquivo_login = 'login/'.$login.'.dat';
$senha_salva   = 0;
$cpf_ref       = '';

if(file_exists($arquivo_login)){
    $arq   = fopen($arquivo_login, 'r');
    $linha = fgets($arq, 1000);
    fclose($arq);

    $partes      = explode('|', trim($linha));
    $senha_salva = $partes[0];
    $cpf_ref     = isset($partes[1]) ? $partes[1] : '';
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

$arquivo_usuario = 'usuarios/'.$cpf_ref.'.dat';

if(file_exists($arquivo_usuario)){
    $arq_u = fopen($arquivo_usuario, 'r');
    $dados  = fgets($arq_u, 2000);
    fclose($arq_u);

    $d = explode('|', trim($dados));
    $_SESSION['NomeCompleto'] = isset($d[0]) ? $d[0] : $login;
    $_SESSION['Endereco']     = isset($d[2]) ? $d[2] : '';
    $_SESSION['Cidade']       = isset($d[4]) ? $d[4] : '';
    $_SESSION['Estado']       = isset($d[5]) ? $d[5] : '';
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