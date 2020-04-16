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
            <h3 class="page-header"><i class="fa fa-laptop"></i> Dashboard</h3>
            <ol class="breadcrumb">
              <li><i class="fa fa-home"></i><a href="index.php">Ínicio</a></li>
              <li><i class="icon_document_alt"></i>Alunos</li>
              <li><i class="icon_document_alt"></i>Cadastro de Aulas</li>
            </ol>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-12">
            <section style="margin-top: -17px;" class="panel">
              <div class="panel-body">
                <h3 align="center">Escolher Aluno</h3>
                <form action="cadastro_aulas2.php" method="GET">
                  
                  <?php

                    $url_aluno='';
                    $url_prof='';

                    if (isset($_GET['id_aluno']) and $_GET['id_aluno']!=='') {
                      
                      $id_aluno=$_GET['id_aluno'];
                      $nome_aluno=$_GET['a'.$id_aluno];
                      $url_aluno='id_aluno='.$id_aluno.'&a'.$id_aluno.'='.$nome_aluno;

                    }

                    if (isset($_GET['id_prof']) and $_GET['id_prof']!=='') {
                      
                      $id_prof=$_GET['id_prof'];
                      $nome_prof=$_GET['p'.$id_prof];
                      $url_prof='id_prof='.$id_prof.'&p'.$id_prof.'='.$nome_prof;
                      

                    }

                    if (isset($_GET['id_aluno']) and $_GET['id_aluno']!=='') {

                      echo "<h5 align='center'>Aluno selecionado: $nome_aluno ($id_aluno)</h5>";
                      echo "<a align='center' href='cadastro_aulas.php?$url_aluno'><h6>Modificar Aluno</h6></a>";
                      echo "<input type='hidden' name='id_aluno' value='$id_aluno'>";
                      echo "<input type='hidden' name='a$id_aluno' value='$nome_aluno'>";

                    }

                    if (isset($_GET['id_prof']) and $_GET['id_prof']!=='') {

                      echo "<h5 align='center'>Professor selecionado: $nome_prof ($id_prof)</h5>";
                      echo "<a align='center' href='cadastro_aulas3.php?$url_aluno'><h6>Modificar</h6></a>";
                      echo "<input type='hidden' name='id_prof' value='$id_prof'>";
                      echo "<input type='hidden' name='p$id_prof' value='$nome_prof'>";

                    }
                    ?>
                  <br>
                  <div class="form-group">
                    <label style="text-align: right; margin-top: 5px;" class="col-sm-2 control-label">Nome</label>
                    <div class="col-sm-10">
                      <input type="text" name="nome_aluno" class="form-control">
                    </div><br><br>
                  </div>
                  <div class="form-group">
                    <label style="text-align: right; margin-top: 5px;" class="col-sm-2 control-label">Telefone</label>
                    <div class="col-sm-10">
                      <input type="text" name="tel_aluno" class="form-control">
                    </div><br><br>
                  </div>
                  <div class="form-group">
                    <label style="text-align: right; margin-top: 5px;" class="col-sm-2 control-label">Data de Nascimento</label>
                    <div class="col-sm-10">
                      <input type="date" name="data_aluno" class="form-control">
                    </div><br><br>
                  </div>
                  <div class="form-group">
                    <label style="text-align: right; margin-top: 5px;" class="col-sm-2 control-label">E-Mail</label>
                    <div class="col-sm-10">
                      <input type="text" name="email_aluno" class="form-control">
                    </div><br><br>
                  </div>
                  <div class="form-group">
                    <div class="col-sm-12">
                      <input type="submit" value="PESQUISAR" class="form-control btn btn-primary">
                    </div>
                  </div>
                </form>
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
</body>

</html>