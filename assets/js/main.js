document.addEventListener('DOMContentLoaded', () => {
  const formularioInicio = document.getElementById('formularioInicio');
 document.getElementById('fechaDesde').value = fechaHoy();
 document.getElementById('fechaHasta').value = fechaHoy();
 obtenerObjeto('?c=GestionAves&m=obtenerGalponesLotes', document.getElementById('idGalponInicio'), ['idGalpon', 'idGalpon'], '', llenarSelect);
 obtenerObjeto('?c=Inicio&m=mostrarInicioProductos','#tablaInicioProductos',['nombreTipoProducto', 'nombreProducto', 'nombrePersona', 'fecha', 'suma'], '.', llenarTabla);
 obtenerObjeto('?c=Inicio&m=tablaCaducidad','#inicioCaducidad',[], '', tablaCaducidad);

formularioInicio.addEventListener('submit', (e)=>{
  e.preventDefault();
  llenarCards(formularioInicio, '?c=Inicio&m=mostrarAlimentacion&idTipoProducto=1', 'cardAlimentacion', cardsInicio);
  llenarCards(formularioInicio, '?c=Inicio&m=mostrarMortalidad&idTipoProducto=3', 'cardMortalidad', cardsInicio);
  llenarCards(formularioInicio, '?c=Inicio&m=mostrarProduccion', 'cardProduccion', cardsInicio); 
})

  //&& class === modal fade
  if (elementoExiste('formularioAgregarProducto')) {
    const formularioAgregarProducto = document.getElementById('formularioAgregarProducto');
    obtenerObjeto('?c=Configuracion&m=obtenerTipoProducto', document.getElementById('idTipoProducto'), ['idTipoProducto', 'nombreTipoProducto'], '', llenarSelect);
    obtenerObjeto('?c=Configuracion&m=obtenerProveedor', document.getElementById('idProveedorProducto'), ['documento', 'nombrePersona'], '', llenarSelect);
    //Presionar botón Guardar en Productos se enviará el Formulario
    formularioAgregarProducto.addEventListener('submit',function(e){
      e.preventDefault();
      agragarObjetoBD(formularioAgregarProducto, '?c=Configuracion&m=agregarProductos', '?c=Configuracion&m=obtenerProducto', '#tablaProducto', ['nombreProducto', 'documentoProveedor'], 'documento');
    })
  }

  // FORMULARIO PROVEEDORES

  if (elementoExiste('formularioProveedores')) {
    
    const formularioProveedores = document.getElementById('formularioProveedores');
    obtenerObjeto('?c=Configuracion&m=obtenerProveedor','#tablaProveedor',['documento', 'nombrePersona','apellidosPersona', 'telefonoPersona', 'emailPersona', 'activoPersona'], 'documento', llenarTabla);
    formularioProveedores.addEventListener('submit', (e) =>{
      e.preventDefault();
      let probar = formularioProveedores.documentoProveedor.value;
    if (probar != null && probar != '') {
      if (probar != '' && (probar > 5000000 && probar < 40000000) && !probar.match(/[^0-9]/)) {
        probar = formularioProveedores.nombresProveedor.value;
        if (probar.match(/[^\D]/) == null && probar.length < 45 && probar.length > 1) {
          probar = formularioProveedores.apellidosProveedor.value;
          if (!probar.match(/[^\D]/) && probar.length < 45 && probar.length > 1) {
            probar = formularioProveedores.telefonoProveedor.value;
            if (probar.match(/(^|416|424|412|426| {3})([0-9]+)/) && probar.length == 11 && !probar.match(/\D/)) {
              probar = formularioProveedores.emailProveedor.value;
              if (probar.match(/^([a-zA-Z0-9._%-]+@[a-zA-Z0-9.-]+[a-zA-Z]{3})+$/) && probar.length <= 30) {  
                let metodo;
                if (elementoExiste('documentoProveedor')) {
                  let inputDocumento = document.getElementById('documentoProveedor');

                  metodo = inputDocumento.getAttribute('editar') != null ? 'editar' : 'agregar';
                  metodo += 'Proveedor';
                }
                agragarObjetoBD(formularioProveedores, `?c=Configuracion&m=${metodo}`, '?c=Configuracion&m=obtenerProveedor', '#tablaProveedor', ['documento', 'nombrePersona','apellidosPersona', 'telefonoPersona', 'emailPersona', 'activoPersona'], 'documento');
              }
            }else alert('Error en el teléfono ingresado');
          }else alert('Error en el apellido del proveedor');
        }else alert('Error en el nombre del proveedor');
      }else alert('Error el documento no puede contener letras o estar vacío');
    }
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
    const idTipoHuevo = document.getElementById('idTipoHuevoEditar')
    const tablaTiposHuevo = new Tabla([], 'tablaTiposHuevo', 'idTipoHuevo', true,{
      color: 'info', icon: 'pen', nombre: 'editar',
      funcion: x => {
        const datosFila = x.datos.find( fila => fila.idTipoHuevo == x.fila.getAttribute('idRow'));
        idTipoHuevo.removeAttribute('disabled');
        idTipoHuevo.value = datosFila.idTipoHuevo;
        document.getElementById('nombreTipoHuevo').value = datosFila.nombreTipoHuevo;
      }
    })
    const initForm = async () => {
      const tiposHuevo = await selectBD('?c=Configuracion&m=obtenerTipoHuevo');
      tablaTiposHuevo.update(tiposHuevo);
      formTiposHuevo.reset();
      idTipoHuevo.setAttribute('disabled', 'true');
    };
    initForm();

    formTiposHuevo.addEventListener('submit', (e) =>{
      e.preventDefault();
      (async () => {
        const respuesta = insertBD(formTiposHuevo, `?c=Configuracion&m=agregarTipoHuevo`);
        initForm();
        alerta(respuesta, 'success');
      })();
    });

    // editarObjetoBD(
    //   formTiposHuevo,
    //   'tablaTiposHuevo',
    //   'Configuracion',
    //   'obtenerTipoHuevo',
    //   'idTipoHuevo',
    //   {
    //     'nombreTipoHuevo': 'nombreTipoHuevo'
    //   });
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
      }
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
    const idLineaGenetica = document.getElementById('idLineaGenetica');
    const nombreLineaGenetica = document.getElementById('nombreLineaGenetica');
    const tablaLineaGenetica = new Tabla([], 'tablaLineaGenetica', 'idLineaGenetica', true, {
      color: 'info', icon: 'pen', nombre: 'editar',
      funcion: async (x) => {
        const id = x.fila.getAttribute('idRow');
        const datosFila = x.datos.find( fila => fila.idLineaGenetica == id);
        idLineaGenetica.removeAttribute('disabled');
        idLineaGenetica.value = datosFila.idLineaGenetica ;
        nombreLineaGenetica.value = datosFila.nombreLineaGenetica;
      }
    })
    const initForm = async () =>{
      formularioLineaGenetica.reset();
      idLineaGenetica.setAttribute('disabled', true);
      const lineasGenetica = await selectBD('?c=Configuracion&m=obtenerLineaGenetica');
      tablaLineaGenetica.update(lineasGenetica);
    }

    formularioLineaGenetica.addEventListener('submit',(e)=>{
      e.preventDefault();
      (async () => {
        const resp = insertBD (formularioLineaGenetica, '?c=Configuracion&m=agregarLineaGenetica');
        initForm();
      })();
    })

    initForm();
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
    const tablaHuevos = new Tabla([], 'tablaHuevos', 'idInventarioProduccion', true);
    const fechaProduccion = document.getElementById(`fechaProduccion`);
    const idGalpon = document.getElementById('gProduccion');
    const idLote = document.getElementById('loteActivo')

    const tablaProduccionHuevos = new Tabla([], 'tablaProduccionHuevos', 'id', true,{
      color: 'info', icon: 'pen ', nombre: 'editar',
      funcion: async x => {
        const filaDatos = x.datos.find(fila => fila.id == x.fila.getAttribute('idRow'));
        let formdata = new FormData();

        formdata.append('idGalpon', filaDatos.idGalpon);
        formdata.append('idLote', filaDatos.idLote);
        formdata.append('fechaInventarioProduccion', filaDatos.fechaInventarioProduccion);
        const detalleConsumo = await insertBD(formdata, '?c=GestionAves&m=obtenerdetalleRecogida', false);
        let datosTabla = tablaHuevos.tiposHuevo.map( e => {
          if (detalleConsumo.find(fila => fila.nombreTipoHuevo == e.nombreTipoHuevo) != undefined) {
            let detalle =  detalleConsumo.find(fila => fila.nombreTipoHuevo == e.nombreTipoHuevo);
            detalle.cantidadProduccion =`<input type="number" class='form-control' name='editar[${detalle.idInventarioProduccion}]' value='${detalle.cantidadProduccion}'>`;
            return detalle
          }else {
            return e;
          }
        });
        tablaHuevos.update(datosTabla);
        fechaProduccion.value = filaDatos.fechaInventarioProduccion;
        fechaProduccion.setAttribute('readonly', 'true');
        idGalpon.innerHTML = `<option selected value='${filaDatos.idGalpon}'>${filaDatos.idGalpon}</option>`;
        idLote.innerHTML = `<option selected value='${filaDatos.idLote}'>${filaDatos.idLote}</option>`;
      }
    });
    const initForm = async () => {
      idGalpon.innerHTML = '<option selected disabled>Elegir Galpón en Lote</option>';
      idLote.innerHTML = '<option selected disabled>Elegir Lote</option>';
      obtenerObjeto('?c=Galpon&m=obtenerGalpones', idGalpon, ['idGalpon', 'numeroGalpon'], '', llenarSelect);

      fechaProduccion.value = fechaHoy();
      fechaProduccion.removeAttribute('readonly');
      // vamos a generar la tabla de huevos
      const produccionHuevos = await selectBD('?c=GestionAves&m=obtenerRecogidas');
      const tiposHuevo = await selectBD('?c=GestionAves&m=obtenerTipoHuevo');
      tiposHuevo.forEach(tipo => {
      tipo.cantidadProduccion = `<input type="number" class='form-control' name='agregar[${tipo.idTipoHuevo}]'>`
      })
      tablaHuevos.update(tiposHuevo);
      tablaHuevos.tiposHuevo = tiposHuevo;
      tablaProduccionHuevos.update(produccionHuevos);
    };
    initForm();
    // Rellenar select del idLote al seleccionar un galpon
    idGalpon.addEventListener('change', (e)=>{
      idLote.innerHTML = '<option selected disabled>Elegir Lote</option>';
      obtenerObjeto('?c=GestionAves&m=obtenerGalponesLotes&idGalpon='+idGalpon.options[idGalpon.selectedIndex].value, idLote, ['idLote', 'idLote'], '', llenarSelect);
    })
    formularioProduccionHuevos.addEventListener('submit', (e)=>{
      e.preventDefault();
      (async () => {
        const resp = await insertBD(formularioProduccionHuevos, '?c=GestionAves&m=agregarRecogidas', false);
        initForm();
        alerta(resp, 'success');

      })();
      // agragarObjetoBD(formularioProduccionHuevos, '?c=GestionAves&m=agregarRecogidas', '?c=GestionAves&m=obtenerRecogidas', '#tablaProduccionHuevos', ['fechaInventarioProduccion', 'produccion', 'idGalpon'], 'idInventarioProduccion');
    })

    document.getElementById('resetFormularioPoduccion').addEventListener('click', e => {
      initForm();
    });
    
  }

  if(elementoExiste('formularioAgregarAlimentacion')){
    const formularioAgregarAlimentacion = document.getElementById('formularioAgregarAlimentacion');
    const tablaAlimentacion = new Tabla([], 'tablaAlimentacion', 'id', true, {
      color: 'info', icon: 'pen', nombre: 'editar',
      funcion: async () => {
        console.log('hola estamos editando alimentacion gg');
      }
    });
    const initForm = async () => {
      obtenerObjeto('?c=GestionAves&m=obtenerGalponesLotes', document.getElementById('idAlimentandoGalpon'), ['idGalpon', 'numeroGalpon'], '', llenarSelect);
      obtenerObjeto('?c=Configuracion&m=obtenerProducto&tipoProducto=1', document.getElementById('alimentoAUsar'), ['idProducto', 'nombreProducto'], '', llenarSelect);    
      document.getElementById(`fechaDeAlimentacion`).value = fechaHoy();
      const alimentacion = await selectBD('?c=GestionAves&m=obtenerAlimentacion&idTipoProducto=1');
      // console.log("alimentacion", alimentacion);
      tablaAlimentacion.update(alimentacion);
    };

    // tablaAlimentacion
    formularioAgregarAlimentacion.addEventListener('submit', (e)=>{
      e.preventDefault();
      (async () => {
        insertBD(formularioAgregarAlimentacion ,'?c=GestionAves&m=agregarOperacionGalpon', false);
        initForm();
      })();
      // agragarObjetoBD(formularioAgregarAlimentacion, '?c=GestionAves&m=agregarOperacionGalpon', '?c=GestionAves&m=obtenerAlimentacion&idTipoProducto=1', '#tablaAlimentacion', ['fechaOperacion', 'numeroGalpon', 'nombreProducto', 'cantidadProducto'], 'idInventario');
    })
    initForm();
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
    obtenerObjeto('?c=GestionAves&m=obtenerAlimentacion&idTipoProducto=3','#tablaMortalidad', ['fechaOperacion' ,'idGalpon', 'cantidadProducto','cantidadGallinas'], 'idInventario', llenarTabla);
    
    formularioMortalidad.addEventListener('submit', (e) =>{
      e.preventDefault();
      agragarObjetoBD(formularioMortalidad, '?c=GestionAves&m=agregarOperacionGalpon', '?c=GestionAves&m=obtenerAlimentacion&idTipoProducto=3','#tablaMortalidad', ['fechaOperacion' ,'idGalpon', 'cantidadProducto','cantidadGallinas'], 'idInventario');
    });
}

if (elementoExiste('formularioDespachos')) {
  const formularioDespachos = document.getElementById('formularioDespachos');
  const fechaDespacho = document.getElementById('fechaDespacho');
  const precinto = document.getElementById('precinto');
  const idCliente =  document.getElementById('idCliente');
  const idDespachos = document.getElementById('idDespachos');

  const tablaDetalleDespacho = new Tabla([], 'tablaDetalleDespacho', 'idInventarioProduccion', true);

  const tablaDespachos = new Tabla([], 'tablaDespachos', 'idDespachos',true, {
    color: 'info', icon: 'pen', nombre: 'editar',
    funcion: async x => {
      const idFila =  x.fila.getAttribute('idRow');
      const filaDatos = x.datos.find(fila => fila.idDespachos == idFila );
      console.log("filaDatos", filaDatos);
      const detalleRecogida = await selectBD(`?c=InventarioGeneral&m=obtenerDetalleDespacho&idDespachos=${idFila}`);
      console.log("detalleRecogida", detalleRecogida);
      console.log(tablaDetalleDespacho.tiposHuevo)

      let datosTabla = tablaDetalleDespacho.tiposHuevo.map( e => {
          let detalle =  detalleRecogida.find(fila => fila.nombreTipoHuevo == e.nombreTipoHuevo);
        if (detalle != undefined) {
          detalle.cantidadProduccion =`<input type="number" class='form-control' name='editar[${detalle.idInventarioProduccion}]' value='${detalle.cantidadProduccion}'>`;
          return detalle
        }else {
          return e;
        }
      });
        console.table("datosTabla", datosTabla);
      tablaDetalleDespacho.update(datosTabla);
      console.log("tablaDetalleDespacho", tablaDetalleDespacho);
      fechaDespacho.value = filaDatos.fechaInventarioProduccion;
      fechaDespacho.setAttribute('readonly', 'true');
      idCliente.innerHTML = `<option selected value='${filaDatos.documentoCliente}'>${filaDatos.documentoCliente}</option>`;
      precinto.value = filaDatos.precinto;
      precinto.setAttribute('readonly', 'true');

      idDespachos.value = filaDatos.idDespachos;

      idDespachos.removeAttribute('disabled');

    }
  });

  const initForm = async () => {
    // const despachos = await selectBD('?c=Inventario&m=obtenerDespachos');
    idCliente.innerHTML = `<option selected disabled>Escoja el Cliente</option>`;
    obtenerObjeto('?c=Configuracion&m=obtenerCliente', idCliente, ['documento', 'documento'], '', llenarSelect);

    const tiposHuevo = await selectBD('?c=GestionAves&m=obtenerTipoHuevo');
    const despachos = await selectBD('?c=InventarioGeneral&m=obtenerDespachos');
    tiposHuevo.forEach(tipo => {
      tipo.cantidadProduccion = `<input type="number" class='form-control' name='agregar[${tipo.idTipoHuevo}]'>`
    })
    tablaDetalleDespacho.update(tiposHuevo);
    tablaDetalleDespacho.tiposHuevo = tiposHuevo;
    tablaDespachos.update(despachos);

    fechaDespacho.value = fechaHoy();
    fechaDespacho.removeAttribute('readonly');
    precinto.value = '';
    precinto.removeAttribute('readonly');
    // obtenerObjeto('?c=Inventario&m=obtenerDespachos','#tablaDespachos', ['fechaInventarioProduccion', 'produccion','produccion'], 'idInventario', llenarTabla);
    idDespachos.setAttribute('disabled', 'true');

  };
  formularioDespachos.addEventListener('submit', (e)=>{
    e.preventDefault();
    (async () => {
      const respuesta = await insertBD(formularioDespachos, '?c=InventarioGeneral&m=agregarDespachos')
      console.log("respuesta", respuesta);
      initForm();
    })();
  });
  document.getElementById('resetFormularioDespachos').addEventListener('click', () => {
    initForm();
  })
  initForm();
}

if (elementoExiste('formularioConsumos')) {
  const formularioConsumos = document.getElementById('formularioConsumos');
  const fechaConsumo = document.getElementById('fechaConsumo');
  const galponEnLote = document.getElementById('idGalponConsumo');
  const idInventario = document.getElementById('idInventarioConsumo')

  const tablaDetalleConsumos = new Tabla([], 'tablaDetalleConsumos', 'idProducto', true );

  const tablaConsumos = new Tabla([], 'tablaConsumos', 'idInventario', true, {
    color: 'info', icon: 'pen', nombre: 'editar',
    funcion: async x => {
      const idFila = x.fila.getAttribute('idRow');
      console.log("idFila", idFila);
      const filaDatos = x.datos.find(fila => fila.idInventario == idFila);
      console.log("filaDatos", filaDatos);
      let detalleConsumo = await selectBD(`?c=InventarioGeneral&m=ObtenerDetalleConsumos&idInventario=${idFila}`);
      detalleConsumo = tablaDetalleConsumos.productos.map( e => {
        const detalle = detalleConsumo.find( fila => fila.idProducto == e.idProducto);
        if (detalle != undefined) {
          detalle.cantidadProducto = `<input type="number" class='form-control' name='editar[${detalle.idOperacionGalpon}]' value='${detalle.cantidadProducto}'>`;
          return detalle;
        }else {
          return e;
        }
      });
      tablaDetalleConsumos.update(detalleConsumo);

      fechaConsumo.value = filaDatos.fechaOperacion;
      fechaConsumo.setAttribute('readonly', 'true');
      idInventario.removeAttribute('disabled');
      idInventario.value = filaDatos.idInventario;
      galponEnLote.innerHTML = `<option value='${filaDatos.idGalpon}' selected>${filaDatos.idGalpon}</option>`

    }
  });
  const initForm = async () => {

    const consumos = await selectBD('?c=InventarioGeneral&m=ObtenerConsumos');
    console.log("consumos", consumos);
    tablaConsumos.update(consumos);

    let productos = await selectBD('?c=InventarioGeneral&m=obtenerProductos&idTipoProducto=2');
    productos = productos.map(e => {
      e.cantidadProducto = `<input type="number" class='form-control' name='agregar[${e.idProducto}]'>`;
      return e;
    });
    tablaDetalleConsumos.productos = productos;
    tablaDetalleConsumos.update(productos);
    console.log("tablaDetalleConsumos", tablaDetalleConsumos);

    fechaConsumo.value = fechaHoy();
    idInventario.setAttribute('disabled', 'true');
    // const detalleConsumo = await selectBD(`?c=InventarioGeneral&m=ObtenerDetalleConsumos&fechaOperacion=${fechaHoy()}`);
    // tablaDetalleConsumos.update(detalleConsumo);
    obtenerObjeto('?c=Galpon&m=obtenerGalpones', galponEnLote, ['idGalpon', 'numeroGalpon'], '', llenarSelect);
    galponEnLote.innerHTML = `<option disabled selected>Elija el Galpon en lote</option>`
    

    // const idProducto = document.getElementById('idPRoducto');
    // console.log("desidete", desidete);

  };
  initForm();

  document.getElementById('resetFormularioConsumo').addEventListener('click', e => {
    initForm();
  })


  // obtenerObjeto('?c=GestionAves&m=obtenerAlimentacion&idTipoProducto=3','#tablaDetalleCompra', ['fechaOperacion', 'numeroGalpon', 'nombreProducto', 'cantidadProducto'], 'idInventario', llenarTabla);

  formularioConsumos.addEventListener('submit', (e) =>{
    e.preventDefault();
    (async () => {
      const respuesta = await insertBD(formularioConsumos, '?c=InventarioGeneral&m=agregarOperacionGalpon', false);
      console.log("respuesta", respuesta);
      initForm();
      alerta(respuesta);
    })();
    // agragarObjetoBD(formularioConsumos, '?c=GestionAves&m=agregarOperacionGalpon', '?c=GestionAves&m=obtenerAlimentacion&idTipoProducto=2','#tablaDetalleConsumos', ['fechaOperacion', 'numeroGalpon', 'nombreProducto', 'cantidadProducto'], 'idInventario');
  })
}
// Validando de que exista el formulario respectivo al módulo de Galpón
if(elementoExiste('formularioAgregarGalpon')){
  const formularioAgregarGalpon = document.getElementById('formularioAgregarGalpon');
  const fechaCreacion = document.getElementById('fechaCreacionGalpon'); 
  const idGalpon = document.getElementById('idGalponViejo'); 

  const tablaGalpon = new Tabla([], 'tablaGalpones', 'idGalpon', true, {
    color: 'info', icon: 'pen', nombre: 'editar',
    funcion: async (x)=>{
      const datosFila = x.datos.find( fila => fila.idGalpon == x.fila.getAttribute('idRow'));
      fechaCreacion.value = datosFila.fechaCreacionGalpon;
      document.getElementById('numeroGalpon').value = datosFila.numeroGalpon;
      document.getElementById('areaUtilGalpon').value = datosFila.areaUtil;
      document.getElementById('ConfinamientoGalpon').value = datosFila.confinameiento;
      idGalpon.removeAttribute('disabled');
      idGalpon.value = datosFila.idGalpon;

      //cargar info en el formulario
    }
  });
  const initForm = async () => {
    //  datos por defecto del fomulario
    formularioAgregarGalpon.reset();
    const galpones = await selectBD('?c=Galpon&m=obtenerGalpones');
    idGalpon.setAttribute('disabled','true');
    tablaGalpon.update(galpones);
    fechaCreacion.value= fechaHoy();
  }
  initForm();
  // Rellenando tabla con la información de los Galpones

  // modalGalpones();
  // Obteniendo formulario del Módulo Galpón
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
            insertBD(formularioAgregarGalpon, '?c=Galpon&m=agregarGalpon');
            initForm();
            // modalGalpones();
          }else alert('Error al escoger el tipo de Confinamiento');
        }else alert('Error al indicar Área Útil');
      }else alert('Error en número galpón');
    }    
  })

  document.getElementById('cancelarGalpones').addEventListener('click', (e)=>{
    // modalGalpones();
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
