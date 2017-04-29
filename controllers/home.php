<?php
    class Home extends system_controller{
        function index(){

            $this->view->error = false;
            if(isset($_POST['login_btn'])){
                $email = $_POST['email'];
                $password = md5($_POST['password']);
                if(empty($email) || empty($password)){
                    $this->view->error = "<div class='alert alert-warning' style='position: absolute;right:50px;'>
                                               File All Fields
                                             </div>";
                }else{
                   $model_obj = new Models_users;
                   $result = $model_obj->checkLogin($email, $password);
                   if(is_null($result)){
                       $this->view->error = "<div class='alert alert-warning' style='position: absolute;right:20px;'>
                                               Invalide Email or Password
                                             </div>";
                   }else{
                       $_SESSION['user_id'] = $result['id'];
                       header("Location: /account");
                   }
                }
            }



            if(isset($_POST['reg_btn'])){
                $f_name = $_POST['f_name'];
                $l_name = $_POST['l_name'];
                $email = $_POST['email'];
                $password = md5($_POST['password']);
                if(empty($f_name) || empty($l_name) || empty($email) || empty($password)){
                    $this->view->error = "<div class='alert alert-warning' style='position: absolute;right:50px;'>
                                               File All Fields
                                             </div>";
                }else {
                    $model_obj = new Models_users;
                    $row = $model_obj->checkEmail($email);
                    if (is_null($row)) {
                        $success = $model_obj->regUser($f_name, $l_name, $email, $password);
                        if (is_null($success)) {
                            $this->view->error = "<div class='alert alert-warning' style='float: right;'>
                                               Invalide Email or Password
                                             </div>";
                        } else {
                            $this->view->error = "<div class='alert alert-success' style='position: absolute;right:50px;'>
                                               Registration Success
                                             </div>";
                        }
                    } else {
                        $this->view->error = "<div class='alert alert-warning' style='position: absolute;right:50px;'>
                                               E-mail allrady exist
                                             </div>";
                    }
                }
            }

            $this->view->render('login');

        }

        public function logout(){
            unset($_SESSION['user_id']);
            header('Location: /');
        }
    }
