<?php
session_start();
if (!isset($_SESSION['carrinho'])) {
    $_SESSION['carrinho'] = array();
    $_SESSION['contador'] = 0;
}
?>
<html>
    <head>
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" href="bootstrapSelectpicker/dist/css/bootstrap-select.min.css" />
    </head>
    <body>
        <div class="container">
            <div class="row">
                <h2>Carrinho de Compra - Exemplo <a href="sessionDestroy.php" class="btn btn-default">Sair</a></h2>
                <hr />
            </div>
            <div class="row">
                <div class="col-md-12">
                    <?php
                    /*
                    foreach ($_SESSION['carrinho'] as $key => $carrinho) {
                        if($carrinho > 0)
                            echo "Produto: " . $key . " - Qtd: " . $carrinho . "<br>";
                    }*/
                    echo "<img src='img/cart0.png' width='76'>";
                    echo "<label style='position:relative; top: -5px; left: -38px; font-weight: bold; font-size:24; color:#b12f0a'>" . $_SESSION['contador'] . "</label>";
                    ?>
                    <br>
                    <a href="carrinho.php" class="btn btn-default">Finalizar Compra</a>
                </div>
            </div>  
            <div class="row">
                <div class="col-md-12">
                    <table>
                        <tr>
                            <?php
                            include_once 'Conecta.php';
                            $sql = "select * from produto";
                            $query = mysqli_query($db, $sql)or die(mysqli_error($db));
                            $linhas = mysqli_fetch_array($query);
                            if ($linhas) {
                                $cont = 0;
                                do {
                                    $cont++;
                                    if ($cont > 5) {
                                        echo "</tr><tr>";
                                        $cont = 0;
                                    }
                                    ?>
                                    <td style="padding: 10px;">
                                        <img src="<?php echo $linhas['imagem']; ?>" style="padding: 5px; border: 1px solid blue;" width="180" height="180">
                                        <br><?php echo $linhas["nome"]; ?><br><?php echo $linhas["valor"]; ?><br>
                                        <?php
                                        if ($linhas["qtdEstoque"] > 0) {
                                            ?>
                                            <form method="get" action="produto.php">
                                                <input type="hidden" name="produto" value="<?php echo $linhas['idProduto']; ?>">
                                                <input type="submit" value="Comprar" class="btn btn-default" name="addCarrinho"/>
                                            </form>
                                            <?php
                                        } else {
                                            echo "<label style='color:red; font-weight: bold; padding-top: 10px;'>Indisponível</label>";
                                        }
                                        ?>
                                    </td>
                                    <?php
                                } while ($linhas = mysqli_fetch_array($query));
                                ?>
                                <?php
                            }
                            ?>
                        </tr>
                    </table>
                    <br><br><br><br>
                </div>
            </div>
        </div>

        <script src="bootstrapSelectpicker/js/jquery.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="bootstrapSelectpicker/js/bootstrap-select.js"></script>
        <script src="bootstrapSelectpicker/js/bootstrap-select.mim.js"></script>
    </body>
</html>
