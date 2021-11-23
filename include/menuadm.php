<head>
    <title>Index</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/main.css">

    <meta name="robots" content="noindex, follow">
    <header style="color: white;">
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark ml-5">
            <div class="container-fluid">
                <a href="L7grifes.html" class="navbar-brand">L7 Grifes</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="true" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="navbar-collapse collapse show" id="navbarCollapse" style>
                    <ul class="navbar-nav me-auto mb-2 mb-md-0">
                        <li class="nav-item">
                            <a href="Produtos.php" class="nav-link">Produtos</a>
                        </li>
                        <li class="nav-item">
                            <a href="Carrinho.php" class="nav-link">Carrinho</a>
                        </li>
                        <li class="nav-item">
                            <a href="L7grifes.html" class="nav-link">Página Inicial</a>
                        </li>

                        <?php
                        if (isset($_SESSION['id'])) {
                        ?>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <?= $_SESSION['nome']; ?> <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu">
                                    <li>
                                        <a href="#" id="logout" onclick="efetuarLogout()">Logout</a>
                                    </li>
                                </ul>
                            </li>
                            <li>
                            <?php
                        } else {
                            ?>

                            <?php
                        }
                            ?>



                            <!-- Botão dropright dividido -->
                            <div class="btn-group dropright">
                                <!-- <button type="button" class="btn btn-secondary">
  <img src="img/Menu.png" height="30px" width="30px"> -->
                                </button>
                                <button type="button" class="btn btn-secondary dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <span class="sr-only">Dropright</span>
                                </button>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" style="color:black" href="sessionDestroy.php">Sair</a>
                                    <a class="dropdown-item" style="color:black" href="caixa.php">Caixa</a>
                                    <a class="dropdown-item" style="color:black" href="cadastroFornecedor.php">Cadastrar Fornecedor</a>
                                    <a class="dropdown-item" style="color:black" href="Cadastro.php">Cadastrar Funcionário</a>
                                    <a class="dropdown-item" style="color:black" href="cadastroProduto.php">cadastrar Produto</a>
                                    <a class="dropdown-item" style="color:black" href="/marca.php">Cadastrar Marca</a>


                                    <div class="dropdown-divider"></div>
                                </div>
                                <div class="dropdown-menu">
                                    <!-- Links do menu dropright -->
                                </div>
                    </ul>
                </div>
            </div>
        </nav>
    </header>
</head>
<script src="js/bootstrap.js"></script>
    <script src="js/bootstrap.min.js"></script>

	<script async src="https://www.googletagmanager.com/gtag/js?id=UA-23581568-13"></script>
	<script>
		window.dataLayer = window.dataLayer || [];
		function gtag() { dataLayer.push(arguments); }
		gtag('js', new Date());

		gtag('config', 'UA-23581568-13');
	</script>
	<script defer src="https://static.cloudflareinsights.com/beacon.min.js"
		data-cf-beacon='{"rayId":"68762adff90551ed","token":"cd0b4b3a733644fc843ef0b185f98241","version":"2021.8.1","si":10}'></script>
</body>

</html>