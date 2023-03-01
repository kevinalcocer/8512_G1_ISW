<?php
session_start();
$logemail = $_POST['logemail'];
$logpass = $_POST['logpass'];
$_SESSION['logemail'] = $logemail;

$conexion=mysqli_connect( "localhost", "root", "", "formulario1");

$consulta = "SELECT*FROM datos where logemail='$logemail' and logpass='$logpass'";
$resultado = mysqli_query($conexion, $consulta);

$filas = mysqli_num_rows($resultado);

if($filas){
    header("location:Pagina2.html");
}else{
    include("iniciardoble.html");
    echo "<script>alert('ERROR EN LA VERIFICACION, Contraseña o correo erroneos');</script>";
}
if (empty($logemail)) {
    echo "<script>alert('Falta correo electrónico');</script>";
}
if (empty($logpass)) {
    echo "<script>alert('Falta contraseña');</script>";
}
mysqli_free_result($resultado);
mysqli_close($conexion);
?>

