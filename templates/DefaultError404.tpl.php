<?php
	$this->assign('title','RENT | File Not Found');
	$this->assign('nav','home');

	$this->display('_Header.tpl.php');
?>

<div class="container">

	<h1>Uh oh!</h1>

	<!-- this is used by app.js for scraping -->
	<!-- ERROR The page you requested was not found /ERROR -->

	<p>La pagina que solicito no se encuentra.</p>

</div> <!-- /container -->

<?php
	$this->display('_Footer.tpl.php');
?>