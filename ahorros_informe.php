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


<h2 class="float-left">Total Ahorros</h2>
<!--<a href="javascript:void(0)" class="btn btn-primary float-right add-model"> Agregar Locales </a>-->
</div>

<style>
    #sugerencia{
    box-shadow: 2px 2px 8px 0 rgba(0,0,0,.2);
    height: auto;
    position: absolute;
    top: 125px;
    z-index: 9999;
    width: 206px;
}

#suggestions{
    box-shadow: 2px 2px 8px 0 rgba(0,0,0,.2);
    height: auto;
    position: absolute;
    top: 43px;
    z-index: 9999;
    width: 206px;
}

#suggestions  .suggest-element , .sugerencia  , .suggest-element2{
    background-color: #EEEEEE;
    border-top: 1px solid #d6d4d4;
    cursor: pointer;
    padding: 8px;
    width: 100%;
    float: left;
}

</style>



<table id="usersListTable" class="display" style="width:100%">
<thead>
<tr>
<th width="20%">Fecha Desde</th>
<th width="20%">Fechas Hasta</th>
<th width="20%">Nombre</th>
<th width="20%">Puesto</th>
<th width="20%">Valor</th>
<th width="20%">Acciones</th>
</tr>
</thead>
<tfoot>
<tr>
<th width="20%">Fecha Desde</th>
<th width="20%">Fechas Hasta</th>
<th width="20%">Nombre</th>
<th width="20%">Puesto</th>
<th width="20%">Valor</th>
<th width="20%">Acciones</th>
</tr>
</tfoot>
</table>
</div>
</div>        
</div>
</div>
</body>
<div class="modal fade" id="edit-modal" aria-hidden="true">
<div class="modal-dialog">
<div class="modal-content">
<div class="modal-header">
<h4 class="modal-title" id="userCrudModal"></h4>
</div>
<div class="modal-body">
<form id="update-form" name="update-form" class="form-horizontal" autocomplete="off">
<input type="hidden" name="id" id="id">
<input type="hidden" class="form-control" id="mode" name="mode" value="update_ahorros">

<!--

<div class="form-group">
<label for="name" class="col-sm-2 control-label">Fecha</label>
<div class="col-sm-12">
<input type="date" name="fecha" id="fecha">
</div>
</div>

<div class="form-group">
<label class="col-sm-2 control-label">Persona</label>
<div class="col-sm-12">
<div id="suggestions"></div>    
<input type="text" class="form-control" id="persona" name="persona" placeholder="Escriba el nombre del Local" value="" required="">
<input type="text" class="form-control" id="perteneces" name="perteneces" placeholder="Escriba el nombre del Local" value="" required="">
<input type="hidden" class="form-control" id="perteneces_id" name="perteneces_id" placeholder="Escriba a quien Pertenece" value="" maxlength="50" required="">
</div>
</div>

<div class="form-group">
<label for="name" class="col-sm-2 control-label">Valor</label>
<div class="col-sm-12">
<input type="text" class="form-control" id="valor" name="valor" placeholder="Escriba los servicios del Local separado por comas" value="" maxlength="50" required="">
</div>
</div>

<div class="form-group">
<label for="name" class="col-sm-2 control-label">Pendiente</label>
<div class="col-sm-12">
    
<select class="form-select" name="pendiente" id="pendiente">
            <option value=""></option>
            <option value="si">si</option>
            <option value="no">no</option>
</select>

</div>
</div>
--->

<!---DIVIDIR MODALES EN 2-->
<div class="form-group">
  <div class="row">
    <div class="col">
        <label for="name" class="col-sm-12 control-label">Fecha Desde</label>
        <div class="col-sm-12">
            <input type="date" class="form-control" id="fecha_desde" name="fecha_desde" placeholder="Escriba el # del Local" value="" maxlength="50" required="">
        </div>
    </div>
    <div class="col">
        <label for="name" class="col-sm-12 control-label">Fecha Hasta</label>
        <div class="col-sm-12">
            <input type="date" class="form-control" id="fecha_hasta" name="fecha_hasta" placeholder="Escriba el # del Local" value="" maxlength="50" required="">
        </div>
    </div>
  </div>
