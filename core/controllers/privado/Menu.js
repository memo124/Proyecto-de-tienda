//Constante para establecer la comunicación con la API respectiva.
const API_DETALLE_FACTURA = '../../core/api/privado/DetalleFactura.php?action=';

window.onload = function() {
    /*Método que se ejecutará cada segundo para mostrar un saludo, 
    cuando el documento ha cargado completamente*/
    setInterval(Mostrar_Saludo, 1000);
    /*Se invocan a los métodos que generan gráficas, 
    se ejecutan cuando el documento ha cargado completamente*/
    graficaTopCompras();
    graficaTopCompras2();
    graficaComprasClientes();
    graficaTipoPago();
    graficaEstadoPedidos();
    graficaProductosMarca();
    graficaDescuentos();
    graficaTiposProductos();
    graficaTiposUsuarios();
    graficaCalificaciones();
    graficaInversionesClientes();
    graficaReseñasClientes();
    graficaComprasMarcas();
    graficaEstadosResenas();
    graficaResenasProductos();
    graficaPromedioResenas();
}

/*Método que devuelve un saludo dependiendo la hora*/
function Mostrar_Saludo() {
    var hora = new Date(),
        horas = hora.getHours(),
        texto_saludo='';
        if ( horas >=0 && horas <12 ) {
            texto_saludo='Buenos días';
        }        
        if ( horas >=12 && horas <18 ) {
            texto_saludo='Buenas tardes';
        }
        if ( horas >=18 && horas <24 ) {
            texto_saludo='Buenas noches';
        }
    document.getElementById("Saludo").innerHTML = texto_saludo;
}

/*Método que duvuelve la hora, se ejecuta cada segundo*/
(function(){

    var darHora = function(){
        var fecha = new Date(),
            horas = fecha.getHours(),
            ampm,
            minutos = fecha.getMinutes(),
            segundos = fecha.getSeconds(),
            dia_semana = fecha.getDay(),
            dia = fecha.getDate(),
            mes = fecha.getMonth(),
            año = fecha.getFullYear();

    var pHoras = document.getElementById('horas'),
        pAMPM = document.getElementById('ampm'),
        pMinutos = document.getElementById('minutos'),
        pSegundos = document.getElementById('segundos'),
        pDiaSemana = document.getElementById('diaSemana'),
        pDia = document.getElementById('dia'),
        pMes = document.getElementById('mes'),
        pAño = document.getElementById('año');
    
    var array_dias_semana = ['Domingo','Lunes','Martes','Miércoles','Jueves','Viernes','Sábado'],
        array_meses = ['Enero','Febrero','Marzo','Abril','Mayo','Junio','Julio','Agosto','Septiembre','Octubre','Noviembre','Diciembre'];
    
    pDiaSemana.textContent = array_dias_semana[dia_semana];
    pDia.textContent = dia;
    pMes.textContent = array_meses[mes];
    pAño.textContent = año;

    if  ( horas >=12 ) {
        horas = horas - 12;
        ampm = 'PM';
    } else {
        ampm = 'AM';
    }

    if ( horas == 0 ) {
        horas = 12;
    }

    if ( minutos < 10 ) {
        minutos = "0"+minutos;
    }
    if ( segundos < 10 ) {
        segundos = "0"+segundos;
    }

    pHoras.textContent = horas;
    pMinutos.textContent = minutos;
    pSegundos.textContent = segundos;
    pAMPM.textContent = ampm;
    };

    darHora();
    var intervalo = setInterval(darHora , 1000);

}())

