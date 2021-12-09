<?php
session_start();

include_once 'nav1.php';
include_once __DIR__.'/Controller/ProdutoController.php';
include_once __DIR__.'/model/Produto.php';
$produto = new Produto();
$pc = new ProdutoController();
$listaProdutos = $pc->listarProdutos();

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
<link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Carrinho com php oo - Carrrinho (cart)</title>
  <link rel="stylesheet" href="css/style.css">
</head>
<body>
<?php 
      $nav = navBar();
      echo $nav;
    ?>

  <div class="container">
  <h2>Carrinho de compras</h2>
    <table class="carrinho" border="1" cellppading="0" cellspacing="0">

      <thead>
        <tr>
          <td>Imagem</td>
          <td>Produto</td>
          <td>Quantidade</td>
          <td>Preço</td>
          <td>Remover</td>
        </tr>
      </thead>
      <form action="" method="post">

        <tbody>
          <?php
        include_once './DataBase/conectai.php';
        $valorTotal = 0;
        foreach ($_SESSION['carrinho'] as $key => $carrinho) {
            if($carrinho < 1){
                $_SESSION['carrinho'][$key] = null;
                $key = 0;
            }
            if($key > 0){
                $sql = "select * from produto where idProduto = '$key'";
                $query = mysqli_query($db, $sql)or die(mysqli_error($db));
                $linha = mysqli_fetch_array($query); 
                do{
                    $valorTotal += ($carrinho * (double)$linha['vlrVenda']);
                ?>      
                <tr>
                    <td><img src="<?php echo $linha['Imagem']; ?>" width="64"></td>
                    <td><?php echo $linha['nomeProduto']; ?></td>
                    <td><?php echo $linha["qtdEstoque"]; ?></td>
                    <td><?php echo "R$ ".$linha["vlrVenda"]; ?></td>
                    <td><a href="esvaziarCarrinho.php?id=<?php echo $key; ?>" ><img src="img/remover.png" width="16"></a></td>
                </tr>         
            <?php
                }while($linha = mysqli_fetch_array($query));
            } 
        }
        ?>
            </table>
        </div>
    </div>
      <div class="row">
          <div class="col-md-12">
              <?php
                   if($_SESSION['contador'] > 0){
                       echo "Total dos produtos: ". $_SESSION['contador']." - Valor Total: R$ " . $valorTotal;  
              ?>
          </div>
          <div class="col-md-12">
              <a href="finalizarCompra.php" class="btn">Finalizar Compra</a>
          </div>
          <?php
                   }else{
          ?>
          <div class="col-md-12">
              <a href="masculino.php" class="btn">Comprar</a>
          </div>
          <?php
                   }
          ?>
      </div>
  </div>
         
        </tbody>
      </form>

    </table>
  </div>
  <footer>

<div class="container">
  <footer class="d-flex flex-wrap justify-content-between align-items-center py-3 my-4 border-top">
    <div class="col-md-4 d-flex align-items-center">
      <a href="/" class="mb-3 me-2 mb-md-0 text-muted text-decoration-none lh-1">
      </a>
      <span class="text-muted">&copy; L7_grifes</span>
    </div>

    <ul class="nav col-md-4 justify-content-end list-unstyled d-flex">Contato
      <li class="ms-3"><a class="text-muted" href="#"><svg class="bi" width="24" height="24">
            <use xlink:href="#twitter" />
          </svg></a></li>
      <li class="ms-3"><a class="text-muted" href="https://www.instagram.com/l7_grifes/"><svg class="bi" width="24" height="24">
            <use xlink:href="#instagram" />
          </svg></a></li>
      <li class="ms-3"><a class="text-muted" href="https://www.facebook.com/L7_grifes-105941117913524"><svg class="bi" width="24" height="24">
            <use xlink:href="#facebook" />
          </svg></a></li>
    </ul>
  </footer>
</div>

</footer>
  
  <script src="bootstrapSelectpicker/js/jquery.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/bootstrap.js"></script>
  <script src="bootstrapSelectpicker/js/bootstrap-select.js"></script>
  <script src="bootstrapSelectpicker/js/bootstrap-select.mim.js"></script>
   <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script>
</body>
</html>