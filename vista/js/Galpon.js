// $(document).ready(function(){
// 	$
// 	// 
// });
const formularioAgregarGalpon = document.getElementById('formularioAgregarGalpon');
formularioAgregarGalpon.addEventListener('submit',function(e){
	console.log('Click');
	e.preventDefault();
	let datos = new FormData(formularioAgregarGalpon);
	console.log(datos.get('numeroGalpon'));
})