</div>

<!--SEGUNDA FILA-->

<div class="form-group">
  <div class="row">
    <div class="col">
        <label for="name" class="col-sm-12 control-label">Persona</label>
            <div class="col-sm-12">
                <!--<input type="text" class="form-control" id="persona" name="persona" placeholder="Escriba el # del Local" value="" maxlength="50" required="">-->
                <input type="text" class="form-control" id="perteneces" name="perteneces" placeholder="Escriba el nombre del Local" value="" required="">
                <input type="hidden" class="form-control" id="perteneces_id" name="perteneces_id" placeholder="Escriba a quien Pertenece" value="" maxlength="50" required="">
            </div>
        </div>            
        <div id="sugerencia"></div>
        <div class="col">
            <label for="name" class="col-sm-12 control-label">Puesto</label>
            <div class="col-sm-12">
                <!--<input type="text" class="form-control" id="local" name="local" placeholder="Escriba el # del Local" value="" maxlength="50" required="">-->
                <input type="text" class="form-control" id="pertenece" name="pertenece" placeholder="Escriba una descripción del Local" value="" maxlength="50" required="">
                <input type="hidden" class="form-control" id="pertenece_id" name="pertenece_id" placeholder="Escriba a quien Pertenecee" value="" maxlength="50" required="">
            </div>
        <div id="suggestions"></div>    
        </div>
    </div>
  </div>


<div class="form-group">
  <div class="row">
    <div class="col">
        <label for="name" class="col-sm-12 control-label">Valor</label>
        <div class="col-sm-12">
            <input type="text" class="form-control" id="valor" name="valor" placeholder="Escriba el # del Local" value="" maxlength="50" required="">
        </div>
    </div>
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
<h4 class="modal-title" id="userCrudModal"></h4>
</div>
<div class="modal-body">
<form id="add-form" name="add-form" class="form-horizontal" autocomplete="off">
<input type="hidden" class="form-control" id="mode" name="mode" value="add_locales">

<div class="form-group">
<label for="name" class="col-sm-2 control-label">Numero</label>
<div class="col-sm-12">
<input type="text" class="form-control" id="numero" name="numero" placeholder="Escriba el # del Local" value="" maxlength="50" required="">
</div>
</div>

<div class="form-group">
<label class="col-sm-2 control-label">Nombre</label>
<div class="col-sm-12">
<input type="text" class="form-control" id="nombre" name="nombre" placeholder="Escriba el nombre del Local" value="" required="">
</div>
</div>

<div class="form-group">
<label for="name" class="col-sm-2 control-label">Descripcion</label>
<div class="col-sm-12">
<input type="text" class="form-control" id="descripcion" name="descripcion" placeholder="Escriba una descripción del Local" value="" maxlength="50" required="">
</div>
</div>

<div class="form-group">
<label for="name" class="col-sm-2 control-label">Servicios</label>
<div class="col-sm-12">
<input type="text" class="form-control" id="servicios" name="servicios" placeholder="Escriba los servicios del Local separado por comas" value="" maxlength="50" required="">
</div>
</div>

