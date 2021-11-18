<?php
require_once('../../helpers/conexion.php');
require_once('../../helpers/validator.php');
require_once('../../models/commerce/Marcas1U.php');

// Se evalua si existe una sesión, sino se finaliza con un mensaje de error
if ( isset($_GET['action']) ) {
    //Acá se crea una variable de sesión o se reanuda la anterior para trabajar con dichas variables
    session_start();
    // Se instancia la clase Marcas1;
    $marcas = new Marcas1;
    //Se declara un vector para almacenar lo que retornara la API
    $result = array( 'status' => 0, 'message' => null, 'exception' => null );
        //Se evalua la acción a realizar, si se ha iniciado sesión
        switch ( $_GET['action'] ) {
            /*Acción para obtener las marcas con el número de todos los productos con cantidad mayor que 0 y
            con estado En existencia*/
            case 'readAll':
                if ( $result['dataset'] = $marcas->readAllMarca1() ) {
                    $result['status'] = 1;
                } else {
                    $result['exception'] = 'No hay marcas registradas';
                }
                break;
            /*Acción para buscar las marcas con el número de todos los productos con cantidad mayor que 0 y
            con estado En existencia*/
            case 'search':
                $_POST = $marcas->validateForm($_POST);
                if ( $_POST['txt_buscar'] != '' ) {
                    if ( $result['dataset'] = $marcas->searchMarca1($_POST['txt_buscar']) ) {
                        $result['status'] = 1;
						$rows = count($result['dataset']);
						if ( $rows > 1 ) {
							$result['message'] = 'Se encontraron '.$rows.' coincidencias';
						} else {
							$result['message'] = 'Solo existe una coincidencia';
						}
                    } else {
                        $result['exception'] = 'No hay coincidencias';
                    }
                } else {
                    $result['exception'] = 'Ingrese un valor para poder buscar';
                }
                break;
            default:
                exit('Acción no disponible');
        }
        //Se aclara el tipo de contenido que se mostrara y sus caracteres
        header('content-type: application/json; charset=utf-8');
        // Se devuelve impreso el resultado en formato JSON
        print(json_encode($result));
} else {
	exit('Recurso denegado');
}
?>