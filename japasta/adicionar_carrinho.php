<?php
if(!isset($_SESSION)) session_start();

if(!isset($_POST['b_adicionar'])){
    header('Location: index.php');
    exit;
}

$produto_id    = $_POST['produto_id'];
$produto_nome  = $_POST['produto_nome'];
$produto_preco = floatval($_POST['produto_preco']);

if(!isset($_SESSION['carrinho'])) $_SESSION['carrinho'] = [];

$ja_existe = false;
foreach($_SESSION['carrinho'] as $indice => $item){
    if($item['id'] == $produto_id){
        $_SESSION['carrinho'][$indice]['quantidade'] = $item['quantidade'] + 1;
        $ja_existe = true;
        break;
    }
}

if(!$ja_existe){
    $_SESSION['carrinho'][] = [
        'id'         => $produto_id,
        'nome'       => $produto_nome,
        'preco'      => $produto_preco,
        'quantidade' => 1,
    ];
}

if(!isset($_SESSION['Logado']) || $_SESSION['Logado'] != 'ok'){
    $_SESSION['msg_login']          = 'Faça login para finalizar a compra.';
    $_SESSION['redirect_apos_login'] = 'carrinho.php';
    header('Location: login.php');
    exit;
}

$_SESSION['msg_vitrine'] = 'Produto adicionado ao carrinho!';
header('Location: carrinho.php');
exit;
?>