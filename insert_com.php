<?php
include ('controller.php');
$con=connection();

$nombre = htmlspecialchars($_POST['nombre'],ENT_QUOTES,'UTF-8');
$precio = htmlspecialchars($_POST['precio'],ENT_QUOTES,'UTF-8');
$contenido = htmlspecialchars($_POST['contenido'],ENT_QUOTES,'UTF-8');

$sql="INSERT INTO platos (nombre, precio, contenido) VALUES ('$nombre','$precio','$contenido')";
$rs = mysqli_query($con,$sql);

if($sql)
{
    header("Location: index.php");}
if($rs){
    echo "Plato insertado.";
}
?>