//Método que genera una gráfica con los 7 productos más comprados
function graficaTopCompras()
{
    
    //Creación de la consulta AJAX
    $.ajax({
        dataType: 'json',
        url: API_DETALLE_FACTURA + 'topComprados',
        data: null
    })
    .done(function( response ) {
        /* Se evalua si la API respondió correctamente y retorno datos, sino se 
        mostrara un mensaje de error.*/
        if ( response.status ) {
            //Se crean los arreglos para guardar los datos que requiere el gráfico.
            let productos = [];
            let cantidad_comprados = [];
            // Se recorre el conjunto de registros (dataset) por cada fila a través del objeto row.
            response.dataset.forEach(function( row ) {
                //Se envian los datos a los arreglos
                productos.push( row.nombre_producto );
                cantidad_comprados.push( row.comprados );
            });
            //Se invoca al método que crea una gráfica. Se ubica en el archivo components.js
            generarGrafico( 0 ,'topcompras', productos, cantidad_comprados, 'Veces que se compró', 'Top 7 productos más comprados' );
        } else {
            /*Se elimina el canvas del documento si no respondió correctamente la API y no retorno datos*/
            $( '#topcompras' ).remove();
        }
    })
    .fail(function( jqXHR ) {
        // Se evalua si la API respondió para mostrar la respuesta, sino se presenta el estado de la consulta AJAX.
        if ( jqXHR.status == 200 ) {
            console.log( jqXHR.responseText );
        } else {
            console.log( jqXHR.status + ' ' + jqXHR.statusText );
        }
    });
}

//Método que genera una gráfica con los 7 productos menos comprados
function graficaTopCompras2()
{
    
    //Creación de la consulta AJAX
    $.ajax({
        dataType: 'json',
        url: API_DETALLE_FACTURA + 'topComprados2',
        data: null
    })
    .done(function( response ) {
        /* Se evalua si la API respondió correctamente y retorno datos, sino se 
        mostrara un mensaje de error.*/
        if ( response.status ) {
            //Se crean los arreglos para guardar los datos que requiere el gráfico.
            let productos = [];
            let cantidad_comprados = [];
            // Se recorre el conjunto de registros (dataset) por cada fila a través del objeto row.
            response.dataset.forEach(function( row ) {
                //Se envian los datos a los arreglos
                productos.push( row.nombre_producto );
                cantidad_comprados.push( row.comprados );
            });
            //Se invoca al método que crea una gráfica. Se ubica en el archivo components.js
            generarGrafico( 0 ,'topcompras2', productos, cantidad_comprados, 'Veces que se compró', 'Top 7 productos menos comprados' );
        } else {
            /*Se elimina el canvas del documento si no respondió correctamente la API y no retorno datos*/
            $( '#topcompras2' ).remove();
        }
    })
    .fail(function( jqXHR ) {
        // Se evalua si la API respondió para mostrar la respuesta, sino se presenta el estado de la consulta AJAX.
        if ( jqXHR.status == 200 ) {
            console.log( jqXHR.responseText );
        } else {
            console.log( jqXHR.status + ' ' + jqXHR.statusText );
        }
    });
}

//Método que genera una gráfica con los 7 clientes con más compras
function graficaComprasClientes()
{
    
    //Creación de la consulta AJAX
    $.ajax({
        dataType: 'json',
        url: API_DETALLE_FACTURA + 'comprasClientes',
        data: null
    })
    .done(function( response ) {
        /* Se evalua si la API respondió correctamente y retorno datos, sino se 
        mostrara un mensaje de error.*/
        if ( response.status ) {
            //Se crean los arreglos para guardar los datos que requiere el gráfico.
            let cantidad_compras = [];
            let cliente = [];
            // Se recorre el conjunto de registros (dataset) por cada fila a través del objeto row.
            response.dataset.forEach(function( row ) {
                //Se envian los datos a los arreglos
                cantidad_compras.push( row.comprascliente );
                cliente.push( row.usuario_cliente );
            });
            //Se invoca al método que crea una gráfica. Se ubica en el archivo components.js
            generarGrafico( 1 ,'comprasclientes', cantidad_compras, cliente, 'Compras realizadas', 'Top 7 clientes con más compras' );
        } else {
            /*Se elimina el canvas del documento si no respondió correctamente la API y no retorno datos*/
            $( '#comprasclientes' ).remove();
        }
    })
    .fail(function( jqXHR ) {
        // Se evalua si la API respondió para mostrar la respuesta, sino se presenta el estado de la consulta AJAX.
        if ( jqXHR.status == 200 ) {
            console.log( jqXHR.responseText );
        } else {
            console.log( jqXHR.status + ' ' + jqXHR.statusText );
        }
    });
}

