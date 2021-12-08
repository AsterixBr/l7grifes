<?php
ob_start();


function navBar()
{
    //$nome_usuario = $_SESSION['nomec'];
    //$perfil_usuario = $_SESSION['perfilc'];
    //$teste = "(61) 98494-1352";

    $nav1 = "
            ";
        $nav1 .= 
      '<nav name="nav" id="nav" class="navbar navbar-expand-lg navbar-dark bg-dark ml-5">
        <div class="container-fluid">
  
          <a href="index.php" class="navbar-brand">L7 Grifes</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="true" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="masculino.php">Produtos</a>
            </li>
            <li class="nav-item">
              <a class="nav-link active" href="Carrinho.php">Carrinho</a>
            </li>
            </ul>
            <a class="nav-link active float-right" href="login.php">Login/Cadastro</a>
            <a class="nav-link active" href="sessionDestroy.php">Sair</a>
          </div>
        <div>
						
        </nav>';

    return $nav1;
}
?>
<?php ob_end_flush(); ?>