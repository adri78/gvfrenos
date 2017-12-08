<?php  include 'contenido.php'; ?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
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
         document.getElementById("Buscar").focus();
    }
    if (tecla==113 && e.ctrlKey){ // control + F2
        document.getElementById("btnGrabar").focus();
    } //
} 
/******************************************** */

</script>
    <style>
        #ListaArt{
            height:79vh;
            overflow: scroll;
        }
    </style>

</head>
<body onkeydown="return pulsar(event)">
<?php
    include 'menu.php';
?> 
    <div class="row">

        <div class="col-lg-4 cuadro">

        </div>
        <div class="col-lg-8" >

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
    <script src="../js/sorttable.js"></script>
    <!-- Custom Theme JavaScript -->
    <script src="../dist/js/sb-admin-2.js?1"></script>
   <script>

<script>
    jQuery.extend(jQuery.expr[":"],
        {
            "contiene-palabra": function (elem, i, match, array) {
                return (elem.textContent || elem.innerText || jQuery(elem).text() || "").toLowerCase().indexOf((match[3] || "").toLowerCase()) >= 0;
            }
        });

    $("#Buscar").keyup(function () {/* ******************    Motor del Buscador      ******************************************** */
        if (jQuery(this).val() != "") {
            jQuery("#LART tbody>tr").hide();
            jQuery("#LART td:contiene-palabra('" + jQuery(this).val() + "')").parent("tr").show();
        }
        else {
            jQuery("#LART tbody>tr").show();
        }
    });


</script>
</body>
</html>