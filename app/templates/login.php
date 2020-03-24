<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />

    <!-- <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css" /> -->
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" />
    <!-- <link href="https://fonts.googleapis.com/css?family=Press+Start+2P&display=swap" rel="stylesheet" /> -->


    <link rel="stylesheet" type="text/css" href="css/reset.css" />
    <link rel="stylesheet" href="css/bootstrap/css/bootstrap" id="bootstrap-css">

    <link rel="stylesheet" type="text/css" href="css/estilo.css" />

    <script src="css/bootstrap/js/bootstrap.js"></script>

    <title>Login Gestión Inmobiliaria</title>



</head>

<body>
    <div class="container-fluid h-100">
        <nav class=" col-13 navbar bg-dark justify-content-center ">
            <ul>
                <li>
                    <h1 class="text-warning display-1 title ">Gestión Inmobiliaria</h1>

                </li>


                <h2 class="text-muted">Login</h2>

            </ul>

        </nav>

        <br>
        <div class="jumbotron ">
            <div class="row h-100 justify-content-center align-items-center" id="cabecera">



                <h3><?php

                    if (empty($_SESSION)) {

                        $_SESSION['nombre'] = "Invitado";
                        $_SESSION['tipo'] = 0;
                    }
                    echo "Hola " . $_SESSION['nombre'] . ", inicia sesión.";


                    ?></h3>

            </div>
            <br>
            <div class="row h-100 justify-content-center align-items-center ">
                <div id="login">
                    <form action="index.php?ctl=login" method="POST">


                        <fieldset class="clearfix">
                            <p>
                                <span class="fa fa-user mr-3"> </span>
                                <input type="text" placeholder="nombre" name="nombre" required />
                            </p>

                            <p>
                                <span class="fa fa-lock mr-3"> </span>
                                <input type="password" placeholder="Password" name="password" required />
                            </p>


                            <div>
                                <br>

                                <span style="width:50%; text-align:right;  display: inline-block;">
                                    <input class="btn btn-success" type="submit" value="Iniciar sesión" name="bLogin" />
                                </span>

                                <hr>
                                <!-- <span style="width:48%; text-align:left;  display: inline-block;">
                            <h5 class="text-light">No tienes cuenta?</h5>
                            <input type="submit" value="Regístrate" name="bRegister" />
                        </span> -->
                            </div>

                        </fieldset>




                        <!-- <input type="text" placeholder="nombre" name="nombre" required />
                <br><br>
                <input type="password" placeholder="Password" name="password" required />
                <br><br>

                <input class="bg-success" type="submit" value="Iniciar sesión" name="bLogin" />
                <hr> -->

                    </form>

                    <form action="index.php?ctl=register" method="POST">
                        <h5 class="text-dark">No tienes cuenta?</h5>
                        <input type="submit" class="btn btn-warning" value="Regístrate" name="bRegister" />
                    </form>

                </div>
            </div>


            <div>
                <?php echo $params['mensaje']; ?>
            </div>
        </div>



        <footer id="pie" class="row bg-light jumbotron justify-content-center  mb-0">

            <div class=" elementor-widget-wrap col-md-3 text-center bg-light">

                <div class="elementor-element elementor-element-4b7c45aa elementor-align-left elementor-widget elementor-widget-button"
                    data-id="4b7c45aa" data-element_type="widget" data-widget_type="button.default">
                    <div class="elementor-widget-container">
                        <div class="elementor-button-wrapper">
                            <a href="mailto:" class="" role="button">
                                <span class="elementor-button-content-wrapper">
                                    <span class="elementor-button-text">info@gestioninmobiliaria.com</span>
                                </span>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="elementor-element elementor-element-4431d60d elementor-align-left elementor-widget elementor-widget-button"
                    data-id="4431d60d" data-element_type="widget" data-widget_type="button.default">
                    <div class="elementor-widget-container">
                        <div class="elementor-button-wrapper">
                            <a href="tel:+34-415-513-559" class="" role="button">
                                <span class="elementor-button-content-wrapper">
                                    <span class="elementor-button-text">tel:+34 415 513 559</span>
                                </span>
                            </a>
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
                                <i class="fa fa-facebook"></i>
                            </a>
                            <a href="https://twitter.com/"
                                class="elementor-icon elementor-social-icon elementor-social-icon-twitter elementor-repeater-item-a229ff5"
                                target="_blank">
                                <span class="elementor-screen-only"></span>
                                <i class="fa fa-twitter"></i>
                            </a>
                            <a href="https://www.linkedin.com/"
                                class="elementor-icon elementor-social-icon elementor-social-icon-linkedin elementor-repeater-item-f2294d9"
                                target="_blank">
                                <span class="elementor-screen-only"></span>
                                <i class="fa fa-linkedin"></i>
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
                        <p class="elementor-heading-title elementor-size-default">©<?php echo date("Y", time()) ?>
                            Spain, EU.</p>
                    </div>
                </div>
            </div>



        </footer>


    </div>
</body>

</html>
