<?php

include_once('db/db_RH.php');
function cliente($Nomina, $contra){
    $con = new LocalConector();
    $conexion=$con->conectar();

    $consP="SELECT `IdNomina`,`Password` FROM `UsuariosEntrevistas` WHERE `IdNomina` = '$Nomina' and `Password` = '$contra";
    echo $consP;
}

?>