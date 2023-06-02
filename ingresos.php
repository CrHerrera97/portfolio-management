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

@media (min-width: 1000px) { .modal-dialog { max-width: 90%; } }


    #suggestions {
    box-shadow: 2px 2px 8px 0 rgba(0,0,0,.2);
    height: auto;
    position: absolute;
    top: 85px;
    z-index: 9999;
    width: 206px;
    left: 25px;
}

#sugerencia_persona {
    box-shadow: 2px 2px 8px 0 rgba(0,0,0,.2);
    height: auto;
    position: absolute;
    top: 85px;
    z-index: 9999;
    width: 206px;
    left: 25px;
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

<div class="">
  <div class="row">
    <div class="col-sm-5">
      <form id="form-ingresos" name="form-ingresos" autocomplete="off">
        <!------- SE VA A AGREGAR MAS CAMPOS, PRIMERO LA CATEGORIA----->

        <br>
        <h4><label class="col-sm-12 control-label">Categoría</label></h4>

        <!--- CONTENEDOR PARA ALBERGAR LOS RADIO BUTTONS--->
        <div class="row container">
            <div class="col-sm-1">
                    
            </div>
            <div class="col-sm-6 form-check">
                <input class="form-check-input" type="radio" name="categoria" id="ingresos_radio" value="ingresos_radio" onclick="categoria_radio()">
                <label class="form-check-label" for="flexRadioDefault1">Ingresos</label><br>

                <input class="form-check-input" type="radio" name="categoria" id="cartera_actual_radio" value="cartera_actual_radio"onclick="categoria_radio()">
                <label class="form-check-label" for="flexRadioDefault1">Cartera Actual</label><br>

                <input class="form-check-input" type="radio" name="categoria" id="cartera_vencida_radio" value="cartera_vencida_radio"onclick="categoria_radio()">
                <label class="form-check-label" for="flexRadioDefault1">Cartera Vencida</label><br>
            </div>
            <div class="col-sm-5 form-check">

                <input class="form-check-input" type="radio" name="categoria" id="ahorro_radio" value="ahorro_radio"onclick="categoria_radio()">
                <label class="form-check-label" for="flexRadioDefault1">Ahorro</label><br>

                <input class="form-check-input" type="radio" name="categoria" id="multas_radio" value="multas_radio"onclick="categoria_radio()">
                <label class="form-check-label" for="flexRadioDefault1">Multas</label><br>
            </div>       
        </div>
        <br>

        <div class="row container">
            <div class="col-sm-1"></div>

            <div class="col-sm-6">
                <!--<input class="btn btn-success" type="button" value="Abono a Cartera">-->
                <a href="javascript:void(0)" class="btn btn-success  add-model"> Abono a Cartera </a>
            </div>

            <div class="col-sm-5">
                <a href="javascript:void(0)" class="btn btn-success  add-model2"> Abono a Cartera Vencida. </a>
            </div>
        </div>
        <br>


        <!------
        #########

        CREAMOS UNA TABLA PARA QUE CUANDO SE OPRIMAN LOS BOTONES DE ABONO A CARTERA SE ABRAN
        LOS MODALES CON LAS TABLAS     
        --->


<script>
    
