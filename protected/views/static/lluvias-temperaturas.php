<div class="col-xs-12 hidden-sm  titulo-mobile-hoy titulo-mobile"> <p> Clima > Lluvias y temperaturas</p> </div>

<?php
$dias=["Domingo","Lunes","Martes","Miércoles","Jueves","Viernes","Sábado"];
$mapas= ClimaMapas::model()->GetLast(7);
 ?>
<section class="col-lg-12 col-md-12 col-sm-12 col-xs-12 section">
<!-- Div contenedor -->

<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 container-lluvias">
<!-- Div contenedor de primer fecha -->

<?php foreach($mapas as $f){

$f= json_decode($f->content,true);

?>
<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 n-lluvia ">

<!-- titulo primer fecha -->
<h1 class="col-lg-12 col-md-12 col-sm-12 col-xs-12  title-lluvia"> <?php
$currentDia= date("N",$f["created"]);
echo $dias[$currentDia]." ";
echo date("d",$f["created"]);
 ?> </h1>

<!-- tres mapas -->
<div class="col-lg-12 col-md-4 col-sm-12 col-xs-12 col-lan-xs-6 map-lluvia ">

	<div  class="col-lg-12 col-md-12 col-sm-12 col-xs-12 mapa-clima" >

		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12  border-mapa" hid="4">
			<h3 class="center-to-parent" >Mapa de temperaturas máximas</h3>
		</div>

		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12    box-clima-mapas-inner" hid="3"  >

			<!-- Clima datos & clima imágen -->
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

				<!--Clima imágen-->


				<?php 
					$webroot = Yii::getPathOfAlias('webroot');
					if(!file_exists ($webroot .'/uploads/mapa-temperaturas/'. $f["nid"]."-max.jpg")){
						?>
				<img class="mapa-img" src='<?php $foto= $f['field_map_max_temperature']["und"][0]["uri"];
				$foto= str_replace("public://","http://www.agrofynews.com.ar/sites/default/files/",$foto); echo $foto; ?>' >
				<?php }else{ ?>
				<img class="mapa-img" src='<?php $foto= Yii::app()->getBaseUrl(true).'/uploads/mapa-temperaturas/'. $f["nid"]."-max.jpg"; echo $foto; ?>' >
				<?php } ?>

				<img class="escala" src='<?php echo Yii::app()->request->baseUrl; ?>/img/clima/referencias/esc-temp-max.gif' />


			</div>


		</div>
	</div>

</div>

<div class="col-lg-12 col-md-4 col-sm-12 col-xs-12 col-lan-xs-6 map-lluvia ">

	<div  class="col-lg-12 col-md-12 col-sm-12 col-xs-12 mapa-clima" >

		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12  border-mapa" hid="4">
			<h3 class="center-to-parent">Mapa de temperaturas mínimas</h3>
		</div>

		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12    box-clima-mapas-inner" hid="3"  >

			<!-- Clima datos & clima imágen -->
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

				<!--Clima imágen-->


					<?php 
					$webroot = Yii::getPathOfAlias('webroot');
					if(!file_exists ($webroot .'/uploads/mapa-temperaturas/'. $f["nid"]."-min.jpg")){
						?>
					<img class="mapa-img" src='<?php $foto= $f['field_map_min_temperature']["und"][0]["uri"];
					$foto= str_replace("public://","http://www.agrofynews.com.ar/sites/default/files/",$foto); echo $foto; ?>' >
					<?php }else{ ?>
					<img class="mapa-img" src='<?php $foto= Yii::app()->getBaseUrl(true).'/uploads/mapa-temperaturas/'. $f["nid"]."-min.jpg"; echo $foto; ?>' >
					<?php } ?>
					<img class="escala" src='<?php echo Yii::app()->request->baseUrl; ?>/img/clima/referencias/escala-temp-min.gif' />


			</div>


		</div>
	</div>

</div>

<div class="col-lg-12 col-md-4 col-sm-12 col-xs-12 col-lan-xs-6  map-lluvia ">

	<div  class="col-lg-12 col-md-12 col-sm-12 col-xs-12 mapa-clima" >

		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12  border-mapa" hid="4">
			<h3 class="center-to-parent" >Mapa de lluvias</h3>
		</div>

		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12    box-clima-mapas-inner" hid="3"  >

			<!-- Clima datos & clima imágen -->
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

				<!--Clima imágen-->


					<?php 
					$webroot = Yii::getPathOfAlias('webroot');
					if(!file_exists ($webroot .'/uploads/mapa-temperaturas/'. $f["nid"]."-lluvia.jpg")){
						?>
					<img class="mapa-img" src='<?php $foto= $f['field_rain_map']["und"][0]["uri"]; $foto= str_replace("public://","http://www.agrofynews.com.ar/sites/default/files/",$foto); echo $foto; ?>'>
					<?php }else{ ?>
					<img class="mapa-img" src='<?php $foto= Yii::app()->getBaseUrl(true).'/uploads/mapa-temperaturas/'. $f["nid"]."-lluvia.jpg"; echo $foto; ?>'>
					<?php } ?>
					<img class="escala" src='<?php echo Yii::app()->request->baseUrl; ?>/img/clima/referencias/escala-lluvia.gif'/>


			</div>


		</div>
	</div>

</div>


</div>
<?php } ?>
</div>
</section>
