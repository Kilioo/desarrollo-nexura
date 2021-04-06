<?php
session_start();
$_SESSION['mi_post'] = $_POST;
$nombre = $_POST['nombre'];
$email = $_POST['email'];
$sexo = $_POST['sexo'];
$area_id = $_POST['area'];
$descripcion = $_POST['descripcion'];
$boletin = $_POST['boletin'];
$rol = $_POST['rol'];
$mysqli = new mysqli("localhost", "root", "", "prueba-nexura");
if ($mysqli->connect_errno) {
    echo 'Falló la conexión con MySQL: (' . $mysqli->connect_errno . ') ' . $mysqli->connect_error;
}
$mysqli->query("INSERT INTO `empleados` (`nombre`,`email`,`sexo`,`area_id`,`boletin`,`descripcion`) 
    VALUES ('$nombre','$email','$sexo', '$area_id', '$boletin', '$descripcion');");
$resultado1 = $mysqli->query("SELECT id FROM `empleados` where nombre='$nombre' and email='$email'");
while ($itemTemp = $resultado1->fetch_assoc()) {
    $empleado_id = $itemTemp['id'];
}
foreach ($rol as $selected) {
    echo $selected . "</br>";
    $mysqli->query("INSERT INTO `empleado_rol` (`empleado_id`,`rol_id`)
     VALUES ('$empleado_id','$selected');");
}
$resultado = $mysqli->query("SELECT * FROM `empleados` where nombre='$nombre' and email='$email'");
if (!$resultado) {
    echo 'Falló error: (' . $mysqli->errno . ') ' . $mysqli->error;
} else {
    if ($resultado->num_rows == 0) {
        echo 'No se pudo registrar';
    }
}
echo '<script language="javascript">alert("Empleado creado correctamente");</script>';
header('location:Index.php?id="' . $empleado_id . '"');
