<?php
	$this->assign('title','RENT | TipoAutos');
	$this->assign('nav','tipoautos');

	$this->display('_Header.tpl.php');
?>

<script type="text/javascript">
	$LAB.script("scripts/app/tipoautos.js").wait(function(){
		$(document).ready(function(){
			page.init();
		});
		
		// hack for IE9 which may respond inconsistently with document.ready
		setTimeout(function(){
			if (!page.isInitialized) page.init();
		},1000);
	});
</script>

<div class="container">

<h1>
    <i class="fa fa-truck" aria-hidden="true"></i> Tipos de Autos
	<span id=loader class="loader progress progress-striped active"><span class="bar"></span></span>
	<span class='input-append pull-right searchContainer'>
		<input id='filter' type="text" placeholder="Search..." />
		<button class='btn add-on'><i class="icon-search"></i></button>
	</span>
</h1>

	<!-- underscore template for the collection -->
	<script type="text/template" id="tipoAutoCollectionTemplate">
		<table class="collection table table-bordered table-hover">
		<thead>
			<tr>
				<th id="header_PktipoAuto">Pktipo Auto<% if (page.orderBy == 'PktipoAuto') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				<th id="header_Nombre">Nombre<% if (page.orderBy == 'Nombre') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				<th id="header_Fkempresa">Fkempresa<% if (page.orderBy == 'Fkempresa') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
			</tr>
		</thead>
		<tbody>
		<% items.each(function(item) { %>
			<tr id="<%= _.escape(item.get('pktipoAuto')) %>">
				<td><%= _.escape(item.get('pktipoAuto') || '') %></td>
				<td><%= _.escape(item.get('nombre') || '') %></td>
				<td><%= _.escape(item.get('fkempresa') || '') %></td>
			</tr>
		<% }); %>
		</tbody>
		</table>

		<%=  view.getPaginationHtml(page) %>
	</script>

	<!-- underscore template for the model -->
	<script type="text/template" id="tipoAutoModelTemplate">
		<form class="form-horizontal" onsubmit="return false;">
			<fieldset>
				<!-- PKtipo_auto -->
                <input type="hidden" id="pktipoAuto" value="<%= _.escape(item.get('pktipoAuto') || '') %>">

                <div id="nombreInputContainer" class="control-group">
					<label class="control-label" for="nombre">Nombre</label>
					<div class="controls inline-inputs">
						<input type="text" class="input-xlarge" id="nombre" placeholder="Nombre" value="<%= _.escape(item.get('nombre') || '') %>">
						<span class="help-inline"></span>
					</div>
				</div>
                <!-- FKEmpresa -->
                <input type="hidden" id="fkempresa" value="<?php echo $_SESSION['empresa']->pkempresa ?>">

            </fieldset>
		</form>

		<!-- delete button is is a separate form to prevent enter key from triggering a delete -->
		<form id="deleteTipoAutoButtonContainer" class="form-horizontal" onsubmit="return false;">
			<fieldset>
				<div class="control-group">
					<label class="control-label"></label>
					<div class="controls">
						<button id="deleteTipoAutoButton" class="btn btn-mini btn-danger"><i class="icon-trash icon-white"></i> Delete TipoAuto</button>
						<span id="confirmDeleteTipoAutoContainer" class="hide">
							<button id="cancelDeleteTipoAutoButton" class="btn btn-mini">Cancel</button>
							<button id="confirmDeleteTipoAutoButton" class="btn btn-mini btn-danger">Confirm</button>
						</span>
					</div>
				</div>
			</fieldset>
		</form>
	</script>

	<!-- modal edit dialog -->
	<div class="modal hide fade" id="tipoAutoDetailDialog">
		<div class="modal-header">
			<a class="close" data-dismiss="modal">&times;</a>
			<h3>
                <i class="fa fa-truck" aria-hidden="true"></i> Tipo de Auto
				<span id="modelLoader" class="loader progress progress-striped active"><span class="bar"></span></span>
			</h3>
		</div>
		<div class="modal-body">
			<div id="modelAlert"></div>
			<div id="tipoAutoModelContainer"></div>
		</div>
		<div class="modal-footer">
			<button class="btn" data-dismiss="modal" >Cancel</button>
			<button id="saveTipoAutoButton" class="btn btn-primary">Save Changes</button>
		</div>
	</div>

	<div id="collectionAlert"></div>
	
	<div id="tipoAutoCollectionContainer" class="collectionContainer">
	</div>

	<p id="newButtonContainer" class="buttonContainer">
		<button id="newTipoAutoButton" class="btn btn-primary">Add TipoAuto</button>
	</p>

</div> <!-- /container -->

<?php
	$this->display('_Footer.tpl.php');
?>
