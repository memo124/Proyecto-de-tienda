<?php
require_once('../../core/helpers/Privado.php');
PaginaPrivado::headerPrivado2('Bienvenido','Privado');
?>
    <!--Caja que contiene un mensaje de bienvenida al usuario-->
    <div>
        <div class="row">
            <div class="col l10 offset-l1 m10 offset-m1 s12">
                <div class="card-panel z-depth-5 center-align" id="CajaBienvenido">
                    <h3>¡Bienvenido usuario!</h3>
                    <div class="row">
                        <div class="center-align">
                            <h4 id="Saludo"></h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--Caja que contiene la fecha y hora-->
    <div>
        <div class="row">
            <div class="col l10 offset-l1 m10 offset-m1 s12">
                <div id="CajaReloj" class="card-panel z-depth-5 center-align">
                    <div class="row">
                        <div class="col l8 offset-l3 m11 offset-m2 s11 offset-s2">
                            <div class="row tiempo">
                                <div class="fecha">
                                    <p id="diaSemana" class="diaSemana"></p>
                                    <p id="dia" class="dia"></p>
                                    <p>de </p>
                                    <p id="mes" class="mes"></p>
                                    <p>del </p>
                                    <p id="año" class="año"></p>
                                </div>  
                                <div class="reloj">
                                    <p id="horas" class="horas"></p>
                                    <p>:</p>
                                    <p id="minutos" class="minutos"></p>
                                    <p>:</p>
                                    <div class="caja_segundos">
                                        <p id="ampm" class="ampm"></p>
                                        <p id="segundos" class="segundos"></p>
                                    </div>
                                </div>                       
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--Caja que contiene los gráficos del sitio privado-->
    <div>
        <div class="row">
            <div class="col l10 offset-l1 m10 offset-m1 s12">
                <div class="card-panel z-depth-5 center-align" id="CajaGraficos">
                    <div class="row">
                        <div class="col s12 m8 offset-m2 l6 offset-l3">
                            <h3>Gráficos</h3>
                        </div>
                    </div>
                    <div id="contenedor_graficos">
                        <!--Caja que contiene el gráfico de
                        los 7 productos más comprados-->
                        <div class="row caja_chart">
                            <div class="Graficos col l12 m12 s12">
                                <canvas id="topcompras"></canvas>
                            </div>
                        </div>
                        <!--Caja que contiene el gráfico de
                        los 7 productos menos comprados-->
                        <div class="row">
                            <div class="Graficos col l12 m12 s12">
                                <canvas id="topcompras2"></canvas>
                            </div>
                        </div>
                        <!--Caja que contiene el gráfico de
                        los 7 clientes con mas compras-->
                        <div class="row">
                            <div class="Graficos col l12 m12 s12">
                                <canvas id="comprasclientes"></canvas>
                            </div>
                        </div>
                        <!--Caja que contiene el gráfico de
                        la cantidad de pedidos según forma de pago-->
                        <div class="row">
                            <div class="Graficos col l12 m12 s12">
                                <canvas id="tipospago"></canvas>
                            </div>
                        </div>
                        <!--Caja que contiene el gráfico de
                        la cantidad de pedidos según estado de pedidos-->
                        <div class="row">
                            <div class="Graficos col l12 m12 s12">
                                <canvas id="estadopedidos"></canvas>
                            </div>
                        </div>
                        <!--Caja que contiene el gráfico de
                        la cantidad de productos según la marca-->
                        <div class="row">
                            <div class="Graficos col l12 m12 s12">
                                <canvas id="productosmarcas"></canvas>
                            </div>
                        </div>
                        <!--Caja que contiene el gráfico de
                        la cantidad de descuento según tipo de producto-->
                        <div class="row">
                            <div class="Graficos col l12 m12 s12">
                                <canvas id="descuentos"></canvas>
                            </div>
                        </div>
                        <!--Caja que contiene el gráfico de
                        la cantidad de productos según tipo de producto-->
                        <div class="row">
                            <div class="Graficos col l12 m12 s12">
                                <canvas id="cantidadtipos"></canvas>
                            </div>
                        </div>
                        <!--Caja que contiene el gráfico de
                        la cantidad de usuarios según tipo de usuario-->
                        <div class="row">
                            <div class="Graficos col l12 m12 s12">
                                <canvas id="tiposusuarios"></canvas>
                            </div>
                        </div>
                        <!--Caja que contiene el gráfico de
                        la cantidad de reseñas según calificación-->
                        <div class="row">
                            <div class="Graficos col l12 m12 s12">
                                <canvas id="calificaciones"></canvas>
                            </div>
                        </div>
                        <!--Caja que contiene el gráfico de
                        los 7 clientes con más dinero invertido en la tienda-->
                        <div class="row">
                            <div class="Graficos col l12 m12 s12">
                                <canvas id="inversiones"></canvas>
                            </div>
                        </div>
                        <!--Caja que contiene el gráfico de
                        los 5 clientes con más reseñas-->
                        <div class="row">
                            <div class="Graficos col l12 m12 s12">
                                <canvas id="resenasClientes"></canvas>
                            </div>
                        </div>
                        <!--Caja que contiene el gráfico de
                        la cantidad de compras de productos según la marca-->
                        <div class="row">
                            <div class="Graficos col l12 m12 s12">
                                <canvas id="comprasMarcas"></canvas>
                            </div>
                        </div>
                        <!--Caja que contiene el gráfico de
                        la cantidad de reseñas según estado de reseña-->
                        <div class="row">
                            <div class="Graficos col l12 m12 s12">
                                <canvas id="estadosResenas"></canvas>
                            </div>
                        </div>
                        <!--Caja que contiene el gráfico de
                        los 7 productos con más reseñas-->
                        <div class="row">
                            <div class="Graficos col l12 m12 s12">
                                <canvas id="resenasProductos"></canvas>
                            </div>
                        </div>
                        <!--Caja que contiene el gráfico de
                        los 7 productos con mejores promedios 
                        de calificaciones de sus reseñas-->
                        <div class="row">
                            <div class="Graficos col l12 m12 s12">
                                <canvas id="promedioResenas"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="../../resources/js/chart.js" type="text/javascript"></script>
<?php
require_once('../../core/helpers/privado.php');
PaginaPrivado::footerPrivado('Menu');
?>
