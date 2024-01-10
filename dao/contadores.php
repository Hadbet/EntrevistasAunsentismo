<?php

include_once('db/db_RH.php');

$Ruta = $_GET['ruta'];
$APU = $_GET['APU'];

Contador($Ruta,$APU);

function Contador($Ruta,$APU)
{
    $con = new LocalConector();
    $conex = $con->conectar();

    $APU = 'APU '.$APU;

    if ($Ruta == 1){
        $query = "SELECT COUNT(`IdEntrevista`) as contador, `Encargado` FROM `EntrevistasAusentismo` GROUP BY `Encargado`;";
    }

    if ($Ruta == 2){
        $query = "SELECT COUNT(`IdEntrevista`) as contador, `ShiftLeader` FROM `EntrevistasAusentismo` where `Encargado` like '%$APU%' GROUP BY `ShiftLeader`;";
    }

    if ($Ruta == 3){
        $query = "SELECT COUNT(`IdEntrevista`) as contador, `TipoAusencia` FROM `EntrevistasAusentismo` where `Encargado` like '%$APU%' GROUP BY `TipoAusencia`;";
    }

    if ($Ruta == 4){
        $query = "SELECT COUNT(`IdEntrevista`) as contador, `Area` FROM `EntrevistasAusentismo` where `Encargado` like '%$APU%' GROUP BY `Area`;";
    }

    if ($Ruta == 5){
        $query = "SELECT COUNT(`IdEntrevista`) as contador, `NominaEntrevistado` FROM `EntrevistasAusentismo` where `Encargado` like '%$APU%' GROUP BY `NominaEntrevistado`;";
    }

    if ($Ruta == 6){
        $APU = str_replace("APU ", "", $APU);
        $query = "SELECT COUNT(`IdEntrevista`) as contador,`FechaAusentismo` FROM `EntrevistasAusentismo` WHERE `NominaEntrevistado` = '$APU';";
    }

    $datos = mysqli_query($conex, $query);

    $resultado = mysqli_fetch_all($datos, MYSQLI_ASSOC);
    echo json_encode(array("data" => $resultado));
}


?>