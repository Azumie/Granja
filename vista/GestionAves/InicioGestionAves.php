<div class="card  shadow animate__animated  animate__fadeInUp">
	<!-- CARD HEADER / BUTTON AGREGAR -->
	<div class="card-header d-flex justify-content-between pb-0">
		<div class="d-flex justify-content-between">
			<i class="text-white">
				
			<img src="assets/img/gallina.svg" height="35px" class="mr-1 bg-warning rounded p-1 float-left">
			</i>
			<h3>Gestion de Aves</h3>
		</div>

		<div class="col-auto">
			<button class="btn btn-danger " style="font-weight: 600" data-toggle="modal" data-target="#Alimentacion">Alimentación</button>
			<button class="btn btn-warning" style="font-weight: 600" data-toggle="modal" data-target="#Mortalidad">Mortalidad</button>
			<button class="btn btn-info" style="font-weight: 600" data-toggle="modal" data-target="#Produccion">Producción</button>
			<button class="btn btn-secondary" style="font-weight: 600" data-toggle="modal" data-target="#Produccion">Producción</button>
		</div>
	</div>
	<div class="card-body">
		<div class="row">

			<div class="col px-1 ">
				<table class="table table-striped table-responsive-lg table-sm p-0 tablas text-center">
					<thead class="table-info" >
						<th>Estado</th>
						<th>Nombre</th>
						<th>N° gallinas actuales</th>
						<th>Lote Activo</th>
						<th>Inicio del Lote</th>
						<th>Módulos</th>
						<th>Acción</th>
					</thead>
					<tbody>

						<tr>
							<td>

							</td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<!-- BUTTONS / MOSTRAR-EDITAR-ELIMINAR -->
							<td>
								<button class="btn btn-info btn-sm rounded-circle" data-toggle="modal" data-target='#editarGalpon'><i class="fas fa-pen-fancy"></i></button>
							</td>
						</tr>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>