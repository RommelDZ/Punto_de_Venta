/*=============================================
SideBar Menu
=============================================*/

//$(".sidebar-menu").tree();

// Uso del localStorage para asignar la clase activa al modulo en que se encuentra
if (localStorage.getItem("actual") != null) {

	$(localStorage.getItem("anterior")).removeClass("active");	
	$(localStorage.getItem("actual")).addClass("active");

}

$(function() {
  
  // elementos de la lista
  var menues = $(".nav-sidebar li a"); 

  // manejador de click sobre todos los elementos
  menues.click(function() {

  	// eliminamos active de todos los elementos
    menues.removeClass("active");
     // activamos el elemento clicado.
    $(this).addClass("active");

    var anterior = menues.attr('id');
    var actual = $(this).attr('id');

    localStorage.setItem("anterior", ".nav-sidebar li a#"+anterior);
    localStorage.setItem("actual", ".nav-sidebar li a#"+actual);    

  });

});


/*=============================================
Data table
=============================================*/

$(".tablas").DataTable({

	"language": {

		"sProcessing":     "Procesando...",
		"sLengthMenu":     "Mostrar _MENU_ registros",
		"sZeroRecords":    "No se encontraron resultados",
		"sEmptyTable":     "Ningún dato disponible en esta tabla",
		"sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_",
		"sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0",
		"sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
		"sInfoPostFix":    "",
		"sSearch":         "Buscar:",
		"sUrl":            "",
		"sInfoThousands":  ",",
		"sLoadingRecords": "Cargando...",
		"oPaginate": {
		"sFirst":    "Primero",
		"sLast":     "Último",
		"sNext":     "Siguiente",
		"sPrevious": "Anterior"
		},
		"oAria": {
			"sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
			"sSortDescending": ": Activar para ordenar la columna de manera descendente"
		}

	}

});

/*=============================================
//iCheck for checkbox and radio inputs
=============================================*/
 
$('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
  checkboxClass: 'icheckbox_minimal-blue',
  radioClass   : 'iradio_minimal-blue'
})


/*=============================================
//input Mask
=============================================*/

$(document).ready(function(){
  $(":input").inputmask();
});