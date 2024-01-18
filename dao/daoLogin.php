<?php

require 'daoUsuario.php';


if (isset($_POST['verificar'])) {

    session_start();
    $Nomina = $_POST['txtNomina'];
    $contra = $_POST['txtPassword'];

}

if (isset($_POST['btnSalir'])) {
    session_start();
    session_destroy();
    echo "<script>alert('Acceso Correcto')</script>";
    echo "<META HTTP-EQUIV='REFRESH' CONTENT='1; URL=../Historico.html'>";
}

if (isset($_POST['btnRegistro'])) {
    echo "<script>alert('Acceso Correcto')</script>";
}


?>