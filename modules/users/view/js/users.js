//Crear un plugin
jQuery.fn.fill_or_clean = function () {
    this.each(function () {
        //if ($("#name").val() == "") {
        if ($("#idviaje").val() == "") {
            $("#idviaje").val("Introduce ID");
            $("#idviaje").focus(function () {
                if ($("#idviaje").val() == "Introduce ID") {
                    $("#idviaje").val('');
                }
            });
        }
        $("#idviaje").blur(function () { //Onblur se activa cuando el usuario retira el foco
            if ($("#idviaje").val() == "") {
                $("#idviaje").val("Introduce ID");
            }
        });

        if ($("#precio").val() == "") {
            $("#precio").val("0");
            $("#precio").focus(function () {
                if ($("#precio").val() == "0") {
                    $("#precio").val('');
                }
            });
        }
        $("#precio").blur(function () {
            if ($("#precio").val() == "") {
                $("#precio").val("0");
            }
        });
        if ($("#f_sal").val()== "") {
            $("#f_sal").val("Introduce fecha de salida");
            $("#f_sal").focus(function () {
                if ($("#f_sal").val() == "Introduce fecha de salida") {
                    $("#f_sal").val('');
                }
            });
        }
        $("#f_sal").blur(function () {
            if ($("#f_sal").val() == "") {
                $("#f_sal").val("Introduce fecha de salida");
            }
        });
        if ($("#f_lleg").val() == "") {
            $("#f_lleg").val( "Introduce fecha de llegada");
            $("#f_lleg").focus(function () {
                if ($("#f_lleg").val() == "Introduce fecha de llegada") {
                    $("#f_lleg").val('');
                }
            });
        }
        $("#f_lleg").blur(function () {
            if ($("#f_lleg").val() == "") {
                $("#f_lleg").val( "Introduce fecha de llegada");
            }
        });
    });//each
    return this;
};//function

