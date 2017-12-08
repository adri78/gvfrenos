<?php
$P="";
$A="";
if(isset($_GET["P"])){ $P= trim($_GET["P"]);}
if(isset($_GET["A"])){ $A= parseInt($_GET["A"]);}
?>

<!DOCTYPE html>
<html>

<head>
	<meta charset="UTF-8">
	<title>Listado de Productos</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css">

	<link rel='stylesheet prefetch' href='http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css'>
	<link href="https://fonts.googleapis.com/css?family=Indie+Flower|Slabo+27px" rel="stylesheet">

	<style>
		body{ background:  #03A9F4;}
		.glyphicon {
			margin-right: 5px;
		}
		input:focus{
			background: rgb(3, 247, 254);
			border: 2px solid royalblue;
		}
		.thumbnail {
			margin-bottom: 20px;
			padding: 0px;
			-webkit-border-radius: 0px;
			-moz-border-radius: 0px;
			border-radius: 0px;
		}

		.item.list-group-item {
			float: none;
			width: 100%;
			background-color: #fff;
			margin-bottom: 10px;
		}

		.item.list-group-item:nth-of-type(odd):hover,
		.item.list-group-item:hover {
			background: #428bca;
		}

		.item.list-group-item .list-group-image {
			margin-right: 10px;
		}

		.item.list-group-item .thumbnail {
			margin-bottom: 0px;
		}

		.item.list-group-item .caption {
			padding: 9px 9px 0px 9px;
		}

		.item.list-group-item:nth-of-type(odd) {
			background: #eeeeee;
		}

		.item.list-group-item:before,
		.item.list-group-item:after {
			display: table;
			content: " ";
		}

		.item.list-group-item img {
			float: left;
		}

		.item.list-group-item:after {
			clear: both;
		}

		.list-group-item-text {
			margin: 0 0 11px;
		}

		.list-group-image{
			height: 224px !important;
			width: 258px !important;
		}
		#MARCA,#Categoria {
			line-height: 18px;
		}
		h4{
			font-family: 'Slabo 27px', serif;
		}
		.NV{ display: none;}
		#Articulos{
			min-height: 95vh;
			background: #ffffff;
			margin-left: 0.3em;
			margin-right: 0.3em;
			/* border-radius: 10px;*/
			margin-top: -20px;
		}
		.btn2{
			text-decoration: none;
			background: black;
			color: white;
			vertical-align: -webkit-baseline-middle;
			padding: 0.5em;
			border: 1px solid black;
			border-radius: 5px;
		}
		.btn2:hover{
			text-decoration: none;
			background: #0695fe;
			color: #060606;
		}


	</style>


	<link href="https://fonts.googleapis.com/css?family=Abril+Fatface|Roboto+Slab|Rozha+One|Timmana|Vollkorn+SC" rel="stylesheet">

	<script src="https://cdnjs.cloudflare.com/ajax/libs/prefixfree/1.0.7/prefixfree.min.js"></script>

</head>

<body>
<div class="container">
	<div class="well well-sm">   <h2 style="text-align: center;text-decoration: underline;font-family: 'Indie Flower', cursive;">Listado de articulos</h2>
		<strong  >

			<div class="btn-group" style="float: right;">
				<a href="../index.php" class="btn2">Menu</a>
				<a href="#" id="list" class="btn btn-default btn-sm"><span class="glyphicon glyphicon-th-list">
                    </span>Lista</a> <a href="#" id="grid" class="btn btn-default btn-sm"><span class="glyphicon glyphicon-th"></span>Ficha</a>
			</div>

			<div class="col-md-8 form-group input-group">
				<span class="input-group-addon">Buscar:</span>
				<input type="text" class="form-control"  placeholder="Buscar" id="Buscar"  value="<?php echo $P ; ?>" autocomplete="off" onkeyup="Buscar()">
			</div>
		</strong>
	</div>

	<div id="Articulos" class="row NV" >
		<!-- **************************************************************************************************** -->
			

		<!-- **************************************************************************************************** -->
		<hr>
	</div>




	<div id="products" class="row list-group">

		<?php
		include_once ('../gvf/pages/cgi/bd3.php');
		$X=0;

		$SQL="SELECT `idArt`,`Articulo`,`Codigo`,`Oferta`,`Visible`,`Precio`,`Detalle`, `Logo`, (SELECT `rubro` FROM `trubro` WHERE `idru`=`RubroID`) AS `rubro`,(SELECT `Marca` FROM `t_marca` WHERE `idMarca`= `MarcaID`) AS `Marca` FROM `t_artweb` ORDER BY `rubro`,`Marca`,`Codigo` DESC ";

		$segmento =  mysqli_query($mysqli,  $SQL);

		while ($row = mysqli_fetch_array($segmento)) {


			echo '<div class="item  col-md-4 col-lg-4 X"><div class="thumbnail"><img class="group list-group-image" src="../' . substr( $row['Logo'], 6 ) . '" alt="' . $row['Articulo'] . '" />';
			echo '<p class="Y NV">' .strtoupper($row['Articulo'] ." | ".$row['Marca']." | ". $row['rubro']) . ' </p>';

			echo '<div class="caption"><h4 class="group inner list-group-item-heading">' . $row['Articulo'] . '</h4>' ;
			echo '<div><span>Codigo: </span>' . $row['Codigo'] . '</div><div><span>Marca: </span>' . $row['Marca'] . '</div> <div><span>Categoria: </span>' . $row['rubro'] . '</div>';
			echo '<p class="group inner list-group-item-text">';
			// Product description... Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.</p>
			echo '<div class="row">';
			echo '<div class="col-xs-12 col-md-6"><p class="lead">$  ' . (($row['Precio']>0)? $row['Precio']:"Consultar" ). ' </p></div><div class="col-xs-12 col-md-6">';
			echo '<a class="btn btn-info" href="#"> Ficha </a></div></div></div></div> </div>';

		}
		mysqli_free_result($segmento);
		mysqli_close($mysqli);
		?>

	</div>
</div>
<script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
<script src='http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js'></script>
<script>
    function Buscar() {
        var texto= document.getElementById('Buscar').value.toUpperCase().trim();
        var x= document.querySelectorAll('.X');
        var y= document.querySelectorAll('.Y');

        ListaArt();

        if (texto.length <2){

            for (let i = 0; i < x.length; ++i) { x[i].style.display = "block";}
        }else{
            for (let i = 0; i < x.length; ++i) {
                x[i].style.display = "none";
                if (y[i].innerText.indexOf(texto) > -1 )  {
                    x[i].style.display = "block";
                }
            }
        }
    }
</script>
<script>
    function FichaArt() {
        var x= document.querySelectorAll('.X');
        for (let i = 0; i < x.length; ++i) {
            x[i].addEventListener("click",function () {
                document.getElementById('Articulos').style.display="block";
                document.getElementById('products').style.display="none";

            });
        }
    }
    function ListaArt(){
        document.getElementById('Articulos').style.display="none";
        document.getElementById('products').style.display="block";
    }

    function inicial() {
        let z= document.getElementById('Buscar');
        (z.value.length>2)? Buscar():z.focus();
    }
    $(document).ready(function() {
      /*
       $('#list').click(function(event){event.preventDefault();$('#products .item').addClass('list-group-item');});
        $('#grid').click(function(event){event.preventDefault();$('#products .item').removeClass('list-group-item');$('#products .item').addClass('grid-group-item');});
        inicial();
        FichaArt()
	*/
    });
</script>

</body>

</html>