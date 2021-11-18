/*Se crea una constante que establecera comunicacion con la API*/
const API_INDEX = '../../core/api/commerce/index.php?action=';

// Función ejecutada cuando el documento está listo
$( document ).ready(function() {
    // Se llama a la funcion que contiene los datos de los productos
	mostrarDatos( API_INDEX );
	mostrarDatos2( API_INDEX );
});


/*Función que llenara el carrusel de productos con los datos de la consulta ajax*/
function llenarCarrusel( dataset )
{
	//se crea una variable que servira contador para limitar la cantidad de productos
	var limite_mostrar = 0;
	let content = '';
    // Se recorreran los conjuntos de los registros por medio del objeto row.
    dataset.forEach(function( row ) {
		//si el valor de la variable contador es menor a 20 mostrara más registros
		if( limite_mostrar < 20 ) {
		//se incrementa en 1 el valor de la variable contador
		limite_mostrar++
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
	 // Se agregan los elementos al carrusel de productos
	 $( '#carrusel_lista' ).html( content );
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
	//se crea una variable que servira contador para limitar la cantidad de productos
	var limite_mostrar = 0;
	let content = '';
    // Se recorreran los conjuntos de los registros por medio del objeto row.
    dataset.forEach(function( row ) {
		//si el valor de la variable contador es menor a 20 mostrara más registros
		if( limite_mostrar < 20 ) {
		//se incrementa en 1 el valor de la variable contador
		limite_mostrar++
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
		}
	});
	 // Se agregan los elementos al carrusel de productos
	 $( '#carrusel_lista2' ).html( content );
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

