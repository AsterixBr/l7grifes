<?php
ob_start();
session_start();
if (!empty($_POST) AND (empty($_POST['email']) OR empty($_POST['senha']))) {
	//redireciona para a página inicial.
	header("Location: ../sessionDestroy.php"); exit;
}
require_once __DIR__ . "/../Dao/DaoLogin.php";
require_once __DIR__ . "/../model/Mensagem.php";
require_once __DIR__ . "/../model/Pessoa.php";

if(isset($_POST)){
    $email = $_POST['email'];
    $senha = $_POST['senha'];
}else{
    header("Location: ../sessionDestroy.php"); exit;
}

//echo "$email, $senha";
$daoLogin = new DaoLogin();

$resp = new Pessoa();
$resp = $daoLogin->validarLogin($email, $senha);
//echo gettype($resp);

if(gettype($resp) == "object"){
    if(!isset($_SESSION['login'])){
        $nome = $resp->getNome();
        echo "<script>alert($nome);</script>";
        $_SESSION['idp'] = $resp->getIdpessoa();
        $_SESSION['nomep'] = $resp->getNome();
        $_SESSION['perfilp'] = $resp->getPerfil();
        
        $_SESSION['nr'] = rand(1,1000000);
        $_SESSION['confereNr'] = $_SESSION['nr'];
        //echo($_SESSION['nr'])."<br>";
        //echo($_SESSION['confereNr'])."<br>";
        header("Location: ../L7grifes.php");
        exit;

    }
}else{
    $_SESSION['msg'] = $resp;
    if(isset($_SESSION['emailp'])){
        $_SESSION['emailp'] = null;
        $_SESSION['idp'] = null;
        $_SESSION['nomep'] = null;
        $_SESSION['perfilp'] = null;
    }
    header("Location: ../login1.php");
    exit;
}
ob_end_flush();