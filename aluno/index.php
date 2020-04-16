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
  <link href='../packages/core/main.css' rel='stylesheet' />
<link href='../packages/daygrid/main.css' rel='stylesheet' />
<link href='../packages/timegrid/main.css' rel='stylesheet' />
<link href='../packages/list/main.css' rel='stylesheet' />
<script src='../packages/core/main.js'></script>
<script src='../packages/interaction/main.js'></script>
<script src='../packages/daygrid/main.js'></script>
<script src='../packages/timegrid/main.js'></script>
<script src='../packages/list/main.js'></script>
  <!-- =======================================================
    Theme Name: NiceAdmin
    Theme URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
    Author: BootstrapMade
    Author URL: https://bootstrapmade.com
  ======================================================= -->
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
              <li><i class="fa fa-home"></i><a href="index.html">Ínicio</a></li>
              <li><i class="fa fa-laptop"></i>Dashboard</li>
            </ol>
          </div>
        </div>
        
        <!--/.row-->
        <!-- project team & activity start -->
        <div class="row">
          <div class="col-md-12 portlets">
            <div class="panel panel-default">
              <div style="height: 20px" class="panel-heading">
                <h2><strong>Calendário</strong></h2>
                <div class="panel-actions">
                  <a href="#" class="wminimize"><i class="fa fa-chevron-up"></i></a>
                  <a href="#" class="wclose"><i class="fa fa-times"></i></a>
                </div>
              </div><br><br><br>
              <div class="panel-body">
                <div id="calendar" class="fc fc-ltr fc-bootstrap" style></div>
              </div>
            </div>
          </div>
        </div>
        <!-- project team & activity end -->
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
<script>

  document.addEventListener('DOMContentLoaded', function() {
    var calendarEl = document.getElementById('calendar');

    var calendar = new FullCalendar.Calendar(calendarEl, {
      plugins: [ 'interaction', 'dayGrid', 'timeGrid', 'list' ],
      header: {
        left: 'prev,next today',
        center: 'title',
        right: 'dayGridMonth,timeGridWeek,timeGridDay,listWeek'
      },
      allDayText:'Aniversários',
      noEventsMessage:'Sem Eventos',
      locale:'pt-br',
      buttonText:{

        today:    'Hoje',
        month:    'Mês',
        week:     'Semana',
        day:      'Dia',
        list:     'Lista'

      },
      defaultView: 'dayGridMonth',
      navLinks: true, // can click day/week names to navigate views
      eventLimit: true, // allow "more" link when too many events
      events: [

      <?php

        require_once('../db.class.php');

        $objDb = new db();
        $link = $objDb->conecta_mysql();

        $hoje=date('Y-m-d');

        $id_aluno=$_SESSION['id_aluno'];

        $sql="SELECT * FROM `sisoda_aulas` WHERE `sisoda_aulas_data` > '$hoje' AND `sisoda_aulas_idAluno`='$id_aluno'";

        $resultado_id = mysqli_query($link, $sql);

            if ($resultado_id) {

              while($dados_login = mysqli_fetch_array($resultado_id, MYSQLI_ASSOC)){

                $sql2="SELECT `sisoda_professores_nome` FROM `sisoda_professores` WHERE `sisoda_professores_id`='".$dados_login['sisoda_aulas_idProfessor']."'";

                $resultado_id2 = mysqli_query($link, $sql2);

                if ($resultado_id2) {

                  while($dados_login2 = mysqli_fetch_array($resultado_id2, MYSQLI_ASSOC)){

                    $data=date_create($dados_login['sisoda_aulas_data']);

                    $data2=date_format($data,'Y-m-d');
                    $data3=date_format($data,'H:i');
                    $data4=$data2.'T'.$data3;

                    echo "{";

                    echo "title:'".$dados_login2['sisoda_professores_nome']."',";
                    echo "url:'aula_ind.php?id=".$dados_login['sisoda_aulas_id']."',";
                    echo "start:'$data4'";

                    echo "},";

                  }

                }

                

              }

            }

        

      ?>
      ]
    });

    calendar.render();
  });

</script>
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