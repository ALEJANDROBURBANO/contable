<?php 

	class Login extends Main{

		public $mysqli;

		public function __construct(){

			$this->mysqli = parent::__construct();

		}

		public function login($params) {  

			// print_r($params);exit();

			$username = $params['params'][0];
			$password = $params['params'][1];


	        $query = "SELECT users.*, concat(users.name, ' ',users.last_name) as name,profiles.name as profile, profiles.level,profiles.id as idp FROM users"
	                . " INNER JOIN profiles on profiles.id = users.profiles_id"
	                . " where users.email='{$username}' and users.status=1";

	                // echo $query;

	                
	        $res = $this->mysqli->query($query);

	        // echo $res->num_rows;
	        
	        if ($res->num_rows>0) {
	            
	            $row = $res->fetch_assoc();
	            
	            if (password_verify($password, $row['password'])) {

	         	                
	                                
	                $_SESSION  = [

	                    'id' => $row['id'],
	                    'email' => $row['email'],
	                    'user' => $row['name'],
	                    'role' => $row['profile'],
	                    'profile_id' => $row['profiles_id'],
	                    'level' => $row['level']
	                    
	                ];
	                

	                echo 1;

	                // header("location:reload");

	            }else{

	                echo 0;

	            }
	            
	        }else{
	            
	            echo 0;
	            
	        }
	        
	    }

		public function index($params){

			viewLogin::index($params);

		}

		public function logout(){

			session_destroy();
			echo 1;
			
		}

	}

 ?>