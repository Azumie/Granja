document.addEventListener('DOMContentLoaded', () => {
  //&& class === modal fade
 
  if (elementoExiste('formularioAgregarProducto')) {
    const formularioAgregarProducto = document.getElementById('formularioAgregarProducto');
    obtenerObjeto('?c=Configuracion&m=obtenerTipoProducto', document.getElementById('idTipoProducto'), ['idTipoProducto', 'nombreTipoProducto'], '', llenarSelect);
      obtenerObjeto('?c=Configuracion&m=obtenerProveedor', document.getElementById('idProveedorProducto'), ['documento', 'nombrePersona'], '', llenarSelect);

    console.log('yes');
    //Presionar botón Guardar en Productos se enviará el Formulario
    formularioAgregarProducto.addEventListener('submit',function(e){
      console.log('hola');
      e.preventDefault();
      agragarObjetoBD(formularioAgregarProducto, '?c=Configuracion&m=agregarProductos', '?c=Configuracion&m=obtenerProducto', '#tablaProducto', ['nombreProducto', 'documentoProveedor'], 'documento');
    })
  }

  // FORMULARIO PROVEEDORES

  if (elementoExiste('formularioProveedores')) {
    // console.log(document.getElementById('Proveedores').classList.contains('show'))
    const formularioProveedores = document.getElementById('formularioProveedores');
    obtenerObjeto('?c=Configuracion&m=obtenerProveedor','#tablaProveedor',['documento', 'nombrePersona','apellidosPersona', 'telefonoPersona', 'emailPersona', 'activoPersona'], 'documento', llenarTabla);
    formularioProveedores.addEventListener('submit', (e) =>{
      e.preventDefault();
      console.log('cliks');
      let metodo;
      if (elementoExiste('documentoProveedor')) {
        let inputDocumento = document.getElementById('documentoProveedor');

        metodo = inputDocumento.getAttribute('editar') != null ? 'editar' : 'agregar';
        metodo += 'Proveedor';
        console.log(metodo)
      }
      agragarObjetoBD(formularioProveedores, `?c=Configuracion&m=${metodo}`, '?c=Configuracion&m=obtenerProveedor', '#tablaProveedor', ['documento', 'nombrePersona','apellidosPersona', 'telefonoPersona', 'emailPersona', 'activoPersona'], 'documento');
    });

    editarObjetoBD(
      formularioProveedores,
      'tablaProveedor',
      'Configuracion',
      'obtenerProveedor',
      'documentoProveedor',
      {
        'nacionalidadProveedor': 'nacionalidad',
        'documentoProveedor': 'documento',
        'nombresProveedor': 'nombrePersona',
        'apellidosProveedor': 'apellidosPersona',
        'telefonoProveedor': 'telefonoPersona',
        'emailProveedor': 'emailPersona', 
        'activoProveedor': 'activoPersona'
      }
    );

  }

  // FORMULARIO TIPOS DE HUEVO

  if (elementoExiste('formTiposHuevo')) {
    const formTiposHuevo = document.getElementById('formTiposHuevo');
    // url,elemento,valores, id, funcion = ''
    obtenerObjeto('?c=Configuracion&m=obtenerTipoHuevo', '#tablaTiposHuevo', ['nombreTipoHuevo'], 'idTipoHuevo', llenarTabla);
    // console.log(metodo);
    formTiposHuevo.addEventListener('submit', (e) =>{
      let metodo = elementoExiste('idTipoHuevo') ? 'editarTipoHuevo' : 'agregarTipoHuevo';
      e.preventDefault();
      agragarObjetoBD(formTiposHuevo, `?c=Configuracion&m=${metodo}`, '?c=Configuracion&m=obtenerTipoHuevo', '#tablaTiposHuevo', ['nombreTipoHuevo'], 'idTipoHuevo');
    });

    editarObjetoBD(
      formTiposHuevo,
      'tablaTiposHuevo',
      'Configuracion',
      'obtenerTipoHuevo',
      'idTipoHuevo',
      {
        'nombreTipoHuevo': 'nombreTipoHuevo'
      });
  }

  // FORMULARIO GALPONEROS
  
  if (elementoExiste('formularioGalponeros')) {
    const formularioGalponeros = document.getElementById('formularioGalponeros');
    // url,elemento,valores, id, funcion = ''
    obtenerObjeto('?c=Configuracion&m=obtenerGalponero', '#tablaGalponeros', ['documento', 'nombrePersona','apellidosPersona', 'telefonoPersona', 'emailPersona', 'activoPersona'], 'documento', llenarTabla);
    formularioGalponeros.addEventListener('submit', (e) =>{
      let metodo;
      if (elementoExiste('documentoGalponero')) {
        let inputDocumento = document.getElementById('documentoGalponero');

        metodo = inputDocumento.getAttribute('editar') != null ? 'editar' : 'agregar';
        metodo += 'Galponero';
        console.log(metodo)
      }
      console.log("metodo", metodo);
      e.preventDefault();
      agragarObjetoBD(formularioGalponeros, `?c=Configuracion&m=${metodo}`, '?c=Configuracion&m=obtenerGalponero', '#tablaGalponeros', ['documento', 'nombrePersona','apellidosPersona', 'telefonoPersona', 'emailPersona', 'activoPersona'], 'documento');
    });

    editarObjetoBD(
      formularioGalponeros,
      'tablaGalponeros',
      'Configuracion',
      'obtenerGalponero',
      'documentoGalponero',
      {
        'nacionalidadGalponero': 'nacionalidad',
        'documentoGalponero': 'documento',
        'nombresGalponero': 'nombrePersona',
        'apellidosGalponero': 'apellidosPersona',
        'telefonoGalponero': 'telefonoPersona',
        'emailGalponero': 'emailPersona', 
        'activoGalponero': 'activoPersona'
      }
    );
  }

  // FORMULARIO CLIENTES

  if (elementoExiste('formularioClientes')) {
    const formularioClientes = document.getElementById('formularioClientes');
    obtenerObjeto('?c=Configuracion&m=obtenerCliente', '#tablaCliente', ['documento', 'nombrePersona','apellidosPersona', 'telefonoPersona', 'emailPersona', 'activoPersona'], 'documento', llenarTabla);
    formularioClientes.addEventListener('submit', (e) =>{
      e.preventDefault();
      let metodo;
      if (elementoExiste('documentoCliente')) {
        let inputDocumento = document.getElementById('documentoCliente');

        metodo = inputDocumento.getAttribute('editar') != null ? 'editar' : 'agregar';
        metodo += 'Cliente';
        console.log(metodo)
      }
      agragarObjetoBD(formularioClientes, `?c=Configuracion&m=${metodo}`, '?c=Configuracion&m=obtenerCliente', '#tablaCliente', ['documento', 'nombrePersona','apellidosPersona', 'telefonoPersona', 'emailPersona', 'activoPersona'], 'documento');
    });

    editarObjetoBD(
      formularioClientes,
      'tablaCliente',
      'Configuracion',
      'obtenerCliente',
      'documentoCliente',
      {
        'nacionalidadCliente': 'nacionalidad',
        'documentoCliente': 'documento',
        'nombresCliente': 'nombrePersona',
        'apellidosCliente': 'apellidosPersona',
        'telefonoCliente': 'telefonoPersona',
        'emailCliente': 'emailPersona', 
        'activoCliente': 'activoPersona'
      }
    );
  }

  // FORMULARIO USUARIO

  if(elementoExiste('formularioUsuario')){
    const formularioUsuario = document.getElementById('formularioUsuario');
    obtenerObjeto('?c=Configuracion&m=obtenerGalponero', document.getElementById('documentoUsuario'), ['documento', 'documento'], '', llenarSelect);
    obtenerObjeto('?c=Configuracion&m=obtenerUsuario', '#tablaUsuario', ['activoUsuario', 'documento', 'nombreUsuario','claveUsuario', 'pregunta', 'respuesta'], 'idUsuario', llenarTabla);
    formularioUsuario.addEventListener('submit',(e)=>{
      e.preventDefault();
      let metodo = elementoExiste('idUsuario') ? 'editarUsuario' : 'agregarUsuario';
      agragarObjetoBD(formularioUsuario, `?c=Configuracion&m=${metodo}`, '?c=Configuracion&m=obtenerUsuario', '#tablaUsuario', ['activoUsuario', 'documento', 'nombreUsuario','claveUsuario', 'pregunta', 'respuesta'], 'idUsuario');
      
    });
      editarObjetoBD(
        formularioUsuario,
        'tablaUsuario',
        'Configuracion',
        'obtenerUsuario',
        'idUsuario',
        {
          'documentoUsuario': 'documento',
          'activoUsuario': 'activoUsuario',
          'nombreUsuario': 'nombreUsuario',
          'claveUsuario': 'claveUsuario',
          'preguntaUsuario': 'pregunta',
          'respuestaUsuario': 'respuesta', 
        }
      );
  }

  if (elementoExiste('formularioLineaGenetica')) {
    const formularioLineaGenetica = document.getElementById('formularioLineaGenetica');
    obtenerObjeto('?c=Configuracion&m=obtenerLineaGenetica', '#tablaLineaGenetica', ['nombreLineaGenetica'], 'idLineaGenetica', llenarTabla);
    formularioLineaGenetica.addEventListener('submit',(e)=>{
      e.preventDefault();
      agragarObjetoBD(formularioLineaGenetica, '?c=Configuracion&m=agregarLineaGenetica', '?c=Configuracion&m=obtenerLineaGenetica', '#tablaLineaGenetica', ['nombreLineaGenetica'], 'idLineaGenetica');
      
    })
  }

  if (elementoExiste('formularioCompras')){
    let formularioCompras = document.getElementById('formularioCompras')
    let selectTipoProducto = document.getElementById('idTipoProductoCompra');
    let selectProducto = document.getElementById('idProductoCompra');
    let selectProveedor = document.getElementById('documentoProveedorCompra');
    let inputCantidadProducto = document.getElementById('cantidadProducto')
    let inputPrecioProducto = document.getElementById('precioProducto')

    obtenerObjeto('?c=Configuracion&m=obtenerTipoProducto', selectTipoProducto, ['idTipoProducto', 'nombreTipoProducto'], '', llenarSelect);
    selectTipoProducto.addEventListener('change', e => {
      let idTipoProducto = selectTipoProducto.value;
      selectProducto.innerHTML= '<option selected disabled>Elija el Tipo de Producto</option>';
      obtenerObjeto('?c=Configuracion&m=obtenerProducto&idTipoProducto='+idTipoProducto,
        selectProducto,
        ['idProducto', 'nombreProducto'], '',
        llenarSelect);
      console.log(selectTipoProducto.value);
    });
    selectProducto.addEventListener('change', e => {
      let idProducto = selectProducto.value;
      selectProveedor.innerHTML= '<option selected disabled>Elija el proveedor</option>';
      obtenerObjeto('?c=InventarioGeneral&m=obtenerProveedoresProducto&idProducto='+idProducto,
        selectProveedor,
        ['documento', 'nombrePersona'], '',
        llenarSelect);
    });

    document.getElementById('agregarProducto').addEventListener('click', (e) => {
      let tr = document.createElement('tr');
      let data = new FormData(formularioCompras);
      console.log(data);
    });
    document.getElementById('tablaAgregarProductos').addEventListener('click', e => {
      let target = (e.target.tagName == 'I') ? e.target.parentElement : e.target;
      if (target.classList.contains('borrar')){
        target.parentElement.remove();
      }
    });
    // selectProveedor.setAttribute('name', 'documentoProveedor[]')
    // fetch(`?c=Configuracion&m=obtenerProveedor`);
    // const promesa = (x) => {
    //   return new Promise((resolve, reject) => {
    //     x.forEach( proveedor => {
    //       console.log(proveedor);
    //       let option = document.createElement('option');
    //       option.value = proveedor.documento;
    //       option.innerText = proveedor.documento;
    //       selectProveedor.appendChild(option);
    //     });
    //     console.log(selectProveedor);
    //   });
    // }

  }

});
  // obtenerGranjas('?c=Configuracion&m=obtenerGranjas', '#tablaGranjas', ['nombreGranja','ubicacionGranja'], 'idGranja');
  // obtenerGranjas('?c=Configuracion&m=obtenerTiposHuevo', '#tablaTiposHuevo', ['nombreTipoHuevo'], 'idTipoHuevo');

  // new Chartist.Line('.contenedor-grafico', {
  //   labels: ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday'],
  //   series: [
  //     [12, 9, 7, 8, 5],
  //     [2, 1, 3.5, 7, 3],
  //     [1, 3, 4, 5, 6]
  //   ]
  // }, {
  //   fullWidth: true,
  //   chartPadding: {
  //     right: 40
  //   }
  // });
  // VAMOS A LEER LA URL

  // let url = window.location.href;
  // let variablesGet = url.split('?')[1];
  // variablesGet = variablesGet.split('&');
  // variablesGet = variablesGet.map((item) => {
  //   item = item.split('=');
  //   console.log(item[1]);
  //   let variable = {nombre: item[0], valor: item[1]};

  //   if(elementoExiste('formAgregarGalpon') && item[1] == 'Galpon'){
  //     form('Granja', 'Granjas');
  // //     form('Granja', 'Granjas');
  // // form('TipoPersona', 'TiposPersona');
  //   } {console.log('yes bb');}
  //   else console.log('noup');
  //   return item;
  // });

  // const controlador = variablesGet.find(item => item.nombre === 'c').valor;

  // let modulos = {
  //   Configuracion: [
  //     {nombre: 'granjas', prefijo: 'Granja'},
  //     {nombre: 'tiposhuevo', prefijo: 'TiposHuevo'}
  //   ]
  // }


