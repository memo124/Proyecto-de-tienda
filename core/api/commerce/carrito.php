<?php
//aca están las rutas de archivos que usara la API
require_once('../../helpers/conexion.php');
require_once('../../helpers/validator.php');
require_once('../../models/commerce/carrito.php');


// Se evalua si existe una accion a realizar
if ( isset($_GET['action']) ) {
    //Acá se crea una variable de sesión o se reanuda la anterior para trabajar con dichas variables
    session_start();
    // Se instancia la clase Carrito;
    $carrito = new Carrito;
    //Se declara un vector para almacenar lo que retornara la API
    $result = array('status' => 0, 'session' => 0, 'message' => null, 'exception' => null);
    //Se evalua si existe una sesión para poder realizar la acción solicitada
    if ( isset($_SESSION['id_cliente']) ) {
        $result['session'] = 1;
        //Se evalua la acción a realizar, si se ha iniciado sesión
        switch ( $_GET['action'] ) {
            //Acción a realizar cuando se quiera crear un detalle de factura
            case 'createDetail':
                    if ( $carrito->setIdCliente($_SESSION['id_cliente']) ) {
                        if ( $carrito->readOrder() ) {
                            $_POST = $carrito->validateForm($_POST);
                            if ( $carrito->setIdProducto($_POST['id_productos']) ) {
                                if ( $carrito->setCantidad($_POST['cantidad']) ) {
                                    if ( $carrito->setPrecio($_POST['precio']) ) {
                                        if ( $carrito->createDetail() ) {
                                            $result['status'] = 1;
                                            $result['message'] = 'Producto agregado correctamente';
                                        } else {
                                            $result['exception'] = 'Ocurrió un problema al agregar el producto';
                                        }
                                    } else {
                                        $result['exception'] = 'Precio incorrecto';
                                    }
                                } else {
                                    $result['exception'] = 'Cantidad incorrecta';
                                }
                            } else {
                                $result['exception'] = 'Producto incorrecto';
                            }
                        } else {
                            $result['exception'] = 'Ocurrió un problema al obtener el pedido';
                        }
                    } else {
                        $result['exception'] = 'Cliente incorrecto';
                    }
                break;
            //Acción a realizar cuando se quiera obtener el carrito de compras
            case 'readCart':
                if ( $carrito->setIdCliente($_SESSION['id_cliente']) ) {
                    if ( $carrito->readOrder() ) {
                        if ( $result['dataset'] = $carrito->readCart() ) {
                            $result['status'] = 1;
                            $_SESSION['id_factura_cliente'] = $carrito->getIdFactura();
                        } else {
                            $result['exception'] = 'No tiene productos en su pedido';
                        }
                    } else {
                        $result['exception'] = 'Debe agregar un producto al pedido';
                    }
                } else {
                    $result['exception'] = 'Cliente incorrecto';
                }
                break;
            //Acción a realizar cuando se quiera obtener total a pagar de un pedido
            case 'darTotal':
                if ( $carrito->setIdFactura($_POST['id_factura']) ) {
                    if ( $result['dataset'] = $carrito->obtenerTotal() ) {
                        $result['status'] = 1;
                    } else {
                        $result['exception'] = 'No se obtuvo resultados';
                    }
                } else {
                    $result['exception'] = 'Id de la factura incorrecto';
                }
                break;
            //Acción a realizar cuando se quiera obtener total a pagar de un pedido
            case 'darTotal2':
                if ( $carrito->setIdFactura($_POST['id_factura']) ) {
                    if ( $result['dataset'] = $carrito->obtenerTotal2() ) {
                        $result['status'] = 1;
                    } else {
                        $result['exception'] = 'No se obtuvo resultados';
                    }
                } else {
                    $result['exception'] = 'Id de la factura incorrecto';
                }
                break;
            //Acción a realizar cuando se quiera actualizar un producto del carrito
            case 'updateDetail':
                if ( $carrito->setIdFactura($_SESSION['id_factura_cliente']) ) {
                    $_POST = $carrito->validateForm($_POST);
                    if ( $carrito->setIdDetalle($_POST['id_detalle']) ) {
                        if ( $carrito->setCantidad($_POST['cantidad']) ) {
                            if( $carrito->setPrecio($_POST['precio']) ){
                                if ( $carrito->updateDetail() ) {
                                    $result['status'] = 1;
                                    $result['message'] = 'Cantidad modificada correctamente';
                                } else {
                                    $result['exception'] = 'Ocurrió un problema al modificar la cantidad';
                                }   
                            }else{
                                $result['exception'] = 'Precio incorrecto';
                            }
                        } else {
                            $result['exception'] = 'Cantidad incorrecta';
                        }
                    } else {
                        $result['exception'] = 'Detalle incorrecto';
                    }
                } else {
                    $result['exception'] = 'Pedido incorrecto';
                }
                break;
            //Acción a realizar cuando se quiera eliminar un producto del carrito
            case 'deleteDetail':
                if ( $carrito->setIdFactura($_SESSION['id_factura_cliente']) ) {
                    if ( $carrito->setIdDetalle($_POST['id_detalle']) ) {
                        if ( $carrito->deleteDetail() ) {
                            $result['status'] = 1;
                            $result['message'] = 'Producto removido correctamente';
                        } else {
                            $result['exception'] = 'Ocurrió un problema al remover el producto';
                        }
                    } else {
                        $result['exception'] = 'Detalle incorrecto';
                    }
                } else {
                    $result['exception'] = 'Pedido incorrecto';
                }
                break;
            //Acción a realizar cuando se quiera finalizar un pedido del carrito de compras
            case 'finishOrder':
                if ( $carrito->setIdFactura($_SESSION['id_factura_cliente']) ) {
                    if( $carrito->setFecha($_POST['txt_fecha']) ) {
                        if( $carrito->setDireccion($_POST['txt_direccion']) ) {
                            if( $carrito->setTotal($_POST['txt_tt2']) ){
                                if ( $carrito->setIdEstado(2) ) {
                                    if( isset($_POST['cb_tipo']) ){
                                        if( $carrito->setTipo($_POST['cb_tipo']) ) {
                                            if ( $carrito->updateOrderStatus() ) {
                                                $result['status'] = 1;
                                                $result['message'] = 'Pedido finalizado correctamente';
                                            } else {
                                                $result['exception'] = 'Ocurrió un problema al finalizar el pedido';
                                            }
                                        } else {
                                            $result['exception'] = 'Tipo de pago incorrecto';
                                        }
                                    } else {
                                        $result['exception'] = 'No ha seleccionado un tipo de pago';
                                    }
                                } else {
                                    $result['exception'] = 'Estado incorrecto';
                                }
                            } else {
                                $result['exception'] = 'Total incorrecto';
                            }
                        } else {
                            $result['exception'] = 'Dirección incorrecta';
                        }
                    } else {
                        $result['exception'] = 'Fecha incorrecta';
                    }
                } else {
                    $result['exception'] = 'Pedido incorrecto';
                }
                break;
            //Acción a realizar cuando se quieran obtener las compras hechas por un cliente
            case 'obtenerCompras':
                if ( $carrito->setIdCliente($_SESSION['id_cliente']) ) {
                    if ( $result['dataset'] = $carrito->obtenerCompras() ) {
                        $result['status'] = 1;
                    } else {
                        $result['exception'] = 'No se obtuvo resultados';
                    }
                } else {
                    $result['exception'] = 'Id de la factura incorrecto';
                }
                break;
            //Acción a realizar cuando se quiera obtener el detalle de las compras de un cliente
            case 'detallarCompras':
                if ( $carrito->setIdFactura($_POST['id_factura_cliente']) ) {
                    if ( $result['dataset'] = $carrito->detallarCompras() ) {
                        $result['status'] = 1;
                    } else {
                        $result['exception'] = 'No se obtuvo resultados';
                    }
                } else {
                    $result['exception'] = 'Id de la factura incorrecto';
                }
                break;
            default:
                exit('Acción no disponible dentro de la sesión');
        }
    } else {
        //Se evalua la acción a realizar cuando no se inició sesión
        switch ( $_GET['action'] ) {
            //Acción a realizar cuando se quiera crear un pedido pero no se inició sesión
            case 'createDetail':
                $result['exception'] = 'Debe iniciar sesión para agregar el producto al carrito';
                break;
            default:
                exit('Acción no disponible fuera de la sesión');
        }
    }
    //Se aclara el tipo de contenido que se mostrara y sus caracteres
    header('content-type: application/json; charset=utf-8');
    // Se devuelve impreso el resultado en formato JSON
    print(json_encode($result));
} else {
	exit('Recurso denegado');
}
?>