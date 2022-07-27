var stado_url = 0;

$(document).ready(function(){

 window.onhashchange=function()
{
    
        if (stado_url == 1) {
            stado_url = 0;
            return false;
        }
    
    var hash_site = location.hash.substr(1);
    array = hash_site.split("/");
    if ((array[0] != '' && array[0] != "undefined") && (array[1] != '' && array[1] != 'undefined') && (array[2] != '' && array[2] != 'undefined')) {

        if (array.length == 4) {
            view(array[0],array[1],array[2],window[array[3]],1);
        }else{
            view(array[0],array[1],array[2],'',1);
        }
    }else{
        location.reload();
    }
};
    if (location.hash != '') {

    }else{
        
        view('Menu','dash',null);
        
    }
    
});

function eventos(clase,method,params){
    
    $.post(URL,{
        class:clase,
        method:method,
        params:params
    }, function(data){
        
        if (data == 1) {
            location.reload();
        }else{
            swal("Su accion no se pudo ejecutar");
        }
        
    });
    
}

function view(clase,method,params,funcion,donde){
    // $(".preloader").show();
    // $(".tooltip").remove();
       if (donde != 1) {

                stado_url = 1;

            }
        $.post(URL,{
            class:clase,
            method:method,
            params:params
        }, function(data){
            
            if (data==6982827982) {
                alert("Error de permisos");
                window.history.back();
                return false;
            }
            
            $("#app").html(data);
            $(".preloader").hide();
    
            if (typeof funcion == 'function') {
                funcion();
            }

        });
    
    
    if (typeof funcion == 'function') {
        window.location.hash = clase+"/"+method+"/"+params+"/"+funcion.name;
    }else{
        window.location.hash = clase+"/"+method+"/"+params;
    }
        
}

function postdata(idform,e,funcion,value,ele){

    e = e || window.event;
    e.preventDefault();
    if (idform!=null) {
        
        params = new FormData($("#"+idform)[0]);
        
        $("#"+idform).find('[type="submit"]').prop('disabled', true);
        
        $.ajax({
            url:URL,
            type:'POST',
            data:params,
            contentType: false,
            processData: false,
            success: function(result){
                
                $("#"+idform).find('[type="submit"]').prop('disabled', false);
                
                if (result==6982827982) {
                    alert("Error de permisos");
                    return false;
                }
                
                if (typeof ele != 'undefined') {
                    funcion(result,ele);
                }else{
                    funcion(result,idform);
                }       
                
            }
        });
    
    }else{
        
        datos = value.split(";");
        
        params = {
            class:datos[0],
            method:datos[1],
            id:datos[2]
        };
    
        $.ajax({
            url:URL,
            type:'POST',
            data:params,
            success: function(result){

                if (result==6982827982) {
                    alert("Error de permisos");
                    return false;
                }

                if (typeof ele != 'undefined') {
                    funcion(result,ele);
                }else{
                    funcion(result,idform);
                }       

            }
        });
    
    }
    
}

function plugins(){

    $('.dropify').dropify();

    

}

function formwizard(){
// var form = $("#failure_register");
// form.validate({
//     errorPlacement: function errorPlacement(error, element) {
//         element.before(error);
//     }
// });
//         form.steps({
//             headerTag: "h6",
//             bodyTag: "section",
//             transitionEffect: "fade",
//             titleTemplate: '<span class="step">#index#</span> #title#',
//             labels: {
//                 finish: "Submit"
//             },
//             onStepChanging: function (event, currentIndex, newIndex)
//             {
//                 form.validate().settings.ignore = ":disabled,:hidden";
//                 return form.valid();
//             },
//             onFinished: function (event, currentIndex) {
//                 swal("Formulario de fallos completado");
//                 postdata('failure_register',event,failure_register);
//             }
//         });
        
//         $('#the-basics .typeahead').typeahead({
//                 hint: true,
//                 highlight: true,
//                 minLength: 1
//             },
//             {
//                 name: 'states',
//                 source: substringMatcher(states)
//         });
    
}

