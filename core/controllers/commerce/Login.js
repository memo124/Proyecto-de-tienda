// Constante que establece la ruta y parámetros para comunicarse con la API.
const API_LOGIN = '../../core/api/commerce/Registrarse.php?action=';

// Método que se ejecuta cuando el documento está listo.
$( document ).ready(function() {
    $( '.tabs' ).tabs();
});

// Evento que sirve para registrar un cliente del sitio público.
$( '#Iniciar_Sesion' ).submit(function( event ) {
    event.preventDefault();
    $.ajax({
        type: 'post',
        url: API_LOGIN + 'login',
        data: $( '#Iniciar_Sesion' ).serialize(),
        dataType: 'json'
    })
    .done(function( response ) {
        // Evaluación de si la API respondio correctamente, sino se muestra un mensaje de error.
        if ( response.status ) {
            //Responde con un mensaje y te manda a la página correspondiente
            sweetAlert( 1, response.message, 'Index2.php' );
        } else {
            //Responde con un mensaje de error
            sweetAlert( 2, response.exception, null );
        }
    })
    .fail(function( jqXHR ) {
        // Verificación de si la API respondio para dar la respuesta, sino se muestra el estado de la petición.
        if ( jqXHR.status == 200 ) {
            console.log( jqXHR.responseText );
        } else {
            console.log( jqXHR.status + ' ' + jqXHR.statusText );
        }
    });
});