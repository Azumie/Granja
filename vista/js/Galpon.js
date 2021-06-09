// Validando de que exista el formulario respectivo al módulo de Galpón
if(elementoExiste('formularioAgregarGalpon')){
	// Rellenando tabla con la información de los Galpones
	obtenerObjeto('?c=Galpon&m=obtenerGalpones', '#tablaGalpon', ['numeroGalpon', 'areaUtil','confinamiento'], 'idGalpon', llenarTabla);
	document.getElementsByName('fechaCreacionGalpon')[0].value= fechaHoy();
	// Rellenando Select llamado ConfinamientoGalpon
	const select = document.getElementById('ConfinamientoGalpon');
	// Obteniendo formulario del Módulo Galpón
	const formularioAgregarGalpon = document.getElementById('formularioAgregarGalpon');
	// Evento que ocurrirá al presionar el botón de guardado en el módulo de Galpón
	formularioAgregarGalpon.addEventListener('submit',function(e){
		e.preventDefault();
		let probar = formularioAgregarGalpon.fechaCreacionGalpon.value;
		if (probar != null && probar != '') {
			console.log('pasamos we');
			let probar = formularioAgregarGalpon.numeroGalpon.value;
			if (probar != '' && (probar > 0 && probar < 500)
			&& !probar.match(/[^0-9]/)) {
				console.log('Pasamos número galpón');
				probar= formularioAgregarGalpon.areaUtilGalpon.value;
				if (probar != '' && probar != null && !probar.match(/[^,.\d]/) && probar >= 100 && probar <= 2000) {
					probar = formularioAgregarGalpon.ConfinamientoGalpon.value.toUpperCase();
					console.log('pasamos areautil');
					if (probar == 'P' || probar == 'J') {
						console.log('pasamos confinamiento');
						agragarObjetoBD(formularioAgregarGalpon, '?c=Galpon&m=agregarGalpon', '?c=Galpon&m=obtenerGalpones', '#tablaGalpon', ['numeroGalpon', 'areaUtil','confinamiento'], 'idGalpon');
						document.getElementsByName('fechaCreacionGalpon')[0].value= fechaHoy();
						// let datos = new FormData(formularioAgregarGalpon);
						// fetch('?c=Galpon&m=agregarGalpon',{
						// 	method: 'POST',
						// 	body: datos
						// })
						// .then(res => res.json())
						// .then(res => {
						// 	console.log(res);
						// 	formularioAgregarGalpon.reset();
						// 	obtenerGranjas('?c=Galpon&m=obtenerGalpones', '#tablaGalpon', ['numeroGalpon', 'areaUtil','confinamiento'], 'idGalpon');
						// 	document.getElementsByName('fechaCreacionGalpon')[0].value= today;
						// });
					}else alert('Error al escoger el tipo de Confinamiento');
				}else alert('Error al indicar Área Útil');
			}else alert('Error en número galpón');
			
		}
		
	})
}


