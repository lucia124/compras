<?php
function error($level,$mensaje){
						
						echo ($mensaje);
						die();
					}
function monstrarProductos($fechaInicio,$fechaFin){
	/*
	$a="localhost";
					$user="root";
					$contrasena="rootroot";
					//$contrasena="";
					$baseDatos="pedidos";
					$conexion=mysqli_connect($a,$user,$contrasena,$baseDatos);
					*/
					include("config.php");
 $conexion=$db;
   session_start();
					if(!$conexion){
						
						trigger_error("no se ha podido establecer la conexion con la base de datos ");
					}else {
						/**/$numero=0;
						
						$sentencia='SELECT SUM(orderdetails.quantityOrdered) as a1,products.productName 
FROM `orderdetails`,products,orders
WHERE products.productCode=orderdetails.productCode
and orders.orderNumber=orderdetails.orderNumber
and orders.customerNumber='.$_SESSION['clave'].'
and orders.orderDate BETWEEN "'.$fechaInicio.'" and "'.$fechaFin.'"GROUP BY orderdetails.orderNumber ';
echo $sentencia;
						$linea=mysqli_query($conexion,$sentencia);
						echo "<table><tr><th>Suma de productos</th><th>nombre de prodcuto</th></tr>";
						while($registros=mysqli_fetch_array($linea)){
							echo "<tr><td>".$registros["a1"]."</td><td>".$registros["productName"]."</td></tr>";
						}
						
						
						
	
	
}
}



?>
<?php
set_error_handler("error");
$fechaInicio=$_REQUEST["fechaInicio"];
$fechaFin=$_REQUEST["fechaFin"];
echo "koko".$fechaInicio."hola";
if($fechaInicio==""){
	trigger_error("no has introducido una fecha de inicio");
}else if($fechaFin==""){
	$fechaFin=date("Y-m-d");
}
monstrarProductos($fechaInicio,$fechaFin);


echo "<br><a href='../../welcome.php'>pagina de inicio</a>";
?>
