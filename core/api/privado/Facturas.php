<?php
require_once('../../helpers/conexion.php');
require_once('../../helpers/validator.php');
require_once('../../models/privado/Facturas.php');

// Se comprueba si existe una acción a realizar, de lo contrario se finaliza el script con un mensaje de error.
if (isset($_GET['action'])) {
    // Se crea una sesión o se reanuda la actual para poder utilizar variables de sesión en el script.
    session_start();
    // Se instancia la clase correspondiente.
    $factura = new Facturas;
    // Se declara e inicializa un arreglo para guardar el resultado que retorna la API.
    $result = array('status' => 0, 'message' => null, 'exception' => null);
    // Se verifica si existe una sesión iniciada como administrador, de lo contrario se finaliza el script con un mensaje de error.
    if (isset($_SESSION['id_usuario'])) {
        // Se compara la acción a realizar cuando un administrador ha iniciado sesión.
        switch ($_GET['action']) {
            case 'readAll':
                if ($result['dataset'] = $factura->readAllFacturas()) {
                    $result['status'] = 1;
                } else {
                    $result['exception'] = 'No hay estados registrados';
                }
                break;
            case 'search':
                $_POST = $factura->validateForm($_POST);
                if ($_POST['txt_buscar'] != '') {
                    if ($result['dataset'] = $factura->buscarFacturas($_POST['txt_buscar'])) {
                        $result['status'] = 1;
						$rows = count($result['dataset']);
						if ($rows > 1) {
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
            case 'create':
                $_POST = $factura->validateForm($_POST);
                if(isset($_POST['cb_cliente'])){
                    if($factura->setCliente($_POST['cb_cliente'])){
                        if($factura->setTotal($_POST['txt_total'])){
                            if($factura->setFecha($_POST['txt_fecha'])){
                                if( isset($_POST['cb_tipo']) ){
                                    if( $factura->setPago($_POST['cb_tipo']) ){
                                        if($factura->setDireccion($_POST['txt_direccion'])){
                                            if($factura->createFacturas()){
                                                $result['status'] = 1;
                                                $result['message'] = 'Factura creada correctamente';                                         
                                            }else{
                                                $result['exception'] = Conexion::getException();
                                            }
                                        }else{
                                            $result['exception'] = 'Dirección incorrecta';
                                        }  
                                    } else {
                                        $result['exception'] = 'Tipo de pago incorrecto';
                                    }
                                } else {
                                    $result['exception'] = 'No ha seleccionado un tipo de pago';
                                }
                            }else{
                                $result['exception'] = 'Fecha incorrecta';
                            }
                        }else{
                            $result['exception'] = 'Total incorrecto';
                        }
                    }else{
                        $result['exception'] = 'Cliente incorrecto';
                    }
                }else{
                    $result['exception'] = 'Seleccione un cliente';
                }
            break;
            case 'readOne':
                if ($factura->setId($_POST['id_factura'])) {
                    if ($result['dataset'] = $factura->readOneFacturas()) {
                        $result['status'] = 1;
                    } else {
                        $result['exception'] = 'Factura inexistente';
                    }
                } else {
                    $result['exception'] = 'Factura incorrecta';
                }
                break;
            case 'update':
                $_POST = $factura->validateForm($_POST);
                if ($factura->setId($_POST['id_factura'])) {
                    if ($data = $factura->readOneFacturas()) {
                    if($factura->setCliente($_POST['cb_cliente'])){
                        if($factura->setTotal($_POST['txt_total'])){
                            if($factura->setFecha($_POST['txt_fecha'])){
                                if($factura->setPago($_POST['txt_tipo'])){
                                    if($factura->setDireccion($_POST['txt_direccion'])){
                                        if($factura->updateFacturas()){
                                            $result['status'] = 1;
                                            $result['message'] = 'Factura modificada correctamente';                                         
                                        }else{
                                            $result['exception'] = Conexion::getException();
                                        }
                                    }else{
                                        $result['exception'] = 'Dirección incorrecta';
                                    }   
                                }else{
                                    $result['exception'] = 'Tipo de pago incorrecto';
                                }
                            }else{
                                $result['exception'] = 'Fecha incorrecta';
                            }
                        }else{
                            $result['exception'] = 'Total incorrecto';
                        }
                    }else{
                        $result['exception'] = 'Cliente incorrecto';
                    }
                }else{
                    $result['exception'] = 'Factura inexistente';
                }
            }else{
                $result['exception'] = 'Factura incorrecta';
            }
            break;
            case 'delete':
                if ($factura->setId($_POST['id_factura'])) {
                    if ($data = $factura->readOneFacturas()) {
                        if ($factura->deleteFacturas()) {
                            $result['status'] = 1;
                            $result['message'] = 'Factura eliminada correctamente';
                        } else {
                            $result['exception'] = Conexion::getException();
                        }
                    } else {
                        $result['exception'] = 'Factura inexistente';
                    }
                } else {
                    $result['exception'] = 'Factura incorrecta';
                }
                break;
                case 'verPedidos':
                    if ($factura->setId($_POST['id_factura'])) {
                        if ($result['dataset'] = $factura->obtenerPedidos()) {
                            $result['status'] = 1;
                        } else {
                            $result['exception'] = 'No hay datos de esta factura';
                        }
                    } else {
                        $result['exception'] = 'Factura incorrecta';
                    }
                break;
            /*    
            case 'cantidadestadosCategoria':
                if ($result['dataset'] = $estado->cantidadestadosCategoria()) {
                    $result['status'] = 1;
                } else {
                    $result['exception'] = 'No hay datos disponibles';
                }
                break;
            */
            default:
                exit('Acción no disponible');
        }
    }
        // Se indica el tipo de contenido a mostrar y su respectivo conjunto de caracteres.
        header('content-type: application/json; charset=utf-8');
        // Se imprime el resultado en formato JSON y se retorna al controlador.
        print(json_encode($result));
} else {
	exit('Recurso denegado');
}
?>