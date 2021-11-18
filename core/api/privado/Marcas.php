<?php
require_once('../../helpers/conexion.php');
require_once('../../helpers/validator.php');
require_once('../../models/privado/Marcas.php');

// Se comprueba si existe una acción a realizar, de lo contrario se finaliza el script con un mensaje de error.
if (isset($_GET['action'])) {
    // Se crea una sesión o se reanuda la actual para poder utilizar variables de sesión en el script.
    session_start();
    // Se instancia la clase correspondiente.
    $marcas = new Marcas;
    // Se declara e inicializa un arreglo para guardar el resultado que retorna la API.
    $result = array('status' => 0, 'message' => null, 'exception' => null);
    // Se verifica si existe una sesión iniciada como administrador, de lo contrario se finaliza el script con un mensaje de error.
    if (isset($_SESSION['id_usuario'])) {
        // Se compara la acción a realizar cuando un administrador ha iniciado sesión.
        switch ($_GET['action']) {
            case 'readAll':
                if ($result['dataset'] = $marcas->readAllMarcas()) {
                    $result['status'] = 1;
                } else {
                    $result['exception'] = 'No hay marcas registradas';
                }
                break;
            case 'search':
                $_POST = $marcas->validateForm($_POST);
                if ($_POST['txt_buscar'] != '') {
                    if ($result['dataset'] = $marcas->buscarMarca($_POST['txt_buscar'])) {
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
                $_POST = $marcas->validateForm($_POST);
                if ($marcas->setMarca($_POST['txt_marca'])) {
                    if (is_uploaded_file($_FILES['imagen_marca']['tmp_name'])) {
                        if ($marcas->setImagen($_FILES['imagen_marca'])) {
                            if ($marcas->createMarca()) {
                                $result['status'] = 1;
                                $result['message'] = 'Marca creada correctamente';
                            } else {
                                $result['exception'] = Conexion::getException();;
                            }
                        } else {
                            $result['exception'] = $marcas->getImageError();
                        }
                    } else {
                        $result['exception'] = 'Seleccione una imagen';
                    }
                } else {
                    $result['exception'] = 'marca incorrecta';
                }
                break;
            case 'readOne':
                if ($marcas->setId($_POST['id_marca'])) {
                    if ($result['dataset'] = $marcas->readOneMarcas()) {
                        $result['status'] = 1;
                    } else {
                        $result['exception'] = 'marcas inexistente';
                    }
                } else {
                    $result['exception'] = 'marcas incorrecto';
                }
                break;
            case 'update':
                $_POST = $marcas->validateForm($_POST);
                if ($marcas->setId($_POST['id_marca'])) {
                    if ($data = $marcas->readOneMarcas()) {
                        if ($marcas->setMarca($_POST['txt_marca'])) {
                            if (is_uploaded_file($_FILES['imagen_marca']['tmp_name'])) {
                                if ($marcas->setImagen($_FILES['imagen_marca'])) {
                                    if ($marcas->updateMarcas()) {
                                        $result['status'] = 1;
                                        if ($marcas->deleteFile($marcas->getRuta(), $data['imagen_marca'])) {
                                            $result['message'] = 'Marca modificada correctamente';
                                            } else {
                                                $result['message'] = 'Marca modificada pero no se borro la imagen anterior';
                                            }
                                    } else {
                                        $result['exception'] = Conexion::getException();
                                    }
                                } else {
                                    $result['exception'] = $marcas->getImageError();
                                }
                            } else {
                                if ($marcas->updateMarcas()) {
                                    $result['status'] = 1;
                                    $result['message'] = 'Marca modificada correctamente';
                                } else {
                                    $result['exception'] = Conexion::getException();
                                } 
                            }
                        } else {
                            $result['exception'] = 'Marca';
                        }
                    } else {
                        $result['exception'] = 'Marca inexistente';
                    }
                } else {
                    $result['exception'] = 'Marca incorrecta';
                }
                break;
            case 'delete':
                if ($marcas->setId($_POST['id_marca'])) {
                    if ($data = $marcas->readOneMarcas()) {
                        if ($marcas->deleteMarca()) {
                            $result['status'] = 1;
                            if ($marcas->deleteFile($marcas->getRuta(), $data['imagen_marca'])) {
                                $result['message'] = 'Marca eliminada correctamente';
                            } else {
                                $result['message'] = 'Marca eliminada pero no se borro la imagen';
                            }
                        } else {
                            $result['exception'] = Conexion::getException();
                        }
                    } else {
                        $result['exception'] = 'Marca inexistente';
                    }
                } else {
                    $result['exception'] = 'Marca incorrecto';
                }
                break;
            /*    
            case 'cantidadmarcassCategoria':
                if ($result['dataset'] = $marcas->cantidadmarcassCategoria()) {
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