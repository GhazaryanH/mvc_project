<?php
    class Account  extends system_controller {

       public function __construct(){
        parent::__construct();
        if(empty($_SESSION['user_id'])){
            header('Location: /');
        }
    }

        public function index(){
            $model_obj = new Models_users;
            $model_obj2 = new Models_users;
            $count = $model_obj2->friendRequestCount();
            if($count == 0){
                $this->view->Request_count = '0';
            }else{
                $this->view->Request_count = $count;
            }
            if(isset($_FILES['file'])){
                $uploade = $model_obj->fileUploade($_FILES['file']);
            }
            $result = $model_obj->userById($_SESSION['user_id']);
            $this->view->userData = $result;
            $id = $_SESSION['user_id'];
            $models_friends = new Models_friends();
            $users = $models_friends->RequestSendUser();
            $this->view->friend_request = $users;
            if(isset($_POST['accept'])){
                $idsend = $_POST['hidden_accept'];
                $accept = new models_friends();
                $accept->acceptFriend($idsend);
                header('Location: /account');
            }
            if(isset($_POST['remove'])){
                $id = $_POST['hidden_remove'];
                $model_obj10 = new Models_friends;
                $removeRequest = $model_obj10->removeRequest($id);
                header('Location: /account');
            }
            if(isset($_POST['unfriend'])){
                $id = $_SESSION['user_id'];
                $model_obj11 = new Models_friends;
                $removeRequest = $model_obj11->unFriend($id);
            }

            $this->view->render('account');
        }
        public function user($id){
            $url = substr($_SERVER['REQUEST_URI'], 1 );
            $url = explode('/', $url);
            $id = $url['2'];
            $model_obj2 = new Models_users;
            $result2 = $model_obj2->userById($id);
            $this->view->userData = $result2;
            $model_obj2 = new Models_users;
            $count = $model_obj2->friendRequestCount();
            if($count == 0){
                $this->view->Request_count = '0';
            }else{
                $this->view->Request_count = $count;
            }
            if(isset($_POST['add'])){
                $model_obj5 = new Models_friends;
                $addfriends = $model_obj5->addFriend($id);
            }
            if(isset($_POST['remove'])){
                $id = $_POST['hidden_remove'];
                $model_obj10 = new Models_friends;
                $removeRequest = $model_obj10->removeRequest($id);
            }
            if(isset($_POST['unfriend'])){
                $model_obj11 = new Models_friends;
                $removeRequest = $model_obj11->unFriend($id);
                header('Location; /account');
            }
            $model_obj3 = new Models_friends;
            $requestSend = $model_obj3->RequestSend($id);
            if($requestSend){
                $this->view->btn = '<button type="button" class="btn btn-primary disabled">Request Send</button>';
            }
            $model_obj4 = new Models_friends;
            $friends = $model_obj4->areFriends($id);
            if ($friends) {
                $this->view->btn = '<button type="submit" name="unfriend" class="btn btn-primary">Remuve</button>';
            }
            if(!$requestSend && !$friends){
                $this->view->btn = '<button type="submit" name="add" class="btn btn-primary">Add Friend</button>';
            }

            $models_friends = new Models_friends();
            $users = $models_friends->RequestSendUser();
            $this->view->friend_request = $users;
            $this->view->render('user');
        }



        public function addFriend()
        {
            if (isset($_POST['id'])) {
                $id1 = $_SESSION['user_id'];
                $id2 = $_POST['id'];
                $friend = new models_friends();
                $friend->addFriend($id1, $id2);

            }
        }
        public function confirm()
        {
            if (isset($_POST['conf_id'])) {
                $id1 = $_SESSION['user_id'];
                $conf_id = $_POST['conf_id'];
                $confirm = new models_friends();
                $confirm->confirm($id1, $conf_id);
            }
        }

        public function getChat(){

        }

        //message

            public function chat(){
            if(isset($_POST['send'])){
                $url = substr($_SERVER['REQUEST_URI'], 1 );
                $url = explode('/', $url);
                $to_id = $url['2'];
                $text = $_POST['message'];
                $from_id = $_SESSION['user_id'];
                $new_model = new models_messages();
                $insert = $new_model->insertChat($from_id,$to_id,$text);
            }
                $new_model2 = new models_messages();
                $url = substr($_SERVER['REQUEST_URI'], 1 );
                $url = explode('/', $url);
                $to_id = $url['2'];
                $select1 = $new_model2->getChat($to_id);
                $this->view->mesages = $select1;
                $this->view->render('chat');
        }
    }
