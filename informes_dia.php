<?php
  // Iniciar la sesión
  session_start();
  if(isset($_SESSION['username'])) {
      //header('Location: inicio.php');
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
        <title>Sistema de Cartera</title>
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




<h2 class="float-left">Ingresos Por Dias</h2>

<!---Se va a poner los diferentes botones para hacer los ingresos-->

<style>
    #suggestions, #sugerencia_persona {
    box-shadow: 2px 2px 8px 0 rgba(0,0,0,.2);
    height: auto;
    position: absolute;
    top: 88px;
    z-index: 9999;
    width: 206px;
}

#sugerencia_persona {
    box-shadow: 2px 2px 8px 0 rgba(0,0,0,.2);
    height: auto;
    position: absolute;
    top: 198px;
    z-index: 9999;
    width: 206px;
}
 
#suggestions  .suggest-element {
    background-color: #EEEEEE;
    border-top: 1px solid #d6d4d4;
    cursor: pointer;
    padding: 8px;
    width: 100%;
    float: left;
}

#sugerencia_persona .suggest-element2{
    background-color: #EEEEEE;
    border-top: 1px solid #d6d4d4;
    cursor: pointer;
    padding: 8px;
    width: 100%;
    float: left;

    
}



</style>

<br><br>

<div class="container">
  <div class="row">
    <div class="col-sm-4">
      <form id="form-ingresos" name="form-ingresos" autocomplete="off">
        <h4><label class="col-sm-12 control-label">Fecha Incial</label></h4>
        <div id="suggestions"></div>
        <div class="col-sm-7">
        <input type="date" class="form-control" id="fecha_ini" name="fecha_ini" require>
        </div>
        <br>
        <h4><label class="col-sm-12 control-label">Fecha Final</label></h4>
        <div id="sugerencia_persona"></div>
        <div class="col-sm-7">
        <input type="date" class="form-control" id="fecha_fin" name="fecha_fin">
        </div>      
        <br>
        <div class="col-sm-7">
        <input type="button" onclick="validaFecha(); consulta()"; class="form-control btn btn-success" value="Enviar Datos">
        </div>

        <br>
        <div class="col-sm-6">
        
        </div>
        </div>
        <div class="col-sm-8">
        <h4><label class="control-label">Concepto</label></h4>
    
            <div class="row">
                <div class="col-sm-3">
                    <h4>Administracion</h4>
                </div>

                <div class="col-sm-3">
                    <input type="text" class="form-control" id="admon" name="admon" placeholder="Ingrese el Valor" value="0" required="" disabled>
                </div>

                <div class="col-sm-3">
                <h4>Parqueadero</h4>
                </div>
                
                <div class="col-sm-3">
                    <input type="text" class="form-control" id="parque" name="parque" placeholder="Ingrese el Valor" value="0" required="" disabled>
                </div>

        <!---OTRA FILA...--->
        <br><br>
                <div class="col-sm-3">
                    <h4>Agua</h4>
                </div>

            <div class="col-sm-3">
                <input type="text" class="form-control" id="agua" name="agua" placeholder="Ingrese el Valor" value="0" required="" disabled>
            </div>

            <div class="col-sm-3">
                <h4>Luz</h4>
            </div>

            <div class="col-sm-3">
                <input type="text" class="form-control" id="luz" name="luz" placeholder="Ingrese el Valor" value="0" required="" disabled>
            </div>

        <!---OTRA FILA...--->
        <br><br>

        <!---OTRA FILA...--->
        <br><br>
        
        <div class="col-sm-3">
          <h4>Total Ingresos</h4>
        </div>
        <div class="col-sm-3">
        <input type="text" class="form-control" id="total_ingresos" name="total_ingresos" placeholder="Ingrese el Valor" value="0" required="" disabled>
        </div>
        <div class="col-sm-3">
          <h4>Total Cartera Actual</h4>
        </div>
        <div class="col-sm-3">
        <input type="text" class="form-control" id="total_cartera_actual" name="total_cartera_actual" placeholder="Ingrese el Valor" value="0" required="" disabled>
        </div>

        <!---OTRA FILA...--->
        <br><br>
        <div class="col-sm-3">
          <h4>Total Cartera Vencida</h4>
        </div>
        <div class="col-sm-3">
        <input type="text" class="form-control" id="total_cartera_vencida" name="total_cartera_vencida" placeholder="Ingrese el Valor" value="0" required="" disabled>
        </div>
        <div class="col-sm-3">
          <h4>Total Multas</h4>
        </div>
        <div class="col-sm-3">
        <input type="text" class="form-control" id="total_multas" name="total_multas" placeholder="Ingrese el Valor" value="0" required="" disabled>
        </div>

        <!---OTRA FILA...--->
        <br><br>
        
        <div class="col-sm-3">
          <h4>Total Ahorros</h4>
        </div>
        <div class="col-sm-3">
        <input type="text" class="form-control" id="total_ahorros" name="total_ahorros" placeholder="Ingrese el Valor" value="0" required="" disabled>
        </div>
        

        <br><br>
        
        <div class="col-sm-3">
        
        </div>
        <div class="col-sm-3">
        </div>

        <br><br>
        <div class="row">
        
        <div class="col-sm">
        
        </div>
        </div>
        
      
  </div>

  


  
