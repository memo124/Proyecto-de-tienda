<?php
//ruta de los archivos necesarios a usar en el api
require_once('../../helpers/conexion.php');
require_once('../../helpers/validator.php');
require_once('../../models/privado/estado_usuario.php');
// Se comprueba si existe una acción a realizar, de lo contrario se finaliza el script con un mensaje de error.
if(isset($_GET['action']))
{
    // Se crea una sesión o se reanuda la actual para poder utilizar variables de sesión en el script.
    session_start();
    // Se instancia la clase correspondiente.
    $estado = new Estadousuario;
    // Se declara e inicializa un arreglo para guardar el resultado que retorna la API.
    $result = array('status'=> 0, 'message' =>null,'exception' => null);
    // Se verifica si existe una sesión iniciada como administrador, de lo contrario se finaliza el script con un mensaje de error.
    if (isset($_SESSION['id_usuario'])) {
        // Se compara la acción a realizar cuando un administrador ha iniciado sesión.
    switch($_GET['action']){
        case 'readAll':
            if ($result['dataset'] =$estado->readestadou()) {
                $result['status'] = 1;
            } else {
                $result['exception'] = 'No hay tipos de productos registrados';
            }
            break;
            case 'create':
                $_POST = $estado->validateForm($_POST);
                  if ($estado->setEstadoU($_POST['txt_estado'])) {
                      if ($estado->createestadou()) {
                          $result['status'] = 1;
                          $result['message'] = 'estado agregado';
                      }else{
                          $result['exception'] = Conexion::getException();
                      }
                  }
                  else {
                      $result['exception'] = 'estado incorrecta';
                  }
            break;
            case'readOne':
                if ($estado->setId($_POST['id_estado'])) {
                    if($result['dataset']=$estado->getestadousu()){
                        $result['status'] = 1;
                    }else{
                        $result['exception'] = 'estado inexistente';
                    }
                }else{
                    $result['exception'] = 'estado incorrecto';
                }
            break;
            case'update':
                $_POST = $estado->validateForm($_POST);
                if ($estado->setId($_POST['id_estado'])) {
                    if ($estado->getestadousu()) {
                        if ($estado->setEstadoU($_POST['txt_estado'])) {
                                if ($estado->updateestadou()) {
                                    $result['status'] = 1;
                                    $result['message'] = 'Estado actualizado';
                                }
                                else{
                                    $result['exception'] = Conexion::getException();
                                }
                        }
                        else{
                            $result['exception'] ='Estado incorrecto';
                        }
                    }
                    else{
                        $result['exception'] = 'Estado no encontrado';
                    }
                }
                else{
                    $result['exception'] = 'Id estado incorrecto';
                }
            break;
            case'delete':
                if($estado->setId($_POST['id_estado'])){
                    if($data = $estado->getestadousu()){
                        if($estado->deleteestadou()){
                            $result['status'] = 1;
                            $result['message'] = 'estado usuario eliminado correctamente';
                        }else {
                            $result['exception'] = Conexion::getException();
                        }
                    }else {
                        $result['exception'] = 'estado usuario inexistente';
                    }
                }else {
                    $result['exception'] = 'Id incorrecto';
                }
            break;
            case'search':
                $_POST = $estado->validateForm($_POST);
                if($_POST['txt_buscar'] != ''){
                    if ($result['dataset'] = $estado->searchestadou($_POST['txt_buscar'])) {
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