<div class="form-group">
<label for="name" class="col-sm-2 control-label">Pertenece</label>
<div class="col-sm-12">
<input type="text" class="form-control" id="pertenece" name="pertenece" placeholder="Escriba a quien Pertenece" value="" maxlength="50" required="">
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
<script>
$(document).ready(function(){
var table = $('#usersListTable').DataTable({
    dom: 'Blfrtip',
    lengthMenu: [
            [10, 25, 50, 100, 500, -1],
            [10, 25, 50, 100, 500, 'Todo'],
        ],
    buttons: [
        {
            extend: 'excelHtml5',
            titleAttr: 'Exportar a Excel',
            className: 'btn btn-success',
            exportOptions: {
                    columns: [ 0,1,2,3,4]
                }
        },
        {
            extend: 'pdfHtml5',
            titleAttr: 'Exportar a Pdf',
            className: 'btn btn-danger',
            exportOptions: {
                    columns: [ 0,1,2,3,4]
                },
            filename: function() {
            return "MyPDF"      
            },      
            title: function() {
            var searchString = table.search();        
            return searchString.length? "Search: " + searchString : "Ahorros Informe"
      }
        }
            
    ],
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
"ajax": "fetch_ahorros_informe.php"
});
});
/*  add user model */
$('.add-model').click(function () {
$('#add-modal').modal('show');
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
/* edit user function */
$('body').on('click', '.btn-edit', function () {
var id = $(this).data('id');
$.ajax({
url:"add-edit-delete.php",
type: "POST",
data: {
id: id,
mode: 'edit_ahorros_informes' 
},
dataType : 'json',
success: function(result){
$('#id').val(result.id);
$('#fecha_desde').val(result.fecha_desde);
$('#fecha_hasta').val(result.fecha_hasta);
//$('#fecha_ing').val(result.fecha_ingreso);
//$('#fecha_pago').val(result.fecha_pago);
$('#perteneces').val(result.nombre);
$('#perteneces_id').val(result.persona_fk);
$('#pertenece').val(result.num_local);
$('#pertenece_id').val(result.local_fk);
//$('#persona').val(result.nombre);
//$('#local').val(result.num_local);
//$('#recibo').val(result.recibo);
//$('#categoria').val(result.categoria);
//$('#sub_categ').val(result.sub_categoria);
$('#valor').val(result.valor);
//$('#persona').val(result.persona_fk);
//$('#local').val(result.local_fk);
//$('#abono').val(result.abono);
//$('#pendiente').val(result.pendiente);
//$('#obs').val(result.observaciones);
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
mode: 'delete_ahorros' 
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
//var id = $(this).data('id');
var persona = $(this).data('persona');
if (confirm("Estás seguro que deseas pagar !")) {
$.ajax({
url:"add-edit-delete.php",
type: "POST",
data: {
//id: id,
persona: persona,
mode: 'pagar_ahorro_informe' 
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
    $('#perteneces').on('keyup', function() {
        var key = $(this).val();		
        var dataString = 'pertenece='+key;
	$.ajax({
            type: "POST",
            url: "buscar_personas_ahorro.php",
            data: dataString,
            success: function(data) {
                
                //Escribimos las sugerencias que nos manda la consulta
                $('#suggestions').fadeIn(1000).html(data);
                //Al hacer click en alguna de las sugerencias
                $('.suggest-element').on('click', function(){
                        //Obtenemos la id unica de la sugerencia pulsada
                        //var id = $(this).attr('id');

                        var id = $(this).attr('nombreComp')

                        var id_fk = $(this).attr('id')

                        

                        $("#perteneces").val(id);

                        $("#perteneces_id").val(id_fk);


                        //Editamos el valor del input con data de la sugerencia pulsada
                        //$('#key').val($('#'+id).attr('data'));
                        //Hacemos desaparecer el resto de sugerencias
                        $('#suggestions').fadeOut(500);
                        //alert('Has seleccionado el '+id+' '+$('#'+id).attr('data'));
                        return false;

                        //ponemos en el input del local 
                        

                        
                });

                
            }
        });
    });
}); 


//autocompletar el nombre en el editar

$(document).ready(function() {
    $('#perteneces').on('keyup', function() {
        var key = $(this).val();		
        var dataString = 'pertenece='+key;
	$.ajax({
            type: "POST",
            url: "buscar_personas_locales.php",
            data: dataString,
            success: function(data) {
                
                //Escribimos las sugerencias que nos manda la consulta
                $('#suggestions').fadeIn(1000).html(data);
                //Al hacer click en alguna de las sugerencias
                $('.suggest-element').on('click', function(){
                        //Obtenemos la id unica de la sugerencia pulsada
                        //var id = $(this).attr('id');

                        var id = $(this).attr('nombreComp')

                        var id_fk = $(this).attr('id')

                        

                        $("#perteneces").val(id);

                        $("#perteneces_id").val(id_fk);


                        //Editamos el valor del input con data de la sugerencia pulsada
                        //$('#key').val($('#'+id).attr('data'));
                        //Hacemos desaparecer el resto de sugerencias
                        $('#suggestions').fadeOut(500);
                        //alert('Has seleccionado el '+id+' '+$('#'+id).attr('data'));
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
