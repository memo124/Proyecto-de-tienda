// Constante para establecer la ruta y parámetros de comunicación con la API.
const API_CARRITO = '../../core/api/commerce/carrito.php?action=';
const API_INDEX2 = '../../core/api/commerce/index2.php?action=';

// Método que se ejecuta cuando el documento está listo.
$( document ).ready(function() {
    // Se llama a la función que obtiene los productos del carrito de compras para llenar la tabla en la vista.
    readCart();
});

// Función para obtener el detalle del pedido (carrito de compras).
function readCart()
{
    $.ajax({
        dataType: 'json',
        url: API_CARRITO + 'readCart'
    })
    .done(function( response ) {
        // Se comprueba si la API ha retornado una respuesta satisfactoria, de lo contrario se muestra un mensaje y se direcciona a la página principal.
        if ( response.status ) {
            // Se declara e inicializa una variable para concatenar las filas de la tabla en la vista.
            let content = '';
            // Se declara e inicializa una variable para calcular el importe por cada producto.
            let total = 0;
            let sumatoria = 0;
            // Se recorre el conjunto de registros (dataset) fila por fila a través del objeto row.
            response.dataset.forEach(function( row ) {
                // Se crean y concatenan las filas de la tabla con los datos de cada registro.
                if ( row.id_detalle_factura %2==0 ) {
                    content += `
                    <tr style="background: rgba(0, 0, 0, .6); color: white; font-size: larger; margin-top: 5px; margin-bottom: 5px;">
                        <td>${row.nombre_producto}</td>
                        <td>${row.precio}</td>
                        <td>${row.promocion}%</td>
                        <td>${row.cantidad_comprados}</td>
                        <td>${row.precio_comprados}</td>
                        <td>
                            <a href="#" onclick="AbrirModalComprar( ${row.id_productos}, ${row.precio_comprados}, ${row.cantidad_comprados}, ${row.id_detalle_factura} )" class="z-depth-3 btn-floating btn-medium waves-effect waves-light cyan blue-text tooltipped" data-tooltip="Editar producto del carrito"><i class="material-icons">mode_edit</i></a>
                            <a href="#" onclick="openDeleteDialog( ${row.id_detalle_factura} )" class="z-depth-3 btn-floating btn-medium waves-effect waves-light red red-text tooltipped" data-tooltip="Eliminar producto del carrito"><i class="material-icons">delete</i></a>
                        </td>
                    </tr>
                `;
                } else {
                    content += `
                    <tr style="background: white; color: black; font-size: larger; margin-top: 5px; margin-bottom: 5px;">
                        <td>${row.nombre_producto}</td>
                        <td>${row.precio}</td>
                        <td>${row.promocion}%</td>
                        <td>${row.cantidad_comprados}</td>
                        <td>${row.precio_comprados}</td>
                        <td>
                        <a href="#" onclick="AbrirModalComprar( ${row.id_productos}, ${row.precio_comprados}, ${row.cantidad_comprados}, ${row.id_detalle_factura} )" class="z-depth-3 btn-floating btn-medium waves-effect waves-light cyan blue-text tooltipped" data-tooltip="Editar producto del carrito"><i class="material-icons">mode_edit</i></a>
                            <a href="#" onclick="openDeleteDialog( ${row.id_detalle_factura} )" class="z-depth-3 btn-floating btn-medium waves-effect waves-light red red-text tooltipped" data-tooltip="Eliminar producto del carrito"><i class="material-icons">delete</i></a>
                        </td>
                    </tr>
                `;
                }
                darTotal(`${row.id_factura_cliente}`);
            });
            // Se agregan las filas al cuerpo de la tabla mediante su id para mostrar los registros.
            $( '.CuerpoTabla2' ).html( content );
            // Se inicializa el componente Tooltip asignado a los enlaces para que funcionen las sugerencias textuales.
            $( '.tooltipped' ).tooltip();
        } else {
            sweetAlert( 4, response.exception, 'index2.php' );
        }
    })
    .fail(function( jqXHR ) {
        // Se verifica si la API respondio para mostrar la respuesta, sino se presenta el estado de la consulta AJAX..
        if ( jqXHR.status == 200 ) {
            console.log( jqXHR.responseText );
        } else {
            console.log( jqXHR.status + ' ' + jqXHR.statusText );
        }
    });
}
// Función que abre una caja de dialogo para confirmar la eliminación de un producto del carrito de compras.
function openDeleteDialog( id )
{
    swal({
        title: 'Advertencia',
        text: '¿Desea eliminar esté producto del carrito de compras?',
        icon: 'warning',
        buttons: ['No', 'Sí'],
        closeOnClickOutside: false,
        closeOnEsc: false
    })
    .then(function( value ) {
        // Se verifica si fue cliqueado el botón Sí para realizar la petición respectiva, de lo contrario no se hace nada.
        if ( value ) {
            $.ajax({
                type: 'post',
                url: API_CARRITO + 'deleteDetail',
                data: { id_detalle: id },
                dataType: 'json'
            })
            .done(function( response ) {
                // Se comprueba si la API ha retornado una respuesta satisfactoria, de lo contrario se muestra un mensaje de error.
                if ( response.status ) {
                    // Se cargan nuevamente las filas en la tabla de la vista después de borrar un producto del pedido.
                    readCart();
                    sweetAlert( 1, response.message, null );
                } else {
                    sweetAlert( 2, response.exception, null );
                }
            })
            .fail(function( jqXHR ) {
                // Se verifica si la API ha respondido para mostrar la respuesta, de lo contrario se presenta el estado de la petición.
                if ( jqXHR.status == 200 ) {
                    console.log( jqXHR.responseText );
                } else {
                    console.log( jqXHR.status + ' ' + jqXHR.statusText );
                }
            });
        }
    });
}

