<?php
//ruta de los archivos necesarios a usar en el api
require_once('../../helpers/conexion.php');
require_once('../../helpers/validator.php');
require_once('../../models/privado/tipo_producto.php');
// Se comprueba si existe una acción a realizar, de lo contrario se finaliza el script con un mensaje de error.
if(isset($_GET['action']))
{
    // Se crea una sesión o se reanuda la actual para poder utilizar variables de sesión en el script.
    session_start();
    // Se instancia la clase correspondiente.
    $tipo = new Tipoproducto;
    // Se declara e inicializa un arreglo para guardar el resultado que retorna la API.
    $result = array('status'=> 0, 'message' =>null,'exception' => null);
    // Se verifica si existe una sesión iniciada como administrador, de lo contrario se finaliza el script con un mensaje de error.
    if (isset($_SESSION['id_usuario'])) {
         // Se compara la acción a realizar cuando un administrador ha iniciado sesión.
    switch($_GET['action']){
        case 'readAll':
            if ($result['dataset'] =$tipo->readtipoproducto()) {
                $result['status'] = 1;
            } else {
                $result['exception'] = 'No hay tipos de productos registrados';
            }
            break;
            case 'create':
                $_POST = $tipo->validateForm($_POST);
                if($tipo->setTipoProducto($_POST['txt_tipo'])){
                  if ($tipo->setPromocion($_POST['txt_promocion'])) {
                      if ($tipo->createtipoproducto()) {
                          $result['status'] = 1;
                          $result['message'] = 'Tipo de producto agregado';
                      }else{
                          $result['exception'] = Conexion::getException();
                      }
                  }
                  else {
                      $result['exception'] = 'Promocion incorrecta';
                  }
                } 
                else{
                    $result['exception'] = 'estado mal ingresado'; 
                }
            break;
            case'readOne':
                if ($tipo->setId($_POST['id_tipo'])) {
                    if($result['dataset']=$tipo->gettipoP()){
                        $result['status'] = 1;
                    }else{
                        $result['exception'] = 'Tipo de producto inexistente';
                    }
                }else{
                    $result['exception'] = 'tipo de producto incorrecto';
                }
            break;
            case'update':
                $_POST = $tipo->validateForm($_POST);
                if ($tipo->setId($_POST['id_tipo'])) {
                    if ($tipo->gettipoP()) {
                        if ($tipo->setTipoProducto($_POST['txt_tipo'])) {
                            if ($tipo->setPromocion($_POST['txt_promocion'])) {
                                if ($tipo->updatetipoproducto()) {
                                    $result['status'] = 1;
                                    $result['message'] = 'tipo de producto actualizado';
                                }
                                else{
                                    $result['exception'] = Conexion::getException();
                                }
                            }
                            else{
                                $result['exception'] = 'Promocion incorrecta';
                            }
                        }
                        else{
                            $result['exception'] ='Tipo de producto incorrecto';
                        }
                    }
                    else{
                        $result['exception'] = 'Tipo de producto no encontrado';
                    }
                }
                else{
                    $result['exception'] = 'Id tipo de producto incorrecto';
                }
            break;
            case'delete':
                if($tipo->setId($_POST['id_tipo'])){
                    if($tipo->gettipoP()){
                        if($tipo->deletetipoproducto()){
                            $result['status'] = 1;
                            $result['message'] = 'Tipo de producto eliminado';
                        }else {
                            $result['exception'] = Conexion::getException();
                        }
                    }else {
                        $result['exception'] = 'Tipo de producto inexistente';
                    }
                }else {
                    $result['exception'] = 'Id incorrecto';
                }
            break;
            case'search':
                $_POST = $tipo->validateForm($_POST);
                if($_POST['txt_buscar'] != ''){
                    if ($result['dataset'] = $tipo->searchtipoproducto($_POST['txt_buscar'])) {
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
