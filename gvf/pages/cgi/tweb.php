<?php

// error_reporting(0);
date_default_timezone_set('America/Argentina/Buenos_Aires');
$HOY = date("Y-m-d H:i:s");

include_once ('bd3.php');

$modo="";
$Total=0;
$x=0;

if(isset($_GET["T"])){ $modo=$_GET["T"]; }
if(isset($_GET["C"])){ $C=$_GET["C"];}
if(isset($_GET["D"])){ $D=$_GET["D"]; }
if(isset($_GET["desde"])){ $Desde=$_GET["desde"] ." 00:00:00" ; }
if(isset($_GET["hasta"])){ $Hasta=$_GET["hasta"]." 23:59:59"  ; }


if ($modo==1) { // Tabla maquesina
	$sql = "SELECT `id_maq`, `Titulo`, `Stitulo`, `Detalle`, `imagen`, `Link` FROM `t_marque` ORDER BY `id_maq`";
	$segmento = mysqli_query( $mysqli, $sql );
	$tabla = "";
	while ( $row = mysqli_fetch_array( $segmento ) ) {
		$tabla = $tabla . '<tr data-id="' . $row['id_maq']. '"> <td><img src="../WebMaq/' . $row["imagen"] . '"></td><td><h3>' . $row["Titulo"] . '</h3></td><td> <a
                                class="btn btn-danger borra">Borrar</a> </td></tr>';
	}

	echo $tabla;
}

if ($modo==2) { // Tabla Categoria
	$sql = "SELECT `idc`, `Categoria` FROM `t_Categorias` ORDER BY `Categoria` ASC";
	$segmento = mysqli_query($mysqli, $sql );
	$tabla = "";
	while ( $row = mysqli_fetch_array( $segmento ) ) {
		$tabla = $tabla . '<tr data-id="' . $row["idc"]. '"> <td> ' . $row["Categoria"] . '  <a
                                class="btn btn-danger borra2">Borrar</a> </td></tr>';
	}
	echo $tabla;
}

if ($modo==21) { // Tabla SubCategoria
	$sql = "SELECT `idsc`, `SubCategoria`, `cid` FROM `t_subCate` WHERE `cid`='".$C."' ORDER BY `SubCategoria` ASC";
	$segmento = mysqli_query($mysqli, $sql );
	$tabla = "";
	while ( $row = mysqli_fetch_array( $segmento ) ) {
		$tabla = $tabla . '<tr data-id="' . $row["idsc"]. '"> <td> ' . $row["SubCategoria"] . '  <a
                                class="btn btn-danger borra2">Borrar</a> </td></tr>';
	}
	echo $tabla;
}



if ($modo==3) { // Tabla marca
	$sql = "SELECT `idMarca`, `Marca`, `Logo` FROM `t_marca`ORDER BY `Marca` ASC";
	$segmento = mysqli_query( $mysqli, $sql );
	$tabla = "";
	while ( $row = mysqli_fetch_array( $segmento ) ) {
		$tabla = $tabla . '<tr data-id="' . $row["idMarca"]. '"><td><img src="' . $row["Logo"] . '" alt="' . $row["Marca"] . '"></td>   <td> ' . $row["Marca"] . '</td> <td> <a
                                class="btn btn-danger borra3">Borrar</a> </td></tr>';
	}

	echo $tabla;
}

if ($modo==4) { // Tabla Articulo
    $sql = "SELECT `idArt`, `Articulo`, `Codigo`, `Oferta`, `Visible`, `Precio`, `Logo`, ( SELECT `rubro` FROM `trubro` WHERE `idru`=`RubroID`) as rubro, (SELECT `Marca` FROM `t_marca` WHERE `idMarca`=`MarcaID`) as marca FROM `t_artweb` ORDER BY `Articulo` ASC";
    $segmento = mysqli_query( $mysqli, $sql );
    $tabla = "";
    while ( $row = mysqli_fetch_array( $segmento ) ) {

        $tabla = $tabla .  '<tr data-id="'.$row["idArt"].'"> <td><img src="'.$row["Logo"].'" ></td><td>' . $row["marca"] . '</td><td>' . $row["rubro"] . ' </td><td>' . $row["Articulo"] . '</td><td>'.$row["Precio"].'</td><td><a class="btn btn-danger B"> Eliminar</a></td></tr>';
        
    }

    echo $tabla."<script> DetaArt(); </script>";
}

if ($modo==5) { // Tabla Zonas
	$sql = "SELECT `idz`, `Zonas` FROM `t_zonas` ORDER BY `Zonas` ASC";
	$segmento = mysqli_query($mysqli, $sql );
	$tabla = "";
	while ( $row = mysqli_fetch_array( $segmento ) ) {
		$tabla = $tabla . '<tr data-id="' . $row["idz"]. '"> <td> ' . $row["Zonas"] . '  <a
                                class="btn btn-danger borra2">Borrar</a> </td></tr>';
	}
	echo $tabla;
}

if ($modo==6) { // Tabla Clientes
	$sql = "SELECT `idCli`, `Cliente`, `Domicilio`, `Tel`, (SELECT `Zonas` FROM `t_zonas` WHERE `idz`=`ZonaId`) as Zona, `NComercial`, `ListaId` FROM `t_cliente` ; ";
	$segmento = mysqli_query($mysqli, $sql );
	$tabla = "";
	while ( $row = mysqli_fetch_array( $segmento ) ) {
		$tabla = $tabla . '<tr data-id="'. $row["idCli"].'"><td>'.$row["Cliente"] .'</td><td>'.$row["NComercial"] .'</td><td>'.$row["Zona"] .' - '.$row["Domicilio"] .'</td><td>'.$row["Tel"] .'</td><td>'.$row["ListaId"] .'</td>';
		$tabla = $tabla . '<td><a class="btn btn-danger borra2">Borrar </a> </td></tr>';
	}
	echo $tabla;
}

mysqli_close($mysqli);
?>