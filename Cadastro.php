<?php

        
include_once 'C:/xampp/htdocs/l7grifes/Controller/PessoaController.php';
include_once 'C:/xampp/htdocs/l7grifes/model/Pessoa.php';
include_once 'C:/xampp/htdocs/l7grifes/model/Endereco.php';
include_once 'C:/xampp/htdocs/l7grifes/model/Mensagem.php';
$msg = new Mensagem();
$en = new Endereco();
$pe = new Pessoa();
$pe->setFkendereco($en);
$btEnviar = FALSE;
$btAtualizar = FALSE;
$btExcluir = FALSE;
?>

111<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Funcionário</title>
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <style>
        .btInput {
            margin-top: 20px;
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
    <header style="color: white;">

    </header>
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
                        <a href="#" class="nav-link">Painel de controle</a>
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

    <div class="container-fluid">
        <div class="row" style="margin-top: 30px;">
            <div class="col-md-4">

                <div class="card-header bg-dark text-center text-white border" style="padding-bottom: 15px; padding-top: 15px;">
                    Cadastro de Funcionário
                </div>
                <div class="card-body border">
                    <?php
                    //envio dos dados para o BD
                    if (isset($_POST['cadastrarPessoa'])) {
                        $nome = trim($_POST['nome']);
                        if ($nome != "") {
                            $dtNascimento = $_POST['dtNascimento'];
                            $email = $_POST['email'];
                            $senha = $_POST['senha'];
                            $perfil = $_POST['perfil'];
                            $cpf = $_POST['cpf'];
                            $cep = $_POST['cep'];
                            $logradouro = $_POST['logradouro'];
                            $numero = $_POST['numero'];
                            $complemento = $_POST['complemento'];
                            $bairro = $_POST['bairro'];
                            $cidade = $_POST['cidade'];
                            $uf = $_POST['uf'];

                            $fc = new PessoaController();
                            unset($_POST['cadastrarPessoa']);
                            $msg = $fc->inserirPessoa(
                                $cep,
                                $logradouro,
                                $numero,
                                $complemento,
                                $bairro,
                                $cidade,
                                $uf,
                                $nome,
                                $dtNascimento,
                                $email,
                                $senha,
                                $perfil,
                                $cpf
                            );
                            echo $msg->getMsg();
                            echo "<META HTTP-EQUIV='REFRESH' CONTENT=\"2;
                                    URL='cadastro.php'\">";
                        }
                    }

                    //método para atualizar dados do produto no BD
                    if (isset($_POST['atualizarPessoa'])) {
                        $idPessoa = trim($_POST['idPessoa']);
                        if ($idPessoa != "") {
                            $nome = $_POST['nome'];
                            $dtNascimento = $_POST['dtNascimento'];
                            $email = $_POST['email'];
                            $senha = $_POST['senha'];
                            $perfil = $_POST['perfil'];
                            $cpf = $_POST['cpf'];
                            $cep = $_POST['cep'];
                            $logradouro = $_POST['logradouro'];
                            $numero = $_POST['numero'];
                            $complemento = $_POST['complemento'];
                            $bairro = $_POST['bairro'];
                            $cidade = $_POST['cidade'];
                            $uf = $_POST['uf'];

                            $fc = new PessoaController();
                            unset($_POST['atualizarPessoa']);
                            $msg = $fc->atualizarPessoa(
                                $idPessoa,
                                $cep,
                                $logradouro,
                                $numero,
                                $complemento,
                                $bairro,
                                $cidade,
                                $uf,
                                $nome,
                                $dtNascimento,
                                $email,
                                $senha,
                                $perfil,
                                $cpf
                            );
                            echo $msg->getMsg();
                            /*echo "<META HTTP-EQUIV='REFRESH' CONTENT=\"2;
                                    URL='cadastro.php'\">";*/
                        }
                    }

                    if (isset($_POST['excluir'])) {
                        if ($pe != null) {
                            $id = $_POST['ide'];

                            $fc = new PessoaController();
                            unset($_POST['excluir']);
                            $msg = $fc->excluirPessoa($id);
                            echo $msg->getMsg();
                            echo "<META HTTP-EQUIV='REFRESH' CONTENT=\"2;
                                    URL='cadastro.php'\">";
                        }
                    }

                    if (isset($_POST['excluirPessoa'])) {
                        if ($pe != null) {
                            $id = $_POST['idPessoa'];
                            unset($_POST['excluirPessoa']);
                            $fc = new PessoaController();
                            $msg = $fc->excluirPessoa($id);
                            echo $msg->getMsg();
                            echo "<META HTTP-EQUIV='REFRESH' CONTENT=\"2;
                                    URL='cadastro.php'\">";
                        }
                    }

                    if (isset($_POST['limpar'])) {
                        $pe = null;
                        unset($_GET['id']);
                        header("Location: cadastro.php");
                    }
                    if (isset($_GET['id'])) {
                        $btEnviar = TRUE;
                        $btAtualizar = TRUE;
                        $btExcluir = TRUE;
                        $id = $_GET['id'];
                        $pc = new PessoaController();
                        $pe = $pc->pesquisarPessoaId($id);
                    }
                    ?>

                    <form method="post" action="">
                        <div class="row">
                            <div class="col-md-12">
                                <strong>Código: <label style="color:red;">
                                        <?php
                                        if ($pe != null) {
                                            echo $pe->getIdpessoa();
                                        ?>
                                    </label></strong>
                                <input type="hidden" name="idPessoa" value="<?php echo $pe->getIdpessoa(); ?>"><br>
                            <?php
                                        }
                            ?>
                            <label>Nome Completo</label>
                            <input class="form-control" type="text" name="nome" value="<?php echo $pe->getNome(); ?>">
                            <label>Data de Nascimento</label>
                            <input class="form-control" type="date" name="dtNascimento" value="<?php echo $pe->getdtNascimento(); ?>">
                            <label>CPF</label>
                            <label id="valCpf" pattern="\d{3}\.\d{3}\.\d{3}-\d{2}" title="Digite o CPF no formato 000.000.000-00" style="color: red; font-size: 11px;"></label>
                            <input class="form-control" type="text" id="cpf" onkeypress="mascara(this, '###.###.###-##')" maxlength="14" onblur="return validaCpfCnpj();" name="cpf">
                            <label>E-Mail</label>
                            <input class="form-control" pattern="^[\w]{1,}[\w.+-]{0,}@[\w-]{2,}([.][a-zA-Z]{2,}|[.][\w-]{2,}[.][a-zA-Z]{2,})$" type="email" name="email" value="<?php echo $pe->getEmail(); ?>">
                            <label>Senha</label>
                            <input class="form-control" pattern="^.{6,15}$" type="password" name="senha" title="Senha com no minímo 6 caracteres de letras e números" placeholder="Senha com no minímo 6 caracteres de letras e números">
                            <label>CEP</label><br>
                            <input class="form-control" type="text" id="cep" onkeypress="mascara(this, '#####-###')" maxlength="9" value="<?php echo $pe->getFkendereco()->getCep(); ?>" name="cep">
                            <label>Logradouro</label>
                            <input type="text" class="form-control" name="logradouro" id="rua" value="<?php echo $pe->getFkEndereco()->getLogradouro(); ?>">
                            <label>Numero</label>
                            <input type="text" class="form-control" name="numero" id="numero" value="<?php echo $pe->getFkEndereco()->getNumero(); ?>">
                            <label>Complemento</label>
                            <input type="text" class="form-control" name="complemento" id="complemento" value="<?php echo $pe->getFkEndereco()->getComplemento(); ?>">
                            <label>Bairro</label>
                            <input type="text" class="form-control" name="bairro" id="bairro" value="<?php echo $pe->getFkEndereco()->getBairro(); ?>">
                            <label>Cidade</label>
                            <input type="text" class="form-control" name="cidade" id="cidade" value="<?php echo $pe->getFkEndereco()->getCidade(); ?>">
                            <label>UF</label>
                            <input type="text" class="form-control" name="uf" id="uf" value="<?php echo $pe->getFkEndereco()->getUf(); ?>" maxlength="100">
                            </div>

                            <div class="col-md-12">
                                <br>
                                <label>Perfil</label>
                                <label id="valCep" style="color: red; font-size: 11px;"></label>
                                <select class="form-select" name="perfil">
                                    <option>[--Selecione--]</option>
                                    <option <?php
                                            if ($pe->getPerfil() == "Administrador") {
                                                echo "selected = 'selected'";
                                            }
                                            ?>>Administrador</option>
                                    <option <?php
                                            if ($pe->getPerfil() == "Funcionário") {
                                                echo "selected = 'selected'";
                                            }
                                            ?>>Funcionário</option>
                                </select>
                                <div>
                                    <input type="submit" name="cadastrarPessoa" class="btn btn-success btInput" value="Enviar" <?php if ($btEnviar == TRUE) echo "disabled"; ?>>
                                    <input type="submit" name="atualizarPessoa" class="btn btn-secondary btInput" value="Atualizar" <?php if ($btAtualizar == FALSE) echo "disabled"; ?>>
                                    <button type="button" class="btn btn-warning btInput" data-bs-toggle="modal" data-bs-target="#ModalExcluir" <?php if ($btExcluir == FALSE) echo "disabled"; ?>>
                                        Excluir
                                    </button>
                                    <input type="submit" class="btn btn-light btInput" name="limpar" value="Limpar">
                                </div>


                                <!-- Modal para excluir -->
                                <div class="modal fade" id="ModalExcluir" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">
                                                    Confirmar Exclusão</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <h5>Deseja Excluir?</h5>
                                            </div>
                                            <div class="modal-footer">
                                                <input type="submit" name="excluirPessoa" class="btn btn-success " value="Sim">
                                                <input type="submit" class="btn btn-light btInput" name="limpar" value="Não">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </form>


                </div>
            </div>
            <div class="col-md-8">
                <div class="row">
                    <div class="col-md-12">
                        <table class="table table-striped table-responsive" style="border-radius: 3px; overflow:hidden; text-align: center;">
                            <thead class="table-dark">
                                <tr>
                                    <th>Código</th>
                                    <th>Pessoa</th>
                                    <th>CPF</th>
                                    <th>E-Mail</th>
                                    <th>Perfil</th>
                                    <th>Logradouro</th>
                                    <th>Complemento</th>
                                    <th>Bairro</th>
                                    <th>Cidade</th>
                                    <th>UF</th>
                                    <th colspan="2">Ações</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $fcTable = new PessoaController();
                                $listaPessoas = $fcTable->listarPessoas();
                                $a = 0;
                                if ($listaPessoas != null) {
                                    foreach ($listaPessoas as $lf) {
                                        $a++;
                                ?>
                                        <tr>
                                            <td><?php print_r($lf->getIdpessoa()); ?></td>
                                            <td><?php print_r($lf->getNome()); ?></td>
                                            <td><?php print_r($lf->getCpf()); ?></td>
                                            <td><?php print_r($lf->getEmail()); ?></td>
                                            <td><?php print_r($lf->getPerfil()); ?></td>
                                            <td><?php print_r($lf->getFkendereco()->getLogradouro()); ?></td>
                                            <td><?php print_r($lf->getFkendereco()->getComplemento()); ?></td>
                                            <td><?php print_r($lf->getFkendereco()->getBairro()); ?></td>
                                            <td><?php print_r($lf->getFkendereco()->getCidade()); ?></td>
                                            <td><?php print_r($lf->getFkendereco()->getUf()); ?></td>
                                            <td><a href="cadastro.php?id=<?php echo $lf->getIdpessoa(); ?>" class="btn btn-light">
                                                    Editar</a>
                                                <button type="button" class="btn btn-light" data-bs-toggle="modal" data-bs-target="#exampleModal<?php echo $a; ?>">
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
                                                            <label><strong>Deseja excluir o fornecedor
                                                                    <?php echo $lf->getNome(); ?>?</strong></label>
                                                            <input type="hidden" name="ide" value="<?php echo $lf->getIdpessoa(); ?>">
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="submit" name="excluir" class="btn btn-primary">Sim</button>
                                                        <button type="reset" class="btn btn-secondary" data-bs-dismiss="modal">Não</button>
                                                    </div>
                                                    </form>
                                                </div>
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
        <script src="js/bootstrap.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/jQuery.js"></script>
        <script src="js/jQuery.min.js"></script>
        <script>
            var myModal = document.getElementById('myModal')
            var myInput = document.getElementById('myInput')

            myModal.addEventListener('shown.bs.modal', function() {
                myInput.focus()
            })
        </script>
        <!-- controle de endereço (ViaCep) -->
        <script>
            $(document).ready(function() {

                function limpa_formulário_cep() {
                    // Limpa valores do formulário de cep.
                    $("#rua").val("");
                    $("#bairro").val("");
                    $("#cidade").val("");
                    $("#uf").val("");
                    $("#cepErro").val("");
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
                                    document.getElementById("valCep").innerHTML = "* CEP não encontrado";
                                }
                            });
                        } //end if.
                        else {
                            //cep é inválido.
                            limpa_formulário_cep();
                            document.getElementById("valCep").innerHTML = "* Formato inválido";

                        }
                    } //end if.
                    else {
                        //cep sem valor, limpa formulário.
                        limpa_formulário_cep();
                    }
                });
            });
        </script>
        <script>
         function validar(obj) { // recebe um objeto
    var s = (obj.value).replace(/\D/g, '');
    var tam = (s).length; // removendo os caracteres nãoo numéricos
    if (!(tam == 11 || tam == 14 || tam == 0)) { // validando o tamanho
        alert("'" + s + "' Não é um CPF ou um CNPJ Válido!"); // tamanho inválido
        obj.focus();
        return false;
    }

// se for CPF
    if (tam == 11) {
        if (!validaCPF(s)) { // chama a função que valida o CPF
            alert("'" + s + "' Não é um CPF Válido!"); // se quiser mostrar o erro
            obj.select(); // se quiser selecionar o campo em questão
            obj.focus();
            return false;
        }
        obj.value = maskCPF(s); // se validou o CPF mascaramos corretamente
        return true;
    }

// se for CNPJ
    if (tam == 14) {
        if (!validaCNPJ(s)) { // chama a função que valida o CNPJ
            alert("'" + s + "' Não é um CNPJ Válido!"); // se quiser mostrar o erro
            obj.select(); // se quiser selecionar o campo enviado
            return false;
        }
        obj.value = maskCNPJ(s); // se validou o CNPJ mascaramos corretamente
        return true;
    }
}

