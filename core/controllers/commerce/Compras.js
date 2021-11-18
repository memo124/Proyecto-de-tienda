// Constante para establecer la comunicación con la API.
const API_CARRITO = '../../core/api/commerce/carrito.php?action=';

// Método que se ejecutara cuando el documento se encuentra listo.
$( document ).ready(function() {
    /*Invocación del método que obtendra los ID y nombre de las marcas
    para poder crear los carruseles y luego creara los elementos que iran dentro
    del carrusel correspondiente*/
    verCompras();
});


function verCompras() {
    $.ajax({
        dataType: 'json',
        url: API_CARRITO + 'obtenerCompras'
    })
    .done(function( response ) {
        /* Se evalua si la API respondio correctamente y retorno datos, sino se 
        mostrara un mensaje de error.*/
        if ( response.status ) {
            let content = '';
            response.dataset.forEach(function( row ) {
                /*Se crean los carruseles segun el id de la marca
                y el titulo con el nombre de la marca*/
                content += `
                <div class="row elemento_marca1">
                    <div class="col l12 m10 offset-m1 s12">
                        <h3 style="text-align: center;" id="h3_encabezado_contacto">Detalles de la compra</h3>
                        <div class="row" id="FilaTabla">
                            <!-- Tabla para mostrar los registros de la compra-->
                            <table class="responsive-table highlight striped centered Tabla">
                                <thead>
                                    <tr>
                                        <th>Producto</th>
                                        <th>Precio (USD$)</th>
                                        <th>Descuento</th>
                                        <th>Cantidad</th>
                                        <th>Subtotal (USD$)</th>
                                    </tr>
                                </thead>
                                <tbody class="CuerpoTabla" id="CuerpoTabla${row.id_factura_cliente}">
                                </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="col l12 m10 offset-m1 s12 contenedor_info_marca1">
                            <div class="col l6 m12 s12">
                                <p class="info_marca1"><i>Fecha del pedido</i>: ${row.fecha_factura}</p>
                                <p class="info_marca1"><i>Dirección de envío</i>: ${row.direccion}</p>
                                <p class="info_marca1"><i>Estado del pedido</i>: ${row.estado_factura}</p>
                            </div>
                            <div class="col l6 m12 s12">
                                <p class="info_marca1 coso${row.id_factura_cliente}">Cantidad a pagar (USD$): $${row.total}</p>
                                <p class="info_marca1"><i>Forma de pago</i>: ${row.tipo_pago}</p>
                                <a href="../../core/reports/commerce/comprobante.php?id_factura=${row.id_factura_cliente}"  target="_blank" class="btn-medium waves-effect waves-light red btn">Generar comprobante</a>
                                <p></p>
                            </div>
                        </div>
                    </div>
                </div>
                `;
                /*Se le envia el valor del ID de la marca al metodo que obtendra los datos de
                los productos que pertenecen a ella e imprimira los elementos con los datos de
                los productos pertenecientes a esa marca y los agregara a su carrusel*/
                llenarTabla(`${row.id_factura_cliente}`);
            });
            /*Se agregan los carruseles a la caja que los contiene*/
            $('.CajaScrollComprasU').html( content );
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

function llenarTabla( id ){
  //Conversion de ajax
$.ajax({
    dataType: 'json',
    url: API_CARRITO + 'detallarCompras',
    data: { id_factura_cliente : id },
    type: 'post'
    
})//se realiza un funcion para verificar si se cumple o da algun error
.done(function( response ) {
    // Se evalua si la API respondio como se esperaba sino se muestra un mensaje de error.
    if ( response.status ) {
        let content = '';
        // Se recorren los datos que retorno la API mediate forEach y el objeto row
        response.dataset.forEach(function( row ) {
            /*se evalua si el valor del id de detalle de factura es par para darle un diseño especifico,
            sino se dará otro diseño*/
            if ( row.id_detalle_factura %2==0 ) {
              content += `
                <tr style="background: rgba(0, 0, 0, .6); color: white; font-size: larger; margin-top: 5px; margin-bottom: 5px;">
                  <td>${row.nombre_producto}</td>
                  <td>${row.precio}</td>
                  <td>${row.promocion}% de descuento</td>
                  <td>${row.cantidad_comprados}</td>
                  <td>${row.precio_comprados}</td>
                </tr>
                `;
            } else {
              content += `
                <tr style="background: white; color: black; font-size: larger; margin-top: 5px; margin-bottom: 5px;">
                  <td>${row.nombre_producto}</td>
                  <td>${row.precio}</td>
                  <td>${row.promocion}% de descuento</td>
                  <td>${row.cantidad_comprados}</td>
                  <td>${row.precio_comprados}</td>
                </tr>
                `;
            }
            darTotal(`${row.id_factura_cliente}`);       
        });
        // Se agregan los elementos de tabla a su tabla correspondiente
        $('#CuerpoTabla'+id).html( content );
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

/*Función que genera el total de un pedido*/
function darTotal( id_factura ){
  $.ajax({
      type: 'post',
      url: API_CARRITO + 'darTotal2',
      data: { id_factura : id_factura },
      type: 'post'
  })
  .done(function( response ) {
      // Se evalua si la API respondio como se esperaba sino se muestra un mensaje de error.
      if ( response.status ) {
          let total2 = 0
          response.dataset.forEach(function( row ) {
              total2 = row.total;
              $( '.coso'+id_factura ).text('Cantidad a pagar (USD$): $'+total2);
              console.log('el total es'+total2);
          });
      } else {
          sweetAlert( 2, response.exception, null );
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

/*Funcion que envia el id de una factura para generar el comprobante de compra*/
function enviarIdFactura( id_factura ){
    $.ajax({
        type: 'post',
        url: API_CARRITO + 'enviarIdFactura',
        data: { id_factura : id_factura },
        type: 'post'
    })
    .done(function( response ) {
        // Se comprueba si la API ha retornado una respuesta satisfactoria, de lo contrario se muestra un mensaje de error.
        if ( response.status ) {
            console.log( response.message )
        } else {
            sweetAlert( 2, response.exception, null );
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