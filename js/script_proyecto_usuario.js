$(function() {
	load(1);
});

function load(page){
	var query=$("#q").val();
	var per_page=10;
	var parametros = {"action":"ajax","page":page,'query':query,'per_page':per_page};
	$("#loader").fadeIn('slow');
	$.ajax({
		url:'../../ajax/proyecto/listar_proyectos_usuario.php',
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

$( "#add_proyecto_usuario" ).validate( {

    rules: {
      nombr_proy: {
        required: true,
        minlength: 8
      },
      desco_proy: {
        required: true,
        minlength: 8
      },
      descr_proy: {
        required: true,
        minlength: 20
      },
      areaa_proy: {
        required: true
      },
      motor_proy: {
        required: true
      },
    },

    messages: {
      nombr_proy: {
        required: "Ingrese el Nombre",
        minlength: "El Nombre debe contener al menos 8 caracteres"
      },
      desco_proy: {
        required: "Ingrese una Descripción Breve",
        minlength: "Tu Apellido debe contener al menos 8 caracteres"
      },
      descr_proy: {
        required: "Ingrese una Descripción",
        minlength: "Tu Apellido debe contener al menos 20 caracteres"
      },
      areaa_proy: {
        required: "Seleccione una Opción"
      },
      motor_proy: {
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
      url: "../../ajax/proyecto/guardar_proyecto_usuario.php",
      data: formData,
      contentType: false,
      processData: false,
       beforeSend: function(objeto){
        $("#resultados").html("Enviando...");
        },
      success: function(datos){
      $("#resultados").html(datos);
      load(1);
      $('#addProyectoUsuarioModal').modal('hide');
      }           
    });
  }
});

$('#addProyectoUsuarioModal').on('hidden.bs.modal', function(e) {
  $(this).find('#add_proyecto_usuario')[0].reset();
  $(this).find('.is-valid').removeClass('is-valid');
});

/* Edit */

$('#editProyectoUsuarioModal').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget) // Button that triggered the modal
  var nombr_proy = button.data('nombr_proy') 
  $('#edit_nombr_proy').val(nombr_proy)
  var desco_proy = button.data('desco_proy') 
  $('#edit_desco_proy').val(desco_proy)
  var descr_proy = button.data('descr_proy') 
  $('#edit_descr_proy').val(descr_proy)
  var areaa_proy = button.data('areaa_proy') 
  $('#edit_areaa_proy').val(areaa_proy)
  var motor_proy = button.data('motor_proy') 
  $('#edit_motor_proy').val(motor_proy)
  var ident_usua = button.data('ident_usua') 
  $('#edit_ident_usua').val(ident_usua)
  var ident_proy = button.data('ident_proy') 
  $('#edit_id').val(ident_proy)
})

$( "#edit_proyecto_usuario" ).validate( {

    rules: {
      edit_nombr_proy: {
        required: true,
        minlength: 8
      },
      edit_desco_proy: {
        required: true,
        minlength: 8
      },
      edit_descr_proy: {
        required: true,
        minlength: 20
      },
      edit_areaa_proy: {
        required: true
      },
      edit_motor_proy: {
        required: true
      },
    },

    messages: {
      edit_nombr_proy: {
        required: "Ingrese el Nombre",
        minlength: "El Nombre debe contener al menos 8 caracteres"
      },
      edit_desco_proy: {
        required: "Ingrese una Descripción Breve",
        minlength: "Tu Apellido debe contener al menos 8 caracteres"
      },
      edit_descr_proy: {
        required: "Ingrese una Descripción",
        minlength: "Tu Apellido debe contener al menos 20 caracteres"
      },
      edit_areaa_proy: {
        required: "Seleccione una Opción"
      },
      edit_motor_proy: {
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

    var parametros = $( form ).serialize(); // I change 'this' to form
    console.log(parametros); // for test purpose. See your log to confirm the result data

    $.ajax({
      type: "POST",
      url: "../../ajax/proyecto/editar_proyecto_usuario.php",
      data: parametros,
       beforeSend: function(objeto){
        $("#resultados").html("Enviando...");
        },
      success: function(datos){
      $("#resultados").html(datos);
      load(1);
      $('#editProyectoUsuarioModal').modal('hide');
      }                     
    });
  }
});

$('#editProyectoUsuarioModal').on('hidden.bs.modal', function(e) {
  $(this).find('#edit_proyecto_usuario')[0].reset();
  $(this).find('.is-valid').removeClass('is-valid');
});


/* Delete */

$('#deleteProyectoUsuarioModal').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget) // Button that triggered the modal
  var ident_proy = button.data('ident_proy') 
  $('#delete_id').val(ident_proy)
})

$( "#delete_proyecto_usuario" ).submit(function( event ) {
  var parametros = $(this).serialize();
  $.ajax({
      type: "POST",
      url: "../../ajax/proyecto/eliminar_proyecto_usuario.php",
      data: parametros,
       beforeSend: function(objeto){
        $("#resultados").html("Enviando...");
        },
      success: function(datos){
      $("#resultados").html(datos);
      load(1);
      $('#deleteProyectoUsuarioModal').modal('hide');
      }
  });
  event.preventDefault();
});







