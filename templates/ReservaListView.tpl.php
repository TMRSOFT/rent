<?php
	$this->assign('title','RENT | Reservas');
	$this->assign('nav','reservas');

	$this->display('_Header.tpl.php');
?>

<script type="text/javascript">
	$LAB.script("scripts/app/reservas.js").wait(function(){
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
	<i class="icon-th-list"></i> Reservas
	<span id=loader class="loader progress progress-striped active"><span class="bar"></span></span>
	<span class='input-append pull-right searchContainer'>
		<input id='filter' type="text" placeholder="Search..." />
		<button class='btn add-on'><i class="icon-search"></i></button>
	</span>
</h1>

	<!-- underscore template for the collection -->
	<script type="text/template" id="reservaCollectionTemplate">
		<table class="collection table table-bordered table-hover">
		<thead>
			<tr>
				<th id="header_Pkreserva">Pkreserva<% if (page.orderBy == 'Pkreserva') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				<th id="header_Fecha">Fecha<% if (page.orderBy == 'Fecha') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				<th id="header_Precio">Precio<% if (page.orderBy == 'Precio') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				<th id="header_Fkcliente">Fkcliente<% if (page.orderBy == 'Fkcliente') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				<th id="header_Fkauto">Fkauto<% if (page.orderBy == 'Fkauto') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
<!-- UNCOMMENT TO SHOW ADDITIONAL COLUMNS
				<th id="header_Fkempresa">Fkempresa<% if (page.orderBy == 'Fkempresa') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
-->
			</tr>
		</thead>
		<tbody>
		<% items.each(function(item) { %>
			<tr id="<%= _.escape(item.get('pkreserva')) %>">
				<td><%= _.escape(item.get('pkreserva') || '') %></td>
				<td><%if (item.get('fecha')) { %><%= _date(app.parseDate(item.get('fecha'))).format('MMM D, YYYY') %><% } else { %>NULL<% } %></td>
				<td><%= _.escape(item.get('precio') || '') %></td>
				<td><%= _.escape(item.get('fkcliente') || '') %></td>
				<td><%= _.escape(item.get('fkauto') || '') %></td>
<!-- UNCOMMENT TO SHOW ADDITIONAL COLUMNS
				<td><%= _.escape(item.get('fkempresa') || '') %></td>
-->
			</tr>
		<% }); %>
		</tbody>
		</table>

		<%=  view.getPaginationHtml(page) %>
	</script>

	<!-- underscore template for the model -->
	<script type="text/template" id="reservaModelTemplate">
		<form class="form-horizontal" onsubmit="return false;">
			<fieldset>
				<div id="pkreservaInputContainer" class="control-group">
					<label class="control-label" for="pkreserva">Pkreserva</label>
					<div class="controls inline-inputs">
						<span class="input-xlarge uneditable-input" id="pkreserva"><%= _.escape(item.get('pkreserva') || '') %></span>
						<span class="help-inline"></span>
					</div>
				</div>
				<div id="fechaInputContainer" class="control-group">
					<label class="control-label" for="fecha">Fecha</label>
					<div class="controls inline-inputs">
						<div class="input-append date date-picker" data-date-format="yyyy-mm-dd">
							<input id="fecha" type="text" value="<%= _date(app.parseDate(item.get('fecha'))).format('YYYY-MM-DD') %>" />
							<span class="add-on"><i class="icon-calendar"></i></span>
						</div>
						<span class="help-inline"></span>
					</div>
				</div>
				<div id="precioInputContainer" class="control-group">
					<label class="control-label" for="precio">Precio</label>
					<div class="controls inline-inputs">
						<input type="text" class="input-xlarge" id="precio" placeholder="Precio" value="<%= _.escape(item.get('precio') || '') %>">
						<span class="help-inline"></span>
					</div>
				</div>
				<div id="fkclienteInputContainer" class="control-group">
					<label class="control-label" for="fkcliente">Fkcliente</label>
					<div class="controls inline-inputs">
						<input type="text" class="input-xlarge" id="fkcliente" placeholder="Fkcliente" value="<%= _.escape(item.get('fkcliente') || '') %>">
						<span class="help-inline"></span>
					</div>
				</div>
				<div id="fkautoInputContainer" class="control-group">
					<label class="control-label" for="fkauto">Fkauto</label>
					<div class="controls inline-inputs">
						<input type="text" class="input-xlarge" id="fkauto" placeholder="Fkauto" value="<%= _.escape(item.get('fkauto') || '') %>">
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
		<form id="deleteReservaButtonContainer" class="form-horizontal" onsubmit="return false;">
			<fieldset>
				<div class="control-group">
					<label class="control-label"></label>
					<div class="controls">
						<button id="deleteReservaButton" class="btn btn-mini btn-danger"><i class="icon-trash icon-white"></i> Delete Reserva</button>
						<span id="confirmDeleteReservaContainer" class="hide">
							<button id="cancelDeleteReservaButton" class="btn btn-mini">Cancel</button>
							<button id="confirmDeleteReservaButton" class="btn btn-mini btn-danger">Confirm</button>
						</span>
					</div>
				</div>
			</fieldset>
		</form>
	</script>

	<!-- modal edit dialog -->
	<div class="modal hide fade" id="reservaDetailDialog">
		<div class="modal-header">
			<a class="close" data-dismiss="modal">&times;</a>
			<h3>
				<i class="icon-edit"></i> Edit Reserva
				<span id="modelLoader" class="loader progress progress-striped active"><span class="bar"></span></span>
			</h3>
		</div>
		<div class="modal-body">
			<div id="modelAlert"></div>
			<div id="reservaModelContainer"></div>
		</div>
		<div class="modal-footer">
			<button class="btn" data-dismiss="modal" >Cancel</button>
			<button id="saveReservaButton" class="btn btn-primary">Save Changes</button>
		</div>
	</div>

	<div id="collectionAlert"></div>
	
	<div id="reservaCollectionContainer" class="collectionContainer">
	</div>

	<p id="newButtonContainer" class="buttonContainer">
		<button id="newReservaButton" class="btn btn-primary">Add Reserva</button>
	</p>

</div> <!-- /container -->

<?php
	$this->display('_Footer.tpl.php');
?>
