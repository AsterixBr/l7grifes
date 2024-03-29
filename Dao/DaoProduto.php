<?php
include_once 'C:/xampp/htdocs/l7grifes/DataBase/conecta.php';
include_once 'C:/xampp/htdocs/l7grifes/model/Produto.php';
include_once 'C:/xampp/htdocs/l7grifes/model/Mensagem.php';
include_once 'C:/xampp/htdocs/l7grifes/model/Fornecedor.php';
include_once 'C:/xampp/htdocs/l7grifes/model/Marca.php';



class DaoProduto
{

    public function inserir(Produto $produto)
    {
        $conn = new Conecta();
        $msg = new Mensagem();
        $conecta = $conn->conectadb();
        if ($conecta) {
            $nomeProduto = $produto->getNomeProduto();
            $categoria = $produto->getCategoria();
            $vlrCompra = $produto->getVlrCompra();
            $vlrVenda = $produto->getVlrVenda();
            $qtdEstoque = $produto->getQtdEstoque();
            $cor = $produto->getCor();
            $tamanho = $produto->getTamanho();
            $lote = $produto->getLote();
            $dtCompra = $produto->getDtCompra();
            $FkFornecedor = $produto->getFkFornecedor();
            $FkMarca = $produto->getFkMarca();
            $Imagem = $produto->getImagem();
            try {
                $conecta->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $stmt = $conecta->prepare("insert into produto values "
                    . "(null,?,?,?,?,?,?,?,?,?,?,?,?)");
                $stmt->bindParam(1, $categoria);
                $stmt->bindParam(2, $nomeProduto);
                $stmt->bindParam(3, $cor);
                $stmt->bindParam(4, $tamanho);
                $stmt->bindParam(5, $vlrCompra);
                $stmt->bindParam(6, $vlrVenda);
                $stmt->bindParam(7, $qtdEstoque);
                $stmt->bindParam(8, $lote);
                $stmt->bindParam(9, $dtCompra);
                $stmt->bindParam(10, $Imagem);
                $stmt->bindParam(11, $FkFornecedor);
                $stmt->bindParam(12, $FkMarca);
                $stmt->execute();
                $msg->setMsg("<p style='color: green;'>"
                    . "Dados Cadastrados com sucesso</p>");
            } catch (PDOException $ex) {
                $msg->setMsg(var_dump($ex->errorInfo));
            }
        } else {
            $msg->setMsg("<p style='color: red;'>"
                . "Erro na conexão com o banco de dados.</p>");

            
        }
        $conn = null;
        return $msg;
    }

    //método para atualizar dados da tabela produto
    public function atualizarProdutoDAO(Produto $produto)
    {
        $conn = new Conecta();
        $msg = new Mensagem();
        $conecta = $conn->conectadb();
        if ($conecta) {
            $id = $produto->getIdProduto();
            $categoria = $produto->getCategoria();
            $nomeProduto = $produto->getNomeProduto();
            $cor = $produto->getCor();
            $tamanho = $produto->getTamanho();
            $vlrCompra = $produto->getVlrCompra();
            $vlrVenda = $produto->getVlrVenda();
            $qtdEstoque = $produto->getQtdEstoque();
            $lote = $produto->getLote();
            $dtCompra = $produto->getDtCompra();
            $Imagem = $produto->getImagem();
            $FkFornecedor = $produto->getFkFornecedor();
            $FkMarca = $produto->getFkMarca();
         
           // $msg->setMsg("$id, $categoria, $nomeProduto , $cor, $tamanho, $vlrCompra, 
            //$vlrVenda, $qtdEstoque, $lote, $dtCompra, $FkFornecedor, $FkMarca");
        
            try {
                $conecta->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $stmt = $conecta->prepare("update produto set "
                    . "categoria = ?,"
                    . "nomeProduto = ?, "
                    . "cor = ?,"
                    . "tamanho = ?, "
                    . "vlrCompra = ?,"
                    . "vlrVenda = ?, "
                    . "qtdEstoque = ?, "
                    . "lote = ?,"
                    . "dtCompra = ?,"
                    . "Imagem = ?,"
                    . "FkFornecedor = ?, "
                    . "FkMarca = ?"
                    . "where idproduto = ? ");
                $stmt->bindParam(1, $categoria);
                $stmt->bindParam(2, $nomeProduto);
                $stmt->bindParam(3, $cor);
                $stmt->bindParam(4, $tamanho);
                $stmt->bindParam(5, $vlrCompra);
                $stmt->bindParam(6, $vlrVenda);
                $stmt->bindParam(7, $qtdEstoque);
                $stmt->bindParam(8, $lote);
                $stmt->bindParam(9, $dtCompra);
                $stmt->bindParam(10, $Imagem);
                $stmt->bindParam(11, $FkFornecedor);
                $stmt->bindParam(12, $FkMarca);
                $stmt->bindParam(13, $id);

                $stmt->execute();
                $msg->setMsg("<p style='color: blue;'>"
                    . "Dados atualizados com sucesso</p>");
            } catch (PDOException $ex) {
                $msg->setMsg(var_dump($ex->errorInfo));
            }
        } else {
            $msg->setMsg("<p style='color: red;'>"
                . "Erro na conexão com o banco de dados.</p>");
        }
        $conn = null;
        return $msg;
    }

