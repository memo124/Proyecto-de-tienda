<?php
require_once('../../helpers/conexion.php');
require_once('../../helpers/validator.php');
require_once('../../models/privado/EstadoClientes.php');

// Se comprueba si existe una acción a realizar, de lo contrario se finaliza el script con un mensaje de error.
if (isset($_GET['action'])) {
    // Se crea una sesión o se reanuda la actual para poder utilizar variables de sesión en el script.
    session_start();
    // Se instancia la clase correspondiente.
    $estado = new Estados;
    // Se declara e inicializa un arreglo para guardar el resultado que retorna la API.
    $result = array('status' => 0, 'message' => null, 'exception' => null);
    // Se verifica si existe una sesión iniciada como administrador, de lo contrario se finaliza el script con un mensaje de error.
    if (isset($_SESSION['id_usuario'])) {
        // Se compara la acción a realizar cuando un administrador ha iniciado sesión.
        switch ($_GET['action']) {
            case 'readAll':
                if ($result['dataset'] = $estado->readAllEstados()) {
                    $result['status'] = 1;
                } else {
                    $result['exception'] = 'No hay estados registrados';
                }
                break;
            case 'search':
                $_POST = $estado->validateForm($_POST);
                if ($_POST['txt_buscar'] != '') {
                    if ($result['dataset'] = $estado->buscarEstados($_POST['txt_buscar'])) {
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
                $_POST = $estado->validateForm($_POST);
                if ($estado->setEstado($_POST['txt_estado'])) {
                    if ($estado->createEstado()) {
                        $result['status'] = 1;
                        $result['message'] = 'estado creado correctamente';
                    } else {
                        $result['exception'] = Conexion::getException();;
                    }
                } else {
                    $result['exception'] = 'Estado incorrecto';
                }
                break;
            case 'readOne':
                if ($estado->setId($_POST['id_estado'])) {
                    if ($result['dataset'] = $estado->readOneEstado()) {
                        $result['status'] = 1;
                    } else {
                        $result['exception'] = 'Estado inexistente';
                    }
                } else {
                    $result['exception'] = 'Estado incorrecto';
                }
                break;
            case 'update':
                $_POST = $estado->validateForm($_POST);
                if ($estado->setId($_POST['id_estado'])) {
                    if ($data = $estado->readOneEstado()) {
                        if ($estado->setEstado($_POST['txt_estado'])) {
                            if ($estado->updateEstado()) {
                                $result['status'] = 1;
                                $result['message'] = 'Estado modificado correctamente';
                            } else {
                                $result['exception'] = Conexion::getException();
                            }    
                        } else {
                            $result['exception'] = 'Estado incorrecto';
                        }
                    } else {
                        $result['exception'] = 'Estado inexistente';
                    }
                } else {
                    $result['exception'] = 'Estado incorrecto';
                }
                break;
        break;
            case 'delete':
                if ($estado->setId($_POST['id_estado'])) {
                    if ($data = $estado->readOneEstado()) {
                        if ($estado->deleteEstado()) {
                            $result['status'] = 1;
                            $result['message'] = 'estado eliminado correctamente';
                        } else {
                            $result['exception'] = Conexion::getException();
                        }
                    } else {
                        $result['exception'] = 'estado inexistente';
                    }
                } else {
                    $result['exception'] = 'estado incorrecto';
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