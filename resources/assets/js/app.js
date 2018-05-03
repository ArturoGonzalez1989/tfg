
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

Vue.component('example-component', require('./components/ExampleComponent.vue'));

const app = new Vue({
    el: '#app'
});

// console.log('custom scripts');

// function mostrarCiudadSI(){
//     var x = document.getElementById("numeroPoliza");
//     x.style.display = "inline";  
// }

// function mostrarCiudadoNO(){
//     var x = document.getElementById("numeroPoliza");
//     x.style.display = "none";  
// }

// $("#comunidad").change(function(event)
// {
// 	alert("SDFS");
// 	$.get("ciudades/" + event.target.value + "", function(response, state)
// 	{
// 		$("#ciudad").empty();
// 		for(i=0; i<response.length; i++)
// 		{
// 			$("#ciudad").append("<option value='"+response[i].id+"'> "+response[i].name+"</option>");
// 		}
// 	});
// });