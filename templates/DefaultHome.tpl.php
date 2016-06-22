<?php
	$this->assign('title','RENT | Home');
	$this->assign('nav','home');
	$this->display('_Header.tpl.php');
?>

	<div class="modal hide fade" id="getStartedDialog">
		<div class="modal-header">
			<a class="close" data-dismiss="modal">&times;</a>
			<h3><i class="fa fa-bar-chart" aria-hidden="true"></i> Mis estadisticas</h3>
		</div>
		<div class="modal-body" style="max-height: 300px">
			<p>Clientes registrados: <?php echo $this->clientes->Count();  ?></p>
            <p>Autos registrados: <?php echo $this->autos->Count(); ?></p>
            <p>Reservas registradas: <?php echo $this->reservas->Count();  ?></p>
            <p>Tipos de autos registrados: <?php echo $this->tipoautos->Count();  ?></p>
            <p>Marcas de autos registradas: <?php echo $this->marcas->Count();  ?></p>
		</div>
		<div class="modal-footer">
			<button id="okButton" data-dismiss="modal" class="btn btn-primary">Cerrar</button>
		</div>
	</div>

	<div class="container">
		<!-- Main hero unit for a primary marketing message or call to action -->
		<div class="hero-unit">
			<h1><?php echo $_SESSION['empresa']->nombre ?> <i class="fa fa-car" aria-hidden="true"></i></h1>
			<p>Bienvenido de nuevo <?php echo $_SESSION['empresa']->administrador_nombre ?>. Su sistema estara siempre listo para usted</p>
            <p>Desde aquí puede controlar su empresa con la ayuda de este software. El menu de administrador se encuentra
            en la parte superior de su pantalla. También puede ingresar a esta página a través de su dispositivo móvil</p>
			
			<p>Desarrollado por <a href="http://tmrsoft.tk" target="_blank">TRMSOFT</a> mejorado por framework <a href="http://phreeze.com" target="_blank">phreeze</a></p>

			<p><em>Software del mañana <i class="fa fa-smile-o"></i></em></p>
			
			<a class="btn btn-primary btn-large" data-toggle="modal" href="#getStartedDialog">Mis estadisticas &raquo;</a></p>
		</div>
	</div> <!-- /container -->

<?php
	$this->display('_Footer.tpl.php');
?>