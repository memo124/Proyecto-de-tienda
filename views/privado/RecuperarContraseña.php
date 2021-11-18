<!doctype html>
        <html lang="es">
        <head>
            <!-- Conjunto de caracteres -->
            <meta charset="utf-8">
            <!-- Indica al navegador que la página web está optimizada para dispositivos móviles -->
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <!-- Título del documento -->
            <title>Recuperar contraseña</title>
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
                            <a href="index.php" class="brand-logo"><i class="large material-icons">dashboard</i></a>
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

<div>
    <div class="row">
        <div class="col l10 offset-l1 m10 offset-m1 s12">
            <div class="card-panel z-depth-5 center-align" id="CajaEncabezado">
                <div class="row">
                    <h3>Recuperar contraseña</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>

<div id="CajaPrincipal">
    <div class="row">
        <div class="col l4 m6 s12">
            <div id="divpaso1">
                <div class="card-panel z-depth-5 center-align" id="CajaLogin2">
                    <div class="card" id="ContenidoLogin">
                        <div class="card-action red white-text"> 
                            <h3 style="text-align: center;">Paso 1</h3>
                        </div>
                        <div class="card-content">
                            <form name = "Paso1" id="Paso1"  autocomplete="off" method="POST" enctype="multipart/form-data">
                            <div class="input-field col l12 m12 s12">
                                <i class="material-icons prefix">account_circle</i>
                                <input id="txt_usuario" type="text" name="txt_usuario" class="validate" onkeypress="return ValidarEscritura(event, 'num_car', this)" autocomplete = "off" minlength="8" maxlength="30" oncopy="return false" oncut="return false" onpaste="return false" oncut="return false" onpaste="return false" required/>
                                <label for="txt_usuario" id="lbr1">Usuario</label>
                            </div>
                            <div class="input-field col l12 m12 s12">
                                <i class="material-icons prefix">contact_mail</i>
                                <input id="txt_correo_usuario" type="email" class="validate" name="txt_correo_usuario" onkeypress="return ValidarEscritura2(event, 'num_car')" autocomplete = "off" minlength="15" maxlength="100" oncopy="return false" oncut="return false" onpaste="return false" oncut="return false" onpaste="return false" required/>
                                <label for="txt_correo_usuario" id="lbr2">Correo</label>
                            </div>
                            <div class="form-fiel center-align">
                                <button type="submit" href="#!" class="btn-large red z-depth-5 ">Confirmar</button>
                            </div><br>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col l4 m6 s12">
            <div id="divpaso2">
                <div class="card-panel z-depth-5 center-align" id="CajaLogin3">
                    <div class="card" id="ContenidoLogin">
                        <div class="card-action red white-text"> 
                                <h3 style="text-align: center;">Paso 2</h3>
                        </div>
                        <div class="card-content">
                            <form action="" name = "Paso2" id = "Paso2" onsubmit="return CodigoCorrecto();" autocomplete="off" method="POST" enctype="multipart/form-data">
                            <div class="input-field col l12 m12 s12">
                                <i class="material-icons prefix">fiber_pin</i>
                                <input id="txt_codigo" type="text" name="txt_codigo"  class="validate" onkeypress="return ValidarEscritura(event, 'num', this)" minlength="6" maxlength="6" oncopy="return false" oncut="return false" onpaste="return false" oncut="return false" onpaste="return false" required/>
                                <label for="txt_codigo" id="lbr3">Código</label>
                            </div>
                            <div class="input-field col l12 m12 s12">
                                <i class="material-icons prefix">fiber_pin</i>
                                <input id="txt_codigo2" type="text" name="txt_codigo2" class="validate" onkeypress="return ValidarEscritura(event, 'num', this)" minlength="6" maxlength="6" oncopy="return false" oncut="return false" onpaste="return false" oncut="return false" onpaste="return false" required/>
                                <label for="txt_codigo2" id="lbr4">Confirmar código</label>
                            </div>
                            <div class="form-fiel center-align">
                                <button type="submit" href="#!" class="btn-large red z-depth-5 ">Confirmar</button>
                            </div><br>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col l4 m6 s12">
            <div id="divpaso3">
                <div class="card-panel z-depth-5 center-align" id="CajaLogin3">
                    <div class="card" id="ContenidoLogin">
                        <div class="card-action red white-text"> 
                                <h3 style="text-align: center;">Paso 3</h3>
                        </div>
                        <div class="card-content">
                            <form action="" id = "Paso3" name = "Paso3" autocomplete="off" onsubmit="return Validar_Contraseñas1()" method="POST" enctype="multipart/form-data">
                            <div class="input-field col l12 m12 s12">
                                <i class="material-icons prefix">lock</i>
                                <input id="txt_contraseña_usuario" type="password" name="txt_contraseña_usuario" class="validate" onkeypress="return ValidarEscritura4(event, 'num_car', this)" minlength="6" maxlength="60" required oncopy="return false" oncut="return false" onpaste="return false" oncut="return false" onpaste="return false"/>
                                <label for="txt_contraseña_usuario" id="lbr5">Contraseña</label>
                            </div>
                            <div class="input-field col l12 m12 s12">
                                <i class="material-icons prefix">lock</i>
                                <input id="txt_contraseña_usuario2" type="password" name="txt_contraseña_usuario2" class="validate" onkeypress="return ValidarEscritura4(event, 'num_car', this)" minlength="6" maxlength="60" required oncopy="return false" oncut="return false" onpaste="return false" oncut="return false" onpaste="return false"/>
                                <label for="txt_contraseña_usuario2" id="lbr6">Confirmar contraseña</label>
                            </div>
                            <div class="form-fiel center-align">
                                <button type="submit" href="#!" class="btn-large red z-depth-5 " >Confirmar</button>
                            </div><br>
                            </form>
                        </div>
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
            <script src="../../core/controllers/privado/Recuperar.js" type="text/javascript"></script>
            <script src="../../core/controllers/privado/Validaciones.js" type="text/javascript"></script>
    </body>
</html>