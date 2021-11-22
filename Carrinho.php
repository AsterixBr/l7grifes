<?php
session_start();
?>
<html>
  <head>
      <link href="css/bootstrap.min.css" rel="stylesheet">
      <link rel="stylesheet" href="bootstrapSelectpicker/dist/css/bootstrap-select.min.css" />
      <style>
          td{ 
              text-align: center;
              padding: 5px; 
              border: 1px solid blue;
              font-weight: bold;
          }
      </style>
  </head>
  <body>
  <div class="container">
    <div class="row">
        <h2>Carrinho de Compra - Exemplo <a href="sessionDestroy.php" class="btn btn-default">Sair</a></h2>
      <hr />
    </div>
    <div class="row">
        <div class="col-md-12">
            <table>
        <?php
        include_once 'DataBase/conecta.php';
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
                    $valorTotal += ($carrinho * (double)$linha['valor']);
                ?>      
                <tr>
                    <td><img src="<?php echo $linha['imagem']; ?>" width="64"></td>
                    <td><?php echo $linha["nome"]; ?></td>
                    <td><?php echo "R$ ".$linha["valor"]; ?></td>
                    <td><?php echo $carrinho; ?></td>
                    <td><a href="esvaziarCarrinho.php?id=<?php echo $key; ?>" ><img src="img/deleta.ico" width="16"></a></td>
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
              <a href="finalizarCompra.php" class="btn btn-default">Finalizar Compra</a>
          </div>
          <?php
                   }else{
          ?>
          <div class="col-md-12">
              <a href="cart.php" class="btn btn-default">Comprar</a>
          </div>
          <?php
                   }
          ?>
      </div>
  </div>
  
  <script src="bootstrapSelectpicker/js/jquery.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="bootstrapSelectpicker/js/bootstrap-select.js"></script>
  <script src="bootstrapSelectpicker/js/bootstrap-select.mim.js"></script>
</body>
</html>
