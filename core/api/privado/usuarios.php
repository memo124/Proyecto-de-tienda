<?php
//ruta de los archivos necesarios a usar en el api
require_once('../../helpers/conexion.php');
require_once('../../helpers/validator.php');
require_once('../../models/privado/usuarios.php');
// Se comprueba si existe una acción a realizar, de lo contrario se finaliza el script con un mensaje de error.
if(isset($_GET['action']))
{
    // Se crea una sesión o se reanuda la actual para poder utilizar variables de sesión en el script.
    session_start();
    // Se instancia la clase correspondiente.
    $usuario = new Usuario;
    $nombreusuariointento = '';
    $correousuario = '';
    $contrasena = '';
    // Se declara e inicializa un arreglo para guardar el resultado que retorna la API.
    $result = array('status'=> 0, 'message' =>null,'exception' => null);
    // Se verifica si existe una sesión iniciada como administrador, de lo contrario se finaliza el script con un mensaje de error.
    if (isset($_SESSION['id_usuario'])) {
        // Se compara la acción a realizar cuando un administrador ha iniciado sesión.
    switch($_GET['action']){
        case 'logout':
            if (session_destroy()) {
                $result['status'] = 1;
                $result['message'] = 'Sesión eliminada correctamente';
            } else {
                $result['exception'] = 'Ocurrió un problema al cerrar la sesión';
            }
            break;
        case 'readAll':
            if ($result['dataset'] =$usuario->readusuario()) {
                $result['status'] = 1;
            } else {
                $result['exception'] = 'No se han ingresado usuarios';
            }
            break;
            case 'create':
                $_POST = $usuario->validateForm($_POST);
                if($usuario->setNombre($_POST['txt_nombres_usuario'])){
                  if ($usuario->setApellido($_POST['txt_apellidos_usuario'])) {
                      if($usuario->setCorreo($_POST['txt_correo'])){
                          if($usuario->setUsuario($_POST['txt_usuario'])){
                              if($usuario->setContrasena($_POST['txt_contraseña_usuario'])){
                                if(isset($_POST['cb_tipo'])){
                                    if($usuario->setTipo($_POST['cb_tipo'])){
                                        if(isset($_POST['cb_estado'])){
                                            if($usuario->setEstado($_POST['cb_estado'])){
                                                if($usuario->createusuario()){
                                                    $result['status'] = 1;
                                                    $result['message'] = 'Usuario agregado correctamente';
                                                }
                                                else {
                                                    $result['exception'] = Conexion::getException();
                                                }
                                            }else {
                                                $result['exception'] = 'Estado incorrecto';
                                            }
                                        }else {
                                            $result['exception'] = 'Selecionar estado';
                                        }
                                    }else {
                                        $result['exception'] = 'Tipo usuario incorrecto';
                                    }
                                }
                                else {
                                    $result['exception'] = 'Seleccionar Tipo de usuario';
                                }
                              }else {
                                $result['exception'] = 'Contraseña incorrecta';
                              }
                          }else {
                            $result['exception'] = 'Usuario incorrecto';
                          }
                      }else {
                        $result['exception'] = 'Correo incorrecto';
                      }
                  }
                  else {
                      $result['exception'] = 'Apellido incorrecto';
                  }
                } 
                else{
                    $result['exception'] = 'Nombre incorrecto'; 
                }
            break;
            case'readOne':
                if ($usuario->setId($_POST['id_usuario'])) {
                    if($result['dataset']=$usuario->getusuariou()){
                        $result['status'] = 1;
                    }else{
                        $result['exception'] = 'usuario inexistente';
                    }
                }else{
                    $result['exception'] = 'usuario incorrecto';
                }
            break;
            case'delete':
                if($usuario->setId($_POST['id_usuario'])){
                    if($data = $usuario->getusuariou()){
                        if($usuario->deleteusuario()){
                            $result['status'] = 1;
                            $result['message'] = 'Usuario eliminado';
                        }else {
                            $result['exception'] = Conexion::getException();
                        }
                    }else {
                        $result['exception'] = 'Usuario inexistente';
                    }
                }else {
                    $result['exception'] = 'Id incorrecto';
                }
            break;
            case'update':
                $_POST = $usuario->validateForm($_POST);
                if($usuario->setId($_POST['id_usuario'])){
                    if($usuario->getusuariou()){
                        if($usuario->setNombre($_POST['txt_nombres_usuario'])){
                            if ($usuario->setApellido($_POST['txt_apellidos_usuario'])) {
                                if($usuario->setCorreo($_POST['txt_correo'])){
                                          if(isset($_POST['cb_tipo'])){
                                              if($usuario->setTipo($_POST['cb_tipo'])){
                                                  if(isset($_POST['cb_estado'])){
                                                      if($usuario->setEstado($_POST['cb_estado'])){
                                                          if($usuario->updateusuario()){
                                                              $result['status'] = 1;
                                                              $result['message'] = 'Usuario ctualizado correctamente';
                                                          }
                                                          else {
                                                              $result['exception'] = Conexion::getException();
                                                          }
                                                      }else {
                                                          $result['exception'] = 'Estado incorrecto';
                                                      }
                                                  }else {
                                                      $result['exception'] = 'Selecionar estado';
                                                  }
                                              }else {
                                                  $result['exception'] = 'Tipo usuario incorrecto';
                                              }
                                          }
                                          else {
                                              $result['exception'] = 'Seleccionar Tipo de usuario';
                                          }
                                }else {
                                  $result['exception'] = 'Correo incorrecto';
                                }
                            }
                            else {
                                $result['exception'] = 'Apellido incorrecto';
                            }
                          } 
                          else{
                              $result['exception'] = 'Nombre incorrecto'; 
                          }
                    }else {
                        $result['exception'] = 'Usuario inexistente';
                    }
                }else {
                    $result['exception'] = 'Id incorrecto';
                }
            break;
            case'search':
                $_POST = $usuario->validateForm($_POST);
                if($_POST['txt_buscar'] != ''){
                    if ($result['dataset'] = $usuario->searchusuario($_POST['txt_buscar'])) {
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
            case 'password':
                $nombre_usuario = $_SESSION['usuario'];
                if ($usuario->setId($_SESSION['id_usuario'])) {
                    $_POST = $usuario->validateForm($_POST);
                    if ($_POST['contrasena_actual1'] == $_POST['contrasena_actual2']) {
                        if ($usuario->setContrasena($_POST['contrasena_actual1'])) {
                            if ($usuario->checkPassword($_POST['contrasena_actual1'])) {
                                if ($_POST['contrasena_nueva1'] == $_POST['contrasena_nueva2']) {
                                    if( $_POST['contrasena_nueva1'] != $nombre_usuario ){
                                        if ($usuario->setContrasena($_POST['contrasena_nueva1'])) {
                                            if ($usuario->changePassword()) {
                                                $result['status'] = 1;
                                                $result['message'] = 'Contraseña cambiada correctamente';
                                            } else {
                                                $result['exception'] = Conexion::getException();
                                            }
                                        } else {
                                            $result['exception'] = 'Clave nueva menor a 6 caracteres';
                                        }
                                    } else {
                                        $result['exception'] = 'La contraseña es igual al nombre de usuario';
                                    }
                                } else {
                                    $result['exception'] = 'Claves nuevas diferentes';
                                }
                            } else {
                                $result['exception'] = 'Clave actual incorrecta';
                            }
                        } else {
                            $result['exception'] = 'Clave actual menor a 6 caracteres';
                        }
                    } else {
                        $result['exception'] = 'Claves actuales diferentes';
                    }
                } else {
                    $result['exception'] = 'Usuario incorrecto';
                }
                break;
            default:
                exit('Acción no disponible');
    }
    }else{
        switch($_GET['action']){
            case 'login':
                $_POST = $usuario->validateForm($_POST);
                    if ($usuario->checkAlias($_POST['txt_usuario'])) {
                        if ($usuario->checkPassword($_POST['txt_contraseña_usuario'])) {
                            $_SESSION['id_usuario'] = $usuario->getId();
                            $_SESSION['usuario'] = $usuario->getUsuario();
                            $result['status'] = 1;
                            $result['message'] = 'Autenticación correcta';
                        } else {
                            $result['exception'] = 'Contraseña incorrecta';
                        }
                    } else {
                        $result['exception'] = 'Usuario incorrecto';
                    }
                break;
            case 'primerpaso':
                $_POST = $usuario->validateForm($_POST);
                    if ( $usuario->setUsuario($_POST['txt_usuario']) ) {
                        if ( $usuario->setCorreo($_POST['txt_correo_usuario']) ) {
                            if ( $usuario->verificarCuenta() ) {
                                $nombreusuariointento = $usuario->getUsuario();
                                $correousuario = $usuario->getCorreo();
                                $contrasena = $usuario->getContrasena();
                                $result['status'] = 1;
                                $result['message'] = 'Datos correctos, verifique el correo ingresado para realizar el paso 2';
                                $usuario->enviarCorreo( $correousuario , $nombreusuariointento );                                    
                                exit($usuario->getCodigo());
                            } else {
                                $result['exception'] = 'No coinciden los datos';
                            }    
                        } else {
                            $result['exception'] = 'Correo incorrecto';
                        }                          
                    } else {
                        $result['exception'] = 'Usuario incorrecto';
                    }
                break;
                case 'segundopaso':
                    $_POST = $usuario->validateForm($_POST);
                        if ( $usuario->setCodigo($_POST['txt_codigo']) ) {
                            if ( $_POST['txt_codigo'] == $_POST['txt_codigo2'] ) {
                                if ( $_POST['txt_codigo'] >= 100000 && $_POST['txt_codigo'] <= 999999 ) {
                                    if( $_POST['txt_codigo'] == $usuario->getCodigoo()) {
                                        $result['status'] = 1;
                                        $result['message'] = 'Datos correctos, puede cambiar su contraseña';
                                    } else {
                                        $result['exception'] = 'El código es distinto al enviado';
                                    }
                                } else {
                                    $result['exception'] = 'El código no es válido';
                                }
                            } else {
                                $result['exception'] = 'Los valores ingresados son distintos';
                            }                          
                        } else {
                            $result['exception'] = 'Código incorrecto';
                        }
                    break;
            case 'ridal':
                if ($usuario->readusuario()) {
                    $result['status'] = 1;
                    $result['message'] = 'Existe al menos un usuario registrado';
                } else {
                    $result['exception'] = 'No existen usuarios registrados';
                }
                break;
                case 'registrarse':
                    $_POST = $usuario->validateForm($_POST);
                    if($usuario->setNombre($_POST['txt_nombres_usuario'])){
                      if ($usuario->setApellido($_POST['txt_apellidos_usuario'])) {
                          if($usuario->setCorreo($_POST['txt_correo_usuario'])){
                              if($usuario->setUsuario($_POST['txt_usuario'])){
                                  if( $_POST['txt_contraseña_usuario'] == $_POST['txt_contraseña_usuario2'] ) {
                                    if($usuario->setContrasena($_POST['txt_contraseña_usuario'])){
                                        if ( $_POST['txt_contraseña_usuario'] != $_POST['txt_usuario'] ) {
                                              if($usuario->setTipo(1)){
                                                  if($usuario->setEstado(1)){
                                                      if($usuario->createusuario()){
                                                          $result['status'] = 1;
                                                          $result['message'] = 'Usuario agregado correctamente';
                                                      }
                                                      else {
                                                          $result['exception'] = Conexion::getException();
                                                      }
                                                  }else {
                                                      $result['exception'] = 'Estado incorrecto';
                                                  }
                                          }else {
                                              $result['exception'] = 'Tipo usuario incorrecto';
                                          }   
                                        } else {
                                          $result['exception'] = 'Contraseña identica al nombre de usuario';
                                        }
                                    }else {
                                      $result['exception'] = 'Contraseña incorrecta';
                                    }
                                  } else {
                                    $result['exception'] = 'Las contraseñas no coinciden';
                                  }
                              }else {
                                $result['exception'] = 'Usuario incorrecto';
                              }
                          }else {
                            $result['exception'] = 'Correo incorrecto';
                          }
                      }
                      else {
                          $result['exception'] = 'Apellido incorrecto';
                      }
                    } 
                    else{
                        $result['exception'] = 'Nombre incorrecto'; 
                    }
                break;
            default:
                exit('Acción no disponible fuera de la sesión');
        }
    }
    header('content-type: application/json; charset=utf-8');
    print(json_encode($result));
}else {
    exit('Recurso denegado');
}
?>
