<?php
class Page {
    public static function headerTemplate($title) {
        print('
        <!doctype html>
        <html lang="es">
        <head>
            <!-- Conjunto de caracteres -->
            <meta charset="utf-8">
            <!-- Indica al navegador que la página web está optimizada para dispositivos móviles -->
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <!-- Título del documento -->
            <title>'.$title.'</title>
            <!-- Importación de archivos tipo CSS -->
            <link rel="stylesheet" href="../../resources/css/materialize.min.css" type="text/css">
            <link rel="stylesheet" href="../../resources/css/material-icons.css" type="text/css">
            <link rel="stylesheet" href="../../resources/css/style.css" type="text/css">
            <!-- Llamada a un archivo tipo icono -->
            <link rel="shortcut icon" href="img/logo.png" type="image/png">
        </head>
        <body>
            <header>
                <nav class="red">
                    <div class="nav-wrapper">
                        <a href="index.php" class="brand-logo"><img src="../../resources/img/logo.png" height="65"></a>
                        <a href="#" data-target="mobile-demo" class="sidenav-trigger"><i class="material-icons">menu</i></a>
                        <ul class="right hide-on-med-and-down" id="nav-mobile" class="right hide-on-med-and-down">
                            <li>
                            <form>
                                <div class="input-field">
                                <input id="search" type="search" required>
                                <label class="label-icon" for="search"><i class="material-icons">search</i></label>
                                <i class="material-icons">close</i>
                                </div>
                            </form>
                            </li>
                            <li><a href="cards.php">Tarjetas</a></li>
                            <li><a href="carousel.php"><img src="../../resources/img/icons/carrito.png"></a></li>
                            <li><a href="collapsible.php">Plegable</a></li>
                        </ul>
                    </div>
                </nav>
                
                <ul class="sidenav" id="mobile-demo">
                    <li><a href="cards.php">Tarjetas</a></li>
                    <li><a href="carousel.php">Carrusel</a></li>
                    <li><a href="collapsible.php">Plegable</a></li>
                </ul>
            </header>
    
            <main>
                <h2>'.$title.'</h2>
        ');   
    }

    public function asideTemplate(){
        print('<aside>
            <div class="row" id="tipo">
                <div class="col s12 m6 l3">
                    <ul class="collection ">
                        <li class="collection-item">Objeto1</li>
                        <li class="collection-item">Objeto2</li>
                        <li class="collection-item">Objeto3</li>
                        <li class="collection-item">Objeto4</li>
                        <li class="collection-item">Objeto5</li>
                        <li class="collection-item">Objeto6</li>
                        <li class="collection-item">Objeto7</li>
                        <li class="collection-item">Objeto8</li>
                        <li class="collection-item">Objeto9</li>
                    </ul>
                </div>
                <div class="col s12 m6 l3">
                <div class="card">
                    <div class="card-image waves-effect waves-block waves-light">
                        <img class="activator" src="../../resources/img/cards/image02.jpg">
                    </div>
                    <div class="card-content">
                        <span class="card-title activator grey-text text-darken-4">Card Title<i class="material-icons right">more_vert</i></span>
                        <p><a href="#">This is a link</a></p>
                    </div>
                        <div class="card-reveal">
                        <span class="card-title grey-text text-darken-4">Card Title<i class="material-icons right">close</i></span>
                        <p>Here is some more information about this product that is only revealed once clicked on.</p>
                    </div>
                </div>
            </div>
            <div class="col s12 m6 l3">
                <div class="card">
                    <div class="card-image waves-effect waves-block waves-light">
                        <img class="activator" src="../../resources/img/cards/image03.jpg">
                    </div>
                    <div class="card-content">
                        <span class="card-title activator grey-text text-darken-4">Card Title<i class="material-icons right">more_vert</i></span>
                        <p><a href="#">This is a link</a></p>
                    </div>
                    <div class="card-reveal">
                        <span class="card-title grey-text text-darken-4">Card Title<i class="material-icons right">close</i></span>
                        <p>Here is some more information about this product that is only revealed once clicked on.</p>
                    </div>
                </div>
            </div>
            <div class="col s12 m6 l3">
                <div class="card">
                    <div class="card-image waves-effect waves-block waves-light">
                        <img class="activator" src="../../resources/img/cards/image04.jpg">
                    </div>
                    <div class="card-content">
                        <span class="card-title activator grey-text text-darken-4">Card Title<i class="material-icons right">more_vert</i></span>
                        <p><a href="#">This is a link</a></p>
                    </div>
                    <div class="card-reveal">
                        <span class="card-title grey-text text-darken-4">Card Title<i class="material-icons right">close</i></span>
                        <p>Here is some more information about this product that is only revealed once clicked on.</p>
                    </div>
                </div>
            </div>
            </div>
            <div class="row">
            </div>
        </aside>

        <section>
        
        </section>
        ');
    }

    public function footerTemplate() {
        print('
            </main>
                <footer class="page-footer red">
                <div class="container">
                    <div class="row">
                        <div class="col l6 s12">
                            <h5 class="white-text">Footer Content</h5>
                            <p class="grey-text text-lighten-4">You can use rows and columns here to organize your footer content.</p>
                        </div>
                        <div class="col l4 offset-l2 s12">
                            <h5 class="white-text">Links</h5>
                            <ul>
                                <li><a class="grey-text text-lighten-3" href="#!">Link 1</a></li>
                                <li><a class="grey-text text-lighten-3" href="#!">Link 2</a></li>
                                <li><a class="grey-text text-lighten-3" href="#!">Link 3</a></li>
                                <li><a class="grey-text text-lighten-3" href="#!">Link 4</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="footer-copyright">
                    <div class="container">
                        © 2014 Copyright Text
                        <a class="grey-text text-lighten-4 right" href="#!">More Links</a>
                    </div>
                </div>
            </footer>
            <script src="../../resources/js/jquery-3.4.1.min.js" type="text/javascript"></script>
            <script src="../../resources/js/materialize.min.js" type="text/javascript"></script>
            <script src="../../resources/js/initialization.js" type="text/javascript"></script>
        </body>
        </html>
        ');
    }
}
?>