<?php

namespace App\Model;

interface Crud{
    public function modelInsert(array $data);
    public function modelUpdate(array $data):bool;
    public function modelDelete($id):bool;
    public function modelRead():array;
}