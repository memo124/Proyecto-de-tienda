<?php
class UCommerce {
    public static function headerCommerce() {
        print('
        <!doctype html>
        <html lang="es">
        <head>
            <!-- Conjunto de caracteres -->
            <meta charset="utf-8">
            <!-- Indica al navegador que la página web está optimizada para dispositivos móviles -->
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <!-- Título del documento -->
            <title>Principal</title>
            <!-- Importación de archivos tipo CSS -->
            <link rel="stylesheet" href="../../resources/css/materialize.min.css" type="text/css">
            <link rel="stylesheet" href="../../resources/css/material-icons.css" type="text/css">
            <link rel="stylesheet" href="../../resources/css/style.css" type="text/css">
            <!-- Llamada a un archivo tipo icono -->
            <link rel="shortcut icon" href="img/logo.png" type="image/png">
        </head>
        <body>
        ');
        self::modals();
        print('
            <header>
            <nav>
                <div class="nav-wrapper">
                    <div class="row">
                        <div class="col s3">
                            <a href="" data-target="mobile-demo" class="sidenav-trigger"><i class="material-icons">menu</i></a>
                            <a href="indexuser.php" class="brand-logo"><img src="../../resources/img/logo.png" height="65"></a>
                        </div>
                        <div class="col s5 hide-on-med-and-down">
                            <form>
                                <div class="search-wrapper" id="id">
                                <input id="search" type="search" placeholder="Search">
                                <label class="label-icon hidde" for="search"></label>
                                <!--<i class="material-icons">close</i>-->
                                </div>
                            </form>
                        </div>
                        <div class="col s4">
                            <ul class="right hide-on-med-and-down">
                                <li><a href="carrito.php"><img src="../../resources/img/icons/carrito.png"></a></li>
                                <li><a class="dropdown-trigger" href="#!" data-target="Opciones">Opciones</a></li>
                                <li><a href="index.php"><img src="../../resources/img/icons/logout.png" ></a></li>
                            </ul>
                            <ul id="Opciones" class="dropdown-content">
                                <li><a href="#!" onclick="ventanaeditarcontra()">Cambiar contraseña</a></li>
                                <li><a href="#!" onclick="ventanaeditar()">Editar perfil</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </nav>
                <ul class="sidenav" id="mobile-demo">
                    <li>
                        <form>
                            <div class="search-wrapper">
                            <input id="search" type="search" placeholder="Search">
                            <label class="label-icon hidde" for="search"></label>
                            <!--<i class="material-icons">close</i>-->
                            </div>
                        </form>
                    </li>
                    <li><a href="misionyvision.php" class="btn red">Mision y vision</a></li>
                    <li><a class="dropdown-trigger btn red" href="#!" data-target="dropdown1">Marcas</a></li>
                    <li><a class="dropdown-trigger btn red" href="#!" data-target="dropdown2">Opciones</a></li>
                    <li><a href="index.php" class="btn red"><img src="../../resources/img/icons/logout.png" ></a></li>
                </ul>
                <!--comentario-->
                <ul id="dropdown1" class="dropdown-content">
                    <li><a href="#!">one</a></li>
                    <li><a href="#!">two</a></li>
                </ul>    
                <ul id="dropdown2" class="dropdown-content">
                    <li><a href="#!" onclick="ventanaeditarcontra()">Cambiar contraseña</a></li>
                    <li><a href="#!" onclick="ventanaeditar()">Editar perfil</a></li>
                </ul> 
            </header>
            <main> 
        ');   
    }

    public static function footerCommerce($scrip) {
        print('
                </main>
                <footer class="page-footer red">
                    <div class="container">
                        <div class="row">
                            <div class="col l6 s12">
                                <h5 class="white-text">Simplex Cars Accesories</h5>
                                <p class="grey-text text-lighten-4">You can use rows and columns here to organize your footer content.</p>
                            </div>
                        </div>
                    </div>
                    <div class="footer-copyright">
                        <div class="container col s4 m4 l4">
                            © 2020 Copyright 
                        </div>
                        <div class="container col s4 m4 l4 white-text">
                            <a href="Umisionyvision.php">misión y visión</a>
                        </div>
                        <div class="container col s4 m4 l4 white-text">
                            <a href="Uate_cli.php">Atencion al cliente</a>
                        </div>
                    </div>
                </footer>
                <script src="../../resources/js/jquery-3.4.1.min.js" type="text/javascript"></script>
                <script src="../../resources/js/materialize.min.js" type="text/javascript"></script>
                <script src="../../resources/js/initialization.js" type="text/javascript"></script>
                <script src="../../core/api/helpers/components.js" type="text/javascript"></script>
                <script src="../../core/controllers/commerce/Ucuenta.js" type="text/javascript"></script>
                <script src="../../core/controllers/commerce/'.$scrip.'" type="text/javascript"></script>
        </body>
        </html> 
        ');
    }

    public function modals()
    {
        print('
        <div id="profile-modal" class="modal">
                <div class="modal-content">
                    <h4 class="center-align">Modificar usuario</h4>
                    <form method="post" id="profile-form">
                        <div class="row">
                            <div class="input-field col s12 m6">
                                <i class="material-icons prefix">person</i>
                                <input id="nombres_perfil" type="text" name="nombres_perfil" class="validate" required/>
                                <label for="nombres_perfil">Nombres</label>
                            </div>
                            <div class="input-field col s12 m6">
                                <i class="material-icons prefix">person</i>
                                <input id="apellidos_perfil" type="text" name="apellidos_perfil" class="validate" required/>
                                <label for="apellidos_perfil">Apellidos</label>
                            </div>
                            <div class="input-field col s12 m6">
                                <i class="material-icons prefix">email</i>
                                <input id="correo_perfil" type="email" name="correo_perfil" class="validate" required/>
                                <label for="correo_perfil">Correo</label>
                            </div>
                            <div class="input-field col s12 m6">
                                <i class="material-icons prefix">person_pin</i>
                                <input id="alias_perfil" type="text" name="alias_perfil" class="validate" required/>
                                <label for="alias_perfil">Alias</label>
                            </div>
                        </div>
                        <div class="row center-align">
                            <a href="#" class="btn waves-effect grey tooltipped modal-close" data-tooltip="Cancelar"><i class="material-icons">cancel</i></a>
                            <button type="submit" class="btn waves-effect blue tooltipped" data-tooltip="Guardar"><i class="material-icons">save</i></button>
                        </div>
                    </form>
                </div>
            </div>

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
        ');
    }
}
?>