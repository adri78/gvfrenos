<?php
/**
 * Created by PhpStorm.
 * User: Server64
 * Date: 27/10/2017
 * Time: 21:49
 */

  session_start();
  // error_reporting(0);
date_default_timezone_set('America/Argentina/Buenos_Aires');
$HOY = date("Y-m-d H:i:s");

include_once ('bd3.php');

  $Modo="";
   $OPT="";
if(isset($_GET["ID"])){ $ID=$_GET["ID"]; }
if(isset($_GET["T"])){ $Modo=$_GET["T"]; }



if(isset($_POST["ID"])){ $ID=$_POST["ID"];  }
if(isset($_POST["ID2"])){ $ID2=$_POST["ID2"]; }
if(isset($_POST["T"])){ $Modo=$_POST["T"]; }
if(isset($_POST["Titulo"])){ $Titulo= ( trim ( $_POST["Titulo"])); }
if(isset($_POST["Stitulo"])){ $Stitulo=( trim ( $_POST["Stitulo"])); }
if(isset($_POST["Detalle"])){ $Detalle=(trim ( $_POST["Detalle"])); }

if(isset($_POST["imagen"])) {$imagen=$_POST["imagen"] ;}else{ $imagen= "../WebMaq/NoImagen.png";}
if(isset($_POST["Link"])) { $Link=$_POST["Link"]; }else { $Link= "";}

if(isset($_POST["Codigo"])){ $Codigo=$_POST["Codigo"]; }
if(isset($_POST["Art"])){ $Art=$_POST["Art"]; }
if(isset($_POST["Precio"])){ $Precio=$_POST["Precio"]; }
if(isset($_POST["cat"])){ $cat=$_POST["cat"]; }
if(isset($_POST["SC"])){ $SC=$_POST["SC"]; }
if(isset($_POST["imagen"])){ $imagen=$_POST["imagen"]; }

if(isset($_POST["Cat"])){ $Cat=$_POST["Cat"]; }

 // *******************************  Maqeuesina ***************************** //
if ($Modo==1) { // ver articulo Borrar
	$sql= "DELETE FROM `t_marque` WHERE `id_maq`=".$ID.";";
	$segmento = mysqli_query($mysqli,$sql);

}// Fin Ver Articulo

if ($Modo==2) { // ver articulo Alta
	if ( $ID < 1 ) { // Nuevo
		$sql = "INSERT INTO `t_marque`(`Titulo`, `Stitulo`, `Detalle`, `imagen`, `Link`) VALUES ('" . $Titulo;
		$sql = $sql . "','" . $Stitulo . "','" . $Detalle . "','" . $imagen . "','" . $Link . "');";
	} else {// Actulizar
		$sql = "UPDATE `t_marque` SET `Titulo`='" . $Titulo . "',`Stitulo`='" . $Stitulo . "',`Detalle`='" . $Detalle . "',`imagen`='" . $imagen . "',`Link`='" . $Link . "' WHERE `id_maq`=" . $ID . " ;";
	}
	echo $Detalle."****".$sql;
	$segmento = mysqli_query($mysqli,$sql);

}//  Fin o Alta

if ($Modo==3) { // ver articulo X Codigo
		$sql = "SELECT `id_maq`, `Titulo`, `Stitulo`, `Detalle`, `imagen`, `Link` FROM `t_marque` WHERE `id_maq`='" . $ID . "';";

	$segmento = mysqli_query($mysqli, $sql);
	while ($row = mysqli_fetch_array($segmento)) {
		$ID = $row['id_maq'];
		$Titulo = $row["Titulo"];
		$Stitulo = $row["Stitulo"];
		$Detalle = $row["Detalle"];
		$imagen = $row["imagen"];
		$Link = $row["Link"];

		print "$ID|$Titulo|$Stitulo|$Detalle|$imagen|$Link";
	}

}
// ***********************************  Fin Marquesina ************************ //

// ************************************  ABM Categorias *** ***********************  //
if ($Modo==5) { // ver Rubros
	$sql = "DELETE FROM `t_Categorias` WHERE `idc`=" . $ID . ";";
	print $sql;
	$segmento = mysqli_query($mysqli,$sql);
}

