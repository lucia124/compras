<!este archivo no es usado ya que ya sabemos el codigo del cliente>
<html lang="es">
	<head>
		<title>plantilla </title>
		<meta charset="utf-8" />
		
		
		<style type="text/css">
		
		</style>
	</head>
	<body>
					<form action="occonsped1.php" method="post">
					<select name="idcliente">
					<?php
					function error($level,$mensaje){
						
						echo ($mensaje);
					}
					set_error_handler("error");
					/*hare una lista desplegable con los usuarios */
					/*$a="localhost";
					$user="root";
					//$contrasena="rootroot";
					$contrasena="";
					$baseDatos="pedidos";
					$conexion=mysqli_connect($a,$user,$contrasena,$baseDatos);
					*/
					include('config.php');
					$conexion=$db;
					if(!$conexion){
						
						trigger_error("no se ha podido establecer la conexion con la base de datos ");
					}else {
						
						$sentencia="select customerNumber from customers order by customerNumber";
						echo $sentencia;
						$linea=mysqli_query($conexion,$sentencia);
						
						while($registro=mysqli_fetch_array($linea)){
						echo '<option value='.$registro["customerNumber"].'>'.$registro["customerNumber"].'</option>';	
						
						
						}
					}
					
					?>
					</select>
					<input type="hidden" name="pagina" value=0></input>
					<input type="submit" value="enviar"></input>
					<input type="reset" value="limpiar"></input>
					</form>
					
	</body>
</html>
