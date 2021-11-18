<?php
ob_start();
session_start();
if (!empty($_POST) AND (empty($_POST['email']) OR empty($_POST['senha']))) {
	//redireciona para a página inicial.
	header("Location: ../sessionDestroy.php"); exit;
}
require_once "C:/xampp/htdocs/l7grifes/dao/DaoLogin.php";
require_once "C:/xampp/htdocs/l7grifes/model/Mensagem.php";
require_once "C:/xampp/htdocs/l7grifes/model/Pessoa.php";

if(isset($_POST)){
    $login = $_POST['email'];
    $senha = $_POST['senha'];
}else{
    header("Location: ../sessionDestroy.php"); exit;
}

$daoLogin = new DaoLogin();

$resp = new Pessoa();
$resp = $daoLogin->validarLogin($email, $senha);
//echo gettype($resp);

if(gettype($resp) == "object"){
    if(!isset($_SESSION['email'])){
        $_SESSION['email'] = $resp->getemail();
        $_SESSION['id'] = $resp->getIdpessoa();
        $_SESSION['nome'] = $resp->getNome();
        $_SESSION['perfil'] = $resp->getPerfil();
        $_SESSION['cpf'] = $resp->getCpf();
        
        $_SESSION['nr'] = rand(1,1000000);
        $_SESSION['confereNr'] = $_SESSION['nr'];
        //echo($_SESSION['nr'])."<br>";
        //echo($_SESSION['confereNr'])."<br>";
        header("Location: ../principal.php");
        exit;

    }
}else{
    $_SESSION['msg'] = $resp;
    if(isset($_SESSION['email'])){
        $_SESSION['email'] = null;
        $_SESSION['id'] = null;
        $_SESSION['nome'] = null;
        $_SESSION['perfil'] = null;
        $_SESSION['cpf'] = null;
    }
    header("Location: ../index.php");
    exit;
}
ob_end_flush();