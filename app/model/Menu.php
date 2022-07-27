<?php

class Menu extends Main{

    public $mysqli;
    
    public function __construct() {
        
        $this->mysqli = parent::__construct();
        
    }

    public function dash($param) {
        
        viewMenu::dash();
        
    }
    
    public function index($param) {

        // print_r($_SESSION);

        $user_id = $_SESSION['id'];


        $res = $this->mysqli->query("SELECT * from users where id = {$user_id}");
        
        $perfil = $res->fetch_assoc();


        $res_users =  $this->mysqli->query("SELECT id, concat(name,' ',last_name) as name FROM users");

        $users = [];

        while ($row = $res_users->fetch_object()) {
                   
                   $users = $row;

               }    

        $users_has_accounting_modules = parent::get_users_has_accounting_modules();

        
        viewMenu::index(['perfil'=>$perfil, 'users'=>$users, 'users_has_accounting_modules'=>$users_has_accounting_modules]);
        
    }

}