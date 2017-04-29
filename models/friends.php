<?php

class Models_friends extends System_model
{
    public function areFriends($id2){
        $id1 = $_SESSION['user_id'];
        return $this->db->select("select id from friends where ((u1_id=$id1 and u2_id=$id2) or (u1_id=$id2 and u2_id=$id1)) and accept='1'")->first();
    }
    public function RequestSend($resiver_id){
        $sender_id = $_SESSION['user_id'];
        return $this->db->select("select * from friends where (u1_id=$sender_id and u2_id=$resiver_id ) and accept='0'")->first();
    }
    public function RequestSendUser(){
        $id = $_SESSION['user_id'];
        return $this->db->select("select users.* from users  
                                  inner join friends 
                                  on users.id = friends.u1_id 
                                  where u2_id = $id and accept='0'")->all();
    }
    public function addFriend($friend_id){
        $user_id=$_SESSION['user_id'];

        return $this->db->insert('friends',[
                                    'u1_id' => $user_id,
                                    'u2_id' => $friend_id
                                        ]);
    }
    public function acceptFriend($idsend){
        $user_id=$_SESSION['user_id'];
        $data = [
            'accept' => '1',
        ];
        $result=$this->db->update('friends', $data, "u2_id='$user_id' and u1_id = '$idsend'");
        return $result;
    }
    public function unFriend($friend_id){
        $user_id=$_SESSION['user_id'];
        $where="((u1_id=$user_id and u2_id=$friend_id) or (u2_id=$user_id and u1_id=$friend_id)) and accept = '1'";
        $result=$this->db->del('friends',$where);
        return $result;
    }
    public function removeRequest($id){
        $user_id=$_SESSION['user_id'];
        $where="(u1_id=$user_id and u2_id=$id) or (u1_id=$id and u2_id=$user_id) ";
        $result=$this->db->del('friends',$where);
        return $result;

    }
    public function getFriends() {
        $user_id=$_SESSION['user_id'];
        $result=$this->db->select("SELECT u.id as user_id, u.f_name, u.l_name, u.avatar FROM `friends` as f
        INNER JOIN users as u ON (`u1_id`=u.id OR `u2_id`=u.id)
        WHERE (`u1_id`=$user_id OR `u2_id`=$user_id) AND `accept`='1' AND u.id !=$user_id")->all();
        return $result;
    }
}