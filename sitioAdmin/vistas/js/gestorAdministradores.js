/*=============================================
SUBIENDO LA FOTO DEL USUARIO
=============================================*/

$(".nuevaFoto").change(function(){

	var imagen = this.files[0];

	/*=============================================
  	VALIDAMOS EL FORMATO DE LA IMAGEN SEA JPG O PNG
  	=============================================*/
  	if(imagen["type"] != "image/jpeg" && imagen["type"] != "image/png"){

		$(".foto").val("");

		swal({
	      title: "Error al subir la imagen",
	      text: "¡La imagen debe estar en formato JPG o PNG!",
	      type: "error",
	      confirmButtonText: "¡Cerrar!"
	    });

		return;

  	}else{

  		var datosImagen = new FileReader;
  		datosImagen.readAsDataURL(imagen); //convertimos la vlble en un archivo

  		$(datosImagen).on("load", function(event){
		
  			var rutaImagen = event.target.result;

  			$(".previsualizar").attr("src", rutaImagen);

		})
  	}

})


/*=============================================
SUBIENDO LA FOTO DE USUARIO
=============================================*/

$(".foto").change(function(){

	var imagen = this.files[0];

	/*=============================================
  	VALIDAMOS EL FORMATO DE LA IMAGEN SEA JPG O PNG
  	=============================================*/
  	if(imagen["type"] != "image/jpeg" && imagen["type"] != "image/png"){

		$(".foto").val("");

		swal({
	      title: "Error al subir la imagen",
	      text: "¡La imagen debe estar en formato JPG o PNG!",
	      type: "error",
	      confirmButtonText: "¡Cerrar!"
	    });

		return;

  	}else{

  		var datosImagen = new FileReader;
  		datosImagen.readAsDataURL(imagen); //convertimos la vlble en un archivo

  		$(datosImagen).on("load", function(event){
		
  			var rutaImagen = event.target.result;

  			$(".previsualizar").attr("src", rutaImagen);

		})
  	}

})
