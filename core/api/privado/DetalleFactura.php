<?php
//aca están las rutas de archivos que usara la API
require_once('../../helpers/conexion.php');
require_once('../../helpers/validator.php');
require_once('../../models/privado/detalle_factura.php');

// Se evalua si existe una accion a realizar
if ( isset($_GET['action']) ) {
    //Acá se crea una variable de sesión o se reanuda la anterior para trabajar con dichas variables
    session_start();
    // Se instancia la clase DetalleFactura;
    $detalle = new DetalleFactura;
    //Se declara un vector para almacenar lo que retornara la API
    $result = array('status' => 0, 'message' => null, 'exception' => null);
    // Se verifica si existe una sesión iniciada como administrador, de lo contrario se finaliza el script con un mensaje de error.
    if (isset($_SESSION['id_usuario'])) {
        //Se evalua la acción a realizar
        switch ( $_GET['action'] ) {
            /*Acción a realizar cuando se quieran todos los detalles de factura*/
            case 'readAll':
                if ( $result['dataset'] = $detalle->readDetalle() ) {
                    $result['status'] = 1;
                } else {
                    $result['exception'] = 'No hay Detalles de facturas registrados';
                }
                break;
            /*Acción a realizar cuando se quiera los datos de un detalle de factura en especifico*/
            case 'readOne':
                if ( $detalle->setId($_POST['id_detalle']) ) {
                    if ( $result['dataset'] = $detalle->getDetalle() ) {
                        $result['status'] = 1;
                    } else {
                        $result['exception'] = 'detalle inexistente';
                    }
                } else {
                    $result['exception'] = 'detalle incorrecto';
                }
                break;
            /*Acción a realizar cuando se quiera eliminar un detalle de factura*/
            case 'delete':
                if ( $detalle->setId($_POST['id_detalle']) ) {
                    if ( $data = $detalle->getDetalle() ) {
                        if ( $detalle->deleteDetalle() ) {
                            $result['status'] = 1;
                            $result['message'] = 'Eliminado correctamente';
                        }
                        else {
                            $result['exception'] = Conexion::getException();
                        }
                    }else {
                        $result['exception'] = 'No se encontro el detalle';
                    }
                }
                else {
                    $result['exceprion'] = 'No se encontro el Id';
                }
            break;
            /*Acción a realizar cuando se quiera agregar un detalle de factura*/
            case 'create':
                $_POST = $detalle->validateForm($_POST);
                if ( $detalle->setfactura($_POST['txt_factura']) ) {
                    if ( $detalle->setprecio($_POST['txt_precio_comprados']) ) {
                        if ( $detalle->setcantidad($_POST['txt_cantidad_comprados']) ) {
                            if ( isset($_POST['cb_producto']) ) {
                                if ( $detalle->setnombre($_POST['cb_producto']) ) {
                                    if ( $detalle->createDetalle() ) {
                                        $result['status'] = 1;
                                        $result['message'] = 'se agrego correctamente';
                                    }else {
                                        $result['exception'] = Conexion::getException();
                                    }
                                }else {
                                    $result['exception'] = 'producto incorrecto';  
                                }
                            }else {
                                $result['exception'] = 'selecciona un producto';  
                            }
                        }else {
                            $result['exception'] = 'cantidad incorrecta';
                        }
                    } else {
                        $result['exception'] = 'precio incorrecto';
                    }
                } else {
                    $result['exception'] = 'factura incorrecta';
                }
                break;
            /*Acción a realizar cuando se quiera buscar un detalle de factura*/
            case 'search':
                $_POST = $detalle->validateForm($_POST);
                if ( $_POST['txt_buscar'] != '' ) {
                    if ( $result['dataset'] = $detalle->searchDetalle($_POST['txt_buscar']) ) {
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
            /*Aciión a realizar cuando se quiera actualizar un detalle de factura*/
            case 'update':
                $_POST = $detalle->validateForm($_POST);
                if ( $detalle->setId($_POST['id_detalle']) ) {
                    if ( $data = $detalle->getdetalle() ) {
                        if ( $detalle->setfactura($_POST['txt_factura']) ) {
                            if ( $detalle->setprecio($_POST['txt_precio_comprados']) ) {
                                if ( $detalle->setcantidad($_POST['txt_cantidad_comprados']) ) {
                                    if ( isset($_POST['cb_producto']) ) {
                                        if ( $detalle->setnombre($_POST['cb_producto']) ) {
                                            if ( $detalle->updateDetalle() ) {
                                                $result['status'] = 1;
                                                $result['message'] = 'se actualizo correctamente';
                                            }else {
                                                $result['exception'] = Conexion::getException();
                                            }
                                        }else {
                                            $result['exception'] = 'producto incorrecto';  
                                        }
                                    }else {
                                        $result['exception'] = 'selecciona un producto';  
                                    }
                                }else {
                                    $result['exception'] = 'cantidad incorrecta';
                                }
                            } else {
                                $result['exception'] = 'precio incorrecto';
                            }
                        } else {
                            $result['exception'] = 'factura incorrecta';
                        }
                    }else {
                        $result['exception'] = 'No se encontro el detalle';
                    }
                }
                else {
                    $result['exceprion'] = 'No se encontro el Id';
                }
                break;
            /*Acción a realizar cuando se quieran los 7 productos más comprados*/
            case 'topComprados':
                if ( $result['dataset'] = $detalle->topCompras() ) {
                    $result['status'] = 1;
                } else {
                    $result['exception'] = 'No hay datos disponibles';
                }
                break;
            /*Acción a realizar cuando se quieran los 7 productos menos comprados*/
            case 'topComprados2':
                if ( $result['dataset'] = $detalle->topCompras2() ) {
                    $result['status'] = 1;
                } else {
                    $result['exception'] = 'No hay datos disponibles';
                }
                break;
            /*Acción a realizar cuando se quieran los 7 clientes con más compras*/
            case 'comprasClientes':
                if ( $result['dataset'] = $detalle->comprasClientes() ) {
                    $result['status'] = 1;
                } else {
                    $result['exception'] = 'No hay datos disponibles';
                }
                break;
            /*Acción a realizar cuando se quiera la cantidad de pedidos según tipo de pago*/
            case 'tiposPago':
                if ( $result['dataset'] = $detalle->tiposPago() ) {
                    $result['status'] = 1;
                } else {
                    $result['exception'] = 'No hay datos disponibles';
                }
                break;
            /*Acción a realizar cuando se quiera la cantidad de pedidos según estado de pedido*/
            case 'estadoPedidos':
                if ( $result['dataset'] = $detalle->estadoPedidos() ) {
                    $result['status'] = 1;
                } else {
                    $result['exception'] = 'No hay datos disponibles';
                }
                break;
            /*Acción a realizar cuando se quiera la cantidad de productos según marca*/
            case 'productosMarcas':
                if ( $result['dataset'] = $detalle->productosMarcas() ) {
                    $result['status'] = 1;
                } else {
                    $result['exception'] = 'No hay datos disponibles';
                }
                break;
            /*Acción a realizar cuando se quiera el descuento según tipo de producto*/
            case 'descuentos':
                if ( $result['dataset'] = $detalle->descuentos() ) {
                    $result['status'] = 1;
                } else {
                    $result['exception'] = 'No hay datos disponibles';
                }
                break;
            /*Acción a realizar cuando se quiera la cantidad de producto según tipo de producto*/
            case 'tiposProductos':
                if ( $result['dataset'] = $detalle->tiposProductos() ) {
                    $result['status'] = 1;
                } else {
                    $result['exception'] = 'No hay datos disponibles';
                }
                break;
            /*Acción a realizar cuando se quiera la cantidad de usuarios según tipo de usuario*/
            case 'tiposUsuarios':
                if ( $result['dataset'] = $detalle->tiposUsuarios() ) {
                    $result['status'] = 1;
                } else {
                    $result['exception'] = 'No hay datos disponibles';
                }
                break;
            /*Acción a realizar cuando se quiera la cantidad de reseñas según calificación*/
            case 'calificaciones':
                if ( $result['dataset'] = $detalle->calificaciones() ) {
                    $result['status'] = 1;
                } else {
                    $result['exception'] = 'No hay datos disponibles';
                }
                break;
            /*Acción a realizar cuando se quieran los 7 clientes con más dinero invertido en la tienda*/
            case 'inversionesClientes':
                if ( $result['dataset'] = $detalle->inversionesClientes() ) {
                    $result['status'] = 1;
                } else {
                    $result['exception'] = 'No hay datos disponibles';
                }
                break;
            /*Acción a realizar cuando se quieran los 5 clientes con más reseñas*/
            case 'resenasClientes':
                if ( $result['dataset'] = $detalle->resenasClientes() ) {
                    $result['status'] = 1;
                } else {
                    $result['exception'] = 'No hay datos disponibles';
                }
                break;
            /*Acción a realizar cuando se quiera la cantidad de compras de productos de cada marca*/
            case 'comprasMarcas':
                if ( $result['dataset'] = $detalle->comprasMarcas() ) {
                    $result['status'] = 1;
                } else {
                    $result['exception'] = 'No hay datos disponibles';
                }
                break;
            /*Acción a realizar cuando se quiera la cantidad de reseñas según estado de reseña*/
            case 'estadosResenas':
                if ( $result['dataset'] = $detalle->estadosResenas() ) {
                    $result['status'] = 1;
                } else {
                    $result['exception'] = 'No hay datos disponibles';
                }
                break;
            /*Acción a realizar cuando se quieran los 7 productos con más reseñas*/
            case 'resenasProductos':
                if ( $result['dataset'] = $detalle->resenasProductos() ) {
                    $result['status'] = 1;
                } else {
                    $result['exception'] = 'No hay datos disponibles';
                }
                break;
            /*Acción a realizar cuando se quieran los 7 productos con mejor promedio de calificaciones en sus reseñas*/
            case 'promedioResenas':
                if ( $result['dataset'] = $detalle->promedioResenas() ) {
                    $result['status'] = 1;
                } else {
                    $result['exception'] = 'No hay datos disponibles';
                }
                break;
            default:
                exit('Acción no disponible');
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