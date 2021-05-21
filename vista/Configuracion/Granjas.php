<!-- MODAL RESPONSABLE -->
<div class="modal fade " id="Granjas" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
	aria-hidden="true" >
	<div class="modal-dialog  modal-fluid" role="document">
		<!--Content-->
			<div class="modal-content">
				<!--Header-->
				<div class="modal-header iconosModales mt-2 mt-md-0">
					<div class="col-auto bg-warning p-2 icono">
						<img src="assets/img/transportador.svg" height="40px" class="align-self-center">
					</div>
					<h4 class="modal-title mt-3 ml-2">Granjas</h4>
					<button type="button" class="close mt-2" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
					<span class="sr-only">Close</span>
					</button>
				</div>
				<!--Body-->
				
					<div class="modal-body">
						<div class="row">
							<div class="col-md-6">

								<!-- NOMBRE GRANJA -->

								<div class="input-group form-group">
									<div class="input-group-prepend">
										<span class="input-group-text text-white">Nombre</span>
									</div>
									<input type="text" name="nombreGranja" id="nombreGranja" class="form-control" required minlength="4" maxlength="20">
								</div>


								<!-- UBICACION -->

								<div class="input-group form-group">
									<div class="input-group-prepend">
										<span class="input-group-text text-white">Ubicación</span>
									</div>
									<textarea class="form-control" id="ubicacionGranja" name="ubucacionGranja" placeholder="Ubicacion de la Granja">
									</textarea>
								</div>
									

								<!-- BOTONES - AGREGAR Y CANCELAR -->

								<button type="button" class="btn btn-primary text-white  btn-block mt-4" data-dismiss="modal">Guardar</button>
								<button type="button" class="btn btn-outline-danger btn-block">Cancelar</button>

							</div>


						
						
							<div class="col-6">
								<table class="table table-striped table-responsive-md table-sm">
									<thead class="table-info">
										<th>Nombre Granja</th>
										<th>Ubicacion</th>
										<th>Acción</th>
									</thead>
									<tbody>
										<tr>
											<td></td>
											<td></td>
											<td >
												<button type="button"class="btn btn-danger rounded-circle">
												<i class="fas fa-pen-fancy"></i>
												</button>
											</td>
										</tr>
									</tbody>
								</table>
							</div>
						</div>
					</div>
					
			</div>
		</div>
		<!--/.Content-->
	</div>
</div>