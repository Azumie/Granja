<div class="card  shadow animate__animated  animate__fadeInUp">
	<!-- CARD HEADER / BUTTON AGREGAR -->
	<div class="card-header d-flex justify-content-between pb-0">
		<div class="d-flex justify-content-between">
			<i class="text-white">
				
			<img src="https://img-premium.flaticon.com/png/512/2897/2897616.png?token=exp=1621401376~hmac=fbf2b7318feef5c3d838ab7e734a48b9" height="35px" class="mr-1 bg-warning rounded p-1 float-left">
			</i>
			<h3>Inventario General</h3>
		</div>

		<div class="col-md-auto">
			<div class="btn-group btn-group-lg" role="group" aria-label="Basic example">
				<button class="btn btn-danger" data-toggle="modal" data-target="#Compras">Compras</button>
				<button class="btn btn-primary" data-toggle="modal" data-target="#Consumos">Consumos</button>
				<button class="btn btn-info" data-toggle="modal" data-target="#Despachos">Despachos</button>
				<button class="btn btn-secondary" data-toggle="modal" data-target="#Clientes">Clientes</button>
				<button class="btn btn-dark" data-toggle="modal" data-target="#Proveedores">Proveedores</button>
			</div>
			<!-- <button class="btn btn-secondary" style="font-weight: 600" data-toggle="modal" data-target="#Produccion">Producción</button> -->
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