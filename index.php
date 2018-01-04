<!DOCTYPE html>

<html lang="es">
<?php
    include_once ('gvf/pages/cgi/bd3.php');
?>

<head>
    <meta charset=utf-8>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GV Frenos</title>
    <!-- Load Roboto font -->
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,300,700&amp;subset=latin,latin-ext' rel='stylesheet' type='text/css'>
    <!-- Load css styles -->
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css" />
    <link rel="stylesheet" type="text/css" href="css/bootstrap-responsive.css" />
    <link rel="stylesheet" type="text/css" href="css/style.css" />
    <link rel="stylesheet" type="text/css" href="css/pluton.css" />
    <!--[if IE 7]>
            <link rel="stylesheet" type="text/css" href="css/pluton-ie7.css" />
        <![endif]-->
    <link rel="stylesheet" type="text/css" href="css/jquery.cslider.css" />
    <link rel="stylesheet" type="text/css" href="css/jquery.bxslider.css" />
    <link rel="stylesheet" type="text/css" href="css/animate.css" />
    <!-- Fav and touch icons -->
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/ico/apple-touch-icon-144.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/ico/apple-touch-icon-114.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/apple-touch-icon-72.png">
    <link rel="apple-touch-icon-precomposed" href="images/ico/apple-touch-icon-57.png">
    <link href="https://fonts.googleapis.com/css?family=Bitter" rel="stylesheet">
    <link rel="shortcut icon" href="images/ico/favicon.ico">
    <style>
        #clint-slider img{
            width: 199px;
            height: 199px;
        }
        .BigBtn{
            margin-top: 1em;
            font-size: 1.5em;
            padding: 10px;
            background: #fece1a;
            border: 1px solid black;
        }
        .BigBtn:hover{
            background: #fe6e2d;
            color:white;
        }
        .bx-wrapper img{
            background: white;
        }
        .catIma{
            width: 480px;
            height: 280px;
        }
    </style>
</head>

