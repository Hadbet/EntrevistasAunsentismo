<?php

require 'daoUsuario.php';


if (isset($_POST['verificar'])) {

    session_start();
    $Nomina = $_POST['txtNomina'];
    $contra = $_POST['txtPassword'];

    if (strlen($Nomina) == 1) {
        $Nomina = "0000000" . $Nomina;
    }
    if (strlen($Nomina) == 2) {
        $Nomina = "000000" . $Nomina;
    }
    if (strlen($Nomina) == 3) {
        $Nomina = "00000" . $Nomina;
    }
    if (strlen($Nomina) == 4) {
        $Nomina = "0000" . $Nomina;
    }
    if (strlen($Nomina) == 5) {
        $Nomina = "000" . $Nomina;
    }
    if (strlen($Nomina) == 6) {
        $Nomina = "00" . $Nomina;
    }
    if (strlen($Nomina) == 7) {
        $Nomina = "0" . $Nomina;
    }

    $statusLogin = obtenerRol($Nomina, $contra);

    if ($statusLogin != null) {
        $_SESSION['nomina'] = $Nomina;
        $_SESSION['rol'] = $statusLogin;
        echo "<META HTTP-EQUIV='REFRESH' CONTENT='1; URL=../index.php'>";
    } else if ($statusLogin == 0) {
        echo "<script>alert('Acceso Denegado')</script>";
        echo "<META HTTP-EQUIV='REFRESH' CONTENT='1; URL=../login.html'>";
    }
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