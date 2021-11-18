<?php
session_start();
if (!isset($_SESSION['itens'])) 
{
    $_SESSION['itens'] = array();
}

if (isset($_GET['add']) && $_GET['add'] == "carrinho")

{
    /*Adiciona ao carrinho */
    $idProduto = $_GET['id'];
    if(!isset($_SESSION['itens'][$idProduto]))
    {
        $_SESSION['itens'][$idProduto] = 1;
    }else{
        $_SESSION['itens'][$idProduto] += 1;
    
    }
}

/*exibe o carrinho*/
if(count($_SESSION['itens']) == 0) {
    echo 'Carrinho Vazio<br><a href="index.php"> Adicionar itens </a>';
}else {
    $conectadb = new PDO('mysql:host=localhost;dbname=l7grifes', "root","senac");
    foreach($_SESSION['itens'] as $idProduto => $quantidade)
}
$select