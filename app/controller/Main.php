<?php 

	class Main{

		const HOST = 'localhost';

		const USER = 'root';

		const PASSWORD = '';

		const DATABASE = 'contable';

		const SITE = 'contablemvc';
		

		public function __construct() {

			$mysqli = new mysqli(self::HOST, self::USER, self::PASSWORD, self::DATABASE);

			return $mysqli;

		}

		public function Doc_root(){

			return $_SERVER['DOCUMENT_ROOT']."/".self::SITE."/";

		}

		public function Storage_link(){

			return $_SERVER['DOCUMENT_ROOT']."/".self::SITE."/storage/";

		}

		public function get_users_has_accounting_modules(){

			$query = "SELECT users_has_accounting_modules.*, accounting_modules.name, accounting_modules.id AS id_accounting_modules  from users_has_accounting_modules INNER JOIN accounting_modules ON users_has_accounting_modules.accounting_modules_id = accounting_modules.id  where users_id=".$_SESSION['id'];

			$res = $this->mysqli->query($query);

			$users_has_accounting_modules = [];

			while ($row = $res->fetch_assoc()) {
				
				$users_has_accounting_modules[] = $row;
			}

			return $users_has_accounting_modules;
		}

	}

 ?>