</div>

    

</div>

<div class="col-sm-offset-2 col-sm-12">
        <br>
        <!--<button type ="button" class="btn btn-success" id="" value="create">Excel</button>-->
        <button type = "button" class="btn btn-danger" id="pdf_button" name="pdf_button" value="create" onclick="pdf();">PDF</button>

        <input class="btn btn-primary " onclick="myFunction();" id="btn-borrar-todo" type="button" value="Borrar Todo">
</div>



</div>

<br>


</form>
</div>


</div>
</div>        
</div>
</div>
</body>


<br>
</div>
<br>
<div class="modal-footer">
</div>

<script>


//creamos el script para que exporte a pdf

function pdf() {
    
    let admon = document.getElementById("admon").value;
    let parque = document.getElementById("parque").value;
    let agua = document.getElementById("agua").value;
    let luz = document.getElementById("luz").value;
    //let ahorro = document.getElementById("ahorro").value;
    //let multas = document.getElementById("multas").value;


    let total_ingresos = document.getElementById("total_ingresos").value;
    let total_cartera_actual = document.getElementById("total_cartera_actual").value;
    let total_cartera_vencida = document.getElementById("total_cartera_vencida").value;
    let total_multas = document.getElementById("total_multas").value;
    let total_ahorros = document.getElementById("total_ahorros").value;


    var datos = {
        admon: admon,
        parque : parque,
        agua : agua,
        luz: luz,
        total_ingresos: total_ingresos,
        total_cartera_actual: total_cartera_actual,
        total_cartera_vencida:total_cartera_vencida,
        total_multas:total_multas,
        total_ahorros:total_ahorros
        //ahorro : ahorro,
        //multas : multas
    }
        //window.location.href = 'pdf.php';
        $.ajax({
        url: 'pdf.php',
        method: 'POST',
        xhrFields: {
         responseType: 'blob'
        },
        data: datos,
    success: function(data) {
        // código a ejecutar cuando la solicitud sea exitosa
        var blob = new Blob([data]);
        var link = document.createElement('a');
        link.href = window.URL.createObjectURL(blob);
        link.download = 'archivo.pdf';
        link.click();
  },
  error: function(xhr, status, error) {
    // código a ejecutar cuando la solicitud falle
    console.log(error);
  }
});


    /*

    let admon = document.getElementById("admon").value;
    let parque = document.getElementById("parque").value;

    var datos = {
        admon: admon,
        parque : parque 
    }

    $.ajax({
        url: "pdf.php",
        type: "POST",
        dataType: "json",
        data: datos,
        success: function(response){
            //window.location.href = "pdf.php";
            //alert (response.parqueadero)
            //alert (response.administracion)

        },
        error: function(){
            alert('ha ocurrido un error')
        }
    })
    */



}


