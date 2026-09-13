<?php
if(!isset($_SESSION)) session_start();

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
$pagamento     = $_POST['pagamento'];
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

$linha = $num_venda.'|'.
         $_SESSION['Nome'].'|'.
         $nome_completo.'|'.
         $lista_produtos.'|'.
         $data_hora.'|'.
         number_format($total, 2, '.', '').'|'.
         $pagamento;

if(!is_dir('vendas')) mkdir('vendas', 0777, true);

$arquivo_venda = 'vendas/'.$num_venda.'.dat';
$arq = fopen($arquivo_venda, 'w');
fwrite($arq, $linha);
fclose($arq);

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