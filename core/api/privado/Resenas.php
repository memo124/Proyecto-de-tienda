<?php
require_once('../../helpers/conexion.php');
require_once('../../helpers/validator.php');
require_once('../../models/privado/Resenas.php');

// Se comprueba si existe una acción a realizar, de lo contrario se finaliza el script con un mensaje de error.
if (isset($_GET['action'])) {
    // Se crea una sesión o se reanuda la actual para poder utilizar variables de sesión en el script.
    session_start();
    // Se instancia la clase correspondiente.
    $resenas = new Resenas;
    // Se declara e inicializa un arreglo para guardar el resultado que retorna la API.
    $result = array('status' => 0, 'message' => null, 'exception' => null);
    // Se verifica si existe una sesión iniciada como administrador, de lo contrario se finaliza el script con un mensaje de error.
    if (isset($_SESSION['id_usuario'])) {
        // Se compara la acción a realizar cuando un administrador ha iniciado sesión.
        switch ($_GET['action']) {
            case 'readAll':
                if ($result['dataset'] = $resenas->readAllResenas()) {
                    $result['status'] = 1;
                } else {
                    $result['exception'] = 'No hay reseñas registradas';
                }
                break;
            case 'search':
                $_POST = $resenas->validateForm($_POST);
                if ($_POST['txt_buscar'] != '') {
                    if ($result['dataset'] = $resenas->buscarResena($_POST['txt_buscar'])) {
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
            case 'readOne':
                if ($resenas->setId($_POST['id_resena'])) {
                    if ($result['dataset'] = $resenas->readOneResena()) {
                        $result['status'] = 1;
                    } else {
                        $result['exception'] = 'Producto inexistente';
                    }
                } else {
                    $result['exception'] = 'Producto incorrecto';
                }
                break;
            case 'update':
                $_POST = $resenas->validateForm($_POST);
                if ($resenas->setId($_POST['id_resena'])) {
                    if ($data = $resenas->readOneResena()) {
                        if ($resenas->setEstado(isset($_POST['estado_resena']) ? 1 : 0)) {
                            if ($resenas->updateResenas()) {
                                $result['status'] = 1;
                                $result['message'] = 'Reseña modificada correctamente';
                            } else {
                                $result['exception'] = Conexion::getException();
                            }
                        }else{
                            $result['exception'] = 'Estado incorrecto';
                        }            
                    } else {
                        $result['exception'] = 'Reseña inexistente';
                    }
                } else {
                    $result['exception'] = 'Reseña incorrecta';
                }
                break;
            case 'delete':
                if ($resenas->setId($_POST['id_resena'])) {
                    if ($data = $resenas->readOneResena()) {
                        if ($resenas->deleteResena()) {
                            $result['status'] = 1;
                            $result['message'] = 'Reseña eliminada correctamente';
                        } else {
                            $result['exception'] = Conexion::getException();
                        }
                    } else {
                        $result['exception'] = 'Reseña inexistente';
                    }
                } else {
                    $result['exception'] = 'Reseña incorrecta';
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