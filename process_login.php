<?php
  // Conexión a la base de datos
  $servername = "localhost";
  $username = "root";
  $password = "";
  $dbname = "sistema_pagos";
  $conn = mysqli_connect($servername, $username, $password, $dbname);

  // Verificar la conexión
  if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
  }

  // Obtener los datos del formulario de inicio de sesión
  $username = $_POST["username"];
  $password = $_POST["password"];

  // Consulta a la base de datos para verificar las credenciales
  $sql = "SELECT * FROM users WHERE nombre='$username' AND password='$password'";
  $result = mysqli_query($conn, $sql);

  //consulta para obtener el tipo de usuario

  $sql2 = "select tipo_id FROM users where nombre = '$username' and password = '$password'";


  if (mysqli_num_rows($result) == 1 && $resultado = $conn->query($sql2)) {
    // Iniciar la sesión
    session_start();
    $_SESSION["username"] = $username;

    $tipo_user = 0;
 
    /* obtener el array de objetos */
    while ($fila = $resultado->fetch_row()) {
        $tipo_user = $fila[0];
    }

    // Redirigir al usuario a la página de inicio de sesión exitosa
    if($tipo_user == 1){
      header("Location: ingresos.php");
      exit();
    }else if ($tipo_user == 2){
      header("Location: visitantes/locales.php");
      exit();
    }
    
  }else {
    // Mostrar un mensaje de error y redirigir al usuario al formulario de inicio de sesión
    echo '<script language="javascript">alert("USUARIO O CONTRASEÑA INCORRECTOS");</script>';
    header( "Refresh:1; url=login.php", true,303);
    exit();
  }
    /* liberar el conjunto de resultados */
    $resultado->close();


/*
  // Verificar si las credenciales son válidas
  if (mysqli_num_rows($result) == 1) {
    // Iniciar la sesión
    session_start();
    $_SESSION["username"] = $username;

    // Redirigir al usuario a la página de inicio de sesión exitosa
    header("Location: ingresos.php");
    exit();
  } else {
    // Mostrar un mensaje de error y redirigir al usuario al formulario de inicio de sesión
    echo "Invalid username or password";
    header("Location: login.php");
    exit();
  }
*/
  // Cerrar la conexión a la base de datos
  mysqli_close($conn);
?>