</script>            

        <!---FECHAS-->

        <div class="row">
        <div class="col-sm-1"></div>

            <div class="col-sm-5">
                <h4><label class="col-sm-12 control-label">Fecha Desde</label></h4>
                <div class="col-sm-12">
                <input type="date" class="form-control" id="fecha_desde" name="fecha_desde" placeholder="" value="" required="" autocomplete="off">
                </div>     
            </div>

            <div class="col-sm-5">
                <h4><label class="col-sm-12 control-label">Fecha Hasta</label></h4>
                <div class="col-sm-12">
                <input type="date" class="form-control" id="fecha_hasta" name="fecha_hasta" placeholder="" value="" required="" autocomplete="off">
                </div>     
            </div>

        </div>
        <br>

        <!----FECHA DE PAGO Y PERSONA--->

            <div class="row">
            <div class="col-sm-1"></div>
                
                <div class="col-sm-5">
                    <h4><label class="col-sm-12 control-label">Fecha Pago</label></h4>
                    <div class="col-sm-12">
                    <input type="date" class="form-control" id="fecha_pago" name="fecha_pago" placeholder="" value="" required="" autocomplete="off">
                    </div>     
                </div>

                <div class="col-sm-5">
                    <h4><label class="col-sm-12 control-label">Persona</label></h4>
                    <div id="sugerencia_persona"></div>
                    <div class="col-sm-12">
                    <input type="text" class="form-control" id="persona" name="persona" placeholder="Ingrese la persona" value="" required="" autocomplete="off">
                    <input type="hidden" class="form-control" id="persona_key" name="persona_key" placeholder="Ingrese la persona" value="" required="" autocomplete="off">
                    </div>     
                </div>

            </div>
        <br>

        <!----PUESTO DE PAGO Y # DE RECIBO--->

        <div class="row">
        <div class="col-sm-1"></div>
                <div class="col-sm-5">
                    <h4><label class="col-sm-12 control-label">Puesto</label></h4>
                    <div id="suggestions"></div>
                    <div class="col-sm-12">
                    <input type="text" class="form-control" id="key" name="key" placeholder="Ingrese el local" value="" required="" autocomplete="off">
                    <input type="hidden" class="form-control" id="key_id" name="key_id" placeholder="Ingrese el local" value="" required="" autocomplete="off">
                    </div>
                </div>

                <div class="col-sm-5">
                    <h4><label class="col-sm-12 control-label"># De Recibo</label></h4>
                    <div class="col-sm-12">
                    <input type="text" class="form-control" id="recibo" name="recibo" placeholder="Ingrese la persona" value="" required="" autocomplete="off">
                    </div>     
                </div>

        </div>
        <br>

        </div>
        <div class="col-sm-7">
            <br>
        <h4><label class="control-label">Concepto</label></h4>
    
            <div class="row">
                <div class="col-sm-2">
                    <h4>Administracion</h4>
                </div>

                <div class="col-sm-3">
                    <input type="text" class="form-control" id="admon" name="admon" placeholder="Ingrese el Valor" value="0" required="">
                </div>

                <div class="col-sm-2">
                <h4>Parqueadero</h4>
                </div>
                
                <div class="col-sm-3">
                    <input type="text" class="form-control" id="parque" name="parque" placeholder="Ingrese el Valor" value="0" required="">
                </div>

                <div class="col-sm-2">
                    
                </div>

                <br>

        <!---OTRA FILA...--->
        <br><br>
            <div class="col-sm-2">
                <h4>Agua</h4>
            </div>

            <div class="col-sm-3">
                <input type="text" class="form-control" id="agua" name="agua" placeholder="Ingrese el Valor" value="0" required="">
            </div>

            <div class="col-sm-2">
                <h4>Luz</h4>
            </div>

            <div class="col-sm-3">
                <input type="text" class="form-control" id="luz" name="luz" placeholder="Ingrese el Valor" value="0" required="">
            </div>

            <div class="col-sm-2">
                    
            </div>

        <!---OTRA FILA...--->

        <br><br><br>
        <div class="col-sm-2">
          <h4>Observaciones</h4>
        </div>
        <div class="col-sm-3">
        <input type="text" class="form-control" id="obs" name="obs" placeholder="Ingrese las observaciones" value="" >
        </div>

        
        
        <!--
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

        --->

        <div class="col-sm-2" id="valor_total">
          <h4>Valor:</h4>
        </div>
        <div class="col-sm-3">
        <input type="text" class="form-control" id="valor" name="valor" placeholder="Ingrese el Valor" value="">
        </div>

        <br><br><br>

        <div class="row">

        <!---OTRA FILA...--->
        <br><br>
            <div class="col-sm-2">
                <h4>Otros</h4>
            </div>

            <div class="col-sm-3">
                <input type="text" class="form-control" id="agua" name="agua" placeholder="Ingrese el Valor" value="0" required="">
            </div>

        </div>

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


