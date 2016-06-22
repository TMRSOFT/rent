<?php
	$this->assign('title','RENT | Clientes');
	$this->assign('nav','clientes');

	$this->display('_Header.tpl.php');
?>

<script type="text/javascript">
	$LAB.script("scripts/app/clientes.js").wait(function(){
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
	<i class="icon-th-list"></i> Clientes
	<span id=loader class="loader progress progress-striped active"><span class="bar"></span></span>
	<span class='input-append pull-right searchContainer'>
		<input id='filter' type="text" placeholder="Search..." />
		<button class='btn add-on'><i class="icon-search"></i></button>
	</span>
</h1>

	<!-- underscore template for the collection -->
	<script type="text/template" id="clienteCollectionTemplate">
		<table class="collection table table-bordered table-hover">
		<thead>
			<tr>
				<th id="header_Pkcliente">Pkcliente<% if (page.orderBy == 'Pkcliente') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				<th id="header_Ci">Ci<% if (page.orderBy == 'Ci') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				<th id="header_Nombre">Nombre<% if (page.orderBy == 'Nombre') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				<th id="header_Apellido">Apellido<% if (page.orderBy == 'Apellido') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				<th id="header_Telefono">Telefono<% if (page.orderBy == 'Telefono') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
<!-- UNCOMMENT TO SHOW ADDITIONAL COLUMNS
				<th id="header_Correo">Correo<% if (page.orderBy == 'Correo') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				<th id="header_Fkempresa">Fkempresa<% if (page.orderBy == 'Fkempresa') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
-->
			</tr>
		</thead>
		<tbody>
		<% items.each(function(item) { %>
			<tr id="<%= _.escape(item.get('pkcliente')) %>">
				<td><%= _.escape(item.get('pkcliente') || '') %></td>
				<td><%= _.escape(item.get('ci') || '') %></td>
				<td><%= _.escape(item.get('nombre') || '') %></td>
				<td><%= _.escape(item.get('apellido') || '') %></td>
				<td><%= _.escape(item.get('telefono') || '') %></td>
<!-- UNCOMMENT TO SHOW ADDITIONAL COLUMNS
				<td><%= _.escape(item.get('correo') || '') %></td>
				<td><%= _.escape(item.get('fkempresa') || '') %></td>
-->
			</tr>
		<% }); %>
		</tbody>
		</table>

		<%=  view.getPaginationHtml(page) %>
	</script>

	<!-- underscore template for the model -->
	<script type="text/template" id="clienteModelTemplate">
		<form class="form-horizontal" onsubmit="return false;">
			<fieldset>
				<div id="pkclienteInputContainer" class="control-group">
					<label class="control-label" for="pkcliente">Pkcliente</label>
					<div class="controls inline-inputs">
						<span class="input-xlarge uneditable-input" id="pkcliente"><%= _.escape(item.get('pkcliente') || '') %></span>
						<span class="help-inline"></span>
					</div>
				</div>
				<div id="ciInputContainer" class="control-group">
					<label class="control-label" for="ci">Ci</label>
					<div class="controls inline-inputs">
						<input type="text" class="input-xlarge" id="ci" placeholder="Ci" value="<%= _.escape(item.get('ci') || '') %>">
						<span class="help-inline"></span>
					</div>
				</div>
				<div id="nombreInputContainer" class="control-group">
					<label class="control-label" for="nombre">Nombre</label>
					<div class="controls inline-inputs">
						<input type="text" class="input-xlarge" id="nombre" placeholder="Nombre" value="<%= _.escape(item.get('nombre') || '') %>">
						<span class="help-inline"></span>
					</div>
				</div>
				<div id="apellidoInputContainer" class="control-group">
					<label class="control-label" for="apellido">Apellido</label>
					<div class="controls inline-inputs">
						<input type="text" class="input-xlarge" id="apellido" placeholder="Apellido" value="<%= _.escape(item.get('apellido') || '') %>">
						<span class="help-inline"></span>
					</div>
				</div>
				<div id="telefonoInputContainer" class="control-group">
					<label class="control-label" for="telefono">Telefono</label>
					<div class="controls inline-inputs">
						<input type="text" class="input-xlarge" id="telefono" placeholder="Telefono" value="<%= _.escape(item.get('telefono') || '') %>">
						<span class="help-inline"></span>
					</div>
				</div>
				<div id="correoInputContainer" class="control-group">
					<label class="control-label" for="correo">Correo</label>
					<div class="controls inline-inputs">
						<input type="text" class="input-xlarge" id="correo" placeholder="Correo" value="<%= _.escape(item.get('correo') || '') %>">
						<span class="help-inline"></span>
					</div>
				</div>
				<div id="fkempresaInputContainer" class="control-group">
					<label class="control-label" for="fkempresa">Fkempresa</label>
					<div class="controls inline-inputs">
						<input type="text" class="input-xlarge" id="fkempresa" placeholder="Fkempresa" value="<%= _.escape(item.get('fkempresa') || '') %>">
						<span class="help-inline"></span>
					</div>
				</div>
			</fieldset>
		</form>

		<!-- delete button is is a separate form to prevent enter key from triggering a delete -->
		<form id="deleteClienteButtonContainer" class="form-horizontal" onsubmit="return false;">
			<fieldset>
				<div class="control-group">
					<label class="control-label"></label>
					<div class="controls">
						<button id="deleteClienteButton" class="btn btn-mini btn-danger"><i class="icon-trash icon-white"></i> Delete Cliente</button>
						<span id="confirmDeleteClienteContainer" class="hide">
							<button id="cancelDeleteClienteButton" class="btn btn-mini">Cancel</button>
							<button id="confirmDeleteClienteButton" class="btn btn-mini btn-danger">Confirm</button>
						</span>
					</div>
				</div>
			</fieldset>
		</form>
	</script>

	<!-- modal edit dialog -->
	<div class="modal hide fade" id="clienteDetailDialog">
		<div class="modal-header">
			<a class="close" data-dismiss="modal">&times;</a>
			<h3>
				<i class="icon-edit"></i> Edit Cliente
				<span id="modelLoader" class="loader progress progress-striped active"><span class="bar"></span></span>
			</h3>
		</div>
		<div class="modal-body">
			<div id="modelAlert"></div>
			<div id="clienteModelContainer"></div>
		</div>
		<div class="modal-footer">
			<button class="btn" data-dismiss="modal" >Cancel</button>
			<button id="saveClienteButton" class="btn btn-primary">Save Changes</button>
		</div>
	</div>

	<div id="collectionAlert"></div>
	
	<div id="clienteCollectionContainer" class="collectionContainer">
	</div>

	<p id="newButtonContainer" class="buttonContainer">
		<button id="newClienteButton" class="btn btn-primary">Add Cliente</button>
	</p>

</div> <!-- /container -->

<?php
	$this->display('_Footer.tpl.php');
?>
