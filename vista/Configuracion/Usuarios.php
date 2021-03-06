<!-- MODAL RESPONSABLE -->
<div class="modal fade " id="Usuarios" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
	aria-hidden="true" >
	<div class="modal-dialog  modal-fluid" role="document">
		<!--Content-->
		<div class="modal-content">
			<!--Header-->
			<div class="modal-header iconosModales mt-2 mt-md-0">
				<div class="col-auto bg-warning p-2 icono">
					<img src="assets/img/transportador.svg" height="40px" class="align-self-center">
				</div>
				<h4 class="modal-title mt-3 ml-2">Usuarios</h4>
				<button type="button" class="close mt-2" data-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">&times;</span>
				<span class="sr-only">Close</span>
				</button>
			</div>
			<!--Body-->
			
				<div class="modal-body">
					<div class="row">
	<form id="formularioUsuario" class="col-md-5">
		<div class="row">

			<!-- DOCUMENTO -->
			
			<div class="col-10 input-group input-group-sm form-group">
				<div class="input-group-prepend">
					<span class="input-group-text text-white">Documento</span>
				</div>
				<select class='form-control' name='documentoUsuario' id='documentoUsuario'>
					<option value="" selected disabled>Seleccione Usuario</option>
				</select>
			</div>

			<!-- ACTIVO -->

			<div class="col-md-auto mb-3">
				<div class="custom-control custom-checkbox">
					<input type="checkbox" class="custom-control-input" id="activoUsuario" name="activoUsuario" checked="" disabled>
					<label class="custom-control-label" for="activoUsuario">Activo</label>
				</div>
			</div>
		</div>

		<!-- USUARIOS -->

		<div class="input-group input-group-sm form-group">
			<div class="input-group-prepend">
				<span class="input-group-text text-white">Usuario</span>
			</div>
			<input type="text" name="nombreUsuario" id="nombreUsuario" class="form-control" required minlength="4" maxlength="20" placeholder="Nombre del usuario">
		</div>
		
		<!-- CLAVE -->

		<div class="input-group input-group-sm form-group">
			<div class="input-group-prepend">
				<span class="input-group-text text-white ">Clave</span>
			</div>
			<input placeholder="Constrase??a del usuario" type="password" name="claveUsuario" id="claveUsuario" class="form-control" required minlength="4" maxlength="20">
		</div>

		<!-- PREGUNTA -->

		<div class="input-group input-group-sm form-group">
			<div class="input-group-prepend">
				<span class="input-group-text text-white">Pregunta</span>
			</div>
			<select class='form-control' name='preguntaUsuario' id='preguntaUsuario'>
				<option value="Nombre de tu mejor amigo">Nombre de tu mejor amigo</option>
				<option value="Nombre de tu mama">Nombre de tu mam??</option>
				<option value="Fecha de naacimiento de tu abuela">Fecha de nacimiento de tu abuela</option>
				<option value="Videojuego Favorito">Videojuego Favorito</option>
			</select>
			
		</div>

		<!-- RESPUESTAS -->

		<div class="input-group input-group-sm form-group">
			<div class="input-group-prepend">
				<span class="input-group-text text-white">Respuesta</span>
			</div>
			<input placeholder="Respuesta a la pregunta de seguridad" type="text" name="respuestaUsuario" id="respuestaUsuario" class="form-control" required minlength="4" maxlength="20">
		</div>

		<!-- BOTONES - AGREGAR Y CANCELAR -->

		<button type="submit" class="btn btn-primary btn-sm text-white  btn-block mt-4">Guardar</button>
		<button type="button" class="btn btn-sm btn-outline-danger btn-block">Cancelar</button>
	</form>


						
						
						<div class="col-7">
							<table class=" datatable table table-striped table-responsive table-sm" id='tablaUsuario'>
								<thead class="table-info">
									<th>Estado</th>
									<th>C??dula</th>
									<th>Nombre Usuario</th>
									<th>Clave</th>
									<th>Fecha Creaci??n</th>
									<th>Pregunta</th>
									<th>Respuesta</th>
									<th>Acci??n</th>
								</thead>
								<tbody>
									<tr>
										<td></td>
										<td></td>
										<td></td>
										<td></td>
										<td></td>
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
		<!--/.Content-->
	</div>
</div>