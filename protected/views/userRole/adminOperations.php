<?php
/* @var $this ProductoController */
/* @var $model Producto */


/*$this->menu=array(
	array('label'=>'Crear Producto', 'url'=>array('create')),
);*/
$auth=Yii::app()->authManager;
?>

<style>
#tablePais table,#tablePais th,#tablePais td{
	border: 1px solid gray;
	padding:10px;
}

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


<h1>Administrar Operaciones</h1>


<table id="tablePais">
<thead> <tr>
           
            <th>Nombre</th>
            <th>Botones</th>
        </tr>
	</thead>
<tbody>
<?php 
foreach($auth->operations as $producto){
	
	echo " <td>".$producto->name."</td>";
	echo " <td><a href='".Yii::app()->getBaseUrl(true)."/userRole/operations/".$producto->name."'>Ver </a>";
	echo "<p class='delete' href='".Yii::app()->getBaseUrl(true)."/userRole/deleteOperations/name/".$producto->name."'>Delete </p>";
	echo "</td></tr>";
}
?>
</tbody>
</table>

<script>
var table;
$(document).ready(function(){
    table=$('#tablePais').DataTable();
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
	
	
});

</script>

