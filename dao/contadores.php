<?php

include_once('db/db_RH.php');

$Ruta = $_GET['ruta'];
Contador($Ruta);

function Contador($Ruta)
{
    $con = new LocalConector();
    $conex = $con->conectar();

    if ($Ruta == 1){
        $query = "SELECT COUNT(`IdEntrevista`) as contador, `Encargado` FROM `EntrevistasAusentismo` GROUP BY `Encargado`;";
    }

    if ($Ruta == 2){
        $query = "SELECT COUNT(`IdEntrevista`) as contador, `ShiftLeader` FROM `EntrevistasAusentismo` GROUP BY `ShiftLeader`;";
    }

    if ($Ruta == 3){
        $query = "SELECT COUNT(`IdEntrevista`) as contador, `TipoAusencia` FROM `EntrevistasAusentismo` GROUP BY `TipoAusencia`;";
    }

    if ($Ruta == 4){
        $query = "SELECT COUNT(`IdEntrevista`) as contador, `Area` FROM `EntrevistasAusentismo` GROUP BY `Area`;";
    }
    $datos = mysqli_query($conex, $query);

    $resultado = mysqli_fetch_all($datos, MYSQLI_ASSOC);
    echo json_encode(array("data" => $resultado));
}


?>