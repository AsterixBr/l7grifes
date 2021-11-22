<?php
session_start();
$id = $_GET['id'];
$_SESSION['carrinho'][$id]-= 1;
$_SESSION['contador']-=1;

header("Location: Carrinho.php");
exit();
