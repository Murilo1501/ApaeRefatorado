<?php
require_once 'treating.php';

class Insert extends Treating {
    protected function enviarParaModel(array $dado,  Crud $model): bool {
        if (count($dado)>0) {
            //Enviar para model
            $sucesso = $model->insert($dado);
            var_dump($sucesso);
            return $sucesso;
        } else {
            return false; 
        }
    }
}

class Update extends Treating {
    protected function enviarParaModel(array $dado,  Crud $model): bool {
        if (count($dado)>0) {
            //Enviar para model
            $sucesso = $model->update($dado);
            
            return $sucesso;
        } else {
            return false; 
        }
    }
}

class Read extends Treating {
    protected function enviarParaModel(string $user, string $page, Crud $model): bool|array {
        //Enviar para model
        $sucesso = $model->read($user, $page);
        
        return $sucesso;
    }
}

class LoginVerify extends Treating {
    protected function enviarParaModel(array $dadosLogin,  Crud $model): bool|string {
        if (count($dadosLogin)>0) {
            //Enviar para model
            $modelReturn = $model->verifyLogin($dadosLogin);
            
            return $modelReturn;
        } else {
            return false; 
        }
    }
}

?>