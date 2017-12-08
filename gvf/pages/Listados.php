<?php  include 'contenido.php'; ?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Control de Stock // <?php echo $_SESSION['real']; ?></title>
    <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="../vendor/metisMenu/metisMenu.min.css" rel="stylesheet">
    <link href="../vendor/datatables-plugins/dataTables.bootstrap.css" rel="stylesheet"> 
    <link href="../vendor/datatables-responsive/dataTables.responsive.css" rel="stylesheet">
    <link href="../dist/css/sb-admin-2.css?2" rel="stylesheet">
    <link href="../vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <!-- ****************************************************************************************************** -->
    <!-- ****************************************************************************************************** -->
<script>                
/********************************************* */
function pulsar(e) {  
    tecla=(document.all) ? e.keyCode : e.which; 
    if (tecla==112 && e.ctrlKey){ // control + F1
        //alert("listo");
         document.getElementById("btnGrabar").focus();
         
    } //78 = letra n  
} 
/******************************************** */

</script>

    <style>
        .navbar{ margin-bottom: 5px;}
        .Ficha{
            width: 500px;
            background: deepskyblue;
            height: 100vh;
            float: left;
            padding-left: 20px;
        }

        .Listado{
            float: left;
            width: 100%;
            min-width: 500px;
            background: #12ffa7;
            height: 100vh;
        }
    </style>



</head>
<body onkeydown="return pulsar(event)">
<?php
    include 'menu.php';
?> 
    <div class="row" style="display: flex;">

        <div class="Ficha ">

            <ul class="nav nav-tabs" role="tablist">
                <li role="presentation" class="active"><a href="#General" aria-controls="General" role="tab" data-toggle="tab"> General</a></li>
                <li role="presentation"><a href="#zapatas" aria-controls="zapatas" role="tab" data-toggle="tab">Zapatas</a></li>
                <li role="presentation"><a href="#Embragues" aria-controls="Embragues" role="tab" data-toggle="tab">Embragues</a></li>
                <li role="presentation"><a href="#settings" aria-controls="settings" role="tab" data-toggle="tab">Settings</a></li>
            </ul>
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade active in" role="tabpanel" id="General" aria-labelledby="General-tab">
                    <p>Raw denim you probably haven't heard of them jean shorts Austin. Nesciunt tofu stumptown aliqua,
                        retro synth master cleanse. Mustache cliche tempor, williamsburg carles vegan helvetica. Reprehenderit
                        butcher retro keffiyeh dreamcatcher synth. Cosby sweater eu banh mi, qui irure terry richardson ex squid.
                        Aliquip placeat salvia cillum iphone. Seitan aliquip quis cardigan american apparel, butcher voluptate nisi
                        qui.</p>
                </div>
                <div class="tab-pane fade" role="tabpanel" id="zapatas" aria-labelledby="profile-t  ab">
                    <p>Food truck fixie locavore, accusamus mcsweeney's marfa nulla single-origin coffee squid. Exercitation +1
                        labore velit, blog sartorial PBR leggings next level wes anderson artisan four loko farm-to-table craft
                        beer twee. Qui photo booth letterpress, commodo enim craft beer mlkshk aliquip jean shorts ullamco ad
                        vinyl cillum PBR. Homo nostrud organic, assumenda labore aesthetic magna delectus mollit. Keytar helvetica
                        VHS salvia yr, vero magna velit sapiente labore stumptown. Vegan fanny pack odio cillum wes anderson 8-bit,
                        sustainable jean shorts beard ut DIY ethical culpa terry richardson biodiesel. Art party scenester stumptown,
                        tumblr butcher vero sint qui sapiente accusamus tattooed echo park.
                    </p>
                </div>
                <div class="tab-pane fade" role="tabpanel" id="Embragues" aria-labelledby="dropdown1-tab">
                    <p>Etsy mixtape wayfarers, ethical wes anderson tofu before they sold out mcsweeney's organic lomo retro
                        fanny pack lo-fi farm-to-table readymade. Messenger bag gentrify pitchfork tattooed craft beer, iphone
                        skateboard locavore carles etsy salvia banksy hoodie helvetica. DIY synth PBR banksy irony. Leggings
                        gentrify squid 8-bit cred pitchfork. Williamsburg banh mi whatever gluten-free, carles pitchfork biodiesel
                        fixie etsy retro mlkshk vice blog. Scenester cred you probably haven't heard of them, vinyl craft beer blog
                        stumptown. Pitchfork sustainable tofu synth chambray yr.
                    </p>
                </div>
                <div class="tab-pane fade" role="tabpanel" id="dropdown2" aria-labelledby="dropdown2-tab"> <p>Trust fund seitan letterpress, keytar raw denim keffiyeh etsy art party before they sold out master cleanse gluten-free squid scenester freegan cosby sweater. Fanny pack portland seitan DIY, art party locavore wolf cliche high life echo park Austin. Cred vinyl keffiyeh DIY salvia PBR, banh mi before they sold out farm-to-table VHS viral locavore cosby sweater. Lomo wolf viral, mustache readymade thundercats keffiyeh craft beer marfa ethical. Wolf salvia freegan, sartorial keffiyeh echo park vegan.</p> </div> </div>




        </div> <!-- Ficha de Articulo -->

        <div class="Listado" >

        </div><!-- Fin col de la tabla -->


    </div>
    <!-- fin row -->

    <!-- /#wrapper -->
    <!-- jQuery -->
    <script src="../vendor/jquery/jquery.min.js"></script>
    <script src="../vendor/jquery/jquery-ui.js"></script>
    <script src="../vendor/bootstrap/js/bootstrap.min.js"></script>
    <!-- Metis Menu Plugin JavaScript -->
    <script src="../vendor/metisMenu/metisMenu.min.js"></script>
    <script src="../js/comun.js"></script>
    <!-- DataTables JavaScript -->
    <script type="text/javascript"  src="../js/sorttable.js"></script>

    <script src="../dist/js/sb-admin-2.js?1"></script>


</body>
</html>