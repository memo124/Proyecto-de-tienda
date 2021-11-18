<!--Se invoca de la clase Commerce un método que recibe por parámetros el nombre del titulo de la página y un numero que sera el enzabezado que se desea y que imprimira la parte superior de la página-->
<?php
require_once('../../core/helpers/Comercial.php');
Commerce::headerCommerce( 'Nuestros Contactos', 3 );
?>
<!--Se crea el encabezado de la página-->
<div class="center-align" id="CajaSlider">
    <h3 style="text-align: center;" id="h3_encabezado">Nuestros contactos</h3>
</div>

<!--Se crea la caja que contiene la información de los contactos-->
<div class="ContenedorPrincipalContacto">
    <div class="principal">
        <div class="row">
            <div class="col l10 offset-l1 m12 s12">
                <div class="card-panel z-depth-5 center-align" id="CajaSlider">
                    <!--Se crean cada uno de los elementos que contienen la información-->
                    <div class="CajaC row">
                        <div class="IMG_CONTACTO col l6 m6 s6">
                            <img src="../../resources/img/cards/FB_LOGO.png" class="responsive-img center-align z-depth-3 LOGO_CONTACTO">
                        </div>
                        <div class="INFO_CONTACTO col l6 m6 s6">
                            <p><h3 id="h3_encabezado_contacto"><span class="SPAN_TITULO_CONTACTO">1</span>Facebook</h3></p>
                            <hr>
                            <p class="P_INFO_CONTACTO">Perfil: Simplex Cars</p>
                        </div>
                    </div>
                    <div class="CajaC row">
                        <div class="INFO_CONTACTO col l6 m6 s6">
                            <p><h3 id="h3_encabezado_contacto"><span class="SPAN_TITULO_CONTACTO">2</span>Gmail</h3></p>
                            <hr>
                            <p class="P_INFO_CONTACTO">Correo: SimplexCars@gmail.com</p>
                        </div>
                        <div class="IMG_CONTACTO col l6 m6 s6">
                            <img src="../../resources/img/cards/GMAIL_LOGO.jpg" class="responsive-img center-align z-depth-3 LOGO_CONTACTO">
                        </div>
                    </div>
                    <div class="CajaC row">
                        <div class="IMG_CONTACTO col l6 m6 s6">
                        <img src="../../resources/img/cards/INSTA_LOGO.png" class="responsive-img center-align z-depth-3 LOGO_CONTACTO">
                        </div>
                        <div class="INFO_CONTACTO col l6 m6 s6">
                            <p><h3 id="h3_encabezado_contacto"><span class="SPAN_TITULO_CONTACTO">3</span>Instagram</h3></p>
                            <hr>
                            <p class="P_INFO_CONTACTO">Perfil: Simplex_Cars</p>
                        </div>
                    </div>
                    <div class="CajaC row">
                        <div class="INFO_CONTACTO col l6 m6 s6">
                            <p><h3 id="h3_encabezado_contacto"><span class="SPAN_TITULO_CONTACTO">4</span>Snapchat</h3></p>
                            <hr>
                            <p class="P_INFO_CONTACTO">Perfil: Simplex_Cars</p>
                        </div>
                        <div class="IMG_CONTACTO col l6 m6 s6">
                            <img src="../../resources/img/cards/SN_LOGO2.png" class="responsive-img center-align LOGO_CONTACTO2">
                        </div>
                    </div>
                    <div class="CajaC row">
                        <div class="IMG_CONTACTO col l6 m6 s6">
                        <img src="../../resources/img/cards/TW_LOGO2png.JPG" class="responsive-img center-align z-depth-3 LOGO_CONTACTO">
                        </div>
                        <div class="INFO_CONTACTO col l6 m6 s6">
                            <p><h3 id="h3_encabezado_contacto"><span class="SPAN_TITULO_CONTACTO">5</span>Twitter</h3></p>
                            <hr>
                            <p class="P_INFO_CONTACTO">Perfil: @Simplex_Cars</p>
                        </div>
                    </div>
                    <div class="CajaC row">
                        <div class="INFO_CONTACTO col l6 m6 s6">
                            <p><h3 id="h3_encabezado_contacto"><span class="SPAN_TITULO_CONTACTO">6</span>WhatsApp</h3></p>
                            <hr>
                            <p class="P_INFO_CONTACTO">Teléfono: +503 2257-7777</p>
                        </div>
                        <div class="IMG_CONTACTO col l6 m6 s6">
                            <img src="../../resources/img/cards/WA_LOGO.png" class="responsive-img center-align z-depth-3 LOGO_CONTACTO">
                        </div>
                    </div>
                    <div class="CajaC row">
                        <div class="IMG_CONTACTO col l6 m6 s6">
                        <img src="../../resources/img/cards/YT_LOGO.jpg" class="responsive-img center-align z-depth-3 LOGO_CONTACTO">
                        </div>
                        <div class="INFO_CONTACTO col l6 m6 s6">
                            <p><h3 id="h3_encabezado_contacto"><span class="SPAN_TITULO_CONTACTO">7</span>YouTube</h3></p>
                            <hr>
                            <p class="P_INFO_CONTACTO">Canal: Simplex Cars</p>
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
Commerce::footerCommerce( 'Contactos' );
?>

