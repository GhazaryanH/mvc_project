<?php
class friendpage  extends system_controller {
    public function __construct(){
        parent::__construct();
        if(empty($_SESSION['user_id'])){
            header('Location: /');
        }
    }

    public function index(){
        $new_obj  = new models_friends;
        $all_friends = $new_obj->getFriends();
        $this->view->getall_friends = $all_friends;
        $this->view->render('friendpage');
    }
}