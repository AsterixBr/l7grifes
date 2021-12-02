<?php
session_start();
if (!isset($_SESSION['carrinho'])) {
  $_SESSION['carrinho'] = array();
  $_SESSION['contador'] = 0;
}
include_once 'nav.php';
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
          <td>Produto</td>
          <td>Quantidade</td>
          <td>Preço</td>
          <td>Subtotal</td>
          <td>Remover</td>
        </tr>
      </thead>
      <form action="" method="post">
        <tfoot>
          <tr>
            <td colspan="4">Valor Total:</td>
            <td>R$ <?php echo number_format($total, 2, ',','.');?></td>
          </tr>
          <tr>
            <td><input class="btn reload" type="submit" name="atualizar" value="Atualizar Carrinho"></td>
            <td><a class="btn" href="l7grifes.php">Continuar Comprando</a></td>
          </tr>
        </tfoot>

        <tbody>
         <?php
          $contador = count($produtos);
          if($contador == 0){
            echo'<tr><td colspan="5">Não existem produtos no carrinho!</td></tr>';
          }else{
            foreach($produtos as $indice => $produto):
         ?>
          <tr>
            <td><?php echo $produto['titulo'];?></td>
            <td><input type="text" size="3" name="qtd[<?php echo $indice;?>]" value="<?php echo $produto['qtd'];?>"></td>
            <td>R$ <?php echo number_format($produto['preco'], 2,',','.');?></td>
            <td>R$ <?php echo number_format($produto['subtotal'], 2,',','.');?></td>
            <td><a class="btn" href="remover.php">Remover</a></td>
          </tr>
            <?php endforeach; }?>
         
        </tbody>
      </form>

    </table>
  </div>
  
  <script src="bootstrapSelectpicker/js/jquery.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/bootstrap.js"></script>
  <script src="bootstrapSelectpicker/js/bootstrap-select.js"></script>
  <script src="bootstrapSelectpicker/js/bootstrap-select.mim.js"></script>
   <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script>
</body>
</html>
