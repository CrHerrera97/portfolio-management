<?php
// Database connection info 
$host='localhost';
$username='root';
$password='';
$dbname = "sistema_pagos";
$conn=mysqli_connect($host,$username,$password,"$dbname");

//PRIMERO EL CRUD DE PERSONAS

if ($_POST['mode'] === 'add_personas') {
$name = $_POST['name'];
$email = $_POST['email'];
mysqli_query($conn, "INSERT INTO personas (nombre,apellido)
VALUES ('$name','$email')");
echo json_encode(true);
}  
if ($_POST['mode'] === 'edit') {
//se comento, lo que se busca es que aparezcan las personas con el nombre y no como una foranea    
$result = mysqli_query($conn,"SELECT * FROM personas WHERE id='" . $_POST['id'] . "'");
//$result = mysqli_query($conn,"SELECT l.id as id, l.numero as numero, l.nombre as nombre, l.descripcion as descripcion, l.servicios as servicios, concat(p.nombre,' ',p.apellido) as nombre_c from locales l INNER JOIN personas p on l.personas_fk = p.id WHERE id = '"_$POST['id']."'");
$row= mysqli_fetch_array($result);
echo json_encode($row);
}   
if ($_POST['mode'] === 'update') {
mysqli_query($conn,"UPDATE personas set  nombre='" . $_POST['name'] . "', apellido='" . $_POST['email'] . "' WHERE id='" . $_POST['id'] . "'");
echo json_encode(true);
}  
if ($_POST['mode'] === 'delete') {
mysqli_query($conn, "DELETE FROM personas WHERE id='" . $_POST["id"] . "'");
$registro_delete = mysqli_query($conn, "DELETE FROM personas WHERE id='" . $_POST["id"] . "'");
echo json_encode(true);

//hay que dejar un evento para que si la persona tiene relación con un local no pueda eliminarla, primero
//debe borrar el registro del local
}


//CRUD DE LOCALES

    if ($_POST['mode'] === 'add_locales') {
    $numero = $_POST['numero'];
    $nombre = $_POST['nombre'];
    $descripcion = $_POST['descripcion'];
    $servicios = $_POST['servicios'];
    $pertenece = $_POST['perteneces_id'];
    mysqli_query($conn, "INSERT INTO locales (numero,nombre,descripcion,servicios,personas_fk)
    VALUES ('$numero','$nombre','$descripcion','$servicios','$pertenece')");
    echo json_encode(true);
    }  
    if ($_POST['mode'] === 'edit_locales') {
    //$result = mysqli_query($conn,"SELECT * FROM locales WHERE id='" . $_POST['id'] . "'");
    $result = mysqli_query($conn,"SELECT l.id, l.numero, l.nombre, l.descripcion,l.servicios, personas_fk, concat(p.nombre,' ',p.apellido) as nombre_c from locales l INNER JOIN personas p on l.personas_fk = p.id WHERE l.id = '". $_POST['id']."'");
    $row= mysqli_fetch_array($result);
    echo json_encode($row);
    }   
    if ($_POST['mode'] === 'update_locales') {
    mysqli_query($conn,"UPDATE locales set  numero='" . $_POST['numero'] . "', nombre='" . $_POST['nombre'] . "', descripcion='" . $_POST['descripcion'] . "', servicios='" . $_POST['servicios'] . "', personas_fk='" . $_POST['pertenece_id'] . "' WHERE id='" . $_POST['id'] . "'");
    echo json_encode(true);
    }  
    if ($_POST['mode'] === 'delete_locales') {
    mysqli_query($conn, "DELETE FROM locales WHERE id='" . $_POST["id"] . "'");
    $registro_delete = mysqli_query($conn, "DELETE FROM locales WHERE id='" . $_POST["id"] . "'");
    echo json_encode(true);
    }


    //CRUD DE CARTERA
    
    if($_POST['mode'] === 'edit_cartera'){
        //$result = mysqli_query($conn,"SELECT * FROM cartera WHERE id='" . $_POST['id'] . "'");
        //$result = mysqli_query($conn,"SELECT c.id, c.fecha, c.persona_fk, concat(p.nombre,' ',p.apellido) as nombre, c.local_fk, l.numero as num_local, c.valor, c.servicio, c.pendiente FROM cartera c INNER JOIN locales l on c.local_fk = l.id INNER JOIN personas p on c.persona_fk = p.id WHERE c.id =  '". $_POST['id']."'");
        $result = mysqli_query($conn,"SELECT i.id, i.fecha_desde,i.fecha_hasta,i.fecha_ingreso, i.persona_fk, concat(p.nombre,' ',p.apellido) as nombre, i.local_fk, l.numero as num_local, i.recibo,i.categoria,i.sub_categoria,i.valor,i.pendiente,i.observaciones FROM ingresos i INNER JOIN locales l on i.local_fk = l.id INNER JOIN personas p on i.persona_fk = p.id WHERE i.id =  '". $_POST['id']."'");
        $row= mysqli_fetch_array($result);
        echo json_encode($row);
    }

    if ($_POST['mode'] === 'update_cartera') {
        mysqli_query($conn,"UPDATE ingresos set  fecha_desde='" . $_POST['fecha_desde'] . "', fecha_hasta='" . $_POST['fecha_hasta'] . "', fecha_ingreso='" . $_POST['fecha_ing'] . "', persona_fk='" . $_POST['perteneces_id'] . "', local_fk='" . $_POST['pertenece_id'] . "', recibo='" . $_POST['recibo'] ."', categoria='" . $_POST['categoria'] . "', sub_categoria='" . $_POST['sub_categ'] . "', valor='" . $_POST['valor'] . "', pendiente='" . $_POST['pendiente'] . "', observaciones='" . $_POST['obs'] . "' WHERE id='" . $_POST['id'] . "'");
        //mysqli_query($conn,"UPDATE cartera set  fecha='" . $_POST['fecha'] . "', persona_fk='" . $_POST['perteneces_id'] . "', local_fk='" . $_POST['pertenece_id'] . "', valor='" . $_POST['valor'] . "', servicio='" . $_POST['servicio'] . "', pendiente='" . $_POST['pendiente'] ."' WHERE id='" . $_POST['id'] . "'");
        echo json_encode(true);
    } 

    //EDIT INFORME CARTERA


    if($_POST['mode'] === 'edit_cartera_inf'){
        //$result = mysqli_query($conn,"SELECT * FROM cartera WHERE id='" . $_POST['id'] . "'");
        //$result = mysqli_query($conn,"SELECT c.id, c.fecha, c.persona_fk, concat(p.nombre,' ',p.apellido) as nombre, c.local_fk, l.numero as num_local, c.valor, c.servicio, c.pendiente FROM cartera c INNER JOIN locales l on c.local_fk = l.id INNER JOIN personas p on c.persona_fk = p.id WHERE c.id =  '". $_POST['id']."'");
        $result = mysqli_query($conn,"SELECT i.id, i.fecha_desde,i.fecha_hasta,i.fecha_ingreso, fecha_pago, i.persona_fk, concat(p.nombre,' ',p.apellido) as nombre, i.local_fk, l.numero as num_local, i.recibo,i.categoria,i.sub_categoria,i.valor,i.pendiente,i.observaciones FROM ingresos i INNER JOIN locales l on i.local_fk = l.id INNER JOIN personas p on i.persona_fk = p.id WHERE i.id =  '". $_POST['id']."'");
        $row= mysqli_fetch_array($result);
        echo json_encode($row);
    }

    //UPDATE INFORME CARTERA

    if ($_POST['mode'] === 'update_cartera_inf') {
        mysqli_query($conn,"UPDATE ingresos set  fecha_desde='" . $_POST['fecha_desde'] . "', fecha_hasta='" . $_POST['fecha_hasta'] . "', fecha_ingreso='" . $_POST['fecha_ing'] . "', fecha_pago='" . $_POST['fecha_pago'] . "', persona_fk='" . $_POST['perteneces_id'] . "', local_fk='" . $_POST['pertenece_id'] . "', recibo='" . $_POST['recibo'] ."', categoria='" . $_POST['categoria'] . "', sub_categoria='" . $_POST['sub_categ'] . "', valor='" . $_POST['valor'] . "', pendiente='" . $_POST['pendiente'] . "', observaciones='" . $_POST['obs'] . "' WHERE id='" . $_POST['id'] . "'");
        //mysqli_query($conn,"UPDATE cartera set  fecha='" . $_POST['fecha'] . "', persona_fk='" . $_POST['perteneces_id'] . "', local_fk='" . $_POST['pertenece_id'] . "', valor='" . $_POST['valor'] . "', servicio='" . $_POST['servicio'] . "', pendiente='" . $_POST['pendiente'] ."' WHERE id='" . $_POST['id'] . "'");
        echo json_encode(true);
    }  


    if ($_POST['mode'] === 'delete_cartera') {
        mysqli_query($conn, "DELETE FROM ingresos WHERE id='" . $_POST["id"] . "'");
        $registro_delete = mysqli_query($conn, "DELETE FROM cartera WHERE id='" . $_POST["id"] . "'");
        echo json_encode(true);
    }

    //pagar cartera
    if ($_POST['mode'] === 'pagar_cartera') {

        //extraemos la fecha actual
        date_default_timezone_set("America/Bogota");
        $fecha_hoy = date("Y/m/d");
        //mysqli_query($conn, "DELETE FROM ingresos WHERE id='" . $_POST["id"] . "'");
        //$registro_delete = mysqli_query($conn, "DELETE FROM cartera WHERE id='" . $_POST["id"] . "'");
        mysqli_query($conn, "UPDATE ingresos set fecha_pago = '".$fecha_hoy."',pendiente = 'no' WHERE id='" . $_POST["id"] . "'");
        $registro_delete = mysqli_query($conn, "UPDATE ingresos set fecha_pago = '".$fecha_hoy."', pendiente = 'no' WHERE id='" . $_POST["id"] . "'");
        echo json_encode(true);
    }

    //editar los abonos

    if($_POST['mode'] === 'edit_abonos'){
        $result = mysqli_query($conn,"SELECT a.id, a.fecha, a.ingresos_fk, i.categoria, i.sub_categoria, a.persona_fk, concat(p.nombre,' ',p.apellido) as nombre, a.local_fk, l.numero as num_local, i.recibo, a.valor FROM abonos a INNER JOIN ingresos i on i.id = a.ingresos_fk INNER JOIN locales l on a.local_fk = l.id INNER JOIN personas p on a.persona_fk = p.id WHERE a.id =  '". $_POST['id']."'");
        //$result = mysqli_query($conn,"SELECT a.id, a.fecha, a.persona_fk, concat(p.nombre,' ',p.apellido) as nombre, a.valor, a.pendiente FROM ahorros a INNER JOIN personas p on a.persona_fk = p.id WHERE a.id='" . $_POST['id'] . "'");
        $row= mysqli_fetch_array($result);
        echo json_encode($row);
    }

    //update abonos

    if ($_POST['mode'] === 'update_abonos') {
        mysqli_query($conn,"UPDATE abonos set  fecha='" . $_POST['fecha_desde'] . "', persona_fk='" . $_POST['perteneces_id'] . "', local_fk='" . $_POST['pertenece_id'] . "', valor='" . $_POST['valor'] . "' WHERE id='" . $_POST['id'] . "'");
        //mysqli_query($conn,"UPDATE ahorros set  fecha='" . $_POST['fecha'] . "', persona_fk='" . $_POST['perteneces_id'] . "', valor='" . $_POST['valor'] . "', pendiente='" . $_POST['pendiente'] ."' WHERE id='" . $_POST['id'] . "'");
        echo json_encode(true);
    }  


    //abonar a cartera

    if ($_POST['mode'] === 'abonar_cartera') {

        //primero para hacer el abono a cartera debemos saber cual es el abono actual y el valor del ingreso
        $result = mysqli_query($conn,"SELECT valor, abono, persona_fk, local_fk, id FROM ingresos WHERE id =  '". $_POST['id']."'");
        $row= mysqli_fetch_array($result);
        //echo json_encode($row);

        //extraemos los datos de nuestra consulta
        $valor_total = $row[0];
        $abono_actual = $row[1];
        $persona = $row[2];
        $local = $row[3];
        $id_abono = $row[4];

        $abono = $_POST["abono"];

        if ($abono_actual === $valor_total) {
            //hacemos para que el valor de pendiente esté en "si"
            mysqli_query($conn,"UPDATE ingresos set pendiente='no' WHERE id='" . $_POST['id'] . "'");
        }else{
            //$abono = 10000;

            $abono_total = $abono_actual+$abono;
    
            $saldo = $valor_total - $abono_total;
    
                //$abono_nuevo = $filas->abono;
    
            mysqli_query($conn, "UPDATE ingresos set abono = '".$abono_total."',saldo = '".$saldo."' WHERE id='" . $_POST["id"] . "'");
            //echo json_encode(true);

            //extraemos la fecha actual
            date_default_timezone_set("America/Bogota");
            $fecha_hoy = date("Y/m/d");

            //hacemos la inserccion para que se vea en la tabla de abonos
            //INSERT INTO `abonos` (`id`, `fecha`, `ingresos_fk`, `persona_fk`, `local_fk`, `valor`) VALUES (NULL, '2023-05-30', '1', '1', '1', '5000');
            mysqli_query($conn,"INSERT INTO abonos (fecha,ingresos_fk,persona_fk,local_fk,valor) VALUES ('$fecha_hoy','$id_abono','$persona','$local','$abono')");
            
        }
        echo json_encode(true);

    }


    //abonar ahorros

        if ($_POST['mode'] === 'abonar_ahorros') {

        //primero para hacer el abono a cartera debemos saber cual es el abono actual y el valor del ingreso
        $result = mysqli_query($conn,"SELECT valor, abono, persona_fk, local_fk, id FROM ingresos WHERE id =  '". $_POST['id']."'");
        $row= mysqli_fetch_array($result);
        //echo json_encode($row);

        //extraemos los datos de nuestra consulta
        $valor_total = $row[0];
        $abono_actual = $row[1];
        $persona = $row[2];
        $local = $row[3];
        $id_abono = $row[4];

        $abono = $_POST["abono"];

        if ($abono_actual === $valor_total) {
            //hacemos para que el valor de pendiente esté en "si"
            mysqli_query($conn,"UPDATE ingresos set pendiente='no' WHERE id='" . $_POST['id'] . "'");
        }else{
            //$abono = 10000;

            $abono_total = $abono_actual+$abono;
    
            $saldo = $valor_total - $abono_total;
    
                //$abono_nuevo = $filas->abono;
    
            mysqli_query($conn, "UPDATE ingresos set abono = '".$abono_total."',saldo = '".$saldo."' WHERE id='" . $_POST["id"] . "'");
            //echo json_encode(true);

            //extraemos la fecha actual
            date_default_timezone_set("America/Bogota");
            $fecha_hoy = date("Y/m/d");

            //hacemos la inserccion para que se vea en la tabla de abonos
            //INSERT INTO `abonos` (`id`, `fecha`, `ingresos_fk`, `persona_fk`, `local_fk`, `valor`) VALUES (NULL, '2023-05-30', '1', '1', '1', '5000');
            mysqli_query($conn,"INSERT INTO abonos (fecha,ingresos_fk,persona_fk,local_fk,valor) VALUES ('$fecha_hoy','$id_abono','$persona','$local','$abono')");
            
        }
        echo json_encode(true);

    }


    //CRUD DE AHORROS

    if($_POST['mode'] === 'edit_ahorros'){
        $result = mysqli_query($conn,"SELECT i.id, i.fecha_desde,i.fecha_hasta,i.fecha_ingreso, i.persona_fk, concat(p.nombre,' ',p.apellido) as nombre, i.local_fk, l.numero as num_local, i.recibo,i.categoria,i.sub_categoria,i.valor,i.pendiente,i.observaciones FROM ingresos i INNER JOIN locales l on i.local_fk = l.id INNER JOIN personas p on i.persona_fk = p.id WHERE i.id =  '". $_POST['id']."'");
        //$result = mysqli_query($conn,"SELECT a.id, a.fecha, a.persona_fk, concat(p.nombre,' ',p.apellido) as nombre, a.valor, a.pendiente FROM ahorros a INNER JOIN personas p on a.persona_fk = p.id WHERE a.id='" . $_POST['id'] . "'");
        $row= mysqli_fetch_array($result);
        echo json_encode($row);
    }

    //edit ahorros informe

    if($_POST['mode'] === 'edit_ahorros_informe'){
        $result = mysqli_query($conn,"SELECT i.id, i.fecha_desde,i.fecha_hasta,i.fecha_ingreso, i.persona_fk, concat(p.nombre,' ',p.apellido) as nombre, i.local_fk, l.numero as num_local, i.recibo,i.categoria,i.sub_categoria,i.valor,i.pendiente,i.observaciones FROM ingresos i INNER JOIN locales l on i.local_fk = l.id INNER JOIN personas p on i.persona_fk = p.id WHERE i.id =  '". $_POST['id']."'");
        //$result = mysqli_query($conn,"SELECT a.id, a.fecha, a.persona_fk, concat(p.nombre,' ',p.apellido) as nombre, a.valor, a.pendiente FROM ahorros a INNER JOIN personas p on a.persona_fk = p.id WHERE a.id='" . $_POST['id'] . "'");
        $row= mysqli_fetch_array($result);
        echo json_encode($row);
    }

    if ($_POST['mode'] === 'update_ahorros') {
        mysqli_query($conn,"UPDATE ingresos set  fecha_desde='" . $_POST['fecha_desde'] . "', fecha_hasta='" . $_POST['fecha_hasta'] . "', fecha_ingreso='" . $_POST['fecha_ing'] . "', persona_fk='" . $_POST['perteneces_id'] . "', local_fk='" . $_POST['pertenece_id'] . "', recibo='" . $_POST['recibo'] ."', categoria='" . $_POST['categoria'] . "', sub_categoria='" . $_POST['sub_categ'] . "', valor='" . $_POST['valor'] . "', pendiente='" . $_POST['pendiente'] . "', observaciones='" . $_POST['obs'] . "' WHERE id='" . $_POST['id'] . "'");
        //mysqli_query($conn,"UPDATE ahorros set  fecha='" . $_POST['fecha'] . "', persona_fk='" . $_POST['perteneces_id'] . "', valor='" . $_POST['valor'] . "', pendiente='" . $_POST['pendiente'] ."' WHERE id='" . $_POST['id'] . "'");
        echo json_encode(true);
    }  

    if ($_POST['mode'] === 'delete_ahorros') {
        mysqli_query($conn, "DELETE FROM ahorros WHERE id='" . $_POST["id"] . "'");
        $registro_delete = mysqli_query($conn, "DELETE FROM ahorros WHERE id='" . $_POST["id"] . "'");
        echo json_encode(true);
    }

    //pagar ahorros
    if ($_POST['mode'] === 'pagar_ahorro') {

            //extraemos la fecha actual
            date_default_timezone_set("America/Bogota");
            $fecha_hoy = date("Y/m/d");
            //mysqli_query($conn, "DELETE FROM ingresos WHERE id='" . $_POST["id"] . "'");
            //$registro_delete = mysqli_query($conn, "DELETE FROM cartera WHERE id='" . $_POST["id"] . "'");
            mysqli_query($conn, "UPDATE ingresos set fecha_pago = '".$fecha_hoy."',pendiente = 'no' WHERE id='" . $_POST["id"] . "'");
            $registro_delete = mysqli_query($conn, "UPDATE ingresos set fecha_pago = '".$fecha_hoy."', pendiente = 'no' WHERE id='" . $_POST["id"] . "'");
            echo json_encode(true);
    }

    //pagar ahorros informe
    //este script me va a tomar todos los ahorros de "x" persona y los va a pagar

    if ($_POST['mode'] === 'pagar_ahorro_informe') {
        //extraemos la fecha actual
        date_default_timezone_set("America/Bogota");
        $fecha_hoy = date("Y/m/d");
        //mysqli_query($conn, "DELETE FROM ingresos WHERE id='" . $_POST["id"] . "'");
        //$registro_delete = mysqli_query($conn, "DELETE FROM cartera WHERE id='" . $_POST["id"] . "'");
        //mysqli_query($conn, "UPDATE ingresos set pendiente = 'no', fecha_pago = '".$fecha_hoy."' where pendiente = 'si' and persona_fk='" . $_POST["id"] . "' and sub_categoria = 'ahorro'");
        //UPDATE ingresos set pendiente = 'no', fecha_pago = '2023-05-04' WHERE pendiente = 'si' and persona_fk = 1 AND sub_categoria = 'ahorro'
        $registro_delete = mysqli_query($conn, "UPDATE ingresos set pendiente = 'no', fecha_pago = '".$fecha_hoy."' where pendiente = 'si' and persona_fk='" . $_POST["persona"] . "' and sub_categoria = 'ahorro'");
        //$registro_delete = mysqli_query($conn, "UPDATE ingresos set fecha_pago = '".$fecha_hoy."', pendiente = 'no' WHERE id='" . $_POST["id"] . "'");
        echo json_encode(true);
    }

    //CRUD INFORME DE INGRESOS

    if($_POST['mode'] === 'edit_ingresos_informe'){
        //$result = mysqli_query($conn,"SELECT i.id, i.fecha,i.persona_fk,concat(p.nombre,' ',p.apellido) as nombre, i.local_fk,l.numero as num_local, i.valor, i.servicio, i.pendiente from ingresos i INNER JOIN locales l on i.local_fk = l.id INNER JOIN personas p on i.persona_fk = p.id WHERE i.id='" . $_POST['id'] . "'");
        $result = mysqli_query($conn,"SELECT i.id, i.fecha_desde, i.fecha_hasta, i.fecha_ingreso, i.fecha_pago,i.persona_fk, concat(p.nombre,' ',p.apellido) as nombre,i.local_fk,l.numero as num_local,i.recibo,i.categoria,i.sub_categoria,i.valor,i.abono,i.pendiente,i.observaciones
        from ingresos i 
        INNER JOIN locales l on i.local_fk = l.id 
        INNER JOIN personas p on i.persona_fk = p.id WHERE i.id='" . $_POST['id'] . "'");
        $row= mysqli_fetch_array($result);
        echo json_encode($row);
    }

    if ($_POST['mode'] === 'update_ingresos_informe') {
        //mysqli_query($conn,"UPDATE ingresos set  fecha='" . $_POST['fecha'] . "', persona_fk='" . $_POST['perteneces_id'] . "', local_fk='" . $_POST['pertenece_id'] . "', valor='" . $_POST['valor'] . "', servicio='" . $_POST['servicio'] . "', pendiente='" . $_POST['pendiente'] ."' WHERE id='" . $_POST['id'] . "'");
        mysqli_query($conn,"UPDATE ingresos set  fecha_desde='" . $_POST['fecha_desde'] . "', fecha_hasta='" . $_POST['fecha_hasta'] . "', fecha_ingreso='" . $_POST['fecha_ing'] . "', fecha_pago='" . $_POST['fecha_pago'] . "', persona_fk='" . $_POST['perteneces_id'] . "', local_fk='" . $_POST['pertenece_id'] . "', recibo='" . $_POST['recibo'] ."', categoria='" . $_POST['categoria'] . "', sub_categoria='" . $_POST['sub_categ'] . "', valor='" . $_POST['valor'] . "', abono='" . $_POST['abono'] . "', pendiente='" . $_POST['pendiente'] . "', observaciones='" . $_POST['obs'] . "' WHERE id='" . $_POST['id'] . "'");
        echo json_encode(true);
    } 

    if ($_POST['mode'] === 'delete_ingresos_informe') {
        mysqli_query($conn, "DELETE FROM ingresos WHERE id='" . $_POST["id"] . "'");
        $registro_delete = mysqli_query($conn, "DELETE FROM ingresos WHERE id='" . $_POST["id"] . "'");
        echo json_encode(true);
    }

    //CRUD INFORME DE AHORROS



    //CRUD DE USERS

if ($_POST['mode'] === 'add_users') {
    $nombre = $_POST['nombre'];
    $pass = $_POST['contra'];
    $tipo = $_POST['tipo'];

    if ($tipo == "administrador"){
        mysqli_query($conn, "INSERT INTO users (nombre,password,tipo,tipo_id)
        VALUES ('$nombre','$pass','$tipo','1')");
        echo json_encode(true);
    }

    if ($tipo == "visitante"){
        mysqli_query($conn, "INSERT INTO users (nombre,password,tipo,tipo_id)
        VALUES ('$nombre','$pass','$tipo','2')");
        echo json_encode(true);
    }
    
    echo json_encode(true);
    }  

    if ($_POST['mode'] === 'edit_users') {
        //se comento, lo que se busca es que aparezcan las personas con el nombre y no como una foranea    
        $result = mysqli_query($conn,"SELECT * FROM users WHERE id='" . $_POST['id'] . "'");
        //$result = mysqli_query($conn,"SELECT l.id as id, l.numero as numero, l.nombre as nombre, l.descripcion as descripcion, l.servicios as servicios, concat(p.nombre,' ',p.apellido) as nombre_c from locales l INNER JOIN personas p on l.personas_fk = p.id WHERE id = '"_$POST['id']."'");
        $row= mysqli_fetch_array($result);
        echo json_encode($row);
    }   

    if ($_POST['mode'] === 'update_users') {
        $tipo = $_POST['tipo'];
        if($tipo == "administrador"){
            mysqli_query($conn,"UPDATE users set  nombre='" . $_POST['nombre'] . "', password='" . $_POST['contra'] . "' ,tipo='" . $_POST['tipo'] . "',tipo_id='1' WHERE id='" . $_POST['id'] . "'");
            echo json_encode(true);
        }

        if($tipo == "visitante"){
            mysqli_query($conn,"UPDATE users set  nombre='" . $_POST['nombre'] . "', password='" . $_POST['contra'] . "' ,tipo='" . $_POST['tipo'] . "',tipo_id='2' WHERE id='" . $_POST['id'] . "'");
            echo json_encode(true);
        }
        
    }      

    if ($_POST['mode'] === 'delete_users') {
        mysqli_query($conn, "DELETE FROM users WHERE id='" . $_POST["id"] . "'");
        $registro_delete = mysqli_query($conn, "DELETE FROM users WHERE id='" . $_POST["id"] . "'");
        echo json_encode(true);
    }
    

?>