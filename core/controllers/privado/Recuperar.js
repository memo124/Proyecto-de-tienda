// Constante para establecer la ruta y parámetros de comunicación con la API.
const API_USUARIOS = '../../core/api/privado/usuarios.php?action=';

var Paso1 = document.getElementById('divpaso1'),
    Paso2 = document.getElementById('divpaso2'),
    Paso3 = document.getElementById('divpaso3');

// Evento para validar el usuario al momento de iniciar sesión.
$( '#Paso1' ).submit(function( event ) {
  // Se evita recargar la página web después de enviar el formulario.
  event.preventDefault();
  $.ajax({
      type: 'post',
      url: API_USUARIOS + 'primerpaso',
      data: $( '#Paso1' ).serialize(),
      dataType: 'json'
  })
  .done(function( response ) {
      // Se comprueba si la API ha retornado una respuesta satisfactoria, de lo contrario se muestra un mensaje de error.
      if ( response.status ) {
          Paso1.style.display = 'none';
          Paso2.style.display = 'inline-block';
          sweetAlert( 1, response.message, null );
      } else {
          sweetAlert( 2, response.exception, null );
      }
  })
  .fail(function( jqXHR ) {
      // Se verifica si la API ha respondido para mostrar la respuesta, de lo contrario se presenta el estado de la petición.
      if ( jqXHR.status == 200 ) {
          console.log( jqXHR.responseText );
      } else {
          console.log( jqXHR.status + ' ' + jqXHR.statusText );
      }
  });
});

// Evento para validar el usuario al momento de iniciar sesión.
$( '#Paso2' ).submit(function( event ) {
    // Se evita recargar la página web después de enviar el formulario.
    event.preventDefault();
    $.ajax({
        type: 'post',
        url: API_USUARIOS + 'segundopaso',
        data: $( '#Paso2' ).serialize(),
        dataType: 'json'
    })
    .done(function( response ) {
        // Se comprueba si la API ha retornado una respuesta satisfactoria, de lo contrario se muestra un mensaje de error.
        if ( response.status ) {
            Paso2.style.display = 'none';
            Paso3.style.display = 'inline-block';
            sweetAlert( 1, response.message, null );
        } else {
            sweetAlert( 2, response.exception, null );
        }
    })
    .fail(function( jqXHR ) {
        // Se verifica si la API ha respondido para mostrar la respuesta, de lo contrario se presenta el estado de la petición.
        if ( jqXHR.status == 200 ) {
            console.log( jqXHR.responseText );
        } else {
            console.log( jqXHR.status + ' ' + jqXHR.statusText );
        }
    });
  });