function showregister(){
        $('#wrapper-login').hide();
        $('#register-user').show();
        // console.log('Prueba de entrada a funcion');
    }

function showlogin(){
        $('#wrapper-login').show();
        $('#register-user').hide();
    }

function ok_registro(result, form){

    console.log(result);
    
    if (result==1) {
        $.toast({
            heading: 'Tu perfil se ha creado con exito',
            position: 'top-right',
            loaderBg:'#009624',
            icon: 'success',
            hideAfter: 5000, 
            stack: 6
        });

        
    }else{
        
        $.toast({
            heading: 'Error ',
            text: 'Intentalo nuevamente o comunicate con el administrador de sistema',
            position: 'top-right',
            loaderBg:'#ff6849',
            icon: 'error',
            hideAfter: 5000, 
            stack: 6
        });
    }
}

function ok_form1(){
    $('#register-password').show();
    $('#register-user').hide();
}
function go_form1(){
    $('#register-password').hide();
    $('#register-user').show();
}
function ok_form2(){
    $('#register-password').hide();
    $('#register-photo').show();
    $('.dropify').dropify();
}
function go_form2(){
    $('#register-password').show();
    $('#register-photo').hide();
}
function ok_form3(result, form){
    
    if (result==1) {
        $('#registertypecontable').show();
        $('#register-photo').hide();
        $('.dropify').dropify();
    }
}
function go_form3(result, form){
    
        $('#registertypecontable').hide();
        $('#register-photo').show();
      

}

function ok_register_invoice(result, form){

    console.log(result);
    
    if (result==1) {
        $.toast({
            heading: 'Tu registro se guardo con exito',
            position: 'top-right',
            loaderBg:'#009624',
            icon: 'success',
            hideAfter: 5000, 
            stack: 6
        });

        
    }else{
        
        $.toast({
            heading: 'Error ',
            text: 'Intentalo nuevamente o comunicate con el administrador de sistema',
            position: 'top-right',
            loaderBg:'#ff6849',
            icon: 'error',
            hideAfter: 5000, 
            stack: 6
        });
    }

}

// validacion de contraseñas e inputs

! function(window, document, $) {
    "use strict";
    $("input,select,textarea").not("[type=submit]").jqBootstrapValidation()
}(window, document, jQuery);

        $(".tab-wizard").steps({
            headerTag: "h6",
            bodyTag: "section",
            transitionEffect: "fade",
            titleTemplate: '<span class="step">#index#</span> #title#',
            labels: {
                finish: "Submit"
            },
            onFinished: function (event, currentIndex) {
                swal("Form Submitted!", "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed lorem erat eleifend ex semper, lobortis purus sed.");

            }
        });


        var form = $(".validation-wizard").show();

        $(".validation-wizard").steps({
            headerTag: "h6",
            bodyTag: "section",
            transitionEffect: "fade",
            titleTemplate: '<span class="step">#index#</span> #title#',
            labels: {
                finish: "Submit"
            },
            onStepChanging: function (event, currentIndex, newIndex) {
                return currentIndex > newIndex || !(3 === newIndex && Number($("#age-2").val()) < 18) && (currentIndex < newIndex && (form.find(".body:eq(" + newIndex + ") label.error").remove(), form.find(".body:eq(" + newIndex + ") .error").removeClass("error")), form.validate().settings.ignore = ":disabled,:hidden", form.valid())
            },
            onFinishing: function (event, currentIndex) {
                return form.validate().settings.ignore = ":disabled", form.valid()
            },
            onFinished: function (event, currentIndex) {
                swal("Form Submitted!", "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed lorem erat eleifend ex semper, lobortis purus sed.");
            }
        }), $(".validation-wizard").validate({
            ignore: "input[type=hidden]",
            errorClass: "text-danger",
            successClass: "text-success",
            highlight: function (element, errorClass) {
                $(element).removeClass(errorClass)
            },
            unhighlight: function (element, errorClass) {
                $(element).removeClass(errorClass)
            },
            errorPlacement: function (error, element) {
                error.insertAfter(element)
            },
            rules: {
                email: {
                    email: !0
                }
            }
        });


