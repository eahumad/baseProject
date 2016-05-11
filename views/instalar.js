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
});//fin ready