function validaCPF(s) {
    var c = s.substr(0, 9);
    var dv = s.substr(9, 2);
    var d1 = 0;
    for (var i = 0; i < 9; i++) {
        d1 += c.charAt(i) * (10 - i);
    }
    if (d1 == 0)
        return false;
    d1 = 11 - (d1 % 11);
    if (d1 > 9)
        d1 = 0;
    if (dv.charAt(0) != d1) {
        return false;
    }
    d1 *= 2;
    for (var i = 0; i < 9; i++) {
        d1 += c.charAt(i) * (11 - i);
    }
    d1 = 11 - (d1 % 11);
    if (d1 > 9)
        d1 = 0;
    if (dv.charAt(1) != d1) {
        return false;
    }
    return true;
}

function validaCNPJ(CNPJ) {
    var a = new Array();
    var b = new Number;
    var c = [6, 5, 4, 3, 2, 9, 8, 7, 6, 5, 4, 3, 2];
    for (i = 0; i < 12; i++) {
        a[i] = CNPJ.charAt(i);
        b += a[i] * c[i + 1];
    }
    if ((x = b % 11) < 2) {
        a[12] = 0
    } else {
        a[12] = 11 - x
    }
    b = 0;
    for (y = 0; y < 13; y++) {
        b += (a[y] * c[y]);
    }
    if ((x = b % 11) < 2) {
        a[13] = 0;
    } else {
        a[13] = 11 - x;
    }
    if ((CNPJ.charAt(12) != a[12]) || (CNPJ.charAt(13) != a[13])) {
        return false;
    }
    return true;
}
function maskCPF(CPF) {
    return CPF.substring(0, 3) + "." + CPF.substring(3, 6) + "." + CPF.substring(6, 9) + "-" + CPF.substring(9, 11);
}
function maskCNPJ(CNPJ) {
    return CNPJ.substring(0, 2) + "." + CNPJ.substring(2, 5) + "." + CNPJ.substring(5, 8) + "/" + CNPJ.substring(8, 12) + "-" + CNPJ.substring(12, 14);
}
        </script>
</body>

</html>
<?php ob_end_flush(); ?>