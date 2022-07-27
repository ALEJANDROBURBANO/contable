<?php

class Accounting_modules extends Main{
    
    public $mysqli;
    
    public function __construct() {
        
        $this->mysqli = parent::__construct();

        
    }

    public function register(){

    	$query_accounting_modules = "SELECT users_has_accounting_modules.*, accounting_modules.name, accounting_modules.id AS id_accounting_modules  FROM users_has_accounting_modules INNER JOIN accounting_modules ON users_has_accounting_modules.accounting_modules_id=accounting_modules.id WHERE users_has_accounting_modules.users_id=".$_SESSION['id'];

    	$res = $this->mysqli->query($query_accounting_modules);

    	$accounting_modules=[];

    	while ($row=$res->fetch_assoc()) {

    		$accounting_modules[]=$row;
    		

    	}

        $users_has_accounting_modules = parent::get_users_has_accounting_modules();




    	viewAccounting_modules::registerInvoices(['accounting_modules'=>$accounting_modules, 'users_has_accounting_modules'=>$users_has_accounting_modules]);

    }

    public function storage_invoices($param){

        // print_r($param); exit();

        $query = "INSERT into invoices (description, value, creator, users_has_accounting_modules_id, created_at, type) values('".$param['description']."', '".$param['value']."', '".$_SESSION['id']."', '".$param['users_has_accounting_modules_id']."', '".date('Y-m-d H:i:s')."', '{$param['type_voice']}' )";

        echo ($this->mysqli->query($query)===TRUE)?1:0;

    }

    public function invoices($param){

        // print_r($param);

        $query_accounting_module = "SELECT users_has_accounting_modules.*, accounting_modules.name, accounting_modules.id AS id_accounting_modules  from users_has_accounting_modules INNER JOIN accounting_modules ON users_has_accounting_modules.accounting_modules_id = accounting_modules.id  where users_has_accounting_modules.id = {$param['params']} AND users_id=".$_SESSION['id'];

            $res_m = $this->mysqli->query($query_accounting_module);

            $users_has_accounting_module =  $res_m->fetch_assoc();


        $query = "SELECT invoices.*, users.name FROM invoices INNER JOIN users ON invoices.creator = users.id where type=1 AND users_has_accounting_modules_id=".$param['params']." order by  invoices.id desc";

        $res = $this->mysqli->query($query);

        $invoices_egress=[];

        while ($row=$res->fetch_assoc()) {
            
            $invoices_egress[]= $row;
        }

        $query_entry = "SELECT invoices.*, users.name FROM invoices INNER JOIN users ON invoices.creator = users.id where type=0 AND users_has_accounting_modules_id=".$param['params']." order by  invoices.id desc";

        $res_entry = $this->mysqli->query($query_entry);

        $invoices_entry=[];

        while ($row_entry=$res_entry->fetch_assoc()) {
            
            $invoices_entry[]= $row_entry;
        }

        viewAccounting_modules::invoices(['invoices_egress'=>$invoices_egress, 'invoices_entry'=>$invoices_entry, 'users_has_accounting_module'=>$users_has_accounting_module]);
    }

}