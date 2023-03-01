<?php
$usuario = "root"; //en ste caso root por ser localhost
$password = ""; //contraseña por si tiene algun servicio de hosting 
$servidor = "localhost"; //localhost por lo del xampp
$basededatos = "formulario1"; //nombre de la base de datos


//por si hay errors de conexion un mensaje "Error con el servidor de la Base de datos".
$conexion = mysqli_connect($servidor, $usuario, "") or die("Error con el servidor de la Base de datos");


//por si hay errors de conexion un mensaje "Error al conectarse a la Base de datos".
$db = mysqli_select_db($conexion, $basededatos) or die("Error conexion al conectarse a la Base de datos");


//recuperar las variables
$logname = $_POST['logname']; //name="nombre"
$logemail = $_POST['logemail']; //name="correo"
$logpass = $_POST['logpass']; //name="password"
$flag = 0;
if (empty($_POST['logname'])) {
    $flag = 1;
    echo "<script>alert('Falta nombre de usuario');</script>";
}
if (empty($_POST['logemail'])) {
    $flag = 1;
    echo "<script>alert('Falta correo');</script>";
}
if (empty($_POST['logpass'])) {
    $flag = 1;
    echo "<script>alert('Falta contraseña');</script>";
}
if ($flag == 1) {
    exit("datos no correctamente <br><a href='iniciardoble.html'>volver</a>");
}

// Comprobar si el nombre de usuario o correo electrónico ya existen en la base de datos
$sql_username_exists = "SELECT *FROM datos WHERE logname = '$logname'";
$result = mysqli_query($conexion, $sql_username_exists);
if (mysqli_num_rows($result) > 0) {
    echo "<script>alert('Nombre de usuario ya registrado');</script>";
    exit("datos no correctamente <br><a href='iniciardoble.html'>volver</a>");
}
$sql_email_exists = "SELECT *FROM datos WHERE logemail = '$logemail'";
$result = mysqli_query($conexion, $sql_email_exists);
if (mysqli_num_rows($result) > 0) {
    echo "<script>alert('Correo Eléctronico ya registrado');</script>";
    exit("datos no correctamente <br><a href='iniciardoble.html'>volver</a>");
}

// Comprobar si alguno de los campos esta vacio
if (empty($_POST['logname']) || empty($_POST['logemail']) || empty($_POST['logpass'])) {
    echo "<script>alert('Faltan campos por llenar');</script>";
    exit("datos no correctamente <br><a href='iniciardoble.html'>volver</a>");
}
$logname = $_POST['logname'];
$logemail = $_POST['logemail'];
$logpass = $_POST['logpass'];
$sql = "INSERT INTO datos VALUES ('$logname','$logemail','$logpass')";
$ejecutar = mysqli_query($conexion, $sql);
if (!$ejecutar) {
    echo "huvo algun error"; //si algo sale mal mandanos este mensaje
} else {
    echo "<script>alert('Usuario creado exitosamente');</script><a href='iniciardoble.html'>volver</a>";
}
?>