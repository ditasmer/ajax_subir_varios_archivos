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
			var archivos = document.querySelector('#fichero').files

			//validar que hemos seleccionado un archivo
			if(archivos.length == 0){
				alert('no se ha seleccionado ningun archivo');
				return;
			}

			//recorrer el array de objetos para validar el tamaño de cada archivo seleccionado y confeccionar el objeto formData
			archivos.forEach(function(archivo, clave){
				//validar tamaño

				//encapsular archivo
			})
			
		}
	</script>
</head>
<body>
<form enctype='multipart/form-data'>
	<input type="file" id='fichero' ><br><br>
	<input type="button" id='enviar' value='enviar' onclick="enviarArchivo()">
</form>
</body></html>


