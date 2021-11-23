<?php
require_once __DIR__ . '/../DataBase/Conecta.php';
require_once __DIR__ . '/../model/Mensagem.php';
require_once __DIR__ . '/../model/Pessoa.php';
require_once __DIR__ . '/../model/Cliente.php';

class DaoLogin {
 
    public function validarLogin($email, $senha){
        $conn = new Conecta();
        $conecta = $conn->conectadb();
        $pessoa = new Pessoa();
        if($conecta){
            try{
                $conecta->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $st = $conecta->prepare("select * from pessoa where email = ? "
                    . "and senha = md5(?) limit 1");
                $st->bindParam(1, $email);
                $st->bindParam(2, $senha);
                if($st->execute()){
                    if($st->rowCount()>0){
                        while ($linha = $st->fetch(PDO::FETCH_OBJ)) {
                            $pessoa->setIdpessoa($linha->idPessoa);
                            $pessoa->setNome($linha->nome);
                            $pessoa->setPerfil($linha->perfil);
                        }
                        return $pessoa;
                    }else{
                        return "<p style='color: red;'>"
                        . "Usuário inexistente.</p>";
                    }
                }
            } catch (PDOException $ex) {
                //$msg->setMsg(var_dump($ex->errorInfo));
                return "<p style='color: red;'>Não foi possível acessar os dados!</p>";
            }
        }else {
            return "<p style='color: red;'>"
                . "Erro na conexão com o banco de dados.</p>";
        }
    }
}