function validaFecha(){
  let fecha_inicio = document.getElementById("fecha_ini").value;
  let fecha_final = document.getElementById("fecha_fin").value;

  if (fecha_inicio == "" && fecha_final == ""){
    alert("Debe seleccionar una fecha de inicio y una fecha final.");
  }else if (fecha_inicio == "" && fecha_final != ""){
    alert("Debe seleccionar una fecha inicial.")
  }else if (fecha_inicio != "" && fecha_final == ""){
    alert("Debe seleccionar una fecha final.")
  }
}


//funcion para enviar los datos de las fechas inciales y finales para que nos devuelvan los datos

function consulta(){
    $.ajax({
        type: 'POST',
        url: 'informes_dia_consulta.php',
        dataType: "json",
        data: $('#form-ingresos').serialize(),
        success: function(respuesta){

            $('#admon').val(respuesta.administracion);

            $('#parque').val(respuesta.parqueadero);

            $("#agua").val(respuesta.agua);

            $("#luz").val(respuesta.luz);

            $("#ahorro").val(respuesta.ahorro);

            $("#multas").val(respuesta.multas);

            $("#total_ingresos").val(respuesta.total_ingresos);

            $('#total_cartera_actual').val(respuesta.total_cartera_actual);

            $('#total_cartera_vencida').val(respuesta.total_cartera_vencida);

            $('#total_multas').val(respuesta.total_multas);

            $('#total_ahorros').val(respuesta.total_ahorros);

        },
        error: function (xhr,status){
            alert ("error"+xhr+status)
        }
    })



}

  //traemos los datos de los inputs para que el botón pueda asignar un 0

function myFunction() {
  
  $("#key").val('');
  $("#persona").val('');

  $("#admon").val('0');
  $("#parque").val('0');
  $("#agua").val('0');
  $("#luz").val('0');
  $("#ahorro").val('0');
  $("#multas").val('0');

  $('#pendiente').val('');

  $('#fecha').val('');


  $('#fecha_ini').val('');
  $('#fecha_fin').val('');



  $('#total_ingresos').val('0');
  $('#total_cartera_actual').val('0');
  $('#total_cartera_vencida').val('0');
  $('#total_multas').val('0');
  $('#total_ahorros').val('0');
  //borrar tambien el local y la persona
}


//los inputs queden con parte decimal
/*
$("#cartera,#admon,#parque,#agua,#luz").on({
    "focus": function (event) {
        $(event.target).select();
    },
    "keyup": function (event) {
        $(event.target).val(function (index, value ) {
            return value.replace(/\D/g, "")
                        .replace(/([0-9])([0-9]{})$/, '$1.$2')
                        .replace(/\B(?=(\d{3})+(?!\d)\.?)/g, ".");
        });
    }
});

*/
</script>


<script src="https://code.jquery.com/jquery-3.2.1.js"></script>
<script>


//autocompletar el local

/*

$(document).ready(function() {
    $('#key').on('keyup', function() {
        var key = $(this).val();		
        var dataString = 'key='+key;
	$.ajax({
            type: "POST",
            url: "buscar_ingresos.php",
            data: dataString,
            success: function(data) {
                
                //Escribimos las sugerencias que nos manda la consulta
                $('#suggestions').fadeIn(1000).html(data);
                //Al hacer click en alguna de las sugerencias
                $('.suggest-element').on('click', function(){
                        //Obtenemos la id unica de la sugerencia pulsada

                        //este es el valor del id que tenia anteriormente
                        //var id = $(this).attr('id');

                        var id = $(this).attr('data');

                        var numero = $(this).attr('numero');

                        $("#key").val(numero);

                        $("#key_id").val(id);
                        //Editamos el valor del input con data de la sugerencia pulsada
                        //$('#key').val($('#'+id).attr('data'));
                        //Hacemos desaparecer el resto de sugerencias
                        $('#suggestions').fadeOut(500);
                        //alert('Has seleccionado el'+$('#'+id).attr('data'));
                        //alert(id);
                        return false;

                        //ponemos en el input del local 
                        

                        
                });

                
            }
        });
    });
}); 

*/

</script>

                    <!---HASTA AQUI VA EL CODIGO-->
                </div>
            </div>
        </div>

    </body>
</html>
