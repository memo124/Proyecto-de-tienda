<?php
require_once('../../core/helpers/privado.php');
PaginaPrivado::headerPrivado('Usuarios','Usuarios');
?>

<div>
    <div class="row">
    <!-- Formulario de búsqueda -->
        <div class="col l10 offset-l1 m10 offset-m1 s12">
            <div class="card-panel z-depth-5 center-align" id="CajaEncabezado">
                <div class="row">
                    <h3>Gestión de usuarios</h3>
                        <div class="row">
                            <div class="col l8 offset-l2 m12 s12">
                             <!-- Botón para abrir ventana de nuevo registro -->
                                <a onclick="ModalCrear()" class="btn-medium waves-effect waves-light red btn">Agregar usuario<i class="material-icons left">add</i></a>
                                <a onclick="" class="btn-medium waves-effect waves-light cyan btn" href="../../core/reports/privado/Usuario.php" target="_blank">
                                Generar reporte<i class="material-icons left">content_paste</i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col l12 m12 s12">
            <div class="card-panel z-depth-5 center-align" id="CajaCuerpo">
                <div class="row">
                    <form action="" method="POST" id = "Buscar_usuario" name = "Buscar_usuario" onsubmit="return Validar_Buscar_Cliente();" autocomplete="off" enctype="multipart/form-data">
                        <div class="input-field center-align col s10 m8 offset-m2 l7 offset-l2">
                            <i class="material-icons prefix">search</i>
                            <input id="txt_buscar" type="text" name="txt_buscar" autocomplete = "off" onkeypress="return ValidarEscritura2(event, 'num_car2')" minlength="1" maxlength="100" oncopy="return false" oncut="return false" onpaste="return false" oncut="return false" onpaste="return false" required/>
                            <label for="txt_buscar" id="lbBuscar">Buscar usuario</label>
                        </div>
                        <div class="input-field col s1 m1 l1">
                        <button type="submit" class="btn-floating btn-medium waves-effect waves-light red  tooltipped" data-tooltip="Buscar"><i class="material-icons">check</i></button>
                         </div>
                    </form>
                </div>
                <div class="row" id="FilaTabla">
                <!-- Tabla para mostrar los registros existentes -->
                    <table class="responsive-table highlight striped centered"  id="Tabla">
                        <thead>
                            <tr>
                                <th>N°</th>
                                <th>Nombre</th>
                                <th>Apellido</th>
                                <th>Correo</th>
                                <th>Usuario</th>
                                <th>Estado</th>
                                <th>Tipo</th>
                                <th>Acción</th>
                            </tr>
                        </thead>
                        <tbody id="CuerpoTabla">             
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
<!-- Ventana para crear o actualizar un registro -->

<div id="save-modal" class="modal">
    <div class="modal-content">
                <h4 id="modal-title" class="center-align"></h4>
        <form method="POST" id="Usuarios" name="Usuarios" autocomplete="off" enctype="multipart/form-data" onsubmit="return Validar_Usuarios();">
            <input class="hide" type="text" id="id_usuario" name="id_usuario"/>
                <div class="row">
                    <div class="input-field col s12 m6">
                        <i class="material-icons prefix">person</i>
                        <input id="txt_nombres_usuario" type="text" name="txt_nombres_usuario" class="validate" required autocomplete = "off" onkeypress="return ValidarEscritura3(event, 'car', this)" minlength="2" maxlength="50" required oncopy="return false" oncut="return false" onpaste="return false" oncut="return false" onpaste="return false"/>
                        <label for="txt_nombres_usuario">Nombres</label>
                    </div>
                    <div class="input-field col s12 m6">
                        <i class="material-icons prefix">person</i>
                        <input id="txt_apellidos_usuario" type="text" name="txt_apellidos_usuario" class="validate" required autocomplete = "off" onkeypress="return ValidarEscritura3(event, 'car', this)" minlength="2" maxlength="50" required oncopy="return false" oncut="return false" onpaste="return false" oncut="return false" onpaste="return false"/>
                        <label for="txt_apellidos_usuario">Apellidos</label>
                    </div>
                    <!--ejemplo-->
                    <div class="input-field col s12 m6">
                        <i class="material-icons prefix">contact_mail</i>
                        <input id="txt_correo" type="text" name="txt_correo" class="validate" required autocomplete = "off" onkeypress="return ValidarEscritura2(event, 'num_car', this)" minlength="2" maxlength="50" required oncopy="return false" oncut="return false" onpaste="return false" oncut="return false" onpaste="return false"/>
                        <label for="txt_correo">Correo</label>
                    </div>
                    <div class="input-field col s12 m6">
                        <i class="material-icons prefix">account_circle</i>
                        <input id="txt_usuario" type="text" name="txt_usuario" class="validate" required autocomplete = "off" onkeypress="return ValidarEscritura(event, 'num_car', this)" minlength="8" maxlength="30" required oncopy="return false" oncut="return false" onpaste="return false" oncut="return false" onpaste="return false"/>
                        <label for="txt_usuario">Usuario</label>
                    </div>
                    <div class="input-field col s12 m6">
                        <i class="material-icons prefix">lock</i>
                        <input id="txt_contraseña_usuario" type="password" name="txt_contraseña_usuario" class="validate" required autocomplete = "off" onkeypress="return ValidarEscritura4(event, 'num_car' , this)" minlength="6" maxlength="60" required oncopy="return false" oncut="return false" onpaste="return false" oncut="return false" onpaste="return false"/>
                        <label for="txt_contraseña_usuario">Contraseña</label>
                    </div>
                    <div class="input-field col s12 m6">
                        <i class="material-icons prefix">favorite_border</i>
                        <select id="cb_estado" name="cb_estado">
                            <option value="" disabled selected>Seleccione un estado</option>
                            <option value="1">Muerte al soplón</option>
                            <option value="2">Muerte al soplón2</option>
                            <option value="3">Muerte al soplón3</option>
                            <option value="4">Muerte al soplón4</option>
                        </select>
                        <label for="cb_estado">Estado</label>
                    </div>
                    <div class="input-field col s12 m6">
                        <i class="material-icons prefix">people</i>
                        <select id="cb_tipo" name="cb_tipo">
                            <option value="" disabled selected>Seleccione un tipo</option>
                            <option value="1">Muerte al soplón</option>
                            <option value="2">Muerte al soplón2</option>
                            <option value="3">Muerte al soplón3</option>
                            <option value="4">Muerte al soplón4</option>
                        </select>
                        <label for="cb_tipo">Tipo</label>
                    </div>
                </div>
            </div>
            <div class="row center-align">
                <a href="#" class="btn waves-effect grey tooltipped modal-close" data-tooltip="Cancelar"><i class="material-icons">cancel</i></a>
                <button type="submit" class="btn waves-effect blue tooltipped" data-tooltip="Guardar"><i class="material-icons">save</i></button>
            </div>
        </form>
    </div>
</div>

<?php
require_once('../../core/helpers/privado.php');
PaginaPrivado::footerPrivado('Usuarios');
?>