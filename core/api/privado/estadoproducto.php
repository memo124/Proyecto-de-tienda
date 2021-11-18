<?php
//ruta de los archivos necesarios a usar en el api
require_once('../../helpers/conexion.php');
require_once('../../helpers/validator.php');
require_once('../../models/privado/estado_producto.php');
// Se comprueba si existe una acción a realizar, de lo contrario se finaliza el script con un mensaje de error.
if(isset($_GET['action']))
{
    session_start();
    // Se crea una sesión o se reanuda la actual para poder utilizar variables de sesión en el script.
    $estado = new EstadoProducto;
    // Se declara e inicializa un arreglo para guardar el resultado que retorna la API.
    $result = array('status'=> 0, 'message' =>null,'exception' => null);
    // Se verifica si existe una sesión iniciada como administrador, de lo contrario se finaliza el script con un mensaje de error.
    if (isset($_SESSION['id_usuario'])) {
        // Se compara la acción a realizar cuando un administrador ha iniciado sesión.
    switch($_GET['action']){
        case 'readAll':
            if ($result['dataset'] = $estado->readestadoproducto()) {
                $result['status'] = 1;
            } else {
                $result['exception'] = 'No hay usuarios registradas';
            }
            break;
            case 'create':
                $_POST = $estado->validateForm($_POST);
                if($estado->setEstadoProducto($_POST['txt_estado'])){
                  if($estado->insertestadoproducto()){
                      $result['status'] = 1;
                      $result['message'] = 'Estado creado';
                  }  
                  else{
                      $result['exception'] = Conexion::getException();
                  }
                } 
                else{
                    $result['exception'] = 'estado mal ingresado'; 
                }
            break;
            case 'readOne':
                if($estado->setId($_POST['id_estado_producto'])){
                    if($result['dataset']=$estado->getestadop()){
                        $result['status'] = 1;
                    }else{
                        $result['exception'] = 'Estado inexistente';
                    }
                }else{
                    $result['exception'] = 'Estado incorrecto';
                }
            break;
            case 'update':
                $_POST=$estado->validateForm($_POST);
                if($estado->setId($_POST['id_estado'])){
                    if($estado->getestadop()){
                        if($estado->setEstadoProducto($_POST['txt_estado'])){
                            if($estado->updateestadoproducto()){
                                $result['status'] = 1;
                                $result['message'] = 'Estado actualizado';
                            }else{
                                $result['exception'] = Conexion::getException();
                            }
                        }else {
                            $result['exception'] = 'no se logro recuperar el estado';
                        }  
                    }else{
                        $result['exception'] = 'Estado inexistente';
                    }
                }else{
                    $result['exception'] = 'Id incorrecto';
                }
            break;
            case'delete':
                if($estado->setId($_POST['id_estado_producto'])){
                    if($estado->getestadop()){
                        if($estado->deleteestadoproducto()){
                            $result['status'] = 1;
                            $result['message'] = 'Estado eliminado';
                        }else {
                            $result['exception'] = Conexion::getException();
                        }
                    }else {
                        $result['exception'] = 'Estado inexistente';
                    }
                }else {
                    $result['exception'] = 'Id incorrecto';
                }
            break;
            case'search':
                $_POST = $estado->validateForm($_POST);
                if($_POST['txt_buscar'] != ''){
                    if ($result['dataset'] = $estado->searchestadoproducto($_POST['txt_buscar'])) {
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
                }else {
                    $result['exception'] = 'Ingrese el dato';
                }
            break;
    }
    }
    header('content-type: application/json; charset=utf-8');
    print(json_encode($result));
}else {
    exit('Recurso denegado');
}
