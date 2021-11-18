// Constantes para establecer la comunicación con las API'S respectivas.
const API_PRODUCTOS1 = '../../core/api/commerce/Productos1U.php?action=';
const API_CARRITO = '../../core/api/commerce/carrito.php?action=';
const API_INDEX2 = '../../core/api/commerce/index2.php?action=';

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
                            <a onclick="AbrirModalComprar(${row.id_productos})" class="btn-medium waves-effect waves-light red btn">Comprar</a>
                            <p class="info_producto1"></p>  
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
                                <a onclick="AbrirModalComprar(${row.id_productos})" class="btn-medium waves-effect waves-light red btn">Comprar</a>
                                <p class="info_producto1"></p>                           
                            </div>
                        </div>
                    `;
                }
                
            });
            // Se agregan las cajas a su respectivo contenedor
            $( '#ContenedorProductos1U' ).html( content );
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
$( '#Buscar_producto' ).submit(function( event ) {
    //Acá se evita recargar la página cuando fue enviado el formulario
    event.preventDefault();
    //Conversion a ajax
    $.ajax({
        type: 'post',
        url: API_PRODUCTOS1 + 'search',
        data: $( '#Buscar_producto').serialize(),
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
                            <a onclick="AbrirModalComprar(${row.id_productos})" class="btn-medium waves-effect waves-light red btn">Comprar</a>
                            <p class="info_producto1"></p>
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
                                <a onclick="AbrirModalComprar(${row.id_productos})" class="btn-medium waves-effect waves-light red btn">Comprar</a>
                                <p class="info_producto1"></p>                          
                            </div>
                        </div>
                    `;
                }
                
            });
            // Se agregan las cajas a su respectivo contenedor
            $( '#ContenedorProductos1U' ).html( content );
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


// Evento que sirve para añadir un producto al carrito de compras
$( '#Form_compra' ).submit(function( event ) {
    //Acá se elimina recargar la página despues de enviar el formulario de comprar
	event.preventDefault();
	//Acá se crea la consulta ajax para enviar los datos a la API, dando algunos detalles de la misma consulta
    $.ajax({
        type: 'post',
        url: API_CARRITO + 'createDetail',
        data: $( '#Form_compra' ).serialize(),
        dataType: 'json'
    })
    .done(function( response ) {
        // se evalua si la API respondio como se esperaba, sino se muestra un mensaje de error
        if ( response.status ) {
            sweetAlert( 1, response.message, 'Carrito.php' );
        } else {
            // se evalua si el usuario ha iniciado sesión, dependiendo de ello será el resultado
            if ( response.session ) {
                sweetAlert( 2, response.exception, null );
            } else {
                sweetAlert( 3, response.exception, 'Login.php' );
            }
        }
    })
    .fail(function( jqXHR ) {
        // se evalua si la API respondio para mostrar la respuesta, sin se muestra el mensaje de error por consola
        if ( jqXHR.status == 200 ) {
            console.log( jqXHR.responseText );
        } else {
            console.log( jqXHR.status + ' ' + jqXHR.statusText );
        }
    });
});

