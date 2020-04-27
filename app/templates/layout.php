<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />

    <title>Gestión Inmobiliaria</title>

    <link rel="stylesheet" type="text/css" href="./web/css/reset.css" />
    <link rel='stylesheet' type='text/css' id='elementor-frontend-css' href='./vendor/elementor/frontend.min.css' media='all' />
    <link rel="stylesheet" type="text/css" href="./vendor/twbs/bootstrap/dist/css/bootstrap-social.css">
    <link rel="stylesheet" type="text/css" href="./vendor/twbs/bootstrap/dist/css/bootstrap.min.css" id="bootstrap-css">
    <link rel="stylesheet" type="text/css" href="./vendor/components/font-awesome/css/font-awesome.min.css" />
    <link rel="stylesheet" type="text/css" href="./vendor/datatables/datatables/media/css/jquery.dataTables.css">
    <link rel="stylesheet" type="text/css" href="./vendor/datatables/datatables/examples/resources/syntax/shCore.css">
    <link rel="stylesheet" type="text/css" href="./web/css/estilo.css" />

    <script src="./vendor/firebase/firebase-ui-auth.js"></script>
    <link rel="stylesheet" type="text/css" href="./vendor/firebase/firebase-ui-auth.css" />
    <script src="./vendor/firebase/firebase-app.js"></script>
    <script src="./vendor/components/jquery/jquery.min.js"></script>
    <script src="./vendor/datatables/datatables/media/js/jquery.dataTables.js"></script>
    <script src="./vendor/datatables/datatables/examples/resources/syntax/shCore.js"></script>
    <script src="./vendor/twbs/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="./app/libs/geolocalizacion.js"></script>


    <script>
    $(document).ready(function() {
        $('#bContact').click(function() {
            var destino = $(this.hash); //this.hash lee el atributo href de este
            $('html, body').animate({
                scrollTop: destino.offset().top
            }, 700); //Llega a su destino con el tiempo deseado
            return false;
        });
    });
    </script>
</head>

