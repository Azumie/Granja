<div class="modal fade" id="Mortalidad">
	<div class="modal-dialog modal-fluid" role="document">
		<div class="modal-content" style="opacity: .9">
			<div class="modal-body">
				<div class="row "style="position: relative; top: -2em;">
					<div class="col-auto d-flex amarillo p-2" style=" border-radius: 5px; left:1em">
						<img src="https://image.flaticon.com/icons/png/128/1979/1979819.png" height="40px" class="align-self-center">
					</div>
					<div class="col-9 col-md-10 text-dark"><h4 class="mt-3 ml-2">Mortalidad</h4></div>
					<button type="button" class="close ml-3 ml-md-5 mt-4" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true" class="white-text">&times;</span>
					</button>
				</div>
				<div class="row">
					<div class="col-lg-5 mb-3 mb-lg-0 ">
						<div class="input-group input-group-sm mb-2">
						  	<div class="input-group-prepend">
						    	<label for="idGalponEnLote" class="input-group-text">
						    		Galpón en Lote
						    	</label>
						  	</div>
							<select id="idGalponEnLote" class="form-control">
								<option selected disabled>Elegir Galpón en Lote</option>
								<option value="2">2</option>
								<option value="3">3</option>
								<option value="4">4</option>
								<option value="5">5</option>
							</select>
						</div>
						<div class="input-group input-group-sm mb-2">
						  <div class="input-group-prepend">
						    <label for="fechaMortalidad" class="input-group-text">Fecha</label>
						  </div>
						  <input type="date" class="form-control" id="fechaMortalidad" name="fechaMortalidad">
						</div>
						<div class="input-group input-group-sm mb-2">
						  <div class="input-group-prepend">
						    <label for="fechaMortalidad" class="input-group-text">Gallinas</label>
						  </div>
						  <input type="number" class="form-control" id="GallinaMortalidad" name="GallinaMortalidad">
						</div>
					</div>
					<div class="col-lg-7">
						<table class="table table-striped table-responsive-lg p-0 tablas table-sm text-center">
							<thead class="table-info" >
								<th>Fecha</th>
								<th>Galpón en lote</th>
								<th>Alimento</th>
								<th>Cantidad</th>
								<th>Editar</th>
							</thead>
							<tbody>

								<tr>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									<!-- BUTTONS / MOSTRAR-EDITAR-ELIMINAR -->
									<td>
										<button class="btn btn-info rounded-circle btn-sm">
											<i class="fas fa-pen-fancy"></i>
										</button>
									</td>
								</tr>
							</tbody>
						</table>
					</div>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-primary" data-dismiss="modal">Guardar</button>
				<button type="button" class="btn btn-danger">Cancelar</button>
			</div>
		</div><!-- /.modal-content -->
	</div><!-- /.modal-dialog -->
</div><!-- /.modal -->