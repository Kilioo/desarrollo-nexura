<?php

session_start();

$_SESSION['updatePost'] = $_POST;

$id = $_POST['id'];
$nombre = $_POST['nombre'];
$email = $_POST['email'];
$sexo = $_POST['sexo'];
$area = $_POST['area'];
$boletin = $_POST['boletin'];
$descripcion = $_POST['descripcion'];
$rol = $_POST['rol'];

$mysqli = new mysqli("localhost", "root", "", "prueba-nexura");

if ( $mysqli->connect_errno ) {
    echo 'Falló la conexión con MySQL: (' . $mysqli->connect_errno . ') ' . $mysqli->connect_error;
}
if ( $mysqli->query( "Delete from `empleado_rol` where empleado_id = '$id'" ) ) {

} else {
    echo 'Falló error: (' . $mysqli->errno . ') ' . $mysqli->error;
}
foreach ($rol as $selected) {
    echo $selected . "</br>";
    $mysqli->query("INSERT INTO `empleado_rol` (`empleado_id`,`rol_id`)
     VALUES ('$id','$selected');");
}

$mysqli->query( "UPDATE `empleados` SET `nombre`='$nombre', `email`='$email', `sexo`='$sexo', `area_id`='$area', `boletin`='$boletin', `descripcion`='$descripcion' WHERE id='$id'" );
header('location:Index.php?id="' . $id . '"');
