<?php 
header("Access-Control-Allow-origin: *");
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");

require("../conexion.php");

$con = "SELECT p.*, c.nombre AS ncategoria FROM producto p INNER JOIN categoria c ON p.fo_cate = c.id_cate ORDER BY p.nombre;";
$res= mysqli_query($conexion,$con) or die("no_consulto_usuario");



$vec = [];
while ($reg=mysqli_fetch_array($res))
{
    $vec[]=$reg;
}

$cad=json_encode($vec);
echo $cad;
header("content-type: application/json");
?>