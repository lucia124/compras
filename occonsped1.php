<?php
function monstrarPedidos($idcliente){
/*primero vamos a contar el numero de pedidos de ese cliente*//*
$a="localhost";
					$user="root";
					$contrasena="rootroot";
					//$contrasena="";
					$baseDatos="pedidos";
					$conexion=mysqli_connect($a,$user,$contrasena,$baseDatos);*/
					include('config.php');
					$conexion=$db;
					if(!$conexion){
						trigger_error("no se ha podido establecer la conexion con la base de datos ");
					}else {
						$sentencia="select count(*) as a 
						from orders where customerNumber=".$idcliente;
						//echo $sentencia;
						$linea=mysqli_query($conexion,$sentencia);
						$numregistros;
						if($registros=mysqli_fetch_array($linea)){
							$numregistros=$registros["a"];
							/*comprobar el numero*/
							if($numregistros==0){
								echo "dicho cliente no tiene pedidos";
							}else{
								
								$numregistros;
								if(isset($_GET['pagina'])){
									$registro=$_GET['pagina'];
								}else{
									$registro=0;
								}
								//echo "<br>".$numregistros."<br>";
								/* visualizamos cada usuario sus distintos pedidos*/
								$sentencia1="SELECT `orderNumber` , `orderDate` , `status` 
								FROM orders 
								WHERE `customerNumber` =".$idcliente
								." limit ".$registro.",1";
								//echo $sentencia1;
								$linea1= mysqli_query($conexion,$sentencia1);
								
								echo "<table><tr><th>orderNumber</th><th>orderDate</th><th>status</th>";
								/*me llevo la informacion a otro metodo*/
								$numeroPedidos;$contador5=0;
								/*introducimos el codigo de pedido */
								
								if($registros=mysqli_fetch_array($linea1)){$pedido4=$registros["orderNumber"];
									echo "<tr><td>".$pedido4."</td>".
										 "<td>".$registros["orderDate"]."</td>".
										 "<td>".$registros["status"]."</td></tr>";
										 /*vamos a monstrar los productos de esa lista*/
										 
										 $sentencia2="
										 SELECT orderdetails.orderLineNumber,products.productName,orderdetails.quantityOrdered, orderdetails.priceEach
										 from products,orderdetails,orders,customers
										where customers.customerNumber=orders.customerNumber
										and orders.orderNumber=orderdetails.orderNumber
										and orderdetails.productCode=products.productCode
										and orders.`orderNumber`=".$registros["orderNumber"]
										." order by orderdetails.orderLineNumber";
										//echo $sentencia2;
										$linea2=mysqli_query($conexion,$sentencia2);
										echo "<table><tr><th>nombre del producto</th></tr>";
										while($registro1=mysqli_fetch_array($linea2)){
											echo "<tr><td>".$registro1['productName']."</td></tr>";
										}
										echo "</table>";
										/*ponemos los elementos de la lista */
										$contar3=0;$contar4=0;
										while($contar3<$numregistros){
											
											$mensaje;
											if($contar3<$registro){
												$contar4++;
												echo "<a href='occonsped1.php?pagina=".$contar3."'>lista de atras".$contar4."</a>";
											}else if($contar3==$registro){
												$contar4=0;
												echo "<a href='occonsped1.php?pagina=".$contar3."'>pagina actual</a>";
											}else{$contar4++;
												$mensaje="pagina siguiente".$contar4;
												echo "<a href='occonsped1.php?pagina=".$contar3."'>pagina proxima".$contar4."</a>";
												
											}
											

											
											$contar3++;
										}
										echo "<br><a href='../../welcome.php'>pagina de inicio</a>";
								}
							}
						}
					}	
}




?>
<?php
session_start();
//print_r($_SESSION);
$cliente=$_SESSION['clave'];

monstrarPedidos($cliente);




?>