//Método que genera una gráfica con la cantidad de pedidos según forma de pago
function graficaTipoPago()
{
    
    //Creación de la consulta AJAX
    $.ajax({
        dataType: 'json',
        url: API_DETALLE_FACTURA + 'tiposPago',
        data: null
    })
    .done(function( response ) {
        /* Se evalua si la API respondió correctamente y retorno datos, sino se 
        mostrara un mensaje de error.*/
        if ( response.status ) {
            //Se crean los arreglos para guardar los datos que requiere el gráfico.
            let cantidad_pedidos = [];
            let tipo = [];
            //Se recorre el conjunto de registros (dataset) por cada fila a través del objeto row.
            response.dataset.forEach(function( row ) {
               //Se envian los datos a los arreglos
                cantidad_pedidos.push( row.cantidad );
                tipo.push( row.tipo_pago );
            });
            //Se invoca al método que crea una gráfica. Se ubica en el archivo components.js
            generarGrafico( 1 , 'tipospago', cantidad_pedidos, tipo, 'Cantidad de pedidos', 'Pedidos según forma de pago' );
        } else {
            /*Se elimina el canvas del documento si no respondió correctamente la API y no retorno datos*/
            $( '#tipospago' ).remove();
        }
    })
    .fail(function( jqXHR ) {
        // Se evalua si la API respondió para mostrar la respuesta, sino se presenta el estado de la consulta AJAX.
        if ( jqXHR.status == 200 ) {
            console.log( jqXHR.responseText );
        } else {
            console.log( jqXHR.status + ' ' + jqXHR.statusText );
        }
    });
}

//Método que genera una gráfica con la cantidad de pedidos según estado de pedido
function graficaEstadoPedidos()
{
    //Creación de la consulta AJAX
    $.ajax({
        dataType: 'json',
        url: API_DETALLE_FACTURA + 'estadoPedidos',
        data: null
    })
    .done(function( response ) {
        /* Se evalua si la API respondió correctamente y retorno datos, sino se 
        mostrara un mensaje de error.*/
        if ( response.status ) {
            //Se crean los arreglos para guardar los datos que requiere el gráfico.
            let cantidad_pedidos = [];
            let estados = [];
            //Se recorre el conjunto de registros (dataset) por cada fila a través del objeto row.
            response.dataset.forEach(function( row ) {
                //Se envian los datos a los arreglos
                cantidad_pedidos.push( row.cantidad );
                estados.push( row.estado_factura );
            });
            //Se invoca al método que crea una gráfica. Se ubica en el archivo components.js
            generarGrafico( 2 , 'estadopedidos', cantidad_pedidos, estados, 'Cantidad de pedidos', 'Pedidos según estado' );
        } else {
            /*Se elimina el canvas del documento si no respondió correctamente la API y no retorno datos*/
            $( '#estadopedidos' ).remove();
        }
    })
    .fail(function( jqXHR ) {
        // Se evalua si la API respondió para mostrar la respuesta, sino se presenta el estado de la consulta AJAX.
        if ( jqXHR.status == 200 ) {
            console.log( jqXHR.responseText );
        } else {
            console.log( jqXHR.status + ' ' + jqXHR.statusText );
        }
    });
}

//Método que genera una gráfica con la cantidad de productos según su marca
function graficaProductosMarca()
{
    //Creación de la consulta AJAX
    $.ajax({
        dataType: 'json',
        url: API_DETALLE_FACTURA + 'productosMarcas',
        data: null
    })
    .done(function( response ) {
        /* Se evalua si la API respondió correctamente y retorno datos, sino se 
        mostrara un mensaje de error.*/
        if ( response.status ) {
            //Se crean los arreglos para guardar los datos que requiere el gráfico.
            let cantidad_productos = [];
            let marcas = [];
            //Se recorre el conjunto de registros (dataset) por cada fila a través del objeto row.
            response.dataset.forEach(function( row ) {
                //Se envian los datos a los arreglos
                cantidad_productos.push( row.cantidad );
                marcas.push( row.marcas );
            });
            //Se invoca al método que crea una gráfica. Se ubica en el archivo components.js
            generarGrafico( 2 , 'productosmarcas', cantidad_productos, marcas, 'Cantidad de productos', 'Productos de cada marca' );
        } else {
            /*Se elimina el canvas del documento si no respondió correctamente la API y no retorno datos*/
            $( '#productosmarcas' ).remove();
        }
    })
    .fail(function( jqXHR ) {
        // Se evalua si la API respondió para mostrar la respuesta, sino se presenta el estado de la consulta AJAX.
        if ( jqXHR.status == 200 ) {
            console.log( jqXHR.responseText );
        } else {
            console.log( jqXHR.status + ' ' + jqXHR.statusText );
        }
    });
}

