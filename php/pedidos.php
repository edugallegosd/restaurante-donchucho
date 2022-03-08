<?php
//Conectar a la bd 
$conexion=mysqli_connect("localhost", "root", "", "restaurante");

session_start();
$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];
$calle = $_POST['calle'];
$colonia = $_POST['colonia'];
$telefono = $_POST['telefono'];
$referencias = $_POST['referencias'];
$numeroventa = $_POST['numeroventa'];

$insertar = "INSERT INTO pedidos(nombre, numeroventa, apellido, calle, colonia, telefono, referencias) VALUES ('$nombre', '$numeroventa', '$apellido', '$calle', '$colonia', '$telefono', '$referencias')";

$resultado = mysqli_query($conexion, $insertar);
if (!$resultado) {
	mysqli_error();
} else {
	header("location:../index.html");
}


mysqli_close($conexion);