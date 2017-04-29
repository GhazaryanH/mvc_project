<?php
    class search extends system_controller{
        public function __construct(){
            parent::__construct();
            if(empty($_SESSION['user_id'])){
                header('Location: /');
            }
        }
                public function index(){
                    $this->view->error = false;
                    $this->view->searchuser = [];
                    if(isset($_POST['search_btn'])){
                        $abb = $_POST['search'];
                        $abb = explode(' ', $abb);
                         if(count($abb) == 1){
                             $a =  $abb[0];
                             $b =  $abb[0];
                         }else{
                             $a = $abb[0];
                             $b = $abb[1];
                         }
                        $model_obj2 = new Models_users;
                        $count = $model_obj2->friendRequestCount();
                        if($count == 0){
                            $this->view->Request_count = '0';
                        }else{
                            $this->view->Request_count = $count;
                        }
                        $model_obj = new Models_users;
                        $result = $model_obj->searchUsers($a, $b);
                        $this->view->searchuser = $result;
                       if(count($result) == 0){
                           $this->view->error = 'src="../public/img/no-results.svg"';
                       };
                    }
                    $models_friends = new Models_friends();
                    $users = $models_friends->RequestSendUser();
                    $this->view->friend_request = $users;

                    $this->view->render('search');
                }
    }