
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

// Vue.component('example-component', require('./components/ExampleComponent.vue'));

// const app = new Vue({
//     el: '#app'
// });

$(function(){
	$('#comunidad').on('change', elegirCiudad);
});

function elegirCiudad() {
	var comunidad_id = $(this).val();

	if(! comunidad_id)
		$('#ciudad').html('<option value="">Seleccione ciudad</option>');
	// AJAX

	$.get('/api/comunidad/'+comunidad_id+'/ciudades', function(ciudades){
		var html_select = '<option value="">Seleccione ciudad</option>';
		for(var i=0; i<ciudades.length; ++i)
			html_select += '<option value="'+ciudades[i].id+'">'+ciudades[i].nombre+'</option>'
		$('#ciudad').html(html_select);
	});
}

// $(function(){
// 	$('#ciudad').on('change', mostrarPuntos);
// });

// function mostrarPuntos() {
// 	var ciudad_id = $(this).val();

// 	if(! ciudad_id)
// 		$('#insertarPuntos').html('<tr><td>No hay datos</td><td>No hay datos</td><td>No hay datos</td><td>No hay datos</td></tr>');
// 	// AJAX

// 	$.get('/api/ciudad/'+ciudad_id+'/puntos', function(puntos){
// 		var html_select = '';
// 		for(var i=0; i<puntos.length; ++i)
// 			html_select += '<tr><td><input type="checkbox" name="puntos[]" value="'+puntos[i].id+'"></td><td>'+puntos[i].id+'</td><td>'+puntos[i].nombre+'</td><td>'+puntos[i].descripcion+'</td><td>'+puntos[i].coste+'</td></tr>'
// 		$('#insertarPuntos').html(html_select);
// 	});
// }

