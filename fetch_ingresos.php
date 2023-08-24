<?php 


include 'database.php';

$mysqli = $conn;

// Check connection
if ($mysqli -> connect_errno) {
  echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
  exit();
}


/*
TOMAMOS LOS VALORES DE LA PARTE IZQUIERDA DE LA PANTALLA DE LOS INGRESOS
*/ 

$fecha_desde = $_POST['fecha_desde'];
$fecha_hasta = $_POST['fecha_hasta'];
$fecha_pago = $_POST['fecha_pago'];
$persona = $_POST["persona_key"];
$local = $_POST["key_id"];
$recibo = $_POST['recibo'];


//fecha de hoy

//extraemos la fecha actual
date_default_timezone_set("America/Bogota");
$fecha_hoy = date("Y/m/d");
/*
AHORA VAMOS A TOMAR LOS VALORES DE LAS CATEGORIAS
*/

//$categoria = $_POST["categoria"];

//tomamos los valores 
//local toma el valor de key id que es el que hace referencia al id del local

$admon = $_POST["admon"];

$parqueadero = $_POST["parque"];

$agua = $_POST["agua"];

$luz = $_POST["luz"];

$observaciones = $_POST["obs"];

$valor = $_POST["valor"];

//$pendiente = $_POST["pendiente"];

$categoria = $_POST["categoria"];

$otros = $_POST["otros"];


/*
LO QUE HACE EL RADIO BUTTON ES AGRUPAR POR EL NAME A LOS RADIO, QUIERE DECIR QUE AQUÍ YO
ME TRAIGO EL GRUPO LLAMADO "CATEGORIA" Y LUEGO LO IMPRIMO PARA SABER CUAL FUE EL QUE EN EL 
GRUPO DE LOS RADIOS SE PRECIONO

*/

$ingresos = $_POST["categoria"];
$cartera_actual = $_POST["categoria"];
$cartera_vencida = $_POST["categoria"];
$ahorro = $_POST["categoria_2"];
$multas = $_POST["categoria"];


if(isset($_POST['categoria']) && isset($_POST['categoria_2'])){

    //si marca la opcion de ingreso y ahorro

    if($ahorro == "ahorro_radio"){
        if ($valor != 0){
            $sql = "INSERT INTO `ingresos` (`fecha_desde`, `fecha_hasta`, `fecha_ingreso`, `fecha_pago`, `persona_fk`, `local_fk`, `recibo`, `categoria`, `sub_categoria`, `valor`, `abono`, `saldo`,`pendiente`, `observaciones`) VALUES ('$fecha_desde', '$fecha_hasta', '$fecha_hoy', '$fecha_pago', '$persona', '$local', '$recibo', 'ingreso', 'ahorro', '$valor', '0' , '$valor' , 'si', '$observaciones')";
            mysqli_query($mysqli, $sql);
            echo "realizada";
        }
    }

    //si marca la opcion de cartera actual y ahorro

    if($cartera_actual == "cartera_actual_radio"){
        if($valor !=0){
            $sql = "INSERT INTO `ingresos` (`fecha_desde`, `fecha_hasta`, `fecha_ingreso`, `fecha_pago`, `persona_fk`, `local_fk`, `recibo`, `categoria`, `sub_categoria`, `valor`, `abono`, `saldo`, `pendiente`, `observaciones`) VALUES ('$fecha_desde', '$fecha_hasta', '$fecha_hoy', '$fecha_pago', '$persona', '$local', '$recibo', 'cartera', 'ahorro', '$valor', '0' , '$valor' ,'si', '$observaciones')";
            mysqli_query($mysqli, $sql);
            echo "realizada";
        }
    }
}



