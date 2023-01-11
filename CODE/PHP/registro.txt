
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="estilos.css">
    <title>registación</title>
</head>
<?php 
//Incluir el registro de la base de datos
include_once('db.php');

//Recibe datos del formulario
$nombres=$_POST['nombres'];
$apellidos=$_POST['apellidos'];
$cedula=$_POST['cedula'];
$correo=$_POST['correo'];
$telefono=$_POST['telefono'];
$usuario=$_POST['usuario'];
$clave=$_POST['clave'];

$nombresmascota=$_POST['nombresmascota'];
$edadmascota=$_POST['edadmascota'];
$sexomascota=$_POST['sexomascota'];
$razamascota=$_POST['razamascota'];
$tamanomascota=$_POST['tamanomascota'];
$vacunamascota=$_POST['vacunamascota'];



echo "<b>GRACIAS POR SU REGISTRO,<br>
<br>SUS DATOS SON: <p><br>";
echo "$nombres $apellidos,
<br> Correo electrónico registrado es $correo,
<br> Teléfono agregado $telefono,
<br> Su nombre de usuario es $usuario,
<br>Su clave es :*****, <br>

<b><br>LOS DATOS DE LA MASCOTA SON: <br><br>
Nombre de la Mascota $nombresmascota, 
<br>La edad que tiene su mascota es $edadmascota,
<br> El genero al que pertenece su mascota = $sexomascota, 
<br> La raza de su mascota es = $razamascota,
<br>Su mascota es de un tamaño = $tamanomascota,
<br>La mascota esta vacunada = $vacunamascota";



$conectar=conn(); 
$sql="INSERT INTO usuarios (usuario,nombres, apellidos, correo, telefono, clave)
VALUES ('$usuario','$nombres','$apellidos','$correo','$telefono','$clave')";
$resul = mysqli_query($conectar , $sql)or trigger_error("Query failed! SQL-Error: ".mysqli_error($conectar),E_USER_ERROR);

echo "$sql";

?>
<body>
 
</body>

</html>