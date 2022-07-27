<?php 
    // echo "Prueba controller"; exit();

	if (!function_exists('array_key_first')) {
		function array_key_first(array $arr){
			foreach ($arr as $key => $unused) {
				return $key;
			}
			return NULL;
		}
	}

	ini_set("date.timezone", "America/Bogota");
	ini_set("display_errors",1);
	session_start();

	use PHPMailer\PHPMailer\PHPMailer;
	use PHPMailer\PHPMailer\Exception;

	if ((isset($_POST['class']) && $_POST['class'] != 'Login') && !isset($_SESSION['id'])) {
		
		header("location:./");
		
	}

	require $_SERVER['DOCUMENT_ROOT']."/contablemvc/vendor/autoload.php";

	include 'Main.php';

	class Controller{

		public function __construct($class,$method,$params){

			include $_SERVER['DOCUMENT_ROOT']."/contablemvc/app/model/".$class.".php";
            include $_SERVER['DOCUMENT_ROOT']."/contablemvc/app/view/view".$class.".php";

			$retorno = new $class();

			if (isset($params['class']) && isset($params['method'])) {
				
				unset($params['class']);
				unset($params['method']);

			}

			$retorno->$method($params);

			return $retorno;

		}

		static public function pagetitle($params){

			?>



        <div class="row page-titles">

            <div class="col-md-5 col-8 align-self-center">
                <h3 class="text-themecolor m-b-0 m-t-0"><?=$params['title']?></h3>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="">Inicio</a></li>
                    <li class="breadcrumb-item active"><?=$params['title']?></li>
                </ol>
            </div>

            <div class="col-md-7 col-4 align-self-center">
                <div class="d-flex m-t-10 justify-content-end">
                    <div class="d-flex m-r-20 m-l-10 hidden-md-down">
                        <div class="chart-text m-r-10">
                            <h6 class="m-b-0"><small><?php
                            $key1 = key($params['data-title']);
                            echo $key1;
                            next($params['data-title']);?></small></h6>
                            <h4 class="m-t-0 text-info"><?=$params['data-title'][$key1]?></h4></div>
                        <div class="spark-chart">
                            <div id="monthchart"></div>
                        </div>
                    </div>
                    <div class="d-flex m-r-20 m-l-10 hidden-md-down">
                        <div class="chart-text m-r-10">
                            <h6 class="m-b-0"><small><?php
                            $key2 = key($params['data-title']);
                            echo $key2;
                            ?></small></h6>
                            <h4 class="m-t-0 text-primary"><?=$params['data-title'][$key2]?></h4></div>
                        <div class="spark-chart">
                            <div id="lastmonthchart"></div>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>


        <script type="text/javascript">
            function showToogle(){

                // console.log("mostrando el div");
                $('.right-sidebar').show();

            }
        </script>

       
        <?php

		}

	}

	if (isset($_POST['class']) && count($_POST)>0) {
	   // print_r($_POST);exit;
        $controller = new Controller($_POST['class'], $_POST['method'], $_POST);
        
        return $controller;
        
	}

 ?>