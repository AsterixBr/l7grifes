<?php
session_start();
include_once 'nav.php';
include_once 'C:/xampp/htdocs/l7grifes/Controller/FornecedorController.php';
include_once 'C:/xampp/htdocs/l7grifes/model/Fornecedor.php';
include_once 'C:/xampp/htdocs/l7grifes/model/Mensagem.php';
$msg = new Mensagem();
$fr = new Fornecedor();
$btEnviar = FALSE;
$btAtualizar = FALSE;
$btExcluir = FALSE;
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Cadastro</title>

    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <style>
        .btInput {
            margin-top: 20px;
        }

        .pad15 {
            padding-bottom: 15px;
            padding-top: 15px;
        }
    </style>
    <script>
        function mascara(t, mask) {
            var i = t.value.length;
            var saida = mask.substring(1, 0);
            var texto = mask.substring(i)
            if (texto.substring(0, 1) != saida) {
                t.value += texto.substring(0, 1);
            }
        }
    </script>
</head>

<body>
    <?php
    $nav = navBar();
    echo $nav;
    ?>
    <label id="cepErro" style="color:red;"></label>

    <div class="container-fluid">
        <div class="row" style="margin-top: 30px;">
            <div class="col-md-4">
                <div class="card-header bg-dark text-center border
                         text-white"><strong>Cadastro de Fornecedor</strong>
                </div>
                <div class="card-body border">
                    <?php
                    //envio dos dados para o BD
                    if (isset($_POST['cadastrarFornecedor'])) {
                        $nomeFornecedor = trim($_POST['nomeFornecedor']);
                        if ($nomeFornecedor != "") {
                            $email = $_POST['email'];
                            $tellFixo = $_POST['tellFixo'];
                            $cell = $_POST['cell'];
                            $cep = $_POST['cep'];
                            $logradouro = $_POST['logradouro'];
                            $uf = $_POST['uf'];
                            $bairro = $_POST['bairro'];
                            $cidade = $_POST['cidade'];
                            $complemento = $_POST['complemento'];
                            $representante = $_POST['representante'];

                            $fc = new FornecedorController();
                            unset($_POST['cadastrarFornecedor']);
                            $msg = $fc->inserirFornecedor(
                                $nomeFornecedor,
                                $logradouro,
                                $complemento,
                                $bairro,
                                $cidade,
                                $uf,
                                $cep,
                                $representante,
                                $email,
                                $tellFixo,
                                $cell
                            );
                            echo $msg->getMsg();
                            echo "<META HTTP-EQUIV='REFRESH' CONTENT=\"2;
                                    URL='cadastroFornecedor.php'\">";
                        }
                    }

                    //método para atualizar dados do produto no BD
                    if (isset($_POST['atualizarFornecedor'])) {
                        $nomeFornecedor = trim($_POST['nomeFornecedor']);
                        if ($nomeFornecedor != "") {
                            $idfornecedor = $_POST['idfornecedor'];
                            $email = $_POST['email'];
                            $tellFixo = $_POST['tellFixo'];
                            $cell = $_POST['cell'];
                            $cep = $_POST['cep'];
                            $logradouro = $_POST['logradouro'];
                            $uf = $_POST['uf'];
                            $bairro = $_POST['bairro'];
                            $cidade = $_POST['cidade'];
                            $complemento = $_POST['complemento'];
                            $representante = $_POST['representante'];

                            $fc = new FornecedorController();
                            unset($_POST['atualizarFornecedor']);
                            $msg = $fc->atualizarFornecedor(
                                $idfornecedor,
                                $nomeFornecedor,
                                $logradouro,
                                $complemento,
                                $bairro,
                                $cidade,
                                $uf,
                                $cep,
                                $representante,
                                $email,
                                $tellFixo,
                                $cell
                            );
                            echo $msg->getMsg();
                            echo "<META HTTP-EQUIV='REFRESH' CONTENT=\"2;
                                    URL='cadastroFornecedor.php'\">";
                        }
                    }

                    if (isset($_POST['excluir'])) {
                        if ($fr != null) {
                            $id = $_POST['ide'];

                            $fc = new FornecedorController();
                            unset($_POST['excluir']);
                            $msg = $fc->excluirFornecedor($id);
                            echo $msg->getMsg();
                            echo "<META HTTP-EQUIV='REFRESH' CONTENT=\"2;
                                    URL='cadastroFornecedor.php'\">";
                        }
                    }

                    if (isset($_POST['excluirFornecedor'])) {
                        if ($fr != null) {
                            $id = $_POST['idfornecedor'];
                            unset($_POST['excluirFornecedor']);
                            $fc = new FornecedorController();
                            $msg = $fc->excluirFornecedor($id);
                            echo $msg->getMsg();
                            echo "<META HTTP-EQUIV='REFRESH' CONTENT=\"2;
                                    URL='cadastroFornecedor.php'\">";
                        }
                    }

                    if (isset($_POST['limpar'])) {
                        $fr = null;
                        unset($_GET['id']);
                        header("Location: cadastroFornecedor.php");
                    }
                    if (isset($_GET['id'])) {
                        $btEnviar = TRUE;
                        $btAtualizar = TRUE;
                        $btExcluir = TRUE;
                        $id = $_GET['id'];
                        $fc = new FornecedorController();
                        $fr = $fc->pesquisarFornecedorId($id);
                    }
                    ?>
                    <form method="post" action="">
                        <div class="row">
                            <div class="col-md-12">
                                <strong>Código: <label style="color:red;">
                                        <?php
                                        if ($fr != null) {
                                            echo $fr->getIdFornecedor();
                                        ?>
                                    </label></strong>
                                <input type="hidden" name="idfornecedor" value="<?php echo $fr->getIdfornecedor(); ?>"><br>
                            <?php
                                        }
                            ?>
                            <label>Fornecedor</label>
                            <input class="form-control" type="text" name="nomeFornecedor" value="<?php echo $fr->getNomeFornecedor(); ?>">
                            <label>CEP</label>
                            <input class="form-control" type="text" id="cep" onkeypress="mascara(this, '#####-###')" maxlength="9" value="<?php echo $fr->getCep(); ?>" name="cep">
                            <label>Rua/Logradouro</label>
                            <input class="form-control" type="text" id="rua" value="<?php echo $fr->getLogradouro(); ?>" name="logradouro">
                            <label>Complemento</label>
                            <input class="form-control" type="text" id="complmento" value="<?php echo $fr->getComplemento(); ?>" name="complemento">
                            <label>Bairro</label>
                            <input class="form-control" type="text" id="bairro" value="<?php echo $fr->getBairro(); ?>" name="bairro">
                            <label>Cidade</label>
                            <input class="form-control" type="text" id="cidade" value="<?php echo $fr->getCidade(); ?>" name="cidade">
                            <label>UF</label>
                            <input class="form-control" type="text" id="uf" value="<?php echo $fr->getUf(); ?>" name="uf">
                            <label>Representante</label>
                            <input class="form-control" type="text" value="<?php echo $fr->getRepresentante(); ?>" name="representante">
                            <label>E-Mail</label>
                            <input class="form-control" type="text" value="<?php echo $fr->getEmail(); ?>" name="email">
                            <label>Tel. Fixo</label>
                            <input class="form-control" type="text" onkeypress="mascara(this, '## ####-####')" maxlength="12" value="<?php echo $fr->getTellFixo(); ?>" name="tellFixo">
                            <label>Celular (WhatsApp)</label>
                            <input class="form-control" type="text" onkeypress="mascara(this, '## #####-####')" maxlength="13" value="<?php echo $fr->getcell(); ?>" name="cell">
                            <input type="submit" name="cadastrarFornecedor" class="btn btn-success btInput" value="Enviar" <?php if ($btEnviar == TRUE) echo "disabled"; ?>>
                            <input type="submit" name="atualizarFornecedor" class="btn btn-secondary btInput" value="Atualizar" <?php if ($btAtualizar == FALSE) echo "disabled"; ?>>
                            <button type="button" class="btn btn-warning btInput" data-bs-toggle="modal" data-bs-target="#exampleModal" <?php if ($btExcluir == FALSE) echo "disabled"; ?>>
                                Excluir
                            </button>
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
                                            <input type="submit" name="excluirFornecedor" class="btn btn-dark " value="Sim">
                                            <input type="submit" class="btn btn-dark" name="limpar" value="Não">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- fim do modal para excluir -->
                            &nbsp;&nbsp;
                            <input type="submit" class="btn btn-light btInput" name="limpar" value="Limpar">
                            </div>
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
                                <th>Fornecedor</th>
                                <th>Representante</th>
                                <th>E-Mail</th>
                                <th>Tel. Fixo</th>
                                <th>Celular</th>
                                <th>Cidade</th>
                                <th colspan="2">Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $fcTable = new FornecedorController();
                            $listaFornecedores = $fcTable->listarFornecedores();
                            $a = 0;
                            if ($listaFornecedores != null) {
                                foreach ($listaFornecedores as $lf) {
                                    $a++;
                            ?>
                                    <tr>
                                        <td><?php print_r($lf->getIdFornecedor()); ?></td>
                                        <td><?php print_r($lf->getNomeFornecedor()); ?></td>
                                        <td><?php print_r($lf->getRepresentante()); ?></td>
                                        <td><?php print_r($lf->getEmail()); ?></td>
                                        <td><?php print_r($lf->getTellFixo()); ?></td>
                                        <td><?php print_r($lf->getCell()); ?></td>
                                        <td><?php print_r($lf->getUF()); ?></td>
                                        <td><a href="cadastroFornecedor.php?id=<?php echo $lf->getIdFornecedor(); ?>" class="btn btn-dark">
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
                                                    <h5 class="modal-title" id="exampleModalLabel">Excluir fornecedor</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <form method="post" action="">
                                                        <label><strong>Deseja excluir o fornecedor
                                                                <?php echo $lf->getNomeFornecedor(); ?>?</strong></label>
                                                        <input type="hidden" name="ide" value="<?php echo $lf->getIdfornecedor(); ?>">
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


    <script src="js/bootstrap.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jQuery.js"></script>
    <script src="js/jQuery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script>
  


    <script>
        $(document).ready(function() {

            function limpa_formulário_cep() {
                // Limpa valores do formulário de cep.
                $("#rua").val("");
                $("#bairro").val("");
                $("#cidade").val("");
                $("#uf").val("");

            }

            //Quando o campo cep perde o foco.
            $("#cep").blur(function() {

                //Nova variável "cep" somente com dígitos.
                var cep = $(this).val().replace(/\D/g, '');

                //Verifica se campo cep possui valor informado.
                if (cep != "") {

                    //Expressão regular para validar o CEP.
                    var validacep = /^[0-9]{8}$/;

                    //Valida o formato do CEP.
                    if (validacep.test(cep)) {

                        //Preenche os campos com "..." enquanto consulta webservice.
                        $("#rua").val("...");
                        $("#bairro").val("...");
                        $("#cidade").val("...");
                        $("#uf").val("...");


                        //Consulta o webservice viacep.com.br/
                        $.getJSON("https://viacep.com.br/ws/" + cep + "/json/?callback=?", function(dados) {

                            if (!("erro" in dados)) {
                                //Atualiza os campos com os valores da consulta.
                                $("#rua").val(dados.logradouro);
                                $("#bairro").val(dados.bairro);
                                $("#cidade").val(dados.localidade);
                                $("#uf").val(dados.uf);

                            } //end if.
                            else {
                                //CEP pesquisado não foi encontrado.
                                limpa_formulário_cep();
                                alert("CEP não encontrado.");
                            }
                        });
                    } //end if.
                    else {
                        //cep é inválido.
                        limpa_formulário_cep();
                        alert("Formato de CEP inválido.");
                    }
                } //end if.
                else {
                    //cep sem valor, limpa formulário.
                    limpa_formulário_cep();
                }
            });
        });
    </script>
</body>

</html>