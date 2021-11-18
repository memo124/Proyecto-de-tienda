<?php
require_once('../../core/helpers/privado.php');
PaginaPrivado::headerPrivado('Productos','Productos');
?>

<div>
    <div class="row">
    <!-- Formulario de búsqueda -->
        <div class="col l10 offset-l1 m10 offset-m1 s12">
            <div class="card-panel z-depth-5 center-align" id="CajaEncabezado">
                <div class="row">
                    <h3>Gestión de productos</h3>
                        <div class="row">
                            <div class="col l8 offset-l2 m12 s12">
                             <!-- Botón para abrir ventana de nuevo registro -->
                                <a onclick="ModalCrear()" class="btn-medium waves-effect waves-light red btn">Agregar producto<i class="material-icons left">add</i></a>
                                <a onclick="" class="btn-medium waves-effect waves-light cyan btn" href="../../core/reports/privado/Productos.php" target="_blank">
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
                    <form method="POST" id="Buscar_productos" name="Buscar_productos" autocomplete="off" method="POST" enctype="multipart/form-data" onsubmit="return Validar_Buscar_Productos();">
                        <div class="input-field center-align col s10 m8 offset-m2 l7 offset-l2">
                            <i class="material-icons prefix">search</i>
                            <input id="txt_buscar" type="text" name="txt_buscar" minlength="1" maxlength="50" onkeypress="return ValidarEscritura2(event, 'num_car3')" autocomplete = "off"  oncopy="return false" oncut="return false" onpaste="return false" oncut="return false" onpaste="return false" required/>
                            <label for="txt_buscar" id="lbBuscar">Buscar producto</label>
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
                                <th>Producto</th>
                                <th>Precio</th>
                                <th>Cantidad</th>
                                <th>Imagen</th>
                                <th>Estado</th>
                                <th>Marca</th>
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
        <form method="POST" id="Productos" name="Productos" autocomplete="off" method="POST" enctype="multipart/form-data" onsubmit="return Validar_Productos();">
            <input class="hide" type="text" id="id_producto" name="id_producto"/>
                <div class="row">
                    <div class="input-field col s12 m6">
                        <i class="material-icons prefix">shopping</i>
                        <input id="nombre_producto" type="text" name="nombre_producto" class="validate" minlength="2" maxlength="50" onkeypress="return ValidarEscritura2(event, 'num_car3')" autocomplete = "off"  oncopy="return false" oncut="return false" onpaste="return false" oncut="return false" onpaste="return false" required/>
                        <label for="nombre_producto">Producto</label>
                    </div>
                    <div class="input-field col s12 m6">
                        <i class="material-icons prefix">attach_money</i>
                        <input id="precio_producto" type="number" name="precio_producto" class="validate" max="9999.99" min="0.01" step="any" onkeypress="return ValidarEscritura2(event, 'num')"  oncopy="return false" oncut="return false" onpaste="return false" oncut="return false" onpaste="return false" required/>
                        <label for="precio_producto">Precio de producto (US$)</label>
                    </div>
                    <div class="input-field col s12 m6">
                        <i class="material-icons prefix">inbox</i>
                        <input id="cantidad_producto" type="number" name="cantidad_producto" class="validate" max="9999" min="0" step="any" onkeypress="return ValidarEscritura(event, 'num', this)"  oncopy="return false" oncut="return false" onpaste="return false" oncut="return false" onpaste="return false" required/>
                        <label for="cantidad_producto">Cantidad de producto</label>
                    </div>
                    <div class="input-field col s12 m6">
                        <i class="material-icons prefix">shop_two</i>
                        <select id="cb_marca" name="cb_marca">
                        </select>
                        <label for="cb_marca">Marca</label>
                    </div>
                    <div class="input-field col s12 m6">
                        <i class="material-icons prefix">favorite_border</i>
                        <select id="cb_estado" name="cb_estado">
                        </select>
                        <label for="cb_estado">Estado</label>
                    </div>
                    <div class="input-field col s12 m6">
                        <i class="material-icons prefix">shop_two</i>
                        <select id="cb_tipo" name="cb_tipo">
                        </select>
                        <label for="cb_tipo">Tipo</label>
                    </div>
                    <div class="file-field input-field col l12 s12 m12">
                        <div class="btn waves-effect tooltipped" data-tooltip="Seleccione una imagen de al menos 500x500">
                            <span><i class="material-icons">image</i></span>
                            <input id="imagen_producto" type="file" name="imagen_producto" accept=".gif, .jpg, .png"/>
                        </div>
                        <div class="file-path-wrapper">
                            <input type="text" class="file-path validate" placeholder="Formatos aceptados: gif, jpg y png" onkeypress="return false"/>
                        </div>
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
PaginaPrivado::footerPrivado('Productos');
?>