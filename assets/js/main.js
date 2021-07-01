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
      let metodo;
      if (elementoExiste('documentoProveedor')) {
        let inputDocumento = document.getElementById('documentoProveedor');

        metodo = inputDocumento.getAttribute('editar') != null ? 'editar' : 'agregar';
        metodo += 'Proveedor';
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
    obtenerObjeto('?c=Configuracion&m=obtenerTipoHuevo', '#tablaTiposHuevo', ['nombreTipoHuevo'], 'idTipoHuevo', llenarTabla);
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

  // COMPRAS

  if (elementoExiste('formularioCompras')){
    let formularioCompras = document.getElementById('formularioCompras')
    let selectTipoProducto = document.getElementById('idTipoProductoCompra');
    let selectProducto = document.getElementById('idProductoCompra');
    let selectProveedor = document.getElementById('documentoProveedorCompra');
    const tablaAgregarProductos = document.getElementById('tablaAgregarProductos');
    let productos = [];
    let tablita = new Tabla ([], 'tablaAgregarProductos', 'idCompraGranja', true, 
      {
        color: 'info', icon: 'pen', nombre: 'editar',
        funcion: (x) => {
          const inputs = ['cantidadProducto', 'precioProducto'];
          const fila = x.fila.children;
          const titulos = x.titulos;
          if (x.fila.querySelector('.form-control') == null){
            inputs.forEach( i => {
              let input = document.createElement('input');
              let col = fila[titulos.indexOf(i)];
              let value = col.innerText;
              input.setAttribute('class', 'form-control');
              input.setAttribute('name', i);
              input.value = value;
              col.innerHTML = '';
              col.appendChild(input);
            });
          }
          [... x.fila.querySelectorAll('.btn')].forEach( btn => {
            btn.classList.toggle('d-none');
          });
        }
      },
      {
        color: 'danger', icon: 'trash', nombre: 'eliminar',
        funcion: async x => {
          const idCompraGranja = x.fila.getAttribute('idRow');
          if (confirm('¿Estas Seguro de que dese Eliminar el Producto? Esta operacion no se puede revertir')) {
            const resp = await selectBD(`?c=InventarioGeneral&m=eliminarProductoCompra&idCompraGranja=${idCompraGranja}`);
            console.log('eliminando');
            x.fila.remove();
            alerta('Producto eliminado Correctamente');
          }
        }
      },
      {
        color: 'primary d-none', icon: 'check', nombre: 'guardar',
        funcion: x => {
          let formdata = new FormData();
          const titulos = x.titulos;
          const fila = x.fila;
          const inputs = fila.querySelectorAll('.form-control');
          formdata.append('idCompraGranja', x.fila.getAttribute('idRow'))
          inputs.forEach( input => {
            formdata.append(input.getAttribute('name'), input.value);
          });
          (async () => {
            const respuesta = await insertBD(formdata,'?c=InventarioGeneral&m=editarCompra',false);
            console.log("respuesta", respuesta);
            inputs.forEach( input => {
              // formdata.append(input.getAttribute('name'), input.value);
              let valor = input.value;
              let td = input.parentElement;
              td.innerHTML = valor;
            });
            [... fila.querySelectorAll('.btn')].forEach( btn => {
              btn.classList.toggle('d-none');
            });

          })();
        }
      },
      {
        color: 'danger d-none', icon: 'ban', nombre: 'cancelar',
        funcion: x => {
          [... x.fila.querySelectorAll('.form-control')].forEach(input => {
            let tr = input.parentElement;
            let idFila = x.fila.getAttribute('idRow');
            let value = x.datos.find(fila => fila.idCompraGranja == idFila).idCompraGranja;
            tr.innerHTML = value;
          });
          [... x.fila.querySelectorAll('.btn')].forEach( btn => {
            btn.classList.toggle('d-none');
            console.log(btn)
          });
        }
      }
    );
    let tablaCompras = new Tabla ( [], 'tablaCompras', 'idInventario', true, {
      color: 'info', icon: 'pen', nombre: 'editar',
      funcion: async (tabla) => {
        const idInventario = tabla.fila.getAttribute('idRow');
        const resp = await selectBD('?c=InventarioGeneral&m=obtenerCompras&idInventario='+idInventario);
        tablita.update(resp);
      }
    });

    (async () => {
      const inventario = await selectBD('?c=InventarioGeneral&m=obtenerCompras');
      tablaCompras.update(inventario);
    })();

    obtenerObjeto('?c=Configuracion&m=obtenerTipoProducto', selectTipoProducto, ['idTipoProducto', 'nombreTipoProducto'], '', llenarSelect);
    selectTipoProducto.addEventListener('change', e => {
      let idTipoProducto = selectTipoProducto.value;
      selectProducto.innerHTML= '<option selected disabled>Elija el Producto</option>';
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

    formularioCompras.addEventListener('submit', e => {
      e.preventDefault();
      (async () => {
        let formdataCompras = new FormData(formularioCompras);
        productos.forEach( function(producto, i) {
          Object.entries(producto).forEach(([nombre, valor]) => {
            formdataCompras.append(`productos[${i}][${nombre}]`, valor);
          })
        });
        const respuesta = await insertBD(formdataCompras, '?c=InventarioGeneral&m=agregarCompra', false);
        const compras = await selectBD('?c=InventarioGeneral&m=obtenerCompras');
        tablaCompras.update(compras);
        alerta(respuesta, 'success');
      })();
    });

    document.getElementById('agregarProducto').addEventListener('click', e => {
      let producto = {};
      formularioCompras.querySelectorAll('.form-control').forEach( input => {
        if (input.id != 'fechaOperacion') {
          let value = input.value;
          producto.idCompraGranja = productos.length;
          producto[input.getAttribute('name')] = value;

            console.log(input.getAttribute('name').includes('id'));
          if (input.getAttribute('name').includes('id') && input.tagName == 'SELECT') {
            producto[input.getAttribute('name').replace('id', 'nombre')] = input.selectedOptions[0].innerText;
            
          }

        }
      });
      productos.push(producto);
      console.log("productos", productos);
      
      tablallena(productos, 'tablaAgregarProductos', 'idCompraGranja', false, {
        color: 'danger', icon: 'trash', nombre: 'eliminarProducto',
        funcion: x => {
          productos.splice(x.fila.getAttribute('idRow'), 1);
          console.log(productos);
          x.fila.remove();


        }
      });
    });
    



  }
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
  if (elementoExiste('formularioProduccionHuevos')) {
    const formularioProduccionHuevos = document.getElementById('formularioProduccionHuevos');
    obtenerObjeto('?c=Galpon&m=obtenerGalpones', document.getElementById('gProduccion'), ['idGalpon', 'numeroGalpon'], '', llenarSelect);
    document.getElementById(`fechaProduccion`).value = fechaHoy();
    obtenerObjeto('?c=GestionAves&m=obtenerRecogidas','#tablaProduccionHuevos', ['fechaInventarioProduccion', 'produccion', 'idGalpon'], 'idInventarioProduccion', llenarTabla);
    // Rellenar select del idLote al seleccionar un galpon
    document.getElementById('gProduccion').addEventListener('change', (e)=>{
      let select = document.getElementById('gProduccion');
      obtenerObjeto('?c=GestionAves&m=obtenerGalponesLotes&idGalpon='+select.options[select.selectedIndex].value, document.getElementById('loteActivo'), ['idLote', 'idLote'], '', llenarSelect);
    })
    formularioProduccionHuevos.addEventListener('submit', (e)=>{
      e.preventDefault();
      agragarObjetoBD(formularioProduccionHuevos, '?c=GestionAves&m=agregarRecogidas', '?c=GestionAves&m=obtenerRecogidas', '#tablaProduccionHuevos', ['fechaInventarioProduccion', 'produccion', 'idGalpon'], 'idInventarioProduccion');
      
    })
    
  }

  if(elementoExiste('formularioAgregarAlimentacion')){
    const formularioAgregarAlimentacion = document.getElementById('formularioAgregarAlimentacion');
    obtenerObjeto('?c=Galpon&m=obtenerGalpones', document.getElementById('idAlimentandoGalpon'), ['idGalpon', 'numeroGalpon'], '', llenarSelect);
    obtenerObjeto('?c=Configuracion&m=obtenerProducto&tipoProducto=1', document.getElementById('alimentoAUsar'), ['idProducto', 'nombreProducto'], '', llenarSelect);    
    document.getElementById(`fechaDeAlimentacion`).value = fechaHoy();
    console.log('resp')
    obtenerObjeto('?c=GestionAves&m=obtenerAlimentacion&idTipoProducto=1','#tablaAlimentacion', ['fechaOperacion', 'numeroGalpon', 'nombreProducto', 'cantidadProducto'], 'idInventario', llenarTabla);
    // tablaAlimentacion
    formularioAgregarAlimentacion.addEventListener('submit', (e)=>{
      e.preventDefault();
      agragarObjetoBD(formularioAgregarAlimentacion, '?c=GestionAves&m=agregarOperacionGalpon', '?c=GestionAves&m=obtenerAlimentacion&idTipoProducto=1', '#tablaAlimentacion', ['fechaOperacion', 'numeroGalpon', 'nombreProducto', 'cantidadProducto'], 'idInventario');
    })
  }

  if (elementoExiste('formularioNuevoLote')) {

    const documentoProveedorLote = document.getElementById('documentoProveedorLote');
    const lineaNuevo = document.getElementById('idLineaNuevoLote');
    const idGalponLote = document.getElementById('idGalponLote');
    const formularioNuevoLote = document.getElementById('formularioNuevoLote');
    const idLote = document.getElementById('idLote');
    let galponesLotes = [];

    const tablaLotes = async () => {
      const proveedoresGallinas = await selectBD('?c=lote&m=obtenerProveedoresGallina');
      const galpones = await selectBD('?c=lote&m=obtenerGalpones');
      const lineaGenerica = await selectBD('?c=lote&m=obtenerLineagenetica');
      llenarSelect(proveedoresGallinas, documentoProveedorLote, ['documento', 'nombrePersona'], 'documento');
      llenarSelect(lineaGenerica, lineaNuevo, ['idLineaGenetica', 'nombreLineaGenetica'], 'idLineaGenetica');
      llenarSelect(galpones, idGalponLote, ['idGalpon', 'numeroGalpon'], 'idGalpon');

      const lotes = await selectBD('?c=lote&m=obtenerlotes')
      console.log(lotes)
      tablallena(lotes, 'tablaLotes', 'idLote', true, {
        color: 'info', icon: 'pen', nombre: 'editar',
        funcion: tabla => {
          const idLote = tabla.fila.getAttribute('idRow');
          const datosLote = lotes.find(lote => lote.idLote == idLote);
          document.getElementById("fechaCompraGallinas").value = datosLote.fechaOperacion;
          document.getElementById("documentoProveedorLote").value = datosLote.documentoProveedor;
          document.getElementById("precioGallinas").value = datosLote.precioProducto;
          document.getElementById("cantidadGallinas Total").value = datosLote.cantidadProducto;
          document.getElementById("fechaInicioNuevoLote").value = datosLote.fechaInicio;
          document.getElementById("idLineaNuevoLote").value = datosLote.idLineaGenetica;
          document.getElementById("numeroLote").value = datosLote.numeroLote;
          if (!elementoExiste('inputIdLote')){
            let inputIdLote = document.createElement('input');
            inputIdLote.id = 'inputIdLote';
            inputIdLote.setAttribute('name', 'idLote');
            inputIdLote.setAttribute('hidden', true);
            inputIdLote.value = idLote;
            formularioNuevoLote.appendChild(inputIdLote);
            let inputIdCompraGranja = document.createElement('input');
            inputIdCompraGranja.id = 'inputIdCompraGranja';
            inputIdCompraGranja.setAttribute('name', 'idCompraGranja');
            inputIdCompraGranja.setAttribute('hidden', true);
            inputIdCompraGranja.value = datosLote.idCompraGranja;
            formularioNuevoLote.appendChild(inputIdCompraGranja);
          }else {
            document.getElementById('inputIdLote').value = idLote
            document.getElementById('inputIdCompraGranja').value = datosLote.idCompraGranja;
          }
          (async () =>{
            const galponesl = await selectBD('?c=lote&m=obtenerGalponeslotes&idLote='+idLote);
            tablallena(galponesl, 'tablaGalponesLotes', 'idGalpon', true, {
              color: 'info', icon: 'pen', nombre: 'editar', 
              funcion: (tabla) =>{
                console.log(tabla.fila.getAttribute('idRow'));
              } 
            });
            console.log('galpones en lote', galponesl);
          })();
        }
      });
    }
    tablaLotes();

    document.getElementById('agregarGalonLote').addEventListener('click', e => {
      if (idGalponLote.selectedOptions[0] != undefined) {
        let galpon = {
          idGalpon: idGalponLote.value,
          cantidadGallinas: document.getElementById('cantidadGallinas').value
        };
        idGalponLote.selectedOptions[0].remove();
        galponesLotes.push(galpon);
        llenarTabla(galponesLotes, '#tablaGalponesLotes', ['idGalpon', 'cantidadGallinas'], 'idGalpon');
      } else 
        alerta('No hay mas Galpones Disponibles', 'danger');

    });

    formularioNuevoLote.addEventListener('submit', e => {
      e.preventDefault();
      let formdataNuevoLote = new FormData(formularioNuevoLote);
        galponesLotes.forEach( (e, i) => {
          Object.entries(e).forEach( ([nombre, valor]) =>  {
            formdataNuevoLote.append(`galpones[${i}][${nombre}]`, valor);
          });
        });
      (async () => {
        let metodo = '';
        if (elementoExiste('inputIdLote')) {
          metodo = 'editarLote';
        }else {
          metodo = 'agregarNuevoLote'
        }
        const respuesta = await insertBD(formdataNuevoLote, '?c=lote&m='+metodo, false);
        alerta(respuesta, 'success');
        tablaLotes();
      })();
    });
  }

});

if (elementoExiste('formularioMortalidad')) {
  const formularioMortalidad = document.getElementById('formularioMortalidad');
    obtenerObjeto('?c=Galpon&m=obtenerGalpones', document.getElementById('idGalponEnLoteMortalidad'), ['idGalpon', 'numeroGalpon'], '', llenarSelect);
    document.getElementById('fechaMortalidad').value = fechaHoy();
    obtenerObjeto('?c=GestionAves&m=obtenerAlimentacion&idTipoProducto=3','#tablaMortalidad', ['numeroGalpon', 'cantidadProducto','cantidadProducto'], 'idInventario', llenarTabla);
    
    formularioMortalidad.addEventListener('submit', (e) =>{
      e.preventDefault();
      agragarObjetoBD(formularioMortalidad, '?c=GestionAves&m=agregarOperacionGalpon', '?c=GestionAves&m=obtenerAlimentacion&idTipoProducto=3','#tablaMortalidad', ['numeroGalpon', 'cantidadProducto','cantidadProducto'], 'idInventario');
    });
}

if (elementoExiste('formularioDespachos')) {
  const formularioDespachos = document.getElementById('formularioDespachos');
  obtenerObjeto('?c=Configuracion&m=obtenerCliente', document.getElementById('idCliente'), ['documento', 'documento'], '', llenarSelect);
  document.getElementById('fechaDespacho').value = fechaHoy();
  obtenerObjeto('?c=Configuracion&m=obtenerTipoHuevo', document.getElementById('idTipoHuevoDespacho'), ['idTipoHuevo', 'nombreTipoHuevo'], '', llenarSelect);
  obtenerObjeto('?c=Inventario&m=obtenerDespachos','#tablaDespachos', ['fechaInventarioProduccion', 'produccion','produccion'], 'idInventario', llenarTabla);
  formularioDespachos.addEventListener('submit', (e)=>{
    e.preventDefault();
    agragarObjetoBD(formularioDespachos, '?c=Inventario&m=agregarInventario', '?c=Inventario&m=obtenerDespachos','#tablaDespachos', ['numeroGalpon', 'cantidadProducto','cantidadProducto'], 'idInventario');
  });

}

if (elementoExiste('formularioConsumos')) {
  const formularioConsumos = document.getElementById('formularioConsumos');
  obtenerObjeto('?c=Galpon&m=obtenerGalpones', document.getElementById('idGalponConsumo'), ['idGalpon', 'numeroGalpon'], '', llenarSelect);
  obtenerObjeto('?c=Configuracion&m=obtenerProducto&idTipoProducto=2', document.getElementById('idProducto'), ['idProducto', 'nombreProducto'], '', llenarSelect);
  document.getElementById('fechaConsumo').value = fechaHoy();
  obtenerObjeto('?c=GestionAves&m=obtenerAlimentacion&idTipoProducto=2','#tablaDetalleCompra', ['fechaOperacion', 'numeroGalpon', 'nombreProducto', 'cantidadProducto'], 'idInventario', llenarTabla);
  formularioConsumos.addEventListener('submit', (e) =>{
    e.preventDefault();
    agragarObjetoBD(formularioConsumos, '?c=GestionAves&m=agregarOperacionGalpon', '?c=GestionAves&m=obtenerAlimentacion&idTipoProducto=2','#tablaDetalleCompra', ['fechaOperacion', 'numeroGalpon', 'nombreProducto', 'cantidadProducto'], 'idInventario');

  })
}
// Validando de que exista el formulario respectivo al módulo de Galpón
if(elementoExiste('formularioAgregarGalpon')){
  // Rellenando tabla con la información de los Galpones
  obtenerObjeto('?c=Galpon&m=obtenerGalpones', '#tablaGalpon', ['numeroGalpon', 'areaUtil','confinamiento'], 'idGalpon', llenarTabla);
  document.getElementById('fechaCreacionGalpon').value= fechaHoy();
  // Obteniendo formulario del Módulo Galpón
  const formularioAgregarGalpon = document.getElementById('formularioAgregarGalpon');
  // Evento que ocurrirá al presionar el botón de guardado en el módulo de Galpón
  formularioAgregarGalpon.addEventListener('submit',function(e){
    // Silencia la acción por defecto del submit
    e.preventDefault();
    // Variable para validar campos
    let probar = formularioAgregarGalpon.fechaCreacionGalpon.value;
    // Validando Fecha
    if (probar != null && probar != '') {
      let probar = formularioAgregarGalpon.numeroGalpon.value;
      // Validando  número Galpón
      if (probar != '' && (probar > 0 && probar < 500)
      && !probar.match(/[^0-9]/)) {
        probar= formularioAgregarGalpon.areaUtilGalpon.value;
      // Validando Área Útil
        if (probar != '' && probar != null && !probar.match(/[^,.\d]/) && probar >= 100 && probar <= 2000) {
          probar = formularioAgregarGalpon.ConfinamientoGalpon.value.toUpperCase();
          // Validando Confinamiento
          if (probar == 'P' || probar == 'J') {
            // Agregando Galpón
            agragarObjetoBD(formularioAgregarGalpon, '?c=Galpon&m=agregarGalpon', '?c=Galpon&m=obtenerGalpones', '#tablaGalpon', ['numeroGalpon', 'areaUtil','confinameiento'], 'idGalpon');
            document.getElementById('fechaCreacionGalpon').value= fechaHoy();
          }else alert('Error al escoger el tipo de Confinamiento');
        }else alert('Error al indicar Área Útil');
      }else alert('Error en número galpón');
      
    }
    
  })
}
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
