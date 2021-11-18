<!--Se invoca de la clase Commerce un método que recibe por parámetros el nombre del titulo de la página y un numero que sera el enzabezado que se desea y que imprimira la parte superior de la página-->
<?php
require_once('../../core/helpers/Comercial.php');
Commerce::headerCommerce( 'Iniciar sesión', 1 );
?>

<!--Se crea el contenedor que contiene una carta con diseño sombreado, la cual
contiene el formulario de iniciar sesión de clientes-->
<div id="CajaPrincipal">
    <div class="row">
        <div class="col l8 offset-l2 m10 offset-m1 s12">
            <div class="card-panel z-depth-5 center-align" id="CajaLogin3">
                <div class="card" id="ContenidoLogin">
                    <div class="card-action red white-text"> 
                    <h3 style="text-align: center;" id="h3_login">Iniciar sesión</h3>
                    </div>
                    <div class="card-content">
                        <form action="" autocomplete="off" onsubmit="return Validar_Iniciar_Sesion();" name = "Iniciar_Sesion"  id = "Iniciar_Sesion" method="POST" enctype="multipart/form-data">
                            <div class="input-field col l10 offset-l1 m12 s10 offset-s1">
                                <i class="material-icons prefix">account_circle</i>
                                <input id="txt_usuario" type="text" name="txt_usuario" onkeypress="return ValidarEscritura(event, 'num_car', this)" class="validate"  minlength="8" maxlength="30" required autocomplete = "off" oncopy="return false" oncut="return false" onpaste="return false" oncut="return false" onpaste="return false"/>
                                <label for="txt_usuario" id="lb1">Usuario</label>
                            </div>
                            <div class="input-field col l10 offset-l1 m12 s10 offset-s1">
                                <i class="material-icons prefix">lock</i>
                                <input id="txt_contraseña" type="password" name="txt_contraseña" class="validate" onkeypress="return ValidarEscritura4(event, 'num_car', this)"  minlength="6" maxlength="60" required autocomplete = "off" oncopy="return false" oncut="return false" onpaste="return false" oncut="return false" onpaste="return false"/>
                                <label for="txt_contraseña" id="lb2">Contraseña</label>
                            </div>
                            <div class="input-field col l10 offset-l1 m12 s10 offset-s1">
                                <a href="#!" id="LinkRecuperarContraseña"><u>¿Ha olvidado su contraseña?</u></a>
                            </div>
                            <div class="input-field col l10 offset-l1 m12 s10 offset-s1">
                                <a href="../commerce/Registrarse.php" id="LinkRecuperarContraseña"><u>¿No tiene una cuenta?</u> Cree una nueva.</a>
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

<!--Se invoca de la clase Commerce un método que recibe por parámetros el nombre del archivo JS y que imprimira la parte inferior de la página-->
<?php
require_once('../../core/helpers/Comercial.php');
Commerce::footerCommerce( 'Login' );
?>

