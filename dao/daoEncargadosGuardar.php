<?php
include_once('db/db_RH.php');

$Id=$_GET['id'];
$APU=$_GET['apu'];
$Supervisor=$_GET['supervisor'];
$ShiftLeader=$_GET['shiftLeader'];

actualizarVacas($Id,$APU,$Supervisor,$ShiftLeader);

function actualizarVacas($Id,$APU,$Supervisor,$ShiftLeader) {
    $con = new LocalConector();
    $conex = $con->conectar();

    echo "UPDATE `Encargados` SET APU`='$APU',`Supervisor`='$Supervisor',`ShiftLeader`='$ShiftLeader' WHERE `IdEncargado` = '$Id'";
    echo "INSERT INTO `Encargados`(`APU`, `Supervisor`, `ShiftLeader`) VALUES ('$APU','$Supervisor','$ShiftLeader')";


    mysqli_close($conex);

    //return $result;
}

?>