<!--Se invoca de la clase Commerce un método que recibe por parámetros el nombre del titulo de la página y un numero que sera el enzabezado que se desea y que imprimira la parte superior de la página-->
<?php
require_once('../../core/helpers/Comercial.php');
Commerce::headerCommerce( 'Mis compras', 3 );
?>
<!--Se crea el encabezado de la página-->
<div class="center-align" id="CajaSlider">
    <h3 style="text-align: center;" id="h3_encabezado">Mis compras</h3>
</div>

<!--Se crea el contenedor del contenedor de la caja que muestra todo sobre las compras-->
<div class="principal" id="CajaPrincipalMarcas2">
    <div class="row">
        <div class="col l10 offset-l1 m12 s12">
            <!--Contenedor que contiene los elementos que muestran los detalles de la compra-->
            <div class="card-panel z-depth-5 center-align CajaScrollComprasU" id="CajaSlider">
            </div>
        </div>
    </div>
</div>

<!--Se invoca de la clase Commerce un método que recibe por parámetros el nombre del archivo JS y que imprimira la parte inferior de la página-->
<?php
require_once('../../core/helpers/Comercial.php');
Commerce::footerCommerce( 'Compras' );
?>

