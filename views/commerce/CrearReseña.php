<!--Se invoca de la clase Commerce un método que recibe por parámetros el nombre del titulo de la página y un numero que sera el enzabezado que se desea y que imprimira la parte superior de la página-->
<?php
require_once('../../core/helpers/Comercial.php');
Commerce::headerCommerce( 'Crear reseña', 3 );
?>
<!--Se crea el encabezado de la página-->
<div class="center-align" id="CajaSlider">
    <h3 style="text-align: center;" id="h3_encabezado">Crear reseña</h3>
</div>

<!--Se crea el contenedor del contenedor de la caja que muestra todo sobre las compras-->
<div class="principal" id="CajaPrincipalMarcas2">
    <div class="row">
        <div class="col l10 offset-l1 m12 s12">
            <!--Contenedor que contiene los elementos que muestran los detalles de la compra-->
            <div class="card-panel z-depth-5 center-align CajaScrollCRESENAS" id="CajaSlider">
            </div>
        </div>
    </div>
</div>
<!--Se crea un modal para poder agregar una reseña hacerca la resena-->
<div id="save-modal" class="modal">
    <div class="modal-content">
            <h4 id="modal-title" class="center-align"></h4>
        <form method="POST" autocomplete="off" id="Form_resena" name="Form_resena" enctype="multipart/form-data" onsubmit="return validarReseñas();">
            <input class="hide" type="text" id="id_resena" name="id_resena"/>
            <div class="row">
            <div class="input-field col l6 s12 m6">
                    <i class="material-icons prefix">message</i>
                    <input id="txt_comentario" type="text" name="txt_comentario" class="validate" minlength="1" maxlength="100" onkeypress="return ValidarEscritura3(event, 'num_car2', this)" step="any" oncopy="return false" oncut="return false" onpaste="return false" oncut="return false" onpaste="return false" required/>
                    <label for="txt_comentario">Comentario</label>
                </div>
                <div class="input-field col l6 s12 m6">
                    <i class="material-icons prefix">star</i>
                    <input id="txt_calificacion" type="number" name="txt_calificacion" class="validate" min="1" max="10" onkeypress="return ValidarEscritura(event, 'num', this)" step="any" oncopy="return false" oncut="return false" onpaste="return false" oncut="return false" onpaste="return false" required/>
                    <label for="txt_calificacion">Calificacion</label>
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
Commerce::footerCommerce( 'resenaU' );
?>