if  (isset($_POST['categoria'])){
    //hacemos el condicional para que cuando sean ingresos me haga la inserccion solo para ingresos
    if ($ingresos == "ingresos_radio"){
        if ($parqueadero != 0){
            //$sql = "INSERT INTO `ingresos` (`fecha`, `persona_fk`, `local_fk`, `valor`, `servicio`, `pendiente`) VALUES ('$fecha', $persona, $local, $parqueadero, 'parqueadero', '$pendiente')";
            $sql = "INSERT INTO `ingresos` (`fecha_desde`, `fecha_hasta`, `fecha_ingreso`, `fecha_pago`, `persona_fk`, `local_fk`, `recibo`, `categoria`, `sub_categoria`, `valor`, `abono`, `saldo`, `pendiente`, `observaciones`) VALUES ('$fecha_desde', '$fecha_hasta', '$fecha_hoy', '$fecha_pago', '$persona', '$local', '$recibo', 'ingreso', 'parqueadero', '$parqueadero','$parqueadero','0', 'no', '$observaciones')";
            mysqli_query($mysqli, $sql);
            echo "realizada";
        }
        if ($admon != 0){
            $sql = "INSERT INTO `ingresos` (`fecha_desde`, `fecha_hasta`, `fecha_ingreso`, `fecha_pago`, `persona_fk`, `local_fk`, `recibo`, `categoria`, `sub_categoria`, `valor`, `abono`, `saldo`, `pendiente`, `observaciones`) VALUES ('$fecha_desde', '$fecha_hasta', '$fecha_hoy', '$fecha_pago', '$persona', '$local', '$recibo', 'ingreso', 'administracion', '$admon','$admon','0', 'no', '$observaciones')";
            mysqli_query($mysqli, $sql);
            echo "realizada";
        }
        if ($agua != 0){
            $sql = "INSERT INTO `ingresos` (`fecha_desde`, `fecha_hasta`, `fecha_ingreso`, `fecha_pago`, `persona_fk`, `local_fk`, `recibo`, `categoria`, `sub_categoria`, `valor`, `abono`, `saldo`, `pendiente`, `observaciones`) VALUES ('$fecha_desde', '$fecha_hasta', '$fecha_hoy', '$fecha_pago', '$persona', '$local', '$recibo', 'ingreso', 'agua', '$agua','$agua','0', 'no', '$observaciones')";
            mysqli_query($mysqli, $sql);
            echo "realizada";
        }if ($luz != 0){
            $sql = "INSERT INTO `ingresos` (`fecha_desde`, `fecha_hasta`, `fecha_ingreso`, `fecha_pago`, `persona_fk`, `local_fk`, `recibo`, `categoria`, `sub_categoria`, `valor`, `abono`, `saldo`, `pendiente`, `observaciones`) VALUES ('$fecha_desde', '$fecha_hasta', '$fecha_hoy', '$fecha_pago', '$persona', '$local', '$recibo', 'ingreso', 'luz', '$luz','$luz','0', 'no', '$observaciones')";
            mysqli_query($mysqli, $sql);
            echo "realizada";
        }
        if ($otros != 0){
            $sql = "INSERT INTO `ingresos` (`fecha_desde`, `fecha_hasta`, `fecha_ingreso`, `fecha_pago`, `persona_fk`, `local_fk`, `recibo`, `categoria`, `sub_categoria`, `valor`, `abono`, `saldo`, `pendiente`, `observaciones`) VALUES ('$fecha_desde', '$fecha_hasta', '$fecha_hoy', '$fecha_pago', '$persona', '$local', '$recibo', 'ingreso', 'otros', '$otros','$otros','0', 'no', '$observaciones')";
            mysqli_query($mysqli, $sql);
            echo "realizada";
        }

    }else if($cartera_actual == "cartera_actual_radio"){
        if ($parqueadero != 0){
            //$sql = "INSERT INTO `ingresos` (`fecha`, `persona_fk`, `local_fk`, `valor`, `servicio`, `pendiente`) VALUES ('$fecha', $persona, $local, $parqueadero, 'parqueadero', '$pendiente')";
            $sql = "INSERT INTO `ingresos` (`fecha_desde`, `fecha_hasta`, `fecha_ingreso`, `fecha_pago`, `persona_fk`, `local_fk`, `recibo`, `categoria`, `sub_categoria`, `valor`, `abono`, `saldo`, `pendiente`, `observaciones`) VALUES ('$fecha_desde', '$fecha_hasta', '$fecha_hoy', '$fecha_pago', '$persona', '$local', '$recibo', 'cartera', 'parqueadero', '$parqueadero','0', '$parqueadero', 'si', '$observaciones')";
            mysqli_query($mysqli, $sql);
            echo "realizada";
        }
        if ($admon != 0){
            $sql = "INSERT INTO `ingresos` (`fecha_desde`, `fecha_hasta`, `fecha_ingreso`, `fecha_pago`, `persona_fk`, `local_fk`, `recibo`, `categoria`, `sub_categoria`, `valor`, `abono`, `saldo`, `pendiente`, `observaciones`) VALUES ('$fecha_desde', '$fecha_hasta', '$fecha_hoy', '$fecha_pago', '$persona', '$local', '$recibo', 'cartera', 'administracion', '$admon','0','$admon', 'si', '$observaciones')";
            mysqli_query($mysqli, $sql);
            echo "realizada";
        }
        if ($agua != 0){
            $sql = "INSERT INTO `ingresos` (`fecha_desde`, `fecha_hasta`, `fecha_ingreso`, `fecha_pago`, `persona_fk`, `local_fk`, `recibo`, `categoria`, `sub_categoria`, `valor`, `abono`, `saldo`, `pendiente`, `observaciones`) VALUES ('$fecha_desde', '$fecha_hasta', '$fecha_hoy', '$fecha_pago', '$persona', '$local', '$recibo', 'cartera', 'agua', '$agua','0', '$agua', 'si', '$observaciones')";
            mysqli_query($mysqli, $sql);
            echo "realizada";
        }if ($luz != 0){
            $sql = "INSERT INTO `ingresos` (`fecha_desde`, `fecha_hasta`, `fecha_ingreso`, `fecha_pago`, `persona_fk`, `local_fk`, `recibo`, `categoria`, `sub_categoria`, `valor`, `abono`, `saldo`, `pendiente`, `observaciones`) VALUES ('$fecha_desde', '$fecha_hasta', '$fecha_hoy', '$fecha_pago', '$persona', '$local', '$recibo', 'cartera', 'luz', '$luz', '0' , '$luz' ,'si', '$observaciones')";
            mysqli_query($mysqli, $sql);
            echo "realizada";
        }

        if ($otros != 0){
            $sql = "INSERT INTO `ingresos` (`fecha_desde`, `fecha_hasta`, `fecha_ingreso`, `fecha_pago`, `persona_fk`, `local_fk`, `recibo`, `categoria`, `sub_categoria`, `valor`, `abono`, `saldo`, `pendiente`, `observaciones`) VALUES ('$fecha_desde', '$fecha_hasta', '$fecha_hoy', '$fecha_pago', '$persona', '$local', '$recibo', 'cartera', 'otros', '$otros', '0' ,'$otros' ,'si', '$observaciones')";
            mysqli_query($mysqli, $sql);
            echo "realizada";
        }
    }else if($cartera_vencida == "cartera_vencida_radio"){
        if ($valor != 0){
            $sql = "INSERT INTO `ingresos` (`fecha_desde`, `fecha_hasta`, `fecha_ingreso`, `fecha_pago`, `persona_fk`, `local_fk`, `recibo`, `categoria`, `sub_categoria`, `valor`, `abono`, `saldo`,`pendiente`, `observaciones`) VALUES ('$fecha_desde', '$fecha_hasta', '$fecha_hoy', '$fecha_pago', '$persona', '$local', '$recibo', 'cartera', 'vencida', '$valor', '0' , '$valor' , 'si', '$observaciones')";
            mysqli_query($mysqli, $sql);
            echo "realizada";
        }
    }else if($multas == "multas_radio"){
        if ($valor != 0){
            $sql = "INSERT INTO `ingresos` (`fecha_desde`, `fecha_hasta`, `fecha_ingreso`, `fecha_pago`, `persona_fk`, `local_fk`, `recibo`, `categoria`, `sub_categoria`, `valor`, `abono`, `saldo`, `pendiente`, `observaciones`) VALUES ('$fecha_desde', '$fecha_hasta', '$fecha_hoy', '$fecha_pago', '$persona', '$local', '$recibo', 'cartera', 'multas', '$valor','0','$valor', 'si', '$observaciones')";
            mysqli_query($mysqli, $sql);
            echo "realizada";
        }
    }
    
}

