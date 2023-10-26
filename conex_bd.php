
<?php 
	
	$host = 'localhost';
	$user = 'root';
	$password = '';
	$db = 'imagenes';
	
	$conex = @mysqli_connect($host,$user,$password,$db);

	if(!$conex){
		echo "Error en la conexión";
	}

?>