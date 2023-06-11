<?php
require_once 'treating.php';

class Insert extends Treating {
    protected function enviarParaModel(array $dado,  Crud $model): bool {
        if (count($dado)>0) {
            //Enviar para model
            $sucesso = $model->insert($dado);
            
            return $sucesso;
        } else {
            return false; 
        }
    }
}

class Update extends Treating {
    protected function enviarParaModel(array $dados,  Crud $model): bool {
        if (count($dados)>0) {
            //Enviar para model
          
            $sucesso = $model->update($dados);
   
            return $sucesso;
        } else {
            return false; 
        }
    }
}

class Read extends Treating {
    protected function enviarParaModel(Crud $model, $type): bool|array|string {
        //Enviar para model
        $sucesso = $model->read($type);
        
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