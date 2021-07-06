<div class="modal fade" id="TiposPersona">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header iconosModales mt-2 mt-md-0">
				<div class="col-auto bg-warning p-2 icono">
					<img src="assets/img/transportador.svg" height="40px" class="align-self-center">
				</div>
				<h4 class="modal-title mt-3 ml-2">Tipos de Persona</h4>
				<button type="button" class="close mt-2" data-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">&times;</span>
				<span class="sr-only">Close</span>
				</button>
			</div>
			<div class="modal-body">
				<div class="row">
					<form id="formTipoPersona" class="col-lg-5 mb-3 mb-lg-0 ">

						<!-- NOMBRE TIPO PERSONA -->

						<div class="input-group mb-3">
						  	<div class="input-group-prepend">
						    	<label for="nombreTipoPersona" class="input-group-text">
						    		Nombre
						    	</label>
						  	</div>
						  	<input class="form-control" type="text" id="nombreTipoPersona" name="nombreTipoPersona"></input>
						</div>

						<!-- BOTONES - AGREGAR Y CANCELAR -->

						<button class="btn btn-primary text-white  btn-block mt-4">Guardar</button>
						<button type="button" class="btn btn-outline-danger btn-block"  data-dismiss="modal">Cancelar</button>
					</form>

					<!-- TABLA COMPRAS PREVIAMENTE REGISTRADAS -->

					<div class="col-lg-7">
						<table id="tablaTiposPersona" class="table table-striped table-responsive-lg p-0 tablas table-sm">
							<thead class="table-info" >
								<th>Nombre</th>
								<th>Editar</th>
							</thead>
							<tbody>

								<tr>
									<td></td>
									<td>
										<button class="btn btn-info editarGalpon rounded-circle" data-toggle="modal" data-target='#editarGalpon'><i class="fas fa-pen-fancy"></i></button>
									</td>
								</tr>
								<tr>
									<td></td>
									<td>
										<button class="btn btn-info editarGalpon rounded-circle" data-toggle="modal" data-target='#editarGalpon'><i class="fas fa-pen-fancy"></i></button>
									</td>
								</tr>
								<tr>
									<td></td>
									<td>
										<button class="btn btn-info editarGalpon rounded-circle" data-toggle="modal" data-target='#editarGalpon'><i class="fas fa-pen-fancy"></i></button>
									</td>
								</tr>
								<tr>
									<td></td>
									<td>
										<button class="btn btn-info editarGalpon rounded-circle" data-toggle="modal" data-target='#editarGalpon'><i class="fas fa-pen-fancy"></i></button>
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