<?php

/*hare una lista desplegable con los usuarios */
					/*$a="localhost";
					$user="root";
					$contrasena="rootroot";
					//$contrasena="";
					$baseDatos="pedidos";
					$conexion=mysqli_connect($a,$user,$contrasena,$baseDatos);
					*/
					include('config.php');
					$conexion=$db;
					if(!$conexion){
						
						trigger_error("no se ha podido establecer la conexion con la base de datos ");
					}else {
						/**/$numero=0;
						if(isset($_GET["numero"])){
							$numero=$_GET["numero"];
						}
						
						
						$sentencia="select count(*) as a1 from products ";
						/*cada pagina sera de 10 registro */
						$linea=mysqli_query($conexion,$sentencia);
						if($registro=mysqli_fetch_array($linea)){
							$numero2=$registro["a1"];
							$numero1=$registro["a1"] /10;
							/*visualizar los datos */
							 $sentencia1="SELECT `productName`,`quantityInStock`
							 FROM `products` 
							 ORDER BY `quantityInStock` DESC
							 limit ".$numero.",".$numero1;
							 echo $sentencia1;
							 echo "<table><tr><th>productName</th><th>quantityInStock</th></tr>";
							 $linea1=mysqli_query($conexion,$sentencia1);
							 while($registro1=mysqli_fetch_array($linea1)){
								 echo "<tr><td>".$registro1["productName"]."</td><td>".
								 $registro1["quantityInStock"]."</td></tr>";
							 }
							 /*viasualizar las distintas paginas */
							 echo "</table>";
							 $contar1=0;$contar2=0;
							 while($contar1<$numero2){
								 $mensaje;
								 if($contar1<$numero){
									 $contar2++;
									 $mensaje="pagina atras".$contar2;
								 }else if($contar1==$numero){
									 $contar2=0;
									 $mensaje="pagina actual";
								 }else{
									 $contar2++;
									 $mensaje=" proxima pagina ".$contar2;
								 }
								 echo "<a href='occonstock.php?numero=".$contar1."'>".$mensaje."</a>";
							 $contar1=$contar1 + $numero1;
							 }
							 echo "<br><a href='../welcome.php'> inicio</a>";
						}
					}


?>
