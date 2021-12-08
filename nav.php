<?php
ob_start();
if (!isset($_SESSION)) {
  session_start();  
}
function navBar()
{
  if ($_SESSION['perfilp'] != "Cliente") {

    $nav = "".'

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="l7grifes.php">L7grifes</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="Cadastro.php">Cadastro Funcionário</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" href="cadastroFornecedor.php">Cadastro Fornecedor</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" href="Marca.php" >Cadastro Marca</a>
        </li>
        <li class="nav-item">
        <a class="nav-link active" href="sessionDestroy.php" >Sair</a>
      </li>
      </ul>
    </div>
  </div>
</nav>';

    


  }else{
    header('Location: sessionDestroy.php'); exit();
  }
  return $nav;
}
ob_end_flush();
?>