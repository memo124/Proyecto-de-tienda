// Método que se ejecuta cuando el documento está listo.
$(document).ready(function(){
  // Se llama a la función que obtiene los registros para llenar la tabla. Se encuentra en el archivo components.js
readRows(API_DETALLE);
});

// Constantes para establecer las rutas y parámetros de comunicación con la API.
const API_DETALLE = '../../core/api/privado/DetalleFactura.php?action=';
const API_PRODUCTO = '../../core/api/privado/productos.php?action=readAll';

// Función para llenar la tabla con los datos enviados por readRows().
function fillTable(dataset)
{
let content = '';
  // Se recorre el conjunto de registros (dataset) fila por fila a través del objeto row.
  dataset.forEach(function( row ) 
      // Se crean y concatenan las filas de la tabla con los datos de cada registro.
  { 
      if  ( row.id_detalle_factura %2==0) {
        content += `
            <tr style="background: rgba(0, 0, 0, .6); color: white;">
              <td>${row.id_detalle_factura}</td>  
              <td>${row.id_factura}</td>  
              <td>${row.precio_comprados}</td>  
              <td>${row.cantidad_comprados}</td>  
              <td>${row.nombre_producto}</td>   
              <td>
                <a href="#" onclick="ModalActualizar(${row.id_detalle_factura})" class="z-depth-3 btn-floating btn-medium waves-effect waves-light cyan blue-text tooltipped" data-tooltip="Actualizar"><i class="material-icons">mode_edit</i></a>  
                <a href="#" onclick="ModalBorrar(${row.id_detalle_factura})" class="z-depth-3 btn-floating btn-medium waves-effect waves-light red red-text tooltipped" data-tooltip="Eliminar"><i class="material-icons">delete</i></a>
              </td>
            </tr>
        `;
      } else {
        content += `
            <tr style="background: white; color: black;">
              <td>${row.id_detalle_factura}</td>  
              <td>${row.id_factura}</td>  
              <td>${row.precio_comprados}</td>  
              <td>${row.cantidad_comprados}</td>  
              <td>${row.nombre_producto}</td>   
              <td>
                <a href="#" onclick="ModalActualizar(${row.id_detalle_factura})" class="z-depth-3 btn-floating btn-medium waves-effect waves-light cyan blue-text tooltipped" data-tooltip="Actualizar"><i class="material-icons">mode_edit</i></a>  
                <a href="#" onclick="ModalBorrar(${row.id_detalle_factura})" class="z-depth-3 btn-floating btn-medium waves-effect waves-light red red-text tooltipped" data-tooltip="Eliminar"><i class="material-icons">delete</i></a>
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
$( '#Detalles_Facturas' ).submit(function( event ) {
  // Se llama a la función que crea o actualiza un registro. Se encuentra en el archivo components.js
  // Se comprueba si el id del registro esta asignado en el formulario para actualizar, de lo contrario se crea un registro.
event.preventDefault();
if($('#id_detalle').val()){
  saveRow(API_DETALLE,'update',this,'save-modal');
} 
else{
  saveRow(API_DETALLE,'create',this,'save-modal');
}
});
// Función para establecer el registro a eliminar mediante el id recibido.
function ModalBorrar( id )
{
  // Se declara e inicializa un objeto con el id del registro que será borrado.
    let idenfifier = { id_detalle : id };
    confirmDelete( API_DETALLE, idenfifier );    
}

function ModalCrear()
{
  // Se limpian los campos del formulario.
  $( '#Detalles_Facturas' )[0].reset();
  // Se abre la caja de dialogo (modal) que contiene el formulario.
  $( '#save-modal' ).modal( 'open' );
  // Se asigna el título para la caja de dialogo (modal).
  $( '#modal-title' ).text( 'Agregar detalle de factura' );
  fillSelect( API_PRODUCTO, 'cb_producto', null );
}
// Función que prepara formulario para modificar un registro.
function ModalActualizar( id )
{
  // Se limpian los campos del formulario.
    $( '#Detalles_Facturas' )[0].reset();
  // Se abre la caja de dialogo (modal) que contiene el formulario.
    $( '#save-modal' ).modal( 'open' );
  // Se asigna el título para la caja de dialogo (modal).
    $( '#modal-title' ).text( 'Modificar detalle de factura' );

    $.ajax({
      dataType:'Json',
      url: API_DETALLE + 'readOne',
      data: { id_detalle : id },
      type: 'post'
    }).done(function(response){
      // Se comprueba si la API ha retornado una respuesta satisfactoria, de lo contrario se muestra un mensaje de error.
      if(response.status){
          // Se inicializan los campos del formulario con los datos del registro seleccionado previamente.
        $('#id_detalle').val(response.dataset.id_detalle_factura);
        $('#txt_factura').val(response.dataset.id_factura);
        $('#txt_precio_comprados').val(response.dataset.precio_comprados);
        $('#txt_cantidad_comprados').val(response.dataset.cantidad_comprados);
        fillSelect( API_PRODUCTO, 'cb_producto', response.dataset.id_productos);
        M.updateTextFields();
      }
      else{
        sweetAlert(2,result.exception, null);
      }
    })
    .fail(function(jqHXR){
      // Se verifica si la API ha respondido para mostrar la respuesta, de lo contrario se presenta el estado de la petición.
      if(jqHXR.status==200){
        console.log(jqHXR.responseText);
      }else{
        console.log(jqHXR.status +' '+jqHXR.statusText);
      }
    });
}

// Evento para mostrar los resultados de una búsqueda.
$('#Buscar_Detalle').submit(function(event){
  // Se evita recargar la página web después de enviar el formulario.
  event.preventDefault();
  // Se llama a la función que realiza la búsqueda. Se encuentra en el archivo components.js
  searchRows(API_DETALLE, this);
})
