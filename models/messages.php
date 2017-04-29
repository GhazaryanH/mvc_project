<?php

class models_messages extends System_model
{

    //select messages

    public function getChat($to_id){
        $id = $_SESSION['user_id'];
        $select = $this->db->select("select messages.*,users.f_name,users.l_name,users.avatar from messages left join users ON(from_id=users.id) where (from_id = $id and to_id = $to_id) or (from_id = $to_id and to_id = $id) order by id DESC ")->all();
        return $select;
    }

    //insert messages
    public function insertChat($from_id,$to_id,$text){
        $data = [
            'from_id' => $from_id,
            'to_id' => $to_id,
            'text' => $text
        ];
        $insert = $this->db->insert('messages',$data);
        return $insert;
    }
}