<div class="modal fade" id="edit-modal" aria-hidden="true">
<div class="modal-dialog">
<div class="modal-content">
<div class="modal-header">
<h4 class="modal-title" id="userCrudModal"></h4>
</div>
<div class="modal-body">
<form id="update-form" name="update-form" class="form-horizontal" autocomplete="off">
<input type="hidden" name="id" id="id">
<input type="hidden" class="form-control" id="mode" name="mode" value="update_locales">

<div class="form-group">
<label for="name" class="col-sm-2 control-label">Numero</label>
<div class="col-sm-12">
<input type="text" class="form-control" id="numero" name="numero" placeholder="Escriba el # del Puesto" value="" maxlength="50" required="">
</div>
</div>

<div class="form-group">
<label class="col-sm-2 control-label">Nombre</label>
<div class="col-sm-12">
<input type="text" class="form-control" id="nombre" name="nombre" placeholder="Escriba el nombre del Puesto" value="" required="">
</div>
</div>

<div class="form-group">
<label for="name" class="col-sm-2 control-label">Descripcion</label>
<div class="col-sm-12">
<input type="text" class="form-control" id="descripcion" name="descripcion" placeholder="Escriba una descripción del Puesto" value="" maxlength="50" required="">
</div>
</div>

<div class="form-group">
<label for="name" class="col-sm-2 control-label">Servicios</label>
<div class="col-sm-12">
<input type="text" class="form-control" id="servicios" name="servicios" placeholder="Escriba los servicios del Puesto separado por comas" value="" maxlength="50" required="">
</div>
</div>

<div class="form-group">
<label for="name" class="col-sm-2 control-label">Pertenece</label>
<div class="col-sm-12">
<div id="suggestions"></div>
<input type="text" class="form-control" id="pertenece" name="pertenece" placeholder="Escriba a quien Pertenece" value="" maxlength="50" required="">
<input type="hidden" class="form-control" id="pertenece_id" name="pertenece_id" placeholder="Escriba a quien Pertenecee" value="" maxlength="50" required="">
</div>
</div>


<div class="col-sm-offset-2 col-sm-10">
<button type="submit" class="btn btn-primary" id="btn-save" value="create">Guardar Cambios
</button>
</div>
</form>
</div>
<div class="modal-footer">
</div>
</div>
</div>
</div>


<div class="modal fade" id="add-modal" aria-hidden="true">
<div class="modal-dialog">
<div class="modal-content">
<div class="modal-header">
<h4 class="modal-title" id="userCrudModal">Abono a Cartera</h4>
</div>
<div class="modal-body"></div>
<table id="abono_cartera" class="display" style="width:100%">

                <thead>
                <tr>
                <th width="5%">Fecha Desde</th>
                    <th width="5%">Fecha Hasta</th>
                    <th width="5%">Fecha Ingreso</th>
                    <th width="5%">Persona</th>
                    <th width="5%">Puesto</th>
                    <th width="3%">Recibo</th>
                    <th width="4%">Categoria</th>
                    <th width="4%">Sub Categoria</th>
                    <th width="4%">Otros</th>
                    <th width="4%">Valor</th>
                    <th width="4%">Abono</th>
                    <th width="4%">Saldo</th>
                    <th width="1%">Pendiente</th>
                    <th width="10%">Observaciones</th>
                    <th width="36%">Acciones</th>
                    </tr>
                    </thead>
                    <tfoot>
                    <tr>
                    <th width="5%">Fecha Desde</th>
                    <th width="5%">Fecha Hasta</th>
                    <th width="5%">Fecha Ingreso</th>
                    <th width="5%">Persona</th>
                    <th width="5%">Puesto</th>
                    <th width="3%">Recibo</th>
                    <th width="4%">Categoria</th>
                    <th width="4%">Sub Categoria</th>
                    <th width="4%">Otros</th>
                    <th width="4%">Valor</th>
                    <th width="4%">Abono</th>
                    <th width="4%">Saldo</th>
                    <th width="1%">Pendiente</th>
                    <th width="10%">Observaciones</th>
                    <th width="36%">Acciones</th>
                </tr>
                </tfoot>
                </table>
</div>
<div class="modal-footer">
</div>
</div>
</div>
</div>


<!-------HACER ABONOS CON MODAL------------------->

