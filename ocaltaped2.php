<?php
function darAltaPedido($pedidos){
	include('config.php');
set_error_handler("error");
session_start();
	
	/*buscar si el cliente ya tiene algun pedido echo hoy en proceso*/
	$fecha=date('Y-m-d');
	/**/$sentecia1="select orderNumber from orders where orderDate='"
	.$fecha."' and status ='In Process' and CustomerNumber=".$_SESSION['clave'];
	echo $sentecia1;
	$linea1=mysqli_query($conexion,$sentencia1);
	$num=mysqli_num_rows($linea1);
	if($num>0){
		if($regi=mysqli_fetch_array(linea1){
			$num=$regi['orderNumber'];
		}
	}else{
		
	/*en caso de no tener pedido de hoy*/
/*buscar el ultimo pedido de la base de datos*/
$sentecia="select max(orderNumber)as a1 from orders;";
$conexion=$db;
	
$linea=mysqli_query($conexion,$sentencia);
if($registro=mysqli_fetch_array($linea){
	$registro=$registro["a1"];
	$registro++;
	/*insertar el pedido en la base de datos */
	$sentecia2="insert into orders (orderNumber,orderDate,requiredDate,status,customerNumber);
	values(".$registro.",'".$fecha."','".$fecha."','In Process',".$_SESSION['clave']);
echo $sentecia2;
$linea2=mysqli_query($conexion,$sentencia2);

$num=$registro;
	}
}
/*comprobar si hay pedidos*/
$sentecia3="select orderLineNumber from orderdetails where orderNumber=".$num;
$linea3=mysqli_query($conexion,$sentecia3);
$num1=mysqli_num_rows($linea3);$comparador=true;$contador1=0;
if($num1==0){
	/*dar de alta el pedido en detalles pedido directamente*/
$contador1=1;
	
	}else if($num1<5){
		$sentecia5="select max(orderLineNumber) as a1 from orderdetails where orderNumber=".$num;
	$linea5=mysqli_query($conexion,$sentecia5);
	if($registro5=mysqli_fetch_array($linea5)){
		$contador1=$registro5['a1'];
	}
	}else{
		$comparador=false;
	}
	if($comparador==true){
		/*voy a quitar el stock del producto*/
		$producto=$pedidos['Producto'];
		$sentecia6='select quantityInStock, buyPrice from products where productCode="'.$producto.'"';
		echo $sentecia6;
		$linea6=mysqli_query($conexion,$sentencia6);
		if($registro6 =mysqli_fetch_array($linea6)){
			$valor=$registro6["quantityInStock"]-$pedidos['Producto'];
		}
		
	}
//$sentecia4="inser into orderdetails(orderNumber,productCode,quantityOrdered,priceEach,orderLineNumber)";


/**/
}

$contador=0;
$idcliente=$_SESSION['login_user'];
while($contador<5){
	$pedido="pedido".$contador;
	$pedidos=$_COOKIE[$pedido];
	darAltaPedido($pedidos);
}


?>
