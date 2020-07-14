<?php
  session_start();
  if(!isset($_SESSION['id_aluno']) or $_SESSION['id_aluno']==''){
    header('Location: ../sem_login_aluno.html');
  }
?>
<html lang="pt-br">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="Creative - Bootstrap 3 Responsive Admin Template">
  <meta name="author" content="GeeksLabs">
  <meta name="keyword" content="Creative, Dashboard, Admin, Template, Theme, Bootstrap, Responsive, Retina, Minimal">
  <link rel="shortcut icon" href="img/favicon.png">
  <title>Oficina do Aluno - Dashboard Administrador</title>
  <!-- Bootstrap CSS -->
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <!-- bootstrap theme -->
  <link href="css/bootstrap-theme.css" rel="stylesheet">
  <!--external css-->
  <!-- font icon -->
  <link href="css/elegant-icons-style.css" rel="stylesheet" />
  <link href="css/all.css" rel="stylesheet" />
  <!-- full calendar css-->
  <link href="assets/fullcalendar/fullcalendar/bootstrap-fullcalendar.css" rel="stylesheet" />
  <link href="assets/fullcalendar/fullcalendar/fullcalendar.css" rel="stylesheet" />
  <!-- easy pie chart-->
  <link href="assets/jquery-easy-pie-chart/jquery.easy-pie-chart.css" rel="stylesheet" type="text/css" media="screen" />
  <!-- owl carousel -->
  <link rel="stylesheet" href="css/owl.carousel.css" type="text/css">
  <link href="css/jquery-jvectormap-1.2.2.css" rel="stylesheet">
  <!-- Custom styles -->
  <link href="css/widgets.css" rel="stylesheet">
  <link href="css/style.css" rel="stylesheet">
  <link href="css/style-responsive.css" rel="stylesheet" />
  <link href="css/xcharts.min.css" rel=" stylesheet">
  <link href="css/jquery-ui-1.10.4.min.css" rel="stylesheet">

    <script>
        
        function mudar(){
            
            aulas=document.getElementById('aulas').value;
            valor_aula=document.getElementById('valor_aula').value;
            
            final=aulas*valor_aula;
            
            document.getElementById('valor').value=final;
            
        }
        
        function enviaPagseguro(){
            
            a=document.getElementById('valor').value;
            
            $.post('salvar_pedido.php',{valor:a},function(idPedido){
 
             $('#loading').css("display","block");
         
             $.post('pagseguro.php',{idPedido: idPedido, valor:a},function(data){
        
                alert(idPedido);
        
                alert(data);
        
               $('#code').val(data);
               $('#comprar').submit();
        
               $('#loading').css("display","none");
             })
           })
         
        }
        
    </script>

</head>

