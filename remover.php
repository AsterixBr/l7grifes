<?php
session_start();
if(isset($_GET['id']) && $_GET['remover'] == "carrinho"){
    $idProduto = $_GET['id'];
    unset($_SESSION['itens'][$idProduto]);
    echo '<META HTTP-EQUIV="REFRESH" CONTENT="0;URL=carrinho.php"/>';
}