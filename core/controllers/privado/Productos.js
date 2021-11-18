// Método que se ejecuta cuando el documento está listo.
$(document).ready(function(){
  // Se llama a la función que obtiene los registros para llenar la tabla. Se encuentra en el archivo components.js
  readRows(API_PRODUCTO);
});

// Constantes para establecer las rutas y parámetros de comunicación con la API.
const API_PRODUCTO = '../../core/api/privado/productos.php?action=';
const API_MARCAS = '../../core/api/privado/Marcas.php?action=readAll';
const API_ESTADOPRODUCTO = '../../core/api/privado/estadoproducto.php?action=readAll';
const API_TIPOPRODUCTO = '../../core/api/privado/tipoproductos.php?action=readAll';

// Función para llenar la tabla con los datos enviados por readRows().
function fillTable(dataset)
{
let content = '';
    dataset.forEach(function( row ) 
    { 
       // Se crean y concatenan las filas de la tabla con los datos de cada registro.
       if  ( row.id_productos %2==0) {
          content += `
              <tr style="background: rgba(0, 0, 0, .6); color: white;">
                <td>${row.id_productos}</td>  
                <td>${row.nombre_producto}</td>  
                <td>${row.precio}</td>  
                <td>${row.cantidad_producto}</td>  
                <td><img src="../../resources/img/cards/${row.imagen}" class="materialboxed center-align z-depth-3" height="100"></td>
                <td>${row.estado_producto}</td>  
                <td>${row.marcas}</td>  
                <td>${row.tipo_producto}</td>   
                <td>
                    <a href="#" onclick="ModalActualizar(${row.id_productos})" class="z-depth-5 btn-floating btn-medium waves-effect waves-light cyan blue-text tooltipped" data-tooltip="Actualizar"><i class="material-icons">mode_edit</i></a>
                    <a href="#" onclick="ModalBorrar(${row.id_productos})" class="z-depth-3 btn-floating btn-medium waves-effect waves-light red red-text tooltipped" data-tooltip="Eliminar"><i class="material-icons">delete</i></a>
                </td>
              </tr>
          `;
        } else {
          content += `
              <tr style="background: white; color: black;">
                <td>${row.id_productos}</td>  
                <td>${row.nombre_producto}</td>  
                <td>${row.precio}</td>  
                <td>${row.cantidad_producto}</td>  
                <td><img src="../../resources/img/cards/${row.imagen}" class="materialboxed center-align z-depth-3" height="100"></td>
                <td>${row.estado_producto}</td>  
                <td>${row.marcas}</td>  
                <td>${row.tipo_producto}</td>   
                <td>
                    <a href="#" onclick="ModalActualizar(${row.id_productos})" class="z-depth-3 btn-floating btn-medium waves-effect waves-light cyan blue-text tooltipped" data-tooltip="Actualizar"><i class="material-icons">mode_edit</i></a>
                    <a href="#" onclick="ModalBorrar(${row.id_productos})" class="z-depth-3 btn-floating btn-medium waves-effect waves-light red red-text tooltipped" data-tooltip="Eliminar"><i class="material-icons">delete</i></a>
                </td>
              </tr>
          `;
        }
  // Se agregan las filas al cuerpo de la tabla mediante su id para mostrar los registros.
  $('#CuerpoTabla').html(content);
   // Se inicializa el componente Material Box asignado a las imagenes para que funcione el efecto Lightbox.
   $( '.materialboxed' ).materialbox();
  // Se inicializa el componente Tooltip asignado a los enlaces para que funcionen las sugerencias textuales.
  $('.tooltipped').tooltip();
  })
}

// Evento para crear o modificar un registro.
$('#Productos').submit(function(event){
// Se llama a la función que crea o actualiza un registro. Se encuentra en el archivo components.js
  // Se comprueba si el id del registro esta asignado en el formulario para actualizar, de lo contrario se crea un registro.
  event.preventDefault();
if($('#id_producto').val()){
  saveRow(API_PRODUCTO,'update',this,'save-modal');
} 
else{
  saveRow(API_PRODUCTO,'create',this,'save-modal'); 
}
});

function ModalCrear()
{
  // Se limpian los campos del formulario.
  $( '#Productos' )[0].reset();
  // Se abre la caja de dialogo (modal) que contiene el formulario.
  $( '#save-modal' ).modal( 'open' );
  // Se asigna el título para la caja de dialogo (modal).
  $( '#modal-title' ).text('Agregar producto');
  fillSelect( API_MARCAS, 'cb_marca', null );
  fillSelect( API_TIPOPRODUCTO, 'cb_tipo', null );
  fillSelect( API_ESTADOPRODUCTO, 'cb_estado', null );
}

function ModalActualizar( id )
{
// Función que prepara formulario para modificar un registro.
  $( '#Productos' )[0].reset();
  // Se abre la caja de dialogo (modal) que contiene el formulario.
  $( '#save-modal' ).modal( 'open' );
  // Se asigna el título para la caja de dialogo (modal).
  $( '#modal-title' ).text( 'Modificar producto' );
  $.ajax({
    dataType: 'json',
    url: API_PRODUCTO + 'readOne',
    data: { id_producto : id },
    type: 'post'
})
.done(function( response ) {
      // Se comprueba si la API ha retornado una respuesta satisfactoria, de lo contrario se muestra un mensaje de error.
      if ( response.status ) {
          // Se inicializan los campos del formulario con los datos del registro seleccionado previamente.
          $( '#id_producto' ).val( response.dataset.id_productos );
        $( '#nombre_producto' ).val( response.dataset.nombre_producto );
        $( '#precio_producto' ).val( response.dataset.precio );
        $( '#cantidad_producto' ).val( response.dataset.cantidad_producto );
        fillSelect( API_ESTADOPRODUCTO, 'cb_estado', response.dataset.id_estado_producto);
        fillSelect( API_TIPOPRODUCTO, 'cb_tipo', response.dataset.id_tipo_producto);
        fillSelect( API_MARCAS, 'cb_marca', response.dataset.id_marcas);
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

// Función para establecer el registro a eliminar mediante el id recibido.
function ModalBorrar( id )
{
  // Se declara e inicializa un objeto con el id del registro que será borrado.
  let idenfifier = { id_producto : id };
    confirmDelete( API_PRODUCTO, idenfifier );    
}

// Evento para mostrar los resultados de una búsqueda.
$('#Buscar_productos').submit(function(event){
  // Se evita recargar la página web después de enviar el formulario.
  event.preventDefault();
  // Se llama a la función que realiza la búsqueda. Se encuentra en el archivo components.js
  searchRows(API_PRODUCTO, this);
})

