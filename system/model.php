<?php

class system_model {
        public $db;
        function  __construct(){
        $this->db = new system_db;
    }
}