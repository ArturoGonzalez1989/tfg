
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

$(".filtrar").on("change", function(){
	var ciudad = $('#ciudad').val();
	var tematica = $(this).val();
	// alert(tematica);


	$(".ruta-card").addClass("d-none");
	$(".tematica"+tematica).removeClass("d-none");
	if(tematica == 0){
		$(".ruta-card").removeClass("d-none");
	}
});

$(".filtrarComunidad").on("change", function(){
	var comunidad = $(this).val();

	$(".contenedor-comunidad").addClass("d-none");
	$(".comunidad"+comunidad).removeClass("d-none");
	if(comunidad == 0){
		$(".contenedor-comunidad").removeClass("d-none");
	}
});
	

$(".filtrar2").on("change", function(){
	var tematica = $(this).val();
	// alert(tematica);


	$(".contenedor-rutas").addClass("d-none");
	$(".tematica"+tematica).removeClass("d-none");
	if(tematica == 0){
		$(".contenedor-rutas").removeClass("d-none");
	}
});