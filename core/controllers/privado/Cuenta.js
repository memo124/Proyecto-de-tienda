// Constante para establecer la ruta y parámetros de comunicación con la API.
const API_USUARIOS = '../../core/api/privado/usuarios.php?action=';


/*Variable que cuenta los minutos transcurridos*/
contador_minutos = 0;

/*Función que se ejecuta cuando el documento cargo completamente*/
$(document).ready(function() {
    /*Se ejecuta la función de incrementar tiempo cada minuto*/
    var intervalo_tiempo = setInterval("incrementarTiempo()", 60000);

    /*Si se movio el mouse, la variable de minutos será igual a 0*/
    $(this).mousemove(function(e) {
        contador_minutos = 0;
    });
    /*Si se presiono alguna tecla, la variable de minutos será igual a 0*/
    $(this).keypress(function(e) {
        contador_minutos = 0;
    });
});

/*Función que incrementa la variable que cuenta los minutos de inactividad*/
function incrementarTiempo() {
    contador_minutos = contador_minutos + 1;
    /*Si la cantidad de minutos sin actividad es igual o mayor a 5 se abrira la siguente página*/
    if (contador_minutos >= 5) {
        window.open('/Sitioweb/Sitioweb/core/helpers/desconectar.php','_top');
    }
}

// Evento para cambiar la contraseña del usuario que ha iniciado sesión.
$( '#Editar_Contraseña' ).submit(function( event ) {
    // Se evita recargar la página web después de enviar el formulario.
    event.preventDefault();
    $.ajax({
        type: 'post',
        url: API_USUARIOS + 'password',
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

// Función que abre una caja de dialogo para confirmar el cierre de la sesión del usuario. Requiere el archivo sweetalert.min.js para funcionar.
function signOff()
{
    swal({
        title: 'Advertencia',
        text: '¿Quiere cerrar la sesión?',
        icon: 'warning',
        buttons: [ 'No', 'Sí' ],
        closeOnClickOutside: false,
        closeOnEsc: false
    })
    .then(function( value ) {
        // Se verifica si fue cliqueado el botón Sí para hacer la petición de cerrar sesión, de lo contrario se continua con la sesión actual.
        if ( value ) {
            $.ajax({
                dataType: 'json',
                url: API_USUARIOS + 'logout'
            })
            .done(function( response ) {
                // Se comprueba si la API ha retornado una respuesta satisfactoria, de lo contrario se muestra un mensaje de error.
                if ( response.status ) {
                    sweetAlert( 1, response.message, 'Index.php' );
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
        } else {
            sweetAlert( 4, 'Puede continuar con la sesión', null );
        }
    });
}