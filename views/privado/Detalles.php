<?php
require_once('../../core/helpers/privado.php');
PaginaPrivado::headerPrivado('Detalles de facturas', 'Detalles');
?>

<div>
    <div class="row">
        <!-- Formulario de búsqueda -->
        <div class="col l10 offset-l1 m10 offset-m1 s12">
            <div class="card-panel z-depth-5 center-align" id="CajaEncabezado">
                <div class="row">
                    <h3>Gestión de detalles de facturas</h3>
                        <div class="row">
                            <div class="col l8 offset-l2 m12 s12">
                             <!-- Botón para abrir ventana de nuevo registro -->
                                <a onclick="ModalCrear()" class="btn-medium waves-effect waves-light red btn">Agregar detalle<i class="material-icons left">add</i></a>
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
                    <form action="" id="Buscar_Detalle" name="Buscar_Detalle" autocomplete="off" method="POST" enctype="multipart/form-data" onsubmit="return Validar_Buscar_Detalle();">
                        <div class="input-field center-align col s10 m8 offset-m2 l7 offset-l2">
                            <i class="material-icons prefix">search</i>
                            <input id="txt_buscar" type="text" name="txt_buscar" autocomplete="off" onkeypress="return ValidarEscritura2(event, 'num_car3')" minlength="1" maxlength="50" oncopy="return false" oncut="return false" onpaste="return false" oncut="return false" onpaste="return false" required/>
                            <label for="txt_buscar" id="lbBuscar">Buscar detalle de factura</label>
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
                                <th>Factura</th>
                                <th>Precio de comprados</th>
                                <th>Cantidad de comprados</th>
                                <th>Producto</th>
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
        <form action=""  id="Detalles_Facturas" name="Detalles_Facturas" method="POST" autocomplete="off" onsubmit="return Validar_Detalles();" enctype="multipart/form-data">
            <input class="hide" type="text" id="id_detalle" name="id_detalle"/>
                <div class="row">
                    <div class="input-field col s12 m6">
                        <i class="material-icons prefix">monetization_on</i>
                        <input id="txt_factura" type="number" name="txt_factura" class="validate"  min="1" max="999999" step="any" onkeypress="return ValidarEscritura(event, 'num',this)"  oncopy="return false" oncut="return false" onpaste="return false" oncut="return false" onpaste="return false" required/>
                        <label for="txt_factura">Factura</label>
                    </div>
                    <div class="input-field col s12 m6">
                        <i class="material-icons prefix">attach_money</i>
                        <input id="txt_precio_comprados" type="number" name="txt_precio_comprados" class="validate"  min="0.01" max="999999.99" step="any" onkeypress="return ValidarEscritura2(event, 'num')"  oncopy="return false" oncut="return false" onpaste="return false" oncut="return false" onpaste="return false" required/>
                        <label for="txt_precio_comprados">Precio de comprados (US$)</label>
                    </div>
                    <div class="input-field col s12 m6">
                        <i class="material-icons prefix">shopping_cart</i>
                        <input id="txt_cantidad_comprados" type="number" name="txt_cantidad_comprados" class="validate"  min="1" max="100" step="any" onkeypress="return ValidarEscritura(event, 'num', this)"  oncopy="return false" oncut="return false" onpaste="return false" oncut="return false" onpaste="return false" required/>
                        <label for="txt_cantidad_comprados">Cantidad de comprados</label>
                    </div>
                    <div class="input-field col s12 m6">
                        <i class="material-icons prefix">shopping</i>
                        <select id="cb_producto" name="cb_producto">
                        </select>
                        <label for="cb_producto">Producto</label>
                    </div>
                </div>
            </div>
            <div class="row center-align">
                <a href="#" class="btn waves-effect grey tooltipped modal-close" data-tooltip="Cancelar"><i class="material-icons">cancel</i></a>
                <button type="submit" class="btn waves-effect blue tooltipped" data-tooltip="Guardar"><i class="material-icons">save</i></button>
            </div>
        </form>
    </div>
</div>-->


<?php
require_once('../../core/helpers/privado.php');
PaginaPrivado::footerPrivado('Detalles');
?>