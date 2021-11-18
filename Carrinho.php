<?php
ob_start();
if (!isset($_SESSION)) {
    session_start();
}

if((!isset($_SESSION['email']) || !isset($_SESSION['nome'])) ||
        !isset($_SESSION['perfil']) || !isset($_SESSION['nr']) ||
        ($_SESSION['nr'] != $_SESSION['confereNr'])) { 
    // Usuário não logado! Redireciona para a página de login 
    header("Location: sessionDestroy.php");
    exit;

        }
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
	<meta charset="UTF-8">
	<style type="text/css">
		* {
			margin: 0;
			padding: 0;
			box-sizing: border-box
		}

		h2 {
			background-color: #069;
			width: 100%;
			padding: 20px;
			text-align: center;
			color: white;
		}

		.carrinho-container {
			display: flex;
			margin-top: 10px;
			text-align: center;
		}

		.produto {
			width: 33.3%;
			padding: 0 30px;
		}

		.produto img {
			max-width: 100%
		}

		.produto a {
			display: block;
			width: 100%;
			padding: 10px;
			color: white;
			background-color: #5fb382;
			text-align: center;
			text-decoration: none;
		}

		.carrinho-item {
			max-width: 1200px;
			margin: 10px auto;
			padding-bottom: 10px;

			border-bottom: 2px dotted #ccc;

		}

		.carrinho-item p {
			font-size: 16px;
			color: gray;
		}
	</style>
</head>

<body>
	<aside>
		<h2>Carrinho</h2>
		<div class="carrinho-container">

			<?php

			$items = array(
				['nome' => 'Camisa Nike', 'imagem' => 'imagem/nike.jpg', 'preco' => '200'],
				['nome' => 'Camisa Tommy', 'imagem' => 'imagem/tommy.jpg', 'preco' => '100'],
				['nome' => 'Camisa Brasil', 'imagem' => 'imagem/brasil.jpg', 'preco' => '300'],
			);

			foreach ($items as $key => $value) {
			?>
				<div class="produto">
					<img src="<?php echo $value['imagem'] ?>" />
					<a href="?adicionar=<?php echo $key ?>">Adicionar ao carrinho!</a>
				</div>
			<?php
			}
			?>
		</div>
		<?php
		if (isset($_GET['adicionar'])) {
			$idProduto = (int) $_GET['adicionar'];
			if (isset($items[$idProduto])) {
				if (isset($_SESSION['carrinho'][$idProduto])) {
					$_SESSION['carrinho'][$idProduto]['quantidade']++;
				} else {
					$_SESSION['carrinho'][$idProduto] = array('quantidade' => 1, 'nome' => $items[$idProduto]['nome'], 'preco' => $items[$idProduto]['preco']);
				}
				//echo '<script>alert("O item foi adicionado ao carrinho.");</script>';
			} else {
				die("você não pode adicionar o produto que não exsite");
			}
		}
		if (isset($_SESSION['remover']) && $_GET['remover'] == "carrinho") {
			$idProduto = $_GET['id'];
			unset($_SESSION['items'][$idProduto]);
			echo '<meta http-EQUIV="REFRESH" CONTENT="0;URL=carrinho.php"/>';
		}


		?>
		<h2>Carrinho:</h2>
		<?php
		foreach ($_SESSION['carrinho'] as $key => $value) {
			//Nome do produto
			//Quantidade
			//Preco
			echo '<div class="carrinho-item">';
			echo '<p>Nome: ' . $value['nome'] . ' | Quantidade: ' . $value['quantidade'] . ' | Preço: R$' . ($value['quantidade'] * $value['preco']) . ',00<br></p>';
			echo '<a href="carrinho.php?remover' . $key . '">Remover</a>';
			echo '</div>';
		}
		?>

</body>

</html>