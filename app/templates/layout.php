<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />

    <title>Gestión Inmobiliaria</title>

    <link rel="stylesheet" type="text/css" href="web/css/reset.css" />
    <!-- <link rel='stylesheet' type='text/css' id='elementor-frontend-css' href='vendor/elementor/frontend.min.css' media='all' /> -->
    <link rel='stylesheet' id='elementor-frontend-css' href='http://strohlsf.com/wp-content/plugins/elementor/assets/css/frontend.min.css?ver=2.8.5' type='text/css' media='all' />
    <!-- <link rel="stylesheet" type="text/css" href="vendor/twbs/bootstrap/dist/css/bootstrap-social.css"> -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-social/5.1.1/bootstrap-social.min.css">
    <!-- <link rel="stylesheet" type="text/css" href="vendor/twbs/bootstrap/dist/css/bootstrap.min.css" id="bootstrap-css"> -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <!-- <link rel="stylesheet" type="text/css" href="vendor/components/font-awesome/css/font-awesome.min.css" /> -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.3.0/css/font-awesome.min.css" integrity="sha256-VBrFgheoreGl4pKmWgZh3J23pJrhNlSUOBek+8Z2Gv0=" crossorigin="anonymous" />
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css">
    <!-- <link rel="stylesheet" type="text/css" href="vendor/datatables/datatables/examples/resources/syntax/shCore.css"> -->


    <!-- <script src="vendor/firebase/firebase-ui-auth.js"></script> -->
    <!-- <link rel="stylesheet" type="text/css" href="vendor/firebase/firebase-ui-auth.css" /> -->
    <link type="text/css" rel="stylesheet" href="https://www.gstatic.com/firebasejs/ui/4.5.0/firebase-ui-auth.css" />

    <link rel="stylesheet" type="text/css" href="web/css/estilo.css" />

    <!-- <script src="vendor/firebase/firebase-app.js"></script> -->
    <!-- <script src="vendor/components/jquery/jquery.min.js"></script> -->
    <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
    <!-- <script src="vendor/datatables/datatables/examples/resources/syntax/shCore.js"></script> -->
    <!-- <script src="vendor/twbs/bootstrap/dist/js/bootstrap.min.js"></script> -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
    <script src="app/libs/geolocalizacion.js"></script>
    <script src="app/libs/scrolls.js"></script>
    <script src="app/libs/confirmaEliminacion.js"></script>
    <script type="text/javascript" src="https://platform-api.sharethis.com/js/sharethis.js#property=5ebed02e2d5f810012b130b7&product=inline-share-buttons" async="async"></script>

</head>

