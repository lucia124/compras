<!doctype html>
<html lang="es">
	<head>
		<title>plantilla </title>
		<meta charset="utf-8" />
		
		
		<style type="text/css">
		
		</style>
	</head>
	<body>
					<form action="occonprodstock1.php" method="post">
					<select name="idproducto">
					<?php
					function error($level,$mensaje){
						
						echo ($mensaje);
					}
					set_error_handler("error");
					/*hare una lista desplegable con los usuarios */
					$a="localhost";
					$user="root";
					$contrasena="rootroot";
					//$contrasena="";
					$baseDatos="pedidos";
					$conexion=mysqli_connect($a,$user,$contrasena,$baseDatos);
					
					if(!$conexion){
						
						trigger_error("no se ha podido establecer la conexion con la base de datos ");
					}else {
						
						$sentencia="select productCode ,quantityInStock from products order by productCode";
						echo $sentencia;
						$linea=mysqli_query($conexion,$sentencia);
						
						while($registro=mysqli_fetch_array($linea)){
						echo '<option  value='.$registro["productCode"].'>'.$registro["productCode"].'</option>';	
						
						
						}
					}
					
					?>
					</select>
					<input type="hidden" name="numRegistro"value=0></input>
					<input type="submit" value="enviar"></input>
					<input type="reset" value="limpiar"></input>
					</form>
					
	</body>
</html>
