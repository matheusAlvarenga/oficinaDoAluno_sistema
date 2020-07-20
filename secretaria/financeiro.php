<?php
  session_start();
  if(!isset($_SESSION['id_sec']) or $_SESSION['id_sec']==''){
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
  <script type="text/javascript">
    function data(){
      document.getElementById('data').valueAsDate = new Date();
    }
  </script>

</head>

<body onload="data()">
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

        <div class="row">
          <div class="col-md-12 portlets">
            <div class="panel panel-default">
              <div class="panel-body">
                <div class="row text-center">
                  
                  <a href='pend.php' class="btn btn-danger"><h4>Alunos Com Pendências</h4></a>

                </div>
              </div>
            </div>
          </div>
        </div>


                <div aria-hidden='true' aria-labelledby='myModalLabel' role='dialog' tabindex='-1' id='myModal' class='modal fade'>
                  <div class='modal-dialog'>
                    <div class='modal-content'>
                      <div class='modal-header'>
                        <button aria-hidden='true' data-dismiss='modal' class='close' type='button'>×</button>
                        <h4 class='modal-title'>Adicionar Despesa</h4>
                      </div>
                      <div class='modal-body text-center'>

                        <form action="adicionar_despesa.php" method="POST">
                          
                          <div class="form-group">

                            <div class="row text-center">
                              <label class="control-label">Motivo</label>
                            </div>
                            <div class="row text-center">
                              <div class="col-sm-2"></div>
                              <div class="col-sm-8">
                                <input type="text" name="nome" class="form-control" required>
                              </div>
                              <div class="col-sm-2"></div>
                            </div>

                            <br>

                            <div class="row text-center">
                              <div class="col-sm-2"></div>
                              <div class="col-md-4">
                                <label class="control-label">Valor</label>
                              </div>
                              <div class="col-md-4">
                                <label class="control-label">Data</label>
                              </div>
                              <div class="col-sm-2"></div>
                            </div>
                            <div class="row text-center">
                              <div class="col-sm-2"></div>
                              <div class="col-sm-4">
                                <input type="text" pattern="[0-9]+.[0-9]{2}" name="valor" class="form-control" required>
                              </div>
                              <div class="col-sm-4">
                                <input type="date" id="data" name="data" class="form-control" required>
                              </div>
                              <div class="col-sm-2"></div>
                            </div>

                            <br>

                            <div class="row text-center">
                              <div class="col-sm-2"></div>
                              <div class="col-sm-8">
                                <input type="submit" value="ADICIONAR" class="form-control btn btn-primary">
                              </div>
                              <div class="col-sm-2"></div>
                            </div>

                          </div>

                        </form>

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