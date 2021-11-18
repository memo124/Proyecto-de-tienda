<!--Se invoca de la clase Commerce un método que recibe por parámetros el nombre del titulo de la página y un numero que sera el enzabezado que se desea y que imprimira la parte superior de la página-->
<?php
require_once('../../core/helpers/Comercial.php');
Commerce::headerCommerce( 'Productos por tipos', 1 );
?>
<!--Se crea el encabezado de la página-->
<div class="center-align" id="CajaSlider">
    <h3 style="text-align: center;" id="h3_encabezado">Productos por tipos</h3>
</div>

<!--Se crea el contenedor del carrusel de productos por tipo de la página-->
<div class="principal" id="CajaPrincipalMarcas2">
    <div class="row">
        <div class="col l12 m12 s12">
            <div class="card-panel z-depth-5 center-align CajaScrollProductos2" id="CajaSlider">
            </div>
        </div>
    </div>
</div>

<!--Se invoca de la clase Commerce un método que recibe por parámetros el nombre del archivo JS y que imprimira la parte inferior de la página-->
<?php
require_once('../../core/helpers/Comercial.php');
Commerce::footerCommerce( 'Productos2' );
?>