if ($Modo==6) { // ver articulo Alta
	if ( $ID < 1 ) { // Nuevo
		$sql = "INSERT INTO `t_Categorias`( `Categoria`,`imagen`) VALUES ('" . $Titulo. "','".$imagen."');";
	} else {// Actulizar
		$sql = "UPDATE `t_Categorias` SET `Categoria`='" . $Titulo . "',`imagen`='".$imagen."' WHERE `idc`=" . $ID . " ;";
	}
	$segmento = mysqli_query($mysqli,$sql);
}//  Fin o Alta

if ($Modo==7) { // ver articulo X Codigo
	$sql = "SELECT `idc`, `Categoria`,`imagen` FROM `t_Categorias` WHERE `idc`='" . $ID . "';";

	$segmento = mysqli_query($mysqli, $sql);
	while ($row = mysqli_fetch_array($segmento)) {
		$ID = $row['idc'];
		$Categoria = $row['Categoria'];
        $imagen= $row['imagen'];
		print "$ID|$Categoria|$imagen";
	}
}

if ($Modo==71) { // ver articulo X Codigo sin imagen
    $sql = "SELECT `idc`, `Categoria` FROM `t_Categorias` WHERE `idc`='" . $ID . "';";

    $segmento = mysqli_query($mysqli, $sql);
    while ($row = mysqli_fetch_array($segmento)) {
        $ID = $row['idc'];
        $Categoria = $row['Categoria'];
        print "$ID|$Categoria";
    }
}

//
// ************************************  Fin  Categorias *** ***********************  //

// ************************************  ABM Marcas *** ***********************  //
if ($Modo==10) { // ver Rubros
	$sql = "DELETE FROM `t_marca` WHERE `idMarca`=" . $ID . ";";
	print $sql;
	$segmento = mysqli_query($mysqli,$sql);

}

if ($Modo==11) { // ver articulo Alta
	if ( $ID < 1 ) { // Nuevo
		$sql = "INSERT INTO `t_marca`( `Marca`, `Logo`) VALUES ('" . $Titulo. "','". $imagen ."');";
	} else {// Actulizar
		$sql = "UPDATE `t_marca` SET `Marca`='" . $Titulo . "',`Logo`='". $imagen ."' WHERE `idMarca`=" . $ID . " ;";
	}
	$segmento = mysqli_query($mysqli,$sql);
}//  Fin o Alta

if ($Modo==12) { // ver articulo X Codigo
	$sql = "SELECT `idMarca`, `Marca`, `Logo` FROM `t_marca` WHERE `idMarca`='" . $ID . "';";

	$segmento = mysqli_query($mysqli, $sql);
	while ($row = mysqli_fetch_array($segmento)) {
		$ID = $row['idMarca'];
		$Marca = $row['Marca'];
		$IMA = $row['Logo'];
		print "$ID|$Marca|$IMA";
	}
}
// ************************************  Fin  Marcas *** ***********************  //

// ************************************  ABM Zonas *** ***********************  //
if ($Modo==13) { // ver Zonas
	$sql = "DELETE FROM `t_zonas` WHERE `idz`=" . $ID . ";";
	print $sql;
	$segmento = mysqli_query($mysqli,$sql);
}

if ($Modo==14) { // ver zonas Alta
	if ( $ID < 1 ) { // Nuevo
		$sql = "INSERT INTO `t_zonas`(`Zonas`) VALUES ('" . $Titulo. "');";
	} else {// Actulizar
		$sql = "UPDATE `t_zonas` SET  `Zonas`='" . $Titulo . "' WHERE `idz`=" . $ID . " ;";
	}

	$segmento = mysqli_query($mysqli,$sql);
}//  Fin o Alta

if ($Modo==15) { // ver Zonas
	$sql = "SELECT `idz`, `Zonas` FROM `t_zonas` WHERE `idz`='" . $ID . "';";

	$segmento = mysqli_query($mysqli, $sql);
	while ($row = mysqli_fetch_array($segmento)) {
		$ID = $row['idz'];
		$Zonas = $row['Zonas'];
		print "$ID | $Zonas";
	}
}
// ************************************  Fin Zonas *** ***********************  //