<body onload="geoFindMe()">

    <div class="container-fluid bg-light">
        <div class="row">
            <!-- header -->

            <header class="header col-12">

                <div class="row bg-dark justify-content-center  header">
                    <h1 class="text-warning display-2 title mt-2"><?php echo Config::$TITULO; ?></h1>

                </div>
                <div class="row">
                    <div class=" col-md-10 col-8 bg-dark text-center">
                        <h4 class="text-warning "><?php echo Config::$ESLOGAN; ?></h4>
                    </div>

                    <div class=" col-md-2 col-4 bg-dark text-right">

                        <h3 class="text-warning navbar-brand " id="temp"></h3>
                        <!-- widget de geolocalizacion y temperatura -->

                    </div>
                </div>
            </header>


            <!-- navbar -->
            <nav class="col-12 navbar navbar-expand-md navbar-light bg-warning menu" id="navbar">

                <div class="col-1 d-xs-none d-md-none">
                    <button type="button" class="navbar-toggler " data-toggle="collapse" data-target="#navbarCollapse">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                </div>


                <div class="collapse navbar-collapse justify-content-start col-3 col-md-9" id="navbarCollapse">

                    <?php
                    $muestraInicio = "";
                    if ($_GET['ctl'] == "inicio") {
                        $muestraHome = 'd-none';
                    }


                    ?>

                    <a href="index.php?ctl=inicio" class="nav-item nav-link <?php echo $muestraHome; ?>">
                        <h5>Home </h5>
                    </a>
                    <!-- <a href="index.php?ctl=listarVenta" class="nav-item nav-link ">
                        <h4>Venta </h4>
                    </a>
                    <a href="index.php?ctl=listarAlquiler" class="nav-item nav-link ">
                        <h4>Alquiler </h4>
                    </a> -->
                    <a href="#footer" class="nav-item nav-link " id="bContact">
                        <h5>Contacto </h5>
                    </a>



                    <?php
                    //si no es administrador se aplica la class de Bootstrap d-none en el siguiente elemento div #menuAdmin
                    $displayNone = "";
                    if ($_COOKIE['tipo'] != 2) {
                        $displayNone = " d-none";
                    }
                    ?>

                </div>

                <?php isset($_GET['msg']) ? $ver = 'd-none' : $ver = ''; ?>

                <div id="userActivo" class="col-7 col-md-3 <?php echo $ver; ?> ">

                    <div id="menuAdmin" class="nav-item  dropdown row justify-content-end">
                        <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">

                            <?php
                            $nombre = strtoupper($_COOKIE['nombre']);
                            //$imagen = $_COOKIE['avatar'];
                            echo  $nombre;
                            ?>


                        </a>


                        <div class="dropdown-menu bg-warning justify-content-end">

                            <a href="index.php?ctl=listarInmuebles" class="dropdown-item  <?php echo $displayNone ?>">Gestión Inmuebles</a>
                            <a href="index.php?ctl=insertar" class="dropdown-item  <?php echo $displayNone ?>">Añadir Inmueble</a>

                            <a href="index.php?ctl=listarUsuarios" class="dropdown-item  <?php echo $displayNone ?>">Gestión Usuarios</a>
                            <a href="index.php?ctl=register" class="dropdown-item  <?php echo $displayNone ?>">Añadir Administrador</a>
                            <hr>
                            <a href="index.php?ctl=salir" class="dropdown-item">Salir</a>

                        </div>


                        <img src="<?php echo $_COOKIE['avatar'] ?>" alt="imgperfil" id="avatar">



                    </div>


                </div>

            </nav>



            <!-- contenido-->


            <div class="container-fluid">

                <div class="row" id="contenido"><?php echo $contenido ?></div>
            </div>



            <!-- footer -->
            <br><br><br>
            <hr width="70%" size="20" color="blue" noshade>

            <footer id="footer" class=" bg-light text-dark col-12 p-2 ">
                <div class="row">
                    <div class="col-12">
                        <h2 class="h2-responsive font-weight-bold text-center my-4">Contacta con nosotros</h2>
                    </div>

                </div>


                <div class="row">


                    <!--formulario-->
                    <div class="col-lg-9 m-auto p-4">
                        <form id="contact-form" name="contact-form" action="./app/libs/sendbymail.php" method="POST">

                            <!--Grid row-->
                            <div class="row">

                                <!--Grid column-->
                                <div class="col-md-6">
                                    <div class="md-form mb-0">
                                        <input type="text" id="name" name="name" class="form-control" placeholder="Nombre" required><br>
                                        <!-- <label for="name" class="">Tu nombre</label> -->
                                    </div>
                                </div>

                                <!--Grid column-->

                                <!--Grid column-->
                                <div class="col-md-6">
                                    <div class="md-form mb-0">
                                        <input type="email" id="email" name="email" class="form-control" placeholder="Email" required>
                                        <!-- <label for="email" class="">Tu email</label> -->
                                    </div>
                                </div>
                                <!--Grid column-->

                            </div>
                            <br>
                            <!--Grid row-->

                            <!--Grid row-->
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="md-form mb-0">
                                        <input type="text" id="subject" name="subject" class="form-control" placeholder="Asunto" required>
                                        <!-- <label for="subject" class="">Asunto</label> -->
                                    </div>
                                </div>
                            </div>
                            <br>
                            <!--Grid row-->

                            <!--Grid row-->
                            <div class="row">

                                <!--Grid column-->
                                <div class="col-md-12">

                                    <div class="md-form">
                                        <textarea type="text" id="message" name="message" rows="2" class="form-control md-textarea" placeholder="Mensaje" required></textarea>
                                        <!-- <label for="message">Tu mensaje</label> -->
                                    </div>

                                </div>
                            </div>
                            <br>

                            <!--Grid row-->



                            <div class="text-center text-md-center ">
                                <button name="bEmail" type="submit" class="btn btn-warning">Enviar</button>
                                <!--  envio por mail-->
                            </div>
                            <br>
                            <div class="top-icon text-center">
                                <a href="#" id="ir-arriba">
                                    <i class="fa fa-arrow-up"></i>
                                </a>
                            </div>
                        </form>
                        <div class="status"></div>
                    </div>
                    <!--fin formulario-->


                    <div class="col-lg-3 text-center justify-content-center m-auto">

                        <!--  mail y telefono -->
                        <div class=" ">
                            <div class="">


                                <span class="">O MÁNDANOS UN EMAIL:</span>

                            </div>

                            <div class="">

                                <a href="mailto:" class="" role="button">

                                    <span class="">info@gestioninmobiliaria.com</span>

                                </a>

                            </div>



                            <div class="">
                                <a href=" tel:0034645212828" class="" role="button">

                                    <span class="">Tel: +34 645 21 2828</span>

                                </a>

                            </div>
                            <br>
                        </div>

                        <!-- fin mail y telefono -->

                        <!-- botones redes sociales -->
                        <div class="">
                            <div class="">
                                <!-- Facebook -->
                                <a href="www.facebook.com" class="btn-floating btn-lg btn-fb" type="button" role="button"><i class="fa fa-facebook"></i></a>
                                <!--Twitter-->
                                <a href="www.twitter.com" class="btn-floating btn-lg btn-tw" type="button" role="button"><i class="fa fa-twitter"></i></a>
                                <!--Linkedin-->
                                <a href="www.linkedin.com" class="btn-floating btn-lg btn-li" type="button" role="button"><i class="fa fa-linkedin"></i></a>
                                <!--Instagram-->
                                <a href="www.instagram.com" class="btn-floating btn-lg btn-ins" type="button" role="button"><i class="fa fa-instagram"></i></a>
                            </div>
                        </div>
                        <!-- fin botones redes sociales -->

                        <br>
                        <div class="">
                            <div class="">
                                <p class="">Antonio Rodríguez<br>
                                    ©<?php echo date("Y", time()) . " "; ?>Spain</p>
                            </div>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
    </div>



    <!-- --------------------S C R I P T S ------------------------  -->

    <script src="app/libs/imagenesEnlaces.js"></script>

    <script>
    $(document).ready(function() {
        $('#tabla').DataTable();
        $('.dataTables_length').addClass('bs-select');
    });
    </script>
    <script src="https://www.gstatic.com/firebasejs/6.2.0/firebase-app.js"></script>
    <script src="https://www.gstatic.com/firebasejs/6.2.0/firebase-auth.js"></script>

    <script src="https://www.gstatic.com/firebasejs/4.3.1/firebase.js"></script>
    <script src="app/libs/authFirebase.js"></script>





</body>

</html>
