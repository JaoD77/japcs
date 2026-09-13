<?php
if(!isset($_SESSION)) session_start();

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

if(!is_dir('login')) mkdir('login', 0777, true);

$arquivo_login = 'login/'.$login.'.dat';

if(file_exists($arquivo_login)){
    $_SESSION['erro_cad2'] = 'Este login já está em uso. Escolha outro.';
    header('Location: cadastro2.php');
    exit;
}

//senha_md5|cpf
$linha = md5($senha).'|'.$cpf_ref;

$arq = fopen($arquivo_login, 'w');
fwrite($arq, $linha);
fclose($arq);

unset($_SESSION['CPF_cad']);
unset($_SESSION['Nome_cad']);

$_SESSION['msg_login'] = 'Cadastro realizado com sucesso! Faça login para continuar.';
header('Location: login.php');
exit;
?>