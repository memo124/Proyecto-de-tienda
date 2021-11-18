<?php

require_once('../../core/helpers/privado.php');
PaginaPrivado::headerPrivado('Facturas','Facturas');
?>

<div>
    <div class="row">
    <!-- Formulario de búsqueda -->
        <div class="col l10 offset-l1 m10 offset-m1 s12">
            <div class="card-panel z-depth-5 center-align" id="CajaEncabezado">
                <div class="row">
                    <h3>Gestión de facturas</h3>
                        <div class="row">
                            <div class="col l8 offset-l2 m12 s12">
                             <!-- Botón para abrir ventana de nuevo registro -->
                                <a onclick="openCreateModal()" class="btn-medium waves-effect waves-light red btn">Agregar factura<i class="material-icons left">add</i></a>
                                <a onclick="" class="btn-medium waves-effect waves-light cyan btn">
                                Generar reporte<i class="material-icons left">content_paste</i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col l10 offset-l1 m10 offset-m1 s12">
            <div class="card-panel z-depth-5 center-align" id="CajaCuerpo">
                <div class="row">
                    <form id = "Buscar_factura" name = "Buscar_factura" autocomplete="off" method="POST" enctype="multipart/form-data" onsubmit="return Validar_Buscar_Factura();">
                        <div class="input-field center-align col s10 m8 offset-m2 l7 offset-l2">
                            <i class="material-icons prefix">search</i>
                            <input id="txt_buscar" type="text" name="txt_buscar" minlength="1" maxlength="50" onkeypress="return ValidarEscritura3(event, 'num_car',this)" autocomplete = "off"  oncopy="return false" oncut="return false" onpaste="return false" oncut="return false" onpaste="return false" required/>
                            <label for="txt_buscar" id="lbBuscar">Buscar factura</label>
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
                                <th>Cliente</th>
                                <th>Total de factura</th>
                                <th>Fecha</th>
                                <th>Tipo de pago</th>
                                <th>Dirección</th>
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
        <form id = "Facturas" name = "Facturas" autocomplete="off" method="POST" enctype="multipart/form-data" onsubmit="return Validar_Facturas()">
            <input class="hide" type="text" id="id_factura" name="id_factura"/>
                <div class="row">
                    <div class="input-field col s12 m6">
                        <i class="material-icons prefix">mood</i>
                        <select id="cb_cliente" name="cb_cliente">
                        </select>
                        <label for="cb_cliente">Cliente</label>
                    </div>
                    <div class="input-field col s12 m6">
                        <i class="material-icons prefix">monetization_on</i>
                        <input id="txt_total" type="number" name="txt_total" class="validate" min="0.01" max="999999.99" step="any" required onkeypress="return ValidarEscritura2(event, 'num')" autocomplete = "off"  oncopy="return false" oncut="return false" onpaste="return false" oncut="return false" onpaste="return false"/>
                        <label for="txt_total">Total de factura (US$)</label>
                    </div>
                    <div class="input-field col s12 m12 l12">
                        <i class="material-icons prefix">date_range</i>
                        <input id="txt_fecha" type="text" name="txt_fecha" class="datepicker" required onkeypress="return false" oncopy="return false" oncut="return false" onpaste="return false" oncut="return false" onpaste="return false">
                        <label for="txt_fecha">Fecha de factura</label>
                    </div>
                    <div class="input-field col s12 m6">
                        <i class="material-icons prefix">monetization_on</i>
                        <select id="cb_tipo" name="cb_tipo">
                            <option class="ok" value="0" disabled selected>Seleccione una opción</option>
                            <option class="ok" value="1">Efectivo</option>
                            <option class="ok" value="2">Tarjeta de crédito</option>
                        </select>
                    </div>
                    <div class="input-field col s12 m6">
                        <i class="material-icons prefix">location_on</i>
                        <input id="txt_direccion" type="text" name="txt_direccion" class="validate" minlength="1" maxlength="50" onkeypress="return ValidarEscritura3(event, 'car', this)" autocomplete = "off"  oncopy="return false" oncut="return false" onpaste="return false" oncut="return false" onpaste="return false" required/>
                        <label for="txt_direccion">Dirección</label>
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
<!-- Ventana para mostrar pedidos -->
<div id="ModalPedidos" class="modal" name="ModalPedidos">
    <div class="modal-content" id="CuerpoModalPedidos">
        <h4 id="modal-title2" class="center-align"></h4>
        <div class="card-panel z-depth-5 center-align" id="CajaModal">
            <h5 id="EncabezadoModalPedidos" class="center-align"></h5>
                <div class="row" id="FilaTablaPedidos">
                    <table class="responsive-table highlight striped centered"  id="TablaPedidos">
                        <thead>
                            <tr>
                                <th>Producto</th>
                                <th>Cantidad</th>
                                <th>Precio de comprados</th>
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
require_once('../../core/helpers/privado.php');
PaginaPrivado::footerPrivado('Facturas');
?>