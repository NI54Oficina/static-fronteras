<?php
/* @var $this notasController */
/* @var $model notas */

$this->breadcrumbs=array(
	'notass'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'Crear notas', 'url'=>array('create')),
);

?>

<style>


#tablePais td{
	
}
.delete{
	color:#337ab7;
	cursor:pointer;
}
.delete:hover{
	color:#23527c;
	text-decoration:underline;
}
</style>


<h1>Administrar notas</h1>


<table id="tablePais" style="width:100%;">
<thead> <tr>
            <th>id</th>
            <th style="">Fecha</th>
            <th style="">Nombre</th>
            <th style="">Mail</th>
            <th style="">Motivo</th>
            <th style="">Abierto</th>
            <th style="min-width:70px;"></th>
        </tr>
	</thead>
<tbody>
<?php 

foreach($model as $notas){
	
	echo "<tr> <td>".$notas->id."</td>";
	echo " <td>".$notas->fecha."</td>";
	echo " <td>".$notas->nombre."</td>";
	echo " <td>".$notas->mail."</td>";
	echo " <td>".$notas->motivo."</td>";
	echo " <td>".$notas->abierto."</td>";
	echo " <td class='btn-tablas'><a href='".Yii::app()->getBaseUrl(true)."/ar/chat/view/".$notas->id."'><span class='glyphicon glyphicon-file'></span> </a>";
	
		echo "<a href='".Yii::app()->getBaseUrl(true)."/ar/chat/update/".$notas->id."'><span class='glyphicon glyphicon-pencil'></span></a>";

			echo "<p class='delete' href='".Yii::app()->getBaseUrl(true)."/ar/chat/delete/".$notas->id."'><span class='glyphicon glyphicon-trash'></span> </p>";
	echo "</td></tr>";
	
}

?>
</tbody>
</table>

<script>
var table;
$(document).ready(function(){
    table=$('#tablePais').DataTable({"columnDefs": [ {
"targets": 2,
"orderable": false
} ]});
	$("[type='search']").attr("placeholder","Busqueda");
});

jQuery(document).on('click','.delete',function() {
	if(!confirm('Are you sure you want to delete this item?')) return false;
	$(".loading").show();
	var row=this;
	
	$.post( $(this).attr('href'), function( data ) {
		console.log("borrado");
		 table
        .row( $(row).parents('tr') )
        .remove()
        .draw();
		$(".loading").hide();
		
	});
	
	
	/*jQuery('#notas-grid').yiiGridView('update', {
		type: 'POST',
		url: jQuery(this).attr('href'),
		success: function(data) {
			//jQuery('#notas-grid').yiiGridView('update');
			//afterDelete(th, true, data);
			console.log("borradoooo");
		},
		error: function(XHR) {
			return afterDelete(th, false, XHR);
		}
	});*/
	//return false;
});

</script>

