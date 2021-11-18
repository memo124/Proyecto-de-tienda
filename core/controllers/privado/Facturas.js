
// Constantes para establecer las rutas y parámetros de comunicación con la API.
const API_FACTURAS = '../../core/api/privado/Facturas.php?action=';
const API_CLIENTES = '../../core/api/privado/Clientes.php?action=readAll';

// Método que se ejecuta cuando el documento está listo.
$( document ).ready(function() {
    // Se llama a la función que obtiene los registros para llenar la tabla. Se encuentra en el archivo components.js
    readRows( API_FACTURAS );
});

// Función para llenar la tabla con los datos enviados por readRows().
function fillTable( dataset )
{
    let content = '';
    // Se recorre el conjunto de registros (dataset) fila por fila a través del objeto row.
    dataset.forEach(function( row ) {
        // Se crean y concatenan las filas de la tabla con los datos de cada registro.
      if  ( row.id_factura_cliente %2==0) {
        content += `
            <tr style="background: rgba(0, 0, 0, .6); color: white;">
                <td>${row.id_factura_cliente}</td>
                <td>${row.nombre_cliente}</td>
                <td>${row.total_factura}</td>
                <td>${row.fecha_factura}</td>
                <td>${row.tipo_pago}</td>
                <td>${row.direccion}</td>
                <td>
                    <a href="#" onclick="openUpdateModal(${row.id_factura_cliente})" class="z-depth-3 btn-floating btn-medium waves-effect waves-light cyan blue-text tooltipped" data-tooltip="Editar"><i class="material-icons">mode_edit</i></a>
                    <a href="#" onclick="openDeleteDialog(${row.id_factura_cliente})" class="z-depth-3 btn-floating btn-medium waves-effect waves-light red red-text tooltipped" data-tooltip="Eliminar"><i class="material-icons">delete</i></a>
                    <a href="#" onclick="openPedidos(${row.id_factura_cliente})" class="z-depth-3 btn-floating btn-medium waves-effect waves-light cyan blue-text tooltipped" data-tooltip="Ver detalle"><i class="material-icons">assignment</i></a>
                </td>
            </tr>
        `;
      } else {
        content += `
            <tr style="background: white; color: black;">
                <td>${row.id_factura_cliente}</td>
                <td>${row.nombre_cliente}</td>
                <td>${row.total_factura}</td>
                <td>${row.fecha_factura}</td>
                <td>${row.tipo_pago}</td>
                <td>${row.direccion}</td>
                <td>
                    <a href="#" onclick="openUpdateModal(${row.id_factura_cliente})" class="z-depth-3 btn-floating btn-medium waves-effect waves-light cyan blue-text tooltipped" data-tooltip="Editar"><i class="material-icons">mode_edit</i></a>
                    <a href="#" onclick="openDeleteDialog(${row.id_factura_cliente})" class="z-depth-3 btn-floating btn-medium waves-effect waves-light red red-text tooltipped" data-tooltip="Eliminar"><i class="material-icons">delete</i></a>
                    <a href="#" onclick="openPedidos(${row.id_factura_cliente})" class="z-depth-3 btn-floating btn-medium waves-effect waves-light cyan blue-text tooltipped" data-tooltip="Ver detalle"><i class="material-icons">assignment</i></a>
                </td>
            </tr>
        `;
      }
    });
    // Se agregan las filas al cuerpo de la tabla mediante su id para mostrar los registros.
    $( '#CuerpoTabla' ).html( content );
    // Se inicializa el componente Material Box asignado a las imagenes para que funcione el efecto Lightbox.
    $( '.materialboxed' ).materialbox();
    // Se inicializa el componente Tooltip asignado a los enlaces para que funcionen las sugerencias textuales.
    $( '.tooltipped' ).tooltip();
}

// Evento para mostrar los resultados de una búsqueda.
$( '#Buscar_factura' ).submit(function( event ) {
    // Se evita recargar la página web después de enviar el formulario.
    event.preventDefault();
    // Se llama a la función que realiza la búsqueda. Se encuentra en el archivo components.js
    searchRows( API_FACTURAS, this );
});


