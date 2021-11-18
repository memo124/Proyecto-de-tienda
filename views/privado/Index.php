<!doctype html>
        <html lang="es">
        <head>
            <!-- Conjunto de caracteres -->
            <meta charset="utf-8">
            <!-- Indica al navegador que la página web está optimizada para dispositivos móviles -->
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <!-- Título del documento -->
            <title>Iniciar sesión</title>
            <!-- Importación de archivos tipo CSS -->
            <link rel="stylesheet" href="../../resources/css/materialize2.min.css" type="text/css">
            <link rel="stylesheet" href="../../resources/css/material-icons.css" type="text/css">
            <link rel="stylesheet" href="../../resources/css/style.css" type="text/css">
            <link rel="stylesheet" href="../../resources/css/animate.css" type="text/css">
            <link rel="stylesheet" href="../../resources/css/index.css" type="text/css">
            <link rel="stylesheet" href="../../resources/css/sweetalert2.min.css" type="text/css">
        </head>
        <body id="CuerpoIndex">     
            <header>      
            <nav class="red">
                <div class="nav-wrapper">
                    <div class="row">
                            <a href="Index.php" class="brand-logo"><i class="large material-icons">dashboard</i></a>
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

<div id="CajaPrincipal">
        <div class="row">
            <div class="col l7 m6 s12">
                <div class="card-panel z-depth-5 center-align" id="CajaLogin2">
                    <div class="slider">
                            <ul class="slides">
                            <li>
                                <img src="../../resources/img/cards/accesorios_carros4.jpg" class="responsive-img"> <!-- random image -->
                                <div class="caption right-align">
                                <h3>Simplex Cars Accessory</h3>
                                <h5 class="light grey-text text-lighten-3">lleva la comodidad de tu casa a tu automóvil.</h5>
                                </div>
                            </li>
                            <li>
                                <img src="../../resources/img/cards/accesorios_carros16.jpg" class="responsive-img"> <!-- random image -->
                                <div class="caption center-align">
                                <h3>Simplex Cars Accessory</h3>
                                <h5 class="light grey-text text-lighten-3">lleva la comodidad de tu casa a tu automóvil.</h5>
                                </div>
                            </li>
                            <li>
                                <img src="../../resources/img/cards/accesorios_carros11.jpg" class="responsive-img"> <!-- random image -->
                                <div class="caption left-align">
                                <h3>Simplex Cars Accessory</h3>
                                <h5 class="light grey-text text-lighten-3">lleva la comodidad de tu casa a tu automóvil.</h5>
                                </div>
                            </li>
                            <li>
                                <img src="../../resources/img/cards/accesorios_carros15.jpg" class="responsive-img"> <!-- random image -->
                                <div class="caption right-align">
                                <h3>Simplex Cars Accessory</h3>
                                <h5 class="light grey-text text-lighten-3">lleva la comodidad de tu casa a tu automóvil.</h5>
                                </div>
                            </li>
                            <li>
                                <img src="../../resources/img/cards/accesorios_carros14.jpg" class="responsive-img"> <!-- random image -->
                                <div class="caption center-align">
                                <h3>Simplex Cars Accessory</h3>
                                <h5 class="light grey-text text-lighten-3">lleva la comodidad de tu casa a tu automóvil.</h5>
                                </div>
                            </li>
                            <li>
                                <img src="../../resources/img/cards/accesorios_carros19.jpg" class="responsive-img"> <!-- random image -->
                                <div class="caption left-align">
                                <h3>Simplex Cars Accessory</h3>
                                <h5 class="light grey-text text-lighten-3">lleva la comodidad de tu casa a tu automóvil.</h5>
                                </div>
                            </li>
                            </ul>
                        </div>
                </div>
            </div>
            <div class="col l5 m6 s12">
                <div class="card-panel z-depth-5 center-align" id="CajaLogin3">
                    <div class="card" id="ContenidoLogin">
                                <div class="card-action red white-text"> 
                                    <h3 style="text-align: center;">Iniciar sesión</h3>
                                </div>
                                <div class="card-content">
                                    <form action="" autocomplete="off" onsubmit="return Validar_Iniciar_Sesion()" name = "Iniciar_Sesion"  id = "Iniciar_Sesion" method="POST" enctype="multipart/form-data">
                                        <div class="input-field col l10 offset-l1 m12 s10 offset-s1">
                                            <i class="material-icons prefix">account_circle</i>
                                            <input id="txt_usuario" type="text" name="txt_usuario" class="validate" onkeypress="return ValidarEscritura(event, 'num_car', this)" minlength="8" maxlength="30" required autocomplete = "off" oncopy="return false" oncut="return false" onpaste="return false" oncut="return false" onpaste="return false"/>
                                            <label for="txt_usuario" id="lb1">Usuario</label>
                                        </div>
                                        <div class="input-field col l10 offset-l1 m12 s10 offset-s1">
                                            <i class="material-icons prefix">lock</i>
                                            <input id="txt_contraseña_usuario" type="password" name="txt_contraseña_usuario" class="validate" onkeypress="return ValidarEscritura4(event, 'num_car', this)" minlength="6" maxlength="60" required autocomplete = "off" oncopy="return false" oncut="return false" onpaste="return false" oncut="return false" onpaste="return false"/>
                                            <label for="txt_contraseña_usuario" id="lb2">Contraseña</label>
                                        </div>
                                        <div class="input-field col l10 offset-l1 m12 s10 offset-s1">
                                            <a href="RecuperarContraseña.php" id="LinkRecuperarContraseña"><u>¿Ha olvidado su contraseña?</u></a>
                                        </div>
                                        <div class="form-fiel center-align">
                                            <button type="submit" class="btn-large red z-depth-5 ">Acceder</a>
                                        </div><br>
                                    </form>
                                </div>
                            </div>
                    </div>
            </div>
        </div>
</div>
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
            <script src="../../core/controllers/privado/Index.js" type="text/javascript"></script>
            <script src="../../core/controllers/privado/Validaciones.js" type="text/javascript"></script>
    </body>
</html>
