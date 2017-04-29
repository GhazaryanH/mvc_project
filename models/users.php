<?php
class  models_users extends system_model{
    public function getAllusers(){
       $result = $this->db->select('select * from users')->all();
       return $result;
    }

    public function checkLogin($email,$password){

        //$email = $this->db->escape($email);

        $result = $this->db->select("select * from users where email = '$email' And password ='$password'")->first();
        return  $result;
    }

    public function checkEmail($email){
        $result = $this->db->select("select id from users where email = '$email'")->first();
        return $result;
    }

    public function regUser($f_name,$l_name,$email,$password){

        //$data = $this->db->escape($data);
        $data = [
            'f_name' => $f_name,
            'l_name' => $l_name,
            'email' => $email,
            'password' => $password,
            'avatar' => "avatar.jpg"
        ];
        $result = $this->db->insert('users',$data);
        return $result;
    }

    public function userById($id){
        $result = $this->db->select("select f_name,l_name, avatar from users where id = '$id'")->first();
        return $result;
    }

    public function userByIdAll($id){
        $result = $this->db->select("select f_name,l_name, avatar from users where id = '$id'")->all();
        return $result;
    }

    private $suportfile = ['image/png','image/jpeg','image/jpg','image/gif'];
    public function fileUploade($file){
        if(is_array($file)){
            if(in_array($file['type'],$this->suportfile)){
                move_uploaded_file($file['tmp_name'],'public/img/uploade/'.$file['name']);
                $id = $_SESSION['user_id'];
                $img = $file['name'];
                $data = [
                    'avatar' =>  $img,
                ];
                $this->db->update('users', $data,"id = '$id'");
            }else{
                echo 'file format is not supported';
            }
        }else{
            echo "no file was uploaded";
        }
    }
public function friendRequestCount(){
    $id = $_SESSION['user_id'];
    $row_select=$this->db->select("select * from friends where   u2_id = $id  and accept = '0'")->num();
    return $row_select;
}



    public function searchUsers($fn=false,$ln=false){
        $id = $_SESSION['user_id'];
        $result = $this->db->select("select * from users where ((f_name like '".$fn."%' and l_name like '".$ln."%') OR (l_name like '".$fn."%' and f_name like '".$ln."%')) and id != $id ")->all();

        return $result;
    }


}