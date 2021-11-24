<?php
if (!isset($_SESSION)) {
    session_start();
	include_once 'nav.php';
}
if (!isset($_SESSION['msg'])) {
    $_SESSION['msg'] = "";
}

$_SESSION['nr'] = "-1";
$_SESSION['confereNr'] = "-2";
?>

<!DOCTYPE html>
<html lang="pt-br">

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
				<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse"
					aria-controls="navbarCollapse" aria-expanded="true" aria-label="Toggle navigation">
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
					</ul>
				</div>
			</div>
		</nav>
	</header>
</head>

<body>
	<div class="limiter" >
		<div class="container-login100">
			<div class="wrap-login100">
				<form class="login100-form validate-form" method="post" action="./controller/validaLogin.php">
					<span class="login100-form-title p-b-26">
						L7 Grifes
					</span>
					<span class="login100-form-title p-b-48">
						<i class="zmdi zmdi-font"></i>
					</span>
					<div class="wrap-input100 validate-input" data-validate="Valid email is: a@b.c">
						<input class="input100" type="text" name="email">
						<span class="focus-input100" data-placeholder="Email"></span>
					</div>
					<div class="wrap-input100 validate-input" data-validate="Enter password">
						<span class="btn-show-pass">
							<i class="zmdi zmdi-eye"></i>
						</span>
						<input class="input100" type="password" name="senha">
						<span class="focus-input100" data-placeholder="Senha"></span>
					</div>
					<div class="container-login100-form-btn">
						<div class="wrap-login100-form-btn">
							<div class="login100-form-bgbtn"></div>
							<input type="submit" value="Login" class="btnlogin100-form-btn">
							
						</div>
					</div>
					<div class="text-center p-t-115">
						<span class="txt1">
							Não tem cadastro?</span>
						<a class="txt2" href="CadastroCliente.php">
							Cadastre-se
						</a>
					</div>
				</form>
			</div>
		</div>
	</div>
	<div id="dropDownSelect1"></div>

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