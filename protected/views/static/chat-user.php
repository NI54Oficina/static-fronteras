
        <link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/css/jsKeyboard.css" type="text/css" media="screen"/>


		<script type="text/javascript">
      /*(function(){
        var bsa = document.createElement('script');
           bsa.type = 'text/javascript';
           bsa.async = true;
           bsa.src = 'http://s3.buysellads.com/ac/bsa.js';
        (document.getElementsByTagName('head')[0]||document.getElementsByTagName('body')[0]).appendChild(bsa);
      })();*/
      </script>
      <!-- End BuySellAds Ad Code -->
	  <script src="<?php echo Yii::app()->request->baseUrl; ?>/js/vendor/modernizr-2.6.2-respond-1.1.0.min.js"></script>
	  
	  
<section class="col-lg-12 col-md-12 col-sm-12 col-xs-12 ayuda" id="ayuda">
	<div class="col-xs-12  hidden-sm titulo-mobile-ayuda titulo-mobile"> <p> Ayuda </p> </div>

	<p class="title-ayuda-mobile hidden-sm ">	Ingrese sus datos para comenzar</br> <span class="atencion-cliente">La atención es de 8:30h a 17:00h</span></p>

	<div class="col-lg-12 col-md-12 col-sm-4 col-xs-12 ayuda-box-side hidden-xs hidden-md hidden-lg ">
		<div class="square box-title-ayuda">
			<img class="img-box-ayuda" src="<?php echo Yii::app()->request->baseUrl; ?>/img/icono-chat.svg" alt="" />
			<div class="center-to-parent title-inside-ayuda">
				<h1> Ayuda</h1>
				<p>	Ingrese sus datos para comenzar</p>
			</div>
		</div>


	</div>


	<div class="col-lg-12 col-md-12 col-sm-8 col-xs-12 ayuda-form-side">


		<form id="datosUser">
		<!-- <label>Nombre:</label> -->
		<input name="nombre" required placeholder="Nombre" /><br>
		<!-- <label>Email:</label> -->
		<input name="email" required placeholder="Email" /><br>
		<!-- <label>Motivo:</label> -->
		<textarea name="motivo" placeholder="Escriba su mensaje aquí"></textarea> </br>
		<p class="hidden-xs hidden-md hidden-lg atencion-cliente ">
			La atención es de 8:30h a 17:00h
		</p>
		<input type="submit" class="send-button-a" />
		</form>

		<div class="page-wrap chatUser" chatid="-1" style="display:none">



        <div class="chat-wrap"><div class="chat-area">
				<div class="welcome-message">
					<span>Bienvenido</span></br> a la mesa de ayuda de Fronteras 2.0. </br>
				</div>
				<div class="hold-message">
					Aguarde unos instantes y será atendido.
				</div>


			</div></div>

        <form class="send-message-area max-box-chat">
            <!-- <p>Your message: </p> -->
            <textarea class="sendie" maxlength="300" placeholder="Escriba su mensaje aquí"  ></textarea>
						<button class="center-to-parent send-chat" type="" name="button" style="">Enviar</button>

        </form>

		</div>

	</div>
	
	<div id="virtualKeyboard"></div>

</section>

<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/jsKeyboard.js"></script>
<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/main2.js"></script>


<script>setTimeout(function(){$("[name=nombre]").focus();},1500);</script>