/*Función que llena los campos del formulario comforme sean los datos del producto seleccionado*/
function AbrirModalComprar( id ) {
	//Se resetean los campos del formulario de compras
    $( '#Form_compra' )[0].reset();
    //Se abre la ventana modal que tiene el formulario que dara detalles de la compra
    $( '#save-modal' ).modal( 'open' );
    //Se coloca el titulo a la ventana modal de las compras
    $( '#modal-title' ).text( 'Detalles de la compra' );
    //Se desactivan los campos de promocion y precio
	$( '#txt_promocion' ).prop( 'disabled', true );
	$( '#txt_precio' ).prop( 'disabled', true );
	M.updateTextFields();
	$.ajax({
        dataType: 'json',
        url: API_INDEX2 + 'DatosCompras',
        data: { id_producto: id },
        type: 'post'
    })
    .done(function( response ) {
        // Se evalua si la API respondio correctamente, sino se muestra un mensaje de error.
        if ( response.status ) {
			var Resultado = 0,
					esto = '';
			$( '#id_productos' ).val( response.dataset.id_productos );
            // Se recorren los datos que retorno la API mediate forEach y el objeto row
            response.dataset.forEach(function( row ) {
				/*Se crean algunas variables a utilizar durante el calculo de precios de los productos*/
				console.log(row.id_productos);
				document.getElementById('id_productos').value = row.id_productos;
				var campo_cantidad2 = document.getElementById('cantidad'),
						campo_producto = document.getElementById('id_productos'),
						campo_precio2 = document.getElementById('precio');
				/*Se evalua si la cantidad disponible de producto es mayor o 
				igual a 100 y la promocion del producto es igual a 0*/
				if ( row.cantidad_producto >= 100 && row.promocion == 0 ) {
						/*Se crean algunas variables a utilizar durante el calculo de precios de los productos*/
						campo_precio = document.getElementById('txt_precio');
						campo_cantidad = document.getElementById('txt_cantidad');
						campo_promocion = document.getElementById('txt_promocion');
						Icono_promo = document.getElementById('icono_promocion');
						Resultado = (1 * row.precio);
						campo_precio.value = 'Cantidad a pagar (USD$): '+Resultado.toFixed(2);
						campo_cantidad.min = 1;
						campo_cantidad.max = 100;
						campo_cantidad.step = '1';
						campo_cantidad.value = 1;
						campo_promocion.style.display = none ;
						Icono_promo.style.opacity = 0 ;
						campo_producto.value = row.id_productos;
						campo_precio2.value = Resultado.toFixed(2);
						campo_cantidad2.value = 1;
						/*Se le asigna un evento keyup, que es cuando se termina de presionar una tecla mediante el metodo addEventListener para multiplicar
						el precio de un producto por la cantidad a comprar y aplicar descuento a la vez, si cumple con las condiciones establecidas*/
						campo_cantidad.addEventListener('keyup', (event)=>{
							/*Se crea una variable que accede al valor del campo de cantidad de producto*/
							var Valor = event.path[0].value;
							/*se evalua que la variable valor sea mayor a 0*/
							if ( Valor <=0 ) {
								console.log('la cantidad de productos no debe ser menor que 1');
							/*se evalua que la variable valor sea menor a 100*/
							} else if ( Valor > 100 ) {
								console.log('la cantidad de productos no debe ser mayor que 100');
							} else {
								/*se realizan los calculos conforme al caso y se envian los valores a los campos*/
								Resultado = (Valor * row.precio);
								esto = 'Cantidad a pagar (USD$): '+Resultado.toFixed(2);
								document.getElementById('txt_precio').value = esto;
								console.log(Valor);
								campo_precio2.value = Resultado.toFixed(2);
								campo_cantidad2.value = Valor;
							}
                        });
                    /*Se evalua si la cantidad disponible de producto es mayor o igual a 100 y la promocion del producto es mayor que 0*/
					} else if ( row.cantidad_producto >= 100 && row.promocion > 0 ) {
						campo_precio = document.getElementById('txt_precio');
						campo_cantidad = document.getElementById('txt_cantidad');
						campo_promocion = document.getElementById('txt_promocion');
						Resultado = ((( 1 * row.precio )-(( 1 * row.precio)*(row.promocion/100))));
						campo_precio.value = 'Cantidad a pagar (USD$): '+Resultado.toFixed(2);
						campo_cantidad.min = 1;
						campo_cantidad.max = 100;
						campo_cantidad.step = '1';
						campo_cantidad.value = 1;
						campo_promocion.value = row.promocion+'% de descuento';
						campo_producto.value = row.id_productos;
						campo_precio2.value = Resultado.toFixed(2);
						campo_cantidad2.value = 1;
						/*Se le asigna un evento keyup, que es cuando se termina de presionar una tecla mediante el metodo addEventListener para multiplicar
						el precio de un producto por la cantidad a comprar y aplicar descuento a la vez, si cumple con las condiciones establecidas*/
						campo_cantidad.addEventListener('keyup', (event)=>{
							/*Se crea una variable que accede al valor del campo de cantidad de producto*/
							var Valor = event.path[0].value;
							/*se evalua que la variable valor sea mayor a 0*/
							if ( Valor <=0 ) {
								console.log('la cantidad de productos no debe ser menor que 1');
							/*se evalua que la variable valor sea menor a 100*/
							} else if ( Valor > 100 ) {
								console.log('la cantidad de productos no debe ser mayor que 100');
							} else {
								/*se realizan los calculos conforme al caso y se envian los valores a los campos*/
								Resultado = (((Valor * row.precio)-((Valor * row.precio)*(row.promocion/100))));
								esto = 'Cantidad a pagar (USD$): '+Resultado.toFixed(2);
								document.getElementById('txt_precio').value = esto;
								console.log(Valor);
								campo_precio2.value = Resultado.toFixed(2);
								campo_cantidad2.value = Valor;
							}
						});
					/*Se evalua si la cantidad disponible de producto es menor que
					100 y la promocion del producto es igual a 0*/
					} else if ( row.cantidad_producto < 100 && row.promocion == 0 ) {
						campo_precio = document.getElementById('txt_precio');
						campo_cantidad = document.getElementById('txt_cantidad');
						campo_promocion = document.getElementById('txt_promocion');
						Icono_promo = document.getElementById('icono_promocion');
						Resultado = (1 * row.precio);
						campo_precio.value = 'Cantidad a pagar (USD$): '+Resultado.toFixed(2);
						campo_cantidad.min = 1;
						campo_cantidad.max = row.cantidad_producto;
						campo_cantidad.step = '1';
						campo_cantidad.value = 1;
						campo_promocion.style.display = none ;
						Icono_promo.style.opacity = 0;
						campo_producto.value = row.id_productos;
						campo_precio2.value = Resultado;
						campo_cantidad2.value = 1;
						/*Se le asigna un evento keyup, que es cuando se termina de presionar una tecla mediante el metodo addEventListener para multiplicar
						el precio de un producto por la cantidad a comprar y aplicar descuento a la vez, si cumple con las condiciones establecidas*/
						campo_cantidad.addEventListener('keyup', (event)=>{
							/*Se crea una variable que accede al valor del campo de cantidad de producto*/
							var Valor = event.path[0].value;
							/*se evalua que la variable valor sea mayor a 0*/
							if ( Valor <=0 ) {
								console.log('la cantidad de productos no debe ser menor que 1');
							/*se evalua que la variable valor sea menor a la cantidad de producto disponible*/
							} else if ( Valor > row.cantidad_producto ) {
								console.log('la cantidad de productos no debe ser mayor que la cantidad disponible');
							} else {
								/*se realizan los calculos conforme al caso y se envian los valores a los campos*/
								Resultado = (Valor * row.precio);
								esto = 'Cantidad a pagar (USD$): '+Resultado.toFixed(2);
								document.getElementById('txt_precio').value = esto;
								console.log(Valor);
								campo_precio2.value = Resultado.toFixed(2);
								campo_cantidad2.value = Valor;				
							}
                            });
                        /*Se evalua si la cantidad disponible de producto es menor que
					    100 y la promocion del producto es mayor que 0*/
						} else if ( row.cantidad_producto < 100 && row.promocion > 0 ) {
						campo_precio = document.getElementById('txt_precio');
						campo_cantidad = document.getElementById('txt_cantidad');
						campo_promocion = document.getElementById('txt_promocion');
						Resultado = ((( 1 * row.precio )-(( 1 * row.precio)*(row.promocion/100))));
						campo_precio.value = 'Cantidad a pagar (USD$): '+Resultado.toFixed(2);
						campo_cantidad.min = 1;
						campo_cantidad.max = row.cantidad_producto;
						campo_cantidad.step = '1';
						campo_cantidad.value = 1;
						campo_promocion.value = row.promocion+'% de descuento';
						campo_producto.value = row.id_productos;
						campo_precio2.value = Resultado.toFixed(2);
						campo_cantidad2.value = 1;
						/*Se le asigna un evento keyup, que es cuando se termina de presionar una tecla mediante el metodo addEventListener para multiplicar
						el precio de un producto por la cantidad a comprar y aplicar descuento a la vez, si cumple con las condiciones establecidas*/
						campo_cantidad.addEventListener('keyup', (event)=>{
							/*Se crea una variable que accede al valor del campo de cantidad de producto*/
							var Valor = event.path[0].value;
							/*se evalua que la variable valor sea mayor a 0*/
							if ( Valor <=0 ) {
								console.log('la cantidad de productos no debe ser menor que 1');
							/*se evalua que la variable valor sea menor a la cantidad de producto disponible*/
							} else if ( Valor > row.cantidad_producto ) {
								console.log('la cantidad de productos no debe ser mayor que la cantidad disponible');
							} else {
								/*se realizan los calculos conforme al caso y se envian los valores a los campos*/
								Resultado = (((Valor * row.precio)-((Valor * row.precio)*(row.promocion/100))));
								esto = 'Cantidad a pagar (USD$): '+Resultado.toFixed(2);
								document.getElementById('txt_precio').value = esto;
								console.log(Valor);
								campo_precio2.value = Resultado.toFixed(2);
								campo_cantidad2.value = Valor;
							}
						});
			        }
		        });
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