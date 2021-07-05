<div class="card">
	<div class="card-body">
		<h4 class="text-center esconder font-weight-bold text-muted">Iniciar Sesión</h4>
		<div class="row justify-content-center">
			<div class="col-auto mb-2  esconder">
				<img src="assets/img/Logo.png" class="rounded-circle">
			</div>
			<div class="col-12">
				<!-- action="?c=login&m=login" -->
				<form id="formLogin">
					<div class="form-group">
						<strong class="d-block text-center  text-muted">Usuario</strong>
						<input type="text" name="nombreUsuario" class="form-control" required minlength="4" maxlength="20">
					</div>
					<div class="form-group">
						<strong class="d-block text-center  text-muted">Contraseña</strong>
						<input type="password" name="claveUsuario" class="form-control" required minlength="6" maxlength="15">
					</div>
					<button class="btn btn-primary btn-block">Aceptar</button>
					<button type="button" class="btn btn-block text-muted" data-toggle="modal" data-target="#CambiarContra">¿Olvidó su contraseña?</button>
				</form>
			</div>
		</div>
	</div>
</div>