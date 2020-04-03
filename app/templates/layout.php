<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />

    <link rel="stylesheet" type="text/css" href="/web/css/reset.css" />
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" />
    <link href="https://fonts.googleapis.com/css?family=Press+Start+2P&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="css/bootstrap/css/bootstrap" id="bootstrap-css">
    <link rel='stylesheet' id='elementor-frontend-css'
        href='http://strohlsf.com/wp-content/plugins/elementor/assets/css/frontend.min.css?ver=2.8.5' type='text/css'
        media='all' />
    <link rel="stylesheet" type="text/css"
        href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" type="text/css" href="/web/css/estilo.css" />

    <!-- <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet"
        id="bootstrap-css" />-->

    <script src="css/bootstrap/js/bootstrap.js"></script>
    <script src="https://kit.fontawesome.com/ab12d61800.js" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>

    <title>Gestión Inmobiliaria</title>

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

<body>
    <div class="container-fluid bg-light">

        <!-- header -->

        <header class="header">

            <div class="row bg-dark justify-content-center  header">
                <h1 class="text-warning display-2 title ">Gestión Inmobiliaria</h1>

            </div>
            <div class="row">
                <div class=" col-10 bg-dark text-center">
                    <h5 class="text-warning ">Tu portal inmobiliario</h5>
                </div>

                <div class=" col-2 bg-dark text-right">



                    <h3 class="text-warning navbar-brand ">
                        <?php echo $_SESSION['ciudad'] . ", " . $_SESSION['temp'] . "ºC"; ?></h3>


                </div>
            </div>
        </header>


        <!-- navbar -->
        <nav class=" row navbar navbar-expand-md navbar-light bg-warning menu">

            <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">


                <div class="navbar-nav mr-auto">
                    <a href="index.php?ctl=inicio" class="nav-item nav-link active">Inicio</a>
                    <a href="index.php?ctl=listarVenta" class="nav-item nav-link active">Venta</a>
                    <a href="index.php?ctl=listarAlquiler" class="nav-item nav-link active">Alquiler</a>
                    <a href="#footer" class="nav-item nav-link active" id=" bContact">Contacto</a>

                    <a href="index.php?ctl=salir" class="nav-item nav-link">Salir</a>
                </div>


                <!-- <form class="form-inline">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Buscar">
                        <div class="input-group-append">
                            <button type="button" class="btn btn-secondary"><i class="fa fa-search"></i></button>
                        </div>
                    </div>
                </form> -->



                <?php
                //si no es administrador se aplica la class de Bootstrap d-none en el siguiente elemento div #menuAdmin
                $displayNone = "";
                if ($_SESSION['tipo'] < 2) {
                    $displayNone = " d-none";
                }
                ?>
                <div class="navbar-nav ml-auto">
                    <div id="menuAdmin" class="nav-item dropdown <?php echo $displayNone ?> ">
                        <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Menú Admin</a>
                        <div class="dropdown-menu">
                            <a href="index.php?ctl=listarInmuebles" class="dropdown-item">Gestión Inmuebles</a>
                            <a href="index.php?ctl=insertar" class="dropdown-item">Añadir Inmueble</a>

                            <a href="index.php?ctl=listarUsuarios" class="dropdown-item">Gestión Usuarios</a>
                            <a href="index.php?ctl=register" class="dropdown-item">Añadir Administrador</a>

                        </div>
                    </div>



                    <a href="#" class="nav-item nav-link"><i class="fas fa-user"></i>
                        <?php echo strtoupper(" " . $_SESSION['nombre']); ?></a>
                </div>
            </div>
        </nav>



        <!-- contenido-->

        <br>
        <div class="container-fluid">
            <div class="row" id="contenido"><?php echo $contenido ?></div>
        </div>





        <!-- Footer -->

        <footer id="footer" class="mb-4 bg-light text-dark col-12 p-2 ">




            <h2 class="h1-responsive font-weight-bold text-center my-4">Contacto</h2>



            <div class="row justify-content-center">
                <div class="col-md-1"></div>

                <!--formulario-->
                <div class="col-md-8 mb-md-0 mb-5">
                    <form id="contact-form" name="contact-form" action="mail.php" method="POST">

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
                                    <textarea type="text" id="message" name="message" rows="2"
                                        class="form-control md-textarea" required></textarea>
                                    <label for="message">Tu mensaje</label>
                                </div>

                            </div>
                        </div>
                        <!--Grid row-->

                    </form>

                    <div class="text-center text-md-center ">
                        <a class="btn btn-warning" href="#">Enviar</a> <!-- añadir envio por mail-->
                    </div>
                    <div class="status"></div>
                </div>
                <!--fin formulario-->


                <div class="col-md-3 text-center justify-content-center">
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


                    <div
                        class="elementor-element  elementor-shape-rounded elementor-widget elementor-widget-global elementor-widget-social-icons">
                        <div class="elementor-widget-container">
                            <div class="elementor-social-icons-wrapper">
                                <a href="https://www.facebook.com/"
                                    class="elementor-icon elementor-social-icon elementor-social-icon-facebook "
                                    target="_blank">
                                    <span class="elementor-screen-only">Facebook</span>
                                    <i class="fa fa-facebook"></i>
                                </a>
                                <a href="https://twitter.com/"
                                    class="elementor-icon elementor-social-icon elementor-social-icon-twitter "
                                    target="_blank">
                                    <span class="elementor-screen-only">Twitter</span>
                                    <i class="fa fa-twitter"></i>
                                </a>
                                <a href="https://www.linkedin.com/"
                                    class="elementor-icon elementor-social-icon elementor-social-icon-linkedin "
                                    target="_blank">
                                    <span class="elementor-screen-only">Linkedin</span>
                                    <i class="fa fa-linkedin"></i>
                                </a>
                                <a href="https://www.instagram.com/"
                                    class="elementor-icon elementor-social-icon elementor-social-icon-instagram "
                                    target="_blank">
                                    <span class="elementor-screen-only">Instagram</span>
                                    <i class="fa fa-instagram"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="elementor-element  elementor-widget elementor-widget-heading">
                        <div class="elementor-widget-container">
                            <p class="elementor-heading-title elementor-size-default">Antonio Rodríguez<br>
                                ©<?php echo date("Y", time()) . " "; ?>Spain</p>
                        </div>
                    </div>
                </div>
            </div>

    </div>

    </footer>


    </div>







    <script>
    $(document).ready(function() {
        $('#tabla').DataTable();
        $('.dataTables_length').addClass('bs-select');
    });
    </script>


</body>

</html>