//el valor de pendiente es para que si el pago está pendiente me haga una inserción en la tabla de cartera

/*
$pendiente = $_POST["pendiente"];

if ($pendiente === "SI"){
    echo "pague papá";
}
*/
/*
if ($pendiente === "si"){
    if ($cartera != 0){
        $sql = "INSERT INTO `cartera` (`fecha`, `persona_fk`, `local_fk`, `valor`, `servicio`, `pendiente`) VALUES ('$fecha', $persona, $local, $cartera, 'cartera', '$pendiente')";
        mysqli_query($mysqli, $sql);
        echo "realizada";
        echo $fecha;
    }
    if ($parqueadero != 0){
        $sql = "INSERT INTO `cartera` (`fecha`, `persona_fk`, `local_fk`, `valor`, `servicio`, `pendiente`) VALUES ('$fecha', $persona, $local, $parqueadero, 'parqueadero', '$pendiente')";
        mysqli_query($mysqli, $sql);
        echo "realizada";
    }
    if ($admon != 0){
        $sql = "INSERT INTO `cartera` (`fecha`, `persona_fk`, `local_fk`, `valor`, `servicio`, `pendiente`) VALUES ('$fecha', $persona, $local, $admon, 'administracion', '$pendiente')";    
        mysqli_query($mysqli, $sql);
        echo "realizada";
    }
    if ($agua != 0){
        $sql = "INSERT INTO `cartera` (`fecha`, `persona_fk`, `local_fk`, `valor`, `servicio`, `pendiente`) VALUES ('$fecha', $persona, $local, $agua, 'agua', '$pendiente')";    
        mysqli_query($mysqli, $sql);
        echo "realizada";
    }if ($luz != 0){
        $sql = "INSERT INTO `cartera` (`fecha`, `persona_fk`, `local_fk`, `valor`, `servicio`, `pendiente`) VALUES ('$fecha', $persona, $local, $luz, 'luz', '$pendiente')";    
        mysqli_query($mysqli, $sql);
        echo "realizada";
    }
    if ($multas != 0){
        $sql = "INSERT INTO `cartera` (`fecha`, `persona_fk`, `local_fk`, `valor`, `servicio`, `pendiente`) VALUES ('$fecha', $persona, $local, $multas, 'multas', '$pendiente')";    
        mysqli_query($mysqli, $sql);
        echo "realizada";
    }
    if ($ahorro != 0){
        $sql = "INSERT INTO `ahorros` (`fecha`, `persona_fk`, `valor`, `pendiente`) VALUES ('$fecha', $persona, $ahorro, '$pendiente')";    
        mysqli_query($mysqli, $sql);
        echo "realizada";
    }
}else{
    if ($cartera != 0){
        $sql = "INSERT INTO `ingresos` (`fecha`, `persona_fk`, `local_fk`, `valor`, `servicio`, `pendiente`) VALUES ('$fecha', $persona, $local, $cartera, 'cartera', '$pendiente')";
        mysqli_query($mysqli, $sql);
        echo "realizada";
        echo $fecha;
    }
    if ($parqueadero != 0){
        $sql = "INSERT INTO `ingresos` (`fecha`, `persona_fk`, `local_fk`, `valor`, `servicio`, `pendiente`) VALUES ('$fecha', $persona, $local, $parqueadero, 'parqueadero', '$pendiente')";
        mysqli_query($mysqli, $sql);
        echo "realizada";
    }
    if ($admon != 0){
        $sql = "INSERT INTO `ingresos` (`fecha`, `persona_fk`, `local_fk`, `valor`, `servicio`, `pendiente`) VALUES ('$fecha', $persona, $local, $admon, 'administracion', '$pendiente')";    
        mysqli_query($mysqli, $sql);
        echo "realizada";
    }
    if ($agua != 0){
        $sql = "INSERT INTO `ingresos` (`fecha`, `persona_fk`, `local_fk`, `valor`, `servicio`, `pendiente`) VALUES ('$fecha', $persona, $local, $agua, 'agua', '$pendiente')";    
        mysqli_query($mysqli, $sql);
        echo "realizada";
    }if ($luz != 0){
        $sql = "INSERT INTO `ingresos` (`fecha`, `persona_fk`, `local_fk`, `valor`, `servicio`, `pendiente`) VALUES ('$fecha', $persona, $local, $luz, 'luz', '$pendiente')";    
        mysqli_query($mysqli, $sql);
        echo "realizada";
    }
}