<body>
    <div class="navbar">
        <div class="navbar-inner">
            <div class="container">
                <a href="#" class="brand">
                    <img src="images/logo.png" width="120" height="40" alt="Logo" />
                    <!-- This is website logo -->
                </a>
                <!-- Navigation button, visible on small resolution -->
                <button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                        <i class="icon-menu"></i>
                    </button>
                <!-- Main navigation -->
                <div class="nav-collapse collapse pull-right">
                    <ul class="nav" id="top-navigation">
                        <li class="active"><a href="#home">Inico</a></li>
                        <li><a href="#service">Servicios</a></li>
                        <li><a href="#Productos">Productos</a></li>
                        <li><a href="#Automotrices">Automotrices</a></li>
                        <li><a href="#clientes">Clientes</a></li>
                        <!--   <li><a href="#price">Price</a></li> -->
                        <li><a href="#contacto">Contacto</a></li>
                    </ul>
                </div>
                <!-- End main navigation -->
            </div>
        </div>
    </div>
    <!-- Start home section -->
    <div id="home">
        <!-- Start cSlider -->
        <div id="da-slider" class="da-slider">
            <div class="triangle"></div>
            <!-- mask elemet use for masking background image -->
            <div class="mask"></div>
            <!-- All slides centred in container element -->
            <div class="container">
                <!-- Start first slide -->


		        <?php
		        if (mysqli_connect_errno($mysqli)) {
			        echo 'Falló al conectar a MySQL: ' . mysqli_connect_error();
		        }

		        $resultado = mysqli_query($mysqli, "SELECT `id_maq`, `Titulo`, `Stitulo`, `Detalle`, `imagen`, `Link` FROM `t_marque` ");

		        /* Imprimir filas */
		        while ($fila = mysqli_fetch_assoc($resultado)) {
		        ?>
                <div class="da-slide">
                    <h2 class="fittext2" style="font-family: 'Spectral SC', serif;"> <?php echo $fila['Titulo'] ."</h2>";
				        echo "<h4>" . $fila['Stitulo']."</h4>";
				        echo "<p style='font-family: 'Crimson Text', serif'>".$fila['Detalle']."</p>";
				        if ((strlen ($fila['Link']))>2){
					        echo '<a href="'.$fila['Link'].'" class="da-link button">Ver Tienda</a>';
				        }

				        echo '<div class="da-img"><img src="'.substr ($fila['imagen'],6).'" alt="'.$fila['Titulo'].'" > </div> </div>';

				        }
				        mysqli_free_result($resultado);

				        ?>

                        <!-- Start cSlide navigation arrows -->
                        <div class="da-arrows">
                            <span class="da-arrows-prev"></span>
                            <span class="da-arrows-next"></span>
                        </div>
                        <!-- End cSlide navigation arrows -->
                </div>
        </div>
    </div>
    <!-- End home section -->
    <!-- Service section start -->
    <div class="section primary-section" id="service">
        <div class="container">
            <!-- Start title section -->
            <div class="title">
                <h1>Que ofrecemos?</h1>
                <!-- Section's title goes here -->
                <p>No solo fabricamos y distribuimos respuestos. Complemetamos nuestra actividad con una serie de servios y pronta entrega. </p>
                <!--Simple description for section goes here. -->
            </div>
            <div class="row-fluid">
                <div class="span4">
                    <div class="centered service">
                        <div class="circle-border zoom-in">
                            <img class="img-circle" src="images/Service1.png" alt="service 1">
                        </div>
                        <h3>Red de Distribuidores</h3>
                        <p>Tenemos cientos de ditribuidores locales expertos, que lo acesoraran sobre cada componente.</p>
                    </div>
                </div>
                <div class="span4">
                    <div class="centered service">
                        <div class="circle-border zoom-in">
                            <img class="img-circle" src="images/Service2.png" alt="service 2" />
                        </div>
                        <h3>Respaldamos su inversión</h3>
                        <p>Priorizamos la calidad, para que no solo ahorre en la compra. Alargando la vida util de cada respuesto, proteguiendo no solo sus bienes materiales y sino su vida. </p>
                    </div>
                </div>
                <div class="span4">
                    <div class="centered service">
                        <div class="circle-border zoom-in">
                            <img class="img-circle" src="images/Service3.png" alt="service 3">
                        </div>
                        <h3>Soporte Tecnologico</h3>
                        <p>Nuestros distribuidores no solo reciben catalogos en papel. Tienen acceso a nuestra red con diagramas detallados,consultar de stock o respuestos altenativos disponibles</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Service section end -->
    <!-- Portfolio section start -->
    <div class="section secondary-section " id="Productos">
        <div class="triangle"></div>
        <div class="container">
            <div class=" title">
                <h1>No consigue repuestos de calidad?</h1>
                <p>Confia su vida en los repuestos que usa?. Nosotros somos fabricantes pero mejoramos a diario cada componente especificamente para cada norma de cada automotriz con calidad igual o superior a la original.</p>
            </div>
            <h2>Productos</h2>
            <ul class="nav nav-pills">
                <li class="filter" data-filter="all">
                    <a href="#noAction">Todos</a>
                </li>
	            <?php
	            $resultado = mysqli_query($mysqli, "SELECT `idc`,`Categoria` FROM `t_categorias` ORDER BY `Categoria` ;");
	            while ($fila = mysqli_fetch_assoc($resultado)) {

		            echo '<li class="filter" data-filter="' . $fila['idc'] . '"><a href="#noAction">' . $fila['Categoria'] . '</a></li>';
	            }
	            mysqli_free_result($resultado);
	            ?>
            </ul>
            <!-- Start details for portfolio project 1 -->
            <div id="single-project">

             </div>
                <!-- End details for portfolio project 1 -->

                <ul id="portfolio-grid" class="thumbnails row">
                    <?php
                       $SQL="SELECT `idc`, `Categoria`, `imagen` FROM `t_categorias` ORDER BY `Categoria`  ;";
                        $resultado = mysqli_query($mysqli,  $SQL);
                            while ($fila = mysqli_fetch_assoc($resultado)) {
                                echo ' <li class="span4 mix '. $fila['idc']. '" onclick="Listados('.$fila['idc'].')"><div class="thumbnail">';
                                echo '<img src="'.substr ($fila['imagen'],6) . '" alt="'. $fila['Categoria']. ' " class="catIma" >';
                                echo ' <a href="#single-project" class="more show_hide" rel="#slidingDiv" onclick="FCli('. $fila['idc']. ')"> <i class="icon-plus"><h5><br>(Click para ver más)</h5></i></a>';
                                echo '<h3>'. $fila['Categoria']. '</h3> <div class="mask"></div></div></li>';
                            }
                        mysqli_free_result($resultado);
                    ?>
                </ul>
            </div>
        </div>
    </div>
    <!-- Portfolio section end -->
    <!-- About us section start -->
    <div class="section primary-section" id="Automotrices">
        <div class="triangle"></div>
        <div class="container">
            <div class="title1" style="text-align:center;">
                <h1>Nuestra guia de productos se actulizan a diario</h1>

                <p>Si no lo encuentras , no dude en dejar tu consulta o acercate a unos de nuestros representantes.</p>

            </div>
            <div class="section">
                <div class="container centered" style="padding-top:10px;">
                    <div class="sub-section">
                        <div class="title clearfix">
                            <div class="pull-left">
                                <h3>PRODUCTOS (por empresa automotriz)</h3>
                            </div>
                            <ul class="client-nav pull-right">
                                <li id="client-prev"></li>
                                <li id="client-next"></li>
                            </ul>
                        </div>
                        <ul class="row client-slider" id="clint-slider">
	                        <?php
                                $resultado = mysqli_query($mysqli, "SELECT `idMarca`, `Marca`, `Logo` FROM `t_marca` ORDER BY `Marca`;");
                                while ($fila = mysqli_fetch_assoc($resultado)) {
                                    echo '<li><a href="Listado/index.php?P='. $fila['Marca'] . '">';
                                    echo '<img src="'.substr ($fila['Logo'],6) . '" alt="'. $fila['Marca'] . '"></a></li>;';
                                }
                                mysqli_free_result($resultado);
	                        ?>
                        </ul>
                    </div>
                    <div style="text-align: center;">
                        <br>
                        <a href="Listado.php" class="btn BigBtn">  Vea Nuestro catalogo  </a>
                </div>

                </div>
            </div>

        </div>
    </div>
    <!-- About us section end -->
    <div class="section secondary-section">
        <div class="triangle"></div>
        <div class="container centered">
            <!--       <p class="large-text">Elegance is not the abundance of simplicity. It is the absence of complexity.</p>
            <a href="#" class="button">Purshase now</a>  -->
        </div>
    </div>
    <!-- Client section start -->


    <!-- Contact section start -->
    <div id="contacto" class="contact">

        <div class="section secondary-section">
            <div class="container">
                <div class="title">
                    <h1>Contacto</h1>
                    <p>Quere ser distribuidor? Necesitas un respuesto especial? O simplemente queres la mejor calidad en sistema de frenado. No dudes en contactarnos .</p>
                    <style>
                        dire a:hover {
                            color: rgb(29, 114, 231) !important;
                        }
                        
                        .dire,
                        dire a {
                            font-family: 'Bitter', serif;
                            font-size: 2em;
                            padding: 20px 10px;
                            background: rgba(247, 247, 247, 0.8);
                            border-radius: 10px;
                        }
                    </style>

                    <p class="dire">AV Hipolito Yrigoyen 1234 ,cp 1846,Burzaco,Buenos Aires </br> Email: <a href="mailto:gvfrenos@gmail.com"> gvfrenos@gmail.com</a> - Telefono: <a href="tel:011 4214 7937">(011) 4214-7937</a> * <a>123 456 789 000</a></p>

                </div>
            </div>
            <div class="map-wrapper">

                <div class="container span4" style="z-index:100;padding-top:20px;">
                    <div class="row-fluid">
                        <div class="contact-form centered" style="max-height:480px; ">
                            <h3>Su Consulta</h3>
                            <div id="successSend" class="alert alert-success invisible">
                                <strong>Perfecto!! </strong>Mensaje enviado.</div>
                            <div id="errorSend" class="alert alert-error invisible">Algo salio mal.</div>
                            <form id="contact-form" action="php/mail.php">
                                <div class="control-group">
                                    <div class="controls">
                                        <input class="span12" type="text" id="name" name="name" placeholder="* Su Nombre..." />
                                        <div class="error left-align" id="err-name">Su Nombre?.</div>
                                    </div>
                                </div>
                                <div class="control-group">
                                    <div class="controls">
                                        <input class="span12" type="text" id="tel" name="tel" placeholder="* Un telefono..." />
                                        <div class="error left-align" id="err-tel">Su Telefono?.</div>
                                    </div>
                                </div>
                                <div class="control-group">
                                    <div class="controls">
                                        <input class="span12" type="email" name="email" id="email" placeholder="* Su Email..." />
                                        <div class="error left-align" id="err-email">La dirrecion de EMAIL no es valida.</div>
                                    </div>
                                </div>
                                <div class="control-group">
                                    <div class="controls">
                                        <textarea class="span12" name="comment" id="comment" placeholder="* Consulta "></textarea>
                                        <div class="error left-align" id="err-comment">Cual es su consulta?.</div>
                                    </div>
                                </div>
                                <div class="control-group">
                                    <div class="controls">
                                        <button id="send-mail" class="message-btn">Enviar </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="span8" style="margin-left: 1;">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3276.810650533058!2d-58.383108784324804!3d-34.785539374649!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x95bcd32fc4700c77%3A0x2e4bde087b360b0e!2sConscripto+Bernardi+2399%2C+B1845BWJ+Jos%C3%A9+Marmol%2C+Buenos+Aires!5e0!3m2!1ses!2sar!4v1508710732697"
                        height="480" width="100%" frameborder="0" style="border:0;overflow: hidden;" allowfullscreen></iframe>
                </div>
            </div>
        </div>

        <!-- Contact section edn -->
        <!-- Footer section start -->
        <div class="footer">
            <p>&copy; Gen Uno By <a href="@">Adri78</a></p>
        </div>
    </div>

    <!-- Footer section end -->

    <!-- ScrollUp button start -->
    <div class="scrollup">
        <a href="#">
            <i class="icon-up-open"></i>
        </a>
    </div>
    <!-- ScrollUp button end -->
    <!-- Include javascript -->
    <script src="js/jquery.js"></script>
    <script type="text/javascript" src="js/jquery.mixitup.js"></script>
    <script type="text/javascript" src="js/bootstrap.js"></script>
    <script type="text/javascript" src="js/modernizr.custom.js"></script>
    <script type="text/javascript" src="js/jquery.bxslider.js"></script>
    <script type="text/javascript" src="js/jquery.cslider.js"></script>
    <script type="text/javascript" src="js/jquery.placeholder.js"></script>
    <script type="text/javascript" src="js/jquery.inview.js"></script>
    <!-- Load google maps api and call initializeMap function defined in app.js 
    <script async="" defer="" type="text/javascript" src="https://maps.googleapis.com/maps/api/js?sensor=false&callback=initializeMap"></script>
  -->
    <!-- css3-mediaqueries.js for IE8 or older -->
    <!--[if lt IE 9]>
            <script src="js/respond.min.js"></script>
        <![endif]-->
    <script type="text/javascript" src="js/app.js"></script>
    <script>
        function Listados(ID) {
            location.href ="Listado.php=?I="+ID;
        }
    </script>
    <script>
        function FCli(id) {
            $("#single-project").load("hom.php?A="+id, function (res){ });//
        }
    </script>


    <?php  mysqli_close($mysqli);    ?>
</body>

</html>