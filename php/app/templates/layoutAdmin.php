<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/proyectoFinal/interfaces/style.css">
    <link rel="stylesheet" href="/proyectoFinal/interfaces/calendar11.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link href=" https://cdn.rawgit.com/nizarmah/calendar-javascript-lib/master/calendarorganizer.min.css " rel=" stylesheet " />
    <title>Dan Florea</title>
    <script src="https://kit.fontawesome.com/2c36e9b7b1.js"></script>
</head>

<body>
    <header>
        <nav class="navbar navbar-expand-md navbar-dark bg-danger justify-content-between">

            <div class="d-flex">
                <div class="col-4">
                    <img src="/proyectoFinal/php/app/img/icono2.png" alt="No se encuentra icono" id="icono" style="height:70px;">
                </div>
                <div class="col-8 text-center mt-3">
                    <h2 class="text-dark">Motos cart</h2>
                </div>
            </div>
            <div>
                <div>
                    <?php if (isset($_SESSION['usuario'])) { ?>
                        <div class="row">
                            <div class="col col-9">
                                <ul class="navbar-nav mr-auto mt-2 my-lg-0 btn btn-dark ">
                                    <li class="nav-item dropdown">
                                        <a class="nav-link dropdown-toggle " href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <?php echo ucfirst($_SESSION['usuario']); ?>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right bg-dark " aria-labelledby="navbarDropdownMenuLink">
                                            <a class="dropdown-item  text-light" href="" id="inicio">Iniciar Sesion</a>
                                            <?php if (isset($_SESSION['nivel']) && $_SESSION['nivel'] == 1) { ?>
                                                <a class="dropdown-item  text-light" href="index.php?operacion=home" id="inicio">Pagina Usuarios</a>
                                            <?php } ?>
                                        </div>
                                </ul>
                            </div>
                            <div class="col col-3"></div>
                        </div>
                    <?php } else { ?>
                        <div><a href="" class="btn btn-dark btn-sm" id="inicio">Iniciar Sesion</a></div>
                    <?php } ?>
                </div>
            </div>
        </nav>
        <nav class="navbar navbar-expand-md navbar-dark  justify-content-around" style="background-color: #000000;">
            <div class="d-flex flex-row-reverse bd-highlight">
                <button class="navbar-toggler p2  bd-highlight" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon "></span>
                </button>
            </div>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto " id="Activar">
                    <li class="nav-item active" id="home">
                        <a class="nav-link" href="index.php?operacion=homeAdmin">HOME</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php?operacion=OpUsuarios" id="contacto">Operaciones usuarios</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> Operaciones productos</a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="index.php?operacion=OpProductos">Pagina principal</a>
                            <a class="dropdown-item" href="index.php?operacion=PaginaMarcas">Operaciones con marcas</a>
                            <a class="dropdown-item" href="index.php?operacion=PaginaProducto">Operaciones con productos</a>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php?operacion=Opfechas" id="reservas">Operaciones fechas</a>
                    </li>
                </ul>
                <form class="form-inline my-2 my-lg-0">
                    <input class="form-control mr-sm-2" type="search" placeholder="¿Que buscas?" aria-label="Search">
                    <button class="btn btn-outline-danger my-2 my-sm-0" type="submit">Buscar</button>
                </form>
            </div>
        </nav>
    </header>
    <main>
        <div id="contenido" class="text-light fullHeight ">
            <?php echo $contenido; ?>
        </div>
    </main>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

    <script src="/proyectoFinal/javaScript/ConfPag.js"></script>
    <script src="/proyectoFinal/javaScript/ConfigurarFechas.js"></script>
    <script src="/proyectoFinal/javaScript/MostrarErroresSubirImagenes.js"></script>
    <script src="/proyectoFinal/javaScript/EnrutarPaginas.js"></script>
    <script src="/proyectoFinal/javaScript/ConfiguracionUser.js"></script>
    <script src="/proyectoFinal/javaScript/Contactanos.js"></script>
    <script src="/proyectoFinal/javaScript/ConfiguracionProductos.js"></script>

</body>

</html>