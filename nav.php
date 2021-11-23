<?php
ob_start();
/*
if (!isset($_SESSION)) {
    session_start();
}

if((!isset($_SESSION['email']) || !isset($_SESSION['nome'])) ||
        !isset($_SESSION['perfilp']) || !isset($_SESSION['nr']) ||
        ($_SESSION['nr'] != $_SESSION['confereNr'])) { 
    // Usuário não logado! Redireciona para a página de login 
    header("Location: sessionDestroy.php");
    exit;
}*/
function navBar(){
$nav = '<nav class="navbar navbar-expand-lg navbar-dark bg-dark ml-5">
<div class="container-fluid">
  
  <a href="#" class="navbar-brand">L7 Grifes</a>
  <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse"
    aria-controls="navbarCollapse" aria-expanded="true" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="navbar-collapse collapse show" id="navbarCollapse" style>
    <ul class="navbar-nav me-auto mb-2 mb-md-0">
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown"
          aria-expanded="false">
          Produtos
        </a>
        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
          <li><a class="dropdown-item" href="masculino.php">Masculinos</a></li>
          <li><a class="dropdown-item" href="Femenino.php">Femeninos</a></li>
          <li><a class="dropdown-item" href="Acessorios.php">Acessórios</a></li>
        </ul>
      </li>
      <li class="nav-item">
        <a href="#" class="nav-link">Carrinho</a>
      </li>
     
    </ul>
    <form class="d-flex" style="margin-right:750px;">
      <input class="form-control me-2" type="search" placeholder="Pesquisar" aria-label="Search">
      <button class="btn btn-outline-success" type="submit">Pesquisar</button>
    </form>
    <div>
      ';
      if($_SESSION['perfilp'] == "Funcionário" || $_SESSION['perfilp'] == "Administrador" ){
        $nav .=  "
    <li class=\"nav-item dropdown\">
        <a class=\"nav-link dropdown-toggle\" href=\"#\" id=\"navbarDropdownMenuLink\" 
        role=\"button\" data-bs-toggle=\"dropdown\" aria-expanded=\"false\">
            Painel de Controle
        </a>
        <ul class=\"dropdown-menu\" aria-labelledby=\"navbarDropdownMenuLink\">
            <li><a class=\"dropdown-item\" href=\"sessionDestroy.php\">Sair</a></li>
            <li><a class=\"dropdown-item\" href=\"Cadastro.php\">Cadastrar Funcionário</a></li>
            <li><a class=\"dropdown-item\" href=\"cadastroFornecedor.php\">Cadastrar Fornecedor</a></li>
            <li><a class=\"dropdown-item\" href=\"cadastroProduto.php\">Cadastrar Produto</a></li>
            <li><a class=\"dropdown-item\" href=\"marca.php\">Cadastrar Marca</a></li>
        </ul>
    </li>";

    }
    $nav .='</div>
  </div>
</div>
</nav>';

 return $nav;               
}
ob_end_flush();
?>