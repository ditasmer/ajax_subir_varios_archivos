<?php
//si nos llega un archivo lo moveremos a una carpeta

try {
	//valida que llega un fichero minimo
	if(!isset($_FILES)){
		throw new Exception('No se ha seleccionado ningun archivo');
	}
	//recorrer la variable FILES para validar y mover cada uno de los archivos que llega al servidor
	$errores = "Los siguietes archivos superan los 900Kb:\n\n";
	$hayError = false;
	$mensaje = '';

	foreach ($_FILES as $clave => $archivo) {
		//valida que el tamaño es < 900Kb
		if($archivo['size'] > 900000){
			//throw new Exception('Tamaño archivo supera 900Kb');
			$errores .= $archivo['name'] . "\n";
			$hayError = true;
		}else{
			//mover archivo a una carpeta
			if(move_uploaded_file($archivo['tmp_name'], "../ficheros_servidor/$archivo[name]")){
				$mensaje .= "fichero $archivo[name] enviado OK";
			} else{
				//throw new Exception('No se ha podido enviar');
				$mensaje .= "Fichero $archivo[name] no se ha podido enviar\n";
			}
		}
	}
	//mensaje de respuesta
	if($hayError){
		$mensaje = $errores.$mensaje;
	}
} catch (Exception $e) {
	$mensaje = $e->getMessage();
}
//enviar mensaje respuesta
echo $mensaje;


?>