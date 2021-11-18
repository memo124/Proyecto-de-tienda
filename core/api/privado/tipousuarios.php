<?php
//ruta de los archivos necesarios a usar en el api
require_once('../../helpers/conexion.php');
require_once('../../helpers/validator.php');
require_once('../../models/privado/tipo_usuario.php');
// Se comprueba si existe una acción a realizar, de lo contrario se finaliza el script con un mensaje de error.
if(isset($_GET['action']))
{
    // Se crea una sesión o se reanuda la actual para poder utilizar variables de sesión en el script.
    session_start();
    // Se instancia la clase correspondiente.
    $estado = new Tipousuario;
    // Se declara e inicializa un arreglo para guardar el resultado que retorna la API.
    $result = array('status'=> 0, 'message' =>null,'exception' => null);
    // Se verifica si existe una sesión iniciada como administrador, de lo contrario se finaliza el script con un mensaje de error.
    if (isset($_SESSION['id_usuario'])) {
        // Se compara la acción a realizar cuando un administrador ha iniciado sesión.    switch($_GET['action']){
    switch ($_GET['action']) {
        case 'readAll':
            if ($result['dataset'] = $estado->readtipousuario()) {
                $result['status'] = 1;
            } else {
                $result['exception'] = 'No hay tipos de usuarios registradas';
            }
            break;
            case 'create':
                $_POST = $estado->validateForm($_POST);
                if($estado->setTipoUsuario($_POST['txt_tipo'])){
                  if($estado->inserttipousuario()){
                      $result['status'] = 1;
                      $result['message'] = 'tipo de usuario creado';
                  }  
                  else{
                      $result['exception'] = Conexion::getException();
                  }
                } 
                else{
                    $result['exception'] = 'tipo de usuario mal ingresado'; 
                }
            break;
            case 'readOne':
                if($estado->setId($_POST['id_tipo'])){
                    if($result['dataset']=$estado->gettipou()){
                        $result['status'] = 1;
                    }else{
                        $result['exception'] = 'tipos de usuarios inexistente';
                    }
                }else{
                    $result['exception'] = 'tipos de usuarios incorrecto';
                }
            break;
            case 'update':
                $_POST=$estado->validateForm($_POST);
                if($estado->setId($_POST['id_tipo'])){
                    if($estado->gettipou()){
                        if($estado->setTipoUsuario($_POST['txt_tipo'])){
                            if($estado->updatetipousuario()){
                                $result['status'] = 1;
                                $result['message'] = 'tipos de usuarios actualizado';
                            }else{
                                $result['exception'] = Conexion::getException();
                            }
                        }else {
                            $result['exception'] = 'no se logro recuperar el tipos de usuarios';
                        }  
                    }else{
                        $result['exception'] = 'tipos de usuarios inexistente';
                    }
                }else{
                    $result['exception'] = 'Id incorrecto';
                }
            break;
            case'delete':
                if($estado->setId($_POST['id_tipo'])){
                    if($estado->gettipou()){
                        if($estado->deletetipousuario()){
                            $result['status'] = 1;
                            $result['message'] = 'tipos de usuarios eliminado';
                        }else {
                            $result['exception'] = Conexion::getException();
                        }
                    }else {
                        $result['exception'] = 'tipos de usuarios inexistente';
                    }
                }else {
                    $result['exception'] = 'Id incorrecto';
                }
            break;
            case'search':
                $_POST = $estado->validateForm($_POST);
                if($_POST['txt_buscar'] != ''){
                    if ($result['dataset'] = $estado->searchtipousuario($_POST['txt_buscar'])) {
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
