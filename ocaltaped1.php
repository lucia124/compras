<?php

function error($level,$mensaje){
	echo $mensaje;
	die;
}

function comprobacion($producto,$cantidad){
	include('config.php');
	/*conectar base de datos
	$host="localhost";
	$user="root";
	$contrasena="rootroot";
	//$contraseña="";
	$base="pedidos";
	$conexion=mysql_connect($host,$user,$contrasena,$base);*/
	$conexion=$db;
	if(!$conexion){
		echo"palo";	
		trigger_error("no puedo hacer un conexion con la base de datos ");

	}else{
		echo"palo1";	
		$sentencia="select quantityInStock from products where productCode='".$producto."'";
		//echo $sentencia;
		$linea=mysqli_query($conexion,$sentencia);
		$cantidadMinima;
		if($registro=mysqli_fetch_array($linea)){
			$cantidadMinima=$registro["quantityInStock"];
		}
		if($cantidad>$cantidadMinima){
			trigger_error("no se puede hacer el pedido ya que las existencias son insuficientes");
		}else{
			/*vamos a quitar la cantidad cogida*/
			$cantidadProducto=$cantidadMinima-$cantidad;
			$contador=0;$comparador=true;
			
			while($contador<5 && $comparador==true){
				$pedido="pedido".$contador;
			if(isset($_COOKIE[$pedido])){
				$contador++;
			}else{
				echo "";
				//$pedidos=$pedidos[$pedido,$producto,$cantidad];
				$pedidos1 =["Producto"=> $producto,"cantidad" => $cantidad];
				echo $pedido;
				setcookie($pedido, serialize($pedidos1), time() + (86400), "/"); // 86400 segundos = 1 día
$comparador=false;
			}
			}if($comparador==true){
				echo "no se puede introducir el producto ya que el pedido esta lleno";
			}echo "<br><a href='ocaltaped.php'>pedir otro producto</a>";
			echo "<br><a href='ocaltaped2.php'>finalizar pedido</a>";
			print_r($_COOKIE[$pedido]);
		}
	}
	
}
?>
<?php

set_error_handler("error");
session_start();
$idcliente=$_SESSION['login_user'];
$producto=$_REQUEST["producto"];
$cantidad=$_REQUEST["cantidad"];

/*comprobar que el cliente existe*/

if($idcliente==" "){
	trigger_error("no has itroducido ningun registro");
}else{
	echo "hola";
	
	


if($cantidad>0 ){
	if(isset($cantidad,$producto)){
		echo "koko";
		/*retornara un bulean y si es false nos dira que le numero no es suficiente*/
		$comparador=comprobacion($producto,$cantidad);
	}/*debido a que en cada vuelta introduce un pedido*/
	
	if(isset($comparador0,$producto0,$cantidad0 )){
		darAltaPedido();
	}
	
}else{
	trigger_error("caracter no valido");
}
}

echo "<br><a href='../../welcome.php'>pagina de inicio</a>";




?>
