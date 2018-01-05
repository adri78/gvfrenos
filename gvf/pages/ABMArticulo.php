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
    <link href="../dist/css/sb-admin-2.css?2" rel="stylesheet">
    <link href="../vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <!-- ****************************************************************************************************** -->
<style>
    #ListArt td{
        padding: 2px ;
    }

    #ListArt tr:hover{background:aqua;}
    td:nth-child(1) { text-align: right; width: 100px; padding-right: 15px !important;}
    td:nth-child(4) { text-align:center;}

    td:nth-child(3) { text-align: right; background: darkseagreen; }
    th:nth-child(4) { text-align:center;}
    th:nth-child(1) { text-align: right;}

     #Ttmp{
        max-height: 90vh;
        overflow: scroll;
        display: table !important;
    }
  /*  th:nth-child(3) { text-align: right; }*/

</style>
</head>
<body>
<?php
    include 'menu.php';
?> 
    <div class="row">

        <div class="col-lg-6">

            <div class="form-group input-group" style="padding-left: 2em;">
                <p class="input-group-addon"><i class="fa fa-edit" style="margin:0px;"></i></p>
                <input type="text" class="form-control" placeholder="Codigo / Articulo" id="Bus">
            </div>
            <br>
            <div style="margin-top:-10px;">
                 <div class="col-md-6">
                      <select name="otros" class="form-control" id="otros">
                                <option value=""> -- </option>
                      </select>
                 </div>
                 <div class="col-md-6">
                       <input type="text" id="BusOtros" class="form-control">
                 </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="col-lg-6">
                <label for="Cat">Categoria</label>
                <select name="Cat" id="Cat" class="form-control">
                    <option value=""> Todos</option>
                </select>
                <br>
                <a class="btn btn-info btn-block" > Nuevo </a>

            </div>
            <div class="col-lg-6">
                <label for="Cat">SubCate</label>
                <select name="SCat" id="SCat" class="form-control">
                    <option value=""> Todos</option>
                </select>
                <h4 style="text-align: center" > 0/ <span id="tarticulos"> 0</span> </h4>
            </div>
        </div>
        <div class="col-lg-12">

            <table class="table sortable" id="Ttmp" style=" margin:1em;">
                <thead  class="Titulo" style=" background: black; color:snow;">
                    <tr><th>Codigo</th><th>Articulo</th><th>Precio</th><th>Categoria</th><th>Sub</th><th>Otros</th><th></th></tr>
                </thead>
                <tbody id="ListArt">
                </tbody>
            </table>

        </div>
    </div>
    <!-- fin row -->




    <!-- /#wrapper -->
    <!-- jQuery -->
    <script src="../vendor/jquery/jquery.min.js"></script>
    <script src="../vendor/bootstrap/js/bootstrap.min.js"></script>
    <!-- Metis Menu Plugin JavaScript -->
    <script src="../vendor/metisMenu/metisMenu.min.js"></script>
    <script src="../js/comun.js"></script>
    <script src="../js/sorttable.js"></script>
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

    function CargarTabla(){
        document.getElementById('Ttmp').style.display="none";
        $("#ListArt").load("cgi/tweb.php?T=100", function (res) {
            document.getElementById('Ttmp').style.display="block";
            document.getElementById("tarticulos").innerHTML= document.getElementById("ListArt").rows.length;
        });
    }
    $(document).ready(function() {
        CargaCat();
        CargarTabla();
        $("input[type=text]").focus(function(){
            this.select();
        });
        $("#Bus").keydown(function(e){
            if (e.keyCode==13){
                e.preventDefault();

                return false;
            }
        });
    });

</script>
<script>
    jQuery.extend(jQuery.expr[":"],
        {
            "contiene-palabra": function (elem, i, match, array) {
                return (elem.textContent || elem.innerText || jQuery(elem).text() || "").toLowerCase().indexOf((match[3] || "").toLowerCase()) >= 0;
            }
        });

    $("#Bus").keyup(function () {/* ******************    Motor del Buscador      ******************************************** */

       if (jQuery(this).val() != "") {
          console.log("filtrando");
          jQuery("#Ttmp tbody>tr").hide();
          jQuery("#Ttmp td:contiene-palabra('" + jQuery(this).val() + "')").parent("tr").show();

      }
      else {
          jQuery("#Ttmp tbody>tr").show();
      }
  });
</script>
</body>
</html>