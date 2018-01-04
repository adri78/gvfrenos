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
        body{background: #00a5dd; }

        table.paleBlueRows {
            font-family: "Times New Roman", Times, serif;
            border: 1px solid #FFFFFF;
            width: 80%;
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
            font-size: 1.2em;
            margin: 5px 2px;
        }
        table.paleBlueRows tbody tr:hover{
            background: greenyellow;
        }
        table.paleBlueRows tr:nth-child(even) {
            background: #D0E4F5;
        }
        table.paleBlueRows thead {
            background: #0B6FA4;
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
        #BTCategorias a{
            float: right;
        }
        #BTSub a{
            float: right;
        }
        #Cextra{
            width: 70%;
            min-width: 380px;
        }
        .dista{
            margin: 10px 35px;
            padding: 10px 30px;
        }
        .fondos{
            background: #a8b5cf;
            border-radius: 20px;
            padding: 25px;
            margin: 10px;"
        }
        input:hover{background: greenyellow}
        #Categorias{display: block;width: 100%; padding-right: 1em; padding-left: 1em; }
    </style>


</head>
<body style="margin: 10px;">
<?php
    include 'menu.php';
?> 
    <div class="row">
        <div id="contenido">
   <!-- **********************************************************************************************************-->
            <h2 style="padding-left: 50px;">Alta de campos extras</h2>
  <!-- *********************************************************************************************************** -->
            <div class="col-lg-6">
                <h4 class="fondos"  >Categoria actual:
                    <span id="IDC" class="NV"></span>
                    <br>
                    <span id="dCategoria" style="color:darkred; text-align: right;padding-left: 2em;"></span>
                </h4>

                <table id="TCategorias" class="paleBlueRows">
                    <thead>
                    <tr> <th>Categorias</th> </tr>
                    </thead>
                    <tbody id="BTCategorias">
                    <tr><td>Categoria  <a class="btn"> Eliminar</a></td></tr>
                    </tbody>
                </table>
            </div>
   <!-- ******************************************************************************************************* **  -->
            <div class="col-lg-6">
               <div style="text-align: center; padding-bottom: 1em;">
                <h4 class="fondos">
                    <label for="Cextra">Campo:</label>
                    <input type="text" id="Cextra" ><br>
                    <a id="ASub" class="btn btn-primary dista">Agregar </a><a class="btn btn-success dista" onclick="Limpiar2()">Nuevo </a>
                </h4>
                    <h5 id="IDS" style="display: none;">0</h5>
                </div>

                <table id="TSub" class="paleBlueRows"  >
                    <thead>
                    <tr style="background: #fe672e;"> <th>Campos Extras</th> </tr>
                    </thead>
                    <tbody id="BTSub">
                    <tr><td><a class="btn"></a></td></tr>
                    </tbody>
                </table>
            </div>
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
    function CCE(id) {
        Limpiar2();
        let d={M:13,ID:id};
        $.post("cgi/Grabar.php", d, function(result) {
            let Datos = result.split("|");
            document.getElementById('IDS').innerText=Datos[0];
            document.getElementById('Cextra').value=Datos[2];
        });
    }

    function MTediSub() {
        let X= document.querySelectorAll('#BTSub tr');
        let B= document.querySelectorAll('#BTSub .borra2');

        for(let y=0;y < X.length; y++ ) {
            X[y].addEventListener("click", function (e) {
                e.preventDefault();
                CCE(this.getAttribute('data-id'));
            });

            B[y].addEventListener("click", function (e) {
                e.preventDefault();
                e.cancelBubble = true;
                if (e.stopPropagation) e.stopPropagation();
                if(confirm("Seguro que quiere borrar la SubCategoria?")){
                    BSub( B[y].parentNode.parentNode.getAttribute('data-id'));
                }
            });
        }
    }

    function BSub(id){
        let d={T:51,M:1,ID:id};
        $.post("cgi/CWeb.php", d, function(result) {
            CargatCE();
        });
    }

    function CargatCE(){
        let c=parseInt(document.getElementById('IDC').innerHTML);
        $("#BTSub").load("cgi/tweb.php?T=23&C="+c, function (res) {
            MTediSub();
        });//
    }

    function GrabarS() {
        document.getElementById('ASub').addEventListener("click",function (e) {
            e.preventDefault();
            let d;
            let CAT =parseInt( document.getElementById('IDC').innerText);
            let Id = document.getElementById('IDS').innerText;
            let Cextra = document.getElementById('Cextra').value.trim();

            if (Cextra.length < 2) {
                alert("Falta SubCaegoria");
                return;
            }
            if (CAT < 1) {
                alert("Falta la Categoria");
                return;
            }

            d = {M: 11, Campo: Cextra, ID: Id, idc:CAT};
            $.post("cgi/Grabar.php", d, function (result) {
                CargatCE();
                Limpiar2();
            });
        });
    }
</script>

<script>
    function CRub(id) {

        let d={T:71,ID:id};
        $.post("cgi/CWeb.php", d, function(result) {

            let Datos = result.split("|");
            document.getElementById('IDC').innerText=Datos[0];
            document.getElementById('dCategoria').innerHTML=Datos[1];

            CargatCE();
        });
    }

    function BRubro(id){
        let d={T:5,M:1,ID:id};
        $.post("cgi/CWeb.php", d, function(result) {
            CargatRub();
        });
    }
    function MTeditor() {
        let X= document.querySelectorAll('#BTCategorias tr');
        for(let y=0;y < X.length; y++ ) {
            X[y].addEventListener("click", function (e) {
                e.preventDefault();
                CRub(this.getAttribute('data-id'));
            });
        }
    }

    function Limpiar2(){
        document.getElementById('Cextra').value="";
        document.getElementById('IDS').innerHTML="";
    }

    function CargatRub(){
        $("#BTCategorias").load("cgi/tweb.php?T=22", function (res) {
            MTeditor();
        });//
    }

    (function () {

        CargatRub();
        GrabarS()
    } )();
</script>


</body>
</html>