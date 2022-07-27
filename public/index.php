<?php
ini_set("displayerrors", 0);
error_reporting(E_ERROR | E_WARNING);
session_start();
if (isset($_GET['seed_permission'])) {
    include_once '../app/controller/Main.php';
    $seed = new Main();
    // $seed->seed_system();
    
}
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Alejandro Burbano">
    <link rel="icon" type="image/png" sizes="16x16" href="../storage/default/img/logo.png">
    <title>Contable</title>
    <!-- Bootstrap Core CSS -->
    <link href="js/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="js/plugins/dropify/dist/css/dropify.min.css">
    <!-- toast CSS -->
    <link href="js/plugins/toast-master/css/jquery.toast.css" rel="stylesheet">
    <!-- chartist CSS -->
    <link href="js/plugins/chartist-js/dist/chartist.min.css" rel="stylesheet">
    <link href="js/plugins/chartist-js/dist/chartist-init.css" rel="stylesheet">
    <!-- <link href="js/plugins/chartist-plugin-tooltip-master/dist/chartist-plugin-tooltip.css" rel="stylesheet"> -->
    <!--This page css - Morris CSS -->
    <link href="js/plugins/c3-master/c3.min.css" rel="stylesheet">
    <link href="js/plugins/wizard/steps.css" rel="stylesheet" type="text/css">
    <link href="js/plugins/sweetalert/sweetalert.css" rel="stylesheet" type="text/css">
    <!-- Custom CSS -->
    <link href="css/style.css" rel="stylesheet">
    <!-- You can change the theme colors from here -->
    <link href="css/colors/red-dark.css" id="theme" rel="stylesheet">
    <link href="js/plugins/typeahead.js-master/dist/typehead-min.css" rel="stylesheet">

</head>

<style type="text/css">
    
    table{
        font-size: 12px;
    }
</style>

<body class="fix-header fix-sidebar card-no-border">
    
            
    <div class="preloader">
        <svg class="circular" viewBox="25 25 50 50">
            <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10" /> </svg>
    </div>
    
    <?php

    include '../app/controller/Controller.php';

    // print_r($_SESSION);
    
  
        if (!isset($_SESSION['user'])) {
            
            $index = new Controller('Login', 'index', NULL);
            
        }else{
            
            $index = new Controller('Menu', 'index', NULL);

        }


?>


    <script>
        var URL = '../app/controller/Controller.php';


            $('#sa-cerrar').on('click', function(){
                Swal.fire({
                    title: 'Desea cerrar sesion?',
                    type: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Si, cerrar sesion',
                    cancelButtonText: 'Cancelar'
                }).then((result) => {
                    if (result.value) {

                        eventos('Login','logout',null);

                    }
                });
        });
    </script>

    <script src="js/plugins/jquery/jquery.min.js"></script>
    <script src="js/plugins/calendar/jquery-ui.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.4.0/Chart.min.js"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="js/plugins/popper/popper.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="js/plugins/bootstrap/js/bootstrap.min.js"></script>
    <!-- slimscrollbar scrollbar JavaScript -->
    <script src="js/jquery.slimscroll.js"></script>
    <!--Wave Effects -->
    <script src="js/waves.js"></script>
    <!--Menu sidebar -->
    <script src="js/sidebarmenu.js"></script>
    <!--stickey kit -->
    <script src="js/plugins/sticky-kit-master/dist/sticky-kit.min.js"></script>
    <script src="js/plugins/sparkline/jquery.sparkline.min.js"></script>
    <!--Custom JavaScript -->
    <script src="js/custom.min.js"></script>
    <script src="js/plugins/moment/moment.js"></script>
    <script src="js/plugins/wizard/jquery.steps.min.js"></script>
    <script src="js/plugins/wizard/jquery.validate.min.js"></script>
    <script src="js/plugins/toast-master/js/jquery.toast.js"></script>
    <script src="js/toastr.js"></script>
    <script src="js/validation.js"></script>
    <script src="js/plugins/zoomy/zoomy.js"></script>
    <!-- ============================================================== -->
    <!-- Style switcher -->
    <!-- ============================================================== -->
    <script src="js/plugins/echarts/echarts-all.js"></script>
    <script src="js/plugins/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="js/plugins/sweetalert/sweetalert.min.js"></script>
    <script src="js/plugins/sweetalert/jquery.sweet-alert.custom.js"></script>

    <!-- Include SmartWizard JavaScript source -->
    <!-- <script type="text/javascript" src="js/plugins/smart_wizard/js/jquery.smartWizard.min.js"></script> -->
    <script src="js/plugins/typeahead.js-master/dist/typeahead.bundle.min.js"></script>
    <script src="js/plugins/typeahead.js-master/typeahead.init.js"></script>

    <script src="js/plugins/dropzone-master/dist/dropzone.js"></script>
    <script src="js/plugins/dropify/dist/js/dropify.min.js"></script>
    <script src="js/plugins/timepicker/bootstrap-timepicker.min.js"></script>
    <script src="js/plugins/daterangepicker/daterangepicker.js"></script>
    <script src="js/plugins/select2/dist/js/select2.js" type="text/javascript"></script>
    <script src="js/plugins/inputmask/dist/min/jquery.inputmask.bundle.min.js" type="text/javascript"></script>
    <script src="js/plugins/summernote/dist/summernote.min.js" type="text/javascript" ></script>
    <script src="js/plugins/datalist/jquery.flexdatalist.min.js"></script>
    <script src="js/plugins/push/push.js"></script>
    <script src="js/plugins/push/servicio.js"></script>
    <script src="js/modulo1.js"></script>
   
    
            
<script>

    var URL = "../app/controller/Controller.php";
    
    function close_sidenav(){
        
        if (window.innerWidth< 768) {
            $("#app").on('click', function(){
                
                $("body").removeClass("show-sidebar");
                
            });
        }
        
    }
    
    $(document).ready(function() {
        // Basic
        
        if (window.innerWidth<768) {
            close_sidenav();
        }
        
        $(window).on('resize', function(){
            if (window.innerWidth<768) {
                close_sidenav();
            }
        });
        
        $('.dropify').dropify();

        // Translated
        $('.dropify-fr').dropify({
            messages: {
                default: 'Glissez-déposez un fichier ici ou cliquez',
                replace: 'Glissez-déposez un fichier ou cliquez pour remplacer',
                remove: 'Supprimer',
                error: 'Désolé, le fichier trop volumineux'
            }
        });

        // Used events
        var drEvent = $('#input-file-events').dropify();

        drEvent.on('dropify.beforeClear', function(event, element) {
            return confirm("Do you really want to delete \"" + element.file.name + "\" ?");
        });

        drEvent.on('dropify.afterClear', function(event, element) {
            alert('File deleted');
        });

        drEvent.on('dropify.errors', function(event, element) {
            console.log('Has Errors');
        });

        var drDestroy = $('#input-file-to-destroy').dropify();
        drDestroy = drDestroy.data('dropify')
        $('#toggleDropify').on('click', function(e) {
            e.preventDefault();
            if (drDestroy.isDropified()) {
                drDestroy.destroy();
            } else {
                drDestroy.init();
            }
        });

    });
        
    </script>

                                
    <script src="js/plugins/styleswitcher/jQuery.style.switcher.js"></script>
    
</body>
