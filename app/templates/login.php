<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />

    <link rel="stylesheet" type="text/css" href="web/css/reset.css" />
    <!-- <link rel="stylesheet" href="vendor/components/font-awesome/css/font-awesome.min.css" /> -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.3.0/css/font-awesome.min.css" integrity="sha256-VBrFgheoreGl4pKmWgZh3J23pJrhNlSUOBek+8Z2Gv0=" crossorigin="anonymous" />

    <!-- <link rel='stylesheet' id='elementor-frontend-css' href='vendor/elementor/frontend.min.css' type='text/css' media='all' /> -->
    <!-- <link rel="stylesheet" href="vendor/twbs/bootstrap/dist/css/bootstrap.min.css" id="bootstrap-css"> -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

    <!-- <link href="./vendor/twbs/bootstrap/dist/css/bootstrap-3.3.0.min.css" rel="stylesheet" id="bootstrap-css"> -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-social/5.1.1/bootstrap-social.min.css">

    <!-- <link rel="stylesheet" href="vendor/twbs/bootstrap/dist/css/bootstrap-social.css"> -->
    <link rel="stylesheet" type="text/css" href="web/css/estilo.css" />


    <!-- <script src="vendor/firebase/firebase-ui-auth.js"></script> -->
    <!-- <link type="text/css" rel="stylesheet" href="vendor/firebase/firebase-ui-auth.css" /> -->
    <!-- <script src="vendor/firebase/firebase-app.js"></script> -->

    <!-- <script src="../app/libs/geolocalizacion.js"></script> -->

    <!-- <script src="vendor/components/jquery/jquery.min.js"></script> -->
    <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
    <!-- <script src="vendor/twbs/bootstrap/dist/js/bootstrap.min.js"></script> -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>

    <!-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script> -->
    <!-- <script src="./web/css/bootstrap/js/bootstrap.js"></script> -->



    <title>Login Gestión Inmobiliaria</title>



</head>

