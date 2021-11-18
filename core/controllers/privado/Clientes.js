// Constantes para establecer las rutas y parámetros de comunicación con la API.
const API_CLIENTES = '../../core/api/privado/Clientes.php?action=';
const API_ESTADO_CLIENTES = '../../core/api/privado/EstadoClientes.php?action=readAll';

// Método que se ejecuta cuando el documento está listo.
$( document ).ready(function() {
    // Se llama a la función que obtiene los registros para llenar la tabla. Se encuentra en el archivo components.js
    readRows( API_CLIENTES );
});

// Función para llenar la tabla con los datos enviados por readRows().
function fillTable( dataset )
{
    let content = '';
    // Se recorre el conjunto de registros (dataset) fila por fila a través del objeto row.
    dataset.forEach(function( row ) {
        // Se crean y concatenan las filas de la tabla con los datos de cada registro.
      if  ( row.id_cliente %2==0) {
        content += `
            <tr style="background: rgba(0, 0, 0, .6); color: white;">
                <td>${row.id_cliente}</td>
                <td>${row.nombre_cliente}</td>
                <td>${row.apellido_cliente}</td>
                <td>${row.correo_cliente}</td>
                <td>${row.usuario_cliente}</td>
                <td>${row.estado_cliente}</td>
                <td>
                    <a href="#" onclick="openUpdateModal(${row.id_cliente})" class="z-depth-3 btn-floating btn-medium waves-effect waves-light cyan blue-text tooltipped" data-tooltip="Editar"><i class="material-icons">mode_edit</i></a>
                    <a href="#" onclick="openDeleteDialog(${row.id_cliente})" class="z-depth-3 btn-floating btn-medium waves-effect waves-light red red-text tooltipped" data-tooltip="Eliminar"><i class="material-icons">delete</i></a>
                    <a onclick="openPedidos(${row.id_cliente})" href="#!" class="z-depth-3 btn-floating btn-medium waves-effect waves-light cyan blue-text tooltipped" data-tooltip="Ver pedidos"><i class="material-icons">shopping_cart</i></a>
                </td>
            </tr>
        `;
      } else {
        content += `
            <tr style="background: white; color: black;">
                <td>${row.id_cliente}</td>
                <td>${row.nombre_cliente}</td>
                <td>${row.apellido_cliente}</td>
                <td>${row.correo_cliente}</td>
                <td>${row.usuario_cliente}</td>
                <td>${row.estado_cliente}</td>
                <td>
                    <a href="#" onclick="openUpdateModal(${row.id_cliente})" class="z-depth-3 btn-floating btn-medium waves-effect waves-light cyan blue-text tooltipped" data-tooltip="Editar"><i class="material-icons">mode_edit</i></a>
                    <a href="#" onclick="openDeleteDialog(${row.id_cliente})" class="z-depth-3 btn-floating btn-medium waves-effect waves-light red red-text tooltipped" data-tooltip="Eliminar"><i class="material-icons">delete</i></a>
                    <a onclick="openPedidos(${row.id_cliente})" href="#!" class="z-depth-3 btn-floating btn-medium waves-effect waves-light cyan blue-text tooltipped" data-tooltip="Ver pedidos"><i class="material-icons">shopping_cart</i></a>
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
$( '#Buscar_cliente' ).submit(function( event ) {
    // Se evita recargar la página web después de enviar el formulario.
    event.preventDefault();
    // Se llama a la función que realiza la búsqueda. Se encuentra en el archivo components.js
    searchRows( API_CLIENTES, this );
});


// Función que prepara formulario para insertar un registro.
function openCreateModal()
{
    // Se limpian los campos del formulario.
    $( '#Form_clientes' )[0].reset();
    // Se abre la caja de dialogo (modal) que contiene el formulario.
    $( '#save-modal' ).modal( 'open' );
    // Se asigna el título para la caja de dialogo (modal).
    $( '#modal-title' ).text( 'Agregar cliente' );
    $( '#txt_usuario_cliente' ).prop( 'disabled', false );
    $( '#txt_contraseña_cliente' ).prop( 'disabled', false );
    fillSelect( API_ESTADO_CLIENTES, 'cb_estado_cliente', null );
}

// Función que prepara formulario para modificar un registro.
function openUpdateModal( id )
{
    // Se limpian los campos del formulario.
    $( '#Form_clientes' )[0].reset();
    // Se abre la caja de dialogo (modal) que contiene el formulario.
    $( '#save-modal' ).modal( 'open' );
    // Se asigna el título para la caja de dialogo (modal).
    $( '#modal-title' ).text( 'Editar cliente' );
    //se deshabilitan los campos de usuario y contraseña
    $( '#txt_usuario_cliente' ).prop( 'disabled', true );
    $( '#txt_contraseña_cliente' ).prop( 'disabled', true );
    $.ajax({
        dataType: 'json',
        url: API_CLIENTES + 'readOne',
        data: { id_cliente: id },
        type: 'post'
    })
    .done(function( response ) {
        // Se comprueba si la API ha retornado una respuesta satisfactoria, de lo contrario se muestra un mensaje de error.
        if ( response.status ) {
            // Se inicializan los campos del formulario con los datos del registro seleccionado previamente.
            $( '#id_cliente' ).val( response.dataset.id_cliente );
            $( '#txt_nombres_cliente' ).val( response.dataset.nombre_cliente);
            $( '#txt_apellidos_cliente' ).val( response.dataset.apellido_cliente);
            $( '#txt_correo_cliente' ).val( response.dataset.correo_cliente);
            fillSelect( API_ESTADO_CLIENTES, 'cb_estado_cliente', response.dataset.id_estado_cliente);
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
$( '#Form_clientes' ).submit(function( event ) {
    event.preventDefault();
    // Se llama a la función que crea o actualiza un registro. Se encuentra en el archivo components.js
    // Se comprueba si el id del registro esta asignado en el formulario para actualizar, de lo contrario se crea un registro.
    if ( $( '#id_cliente' ).val() ) {
        saveRow( API_CLIENTES, 'update', this, 'save-modal' );
    } else {
        saveRow( API_CLIENTES, 'create', this, 'save-modal' );
    }
});

// Evento para crear o modificar un registro.
$( '#Form_clientes' ).submit(function( event ) {
    event.preventDefault();
    // Se llama a la función que crea o actualiza un registro. Se encuentra en el archivo components.js
    // Se comprueba si el id del registro esta asignado en el formulario para actualizar, de lo contrario se crea un registro.
    if ( $( '#id_cliente' ).val() ) {
        saveRow( API_CLIENTES, 'update', this, 'save-modal' );
    } else {
        saveRow( API_CLIENTES, 'create', this, 'save-modal' );
    }
});

// Función para establecer el registro a eliminar mediante el id recibido.
function openDeleteDialog( id )
{
    // Se declara e inicializa un objeto con el id del registro que será borrado.
    let identifier = { id_cliente: id };
    confirmDelete( API_CLIENTES, identifier );
}

// Función para hacer petición ajax de los pedidos segun el cliente.
function hazEsto( id ){
    let identifier = { id_cliente : id };
    $.ajax({
        type: 'post',
        url: API_CLIENTES + 'verPedidos',
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
                text: 'No hay pedidos hechos por este cliente',
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
        $( '#modal-title2' ).text( 'Pedidos hechos por: '+(row.nombre_cliente) );
        // Se crean y concatenan las filas de la tabla con los datos de cada registro.
      if  ( row.id_factura_cliente %2==0) {
        content2 += `
        <tr style="background: rgba(0, 0, 0, .6); color: white;">
            <td>${row.fecha_factura}</td>
            <td>${row.direccion}</td>
            <td>${row.nombre_producto}</td>
            <td>${row.cantidad_comprados}</td>
            <td>${row.total_factura}</td>
            <td>${row.tipo_pago}</td>
        </tr>
        `;
      } else {
        content2 += `
        <tr style="background: white; color: black;">
            <td>${row.fecha_factura}</td>
            <td>${row.direccion}</td>
            <td>${row.nombre_producto}</td>
            <td>${row.cantidad_comprados}</td>
            <td>${row.total_factura}</td>
            <td>${row.tipo_pago}</td>
        </tr>
        `;
      }
    });
    $( '#CuerpoTablaPedidos' ).html( content2 );
    $( '#ModalPedidos' ).modal( 'open' );
}