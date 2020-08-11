<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title></title>
	<style>
	</style>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script>
		function enviarArchivo(){
			//recuperar archivo formulario
			var archivos = document.querySelector('#fichero').files;

			//validar que hemos seleccionado un archivo
			if(archivos.length == 0){
				alert('Antes de subir, no se ha seleccionado ningun archivo');
				return;
			}

			//recorrer el array de objetos para validar el tamaño de cada archivo seleccionado y confeccionar el objeto formData
			var errores = 'Antes de subir, los siguientes archivos superan los 900Kb:\n\n';
			var hayError = false;
			var datos = new FormData();

			Array.prototype.forEach.call(archivos, function(archivo, clave){
				//validar tamaño de cada archivo
				/*PROVAR VALIDACION POR EL SERVIDOR
				if(archivo.size > 900000){
					errores += archivo.name + "\n";
					hayError = true;
				} else {
					//encapsular archivo
					var indice = 'archivo'+clave;
					datos.append(indice, archivo);
				}*/
					//encapsular archivo
					var indice = 'archivo'+clave;
					datos.append(indice, archivo);

			})
			//no aparece porque es el SERVIDOR el que valida
			if(hayError){
				alert(errores);
			}
			//CON AJAX
			$.ajax({
				url: 'servicio/ajax_recibir_varios_archivos.php',
				type: 'post',
				data: datos,
				cache: false,
				contentType: false,
				processData: false,
				success: function(mensaje){
					alert(mensaje)
				},
				error: function(error){
					alert(error)
				}
			})
			
		}
	</script>
</head>
<body>
<form enctype='multipart/form-data'>
	<input type="file" id='fichero' multiple><br><br>
	<input type="button" id='enviar' value='enviar' onclick="enviarArchivo()">
</form>
</body></html>


