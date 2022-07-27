<?php 

	class viewLogin{


		static public function index($param){

            // echo password_hash('123', PASSWORD_DEFAULT) ;

			?>

    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <div class="preloader">
        <svg class="circular" viewBox="25 25 50 50">
            <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10" /> </svg>
    </div>
    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <section id="wrapper-login" class="login-register login-sidebar" style="background-image:url(../storage/default/img/login-register.jpg); ">
        <div class="login-box card">
            <div class="card-body">
                <form class="form-horizontal form-material login-form" id="loginform" action="" method="post">

                    <input type="hidden" name="class" value="Login">
                    <input type="hidden" name="method" value="login">

                    <a href="javascript:void(0)" class="text-center db"><img src="../storage/default/img/logo.png" alt="Home" style="width: 70px" /><br/><img src="../storage/default/img/logo-text.png" alt="Home" width="200px" /></a>
                    <div class="form-group m-t-40">
                        <div class="col-xs-12">
                            <input class="form-control" type="text" name="username" value="" required="" placeholder="Usuario">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-xs-12">
                            <input class="form-control" type="password" name="password_l" value="" required="" placeholder="Contraseña">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="d-flex no-block align-items-center">
                            <div class="checkbox checkbox-primary p-t-0">
                                <input id="checkbox-signup" type="checkbox">
                                <label for="checkbox-signup"> Recordar contraseña </label>
                            </div>
                            <div class="ml-auto">
                                <a href="javascript:void(0)" id="to-recover" class="text-muted"><i class="fa fa-lock m-r-5"></i> Olvidaste la contraseña?</a> 
                            </div>
                        </div>
                    </div>
                    <div class="form-group text-center m-t-20">
                        <div class="col-xs-12">
                            <button class="btn btn-info btn-lg btn-block text-uppercase waves-effect waves-light" type="submit" name="login">Iniciar</button>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12 m-t-10 text-center">
                            <div class="social">
                                <button class="btn btn-facebook" data-toggle="tooltip" title="Login with Facebook"> <i aria-hidden="true" class="fab fa-facebook-f"></i> </button>
                                <button class="btn btn-googleplus" data-toggle="tooltip" title="Login with Google"> <i aria-hidden="true" class="fab fa-google-plus-g"></i> </button>
                            </div>
                        </div>
                    </div>
                    <div class="form-group m-b-0">
                        <div class="col-sm-12 text-center">
                            No tiene una cuenta? <a href="javascript:void(0)" class="text-primary m-l-5"  onclick="showregister()"><b>Registrarse</b></a>
                        </div>
                    </div>

                </form>
                <form class="form-horizontal" id="recoverform" action="">
                    <div class="form-group ">
                        <div class="col-xs-12">
                            <h3>Recover Password</h3>
                            <p class="text-muted">Enter your Email and instructions will be sent to you! </p>
                        </div>
                    </div>
                    <div class="form-group ">
                        <div class="col-xs-12">
                            <input class="form-control" type="text" required="" placeholder="Email">
                        </div>
                    </div>
                    <div class="form-group text-center m-t-20">
                        <div class="col-xs-12">
                            <button class="btn btn-primary btn-lg btn-block text-uppercase waves-effect waves-light" type="submit">Reset</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>

 

    <style type="text/css">

        @media screen and (max-width:640px) {

            .card-register{
                width: 90%
            }

        }
        @media screen and (max-width:1024px) and (min-width:640px) {

            .card-register{
                width: 70%;
            }

        }
        @media screen and (min-width:1024px) {

            .card-register{
                width: 50%;
            }

        }

    </style>

    <form autocomplete="off" enctype="multipart/form-data" class="form-horizontal form-material " id="register_user" action="" method="post" onsubmit="postdata('register_user', event, ok_registro)">

                    <input type="hidden" name="class" value="Users">
                    <input type="hidden" name="method" value="storage">

    <section id="register-user" class="login-register login-sidebar" style="background-image:url(../storage/default/img/login-register.jpg); display: none">
        <div class="login-box card card-register" >
            <div class="card-body">

                <a href="javascript:void(0)" style="font-size: 12px; position: absolute; margin-top: -15px; margin-left: -5px" onclick="showlogin()"> <u>Volver</u></a>
                

                    <a href="javascript:void(0)" class="text-center db"><img src="../storage/default/img/logo.png" alt="Home" style="width: 70px" /><br/><img src="../storage/default/img/logo-text.png" alt="Home" width="200px" /></a>
                    <br><br>
                    <div class="col-md-12">
                        <h4><b>REGISTRO DE USUARIO</b> <small>(Todos los campos con <span class="text-danger">*</span> son obligatorios).</small></h4>
                        <br>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group  ">
                                    <input class="form-control" type="text" name="name" required="" placeholder="Nombres *">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group ">
                                <input class="form-control" type="text" name="last_name" required="" placeholder="Apellidos *">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <input type="email" name="email" class="form-control" placeholder="Email *">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <input type="number" name="telefono" class="form-control" placeholder="Telefono">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <br>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <input type="date" name="birthday" class="form-control" placeholder="Fecha de nacimiento *">
                            </div>
                        </div>
                        <!-- <div class="col-md-6">
                            <div class="form-group">
                                <input type="password" name="" class="form-control" placeholder="Validar contraseña *">
                            </div>
                        </div> -->
                    </div>
                  
                    <div class="form-group text-center m-t-20">
                        <div class="col-xs-12">
                            <button onclick="ok_form1(1)" class="btn btn-info btn-lg btn-block text-uppercase waves-effect waves-light" type="button" name="login">CONTINUAR</button>
                        </div>
                    </div>

                    <div class="form-group m-b-0">
                        <div class="col-sm-12 text-center">
                            Ya tiene una cuenta? <a href="javascript:void(0)" class="text-primary m-l-5"  onclick="showlogin()"><b>Iniciar session</b></a>
                        </div>
                    </div>
              
            </div>
        </div>
    </section>

    <section id="register-password" class="login-register login-sidebar" style="background-image:url(../storage/default/img/login-register.jpg); display: none">
        <div class="login-box card card-register" >
            <div class="card-body">

                <a href="javascript:void(0)" style="font-size: 12px; position: absolute; margin-top: -15px; margin-left: -5px" onclick="go_form1()"> <u>Volver</u></a>
                

                    <a href="javascript:void(0)" class="text-center db"><img src="../storage/default/img/logo.png" alt="Home" style="width: 70px" /><br/><img src="../storage/default/img/logo-text.png" alt="Home" width="200px" /></a>
                    <br><br>
                    <div class="col-md-12">
                        <h4><b>REGISTRO DE USUARIO</b> <small>(Todos los campos con <span class="text-danger">*</span> son obligatorios).</small></h4>
                        <br>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <h5>Contraseña <span class="text-danger">*</span></h5>
                                <div class="controls">
                                    <input type="password" name="password" class="form-control" required data-validation-required-message="Este campo es obligatorio"> </div>
                            </div>  
                        </div>
                        <div class="col-md-6">
                           <div class="form-group">
                                <h5>Repetir contraseña <span class="text-danger">*</span></h5>
                                <div class="controls">
                                    <input type="password" name="" data-validation-match-match="password" class="form-control" required> </div>
                            </div>
                        </div>
                    </div>


                  
                    <div class="form-group text-center m-t-20">
                        <div class="col-xs-12">
                            <button onclick="ok_form2(1)" class="btn btn-info btn-lg btn-block text-uppercase waves-effect waves-light" type="button" name="login">CONTINUAR</button>
                        </div>
                    </div>

              
            </div>
        </div>
    </section>

    <section id="register-photo" class="login-register login-sidebar" style="background-image:url(../storage/default/img/login-register.jpg); display: none">
        <div class="login-box card card-register" >
            <div class="card-body">

                <a href="javascript:void(0)" style="font-size: 12px; position: absolute; margin-top: -15px; margin-left: -5px" onclick="go_form2()"> <u>Volver</u></a>
              

                    <a href="javascript:void(0)" class="text-center db"><img src="../storage/default/img/logo.png" alt="Home" style="width: 70px" /><br/><img src="../storage/default/img/logo-text.png" alt="Home" width="200px" /></a>
                    <br><br>
                    <div class="col-md-12">
                        <h4><b>Foto de perfil</b> </h4>
                        <h6>Asigna una foto para que tus usuarios te distingan.</h6>
                        <br>
                    </div>

                    <div class="row">
                        
                        <div class="col-4"></div>
                        <div class="col-4">
                            <div class="form-group">
                                <center><input onchange="validate_size(this)" accept="image/*" type="file" id="cover" name="photo" class="dropify" height="250px" data-default-file="" required="" /></center>
                            </div>
                        </div>
                        <div class="col-4"></div>
                    </div>
                  
                    <div class="form-group text-center m-t-20">
                        <div class="col-xs-12">
                            <button onclick="ok_form3(1)" class="btn btn-info btn-lg btn-block text-uppercase waves-effect waves-light" type="button" name="login">CONTINUAR</button>
                        </div>
                    </div>
              
            </div>
        </div>
    </section>

    <section id="registertypecontable" class="login-register login-sidebar" style="background-image:url(../storage/default/img/login-register.jpg); display: none">
        <div class="login-box card card-register" >

            <div class="card-body ">

                <a href="javascript:void(0)" style="font-size: 12px; position: absolute; margin-top: -15px; margin-left: -5px" onclick="go_form3()"> <u>Volver</u></a>
            

                    <a href="javascript:void(0)" class="text-center db"><img src="../storage/default/img/logo.png" alt="Home" style="width: 70px" /><br/><img src="../storage/default/img/logo-text.png" alt="Home" width="200px" /></a>
                    <br><br>
                    <div class="col-md-12">
                        <h4><b>Asignar modulos contables </b> <a href="javascript:void(0)" onclick="minus_modules()"> <i class="fas fa-minus-circle" ></i></a> <a href="javascript:void(0)" onclick="more_modules()"><i class="fas fa-plus-circle" ></i></a> </h4>
                        <br>
                    </div>

                    <div class="row modules" >
                        <div class="col-md-3 module" >
                            <div class="form-group  ">
                                
                                <input onchange="validate_size(this)" accept="image/*" type="file" id="cover" name="module[]" class="dropify" height="100px" data-default-file="../storage/default/img/billetera.png"  />
                                <input class="form-control" type="text" name="name_module[]" required="" value="Cartera personal" placeholder="Cartera personal">
                            </div>
                        </div>
                        <div class="col-md-3 module" >
                            <div class="form-group ">
                                <input onchange="validate_size(this)" accept="image/*" type="file" id="cover" name="module[]" class="dropify" height="100px" data-default-file="../storage/default/img/casa.png"  />
                                <input class="form-control" type="text" name="name_module[]" required="" value="Casa" placeholder="Casa">
                            </div>
                        </div>
                        <div class="col-md-3 module" >
                            <div class="form-group">
                                <input onchange="validate_size(this)" accept="image/*" type="file" id="cover" name="module[]" class="dropify" height="100px" data-default-file="../storage/default/img/empresa.png"  />
                                <input type="" name="name_module[]" value="Empresa" class="form-control" placeholder="Empresa">
                            </div>
                        </div>
                        
                    </div>
                  
                    <div class="form-group text-center m-t-20">
                        <div class="col-xs-12">
                            <button class="btn btn-info btn-lg btn-block text-uppercase waves-effect waves-light" type="submit" name="login">Guardar <i class="fas fa-save"></i></button>
                        </div>
                    </div>

              
            </div>
        </div>
    </section>

</form>

<!-- template modulos contable -->

<div class="template-module" style="display: none">
    <div class="col-md-3 module">
        <div class="form-group ">
            <input onchange="validate_size(this)" accept="image/*" type="file" id="cover" name="module[]" class="dropify" height="100px" data-default-file=""  />
            <input type="" name="name_module[]" value="" class="form-control" placeholder="Empresa">
        </div>
    </div>
</div>

<script type="text/javascript">

    

    function more_modules(){

        var total = $('.modules .module').length;

        if (total <4) {

            $('.template-module .module').clone().appendTo('.modules');

        }

    }

    function minus_modules(){

        var total = $('.modules .module').length;

        if (total>1) {

            var result = confirm("Está seguro de eliminar el ultimo modulo?");
            if (result) {
                $('.modules .module').last().remove();
            }

        }
    }
</script>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>


<script type="text/javascript">

$('#loginform').on('submit',function(e){


    console.log('probando login');

    // e = e || window.event;

    e.preventDefault();
    var dataf = [$("[name='username']").val(),$("[name='password_l']").val()];

    $.ajax({
        type : 'POST',
        url: URL,
        data: {
            class:'Login',
            method:'login',
            params:dataf
        }
    ,success : function(data){


        if (data == 1) {
            location.reload();
        }else{
               $.toast({
                   heading: 'Error al ingresar al sistema',
                   text: 'Los posibles errores al validar el ingreso a la plataforma pueden ser:\n Datos errados ó\n Usuario inactivo',
                   icon: 'error',
                   showHideTransition : 'slide',
                   position : 'top-right'
               });
            }
        
            }
        });

});

</script>
  

			<?php
		}

	}

 ?>