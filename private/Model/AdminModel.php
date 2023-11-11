<?php

namespace App\Model;
use App\Model\Crud;
require_once 'CrudModel.php';
require_once 'queriesModel.php';

class UserAdmin implements Crud{
 
    public function modelInsert($data){

    }

    public function modelUpdate(array $data): bool
    {
        return true;
    }

    public function modelDelete($id): bool
    {
        return true;
    }

    public function modelRead():array
    {
        $count = countData();
        return $count;
    }


}






