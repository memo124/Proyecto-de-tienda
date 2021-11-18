// Constante para establecer la comunicación con la API respectiva.
const API_MARCAS1 = '../../core/api/commerce/Marcas1U.php?action=';

// Método que se ejecutara cuando el documento se encuentra listo.
$( document ).ready(function() {
    readMarcas1();
});

/* Función para mostrar los detalles de las marcas con su cantidad de productos mayor que 0,
  y con un estado de producto en existencia*/
  function readMarcas1()
  {
      //Conversion a ajax
      $.ajax({
          dataType: 'json',
          url: API_MARCAS1 + 'readAll'
      })
      .done(function( response ) {
          // se evalua si la API retornó datos, sino se muestra un mensaje de error
          if ( response.status ) {
              let content = '';
              // se recorren los registros mediante forEach y con el objeto row
              response.dataset.forEach(function( row ) {
                  /* se crean las cajas con la información de las marcas con su cantidad de productos mayor que 0,
                      y con un estado de producto en existencia*/
                  content += `
                  <!--Acá se crean cada uno de los elementos que van dentro del contenedor, muestran la información de las marcas-->
                  <div class="row elemento_marca1">
                      <div class="col l6 m6 s12 DIV_VR_IMG">
                          <img src="../../resources/img/cards/logos/${row.imagen_marca}" class="materialboxed center-align z-depth-3 Img1">
                      </div>
                      <div class="col l6 m6 s12 contenedor_info_marca1">
                          <h5>Detalles de la marca</h5>
                          <hr>
                          <p class="info_marca1">N°: ${row.id_marcas}</p>
                          <p class="info_marca1">Nombre: ${row.marcas}</p>
                          <p class="info_marca1">Productos de esta marca: ${row.productospormarca}</p>
                      </div>
                  </div>
                  `;
              });
              // Se agregan las cajas a su respectivo contenedor
              $( '#ContenedorMarcas1' ).html( content );
              // Se inicializa el componente materialboxed para que cada imagen tenga un efecto
              $( '.materialboxed' ).materialbox();
          }
      })
      .fail(function( jqXHR ) {
          // Se evalua si la API respondio para dar una respuesta, sino se muestra un mensaje de error por consola
          if ( jqXHR.status == 200 ) {
              console.log( jqXHR.responseText );
          } else {
              console.log( jqXHR.status + ' ' + jqXHR.statusText );
          }
      });
  }

// Evento que muestra los datos al momento de buscar
$( '#Buscar_marca' ).submit(function( event ) {
    //Acá se evita recargar la página cuando fue enviado el formulario
    event.preventDefault();
    //Conversion a ajax
    $.ajax({
        type: 'post',
        url: API_MARCAS1 + 'search',
        data: $( '#Buscar_marca').serialize(),
        dataType: 'json'
    })
    .done(function( response ) {
        // se evalua si la API retornó datos, sino se muestra un mensaje de error
        if ( response.status ) {
            let content = '';
            // se recorren los registros mediante forEach y con el objeto row
            response.dataset.forEach(function( row ) {
                /* se crean las cajas con la información de las marcas con su cantidad de productos mayor que 0,
                    y con un estado de producto en existencia*/
                content += `
                <!--Acá se crean cada uno de los elementos que van dentro del contenedor, muestran la información de las marcas-->
                <div class="row elemento_marca1">
                    <div class="col l6 m6 s12 DIV_VR_IMG">
                        <img src="../../resources/img/cards/logos/${row.imagen_marca}" class="materialboxed center-align z-depth-3 Img1">
                    </div>
                    <div class="col l6 m6 s12 contenedor_info_marca1">
                        <h5>Detalles de la marca</h5>
                        <hr>
                        <p class="info_marca1">N°: ${row.id_marcas}</p>
                        <p class="info_marca1">Nombre: ${row.marcas}</p>
                        <p class="info_marca1">Productos de esta marca: ${row.productospormarca}</p>
                    </div>
                </div>
                `;
            });
            // Se agregan las cajas a su respectivo contenedor
            $( '#ContenedorMarcas1' ).html( content );
            // Se inicializa el componente materialboxed para que cada imagen tenga un efecto
            $( '.materialboxed' ).materialbox();
            sweetAlert( 1, response.message, null );
        } else {
            sweetAlert( 2, response.exception, null );
        }
        
    })
    .fail(function( jqXHR ) {
        // Se evalua si la API respondio para dar una respuesta, sino se muestra un mensaje de error por consola
        if ( jqXHR.status == 200 ) {
            console.log( jqXHR.responseText );
        } else {
            console.log( jqXHR.status + ' ' + jqXHR.statusText );
        }
    });
});