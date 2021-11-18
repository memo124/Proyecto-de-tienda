<?php
class Commerce{
    public static function headerCommerce( $titulo, $caso ){
        switch ( $caso ) {
            case '1':
                print('
                <!doctype html>
                <html lang="es">
                <head>
                    <!-- Conjunto de caracteres -->
                    <meta charset="utf-8">
                    <!-- Indica al navegador que la página web está optimizada para dispositivos móviles -->
                    <meta name="viewport" content="width=device-width, initial-scale=1.0">
                    <!-- Título del documento -->
                    <title>'.$titulo.'</title>
                    <!-- Importación de archivos tipo CSS -->
                    <link rel="stylesheet" href="../../resources/css/materialize.css" type="text/css">
                    <link rel="stylesheet" href="../../resources/css/material-icons.css" type="text/css">
                    <link rel="stylesheet" href="../../resources/css/stylepublico.css" type="text/css">
                    <link rel="stylesheet" href="../../resources/css/login.css" type="text/css">
                    <link rel="stylesheet" href="../../resources/css/glider.min.css" type="text/css">
                    <link rel="stylesheet" href="../../resources/css/fontawesome.min.css" type="text/css">
                    <!-- Llamada a un archivo tipo icono -->
                    <link rel="shortcut icon" href="img/logo.png" type="image/png">
                </head>
                <body id="CuerpoLogin">     
                    <header>      
                        <nav class="red">
                            <div class="nav-wrapper z-depth-3">
                                <div class="row">
                                    <div class="col l1 m1 s1">
                                        <a href="#" data-target="mobile-demo" class="sidenav-trigger"><i class="material-icons">menu</i></a>
                                        <a href="Index.php" class="brand-logo"><img src="../../resources/img/logo.png" height="80"></a>
                                    </div>
                                    <div class="col l11 m11 s11">
                                    <!--estructura menu desplegable-->
                                    <ul id="Marcas" class="dropdown-content">
                                        <li><a href="Marcas1.php"><i class="material-icons left">shop</i>Marcas</a></li>
                                        <li class="divider"></li>
                                        <li><a href="Marcas2.php"><i class="material-icons left">shop_two</i>Productos</a></li>
                                    </ul>
                                    <ul id="Marcas2" class="dropdown-content">
                                        <li><a href="Marcas1.php"><i class="material-icons left">shop</i>Marcas</a></li>
                                        <li><a href="Marcas2.php"><i class="material-icons left">shop_two</i>Productos</a></li>
                                    </ul>
                                    <ul id="Productos" class="dropdown-content">
                                        <li><a href="Productos1.php"><i class="material-icons left">shop</i>Productos</a></li>
                                        <li class="divider"></li>
                                        <li><a href="Productos2.php"><i class="material-icons left">shop_two</i>Por tipos</a></li>
                                    </ul>
                                    <ul id="Productos2" class="dropdown-content">
                                        <li><a href="Productos1.php"><i class="material-icons left">shop</i>Productos</a></li>
                                        <li><a href="Productos2.php"><i class="material-icons left">shop_two</i>Por tipos</a></li>
                                    </ul>
                                    <ul id="Info" class="dropdown-content">
                                        <li><a href="Contactos.php"><i class="material-icons left">phone</i>Contactos</a></li>
                                        <li class="divider"></li>
                                        <li><a href="SobreNosotros.php"><i class="material-icons left">info_outline</i>Sobre nosotros</a></li>
                                    </ul>
                                    <ul id="Info2" class="dropdown-content">
                                        <li><a href="Contactos.php"><i class="material-icons left">phone</i>Contactos</a></li>
                                        <li><a href="SobreNosotros.php"><i class="material-icons left">info_outline</i>Sobre nosotros</a></li>
                                    </ul>
                                    <ul id="Acceso" class="dropdown-content">
                                        <li><a href="Login.php"><i class="material-icons left">security</i>Iniciar sesión</a></li>
                                        <li class="divider"></li>
                                        <li><a href="RecuperarContraseña.php"><i class="material-icons left">lock_open</i>Recuperar contraseña</a></li>
                                        <li class="divider"></li>
                                        <li><a href="Registrarse.php"><i class="material-icons left">person_add</i>Registrarse</a></li>
                                    </ul>
                                    <ul id="Acceso2" class="dropdown-content">
                                        <li><a href="Login.php"><i class="material-icons left">security</i>Iniciar sesión</a></li>
                                        <li><a href="RecuperarContraseña.php"><i class="material-icons left">lock_open</i>Recuperar contraseña</a></li>
                                        <li><a href="Registrarse.php"><i class="material-icons left">person_add</i>Registrarse</a></li>
                                    </ul>
                                <!--Estructura de menu a tamaño normal-->    
                                    <ul class="right hide-on-med-and-down">
                                        <li><a href="Index.php"><i class="material-icons left">home</i>Inicio</a></li>
                                        <li><a class="dropdown-trigger" href="#!" data-target="Marcas"><i class="material-icons left">shop_two</i>Marcas<i class="material-icons right">arrow_drop_down</i></a></li>
                                        <li><a class="dropdown-trigger" href="#!" data-target="Productos"><i class="material-icons left">shop_two</i>Productos<i class="material-icons right">arrow_drop_down</i></a></li>
                                        <li><a class="dropdown-trigger" href="#!" data-target="Info"><i class="material-icons left">info_outline</i>Sobre nosotros<i class="material-icons right">arrow_drop_down</i></a></li>
                                        <li><a class="dropdown-trigger" href="#!" data-target="Acceso"><i class="material-icons left">security</i>Acceso<i class="material-icons right">arrow_drop_down</i></a></li>                                          
                                    </ul>
                                </div>
                                <!--menu a tamaño de pantalla movil-->
                                    <ul class="sidenav" id="mobile-demo">
                                        <li><a href="Index.php"><i class="material-icons left">home</i>Inicio</a></li>
                                        <li><a class="dropdown-trigger" href="#!" data-target="Marcas2"><i class="material-icons left">shop_two</i>Marcas<i class="material-icons right">arrow_drop_down</i></a></li>
                                        <li><a class="dropdown-trigger" href="#!" data-target="Productos2"><i class="material-icons left">shop_two</i>Productos<i class="material-icons right">arrow_drop_down</i></a></li>
                                        <li><a class="dropdown-trigger" href="#!" data-target="Info2"><i class="material-icons left">info_outline</i>Sobre nosotros<i class="material-icons right">arrow_drop_down</i></a></li>
                                        <li><a class="dropdown-trigger" href="#!" data-target="Acceso2"><i class="material-icons left">security</i>Acceso<i class="material-icons right">arrow_drop_down</i></a></li>                                          
                                    </ul>
                                </div>
                            </div>
                        </nav>
                    </header>  
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
                    <main>
                ');
                break;
            case '2':
                print('
                <!doctype html>
                <html lang="es">
                <head>
                    <!-- Conjunto de caracteres -->
                    <meta charset="utf-8">
                    <!-- Indica al navegador que la página web está optimizada para dispositivos móviles -->
                    <meta name="viewport" content="width=device-width, initial-scale=1.0">
                    <!-- Título del documento -->
                    <title>'.$titulo.'</title>
                    <!-- Importación de archivos tipo CSS -->
                    <link rel="stylesheet" href="../../resources/css/materialize.css" type="text/css">
                    <link rel="stylesheet" href="../../resources/css/material-icons.css" type="text/css">
                    <link rel="stylesheet" href="../../resources/css/stylepublico.css" type="text/css">
                    <link rel="stylesheet" href="../../resources/css/login.css" type="text/css">
                    <link rel="stylesheet" href="../../resources/css/glider.min.css" type="text/css">
                    <link rel="stylesheet" href="../../resources/css/fontawesome.min.css" type="text/css">
                    <!-- Llamada a un archivo tipo icono -->
                    <link rel="shortcut icon" href="img/logo.png" type="image/png">
                </head>
                <body id="CuerpoPaginas">     
                    <header>      
                        <nav class="red">
                            <div class="nav-wrapper z-depth-3">
                                <div class="row">
                                    <div class="col l1 m1 s1">
                                        <a href="#" data-target="mobile-demo" class="sidenav-trigger"><i class="material-icons">menu</i></a>
                                        <a href="Index.php" class="brand-logo"><img src="../../resources/img/logo.png" height="80"></a>
                                    </div>
                                    <div class="col l11 m11 s11">
                                    <!--estructura menu desplegable-->
                                    <ul id="Marcas" class="dropdown-content">
                                        <li><a href="Marcas1.php"><i class="material-icons left">shop</i>Marcas</a></li>
                                        <li class="divider"></li>
                                        <li><a href="Marcas2.php"><i class="material-icons left">shop_two</i>Productos</a></li>
                                    </ul>
                                    <ul id="Marcas2" class="dropdown-content">
                                        <li><a href="Marcas1.php"><i class="material-icons left">shop</i>Marcas</a></li>
                                        <li><a href="Marcas2.php"><i class="material-icons left">shop_two</i>Productos</a></li>
                                    </ul>
                                    <ul id="Productos" class="dropdown-content">
                                        <li><a href="Productos1.php"><i class="material-icons left">shop</i>Productos</a></li>
                                        <li class="divider"></li>
                                        <li><a href="Productos2.php"><i class="material-icons left">shop_two</i>Por tipos</a></li>
                                    </ul>
                                    <ul id="Productos2" class="dropdown-content">
                                        <li><a href="Productos1.php"><i class="material-icons left">shop</i>Productos</a></li>
                                        <li><a href="Productos2.php"><i class="material-icons left">shop_two</i>Por tipos</a></li>
                                    </ul>
                                    <ul id="Info" class="dropdown-content">
                                        <li><a href="Contactos.php"><i class="material-icons left">phone</i>Contactos</a></li>
                                        <li class="divider"></li>
                                        <li><a href="SobreNosotros.php"><i class="material-icons left">info_outline</i>Sobre nosotros</a></li>
                                    </ul>
                                    <ul id="Info2" class="dropdown-content">
                                        <li><a href="Contactos.php"><i class="material-icons left">phone</i>Contactos</a></li>
                                        <li><a href="SobreNosotros.php"><i class="material-icons left">info_outline</i>Sobre nosotros</a></li>
                                    </ul>
                                    <ul id="Acceso" class="dropdown-content">
                                        <li><a href="Login.php"><i class="material-icons left">security</i>Iniciar sesión</a></li>
                                        <li class="divider"></li>
                                        <li><a href="RecuperarContraseña.php"><i class="material-icons left">lock_open</i>Recuperar contraseña</a></li>
                                        <li class="divider"></li>
                                        <li><a href="Registrarse.php"><i class="material-icons left">person_add</i>Registrarse</a></li>
                                    </ul>
                                    <ul id="Acceso2" class="dropdown-content">
                                        <li><a href="Login.php"><i class="material-icons left">security</i>Iniciar sesión</a></li>
                                        <li><a href="RecuperarContraseña.php"><i class="material-icons left">lock_open</i>Recuperar contraseña</a></li>
                                        <li><a href="Registrarse.php"><i class="material-icons left">person_add</i>Registrarse</a></li>
                                    </ul>
                                <!--Estructura de menu a tamaño normal-->    
                                    <ul class="right hide-on-med-and-down">
                                        <li><a href="Index.php"><i class="material-icons left">home</i>Inicio</a></li>
                                        <li><a class="dropdown-trigger" href="#!" data-target="Marcas"><i class="material-icons left">shop_two</i>Marcas<i class="material-icons right">arrow_drop_down</i></a></li>
                                        <li><a class="dropdown-trigger" href="#!" data-target="Productos"><i class="material-icons left">shop_two</i>Productos<i class="material-icons right">arrow_drop_down</i></a></li>
                                        <li><a class="dropdown-trigger" href="#!" data-target="Info"><i class="material-icons left">info_outline</i>Sobre nosotros<i class="material-icons right">arrow_drop_down</i></a></li>
                                        <li><a class="dropdown-trigger" href="#!" data-target="Acceso"><i class="material-icons left">security</i>Acceso<i class="material-icons right">arrow_drop_down</i></a></li>                                          
                                    </ul>
                                </div>
                                <!--menu a tamaño de pantalla movil-->
                                    <ul class="sidenav" id="mobile-demo">
                                        <li><a href="Index.php"><i class="material-icons left">home</i>Inicio</a></li>
                                        <li><a class="dropdown-trigger" href="#!" data-target="Marcas2"><i class="material-icons left">shop_two</i>Marcas<i class="material-icons right">arrow_drop_down</i></a></li>
                                        <li><a class="dropdown-trigger" href="#!" data-target="Productos2"><i class="material-icons left">shop_two</i>Productos<i class="material-icons right">arrow_drop_down</i></a></li>
                                        <li><a class="dropdown-trigger" href="#!" data-target="Info2"><i class="material-icons left">info_outline</i>Sobre nosotros<i class="material-icons right">arrow_drop_down</i></a></li>
                                        <li><a class="dropdown-trigger" href="#!" data-target="Acceso2"><i class="material-icons left">security</i>Acceso<i class="material-icons right">arrow_drop_down</i></a></li>                                          
                                    </ul>
                                </div>
                            </div>
                        </nav>
                    </header>  
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
                    <main>
                ');
                break;
            case '3':
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
                    <title>'.$titulo.'</title>
                        <!-- Importación de archivos tipo CSS -->
                    <link rel="stylesheet" href="../../resources/css/materialize.css" type="text/css">
                    <link rel="stylesheet" href="../../resources/css/material-icons.css" type="text/css">
                    <link rel="stylesheet" href="../../resources/css/stylepublico.css" type="text/css">
                    <link rel="stylesheet" href="../../resources/css/login.css" type="text/css">
                    <link rel="stylesheet" href="../../resources/css/glider.min.css" type="text/css">
                    <link rel="stylesheet" href="../../resources/css/fontawesome.min.css" type="text/css">
                </head>
                <body id="CuerpoLogin">     
                    <header>      
                        <nav class="red">
                            <div class="nav-wrapper z-depth-3">
                                <div class="row">
                                    <div class="col l1 m1 s1">
                                        <a href="#" data-target="mobile-demo" class="sidenav-trigger"><i class="material-icons">menu</i></a>
                                    </div>
                                    <div class="col l11 m11 s11">
                                        <!--estructura menu desplegable-->
                                        <!--estructura menu desplegable-->
                                        <ul id="Marcas" class="dropdown-content">
                                            <li><a href="Marcas1U.php"><i class="material-icons left">shop</i>Marcas</a></li>
                                            <li class="divider"></li>
                                            <li><a class="A_MENU" href="Marcas2U.php"><i class="material-icons left">shop_two</i>Marcas con productos</a></li>
                                        </ul>
                                        <ul id="Marcas2" class="dropdown-content">
                                            <li><a href="Marcas1U.php"><i class="material-icons left">shop</i>Marcas</a></li>
                                            <li><a href="Marcas2U.php"><i class="material-icons left">shop_two</i>Marcas con productos</a></li>
                                        </ul>
                                        <ul id="Productos" class="dropdown-content">
                                            <li><a href="Productos1U.php"><i class="material-icons left">shop</i>Productos</a></li>
                                            <li class="divider"></li>
                                            <li><a href="Productos2U.php"><i class="material-icons left">shop_two</i>Por tipos</a></li>
                                        </ul>
                                        <ul id="Productos2" class="dropdown-content">
                                            <li><a href="Productos1U.php"><i class="material-icons left">shop</i>Productos</a></li>
                                            <li><a href="Productos2U.php"><i class="material-icons left">shop_two</i>Por tipos</a></li>
                                        </ul>
                                        <ul id="Compras" class="dropdown-content">
                                            <li><a href="Carrito.php"><i class="material-icons left">shop</i>Carrito</a></li>
                                            <li class="divider"></li>
                                            <li><a class="A_MENU" href="Compras.php"><i class="material-icons left">shop_two</i>Mis compras</a></li>
                                            <li class="divider"></li>
                                            <li><a class="A_MENU" href="CrearReseña.php"><i class="material-icons left">grade</i>Crear reseña</a></li>
                                            <li class="divider"></li>
                                            <li><a href="VerReseñas.php"><i class="material-icons left">grade</i>Ver reseñas</a></li>
                                        </ul>
                                        <ul id="Compras2" class="dropdown-content">
                                            <li><a href="Carrito.php"><i class="material-icons left">shop</i>Carrito</a></li>
                                            <li><a href="Compras.php"><i class="material-icons left">shop_two</i>Mis compras</a></li>
                                        </ul>
                                        <ul id="Info2" class="dropdown-content">
                                            <li><a href="Contactos2.php"><i class="material-icons left">phone</i>Contactos</a></li>
                                            <li><a href="SobreNosotros2.php"><i class="material-icons left">info_outline</i>Sobre nosotros</a></li>
                                        </ul>
                                        <ul id="Reseñas2" class="dropdown-content">
                                            <li><a href="CrearReseña.php"><i class="material-icons left">grade</i>Crear reseña</a></li>
                                            <li><a href="VerReseñas.php"><i class="material-icons left">grade</i>Ver reseñas</a></li>
                                        </ul>
                                        <ul id="Cuenta" class="dropdown-content">
                                            <li><a href="#!"><i class="material-icons left">security</i>Editar perfil</a></li>
                                            <li class="divider"></li>
                                            <li><a href="#CambiarContraseña" class="modal-trigger"><i class="material-icons left">lock_open</i>Editar contraseña</a></li>
                                            <li class="divider"></li>
                                            <li><a href="#!"><i class="material-icons left">person_add</i>Cerrar sesión</a></li>
                                            <li class="divider"></li>
                                            <li><a href="Contactos2.php"><i class="material-icons left">phone</i>Contactos</a></li>
                                            <li class="divider"></li>
                                            <li><a href="SobreNosotros2.php"><i class="material-icons left">info_outline</i>Sobre nosotros</a></li>
                                        </ul>
                                        <ul id="Cuenta2" class="dropdown-content">
                                            <li><a href="#!"><i class="material-icons left">security</i>Editar perfil</a></li>
                                            <li><a href="#CambiarContraseña" class="modal-trigger"><i class="material-icons left">lock_open</i>Editar contraseña</a></li>
                                            <li><a href="#!"><i class="material-icons left">person_add</i>Cerrar sesión</a></li>
                                        </ul>
                                        <!--Estructura de menu a tamaño normal-->    
                                        <ul class="right hide-on-med-and-down">
                                            <li><a href="Index2.php"><i class="material-icons left">home</i>Inicio</a></li>
                                            <li><a class="dropdown-trigger" href="#!" data-target="Marcas"><i class="material-icons left">shop_two</i>Marcas<i class="material-icons right">arrow_drop_down</i></a></li>
                                            <li><a class="dropdown-trigger" href="#!" data-target="Productos"><i class="material-icons left">shop_two</i>Productos<i class="material-icons right">arrow_drop_down</i></a></li>
                                            <li><a class="dropdown-trigger" href="#!" data-target="Compras"><i class="material-icons left">shopping_cart</i>Compras<i class="material-icons right">arrow_drop_down</i></a></li>
                                            <li><a class="dropdown-trigger" href="#!" data-target="Cuenta"><i class="material-icons left">account_circle</i>Cuenta<i class="material-icons right">arrow_drop_down</i></a></li>                                          
                                        </ul>
                                    </div>
                                    <!--menu a tamaño de pantalla movil-->
                                            <ul class="sidenav" id="mobile-demo">
                                                <li><a href="Index2.php"><i class="material-icons left">home</i>Inicio</a></li>
                                                <li><a class="dropdown-trigger" href="#!" data-target="Marcas2"><i class="material-icons left">shop_two</i>Marcas<i class="material-icons right">arrow_drop_down</i></a></li>
                                                <li><a class="dropdown-trigger" href="#!" data-target="Productos2"><i class="material-icons left">shop_two</i>Productos<i class="material-icons right">arrow_drop_down</i></a></li>
                                                <li><a class="dropdown-trigger" href="#!" data-target="Compras2"><i class="material-icons left">shopping_cart</i>Compras<i class="material-icons right">arrow_drop_down</i></a></li>
                                                <li><a class="dropdown-trigger" href="#!" data-target="Reseñas2"><i class="material-icons left">star_border</i>Reseñas<i class="material-icons right">arrow_drop_down</i></a></li>
                                                <li><a class="dropdown-trigger" href="#!" data-target="Info2"><i class="material-icons left">info_outline</i>Sobre nosotros<i class="material-icons right">arrow_drop_down</i></a></li>
                                                <li><a class="dropdown-trigger" href="#!" data-target="Cuenta2"><i class="material-icons left">account_circle</i>Cuenta<i class="material-icons right">arrow_drop_down</i></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </nav>
                            </header>  
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
                            <main>
                        ');
                break;
            default:
                # code...
                break;
        }
    }

    public static function footerCommerce( $archivoJS ){
        print('
        </main>
            <div class="z-depth-3">
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
                                    <li><a class="grey-text text-lighten-3" href="#!">Gmail: SimplexCars@gmail.com</a></li>
                                    <li><a class="grey-text text-lighten-3" href="#!">Instagram: Simplex_Cars</a></li>
                                    <li><a class="grey-text text-lighten-3" href="#!">Snapchat: Simplex_Cars</a></li>
                                    <li><a class="grey-text text-lighten-3" href="#!">Twitter: @Simplex_Cars</a></li>
                                    <li><a class="grey-text text-lighten-3" href="#!">WhatsApp: +503 2257-7777</a></li>
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
            </div>
            <script src="../../resources/js/jquery-3.4.1.min.js" type="text/javascript"></script>
            <script src="../../resources/js/materialize.min.js" type="text/javascript"></script>
            <script src="../../resources/js/initialization.js" type="text/javascript"></script>
            <script src="../../resources/js/sweetalert.min.js" type="text/javascript"></script>
            <script src="../../core/helpers/components.js" type="text/javascript"></script>
            <script src="../../resources/js/glider.min.js" type="text/javascript"></script>
            <script src="../../resources/js/fontawesome.min.js" type="text/javascript"></script>
            <script src="https://kit.fontawesome.com/2c36e9b7b1.js" crossorigin="anonymous"></script>
            <script src="../../core/controllers/commerce/Validaciones.js" type="text/javascript"></script>       
            <script src="../../core/controllers/commerce/'.$archivoJS.'.js" type="text/javascript"></script>
            <script src="../../core/controllers/commerce/Cuenta.js" type="text/javascript"></script>       
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