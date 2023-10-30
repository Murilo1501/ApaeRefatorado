<?php
namespace  App\Controller;
use App\Model\Event;

class EventNoticeController{
    private $event;

    function __construct()
    {
        $this->event = new Event;
    }

    public function index()
    {
        $eventList = $this->event->read();
        require_once '../View/afterLogin/comum/index.php';
    }

    public function create()
    {

    }

    public function store()
    {
        
    }
}