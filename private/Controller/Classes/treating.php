<?php declare(strict_types=1); //Forçar strict

// require_once 'datasecurity.php';

class Treating /*extends DataSecurity*/{

    //Chaves de cada usuário
    // const KEY_BY_TYPE_OF_USER = [
    //     "comum" => "ComumKey",
    //     "empresa" => "EmpresaKey",
    //     "admin" => "AdminAPAEKey"
    // ];
    
    //Código para filtrar os inputs
    protected function filterInput(array $inputs,string $typeOfUser): array {
        // //Chave do usuário selecionado
        // $key = self::KEY_BY_TYPE_OF_USER[$typeOfUser];
        
        foreach($inputs as $fieldName=>$valuePassed) { //Itera pelos inputs e retorna o nome do campo de input e seu valor
            $inputs[$fieldName] = $this->filter($valuePassed,$fieldName); //Filtra o input e subsititui na tabela
        }
        
        if ($this->verifyInputs($inputs)) {
            // //Criptografar dados
            // parent::encryptData($inputs,$key,$tag);
            //Retorna os inputs criptografados
            $inputs['nivel']=$typeOfUser;
            unset($inputs['ConfirmarSenha']);
            return $inputs;
        }
        return [];
    }

    //Verifica se todos os digitos do cpf são o mesmo
    private function all_same(string $cpf): bool {
        $cpf = intval($cpf);
        $digit=$cpf%10;
        while($cpf!=0) {
            $curr_digit=$cpf%10; //Retorna o dígito atual da verificação
            $cpf=intval($cpf/10); //Remove o dígito atual do CPF
            if ($curr_digit!==$digit) {
                return false;
            }
        }
        return true;
    }

    //Verifica se o CPF é válido
    private function filtraCpf(string $cpf): bool {
        $cpf = preg_replace("~[^\d]~","",$cpf);
        if ($this->all_same($cpf)) return false;
        $nums=array();
        for ($i=0;$i<strlen($cpf)-2;$i++) {
            array_push($nums,$cpf[$i]);
        }
        $last_occurence=0;
        $mult=10;
        for ($i=0;$i<count($nums);$i++) {
            $last_occurence+=$nums[$i]*$mult;
            $mult--;
        }
        $last_occurence=$last_occurence*10%11;
        if ($last_occurence!=$cpf[strlen($cpf)-2]) return false;
        array_push($nums,$last_occurence);
        $last_occurence=0;
        $mult=11;
        for ($i=0;$i<count($nums);$i++) {
            $last_occurence+=$nums[$i]*$mult;
            $mult--;
        }
        $last_occurence=$last_occurence*10%11;
        if ($last_occurence!=$cpf[strlen($cpf)-1]) return false;
        return true;
    }

    //Filtra a array de dados
    private function filter(string $info,string $field): string {
        switch(strtoupper($field)) {
            //Inputs que requerem tratamento especial
            case 'CPF':
                if(!$this->filtraCpf($info)) { //Caso falhe a verificação
                    $info = "invalid";
                }
                break;
                
            case "EMAIL":
                $info = filter_var($info,FILTER_SANITIZE_EMAIL);
                break;
            
            //Resto
            default:
                $info = trim($info);
                $info = addslashes($info);
                $info = htmlspecialchars($info);
        }
                
        return $info;
    }

    //Formata a data para o padrão especificado
    // private function formatDate(string $pattern, string $date): string {
    //     $frmtDate = date($pattern,strtotime($date));
    //     return $frmtDate;
    // }

    //Verifica os inputs especiais
    private function verifyInputs(array $inputs): bool {
        //(isset($inputs['CPF'])) &&
        // ($inputs['CPF']!="invalid") && 
        // (isset($inputs['ConfirmarSenha'])) && 
        // ($inputs['Senha']==$inputs['ConfirmarSenha'])
        foreach($inputs as $field=>$value) {
            if ($value == "invalid") {
                return false;
            }
        }
        return true;
    }
}

?>
