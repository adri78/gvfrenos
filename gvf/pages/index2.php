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
    <style>
        .B{
            width: 32% !important;
        }
        .marco{
            border: 2px solid black;
            box-sizing: border-box;
            padding: 10px;
            overflow: hidden;
        }
        #TDes, #Totros{
            margin: 10px;
        }
        #TDes th,#Totros th{text-align: center;}
        #TDes td:nth-child(1) {
                     text-align: center;
                 }
        #TDes td:nth-child(2),#TDes td:nth-child(3),#Totros td:nth-child(2) {
            text-align: right;
            margin-left: 5px;
        }
        #TDes tr:nth-child(even){
            background: #1dcf9f;
        }
        #Totros tbody tr:nth-child(even){
            background: #9f9f9f;
        }
        tbody tr:hover{
            background: #449d44 !important;
        }
    </style>




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


</head>
<body onkeydown="return pulsar(event)">
<?php
    include 'menu.php';
?> 
    <div class="row marco">
         <div>
        <div class="col-md-6">
            <div class=" input-group col-md-6" style="padding-left: 2em;">
                <p class="input-group-addon">COD</p>
                <input class="form-control" placeholder="Codigo" id="Cod" type="text">
            </div><br>
            <div class=" input-group " style="padding-left: 2em;margin:0px">
                <p class="input-group-addon">Articulo</p>
                <input class="form-control" placeholder="Articulo" id="Art" type="text">
            </div><br>
            <div class=" input-group col-md-11" style="padding-left: 2em;margin:0px">
                <p class="input-group-addon">Categoria</p>
                <select name="Cat" id="Cat" class="form-control">
                    <option value=""> Todos</option>
                </select>
            </div><br>
            <div class=" input-group col-md-11" style="padding-left: 2em;margin:0px">
                <p class="input-group-addon">SubCate</p>
                <select name="SCat" id="SCat" class="form-control">
                    <option value=""> Todos</option>
                </select>
            </div>
            <br>
            <div class="row">
                <div class=" col-md-6">
                    <div class=" input-group" style="padding-left: 2em;margin:0px">
                        <p class="input-group-addon">Precio</p>
                        <input class="form-control" placeholder="Precio" id="Pre" type="text" style="text-align: right;">
                    </div>
                </div>



                <div  class="col-md-6">
                    <a class="btn btn-success B">Grabar</a>
                    <a class="btn btn-info B">Salir</a>
                    <a class="btn btn-danger B">Borrar</a>
                 </div>
            </div>

            <br>
            <div class="row">
                    <div class="col-md-6">

                            <table class="table sortable" id="TDes">
                                <thead  class="Titulo" style=" background: black; color:snow;">
                                <tr><th> Lista   <a class="btn btn-warning btn-xs "> + </a></th><th>%</th><th>Final</th></tr>
                                </thead>
                                <tbody id="ListDes">
                                    <tr>
                                        <td data-id="1"> Lista 1</td>
                                        <td> 10%</td>
                                        <td> 12.50</td>
                                    </tr>
                                    <tr>
                                        <td data-id="1"> Lista 1</td>
                                        <td> 10%</td>
                                        <td> 12.50</td>
                                    </tr>
                                    <tr>
                                        <td data-id="1"> Lista 1</td>
                                        <td> 10%</td>
                                        <td> 12.50</td>
                                    </tr>
                                </tbody>
                            </table>

                    </div>
                    <div class="col-md-6">

                        <table class="table sortable" id="Totros">
                            <thead  class="Titulo" style=" background: black; color:snow;">
                            <tr><th> Campo   <a class="btn btn-warning btn-xs "> + </a></th><th>Dato</th></tr>
                            </thead>
                            <tbody id="Listotros">
                                <tr>
                                    <td data-id="1"> Campo 1</td>
                                    <td> 12.50</td>
                                </tr>
                                <tr>
                                    <td data-id="1"> Campo 1</td>
                                    <td> 12.50</td>
                                </tr>
                            </tbody>
                        </table>

                    </div>
            </div>
        </div>
      <div class="col-md-6"  style="text-align: center;" >
          <img src="../none.png" alt="Sin Imagen" style="margin: 10px;" id="eImg">
          <input type="file" id="Carga_Imagen" name="Carga_Imagen" accept="image/*" value="../../WebMaq/NoImagen.png">
      </div><!-- Fin col de la tabla -->
  </div>
        <div class="col-lg-4 cuadro">

        </div>



    </div>
    <!-- fin row -->

    <!-- /#wrapper -->
    <!-- jQuery -->
    <script src="../vendor/jquery/jquery.min.js"></script>
    <script src="../vendor/jquery/jquery-ui.js"></script>
    <script src="../vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="../vendor/metisMenu/metisMenu.min.js"></script>
    <script src="../js/comun.js"></script>
    <script type="text/javascript"  src="../js/sorttable.js"></script>
    <script src="../dist/js/sb-admin-2.js?1"></script>

<script>
    function CargaCat() {
        $("#Cat").load("cgi/tweb.php?T=24", function (res){
            document.getElementById("Cat").addEventListener("change", function() {
                let c=document.getElementById('Cat').value;
                $("#SCat").load("cgi/tweb.php?T=25&C=" +c , function (res){ });
            });
        });
    }

<!-- iniciar -->
    (function () {
        CargaCat();
        document.getElementById('eImg').addEventListener("dblclick",function (ev) {  document.getElementById('Carga_Imagen').click()}  )
    })();
</script>
</body>
</html>