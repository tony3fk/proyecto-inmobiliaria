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

    <title>Registro Gestión Inmobiliaria</title>



</head>

<body>
    <div class="container-fluid h-100">
        <nav class=" col-13 navbar bg-dark justify-content-center ">
            <ul>
                <li>
                    <h1 class="text-warning display-1 title ">Gestión Inmobiliaria</h1>

                </li>


                <h2 class="text-muted">Registro</h2>

            </ul>

        </nav>

        <div class="jumbotron ">
            <div class="row h-100 justify-content-center align-items-center" id="register">
                <form action="index.php?ctl=register" method="POST">
                    <input type="text" placeholder="Nombre" name="nombre" required />
                    <br><br>
                    <input type="text" placeholder="email" name="email" required />
                    <br><br>
                    <input type="password" placeholder="Password" name="password" required />
                    <br><br>
                    <input type="text" placeholder="Ciudad" name="ciudad" required />
                    <br><br>
                    <button class="btn-success" type="submit" value="Registrarse" name="bRegister">Registrarse</button>
                    <hr>


                </form>

            </div>
            <div class="row h-100 justify-content-center align-items-center">
                <form action="index.php?ctl=login">
                    <input class="btn-primary" type="submit" value="Login" />
                </form>




                <!-- <button type="button" class="btn-primary" href="index.php?ctl=login">Login</button> -->


            </div>




        </div>

        <div>
            <?php echo $params['mensaje'];
            ?>
        </div>



        <footer id="pie" class="navbar fixed-bottom row bg-light  justify-content-center p-1">

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
