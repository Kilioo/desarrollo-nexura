<html>

<head>

    <link href="css.css" rel="stylesheet">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/yourcode.js" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

    <style>
        @import url(https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.css);
    </style>

</head>

<body>
    <?php
    session_start();

    $id = "";
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
    }
    ?>
    <div class="sidenav">
        <div class="login-main-text">
            <div class="table-responsive">
                <div class="hyphenation">
                    <center>
                        <div class="alert alert-primary" role="alert">
                            <h1>
                                <strong>
                                    Empleados
                                </strong>
                            </h1>
                        </div>
                    </center>
                    <p align="left">
                        <a class="btn btn-secondary" href="index.php" role="button" data-toggle="tooltip" title="Crear">
                            <i class="fas fa-plus"></i>
                        </a>
                    </p>
                    <table border=" 0" width="50%" class="table">
                        <tr>
                            <center>
                                <div>
                                    <h2>
                                        <strong>
                                            <div>
                                                <?php
                                                $mysqli = new mysqli("localhost", "root", "", "prueba-nexura");
                                                if ($mysqli->connect_errno) {
                                                    echo "Falló la conexión con MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
                                                }
                                                $resultado = $mysqli->query("SELECT DISTINCT empleados.id, empleados.nombre, email, 
                                            (CASE WHEN sexo = 'M' THEN 'Masculino' ELSE 'Femenino' END) AS sexo, 
                                            (CASE 
                                                WHEN area_id = '1' THEN 'Administracion'
                                                WHEN area_id = '2' THEN 'Desarrollo' 
                                                WHEN area_id = '3' THEN 'Ventas' 
                                                WHEN area_id = '4' THEN 'Produccion'
                                                WHEN area_id = '5' THEN 'Servicios generales'
                                                WHEN area_id = '6' THEN 'Direccion'
                                                WHEN area_id = '7' THEN 'Contabilidad'
                                                WHEN area_id = '8' THEN 'Investigacion'
                                                WHEN area_id = '9' THEN 'Mesa de ayuda'
                                                WHEN area_id = '10' THEN 'Seguridad de la informacion'
                                                END) as area_id,
                                              (CASE WHEN boletin = '1' THEN 'Si' ELSE 'No' END) as boletin, descripcion
                                              FROM `empleados`, `empleado_rol` ORDER BY sexo");
                                                if (!$resultado) {
                                                    echo "Falló error: (" . $mysqli->errno . ") " . $mysqli->error;
                                                } else {
                                                    echo "<table style='width:100%' border='0'class='table table-hover'>";
                                                    echo "
                                                        <tr>
                                                        <td><strong><center>Nombre</center></strong></td>
                                                        <td><strong><center>Email</center></strong></td>
                                                        <td><strong><center>Sexo</center></strong></td>
                                                        <td><strong><center>Área</center></strong></td>
                                                        <td><strong><center>Boletín</center></strong></td>
                                                        <td><strong><center>Editar</center></strong></td>
                                                        </tr>
                                                ";
                                                    while ($itemTemp = $resultado->fetch_assoc()) {


                                                        echo "
                                                        <tr>
                                                            <td><center>" . $itemTemp['nombre'] . "</center></td>
                                                            <td><center>" . $itemTemp['email'] . "</center></td>
                                                            <td><center>" . $itemTemp['sexo'] . "</center></td>
                                                            <td><center>" . $itemTemp['area_id'] . "</center></td>
                                                            <td><center>" . $itemTemp['boletin'] . "</center></td>
                                                            <td>
                                                            <p align='center'>
                                                                <a class='btn btn-primary' href='Modificar.php?id=" . $itemTemp['id'] . "&
                                                                nombre=" . $itemTemp['nombre'] . "&
                                                                email=" . $itemTemp['email'] . "&
                                                                sexo=" . $itemTemp['sexo'] . "&
                                                                area_id=" . $itemTemp['area_id'] . "&
                                                                descripcion=" . $itemTemp['descripcion'] . "&
                                                                boletin=" . $itemTemp['boletin'] . "' role='button'><i class='fas fa-edit'></i>                                                                
                                                                </a>
                                                            </p>
                                                            </td>
                                                        </tr>
                                                    ";
                                                    }
                                                    echo "</table>";
                                                }
                                                ?>
                                            </div>
                                        </strong>
                                    </h2>
                                </div>
                            </center>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
        <div class="main">
            <div class="col-md-12 col-sm-12">
                <div class="login-form">
                    <div class="alert alert-success" role="alert">
                        <h1>
                            <strong>
                                <center>
                                    Editar
                                </center>
                            </strong>
                        </h1>
                    </div>
                    <div class="alert alert-warning" role="alert">
                        <label>
                            Los campos con (*) son obligatorios
                        </label>
                    </div>
                    <form action="EjecutarUpdate.php" method="POST">
                        <label>
                            Nombre completo *
                        </label>
                        <div class="form-group">
                            <input value="<?php
                                            $nombre = "";
                                            if (isset($_GET['nombre'])) {
                                                $nombre = $_GET['nombre'];
                                            } else if (isset($_SESSION['updatePost']['nombre'])) {
                                                $nombre = $_SESSION['updatePost']['nombre'];
                                            }
                                            echo $nombre;
                                            ?>
                                            " type="text" class="form-control" placeholder="Nombre completo del empleado" name="nombre" autocomplete="off" required>
                        </div>
                        <label>
                            Correo electrónico *
                        </label>
                        <div class="form-group">
                            <input value="<?php
                                            $correo = "";
                                            if (isset($_GET['email'])) {
                                                $correo = $_GET['email'];
                                            } else if (isset($_SESSION['updatePost']['email'])) {
                                                $correo = $_SESSION['updatePost']['email'];
                                            }
                                            echo $correo;
                                            ?>" type="email" class="form-control" placeholder="Correo electrónico" name="email" autocomplete="off" required>
                        </div>
                        <label>
                            Sexo *
                        </label>
                        <div class="form-check">
                            <?php
                            $sexo = '';
                            if (isset($_SESSION['updatePost']['sexo'])) {
                                $sexo = $_SESSION['updatePost']['sexo'];
                            }
                            if ($_GET['sexo'] == 'Masculino' or $sexo == 'M') {
                                echo "<label class='form-check-label'>
                                <input class='form-check-input' type='radio' id='sexo' name='sexo' value='M' checked>
                                 Masculino
                                </label><br>";
                                echo "<label class='form-check-label'>
                                <input class='form-check-input' type='radio' id='sexo' name='sexo' value='F'>
                                 Femenino
                                </label>";
                            } else {
                                echo "<label class='form-check-label'>
                                <input class='form-check-input' type='radio' id='sexo' name='sexo' value='M'>
                                 Masculino
                                </label><br>";
                                echo "<label class='form-check-label'>
                                <input class='form-check-input' type='radio' id='sexo' name='sexo' value='F' checked>
                                 Femenino
                                </label>";
                            }
                            ?>
                        </div>
                        </br>
                        <label>
                            Área *
                        </label>
                        <div class="form-group">
                            <?php
                            $mysqli = new mysqli("localhost", "root", "", "prueba-nexura");
                            if ($mysqli->connect_errno) {
                                echo "Falló la conexión con MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
                            }
                            $resultado = $mysqli->query("SELECT * FROM `areas`");

                            if (!$resultado) {
                                echo "Falló error: (" . $mysqli->errno . ") " . $mysqli->error;
                            } else {
                                echo "
                                                <select class='form-control' name='area'>
                                                ";
                                while ($itemTemp = $resultado->fetch_assoc()) {
                                    $selected = '';
                                    if ($_GET['area_id'] == $itemTemp['nombre']) {
                                        $selected = 'selected';
                                    } else if ($_SESSION['updatePost']['area'] == $itemTemp['id']) {
                                        $selected = 'selected';
                                    }
                                    echo "<option " . $selected . " value='" . $itemTemp['id'] . "'>" . $itemTemp['nombre'] . "</option>";
                                }
                                echo "</select>";
                            }
                            ?>
                        </div>
                        <label>
                            Descripción *
                        </label>
                        <div class="form-group">
                            <textarea class="form-control rounded-0" name="descripcion" id="descripcion" rows="3" placeholder="Descripción de la experiencia del empleado">
                            <?php
                            $descripcion = "";
                            if (isset($_GET["descripcion"])) {
                                echo $descripcion = $_GET["descripcion"];
                            } else if (isset($_SESSION['updatePost']['descripcion'])) {
                                echo $descripcion = $_SESSION['updatePost']['descripcion'];
                            }
                            ?>                        
                            </textarea>
                        </div>
                        <label>
                        </label>
                        <div class="form-check">
                            <?php
                            $boletin = '';
                            if (isset($_SESSION['updatePost']['boletin'])) {
                                $boletin = $_SESSION['updatePost']['boletin'];
                            }
                            if ($_GET['boletin'] == 'No' or $boletin == '0') {
                                echo "<input class='form-check-input' type='checkbox' name='boletin' value='1' id='boletin'>
                            <label class='form-check-label' for='boletin'>
                                Deseo recibir boletín informativo
                            </label>";
                            } else {
                                echo "<input class='form-check-input' type='checkbox' name='boletin' value='1' id='boletin'  checked>
                                <label class='form-check-label' for='boletin'>
                                Deseo recibir boletín informativo
                            </label>";
                            }
                            ?>
                        </div>
                        </br>
                        <label>
                            Roles *
                        </label>
                        <div class="form-check">
                            <?php
                            $mysqli = new mysqli("localhost", "root", "", "prueba-nexura");
                            if ($mysqli->connect_errno) {
                                echo "Falló la conexión con MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
                            }
                            $resultado = $mysqli->query("SELECT *
                            FROM `roles`");
                            if (!$resultado) {
                                echo "Falló error: (" . $mysqli->errno . ") " . $mysqli->error;
                            } else {
                                $cadena1 = '';
                                $cadena2 = '';
                                $id = '';
                                if (isset($_SESSION['updatePost']['id'])) {
                                    $id = $_SESSION['updatePost']['id'];
                                } else if (isset($_GET['id'])) {
                                    $id = $_GET['id'];
                                }

                                while ($itemTemp = $resultado->fetch_assoc()) {

                                    if (isset($itemTemp['id'])) {
                                        $rol = $itemTemp['id'];
                                        $cadena1 = $cadena1 . $rol;
                                    }
                                    $resultado1 = $mysqli->query("SELECT rol_id
                                    FROM `roles`, `empleado_rol` WHERE roles.id=empleado_rol.rol_id
                                    AND empleado_rol.empleado_id='" . $id . "'");
                                    $check = false;
                                    do {
                                        $itemTemp1 = $resultado1->fetch_assoc();
                                        if (isset($itemTemp1['rol_id'])) {
                                            $rol_id = $itemTemp1['rol_id'];
                                            $cadena2 = $cadena2 . $rol_id;
                                        }
                                        if ($rol_id == $rol and !($check)) {
                                            echo "
                                            <input checked class='form-check-input' type='checkbox' name='rol[]' value='" . $itemTemp['id'] . "' id='rol'>
                                            <label class='form-check-label' for='rol[]'>
                                                " . $itemTemp['nombre'] . "
                                            </label>
                                            </br>";
                                            $check = True;
                                        }
                                    } while (isset($itemTemp1));
                                    if (!$check) {
                                        echo "
                                        <input class='form-check-input' type='checkbox' name='rol[]' value='" . $itemTemp['id'] . "' id='rol'>
                                        <label class='form-check-label' for='rol[]'>
                                            " . $itemTemp['nombre'] . "
                                        </label>
                                        </br>";
                                    }
                                }
                            }
                            session_destroy();
                            ?>
                        </div>
                </div>
                <input type="hidden" name="id" value="<?php echo $id; ?>">
                <input type="submit" class="btn btn-primary" value="Actualizar">
                </form>
            </div>
        </div>
    </div>
    </center>
    </br>
    </br>
</body>

</html>