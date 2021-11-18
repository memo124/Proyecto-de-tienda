<?php
//ruta de los archivos necesarios a usar en el api
require_once('../../helpers/conexion.php');
require_once('../../helpers/validator.php');
require_once('../../models/privado/estado_factura.php');
// Se comprueba si existe una acción a realizar, de lo contrario se finaliza el script con un mensaje de error.
if(isset($_GET['action']))
{
    session_start();
    // Se crea una sesión o se reanuda la actual para poder utilizar variables de sesión en el script.
    $estado = new Estado;
    // Se declara e inicializa un arreglo para guardar el resultado que retorna la API.
    $result = array('status'=> 0, 'message' =>null,'exception' => null);
    // Se verifica si existe una sesión iniciada como administrador, de lo contrario se finaliza el script con un mensaje de error.
    if (isset($_SESSION['id_usuario'])) {
        // Se compara la acción a realizar cuando un administrador ha iniciado sesión.
    switch($_GET['action']){
        //Case para poder leer todos los estados 
        case 'readAll':
            if ($result['dataset'] = $estado->readestado()) {
                $result['status'] = 1;
            } else {
                $result['exception'] = 'No hay usuarios registradas';
            }
            break;
            //Case para crear el estado de factura
            case 'create':
                $_POST = $estado->validateForm($_POST);
                if($estado->setEstado($_POST['txt_estado'])){
                  if($estado->createestado()){
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
            //Case para leer los estados por el ID
            case 'readOne':
                if($estado->setId($_POST['id_estado'])){
                    if($result['dataset']=$estado->getestado()){
                        $result['status'] = 1;
                    }else{
                        $result['exception'] = 'Estado inexistente';
                    }
                }else{
                    $result['exception'] = 'Estado incorrecto';
                }
            break;
            //Case para actualizar el estado de la factura
            case 'update':
                $_POST=$estado->validateForm($_POST);
                if($estado->setId($_POST['id_estado'])){
                    if($estado->getestado()){
                        if($estado->setEstado($_POST['txt_estado'])){
                            if($estado->updateestado()){
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
            //Case para eliminar el estado de la factura
            case'delete':
                if($estado->setId($_POST['id_estado_producto'])){
                    if($estado->getestado()){
                        if($estado->deleteestado()){
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
            //Case para buscar el estado de factura
            case'search':
                $_POST = $estado->validateForm($_POST);
                if($_POST['txt_buscar'] != ''){
                    if ($result['dataset'] = $estado->searchestado($_POST['txt_buscar'])) {
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
