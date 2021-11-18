<!--Se invoca de la clase Commerce un método que recibe por parámetros el nombre del titulo de la página y un numero que sera el enzabezado que se desea y que imprimira la parte superior de la página-->
<?php
require_once('../../core/helpers/Comercial.php');
Commerce::headerCommerce( 'Carrito de compras', 3 );
?>

<!--Se crea el contenedor del contenedor de la caja que muestra todo sobre las compras-->
<div class="principal" id="CajaPrincipalMarcas2">
    <div class="row">
        <div class="col l10 offset-l1 m12 s12">
            <!--Contenedor que contiene los elementos que muestran los detalles de la compra-->
            <div class="card-panel z-depth-5 center-align" id="CajaSlider">
                <!--Caja que contiene los elementos que muestran los detalles de la compra-->
                <div class="row elemento_marca1">
                    <div class="col l12 m10 offset-m1 s12">
                        <h3 style="text-align: center;" id="h3_encabezado_contacto">Detalles de la compra</h3>
                        <div class="row" id="FilaTabla">
                        <input id="txt_tt" type="text" name="txt_tt" class="hide"/>
                            <!-- Tabla para mostrar los registros de la compra-->
                            <table class="responsive-table highlight striped centered Tabla2">
                                <thead>
                                    <tr>
                                        <th>Producto</th>
                                        <th>Precio (USD$)</th>
                                        <th>Descuento</th>
                                        <th>Cantidad</th>
                                        <th>Subtotal (USD$)</th>
                                        <th>Acción</th>
                                    </tr>
                                </thead>
                                <tbody class="CuerpoTabla2">
                                </tbody>
                                </table>
                        </div>
                    </div>
                    <div class="col l12 m10 offset-m1 s12 contenedor_info_marca1">
                            <div class="col l6 m12 s12">
                                <p class="info_marca1" id="TotalPago"></p>
                            </div>
                            <div class="col l6 m12 s12">
                                <p class="info_marca1"><i></i></p>
                                <a onclick="AbrirModalFactura()" class="btn-medium waves-effect waves-light red btn">Finalizar compra</a>
                                <p class="info_marca1"><i></i></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!--Se crea la ventana para dar detalles de la cantidad de producto al momento de comprar,
y obtener precios segun la cantidad de producto a comprar con descuento aplicado-->
<div id="save-modal" class="modal">
    <div class="modal-content">
            <h4 id="modal-title" class="center-align"></h4>
        <form method="POST" autocomplete="off" id="Form_compra" name="Form_compra" enctype="multipart/form-data" onsubmit="return validarCompras();">
            <input class="hide" type="text" id="id_productos" name="id_productos"/>
            <input class="hide" type="text" id="id_detalle" name="id_detalle"/>
            <input class="hide" type="text" id="precio" name="precio"/>
            <input class="hide" type="text" id="cantidad" name="cantidad"/>
            <div class="row">
                <div class="input-field col l6 s12 m6">
                    <i class="material-icons prefix">monetization_on</i>
                    <input id="txt_precio" name="txt_precio" type="text" class="validate" autocomplete = "off" onkeypress="return false" oncopy="return false" oncut="return false" onpaste="return false" oncut="return false" onpaste="return false"/>
                </div>
                <div class="input-field col l6 s12 m6">
                    <i id="icono_promocion" name="icono_promocion" class="material-icons prefix">card_giftcard</i>
                    <input id="txt_promocion" name="txt_promocion" type="text" class="validate" autocomplete = "off" onkeypress="return false" oncopy="return false" oncut="return false" onpaste="return false" oncut="return false" onpaste="return false"/>
                </div>
                <div class="input-field col l6 s12 m6">
                    <i class="material-icons prefix">shopping_cart</i>
                    <input id="txt_cantidad" type="number" name="txt_cantidad" onkeypress="return ValidarEscritura(event, 'num', this)" class="validate" min="1" step="any" oncopy="return false" oncut="return false" onpaste="return false" oncut="return false" onpaste="return false" required/>
                    <label for="txt_cantidad">Cantidad</label>
                </div>
            </div>
            <div class="row center-align">
                <a href="#" class="btn waves-effect grey tooltipped modal-close" data-tooltip="Cancelar"><i class="material-icons">cancel</i></a>
                <button type="submit" class="btn waves-effect blue tooltipped" data-tooltip="Guardar"><i class="material-icons">save</i></button>
            </div>
        </form>
    </div>
</div>

<!--Se crea la ventana que contiene un formulario para dar detalles finales de un pedido-->
<div id="save-modal2" class="modal">
    <div class="modal-content">
            <h4 id="modal-title2" class="center-align"></h4>
        <form method="POST" autocomplete="off" id="Form_factura" name="Form_factura" enctype="multipart/form-data" onsubmit="return validarFinalizarPedido();">
            <div class="row">
                <div class="input-field col s12 m12 l12">
                    <input id="txt_fecha" type="text" name="txt_fecha" class="hide" required onkeypress="return false" oncopy="return false" oncut="return false" onpaste="return false" oncut="return false" onpaste="return false">
                </div>
                <input id="txt_tt2" type="text" name="txt_tt2" class="hide"/>
                <div class="input-field col s12 m6">
                    <i class="material-icons prefix">location_on</i>
                    <input id="txt_direccion" type="text" name="txt_direccion" class="validate" minlength="15" maxlength="200" onkeypress="return ValidarEscritura3(event, 'num_car2', this)" autocomplete = "off"  oncopy="return false" oncut="return false" onpaste="return false" oncut="return false" onpaste="return false" required/>
                    <label for="txt_direccion">Dirección de envío</label>
                </div>
                <div class="input-field col s12 m6">
                    <i class="material-icons prefix">monetization_on</i>
                    <select id="cb_tipo" name="cb_tipo">
                        <option class="ok" value="0" disabled selected>Seleccione una opción</option>
                        <option class="ok" value="1">Efectivo</option>
                        <option class="ok" value="2">Tarjeta de crédito</option>
                    </select>
                    <label for="cb_tipo">Forma de pago</label>
                </div>
            </div>
            <div class="row center-align">
                <a href="#" class="btn waves-effect grey tooltipped modal-close" data-tooltip="Cancelar"><i class="material-icons">cancel</i></a>
                <button type="submit" class="btn waves-effect blue tooltipped" data-tooltip="Guardar"><i class="material-icons">save</i></button>
            </div>
        </form>
    </div>
</div>

<!--Se invoca de la clase Commerce un método que recibe por parámetros el nombre del archivo JS y que imprimira la parte inferior de la página-->
<?php
require_once('../../core/helpers/Comercial.php');
Commerce::footerCommerce( 'Carrito' );
?>

