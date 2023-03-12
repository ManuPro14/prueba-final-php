<?php
$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];
$correo_electronico = $_POST['correo_electronico'];
$direccion = $_POST['direccion'];
$ciudad = $_POST['ciudad'];
$pais = $_POST['pais'];


$servername = "localhost";
$database = "databasename";
$username = "username";
$password = "password";

$conexion = mysqli_connect("localhost", "usuario", "contraseña", "tienda");

$sql = "INSERT INTO clientes (nombre, apellido, correo_electronico, direccion, ciudad, pais) VALUES ('$nombre', '$apellido', '$correo_electronico', '$direccion', '$ciudad', '$pais')";

if (mysqli_query($conexion, $sql)) {
  $to = $correo_electronico;
  $subject = "Confirmación de pedido";
  $message = "Gracias por su pedido. Le estaremos enviando los detalles del mismo muy pronto.";
  $headers = "From: tienda@ejemplo.com";

  mail($to, $subject, $message, $headers);

  echo "¡Gracias por su pedido! Le estaremos enviando los detalles del mismo muy pronto.";
} else {
  echo "Error: " . $sql . "<br>" . mysqli_error($conexion);
}

mysqli_close($conexion);
?>
