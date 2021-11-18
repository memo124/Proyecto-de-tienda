<!--Se invoca de la clase Commerce un método que recibe por parámetros el nombre del titulo de la página y un numero que sera el enzabezado que se desea y que imprimira la parte superior de la página-->
<?php
require_once('../../core/helpers/Comercial.php');
Commerce::headerCommerce( 'Nuestras marcas', 1 );
?>
<!--Se crea el encabezado de la página-->
<div class="center-align" id="CajaSlider">
    <h3 style="text-align: center;" id="h3_encabezado">Nuestras marcas</h3>
</div>
<!--Se crea el contenedor del buscador de la página y de los contenedores de la información de las marcas-->
<div class="principal">
    <div class="row">
        <div class="col l10 offset-l1 m12 s12">
            <div class="card-panel z-depth-5 center-align" id="CajaSlider">
                <!--Acá se crea un fila que tiene el buscador de la página-->
                <div class="row">
                    <form method="POST" id="Buscar_marca" name="Buscar_marca" autocomplete="off" method="POST" enctype="multipart/form-data" onsubmit="return Validar_Buscar_Marcas();">
                    <div class="input-field center-align col s10 m8 offset-m2 l7 offset-l2">
                        <i class="material-icons prefix">search</i>
                        <input id="txt_buscar" type="text" name="txt_buscar" minlength="1" maxlength="50" onkeypress="return ValidarEscritura(event, 'num_car2',this)" autocomplete = "off"  oncopy="return false" oncut="return false" onpaste="return false" oncut="return false" onpaste="return false" required/>
                        <label for="txt_buscar" id="lbBuscar">Buscar marca</label>
                    </div>
                    <div class="input-field col s1 m1 l1">
                        <button type="submit" class="btn-floating btn-medium waves-effect waves-light red  tooltipped" data-tooltip="Buscar"><i class="material-icons">check</i></button>
                    </div>
                    </form>
                </div>
                <!--Acá se crea el contenedor que muestra la información de las marcas-->
                <div class="row" id="ContenedorMarcas1">
                    <!--Acá se crean cada uno de los elementos que van dentro del contenedor, muestran la información de las marcas-->
                </div>
            </div>
        </div>
    </div>
</div>
<!--Se invoca de la clase Commerce un método que recibe por parámetros el nombre del archivo JS y que imprimira la parte inferior de la página-->
<?php
require_once('../../core/helpers/Comercial.php');
Commerce::footerCommerce( 'Marcas1' );
?>

