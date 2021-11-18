// Constante para entablar comunicación con la API
const API_RESENAU = '../../core/api/commerce/resenaU.php?action=';

// Método que se ejecuta cuando el documento está listo.
$( document ).ready(function() {
    /*Se llama a la función que obtiene los productos comprados de un cliente*/
    readCrearResena();
});

//Función que obtiene los productos comprados de un cliente.
function readCrearResena()
{
    $.ajax({
        dataType: 'json',
        url: API_RESENAU + 'readResena'
    })
    .done(function( response ) {
        //Se evalua si la API respondio como se esperaba, sino se muestra un mensaje de error
        if ( response.status ) {
        /*se declara una variable que almacenara lo que se imprimira en el documento HTML cuando se
        recorran los registros.*/
            let content = '';
            //Se recorren los registros mediante forEach y el objeto row
            response.dataset.forEach(function( row ) {
                //Se crean las cajas con la información de cada producto comprado
                    content += `
                    <!--Caja que contiene los elementos que muestran los detalles de la compra-->
                    <div class="row elemento_marca1">
                        <div class="col l6 m6 s12 DIV_VR_IMG">
                            <img src="../../resources/img/cards/${row.imagen}" class="materialboxed center-align z-depth-3 Img1">
                        </div>
                        <div class="col l6 m6 s12 contenedor_info_marca1">
                            <h5>Detalles del producto</h5>
                            <hr>
                            <p class="info_marca1"><i>Nombre: ${row.nombre_producto}</i></p>
                            <p class="info_marca1"><i>Marca: ${row.marcas}</i></p>
                            <p class="info_marca1"><i>Tipo: ${row.tipo_producto}</i></p>
                            <p class="info_marca1"><i>Fecha de compra: ${row.fecha_factura}</i></p>
                            <a onclick="openCreateDialog(${row.id_detalle_factura})" class="btn-medium waves-effect waves-light red btn">Calificar</a>
                            <p class="info_producto1"></p>
                        </div>
                    </div>
                `;
            });
            //se agrega la variable que imprimira las cajas al contenedor respectivo
            $( '.CajaScrollCRESENAS' ).html( content );
        } else {
            sweetAlert( 4, response.exception, 'index2.php' );
        }
    })
    .fail(function( jqXHR ) {
        //Se evalua si la API respondió para mostrar una respuesta, y si no respondio, mostrara un mensaje, ambos por consola
        if ( jqXHR.status == 200 ) {
            console.log( jqXHR.responseText );
        } else {
            console.log( jqXHR.status + ' ' + jqXHR.statusText );
        }
    });
}

/* Función que abre la ventana modal que contiene el formulario para dar los detalles de la reseña*/
function openCreateDialog( id_detalle_factura )
{
    //Se eliminan los valores de cada campo del formulario
    $( '#Form_resena' )[0].reset();
    //Se abre la caja que contiene el formulario de dar detalles de la reseña
    $( '#save-modal' ).modal( 'open' );
    //Se coloca el titulo a la ventana modal
    $( '#modal-title' ).text( 'Agregar un comentario y calificacion' );
    //Se le retorna el id del detalle de la factura a el campo id_resena
    $( '#id_resena' ).val( id_detalle_factura );
}

// Evento que sirve para añadir una reseña hecha a algun producto ya comprado
$( '#Form_resena' ).submit(function( event ) {
    //Acá se elimina recargar la página despues de enviar el formulario de dar detalles de reseña
	event.preventDefault();
	//Acá se crea la consulta ajax para enviar los datos a la API, dando algunos detalles de la misma consulta
    $.ajax({
        type: 'post',
        url: API_RESENAU + 'createResena',
        data: $( '#Form_resena' ).serialize(),
        dataType: 'json'
    })
    .done(function( response ) {
        // se evalua si la API respondio como se esperaba, sino se muestra un mensaje de error
        if ( response.status ) {
            // se ejecuta el metodo que lee los productos comprados para dar reseña
            readCrearResena();
            // Se cierra la ventana modal del formulario de dar detalles de una reseña
            $( '#save-modal' ).modal( 'close' );
            sweetAlert( 1, response.message, null );
        } else {
            sweetAlert( 2, response.exception, null );
        }
    })
    .fail(function( jqXHR ) {
        // se evalua si la API respondio para mostrar la respuesta, sino se muestra el mensaje de error por consola
        if ( jqXHR.status == 200 ) {
            console.log( jqXHR.responseText );
        } else {
            console.log( jqXHR.status + ' ' + jqXHR.statusText );
        }
    });
})

