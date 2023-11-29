<?php
namespace App\Model;
use App\Model\Crud;
use App\Model\CrudQueries;
require_once 'CrudModel.php';
require_once 'queriesModel.php';

class ComonModel implements Crud{
 
   

    public function modelInsert($data){
        $typeUser = $data['nivel'];
        
        $success = CrudQueries::insert($typeUser,$data);
       
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






