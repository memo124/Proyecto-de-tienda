
// Constantes para establecer las rutas y parámetros de comunicación con la API.
const API_RESENAS = '../../core/api/privado/Resenas.php?action=';

// Método que se ejecuta cuando el documento está listo.
$( document ).ready(function() {
    // Se llama a la función que obtiene los registros para llenar la tabla. Se encuentra en el archivo components.js
    readRows( API_RESENAS );
});

// Función para llenar la tabla con los datos enviados por readRows().
function fillTable( dataset )
{
    let content = '';
    // Se recorre el conjunto de registros (dataset) fila por fila a través del objeto row.
    dataset.forEach(function( row ) {
      var icon ='';
      if(row.estado_comentario=="Activo"){
        icon = 'visibility';
      }else{
        icon = 'visibility_off';
      }
        // Se crean y concatenan las filas de la tabla con los datos de cada registro.
      if  ( row.id_resena %2==0) {
        content += `
          <tr style="background: rgba(0, 0, 0, .6); color: white;">
              <td>${row.id_resena}</td>
              <td>${row.nombre_cliente}</td>
              <td>${row.nombre_producto}</td>
              <td>${row.clasificacion}</td>
              <td>${row.comentario}</td>
              <td><i class="material-icons">${icon}</i></td>
              <td>
                <a onclick="openUpdateModal(${row.id_resena})" class="z-depth-3 btn-floating btn-medium waves-effect waves-light cyan"><i class="material-icons">edit</i></a>
                <a onclick="ModalBorrar(${row.id_resena})" href="#!" class="z-depth-3 btn-floating btn-medium waves-effect waves-light red"><i class="material-icons">delete</i></a></td>';
          </tr>
        `;
      } else {
        content += `
          <tr style="background: white; color: black;">
              <td>${row.id_resena}</td>
              <td>${row.nombre_cliente}</td>
              <td>${row.nombre_producto}</td>
              <td>${row.clasificacion}</td>
              <td>${row.comentario}</td>
              <td><i class="material-icons">${icon}</i></td>
              <td>
                <a onclick="openUpdateModal(${row.id_resena})" class="z-depth-3 btn-floating btn-medium waves-effect waves-light cyan"><i class="material-icons">edit</i></a>
                <a onclick="ModalBorrar(${row.id_resena})" href="#!" class="z-depth-3 btn-floating btn-medium waves-effect waves-light red"><i class="material-icons">delete</i></a></td>';
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
$( '#Buscar_resenas' ).submit(function( event ) {
    // Se evita recargar la página web después de enviar el formulario.
    event.preventDefault();
    // Se llama a la función que realiza la búsqueda. Se encuentra en el archivo components.js
    searchRows( API_RESENAS, this );
});


// Función que prepara formulario para modificar un registro.
function openUpdateModal( id )
{
    // Se limpian los campos del formulario.
    $( '#Resenas' )[0].reset();
    // Se abre la caja de dialogo (modal) que contiene el formulario.
    $( '#save-modal' ).modal( 'open' );
    // Se asigna el título para la caja de dialogo (modal).
    $( '#modal-title' ).text( 'Editar Reseña' );

    $.ajax({
        dataType: 'json',
        url: API_RESENAS + 'readOne',
        data: { id_resena : id },
        type: 'post'
    })
    .done(function( response ) {
        // Se comprueba si la API ha retornado una respuesta satisfactoria, de lo contrario se muestra un mensaje de error.
        if ( response.status ) {
            // Se inicializan los campos del formulario con los datos del registro seleccionado previamente.
            $( '#id_resena' ).val( response.dataset.id_resena );
            if (response.dataset.estado_comentario=="Activo"){
              $( '#estado_resena' ).prop( 'checked', true )
            }else{ 
              $( '#estado_resena' ).prop( 'checked', false );
            }
           
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
$( '#Resenas' ).submit(function( event ) {
    event.preventDefault();
    // Se llama a la función que crea o actualiza un registro. Se encuentra en el archivo components.js
    // Se comprueba si el id del registro esta asignado en el formulario para actualizar, de lo contrario se crea un registro.
    if ( $( '#id_resena' ).val() ) {
        saveRow( API_RESENAS, 'update', this, 'save-modal' );
    } 
});

// Función para establecer el registro a eliminar mediante el id recibido.
function ModalBorrar( id )
{
    // Se declara e inicializa un objeto con el id del registro que será borrado.
    let identifier = { id_resena : id };
    confirmDelete( API_RESENAS, identifier );
}