<?php

ob_start();
include_once 'nav.php';
if (!isset($_SESSION)) {
    session_start();
}

include_once 'C:/xampp\htdocs/l7grifes/Controller/MarcaController.php';
include_once 'C:/xampp/htdocs/l7grifes/model/Marca.php';
include_once 'C:/xampp/htdocs/l7grifes/model/Mensagem.php';

$msg = new Mensagem();
$fr = new Marca();
$btEnviar = FALSE;
$btAtualizar = FALSE;
$btExcluir = FALSE;
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <title>Marca</title>
</head>
<header style="color: white;">
<?php
    $nav = navBar();
    echo $nav;
    ?>
</header>

<body>
    <div class="container-fluid">
        <div class="row" style="margin-top: 30px;">
            <div class="col-md-4">
                <div class="card-header bg-dark text-center border
                         text-white"><strong>Cadastro da Marca</strong>
                </div>
                <div class="card-body border">
                    <?php
                    if (isset($_POST['cadastrarMarca'])) {
                        $nomeMarca = trim($_POST['nomeMarca']);
                        if ($nomeMarca != "") {
                            $representante = $_POST['representante'];
                            $emailRepresentante = $_POST['emailRepresentante'];


                            $fc = new MarcaController();
                            unset($_POST['cadastrarMarca']);
                            $msg = $fc->inserirMarca(
                                $nomeMarca,
                                $representante,
                                $emailRepresentante
                            );
                            echo $msg->getMsg();
                            echo "<META HTTP-EQUIV='REFRESH' CONTENT=\"2;
                                    URL='Marca.php'\">";
                        }
                    }

                    //método para atualizar dados do produto no BD
                    if (isset($_POST['atualizarMarca'])) {
                        $nomeMarca = trim($_POST['nomeMarca']);
                        if ($nomeMarca != "") {
                            $idMarca = $_POST['idMarca'];
                            $representante = $_POST['representante'];
                            $emailRepresentante = $_POST['emailRepresentante'];

                            $fc = new MarcaController();
                            unset($_POST['atualizarMarca']);
                            $msg = $fc->atualizarMarca(
                                $idMarca,
                                $nomeMarca,
                                $representante,
                                $emailRepresentante
                            );
                            echo $msg->getMsg();
                            echo "<META HTTP-EQUIV='REFRESH' CONTENT=\"2;
                                    URL='Marca.php'\">";
                        }
                    }

                    if (isset($_POST['excluir'])) {
                        if ($fr != null) {
                            $id = $_POST['ide'];

                            $fc = new MarcaController();
                            unset($_POST['excluir']);
                            $msg = $fc->excluirMarca($id);
                            echo $msg->getMsg();
                            echo "<META HTTP-EQUIV='REFRESH' CONTENT=\"2;
                                    URL='Marca.php'\">";
                        }
                    }

                    if (isset($_POST['excluirMarca'])) {
                        if ($fr != null) {
                            $id = $_POST['idMarca'];
                            unset($_POST['excluirMarca']);
                            $fc = new MarcaController();
                            $msg = $fc->excluirMarca($id);
                            echo $msg->getMsg();
                            echo "<META HTTP-EQUIV='REFRESH' CONTENT=\"2;
                                    URL='Marca.php'\">";
                        }
                    }

                    if (isset($_POST['limpar'])) {
                        $fr = null;
                        unset($_GET['id']);
                        header("Location: Marca.php");
                    }
                    if (isset($_GET['id'])) {
                        $btEnviar = TRUE;
                        $btAtualizar = TRUE;
                        $btExcluir = TRUE;
                        $id = $_GET['id'];
                        $fc = new MarcaController();
                        $fr = $fc->pesquisarMarcaId($id);
                    }
                    ?>

                    <div class="container" style="margin-top: 40px; width:500px;">
                        <h3>Marca do Produto</h3>
                        <form action="Marca.php" method="post" style="margin-top: 20px">
                            <div class="form-group">
                                Código: <label style="color:red;">
                                    <?php
                                    if ($fr != null) {
                                        echo $fr->getIdMarca();
                                    ?>
                                </label>
                                <input type="hidden" name="idMarca" value="<?php echo $fr->getIdMarca(); ?>"><br>
                            <?php
                                    }
                            ?>
                            <label>Nome</label>
                            <input type="text" class="form-control" name="nomeMarca" placeholder="Insira o nome da marca" autocomplete="off" value="<?php echo $fr->getNomeMarca(); ?>">
                            <label>Representante</label>
                            <input type="text" class="form-control" name="representante" placeholder="Insira o nome do representante" autocomplete="off" value="<?php echo $fr->getRepresentante(); ?>">
                            <label>E-mail</label>
                            <input type="email" class="form-control" name="emailRepresentante" placeholder="Insira o email representante" autocomplete="off" value="<?php echo $fr->getEmailRepresentante(); ?>">
                            </div>
                            <br>
                            <div style="text-align: center;">
                                <input type="submit" name="limpar" class="btn btn-light btInput" value="Limpar">
                                <input type="button" name="excluirMarca" class="btn btn-warning btInput" value="Excluir" data-bs-toggle="modal" data-bs-target="#exampleModal" <?php if ($btExcluir == FALSE) echo "disabled"; ?>>
                                <input type="submit" name="atualizarMarca" class="btn btn-secondary btInput" value="Atualizar" <?php if ($btAtualizar == FALSE) echo "disabled"; ?>>
                                <button type="submit" name="cadastrarMarca" class="btn btn-success btInput" <?php if ($btEnviar == TRUE) echo "disabled"; ?>>Adicionar</button>
                            </div>
                            <!-- Modal para excluir -->
                            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="ModalLabel">
                                                Confirmar Exclusão</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <h5>Deseja Excluir?</h5>
                                        </div>
                                        <div class="modal-footer">
                                            <input type="submit" name="excluirMarca" class="btn btn-dark " value="Sim">
                                            <input type="submit" class="btn btn-dark" name="limpar" value="Não">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- fim do modal para excluir -->
                            &nbsp;&nbsp;
                            <br>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <div class="row">
                    <div class="col-md-12">
                        <table class="table table-striped table-responsive" style="border-radius: 3px; overflow:hidden; text-align: center;">
                            <thead class="table-dark">
                                <tr>
                                    <th>Código</th>
                                    <th>Marca</th>
                                    <th>Representante</th>
                                    <th>E-Mail</th>
                                    <th colspan="2">Ações</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $fcTable = new MarcaController();
                                $listaMarcas = $fcTable->listarMarcas();
                                $a = 0;
                                if ($listaMarcas != null) {
                                    foreach ($listaMarcas as $lf) {
                                        $a++;
                                ?>
                                        <tr>
                                            <td><?php print_r($lf->getIdMarca()); ?></td>
                                            <td><?php print_r($lf->getNomeMarca()); ?></td>
                                            <td><?php print_r($lf->getRepresentante()); ?></td>
                                            <td><?php print_r($lf->getEmailRepresentante()); ?></td>

                                            <td><a href="Marca.php?id=<?php echo $lf->getIdMarca(); ?>" class="btn btn-dark">
                                                    Editar</a>
                                                </form>
                                                <button type="button" class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#exampleModal<?php echo $a; ?>">
                                                    Excluir</button>
                                            </td>
                                        </tr>
                                        <!-- Modal -->
                                        <div class="modal fade" id="exampleModal<?php echo $a; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form method="post" action="">
                                                            <label><strong>Deseja excluir o marca
                                                                    <?php echo $lf->getNomeMarca(); ?>?</strong></label>
                                                            <input type="hidden" name="ide" value="<?php echo $lf->getIdMarca(); ?>">
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="submit" name="excluir" class="btn btn-dark">Sim</button>
                                                        <button type="reset" class="btn btn-dark" data-bs-dismiss="modal">Não</button>
                                                    </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                <?php
                                    }
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="js/bootstrap.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jQuery.js"></script>
    <script src="js/jQuery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script>

</body>

</html>