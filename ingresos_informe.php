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

<h2 class="float-left">Total Ingresos</h2>
<!--<a href="javascript:void(0)" class="btn btn-primary float-right add-model"> Agregar Locales </a>-->
</div>

<!---Se va a poner los diferentes botones para hacer los ingresos-->

<style>
    #suggestions, #sugerencia_persona {
    box-shadow: 2px 2px 8px 0 rgba(0,0,0,.2);
    height: auto;
    position: absolute;
    top: 70px;
    z-index: 9999;
    width: 192px;
    left: -220px;
}

#sugerencia {
    box-shadow: 2px 2px 8px 0 rgba(0,0,0,.2);
    height: auto;
    position: absolute;
    top: 70px;
    z-index: 9999;
    width: 192px;
    left: 270px;
}
 
#suggestions  .suggest-element {
    background-color: #EEEEEE;
    border-top: 1px solid #d6d4d4;
    cursor: pointer;
    padding: 8px;
    width: 100%;
    float: left;
}

#sugerencia .suggest-element2{
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
<!--<th width="7%">Id</th>
<th width="7%">Fecha Desde</th>
<th width="7%">Fecha Hasta</th>-->
<th width="7%">Fecha Ing. al Sistema</th>
<th width="7%">Fecha Factura</th>
<th width="7%">Persona</th>
<th width="7%">Puesto</th>
<th width="7%">Recibo</th>
<th width="7%">Categoria</th>
<th width="7%">Sub Categoria</th>
<th width="7%">Valor</th>
<th width="7%">Abono</th>
<th width="7%">Saldo</th>
<th width="1%">Pendiente X Pagar</th>
<th width="7%">Observaciones</th>
<th width="12%">Acciones</th>
</tr>
</thead>
<tfoot>
<tr>
<!--<th width="7%">Id</th
<th width="7%">Fecha Desde</th>
<th width="7%">Fecha Hasta</th>-->
<th width="7%">Fecha Ing. al Sistema</th>
<th width="7%">Fecha Factura</th>
<th width="7%">Persona</th>
<th width="7%">Puesto</th>
<th width="7%">Recibo</th>
<th width="7%">Categoria</th>
<th width="7%">Sub Categoria</th>
<th width="7%">Valor</th>
<th width="7%">Abono</th>
<th width="7%">Saldo</th>
<th width="1%">Pendiente X Pagar</th>
<th width="7%">Observaciones</th>
<th width="12%">Acciones</th>
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
<input type="hidden" class="form-control" id="mode" name="mode" value="update_ingresos_informe">

<!---DIVIDIR MODALES EN 2-->

<!--
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

-->

<!--SEGUNDA FILA-->

<div class="form-group">
  <div class="row">
    <div class="col">
        <label for="name" class="col-sm-12 control-label">Fecha Ing. al Sistema</label>
        <div class="col-sm-12">
            <input type="date" class="form-control" id="fecha_ing" name="fecha_ing" placeholder="Escriba el # del Local" value="" maxlength="50" required="">
        </div>
    </div>
    <div class="col">
        <label for="name" class="col-sm-12 control-label">Fecha Factura</label>
        <div class="col-sm-12">
            <input type="date" class="form-control" id="fecha_pago" name="fecha_pago" placeholder="Escriba el # del Local" value="" maxlength="50" >
        </div>
    </div>
  </div>
</div>

<!--TERCERA FILA-->

<div class="form-group">
  <div class="row">
    <div class="col">
        <label for="name" class="col-sm-12 control-label">Persona</label>
        <div class="col-sm-12">
            <!--<input type="text" class="form-control" id="persona" name="persona" placeholder="Escriba el # del Local" value="" maxlength="50" required="">-->
            <input type="text" class="form-control" id="perteneces" name="perteneces" placeholder="Escriba el nombre" value="" required="">
            <input type="hidden" class="form-control" id="perteneces_id" name="perteneces_id" placeholder="Escriba a quien Pertenece" value="" maxlength="50" required="">
        </div>
        <div id="sugerencia"></div>
    </div>
    <div class="col">
        <label for="name" class="col-sm-12 control-label">Puesto</label>
        <div class="col-sm-12">
            <!--<input type="text" class="form-control" id="local" name="local" placeholder="Escriba el # del Local" value="" maxlength="50" required="">-->
            <input type="text" class="form-control" id="pertenece" name="pertenece" placeholder="Escriba el # del Puesto" value="" maxlength="50" required="">
            <input type="hidden" class="form-control" id="pertenece_id" name="pertenece_id" placeholder="Escriba a quien Pertenecee" value="" maxlength="50" required="">
        </div>
        <div id="suggestions"></div>    
    </div>
  </div>
