<?php
//aca están las rutas de archivos que usara la API
require_once('../../helpers/conexion.php');
require_once('../../helpers/validator.php');
require_once('../../models/commerce/Cliente.php');
// Se comprueba si hay una acción para realizar, si no la hay se finaliza el script con un mensaje de error.
if( isset($_GET['action']) ) {
    // Creación de una sesión o reanudación de la actual para poder usar variables de sesión en el script.
    session_start();
    // Se instancia la clase Clientes.
    $cliente = new Clientes;
    //Creación de un arreglo para guardar lo que retorna la API.
    $result = array('status'=> 0, 'message' =>null,'exception' => null);
        // Se compara la acción a realizar cuando un administrador ha iniciado sesión.
    switch( $_GET['action'] ) {
	//Acá está la acción a realizar si es registrarse
            case 'register':
                $_POST = $cliente->validateForm($_POST);
                 // Se sanea el valor del token para evitar datos maliciosos.
                 $token = filter_input(INPUT_POST, 'g-recaptcha-response', FILTER_SANITIZE_STRING);
                 if ($token) {
                     $secretKey = '6LdBzLQUAAAAAL6oP4xpgMao-SmEkmRCpoLBLri-';
                     $ip = $_SERVER['REMOTE_ADDR'];
 
                     $data = array(
                         'secret' => $secretKey,
                         'response' => $token,
                         'remoteip' => $ip
                     );
 
                     $options = array(
                         'http' => array(
                             'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
                             'method'  => 'POST',
                             'content' => http_build_query($data)
                         ),
                         'ssl' => array(
                             'verify_peer' => false,
                             'verify_peer_name' => false
                         )
                     );
 
                     $url = 'https://www.google.com/recaptcha/api/siteverify';
                     $context  = stream_context_create($options);
                     $response = file_get_contents($url, false, $context);
                     $captcha = json_decode($response, true);
 
                     if ($captcha['success']) {
                if( $cliente->setNombre($_POST['txt_nombres_usuario']) ) {
                  if ( $cliente->setApellido($_POST['txt_apellidos_usuario']) ) {
                      if( $cliente->setCorreo($_POST['txt_correo']) ) {
                          if( $cliente->setUsuario($_POST['txt_usuario']) ) {
                              if( $_POST['txt_contraseña'] == $_POST['txt_contraseña2'] ) {
                                if ( $cliente->setContrasena($_POST['txt_contraseña']) ) {
                                    if( $_POST['txt_contraseña'] != $_POST['txt_usuario'] ) {
                                        if( $cliente->Register() ) {
                                            $result['status'] = 1;
                                            $result['message'] = 'Cliente registrado correctamente';
                                        }
                                        else {
                                            $result['exception'] = Conexion::getException();
                                        }   
                                    } else {
                                        $result['exception'] = 'Contraseña igual al nombre de usuario';
                                    }
                                }
                                else {
                                    $result['exception'] = 'Contraseña incorrecta';
                                }
                              }
                              else {
                                $result['exception'] = 'No coinciden las contraseñas';
                              }
                          }
                          else {
                            $result['exception'] = 'cliente incorrecto';
                          }
                      }
                      else {
                        $result['exception'] = 'Correo incorrecto';
                      }
                  }
                  else {
                      $result['exception'] = 'Apellido incorrecto';
                  }
                } 
                else {
                    $result['exception'] = 'Nombre incorrecto'; 
                }
            }else{
                $result['exception'] = 'Bot de mierd4'; 
            }
        }else{
            $result['exception'] = 'Ocurrió un problema al cargar el reCAPTCHA';
        }
            break;
            case 'password':
                $nombre_cliente = $_SESSION['cliente_cliente'];
                if ($cliente->setId($_SESSION['id_cliente'])) {
                    $_POST = $cliente->validateForm($_POST);
                    if ($_POST['contrasena_actual1'] == $_POST['contrasena_actual2']) {
                        if ($cliente->setContrasena($_POST['contrasena_actual1'])) {
                            if ($cliente->checkPassword($_POST['contrasena_actual1'])) {
                                if ($_POST['contrasena_nueva1'] == $_POST['contrasena_nueva2']) {
                                    if( $_POST['contrasena_nueva1'] != $nombre_cliente ){
                                        if ($cliente->setContrasena($_POST['contrasena_nueva1'])) {
                                            if ($cliente->changePassword()) {
                                                $result['status'] = 1;
                                                $result['message'] = 'Contraseña cambiada correctamente';
                                            } else {
                                                $result['exception'] = Conexion::getException();
                                            }
                                        } else {
                                            $result['exception'] = 'Clave nueva menor a 6 caracteres';
                                        }
                                    } else {
                                        $result['exception'] = 'La contraseña es igual al nombre de cliente';
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
                    $result['exception'] = 'cliente incorrecto';
                }
                break;
	//Acá está la acción a realizar si es iniciar sesión
        case 'login':
            $_POST = $cliente->validateForm($_POST);
                if ( $cliente->checkCliente($_POST['txt_usuario']) ) {
                    if ( $cliente->checkPassword($_POST['txt_contraseña']) ) {
                        $_SESSION['id_cliente'] = $cliente->getId();
                        $_SESSION['usuario_cliente'] = $cliente->getUsuario();
                        $result['status'] = 1;
                        $result['message'] = 'Autenticación correcta';
                    } else {
                        $result['exception'] = 'Contraseña incorrecta';
                    }
                } else {
                    $result['exception'] = 'cliente incorrecto';
                }
            break;
	//Acá está la acción a realizar si no se encontro el caso solicitado
            default:
                exit('Acción no disponible');
    }
    //aca se envia el resultado de la API en formato JSON
    header('content-type: application/json; charset=utf-8');
    print(json_encode($result));
}else {
    exit('Recurso denegado');
}