<body onload="geoFindMe()">

    <div class="container-fluid bg-light">
        <div class="row">
            <!-- header -->

            <header class="header col-12">

                <div class="row bg-dark justify-content-center  header">
                    <h1 class="text-warning display-2 title ">Gestión Inmobiliaria</h1>

                </div>
                <div class="row">
                    <div class=" col-md-10 col-8 bg-dark text-center">
                        <h4 class="text-warning ">Tu portal inmobiliario</h4>
                    </div>

                    <div class=" col-md-2 col-4 bg-dark text-right">

                        <h3 class="text-warning navbar-brand " id="temp"></h3>
                        <!-- widget de geolocalizacion y temperatura -->

                    </div>
                </div>
            </header>


            <!-- navbar -->
            <nav class="col-12 navbar navbar-expand-md navbar-light bg-warning menu" id="navbar">

                <div class="col-1 d-lg-none">
                    <button type="button" class="navbar-toggler " data-toggle="collapse" data-target="#navbarCollapse">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                </div>


                <div class="collapse navbar-collapse justify-content-start col-3 col-lg-8" id="navbarCollapse">

                    <a href="index.php?ctl=inicio" class="nav-item nav-link ">
                        <h4>Inicio </h4>
                    </a>
                    <!-- <a href="index.php?ctl=listarVenta" class="nav-item nav-link ">
                        <h4>Venta </h4>
                    </a>
                    <a href="index.php?ctl=listarAlquiler" class="nav-item nav-link ">
                        <h4>Alquiler </h4>
                    </a> -->
                    <a href="#footer" class="nav-item nav-link " id="bContact">
                        <h4>Contacto </h4>
                    </a>

                    <a href="index.php?ctl=salir" class="nav-item nav-link">
                        <h4>Salir </h4>
                    </a>

                    <?php
                    //si no es administrador se aplica la class de Bootstrap d-none en el siguiente elemento div #menuAdmin
                    $displayNone = "";
                    if ($_COOKIE['tipo'] != 2) {
                        $displayNone = " d-none";
                    }
                    ?>

                </div>

                <div id="userActivo" class="col-8 col-lg-4 ">

                    <div id="menuAdmin" class="nav-item  dropdown row justify-content-end">
                        <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">

                            <?php
                            $nombre = strtoupper($_COOKIE['nombre']);
                            $imagen = $_COOKIE['avatar'];
                            echo  $nombre;
                            ?>


                        </a>


                        <div class="dropdown-menu bg-warning justify-content-end <?php echo $displayNone ?>">
                            <a href="index.php?ctl=listarInmuebles" class="dropdown-item">Gestión Inmuebles</a>
                            <a href="index.php?ctl=insertar" class="dropdown-item">Añadir Inmueble</a>

                            <a href="index.php?ctl=listarUsuarios" class="dropdown-item">Gestión Usuarios</a>
                            <a href="index.php?ctl=register" class="dropdown-item">Añadir Administrador</a>

                        </div>


                        <img src="<?php echo $imagen ?>" alt="imgperfil">
                    </div>


                </div>

            </nav>



            <!-- contenido-->


            <div class="container-fluid">
                <div class="row justify-content-center" id="contenido"><?php echo $contenido ?></div>
            </div>





            <!-- Footer -->
            <?php $displayNone = '';
            if ($_COOKIE['tipo'] == 2) {
                $displayNone = 'd-none';
            }
            ?>

            <footer id="footer" class="mb-4 bg-light text-dark col-12 p-2 <?php echo $displayNone ?>">

                <h2 class="h1-responsive font-weight-bold text-center my-4">Contacto</h2>

                <div class="row justify-content-center">
                    <div class="col-lg-1"></div>

                    <!--formulario-->
                    <div class="col-lg-8 mb-md-0 mb-5">
                        <form id="contact-form" name="contact-form" action="./app/libs/sendbymail.php" method="POST">

                            <!--Grid row-->
                            <div class="row">

                                <!--Grid column-->
                                <div class="col-md-6">
                                    <div class="md-form mb-0">
                                        <input type="text" id="name" name="name" class="form-control" required>
                                        <label for="name" class="">Tu nombre</label>
                                    </div>
                                </div>
                                <!--Grid column-->

                                <!--Grid column-->
                                <div class="col-md-6">
                                    <div class="md-form mb-0">
                                        <input type="email" id="email" name="email" class="form-control" required>
                                        <label for="email" class="">Tu email</label>
                                    </div>
                                </div>
                                <!--Grid column-->

                            </div>
                            <!--Grid row-->

                            <!--Grid row-->
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="md-form mb-0">
                                        <input type="text" id="subject" name="subject" class="form-control" required>
                                        <label for="subject" class="">Asunto</label>
                                    </div>
                                </div>
                            </div>
                            <!--Grid row-->

                            <!--Grid row-->
                            <div class="row">

                                <!--Grid column-->
                                <div class="col-md-12">

                                    <div class="md-form">
                                        <textarea type="text" id="message" name="message" rows="2" class="form-control md-textarea" required></textarea>
                                        <label for="message">Tu mensaje</label>
                                    </div>

                                </div>
                            </div>
                            <!--Grid row-->



                            <div class="text-center text-md-center ">
                                <button name="bEmail" type="submit" class="btn btn-warning">Enviar</button>
                                <!-- añadir envio por mail-->
                            </div>
                        </form>
                        <div class="status"></div>
                    </div>
                    <!--fin formulario-->


                    <div class="col-lg-3 text-center justify-content-center">

                        <!--  mail y telefono -->
                        <div class="elementor-widget-wrap   bg-light text-dark ">
                            <div class="elementor-element  elementor-align-center elementor-widget elementor-widget-button">
                                <div class="elementor-widget-container">
                                    <div class="elementor-button-wrapper">
                                        <a class="" role="button">
                                            <span class="elementor-button-content-wrapper">
                                                <span class="elementor-button-text">O MÁNDANOS UN EMAIL:</span>
                                            </span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="elementor-element  elementor-align-center elementor-widget elementor-widget-button">
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
                            <div class="elementor-element  elementor-align-center elementor-widget elementor-widget-button" ">
                        <div class=" elementor-widget-container">
                                <div class="elementor-button-wrapper">
                                    <a href="tel:001-415-513-5579" class="" role="button">
                                        <span class="elementor-button-content-wrapper">
                                            <span class="elementor-button-text">Tel: +34 698 415 2828</span>
                                        </span>
                                    </a>
                                </div>
                            </div>
                        </div>

                        <!-- fin mail y telefono -->

                        <!-- botones redes sociales -->
                        <div class="elementor-element  elementor-shape-rounded elementor-widget elementor-widget-global elementor-widget-social-icons">
                            <div class="elementor-widget-container">

                                <a href="https://www.facebook.com/" class="elementor-icon elementor-social-icon elementor-social-icon-facebook " target="_blank">
                                    <span class="elementor-screen-only">Facebook</span>
                                    <i class="fa fa-facebook"></i>
                                </a>
                                <a href="https://twitter.com/" class="elementor-icon elementor-social-icon elementor-social-icon-twitter " target="_blank">
                                    <span class="elementor-screen-only">Twitter</span>
                                    <i class="fa fa-twitter"></i>
                                </a>
                                <a href="https://www.linkedin.com/" class="elementor-icon elementor-social-icon elementor-social-icon-linkedin " target="_blank">
                                    <span class="elementor-screen-only">Linkedin</span>
                                    <i class="fa fa-linkedin"></i>
                                </a>
                                <a href="https://www.instagram.com/" class="elementor-icon elementor-social-icon elementor-social-icon-instagram " target="_blank">
                                    <span class="elementor-screen-only">Instagram</span>
                                    <i class="fa fa-instagram"></i>
                                </a>

                            </div>
                        </div>
                        <!-- fin botones redes sociales -->
                        <br>
                        <div class="elementor-element  elementor-widget elementor-widget-heading">
                            <div class="elementor-widget-container">
                                <p class="elementor-heading-title elementor-size-default">Antonio Rodríguez<br>
                                    ©<?php echo date("Y", time()) . " "; ?>Spain</p>
                            </div>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
    </div>



    <!-- --------------------S C R I P T S ------------------------  -->

    <script>
    $(document).ready(function() {
        $('#tabla').DataTable();
        $('.dataTables_length').addClass('bs-select');
    });
    </script>

    <script src="https://www.gstatic.com/firebasejs/4.3.1/firebase.js"></script>
    <script src="./app/libs/authFirebase.js"></script>


</body>

</html>
