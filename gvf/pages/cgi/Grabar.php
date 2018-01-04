<?php
/**
 * Created by PhpStorm.
 * User: Server64
 * Date: 3/1/2018
 * Time: 19:55
 */
// d={M:10,NComercial:NComercial,FDire:FDire,ID:id,Tel:tel,FZona:FZona,Cliente:cliente,Obs:nota,Email:email,Lista:lista,User:user,Pass:pass};

session_start();
// error_reporting(0);
date_default_timezone_set('America/Argentina/Buenos_Aires');
$HOY = date("Y-m-d H:i:s");
include_once ('bd3.php');

$modo="";
$M=0;

if(isset($_POST["ID"])){ $ID=$_POST["ID"];  }
if(isset($_POST["M"])){ $M=$_POST["M"]; }
if(isset($_POST["NComercial"])){ $NComercial= strtoupper ( trim ( $_POST["NComercial"])); }
if(isset($_POST["User"])){ $User=strtoupper ( trim ( $_POST["User"])); }
if(isset($_POST["Pass"])){ $Pass= md5(strtoupper ( trim ( $_POST["Pass"]))); }
if(isset($_POST["Cliente"])){ $Cliente=strtoupper ( trim ( $_POST["Cliente"])); }
if(isset($_POST["FDire"])){ $FDire=strtoupper ( trim ( $_POST["FDire"])); }
if(isset($_POST["Obs"])){ $Obs=$_POST["Obs"]; }
if(isset($_POST["Tel"])){ $Tel=$_POST["Tel"]; }
if(isset($_POST["FZona"])){ $FZona=$_POST["FZona"]; }
if(isset($_POST["Email"])){ $Email=$_POST["Email"]; }
if(isset($_POST["Lista"])){ $Lista=$_POST["Lista"]; }

if(isset($_POST["Campo"])){ $Campo=strtoupper ( trim ( $_POST["Campo"])); }
if(isset($_POST["idc"])){ $idc=$_POST["idc"]; }


/*if(isset($_POST["S1"])){ $S1=$_POST["S1"]; }
if(isset($_POST["S2"])){ $S2=$_POST["S2"]; }
if(isset($_POST["S3"])){ $S3=$_POST["S3"]; }
if(isset($_POST["Cat"])){ $Cat=$_POST["Cat"]; }*/

// $M  $NComercial  $FDire   $ID  $Tel  $FZona  $Cliente  $Obs   $Email  $Lista $User $Pass
$sql="";
 /**********************************************  Clientes ***************************************/
if ($M==1){  //Alta
    if($ID >0){
        $sql="UPDATE `t_cliente` SET `Cliente`='".$Cliente."',`Domicilio`='".$FDire."',`Email`='".$Email."',`Tel`='".$Tel ;
        $sql=$sql."',`ZonaId`='".$FZona."',`NComercial`='".$NComercial."',`ListaId`='".$Lista."',`visible`='1',`user`='".$User;

        if($Pass !=""){  $sql=$sql."',`pass`='".$Pass;}

        $sql=$sql."',`Nota`='".$Obs."' WHERE `idCli`=".$ID.";";
    }else{
        $sql="INSERT INTO `t_cliente`(`Cliente`, `Domicilio`, `Email`, `Tel`, `ZonaId`, `NComercial`, `ListaId`, `visible`, `user`, `pass`, `Nota`) VALUES (" ;
        $sql=$sql."'".$Cliente."','".$FDire."','".$Email."','".$Tel."','".$FZona."','".$NComercial."','".$Lista ."','1','".$User."','".$Pass ."','".$Obs."'); " ;
    }
    echo $sql;
    $segmento = mysqli_query($mysqli,$sql);
} //Alta

if ($M==2) { // borrar
    $sql="DELETE FROM `t_cliente` WHERE `idCli`=".$ID;
    $segmento = mysqli_query($mysqli,$sql);
}// borrar

if ($M==3){ // mostrar x id
    $sql="SELECT `idCli`, `Cliente`, `Domicilio`, `Email`, `Tel`, `ZonaId`, `NComercial`, `ListaId`, `visible`, `user`, `Nota` FROM `t_cliente` WHERE `idCli`=".$ID;
    $segmento = mysqli_query($mysqli,$sql);
    while ( $row = mysqli_fetch_array( $segmento ) ) {
        print $row["idCli"]."|".$row["Cliente"]."|".$row["Domicilio"]."|".$row["Email"]."|".$row["Tel"]."|".$row["ZonaId"]."|".$row["NComercial"]."|".$row["ListaId"]."|".$row["user"] ;
    }
}// mostrar x id
/********************************************** Fin Clientes ***************************************/

/********************************************  Campos Extras *********************************************** */
if ($M==11){  //Alta
    if($ID >0){
        $sql="UPDATE `t_camposext` SET `catIs`='".$idc."',`CampoE`='".$Campo."' WHERE `idCe`=".$ID.";" ;
    }else{
        $sql="INSERT INTO `t_camposext`( `catIs`, `CampoE`) VALUES ('".$idc."','".$Campo."')" ;
    }
    echo $sql;
    $segmento = mysqli_query($mysqli,$sql);
} //Alta


if ($M==12) { // borrar
    $sql="DELETE FROM `t_camposext` WHERE `idCe`=".$ID;
    $segmento = mysqli_query($mysqli,$sql);
}// borrar

if ($M==13){ // mostrar x id
    $sql="SELECT `idCe`, `catIs`, `CampoE` FROM `t_camposext` WHERE `idCe`=".$ID;
    $segmento = mysqli_query($mysqli,$sql);
    while ( $row = mysqli_fetch_array( $segmento ) ) {
        print $row["idCe"]."|".$row["catIs"]."|".$row["CampoE"] ;
    }
}// mostrar x id

if ($M==14){ // mostrar x id de Categoria
    $sql="SELECT `idCe`, `catIs`, `CampoE` FROM `t_camposext` WHERE `catIs`=".$ID;
    $segmento = mysqli_query($mysqli,$sql);
    while ( $row = mysqli_fetch_array( $segmento ) ) {
        print $row["idCe"]."|".$row["catIs"]."|".$row["CampoE"] ;
    }
}// mostrar x id de Categoria