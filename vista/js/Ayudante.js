function elementoExiste (elemento) {
    if (document.getElementById(elemento) === null || document.getElementById(elemento) === undefined) {
      return false;
    }else {
      return true;
    }
  }
 function agregarOption(elemento, valor, texto){
	elemento.innerHTML += `<option value="${valor}">${texto}</option>`;
}
 // OBTENER GRANJAS 
function obtenerObjeto (url,elemento,valores = '', id= '', funcion = '') {
	fetch(url).then(resp => resp.json())
  .then(resp => {
    if (valores[0] != '') {
    	funcion(resp, elemento,valores, id);
    }else {
    	console.log(resp);
    }
  });
}

function llenarCards(formulario, url, name='', valores, funcion){
	let datos = new FormData(formulario);
	fetch(url,{
		method: 'POST',
		body: datos
	})
	.then(res => res.json())
	.then(res => {
		// if (typeof res == 'string') {

		// }
		console.log(res);
		funcion(name, res);
		// let consumoAve = 0;
		// Object.entries(res).forEach(([pos]) => {
		// 		consumoAve += res[pos][cantidadProducto]
		// 		for (variable in res[pos]) {
		// 			console.log(variable);
		// 		}
		// 		// document.getElementsByName(name[0])[x].innerText = ;

		// 	});
		// for (let x = 0; x < name[1]; x++) {
		// 	for (let objet in res) {
		// 		console.log(res[objet])
		// 		if (objet[x] == name[0][x]) {

		// 		}
		// 		// document.getElementsByName(name[0])[x]
		// 	}
		// }
		
		// for (let x = 0; x < name[1]; x++) {
		// console.log(res['suma'][valores[x]]);
		// // 	console.log('')
		// // 	Object.entries(res).forEach(([pos]) => {
		// // 		for (variable in res[pos]) {
		// // 			console.log(variable);
		// // 		}
		// 	document.getElementsByName(name[0])[x].innerText = res['suma'][valores[x]];

		// // 	});
		// }
		// document.getElementsByName(name[0])[2].innerText = res['division'];
		
	});
}

function cardMortalidad(name, res){
	document.getElementsByName(name)[0].innerText = res['Lote'];
	document.getElementsByName(name)[1].innerText = res['mortalidadObtenida'];
	document.getElementsByName(name)[2].innerText = res['mortalidadTotal'];
	document.getElementsByName(name)[3].innerText = res['gallinasRestantes'];
}

function cardProduccion(name, res){
	document.getElementsByName(name)[0].innerText = dateFormato(res['Post'][0]);
	document.getElementsByName(name)[0].innerText += ' / ';
	document.getElementsByName(name)[0].innerText += dateFormato(res['Post'][1]);
	document.getElementsByName(name)[1].innerText = res['porcentaje'];
	document.getElementsByName(name)[2].innerText = res['huevosProducidos'];
}

function cardAlimento(name, res){
	document.getElementsByName(name)[0].innerText = dateFormato(res['Post'][0]);
	document.getElementsByName(name)[0].innerText += ' / ';
	document.getElementsByName(name)[0].innerText += dateFormato(res['Post'][1]);
	document.getElementsByName(name)[1].innerText = res['division'];
	document.getElementsByName(name)[2].innerText = res['suma']
	document.getElementsByName(name)[3].innerText = res['Inventario'];
}

function dateFormato(string) {
  var info = string.split('-');
  return info[2] + '-' + info[1] + '-' + info[0];
}

// function inputsTabla(resp, elemento, id = ''){
// 	let tbody = '';
// 	Object.entries(resp).forEach(([pos]) => {
// 		tbody += `<td id=${resp[pos][id[pos]]} name=${resp[pos][id]}>${resp[pos][valores[e]]}</td>`;
// 	});
// 	for (var i = 0; i < 4; i++) {
// 		tbody += `<tr>`
// 		for (var e = 0; e <= id.length; e++) {
// 			tbody += `<td></td>`;
// 		}
// 		tbody += `</tr>`
// 	}
// 	tabla = resp;
// 	document.querySelector(elemento+' tbody').innerHTML = tbody;
// }