<!----AGREGAMOS MODAL PARA PODER HACER ABONOS A LA CARTERA---->


<div class="modal fade" id="abonar-modal" aria-hidden="true">
<div class="modal-dialog">
<div class="modal-content">
<div class="modal-header">
<h4 class="modal-title" id="userCrudModal"></h4>
</div>
<div class="modal-body">
<form id="update-form-abonos" name="update-form-abonos" class="form-horizontal" autocomplete="off">

<!---DIVIDIR MODALES EN 2-->
<div class="form-group">
  <div class="row">
    <div class="col">
        <label for="name" class="col-sm-12 control-label">Digite el Valor del Abono</label>
        <div class="col-sm-12">
            <input type="text" class="form-control" id="abono" name="abono" placeholder="Escriba el valor" value="" maxlength="50" required="">
        </div>
    </div>
  </div>
</div>

<div class="col-sm-offset-2 col-sm-10">
<button type="button" class="btn btn-primary" id="btn-save-abonar" value="create">Guardar Cambios
</button>
</div>
</form>
</div>

<div class="modal-footer">
</div>
</div>
</div>
</div>


<!--------------------------------------------->



<!----############# MODAL CARTERA VENCIDA ---------------------->


<div class="modal fade" id="add-modal2" aria-hidden="true">
<div class="modal-dialog">
<div class="modal-content">
<div class="modal-header">
<h4 class="modal-title" id="userCrudModal">Abono a Cartera Vencida</h4>
</div>
<div class="modal-body"></div>
<table id="abono_cartera_vencida" class="display" style="width:100%">

                <thead>
                <tr>
                    <th width="5%">Fecha Desde</th>
                    <th width="5%">Fecha Hasta</th>
                    <th width="5%">Fecha Ingreso</th>
                    <th width="5%">Persona</th>
                    <th width="5%">Puesto</th>
                    <th width="3%">Recibo</th>
                    <th width="4%">Categoria</th>
                    <th width="4%">Sub Categoria</th>
                    <th width="4%">Otros</th>
                    <th width="4%">Valor</th>
                    <th width="4%">Abono</th>
                    <th width="4%">Saldo</th>
                    <th width="1%">Pendiente</th>
                    <th width="10%">Observaciones</th>
                    <th width="36%">Acciones</th>
                    </tr>
                    </thead>
                    <tfoot>
                    <tr>
                    <th width="5%">Fecha Desde</th>
                    <th width="5%">Fecha Hasta</th>
                    <th width="5%">Fecha Ingreso</th>
                    <th width="5%">Persona</th>
                    <th width="5%">Puesto</th>
                    <th width="3%">Recibo</th>
                    <th width="4%">Categoria</th>
                    <th width="4%">Sub Categoria</th>
                    <th width="4%">Otros</th>
                    <th width="4%">Valor</th>
                    <th width="4%">Abono</th>
                    <th width="4%">Saldo</th>
                    <th width="1%">Pendiente</th>
                    <th width="10%">Observaciones</th>
                    <th width="36%">Acciones</th>
                </tr>
                </tfoot>
                </table>
</div>
<div class="modal-footer">
</div>
</div>
</div>
</div>

<script>

/// SCRIPT PARA TRAER EL MODAL

$('#abono_cartera').DataTable({
    language: {
        "decimal": "",
        "emptyTable": "No hay información",
        "info": "Mostrando _START_ a _END_ de _TOTAL_ Entradas",
        "infoEmpty": "Mostrando 0 to 0 of 0 Entradas",
        "infoFiltered": "(Filtrado de _MAX_ total entradas)",
        "infoPostFix": "",
        "thousands": ",",
        "lengthMenu": "Mostrar _MENU_ Entradas",
        "loadingRecords": "Cargando...",
        "processing": "Procesando...",
        "search": "Buscar:",
        "zeroRecords": "Sin resultados encontrados",
        "paginate": {
            "first": "Primero",
            "last": "Ultimo",
            "next": "Siguiente",
            "previous": "Anterior"
        }
    },
"processing": true,
"serverSide": true,
"order": [],
"ajax": "fetch_cartera.php"
});


