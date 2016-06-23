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
        <i class="fa fa-calendar" aria-hidden="true"></i> Reservas
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
                <th id="header_Pkreserva">Cod. Reserva<% if (page.orderBy == 'Pkreserva') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
                <th id="header_FechaIni">Fecha Inicial<% if (page.orderBy == 'FechaIni') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
                <th id="header_FechaFin">Fecha Fin<% if (page.orderBy == 'FechaFin') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
                <th id="header_Precio">Precio Total ($us)<% if (page.orderBy == 'Precio') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
                <th id="header_Fkcliente">Cliente (ci/nombre/apellido)<% if (page.orderBy == 'Fkcliente') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
                <th id="header_Fkauto">Auto (placa/modelo)<% if (page.orderBy == 'Fkauto') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
                <!-- UNCOMMENT TO SHOW ADDITIONAL COLUMNS
                <th id="header_Fkempresa">Fkempresa<% if (page.orderBy == 'Fkempresa') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
                -->
            </tr>
            </thead>
            <tbody>
            <% items.each(function(item) { %>
                <tr id="<%= _.escape(item.get('pkreserva')) %>">
                    <td><%= _.escape(item.get('pkreserva') || '') %></td>
                    <td><%if (item.get('fechaIni')) { %><%= _date(app.parseDate(item.get('fechaIni'))).format('MMM D, YYYY') %><% } else { %>NULL<% } %></td>
                    <td><%if (item.get('fechaFin')) { %><%= _date(app.parseDate(item.get('fechaFin'))).format('MMM D, YYYY') %><% } else { %>NULL<% } %></td>
                    <td><%= _.escape(item.get('precio') || '') %></td>
                    <td><%= _.escape(item.get('clienteNombre') || '') %></td>
				    <td><%= _.escape(item.get('autoNombre') || '') %></td>
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
                <!-- PKreserva -->
                <input type="hidden" id="pkreserva" value="<%= _.escape(item.get('pkreserva') || '') %>">
                <div id="fechaIniInputContainer" class="control-group">
                    <label class="control-label" for="fechaIni">Fecha Inicial</label>
                    <div class="controls inline-inputs">
                        <div class="input-append date date-picker" data-date-format="yyyy-mm-dd">
                            <input id="fechaIni" type="text" value="<%= _date(app.parseDate(item.get('fechaIni'))).format('YYYY-MM-DD') %>" />
                            <span class="add-on"><i class="icon-calendar"></i></span>
                        </div>
                        <span class="help-inline"></span>
                    </div>
                </div>
                <div id="fechaFinInputContainer" class="control-group">
                    <label class="control-label" for="fechaFin">Fecha Final</label>
                    <div class="controls inline-inputs">
                        <div class="input-append date date-picker" data-date-format="yyyy-mm-dd">
                            <input id="fechaFin" type="text" value="<%= _date(app.parseDate(item.get('fechaFin'))).format('YYYY-MM-DD') %>" />
                            <span class="add-on"><i class="icon-calendar"></i></span>
                        </div>
                        <span class="help-inline"></span>
                    </div>
                </div>
                <div id="fkclienteInputContainer" class="control-group">
                    <label class="control-label" for="fkcliente">Cliente (ci/nombre/apellido)</label>
                    <div class="controls inline-inputs">
                        <select class="input-xlarge" id="fkcliente" name="fkcliente"></select>
                        <span class="help-inline"></span>
                    </div>
                </div>
                <div id="fkautoInputContainer" class="control-group">
                    <label class="control-label" for="fkauto">Auto (placa/modelo/precio por dia)</label>
                    <div class="controls inline-inputs">
                        <select class="input-xlarge" id="fkauto" name="fkauto"></select>
                        <span class="help-inline"></span>
                    </div>
                </div>
                <div id="precioInputContainer" class="control-group">
                    <label class="control-label" for="precio">Precio Total</label>
                    <div class="controls inline-inputs">
                        <input type="text" class="input-xlarge" id="precio" placeholder="Precio" value="<%= _.escape(item.get('precio') || '') %>">
                        <span class="help-inline"></span>
                    </div>
                </div>
                <!-- FKEmpresa -->
                <input type="hidden" id="fkempresa" value="<?php echo $_SESSION['empresa']->pkempresa ?>">
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
                <i class="fa fa-calendar" aria-hidden="true"></i> Reserva
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