function llenarTabla(resp, elemento,valores, id = ''){
	let tbody = '';
		if (valores[1] == 'cantidadProducto') {
			console.log('holaaaa')
			console.log(resp)
		}
	Object.entries(resp).forEach(([pos]) => {

		tbody += `<tr>`
		for (let e = 0; e < valores.length; e++) {
			
			tbody += `<td>${resp[pos][valores[e]]}</td>`;
		}
		if (id != '') {
		tbody += `<td><button id="${resp[pos][id]}" type="button"class="btn btn-sm btn-info rounded-circle editarGranja">
                    <i class="fas fa-pen-fancy"></i></button></td>`
		}else {
			tbody += `<td><button id="${valores[1]}" type="button"class="btn btn-sm btn-danger rounded-circle editarGranja">
                    <i class="fa fa-trash"></i></button></td>`
		}
		tbody += `</tr>`
	});
	if (id!= '') {
	for (var i = 0; i < 4; i++) {
		tbody += `<tr>`
		for (var e = 0; e <= valores.length; e++) {
			tbody += `<td></td>`;
		}
		tbody += `</tr>`
	}
	}
    tabla = resp;
    if (id != '') {
    	document.querySelector(elemento+' tbody').innerHTML = tbody;
    } else document.querySelector(elemento+' tbody').innerHTML += tbody;
}
function tabla(resp, elemento,valores, id = ''){
	let tbody = '';
		console.log('hola')
		console.log(resp)
	Object.entries(resp).forEach(([pos]) => {
		console.log(resp[pos]);
		for (let e = 0; e < valores.length; e++) {
			console.log(resp[pos][valores[e]]);
		}
	});
}

function llenarSelect(resp, elemento,valores, id){
	if (valores[0] == 'activoUsuario') {
		console.log(resp);
	}
	for (a in resp) {
		let select = [];
		for (propiedad in resp[a]) {
			if (propiedad == valores[0] || propiedad == valores[1]) {
				select.push(resp[a][propiedad]);
			}
		}
		if (select.length == 1) {
			agregarOption(elemento, select[0], select[0]);
		} else {
			agregarOption(elemento, select[0], select[1]);
		}
	}
}

function alerta (mensaje, color = 'info') {
	const alertBox = document.getElementById('alertas');

	let alerta = document.createElement('div');
	alerta.classList.add('alert', `alert-${color}`);
	alerta.innerHTML = `${mensaje}
				<button type="button" class="close ml-2" data-dismiss="alert" aria-label="Cerrar">
					<span aria-hidden="true">&times;</span>
				</button>`;
	alertBox.appendChild(alerta);
	setTimeout(() => {
		alerta.remove();
	}, 3000);
}

function agragarObjetoBD(formulario, url, funcion = '', tabla, infotabla, id){
	let datos = new FormData(formulario);
	fetch(url,{
		method: 'POST',
		body: datos
	})
	.then(res => res.json())
	.then(res => {
		if(res.split(' ')[0] == 'Error:'){
			alerta(res, 'danger')
		} else {
			alerta(res, 'success')
		}
		formulario.reset();
		obtenerObjeto(funcion, tabla,infotabla, id, llenarTabla);
	});
}

async function insertBD(formulario, url, reset = true){
	let datos;
	if (formulario instanceof FormData) datos = formulario;
	else datos = new FormData(formulario);
	// let datos = (formulario instanceof FormData) ? formulario : new FormData(formulario);
	// let datos = new FormData(formulario);
	let respuesta = await fetch(url,{method: 'POST', body: datos });
	respuesta = await respuesta.json();
	if (reset == true) {
		formulario.reset();
	}
	return respuesta;
}

async function selectBD(url){
	let respuesta = await fetch(url);
	respuesta = await respuesta.json();
	return respuesta;
}