/* * Ficha articulos  */
if ($Modo==20) { // ver articulo X id
    $sql = "SELECT `idA`, `Codigo`, `Art`, `Precio`, `cat`, `SC`, `imagen` FROM `tarticulo` WHERE `idA`='" . $ID . "';";
    $segmento = mysqli_query($mysqli, $sql);
    while ($row = mysqli_fetch_array($segmento)) {
        $ID = $row['idA'];
        $Codigo = $row['Codigo'];
        $Art = $row['Art'];
        $Precio = $row['Precio'];
        $cat= $row['cat'];
        $SC = $row['SC'];
        $imagen = $row['imagen'];

        print "$ID|$Codigo|$Art|$Precio|$cat|$SC|$imagen";
    }
}// ver articulo X id

if ($Modo==21) { // ver articulo Borrar
    $sql = "DELETE FROM `tarticulo` WHERE `idA`='" . $ID . "';";
    //print $sql;
    $segmento = mysqli_query($mysqli, $sql);
    } // Borrar ARTICULO

if ($Modo==22) { // Alta ARTICULO
    if ( $ID < 1 ) { // Nuevo
        $sql = "INSERT INTO `tarticulo`(`Codigo`, `Art`, `Precio`, `cat`, `SC`, `imagen`) VALUES ('" . $Codigo. "','". $Art . "','". $Precio . "','". $cat. "','". $SC. "','". $imagen ."');";
    } else {// Actulizar

        // `Precio`=[value-4],`cat`=[value-5],`SC`=[value-6],`imagen`=
        $sql = "UPDATE `tarticulo` SET  `Codigo`='" . $Codigo ."',`Art`='".$Art ."',`Precio` ='". $Precio ."',`cat`='". $cat."',`SC`='". $SC."',`imagen`='". $imagen."' WHERE `idA`=" . $ID . " ;";
    }
    print $sql;
    $segmento = mysqli_query($mysqli,$sql);
}//  Fin  Alta ARTICULO

/* ********* Fin ficha Articulos  ***************  */
if ($Modo==100) { // Marcas OPTION
    $sql = "SELECT `idMarca`, `Marca` FROM `t_marca` ORDER BY `Marca`;";
    $segmento = mysqli_query($mysqli, $sql);

    while ($row = mysqli_fetch_array($segmento)) {
        $OPT= $OPT."<option value='".$row['idMarca']."'>".$row['Marca']."</option>";
    }
    print $OPT;
}

if ($Modo==101) { // RUBRO OPTION
    $sql = "SELECT `idru`, `rubro` FROM `trubro` ORDER BY `rubro`;";
    $segmento = mysqli_query($mysqli, $sql);
    while ($row = mysqli_fetch_array($segmento)) {
        $OPT= $OPT."<option value='".$row['idru']."'>".$row['rubro']."</option>";
    }
    print $OPT;

}


// ************************************  ABM Sub Categorias *** ***********************  //
if ($Modo==51) { // ver Rubros
	$sql = "DELETE FROM `t_subCate` WHERE `idsc`=" . $ID . ";";
	print $sql;
	$segmento = mysqli_query($mysqli,$sql);
}

if ($Modo==52) { // ver articulo Alta
	if ( $ID < 1 ) { // Nuevo
		$sql = "INSERT INTO `t_subCate`( `SubCategoria`, `cid`) VALUES ('" . $Titulo. "','".$ID2."');";
	} else {// Actulizar
		$sql = "UPDATE `t_subCate` SET `SubCategoria`='" . $Titulo . "',`cid`='".$ID2."' WHERE `idsc`=" . $ID . " ;";
	}
	//print $sql;
	$segmento = mysqli_query($mysqli,$sql);
}//  Fin o Alta

if ($Modo==53) { // ver articulo X Codigo
	$sql = "SELECT `idsc`, `SubCategoria`, `cid` FROM `t_subCate` WHERE `idsc`='" . $ID . "';";
	$segmento = mysqli_query($mysqli, $sql);
	while ($row = mysqli_fetch_array($segmento)) {
		$ID = $row['idsc'];
		$Categoria = $row['SubCategoria'];
		$Subc = $row['cid'];
		print "$ID | $Categoria | $Subc";
	}
}
// ************************************  Fin  Sub Categorias *** ***********************  //

mysqli_close($mysqli);
?>