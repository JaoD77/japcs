<?php
if(!isset($_SESSION)) session_start();
include "app/cons.php";
require_once "app/DLL.php";

if(!isset($_POST['b_salvar_usuario'])){
    header('Location: cadastro1.php');
    exit;
}

$nome     = $_POST['nome'];
$cpf      = $_POST['cpf'];
$endereco = $_POST['endereco'];
$bairro   = $_POST['bairro'];
$cidade   = $_POST['cidade'];
$estado   = $_POST['estado'];
$cep      = $_POST['cep'];

$cpf_limpo = preg_replace('/\D/', '', $cpf);

if(strlen($cpf_limpo) != 11){
    $_SESSION['erro_cad1'] = 'CPF inválido. Digite os 11 dígitos.';
    header('Location: cadastro1.php');
    exit;
}

$consulta  = "SELECT * FROM usuarios WHERE CPF = '$cpf_limpo'";
$resultado = banco($server, $user, $password, $db, $consulta);

if($resultado->num_rows > 0){
    $_SESSION['erro_cad1'] = 'CPF já cadastrado. Faça login ou use outro CPF.';
    header('Location: cadastro1.php');
    exit;
}

$consulta = "INSERT INTO usuarios (Id, Nome, CPF, Endereco, Bairro, Cidade, Estado, CEP) VALUES (NULL, '$nome', '$cpf_limpo', '$endereco', '$bairro', '$cidade', '$estado', '$cep')";
banco($server, $user, $password, $db, $consulta);

$_SESSION['CPF_cad']  = $cpf_limpo;
$_SESSION['Nome_cad'] = $nome;

header('Location: cadastro2.php');
exit;
?>