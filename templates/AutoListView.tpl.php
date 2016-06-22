<?php
	$this->assign('title','RENT | Autos');
	$this->assign('nav','autos');

	$this->display('_Header.tpl.php');
?>

<script type="text/javascript">
	$LAB.script("scripts/app/autos.js").wait(function(){
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
	<i class="icon-th-list"></i> Autos
	<span id=loader class="loader progress progress-striped active"><span class="bar"></span></span>
	<span class='input-append pull-right searchContainer'>
		<input id='filter' type="text" placeholder="Search..." />
		<button class='btn add-on'><i class="icon-search"></i></button>
	</span>
</h1>

	<!-- underscore template for the collection -->
	<script type="text/template" id="autoCollectionTemplate">
		<table class="collection table table-bordered table-hover">
		<thead>
			<tr>
				<th id="header_Placa">Placa<% if (page.orderBy == 'Placa') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				<th id="header_Modelo">Modelo<% if (page.orderBy == 'Modelo') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				<th id="header_Fkmarca">Fkmarca<% if (page.orderBy == 'Fkmarca') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				<th id="header_FktipoAuto">Fktipo Auto<% if (page.orderBy == 'FktipoAuto') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				<th id="header_Ano">Ano<% if (page.orderBy == 'Ano') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
<!-- UNCOMMENT TO SHOW ADDITIONAL COLUMNS
				<th id="header_Motor">Motor<% if (page.orderBy == 'Motor') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				<th id="header_Color">Color<% if (page.orderBy == 'Color') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				<th id="header_NroPuertas">Nro Puertas<% if (page.orderBy == 'NroPuertas') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				<th id="header_Capacidad">Capacidad<% if (page.orderBy == 'Capacidad') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				<th id="header_PrecioPorDia">Precio Por Dia<% if (page.orderBy == 'PrecioPorDia') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				<th id="header_TipoCombustible">Tipo Combustible<% if (page.orderBy == 'TipoCombustible') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				<th id="header_CapacidadCombustible">Capacidad Combustible<% if (page.orderBy == 'CapacidadCombustible') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				<th id="header_TipoCaja">Tipo Caja<% if (page.orderBy == 'TipoCaja') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				<th id="header_Estado">Estado<% if (page.orderBy == 'Estado') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				<th id="header_Foto">Foto<% if (page.orderBy == 'Foto') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				<th id="header_Fkempresa">Fkempresa<% if (page.orderBy == 'Fkempresa') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
-->
			</tr>
		</thead>
		<tbody>
		<% items.each(function(item) { %>
			<tr id="<%= _.escape(item.get('placa')) %>">
				<td><%= _.escape(item.get('placa') || '') %></td>
				<td><%= _.escape(item.get('modelo') || '') %></td>
				<td><%= _.escape(item.get('fkmarca') || '') %></td>
				<td><%= _.escape(item.get('fktipoAuto') || '') %></td>
				<td><%= _.escape(item.get('ano') || '') %></td>
<!-- UNCOMMENT TO SHOW ADDITIONAL COLUMNS
				<td><%= _.escape(item.get('motor') || '') %></td>
				<td><%= _.escape(item.get('color') || '') %></td>
				<td><%= _.escape(item.get('nroPuertas') || '') %></td>
				<td><%= _.escape(item.get('capacidad') || '') %></td>
				<td><%= _.escape(item.get('precioPorDia') || '') %></td>
				<td><%= _.escape(item.get('tipoCombustible') || '') %></td>
				<td><%= _.escape(item.get('capacidadCombustible') || '') %></td>
				<td><%= _.escape(item.get('tipoCaja') || '') %></td>
				<td><%= _.escape(item.get('estado') || '') %></td>
				<td><%= _.escape(item.get('foto') || '') %></td>
				<td><%= _.escape(item.get('fkempresa') || '') %></td>
-->
			</tr>
		<% }); %>
		</tbody>
		</table>

		<%=  view.getPaginationHtml(page) %>
	</script>

	<!-- underscore template for the model -->
	<script type="text/template" id="autoModelTemplate">
		<form class="form-horizontal" onsubmit="return false;">
			<fieldset>
				<div id="placaInputContainer" class="control-group">
					<label class="control-label" for="placa">Placa</label>
					<div class="controls inline-inputs">
						<input type="text" class="input-xlarge" id="placa" placeholder="Placa" value="<%= _.escape(item.get('placa') || '') %>">
						<span class="help-inline"></span>
					</div>
				</div>
				<div id="modeloInputContainer" class="control-group">
					<label class="control-label" for="modelo">Modelo</label>
					<div class="controls inline-inputs">
						<input type="text" class="input-xlarge" id="modelo" placeholder="Modelo" value="<%= _.escape(item.get('modelo') || '') %>">
						<span class="help-inline"></span>
					</div>
				</div>
				<div id="fkmarcaInputContainer" class="control-group">
					<label class="control-label" for="fkmarca">Fkmarca</label>
					<div class="controls inline-inputs">
						<input type="text" class="input-xlarge" id="fkmarca" placeholder="Fkmarca" value="<%= _.escape(item.get('fkmarca') || '') %>">
						<span class="help-inline"></span>
					</div>
				</div>
				<div id="fktipoAutoInputContainer" class="control-group">
					<label class="control-label" for="fktipoAuto">Fktipo Auto</label>
					<div class="controls inline-inputs">
						<input type="text" class="input-xlarge" id="fktipoAuto" placeholder="Fktipo Auto" value="<%= _.escape(item.get('fktipoAuto') || '') %>">
						<span class="help-inline"></span>
					</div>
				</div>
				<div id="anoInputContainer" class="control-group">
					<label class="control-label" for="ano">Ano</label>
					<div class="controls inline-inputs">
						<input type="text" class="input-xlarge" id="ano" placeholder="Ano" value="<%= _.escape(item.get('ano') || '') %>">
						<span class="help-inline"></span>
					</div>
				</div>
				<div id="motorInputContainer" class="control-group">
					<label class="control-label" for="motor">Motor</label>
					<div class="controls inline-inputs">
						<input type="text" class="input-xlarge" id="motor" placeholder="Motor" value="<%= _.escape(item.get('motor') || '') %>">
						<span class="help-inline"></span>
					</div>
				</div>
				<div id="colorInputContainer" class="control-group">
					<label class="control-label" for="color">Color</label>
					<div class="controls inline-inputs">
						<input type="text" class="input-xlarge" id="color" placeholder="Color" value="<%= _.escape(item.get('color') || '') %>">
						<span class="help-inline"></span>
					</div>
				</div>
				<div id="nroPuertasInputContainer" class="control-group">
					<label class="control-label" for="nroPuertas">Nro Puertas</label>
					<div class="controls inline-inputs">
						<input type="text" class="input-xlarge" id="nroPuertas" placeholder="Nro Puertas" value="<%= _.escape(item.get('nroPuertas') || '') %>">
						<span class="help-inline"></span>
					</div>
				</div>
				<div id="capacidadInputContainer" class="control-group">
					<label class="control-label" for="capacidad">Capacidad</label>
					<div class="controls inline-inputs">
						<input type="text" class="input-xlarge" id="capacidad" placeholder="Capacidad" value="<%= _.escape(item.get('capacidad') || '') %>">
						<span class="help-inline"></span>
					</div>
				</div>
				<div id="precioPorDiaInputContainer" class="control-group">
					<label class="control-label" for="precioPorDia">Precio Por Dia</label>
					<div class="controls inline-inputs">
						<input type="text" class="input-xlarge" id="precioPorDia" placeholder="Precio Por Dia" value="<%= _.escape(item.get('precioPorDia') || '') %>">
						<span class="help-inline"></span>
					</div>
				</div>
				<div id="tipoCombustibleInputContainer" class="control-group">
					<label class="control-label" for="tipoCombustible">Tipo Combustible</label>
					<div class="controls inline-inputs">
						<input type="text" class="input-xlarge" id="tipoCombustible" placeholder="Tipo Combustible" value="<%= _.escape(item.get('tipoCombustible') || '') %>">
						<span class="help-inline"></span>
					</div>
				</div>
				<div id="capacidadCombustibleInputContainer" class="control-group">
					<label class="control-label" for="capacidadCombustible">Capacidad Combustible</label>
					<div class="controls inline-inputs">
						<input type="text" class="input-xlarge" id="capacidadCombustible" placeholder="Capacidad Combustible" value="<%= _.escape(item.get('capacidadCombustible') || '') %>">
						<span class="help-inline"></span>
					</div>
				</div>
				<div id="tipoCajaInputContainer" class="control-group">
					<label class="control-label" for="tipoCaja">Tipo Caja</label>
					<div class="controls inline-inputs">
						<input type="text" class="input-xlarge" id="tipoCaja" placeholder="Tipo Caja" value="<%= _.escape(item.get('tipoCaja') || '') %>">
						<span class="help-inline"></span>
					</div>
				</div>
				<div id="estadoInputContainer" class="control-group">
					<label class="control-label" for="estado">Estado</label>
					<div class="controls inline-inputs">
						<input type="text" class="input-xlarge" id="estado" placeholder="Estado" value="<%= _.escape(item.get('estado') || '') %>">
						<span class="help-inline"></span>
					</div>
				</div>
				<div id="fotoInputContainer" class="control-group">
					<label class="control-label" for="foto">Foto</label>
					<div class="controls inline-inputs">
						<input type="text" class="input-xlarge" id="foto" placeholder="Foto" value="<%= _.escape(item.get('foto') || '') %>">
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
		<form id="deleteAutoButtonContainer" class="form-horizontal" onsubmit="return false;">
			<fieldset>
				<div class="control-group">
					<label class="control-label"></label>
					<div class="controls">
						<button id="deleteAutoButton" class="btn btn-mini btn-danger"><i class="icon-trash icon-white"></i> Delete Auto</button>
						<span id="confirmDeleteAutoContainer" class="hide">
							<button id="cancelDeleteAutoButton" class="btn btn-mini">Cancel</button>
							<button id="confirmDeleteAutoButton" class="btn btn-mini btn-danger">Confirm</button>
						</span>
					</div>
				</div>
			</fieldset>
		</form>
	</script>

	<!-- modal edit dialog -->
	<div class="modal hide fade" id="autoDetailDialog">
		<div class="modal-header">
			<a class="close" data-dismiss="modal">&times;</a>
			<h3>
				<i class="icon-edit"></i> Edit Auto
				<span id="modelLoader" class="loader progress progress-striped active"><span class="bar"></span></span>
			</h3>
		</div>
		<div class="modal-body">
			<div id="modelAlert"></div>
			<div id="autoModelContainer"></div>
		</div>
		<div class="modal-footer">
			<button class="btn" data-dismiss="modal" >Cancel</button>
			<button id="saveAutoButton" class="btn btn-primary">Save Changes</button>
		</div>
	</div>

	<div id="collectionAlert"></div>
	
	<div id="autoCollectionContainer" class="collectionContainer">
	</div>

	<p id="newButtonContainer" class="buttonContainer">
		<button id="newAutoButton" class="btn btn-primary">Add Auto</button>
	</p>

</div> <!-- /container -->

<?php
	$this->display('_Footer.tpl.php');
?>
