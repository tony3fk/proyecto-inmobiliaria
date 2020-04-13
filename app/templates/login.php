<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />

    <link rel="stylesheet" type="text/css" href="css/reset.css" />

    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" />

    <link rel='stylesheet' id='elementor-frontend-css'
        href='http://strohlsf.com/wp-content/plugins/elementor/assets/css/frontend.min.css?ver=2.8.5' type='text/css'
        media='all' />


    <!-- <link rel="stylesheet" href="css/bootstrap/css/bootstrap" id="bootstrap-css"> -->
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css" />

    <link rel="stylesheet" type="text/css" href="./css/estilo.css" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-social/5.1.1/bootstrap-social.css">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">

    <script src="https://www.gstatic.com/firebasejs/ui/4.5.0/firebase-ui-auth.js"></script>
    <link type="text/css" rel="stylesheet" href="https://www.gstatic.com/firebasejs/ui/4.5.0/firebase-ui-auth.css" />


    <!-- <script src="../app/libs/geolocalizacion.js"></script> -->

    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
    <script src="css/bootstrap/js/bootstrap.js"></script>

    <!-- <script>
    $.get("http://ipinfo.io", function(response) {
        var provincia = response.region;
        console.log(provincia);
        document.cookie = 'provincia=' + provincia;
    }, "jsonp");

    //crea la $_COOKIE['provincia] según la ip del navegador.
    </script> -->


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


            <div class="container">
                <div class="row">

                    <div class="col-md-6 col-md-offset-3">
                        <div class="panel panel-login">

                            <?php if ($_SESSION['tipo'] == 2) { //si el logueado es admin, es porque accede desde el menú de administrador y se oculta la opción de login
                                $displayLogin = " none";
                                $displayRegister = " block";
                                $display = "d-none";
                            } else {
                                $displayLogin = " block";
                                $displayRegister = " none";
                                $display = "";
                            }
                            ?>




                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-6">
                                        <a href="#" class="btn btn-outline-primary <?php echo $display ?>"
                                            id="login-form-link">Login</a>
                                    </div>
                                    <div class="col-xs-6">
                                        <a href="#" class="btn btn-outline-secondary "
                                            id="register-form-link">Register</a>
                                    </div>
                                </div>
                                <hr>
                            </div>




                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-12">



                                        <form id="login-form" action="index.php?ctl=login" method="post" role="form"
                                            style="display: <?php echo $displayLogin ?>;">
                                            <div class="form-group">
                                                <input type="text" name="nombre" id="username" tabindex="1"
                                                    class="form-control text-center" placeholder="Username" value="">
                                            </div>
                                            <div class="form-group">
                                                <input type="password" name="password" id="password" tabindex="2"
                                                    class="form-control text-center" placeholder="Password">
                                            </div>

                                            <div class="form-group">
                                                <div class="row">
                                                    <div class="col-sm-6 col-sm-offset-3">
                                                        <input type="submit" name="bLogin" id="login-submit"
                                                            tabindex="4" class="form-control btn btn-login btn-primary"
                                                            value="Log In">
                                                    </div>
                                                </div>


                                            </div>
                                            <div class="form-group">
                                                <div class="row">
                                                    <div class="col-12">
                                                        <div class="text-center">
                                                            <a href="https://phpoll.com/recover" tabindex="5"
                                                                class="forgot-password">Forgot Password?</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                        <br>

                                        <!-- botones inicio social -->
                                        <div class=" row">
                                            <div class="col-sm-4 ">
                                                <a href="#" class="btn btn-block btn-social btn-facebook"
                                                    id="btnLoginFacebook">
                                                    <span class="fa fa-facebook">Login </span>
                                                </a>
                                            </div>

                                            <div class="col-sm-4 ">
                                                <button onclick="googleSignIn()"
                                                    class="btn btn-block btn-social btn-google" id="btnLoginGoogle">
                                                    <span class="fa fa-google">Google SignIn</span>
                                                </button>
                                            </div>

                                            <div class="col-sm-4 ">
                                                <a href="#" class="btn btn-block btn-social btn-twitter"
                                                    id="btnLoginTwitter">
                                                    <span class="fa fa-twitter ">Login </span>
                                                </a>
                                            </div>

                                        </div>





                                        <form id="register-form" action="index.php?ctl=register" method="post"
                                            role="form" style="display: <?php echo $displayRegister ?>;">
                                            <div class="form-group">
                                                <input type="text" name="nombre" id="usernamereg" tabindex="1"
                                                    class="form-control" placeholder="Username" value="" required>
                                            </div>
                                            <div class="form-group">
                                                <input type="email" name="email" id="email" tabindex="1"
                                                    class="form-control" placeholder="Email Address" value="" required>
                                            </div>
                                            <div class="form-group">
                                                <input type="password" name="password" id="passwordreg" tabindex="2"
                                                    class="form-control" placeholder="Password" required>
                                            </div>
                                            <!-- <div class="form-group">
                                                <input type="password" name="confirm-password" id="confirm-password"
                                                    tabindex="2" class="form-control" placeholder="Confirm Password">
                                            </div> -->
                                            <div class="form-group">
                                                <input type="text" name="ciudad" id="ciudad" tabindex="2"
                                                    class="form-control" placeholder="Ciudad" required>
                                            </div>
                                            <div class="form-group">
                                                <div class="row">
                                                    <div class="col-sm-6 col-sm-offset-3">
                                                        <input type="submit" name="bRegister" id="register-submit"
                                                            tabindex="4"
                                                            class="form-control btn btn-register btn-secondary"
                                                            value="Register Now">
                                                    </div>
                                                </div>
                                            </div>
                                        </form>





                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- formulario login -->
            <!-- <div class="row  justify-content-center align-items-center ">
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

                            </div>

                        </fieldset>

                    </form>

                    <form action="index.php?ctl=register" method="POST">
                        <h5 class="text-dark">No tienes cuenta?</h5>
                        <input type="submit" class="btn btn-warning" value="Regístrate" name="bRegister" />
                    </form>

                </div>
            </div> -->

            <!-- fin formulario login -->





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






        <footer id="pie" class="row  fixed-bottom bg-light  justify-content-center p-4 ">

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
                        <div class="elementor-social-icons-wrapper">
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


    </div>

    <script>
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

    <script src="../app/libs/googleFirebase.js"></script>







</body>

</html>