</div>

<!--CUARTA FILA-->

<div class="form-group">
  <div class="row">
    <div class="col">
        <label for="name" class="col-sm-12 control-label">Recibo</label>
        <div class="col-sm-12">
            <input type="text" class="form-control" id="recibo" name="recibo" placeholder="Escriba el # del Recibo" value="" maxlength="50" required="">
        </div>
    </div>
    <div class="col">
        <label for="name" class="col-sm-12 control-label">Categoria</label>
        <div class="col-sm-12">
            <input type="text" class="form-control" id="categoria" name="categoria" placeholder="Escriba la categoria" value="" maxlength="50" required="" readonly>
        </div>
    </div>
  </div>
</div>

<!--QUINTA FILA-->

<div class="form-group">
  <div class="row">
    <div class="col">
        <label for="name" class="col-sm-12 control-label">Sub Categoria</label>
        <div class="col-sm-12">
            <input type="text" class="form-control" id="sub_categ" name="sub_categ" placeholder="Escriba la sub categoria" value="" maxlength="50" required="" readonly>
        </div>
    </div>
    <div class="col">
        <label for="name" class="col-sm-12 control-label">Valor</label>
        <div class="col-sm-12">
            <input type="text" class="form-control" id="valor" name="valor" placeholder="Escriba el valor" value="" maxlength="50" required="">
        </div>
    </div>
  </div>
</div>

<!--SEXTA FILA-->

<!---- ABONO Y SALDO VAN PARA AFUERA YA QUE NO SE PUEDEN EDITAR
<div class="form-group">
  <div class="row">
    <div class="col">
        <label for="name" class="col-sm-12 control-label">Abono</label>
        <div class="col-sm-12">
            <input type="text" class="form-control" id="abono" name="abono" placeholder="Escriba la sub categoria" value="" maxlength="50" required="" disabled>
        </div>
    </div>
    <div class="col">
        <label for="name" class="col-sm-12 control-label">Saldo</label>
        <div class="col-sm-12">
            <input type="text" class="form-control" id="saldo" name="saldo" placeholder="Escriba el valor" value="" maxlength="50" required="" disabled>
        </div>
    </div>
  </div>
</div>
--->

<!--SEPTIMA FILA-->

<div class="form-group">
  <div class="row">
    <div class="col">
    <label for="name" class="col-sm-12 control-label">Pendiente</label>
        <div class="col-sm-12">
        <select class="form-select" name="pendiente" id="pendiente">
            <option value=""></option>
            <option value="si">si</option>
            <option value="no">no</option>
        </select>
        </div>  
    </div>
    <div class="col">
        <div class="col-sm-12">
        </div>
    </div>
  </div>
</div>

<!--SEPTIMA FILA-->

<div class="form-group">
  <div class="row">
    <div class="">
        <label for="name" class="col-sm-12 control-label">Observaciones</label>
        <div class="col-sm-12">
            <input type="text" class="form-control" id="obs" name="obs" placeholder="Escriba las observaciones" value="" maxlength="50" >
        </div>
    </div>
    <div class="col">
        <!--
        <label for="name" class="col-sm-2 control-label">Fecha</label>
        <div class="col-sm-12">
            <input type="text" class="form-control" id="fecha" name="fecha" placeholder="Escriba el # del Local" value="" maxlength="50" required="">
        </div>
        -->
    </div>
  </div>
</div>

<!---CODIGO ANTERIOR
<div class="form-group">
<label for="name" class="col-sm-2 control-label">Fecha</label>
<div class="col-sm-12">
<input type="text" class="form-control" id="fecha" name="fecha" placeholder="Escriba el # del Local" value="" maxlength="50" required="">
</div>
</div>

<div class="form-group">
<label class="col-sm-2 control-label">Persona</label>
<div class="col-sm-12">
<div id="sugerencia"></div>
-->
<!--<input type="text" class="form-control" id="persona" name="persona" placeholder="Escriba el nombre del Local" value="" required="">-->
<!---
<input type="text" class="form-control" id="perteneces" name="perteneces" placeholder="Escriba el nombre del Local" value="" required="">
<input type="hidden" class="form-control" id="perteneces_id" name="perteneces_id" placeholder="Escriba a quien Pertenece" value="" maxlength="50" required="">
</div>
</div>

