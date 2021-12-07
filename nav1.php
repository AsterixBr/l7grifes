<?php
ob_start();


function navBar()
{
    //$nome_usuario = $_SESSION['nomec'];
    //$perfil_usuario = $_SESSION['perfilc'];
    //$teste = "(61) 98494-1352";

    $nav1 = "
            ";
   

    if ($_SESSION['perfilp'] == "Cliente" || $_SESSION['perfilp'] == "") {
        $nav1 .= '<nav name="nav" id="nav" class="navbar navbar-expand-lg navbar-dark bg-dark ml-5">
        <div class="container-fluid">
  
          <a href="l7grifes.php" class="navbar-brand">L7 Grifes</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="true" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="navbar-collapse collapse show" id="navbarCollapse" style>
            <ul class="navbar-nav me-auto mb-2 mb-md-0">
              
                <a class="nav-link dropdown-toggle" id="navbarDropdown" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                  Produtos
                </a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                  <li><a class="dropdown-item" href="masculino.php">Masculinos</a></li>
                  <li><a class="dropdown-item" href="feminino.php">Femininos</a></li>
                  <li><a class="dropdown-item" href="Acessorios.php">Acessórios</a></li>
                </ul>
              </li>
              <li class="nav-item">
                <a href="carrinho.php" class="nav-link">Carrinho</a>
              </li>
  
            </ul>
            <form class="d-flex" style="margin-right:750px;">
              <input class="form-control me-2" type="search" placeholder="Pesquisar" aria-label="Search">
              <button class="btn btn-outline-success" type="submit">Pesquisar</button>
            </form>
            <div>
            </div>
          </div>
          <div>
						<a href="Login1.php" >
							LOGIN/CADASTRO
						</a>
          </nav>';

    } 
    elseif ($_SESSION['perfilp'] == "Administrador") {
      $nav1 .= ' <li class="nav-item dropdown">

      <ul class="dropdown-menu">
        <li><a class="dropdown-item" href="sessionDestroy.php">Sair</a></li>
        <li><a class="dropdown-item" href="Cadastro.php">Cadastrar Funcionário</a></li>
        <li><a class="dropdown-item" href="cadastroFornecedor.php">Cadastrar Fornecedor</a></li>
        <li><a class="dropdown-item" href="cadastroProduto.php">Cadastrar Produto</a></li>
        <li><a class="dropdown-item" href="marca.php">Cadastrar Marca</a></li>
      </ul>
    </li>';
    }elseif ($_SESSION['perfilp'] == "Funcionário") {
        $nav1 .= ' <li class="nav-item dropdown">
        <button type="button" class="btn btn-secondary dropdown-toggle" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
          Painel de Controle
        </button>
        <ul class="dropdown-menu">
          <li><a class="dropdown-item" href="sessionDestroy.php">Sair</a></li>
          <li><a class="dropdown-item" href="Cadastro.php">Cadastrar Funcionário</a></li>
          <li><a class="dropdown-item" href="cadastroFornecedor.php">Cadastrar Fornecedor</a></li>
          <li><a class="dropdown-item" href="cadastroProduto.php">Cadastrar Produto</a></li>
          <li><a class="dropdown-item" href="marca.php">Cadastrar Marca</a></li>
        </ul>
      </li>';
    }


    return $nav1;
}
?>
<?php ob_end_flush(); ?>