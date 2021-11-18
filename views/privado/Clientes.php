<?php
require_once('../../core/helpers/Privado.php');
PaginaPrivado::headerPrivado('Clientes','Clientes');
?>
    <div>
        <div class="row">
        <!-- Formulario de búsqueda -->
            <div class="col l10 offset-l1 m10 offset-m1 s12">
                <div class="card-panel z-depth-5 center-align" id="CajaEncabezado">
                    <div class="row">
                        <h3>Gestión de clientes</h3>
                        <div class="row">
                            <div class="col l8 offset-l2 m12 s12">
                             <!-- Botón para abrir ventana de nuevo registro -->
                                <a onclick="openCreateModal()" class="btn-medium waves-effect waves-light red btn">
                                Agregar cliente<i class="material-icons left">add</i></a>
                                <a onclick="" class="btn-medium waves-effect waves-light cyan btn"  href="../../core/reports/privado/Clientes.php" target="_blank">
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
                    <form action="" method="POST" id = "Buscar_cliente" name = "Buscar_cliente" onsubmit="return Validar_Buscar_Cliente();" autocomplete="off" enctype="multipart/form-data">
                        <div class="input-field center-align col s10 m8 offset-m2 l7 offset-l2">
                            <i class="material-icons prefix">search</i>
                            <input id="txt_buscar" type="text" name="txt_buscar" autocomplete = "off" onkeypress="return ValidarEscritura2(event, 'num_car2')" minlength="1" maxlength="100" oncopy="return false" oncut="return false" onpaste="return false" oncut="return false" onpaste="return false" required/>
                            <label for="txt_buscar" id="lbBuscar">Buscar cliente</label>
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
        <form action="" method="POST" autocomplete="off" id="Form_clientes" name="Form_clientes"  onsubmit="return Validar_Clientes();" enctype="multipart/form-data">
            <input class="hide" type="text" id="id_cliente" name="id_cliente" />
            <div class="row">
                <div class="input-field col s12 m6">
                    <i class="material-icons prefix">person</i>
                    <input id="txt_nombres_cliente" type="text" name="txt_nombres_cliente" class="validate" autocomplete = "off" onkeypress="return ValidarEscritura3(event, 'car', this)" minlength="2" maxlength="50" required oncopy="return false" oncut="return false" onpaste="return false" oncut="return false" onpaste="return false" required />
                    <label for="txt_nombres_cliente">Nombres</label>
                </div>
                <div class="input-field col s12 m6">
                    <i class="material-icons prefix">person</i>
                    <input id="txt_apellidos_cliente" type="text" name="txt_apellidos_cliente" class="validate" autocomplete = "off" onkeypress="return ValidarEscritura3(event, 'car', this)" minlength="2" maxlength="50" required oncopy="return false" oncut="return false" onpaste="return false" oncut="return false" onpaste="return false" required />
                    <label for="txt_apellidos_cliente">Apellidos</label>
                </div>
                <div class="input-field col s12 m6">
                    <i class="material-icons prefix">contact_mail</i>
                    <input id="txt_correo_cliente" type="email" name="txt_correo_cliente" class="validate" required autocomplete = "off" onkeypress="return ValidarEscritura2(event, 'num_car', this)" minlength="15" maxlength="100" required oncopy="return false" oncut="return false" onpaste="return false" oncut="return false" onpaste="return false"/>
                    <label for="txt_correo_cliente">Correo</label>
                </div>
                <div class="input-field col s12 m6">
                    <i class="material-icons prefix">account_circle</i>
                    <input id="txt_usuario_cliente" type="text" name="txt_usuario_cliente" class="validate" required autocomplete = "off" onkeypress="return ValidarEscritura(event, 'num_car', this)" minlength="8" maxlength="30" required oncopy="return false" oncut="return false" onpaste="return false" oncut="return false" onpaste="return false"/>
                    <label for="txt_usuario_cliente">Usuario</label>
                </div>
              	<div class="input-field col s12 m6">
                    <i class="material-icons prefix">lock</i>
                    <input id="txt_contraseña_cliente" type="password" name="txt_contraseña_cliente" class="validate" required autocomplete = "off" onkeypress="return ValidarEscritura4(event, 'num_car' , this)" minlength="6" maxlength="60" required oncopy="return false" oncut="return false" onpaste="return false" oncut="return false" onpaste="return false"/>
                    <label for="txt_contraseña_cliente">Contraseña</label>
                </div>
                <div class="input-field col s12 m6">
                    <i class="material-icons prefix">favorite_border</i>
                    <select id="cb_estado_cliente" name="cb_estado_cliente">
                    </select>
                    <label for="cb_estado_cliente">Estado</label>
                </div>
            </div>
            <div class="row center-align">
                <a href="#" class="btn waves-effect grey tooltipped modal-close" data-tooltip="Cancelar"><i class="material-icons">cancel</i></a>
                <button type="submit" class="btn waves-effect blue tooltipped" data-tooltip="Guardar"><i class="material-icons">save</i></button>
            </div>
        </form>
    </div>
</div>

<div id="ModalPedidos" class="modal" name="ModalPedidos">
    <div class="modal-content" id="CuerpoModalPedidos">
        <h4 id="modal-title2" class="center-align"></h4>
        <div class="card-panel z-depth-5 center-align" id="CajaModal">
            <h5 id="EncabezadoModalPedidos" class="center-align"></h5>
                <div class="row" id="FilaTablaPedidos">
                <!-- Tabla para ver los pedidos de un cliente -->
                    <table class="responsive-table highlight striped centered"  id="TablaPedidos">
                        <thead>
                            <tr>
                                <th>Fecha</th>
                                <th>Dirección</th>
                                <th>Producto</th>
                                <th>Cantidad</th>
                                <th>Total a pagar</th>
                                <th>Forma de pago</th>
                            </tr>
                        </thead>
                        <tbody id="CuerpoTablaPedidos">              
                        </tbody>
                    </table>
                </div>
         </div>
    </div>
    <div class="modal-footer">
    <a class="modal-close btn-medium waves-effect waves-light red btn">Cerrar<i class="material-icons left">close</i></a>
    </div>
</div>

<?php
require_once('../../core/helpers/Privado.php');
PaginaPrivado::footerPrivado('Clientes');
?>