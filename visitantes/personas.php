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

<h2 class="float-left">Listado Personas</h2>
<!--<a href="javascript:void(0)" class="btn btn-primary float-right add-model"> Agregar Persona </a>-->
</div>
<table id="usersListTable" class="display" style="width:100%">
<thead>
<tr>
<th width="40%">Nombre</th>
<th width="40%">Apellido</th>

</tr>
</thead>
<tfoot>
<tr>
<th width="40%">Nombre</th>
<th width="40%">Apellido</th>

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
<input type="hidden" class="form-control" id="mode" name="mode" value="update">
<div class="form-group">
<label for="name" class="col-sm-2 control-label">Nombre</label>
<div class="col-sm-12">
<input type="text" class="form-control" id="name" name="name" placeholder="Ingrese el nombre" value="" maxlength="50" required="">
</div>
</div>
<div class="form-group">
<label class="col-sm-2 control-label">Apellido</label>
<div class="col-sm-12">
<input type="text" class="form-control" id="email" name="email" placeholder="Ingrese el apellido" value="" required="">
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
<input type="hidden" class="form-control" id="mode" name="mode" value="add_personas">
<div class="form-group">
<label for="name" class="col-sm-2 control-label">Nombre</label>
<div class="col-sm-12">
<input type="text" class="form-control" id="name" name="name" placeholder="Ingrese el nombre" value="" maxlength="50" required="">
</div>
</div>
<div class="form-group">
<label class="col-sm-2 control-label">Apellido</label>
<div class="col-sm-12">
<input type="text" class="form-control" id="email" name="email" placeholder="Ingrese el apellido" value="" required="">
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
$('#usersListTable').DataTable({
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
"ajax": "fetch_personas.php"
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
mode: 'edit' 
},
dataType : 'json',
success: function(result){
$('#id').val(result.id);
$('#name').val(result.nombre);
$('#email').val(result.apellido);
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
mode: 'delete' 
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
</script>

                    <!---HASTA AQUI VA EL CODIGO-->
                </div>
            </div>
        </div>

    </body>
</html>
