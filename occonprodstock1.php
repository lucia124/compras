
					<?php
					function error($level,$mensaje){
						
						echo ($mensaje);
					}
					set_error_handler("error");
					/*hare una lista desplegable con los usuarios */
					function monstrarStock(){
						include('config.php');
					/*$a="localhost";
					$user="root";
					$contrasena="rootroot";
					//$contrasena="";
					$baseDatos="pedidos";
					$conexion=mysqli_connect($a,$user,$contrasena,$baseDatos);
					*/
					$conexion=$db;
					if(!$conexion){
						
						trigger_error("no se ha podido establecer la conexion con la base de datos ");
					}else {
						$sentencia1='select count(*)as a1 from products';
						$linea1=mysqli_query($conexion,$sentencia1);
						if($registro1=mysqli_fetch_array($linea1)){
							$valor=$registro1["a1"]/10;
							$valor1=$registro1["a1"];
							$contador;
							if($_GET["contador"]){
								$contador=$_GET["contador"];
							}else{
								$contador=0;
							}
							$sentencia="SELECT productName,`quantityInStock` FROM `products` ORDER by quantityInStock limit ".$contar.",11";
							echo $sentencia;
							$linea=mysqli_query($conexion,$sentencia);
							echo "<table><tr><th>productName</th><th>quantityInStock</th></tr>";
							while($registro=mysqli_fetch_array($linea)){
								
								echo "<tr><td>".$registro["productName"]
								."</td><td> ".$registro["quantityInStock"].'</td></tr>';
							}
							$contador2=0;$contador3=0;
							while($contador2<$valor1){
								if($contador2<$contador){
									$contador3++;
									echo "<a href='occonprodstock1.php'"
								}else if($contador==$contador2){
									$contador3=0;
								}else{
									$contador3++;
								}
							}
						}
						
					}
					}
					?>
					<?php
					
					
					/*vamos a buscar el producto y monstrar su stock*/
					monstrarStock();
					
					?>
