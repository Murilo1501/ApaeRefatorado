<?php
namespace App\Model;
use App\Model\Crud;
require_once 'CrudModel.php';
require_once 'queriesModel.php';

class UserComon implements Crud{
 
   

    public function modelInsert($data){
        $typeUser = $data['nivel'];
        
        $success = insert($typeUser,$data);
       
        return $success ? true:false;

    }

    public function modelUpdate(array $data): bool
    {
        return true;
    }

    public function modelDelete($id): bool
    {
        return true;
    }

    public function modelRead(): array
    {
        return [];
    }


}






