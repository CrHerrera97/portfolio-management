<?php
  // Iniciar la sesión
  session_start();
  if(isset($_SESSION['username'])) {
      header('Location: ingresos.php');
  }else{
    header('Location: login.php');
  }
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Simple Sidebar - Start Bootstrap Template</title>
    </head>
    <body>
        <?php
        include 'nav.php';
        ?>

<style>
        #lista {
            list-style:none;
        }
    </style>

<!--
<div class="d-flex" id="wrapper">

            <div class="border-end bg-white" id="sidebar-wrapper">
                <div class="sidebar-heading border-bottom bg-light">Sistema Pagos</div>
                <div class="list-group list-group-flush">
                    <a class="list-group-item list-group-item-action list-group-item-light p-3" href="ingresos.php">Ingresos</a>
                    <a class="list-group-item list-group-item-action list-group-item-light p-3" href="locales.php">Locales</a>
                    <a class="list-group-item list-group-item-action list-group-item-light p-3" href="personas.php">Personas</a>
                    <a class="list-group-item list-group-item-action list-group-item-light p-3" href="cartera.php">Cartera</a>
                    <a class="list-group-item list-group-item-action list-group-item-light p-3" href="ahorros.php">Ahorros</a>
                  <a class="list-group-item list-group-item-action list-group-item-light p-3" href="#!">Informes</a>

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

            <div id="page-content-wrapper">
               Top navigation
                <nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom">
                <div class="container-fluid">
                        <button class="btn btn-primary" id="sidebarToggle">Mostrar/Ocultar</button>
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <ul class="navbar-nav ms-auto mt-2 mt-lg-0">
                                <li class="nav-item active"><a class="nav-link" href="#!">Inicio</a></li>
                                <li class="nav-item"><a class="nav-link" href="#!">Cerrar Sesión</a></li>
                            </ul>
                        </div>
                    </div>
                </nav>
               Page content

            </div>
        </div>

    -->

    </body>
</html>
