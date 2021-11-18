// Constante para establecer la ruta y parámetros de comunicación con la API.
const API_CLIENTES = '../../core/api/commerce/Registrarse.php?action=';

// Evento para cambiar la contraseña del usuario que ha iniciado sesión.
$( '#Editar_Contraseña' ).submit(function( event ) {
    // Se evita recargar la página web después de enviar el formulario.
    event.preventDefault();
    $.ajax({
        type: 'post',
        url: API_CLIENTES + 'password',
        data: $( '#Editar_Contraseña' ).serialize(),
        dataType: 'json'
    })
    .done(function( response ) {
        // Se comprueba si la API ha retornado una respuesta satisfactoria, de lo contrario se muestra un mensaje de error.
        if ( response.status ) {
            // Se limpian los campos del formulario.
            $( '#Editar_Contraseña' )[0].reset();
            // Se cierra la caja de dialogo (modal) que contiene el formulario para cambiar contraseña, ubicado en el archivo de las plantillas.
            $( '#CambiarContraseña' ).modal( 'close' );
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