<?php
require_once('../../helpers/conexion.php');
require_once('../../helpers/validator.php');
require_once('../../models/privado/productos.php');
// Se comprueba si existe una acción a realizar, de lo contrario se finaliza el script con un mensaje de error.
if (isset($_GET['action'])) {
    // Se crea una sesión o se reanuda la actual para poder utilizar variables de sesión en el script.
    session_start();
    // Se instancia la clase correspondiente.
    $producto = new Producto;
    // Se declara e inicializa un arreglo para guardar el resultado que retorna la API.
    $result = array('status' => 0, 'message' => null, 'exception' => null);
    // Se verifica si existe una sesión iniciada como administrador, de lo contrario se finaliza el script con un mensaje de error.
    if (isset($_SESSION['id_usuario'])) {
         // Se compara la acción a realizar cuando un administrador ha iniciado sesión.
         switch ($_GET['action']) {
            case 'readAll':
                if ($result['dataset'] = $producto->readproducto()) {
                    $result['status'] = 1;
                } else {
                    $result['exception'] = 'No hay productos registrados';
                }
                break;
            case 'search':
                $_POST = $producto->validateForm($_POST);
                if ($_POST['txt_buscar'] != '') {
                    if ($result['dataset'] = $producto->searchproducto($_POST['txt_buscar'])) {
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
                $_POST = $producto->validateForm($_POST);
                if ($producto->setNombre($_POST['nombre_producto'])) {
                    if ($producto->setPrecio($_POST['precio_producto'])) {
                        if ($producto->setCantidad($_POST['cantidad_producto'])) {
                            if (is_uploaded_file($_FILES['imagen_producto']['tmp_name'])) {
                                if ($producto->setImagen($_FILES['imagen_producto'])) {
                                    if (isset($_POST['cb_estado'])) {
                                        if ($producto->setEstado($_POST['cb_estado'])) {
                                            if (isset($_POST['cb_marca'])) {
                                                if ($producto->setMarca($_POST['cb_marca'])) {
                                                    if (isset($_POST['cb_tipo'])) {
                                                        if ($producto->setTipo($_POST['cb_tipo'])) {
                                                            if ($producto->createproducto()) {
                                                                $result['status'] = 1;
                                                                $result['message'] = 'Se agrego correctamente';
                                                            }else {
                                                                $result['exception'] = Conexion::getException();
                                                            }
                                                        }else {
                                                            $result['exception'] = 'Tipo de producto incorrecto';
                                                        }
                                                    }else {
                                                        $result['exception'] = 'Selecciona un tipo de producto';
                                                    }
                                                }else {
                                                    $result['exception'] = 'Marca incorrecta';
                                                }
                                            }else {
                                                $result['exception'] = 'Selecciona una marca';
                                            }
                                        }
                                        else {
                                            $result['exception'] = 'Estado incorrecto';
                                        }
                                    }else{
                                        $result['exception'] = 'Seleccione un estado';
                                    }    
                                } else {
                                    $result['exception'] = $producto->getImageError();
                                }
                            } else {
                                $result['exception'] = 'Seleccione una imagen';
                            }
                        }
                        else {
                            $result ['exception'] = 'Cantidad incorrecta';
                        }
                    }
                    else
                    {
                        $result['exception'] = 'Precio incorrecto';
                    }
                } else {
                    $result['exception'] = 'Nombre incorrecto';
                }
                break;
            case 'readOne':
                if ($producto->setId($_POST['id_producto'])) {
                    if ($result['dataset'] = $producto->getproducto()) {
                        $result['status'] = 1;
                    } else {
                        $result['exception'] = 'producto inexistente';
                    }
                } else {
                    $result['exception'] = 'producto incorrecto';
                }
                break;
            case 'delete':
                if ($producto->setId($_POST['id_producto'])) {
                    if ($data = $producto->getproducto()) {
                        if ($producto->deleteproducto()) {
                            $result['status'] = 1;
                            if ($producto->deleteFile($producto->getRuta(), $data['imagen'])) {
                                $result['message'] = 'Producto eliminada correctamente';
                            } else {
                                $result['message'] = 'Producto eliminada pero no se borro la imagen';
                            }
                        } else {
                            $result['exception'] = Conexion::getException();
                        }
                    } else {
                        $result['exception'] = 'Producto inexistente';
                    }
                } else {
                    $result['exception'] = 'Producto incorrecto';
                }
                break;
                case 'update':
                    $_POST = $producto->validateForm($_POST);
                    if ($producto->setId($_POST['id_producto'])) {
                        if ($data = $producto->getproducto()) {
                            if ($producto->setNombre($_POST['nombre_producto'])) {
                                if ($producto->setPrecio($_POST['precio_producto'])) {
                                    if ($producto->setCantidad($_POST['cantidad_producto'])) {
                                            if (isset($_POST['cb_estado'])) {
                                                if ($producto->setEstado($_POST['cb_estado'])) {
                                                    if (isset($_POST['cb_marca'])) {
                                                        if ($producto->setMarca($_POST['cb_marca'])) {
                                                            if (isset($_POST['cb_tipo'])) {
                                                                if ($producto->setTipo($_POST['cb_tipo'])) {
                                                                    if (is_uploaded_file($_FILES['imagen_producto']['tmp_name'])) {
                                                                        if ($producto->setImagen($_FILES['imagen_producto'])) {
                                                                            if ($producto->updateproducto()) {
                                                                                $result['status'] = 1;
                                                                                if ($producto->deleteFile($producto->getRuta(), $data['imagen'])) {
                                                                                    $result['message'] = 'Producto modificado correctamente';
                                                                                } else {
                                                                                    $result['message'] = 'Producto modificado pero no se borro la imagen anterior';
                                                                                }
                                                                            }else {
                                                                                $result['exception'] = Conexion::getException();
                                                                            }
                                                                        }
                                                                        else {
                                                                            $result['exception'] = $producto->getImageError();
                                                                        }
                                                                    }else {                                                                        
                                                                        if ($producto->updateproducto()) {
                                                                            $result['status'] = 1;
                                                                            $result['message'] = 'Se Actualizo correctamente';
                                                                        }else {
                                                                            $result['exception'] = Conexion::getException();
                                                                        }
                                                                    }
                                                                }else {
                                                                    $result['exception'] = 'Tipo de producto incorrecto';
                                                                }
                                                            }else {
                                                                $result['exception'] = 'Selecciona un tipo de producto';
                                                            }
                                                        }else {
                                                            $result['exception'] = 'Marca incorrecta';
                                                        }
                                                    }else {
                                                        $result['exception'] = 'Selecciona una marca';
                                                    }
                                                }
                                                else {
                                                    $result['exception'] = 'Estado incorrecto';
                                                }
                                            }else{
                                                $result['exception'] = 'Seleccione un estado';
                                            }    
                                    }
                                    else {
                                        $result ['exception'] = 'Cantidad incorrecta';
                                    }
                                }
                                else
                                {
                                    $result['exception'] = 'Precio incorrecto';
                                }
                            } else {
                                $result['exception'] = 'Nombre incorrecto';
                            }
                        } else {
                            $result['exception'] = 'Producto inexistente';
                        }
                    } else {
                        $result['exception'] = 'Producto incorrecto';
                    }    
                    break;
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