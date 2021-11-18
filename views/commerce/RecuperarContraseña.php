<!--Se invoca de la clase Commerce un método que recibe por parámetros el nombre del titulo de la página y un numero que sera el enzabezado que se desea y que imprimira la parte superior de la página-->
<?php
require_once('../../core/helpers/Comercial.php');
Commerce::headerCommerce( 'Recuperar Contraseña', 1 );
?>

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
            <div class="card-panel z-depth-5 center-align" id="CajaLogin3">
                <div class="card" id="ContenidoLogin">
                    <div class="card-action red white-text"> 
                        <h3 style="text-align: center;">Paso 1</h3>
                    </div>
                    <div class="card-content">
                        <form action="" name = "Paso1" id="Paso1" onsubmit = "return DatosCorrectos();" autocomplete="off" method="POST" enctype="multipart/form-data">
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
        <div class="col l4 m6 s12">
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
        <div class="col l4 m6 s12">
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

<!--Se invoca de la clase Commerce un método que recibe por parámetros el nombre del archivo JS y que imprimira la parte inferior de la página-->
<?php
require_once('../../core/helpers/Comercial.php');
Commerce::footerCommerce( 'Recuperar' );
?>
