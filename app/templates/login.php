<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />

    <link rel="stylesheet" type="text/css" href="./web/css/reset.css" />
    <link rel="stylesheet" href="./vendor/components/font-awesome/css/font-awesome.min.css" />
    <link rel='stylesheet' id='elementor-frontend-css' href='./vendor/elementor/frontend.min.css' type='text/css'
        media='all' />
    <link rel="stylesheet" href="./vendor/twbs/bootstrap/dist/css/bootstrap.min.css" id="bootstrap-css">
    <!-- <link href="./vendor/twbs/bootstrap/dist/css/bootstrap-3.3.0.min.css" rel="stylesheet" id="bootstrap-css"> -->

    <link rel="stylesheet" href="./vendor/twbs/bootstrap/dist/css/bootstrap-social.css">
    <link rel="stylesheet" type="text/css" href="./web/css/estilo.css" />


    <script src="./vendor/firebase/firebase-ui-auth.js"></script>
    <link type="text/css" rel="stylesheet" href="./vendor/firebase/firebase-ui-auth.css" />
    <script src="./vendor/firebase/firebase-app.js"></script>

    <!-- <script src="../app/libs/geolocalizacion.js"></script> -->

    <script src="./vendor/components/jquery/jquery.min.js"></script>
    <script src="./vendor/twbs/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script> -->
    <!-- <script src="./web/css/bootstrap/js/bootstrap.js"></script> -->




    <title>Login Gestión Inmobiliaria</title>



</head>

