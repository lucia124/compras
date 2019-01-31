<html>
<head>
</head>
<body>
<form action="ocaltaped1.php" method="post">

<br>

<?php /*esta parte no lo hacemos al usar las sesiones que ya guarda la informacion*/
/*establecemos conexion*/
INCLUDE('config.php');

/*$localhost="localhost";
$user="root";
$contraseña="rootroot";
//$contraseña="";
$baseDeDatos="pedidos";
$conexion=mysqli_connect($localhost,$user,$contraseña,$baseDeDatos);
//print_r($_SESSION);

//$conexion=$_SESSION["conexion"];
//echo $conexion;//print_r($_SESSION);*/
//print_r($_SESSION);
$conexion=$db;
//print($conexion);
if(!$db){
	trigger_error("no se ha  podido establecer la conexion");
}else{
	print("hola");
	
	
	echo'<select name="producto">';
	$sentencia="SELECT productCode , productName FROM products";
	echo $sentencia;
	$linea=mysqli_query($conexion,$sentencia);
	while($registro=mysqli_fetch_array($linea)){
		echo '<option value='.$registro["productCode"].'>'.$registro["productName"].'</option>';
	}
	echo"</select>";
	echo "introduce la cantidad de ese material";
echo'<input type="text" name="cantidad" ></input><br>';
	echo "<br><a href='../../welcome.php'>pagina de inicio</a>";
}


?>


<input type="submit" value="enviar">
<input type="reset" value="limpiar">

</form>

</body>
</html>
