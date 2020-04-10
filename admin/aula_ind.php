<?php
  session_start();
  if(!isset($_SESSION['id_admin'])){
    header('Location: ../sem_login.html');
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
  <!-- =======================================================
    Theme Name: NiceAdmin
    Theme URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
    Author: BootstrapMade
    Author URL: https://bootstrapmade.com
  ======================================================= -->
  <script type="text/javascript">
    function back(){
      window.history.back();
    }

    function showAulas(){
      document.getElementById('aulas').style='display: block';
      document.getElementById('extras').style='display: none';
    }

    function showExtras(){
      document.getElementById('aulas').style='display: none';
      document.getElementById('extras').style='display: block';
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

        <?php

          require_once('../db.class.php');

        ?>

                <div class='col-xs-5'>
                  <div class='row'>
                    <h3 style='border-bottom: 2px lightgrey solid; padding-bottom: 10px;'>Página da Aula</h3>
                      <div class='row text-center' style='border-bottom: 1px lightgrey solid; margin-bottom: 10px; padding-left: 20px; font-size: 17px;'>
                        <a href='prof_ind.php?id='><button style='margin-bottom: 15px;' class='btn btn-primary'><h4 style='padding: 0px 0px 0px 0px'>Acessar Professor</h4></button></a>
                        <a href='aluno_ind.php?id='><button style='margin-bottom: 15px;' class='btn btn-success'><h4 style='padding: 0px 0px 0px 0px'>Acessar Aluno</h4></button></a><br>
                        <a href='editar_aula.php?id='><button style='margin-bottom: 15px;' class='btn btn-warning'><h4 style='padding: 0px 0px 0px 0px'>Editar Aula</h4></button></a>
                        <a href='apagar_aula.php?id='><button style='margin-bottom: 15px;' class='btn btn-danger'><h4 style='padding: 0px 0px 0px 0px'>Não Listar</h4></button></a>
                    </div>
                    <div style='overflow-x: hidden; overflow-y: scroll; height: 54%;'>
                      <div class='row' style='border-bottom: 1px lightgrey solid; margin-bottom: 10px; padding-left: 20px; font-size: 17px;'>
                      <h3 align='center' style='border-bottom: 2px lightgrey solid; padding-bottom: 10px;'>Dados da Aula</h3>
                        <div class='row' style='border-bottom: 1px lightgrey solid; margin-bottom: 10px;'>
                          <p style="font-size: 13px; margin-bottom: -5px;" align="center">Aluno</p>
                          <p style="font-size: 21px;" align="center"><a href="#">Matheus Alvarenga</a></p>
                          <p style="font-size: 13px; margin-bottom: -5px;" align="center">Professor</p>
                          <p style="font-size: 21px; margin-bottom: 10px;" align="center"><a href="#">Livia dos Reis</a></p>
                          <p style="font-size: 13px; margin-bottom: -5px;" align="center">Data</p>
                          <p style="font-size: 25px;" align="center">24/04/2020 às 16:30</p>

                        </div>
                        <div class='row' style='border-bottom: 1px lightgrey solid; margin-bottom: 10px; padding-left: 20px; font-size: 17px;'>
                          <p>Matéria: Biologia</p>
                          <p>Tópicos Abordados: Lorem Lipsum</p>
                          <p>Unidade: 2 </p>

                        </div>
                        <div class='row' style='border-bottom: 1px lightgrey solid; margin-bottom: 10px; padding-left: 20px; font-size: 17px;'>
                          <h4>Finânceiro</h4>
                          <p>Aula Recebida? Não</p>
                          <p>Aula Paga? Sim</p>

                        </div>
                      </div>
                    </div>
                </div>
             </div>
             <div style='border-right: 2px lightgrey solid; height: 76%; margin-left: -5px;' class='col-xs-1'>
                  
                </div>
                <div style='margin-right: -5px;' class='col-xs-1'>
                  
                </div>
             <div class='col-xs-5'>
                  <div class='row'>
                    <div style='overflow-x: hidden; overflow-y: scroll; height: 43%;border-bottom: 1px lightgrey solid; '>
                      <div class='row' style='margin-bottom: 10px; font-size: 17px;'>
                      <h3 align='center' style='border-bottom: 2px lightgrey solid; padding-bottom: 10px;'>Feedback do Aluno</h3>
                        <p align="center">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam risus ex, lacinia vitae eleifend eget, condimentum ut ipsum. Aliquam at ipsum orci. Fusce ut ornare mauris.</p>
                      </div>
                    </div>
                    <div style='overflow-x: hidden; overflow-y: scroll; height: 43%;border-bottom: 1px lightgrey solid; '>
                      <div class='row' style='margin-bottom: 10px; padding-left: 20px; font-size: 17px;'>
                      <h3 align='center' style='border-bottom: 2px lightgrey solid; padding-bottom: 10px;'>Feedback do Professor</h3>
                        <p align="center">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam risus ex, lacinia vitae eleifend eget, condimentum ut ipsum. Aliquam at ipsum orci. Fusce ut ornare mauris.</p>
                      </div>
                    </div>
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
</body>

</html>