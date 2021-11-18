<!--Se invoca de la clase Commerce un método que recibe por parámetros el nombre del titulo de la página y un numero que sera el enzabezado que se desea y que imprimira la parte superior de la página-->
<?php
require_once('../../core/helpers/Comercial.php');
Commerce::headerCommerce( 'Sobre Nosotros', 1 );
?>
<!--Se crea el encabezado de la página-->
<div class="center-align" id="CajaSlider">
    <h3 style="text-align: center;" id="h3_encabezado">Sobre nosotros</h3>
</div>

<!--Se crea la caja principal que contiene la información de la empresa-->
<div class="ContenedorPrincipalContacto">
    <div class="principal">
        <div class="row">
            <div class="col l10 offset-l1 m12 s12">
                <div class="card-panel z-depth-5 center-align" id="CajaSlider">
                    <!--Se crea el contenedor de 
                    la caja que contiene la información de ¿Quienes somos?-->
                    <div class="Contenedor_ElementoSN">
                        <!--Se crea la caja que contiene la 
                            información de ¿Quienes somos?-->
                        <div class="ElementoSN">
                            <!--Se crea el encabezado la caja que contiene la 
                            información de ¿Quienes somos?-->
                            <div class="EncabezadoElementoSN">
                                <div>
                                    <p><h3 id="h3_encabezado">¿Quiénes somos?</h3></p>
                                    <hr class="HR_SN">
                                </div>
                            </div>
                            <!--Se crea el cuerpo la caja que contiene la 
                            información de ¿Quienes somos?-->
                            <div class="CuerpoElementoSN row">
                                <div class="col l4 m6 s12">
                                    <img src="../../resources/img/cards/UB2.png" class="responsive-img center-align z-depth-3 LOGO_CONTACTO">
                                </div>
                                <div class="col l8 m6 s12 INFO_SN">
                                    <div class="CuerpoINFO_SN">
                                        <p class="P_SN">Somos una empresa que vende 
                                        gadgets a personas que buscan sacar el mejor provecho a
                                        su automóvil.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--Se crea el contenedor de 
                    la caja que contiene la información de Misión y visión-->
                    <div class="Contenedor_ElementoSN">
                        <!--Se crea la caja que contiene la 
                            información de Misión y visión-->
                        <div class="ElementoSN">
                            <!--Se crea el encabezado la caja que contiene la 
                            información de Misión y visión-->
                            <div class="EncabezadoElementoSN">
                                <div>
                                    <p><h3 id="h3_encabezado">Misión y visión</h3></p>
                                    <hr class="HR_SN">
                                </div>
                            </div>
                            <!--Se crea el cuerpo la caja que contiene la 
                            información de Misión y visión-->
                            <div class="CuerpoElementoSN row">
                                <div class="col l4 m6 s12 SVG">
                                    <img src="../../resources/img/cards/MISION.png" class="responsive-img center-align z-depth-3 LOGO_CONTACTO">
                                </div>
                                <div class="col l8 m6 s12 INFO_SN">
                                    <div class="CuerpoINFO_SN">
                                        <p><h3 id="h3_encabezado_contacto">Misión</h3></p>
                                        <hr>
                                        <p class="P_SN2"> Somos una empresa dedicada a la compra y venta de gadgets
                                        y accesorios para carros de alta tecnología y calidad para satisfacer al 
                                        cliente de altos gustos tecnológicos.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="CuerpoElementoSN row">
                                <div class="col l8 m6 s12">
                                    <div class="CuerpoINFO_SN">
                                        <p><h3 id="h3_encabezado_contacto">visión</h3></p>
                                        <hr>
                                        <p class="P_SN2">Al año 2025 ser identificados en El Salvador por:
                                            <p class="P_SN2"><span class="SPAN_NUMERADO">1</span>Ser una de las mejores empresas que venden gadgets para automóviles que faciliten a las personas.</p>
                                            <p class="P_SN2"><span class="SPAN_NUMERADO">2</span>Ser una de las empresas con mejor prestigio en el servicio de la venta de gadgets.</p>
                                        </p>
                                    </div>
                                </div>
                                <div class="col l4 m6 s12 IMG_SN">
                                    <img src="../../resources/img/cards/VISION.png" class="responsive-img center-align z-depth-3 LOGO_CONTACTO">
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--Se crea el contenedor de 
                    la caja que contiene la información de Nuestros valores-->
                    <div class="Contenedor_ElementoSN">
                        <!--Se crea la caja que contiene la 
                            información de Nuestros valores-->
                        <div class="ElementoSN">
                            <!--Se crea el encabezado la caja que contiene la 
                            información de Nuestros valores-->
                            <div class="EncabezadoElementoSN">
                                <div>
                                    <p><h3 id="h3_encabezado">Nuestros valores</h3></p>
                                    <hr class="HR_SN">
                                </div>
                            </div>
                            <!--Se crea el cuerpo la caja que contiene la 
                            información de Nuestros valores-->
                            <div class="CuerpoElementoSN row">
                                <div class="col l4 m4 s12">
                                    <img src="../../resources/img/cards/VALORES.png" class="responsive-img center-align z-depth-3 LOGO_CONTACTO">
                                </div>
                                <div class="col l4 m4 s6 INFO_SN">
                                    <div class="CuerpoINFO_SN2">
                                        <p class="P_SN3"><span class="SPAN_NUMERADO2">1</span>Tolerancia</p>
                                        <p class="P_SN3"><span class="SPAN_NUMERADO2">2</span>Servicio</p>
                                        <p class="P_SN3"><span class="SPAN_NUMERADO2">3</span>Paciencia</p>
                                    </div>
                                </div>
                                <div class="col l4 m4 s6 INFO_SN">
                                    <div class="CuerpoINFO_SN">
                                        <p class="P_SN3"><span class="SPAN_NUMERADO2">4</span>Compromiso</p>
                                        <p class="P_SN3"><span class="SPAN_NUMERADO2">5</span>Solidaridad</p>
                                        <p class="P_SN3"><span class="SPAN_NUMERADO2">6</span>Honestidad</p>
                                        <p class="P_SN3"><span class="SPAN_NUMERADO2">7</span>Amabilidad</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--Se crea el contenedor de 
                    la caja que contiene la información de Desarrolladores-->
                    <div class="Contenedor_ElementoSN">
                        <!--Se crea la caja que contiene la 
                            información de Nuestros valores-->
                        <div class="ElementoSN">
                            <!--Se crea el encabezado la caja que contiene la 
                            información de Desarrolladores-->
                            <div class="EncabezadoElementoSN">
                                <div>
                                    <p><h3 id="h3_encabezado">Desarrolladores</h3></p>
                                    <hr class="HR_SN">
                                </div>
                            </div>
                            <!--Se crea el cuerpo la caja que contiene la 
                            información de Desarrolladores-->
                            <div class="CuerpoElementoSN row">
                                <div class="col l4 m6 s12">
                                    <img src="../../resources/img/cards/MEMO2.png" class="responsive-img center-align z-depth-3 LOGO_CONTACTO">
                                </div>
                                <div class="col l8 m6 s12 INFO_SN">
                                    <div class="CuerpoINFO_SN">
                                        <p><h3 id="h3_encabezado_contacto">Guillermo Andrés Minero Alfaro</h3></p>
                                        <hr>
                                        <p class="P_SN">
                                            Cargos:
                                            <p class="P_SN2"><span class="SPAN_NUMERADO">1</span>Front-End Developer</p>
                                            <p class="P_SN2"><span class="SPAN_NUMERADO">2</span>Back-End Developer</p> 
                                            <p class="P_SN2"><span class="SPAN_NUMERADO">3</span>Database Administrator</p>
                                            <p class="P_SN2"><span class="SPAN_NUMERADO">4</span>Data Scientist</p>
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="CuerpoElementoSN row">
                                <div class="col l8 m6 s12 INFO_SN">
                                    <div class="CuerpoINFO_SN">
                                        <p><h3 id="h3_encabezado_contacto">Wilmer David Carrillo Ortega</h3></p>
                                        <hr>
                                        <p class="P_SN">
                                            Cargos:
                                            <p class="P_SN2"><span class="SPAN_NUMERADO">1</span>Front-End Developer</p>
                                            <p class="P_SN2"><span class="SPAN_NUMERADO">2</span>Back-End Developer</p> 
                                            <p class="P_SN2"><span class="SPAN_NUMERADO">3</span>Database Administrator</p>
                                            <p class="P_SN2"><span class="SPAN_NUMERADO">4</span>Data Scientist</p>
                                        </p>
                                    </div>
                                </div>
                                <div class="col l4 m6 s12">
                                    <img src="../../resources/img/cards/WIL.png" class="responsive-img center-align z-depth-3 LOGO_CONTACTO">
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--Se crea el contenedor de 
                    la caja que contiene la información de Desarrolladores-->
                    <div class="Contenedor_ElementoSN">
                        <!--Se crea la caja que contiene la 
                            información de Nuestros valores-->
                        <div class="ElementoSN">
                            <!--Se crea el encabezado la caja que contiene la 
                            información de Desarrolladores-->
                            <div class="EncabezadoElementoSN">
                                <div>
                                    <p><h3 id="h3_encabezado">Nuestra ubicación</h3></p>
                                    <hr class="HR_SN">
                                </div>
                            </div>
                            <!--Se crea el cuerpo la caja que contiene la 
                            información de Desarrolladores-->
                            <div class="CuerpoElementoSN row">
                                <div class="col l6 m7 s12">
                                    <div id="wrapper-9cd199b9cc5410cd3b1ad21cab2e54d3">
                                        <div id="map-9cd199b9cc5410cd3b1ad21cab2e54d3"></div><script>(function () {
                                        var setting = {"height":560,"width":896,"zoom":17,"queryString":"Auto Hotel El Castillo, 5a Avenida Norte, San Salvador, El Salvador","place_id":"ChIJD7YurpkwY48R-WX88465_3g","satellite":false,"centerCoord":[13.717800676369865,-89.19018514046022],"cid":"0x78ffb98ef3fc65f9","lang":"es","cityUrl":"/el-salvador/san-salvador-5390","cityAnchorText":"Mapa de San Salvador, Ahuachapan Department, El Salvador","id":"map-9cd199b9cc5410cd3b1ad21cab2e54d3","embed_id":"229105"};
                                        var d = document;
                                        var s = d.createElement('script');
                                        s.src = 'https://1map.com/js/script-for-user.js?embed_id=229105';
                                        s.async = true;
                                        s.onload = function (e) {
                                          window.OneMap.initMap(setting)
                                        };
                                        var to = d.getElementsByTagName('script')[0];
                                        to.parentNode.insertBefore(s, to);
                                      })();</script><a href="https://1map.com/es/map-embed">1 Map</a>
                                    </div>
                                </div>
                                <div class="col l6 m5 s12 INFO_SN">
                                    <div class="CuerpoINFO_SN">
                                        <p><h3 id="h3_encabezado_contacto">Dirección</h3></p>
                                        <hr>
                                        <p class="P_SN">
                                            Auto Hotel El Castillo, 5a Avenida Norte, San Salvador, El Salvador
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!--Se invoca de la clase Commerce un método que recibe por parámetros el nombre del archivo JS y que imprimira la parte inferior de la página-->
<?php
require_once('../../core/helpers/Comercial.php');
Commerce::footerCommerce( 'Nosotros' );
?>