function darTotal( id_factura ){
    $.ajax({
        type: 'post',
        url: API_CARRITO + 'darTotal',
        data: { id_factura : id_factura },
        type: 'post'
    })
    .done(function( response ) {
        // Se comprueba si la API ha retornado una respuesta satisfactoria, de lo contrario se muestra un mensaje de error.
        if ( response.status ) {
            let total2 = 0
            response.dataset.forEach(function( row ) {
                total2 = row.total;
                $( '#TotalPago' ).text('Cantidad a pagar (USD$): $'+total2);
                $( '#txt_tt' ).val( total2 );
            });
        } else {
            sweetAlert( 2, response.exception, null );
        }
    })
    .fail(function( jqXHR ) {
        // Se verifica si la API ha respondido para mostrar la respuesta, de lo contrario se presenta el estado de la petición.
        if ( jqXHR.status == 200 ) {
            console.log( jqXHR.responseText );
        } else {
            console.log( jqXHR.status + ' ' + jqXHR.statusText );
        }
    });
}

// Evento que sirve para añadir un producto al carrito de compras
$( '#Form_compra' ).submit(function( event ) {
    //Acá se elimina recargar la página despues de enviar el formulario de comprar
	event.preventDefault();
	//Acá se crea la consulta ajax para enviar los datos a la API, dando algunos detalles de la misma consulta
    $.ajax({
        type: 'post',
        url: API_CARRITO + 'updateDetail',
        data: $( '#Form_compra' ).serialize(),
        dataType: 'json'
    })
    .done(function( response ) {
        // se evalua si la API respondio como se esperaba, sino se muestra un mensaje de error
        if ( response.status ) {
            // se reinicia la tabla del carrito para observar los cambios realizados
            readCart();
            // Se cierra la ventana modal del formulario de compra
            $( '#save-modal' ).modal( 'close' );
            sweetAlert( 1, response.message, null );
        } else {
            sweetAlert( 2, response.exception, null );
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
function AbrirModalComprar( id, precio, cantidad, id_detalle ) {
	//Se resetean los campos del formulario de compras
    $( '#Form_compra' )[0].reset();
    //Se abre la ventana modal que tiene el formulario que dara detalles de la compra
    $( '#save-modal' ).modal( 'open' );
    //Se coloca el titulo a la ventana modal de las compras
    $( '#modal-title' ).text( 'Detalles de la compra' );
    //Se desactivan los campos de promocion y precio
	$( '#txt_promocion' ).prop( 'disabled', true );
    $( '#txt_precio' ).prop( 'disabled', true );
    $( '#id_detalle' ).val( id_detalle );
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
						campo_precio.value = 'Cantidad a pagar (USD$): '+precio;
						campo_cantidad.min = 1;
						campo_cantidad.max = 100;
						campo_cantidad.step = '1';
						campo_cantidad.value = cantidad;
						campo_promocion.style.display = none ;
						Icono_promo.style.opacity = 0 ;
						campo_producto.value = row.id_productos;
						campo_precio2.value = precio;
						campo_cantidad2.value = cantidad;
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
						campo_precio.value = 'Cantidad a pagar (USD$): '+precio;
						campo_cantidad.min = 1;
						campo_cantidad.max = 100;
						campo_cantidad.step = '1';
						campo_cantidad.value = cantidad;
						campo_promocion.value = row.promocion+'% de descuento';
						campo_producto.value = row.id_productos;
						campo_precio2.value = precio;
						campo_cantidad2.value = cantidad;
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
						campo_precio.value = 'Cantidad a pagar (USD$): '+precio;
						campo_cantidad.min = 1;
						campo_cantidad.max = row.cantidad_producto;
						campo_cantidad.step = '1';
						campo_cantidad.value = cantidad;
						campo_promocion.style.display = none ;
						Icono_promo.style.opacity = 0;
						campo_producto.value = row.id_productos;
						campo_precio2.value = precio;
						campo_cantidad2.value = cantidad;
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
						campo_precio.value = 'Cantidad a pagar (USD$): '+precio;
						campo_cantidad.min = 1;
						campo_cantidad.max = row.cantidad_producto;
						campo_cantidad.step = '1';
						campo_cantidad.value = cantidad;
						campo_promocion.value = row.promocion+'% de descuento';
						campo_producto.value = row.id_productos;
						campo_precio2.value = precio;
						campo_cantidad2.value = cantidad;
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

/*Función abre el modal que contiene el formulario para finalizar un pedido*/
function AbrirModalFactura() {
	//Se resetean los campos del formulario de compras
    $( '#Form_factura' )[0].reset();
    //Se abre la ventana modal que tiene el formulario que dara los detalles para finalizar la factura
    $( '#save-modal2' ).modal( 'open' );
    M.updateTextFields();   
    //Se coloca el titulo a la ventana modal de los detalles de finalizar compra
    $( '#modal-title2' ).text( 'Detalles de envío de pedido' );
    /*Se crea un objeto de la calse Date para enviar la fecha actual al campo de fecha*/
    var fecha = new Date(),
    dia = fecha.getDate(),
    dia_semana = fecha.getDay(),
    mes = fecha.getMonth(),
    año = fecha.getFullYear(),
    meses = ['Enero','Febrero','Marzo','Abril','Mayo','Junio','Julio','Agosto','Septiembre','Octubre','Noviembre','Diciembre'],
    dias = ['Domingo','Lunes','Martes','Miércoles','Jueves','Viernes','Sábado'],
    FechaFinal = (dias[dia_semana])+', '+dia+' de '+meses[mes]+' de '+año;
    $('#txt_fecha').val(FechaFinal);
    var campo_total = document.getElementById('txt_tt2').value = document.getElementById('txt_tt').value;
}

// Evento que sirve para poder añadir los detalles al finalizar un pedido
$( '#Form_factura' ).submit(function( event ) {
    //Acá se elimina recargar la página despues de enviar el formulario de comprar
	event.preventDefault();
	//Acá se crea la consulta ajax para enviar los datos a la API, dando algunos detalles de la misma consulta
    $.ajax({
        type: 'post',
        url: API_CARRITO + 'finishOrder',
        data: $( '#Form_factura' ).serialize(),
        dataType: 'json'
    })
    .done(function( response ) {
        // se evalua si la API respondio como se esperaba, sino se muestra un mensaje de error
        if ( response.status ) {
            // se reinicia la tabla del carrito para observar los cambios realizados
            readCart();
            // Se cierra la ventana modal del formulario de los detalles de finalizar compra
            $( '#save-modal2' ).modal( 'close' );
            sweetAlert( 1, response.message, null );
        } else {
            sweetAlert( 2, response.exception, null );
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

