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
    ListArt tr:hover{background:aqua;}
    td:nth-child(4) { text-align:center;}
    td:nth-child(1) { text-align: right;}
    td:nth-child(3) { text-align: right; }
    th:nth-child(4) { text-align:center;}
    th:nth-child(1) { text-align: right;}
    th:nth-child(3) { text-align: right; }
</style>
</head>
<body>
<?php
    include 'menu.php';
?> 
    <div class="row">

        <div class="col-lg-6">
            <div class="form-group input-group" style="padding-left: 2em;">
                <p class="input-group-addon " ><i class="fa fa-edit" style="margin:0px;"></i></p>
                <input type="text" class="form-control" placeholder="Codigo / Articulo" id="Bus">

            </div>

        </div>
        <div class="col-lg-11">
            <div class="col-lg-3">
                <label for="Cat">Categoria</label>
                <select name="Cat" id="Cat" class="form-control">
                    <option value=""> Todos</option>
                </select>
            </div>
            <div class="col-lg-3">
                <label for="Cat">SubCate</label>
                <select name="SCat" id="SCat" class="form-control">
                    <option value=""> Todos</option>
                </select>
            </div>




            <table class="table  " id="Ttmp" style=" margin: 4em 3em 1em 1em;">
                <thead  class="Titulo" style=" background: black; color:snow;">
                <tr><th>Codigo</th><th>Articulo</th><th>Precio</th><th>Fecha</th></tr></thead>
                <tbody id="ListArt">
                <?php
                /*    include 'cgi/config2.inc';

                $formatter = new NumberFormatter('en_US', NumberFormatter::CURRENCY);
                $sql="SELECT `IdV`, `Fecha`, `Cliente` , `Total`, `Control`, `Local`, `Num` FROM `t_venta` WHERE `Local`=".$_SESSION['Local1'] ." ORDER BY `IdV` DESC LIMIT 10;";
                $segmento = mysqli_query($conexion,$sql);
                while ($row = mysqli_fetch_array($segmento)) {
                    echo '<tr data-id="'.$row["IdV"].'">';
                    $recibo=str_pad($row["Num"], 6, "0", STR_PAD_LEFT);
                    echo '<td>'.$recibo.'</td>';
                    echo '<td>'.$row["Cliente"].'</td>';
                    $Total=$formatter->formatCurrency( $row["Total"], 'USD');
                    echo '<td>'.$Total.'</td>';
                    $Fecha=  $row["Fecha"]  ;
                    echo '<td>'.$Fecha.'</td>';
                    echo '</tr>';
                }
*/
                ?>


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

    function mostrar(){
        $("#Tabla").load("cgi/tabla.php?T=10&L="+Local+"&D=" + document.getElementById("Bus").value, function (res) {console.log(res);});
    }
    $(document).ready(function() {
        CargaCat();

        $("input[type=text]").focus(function(){
            this.select();
        });
        $("#Bus").keydown(function(e){
            if (e.keyCode==13){
                e.preventDefault();
                mostrar();
                return false;
            }
        });
    });



</script>

</body>
</html>