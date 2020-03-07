$(function() {
	load(1);
});

function load(page){
	var query=$("#q").val();
	var per_page=10;
	var parametros = {"action":"ajax","page":page,'query':query,'per_page':per_page};
	$("#loader").fadeIn('slow');
	$.ajax({
		url:'../../ajax/administrador/listar_admins.php',
		data: parametros,
		 beforeSend: function(objeto){
		$("#loader").html("Cargando...");
	  },
		success:function(data){
			$(".outer_div").html(data).fadeIn('slow');
			$("#loader").html("");
		}
	})
}

/* Add */

$( "#add_admin" ).validate( {

    rules: {
      tipce_usua: {
        required: true
      },
      cedul_usua: {
        required: true,
        minlength: 6,
        remote: {
          url: "../../paginas/administrador/usuario_cedula_availability.php",
          type: "post",
          data:
            {
              cedul_usua: function()
              {
                return $('#add_admin :input[name="cedul_usua"]').val();
              }
            }
        }     
      },
      nombr_usua: {
        required: true,
        lettersonly: true,
        minlength: 2
      },
      apeli_usua: {
        required: true,
        lettersonly: true,
        minlength: 2
      },
      gener_usua: {
        required: true
      },
      civil_usua: {
        required: true
      },
      nivel_usua: {
        required: true
      },
      telef_usua: {
        required: true,
        number: false,
        minlength: 15
      },
      email_usua: {
        required: true,
        email: true
      },
      estad_usua: {
        required: true
      },
      munic_usua: {
        required: true
      },
      direc_usua: {
        required: true,
        minlength: 10
      },
      usuar_usua: {
        required: true,
        minlength: 2,
        remote: {
          url: "../../paginas/administrador/usuario_usuario_availability.php",
          type: "post",
          data:
            {
              usuar_usua: function()
              {
                return $('#add_admin :input[name="usuar_usua"]').val();
              }
            }
        }     
      },
      contr_usua: {
        required: true,
        minlength: 5
      },
      confirm_password: {
        required: true,
        minlength: 5,
        equalTo: "#contr_usua"
      },
      ident_tipo: {
        required: true
      },
    },

    messages: {
      tipce_usua: {
        required: "Seleccione una Opción"
      },
      cedul_usua: {
        required: "Ingrese una Cédula de Identidad",
        minlength: "Tu Cédula de Identidad debe contener al menos 6 caracteres",
        remote: jQuery.validator.format("{0} ya está registrado")
      },
      nombr_usua: {
        required: "Ingrese su Nombre",
        lettersonly: "Tu Nombre solo debe contener letras sin espacios",
        minlength: "Tu Nombre debe contener al menos 2 caracteres"
      },
      apeli_usua: {
        required: "Ingrese su Apellido",
        lettersonly: "Tu Apellido solo debe contener letras sin espacios",
        minlength: "Tu Apellido debe contener al menos 2 caracteres"
      },
      gener_usua: {
        required: "Seleccione una Opción"
      },
      civil_usua: {
        required: "Seleccione una Opción"
      },
      nivel_usua: {
        required: "Seleccione una Opción"
      },
      telef_usua: {
        required: "Seleccione una Opción"
      },
      telef_usua: {
        required: "Ingrese un Número de Teléfono Valido",
        number: "Ingrese un Número de Teléfono Valido",
        minlength: "Ingrese un Número de Teléfono Valido"
      },
      email_usua: {
        required: "Ingrese una Dirección de Correo Electrónico Válida",
        email: "Ingrese una Dirección de Correo Electrónico Válida"
      },
      estad_usua: {
        required: "Seleccione una Opción"
      },
      munic_usua: {
        required: "Seleccione una Opción"
      },
      direc_usua: {
        required: "Ingrese su Dirección",
        minlength: "Tu Dirección debe contener al menos 10 caracteres"
      },
      usuar_usua: {
        required: "Ingrese un Nombre de Usuario",
        minlength: "Tu Nombre de Usuario debe contener al menos 2 caracteres",
        remote: jQuery.validator.format("{0} no esta disponible")
      },
      contr_usua: {
        required: "Ingrese una Contraseña",
        minlength: "Tu Contraseña debe contener al menos 5 caracteres"
      },
      confirm_password: {
        required: "Ingrese una Contraseña",
        minlength: "Tu Contraseña debe contener al menos 5 caracteres",
        equalTo: "Ingrese la Misma Contraseña"
      },
      ident_tipo: {
        required: "Seleccione una Opción"
      },
    },

    errorElement: "em",
    errorPlacement: function ( error, element ) {
      // Add the `invalid-feedback` class to the error element
      error.addClass( "invalid-feedback" );

      if ( element.prop( "type" ) === "checkbox" ) {
        error.insertAfter( element.next( "label" ) );
      } else {
        error.insertAfter( element );
      }
    },
    highlight: function ( element, errorClass, validClass ) {
      $( element ).addClass( "is-invalid" ).removeClass( "is-valid" );
    },
    unhighlight: function (element, errorClass, validClass) {
      $( element ).addClass( "is-valid" ).removeClass( "is-invalid" );
    },

    submitHandler: function( form ) {

    var form = $('form')[0]; // You need to use standard javascript object here
    var formData = new FormData(form); // I change 'this' to form
    console.log(formData); // for test purpose. See your log to confirm the result data

    $.ajax({
      type: "POST",
      url: "../../ajax/administrador/guardar_admin.php",
      data: formData,
      contentType: false,
      processData: false,
       beforeSend: function(objeto){
        $("#resultados").html("Enviando...");
        },
      success: function(datos){
      $("#resultados").html(datos);
      load(1);
      $('#addAdminModal').modal('hide');
      }           
    });
  }
});

