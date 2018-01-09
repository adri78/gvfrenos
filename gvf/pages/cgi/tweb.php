<?php

// error_reporting(0);
date_default_timezone_set('America/Argentina/Buenos_Aires');
$HOY = date("Y-m-d H:i:s");

include_once ('bd3.php');

$modo="";
$Total=0;
$C=0;
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

if ($modo==22) { // Tabla Categoria
    $sql = "SELECT `idc`, `Categoria` FROM `t_Categorias` ORDER BY `Categoria` ASC";
    $segmento = mysqli_query($mysqli, $sql );
    $tabla = "";
    while ( $row = mysqli_fetch_array( $segmento ) ) {
        $tabla = $tabla . '<tr data-id="' . $row["idc"]. '"><td> ' . $row["Categoria"] . '</td></tr>';
    }
    echo $tabla;
}
if ($modo==23) { // Tabla Campos Extras
    $sql = "SELECT `idCe`, `catIs`, `CampoE` FROM `t_camposext` WHERE `catIs`='".$C."' ORDER BY `CampoE` ASC";
    $segmento = mysqli_query($mysqli, $sql );
    $tabla = "";
    while ( $row = mysqli_fetch_array( $segmento ) ) {
        $tabla = $tabla . '<tr data-id="' . $row["idCe"]. '"><td>' . $row["CampoE"] . '<a
                                class="btn btn-danger borra2">Borrar</a> </td></tr>';
    }
    echo $tabla;
}

if ($modo==24) { // ver Lista cartegorias
    $sql = "SELECT `idc`, `Categoria` FROM `t_categorias` ;";
    $tmp="<option value=''> Todos </option>";
    $segmento = mysqli_query($mysqli, $sql);
    while ($row = mysqli_fetch_array($segmento)) {
        $tmp= $tmp."<option value='".$row['idc']."'>".$row['Categoria']."</option>";
    }
    print $tmp;
}

if ($modo==25) { // ver Lista cartegorias
        $sql = "SELECT `idsc`, `SubCategoria`, `cid` FROM `t_subCate` WHERE `cid`='".$C."';";
        $tmp="<option value=''> Todos </option>";
        $segmento = mysqli_query($mysqli, $sql);
        while ($row = mysqli_fetch_array($segmento)) {
            $tmp= $tmp."<option value='".$row['idsc']."'>".$row['SubCategoria']."</option>";
        }
    print $tmp;
}
if ($modo==26) { // ver Lista cartegorias
    $sql = "SELECT `idsc`, `SubCategoria`, `cid` FROM `t_subCate` ORDER BY `cid` ;";
    $tmp="";
    $segmento = mysqli_query($mysqli, $sql);
    $x=0;
    while ($row = mysqli_fetch_array($segmento)) {
        if($x==0){
            $tmp= $tmp.'<li class="active"><a data-toggle="tab" href="#'.$row['SubCategoria'].'">'.$row['SubCategoria'].'</a></li>';
        }else{
            $tmp= $tmp.'<li><a data-toggle="tab" href="#'.$row['SubCategoria'].'">'.$row['SubCategoria'].'</a></li>';
        }
        $x=$x+1;

    }
    print $tmp;
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


if ($modo==7) { // ver Lista Otros campos
    $sql = "SELECT `idCe`, `CampoE` FROM `t_camposext` WHERE `catIs`=".$C ;
    $segmento = mysqli_query($mysqli, $sql );
    $tabla = "<option value='' selected> - </opction>";
    while ( $row = mysqli_fetch_array( $segmento ) ) {
        $tabla = $tabla . '<option value="'.$row["idCe"].'" >'.$row["CampoE"] .'</option>';
    }
    echo $tabla;
}

/************************************************* Listado General tipo 1 ***********************************************/
if ($modo==100) { // Tabla general articulos
    $sql = "SELECT `idA`,`cat`, `SC` , `Codigo`, `Art`, `Precio`, (SELECT `Categoria`  FROM `t_categorias` WHERE `idc`=`cat`) as Categoria, (SELECT `SubCategoria` FROM `t_subcate` WHERE `idsc`=`SC`) as SubCat, `imagen` FROM `tarticulo` ORDER BY `cat`,`SC`, `Art`  ";
    $segmento = mysqli_query($mysqli, $sql );
    $tabla = "";
    while ( $row = mysqli_fetch_array( $segmento ) ) {
        $tabla = $tabla . '<tr data-id="'. $row["idA"].'" data-C="'.$row["cat"].'" data-SC="'.$row["SC"].'" ><td>'.$row["Codigo"] .'</td><td>'.$row["Art"] .'</td><td>'.$row["Precio"].'</td><td>'.$row["Categoria"] .'</td><td>'.$row["SubCat"] .'</td>';
        $tabla = $tabla . '<td><a class="btn-danger borra2">Borrar </a> </td></tr>';
    }
    echo $tabla;
}

/*************************************************** Fin Listado tipo 1 *************************************************/
/************************************************* Listado Tabla Categorias   ***********************************************/
if ($modo==101) { // Tabla X Categorias
    $sql = "SELECT `idc`, `Categoria` FROM `t_categorias` " ;
    $segmento = mysqli_query($mysqli, $sql);
    while ($row = mysqli_fetch_array($segmento)) {
       /* print "<h3>".$row["Categoria"]."</h3>"; */

        print'<table class="table table-bordered LArt" id="TT' . $row["idc"] . '"><thead  class="Titulo"><tr><th>Codigo</th><th>Articulo</th><th>Precio</th><th>Sub Cate</th>';
            /* Campos extras */
           $sql2 = "SELECT `CampoE` FROM `t_camposext` WHERE `catIs`='".$row["idc"]."' ORDER BY `idCe` ASC; " ;
           //print $sql2;
           $C = mysqli_query($mysqli, $sql2);
        while ($r= mysqli_fetch_array($C)) {
            print '<th>'.$r["CampoE"].'</th>';
        }
        print'</tr></thead><tbody id="LA'. $row["idc"] .'"></tbody></table>';
    }
    mysqli_close($mysqli);
}
/************************************************* Listado Tabla Categorias  ***********************************************/

if ($modo==102) { // ver Lista cartegorias

    $sql = "SELECT `idA`,`cat`, `SC` , `Codigo`, `Art`, `Precio`, (SELECT `SubCategoria` FROM `t_subcate` WHERE `idsc`=`SC`) as SubCat, `imagen` FROM `tarticulo`  where  `cat`=".$C."   ORDER BY  `SC`, `Art`";
    $segmento = mysqli_query($mysqli, $sql );
    $tabla = "";
    while ( $row = mysqli_fetch_array( $segmento ) ) {
        $tabla = $tabla . '<tr data-id="'. $row["idA"].'" data-SC="'.$row["SC"].'" ><td>'.$row["Codigo"] .'</td><td>'.$row["Art"] .'</td><td>'.$row["Precio"].'</td><td>'.$row["SubCat"] .'</td>';
        $tabla = $tabla . '<td><a class="btn-danger borra2">Borrar </a> </td></tr>';
    }
    echo $tabla;
}




?>