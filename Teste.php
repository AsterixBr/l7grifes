<!doctype html>
<html>

<head>
    <title>Teste</title>
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
</head>

<body>
    <!--
<button type="button" class="btn btn-warning btInput" data-bs-toggle="modal" data-bs-target="#exampleModal" 
    >
                                Excluir
</button>


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
                <input type="submit" name="excluirFornecedor" class="btn btn-success " value="Sim">
                <input type="submit" class="btn btn-light btInput" name="limpar" value="Não">
            </div>
        </div>
    </div>
</div>
-->
    <!-- fim do modal para excluir -->

    <!-- Button trigger modal -->
    <button type="button" class="btn btn-warning btInput" data-bs-toggle="modal" data-bs-target="#ModalExcluir" >
        Excluir
    </button>
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
                    <input type="submit" name="excluirFornecedor" class="btn btn-success " value="Sim">
                    <input type="submit" class="btn btn-light btInput" name="limpar" value="Não">
                </div>
            </div>
        </div>
    </div>
    <!-- fim do modal para excluir -->

    <script src="js/bootstrap.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jQuery.js"></script>
    <script src="js/jQuery.min.js"></script>

</body>

</html>