<?php
include_once('db.php');

$Email=$_POST['email'];
$Nomina=$_POST['nomina'];
$Solicitante=$_POST['solicitante'];
$Descripcion=$_POST['descripcion'];
$Cantidad=$_POST['cantidad'];
$Um=$_POST['um'];
$ImagenRegistro=$_POST['imagenRegistro'];
$Empresa=$_POST['empresa'];
$Portador=$_POST['portador'];
$Direccion=$_POST['direccion'];
$Tipo=$_POST['tipo'];
$Retorno=$_POST['retorno'];
$FechaRetorno=$_POST['fechaRetorno'];
$Causa=$_POST['causa'];
$Comentarios=$_POST['comentarios'];
$TipoBono=$_POST['tipoBono'];
$Area=$_POST['area'];
$Imagen=$_POST['imagen'];
$CorreoEncargado=$_POST['correoEncargado'];

registroUsu($Email,$Nomina,$Solicitante,$Descripcion,$Cantidad,$Um,$ImagenRegistro,$Empresa,$Portador,$Direccion,$Tipo,$Retorno,$FechaRetorno,$Causa,$Comentarios,$Imagen,$TipoBono,$Area,$CorreoEncargado);

function registroUsu($Email,$Nomina,$Solicitante,$Descripcion,$Cantidad,$Um,$ImagenRegistro,$Empresa,$Portador,$Direccion,$Tipo,$Retorno,$FechaRetorno,$Causa,$Comentarios,$Imagen,$TipoBono,$Area,$CorreoEncargado){

    $con = new LocalConector();
    $conex=$con->conectar();

    $Object = new DateTime();
    $Object->setTimezone(new DateTimeZone('America/Denver'));
    $DateAndTime = $Object->format("Y/m/d h:i:s");

    $Descripcion = str_replace(array('"', "'","/",'\\',"\n","\r"), '', $Descripcion);
    $Empresa = str_replace(array('"', "'","/",'\\',"\n","\r"), '', $Empresa);
    $Direccion = str_replace(array('"', "'","/",'\\',"\n","\r"), '', $Direccion);
    $Causa = str_replace(array('"', "'","/",'\\',"\n","\r"), '', $Causa);
    $Comentarios = str_replace(array('"', "'","/",'\\',"\n","\r"), '', $Comentarios);
    $ImagenRegistro = str_replace(array('"', "'","/",'\\',"\n","\r"," ", "#"), '', $ImagenRegistro);

    $insertRegistro= "INSERT INTO `BitacoraBonosSalida`(`NominaSolicitante`, `NombreSolicitante`, `Descripcion`, `Cantidad`, `UnidadMedida`, `Empresa`, `NombreExterno`, `Direccion`, `FechaRegistro`, `TipoSalida`, `FechaRetorno`, `Causa`, `Comentarios`, `ImagenRegistro`, `Estatus`, `TipoRetorno`,`CorreoSolicitante`,`ConfirmacionControlling`,`ConfirmacionEhs`,`ConfirmacionPlant`,`TipoBono`,`Area`,`CorreoEncargado`) VALUES ('$Nomina','$Solicitante','$Descripcion','$Cantidad','$Um','$Empresa','$Portador','$Direccion','$DateAndTime','$Tipo','$FechaRetorno','$Causa','$Comentarios','$ImagenRegistro',1,'$Retorno','$Email',1,1,1,'$TipoBono','$Area','$CorreoEncargado')";

    $rsinsertUsu=mysqli_query($conex,$insertRegistro);
    mysqli_close($conex);

    if(!$rsinsertUsu){
        echo "0";
    }else{
        return 1;
    }
}

?>