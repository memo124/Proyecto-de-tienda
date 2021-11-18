// Constante para establecer la comunicación con la API.
const API_PRODUCTOS2 = '../../core/api/commerce/Productos2.php?action=';

// Método que se ejecutara cuando el documento se encuentra listo.
$( document ).ready(function() {
    /*Invocación del método que obtendra los ID y nombre de los tipos de producto
    para poder crear los carruseles y luego creara los elementos que iran dentro
    del carrusel correspondiente*/
    obtenerIdProductos();
});


function obtenerIdProductos(){
    $.ajax({
        dataType: 'json',
        url: API_PRODUCTOS2 + 'obtenerID'
    })
    .done(function( response ) {
        /* Se evalua si la API respondio correctamente y retorno datos, sino se 
        mostrara un mensaje de error.*/
        if ( response.status ) {
            let content = '';
            response.dataset.forEach(function( row ) {
                /*Se crean los carruseles segun el id del tipo de producto
                y el titulo con el nombre del tipo de producto*/
                content += `
                <div>
                    <div class="row">
                        <!--Creación de encabezado-->
                        <h3 style="text-align: center;" id="h3_encabezado2" class="h3_encabezado_marcas2">${row.tipo_producto}</h3>
                    </div>
                    <div class="row">
                        <div class="col l12 m12 s12">
                            <!--Creación de carrusel de tipo de productos con sus productos-->
                            <div class="carrusel">
                                <div class="contenedor_carrusel contenedor">
                                    <!--Creación de boton de navegación anterior de carrusel de tipo de productos con sus productos-->
                                    <button aria-label="Anterior" class="carrusel_anterior${row.id_tipo_producto} anterior">
                                        <i class="fas fa-chevron-left"></i>
                                    </button>
                                    <!--Creación de lista de elementos de carrusel de tipo de productos con sus productos-->
                                    <div class="carrusel_lista${row.id_tipo_producto} lista">
                                        <!--Creación elementos de carrusel de tipo de productos con sus productos-->
                                        
                                    </div>
                                    <!--Creación de boton de navegación siguiente de carrusel de tipo de productos con sus productos-->
                                    <button aria-label="Siguiente" class="carrusel_siguiente${row.id_tipo_producto} siguiente">
                                        <i class="fas fa-chevron-right"></i>
                                    </button>
                                </div>
                                <!--Creación de indicadores de carrusel de tipo de productos con sus productos-->
                                <div role="tablist" class="carrusel_indicadores${row.id_tipo_producto} indicadores"></div>
                            </div>
                        </div>
                    </div>
                </div>
                `;
                /*Se agregan los carruseles a la caja que los contiene*/
                $('.CajaScrollProductos2').html( content );
                /*Se le envia el valor del ID del tipo de producto al metodo que obtendra los datos de
                los productos que pertenecen a ese tipo e imprimira los elementos con los datos de
                los productos pertenecientes a ese tipo y los agregara a su carrusel*/
                llenarCarruseles(`${row.id_tipo_producto}`);
            });
        }
    })
    .fail(function( jqXHR ) {
        alert('No sirvio cerote o no hay tipos, montale riata a memo');
    });
}

function llenarCarruseles2( id ){
    $.ajax({
        dataType: 'json',
        url: API_PRODUCTOS2 + 'readProductos',
        data: { id_tipo: id },
        type: 'post'
    })
    .done(function( response ) {
        // Se evalua si la API respondio correctamente, sino se muestra un mensaje de error.
        if ( response.status ) {
            //se crea una variable que servira contador para limitar la cantidad de productos a mostrar por tipo
	        var limite_mostrar = 0;
            let content = '';
            // Se recorren los datos que retorno la API mediate forEach y el objeto row
            response.dataset.forEach(function( row ) {
                //se evalua si el valor de la variable contador es menor a 20, si lo es mostrara más registros
		    if( limite_mostrar < 20 ) {
                //se incrementa en 1 el valor de la variable contador
                limite_mostrar++
                /*Se evalua si la promoción es diferente de 0 para mostrarla, sino se omite mostrarla*/
                if( row.promocion != 0 ){
                    /* Se crean los elementos de la lista del carrusel en base a los registros
                    y se mostrara la promoción porque es diferente de 0.*/
                    /*Se crean los elementos que iran dentro del carrusel correspondiente*/
                    /*Se crean los elementos que iran dentro del carrusel correspondiente*/
                    content += `
                    <div class="carrusel_elemento elemento">
                        <img class="P1" src="../../resources/img/cards/${row.imagen}">
                        <div>
                            <hr class="HR_P2">
                            <p class="a_carta">${row.nombre_producto}</p>
                            <p class="a_carta">De ${row.marcas}</p>
                            <p class="a_carta">Precio (USD$): ${row.precio}</p>
                            <p class="a_carta">${row.promocion}% de descuento</p>
                        </div>
                    </div>
                    `;
                } else {
                    /*Se crean los elementos de la lista del carrusel en base a los registros 
                    y no se mostrara la promocion porque vale 0.*/
                    content += `
                        <div class="carrusel_elemento elemento">
                            <div class="ContenedorImgP2">
                                <img class="P1" src="../../resources/img/cards/${row.imagen}">
                            </div>
                            <div>
                                <hr class="HR_P2">
                                <p class="a_carta">${row.nombre_producto}</p>
                                <p class="a_carta">De ${row.marcas}</p>
                                <p class="a_carta">Precio (USD$): ${row.precio}</p>
                            </div>
                        </div>
                    `;
                }
            }
            });
            // Se agregan los elementos al carrusel correspondiente mediante su id
            $('.carrusel_lista'+id).html( content );
            // Acá establecemos más detalles sobre el diseño que tendrá el carrusel
            new Glider(document.querySelector('.carrusel_lista'+id), {
                slidesToShow: 1,
                slidesToScroll: 1,
                draggable: true,
                dots: '.carrusel_indicadores'+id,
                arrows: {
                    prev: '.carrusel_anterior'+id,
                    next: '.carrusel_siguiente'+id
                },
                responsive: [
                    {
                      // screens greater than >= 775px
                      breakpoint: 450,
                      settings: {
                        // Set to `auto` and provide item width to adjust to viewport
                        slidesToShow: 2,
                        slidesToScroll: 2
                      }
                    },{
                      // screens greater than >= 1024px
                      breakpoint: 800,
                      settings: {
                        slidesToShow: 4,
                        slidesToScroll: 4
                      }
                    }
                ]
            });
        } else {
            alert('No sirvio cerote, montale verga a memo');
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




