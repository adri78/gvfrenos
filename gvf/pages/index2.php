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
            margin: 1em;
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
        #TListas{
            background: #bcbcbc;
            width: 100%;
        }
        .LArt  td:nth-child(1){
            text-align: center;

        }
        .LArt  td:nth-child(3){
            text-align: right;
            margin-right: 10px;
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
  <div class="row marco NV" id="fichas">
         <div>
        <div class="col-md-6">
            <div class=" input-group col-md-6">
                <p class="input-group-addon">COD <span id="Artid"></span></p>
                <input class="form-control" placeholder="Codigo" id="Cod" type="text">
            </div><br>
            <div class=" input-group " style="margin:0px">
                <p class="input-group-addon">Articulo</p>
                <input class="form-control" placeholder="Articulo" id="Art" type="text">
            </div><br>
            <div class=" input-group col-md-11" style="margin:0px">
                <p class="input-group-addon">Categoria</p>
                <select name="Cat" id="Cat" class="form-control">
                    <option value=""> Todos</option>
                </select>
            </div><br>
            <div class=" input-group col-md-11" style="margin:0px">
                <p class="input-group-addon">SubCate</p>
                <select name="SCat" id="SCat" class="form-control">
                    <option value=""> Todos</option>
                </select>
            </div>
            <br>
            <div class="row">
                <div class=" col-md-6">
                    <div class=" input-group" style="margin:0px">
                        <p class="input-group-addon">Precio</p>
                        <input class="form-control" placeholder="Precio" id="Pre" type="text" style="text-align: right;">
                    </div>
                </div>



                <div  class="col-md-6">
                    <a class="btn btn-success B" onclick="AltaArt();">Grabar</a>
                    <a class="btn btn-info B" onclick="document.getElementById('fichas').style.display='none';">Salir</a>
                    <a class="btn btn-danger B" onclick="BorrART();">Borrar</a>
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

    </div>

  <div class="row" style="padding-left: 1em;margin:0px;padding-top: 1em;">
    <div class="col-md-6">
     <!---------------------------------------------------------------------------- -->
        <div class=" input-group col-md-11">
            <p class="input-group-addon">Categoria</p>
            <select name="FCat" id="FCat" class="form-control">
                <option value=""> Todos</option>
            </select>
        </div><br>
        <div class="form-group input-group" >
            <p class="input-group-addon"><i class="fa fa-edit" style="margin:0px;"></i></p>
            <input type="text" class="form-control" placeholder="Codigo / Articulo" id="Bus" onkeyup="BuscaGene()">
        </div>
    </div>
    <div class="col-md-6">
          <div class=" input-group col-md-11">
              <p class="input-group-addon">Sub Cate</p>
              <select name="FSCat" id="FSCat" class="form-control">
                  <option value=""> Todos</option>
              </select>
          </div>

        <br>
    </div>
   <div class="col-md-6">
        <div  class="form-group input-group" style="width: 100%;">
            <div class="col-xs-6">
                <select name="otros" class="form-control" id="otros">
                    <option value=""> -- </option>
                </select>
            </div>
            <div class="col-xs-4">
                <input type="text" id="BusOtros" class="form-control">

            </div>
            <div class="col-xs-2">
                <a class="btn btn-success btn-lg" id="BtnNuevo">Nuevo</a>

            </div>
        </div>
   </div>
        <!-- *********************************************************************** -->


  </div>

<div class="row">      <!-------------  Listas  --------------------------------------------------------------- -->
 <div class="col-md-12" id="TListas">



 </div>




</div>  <!-- *********************** Listas ********************************* -->


    <!-- fin row -->

    <!-- /#wrapper -->
    <!-- jQuery -->
    <script src="../vendor/jquery/jquery.min.js"></script>
    <script src="../vendor/jquery/jquery-ui.js"></script>
    <script src="../vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="../vendor/metisMenu/metisMenu.min.js"></script>
    <script src="../js/comun.js"></script>
    <script type="text/javascript"  src="../js/jquery.tablesorter.js"></script>
    <script src="../dist/js/sb-admin-2.js?1"></script>

<script>
    function OcultaTablas() {
        let x= document.querySelectorAll(".LArt");
        for (let i=0;i < x.length ; i++){
            x[i].style.display="none";
        }
    }

    '------  Script de articulos ------------ '
    function CargaCat() {
        $("#Cat").load("cgi/tweb.php?T=24", function (res){
            document.getElementById('FCat').innerHTML=res;
            document.getElementById("Cat").addEventListener("change", function() {
                let c=document.getElementById('Cat').value;
                $("#SCat").load("cgi/tweb.php?T=25&C=" +c , function (res){});

            });
        });
        document.getElementById("FCat").addEventListener("change", function() {
                OcultaTablas();
                $("#FSCat").load("cgi/tweb.php?T=25&C=" + document.getElementById('FCat').value, function (res){
                });
                $("#otros").load("cgi/tweb.php?T=7&C=" + document.getElementById('FCat').value , function (res){
                    document.getElementById('BusOtros').value="";
                });
             let c=document.getElementById('FCat').value;
             let cla="#LA"+ c ;
             let cla2='TT'+c;
             let cla3='#TT'+c;
             $(cla).load("cgi/tweb.php?T=102&C=" +c , function (e) {
                 document.getElementById(cla2).style.display="table";
                 $(cla3).tableSorter();
                 let X= document.querySelectorAll(cla3 +' tr');
                 for(let y=0;y < X.length; y++ ) {
                     X[y].addEventListener("click", function (e) {
                         e.preventDefault();
                         VerArt(this.getAttribute('data-id'));
                     });
                 }
            });
        });

        document.getElementById('FSCat').addEventListener("change", function() { SubFiltro();});
    }
function LimpiART() {
    document.getElementById('Artid').innerText="";
    document.getElementById('Cod').value="";
    document.getElementById('Art').value="";
    document.getElementById('Pre').value="";
    document.getElementById('Cat').value="";
    document.getElementById('SCat').value="";


    document.getElementById('eImg').setAttribute("src","none.png");
    document.getElementById('Cod').focus();
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

  /* ********************  Buscador ***************************************** */
    function PreFiltro() {
        let c=document.getElementById('FCat').value;
        let Tc='TT'+c;
        tr = document.getElementById(Tc).getElementsByTagName("tr");
        for (let i = 0; i < tr.length; i++) {
            tr[i].style.display = "";
        }
        SubFiltro();
    }


    function BuscaGene() {

        var Bus, c , table, tr, td,td2, i,Tc;
        Bus = document.getElementById("Bus").value.toUpperCase();
        if (Bus.length >2){
            c=document.getElementById('FCat').value;
            let cs=document.getElementById('FSCat').value;
            Tc='TT'+c;
            table = document.getElementById(Tc);
            tr = table.getElementsByTagName("tr");

            for (i = 0; i < tr.length; i++) {
                td = tr[i].getElementsByTagName("td")[0];
                td2 = tr[i].getElementsByTagName("td")[1];
                if (td) {
                    if (((td.innerHTML.toUpperCase().indexOf(Bus) > -1) ||(td2.innerHTML.toUpperCase().indexOf(Bus) > -1))&& (( tr[i].getAttribute("data-sc") == cs)||( cs == "" ))) {
                        tr[i].style.display = "";
                    } else {
                        tr[i].style.display = "none";
                    }
                }
            }
        }
       if (Bus.length < 2 ){PreFiltro()}
    }

    function SubFiltro() {
        let c=document.getElementById('FCat').value;
        let cs=document.getElementById('FSCat').value;
        let Tc='TT'+c;
        tr = document.getElementById(Tc).getElementsByTagName("tr");
        for (let i = 1; i < tr.length; i++) {
           if (( tr[i].getAttribute("data-sc") == cs)||( cs == "" )){
               tr[i].style.display = "";
           }else{
               tr[i].style.display = "none";
           }
        }
    }

    function VerArt(id) {
        document.getElementById('fichas').style.display="block";
        let d={T:20,ID:id};
        $.post("cgi/CWeb.php", d, function(result) {
            /* "$ID|$Codigo|$Art|$Precio|$cat|$SC|$imagen"; */
            let Datos = result.split("|");
            document.getElementById('Artid').innerText=Datos[0];
            document.getElementById('Cod').value=Datos[1];
            document.getElementById('Art').value=Datos[2];
            document.getElementById('Pre').value=Datos[3];
            document.getElementById('Cat').value=Datos[4];
            $("#SCat").load("cgi/tweb.php?T=25&C=" + Datos[4], function (res){
                document.getElementById('SCat').value=Datos[5];
            });

            document.getElementById('eImg').setAttribute("src",Datos[6]);
            document.getElementById('Cod').focus();
           /* CargatSub();*/
        });
    }

    function BorrART() {
        let id=document.getElementById('Artid').innerHTML;
        let d={T:21,ID:id};
        if(confirm("Seguro que va a Borrar este Articulo ?")){
            $.post("cgi/CWeb.php", d, function(result) {
                alert("Articulo Borrado");
                document.getElementById('fichas').style.display="none";
                location.reload();
            });
        }

    }

    function AltaArt(){
       // `Codigo`, `Art`, `Precio`, `cat`, `SC`, `imagen`
        let ID =document.getElementById('Artid').innerText;
        let Codigo=document.getElementById('Cod').value;
        let Art=document.getElementById('Art').value;
      //  let Precio= document.getElementById('Pre').value ;
        let Precio=parseFloat( document.getElementById('Pre').value || 0 ).toFixed(2);
        let cat=document.getElementById('Cat').value;
        let SC=document.getElementById('SCat').value;
        let imagen=  document.getElementById('eImg').getAttribute("src");
        let d ;

        /* Logica */


        if(Codigo.length < 3 ){
                alert("Falta Codigo");
            document.getElementById('Cod').focus();
                return;
        }
        if(Art.length < 3 ){
            alert("Falta Codigo");
            document.getElementById('Art').focus();
            return;
        }
        if (cat.length <1 ){
            alert("Debe tener una categoria");
            document.getElementById('Cat').focus();
            return;
        }
         if( isNaN(Precio)){
             Precio= 0.00;
         }

         if (SC < 1){
            SC=0;
         }
        /* fin Logica */

        d = {T: 22, ID: ID, Codigo: Codigo, Art: Art, Precio: Precio , cat: cat, SC: SC, imagen: imagen};
        console.log(d);

        $.post("cgi/CWeb.php", d, function (result) {
            console.log(result);
            alert("Grabado");
            document.getElementById('fichas').style.display="none";
            location.reload();
        });

    }
</script>

<script>
    <!-- iniciar -->
    (function () {
         FileAjax("Carga_Imagen",2);
        $("#TListas").load("cgi/tweb.php?T=101", function (e) {
            OcultaTablas();

        });
        CargaCat();
        document.getElementById('eImg').addEventListener("dblclick",function (ev) {  document.getElementById('Carga_Imagen').click()}  )

        document.getElementById('BtnNuevo').addEventListener("click",function(){

            document.getElementById('fichas').style.display="block";
            LimpiART();
        });


    })();
</script>
</body>
</html>