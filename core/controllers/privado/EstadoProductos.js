// Método que se ejecuta cuando el documento está listo.
$(document).ready(function(){ 
  // Se llama a la función que obtiene los registros para llenar la tabla. Se encuentra en el archivo components.js
  readRows( API_ESTADOPRODUCTO );
});
// Constantes para establecer las rutas y parámetros de comunicación con la API.
const API_ESTADOPRODUCTO = '../../core/api/privado/estadoproducto.php?action=';
// Función para llenar la tabla con los datos enviados por readRows().
function fillTable(dataset)
  {      
    let content = '';
  // Se recorre el conjunto de registros (dataset) fila por fila a través del objeto row.
    dataset.forEach(function( row ) 
      // Se crean y concatenan las filas de la tabla con los datos de cada registro.
    {
        if  ( row.id_estado_producto %2==0) {
          content += `
              <tr style="background: rgba(0, 0, 0, .6); color: white;">
                <td>${row.id_estado_producto}</td>
                <td>${row.estado_producto}</td>
                <td>
                    <a href="#" onclick="ModalActualizar(${row.id_estado_producto})" class="z-depth-5 btn-floating btn-medium waves-effect waves-light cyan blue-text tooltipped" data-tooltip="Actualizar"><i class="material-icons">mode_edit</i></a>
                    <a href="#" onclick="ModalBorrar(${row.id_estado_producto})" class="z-depth-3 btn-floating btn-medium waves-effect waves-light red red-text tooltipped" data-tooltip="Eliminar"><i class="material-icons">delete</i></a>
                </td>
              </tr>
          `;
        } else {
          content += `
              <tr style="background: white; color: black;">
                <td>${row.id_estado_producto}</td>
                <td>${row.estado_producto}</td>
                <td>
                    <a href="#" onclick="ModalActualizar(${row.id_estado_producto})" class="z-depth-5 btn-floating btn-medium waves-effect waves-light cyan blue-text tooltipped" data-tooltip="Actualizar"><i class="material-icons">mode_edit</i></a>
                    <a href="#" onclick="ModalBorrar(${row.id_estado_producto})" class="z-depth-3 btn-floating btn-medium waves-effect waves-light red red-text tooltipped" data-tooltip="Eliminar"><i class="material-icons">delete</i></a>
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
$('#Estado_productos').submit(function(event){
      // Se llama a la función que crea o actualiza un registro. Se encuentra en el archivo components.js
  // Se comprueba si el id del registro esta asignado en el formulario para actualizar, de lo contrario se crea un registro.
  event.preventDefault();
  if($('#id_estado').val()){
  saveRow(API_ESTADOPRODUCTO,'update',this,'#save-modal');
  }
  else{
  saveRow(API_ESTADOPRODUCTO,'create',this,'#save-modal');
  }
  });
  
function ModalCrear()
{
  // Se limpian los campos del formulario.
    $( '#Estado_productos' )[0].reset();
  // Se abre la caja de dialogo (modal) que contiene el formulario.
    $( '#save-modal' ).modal( 'open' );
  // Se asigna el título para la caja de dialogo (modal).
    $( '#modal-title' ).text('Agregar estado de producto');
}

function ModalActualizar(id)
{
// Función que prepara formulario para modificar un registro.
    $( '#Estado_productos' )[0].reset();
  // Se abre la caja de dialogo (modal) que contiene el formulario.
    $( '#save-modal' ).modal( 'open' );
  // Se asigna el título para la caja de dialogo (modal).
    $( '#modal-title' ).text( 'Modificar estado de producto' );

    $.ajax({
      dataType:'Json',
      url: API_ESTADOPRODUCTO + 'readOne',
      data: { id_estado_producto : id },
      type: 'post'
    }).done(function(response){
      // Se comprueba si la API ha retornado una respuesta satisfactoria, de lo contrario se muestra un mensaje de error.
      if(response.status){
          // Se inicializan los campos del formulario con los datos del registro seleccionado previamente.
        $('#id_estado').val(id);
        $('#txt_estado').val(response.dataset.estado_producto);
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
// Función para establecer el registro a eliminar mediante el id recibido.
function ModalBorrar( id )
{
  // Se declara e inicializa un objeto con el id del registro que será borrado.
  let idenfifier = { id_estado_producto: id };
  confirmDelete( API_ESTADOPRODUCTO,idenfifier );
};
// Evento para mostrar los resultados de una búsqueda.
$('#Buscar_estado_productos').submit(function(event){
  // Se evita recargar la página web después de enviar el formulario.
  event.preventDefault();
  // Se llama a la función que realiza la búsqueda. Se encuentra en el archivo components.js
  searchRows(API_ESTADOPRODUCTO, this);
})