//Método que genera una gráfica con la cantidad de descuento según tipo de producto
function graficaDescuentos()
{
    //Creación de la consulta AJAX
    $.ajax({
        dataType: 'json',
        url: API_DETALLE_FACTURA + 'descuentos',
        data: null
    })
    .done(function( response ) {
        /* Se evalua si la API respondió correctamente y retorno datos, sino se 
        mostrara un mensaje de error.*/
        if ( response.status ) {
            //Se crean los arreglos para guardar los datos que requiere el gráfico.
            let valor_descuento = [];
            let tipo_producto = [];
            //Se recorre el conjunto de registros (dataset) por cada fila a través del objeto row.
            response.dataset.forEach(function( row ) {
                //Se envian los datos a los arreglos
                valor_descuento.push( row.promocion );
                tipo_producto.push( row.tipo_producto );
            });
            //Se invoca al método que crea una gráfica. Se ubica en el archivo components.js
            generarGrafico( 4 , 'descuentos', valor_descuento, tipo_producto, 'Valor de promocion', 'Descuento según tipo de producto' );
        } else {
            /*Se elimina el canvas del documento si no respondió correctamente la API y no retorno datos*/
            $( '#descuentos' ).remove();
        }
    })
    .fail(function( jqXHR ) {
        // Se evalua si la API respondió para mostrar la respuesta, sino se presenta el estado de la consulta AJAX.
        if ( jqXHR.status == 200 ) {
            console.log( jqXHR.responseText );
        } else {
            console.log( jqXHR.status + ' ' + jqXHR.statusText );
        }
    });
}

//Método que genera una gráfica con la cantidad de productos según tipo de producto
function graficaTiposProductos()
{
    //Creación de la consulta AJAX
    $.ajax({
        dataType: 'json',
        url: API_DETALLE_FACTURA + 'tiposProductos',
        data: null
    })
    .done(function( response ) {
        /* Se evalua si la API respondió correctamente y retorno datos, sino se 
        mostrara un mensaje de error.*/
        if ( response.status ) {
            //Se crean los arreglos para guardar los datos que requiere el gráfico.
            let valor = [];
            let tipo_producto = [];
            //Se recorre el conjunto de registros (dataset) por cada fila a través del objeto row.
            response.dataset.forEach(function( row ) {
                //Se envian los datos a los arreglos
                valor.push( row.cantidad );
                tipo_producto.push( row.tipo_producto );
            });
            //Se invoca al método que crea una gráfica. Se ubica en el archivo components.js
            generarGrafico( 3 , 'cantidadtipos', valor, tipo_producto, 'Productos', 'Cantidad de productos según tipo de producto' );
        } else {
            /*Se elimina el canvas del documento si no respondió correctamente la API y no retorno datos*/
            $( '#cantidadtipos' ).remove();
        }
    })
    .fail(function( jqXHR ) {
        // Se evalua si la API respondió para mostrar la respuesta, sino se presenta el estado de la consulta AJAX.
        if ( jqXHR.status == 200 ) {
            console.log( jqXHR.responseText );
        } else {
            console.log( jqXHR.status + ' ' + jqXHR.statusText );
        }
    });
}

