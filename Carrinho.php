<?php
session_start();
include_once 'head.html';
include_once './DataBase/conecta.php';
include_once './Controller/ClienteController.php';
/*
	$conn = new Conexao();
	$conn = $conn->conexao();

	$user = new ClienteController();
	$result = $user->isLoggedIn();
	
	$stmt4 = $conn->prepare('
		SELECT * FROM carrinho_has_produto;');
	$stmt4->execute();
	$count = 0;
	$count = $stmt4->rowCount();

	if($result == false){
		header('Location: login.php');
	}

	$cpf = $_SESSION["user_cpf"];
	$stmt = $conn->prepare('
		SELECT produto.nome, produto.valor, produto.imagem, produto.idproduto, gerou.quantidade FROM produto 

		INNER JOIN
			(SELECT carrinho_has_produto.produto_idproduto, carrinho_has_produto.quantidade FROM carrinho_has_produto
				INNER JOIN produto ON carrinho_has_produto.produto_idproduto = produto.idproduto
				INNER JOIN carrinho ON carrinho_has_produto.carrinho_idcarrinho = carrinho.idcarrinho 
		        WHERE carrinho.cliente_cpf = "'.$cpf.'"
			GROUP BY carrinho_has_produto.produto_idproduto) as gerou 

		ON produto.idproduto = gerou.produto_idproduto
    	GROUP BY produto.nome;');

	$total = 0;
	$stmt->execute();
		
	$resultado_carrinho = $stmt->fetchAll(); */
?>

<!DOCTYPE HTML>
<html>

<body>

	<div id="page">
		<nav class="navbar navbar-expand-lg navbar-dark bg-dark ml-5">
			<div class="container-fluid">
				<a href="#" class="navbar-brand">L7 Grifes</a>
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
							<a href="#" class="nav-link">Painel de Controle</a>
						</li>
					</ul>
					<div>
						<a href="Login.html" class="animated-button1">
							<span></span>
							<span></span>
							<span></span>
							<span></span>
							LOGIN/CADASTRO
						</a>
					</div>
				</div>
			</div>
		</nav>
		<aside id="colorlib-hero" class="breadcrumbs">
			<div class="flexslider">
				<ul class="slides">
					<li style="background-image: url(images/3.jpg);">
						<div class="overlay"></div>
						<div class="container-fluid">
							<div class="row">
								<div class="col-md-6 col-md-offset-3 col-sm-12 col-xs-12 slider-text">
									<div class="slider-text-inner text-center">
										<h1>Carrinho de compras</h1>
										<h2 class="bread"><span><a href="L7grifes.php">Home</a></span><span>Carrinho de compras</span></h2>
									</div>
								</div>
							</div>
						</div>
					</li>
				</ul>
			</div>
		</aside>

		<div class="colorlib-shop">
			<div class="container">
				<div class="row row-pb-md">
					<div class="col-md-10 col-md-offset-1">
						<div class="process-wrap">
							<div class="process text-center active">
								<p><span>01</span></p>
								<h3>Carrinho de compras</h3>
							</div>
							<div class="process text-center">
								<p><span>02</span></p>
								<h3> Pagamento </h3>
							</div>
							<div class="process text-center">
								<p><span>03</span></p>
								<h3>Finalizado</h3>
							</div>
						</div>
					</div>
				</div>
				<div class="row row-pb-md">
					<div class="col-md-10 col-md-offset-1">
						<div class="product-name">
							<div class="one-forth text-center">
								<span>Detalhes dos produtos</span>
							</div>
							<div class="one-eight text-center">
								<span>Preço</span>
							</div>
							<div class="one-eight text-center">
								<span>Quantidade</span>
							</div>
							<div class="one-eight text-center">
								<span>Total</span>
							</div>
							<div class="one-eight text-center">
								<span>Remover</span>
							</div>
						</div>

						<?php
						$count = 0;
						$total = 0;
						foreach ($resultado_carrinho as $row) {
							echo '
											
								<div class="product-cart">
									<div class="one-forth">
										<div class="product-img" style="background-image: url(images/' . $row[2] . '.jpg);">
										</div>
										<div class="display-tc">
											<h3 id="nome">' . $row[0] . '</h3>
										</div>
									</div>
									<div class="one-eight text-center">
										<div class="display-tc">
											<span class="price" for="id_valor" id="id_valor">R$ ' .
								number_format($row[1], 2, ",", ".") . '</span>
										</div>
									</div>
									<div class="one-eight text-center">
										<div class="display-tc">
											<form method="post" action="../App/Controller/updateQtd.php">
												<input type="number" for="id_quantidade" name="id_quantidade" id="id_quantidade" class="form-control  input-number text-center" value="' . $row[4] . '" min="1" max="100"> 
												<input style="visibility: hidden; width:2%;height:2%;" type="number" name="idproduto" value="' . $row[3] . '"> <br>
												<button class="btn btn-primary"> alterar </button>
											</form>
										</div>
									</div>
									<div class="one-eight text-center">
										<div class="display-tc">
											<span for="id_total" class="price" id="id_total" name="id_total" >R$ ' . number_format($row[1] * $row[4], 2, ",", ".") . '</span>
										</div>
									</div>
									<div class="one-eight text-center">
										<div class="display-tc">
											<a href="../App/Controller/delete.php?produto=' . $row[3] . '" class="closed" style="background-color: #FFC300"></a>
										</div>
									</div>
								</div>
							';

							$count = $row[1] * $row[4];
							$total = $count + $total;
						}
						?>

					</div>
				</div>
				<div class="row">
					<div class="col-md-10 col-md-offset-1">
						<div class="total-wrap">
							<div class="row">
								<div class="col-md-8">
									<form action="#">
										<div class="row form-group">
										</div>
									</form>
								</div>
								<div class="col-md-3 col-md-push-1 text-center">
									<div class="total">
										<div class="grand-total">
											<p><span><strong>Total:</strong></span> <span>R$ <?php echo number_format($total, 2, ",", ".");
																								?></span></p>
										</div>
									</div>
									<?php
									if ($count == 0) {
										echo '<p><a class="btn btn-primary"   style="opacity: 0.5;
  filter: alpha(opacity=50)"> Proximo </a disabled></p>';
									} else {
										echo '<p><a href="checkout.php?proximo=true&carrinho=true" class="btn btn-primary"> Proximo </a></p>';
									}
									?>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

		<?php
		require_once("footer.html")
		?>

	</div>

	<div class="gototop js-top">
		<a href="#" class="js-gotop"><i class="icon-arrow-up2"></i></a>
	</div>

</body>

</html>