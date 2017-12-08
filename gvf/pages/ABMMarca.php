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
        .alta{
          /* padding-top: 1em;*/
            width: 400px;
            position: relative;
        }
        .centrar{
            margin-right: auto;
            margin-left: auto;
        }
        table.paleBlueRows {
            font-family: "Times New Roman", Times, serif;
            border: 1px solid #FFFFFF;
            background: white;
            width: 550px;
            padding: 0.9em;
            text-align: center;
            border-collapse: collapse;
            max-height: 360px;
            overflow: scroll;
            padding-top: 1em;
        }
        table.paleBlueRows td, table.paleBlueRows th {
            border: 1px solid #FFFFFF;
            padding: 3px 2px;
        }
        table.paleBlueRows tbody td {
            font-size: 13px;
        }
        table.paleBlueRows tr:nth-child(even) {
            background: #D0E4F5;
        }
        table.paleBlueRows thead {
            background: #04a47f;
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
        table.paleBlueRows img{
            width: 100px;
            height: 100px;
        }
        table.paleBlueRows td:nth-child(2) {
           font-size: 1.5em;
        }
       #contenido{
           background: turquoise;
       }
        .navbar{
            margin-bottom: 0px;
        }
        input:hover{
            background: lightpink;
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
            <div class="centrar alta">
                <img src="../../WebMaq/NoImagen.png" alt="No hay Imagen" id="eImg" style="width: 130px;height: 130px;padding: 1em;">
                <div style="display: inline-block; top: 3em;position: absolute;">

                    <input type="text" id="Marca">
                    <a id="AMarca" class="btn btn-primary">Agregar </a><a class="btn btn-success" onclick="Limpiar2()">Nuevo </a>
                    <input type="file" id="Carga_Imagen" name="Carga_Imagen" accept="image/*" value="../../WebMaq/NoImagen.png"><br>
                    <h5 id="IDM" style="display: none;">0</h5>
                </div>
            </div>

            <table id="Tmarcas" class="paleBlueRows centrar">
                <thead>
                <tr><th style="width: 100px;">Logo</th> <th>Marca</th> <th style="width: 80px;"> </th></tr>
                </thead>
                <tbody id="BTMarcas">
                <tr> <td><img src="../WebMaq/NoImagen.png" ></td><td>Marca </td><td> <a class="btn"> Eliminar</a></td></tr>
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
    function uploadAjax(F,C) {
        let inputFileImage = document.getElementById(F);
        let file = inputFileImage.files[0];
        var data = new FormData();
        data.append('archivo', file);
        let url = "upload.php?c="+ C ;
        $.ajax({
            url: url,
            type: 'POST',
            contentType: false,
            data: data,
            processData: false,
            cache: false
        }).done(function(data){
            //alert(data.msg);
            console.log(data.msg);
            document.getElementById('eImg').setAttribute("src",data.msg);

        });
    }

    function FileAjax(F,C) {
        const a= document.getElementById(F).addEventListener("change",function () {
            uploadAjax(F,C);
        });
    }
</script>
<script>
    function CMaq(id) {
        Limpiar2();
        let d={T:12,ID:id};
        $.post("cgi/CWeb.php", d, function(result) {
            let Datos = result.split("|");
            document.getElementById('IDM').innerText=Datos[0];
            document.getElementById('Marca').value=Datos[1];
            document.getElementById('eImg').setAttribute("src",Datos[2]);
            document.getElementById('Marca').focus();
        });
    }
    function BMarca(id){
        let d={T:10,M:1,ID:id};
        $.post("cgi/CWeb.php", d, function(result) {
            CargatMaq();
        });
    }

    function MTeditor() {
        let X= document.querySelectorAll('#BTMarcas tr');
        let B= document.querySelectorAll('#BTMarcas .borra3');

        for(let y=0;y < X.length; y++ ) {
            X[y].addEventListener("click", function (e) {
                e.preventDefault();
                CMaq(this.getAttribute('data-id'));
            });

            B[y].addEventListener("click", function (e) {
                e.preventDefault();
                e.cancelBubble = true;
                if (e.stopPropagation) e.stopPropagation();
                if(confirm("Seguro que quiere borrar la Marca?")){
                    BMarca( B[y].parentNode.parentNode.getAttribute('data-id'));
                }
            });
        }
    }
    function Limpiar2(){
        document.getElementById('Marca').value="";
        document.getElementById('IDM').innerHTML="";
        document.getElementById('eImg').setAttribute("src","../../WebMaq/NoImagen.png");
    }
    function CargatMaq(){
        $("#BTMarcas").load("cgi/tweb.php?T=3", function (res) {
            MTeditor();
        });//
    }
    function GrabarM() {
        document.getElementById('AMarca').addEventListener("click",function (e) {
            e.preventDefault();
            let d;
            let Id = document.getElementById('IDM').innerText;
            let Marca = document.getElementById('Marca').value;
            let ima = document.getElementById('eImg').getAttribute("src");
            if (Marca.length < 2) {
                alert("Falta Marca");
                return;
            }
            d = {T: 11, Titulo: Marca,imagen: ima, ID: Id};
            $.post("cgi/CWeb.php", d, function (result) {
                Limpiar2();
                CargatMaq();
            });
        });
    }

    (function () {
        CargatMaq();
        FileAjax("Carga_Imagen",1);
        GrabarM();
    } )();
</script>


</body>
</html>