//Solution to : "Uncaught Error: Dropzone already attached."
Dropzone.autoDiscover = false;
$(document).ready(function () {

    //Datepicker///////////////////////////
    $( function() {
        $( "#f_sal" ).datepicker({
        minDate: '0Y',
        maxDate: '+3Y',
        dateFormat: 'mm-dd-yy',
        changeMonth: true,
        changeYear: true
        });

    $( "#f_lleg" ).datepicker({
        minDate: '0D+1',
        maxDate: '+3Y',
        dateFormat: 'mm-dd-yy',
        changeMonth: true,
        changeYear: true
        });
    } );

    //Valida users /////////////////////////
    $('#submit_user').click(function () {
        validate_user();
    });

    //Control de seguridad para evitar que al volver atrás de la pantalla results a create, no nos imprima los datos
    $.get("modules/users/controller/controller_users.class.php?load_data=true",
            function (response) {
                //alert(response.user);
                if (response.travel === "") {
                    $("#idviaje").val('');
                    $("#destino").val('');
                    $("#precio").val('');
                    $("#f_sal").val('');
                    $("#f_lleg").val('');
                    var inputElements = document.getElementsByClassName('messageCheckbox');
                    for (var i = 0; i < inputElements.length; i++) {
                        if (inputElements[i].checked) {
                            inputElements[i].checked = false;
                        }
                    }
                    //siempre que creemos un plugin debemos llamarlo, sino no funcionará
    $(this).fill_or_clean();
                } else {
                    $("#idviaje").val(response.travel.idviaje);
                    $("#destino").val(response.travel.destino);
                    $("#precio").val(response.travel.precio);
                    $("#f_sal").val(response.travel.f_sal);
                    $("#f_lleg").val(response.travel.f_lleg);
                    var tipo = response.travel.tipo;
                    var inputElements = document.getElementsByClassName('messageCheckbox');
                    for (var i = 0; i < inputElements.length; i++) { //////////////////////////////////////
                        for (var j = 0; j < inputElements.length; j++) {
                            if(interests[i] ===inputElements[j] )
                                inputElements[j].checked = true;
                        }
                    }
                }
            }, "json");
    //Dropzone function //////////////////////////////////
    $("#dropzone").dropzone({
        url: "modules/users/controller/controller_users.class.php?upload=true",
        addRemoveLinks: true,
        maxFileSize: 1000,
        dictResponseError: "Ha ocurrido un error en el server",
        acceptedFiles: 'image/*,.jpeg,.jpg,.png,.gif,.JPEG,.JPG,.PNG,.GIF,.rar,application/pdf,.psd',
        init: function () {
            this.on("success", function (file, response) {
                //alert(response);
                $("#progress").show();
                $("#bar").width('100%');
                $("#percent").html('100%');
                $('.msg').text('').removeClass('msg_error');
                $('.msg').text('Success Upload image!!').addClass('msg_ok').animate({'right': '300px'}, 300);
            });
        },
        complete: function (file) {
            //if(file.status == "success"){
            //alert("El archivo se ha subido correctamente: " + file.name);
            //}
        },
        error: function (file) {
            //alert("Error subiendo el archivo " + file.name);
        },
        removedfile: function (file, serverFileName) {
            var name = file.name;
            $.ajax({
                type: "POST",
                url: "modules/users/controller/controller_users.class.php?delete=true",
                data: "filename=" + name,
                success: function (data) {
                    $("#progress").hide();
                    $('.msg').text('').removeClass('msg_ok');
                    $('.msg').text('').removeClass('msg_error');
                    $("#e_avatar").html("");

                    var json = JSON.parse(data);
                    if (json.res === true) {
                        var element;
                        if ((element = file.previewElement) != null) {
                            element.parentNode.removeChild(file.previewElement);
                            //alert("Imagen eliminada: " + name);
                        } else {
                            false;
                        }
                    } else { //json.res == false, elimino la imagen también
                        var element;
                        if ((element = file.previewElement) != null) {
                            element.parentNode.removeChild(file.previewElement);
                        } else {
                            false;
                        }
                    }
                }
            });
        }
    });

    //Utilizamos las expresiones regulares para las funciones de  fadeout
    var date_reg = /^(0[1-9]|1[012])[- \/.](0[1-9]|[12][0-9]|3[01])[- \/.](19|20)\d\d$/;
    var precio_ref = /^[0-9]{2,4}$/;
    var viaje_reg = /^([A-Z]{1}[0-9]{1,4})*$/;

    //realizamos funciones para que sea más práctico nuestro formulario
    $("#precio").keyup(function () {
        if ($(this).val() != "" && precio_ref.test($(this).val())) {
            $(".error").fadeOut();
            return false;
        }
    });

    $("#idviaje").keyup(function () {
        if ($(this).val() != "" && viaje_reg.test($(this).val())) {
            $(".error").fadeOut();
            return false;
        }
    });


    $("#f_sal, #f_lleg").keyup(function () {
        if ($(this).val() != "" && date_reg.test($(this).val())) {
            $(".error").fadeOut();
            return false;
        }
    });
});