//Método que genera una gráfica con la cantidad de usuarios según tipo de usuario
function graficaTiposUsuarios()
{
    //Creación de la consulta AJAX
    $.ajax({
        dataType: 'json',
        url: API_DETALLE_FACTURA + 'tiposUsuarios',
        data: null
    })
    .done(function( response ) {
        /* Se evalua si la API respondió correctamente y retorno datos, sino se 
        mostrara un mensaje de error.*/
        if ( response.status ) {
            //Se crean los arreglos para guardar los datos que requiere el gráfico.
            let valor = [];
            let tipo_usuario = [];
            //Se recorre el conjunto de registros (dataset) por cada fila a través del objeto row.
            response.dataset.forEach(function( row ) {
                //Se envian los datos a los arreglos
                valor.push( row.cantidad );
                tipo_usuario.push( row.tipo_usuario );
            });
            //Se invoca al método que crea una gráfica. Se ubica en el archivo components.js
            generarGrafico( 4 , 'tiposusuarios', valor, tipo_usuario, 'Usuarios', 'Cantidad de usuarios según tipo de usuario' );
        } else {
            /*Se elimina el canvas del documento si no respondió correctamente la API y no retorno datos*/
            $( '#tiposusuarios' ).remove();
        }
    })
    .fail(function( jqXHR ) {
        // Se evalua si la API respondió para mostrar la respuesta, sino se presenta el estado de la consulta AJAX.
        if ( jqXHR.status == 200 ) {
            console.log( jqXHR.responseText );
        } else {
            console.log( jqXHR.status + ' ' + jqXHR.statusText );
        }
    });
}

//Método que genera una gráfica con la cantidad de reseñas según calificación
function graficaCalificaciones()
{
    //Creación de la consulta AJAX
    $.ajax({
        dataType: 'json',
        url: API_DETALLE_FACTURA + 'calificaciones',
        data: null
    })
    .done(function( response ) {
        /* Se evalua si la API respondió correctamente y retorno datos, sino se 
        mostrara un mensaje de error.*/
        if ( response.status ) {
            //Se crean los arreglos para guardar los datos que requiere el gráfico.
            let cantidad = [];
            let nota = [];
            //Se recorre el conjunto de registros (dataset) por cada fila a través del objeto row.
            response.dataset.forEach(function( row ) {
                //Se envian los datos a los arreglos
                cantidad.push( row.cantidad );
                nota.push( row.clasificacion );
            });
            //Se invoca al método que crea una gráfica. Se ubica en el archivo components.js
            generarGrafico( 3 , 'calificaciones', cantidad, nota, 'Cantidad de esta nota', 'Cantidad de reseñas segun calificación' );
        } else {
            /*Se elimina el canvas del documento si no respondió correctamente la API y no retorno datos*/
            $( '#calificaciones' ).remove();
        }
    })
    .fail(function( jqXHR ) {
        // Se evalua si la API respondió para mostrar la respuesta, sino se presenta el estado de la consulta AJAX.
        if ( jqXHR.status == 200 ) {
            console.log( jqXHR.responseText );
        } else {
            console.log( jqXHR.status + ' ' + jqXHR.statusText );
        }
    });
}

//Método que genera una gráfica con los 7 clientes que más dinero han invertido en la tienda
function graficaInversionesClientes()
{
    //Creación de la consulta AJAX
    $.ajax({
        dataType: 'json',
        url: API_DETALLE_FACTURA + 'inversionesClientes',
        data: null
    })
    .done(function( response ) {
        /* Se evalua si la API respondió correctamente y retorno datos, sino se 
        mostrara un mensaje de error.*/
        if ( response.status ) {
            //Se crean los arreglos para guardar los datos que requiere el gráfico.
            let cantidad = [];
            let cliente = [];
            //Se recorre el conjunto de registros (dataset) por cada fila a través del objeto row.
            response.dataset.forEach(function( row ) {
                //Se envian los datos a los arreglos
                cantidad.push( row.cantidad );
                cliente.push( row.usuario_cliente );
            });
            //Se invoca al método que crea una gráfica. Se ubica en el archivo components.js
            generarGrafico( 1 ,'inversiones', cantidad, cliente, 'Dinero invertido (USD$)', 'Top 7 clientes con más dinero invertido en la tienda' );
        } else {
            /*Se elimina el canvas del documento si no respondió correctamente la API y no retorno datos*/
            $( '#inversiones' ).remove();
        }
    })
    .fail(function( jqXHR ) {
        // Se evalua si la API respondió para mostrar la respuesta, sino se presenta el estado de la consulta AJAX.
        if ( jqXHR.status == 200 ) {
            console.log( jqXHR.responseText );
        } else {
            console.log( jqXHR.status + ' ' + jqXHR.statusText );
        }
    });
}

