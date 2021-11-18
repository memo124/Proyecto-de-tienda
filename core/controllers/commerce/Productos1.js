// Constante para establecer la comunicación con la API.
const API_PRODUCTOS1 = '../../core/api/commerce/Productos1.php?action=';

// Método que se ejecutara cuando el documento se encuentra listo.
$( document ).ready(function() {
    readProductos1();
});

/* Función para mostrar los detalles de los productos con cantidad disponible mayor que 0,
  y con un estado de producto en existencia*/
function readProductos1()
{
    //Conversion a ajax
    $.ajax({
        dataType: 'json',
        url: API_PRODUCTOS1 + 'readAll'
    })
    .done(function( response ) {
        // se evalua si la API retornó datos, sino se muestra un mensaje de error
        if ( response.status ) {
            let content = '';
            // se recorren los registros mediante forEach y con el objeto row
            response.dataset.forEach(function( row ) {
                /* Se evalua si la promocion es mayor a 0 para mostrarla, sino se omite*/
                if ( row.promocion > 0 ) {
                    /* se crean las cajas con la información de las productos con su cantidad de productos mayor que 0,
                    y con un estado de producto en existencia*/
                    content += `
                <!--Acá se crean cada uno de los elementos que van dentro del contenedor, muestran la información de los productos-->
                    <div class="row elemento_marca1">
                        <div class="col l6 m6 s12 DIV_VR_IMG">
                            <img src="../../resources/img/cards/${row.imagen}" class="materialboxed center-align z-depth-3 Img1">
                        </div>
                        <div class="col l6 m6 s12 contenedor_info_producto1">
                            <h5>Detalles del producto</h5>
                            <hr>
                            <p class="info_producto1">N°: ${row.id_productos}</p>
                            <p class="info_producto1">Nombre: ${row.nombre_producto}</p>
                            <p class="info_producto1">Tipo de producto: ${row.tipo_producto}</p>
                            <p class="info_producto1">Marca: ${row.marcas}</p>
                            <p class="info_producto1">Cantidad disponible: ${row.cantidad_producto}</p> 
                            <p class="info_producto1">Precio (USD$): ${row.precio}</p>                           
                            <p class="info_producto1">Promocion: ${row.promocion}% de descuento</p>
                        </div>
                    </div>
                `;
                } else {
                    /* se crean las cajas con la información de las productos con su cantidad de productos mayor que 0,
                    y con un estado de producto en existencia*/
                    content += `
                    <!--Acá se crean cada uno de los elementos que van dentro del contenedor, muestran la información de los productos-->
                        <div class="row elemento_marca1">
                            <div class="col l6 m6 s12 DIV_VR_IMG">
                                <img src="../../resources/img/cards/${row.imagen}" class="materialboxed center-align z-depth-3 Img1">
                            </div>
                            <div class="col l6 m6 s12 contenedor_info_producto1">
                                <h5>Detalles del producto</h5>
                                <hr>
                                <p class="info_producto1">N°: ${row.id_productos}</p>
                                <p class="info_producto1">Nombre: ${row.nombre_producto}</p>
                                <p class="info_producto1">Tipo de producto: ${row.tipo_producto}</p>
                                <p class="info_producto1">Marca: ${row.marcas}</p>
                                <p class="info_producto1">Cantidad disponible: ${row.cantidad_producto}</p> 
                                <p class="info_producto1">Precio (USD$): ${row.precio}</p>                           
                            </div>
                        </div>
                    `;
                }
                
            });
            // Se agregan las cajas a su respectivo contenedor
            $( '#ContenedorProductos1' ).html( content );
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
        url: API_PRODUCTOS1 + 'search',
        data: $( '#Buscar_marca').serialize(),
        dataType: 'json'
    })
    .done(function( response ) {
        // se evalua si la API retornó datos, sino se muestra un mensaje de error
        if ( response.status ) {
            let content = '';
            // se recorren los registros mediante forEach y con el objeto row
            response.dataset.forEach(function( row ) {
                /* Se evalua si la promocion es mayor a 0 para mostrarla, sino se omite*/
                if ( row.promocion > 0 ) {
                    /* se crean las cajas con la información de las productos con su cantidad de productos mayor que 0,
                    y con un estado de producto en existencia*/
                    content += `
                <!--Acá se crean cada uno de los elementos que van dentro del contenedor, muestran la información de los productos-->
                    <div class="row elemento_marca1">
                        <div class="col l6 m6 s12 DIV_VR_IMG">
                            <img src="../../resources/img/cards/${row.imagen}" class="materialboxed center-align z-depth-3 Img1">
                        </div>
                        <div class="col l6 m6 s12 contenedor_info_producto1">
                            <h5>Detalles del producto</h5>
                            <hr>
                            <p class="info_producto1">N°: ${row.id_productos}</p>
                            <p class="info_producto1">Nombre: ${row.nombre_producto}</p>
                            <p class="info_producto1">Tipo de producto: ${row.tipo_producto}</p>
                            <p class="info_producto1">Marca: ${row.marcas}</p>
                            <p class="info_producto1">Cantidad disponible: ${row.cantidad_producto}</p> 
                            <p class="info_producto1">Precio (USD$): ${row.precio}</p>                           
                            <p class="info_producto1">Promocion: ${row.promocion}% de descuento</p>
                        </div>
                    </div>
                `;
                } else {
                    /* se crean las cajas con la información de las productos con su cantidad de productos mayor que 0,
                    y con un estado de producto en existencia*/
                    content += `
                    <!--Acá se crean cada uno de los elementos que van dentro del contenedor, muestran la información de los productos-->
                        <div class="row elemento_marca1">
                            <div class="col l6 m6 s12 DIV_VR_IMG">
                                <img src="../../resources/img/cards/${row.imagen}" class="materialboxed center-align z-depth-3 Img1">
                            </div>
                            <div class="col l6 m6 s12 contenedor_info_producto1">
                                <h5>Detalles del producto</h5>
                                <hr>
                                <p class="info_producto1">N°: ${row.id_productos}</p>
                                <p class="info_producto1">Nombre: ${row.nombre_producto}</p>
                                <p class="info_producto1">Tipo de producto: ${row.tipo_producto}</p>
                                <p class="info_producto1">Marca: ${row.marcas}</p>
                                <p class="info_producto1">Cantidad disponible: ${row.cantidad_producto}</p> 
                                <p class="info_producto1">Precio (USD$): ${row.precio}</p>                           
                            </div>
                        </div>
                    `;
                }
                
            });
            // Se agregan las cajas a su respectivo contenedor
            $( '#ContenedorProductos1' ).html( content );
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