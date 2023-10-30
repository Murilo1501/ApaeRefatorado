<?php

namespace App\Model;
require_once 'queriesModel.php';

class Event {

  
    public function insert()
    {
            
    }

    public function read()
    {
       $eventlist = read('noticias');
       //var_dump($eventNot);
       return $eventlist;
    }
}