<body>
  <!-- container section start -->
  <section id="container" class="">
    <?php

    include('header.php');

    ?>
    <!--header end-->
    <!--sidebar start-->
    <?php

      include("menu.php");

    ?>
    <!--sidebar end-->
    <!--main content start-->
    <section id="main-content">
      <section class="wrapper">
        <!--overview start-->
        <div class="row">
          <div class="col-lg-12">
            <br><br>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-12">
            <section style="margin-top: -17px;" class="panel">
              <div class="panel-body">
                <h3 align="center">Realizar Pagamento</h3><br><br>
                <form id="comprar" action="https://pagseguro.uol.com.br/checkout/v2/payment.html" method="post" onsubmit="PagSeguroLightbox(this); return false;">
                    <input type='hidden' name='code' id='code' value=''>
                    
                </form>

                <div class='row'>
                    <div class='form-group col-md-1'></div>
                    <div class='col-md-4'>
                        <label class='control-label'>Nº de Aulas</label>
                    </div>
                    <div class='col-md-2'></div>
                    <div class='col-md-4'>
                        <label class='control-label'>Valor à ser Pago</label>
                    </div>
                    <div class='form-group col-md-1'></div>
                </div>

                <div class='row'>
                    <div class='form-group col-md-1'></div>
                    <div class='form-group col-md-4'>
                      <input id='aulas' type='text' class='form-control'>
                      
                  </div>
                  <div class='col-md-2'>
                      
                      <input type='button' onclick='mudar()' style='cursor: pointer;' class='form-control btn btn-info' value='->'>
                  </div>
                   <div class='form-group col-md-4'>
                      
                      <?php
                      
                    $id=$_SESSION['id_aluno'];

                      
                    require_once('../db.class.php');
                    
                    $objDb = new db();
                    $link = $objDb->conecta_mysql();
                    
                    $resultado_id = mysqli_query($link, "SELECT `sisOda_alunos_tipoDePlano` FROM `sisoda_alunos` WHERE `sisOda_alunos_id`='$id'");

                    if($resultado_id){

                        while($dados_login = mysqli_fetch_array($resultado_id, MYSQLI_ASSOC)){
                         
                            echo "<input type='hidden' id='valor_aula' value='".$dados_login['sisOda_alunos_tipoDePlano']."'></input>";
                            
                        }
                        
                    }
                      
                      ?>
                      
                      <input id='valor' name='valor' type='text' class='form-control'>
                      <br>
                  </div>
                <div class='form-group col-md-1'></div>
                </div>
                  
                  <div class='col-md-2'></div>
                  <div class="form-group col-md-8">
                      <input type="button" onclick="enviaPagseguro()" value="PAGAR" class="form-control btn btn-primary">
                      
                      <br>
                          <h3 id='loading' style='display:none' align='center'>Carregando...</h3>
                      
                  </div>
                  <div class='col-md-2'></div>
              </div>
            </section>
          </div>
        </div>
      </section>
    </section>
    <!--main content end-->
  </section>
  <!-- container section start -->
  <!-- javascripts -->
  <script src="js/jquery.js"></script>
  <script src="js/jquery-ui-1.10.4.min.js"></script>
  <script src="js/jquery-1.8.3.min.js"></script>
  <script type="text/javascript" src="js/jquery-ui-1.9.2.custom.min.js"></script>
  <!-- bootstrap -->
  <script src="js/bootstrap.min.js"></script>
  <!-- nice scroll -->
  <script src="js/jquery.scrollTo.min.js"></script>
  <script src="js/jquery.nicescroll.js" type="text/javascript"></script>
  <link rel='stylesheet' type='text/css' href='assets/fullcalendar/fullcalendar/fullcalendar.css' />
<link rel='stylesheet' type='text/css' href='assets/fullcalendar/fullcalendar/fullcalendar.print.css' media='print' />
<script type='text/javascript' src='assets/fullcalendar/fullcalendar/fullcalendar.min.js'></script>

    <script src="js/jquery.rateit.min.js"></script>
  <!-- charts scripts -->
  <script src="assets/jquery-knob/js/jquery.knob.js"></script>
  <script src="js/jquery.sparkline.js" type="text/javascript"></script>
  <script src="assets/jquery-easy-pie-chart/jquery.easy-pie-chart.js"></script>
  <script src="js/owl.carousel.js"></script>
    <!-- custom select -->
    <script src="js/jquery.customSelect.min.js"></script>
    <script src="assets/chart-master/Chart.js"></script>
    <!--custome script for all page-->
    <script src="js/scripts.js"></script>
    <!-- custom script for this page-->
    <script src="js/sparkline-chart.js"></script>
    <script src="js/easy-pie-chart.js"></script>
    <script src="js/jquery-jvectormap-1.2.2.min.js"></script>
    <script src="js/jquery-jvectormap-world-mill-en.js"></script>
    <script src="js/xcharts.min.js"></script>
    <script src="js/jquery.autosize.min.js"></script>
    <script src="js/jquery.placeholder.min.js"></script>
    <script src="js/gdp-data.js"></script>
    <script src="js/morris.min.js"></script>
    <script src="js/sparklines.js"></script>
    <script src="js/charts.js"></script>
    <script src="js/jquery.slimscroll.min.js"></script>
    <script>
    //knob
    $(function() {
      $(".knob").knob({
        'draw': function() {
          $(this.i).val(this.cv + '%')
        }
      })
    });

    //carousel
    $(document).ready(function() {
      $("#owl-slider").owlCarousel({
        navigation: true,
        slideSpeed: 300,
        paginationSpeed: 400,
        singleItem: true

      });
    });

    //custom select box

    $(function() {
      $('select.styled').customSelect();
    });
    </script>
    <script type="text/javascript" src="https://stc.pagseguro.uol.com.br/pagseguro/api/v2/checkout/pagseguro.lightbox.js"></script>

</body>

</html>