<?php

class system_controller {
    public $view;
    function __construct(){
        $this->view = new system_view;
    }
}