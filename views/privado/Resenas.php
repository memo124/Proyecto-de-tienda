<?php
require_once('../../core/helpers/privado.php');
PaginaPrivado::headerPrivado('Reseñas','Resenas');
?>

<div>
    <div class="row">
        <div class="col l10 offset-l1 m10 offset-m1 s12">
            <div class="card-panel z-depth-5 center-align" id="CajaEncabezado">
                <div class="row">
                    <h3>Gestión de reseñas</h3>
                        <div class="row">
                            <div class="col l8 offset-l2 m12 s12">
                                <a onclick="" class="btn-medium waves-effect waves-light cyan btn" href="../../core/reports/privado/Resena.php" target="_blank">
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
                    <form method="POST" id="Buscar_resenas" name="Buscar_resenas" autocomplete="off" method="POST" enctype="multipart/form-data" onsubmit="return Validar_Buscar_Resenas();">
                        <div class="input-field center-align col s10 m8 offset-m2 l7 offset-l2">
                            <i class="material-icons prefix">search</i>
                            <input id="txt_buscar" type="text" name="txt_buscar" minlength="1" maxlength="100" onkeypress="return ValidarEscritura3(event, 'car', this)" autocomplete = "off"  oncopy="return false" oncut="return false" onpaste="return false" oncut="return false" onpaste="return false" required/>
                            <label for="txt_buscar" id="lbBuscar">Buscar reseña</label>
                        </div>
                        <div class="input-field col s1 m1 l1">
                        <button type="submit" class="btn-floating btn-medium waves-effect waves-light red  tooltipped" data-tooltip="Buscar"><i class="material-icons">check</i></button>
                         </div>
                    </form>
                </div>
                <div class="row" id="FilaTabla">
                    <table class="responsive-table highlight striped centered"  id="Tabla">
                        <thead>
                            <tr>
                                <th>N°</th>
                                <th>Cliente</th>
                                <th>Producto comprado</th>
                                <th>Calificación</th>
                                <th>Comentario</th>
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

    <div id="save-modal" class="modal">
    <div class="modal-content">
                <h4 id="modal-title" class="center-align"></h4>
        <form id="Resenas" name="Resenas">
            <input class="hide" type="text" id="id_resena" name="id_resena"/>
                <div class="row">
                    <div class="col s12 m10 offset-m1 l10 offset-l1 center-align">
                        <p>
                            <div class="switch">
                                <span>Estado de reseña:</span>
                                <label>
                                    <i class="material-icons">visibility_off</i>
                                    <input id="estado_resena" type="checkbox" name="estado_resena" checked/>
                                    <span class="lever"></span>
                                    <i class="material-icons">visibility</i>
                                </label>
                            </div>
                        </p>
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
PaginaPrivado::footerPrivado('Resenas');
?>