$(document).ready(function() {
  $formUsuario=$('#formUsuario');
  $formBD = $('#formBD');

  $formUsuario.validate({
    rules:{
      confPassword: {
        equalTo: "#password"
      }
    }
  });

  $formUsuario.find('.next-tab').click( function(e) {
    $('a[aria-controls="tabBD"]').tab('show');
  });

  $formBD.find('.next-tab').click( function(e) {
    $('a[aria-controls="tabTerminar"]').tab('show');
  });

  $('a[aria-controls="tabUsuario"]').on('hide.bs.tab', function(e) {
    if( $formUsuario.valid() ) {

    } else {
      e.preventDefault();
    }
  });

  $('a[aria-controls="tabBD"]').on('hide.bs.tab', function(e) {
    if( $formBD.valid() ) {

    } else {
      e.preventDefault();
    }
  });


  /******INSTALAR*******/
  $('#btnInstalar').click( function(e) {
    //primero configurar los datos de conexión
    var dbData = $formBD.serializeObject();
    ajaxCall('protected/functions/configurarDataConstants.php',dbData, true, function(response) {
      $('#progress-bar').text('10%').width('10%');
      //crear las tablas
      ajaxCall('protected/functions/crearTablaUsuario.php',null, false, function(response) {
        ajaxCall('protected/functions/crearTablaRol.php',null, false, function(response) {
          $('#progress-bar').text('20%').width('20%');
        });
      });

      ajaxCall('protected/functions/crearTablaModulo.php',null, false, function(response) {
        ajaxCall('protected/functions/crearTablaVista.php',null, false, function(response) {
          ajaxCall('protected/functions/crearTablaSubVista.php',null, false, function(response) {
            $('#progress-bar').text('30%').width('30%');
          });
        });
      });

      ajaxCall('protected/functions/crearTablaPermiso.php',null, false, function(response) {
        $('#progress-bar').text('40%').width('40%');
      });

      ajaxCall('protected/functions/crearTablaRolUsuario.php',null, false, function(response) {
        ajaxCall('protected/functions/crearTablaRolVista.php',null, false, function(response) {
          ajaxCall('protected/functions/crearTablaRolSubVista.php',null, false, function(response) {
            ajaxCall('protected/functions/crearTablaRolPermiso.php',null, false, function(response) {
              $('#progress-bar').text('50%').width('50%');
            });
          });
        });
      });

      ajaxCall('protected/functions/crearTablaVistaSubVista.php',null, false, function(response) {
        $('#progress-bar').text('60%').width('60%');
      });

      ajaxCall('protected/functions/crearTablaBitacoraModeloBasico.php',null, false, function(response) {
        $('#progress-bar').text('70%').width('70%');
      });

      //agregar usuarios
      usuarioData = $formUsuario.serializeObject();
      ajaxCall('protected/functions/agregarUsuarioAdministrador.php',usuarioData, false, function(response) {
        $('#progress-bar').text('80%').width('80%');
      });

      //cambiar configuración de basicConfig.json
      ajaxCall('protected/functions/setInstalled.php',null, false, function(response) {
        $('#progress-bar').text('90%').width('90%');
      });

      $('#progress-bar').text('100%').width('100%');

      location.reload();
    });
  });


  var ajaxCall = function(url, param, async, callback) {
    $.ajax({
      url: url,
      type: 'POST',
      async: async,
      dataType: 'json',
      data: param,
      success: function(response) {
        callback(response);
      }
    })
    .done(function() {
      console.log("success "+url);
    })
    .fail(function() {
      console.log("error");
    })
    .always(function() {
      console.log("complete");
    });
    
  }
});//fin ready