$('#addAdminModal').on('hidden.bs.modal', function(e) {
  $(this).find('#add_admin')[0].reset();
  $(this).find('.is-valid').removeClass('is-valid');
});

/* Edit */

$('#editAdminModal').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget) // Button that triggered the modal
  var nombr_usua = button.data('nombr_usua') 
  $('#edit_nombr_usua').val(nombr_usua)
  var apeli_usua = button.data('apeli_usua') 
  $('#edit_apeli_usua').val(apeli_usua)
  var gener_usua = button.data('gener_usua') 
  $('#edit_gener_usua').val(gener_usua)
  var civil_usua = button.data('civil_usua') 
  $('#edit_civil_usua').val(civil_usua)
  var nivel_usua = button.data('nivel_usua') 
  $('#edit_nivel_usua').val(nivel_usua)
  var telef_usua = button.data('telef_usua') 
  $('#edit_telef_usua').val(telef_usua)
  var email_usua = button.data('email_usua') 
  $('#edit_email_usua').val(email_usua)
  var image_usua = button.data('image_usua') 
  $('#edit_image_usua').val(image_usua)
  var estad_usua = button.data('estad_usua') 
  $('#edit_estad_usua').val(estad_usua)
  var munic_usua = button.data('munic_usua') 
  $('#edit_munic_usua').val(munic_usua)
  var direc_usua = button.data('direc_usua') 
  $('#edit_direc_usua').val(direc_usua)
  var ident_usua = button.data('ident_usua') 
  $('#edit_id').val(ident_usua)
})

$( "#edit_admin" ).validate( {

    rules: {
      edit_nombr_usua: {
        required: true,
        lettersonly: true,
        minlength: 2
      },
      edit_apeli_usua: {
        required: true,
        lettersonly: true,
        minlength: 2
      },
      edit_gener_usua: {
        required: true
      },
      edit_civil_usua: {
        required: true
      },
      edit_nivel_usua: {
        required: true
      },
      edit_telef_usua: {
        required: true,
        number: false,
        minlength: 15
      },
      edit_email_usua: {
        required: true,
        email: true
      },
      edit_estad_usua: {
        required: true
      },
      edit_munic_usua: {
        required: true
      },
      edit_direc_usua: {
        required: true,
        minlength: 10
      },
    },

    messages: {
      edit_nombr_usua: {
        required: "Ingrese su Nombre",
        lettersonly: "Tu Nombre solo debe contener letras sin espacios",
        minlength: "Tu Nombre debe contener al menos 2 caracteres"
      },
      edit_apeli_usua: {
        required: "Ingrese su Apellido",
        lettersonly: "Tu Apellido solo debe contener letras sin espacios",
        minlength: "Tu Apellido debe contener al menos 2 caracteres"
      },
      edit_gener_usua: {
        required: "Seleccione una Opción"
      },
      edit_civil_usua: {
        required: "Seleccione una Opción"
      },
      edit_nivel_usua: {
        required: "Seleccione una Opción"
      },
      edit_telef_usua: {
        required: "Seleccione una Opción"
      },
      edit_telef_usua: {
        required: "Ingrese un Número de Teléfono Valido",
        number: "Ingrese un Número de Teléfono Valido",
        minlength: "Ingrese un Número de Teléfono Valido"
      },
      edit_email_usua: {
        required: "Ingrese una Dirección de Correo Electrónico Válida",
        email: "Ingrese una Dirección de Correo Electrónico Válida"
      },
      edit_estad_usua: {
        required: "Seleccione una Opción"
      },
      edit_munic_usua: {
        required: "Seleccione una Opción"
      },
      edit_direc_usua: {
        required: "Ingrese su Dirección",
        minlength: "Tu Dirección debe contener al menos 10 caracteres"
      },
    },

    errorElement: "em",
    errorPlacement: function ( error, element ) {
      // Add the `invalid-feedback` class to the error element
      error.addClass( "invalid-feedback" );

      if ( element.prop( "type" ) === "checkbox" ) {
        error.insertAfter( element.next( "label" ) );
      } else {
        error.insertAfter( element );
      }
    },
    highlight: function ( element, errorClass, validClass ) {
      $( element ).addClass( "is-invalid" ).removeClass( "is-valid" );
    },
    unhighlight: function (element, errorClass, validClass) {
      $( element ).addClass( "is-valid" ).removeClass( "is-invalid" );
    },

    submitHandler: function( form ) {

    var parametros = $( form ).serialize(); // I change 'this' to form
    console.log(parametros); // for test purpose. See your log to confirm the result data

    $.ajax({
      type: "POST",
      url: "../../ajax/administrador/editar_admin.php",
      data: parametros,
       beforeSend: function(objeto){
        $("#resultados").html("Enviando...");
        },
      success: function(datos){
      $("#resultados").html(datos);
      load(1);
      $('#editAdminModal').modal('hide');
      }                     
    });
  }
});

$('#editAdminModal').on('hidden.bs.modal', function(e) {
  $(this).find('#edit_admin')[0].reset();
  $(this).find('.is-valid').removeClass('is-valid');
});


/* Delete */

$('#deleteAdminModal').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget) // Button that triggered the modal
  var ident_usua = button.data('ident_usua') 
  $('#delete_id').val(ident_usua)
})

$( "#delete_admin" ).submit(function( event ) {
  var parametros = $(this).serialize();
  $.ajax({
      type: "POST",
      url: "../../ajax/administrador/eliminar_admin.php",
      data: parametros,
       beforeSend: function(objeto){
        $("#resultados").html("Enviando...");
        },
      success: function(datos){
      $("#resultados").html(datos);
      load(1);
      $('#deleteAdminModal').modal('hide');
      }
  });
  event.preventDefault();
});

/* Masks */

$('.telef-mask').mask('(0000) 000 0000');







