<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />

    <link rel="stylesheet" type="text/css" href="web/css/reset.css" />

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" />

    <link rel='stylesheet' id='elementor-frontend-css' href='http://strohlsf.com/wp-content/plugins/elementor/assets/css/frontend.min.css?ver=2.8.5' type='text/css' media='all' />


    <!-- <link rel="stylesheet" href="css/bootstrap/css/bootstrap" id="bootstrap-css"> -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css" />

    <link rel="stylesheet" type="text/css" href="web/css/estilo.css" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-social/5.1.1/bootstrap-social.css">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">

    <script src="https://www.gstatic.com/firebasejs/ui/4.5.0/firebase-ui-auth.js"></script>
    <link type="text/css" rel="stylesheet" href="https://www.gstatic.com/firebasejs/ui/4.5.0/firebase-ui-auth.css" />
    <script src="https://www.gstatic.com/firebasejs/7.14.0/firebase-app.js"></script>



    <!-- <script src="../app/libs/geolocalizacion.js"></script> -->

    <script src="https://code.jquery.com/jquery-1.11.1.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
    <script src="web/css/bootstrap/js/bootstrap.js"></script>




    <title>Login Gestión Inmobiliaria</title>



</head>

<body class="bg-light">
    <div class="container-fluid ">
        <header class=" row  navbar bg-dark justify-content-center ">
            <ul>
                <li>
                    <h1 class="text-warning display-1 title ">Gestión Inmobiliaria</h1>
                </li>
                <h2 class="text-muted">Reset Password</h2>
            </ul>
        </header>
        <br><br>
        <h1 class="text-center">Reset Your Account Password</h1>
        <br>
        <br>


        <div class="row">
            <div class="col-4"></div>
            <div class="col-4">
                <form id="reset-form" action="index.php?ctl=resetPassword" method="post" role="form">
                    <!-- <div class="form-group">
                        <input type="text" name="nombre" id="usernamereg" tabindex="1" class="form-control text-center"
                            placeholder="USERNAME" value="">
                    </div> -->

                    <div class="form-group">
                        <input type="email" name="email" id="email" tabindex="1" class="form-control text-center" placeholder="EMAIL" value="" required>
                    </div>

                    <div class="form-group">
                        <input type="password" name="password" id="passwordreg" tabindex="2" class="form-control text-center" placeholder="PASSWORD" required>
                    </div>
                    <div class="form-group">
                        <input type="password" name="confirm_password" id="passwordreg" tabindex="2" class="form-control text-center" placeholder="CONFIRM PASSWORD" required>
                    </div>


                    <div class="form-group">
                        <div class="row">
                            <div class="col-sm-6 col-sm-offset-3">
                                <input type="submit" name="bReset" id="reset-submit" tabindex="4" class="form-control btn btn-register btn-secondary" value="Reset Password">
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-4"></div>
        </div>


        <!-- mensaje de error -->
        <div class=" row justify-content-center">

            <?php if ($_SESSION['mensaje'] != '') {
                $fondoRojo = "text-center alert alert-danger";
            } else {
                $fondoRojo = '';
            } ?>

            <h3 class="<?php echo $fondoRojo ?>" role="alert"><?php echo $_SESSION['mensaje'];
                                                                //$params['mensaje'] = ''; 
                                                                ?></h3>

        </div>
        <!-- fin mensaje de error -->


    </div>
    <!-- footer -->

    <footer id="pie" class="row  fixed-bottom bg-light  justify-content-center p-4">

        <div class="  col-md-5 text-center text-dark bg-light">


            <div class="elementor-align-center  elementor-widget-button">
                <a href="mailto:" class="" role="button">info@gestioninmobiliaria.com</a>
            </div>
            <div class="  elementor-align-center elementor-widget elementor-widget-button">
                <a href="tel:+34-698-415-282" class="" role="button">tel: +34 698 415 282</a>
            </div>



            <div class="elementor-element  elementor-shape-rounded elementor-widget elementor-widget-global  elementor-widget-social-icons">
                <div class="elementor-widget-container">
                    <div>
                        <a href="https://www.facebook.com/" class="elementor-icon elementor-social-icon elementor-social-icon-facebook " target="_blank">
                            <span class="elementor-screen-only"></span>
                            <i class="fa fa-facebook"></i>
                        </a>
                        <a href="https://twitter.com/" class="elementor-icon elementor-social-icon elementor-social-icon-twitter " target="_blank">
                            <span class="elementor-screen-only"></span>
                            <i class="fa fa-twitter"></i>
                        </a>
                        <a href="https://www.linkedin.com/" class="elementor-icon elementor-social-icon elementor-social-icon-linkedin " target="_blank">
                            <span class="elementor-screen-only"></span>
                            <i class="fa fa-linkedin"></i>
                        </a>
                        <a href="https://www.instagram.com/" class="elementor-icon elementor-social-icon elementor-social-icon-instagram " target="_blank">
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







</body>

</html>
