// Constante que establece la ruta y parámetros para comunicarse con la API.
const API_REGISTRARSE = '../../core/api/commerce/Registrarse.php?action=';

// Método que se ejecuta cuando el documento está listo.
$( document ).ready(function() {
    $( '.tabs' ).tabs();
    grecaptcha.ready(function() {
        // Se declara e inicializa una variable para guardar la llave pública del reCAPTCHA.
        let publicKey = '6LdBzLQUAAAAAJvH-aCUUJgliLOjLcmrHN06RFXT';
        // Se obtiene un token para la página web mediante la llave pública.
        grecaptcha.execute( publicKey, { action: 'homepage' } )
        .then(function( token ) {
            // Se asigna el valor del token al campo oculto del formulario
            $( '#g-recaptcha-response' ).val( token );
        });
    });
});

// Evento que sirve para registrar un cliente del sitio público.
$( '#Registrarse' ).submit(function( event ) {
    event.preventDefault();
    $.ajax({
        type: 'post',
        url: API_REGISTRARSE + 'register',
        data: $( '#Registrarse' ).serialize(),
        dataType: 'json'
    })
    .done(function( response ) {
        // Verificación si la API ha retornado una respuesta exitos, sino se muestra un mensaje de error.
        if ( response.status ) {
            sweetAlert( 1, response.message, 'Login.php' );
        } else {
            sweetAlert( 2, response.exception, null );
        }
    })
    .fail(function( jqXHR ) {
        // Veficicación si la API ha respondido exitosamente para mostrar la respuesta, sino se presenta el estado de la petición.
        if ( jqXHR.status == 200 ) {
            console.log( jqXHR.responseText );
        } else {
            console.log( jqXHR.status + ' ' + jqXHR.statusText );
        }
    });
});
