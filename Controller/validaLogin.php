<?php
ob_start();
session_start();
if (!empty($_POST) AND (empty($_POST['email']) OR empty($_POST['senha']))){
    header("Location: ../sessionDestroy.php"); exit;
} 
require_once "./Dao/DaoLogin.php";
require_once ".model/Mensagem.php";
require_once "./model/Pessoa.php";

if(isset($_POST)){
    $email = $_POST['email'];
    $senha = $_POST['senha'];

}else{
    header("Location: ../sessionDestroy.php"); exit;
}

$daoLogin = new DaoLogin();

$resp = new Mensagem();
$resp = $daoLogin->validarLogin($email,$senha);

if(gettype($resp) == "object"){
    if(!isset($_SESSION['emailp'])){
        $_SESSION['idp'] = $resp->getIdpessoa();
        $_SESSION['nomep'] = $resp->getNome();
        $_SESSION['senhap'] = $resp->getSenha();
        $_SESSION['cpfp'] = $resp->getCpf();

        $_SESSION['nr'] = rand(1,1000000);
        $_SESSION['confereNr'] = $_SESSION['nr'];

        header("Location: ../l7grifes.html");
        exit;

    }else{
        $_SESSION['msg'] =  "Usuario Inexistente!!!";
        if(isset($_SESSION['email'])){
            $_SESSION['idp'] = null;
            $_SESSION['nomep'] = null;
            $_SESSION['senhap'] = null;
            $_SESSION['cpfp'] = null;
        }
        header("Location: ../login1.php");
        exit;
    }
}else{
    $_SESSION['msg'] = $resp;
    if(isset($_SESSION['email'])){
        $_SESSION['idp'] = null;
        $_SESSION['nomep'] = null;
        $_SESSION['senhap'] = null;
        $_SESSION['cpfp'] = null;
    }
    header("Location: ../login1.php");
    exit;
}
ob_end_flush();