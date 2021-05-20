<div class="modal fade" id="NuevoLote">
	<div class="modal-dialog modal-fluid" role="document">
		<div class="modal-content">
			<div class="modal-header iconosModales mt-2 mt-md-0">
				<div class="col-auto bg-warning p-2 icono">
					<img src="assets/img/polluelo.svg" height="40px" class="align-self-center">
				</div>
				<h4 class="modal-title mt-3 ml-2">Nuevo Lote</h4>
				<button type="button" class="close mt-2" data-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">&times;</span>
				<span class="sr-only">Close</span>
				</button>
			</div>
			<div class="modal-body">
				<div class="row">
					<div class="col-6">
						<div class="input-group input-group-sm mb-2">
							<div class="input-group-prepend">
								<label class="input-group-text">Línea Genética</label>
							</div>
							<select class="form-control">
								<option disabled selected>Escoge la Línea Genética</option>
							</select>
						</div>
						<div class="row">
							<div class="input-group input-group-sm mb-2 col-6">
								<div class="input-group-prepend">
									<label class="input-group-text">Lote</label>
								</div>
								<input type="number" name="loteNuevoLote" placeholder="Número del lote" class="form-control">
							</div>
							<div class="input-group input-group-sm mb-2 col-6">
								<div class="input-group-prepend">
									<label class="input-group-text">N° Gallinas</label>
								</div>
								<input type="number" name="GallinasNuevoLote" class="form-control" placeholder="">
							</div>
						</div>
						<div class="row">
							<div class="input-group input-group-sm mb-2 col-5">
								<div class="input-group-prepend">
									<label class="input-group-text">Galpón</label>
								</div>
								<select class="form-control">
									<option disabled selected>Escoge el galpón deseado</option>
								</select>
							</div>
							<div class="input-group input-group-sm mb-2 col-7">
								<div class="input-group-prepend">
									<label class="input-group-text">Fecha Inicio</label>
								</div>
								<input type="date" name="fechaInicioNuevoLote" class="form-control">
							</div>
						</div>
						<h5>Características de la línea genética</h5>
						<table class="table table-responsive p-0 table-sm text-center col-12">
							<thead class="table-info" >
								<th>N° Galpón</th>
								<th>N° Gallinas</th>
								<th>Borrar</th>
							</thead>
							<tbody class="table-light">
								<tr>
									<td><input type="number" id="Mortalidad" name="Mortalidad"></td>
									<td><input type="number" id="pMortalidad" name="pMortalidad"></td>
									<td><input type="number" id="Produccion" name="Produccion"></td>
								</tr>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
		</div><!-- /.modal-dialog -->
	</div>