// Función que prepara formulario para insertar un registro.
function openCreateModal()
{
    // Se limpian los campos del formulario.
    $( '#Facturas' )[0].reset();
    // Se abre la caja de dialogo (modal) que contiene el formulario.
    $( '#save-modal' ).modal( 'open' );
    // Se asigna el título para la caja de dialogo (modal).
    $( '#modal-title' ).text( 'Agregar factura' );
    fillSelect( API_CLIENTES, 'cb_cliente', null );
}

// Función que prepara formulario para modificar un registro.
function openUpdateModal( id )
{
    // Se limpian los campos del formulario.
    $( '#Facturas' )[0].reset();
    // Se abre la caja de dialogo (modal) que contiene el formulario.
    $( '#save-modal' ).modal( 'open' );
    // Se asigna el título para la caja de dialogo (modal).
    $( '#modal-title' ).text( 'Editar factura' );

    $.ajax({
        dataType: 'json',
        url: API_FACTURAS + 'readOne',
        data: { id_factura : id },
        type: 'post'
    })
    .done(function( response ) {
        // Se comprueba si la API ha retornado una respuesta satisfactoria, de lo contrario se muestra un mensaje de error.
        if ( response.status ) {
            // Se inicializan los campos del formulario con los datos del registro seleccionado previamente.
            $( '#id_factura' ).val( response.dataset.id_factura_cliente );
            $( '#txt_total' ).val( response.dataset.total_factura );
            $( '#txt_fecha' ).val( response.dataset.fecha_factura );
            $( '#txt_tipo' ).val( response.dataset.tipo_pago );
            $( '#txt_direccion' ).val( response.dataset.direccion );
            fillSelect( API_CLIENTES, 'cb_cliente', response.dataset.id_cliente);
            M.updateTextFields();
        } else {
            sweetAlert( 2, result.exception, null );
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
}

// Evento para crear o modificar un registro.
$( '#Facturas' ).submit(function( event ) {
    event.preventDefault();
    // Se llama a la función que crea o actualiza un registro. Se encuentra en el archivo components.js
    // Se comprueba si el id del registro esta asignado en el formulario para actualizar, de lo contrario se crea un registro.
    if ( $( '#id_factura' ).val() ) {
        saveRow( API_FACTURAS, 'update', this, 'save-modal' );
    } else {
        saveRow( API_FACTURAS, 'create', this, 'save-modal' );
    }
});

// Función para establecer el registro a eliminar mediante el id recibido.
function openDeleteDialog( id )
{
    // Se declara e inicializa un objeto con el id del registro que será borrado.
    let identifier = { id_factura : id };
    confirmDelete( API_FACTURAS, identifier );
}

function hazEsto( id ){
    let identifier = { id_factura: id };
    $.ajax({
        type: 'post',
        url: API_FACTURAS + 'verPedidos',
        data: identifier,
        dataType: 'json'
    })
    .done(function( response ) {
        // Se comprueba si la API ha retornado una respuesta satisfactoria, de lo contrario se muestra un mensaje de error.
        if ( response.status ) {
            // Se cargan nuevamente las filas en la tabla de la vista después de borrar un registro.
            fillTable2( response.dataset );
        } else {
            swal({
                title: 'Error',
                text: 'No hay detalles de este pedido',
                icon: 'error',
                closeOnClickOutside: false,
                closeOnEsc: false
            })
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
    }

//metodo que recibe por parametro el id de la factura y ejecuta el metodo hazEsto y le pasa el parametro
function openPedidos( id )
{
    hazEsto( id );
}

function fillTable2( dataset ){
    let content2 = '';
    // Se recorre el conjunto de registros (dataset) fila por fila a través del objeto row.
    dataset.forEach(function( row ) {
        $( '#modal-title2' ).text( 'Detalles de la factura');
        // Se crean y concatenan las filas de la tabla con los datos de cada registro.
      if  ( row.id_detalle_factura %2==0) {
        content2 += `
        <tr style="background: rgba(0, 0, 0, .6); color: white;">
            <td>${row.nombre_producto}</td>
            <td>${row.cantidad_comprados}</td>
            <td>${row.precio_comprados}</td>
        </tr>
        `;
      } else {
        content2 += `
        <tr style="background: white; color: black;">
            <td>${row.nombre_producto}</td>
            <td>${row.cantidad_comprados}</td>
            <td>${row.precio_comprados}</td>
        </tr>
        `;
      }
    });
    $( '#CuerpoTablaPedidos' ).html( content2 );
    $( '#ModalPedidos' ).modal( 'open' );
}