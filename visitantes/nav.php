<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Sistema de Cartera</title>
        
        <!-- DataTables CSS library -->
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css"/>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
        <!-- DataTables JS library -->
        <script type="text/javascript" src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>

        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="./../css/styles.css" rel="stylesheet" />
    </head>
    <body>

    <div class="d-flex" id="wrapper">
            <!-- Sidebar-->
            <div class="border-end bg-white" id="sidebar-wrapper">
                <div class="sidebar-heading border-bottom bg-light">Sistema Pagos</div>
                <div class="list-group list-group-flush">
                    <!--<a class="list-group-item list-group-item-action list-group-item-light p-3" href="ingresos.php">Ingresos</a>-->
                    <a class="list-group-item list-group-item-action list-group-item-light p-3" href="locales.php">Puestos</a>
                    <a class="list-group-item list-group-item-action list-group-item-light p-3" href="personas.php">Personas</a>
                    <a class="list-group-item list-group-item-action list-group-item-light p-3" href="cartera.php">Cartera</a>
                    <a class="list-group-item list-group-item-action list-group-item-light p-3" href="ahorros.php">Ahorros</a>
                    <!--<a class="list-group-item list-group-item-action list-group-item-light p-3" href="#!">Informes</a>-->

                    <li class="nav-item dropdown" id="lista">
                                    <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Informes</a>
                                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="ingresos_informe.php">Total Ingresos</a>
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item" href="cartera_informe.php">Total Cartera</a>
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item" href="ahorros_informe.php">Total Ahorro</a>
                                    </div>
                    </li>
                </div>
            </div>
            <!-- Page content wrapper-->
            <div id="page-content-wrapper">
                <!-- Top navigation-->
                <nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom">
                <div class="container-fluid">
                        <button class="btn btn-primary" id="sidebarToggle">Mostrar/Ocultar</button>
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <ul class="navbar-nav ms-auto mt-2 mt-lg-0">
                                <li class="nav-item active"><a class="nav-link" href="locales.php">Inicio</a></li>
                                <!--<li class="nav-item"><a class="nav-link" href="admin.php">Cuentas</a></li>-->
                                <li class="nav-item"><a class="nav-link" href="cerrar_sesion.php">Cerrar Sesión</a></li>
                            </ul>
                        </div>
                    </div>
                </nav>
                <!-- Page content-->
                <div>
                    <br>
                    <div class="bs-example">
<div class="container">
<div class="row">
<div class="col-md-12">
<div class="page-header clearfix">

        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="./../js/scripts.js"></script>
    </body>
</html>
