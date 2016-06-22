<?php
	$this->assign('title','RENT | Marcas');
	$this->assign('nav','marcas');

	$this->display('_Header.tpl.php');
?>

<script type="text/javascript">
	$LAB.script("scripts/app/marcas.js").wait(function(){
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
    <i class="fa fa-bookmark" aria-hidden="true"></i> Marcas de autos
	<span id=loader class="loader progress progress-striped active"><span class="bar"></span></span>
	<span class='input-append pull-right searchContainer'>
		<input id='filter' type="text" placeholder="Search..." />
		<button class='btn add-on'><i class="icon-search"></i></button>
	</span>
</h1>

	<!-- underscore template for the collection -->
	<script type="text/template" id="marcaCollectionTemplate">
		<table class="collection table table-bordered table-hover">
		<thead>
			<tr>
				<th id="header_Pkmarca">Pkmarca<% if (page.orderBy == 'Pkmarca') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				<th id="header_Nombre">Nombre<% if (page.orderBy == 'Nombre') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				<th id="header_Pais">Pais<% if (page.orderBy == 'Pais') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				<th id="header_Fkempresa">Fkempresa<% if (page.orderBy == 'Fkempresa') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
			</tr>
		</thead>
		<tbody>
		<% items.each(function(item) { %>
			<tr id="<%= _.escape(item.get('pkmarca')) %>">
				<td><%= _.escape(item.get('pkmarca') || '') %></td>
				<td><%= _.escape(item.get('nombre') || '') %></td>
				<td><%= _.escape(item.get('pais') || '') %></td>
				<td><%= _.escape(item.get('fkempresa') || '') %></td>
			</tr>
		<% }); %>
		</tbody>
		</table>

		<%=  view.getPaginationHtml(page) %>
	</script>

	<!-- underscore template for the model -->
	<script type="text/template" id="marcaModelTemplate">
		<form class="form-horizontal" onsubmit="return false;">
			<fieldset>
                <!-- PKmarca -->
                <input type="hidden" id="pkmarca" value="<%= _.escape(item.get('pkmarca') || '') %>">

                <div id="nombreInputContainer" class="control-group">
					<label class="control-label" for="nombre">Nombre</label>
					<div class="controls inline-inputs">
						<input type="text" class="input-xlarge" id="nombre" placeholder="Nombre" value="<%= _.escape(item.get('nombre') || '') %>">
						<span class="help-inline"></span>
					</div>
				</div>
				<div id="paisInputContainer" class="control-group">
					<label class="control-label" for="pais">Pais</label>
					<div class="controls inline-inputs">
						<input type="text" class="input-xlarge" id="pais" placeholder="Pais" value="<%= _.escape(item.get('pais') || '') %>">
						<span class="help-inline"></span>
					</div>
				</div>
				<!-- FKEmpresa -->
                <input type="hidden" id="fkempresa" value="<?php echo $_SESSION['empresa']->pkempresa ?>">

            </fieldset>
		</form>

		<!-- delete button is is a separate form to prevent enter key from triggering a delete -->
		<form id="deleteMarcaButtonContainer" class="form-horizontal" onsubmit="return false;">
			<fieldset>
				<div class="control-group">
					<label class="control-label"></label>
					<div class="controls">
						<button id="deleteMarcaButton" class="btn btn-mini btn-danger"><i class="icon-trash icon-white"></i> Delete Marca</button>
						<span id="confirmDeleteMarcaContainer" class="hide">
							<button id="cancelDeleteMarcaButton" class="btn btn-mini">Cancel</button>
							<button id="confirmDeleteMarcaButton" class="btn btn-mini btn-danger">Confirm</button>
						</span>
					</div>
				</div>
			</fieldset>
		</form>
	</script>

	<!-- modal edit dialog -->
	<div class="modal hide fade" id="marcaDetailDialog">
		<div class="modal-header">
			<a class="close" data-dismiss="modal">&times;</a>
			<h3>
                <i class="fa fa-bookmark" aria-hidden="true"></i> Marca de auto
				<span id="modelLoader" class="loader progress progress-striped active"><span class="bar"></span></span>
			</h3>
		</div>
		<div class="modal-body">
			<div id="modelAlert"></div>
			<div id="marcaModelContainer"></div>
		</div>
		<div class="modal-footer">
			<button class="btn" data-dismiss="modal" >Cancel</button>
			<button id="saveMarcaButton" class="btn btn-primary">Save Changes</button>
		</div>
	</div>

	<div id="collectionAlert"></div>
	
	<div id="marcaCollectionContainer" class="collectionContainer">
	</div>

	<p id="newButtonContainer" class="buttonContainer">
		<button id="newMarcaButton" class="btn btn-primary">Add Marca</button>
	</p>

</div> <!-- /container -->

<?php
	$this->display('_Footer.tpl.php');
?>
