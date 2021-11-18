<?php
    session_start();
    class PaginaPrivado
    {
        
        public static function headerPrivado($Titulo_Pagina, $NombreArchivo)
        {   
        self::modals();
        print('
            <!doctype html>
                <html lang="es">
                    <head>
                        <!-- Conjunto de caracteres -->
                        <meta charset="utf-8">
                        <!-- Indica al navegador que la página web está optimizada para dispositivos móviles -->
                        <meta name="viewport" content="width=device-width, initial-scale=1.0">
                        <!-- Título del documento -->
                            <title>'.$Titulo_Pagina.'</title>
                            <!-- Importación de archivos tipo CSS -->
                            <link rel="stylesheet" href="../../resources/css/materialize2.min.css" type="text/css">
                            <link rel="stylesheet" href="../../resources/css/material-icons.css" type="text/css">
                            <link rel="stylesheet" href="../../resources/css/Privado.css" type="text/css">
                            <link rel="stylesheet" href="../../resources/css/animate.css" type="text/css">
                            <link rel="stylesheet" href="../../resources/css/sweetalert2.min.css" type="text/css">
                    </head>
                        <body id="CuerpoPrivado">     
                            <header>
                            <!--haciendo el menu-->
                            <nav class="red">
                                <div class="nav-wrapper">
                                    <div class="row">
                                        <div class="col l1 m1 s1">
                                            <a href="#" data-target="mobile-demo" class="sidenav-trigger"><i class="material-icons">menu</i></a>
                                            <a  class="brand-logo" href="Menu.php"><i class="material-icons left">dashboard</i></a>
                                        </div>
                                        <div class="col l11 m11 s11">
                                            <!--estructura menu desplegable-->
                                                <ul id="clientes" class="dropdown-content">
                                                    <li><a href="Estado_clientes.php"><i class="material-icons left">favorite_border</i>Estados</a></li>
                                                    <li class="divider"></li>
                                                    <li><a href="Clientes.php"><i class="material-icons left">mood</i>Clientes</a></li>
                                                </ul>
                                                <ul id="clientes2" class="dropdown-content">
                                                    <li><a href="Estado_clientes.php"><i class="material-icons left">favorite_border</i>Estados</a></li>
                                                    <li><a href="Clientes.php"><i class="material-icons left">mood</i>Clientes</a></li>
                                                </ul>
                                                <ul id="facturacion" class="dropdown-content">
                                                        <li><a href="Detalles.php"><i class="material-icons left">description</i>Detalles</a></li>
                                                    <li class="divider"></li>
                                                        <li><a href="Facturas.php"><i class="material-icons left">monetization_on</i>Facturas</a></li>
                                                </ul>
                                                <ul id="facturacion2" class="dropdown-content">
                                                        <li><a href="Detalles.php"><i class="material-icons left">description</i>Detalles de facturas</a></li>
                                                        <li><a href="Facturas.php"><i class="material-icons left">monetization_on</i>Facturas</a></li>
                                                </ul>
                                                <ul id="productos" class="dropdown-content">
                                                        <li><a href="Estado_productos.php"><i class="material-icons left">favorite_border</i>Estados</a></li>
                                                    <li class="divider"></li>
                                                        <li><a href="Productos.php"><i class="material-icons left">shop</i>Productos</a></li>
                                                    <li class="divider"></li>
                                                        <li><a href="Tipo_productos.php"><i class="material-icons left">shop_two</i>Tipos</a></li>  
                                                </ul>
                                                <ul id="productos2" class="dropdown-content">
                                                        <li><a href="Estado_productos.php"><i class="material-icons left">favorite_border</i>Estados</a></li>
                                                        <li><a href="Productos.php"><i class="material-icons left">shop</i>Productos</a></li>
                                                        <li><a href="Tipo_productos.php"><i class="material-icons left">shop_two</i>Tipos</a></li>  
                                                </ul>
                                                <ul id="usuarios" class="dropdown-content">
                                                        <li><a href="Estado_usuarios.php"><i class="material-icons left">favorite_border</i>Estados</a></li>
                                                    <li class="divider"></li>
                                                        <li><a href="Tipo_usuarios.php"><i class="material-icons left">perm_identity</i>Tipos</a></li>
                                                    <li class="divider"></li>
                                                        <li><a href="Usuarios.php"><i class="material-icons left">people</i>Usuarios</a></li>  
                                                </ul>
                                                <ul id="usuarios2" class="dropdown-content">
                                                        <li><a href="Estado_usuarios.php"><i class="material-icons left">favorite_border</i>Estados</a></li>
                                                        <li><a href="Tipo_usuarios.php"><i class="material-icons left">perm_identity</i>Tipos</a></li>
                                                        <li><a href="Usuarios.php"><i class="material-icons left">people</i>Usuarios</a></li>  
                                                </ul>
                                                <ul id="opciones_cuenta" class="dropdown-content">
                                                    <li><a href="#Editar_perfil" class="modal-trigger"><i class="material-icons left">face</i>Editar perfil</a></li>
                                                    <li><a href="#CambiarContraseña" class="modal-trigger"><i class="material-icons left">lock</i>Cambiar clave</a></li>
                                                    <li><a href="#!" onclick="signOff()"><i class="material-icons left">clear</i>Salir</a></li>
                                                </ul>
                                                <ul id="opciones_cuenta2" class="dropdown-content">
                                                    <li><a href="#Editar_perfil" class="modal-trigger"><i class="material-icons left">face</i>Editar perfil</a></li>
                                                    <li><a href="#CambiarContraseña" class="modal-trigger"><i class="material-icons left">lock</i>Cambiar clave</a></li>
                                                    <li><a href="#!" onclick="signOff()"><i class="material-icons left">clear</i>Salir</a></li>
                                                </ul>
                                                <ul class="right hide-on-med-and-down">
                                                <li><a class="dropdown-trigger" href="#!" data-target="clientes"><i class="material-icons left">mood</i>Clientes<i class="material-icons right">arrow_drop_down</i></a></li>
                                                <li><a class="dropdown-trigger" href="#!" data-target="facturacion"><i class="material-icons left">monetization_on</i>Facturación<i class="material-icons right">arrow_drop_down</i></a></li>
                                                <li><a href="Marcas.php"><i class="material-icons left">shop_two</i>Marcas</a></li>
                                                <li><a class="dropdown-trigger" href="#!" data-target="productos"><i class="material-icons left">shop</i>Productos<i class="material-icons right">arrow_drop_down</i></a></li>
                                                <li><a href="Resenas.php" ><i class="material-icons left">grade</i>Reseñas</a></li>
                                                <li><a class="dropdown-trigger" href="#!" data-target="usuarios"><i class="material-icons left">people</i>Usuarios<i class="material-icons right">arrow_drop_down</i></a></li>    
                                                <li><a href="#" class="dropdown-trigger" data-target="opciones_cuenta"><i class="material-icons left">account_circle</i>Cuenta: <b>'.$_SESSION['usuario'].'</b></a></li>
                                                        <!-- Dropdown Trigger -->
                                                </ul>
                                        </div>
                                        <!--menu a tamaño de pantalla movil-->
                                            <ul class="sidenav" id="mobile-demo">
                                                <li><a class="dropdown-trigger" href="#!" data-target="clientes2"><i class="material-icons left">mood</i>Clientes<i class="material-icons right">arrow_drop_down</i></a></li>
                                                <li><a class="dropdown-trigger" href="#!" data-target="facturacion2"><i class="material-icons left">monetization_on</i>Facturación<i class="material-icons right">arrow_drop_down</i></a></li>
                                                <li><a href="Marcas.php"><i class="material-icons left">shop_two</i>Marcas</a></li>
                                                <li><a class="dropdown-trigger" href="#!" data-target="productos2"><i class="material-icons left">shop</i>Productos<i class="material-icons right">arrow_drop_down</i></a></li>
                                                <li><a href="Resenas.php"><i class="material-icons left">grade</i>Reseñas</a></li>                                          
                                                <li><a class="dropdown-trigger" href="#!" data-target="usuarios2"><i class="material-icons left">people</i>Usuarios<i class="material-icons right">arrow_drop_down</i></a></li>
                                                <li><a href="#" class="dropdown-trigger" data-target="opciones_cuenta2"><i class="material-icons left">account_circle</i>Cuenta: <b>'.$_SESSION['usuario'].'</b></a></li>
                                            </ul>
                                    </div>
                                </div>
                            </nav>      
                            </header>
                    <main>
                    <noscript>
                        <div>
                            <div class="row">
                                <div class="col l10 offset-l1 m10 offset-m1 s12">
                                    <div class="card-panel z-depth-5 center-align" id="CajaNoscript">
                                        <div class="row">
                                            <p><h1>¡Bienvenido!</h1></p>
                                            <h3><p>La página que está viendo requiere para su funcionamiento el uso de JavaScript.
                                                Si lo ha deshabilitado intencionalmente, por favor vuelva a activarlo.
                                            </p></h3>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </noscript>
            ');
        }


        public static function headerPrivado2($Titulo_Pagina)
        {   
        self::modals();
        print('
            <!doctype html>
                <html lang="es">
                    <head>
                        <!-- Conjunto de caracteres -->
                        <meta charset="utf-8">
                        <!-- Indica al navegador que la página web está optimizada para dispositivos móviles -->
                        <meta name="viewport" content="width=device-width, initial-scale=1.0">
                        <!-- Título del documento -->
                            <title>'.$Titulo_Pagina.'</title>
                            <!-- Importación de archivos tipo CSS -->
                            <link rel="stylesheet" href="../../resources/css/animate.css" type="text/css">
                            <link rel="stylesheet" href="../../resources/css/materialize2.min.css" type="text/css">
                            <link rel="stylesheet" href="../../resources/css/material-icons.css" type="text/css">
                            <link rel="stylesheet" href="../../resources/css/Privado.css" type="text/css">
                            <link rel="stylesheet" href="../../resources/css/sweetalert2.min.css" type="text/css">
                    </head>
                        <body id="CuerpoMenu">     
                            <header>
                            <!--haciendo el menu-->
                            <nav class="red">
                                <div class="nav-wrapper">
                                    <div class="row">
                                        <div class="col l1 m1 s1">
                                            <a href="#" data-target="mobile-demo" class="sidenav-trigger"><i class="material-icons">menu</i></a>
                                            <a  class="brand-logo" href="Menu.php"><i class="material-icons left">dashboard</i></a>
                                        </div>
                                        <div class="col l11 m11 s11">
                                            <!--estructura menu desplegable-->
                                                <ul id="clientes" class="dropdown-content">
                                                    <li><a href="Estado_clientes.php"><i class="material-icons left">favorite_border</i>Estados</a></li>
                                                    <li class="divider"></li>
                                                    <li><a href="Clientes.php"><i class="material-icons left">mood</i>Clientes</a></li>
                                                </ul>
                                                <ul id="clientes2" class="dropdown-content">
                                                    <li><a href="Estado_clientes.php"><i class="material-icons left">favorite_border</i>Estados</a></li>
                                                    <li><a href="Clientes.php"><i class="material-icons left">mood</i>Clientes</a></li>
                                                </ul>
                                                <ul id="facturacion" class="dropdown-content">
                                                        <li><a href="Detalles.php"><i class="material-icons left">description</i>Detalles</a></li>
                                                    <li class="divider"></li>
                                                        <li><a href="Facturas.php"><i class="material-icons left">monetization_on</i>Facturas</a></li>
                                                </ul>
                                                <ul id="facturacion2" class="dropdown-content">
                                                        <li><a href="Detalles.php"><i class="material-icons left">description</i>Detalles de facturas</a></li>
                                                        <li><a href="Facturas.php"><i class="material-icons left">monetization_on</i>Facturas</a></li>
                                                </ul>
                                                <ul id="productos" class="dropdown-content">
                                                        <li><a href="Estado_productos.php"><i class="material-icons left">favorite_border</i>Estados</a></li>
                                                    <li class="divider"></li>
                                                        <li><a href="Productos.php"><i class="material-icons left">shop</i>Productos</a></li>
                                                    <li class="divider"></li>
                                                        <li><a href="Tipo_productos.php"><i class="material-icons left">shop_two</i>Tipos</a></li>  
                                                </ul>
                                                <ul id="productos2" class="dropdown-content">
                                                        <li><a href="Estado_productos.php"><i class="material-icons left">favorite_border</i>Estados</a></li>
                                                        <li><a href="Productos.php"><i class="material-icons left">shop</i>Productos</a></li>
                                                        <li><a href="Tipo_productos.php"><i class="material-icons left">shop_two</i>Tipos</a></li>  
                                                </ul>
                                                <ul id="usuarios" class="dropdown-content">
                                                        <li><a href="Estado_usuarios.php"><i class="material-icons left">favorite_border</i>Estados</a></li>
                                                    <li class="divider"></li>
                                                        <li><a href="Tipo_usuarios.php"><i class="material-icons left">perm_identity</i>Tipos</a></li>
                                                    <li class="divider"></li>
                                                        <li><a href="Usuarios.php"><i class="material-icons left">people</i>Usuarios</a></li>  
                                                </ul>
                                                <ul id="usuarios2" class="dropdown-content">
                                                        <li><a href="Estado_usuarios.php"><i class="material-icons left">favorite_border</i>Estados</a></li>
                                                        <li><a href="Tipo_usuarios.php"><i class="material-icons left">perm_identity</i>Tipos</a></li>
                                                        <li><a href="Usuarios.php"><i class="material-icons left">people</i>Usuarios</a></li>  
                                                </ul>
                                                <ul id="opciones_cuenta" class="dropdown-content">
                                                    <li><a href="#Editar_perfil" class="modal-trigger"><i class="material-icons left">face</i>Editar perfil</a></li>
                                                    <li><a href="#CambiarContraseña" class="modal-trigger"><i class="material-icons left">lock</i>Cambiar clave</a></li>
                                                    <li><a href="#!" onclick="signOff()"><i class="material-icons left">clear</i>Salir</a></li>
                                                </ul>
                                                <ul id="opciones_cuenta2" class="dropdown-content">
                                                    <li><a href="#Editar_perfil" class="modal-trigger"><i class="material-icons left">face</i>Editar perfil</a></li>
                                                    <li><a href="#CambiarContraseña" class="modal-trigger"><i class="material-icons left">lock</i>Cambiar clave</a></li>
                                                    <li><a href="#!" onclick="signOff()"><i class="material-icons left">clear</i>Salir</a></li>
                                                </ul>
                                                 <ul class="right hide-on-med-and-down">
                                                <li><a class="dropdown-trigger" href="#!" data-target="clientes"><i class="material-icons left">mood</i>Clientes<i class="material-icons right">arrow_drop_down</i></a></li>
                                                <li><a class="dropdown-trigger" href="#!" data-target="facturacion"><i class="material-icons left">monetization_on</i>Facturación<i class="material-icons right">arrow_drop_down</i></a></li>
                                                <li><a href="Marcas.php"><i class="material-icons left">shop_two</i>Marcas</a></li>
                                                <li><a class="dropdown-trigger" href="#!" data-target="productos"><i class="material-icons left">shop</i>Productos<i class="material-icons right">arrow_drop_down</i></a></li>
                                                <li><a href="Resenas.php" ><i class="material-icons left">grade</i>Reseñas</a></li>
                                                <li><a class="dropdown-trigger" href="#!" data-target="usuarios"><i class="material-icons left">people</i>Usuarios<i class="material-icons right">arrow_drop_down</i></a></li>    
                                                <li><a href="#" class="dropdown-trigger" data-target="opciones_cuenta"><i class="material-icons left">account_circle</i>Cuenta: <b>'.$_SESSION['usuario'].'</b></a></li>
                                                        <!-- Dropdown Trigger -->
                                                </ul>
                                        </div>
                                        <!--menu a tamaño de pantalla movil-->
                                            <ul class="sidenav" id="mobile-demo">
                                                <li><a class="dropdown-trigger" href="#!" data-target="clientes2"><i class="material-icons left">mood</i>Clientes<i class="material-icons right">arrow_drop_down</i></a></li>
                                                <li><a class="dropdown-trigger" href="#!" data-target="facturacion2"><i class="material-icons left">monetization_on</i>Facturación<i class="material-icons right">arrow_drop_down</i></a></li>
                                                <li><a href="Marcas.php"><i class="material-icons left">shop_two</i>Marcas</a></li>
                                                <li><a class="dropdown-trigger" href="#!" data-target="productos2"><i class="material-icons left">shop</i>Productos<i class="material-icons right">arrow_drop_down</i></a></li>
                                                <li><a href="Resenas.php"><i class="material-icons left">grade</i>Reseñas</a></li>                                          
                                                <li><a class="dropdown-trigger" href="#!" data-target="usuarios2"><i class="material-icons left">people</i>Usuarios<i class="material-icons right">arrow_drop_down</i></a></li>
                                                <li><a href="#" class="dropdown-trigger" data-target="opciones_cuenta2"><i class="material-icons left">account_circle</i>Cuenta: <b>'.$_SESSION['usuario'].'</b></a></li>
                                            </ul>
                                    </div>
                                </div>
                            </nav>      
                            </header>
                    <main>
                    <noscript>
                        <div>
                            <div class="row">
                                <div class="col l10 offset-l1 m10 offset-m1 s12">
                                    <div class="card-panel z-depth-5 center-align" id="CajaNoscript">
                                        <div class="row">
                                            <p><h1>¡Bienvenido!</h1></p>
                                            <h3><p>La página que está viendo requiere para su funcionamiento el uso de JavaScript.
                                                Si lo ha deshabilitado intencionalmente, por favor vuelva a activarlo.
                                            </p></h3>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </noscript>
            ');
        }

        public static function footerPrivado($NombreArchivo)
        {
            print('
            </main>
            <footer class="page-footer red">
                <div class="container">
                    <div class="row">
                        <div class="col l6 s12">
                            <h5 class="white-text">Simplex Cars Accessory</h5>
                            <p class="grey-text text-lighten-4">lleva la comodidad de tu casa a tu automóvil.</p>
                        </div>
                        <div class="col l4 offset-l2 s12">
                            <h5 class="white-text">Contáctenos o síganos en:</h5>
                            <ul>
                                <li><a class="grey-text text-lighten-3" href="#!">Facebook: Simplex Cars</a></li>
                                <li><a class="grey-text text-lighten-3" href="#!">Instagram: Simplex_Cars</a></li>
                                <li><a class="grey-text text-lighten-3" href="#!">Gmail: SimplexCars@gmail.com</a></li>
                                <li><a class="grey-text text-lighten-3" href="#!">Youtube: Simplex Cars</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            <div class="footer-copyright">
                <div class="container">
                    © 2020 derechos reservados
                    <a class="grey-text text-lighten-4 right" href="#!">Más links...</a>
                </div>
            </div>
            </footer>
        <script src="../../resources/js/jquery-3.4.1.min.js" type="text/javascript"></script>
        <script src="../../resources/js/materialize.min.js" type="text/javascript"></script>
        <script src="../../resources/js/initialization2.js" type="text/javascript"></script>
        <script src="../../resources/js/sweetalert.min.js" type="text/javascript"></script>
        <script src="../../core/helpers/components.js" type="text/javascript"></script>
        <script src="../../core/controllers/privado/'.$NombreArchivo.'.js" type="text/javascript"></script>
        <script src="../../core/controllers/privado/Validaciones.js" type="text/javascript"></script>
        <script src="../../core/controllers/privado/Cuenta.js" type="text/javascript"></script>
    </body>
    </html>
            ');
        }

        private function modals(){
            $nombre = $_SESSION['usuario'];
            print('
            <div id="CambiarContraseña" class="modal">
            <div class="modal-content">
                <h4 class="center-align">Cambiar contraseña</h4>
                    <form id = "Editar_Contraseña" autocomplete="off" name = "Editar_Contraseña" method="POST" enctype="multipart/form-data">
                        <div class="row center-align">
                            <h6>Contraseña actual</h6>
                        </div>
                        <div class="row">
                            <div class="input-field col s12 m6">
                                <i class="material-icons prefix">lock</i>
                                <input id="contrasena_actual1" type="password" name="contrasena_actual1" class="validate" required onkeypress="return ValidarEscritura5(event, 3, this)" minlength="6" maxlength="60" required oncopy="return false" oncut="return false" onpaste="return false" oncut="return false" onpaste="return false"/>
                                <label for="contrasena_actual1">Contraseña</label>
                            </div>
                            <div class="input-field col s12 m6">
                                <i class="material-icons prefix">lock</i>
                                <input id="contrasena_actual2" type="password" name="contrasena_actual2" class="validate" required onkeypress="return ValidarEscritura5(event, 3, this)" minlength="6" maxlength="60" required oncopy="return false" oncut="return false" onpaste="return false" oncut="return false" onpaste="return false"/>
                                <label for="contrasena_actual2">Confirmar contraseña</label>
                            </div>
                        </div>
                        <div class="row center-align">
                            <h6>Contraseña nueva</h6>
                        </div>
                        <div class="row">
                            <div class="input-field col s12 m6">
                                <i class="material-icons prefix">lock</i>
                                <input id="contrasena_nueva1" type="password" name="contrasena_nueva1" class="validate" required onkeypress="return ValidarEscritura5(event, 3, this)" minlength="6" maxlength="60" required oncopy="return false" oncut="return false" onpaste="return false" oncut="return false" onpaste="return false"/>
                                <label for="contrasena_nueva1">Contraseña</label>
                            </div>
                            <div class="input-field col s12 m6">
                                <i class="material-icons prefix">lock</i>
                                <input id="contrasena_nueva2" type="password" name="contrasena_nueva2" class="validate" required onkeypress="return ValidarEscritura5(event, 3, this)" minlength="6" maxlength="60" required oncopy="return false" oncut="return false" onpaste="return false" oncut="return false" onpaste="return false"/>
                                <label for="contrasena_nueva2">Confirmar contraseña</label>
                            </div>
                        </div>
                        <div class="row center-align">
                            <a href="#" class="btn waves-effect grey tooltipped modal-close" data-tooltip="Cancelar"><i class="material-icons">cancel</i></a>
                            <button type="submit" class="btn waves-effect blue tooltipped" data-tooltip="Guardar"><i class="material-icons">save</i></button>
                        </div>
                    </form>
                </div>
            </div>


            <!-- Componente Modal para mostrar el formulario de editar perfil -->
            <div id="Editar_perfil" class="modal">
                <div class="modal-content">
                    <h4 class="center-align">Editar perfil</h4>
                    <form id = "Editar_Perfil" name = "Editar_Perfil" autocomplete="off" onsubmit="return Validar_Editar_Perfil();" method="POST" enctype="multipart/form-data">
                        <div class="row">
                            <div class="input-field col s12 m6">
                                <i class="material-icons prefix">person</i>
                                <input id="txt_nombres_perfil" type="text" name="txt_nombres_perfil" class="validate" required onkeypress="return ValidarEscritura6(event, 2, this)" minlength="2" maxlength="50" required oncopy="return false" oncut="return false" onpaste="return false" oncut="return false" onpaste="return false"/>
                                <label for="txt_nombres_perfil">Nombres</label>
                            </div>
                            <div class="input-field col s12 m6">
                                <i class="material-icons prefix">person</i>
                                <input id="txt_apellidos_perfil" type="text" name="txt_apellidos_perfil" class="validate" required onkeypress="return ValidarEscritura6(event, 2, this)" minlength="2" maxlength="50" required oncopy="return false" oncut="return false" onpaste="return false" oncut="return false" onpaste="return false"/>
                                <label for="txt_apellidos_perfil">Apellidos</label>
                            </div>
                            <div class="input-field col s12 m6">
                                <i class="material-icons prefix">contact_mail</i>
                                <input id="txt_correo_usuario" type="email" name="txt_correo_usuario" class="validate" required onkeypress="return ValidarEscritura7(event, 3)" minlength="15" maxlength="100" required oncopy="return false" oncut="return false" onpaste="return false" oncut="return false" onpaste="return false"/>
                                <label for="txt_correo_usuario">Correo</label>
                            </div>
                            <div class="input-field col s12 m6">
                                <i class="material-icons prefix">person_pin</i>
                                <input id="txt_usuario_perfil" type="text" name="txt_usuario_perfil" class="validate" required onkeypress="return ValidarEscritura8(event, 3, this)" minlength="8" maxlength="30" required oncopy="return false" oncut="return false" onpaste="return false" oncut="return false" onpaste="return false"/>
                                <label for="txt_usuario_perfil">Usuario</label>
                            </div>
                        </div>
                        <div class="row center-align">
                            <a href="#" class="btn waves-effect grey tooltipped modal-close" data-tooltip="Cancelar"><i class="material-icons">cancel</i></a>
                            <button type="submit" class="btn waves-effect blue tooltipped" data-tooltip="Guardar"><i class="material-icons">save</i></button>
                        </div>
                    </form>
                </div>
            </div> 

            ');
        }

    }
?>