<body class="bg-light">





    <div class="container-fluid  bg-light">

        <header class=" row  navbar bg-dark justify-content-center ">
            <ul>
                <li>
                    <h1 class="text-warning display-1 title ">Gestión Inmobiliaria</h1>
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
            <div class="container">
                <div class="row justify-content-center mt-5">

                    <div class="col-10 col-md-8 col-lg-6 ">
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
                                        <a href="#" class="btn btn-outline-primary <?php echo $display ?>"
                                            id="login-form-link">Login</a>
                                    </div>
                                    <div class="col-6">
                                        <a href="#" class="btn btn-outline-secondary"
                                            id="register-form-link">Register</a>
                                    </div>
                                </div>
                                <hr>
                            </div>


                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-sm-12">

                                        <div id="login-form">
                                            <!-- formulario de login -->
                                            <form class="p-2" action="index.php?ctl=login" method="post" role="form"
                                                style="display: <?php echo $displayLogin ?>;">
                                                <!-- <div class="form-group">
                                                <input type="text" name="nombre" id="username" tabindex="1" class="form-control text-center" placeholder="Username" value="">
                                            </div> -->
                                                <div class="form-group">
                                                    <input type="email" name="email" id="email" tabindex="1"
                                                        class="form-control text-center" placeholder="Email" value=""
                                                        required>
                                                </div>
                                                <div class="form-group">
                                                    <input type="password" name="password" id="password" tabindex="2"
                                                        class="form-control text-center" placeholder="Password"
                                                        required>
                                                </div>

                                                <div class="form-group">
                                                    <div class="row justify-content-center">
                                                        <div class="col-sm-12 col-md-6 col-sm-offset-3">
                                                            <input type="submit" name="bLogin" id="login-submit"
                                                                tabindex="4"
                                                                class="form-control btn btn-login btn-primary"
                                                                value="Log In">
                                                        </div>
                                                    </div>
                                                </div>

                                            </form>
                                            <!-- fin formulario de login -->
                                            <div class="form-group">
                                                <div class="row">
                                                    <div class="col-12">
                                                        <div class="text-center">
                                                            <a href="index.php?ctl=resetPassword" tabindex="5"
                                                                class="forgot-password <?php echo $display ?>">Forgot
                                                                Password?</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- botones inicio mediante redes sociales -->
                                            <div class="row p-2 <?php echo $display ?>">
                                                <div class="col-4 ">
                                                    <button onclick="facebookSignIn()"
                                                        class="btn btn-block btn-facebook " id="btnLoginFacebook">
                                                        <i class="fa fa-facebook fa-fw"></i> Login
                                                    </button>
                                                </div>

                                                <div class="col-4 ">
                                                    <button onclick="googleSignIn()" class="btn btn-block btn-google"
                                                        id="btnLoginGoogle">
                                                        <i class="fa fa-google fa-fw"></i>Login
                                                    </button>
                                                </div>

                                                <div class="col-4 ">
                                                    <button onclick="twitterSignIn()" class="btn btn-block  btn-twitter"
                                                        id="btnLoginTwitter">
                                                        <i class="fa fa-twitter fa-fw"></i> Login
                                                    </button>
                                                </div>

                                            </div>
                                            <!-- fin inicio redes sociales -->
                                        </div>


                                        <br>



                                        <!--formulario de registro -->
                                        <form class="p-2" id="register-form" action="index.php?ctl=register"
                                            method="post" role="form" style="display: <?php echo $displayRegister ?>;">
                                            <div class="form-group">
                                                <input type="text" name="nombre" id="usernamereg" tabindex="1"
                                                    class="form-control text-center" placeholder="Username" value=""
                                                    required>
                                            </div>
                                            <div class="form-group">
                                                <input type="email" name="email" id="email" tabindex="1"
                                                    class="form-control text-center" placeholder="Email Address"
                                                    value="" required>
                                            </div>
                                            <div class="form-group">
                                                <input type="password" name="password" id="passwordreg" tabindex="2"
                                                    class="form-control text-center" placeholder="Password" required>
                                            </div>
                                            <!-- <div class="form-group">
                                                <input type="password" name="confirm-password" id="confirm-password"
                                                    tabindex="2" class="form-control" placeholder="Confirm Password">
                                            </div> -->
                                            <div class="form-group">
                                                <input type="text" name="ciudad" id="ciudad" tabindex="2"
                                                    class="form-control text-center" placeholder="Ciudad" required>
                                            </div>
                                            <div class="form-group">
                                                <div class="row justify-content-center">
                                                    <div class="col-sm-6 col-sm-offset-3">
                                                        <input type="submit" name="bRegister" id="register-submit"
                                                            tabindex="4"
                                                            class="form-control btn btn-register btn-secondary"
                                                            value="Register Now">
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
                    $fondoRojo = "text-center alert alert-danger";
                } else {
                    $fondoRojo = '';
                } ?>

                <h3 class="<?php echo $fondoRojo ?>" role="alert"><?php echo $params['mensaje'];
                                                                    $params['mensaje'] = ''; ?></h3>

            </div>
            <!-- fin mensaje de error -->

        </div>




        <!-- footer -->

        <footer id="pie" class="row   bg-light  justify-content-center p-4 mt-5">

            <div class="  col-md-5 text-center text-dark bg-light">


                <div class="elementor-align-center  elementor-widget-button">
                    <a href="mailto:" class="" role="button">info@gestioninmobiliaria.com</a>
                </div>
                <div class="  elementor-align-center elementor-widget elementor-widget-button">
                    <a href="tel:+34-698-415-282" class="" role="button">tel: +34 698 415 282</a>
                </div>



                <div
                    class="elementor-element  elementor-shape-rounded elementor-widget elementor-widget-global  elementor-widget-social-icons">
                    <div class="elementor-widget-container">
                        <div>
                            <a href="https://www.facebook.com/"
                                class="elementor-icon elementor-social-icon elementor-social-icon-facebook "
                                target="_blank">
                                <span class="elementor-screen-only"></span>
                                <i class="fa fa-facebook"></i>
                            </a>
                            <a href="https://twitter.com/"
                                class="elementor-icon elementor-social-icon elementor-social-icon-twitter "
                                target="_blank">
                                <span class="elementor-screen-only"></span>
                                <i class="fa fa-twitter"></i>
                            </a>
                            <a href="https://www.linkedin.com/"
                                class="elementor-icon elementor-social-icon elementor-social-icon-linkedin "
                                target="_blank">
                                <span class="elementor-screen-only"></span>
                                <i class="fa fa-linkedin"></i>
                            </a>
                            <a href="https://www.instagram.com/"
                                class="elementor-icon elementor-social-icon elementor-social-icon-instagram "
                                target="_blank">
                                <span class="elementor-screen-only"></span>
                                <i class="fa fa-instagram"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="elementor-element  elementor-widget elementor-widget-heading">
                    <div class="elementor-widget-container">
                        <span id="copyright">Antonio Rodríguez</span>
                        <p class="elementor-heading-title elementor-size-default">©<?php echo date("Y", time()) ?>
                            Spain.</p>
                    </div>
                </div>
            </div>

        </footer>
        <!-- Fin footer -->

    </div>


    <!-- --------------------S C R I P T S ------------------------  -->

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
    <script src="./app/libs/authFirebase.js"></script>



</body>

</html>
