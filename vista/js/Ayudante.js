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

  function obtenerGranjas (url,nomtabla,valores, id) {
    fetch(url).then(resp => resp.json())
    .then(resp => {
		let tbody = '';
		Object.entries(resp).forEach(([pos]) => {
			tbody += `<tr>`
			for (let e = 0; e < valores.length; e++) {
				tbody += `<td>${resp[pos][valores[e]]}</td>`;
			}
			tbody += `<td><button id="${resp[pos][id]}" type="button"class="btn btn-sm btn-info rounded-circle editarGranja">
                        <i class="fas fa-pen-fancy"></i></button></td>`
			tbody += `</tr>`
		});
		for (var i = 0; i < 4; i++) {
			tbody += `<tr>`
			for (var e = 0; e <= valores.length; e++) {
				tbody += `<td></td>`;
			}
			tbody += `</tr>`
		}
	    tabla = resp;
	    document.querySelector(nomtabla+' tbody').innerHTML = tbody;
     });
}