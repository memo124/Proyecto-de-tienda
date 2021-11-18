<?php
require_once('../../core/helpers/privado.php');
PaginaPrivado::headerPrivado('Marcas','Marcas');
?>

    <div>
        <div class="row">
    <!-- Formulario de búsqueda -->
            <div class="col l10 offset-l1 m10 offset-m1 s12">
                <div class="card-panel z-depth-5 center-align" id="CajaEncabezado">
                    <div class="row">
                        <h3>Gestión de marcas</h3>
                        <div class="row">
                            <div class="col l8 offset-l2 m12 s12">
                             <!-- Botón para abrir ventana de nuevo registro -->
                                <a onclick="openCreateModal()" class="btn-medium waves-effect waves-light red btn">
                                Agregar marca<i class="material-icons left">add</i></a>
                                <a onclick="" class="btn-medium waves-effect waves-light cyan btn" href="../../core/reports/privado/MarcasProductos.php" target="_blank">
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
                <div class="row" id="FilaTabla">
                <!-- Tabla para mostrar los registros existentes -->
                    <table class="responsive-table highlight striped centered"  id="Tabla">
                        <thead>
                            <tr>
                                <th>Imagen</th>
                                <th>N°</th>
                                <th>Marca</th>
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
        <form method="POST" id="Marcas" name="Marcas" autocomplete="off" method="POST" enctype="multipart/form-data" onsubmit="return Validar_Marcas();">
            <input class="hide" type="text" id="id_marca" name="id_marca"/>
            <div class="row">
                <div class="input-field col s12 m6">
                    <i class="material-icons prefix">shopping</i>
                    <input id="txt_marca" type="text" name="txt_marca" class="validate" minlength="2" maxlength="50" onkeypress="return ValidarEscritura(event, 'num_car2', this)" autocomplete = "off"  oncopy="return false" oncut="return false" onpaste="return false" oncut="return false" onpaste="return false" required/>
                    <label for="txt_marca">Marca</label>
                </div>
                <div class="file-field input-field col s12 m6">
                    <div class="btn waves-effect tooltipped" data-tooltip="Seleccione una imagen de al menos 700x700">
                        <span><i class="material-icons">image</i></span>
                        <input id="imagen_marca" type="file" name="imagen_marca" accept=".gif, .jpg, .png"/>
                    </div>
                    <div class="file-path-wrapper">
                        <input type="text" class="file-path validate" placeholder="Formatos aceptados: gif, jpg y png" onkeypress="return false"/>
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
PaginaPrivado::footerPrivado('Marcas');
?>