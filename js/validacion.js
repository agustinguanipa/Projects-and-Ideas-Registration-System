/* usuario_registro */

$( document ).ready( function () {
  $( "#usuario_registro" ).validate( {
    rules: {
      tipce_usua: {
        required: true
      },
      cedul_usua: {
        required: true,
        minlength: 6,
        remote: {
          url: "../administrador/usuario_cedula_availability.php",
          type: "post",
          data:
            {
              cedul_usua: function()
              {
                return $('#usuario_registro :input[name="cedul_usua"]').val();
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
          url: "../administrador/usuario_usuario_availability.php",
          type: "post",
          data:
            {
              usuar_usua: function()
              {
                return $('#usuario_registro :input[name="usuar_usua"]').val();
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
    }
  } );

} );

/* usuario_inicio */

$( document ).ready( function () {
  $( "#usuario_inicio" ).validate( {
    rules: {
      usuar_usua: {
        required: true,
        minlength: 2
      },
      contr_usua: {
        required: true,
        minlength: 5
      }
    },

    messages: {
      usuar_usua: {
        required: "Ingrese un Nombre de Usuario",
        minlength: "Tu Nombre de Usuario debe contener al menos 2 caracteres"
      },
      contr_usua: {
        required: "Ingrese una Contraseña",
        minlength: "Tu Contraseña debe contener al menos 5 caracteres"
      }
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
    }
  } );

} );

/* usuario_modificar */

$( document ).ready( function () {
  $( "#usuario_modificar" ).validate( {
    rules: {
      nombr_usua: {
        required: true,
        lettersonly: true,
        minlength: 2
      },
      nomb2_usua: {
        lettersonly: true,
        minlength: 2
      },
      apeli_usua: {
        required: true,
        lettersonly: true,
        minlength: 2
      },
      apel2_usua: {
        lettersonly: true,
        minlength: 2
      },
      usuar_usua: {
        required: true,
        minlength: 2
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
    },

    messages: {
      nombr_usua: {
        required: "Ingrese su Primer Nombre",
        lettersonly: "Tu Nombre solo debe contener letras sin espacios",
        minlength: "Tu Nombre debe contener al menos 2 caracteres"
      },
      nomb2_usua: {
        lettersonly: "Tu Nombre solo debe contener letras sin espacios",
        minlength: "Tu Nombre debe contener al menos 2 caracteres"
      },
      apeli_usua: {
        required: "Ingrese su Primer Apellido",
        lettersonly: "Tu Apellido solo debe contener letras sin espacios",
        minlength: "Tu Apellido debe contener al menos 2 caracteres"
      },
      apel2_usua: {
        lettersonly: "Tu Apellido solo debe contener letras sin espacio",
        minlength: "Tu Apellido debe contener al menos 2 caracteres"
      },
      usuar_usua: {
        required: "Ingrese un Nombre de Usuario",
        minlength: "Tu Nombre de Usuario debe contener al menos 2 caracteres"
      },
      telef_usua: {
        required: "Ingrese un Número de Teléfono Valido",
        number: "Ingrese un Número de Teléfono Valido",
        minlength: "Ingrese un Número de Teléfono Valido"
      },
      email_usua: "Ingrese una Dirección de Correo Electrónico Válida"
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
    }
  } );

} );

jQuery.validator.addMethod("lettersonly", function(value, element) {
  return this.optional(element) || /^[A-Z^\s]+$/i.test(value);
}, "Letters only please"); 

/* Masks */

$('.telef-mask').mask('(0000) 000 0000');
$('.pesoo-mask').mask('000000000000000.00 KG', {reverse: true});
$('.preci-mask').mask('000000000000000.00', {reverse: true});
$('.taman-mask').mask('###.00 x ###.00 x ###.00', {reverse: false});