//Método que genera una gráfica con los 5 clientes que más reseñas han realizado
function graficaReseñasClientes()
{
    //Creación de la consulta AJAX
    $.ajax({
        dataType: 'json',
        url: API_DETALLE_FACTURA + 'resenasClientes',
        data: null
    })
    .done(function( response ) {
        /* Se evalua si la API respondió correctamente y retorno datos, sino se 
        mostrara un mensaje de error.*/
        if ( response.status ) {
            //Se crean los arreglos para guardar los datos que requiere el gráfico.
            let cantidad = [];
            let cliente = [];
            //Se recorre el conjunto de registros (dataset) por cada fila a través del objeto row.
            response.dataset.forEach(function( row ) {
                //Se envian los datos a los arreglos
                cantidad.push( row.cantidad );
                cliente.push( row.usuario_cliente );
            });
            //Se invoca al método que crea una gráfica. Se ubica en el archivo components.js
            generarGrafico( 2 , 'resenasClientes', cantidad, cliente, 'Cantidad de reseñas', 'Top 5 clientes con más reseñas' );
        } else {
            /*Se elimina el canvas del documento si no respondió correctamente la API y no retorno datos*/
            $( '#resenasClientes' ).remove();
        }
    })
    .fail(function( jqXHR ) {
        // Se evalua si la API respondió para mostrar la respuesta, sino se presenta el estado de la consulta AJAX.
        if ( jqXHR.status == 200 ) {
            console.log( jqXHR.responseText );
        } else {
            console.log( jqXHR.status + ' ' + jqXHR.statusText );
        }
    });
}

//Método que genera una gráfica con la cantidad compras hechas según la marca de producto
function graficaComprasMarcas()
{
    //Creación de la consulta AJAX
    $.ajax({
        dataType: 'json',
        url: API_DETALLE_FACTURA + 'comprasMarcas',
        data: null
    })
    .done(function( response ) {
        /* Se evalua si la API respondió correctamente y retorno datos, sino se 
        mostrara un mensaje de error.*/
        if ( response.status ) {
            //Se crean los arreglos para guardar los datos que requiere el gráfico.
            let cantidad = [];
            let marca = [];
            //Se recorre el conjunto de registros (dataset) por cada fila a través del objeto row.
            response.dataset.forEach(function( row ) {
                //Se envian los datos a los arreglos
                cantidad.push( row.cantidad );
                marca.push( row.marcas );
            });
            //Se invoca al método que crea una gráfica. Se ubica en el archivo components.js
            generarGrafico( 3 , 'comprasMarcas', cantidad, marca, 'Compras de está marca', 'Cantidad de compras de productos de cada marca' );
        } else {
            /*Se elimina el canvas del documento si no respondió correctamente la API y no retorno datos*/
            $( '#comprasMarcas' ).remove();
        }
    })
    .fail(function( jqXHR ) {
        // Se evalua si la API respondió para mostrar la respuesta, sino se presenta el estado de la consulta AJAX.
        if ( jqXHR.status == 200 ) {
            console.log( jqXHR.responseText );
        } else {
            console.log( jqXHR.status + ' ' + jqXHR.statusText );
        }
    });
}