function validate_user() {
    var result = true;

    var idviaje = document.getElementById('idviaje').value;
    var destino = document.getElementById('destino').value;
    var precio = document.getElementById('precio').value;
    var oferta = document.getElementById('oferta').value;
    var f_sal = document.getElementById('f_sal').value;
    var f_lleg = document.getElementById('f_lleg').value;
    var tipo = [];
    var inputElements = document.getElementsByClassName('messageCheckbox');
    var j = 0;
    for (var i = 0; i < inputElements.length; i++) {
        if (inputElements[i].checked) {
            tipo[j] = inputElements[i].value;
            j++;
        }
    }

    //Utilizamos las expresiones regulares para la validación de errores JS
    var date_reg = /^(0[1-9]|1[012])[- \/.](0[1-9]|[12][0-9]|3[01])[- \/.](19|20)\d\d$/;
    var precio_ref = /^[0-9]{2,4}$/;
    var viaje_reg = /^([A-Z]{1}[0-9]{1,4})*$/;

    $(".error").remove();
    
    if ($("#idviaje").val() == "" || $("#idviaje").val() == "Introduce ID") {
        $("#idviaje").focus().after("<span class='error'>Introduce un ID</span>");
        result = false;
        return false;
    } else if (!viaje_reg.test($("#idviaje").val())) {
        $("#idviaje").focus().after("<span class='error'>*El ID debe tener 1 letra mayus y 3 numeros</span>");
        result = false;
        return false;
    }


    else if ($("#destino").val() == "") {
        $("#destino").focus().after("<span class='error'>Debe seleccionar un destino</span>");
        result = false;
        return false;
    }

    else if ($("#precio").val() == "" || $("#precio").val() == "0") {
        $("#precio").focus().after("<span class='error'>Introduce un precio</span>");
        result = false;
        return false;
    } else if (!precio_ref.test($("#precio").val())) {
        $("#precio").focus().after("<span class='error'>El precio debe estar entre 70 y 4000</span>");
        result = false;
        return false;
    }

    else if ($("#f_sal").val() == "" || $("#f_sal").val() == "Introduce fecha de salida") {
        $("#f_sal").focus().after("<span class='error'>Introduce una fecha de salida</span>");
        result = false;
        return false;
    } else if (!date_reg.test($("#f_sal").val())) {
        $("#f_sal").focus().after("<span class='error'>error en el formato (mm/dd/yyyy)</span>");
        result = false;
        return false;
    }

    else if ($("#f_lleg").val() == "" || $("#f_lleg").val() == "Introduce fecha de llegada") {
        $("#f_lleg").focus().after("<span class='error'>Introduce una fecha de llegada</span>");
        result = false;
        return false;
    } else if (!date_reg.test($("#f_lleg").val())) {
        $("#f_lleg").focus().after("<span class='error'>error en el formato (mm/dd/yyyy)</span>");
        result = false;
        return false;
    }

    //Si ha ido todo bien, se envian los datos al servidor
    if (result) {
        var data = {"idviaje": idviaje, "destino": destino, "precio": precio, "oferta": oferta, "tipo": tipo, "f_sal": f_sal, "f_lleg": f_lleg};
            
        var data_users_JSON = JSON.stringify(data);
        console.log(data_users_JSON);
        $.post('modules/users/controller/controller_users.class.php',
                {alta_users_json: data_users_JSON},
        function (response) {
            console.log("0"+ response);
            if (response.success) {
                window.location.href = response.redirect;
            }
          
            //alert(response);  //para debuguear
            //}); //para debuguear
        //}, "json").fail(function (xhr) {
        
        }, "json").fail(function(xhr, status, error) {
            console.log("1 "+xhr.responseText);
            console.log("2" +xhr.responseJSON);
            
            if (xhr.responseJSON.error.idviaje)
                $("#idviaje").focus().after("<span  class='error1'>" + xhr.responseJSON.error.idviaje + "</span>");

            if (xhr.responseJSON.error.destino)
                $("#destino").focus().after("<span  class='error1'>" + xhr.responseJSON.error.destino + "</span>");

            if (xhr.responseJSON.error.precio)
                $("#precio").focus().after("<span  class='error1'>" + xhr.responseJSON.error.precio + "</span>");

            if (xhr.responseJSON.error.oferta)
                $("#oferta").focus().after("<span  class='error1'>" + xhr.responseJSON.error.oferta + "</span>");

            if (xhr.responseJSON.error.tipo)
                $("#tipo").focus().after("<span  class='error1'>" + xhr.responseJSON.error.tipo + "</span>");

            if (xhr.responseJSON.error.f_sal)
                $("#f_sal").focus().after("<span  class='error1'>" + xhr.responseJSON.error.f_sal + "</span>");

            if (xhr.responseJSON.error.f_lleg)
                $("#f_lleg").focus().after("<span  class='error1'>" + xhr.responseJSON.error.f_lleg + "</span>");

            if (xhr.responseJSON.success1) {
                if (xhr.responseJSON.img_avatar !== "/NiponTour/media/default-avatar.png") {
                    //$("#progress").show();
                    //$("#bar").width('100%');
                    //$("#percent").html('100%');
                    //$('.msg').text('').removeClass('msg_error');
                    //$('.msg').text('Success Upload image!!').addClass('msg_ok').animate({ 'right' : '300px' }, 300);
                }
            } else {
                $("#progress").hide();
                $('.msg').text('').removeClass('msg_ok');
                $('.msg').text('Error Upload image!!').addClass('msg_error').animate({'right': '300px'}, 300);
            }
        });
    }
}
