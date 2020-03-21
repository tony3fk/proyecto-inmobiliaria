<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />

    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css" />
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>


    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css" />
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>

    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" />
    <link href="https://fonts.googleapis.com/css?family=Press+Start+2P&display=swap" rel="stylesheet" />


    <title>Gestión Inmobiliaria</title>


</head>

<body>

    <div class="container-fluid">

        <nav class=" row col-12 navbar navbar-expand-sm bg-dark navbar-dark justify-content-end ">
            <ul class="navbar-nav">

                <li class="nav-item ">
                    <h3 class="nav-link"><?php echo "Hola " . $_SESSION['nombre'] . " - "; ?></h3>
                </li>
                <li class="nav-item active">
                    <h3 class="nav-link"><?php echo $_SESSION['ciudad'] . ", " . $_SESSION['temp'] . "ºC"; ?></h3>
                </li>



            </ul>
        </nav>
        <div class="row jumbotron justify-content-center">
            <h1>Gestión Inmobiliaria</h1>

        </div>

        <div class="row">
            <nav class="col-12 navbar navbar-expand-sm bg-light justify-content-between">
                <ul class="nav nav-pills nav-justified">
                    <li class="nav-item">
                        <h3><a href="index.php?ctl=inicio">inicio</a></h3>
                    </li>
                    <li class="nav-item">
                        <h3><a href="index.php?ctl=listar">ver inmuebles</a></h3>
                    </li>
                    <li class="nav-item">
                        <h3><a href="index.php?ctl=insertar">insertar inmueble</a></h3>
                    </li>
                    <li class="nav-item">
                        <h3><a href="index.php?ctl=buscarPorProvincia">buscar por provincia</a></h3>
                    </li>
                    <li class="nav-item">
                        <h3><a href="index.php?ctl=buscarPorOperacion">buscar por operación</a></h3>
                    </li>
                    <li class="nav-item">
                        <h3><a href="index.php?ctl=salir">Salir</a></h3>
                    </li>
                </ul>
        </div>



        <div class="row" id="contenido">
            <h1><?php echo $contenido ?></h1>
        </div>

        <footer>
            <hr />
            <div align="center">- pie de página -</div>
        </footer>
    </div>
</body>

</html>
