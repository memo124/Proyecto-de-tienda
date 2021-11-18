<?php
require_once('../../helpers/conexion.php');
require_once('../../helpers/validator.php');
require_once('../../models/privado/Clientes.php');

// Se comprueba si existe una acción a realizar, de lo contrario se finaliza el script con un mensaje de error.
if (isset($_GET['action'])) {
    // Se crea una sesión o se reanuda la actual para poder utilizar variables de sesión en el script.
    session_start();
    // Se instancia la clase correspondiente.
    $clientes = new Clientes;
    // Se declara e inicializa un arreglo para guardar el resultado que retorna la API.
    $result = array('status' => 0, 'message' => null, 'exception' => null);
    // Se verifica si existe una sesión iniciada como administrador, de lo contrario se finaliza el script con un mensaje de error.
    if (isset($_SESSION['id_usuario'])) {
        // Se compara la acción a realizar cuando un administrador ha iniciado sesión.
        switch ($_GET['action']) {
            // Case para obtener todos los datos
            case 'readAll':
                if ($result['dataset'] = $clientes->readAllClientes()) {
                    $result['status'] = 1;
                } else {
                    $result['exception'] = 'No hay clientes registrados';
                }
                break;
            //Case para obtener los datos atraves de una busqueda
            case 'search':
                $_POST = $clientes->validateForm($_POST);
                if ($_POST['txt_buscar'] != '') {
                    if ($result['dataset'] = $clientes->buscarClientes($_POST['txt_buscar'])) {
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
            // Case para ingresar datos y crear registros
            case 'create':
                $_POST = $clientes->validateForm($_POST);
                if ($clientes->setNombre($_POST['txt_nombres_cliente'])) {
                    if($clientes->setApellido($_POST['txt_apellidos_cliente'])){
                        if($clientes->setCorreo($_POST['txt_correo_cliente'])){
                            if($clientes->setUsuario($_POST['txt_usuario_cliente'])){
                                if($clientes->setContrasena($_POST['txt_contraseña_cliente'])){
                                    if(isset($_POST['cb_estado_cliente'])){
                                        if($clientes->setEstado($_POST['cb_estado_cliente'])){
                                            if ($clientes->createClientes()) {
                                                $result['status'] = 1;
                                                $result['message'] = 'Cliente creado correctamente';
                                            } else {
                                                $result['exception'] = Conexion::getException();;
                                            }
                                        }else{
                                            $result['exception'] = 'Estado incorrecto';
                                        }
                                    }else{
                                        $result['exception'] = 'Seleccione un estado';
                                }
                                }
                                else{
                                    $result['exception'] = 'Contraseña incorrecto';
                                }
                            }else{
                                $result['exception'] = 'Usuario incorrecto';
                            }
                        }else{
                            $result['exception'] = 'Correo incorrecto';
                        }
                    }else{
                        $result['exception'] = 'Apellido incorrecto';
                    }
                } else {
                    $result['exception'] = 'Nombre incorrecto';
                }
                break;
            //Case para obtener todos los datos
            case 'readOne':
                if ($clientes->setId($_POST['id_cliente'])) {
                    if ($result['dataset'] = $clientes->readOneClientes()) {
                        $result['status'] = 1;
                    } else {
                        $result['exception'] = 'Estado inexistente';
                    }
                } else {
                    $result['exception'] = 'Estado incorrecto';
                }
                break;
            //Case para Actualizar los datos
            case 'update':
                $_POST = $clientes->validateForm($_POST);
                if($clientes->setId($_POST['id_cliente'])){
                    if ($clientes->readOneClientes()){
                        if ($clientes->setNombre($_POST['txt_nombres_cliente'])) {
                            if($clientes->setApellido($_POST['txt_apellidos_cliente'])){
                                if($clientes->setCorreo($_POST['txt_correo_cliente'])){
                                        if($clientes->setEstado($_POST['cb_estado_cliente'])){
                                            if ($clientes->updateClientes()) {
                                                $result['status'] = 1;
                                                 $result['message'] = 'Cliente modificado correctamente';
                                            } else {
                                                $result['exception'] = Conexion::getException();;
                                            }
                                        }else{
                                            $result['exception'] = 'Estado incorrecto';
                                        }
                                }else{
                                    $result['exception'] = 'Correo incorrecto';
                                }
                            }else{
                                $result['exception'] = 'Apellido incorrecto';
                            }
                        } else {
                            $result['exception'] = 'Nombre incorrecto';
                        }
                    }else{
                        $result['exception'] = 'Cliente inexistente';
                }
            }else{
                $result['exception'] = 'Cliente incorrecto';
            }
        break;
        //Case para eliminar un dato
            case 'delete':
                if ($clientes->setId($_POST['id_cliente'])) {
                    if ($data = $clientes->readOneClientes()) {
                        if ($clientes->deleteClientes()) {
                            $result['status'] = 1;
                            $result['message'] = 'Cliente eliminado correctamente';
                        } else {
                            $result['exception'] = Conexion::getException();
                        }
                    } else {
                        $result['exception'] = 'Cliente inexistente';
                    }
                } else {
                    $result['exception'] = 'Cliente incorrecto';
                }
                break;
            //Case para visualizar pedidos
            case 'verPedidos':
                if ($clientes->setId($_POST['id_cliente'])) {
                    if ($result['dataset'] = $clientes->obtenerPedidos()) {
                        $result['status'] = 1;
                    } else {
                        $result['exception'] = 'No hay datos de este cliente';
                    }
                } else {
                    $result['exception'] = 'Cliente incorrecto';
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