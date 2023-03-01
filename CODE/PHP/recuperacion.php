<?php
include ('db.php');

$correo = $_POST['txtcorreo'];

$queryusuario = mysqli_query ($conn,"SELECT * FROM login WHERE correo = '$correo'");
$nr  = mysqli_num_rows($queryusuario);
if ( $nr == 1)
{
    $mostrar = mysqli_fetch_array($queryusuario);
    $enviarpass= $mostrar['pass'];

    $paracorreo = $correo;
    $titulo ="Recuperar contraseña";
    $mensaje= " Tu contraseña es :" .$enciarcontr;
    $tucorreo= "From: xxxx466@gmail.com";

    if (mail ($paracorreo,$titulo,$mensaje,$tucorreo))
    {
        echo " <script> alert ('Contraseña enviada'); window.location= 'recuperar.html' </script>";

    }else
    {
        echo "<script> alert ('Error') ; windows.location= 'recuperar.html' </script>";

    }
    else
    {
        echo " <script> alert ('Este correo no existe '); window.location= 'recuperar.html' </script>";

    }

}

?>