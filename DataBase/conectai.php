<?php
$url = "localhost:3306";
$usuario = "root";
$senha = "senac";
$base = "l7grifes";

$db = mysqli_connect($url, $usuario, $senha, $base) or die("Banco fora do ar");
mysqli_select_db($db, $base) or die("Banco inexistente.");