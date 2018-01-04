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
        body{background: #b2b2b2; }
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
        #SubCaegorias{
            width: 70%;
            min-width: 380px;
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
            <h3 style="text-decoration: underline;margin-left: 50px; "> Categorias y subcategorias :</h3>
  <!-- *********************************************************************************************************** -->
            <div class="col-lg-6">
                <div style="padding-top: 1em;text-align: center; padding-bottom: 10px;">
                    <div style=" display: flex">
                        <div style="width: 150px;overflow: hidden;">
                            <img src="../../WebMaq/NoImagen.png" alt="No hay Imagen" id="eImg" style="width: 130px;height: 130px;padding: 1em;">
                            <input type="file" id="Carga_Imagen" name="Carga_Imagen" accept="image/*" value="../../WebMaq/NoImagen.png"><br>
                        </div>

                        <div style="width: 100%;padding-top: 30px;">
                            <input type="text" id="Categorias" >
                            <a id="ACategorias" class="btn btn-primary">Agregar </a><a class="btn btn-success" onclick="Limpiar1()">Nuevo </a>
                            <h5 id="IDC" style="display: none;">0</h5>
                        </div>
                    </div>
                </div>

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
                <h4>Categoria actual: <br>   <span id="dCategoria" style="color:darkred; text-align: right;padding-left: 2em;"></span> </h4>
                <div style="padding-top: 1em;text-align: center; padding-bottom: 1em;">

                    <input type="text" id="SubCaegorias" >
                    <a id="ASub" class="btn btn-primary">Agregar </a><a class="btn btn-success" onclick="Limpiar2()">Nuevo </a>
                    <h5 id="IDS" style="display: none;">0</h5>
                </div>

                <table id="TSub" class="paleBlueRows"  >
                    <thead>
                    <tr style="background: #fe672e;"> <th>SubCategorias</th> </tr>
                    </thead>
                    <tbody id="BTSub">
                    <tr><td>SubCategoria  <a class="btn"> Eliminar</a></td></tr>
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
    function CSub(id) {
        Limpiar2();
        let d={T:53,ID:id};
        $.post("cgi/CWeb.php", d, function(result) {
            let Datos = result.split("|");
            document.getElementById('IDS').innerText=Datos[0];
            document.getElementById('SubCaegorias').value=Datos[1];
        });
    }

    function MTediSub() {
        let X= document.querySelectorAll('#BTSub tr');
        let B= document.querySelectorAll('#BTSub .borra2');

        for(let y=0;y < X.length; y++ ) {
            X[y].addEventListener("click", function (e) {
                e.preventDefault();
                CSub(this.getAttribute('data-id'));
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
            CargatSub();
        });
    }

    function CargatSub(){
        let c=parseInt(document.getElementById('IDC').innerHTML);
        $("#BTSub").load("cgi/tweb.php?T=21&C="+c, function (res) {
            MTediSub();
        });//
    }

    function GrabarS() {
        document.getElementById('ASub').addEventListener("click",function (e) {
            e.preventDefault();
            let d;
            let CAT =parseInt( document.getElementById('IDC').innerText);
            let Id = document.getElementById('IDS').innerText;
            let SubCaegorias = document.getElementById('SubCaegorias').value.trim();

            if (SubCaegorias.length < 2) {
                alert("Falta SubCaegoria");
                return;
            }
            if (CAT < 1) {
                alert("Falta la Categoria");
                return;
            }

            d = {T: 52, Titulo: SubCaegorias, ID: Id, ID2:CAT};
            $.post("cgi/CWeb.php", d, function (result) {
                CargatSub();
                Limpiar2();
            });
        });
    }
</script>

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
    function CRub(id) {
        Limpiar1();
        let d={T:7,ID:id};
        $.post("cgi/CWeb.php", d, function(result) {

            let Datos = result.split("|");
            document.getElementById('IDC').innerText=Datos[0];
            document.getElementById('Categorias').value=Datos[1];
            document.getElementById('dCategoria').innerHTML=Datos[1];
            document.getElementById('eImg').setAttribute("src",Datos[2]);

            CargatSub();
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
        let B= document.querySelectorAll('#BTCategorias .borra2');

        for(let y=0;y < X.length; y++ ) {
            X[y].addEventListener("click", function (e) {
                e.preventDefault();
                CRub(this.getAttribute('data-id'));
            });

            B[y].addEventListener("click", function (e) {
                e.preventDefault();
                e.cancelBubble = true;
                if (e.stopPropagation) e.stopPropagation();
                if(confirm("Seguro que quiere borrar la Categoria?")){
                    BRubro( B[y].parentNode.parentNode.getAttribute('data-id'));
                }
            });
        }
    }
    function Limpiar1(){
        document.getElementById('Categorias').value="";
        document.getElementById('IDC').innerHTML="";
        document.getElementById('eImg').setAttribute('src','../../WebMaq/NoImagen.png');
    }
    function Limpiar2(){
        document.getElementById('SubCaegorias').value="";
        document.getElementById('IDS').innerHTML="";

    }
    function CargatRub(){
        $("#BTCategorias").load("cgi/tweb.php?T=2", function (res) {
            MTeditor();
        });//
    }
    function GrabarR() {
        document.getElementById('ACategorias').addEventListener("click",function (e) {
            e.preventDefault();
            let d;
            let Id = document.getElementById('IDC').innerText;
            let Categorias = document.getElementById('Categorias').value.trim();
            let ima = document.getElementById('eImg').getAttribute("src");

            if (Categorias.length < 2) {
                alert("Falta Categoria");
                return;
            }
            d = {T: 6, Titulo: Categorias, ID: Id, imagen:ima};
            $.post("cgi/CWeb.php", d, function (result) {
                location.reload();
            });
        });
    }



    (function () {
        FileAjax("Carga_Imagen",1);
        CargatRub();
        GrabarR();
        GrabarS()
    } )();
</script>


</body>
</html>