//   function form (prefijo, nombre) {
//     const formObjetivo = document.getElementById(`form${prefijo}`)

//     formObjetivo.addEventListener('submit', (e) => {
//       e.preventDefault();
//       const datosFormObjetivo = new FormData(formObjetivo);
//       const metodo = elementoExiste(`id${prefijo}`) ? `editar${prefijo}` : `agregar${prefijo}`;
//       console.log("metodo", metodo);
// //Metodo: Agregar
//       post(controlador, metodo, datosFormObjetivo);
//       get(controlador, `obtener${nombre}`, `tabla${nombre}`, llenarTabla);
//       console.log("`tabla${nombre}`", `tabla${nombre}`);

//       formObjetivo.reset();
//       let mensaje = 'Granja agregada Exitosamente';
//       if (elementoExiste(`id${prefijo}`)) {
//         document.getElementById(`id${prefijo}`).remove();
//         document.getElementById(`estadoForm${prefijo}`).innerText = 'Agregando...'
//         mensaje = 'Granja editada Exitosamente';
//       }
//       alerta(mensaje);
//     });
//   }

  // function post (controlador, metodo, datosForm, ...funciones) {
  //   fetch(`?c=${controlador}&m=${metodo}`, {
  //     method: 'POST',
  //     body: datosForm
  //   })
  //   .then(resp => resp.json())
  //   .then(resp => {
  //     console.log(resp);

  //   });
  // }

  // function get (controlador, metodo, destino, funcion) {
  //   fetch(`?c=${controlador}&m=${metodo}`)
  //   .then(resp => resp.json())
  //   .then(resp => {
  //     funcion (resp, destino);
  //   });
  // }

  // function llenarTabla (datos, tabla) {
  //   let tbody = '';
  //   let valores = [];
  //   let id = '';
  //   Object.entries(datos[0]).forEach(([key, pos]) => {
  //     if (!key.includes('id')) {
  //       valores.push(key);
  //     }else {
  //       id = key;
  //     }
  //   });

  //   console.log(datos);
  //   Object.entries(datos).forEach(([pos]) => {
  //     tbody += `<tr>`
  //     for (let e = 0; e < valores.length; e++) {
  //       tbody += `<td>${datos[pos][valores[e]]}</td>`;
  //     }
  //     tbody += `<td><button id="${datos[pos][id]}" type="button"class="btn btn-sm btn-info rounded-circle editarGranja">
  //                       <i class="fas fa-pen-fancy"></i></button></td>`
  //     tbody += `</tr>`
  //   });
  //   for (var i = 0; i < 4; i++) {
  //     tbody += `<tr>`
  //     for (var e = 0; e <= valores.length; e++) {
  //       tbody += `<td></td>`;
  //     }
  //     tbody += `</tr>`
  //   }
  //     document.querySelector(`#${tabla} tbody`).innerHTML = tbody;
  // }

  // AGREGAR/EDITAR GRANJA

  // const formGranja = document.getElementById('formGranja');

  // formGranja.addEventListener('submit', (e) =>{
  //   e.preventDefault();
  //   const datosAgregarGranja = new FormData(formGranja);

  //   let metodo = elementoExiste('idGranja') ? 'editarGranja' : 'agregarGranja';

  //   fetch(`?c=Configuracion&m=${metodo}`, {
  //     method: 'POST',
  //     body: datosAgregarGranja
  //   })
  //   .then(resp => resp.json())
  //   .then(datos => {
  //     obtenerGranjas('?c=Configuracion&m=obtenerGranjas', '#tablaGranjas', ['nombreGranja','ubicacionGranja'], 'idGranja');
  //     formGranja.reset();
  //     let mensaje = 'Granja agregada Exitosamente';
  //     if (elementoExiste('idGranja')) {
  //       document.getElementById('idGranja').remove();
  //       document.getElementById('estadoFormGranja').innerText = 'Agregando...'
  //       mensaje = 'Granja editada Exitosamente';
  //     }
  //     alerta(mensaje);
  //   });
  // });

  // EDITAR - CARGAR DATA EN EL FORMULARIO

  // let tablaGranjas = document.getElementById('tablaGranjas');

  // tablaGranjas.addEventListener('click', (e) => {

  //   console.log(e.target);
  //   editarObjetoBD(e, 'obtenerGranjas', 'idGranja', ['nombreGranja', 'ubicacionGranja'], ['nombreGranja', 'ubicacion']);
    // let target = (e.target.tagName === 'I') ? e.target.parentElement : e.target ;
    // if (target.tagName === 'BUTTON') {
    //   // target.attributes
    //   let idGranja = target.getAttribute('id');
    //   console.log(idGranja);
    //   fetch(`?c=Configuracion&m=obtenerGranjas&idGranja=${idGranja}`)
    //   .then(resp => resp.json())
    //   .then(resp => {
    //     resp = resp[0];
    //     if (elementoExiste('idGranja')) {
    //       document.getElementById('idGranja').value = idGranja;
    //     }else {
    //       let inputIdGranja = document.createElement('input');
    //       inputIdGranja.id = 'idGranja';
    //       inputIdGranja.name = 'idGranja';
    //       inputIdGranja.type = 'hidden';
    //       inputIdGranja.value = idGranja;
    //       formGranja.appendChild(inputIdGranja);
    //     }

    //     document.getElementById('nombreGranja').value = resp.nombreGranja;
    //     document.getElementById('ubicacionGranja').value = resp.ubicacion;
    //     document.getElementById('estadoFormGranja').innerText = 'Editando...'
    //   });
    // }
  // });

  // AGREGAR/EDITAR TIPOS HUEVO

  // const formTiposHuevo = document.getElementById('formTiposHuevo');

  // formTiposHuevo.addEventListener('submit', (e) =>{
  //   e.preventDefault();
  //   const datosAgregarTipoHuevo = new FormData(formTiposHuevo);

  //   let metodo = elementoExiste('idTipoHuevo') ? 'editarTipoHuevo' : 'agregarTipoHuevo';
  //   console.log("elementoExiste('idTipoHuevo')", elementoExiste('idTipoHuevo'));
  //   console.log(metodo);
  //   fetch(`?c=Configuracion&m=${metodo}`, {
  //     method: 'POST',
  //     body: datosAgregarTipoHuevo
  //   })
  //   .then(resp => resp.json())
  //   .then(resp => {
  //     obtenerGranjas('?c=Configuracion&m=obtenerTiposHuevo', '#tablaTiposHuevo', ['nombreTipoHuevo'], 'idTipoHuevo');
  //     formTiposHuevo.reset();
  //     let mensaje = 'El tipo de huevo fue agregado Exitosamente';
  //     if (elementoExiste('idTipoHuevo')) {
  //       document.getElementById('idTipoHuevo').remove();
  //       document.getElementById('estadoFormGranja').innerText = 'Agregando...'
  //       mensaje = 'El tipo de huevo fue editado Exitosamente';
  //     }
  //     alerta(mensaje);
  //   });
  // });

  // // EDITAR - CARGAR DATA EN EL FORMULARIO TIPOS DE HUEVO

  // let tablaTiposHuevo = document.getElementById('tablaTiposHuevo');

  // tablaTiposHuevo.addEventListener('click', (e) => {
  //   let target = (e.target.tagName === 'I') ? e.target.parentElement : e.target ;
  //   if (target.tagName === 'BUTTON') {
  //     // target.attributes
  //     let idTipoHuevo = target.getAttribute('id');
  //     console.log(idTipoHuevo)
  //     fetch(`?c=Configuracion&m=obtenerTiposHuevo&idTipoHuevo=${idTipoHuevo}`)
  //     .then(resp => resp.json())
  //     .then(resp => {
  //       console.log(resp)
  //       resp = resp[0];
  //       if (elementoExiste('idTipoHuevo')) {
  //         document.getElementById('idTipoHuevo').value = idTipoHuevo;
  //       }else {
  //         let inputIdTipoHueo = document.createElement('input');
  //         inputIdTipoHueo.id = 'idTipoHuevo';
  //         inputIdTipoHueo.name = 'idTipoHuevo';
  //         inputIdTipoHueo.type = 'hidden';
  //         inputIdTipoHueo.value = idTipoHuevo;
  //         formTiposHuevo.appendChild(inputIdTipoHueo);
  //       }

  //       document.getElementById('nombreTipoHuevo').value = resp.nombreTipoHuevo;
  //       // document.getElementById('ubicacionGranja').value = resp.ubicacionGranja;
  //       document.getElementById('estadoFormTipoHuevo').innerText = 'Editando...'
  //     });
  //   }
  // });