$('#abono_cartera_vencida').DataTable({
    language: {
        "decimal": "",
        "emptyTable": "No hay información",
        "info": "Mostrando _START_ a _END_ de _TOTAL_ Entradas",
        "infoEmpty": "Mostrando 0 to 0 of 0 Entradas",
        "infoFiltered": "(Filtrado de _MAX_ total entradas)",
        "infoPostFix": "",
        "thousands": ",",
        "lengthMenu": "Mostrar _MENU_ Entradas",
        "loadingRecords": "Cargando...",
        "processing": "Procesando...",
        "search": "Buscar:",
        "zeroRecords": "Sin resultados encontrados",
        "paginate": {
            "first": "Primero",
            "last": "Ultimo",
            "next": "Siguiente",
            "previous": "Anterior"
        }
    },
"processing": true,
"serverSide": true,
"order": [],
"ajax": "fetch_cartera_vencida.php"
});


/*  add user model */
$('.add-model').click(function () {
$('#add-modal').modal('show');
});
//add. model 2 hace referencia a la cartera vencida
$('.add-model2').click(function () {
$('#add-modal2').modal('show');
});
// add form submit
$('#add-form').submit(function(e){
e.preventDefault();
// ajax
$.ajax({
url:"add-edit-delete.php",
type: "POST",
data: $(this).serialize(), // get all form field value in serialize form
success: function(){
var oTable = $('#usersListTable').dataTable(); 
oTable.fnDraw(false);
$('#add-modal').modal('hide');
$('#add-form').trigger("reset");
}
});
});  





////////aqui colocamos las funcionalidades para editar, pagar, eliminar o abonar a cartera



/* edit user function */
$('body').on('click', '.btn-edit', function () {
    $('#add-modal').modal('hide');
var id = $(this).data('id');
$.ajax({
url:"add-edit-delete.php",
type: "POST",
data: {
id: id,
mode: 'edit_cartera' 
},
dataType : 'json',
success: function(result){
$('#id').val(result.id);
$('#fecha_desde').val(result.fecha_desde);
$('#fecha_hasta').val(result.fecha_hasta);
$('#fecha_ing').val(result.fecha_ingreso);
$('#fecha_pago').val(result.fecha_pago);
$('#perteneces').val(result.nombre);
$('#perteneces_id').val(result.persona_fk);
$('#pertenece').val(result.num_local);
$('#pertenece_id').val(result.local_fk);
//$('#persona').val(result.nombre);
//$('#local').val(result.num_local);
$('#recibo').val(result.recibo);
$('#categoria').val(result.categoria);
$('#sub_categ').val(result.sub_categoria);
$('#valor').val(result.valor);
//$('#persona').val(result.persona_fk);
//$('#local').val(result.local_fk);
$('#abono').val(result.abono);
$('#pendiente').val(result.pendiente);
$('#obs').val(result.observaciones);
$('#edit-modal').modal('show');
}
});
});
// add form submit
$('#update-form').submit(function(e){
e.preventDefault();
// ajax
$.ajax({
url:"add-edit-delete.php",
type: "POST",
data: $(this).serialize(), // get all form field value in serialize form
success: function(){
var oTable = $('#usersListTable').dataTable(); 
oTable.fnDraw(false);
$('#edit-modal').modal('hide');
$('#update-form').trigger("reset");
}
});
});  
/* DELETE FUNCTION */
$('body').on('click', '.btn-delete', function () {
var id = $(this).data('id');
if (confirm("Estás seguro que deseas eliminar el registro !")) {
$.ajax({
url:"add-edit-delete.php",
type: "POST",
data: {
id: id,
mode: 'delete_cartera' 
},
dataType : 'json',
success: function(result){
var oTable = $('#usersListTable').dataTable(); 
oTable.fnDraw(false);
}
});
} 
return false;
});
/*HASTA AQUI EL BOTON DE ELIMINAR*/


$('body').on('click', '.btn-pagar', function () {
var id = $(this).data('id');
if (confirm("Estás seguro que deseas pagar !")) {
$.ajax({
url:"add-edit-delete.php",
type: "POST",
data: {
id: id,
mode: 'pagar_cartera' 
},
dataType : 'json',
success: function(result){
var oTable = $('#usersListTable').dataTable(); 
oTable.fnDraw(false);
}
});
} 
return false;
});

