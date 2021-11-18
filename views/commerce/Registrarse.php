<!--Se invoca de la clase Commerce un método que recibe por parámetros el nombre del titulo de la página y un numero que sera el enzabezado que se desea y que imprimira la parte superior de la página-->
<?php
require_once('../../core/helpers/Comercial.php');
Commerce::headerCommerce( 'Registrarse', 1 );
?>

<!--Se crea el contenedor que contiene una carta con diseño sombreado, la cual
contiene el formulario de registrar un nuevo cliente-->
<div id="CajaPrincipal">
        <div class="row">
            <div class="col l8 offset-l2 m10 offset-m1 s12">
                <div class="card-panel z-depth-5 center-align" id="CajaLogin3">
                    <div class="card" id="ContenidoLogin">
                            <div class="card-action red white-text"> 
                                    <h3 style="text-align: center;" id="h3_login">Crear cuenta</h3>
                            </div>
                                <div class="card-content">
                                    <form action="" name = "Registrarse" id = "Registrarse" autocomplete = "off" onsubmit = "return Validar_Registrarse();" method="POST" enctype="multipart/form-data">
                                    <input type="hidden" id="g-recaptcha-response" name="g-recaptcha-response"/>
                                    <div class="input-field col s12 m6">
                                        <i class="material-icons prefix">person</i>
                                        <input id="txt_nombres_usuario" type="text" name="txt_nombres_usuario" class="validate" required autocomplete = "off" onkeypress="return ValidarEscritura3(event, 'car', this)" minlength="2" maxlength="50" required oncopy="return false" oncut="return false" onpaste="return false" oncut="return false" onpaste="return false"/>
                                        <label for="txt_nombres_usuario" id="lb1">Nombres</label>
                                    </div>
                                    <div class="input-field col s12 m6">
                                        <i class="material-icons prefix">person</i>
                                        <input id="txt_apellidos_usuario" type="text" name="txt_apellidos_usuario" class="validate" required autocomplete = "off" onkeypress="return ValidarEscritura3(event, 'car', this)" minlength="2" maxlength="50" required oncopy="return false" oncut="return false" onpaste="return false" oncut="return false" onpaste="return false"/>
                                        <label for="txt_apellidos_usuario" id="lb2">Apellidos</label>
                                    </div>
                                    <div class="input-field col s12 m6">
                                        <i class="material-icons prefix">contact_mail</i>
                                        <input id="txt_correo" type="email" name="txt_correo" class="validate" required autocomplete = "off" onkeypress="return ValidarEscritura2(event, 'num_car', this)" minlength="15" maxlength="100" required oncopy="return false" oncut="return false" onpaste="return false" oncut="return false" onpaste="return false"/>
                                        <label for="txt_correo" id="lb3">Correo</label>
                                    </div>
                                    <div class="input-field col s12 m6">
                                        <i class="material-icons prefix">account_circle</i>
                                        <input id="txt_usuario" type="text" name="txt_usuario" class="validate" required autocomplete = "off" onkeypress="return ValidarEscritura(event, 'num_car', this)" minlength="8" maxlength="30" required oncopy="return false" oncut="return false" onpaste="return false" oncut="return false" onpaste="return false"/>
                                        <label for="txt_usuario" id="lb4">Usuario</label>
                                    </div>
                                    <div class="input-field col s12 m6">
                                        <i class="material-icons prefix">lock</i>
                                        <input id="txt_contraseña" type="password" name="txt_contraseña" class="validate" required autocomplete = "off" onkeypress="return ValidarEscritura4(event, 'num_car', this)" minlength="6" maxlength="60" required oncopy="return false" oncut="return false" onpaste="return false" oncut="return false" onpaste="return false"/>
                                        <label for="txt_contraseña" id="lb5">Contraseña</label>
                                    </div>
                                    <div class="input-field col s12 m6">
                                        <i class="material-icons prefix">lock</i>
                                        <input id="txt_contraseña2" type="password" name="txt_contraseña2" class="validate" required autocomplete = "off" onkeypress="return ValidarEscritura4(event, 'num_car', this)" minlength="6" maxlength="60" required oncopy="return false" oncut="return false" onpaste="return false" oncut="return false" onpaste="return false"/>
                                        <label for="txt_contraseña2" id="lb6">Confirmar contraseña</label>
                                    </div>
                                    <div class="form-fiel center-align">
                                        <button type="submit" class="btn-large red z-depth-5 ">Confirmar</button>
                                    </div><br>
                                    </form>
                                </div>
                            </div>
                    </div>
            </div>
        </div>
</div>
<!-- Importación del archivo para que funcione el reCAPTCHA. Para más información https://developers.google.com/recaptcha/docs/v3 -->
    <script src="https://www.google.com/recaptcha/api.js?render=6LdBzLQUAAAAAJvH-aCUUJgliLOjLcmrHN06RFXT"></script>
<!--Se invoca de la clase Commerce un método que recibe por parámetros el nombre del archivo JS y que imprimira la parte inferior de la página-->
<?php
require_once('../../core/helpers/Comercial.php');
Commerce::footerCommerce( 'Registrarse' );
?>