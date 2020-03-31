<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <!-- <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet"
        id="bootstrap-css" />-->
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" />
    <!-- <link href="https://fonts.googleapis.com/css?family=Press+Start+2P&display=swap" rel="stylesheet" />-->
    <link rel="stylesheet" type="text/css" href="css/reset.css" />
    <link rel="stylesheet" href="css/bootstrap/css/bootstrap" id="bootstrap-css">
    <link rel="stylesheet" type="text/css" href="css/estilo.css" />
    <script src="css/bootstrap/js/bootstrap.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <style type="text/css">
    .bs-example {
        margin: 20px;
    }

    </style>
    <title>Gestión Inmobiliaria</title>

</head>

<body>
    <div class="container-fluid">

        <div class="row  bg-dark justify-content-center pt-3 pb-0">
            <h1 class="text-warning display-2 title ">Gestión Inmobiliaria</h1>
            <h5 class="text-warning ">Tu portal inmobiliario</h5>
        </div>
        <div class="row  bg-dark justify-content-center">

            <div class="col-11">

            </div>
            <div class="col-1">
                <h3 class="text-warning navbar-brand">
                    <?php echo $_SESSION['ciudad'] . ", " . $_SESSION['temp'] . "ºC"; ?></h3>
            </div>

        </div>



        <nav class="navbar navbar-expand-md navbar-light bg-light">

            <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                <div class="navbar-nav">
                    <a href="index.php?ctl=inicio" class="nav-item nav-link active">Inicio</a>
                    <a href="index.php?ctl=listarVenta" class="nav-item nav-link">Venta</a>
                    <a href="index.php?ctl=listarAlquiler" class="nav-item nav-link">Alquiler</a>



                    <a href="index.php?ctl=salir" class="nav-item nav-link">Salir</a>
                </div>


                <form class="form-inline">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Buscar">
                        <div class="input-group-append">
                            <button type="button" class="btn btn-secondary"><i class="fa fa-search"></i></button>
                        </div>
                    </div>
                </form>



                <?php
                //si no es administrador se aplica la class de Bootstrap d-none en el siguiente elemento div #menuAdmin
                $displayNone = "";
                if ($_SESSION['tipo'] < 2) {
                    $displayNone = " d-none";
                }
                ?>
                <div class="navbar-nav">
                    <div id="menuAdmin" class="nav-item dropdown <?php echo $displayNone ?> ">
                        <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Menú Admin</a>
                        <div class="dropdown-menu">
                            <a href="index.php?ctl=listarInmuebles" class="dropdown-item">Gestión Inmuebles</a>
                            <a href="index.php?ctl=insertar" class="dropdown-item">Añadir Inmueble</a>

                            <a href="index.php?ctl=listarUsuarios" class="dropdown-item">Gestión Usuarios</a>
                            <a href="index.php?ctl=register" class="dropdown-item">Añadir Administrador</a>

                        </div>
                    </div>



                    <a href="#" class="nav-item nav-link"><?php echo $_SESSION['nombre']; ?></a>
                </div>
            </div>
        </nav>





        <br><br>
        <div class="container-fluid">
            <div class="row " id="contenido"><?php echo $contenido ?></div>
        </div>






        <footer id="pie" class="navbar fixed-bottom row bg-light  justify-content-center p-1 ">
            <div class=" elementor-widget-wrap col-md-3 text-center bg-light">
                <div class="elementor-element elementor-element-4b7c45aa elementor-align-left elementor-widget elementor-widget-button"
                    data-id="4b7c45aa" data-element_type="widget" data-widget_type="button.default">
                    <div class="elementor-widget-container">
                        <div class="elementor-button-wrapper"><a href="mailto:" class="" role="button"><span
                                    class="elementor-button-content-wrapper"><span
                                        class="elementor-button-text">info@gestioninmobiliaria.com</span></span></a>
                        </div>
                    </div>
                </div>
                <div class="elementor-element elementor-element-4431d60d elementor-align-left elementor-widget elementor-widget-button"
                    data-id="4431d60d" data-element_type="widget" data-widget_type="button.default">
                    <div class="elementor-widget-container">
                        <div class="elementor-button-wrapper"><a href="tel:+34-415-513-559" class="" role="button"><span
                                    class="elementor-button-content-wrapper"><span class="elementor-button-text">tel:+34
                                        415 513 559</span></span></a>
                        </div>
                    </div>
                </div>
                <div class="elementor-element elementor-element-3ccdfd1 elementor-shape-rounded elementor-widget elementor-widget-global elementor-global-3711 elementor-widget-social-icons"
                    data-id="3ccdfd1" data-element_type="widget" data-widget_type="social-icons.default">
                    <div class="elementor-widget-container">
                        <div class="elementor-social-icons-wrapper">
                            <a href="https://www.facebook.com/"
                                class="elementor-icon elementor-social-icon elementor-social-icon-facebook elementor-repeater-item-993ef04"
                                target="_blank">
                                <span class="elementor-screen-only"></span>
                                <i class="fa fa-facebook">
                                </i>
                            </a>
                            <a href="https://twitter.com/"
                                class="elementor-icon elementor-social-icon elementor-social-icon-twitter elementor-repeater-item-a229ff5"
                                target="_blank">
                                <span class="elementor-screen-only"></span>
                                <i class="fa fa-twitter">
                                </i>
                            </a>
                            <a href="https://www.linkedin.com/"
                                class="elementor-icon elementor-social-icon elementor-social-icon-linkedin elementor-repeater-item-f2294d9"
                                target="_blank">
                                <span class="elementor-screen-only"> </span>
                                <i class="fa fa-linkedin"> </i>
                            </a>
                            <a href="https://www.instagram.com/"
                                class="elementor-icon elementor-social-icon elementor-social-icon-instagram elementor-repeater-item-f6707fb"
                                target="_blank">
                                <span class="elementor-screen-only"></span>
                                <i class="fa fa-instagram"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="elementor-element elementor-element-3e98da93 elementor-widget elementor-widget-heading"
                    data-id="3e98da93" data-element_type="widget" data-widget_type="heading.default">
                    <div class="elementor-widget-container">
                        <span id="copyright">Antonio Rodríguez</span>
                        <p class="elementor-heading-title elementor-size-default">
                            ©<?php echo date("Y", time()) . " "; ?>Spain, EU.</p>
                    </div>
                </div>
            </div>
        </footer>
    </div>
</body>

</html>
