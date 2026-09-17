<?php
// produtos.php — Catálogo de produtos da JAPCS
//Agora busca os produtos direto do banco de dados
include "app/cons.php";
require_once "app/DLL.php";

$produtos = array();

$consulta  = "SELECT * FROM produtos";
$resultado = banco($server, $user, $password, $db, $consulta);

while($linha = $resultado->fetch_assoc()){
    $produtos[] = array(
        'id'    => $linha['Codigo'],
        'nome'  => $linha['Nome'],
        'cat'   => $linha['Categoria'],
        'preco' => $linha['Preco'],
        'img'   => $linha['Imagem'],
        'desc'  => $linha['Descricao'],
    );
}
?>