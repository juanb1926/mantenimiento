<?php 
header("Access-Control-Allow-origin: *");
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");

$json = file_get_contents ("php://input");

$params = json_decode($json);

require ("../conexion.php");

//$ins = "INSERT INTO ventas (Cantidad, subtotal, Total, id_cliente) VALUES ('2, 3, 5, 1')"
$ins = "INSERT INTO  ventas(cantidad, subtotal, iva, total, fo_usuarios, fo_producto, fo_clientes) VALUES ('$params->cantidad', '$params->subtotal', '$params->iva', '$params->total', '$params->fo_usuarios', '$params->fo_producto', '$params->fo_clientes')";



mysqli_query($conexion,$ins) or die ("no inserto");

Class Result{}

$response = new Result ();
$response -> resultado = "ok";
$response -> mensaje = "datos_grabados";


header("content-type: application/json");
echo json_encode($response);
?>