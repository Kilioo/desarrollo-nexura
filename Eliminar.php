<?php
$id = $_GET['id'];
echo $id;
$mysqli = new mysqli("localhost", "root", "", "prueba-nexura");
if ($mysqli->connect_errno) {
    echo 'Falló la conexión con MySQL: (' . $mysqli->connect_errno . ') ' . $mysqli->connect_error;
    exit;
}
if ($mysqli->query("Delete from `empleado_rol` where empleado_id = '$id'")) {
} else {
    echo 'Falló error: (' . $mysqli->errno . ') ' . $mysqli->error;
}
if ($mysqli->query("Delete from `empleados` where id = '$id'")) {
} else {
    echo 'Falló error: (' . $mysqli->errno . ') ' . $mysqli->error;
}
$mysqli->close();
header('location:Index.php');
