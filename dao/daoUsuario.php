<?php

include_once('db/db_RH.php');
function cliente($Nomina, $contra){
    $con = new LocalConector();
    $conexion=$con->conectar();

    $consP="SELECT `IdNomina`,`Password` FROM `UsuariosEntrevistas` WHERE `IdNomina` = '$Nomina' and `Password` = '$contra";
    $rsconsPro=mysqli_query($conexion,$consP);
    mysqli_close($conexion);

    if(mysqli_num_rows($rsconsPro) == 1){
        return 1;
    }
    else{
        return 0;
    }
}

?>