<div class="card card-dark">
	<!-- CARD HEADER / BUTTON AGREGAR -->
	<div class="card-header d-flex justify-content-between">
		<div class="d-flex justify-content-between">
			<img src="assets/img/granero1.png" height="35px" class="mr-1">
			<h3>Galpón</h3>
		</div>
		
		<div class="col-auto">
			<button class="btn btn-info btn-sm text-dark circulo py-0" data-toggle="modal" data-target="#Informacion"><h6 class="p-0"><i class="fas mt-2 fa-info"></i></h6></button>
			<button class="btn btn-warning text-dark" data-toggle="modal" data-target="#AgregarGalpon"><i class="fas fa-plus"></i></button>
		</div>
	</div>
	<div class="card-body">
		<div class="row">
			
			<div class="col px-1 ">
				<table class="table table-striped table-responsive-lg p-0 tablas">
					<thead class="bg-orange text-dark" >
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
							<td class="btn-group justify-content-center d-flex">
								<button class="btn btn-info cambiarLote" data-toggle="modal" data-target='#CambiarLote'><i class="fas fa-exchange-alt pl-1">Lote</i> </button>
								<button class="btn btn-danger editarGalpon" data-toggle="modal" data-target='#editarGalpon'><i class="fas fa-pen-fancy"></i></button>
							</td>
						</tr>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>