<div class="modal fade" id="Mortalidad">
	<div class="modal-dialog modal-fluid" role="document">
		<div class="modal-content">
			<div class="modal-body">

				<div class="row iconosModales">
					<div class="col-auto bg-warning p-2 icono">
						<img src="https://image.flaticon.com/icons/png/128/1979/1979819.png" height="40px" class="align-self-center">
					</div>
					<div class="col-9 col-md-10 text-dark"><h4 class="mt-3">Mortalidad</h4></div>
					<button type="button" class="close ml-3 ml-md-5 mt-4" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true" class="white-text">&times;</span>
					</button>
				</div>
				<div class="row">
					<form method="POST" action="#" class="col-lg-5 mb-3 mb-lg-0 align-self-center h-100">

						<div class="input-group mb-2 ">
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
						<div class="input-group mb-2">
						  <div class="input-group-prepend">
						    <label for="fechaMortalidad" class="input-group-text">Fecha</label>
						  </div>
						  <input type="date" class="form-control" id="fechaMortalidad" name="fechaMortalidad">
						</div>
						<div class="input-group mb-2">
						  <div class="input-group-prepend">
						    <label for="fechaMortalidad" class="input-group-text">Gallinas</label>
						  </div>
						  <input type="number" class="form-control" id="GallinaMortalidad" name="GallinaMortalidad">
						</div>
						<div class="row justify-content-center d-flex">
							<button class="btn btn-primary btn-sm col-5 form-control text-white"><i class="far fa-save mr-4"></i><strong>Guardar</strong><i class="far fa-save ml-4"></i></button>
							<button class="btn btn-outline-danger btn-sm col-5 form-control ml-4"><i class="fas fa-ban mr-4"></i><strong>Cancelar</strong><i class="fas fa-ban ml-4"></i></button>
						</div>
					</form>
					<div class="col-lg-7 table-scrolly">
						<table class="table table-striped table-responsive-lg p-0 tablas table-sm text-center">
							<thead class="table-info" >
								<th>Fecha</th>
								<th>Galpón en lote</th>
								<th>Alimento</th>
								<th>Cantidad</th>
								<th>Acción</th>
							</thead>
							<tbody class="table-light">
								<tr>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									<!-- BUTTONS / MOSTRAR-EDITAR-ELIMINAR -->
									<td>
										<button class="btn btn-info rounded-circle btn-sm icono"><i class="fas fa-pen-fancy"></i></button>
									</td>
								</tr>
								<tr>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									<td>
										<button class="btn btn-info rounded-circle btn-sm icono"><i class="fas fa-pen-fancy"></i></button>
									</td>
								</tr>
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
		</div><!-- /.modal-content -->
	</div><!-- /.modal-dialog -->
</div><!-- /.modal -->