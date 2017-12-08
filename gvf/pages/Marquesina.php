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
</head>
<body style="margin: 10px;">
<?php
    include 'menu.php';
?> 
    <div class="row">
        <div id="contenido">
   <!-- **********************************************************************************************************-->
  <!-- *********************************************************************************************************** -->
            <style>
                body{
                    background: #656565;
                }
                input:focus,textarea:focus{
                    background: rgb(214, 255, 163);
                }
                table{
                    background: white;
                }
                #idmarq{
                    display: none;
                }
            </style>
            <div class="col-lg-4"  style="background: #36cfff; border-radius: 15px; padding-bottom: 1em;">
                <h3 style="text-decoration: underline;font-weight: bold;font-style: oblique; ">Marquesina <label  id="idmarq" > 0</label></h3>
                <form>
                    <div class="form-group">

                        <label for="Maq_titulo">Titulo</label>
                        <input type="text" class="form-control" id="Maq_titulo" placeholder="Titulo">

                    </div>
                    <div class="form-group">
                        <label for="Maq_subtitulo">Subtitulo</label>
                        <input type="text" class="form-control" id="Maq_subtitulo" placeholder="Sub Titulo">
                    </div>
                    <div class="form-group">
                        <label for="Maq_texto">Detalle</label>
                        <textarea type="text" class="form-control" id="Maq_texto" placeholder="Texto"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="Maq_Link">Link</label>
                        <input type="text" class="form-control" id="Maq_Link" placeholder="Link">
                    </div>
                    <div class="col-xs-6" style="overflow: hidden">
                        <div class="form-group"><br>

                            <label for="Carga_Imagen">Imagen</label>
                            <input type="file" id="Carga_Imagen" name="Carga_Imagen" accept="image/*" value="../../WebMaq/NoImagen.png">
                        </div>
                    </div>
                    <div class="col-xs-6">
                        <img src="../../WebMaq/NoImagen.png" alt="No hay Imagen" id="eImg" style="width: 150px;padding: 1em;">
                    </div>

                    <button class="btn btn-default btn-lg" style="width: 150px;" id="btnGrabarM">Grabar</button>
                    <a   class="btn btn-primary btn-lg" style="width: 150px;" onclick="Limpiar1()"> Nuevo</a>
                </form>
            </div>
            <div class="col-lg-8" style="max-height: 90vh;overflow-y: scroll ">

                <style>
                    #tmarquesina tr:hover{
                        background: #ffe673;
                    }
                    #tmarquesina tr td:nth-child(1) {
                        width: 150px;
                        height: 150px;
                    }
                    #tmarquesina tr td:nth-child(3) {
                        width: 150px;
                        vertical-align: middle;
                    }
                    #eImg ,#tmarquesina tr img {
                        width: 150px;
                        height: 150px;
                    }
                    .TTitulo{ background: #4d4d4d; color:white;}

                </style>

                <table class="table table-hover">
                    <thead><tr class="TTitulo"> <th>#</th> <th>Titulo</th><th>Menu</th></tr></thead>
                    <tbody id="tmarquesina">
                    <tr> <td> </td></tr>
                    </tbody>
                </table>

            </div><!-- Fin col de la tabla -->



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
    function GrabarM() {

        document.getElementById('btnGrabarM').addEventListener("click",function (e) {
            e.preventDefault();
            let d;
            let Id = document.getElementById('idmarq').innerText;
            let Titulo = document.getElementById('Maq_titulo').value;
            let subT = document.getElementById('Maq_subtitulo').value;
            let Texto = document.getElementById('Maq_texto').value;
            let Link = document.getElementById('Maq_Link').value;
            let ima = document.getElementById('eImg').getAttribute("src");
            console.log("Ima "+ ima);
            if (Titulo.length < 2) {
                alert("Falta Titulo");
                return;
            }
            /*         if (Texto.length < 2) {
							  alert("Falta Texto");
							  return;
						  }
			  */
            d = {T: 2, Titulo: Titulo, Stitulo: subT, Detalle: Texto, Link: Link, imagen: ima, ID: Id};
            $.post("cgi/CWeb.php", d, function (result) {

                location.reload(true);

            });
        });
    }

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

    function Cemaq(id) {
        Limpiar1();
        let d={T:3,ID:id};
        $.post("cgi/CWeb.php", d, function(result) {
            let Datos = result.split("|");
            document.getElementById('idmarq').innerText=Datos[0];
            document.getElementById('Maq_titulo').value=Datos[1];
            document.getElementById('Maq_subtitulo').value=Datos[2];
            document.getElementById('Maq_texto').value=Datos[3];
            document.getElementById('eImg').setAttribute("src",Datos[4]);
            document.getElementById('Maq_Link').value=Datos[5];
        });
    }

    function BMarque(id){
        let d={T:1,M:1,ID:id};
        $.post("cgi/CWeb.php", d, function(result) {
            CargatMaq();
        });
    }

    function MTeditor() {
        let X= document.querySelectorAll('#tmarquesina tr');
        let B= document.querySelectorAll('#tmarquesina .borra');

        for(let y=0;y < X.length; y++ ) {
            X[y].addEventListener("click", function (e) {
                e.preventDefault();
                Cemaq(this.getAttribute('data-id'));
            });

            B[y].addEventListener("click", function (e) {
                e.preventDefault();
                e.cancelBubble = true;
                if (e.stopPropagation) e.stopPropagation();
                if(confirm("Seguro que quiere borrar el articulo?")){
                    BMarque( B[y].parentNode.parentNode.getAttribute('data-id'));
                }
            });
        }
    }

    function Limpiar1(){
        document.getElementById('idmarq').innerText="0";
        document.getElementById('Maq_titulo').value="";
        document.getElementById('Maq_subtitulo').value="";
        document.getElementById('Maq_texto').value="";
        document.getElementById('Maq_Link').value="";
        document.getElementById('eImg').setAttribute("src","../WebMaq/NoImagen.png");
        document.getElementById('Carga_Imagen').value="";
        console.log("Limpio 1");
    }

    function CargatMaq(){
        $("#tmarquesina").load("cgi/tweb.php?T=1", function (res) {
            MTeditor();
        });//
    }

    (function () {
        CargatMaq();
        FileAjax("Carga_Imagen",1);
        GrabarM();
    } )();

    /********************************************************************  */

</script>


</body>
</html>