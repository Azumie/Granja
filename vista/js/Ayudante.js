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
    	if (funcion != '') {

    		funcion(resp, elemento,valores, id);
    	}else {
    		return resp;
    	}
    	if (id == '' && valores == '') {
    		console.log('lla')
    	}
    });
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
		if (valores[0] == 'fechaOperacion') {
			console.log('holaaaa')
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
	console.log(resp);
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
}

function agragarObjetoBD(formulario, url, funcion = '', tabla, infotabla, id){
	let datos = new FormData(formulario);
	fetch(url,{
		method: 'POST',
		body: datos
	})
	.then(res => res.json())
	.then(res => {
		console.log(res);
		formulario.reset();
		obtenerObjeto(funcion, tabla,infotabla, id, llenarTabla);
	});
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