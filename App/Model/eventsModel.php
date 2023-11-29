<?php

namespace App\Model;
use App\Model\CrudQueries;
require_once 'queriesModel.php';

class EventModel {

  
    public function insert()
    {
            
    }

    public function read()
    {
       $eventlist = CrudQueries::read('noticias');
       //var_dump($eventNot);
       return $eventlist;
    }
}