<body class="bg-light">





    <div class="container-fluid  bg-light">

        <header class=" row  navbar bg-dark justify-content-center ">
            <ul>
                <li>
                    <h1 class="text-warning display-1 title "><?php echo Config::$TITULO; ?></h1>
                </li>
                <h2 class="text-muted">Log in</h2>
            </ul>
        </header>




        <div class="container">
            <div class="row  justify-content-center align-items-center" id="cabecera">

                <h3><?php

                    if (empty($_SESSION)) {

                        $_SESSION['nombre'] = "Invitado";
                        $_SESSION['tipo'] = 0;
                    }
                    //echo "Hola " . $_SESSION['nombre'] . ", inicia sesión.";
                    ?></h3>

            </div>
            <br>

            <!-- formulario de acceso -->
            <div class="container" id="form-login">
                <div class="row justify-content-center mt-5">

                    <div class="col-12 col-md-8 col-lg-7  ">
                        <div class="panel panel-login">

                            <?php

                            //si el logueado es admin, es porque accede desde el menú de administrador y se oculta la opción de login
                            $displayLogin = " block";
                            $displayRegister = "none";
                            $display = "";
                            if ($_COOKIE['tipo'] == '2') {
                                $displayLogin = " none";
                                $displayRegister = " block";
                                $display = "d-none";
                            }

                            ?>

                            <div class="panel-heading">
                                <div class="row pt-2">
                                    <div class="col-6">
                                        <a href="#" class="btn btn-outline-primary <?php echo $display ?>" id="login-form-link">
                                            <h4>Login</h4>
                                        </a>
                                    </div>
                                    <div class="col-6">
                                        <a href="#" class="btn btn-outline-secondary" id="register-form-link">
                                            <h4>Register</h4>
                                        </a>
                                    </div>
                                </div>
                                <hr>
                            </div>


                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <!-- mensaje de succes -->
                                        <div class="justify-content-center">

                                            <?php if ($params['success'] != '') {
                                                $fondo = "text-center alert alert-success";
                                            } else {
                                                $fondo = '';
                                            } ?>

                                            <h3 class="<?php echo $fondo ?>" role="alert"><?php
                                                                                            echo $params['success'];

                                                                                            $params['success'] = ''; ?></h3>

                                        </div>
                                        <!-- fin mensaje de success -->

                                        <div id="login-form">
                                            <!-- formulario de login -->
                                            <form class="p-2" action="index.php?ctl=login" method="post" role="form" style="display: <?php echo $displayLogin ?>;">
                                                <!-- <div class="form-group">
                                                <input type="text" name="nombre" id="username" tabindex="1" class="form-control text-center" placeholder="Username" value="">
                                            </div> -->
                                                <div class="form-group">
                                                    <input type="email" name="email" id="email" tabindex="1" class="form-control text-center col-8 m-auto" placeholder="Email" value="" required>
                                                </div>
                                                <div class="form-group">
                                                    <input type="password" name="password" id="password" tabindex="2" class="form-control text-center col-8 m-auto" placeholder="Password" required>
                                                </div>

                                                <div class="form-group">
                                                    <div class="row justify-content-center">
                                                        <div class="col-6 col-sm-offset-3">
                                                            <button type="submit" name="bLogin" id="login-submit" tabindex="4" class="form-control btn btn-login btn-primary m-auto">
                                                                <h4>Login</h4>
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>

                                            </form>
                                            <!-- fin formulario de login -->
                                            <div class="form-group">
                                                <div class="row">
                                                    <div class="col-12">
                                                        <div class="text-center">
                                                            <a href="index.php?ctl=resetPassword" tabindex="5" class="forgot-password <?php echo $display ?>">¿Olvidaste tu password?</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- botones inicio mediante redes sociales -->
                                            <div class="row p-2  <?php echo $display ?>" id="login-social">
                                                <div class="col-4 ">
                                                    <button onclick="facebookSignIn()" class="btn btn-block btn-facebook " id="btnLoginFacebook">
                                                        <i class="fa fa-facebook fa-fw w-100 p-0 m-0">

                                                        </i>
                                                        <h5>Login</h5>
                                                    </button>
                                                </div>

                                                <div class="col-4  ">
                                                    <button onclick="googleSignIn()" class="btn btn-block btn-google " id="btnLoginGoogle">
                                                        <i class="fa fa-google fa-fw w-100 p-0 m-0">

                                                        </i>
                                                        <h5>Login</h5>
                                                    </button>
                                                </div>

                                                <div class="col-4 ">
                                                    <button onclick="twitterSignIn()" class="btn btn-block  btn-twitter" id="btnLoginTwitter">
                                                        <i class="fa fa-twitter fa-fw w-100 p-0 m-0">

                                                        </i>
                                                        <h5>Login</h5>
                                                    </button>
                                                </div>

                                            </div>
                                            <!-- fin inicio redes sociales -->
                                        </div>


                                        <br>



                                        <!--formulario de registro -->
                                        <form class="p-2" id="register-form" action="index.php?ctl=register" method="post" role="form" style="display: <?php echo $displayRegister ?>;" enctype="multipart/form-data">


                                            <div class="form-group">
                                                <input type="text" name="nombre" id="usernamereg" tabindex="1" class="form-control text-center col-8 m-auto" placeholder="Nombre" value="" required>
                                            </div>
                                            <div class="form-group">
                                                <input type="email" name="email" id="email" tabindex="1" class="form-control text-center col-8 m-auto" placeholder="Email" value="" required>
                                            </div>
                                            <div class="form-group">
                                                <input type="password" name="password" id="passwordreg" tabindex="2" class="form-control text-center col-8 m-auto" placeholder="Password" required minlength="8">
                                            </div>
                                            <div class="form-group">
                                                <input type="password" name="confirm-password" id="confirm-password" tabindex="2" class="form-control  text-center col-8 m-auto" placeholder="Confirma password" required minlength="8">

                                            </div>


                                            <!-- <div class="form-group">
                                                <input type="text" name="ciudad" id="ciudad" tabindex="2" class="form-control text-center" placeholder="Ciudad" required>
                                            </div> -->
                                            <div class="form-group">
                                                <label> Avatar (max 2MB)</label>
                                                <input type="file" name="avatar" id="avatar" accept="image/gif,image/jpeg,image/jpg,image/png" />
                                            </div>
                                            <div class="form-group">
                                                <div class="row justify-content-center">
                                                    <div class="col-6 col-sm-offset-3">
                                                        <input type="submit" name="bRegister" id="register-submit" tabindex="4" class="form-control btn btn-register btn-secondary" value="Regístrate">
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                        <!-- Fin formulario de registro -->


                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- fin formulario de acceso -->




            <!-- mensaje de error -->
            <div class="justify-content-center">

                <?php if ($params['mensaje'] != '') {
                    $fondo = "text-center alert alert-danger";
                } else {
                    $fondo = '';
                } ?>

                <h3 class="<?php echo $fondo ?>" role="alert"><?php echo $params['mensaje'];

                                                                $params['mensaje'] = '';
                                                                ?></h3>

            </div>
            <!-- fin mensaje de error -->

        </div>




        <!-- footer -->

        <footer id="pie" class="row   bg-light  justify-content-center p-4 mt-5">

            <div class="col-sm-8 col-lg-5 text-center justify-content-center m-auto ">

                <!--  mail y telefono -->
                <div class="shadow p-3 mb-5 bg-white rounded">
                    <div class="">


                        <h4>O MÁNDANOS UN EMAIL:</h4>

                    </div>

                    <div class="">

                        <a href="mailto:" class="" role="button">

                            <h5>info@inmobiliaria.com</h5>

                        </a>

                    </div>



                    <div class="">
                        <a href=" tel:0034645212828" class="" role="button">

                            <h5>Tel: +34 645 21 2828</h5>

                        </a>

                    </div>
                    <br>


                    <!-- fin mail y telefono -->

                    <!-- botones redes sociales -->
                    <div class="">
                        <div class="">
                            <!-- Facebook -->
                            <a href="http://www.facebook.com" class="btn btn-fb p-0 " target="_blank" type="button" role="button"><i class="fa fa-facebook"></i></a>
                            <!--Twitter-->
                            <a href="http://www.twitter.com" class="btn btn-tw  p-0" target="_blank" type="button" role="button"><i class="fa fa-twitter"></i></a>
                            <!--Linkedin-->
                            <a href="http://www.linkedin.com" class="btn btn-li p-0" target="_blank" type="button" role="button"><i class="fa fa-linkedin"></i></a>
                            <!--Instagram-->
                            <a href="http://www.instagram.com" class="btn btn-ins p-0" target="_blank" type="button" role="button"><i class="fa fa-instagram"></i></a>
                        </div>
                    </div>
                    <!-- fin botones redes sociales -->

                    <br>
                    <div class="">
                        <div class="">
                            <h5 class="">Antonio Rodríguez<br>
                                ©<?php echo date("Y", time()) . " "; ?>Spain</h5>
                        </div>
                    </div>
                </div>

            </div>
        </footer>
        <!-- Fin footer -->

    </div>


    <!-- --------------------S C R I P T S ------------------------  -->
    <script src="https://www.gstatic.com/firebasejs/6.2.0/firebase-app.js"></script>
    <script src="https://www.gstatic.com/firebasejs/6.2.0/firebase-auth.js"></script>

    <script>
    //script jQuery de efectos del formulario
    $(function() {

        $('#login-form-link').click(function(e) {
            $("#login-form").delay(100).fadeIn(100);
            $("#register-form").fadeOut(100);
            $('#register-form-link').removeClass('active');
            $(this).addClass('active');
            e.preventDefault();
        });
        $('#register-form-link').click(function(e) {
            $("#register-form").delay(100).fadeIn(100);
            $("#login-form").fadeOut(100);
            $('#login-form-link').removeClass('active');
            $(this).addClass('active');
            e.preventDefault();
        });

    });
    </script>

    <script src="https://www.gstatic.com/firebasejs/4.3.1/firebase.js"></script>
    <script src="app/libs/authFirebase.js"></script>



</body>

</html>
