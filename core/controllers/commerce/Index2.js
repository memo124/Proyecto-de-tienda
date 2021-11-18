/*Se crea una constante que establecera comunicacion con la API*/
const API_INDEX2 = '../../core/api/commerce/index2.php?action=';
const API_CARRITO = '../../core/api/commerce/carrito.php?action=';

// Función ejecutada cuando el documento está listo
$( document ).ready(function() {
    // Se llama a la funcion que contiene los datos de los productos
	mostrarDatos( API_INDEX2 );
	mostrarDatos2( API_INDEX2 );
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

/*Función que llenara el carrusel de productos con los datos de la consulta ajax*/
function llenarCarrusel( dataset )
{
	let content = '';
    // Se recorreran los conjuntos de los registros por medio del objeto row.
    dataset.forEach(function( row ) {
			/*Se evalua si la promoción es diferente de 0 para mostrarla, sino se omite el
			mostrar la promoción*/
			if( row.promocion != 0 ){
				/* Se crean los elementos de la lista del carrusel en base a los registros
				y se mostrara la promoción porque es diferente de 0.*/
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
						<p class="a_carta">${row.promocion}% de descuento</p>
						<a onclick="AbrirModalComprar(${row.id_productos})" class="btn-medium waves-effect waves-light red btn">Comprar</a>
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
						<a onclick="AbrirModalComprar(${row.id_productos})" class="btn-medium waves-effect waves-light red btn">Comprar</a>
					</div>
				</div>
				`;
			}
	});
	 // Se agregan los elementos al carrusel de productos
	 $( '.carrusel_lista' ).html( content );
	 new Glider(document.querySelector('.carrusel_lista'), {
		slidesToShow: 1,
		slidesToScroll: 1,
		draggable: true,
		dots: '.carrusel_indicadores',
		arrows: {
			prev: '.carrusel_anterior',
			next: '.carrusel_siguiente'
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
}

function llenarCarrusel2( dataset )
{
	let content = '';
    // Se recorreran los conjuntos de los registros por medio del objeto row.
    dataset.forEach(function( row ) {
		// Se crean los elementos de la lista del carrusel en base a los registros.
		content += `
		<div class="carrusel_elemento elemento">
            <div class="ContenedorImgP2">
                <img class="P1" src="../../resources/img/cards/logos/${row.imagen_marca}">
            </div>
            <div>
                <hr class="HR_P2">
                <p class="a_carta">${row.marcas}</p>
                <p class="a_carta">Productos: ${row.productospormarca}</p>
                <hr class="HR_P2">
            </div>
        </div>
		`;
	});
	 // Se agregan los elementos al carrusel de productos
	 $( '.carrusel_lista2' ).html( content );
	 new Glider(document.querySelector('.carrusel_lista2'), {
		slidesToShow: 1,
		slidesToScroll: 1,
		draggable: true,
		dots: '.carrusel_indicadores2',
		arrows: {
			prev: '.carrusel_anterior2',
			next: '.carrusel_siguiente2'
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
}

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