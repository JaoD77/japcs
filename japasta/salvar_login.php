<?php
if(!isset($_SESSION)) session_start();
include "app/cons.php";
require_once "app/DLL.php";

if(!isset($_POST['b_salvar_login'])){
    header('Location: cadastro2.php');
    exit;
}

if(!isset($_SESSION['CPF_cad'])){
    header('Location: cadastro1.php');
    exit;
}

$login   = $_POST['login'];
$senha   = $_POST['senha'];
$senha2  = $_POST['senha2'];
$cpf_ref = $_SESSION['CPF_cad'];

if($senha != $senha2){
    $_SESSION['erro_cad2'] = 'As senhas não conferem. Tente novamente.';
    header('Location: cadastro2.php');
    exit;
}

if(strlen($senha) < 6){
    $_SESSION['erro_cad2'] = 'A senha deve ter no mínimo 6 caracteres.';
    header('Location: cadastro2.php');
    exit;
}

$consulta  = "SELECT * FROM login WHERE Login = '$login'";
$resultado = banco($server, $user, $password, $db, $consulta);

if($resultado->num_rows > 0){
    $_SESSION['erro_cad2'] = 'Este login já está em uso. Escolha outro.';
    header('Location: cadastro2.php');
    exit;
}

$senha_md5 = md5($senha);
$consulta  = "INSERT INTO login (Id, Login, Senha, CPF) VALUES (NULL, '$login', '$senha_md5', '$cpf_ref')";
banco($server, $user, $password, $db, $consulta);

unset($_SESSION['CPF_cad']);
unset($_SESSION['Nome_cad']);

$_SESSION['msg_login'] = 'Cadastro realizado com sucesso! Faça login para continuar.';
header('Location: login.php');
exit;
?>