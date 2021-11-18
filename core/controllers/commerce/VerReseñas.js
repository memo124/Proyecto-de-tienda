// Constante para poder comunicarse con la API
const API_RESENA = '../../core/api/commerce/VerResena.php?action=';

$( document ).ready(function() {
    // Se ejecuta el metodo de obtener los ID de las reseñas cuando el documento está listo
    readResena();
});
// Funcion para poder ver las reseñas
function readResena()
{
    //Conversion a ajax
    $.ajax({
        dataType: 'json',
        url: API_RESENA + 'obtenerID'
    })
    .done(function( response ) {
        //Se evalua si la API respondio como se esperaba, sino se mostrará un mensaje de error
        if ( response.status ) {
            let content = '';
            /*Se recorren los registros mediante forEach y el objeto row*/
            response.dataset.forEach(function( row ) {
                /*Se crea un contenedor con la información de cada reseña*/
                content += `
                <!--Caja que contiene los elementos que muestran los detalles de la compra-->
                <div class="row elemento_marca1">
                    <div class="col l12 m12 s12">
                        <div class="col l8 m12 s12 DIV_VR_IMG">
                            <img src="../../resources/img/cards/${row.imagen}" class="materialboxed center-align z-depth-3 ImgVR">
                        </div>
                        <div class="col l4 m12 s12">
                            <p class="INFO_RESENA1"><i>${row.nombre_producto}</i></p>
                            <p class="INFO_RESENA1"><i>De ${row.marcas}</i></p>
                        </div>
                    </div>
                    <div class="col l12 m12 s12 contenedor_info_marca1">
                    <h3 style="text-align: center;" id="h3_encabezado_contacto">Reseñas</h3>
                        <div class="row" id="FilaTabla">
                            <!-- Tabla para mostrar los registros de la compra-->
                            <table class="responsive-table highlight striped centered Tabla">
                                <thead>
                                    <tr>
                                        <th>Usuario</th>
                                        <th>Calificación</th>
                                        <th>Comentario</th>
                                    </tr>
                                </thead>
                                <tbody class="CuerpoTabla Cuerpotabla${row.id_productos}">
                                
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                `;
		//Se Inicia la funcion llenarTabla para poder rellenar la tabla
            llenarTabla(`${row.id_productos}`);
            });
            // Se agregan las tarjetas a la etiqueta div mediante su id para mostrar las marcas.
            $( '.CajaScrollComprasU' ).html( content );
            //A cada imagen se le agrega el componente de materialboxed para hacer uso del efecto
            $( '.materialboxed' ).materialbox();
        }
    })
    .fail(function( jqXHR ) {
        // Se verifica si la API pudo responder, sino se mostrará un mensaje de error.
        if ( jqXHR.status == 200 ) {
            console.log( jqXHR.responseText );
        } else {
            console.log( jqXHR.status + ' ' + jqXHR.statusText );
        }
    });
}

function llenarTabla( id ){
    //Conversion de ajax
  $.ajax({
      dataType: 'json',
      url: API_RESENA + 'readResena',
      data: { id_productos: id },
      type: 'post'
      
  })//se realiza un funcion para verificar si se cumple o da algun error
  .done(function( response ) {
      // Se evalua si la API respondio como se esperaba sino se muestra un mensaje de error.
      if ( response.status ) {
          let content = '';
          // Se recorren los datos que retorno la API mediate forEach y el objeto row
          response.dataset.forEach(function( row ) {
              /*se evalua si el valor del id de reseña es par para darle un diseño especifico,
              sino se dará otro diseño*/
              if ( row.id_resena %2==0 ) {
                content += `
                      <tr style="background: rgba(0, 0, 0, .6); color: white; font-size: larger; margin-top: 5px; margin-bottom: 5px;">
                          <td>${row.usuario_cliente}</td>
                          <td>${row.clasificacion}</td>
                          <td>${row.comentario}</td>
                      </tr>
                  `;
              } else {
                content += `
                <tr style="background: white; color: black; font-size: larger; margin-top: 5px; margin-bottom: 5px;">
                          <td>${row.usuario_cliente}</td>
                          <td>${row.clasificacion}</td>
                          <td>${row.comentario}</td>
                      </tr>
                  `;
              }
                      
          });
          // Se agregan los elementos de tabla a su tabla correspondiente
          $('.Cuerpotabla'+id).html( content );
      } else {
          alert('No sirvio cerote');
      }
  })
  .fail(function( jqXHR ) {
      /* Se evalua si la API pudo responder de forma correcta o no, y en ambos casos se mostrara un mensaje en la consola*/
      if ( jqXHR.status == 200 ) {
          console.log( jqXHR.responseText );
      } else {
          console.log( jqXHR.status + ' ' + jqXHR.statusText );
      }
  });
}