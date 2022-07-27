<?php

class Users extends Main{
    
    public $mysqli;
    
    public function __construct() {
        
        $this->mysqli = parent::__construct();

        
    }

    public function register(){

    	viewUsers::register_user(['datos'=>[0,1], 'type'=>[]]);
    }

    public function storage($param){
        
    	print_r($param);exit();

    	$this->mysqli->autocommit(false);

    	$param['password'] = password_hash($param['password'], PASSWORD_DEFAULT);

    	$param['create_time'] = date("Y-m-d H:i:s");

    	$param['status'] = 0;

    	if(isset($param['name_module']) AND $_FILES['module']['error'] == 0 ){
            $modules = [ 'name'=>$param['name_module'], 'module'=> $_FILES['module']['tmp_name'] ];
        }

        unset($param['name_module']);

        print_r($_FILES);
        
		$query = "INSERT INTO users (`".  implode("`,`", array_keys($param))."`) VALUES ('".  implode("','", array_values($param))."')";

		// echo $query;

		$error= ($this->mysqli->query($query)===TRUE)?0:1;

		$id = $this->mysqli->insert_id;
       
        if ($error == 0) {

        	if(!is_dir(parent::Storage_link()."/users/".$id)){
            	mkdir(parent::Storage_link()."/users/".$id);
        	}
        	if(!is_dir(parent::Storage_link()."/users/".$id."/modules_contable/")){
            	mkdir(parent::Storage_link()."/users/".$id."/modules_contable/");
        	}



        	$query_profile = "INSERT into profiles (name, level, users_id)VALUES('Administrador', '5', {$id})";

        	$error = ($this->mysqli->query($query_profile)===TRUE)?0:1;

        	$id_profile = $this->mysqli->insert_id;

        	$query_profileUser = "INSERT into profiles_has_users (profiles_id, users_id)VALUES('{$id_profile}', '{$id}')";

        	$error = ($this->mysqli->query($query_profileUser)===TRUE)?0:1;

        	if(isset($modules['name'])){
                
                foreach ($modules['name'] as $key => $value) {

            		$query_modules = 'INSERT INTO modules_contables (name, users_id) VALUES ("'.$modules['name'][$key].'","'.$id.'")';

            		$id_modules = $this->mysqli->insert_id;

                   	$error= ($this->mysqli->query($query_modules)===TRUE)?0:1;

                   	if ($_FILES['module']['error'] == 0) {

               			$error = (move_uploaded_file($_FILES['module']['tmp_name'][$key], parent::Storage_link()."users/".$id."/modules_contable/".$id_modules.".png"))? 0:1;

               		}

               }
       
            }


            if ($_FILES['photo']['error'] == 0) {
                
                $error = (move_uploaded_file($_FILES['photo']['tmp_name'], parent::Storage_link()."users/".$id."/profile.png"))? 0:1;
                
                if ($error == 0) {                                
         
                    $this->mysqli->commit();

                    echo (1);
                    
                }else{
                    
                    parent::rmdir_recursive(parent::Storage_link()."/users/".$id);
                    
                    echo 0;
                    
                    }
                
            }  else {
                
                $error = (copy(parent::Storage_link()."default/img/user.jpg", parent::Storage_link()."users/".$id."/profile.png"))?0:1;
                
                if ($error == 0) {                                
         
                    $this->mysqli->commit();

                    echo (1);
                    
                }else{
                    
                    parent::rmdir_recursive(parent::Storage_link()."/users/".$id);
                    
                    echo 0;
                    
                    }
                
            }

        }else{
            echo 0;
        }


    }

}