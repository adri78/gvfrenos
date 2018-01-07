
<?php

    include_once ('cgi/bd3.php');

    /*
    if( $_SESSION['Local1']==1){ $Lugar="Adrogue";}
    if( $_SESSION['Local1']==2){ $Lugar="Burzaco";}
    if( $_SESSION['Local1']==3){ $Lugar="Deposito";}
    if( $_SESSION['Local1']==4){ $Lugar="Admin";}
    if( $_SESSION['Local1']==5){ $Lugar="Gerente";}
    if( $_SESSION['Local1']==6){ $Lugar="Jefe";}
    */
?>
<?php



    $sql="SELECT `idver`, `nreal` FROM `ver` ORDER BY `nreal` ASC;";
    $segmento = mysqli_query($mysqli,$sql);
    $Usuaios="";

    while ($row = mysqli_fetch_array($segmento)) {
        $Usuaios=$Usuaios.'<option value="'.$row['idver'].'">'.$row['nreal'].'</option>';
    }
?>
    <div id="wrapper">

        <!-- *************************************************************************** -->
        <!--                      Menu                                                   -->
        <!-- *************************************************************************** -->
        <style>
            #msjs .msgtext{width: 40em;padding: 10px;background: #ccf2a9;}
            #VerTmsg {background: #5ca9ea;border-radius: 10px;padding: 15px;text-align: center; }
            #VerTmsg:hover{ background:#5fb5e6; }
            #divider {padding: 0;border: 1px solid #5d5d5d;}
            .FR{float:right;}
        </style>

              <nav class="navbar navbar-default" role="navigation">

                  <div class="navbar-header">
                      <button type="button" class="navbar-toggle" data-toggle="collapse"
                              data-target=".navbar-ex1-collapse">
                          <span class="sr-only">Desplegar navegación</span>
                          <span class="icon-bar"></span>
                          <span class="icon-bar"></span>
                          <span class="icon-bar"></span>
                      </button>
                      <a class="navbar-brand" >Administrar 0.1 - <?php echo $_SESSION['usuario']; ?></a>

                  </div>

              <!-- /.navbar-header -->
                <div class="collapse navbar-collapse navbar-ex1-collapse">
                    <ul class="nav navbar-nav navbar-right">
                       <li><a href="Listados.php"> Listados </a></li>
                       <li><a class="dropdown-toggle" data-toggle="dropdown" href="#" > ABM <i class="fa fa-caret-down"></i></a>
                           <ul class="dropdown-menu dropdown-messages">
                                 <li><a href="ABMCategorias.php">Categorias y Sub </a></li>
                                  <li><a href="ABMCampos.php">Campos por categorias</a></li>
                                 <li>------------------------------------</li>
                                  <li><a href="ABMListas.php">Listas</a></li>
                                  <li><a href="ABMArticulo.php">Articulos</a></li>
                               <li><a href="index2.php">Ficha</a></li>
                                 <li>-----------------------------------</li>
                                 <li><a href="ABMZonas.php"> Zonas </a></li>
                                 <li><a href="Clientes.php"> Clientes </a></li>
                           </ul>
                       </li>

                       <li><a class="dropdown-toggle" data-toggle="dropdown" href="#" > Informes <i class="fa fa-caret-down"></i></a>
                            <ul class="dropdown-menu dropdown-messages">
                                <li><a href="ReImprimir.php"> Re impresion Facturas</a></li>
                                <li><a href="informe1.php"> Listados e Informes</a></li>
                                <li><a href="NullFac.php"> Anular Factura</a></li>
                                <li><a href="informe1.php"> Stock Total</a></li>


                            </ul>
                       </li>
                       <?php
                            if(( $_SESSION['Local1'] >3)or ( $_SESSION['Local1']==2) ){
                                 echo '<li><a class="dropdown-toggle" data-toggle="dropdown" href="#" > WEB <i class="fa fa-caret-down"></i></a><ul class="dropdown-menu dropdown-messages">';
                                 echo '<li><a href = "Marquesina.php" > Marquesina </a></li> ';

                                 echo '<li><a href="ABMMarca.php">Automotriz</a></li>';
                                 echo '</ul></li>';
                            }
                       ?>

    

    <!-- /.dropdown -->
    <li class="dropdown">
        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
            <i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
        </a>
        <ul class="dropdown-menu dropdown-user">

            <?php
                if( $_SESSION['Local1'] ==4){
                  echo '<li><a href="c.php"><i class="fa fa-user fa-fw"></i> Usuarios</a></li>';
                  echo ' <li><a href="config.php"><i class="fa fa-gear fa-fw"></i> Configuracion</a></li>';
                }
            ?>
            <li class="divider"></li>
            <li><a href="../index.php"><i class="fa fa-sign-out fa-fw"></i> Loguin</a>
            </li>
        </ul>
        <!-- /.dropdown-user -->
    </li>
    <!-- /.dropdown -->

    </ul>
</div>

</nav>

    </nav>
    <!-- *************************************************************************** -->
    <!--              Fin Menu                                                     -->
    <!-- *************************************************************************** -->