$(document).ready(function() {
  $('body').on('click', '.btn-abonar', function() {
    var id = $(this).data('id');
    $('#abonar-modal').modal('show');
    $('#add-modal').modal('hide');
    $('#add-modal2').modal('hide');
    $('#btn-save-abonar').data('id', id);
  });

  $('body').on('click', '#btn-save-abonar', function() {
    var id = $(this).data('id');
    let abono = document.getElementById("abono").value;

    $.ajax({
      url: "add-edit-delete.php",
      type: "POST",
      data: {
        id: id,
        abono: abono,
        mode: 'abonar_cartera'
      },
      success: function(result) {
        var oTable = $('#abono_cartera').dataTable();
        oTable.fnDraw(false);
        $('#abonar-modal').modal('hide');
        $('#update-form-abonos').trigger("reset");
      }
    });
  });
});

///////////////////////hasta aqui


//funcion para esconder o mostrar el valor

//definimos el valor como invisible

let valor_1 = document.getElementById('valor').style.display = 'none'
let valor_2 = document.getElementById('valor_total').style.display = 'none'

function eliminarAtribu(){
    $('#admon').removeAttr("disabled");
    $('#parque').removeAttr("disabled");
    $('#agua').removeAttr("disabled");
    $('#luz').removeAttr("disabled");
}



function categoria_radio(){


    //let ingresos_radio = $('input[id="ingresos_radio"]:checked').val();

    let ingresos_radio = document.getElementById('ingresos_radio')
    let cartera_actual_radio = document.getElementById('cartera_actual_radio')
    let cartera_vencida_radio = document.getElementById('cartera_vencida_radio')
    let ahorros_radio = document.getElementById('ahorro_radio')
    let multas_radio = document.getElementById('multas_radio')


    if(ingresos_radio.checked){
        document.getElementById('valor').style.display = 'none'
        document.getElementById('valor_total').style.display = 'none'

        //ponemos para que me ponga visible los siguientes campos
        $("#fecha_pago").removeAttr("disabled");

        eliminarAtribu();
        

    }else if(cartera_actual_radio.checked){
        document.getElementById('valor').style.display = 'none'
        document.getElementById('valor_total').style.display = 'none'

        $('#fecha_pago').attr("disabled", 'disabled');


        eliminarAtribu();

    }else if(cartera_vencida_radio.checked){
        document.getElementById('valor').style.display = 'flex'
        document.getElementById('valor_total').style.display = 'flex'

        //tambien ponemos para que cuando seleccione la cartera vencida, no sea posible poner datos en admon,parqueadero,agua, etc

        $('#admon').attr("disabled", 'disabled');
        $('#parque').attr("disabled", 'disabled');
        $('#agua').attr("disabled", 'disabled');
        $('#luz').attr("disabled", 'disabled');

        $('#fecha_pago').attr("disabled", 'disabled');

    }else if(ahorros_radio.checked){
        document.getElementById('valor').style.display = 'flex'
        document.getElementById('valor_total').style.display = 'flex'

        $('#admon').attr("disabled", 'disabled');
        $('#parque').attr("disabled", 'disabled');
        $('#agua').attr("disabled", 'disabled');
        $('#luz').attr("disabled", 'disabled');

        $("#fecha_pago").removeAttr("disabled");

    }else if(multas_radio.checked){
        document.getElementById('valor').style.display = 'flex'
        document.getElementById('valor_total').style.display = 'flex'

        $('#admon').attr("disabled", 'disabled');
        $('#parque').attr("disabled", 'disabled');
        $('#agua').attr("disabled", 'disabled');
        $('#luz').attr("disabled", 'disabled');

        //$("#fecha_pago").removeAttr("disabled");

        $('#fecha_pago').attr("disabled", 'disabled');
    }

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

  $("#recibo").val('');

  $("#fecha_desde").val('');
  $("#fecha_hasta").val('');
  $("#fecha_pago").val('');

  $("#obs").val('');

  $("#valor").val('');

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
