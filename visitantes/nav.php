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
        
        <!-- DataTables JS library -->
        <script type="text/javascript" src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>

        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="./../assets/favicon.ico" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="./../css/styles.css" rel="stylesheet" />
    </head>
    <body>

    <style>
        .cartera, .ahorros {
        color: black !important;
        }
    </style>

    <div class="d-flex" id="wrapper">
            <!-- Sidebar-->
            <div class="border-end bg-white" id="sidebar-wrapper">
                <div class="sidebar-heading border-bottom bg-light">Sistema Pagos</div>
                <div class="list-group list-group-flush">
                    <a class="list-group-item list-group-item-action list-group-item-light p-3" href="locales.php">Puestos</a>
                    <a class="list-group-item list-group-item-action list-group-item-light p-3" href="personas.php">Personas</a>
                    <li class="nav-item dropdown" id="lista">
                                    <a class="nav-link dropdown-toggle cartera" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Cartera</a>
                                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="cartera.php">Cartera Actual</a>
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item" href="cartera_vencida.php">Cartera Vencida</a>
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item" href="cartera_x_persona.php">Cartera X Persona</a>
                                    </div>
                    </li>
                    <!--<a class="list-group-item list-group-item-action list-group-item-light p-3" href="cartera.php">Cartera</a>-->
                    <!--<a class="list-group-item list-group-item-action list-group-item-light p-3" href="ahorros.php">Ahorros</a>-->
                    <li class="nav-item dropdown" id="lista">
                                    <a class="nav-link dropdown-toggle ahorros" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Ahorros</a>
                                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="ahorros.php">Pendientes por Pagar</a>
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item" href="ahorros_total.php">Registro de Ahorros</a>
                                    </div>
                    </li>

                    <li class="nav-item dropdown" id="lista">
                                    <a class="nav-link dropdown-toggle ahorros" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Abonos</a>
                                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="abonos.php">Registro de Abonos</a>
                                    </div>
                    </li>
                    <!--<a class="list-group-item list-group-item-action list-group-item-light p-3" href="#!">Informes</a>-->

                    <li class="nav-item dropdown" id="lista">
                                    <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Informes</a>
                                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="ingresos_informe.php">Total Ingresos</a>
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item" href="cartera_informe.php">Total Cartera</a>
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item" href="ahorros_informe.php">Total Ahorro</a>
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item" href="informes_dia.php">Total Ingresos por Dias</a>
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
                                <li><li><img src="../assets/logo-asomercobu.png" alt="Fuente" class="d-none d-md-block" style="height: 36px; margin-right: 10px; margin-top: 3px;"></li></li>
                                <li class="nav-item active"><a class="nav-link" href="locales.php">Inicio</a></li>
                                <li class="nav-item"><a class="nav-link" href="cerrar_sesion.php">Cerrar Sesión</a></li>
                            </ul>
                        </div>
                    </div>
                </nav>
                <!-- Page content-->
                <div>
                    <br>
                    <div class="bs-example">
                        <!---debajo de este div, en la clase container fluid me sirve para que el contenido abarque mas la pantalla-->
<div class="container-fluid">
<div class="row">
<div class="col-md-12">
<div class="page-header clearfix">

        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="./../js/scripts.js"></script>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>

        <!--<script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>-->
        <!--<script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap4.min.js"></script>-->

        <script src="https://cdn.datatables.net/buttons/2.3.6/js/dataTables.buttons.min.js"></script>
        <script src="https://cdn.datatables.net/buttons/2.3.6/js/buttons.bootstrap4.min.js"></script>
        <script src="https://cdn.datatables.net/buttons/2.3.6/js/buttons.html5.min.js"></script>
        <script src="https://cdn.datatables.net/buttons/2.3.6/js/buttons.print.min.js"></script>


        <!--<link href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap4.min.css" rel="stylesheet"/>-->
        <link href="https://cdn.datatables.net/buttons/2.3.6/css/buttons.bootstrap4.min.css" rel="stylesheet"/>
 
    </body>
</html>
