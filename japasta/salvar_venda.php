<?php
if(!isset($_SESSION)) session_start();
include "app/cons.php";
require_once "app/DLL.php";

if(!isset($_SESSION['Logado']) || $_SESSION['Logado'] != 'ok'){
    header('Location: login.php');
    exit;
}

if(!isset($_POST['b_confirmar'])){
    header('Location: confirmar.php');
    exit;
}

$carrinho = isset($_SESSION['carrinho']) ? $_SESSION['carrinho'] : [];

if(empty($carrinho)){
    header('Location: carrinho.php');
    exit;
}
extract($_POST);
$num_venda     = date('YmdHis').rand(1000, 9999);
$data_hora     = date('d/m/Y H:i:s');
$nome_completo = isset($_SESSION['NomeCompleto']) ? $_SESSION['NomeCompleto'] : $_SESSION['Nome'];

$total = 0;
foreach($carrinho as $item) $total += $item['preco'] * $item['quantidade'];

$itens = [];
foreach($carrinho as $item){
    $itens[] = $item['nome'].' x'.$item['quantidade'].' (R$ '.number_format($item['preco'] * $item['quantidade'], 2, ',', '.').')';
}
$lista_produtos = implode('|', $itens);
$total_bd       = number_format($total, 2, '.', '');
$login_sessao   = $_SESSION['Nome'];

$consulta = "INSERT INTO vendas (Id, NumVenda, Login, NomeCompleto, Produtos, Data, Total, Pagamento) VALUES (NULL, '$num_venda', '$login_sessao', '$nome_completo', '$lista_produtos', '$data_hora', '$total_bd', '$pagamento')";
banco($server, $user, $password, $db, $consulta);

$_SESSION['carrinho']       = [];
$_SESSION['dados_venda'] = [
    'numero'    => $num_venda,
    'produtos'  => $carrinho,
    'total'     => $total,
    'pagamento' => $pagamento,
    'data'      => $data_hora,
];

header('Location: venda_confirmada.php');
exit;
?>
