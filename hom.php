<?php
/**
 * Created by PhpStorm.
 * User: Server64
 * Date: 11/11/2017
 * Time: 23:26
 */

include_once ('gvf/pages/cgi/bd3.php');
$X=0;
if(isset($_GET["A"])){ $X=intval($_GET["A"]);}
$Y=0;

	$SQL="SELECT `idc`, `Categoria`, `imagen` FROM `t_categorias` WHERE `idc`=". $X .";" ;

//echo $SQL;

	$segmento =  mysqli_query($mysqli,  $SQL);

	while ($row = mysqli_fetch_array($segmento)) {
		echo '<div id="slidingDiv" class="toggleDiv row-fluid single-project">';
		echo '<div class="span6"><img src="' . substr( $row['imagen'], 6 ) . '" alt="' . $row['Categoria'] . '" /></div>';
	 	echo '<div class="span6"><div class="project-description"><div class="project-title clearfix">';
		echo '<h3>' . $row['Categoria'] . '</h3><span class="show_hide close"><i class="icon-cancel"></i></span></div>';
        $Sql2="SELECT `idsc`, `SubCategoria`, `cid` FROM `t_subcate` WHERE `cid`=". $X .";";
        //echo $Sql2;

        $seg2 =  mysqli_query($mysqli,  $Sql2);
		while ($row = mysqli_fetch_array($seg2)) {
            echo '<div><span> </span>' . $row['SubCategoria'] . '</div>';

        }
        // mysqli_free_result($seg2);
		echo '<div> <br><br>  <a href="#" class="btn btn-lg btn-block btn-warning"> Vea la lista completa </a> </div>';
		echo '</div></div></div>';
	}
   mysqli_free_result($segmento);
   mysqli_close($mysqli);
?>

