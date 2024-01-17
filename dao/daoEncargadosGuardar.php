<?php
include_once('db/db_RH.php');

$Id=$_POST['id'];
$APU=$_POST['apu'];
$Supervisor=$_POST['supervisor'];
$ShiftLeader=$_POST['shiftLeader'];

actualizarVacas($Id,$APU,$Supervisor,$ShiftLeader);

function actualizarVacas($Id,$APU,$Supervisor,$ShiftLeader) {
    $con = new LocalConector();
    $conex = $con->conectar();

    echo "UPDATE `Encargados` SET APU`='$APU',`Supervisor`='$Supervisor',`ShiftLeader`='$ShiftLeader' WHERE `IdEncargado` = '$Id'";
    echo "INSERT INTO `Encargados`(`APU`, `Supervisor`, `ShiftLeader`) VALUES ('$APU','$Supervisor','$ShiftLeader')";


    mysqli_close($conex);

    return $result;
}

?>