<?php  include 'contenido.php' ?>
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
    <style>
        body{background: #fea018; }
        table.paleBlueRows {
            font-family: "Times New Roman", Times, serif;
            border: 1px solid #FFFFFF;
            width: 85%;
            padding: 0.9em;
            padding-top:0px;
            text-align: center;
            border-collapse: collapse;
            max-height: 460px;
            overflow-y: scroll;
            margin-left: auto;
            margin-right: auto;
            background: white;
        }
        table.paleBlueRows td, table.paleBlueRows th {
            border: 1px solid #FFFFFF;
            padding: 3px 2px;
        }
        table.paleBlueRows tbody td {
            font-size: 1.8em;
            margin: 5px 2px;
        }
        table.paleBlueRows tr:nth-child(even) {
            background: #D0E4F5;
        }
        table.paleBlueRows thead {
            background: #fed02b;
            border-bottom: 5px solid #FFFFFF;
        }
        table.paleBlueRows thead th {
            font-size: 17px;
            font-weight: bold;
            color: #FFFFFF;
            text-align: center;
            border-left: 2px solid #FFFFFF;
        }
        table.paleBlueRows thead th:first-child {
            border-left: none;
        }
        #BTZonas a{
            float: right;
        }

    </style>


</head>
<body style="margin: 10px;">
<?php
    include 'menu.php';
?> 
    <div class="row">
        <div id="contenido">
   <!-- **********************************************************************************************************-->
  <!-- *********************************************************************************************************** -->
<h2 style="padding-left: 2em;">ABM ZONAS</h2>
            <div style="padding-top: 1em;text-align: center; padding-bottom: 1em;">
                <input type="text" id="Zona" style="width: 60%; min-width: 400px;" >
                <a id="AZona" class="btn btn-primary">Agregar </a><a class="btn btn-success" onclick="Limpiar1()">Nuevo </a>
                <h5 id="IDZ" style="display: none;">0</h5>
            </div>

            <table id="TZonas" class="paleBlueRows">
                <thead>
                <tr> <th>Zonas</th> </tr>
                </thead>
                <tbody id="BTZonas">
                <tr><td>Zonas  <a class="btn"> Eliminar</a></td></tr>
                </tbody>
            </table>

   <!-- ******************************************************************************************************* **  -->
   <!-- *********************************************************************************************************** -->

        </div>
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
    <script src="../vendor/datatables/js/jquery.dataTables.min.js"></script>
    <script src="../vendor/datatables-plugins/dataTables.bootstrap.min.js"></script>
    <script src="../vendor/datatables-responsive/dataTables.responsive.js"></script>
    <!-- Custom Theme JavaScript -->
    <script src="../dist/js/sb-admin-2.js?1"></script>

<!-- ***********************************************************************************  -->

<script>
    function CZona(id) {
        //console.log(id);
        Limpiar1();
        let d={T:15,ID:id};
        $.post("cgi/CWeb.php", d, function(result) {
            let Datos = result.split("|");
            document.getElementById('IDZ').innerText=Datos[0];
            document.getElementById('Zona').value=Datos[1];
        });
    }
    function BZona(id){
        let d={T:13,M:1,ID:id};
        $.post("cgi/CWeb.php", d, function(result) {
            CargatZona();
        });
    }

    function MTeditor() {
        let X= document.querySelectorAll('#BTZonas tr');
        let B= document.querySelectorAll('#BTZonas .borra2');

        for(let y=0;y < X.length; y++ ) {
            X[y].addEventListener("click", function (e) {
                e.preventDefault();
                CZona(this.getAttribute('data-id'));
            });

            B[y].addEventListener("click", function (e) {
                e.preventDefault();
                e.cancelBubble = true;
                if (e.stopPropagation) e.stopPropagation();
                if(confirm("Seguro que quiere borrar el Rubro?")){
                    BZona( B[y].parentNode.parentNode.getAttribute('data-id'));
                }
            });
        }
    }
    function Limpiar1(){
        document.getElementById('Zona').value="";
        document.getElementById('IDZ').innerHTML="";
    }
    function CargatZona(){
        $("#BTZonas").load("cgi/tweb.php?T=5", function (res) {
            MTeditor();
        });//
    }
    function GrabarZ() {

        document.getElementById('AZona').addEventListener("click",function (e) {
            e.preventDefault();
            let d;
            let Id = document.getElementById('IDZ').innerText;
            let Zona = document.getElementById('Zona').value.trim();

            if (Zona.length < 2) {
                alert("Falta Zona");
                return;
            }
            d = {T:14, Titulo:Zona, ID:Id};
            $.post("cgi/CWeb.php", d, function (result) {

                location.reload();
            });
        });

    }

    (function () {
        CargatZona();
        GrabarZ();
    } )();
</script>


</body>
</html>