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




<h2 class="float-left">Ingresos</h2>

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
        <h4><label class="col-sm-2 control-label">Puesto</label></h4>
        <div id="suggestions"></div>
        <div class="col-sm-7">
        <input type="text" class="form-control" id="key" name="key" placeholder="Ingrese el local" value="" required="" autocomplete="off">
        <input type="hidden" class="form-control" id="key_id" name="key_id" placeholder="Ingrese el local" value="" required="" autocomplete="off">
        </div>
        <br>
        <h4><label class="col-sm-2 control-label">Persona</label></h4>
        <div id="sugerencia_persona"></div>
        <div class="col-sm-7">
        <input type="text" class="form-control" id="persona" name="persona" placeholder="Ingrese la persona" value="" required="" autocomplete="off">
        <input type="hidden" class="form-control" id="persona_key" name="persona_key" placeholder="Ingrese la persona" value="" required="" autocomplete="off">
        </div>        

        <br>
        <h4><label class="col-sm-2 control-label">Fecha</label></h4>
        <div class="col-sm-6">
        <input type="date" name="fecha" id="fecha">
        </div>
        </div>
        <div class="col-sm-8">
        <h4><label class="control-label">Concepto</label></h4>
    
            <div class="row">
                <div class="col-sm-3">
                    <h4>Administracion</h4>
                </div>

                <div class="col-sm-3">
                    <input type="text" class="form-control" id="admon" name="admon" placeholder="Ingrese el Valor" value="0" required="">
                </div>

                <div class="col-sm-3">
                <h4>Parqueadero</h4>
                </div>
                
                <div class="col-sm-3">
                    <input type="text" class="form-control" id="parque" name="parque" placeholder="Ingrese el Valor" value="0" required="">
                </div>

        <!---OTRA FILA...--->
        <br><br>
                <div class="col-sm-3">
                    <h4>Agua</h4>
                </div>

            <div class="col-sm-3">
                <input type="text" class="form-control" id="agua" name="agua" placeholder="Ingrese el Valor" value="0" required="">
            </div>

            <div class="col-sm-3">
                <h4>Luz</h4>
            </div>

            <div class="col-sm-3">
                <input type="text" class="form-control" id="luz" name="luz" placeholder="Ingrese el Valor" value="0" required="">
            </div>

        <!---OTRA FILA...--->
        <br><br>
        
        <div class="col-sm-3">
          <h4>Ahorro</h4>
        </div>
        <div class="col-sm-3">
        <input type="text" class="form-control" id="ahorro" name="ahorro" placeholder="Ingrese el Valor" value="0" required="">
        </div>
        <div class="col-sm-3">
          <h4>Multas</h4>
        </div>
        <div class="col-sm-3">
        <input type="text" class="form-control" id="multas" name="multas" placeholder="Ingrese el Valor" value="0" required="">
        </div>

        <br><br>
        
        <div class="col-sm-3">
        <h4>Pendiente</h4>
        </div>
        <div class="col-sm-3">
        <select class="form-select" name="pendiente" id="pendiente">
            <option value=""></option>
            <option value="si">SI</option>
            <option value="no">NO</option>
        </select>
        </div>

        <br><br>
        <div class="row">
        
        <div class="col-sm">
        <input class="btn btn-danger" onclick="myFunction();" id="btn-borrar-todo" type="button" value="Borrar Todo">
        </div>
        </div>
        
      
  </div>

  


  
</div>

    

</div>

<div class="col-sm-offset-2 col-sm-12">
        <br>
        <button type="submit" class="btn btn-primary" id="btn-save" value="create">Guardar Cambios</button>
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
$('#form-ingresos').submit(function(e){
e.preventDefault();
// ajax
$.ajax({
url:"fetch_ingresos.php",
type: "POST",
data: $(this).serialize(), // get all form field value in serialize form
success: function(){
    alert("Inserccion Exitosa");

    myFunction();
    

}
});
});  


//autocompletar el local

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


//autocompletar la persona


$(document).ready(function() {
    $('#persona').on('keyup', function() {
        var persona = $(this).val();		
        var dataString = 'persona='+persona;
	$.ajax({
            type: "POST",
            url: "buscar_personas.php",
            data: dataString,
            success: function(data) {
                
                //Escribimos las sugerencias que nos manda la consulta
                $('#sugerencia_persona').fadeIn(1000).html(data);
                //Al hacer click en alguna de las sugerencias
                $('.suggest-element2').on('click', function(){
                        //Obtenemos la id unica de la sugerencia pulsada

                        //este es el valor que tenia anteriormente, obtenemos el id a través de la var 'data'
                        //var id = $(this).attr('id');

                        var id = $(this).attr('data');

                        var persona = $(this).attr('nombreComp');

                        $("#persona").val(persona);

                        $("#persona_key").val(id);
                        //Editamos el valor del input con data de la sugerencia pulsada
                        //$('#key').val($('#'+id).attr('data'));
                        //Hacemos desaparecer el resto de sugerencias
                        $('#sugerencia_persona').fadeOut(500);
                        //alert('Has seleccionado el '+id+' '+$('#'+id).attr('data'));
                        //alert(id)
                        return false;

                        //ponemos en el input del local 
                    
                        
                });

                
            }
        });
    });
}); 

</script>

                    <!---HASTA AQUI VA EL CODIGO-->
                </div>
            </div>
        </div>

    </body>
</html>