//Método que genera una gráfica con la cantidad reseñas según estados de reseña
function graficaEstadosResenas()
{
    //Creación de la consulta AJAX
    $.ajax({
        dataType: 'json',
        url: API_DETALLE_FACTURA + 'estadosResenas',
        data: null
    })
    .done(function( response ) {
        /* Se evalua si la API respondió correctamente y retorno datos, sino se 
        mostrara un mensaje de error.*/
        if ( response.status ) {
            //Se crean los arreglos para guardar los datos que requiere el gráfico.
            let estado = [];
            let cantidad= [];
            //Se recorre el conjunto de registros (dataset) por cada fila a través del objeto row.
            response.dataset.forEach(function( row ) {
                //Se envian los datos a los arreglos
                estado.push( row.estado_comentario );
                cantidad.push( row.cantidad );
            });
            //Se invoca al método que crea una gráfica. Se ubica en el archivo components.js
            generarGrafico( 0 ,'estadosResenas', estado, cantidad, 'Cantidad de reseñas', 'Cantidad de reseñas según su estado' );
        } else {
            /*Se elimina el canvas del documento si no respondió correctamente la API y no retorno datos*/
            $( '#estadosResenas' ).remove();
        }
    })
    .fail(function( jqXHR ) {
        // Se evalua si la API respondió para mostrar la respuesta, sino se presenta el estado de la consulta AJAX.
        if ( jqXHR.status == 200 ) {
            console.log( jqXHR.responseText );
        } else {
            console.log( jqXHR.status + ' ' + jqXHR.statusText );
        }
    });
}

//Método que genera una gráfica con los 7 productos con más reseñas
function graficaResenasProductos()
{
    //Creación de la consulta AJAX
    $.ajax({
        dataType: 'json',
        url: API_DETALLE_FACTURA + 'resenasProductos',
        data: null
    })
    .done(function( response ) {
        /* Se evalua si la API respondió correctamente y retorno datos, sino se 
        mostrara un mensaje de error.*/
        if ( response.status ) {
            //Se crean los arreglos para guardar los datos que requiere el gráfico.
            let producto = [];
            let cantidad= [];
            //Se recorre el conjunto de registros (dataset) por cada fila a través del objeto row.
            response.dataset.forEach(function( row ) {
                //Se envian los datos a los arreglos
                producto.push( row.nombre_producto );
                cantidad.push( row.cantidad );
            });
            //Se invoca al método que crea una gráfica. Se ubica en el archivo components.js
            generarGrafico( 0 ,'resenasProductos', producto, cantidad, 'Cantidad de reseñas', 'Top 7 productos con más reseñas' );
        } else {
            /*Se elimina el canvas del documento si no respondió correctamente la API y no retorno datos*/
            $( '#resenasProductos' ).remove();
        }
    })
    .fail(function( jqXHR ) {
        // Se evalua si la API respondió para mostrar la respuesta, sino se presenta el estado de la consulta AJAX.
        if ( jqXHR.status == 200 ) {
            console.log( jqXHR.responseText );
        } else {
            console.log( jqXHR.status + ' ' + jqXHR.statusText );
        }
    });
}

//Método que genera una gráfica con los 7 productos con mejor promedio en las calificaciones de sus reseñas
function graficaPromedioResenas()
{
    //Creación de la consulta AJAX
    $.ajax({
        dataType: 'json',
        url: API_DETALLE_FACTURA + 'promedioResenas',
        data: null
    })
    .done(function( response ) {
        /* Se evalua si la API respondió correctamente y retorno datos, sino se 
        mostrara un mensaje de error.*/
        if ( response.status ) {
            //Se crean los arreglos para guardar los datos que requiere el gráfico.
            let cantidad = [];
            let producto = [];
            //Se recorre el conjunto de registros (dataset) por cada fila a través del objeto row.
            response.dataset.forEach(function( row ) {
                //Se envian los datos a los arreglos
                cantidad.push( row.promedio );
                producto.push( row.nombre_producto );
            });
            //Se invoca al método que crea una gráfica. Se ubica en el archivo components.js
            generarGrafico( 1 ,'promedioResenas', cantidad, producto, 'Promedio', 'Top 7 productos con mejor promedio de calificaciones' );
        } else {
            /*Se elimina el canvas del documento si no respondió correctamente la API y no retorno datos*/
            $( '#promedioResenas' ).remove();
        }
    })
    .fail(function( jqXHR ) {
        // Se evalua si la API respondió para mostrar la respuesta, sino se presenta el estado de la consulta AJAX.
        if ( jqXHR.status == 200 ) {
            console.log( jqXHR.responseText );
        } else {
            console.log( jqXHR.status + ' ' + jqXHR.statusText );
        }
    });
}