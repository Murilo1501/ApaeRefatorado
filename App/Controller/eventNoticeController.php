<?php
namespace  App\Controller;
use App\Model\EventModel;
use App\View\View;

class EventNoticeController{
    private $event;

    function __construct()
    {
        $this->event = new EventModel;
    }

    public function index()
    {
        $eventList = $this->event->read();
        require_once View::view('comum','noticias');
    }

    public function show()
    {
        
        $eventList = $this->event->read();
        require_once  View::view('comum','index');
    }

    public function create()
    {
        
    }

    public function store()
    {
        
    }
}