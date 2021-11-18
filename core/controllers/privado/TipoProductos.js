// Método que se ejecuta cuando el documento está listo.
$(document).ready(function(){
  // Se llama a la función que obtiene los registros para llenar la tabla. Se encuentra en el archivo components.js
  readRows(API_TIPOPRODUCTO);
});

// Constantes para establecer las rutas y parámetros de comunicación con la API.
API_TIPOPRODUCTO = '../../core/api/privado/tipoproductos.php?action=';

// Función para llenar la tabla con los datos enviados por readRows().
function fillTable(dataset)
  {      
    let content = '';
    dataset.forEach(function( row ) 
    {
        // Se crean y concatenan las filas de la tabla con los datos de cada registro.
       if  ( row.id_tipo_producto %2==0) {
        content += `
            <tr style="background: rgba(0, 0, 0, .6); color: white;">
              <td>${row.id_tipo_producto}</td>
              <td>${row.tipo_producto}</td>
              <td>${row.promocion}</td>  
              <td>
                  <a href="#" onclick="ModalActualizar(${row.id_tipo_producto})" class="z-depth-5 btn-floating btn-medium waves-effect waves-light cyan blue-text tooltipped" data-tooltip="Actualizar"><i class="material-icons">mode_edit</i></a>
                  <a href="#" onclick="ModalBorrar(${row.id_tipo_producto})" class="z-depth-3 btn-floating btn-medium waves-effect waves-light red red-text tooltipped" data-tooltip="Eliminar"><i class="material-icons">delete</i></a>
              </td>
            </tr>
        `;
      } else {
        content += `
            <tr style="background: white; color: black;">
              <td>${row.id_tipo_producto}</td>
              <td>${row.tipo_producto}</td>
              <td>${row.promocion}</td>  
              <td>
                  <a href="#" onclick="ModalActualizar(${row.id_tipo_producto})" class="z-depth-5 btn-floating btn-medium waves-effect waves-light cyan blue-text tooltipped" data-tooltip="Actualizar"><i class="material-icons">mode_edit</i></a>
                  <a href="#" onclick="ModalBorrar(${row.id_tipo_producto})" class="z-depth-3 btn-floating btn-medium waves-effect waves-light red red-text tooltipped" data-tooltip="Eliminar"><i class="material-icons">delete</i></a>
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
function ModalCrear()
{
  // Se limpian los campos del formulario.
  $( '#Tipo_productos' )[0].reset();
  // Se abre la caja de dialogo (modal) que contiene el formulario.
  $( '#save-modal' ).modal( 'open' );
  // Se asigna el título para la caja de dialogo (modal).
  $( '#modal-title' ).text('Agregar tipo de producto');
}

// Evento para crear o modificar un registro.
$('#Tipo_productos').submit(function(event){
// Se llama a la función que crea o actualiza un registro. Se encuentra en el archivo components.js
  // Se comprueba si el id del registro esta asignado en el formulario para actualizar, de lo contrario se crea un registro.
  event.preventDefault();
if($('#id_tipo').val()){
  saveRow(API_TIPOPRODUCTO,'update',this,'save-modal');
} 
else{
  saveRow(API_TIPOPRODUCTO,'create',this,'#save-modal'); 
}
});

function ModalActualizar( id )
{
// Función que prepara formulario para modificar un registro.
$( '#Tipo_productos' )[0].reset();
  // Se abre la caja de dialogo (modal) que contiene el formulario.
  $( '#save-modal' ).modal( 'open' );
  // Se asigna el título para la caja de dialogo (modal).
  $( '#modal-title' ).text( 'Modificar tipo de producto' );

  $.ajax({
    dataType:'Json',
    url: API_TIPOPRODUCTO + 'readOne',
    data: { id_tipo_producto : id },
    type: 'post'
  }).done(function(response){
      // Se comprueba si la API ha retornado una respuesta satisfactoria, de lo contrario se muestra un mensaje de error.
      if(response.status){
          // Se inicializan los campos del formulario con los datos del registro seleccionado previamente.
          $('#id_tipo').val(id);
        $('#txt_tipo').val(response.status.tipo_producto);
        $('#txt_promocion').val(response.status.promocion);
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
function ModalBorrar( id ){
  // Se declara e inicializa un objeto con el id del registro que será borrado.
  let idenfifier = { id_tipo_producto : id };
  confirmDelete( API_TIPOPRODUCTO,idenfifier );    
}

// Evento para mostrar los resultados de una búsqueda.
$('#Buscar_tipo_productos').submit(function(event){
  // Se evita recargar la página web después de enviar el formulario.
  event.preventDefault();
  // Se llama a la función que realiza la búsqueda. Se encuentra en el archivo components.js
  searchRows(API_TIPOPRODUCTO, this);
})