<div class="form-group">
<label for="name" class="col-sm-2 control-label">Local</label>
<div class="col-sm-12">
<div id="suggestions"></div>    

-->
<!--<input type="text" class="form-control" id="local" name="local" placeholder="Escriba una descripción del Local" value="" maxlength="50" required="">-->
<!--
<input type="text" class="form-control" id="pertenece" name="pertenece" placeholder="Escriba una descripción del Local" value="" maxlength="50" required="">
<input type="hidden" class="form-control" id="pertenece_id" name="pertenece_id" placeholder="Escriba a quien Pertenecee" value="" maxlength="50" required="">
</div>
</div>

<div class="form-group">
<label for="name" class="col-sm-2 control-label">Valor</label>
<div class="col-sm-12">
<input type="text" class="form-control" id="valor" name="valor" placeholder="Escriba los servicios del Local separado por comas" value="" maxlength="50" required="">
</div>
</div>

<div class="form-group">
<label for="name" class="col-sm-2 control-label">Servicio</label>
<div class="col-sm-12">
<div id="suggestions"></div>
<input type="text" class="form-control" id="servicio" name="servicio" placeholder="Escriba a quien Pertenece" value="" maxlength="50" required="">
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

----->

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
</div>


<div class="modal-footer">
</div>
</div>
</div>
</div>
<script>
$(document).ready(function(){
    var table = $('#usersListTable').DataTable({
    //dom: 'Bfrtip',
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
                    columns: [ 0,1,2,3,4,5,6,7,8,9,10,11]
                }
        },
        {
            extend: 'pdfHtml5',
            orientation: 'landscape',
            titleAttr: 'Exportar a Pdf',
            className: 'btn btn-danger',
            exportOptions: {
                    columns: [ 0,1,2,3,4,5,6,7,8,9,10,11]
                },
                "customize": function (doc) {
                doc.defaultStyle.fontSize = 11; // Cambiar tamaño de fuente predeterminado
                //doc.styles.table.header.fontSize = 12; // Cambiar tamaño de fuente del encabezado de tabla
                //doc.styles.table.body.fontSize = 10; // Cambiar tamaño de fuente del cuerpo de tabla
            },                
            filename: function() {
            return "informe_ingresos"      
            },      
            title: function() {
            var searchString = table.search();        
            return searchString.length? "Search: " + searchString : "Ingresos Informe"
            }
        },
        /*
        {
            //extend: "pageLength",
            //text: "Registros"
        }
        */
            
    ],
    language: {
        /*
        buttons: {
        pageLength: '%d'
        }  
    ,
    */
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
"order": [[0, "desc"]],
"ajax": "fetch_ingresos_informe.php"
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
mode: 'edit_ingresos_informe' 
},
dataType : 'json',
success: function(result){

//nombre y num_local
$('#id').val(result.id);
//$('#fecha_desde').val(result.fecha_desde);
//$('#fecha_hasta').val(result.fecha_hasta);
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


$('#abono').val(result.abono);
$('#saldo').val(result.saldo);
//$('#persona').val(result.persona_fk);
//$('#local').val(result.local_fk);
//$('#abono').val(result.abono);
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
mode: 'delete_ingresos_informe' 
},
dataType : 'json',
success: function(result){
if(result === true){
    var oTable = $('#usersListTable').dataTable(); 
    oTable.fnDraw(false);
}else{
    alert(result)
}
}
});
} 
return false;
});
</script>

<script>

    //autocompletar el local

$(document).ready(function() {
    $('#pertenece').on('keyup', function() {
        var key = $(this).val();		
        var dataString = 'pertenece='+key;
	$.ajax({
            type: "POST",
            url: "buscar_locales_ahorro.php",
            data: dataString,
            success: function(data) {
                
                //Escribimos las sugerencias que nos manda la consulta
                $('#sugerencia').fadeIn(1000).html(data);
                //Al hacer click en alguna de las sugerencias
                $('.suggest-element2').on('click', function(){
                        //Obtenemos la id unica de la sugerencia pulsada
                        var id = $(this).attr('id');

                        var nomb = $(this).attr('numero');

                        $("#pertenece").val(nomb);

                        $('#pertenece_id').val(id);
                        //Editamos el valor del input con data de la sugerencia pulsada
                        //$('#key').val($('#'+id).attr('data'));
                        //Hacemos desaparecer el resto de sugerencias
                        $('#sugerencia').fadeOut(500);
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
