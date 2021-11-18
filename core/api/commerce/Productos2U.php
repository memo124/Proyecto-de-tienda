<?php
require_once('../../helpers/conexion.php');
require_once('../../helpers/validator.php');
require_once('../../models/commerce/Productos2U.php');

// se evalua si hay acciones para hacer, sino se finaliza con un mensaje de error
if ( isset($_GET['action']) ) {
    // se instancian las clases a usar.
    $productosU = new Productos2U;
    // Se crea el array que almacenara los resultados que retorne la API
    $result = array('status' => 0, 'message' => null, 'exception' => null);
    // Se evalua cual es la acción a realizar
    switch ( $_GET['action'] ) {
        //acción a realizar cuando se quieran los id de los tipos de productos
        case 'obtenerID':
            if ( $result['dataset'] = $productosU->readIdProductos() ) {
                $result['status'] = 1;
            } else {
                $result['exception'] = 'Ids no disponibles';
            }
            break;
        //acción a realizar cuando se quieran ver los productos por tipo de producto
        case 'readProductos':
            if ( $productosU->setId($_POST['id_tipo']) ) {
                if ( $result['dataset'] = $productosU->readProductos() ) {
                    $result['status'] = 1;
                } else {
                    $result['exception'] = 'Tipo de producto no disponible';
                }
            } else {
                $result['exception'] = 'Tipo de producto incorrecto';
            }
            break;
        //acción a realizar cuando no se encontro la acción solicitada
        default:
            exit('Acción no disponible');
    }
    // Se detalla el tipo de contenido y conjunto de caracteres a mostrar.
    header('content-type: application/json; charset=utf-8');
    // Se imprime el resultado en formato JSON y se devuelve al controlador.
    print(json_encode($result));
} else {
    exit('Recurso denegado');
}
?>