function editarObjetoBD(form, idTabla, controlador, metodo, nombreId, inputs){

  let elemento = document.getElementById(idTabla);

  elemento.addEventListener('click', (e) => {

    let target = (e.target.tagName === 'I') ? e.target.parentElement : e.target ;
    if (target.tagName === 'BUTTON') {
      // target.attributes
      let idElemento = target.getAttribute('id');
      
      console.log(`?c=${controlador}&m=${metodo}&${nombreId}=${idElemento}`);
      fetch(`?c=${controlador}&m=${metodo}&${nombreId}=${idElemento}`)
      .then(resp => resp.json())
      .then(resp => {
        resp = resp[0];

        if (elementoExiste(nombreId)) {
          let inputId = document.getElementById(nombreId);
        	if (nombreId.includes('documento')) {
        		idElemento = idElemento.split('-')[1];
            inputId.setAttribute('editar', true);
        	}
          inputId.value = idElemento
        }else {
          let input = document.createElement('input');
          input.id = nombreId;
          input.name = nombreId;
          input.type = 'hidden';
          input.value = idElemento;
          form.appendChild(input);
        }
        let inputDocumentoEncontrado = false;
        Object.entries(inputs).forEach(([nombreInput, nombreCampo]) => {
          if ((nombreInput.includes('documento') || nombreInput.includes('nacionalidad')) && inputDocumentoEncontrado == false && !nombreInput.includes('Usuario')) {
            resp['nacionalidad'] = resp['documento'].split('-')[0];
            resp['documento'] = resp['documento'].split('-')[1];
            inputDocumentoEncontrado = true;
          }
        	let inputForm = document.getElementById(nombreInput);
        	inputForm.value = resp[nombreCampo];
        });
      });
    }
  });
}

function fechaHoy(){
	let today = new Date();
  let dd = String(today.getDate()).padStart(2, '0');
  let mm = String(today.getMonth() + 1).padStart(2, '0'); //January is 0!
  let yyyy = today.getFullYear();
  today = yyyy+'-'+mm+'-'+dd;
  return today;
}

function tablallena(resp, idTabla, idRow, reset, ...actions) {
	let table = document.getElementById(idTabla);
	let tableheaders = tablaHeaders(table);
	let tbody = table.querySelector('tbody');
	let filas = document.createDocumentFragment();

	if (reset === true) tbody.innerHTML = '';

	resp.forEach((registro) => {
		let fila = document.createElement('tr');
		fila.setAttribute('idRow', registro[idRow]);
		
		tableheaders.forEach( campo => {
			let columna = document.createElement('td');
			columna.innerText = registro[campo];
			if (campo.toLowerCase() == 'acciones'){
				columna.innerText = '';
				let buttonsAction = btnGroup();
				actions.forEach( action => {
					let button = btn(action.color, action.nombre, action.icon);
					buttonsAction.appendChild(button);
				});
				columna.appendChild(buttonsAction);
			}

			fila.appendChild(columna);
		});
		filas.appendChild(fila);
	});
	tbody.appendChild(filas);
	
	table.addEventListener('click', e => {
		let target = (e.target.tagName == 'I') ? e.target.parentElement : e.target;
		if (target.tagName == 'BUTTON'){
			let accion = actions.find( acction => target.classList.contains(acction.nombre));
			accion.funcion({
				titulos: tableheaders,
				fila: target.parentElement.parentElement.parentElement
			});
		}
	});
}

function tablaHeaders(tabla) {
	return headers = [... tabla.querySelectorAll('thead tr th')].map(e => e.getAttribute('campo') );
}

function btn(color, action, icon = ''){
	let btn = document.createElement('button');
	btn.setAttribute('type', 'button');
	btn.setAttribute('class', `btn btn-${color} ${action}`)
	if (icon !='') {
		let i = document.createElement('i');
		i.setAttribute('class', `fa fa-${icon}`);
		btn.appendChild(i);
	}
	return btn;
}

function btnGroup(){
	let btnGroup = document.createElement('div');
	btnGroup.setAttribute('class', 'btn-group');
	return btnGroup;
}