    //método para carregar lista de produtos do banco de dados
    public function listarProdutosDAO()
    {
        $conn = new Conecta();
        $msg = new Mensagem();
        $conecta = $conn->conectadb();
        if ($conecta) {
            try {
                $conecta->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $rs = $conecta->query("select * from produto inner join fornecedor 
                    on produto.FkFornecedor = fornecedor.idFornecedor
                    inner join marca on produto.FkMarca = marca.idMarca
                    order by produto.idproduto asc");
                $lista = array();
                $a = 0;
                $b = 0;
                if ($rs->execute()) {
                    if ($rs->rowCount() > 0) {
                        while ($linha = $rs->fetch(PDO::FETCH_OBJ)) {
                            $produto = new Produto();
                            $produto->setIdProduto($linha->idProduto);
                            $produto->setCategoria($linha->categoria);
                            $produto->setNomeProduto($linha->nomeProduto);
                            $produto->setCor($linha->cor);
                            $produto->setTamanho($linha->tamanho);
                            $produto->setVlrCompra($linha->vlrCompra);
                            $produto->setVlrVenda($linha->vlrVenda);
                            $produto->setQtdEstoque($linha->qtdEstoque);
                            $produto->setLote($linha->lote);
                            $produto->setDtCompra($linha->dtCompra);
                            $produto->setImagem($linha->Imagem);

                            $forn = new Fornecedor();
                            $forn->setNomeFornecedor($linha->nomeFornecedor);
                            $produto->setFkFornecedor($forn);

                            $lista[$a] = $produto;
                            $a++;

                            $marca = new Marca();
                            $marca->setNomeMarca($linha->nomeMarca);
                            $produto->setFkMarca($marca);

                            $lista2[$b] = $produto;
                            $b++;

                        }
                    }
                }
            } catch (PDOException $ex) {
                $msg->setMsg(var_dump($ex->errorInfo));
            }
            $conn = null;
            return $lista;
        }
    }

    //método para excluir produto na tabela produto
    public function excluirProdutoDAO($id)
    {
        $conn = new Conecta();
        $conecta = $conn->conectadb();
        $msg = new Mensagem();
        if ($conecta) {
            try {
                $conecta->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $stmt = $conecta->prepare("delete from produto "
                    . "where idproduto = ?");
                $stmt->bindParam(1, $id);
                $stmt->execute();
                $msg->setMsg("<p style='color: #d6bc71;'>"
                    . "Dados excluídos com sucesso.</p>");
            } catch (PDOException $ex) {
                $msg->setMsg(var_dump($ex->errorInfo));
            }
        } else {
            $msg->setMsg("<p style='color: red;'>'Banco inoperante!'</p>");
        }
        $conn = null;
        return $msg;
    }

    //método para os dados de produto por id
    public function pesquisarProdutoIdDAO($id)
    {
        $conn = new Conecta();
        $msg = new Mensagem();
        $conecta = $conn->conectadb();
        $produto = new Produto();
        if ($conecta) {
            try {
                $conecta->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $rs = $conecta->prepare("select * from fornecedor  inner join produto on FkFornecedor=idFornecedor inner join marca on FkMarca=idMarca where "
                . "idProduto = ?");
                $rs->bindParam(1, $id);
                if ($rs->execute()) {
                    if ($rs->rowCount() > 0) {
                        while ($linha = $rs->fetch(PDO::FETCH_OBJ)) {
                            $produto->setIdProduto($linha->idProduto);
                            $produto->setCategoria($linha->categoria);
                            $produto->setNomeProduto($linha->nomeProduto);
                            $produto->setCor($linha->cor);
                            $produto->setTamanho($linha->tamanho);
                            $produto->setVlrCompra($linha->vlrCompra);
                            $produto->setVlrVenda($linha->vlrVenda);
                            $produto->setQtdEstoque($linha->qtdEstoque);
                            $produto->setLote($linha->lote);
                            $produto->setDtCompra($linha->dtCompra);
                            $produto->setImagem($linha->Imagem);

                            $forn = new Fornecedor();
                            $forn->setIdfornecedor($linha->idFornecedor);
                            $forn->setNomeFornecedor($linha->nomeFornecedor);
                            $produto->setFkFornecedor($forn);

                            $marca = new Marca();
                           $marca->setIdMarca($linha->idMarca);
                           $marca->setNomeMarca($linha->nomeMarca);
                            $produto->setFkMarca($marca);

                          
                        }
                    }
                }
            } catch (PDOException $ex) {
                $msg->setMsg(var_dump($ex->errorInfo));
            }
            $conn = null;
        } else {
            echo "<script>alert('Banco inoperante!')</script>";
            echo "<META HTTP-EQUIV='REFRESH' CONTENT=\"0;
			 URL='../projetol7/cadastroProduto.php'\">";
        }
        return $produto;
    }
}
