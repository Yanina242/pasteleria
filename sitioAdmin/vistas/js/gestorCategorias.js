/*=============================================
CARGAR LA TABLA DINÁMICA DE CATEGORÍAS
=============================================*/

// $.ajax({

// 	url:"ajax/tablaCategorias.ajax.php",
// 	success:function(respuesta){
		
// 		console.log("respuesta", respuesta);

// 	}

// })

//deferRender adiciona velocidad para la inicializacion
//retrieve si no funciona la inicializacion vuelve a cargarla

$(".tablaCategorias").DataTable({
	 "ajax": "ajax/tablaCategorias.ajax.php",
	 "deferRender": true,
	 "retrieve": true,
	 "processing": true,
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
REVISAR SI LA CATEGORÍA YA EXISTE
=============================================*/

$(".validarCategoria").change(function(){

	$(".alert").remove(); //quitamos la case alert q hace aparecer el cartel

	var categoria = $(this).val();//obtenemos el valor del campo tituloCategoria
	 console.log("categoria", categoria);

	var datos = new FormData();
	datos.append("validarCategoria", categoria);

	$.ajax({
	    url:"ajax/categorias.ajax.php",
	    method:"POST",
	    data: datos,
	    cache: false,
	    contentType: false,
	    processData: false,
	    dataType: "json",
	    success:function(respuesta){
	    	
	    	 console.log("respuesta", respuesta);

	    	if(respuesta){

             //despues de la etiqueta padre de donde esta la clase validarCategoria colocar el cartel
	    		$(".validarCategoria").parent().after('<div class="alert alert-warning">Esta categoría ya existe</div>')
	    		$(".validarCategoria").val(""); //vaciamos el campo de categoria
	    	}   

	    }

	  })
});

/*=============================================
RUTA CATEGORÍA
=============================================*/

function limpiarUrl(texto){

	var texto = texto.toLowerCase();
	texto = texto.replace(/[á]/, 'a');
	texto = texto.replace(/[é]/, 'e');
	texto = texto.replace(/[í]/, 'i');
	texto = texto.replace(/[ó]/, 'o');
	texto = texto.replace(/[ú]/, 'u');
	texto = texto.replace(/[ñ]/, 'n');
	texto = texto.replace(/ /g, '-');
	return texto;

}


$(".tituloCategoria").change(function(){

	$(".rutaCategoria").val(

		limpiarUrl($(".tituloCategoria").val())
        
	);

});


/*=========================================
			EDITAR CATEGORIA
==========================================*/

$(".tablaCategorias tbody").on("click",".btnEditarCategoria",function(){
	var idCategoria=$(this).attr("idCategoria");

	var datos = new FormData();
	datos.append("idCategoria",idCategoria);

	$.ajax({
		url:"ajax/categorias.ajax.php",
	    method:"POST",
	    data: datos,
	    cache: false,
	    contentType: false,
	    processData: false,
	    dataType: "json",
	    success:function(respuesta){
	    	console.log(respuesta);
	    	$("#modalEditarCategoria .idCategoria").val(respuesta["id_categoria"]);
	    	$("#modalEditarCategoria .estadoCategoria").val(respuesta["estado_categoria"]);
	    	$("#modalEditarCategoria .tituloCategoria").val(respuesta["nombre_categoria"]);
	    	$("#modalEditarCategoria .previsualizarFoto").attr("src",respuesta["imagen_categoria"]);
	    	$("#modalEditarCategoria .antiguaFoto").val(respuesta["imagen_categoria"]);
	    	
	    }
	})

})

