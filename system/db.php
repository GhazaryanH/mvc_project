<?php
	class system_db{
		private $con;
		private $q;
		function __construct(){
			$this->con = new Mysqli('localhost', 'root', '', 'txeq');
			if($this->con->connect_errno){
				echo $this->con->connect_error;
				exit;
			}
		}
		
		public function select($query){
			$this->q = $this->con->query($query);
			return $this;
		}
		
		public function all(){
			if(!$this->q){
				return [];
			}
			$full = [];
			while($row = $this->q->fetch_assoc()){
				//array_push($full, $row);
				$full[] = $row;
			}
			return $full;
		}
		public function first(){
			if(!$this->q){
				return [];
			}
			return $this->q->fetch_assoc();
		}

        public function num(){
            if(!$this->q){
                return 0;
            }
            return $this->q->num_rows;
        }

		public function insert($tbl, $data){
			$key = [];
			$val = [];
			foreach($data as $k=>$v){
				$key[] = $k;
				$val[] = $v;
			}
			$key = join(',', $key);
			$val = join("','", $val);
			
			$sql = "insert into $tbl ($key) values ('$val')";
			return $this->con->query($sql);
		}
		
		public function update($tbl, $data, $where=false){
			$set = [];
			foreach($data as $k=>$v){
				$set[] = $k."='".$v."'";
			}
			$set = join(',', $set);
			
			if($where){
				$where = 'where '.$where;
			}
			
			$sql = "update $tbl set $set $where";
			//echo $sql;
			return $this->con->query($sql);
		}

		public function del($tbl, $where){
            $sql="delete from $tbl where $where";
		    return $this->con->query($sql);
        }
	}


/*$db = new Db;

$result = $db->select("select * from users")->all();

var_dump($result);

	//======================================================

	$data = [
		'name' => 'Jack',
		'surname' => 'London',
		'age' => '120'
	];

	$db->update('customers', $data, "email='a@a.a'");

	//"insert into users (name, surname) values ('Jack', 'London')"*/
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	