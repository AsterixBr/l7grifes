
<?php

        

include_once 'C:/xampp/htdocs/l7grifes/Controller/ClienteController.php';
include_once 'C:/xampp/htdocs/l7grifes/model/Cliente.php';
include_once 'C:/xampp/htdocs/l7grifes/model/Endereco.php';
include_once 'C:/xampp/htdocs/l7grifes/model/Mensagem.php';
$msg = new Mensagem();
$en = new Endereco();
$cli = new Cliente();
$cli->setFkendereco($en);
$btEnviar = FALSE;
$btAtualizar = FALSE;
$btExcluir = FALSE;
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Formulário</title>
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
            <a href="L7grifes.html" class="navbar-brand">L7 Grifes</a>
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
                </ul>

            </div>
        </div>
    </nav>

    <div class="container-fluid">
        <div class="row" style="margin-top: 30px;">
            <div class="col-md-6 offset-md-3">

                <div class="card-header bg-dark text-center text-white border" style="padding-bottom: 15px; padding-top: 15px;">
                    Cadastro de Cliente
                </div>
                <div class="card-body border">
                    <?php
                    //envio dos dados para o BD
                    if (isset($_POST['cadastrarCliente'])) {
                        $nome = trim($_POST['nome']);
                        if ($nome != "") {
                            $dtNascimento = $_POST['dtNascimento'];
                            $email = $_POST['email'];
                            $senha = $_POST['senha'];
                            $cpf = $_POST['cpf'];
                            $cep = $_POST['cep'];
                            $logradouro = $_POST['logradouro'];
                            $numero = $_POST['numero'];
                            $complemento = $_POST['complemento'];
                            $bairro = $_POST['bairro'];
                            $cidade = $_POST['cidade'];
                            $uf = $_POST['uf'];

                            $clic = new ClienteController();
                            unset($_POST['cadastrarCliente']);
                            $msg = $clic->inserirCliente(
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
                                $cpf
                            );
                            echo $msg->getMsg();
                            echo "<META HTTP-EQUIV='REFRESH' CONTENT=\"2;
                                    URL='cadastroCliente.php'\">";
                        }
                    }

                    //método para atualizar dados do produto no BD
                    if (isset($_POST['atualizarCliente'])) {
                        $idPessoa = trim($_POST['idPessoa']);
                        if ($idPessoa != "") {
                            $nome = $_POST['nome'];
                            $dtNascimento = $_POST['dtNascimento'];
                            $email = $_POST['email'];
                            $senha = $_POST['senha'];
                            $cpf = $_POST['cpf'];
                            $cep = $_POST['cep'];
                            $logradouro = $_POST['logradouro'];
                            $numero = $_POST['numero'];
                            $complemento = $_POST['complemento'];
                            $bairro = $_POST['bairro'];
                            $cidade = $_POST['cidade'];
                            $uf = $_POST['uf'];

                            $pcliente = new ClienteController();
                            unset($_POST['atualizarCliente']);
                            $msg = $pcliente->atualizarCliente(
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
                                $cpf
                            );
                            echo $msg->getMsg();
                            /*echo "<META HTTP-EQUIV='REFRESH' CONTENT=\"2;
                                    URL='cadastroCliente.php'\">";*/
                        }
                    }

                    if (isset($_POST['excluir'])) {
                        if ($cli != null) {
                            $id = $_POST['ide'];

                            $clic = new ClienteController();
                            unset($_POST['excluir']);
                            $msg = $clic->excluirCliente($id);
                            echo $msg->getMsg();
                            echo "<META HTTP-EQUIV='REFRESH' CONTENT=\"2;
                                    URL='cadastroCliente.php'\">";
                        }
                    }

                    if (isset($_POST['excluirCliente'])) {
                        if ($cli != null) {
                            $id = $_POST['idPessoa'];
                            unset($_POST['excluirCliente']);
                            $clic = new ClienteController();
                            $msg = $clic->excluirCliente($id);
                            echo $msg->getMsg();
                            echo "<META HTTP-EQUIV='REFRESH' CONTENT=\"2;
                                    URL='cadastroCliente.php'\">";
                        }
                    }

                    if (isset($_POST['limpar'])) {
                        $pe = null;
                        unset($_GET['id']);
                        header("Location: cadastroCliente.php");
                    }
                    if (isset($_GET['id'])) {
                        $btEnviar = TRUE;
                        $btAtualizar = TRUE;
                        $btExcluir = TRUE;
                        $id = $_GET['id'];
                        $clic = new ClienteController($id);
                        $cli = $clic->pesquisarClienteId($id);
                    }
                    ?>

                    <form method="post" action="">
                        <div class="row">
                            <div class="col-md-12">
                                <strong>Código: <label style="color:red;">
                                        <?php
                                        if ($cli != null) {
                                            echo $cli->getIdpessoa();
                                        ?>
                                    </label></strong>
                                <input type="hidden" name="idPessoa" value="<?php echo $cli->getIdpessoa(); ?>"><br>
                            <?php
                                        }
                            ?>
                            <label>Nome Completo</label>
                            <input class="form-control" type="text" name="nome" value="<?php echo $cli->getNome(); ?>">
                            <label>Data de Nascimento</label>
                            <input class="form-control" type="date" name="dtNascimento" value="<?php echo $cli->getdtNascimento(); ?>">
                            <label>CPF</label>
                            <label id="valCpf" pattern="\d{3}\.\d{3}\.\d{3}-\d{2}" title="Digite o CPF no formato 000.000.000-00" style="color: red; font-size: 11px;"></label>
                            <input class="form-control" type="text" id="cpf" onkeypress="mascara(this, '###.###.###-##')" maxlength="14" onblur="return validaCpfCnpj();" name="cpf">
                            <label>E-Mail</label>
                            <input class="form-control" pattern="^[\w]{1,}[\w.+-]{0,}@[\w-]{2,}([.][a-zA-Z]{2,}|[.][\w-]{2,}[.][a-zA-Z]{2,})$" type="email" name="email" value="<?php echo $cli->getEmail(); ?>">
                            <label>Senha</label>
                            <input class="form-control" pattern="^.{6,15}$" type="password" name="senha" title="Senha com no minímo 6 caracteres de letras e números" placeholder="Senha com no minímo 6 caracteres de letras e números">
                            <label>CEP</label><br>
                            <input class="form-control" type="text" id="cep" onkeypress="mascara(this, '#####-###')" maxlength="9" value="<?php echo $cli->getFkendereco()->getCep(); ?>" name="cep">
                            <label>Logradouro</label>
                            <input type="text" class="form-control" name="logradouro" id="rua" value="<?php echo $cli->getFkEndereco()->getLogradouro(); ?>">
                            <label>Numero</label>
                            <input type="text" class="form-control" name="numero" id="numero" value="<?php echo $cli->getFkEndereco()->getNumero(); ?>">
                            <label>Complemento</label>
                            <input type="text" class="form-control" name="complemento" id="complemento" value="<?php echo $cli->getFkEndereco()->getComplemento(); ?>">
                            <label>Bairro</label>
                            <input type="text" class="form-control" name="bairro" id="bairro" value="<?php echo $cli->getFkEndereco()->getBairro(); ?>">
                            <label>Cidade</label>
                            <input type="text" class="form-control" name="cidade" id="cidade" value="<?php echo $cli->getFkEndereco()->getCidade(); ?>">
                            <label>UF</label>
                            <input type="text" class="form-control" name="uf" id="uf" value="<?php echo $cli->getFkEndereco()->getUf(); ?>" maxlength="100">
                            </div>

                            <div class="col-md-12">
                                <br>
                                <div class="offset-md-5">
                                    <input type="submit" name="cadastrarCliente" class="btn btn-success btInput" value="Enviar" <?php if ($btEnviar == TRUE) echo "disabled"; ?>>
                                    <input type="submit" class="btn btn-light btInput" name="limpar" value="Limpar">
                                </div>
                            </div>
                        </div>
                    </form>
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
            function validaCpfCnpj() {
                var val = document.getElementById("cpf").value;
                if (val.length == 14) {
                    var cpf = val.trim();

                    cpf = cpf.replace(/\./g, '');
                    cpf = cpf.replace('-', '');
                    cpf = cpf.split('');

                    var v1 = 0;
                    var v2 = 0;
                    var aux = false;

                    for (var i = 1; cpf.length > i; i++) {
                        if (cpf[i - 1] != cpf[i]) {
                            aux = true;
                        }
                    }

                    if (aux == false) {
                        document.getElementById("valCpf").innerHTML = "* CPF inválido";
                        return false;
                    }

                    for (var i = 0, p = 10;
                        (cpf.length - 2) > i; i++, p--) {
                        v1 += cpf[i] * p;
                    }

                    v1 = ((v1 * 10) % 11);

                    if (v1 == 10) {
                        v1 = 0;
                    }

                    if (v1 != cpf[9]) {
                        document.getElementById("valCpf").innerHTML = "* CPF inválido";
                        return false;
                    }

                    for (var i = 0, p = 11;
                        (cpf.length - 1) > i; i++, p--) {
                        v2 += cpf[i] * p;
                    }

                    v2 = ((v2 * 10) % 11);

                    if (v2 == 10) {
                        v2 = 0;
                    }

                    if (v2 != cpf[10]) {
                        document.getElementById("valCpf").innerHTML = "* CPF inválido";
                        return false;
                    } else {
                        document.getElementById("valCpf").innerHTML = "";
                        return true;
                    }
                } else if (val.length == 18) {
                    var cnpj = val.trim();

                    cnpj = cnpj.replace(/\./g, '');
                    cnpj = cnpj.replace('-', '');
                    cnpj = cnpj.replace('/', '');
                    cnpj = cnpj.split('');

                    var v1 = 0;
                    var v2 = 0;
                    var aux = false;

                    for (var i = 1; cnpj.length > i; i++) {
                        if (cnpj[i - 1] != cnpj[i]) {
                            aux = true;
                        }
                    }

                    if (aux == false) {
                        document.getElementById("valCpf").innerHTML = "* CPF inválido";
                        return false;
                    }

                    for (var i = 0, p1 = 5, p2 = 13;
                        (cnpj.length - 2) > i; i++, p1--, p2--) {
                        if (p1 >= 2) {
                            v1 += cnpj[i] * p1;
                        } else {
                            v1 += cnpj[i] * p2;
                        }
                    }

                    v1 = (v1 % 11);

                    if (v1 < 2) {
                        v1 = 0;
                    } else {
                        v1 = (11 - v1);
                    }

                    if (v1 != cnpj[12]) {
                        document.getElementById("valCpf").innerHTML = "* CPF inválido";
                        return false;
                    }

                    for (var i = 0, p1 = 6, p2 = 14;
                        (cnpj.length - 1) > i; i++, p1--, p2--) {
                        if (p1 >= 2) {
                            v2 += cnpj[i] * p1;
                        } else {
                            v2 += cnpj[i] * p2;
                        }
                    }

                    v2 = (v2 % 11);

                    if (v2 < 2) {
                        v2 = 0;
                    } else {
                        v2 = (11 - v2);
                    }

                    if (v2 != cnpj[13]) {
                        document.getElementById("valCpf").innerHTML = "* CPF inválido";
                        return false;
                    } else {
                        document.getElementById("valCpf").innerHTML = "";
                        return true;
                    }
                } else {
                    document.getElementById("valCpf").innerHTML = "* CPF inválido";
                    return false;
                }
            }
        </script>
</body>

</html>
<?php ob_end_flush(); ?>