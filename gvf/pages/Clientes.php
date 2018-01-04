<?php  include 'contenido.php'; ?>
<?php  include_once ('cgi/bd3.php'); ?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport"content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
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
        .DT{
            padding-right: 25px;
            padding-left: 25px;
            max-height: 40vh;
        }
        input:focus{background: #c6ffba;}
        textarea:focus{background: #c6ffba;}
        tbody tr:nth-child(2) {
            text-aling:center;
        }

        tbody tr:nth-child(even) {
            background-color: #d9e8ee;
        }

        tbody tr:nth-child(odd) {
            background-color: #fff;
        }
        #BT1NC tr{ background:rgb(200,200,145) ; }

        #BT1NC tr td:nth-child(2) {
            text-align: center;
        }
        #BT1NC tr td:nth-child(3) {
            text-align: center;
        }
        #BT1NC tr td:nth-child(4) {
            text-align: right;
        }
        #BT1NC tr td:nth-child(5) {
            text-align: right;
        }
        #BT1NC tr:hover{
            background: aqua;
        }
        tbody tr:hover{
            background: aqua;
        }
        tbody tr td:nth-child(5){
            text-align: center;
        }
        .T1{
            background: #178cfe;
            padding-bottom: 0px;
            padding-top: 10px;
            margin-bottom: 20px;
    </style>



</head>
<body>
<?php
    include 'menu.php';
?>

    <div class="row">
        <!--                  -------------  -->
        <div class="col-lg-11 NV" style="margin:40px;  border: 1.5px solid #0B6FA4;" id="FAlta">
            <div>
                <h2>  Ficha Cliente  <span id="ID" class="NV">0</span></h2>
                <div class="col-lg-6">
                    <div class="form-group input-group">
                        <span class="input-group-addon"><p class="TD" style="margin: 0px;">Cliente:</p></span>
                        <input type="text" class="form-control" id="FCliente"  onkeypress="DeHasta('FCliente','NComercial')">
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group input-group">
                        <span class="input-group-addon"><p class="TD" style="margin: 0px;">N.Comercial:</p></span>
                        <input type="text" class="form-control" id="NComercial"  onkeypress="DeHasta('NComercial','FDire')">
                    </div>
                </div>
                <div class="col-sm-8">
                    <div class="form-group input-group">
                        <span class="input-group-addon"><p class="TD" style="margin: 0px;">Dire:</p></span>
                        <input type="text" class="form-control" id="FDire"  onkeypress="DeHasta('FDire','FZona')">
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group input-group">
                        <span class="input-group-addon"><p class="TD" style="margin: 0px;">Zona:</p></span>
                        <select class="form-control" id="FZona"  onkeypress="DeHasta('FZona','FEmail')">
                            <?php
                            $sql = "SELECT `idz`, `Zonas` FROM `t_zonas` ORDER BY `Zonas` ASC";
                            $segmento = mysqli_query($mysqli, $sql );

                            while ( $row = mysqli_fetch_array( $segmento ) ) {

                                echo '<option value="' . $row["idz"]. '">' . $row["Zonas"] . '</option>';
                            }
                            mysqli_free_result($resultado);
                            ?>
                        </select>
                    </div>
                </div>
                <div class="col-sm-7">
                    <div class="form-group input-group">
                        <span class="input-group-addon"><p class="TD" style="margin: 0px;">Email:</p></span>
                        <input type="text" class="form-control" id="FEmail"  onkeypress="DeHasta('FEmail','FTel')">
                    </div>
                </div>
                <div class="col-sm-5">
                    <div class="form-group input-group">
                        <span class="input-group-addon"><p class="TD" style="margin: 0px;">Tel:</p></span>
                        <input type="text" class="form-control" id="FTel"  onkeypress="DeHasta('FTel','Nota')">
                    </div>
                </div>
                <div class="col-sm-8">
                    <div class="form-group input-group">
                        <span class="input-group-addon"><p class="TD" style="margin: 0px;">Nota:</p></span>
                        <textarea rows="4" cols="50" class="form-control" id="Nota"  onkeypress="DeHasta('Nota','Lista')"></textarea>

                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group input-group">
                        <span class="input-group-addon"><p class="TD" style="margin: 0px;">Lista:</p></span>
                        <select class="form-control" id="Lista"  onkeypress="DeHasta('Lista','User')">
                            <?php
                            $sql = "SELECT `idList`, `Lista` FROM `t_lista` ORDER BY `Lista` ASC ;";
                            $segmento = mysqli_query($mysqli, $sql );

                            while ( $row = mysqli_fetch_array( $segmento ) ) {
                                echo '<option value="' . $row["idList"]. '"> Lista ' . $row["Lista"] . '</option>';
                            }
                            mysqli_free_result($resultado);
                            ?>
                        </select>
                    </div>
                </div>
                <div class="col-sm-6 T1" >
                    <div class="form-group input-group">
                        <span class="input-group-addon"><p class="TD" style="margin: 0px;">User:</p></span>
                        <input type="text" maxlength="6" class="form-control TC" id="User" onkeypress="DeHasta('User','Pass')"  >
                    </div>
                </div>
                <div class="col-sm-6 T1">
                    <div class="form-group input-group">
                        <span class="input-group-addon"><p class="TD" style="margin: 0px;">Pass:</p></span>
                        <input type="text" maxlength="6" class="form-control TC" id="Pass" onkeypress="DeHasta('Pass','btngracli')">
                    </div>
                </div>


                <div class="modal-footer" style="padding-top: 20px;">
                    <div class="col-sm-6">
                        <button type="button" class="btn btn-danger btn-lg btn-block" data-dismiss="modal" id="BSalir" >Salir</button>
                    </div>
                    <div class="col-sm-6">
                        <button type="button" class="btn btn-success btn-lg btn-block" id="btngracli" onclick="btngracli()">Grabar</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- ***************************************** -->
        <div class="col-lg-12 DT">
            <div class="col-lg-7">
                <div class=" form-group input-group">
                    <span class="input-group-addon">Buscar:</span>
                    <input type="text" class="form-control" placeholder="Buscar" id="Buscar" autocomplete="off" onfocus="CargaClientes()">
                </div>
            </div>
            <div class="col-lg-4">
                <buton class="btn btn-success"  id="NuCli" onclick="LimpiaCli()">Nuevo</buton>
            </div>

            <table width="98%" class="table table-bordered sortable" id="TCLientes">
                <thead class="Titulo">
                    <tr>
                        <th>Cliente</th><th>N.Comercial</th><th>Domicilio</th><th width="190px">Tel</th><th width="90px" >Lista</th>
                        <th width="100px">MENU</th>
                    </tr>
                </thead>
                <tbody id="BTCli"> </tbody>
            </table>
        </div>


    </div>
    <!-- fin row-->

<!-- /.modal  alta clientes-->

<!-- /.modal -->

    <!-- /#wrapper -->
    <!-- jQuery -->
    <script src="../vendor/jquery/jquery.min.js"></script>
    <script src="../vendor/jquery/jquery-ui.js"></script>
    <script src="../vendor/bootstrap/js/bootstrap.min.js"></script>
    <!-- Metis Menu Plugin JavaScript -->
    <script src="../vendor/metisMenu/metisMenu.min.js"></script>
    <script src="../js/comun.js"></script>
    <script src="../js/sorttable.js"></script>
    <script src="../dist/js/sb-admin-2.js?1"></script>

<script>

    function LimpiaCli() {
        document.getElementById("FCliente").value="";
        document.getElementById("NComercial").value ="";
        document.getElementById("FDire").value ="";
        document.getElementById("ID").innerHTML="0";
        document.getElementById("FEmail").value ="";
        document.getElementById("FTel").value ="";
        document.getElementById("FZona").value="1";
        document.getElementById("Nota").value="";
        document.getElementById('User').value ="";
        document.getElementById('Pass').value ="";
        document.getElementById('FAlta').style.display ="block";
        document.getElementById("FCliente").focus();
    }
    function btngracli(){
           var cliente,NComercial,FDire,email,d,nota,estimado,id,tel,FZona,lista,user,pass;
           cliente=document.getElementById("FCliente").value.toUpperCase().trim();
            NComercial=document.getElementById("NComercial").value.trim();
            FDire=document.getElementById("FDire").value.trim();
            id=document.getElementById("ID").innerHTML;
            email=document.getElementById("FEmail").value.trim();
            tel=document.getElementById("FTel").value.trim();
            FZona=document.getElementById("FZona").value;
           nota=document.getElementById("Nota").value.trim();
           lista=document.getElementById('Lista').value;
            user=document.getElementById('User').value.trim().toUpperCase();
            pass=document.getElementById('Pass').value.trim().toUpperCase();
        if (cliente.length <= 3) {
            alert("Demaciado Corto");
            document.getElementById("FCliente").focus;
        } else {
            d = {
                M: 1,
                NComercial: NComercial,
                FDire: FDire,
                ID: id,
                Tel: tel,
                FZona: FZona,
                Cliente: cliente,
                Obs: nota,
                Email: email,
                Lista: lista,
                User: user,
                Pass: pass
            };

            $.post("cgi/Grabar.php", d, function (result) {
                document.getElementById('FAlta').style.display = "none";
                console.log(result);
                alert("Grabado");
                CargaClientes();
            });
        }
    }
    function CFCliente(id){
            let d={M:3,ID:id};
            $.post("cgi/Grabar.php", d, function(result) {
                    let Datos = result.split("|");
                document.getElementById('FAlta').style.display ="block";
                document.getElementById("ID").innerHTML=Datos[0];
                document.getElementById("FCliente").value=Datos[1];
                document.getElementById("FDire").value =Datos[2];
                document.getElementById("FEmail").value = Datos[3];
                document.getElementById("FTel").value = Datos[4];
                document.getElementById("FZona").value=Datos[5];
                document.getElementById("NComercial").value =Datos[6];
                document.getElementById('Lista').value=Datos[7];
                document.getElementById('User').value =Datos[8];
                document.getElementById('Pass').value ="";
                document.getElementById("Nota").value="";
                document.getElementById("FCliente").focus();

            });
     }
    function BoCliente(id){
        let d={M:2,ID:id};
        $.post("cgi/Grabar.php", d, function(result) {
            CargaClientes();
        });
    }
    function CargaClientes(){
        $("#BTCli").load("cgi/tweb.php?T=6", function (res) {
            TCliente();
        });
    }
    function TCliente() {
        let X= document.querySelectorAll('#BTCli tr');
        let B= document.querySelectorAll('#BTCli .borra2');

        for(let y=0;y < X.length; y++ ) {
            X[y].addEventListener("click", function (e) {
                e.preventDefault();
                CFCliente(this.getAttribute('data-id'));
            });

            B[y].addEventListener("click", function (e) {
                e.preventDefault();
                e.cancelBubble = true;
                if (e.stopPropagation) e.stopPropagation();
                if(confirm("Seguro que quiere borrar al cliente ?")){
                    BoCliente( B[y].parentNode.parentNode.getAttribute('data-id'));
                }
            });
        }
    }

    $(document).ready(function() {
        CargaClientes();
        document.getElementById('BSalir').addEventListener('click',function (ev) {
            document.getElementById('FAlta').style.display="none";
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
    $("#Buscar").keyup(function () {/* ******************    Motor del Buscador      ******************************************** */
        if (jQuery(this).val() != "") {
            jQuery("#TCLientes tbody>tr").hide();
            jQuery("#TCLientes td:contiene-palabra('" + jQuery(this).val() + "')").parent("tr").show();
        }
        else {
            jQuery("#TCLientes tbody>tr").show();
        }
    });
</script>

<?php  mysqli_close($mysqli); ?>
</body>
</html>