<?php
  session_start();
  if(!isset($_SESSION['id_prof']) or $_SESSION['id_prof']==''){
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
    function getCookie(name) {
    var dc = document.cookie;
    var prefix = name + "=";
    var begin = dc.indexOf("; " + prefix);
    if (begin == -1) {
        begin = dc.indexOf(prefix);
        if (begin != 0) return null;
    }
    else
    {
        begin += 2;
        var end = document.cookie.indexOf(";", begin);
        if (end == -1) {
        end = dc.length;
        }
    }
    // because unescape has been deprecated, replaced with decodeURI
    //return unescape(dc.substring(begin + prefix.length, end));
    return decodeURI(dc.substring(begin + prefix.length, end));
} 


    function cookies(varr){
      var myCookie = getCookie("pagina");
      if (myCookie == null) {
        document.cookie='pagina='+varr+'';
        alert('n existe')
    }
    else {
        document.cookie = "pagina=";
        alert('apaguei')

        document.cookie='pagina='+varr+'';
        alert('criei')

    }

      
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
            <h3 class="page-header"><i class="fa fa-laptop"></i> Dashboard</h3>
            <ol class="breadcrumb">
              <li><i class="fa fa-home"></i><a href="index.html">Ínicio</a></li>
              <li><i class="icon_document_alt"></i>Alunos</li>
              <li><i class="icon_document_alt"></i>Lista de Alunos</li>
            </ol>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-12">
            <table class="table table-striped table-advance table-hover">
                <tbody>
                  <tr>
                    <th><i class="icon_profile"></i> Aluno</th>
                    <th><i class="icon_calendar"></i> Professor</th>
                    <th><i class="icon_mail_alt"></i> Data e Hora</th>
                    <th><i class="icon_mail_alt"></i> Matéria</th>
                    <th><i class="icon_pin_alt"></i> Feedback Aluno</th>
                    <th><i class="icon_mobile"></i> Feedback Prof.</th>
                    <th><i class="icon_cogs"></i> Ações</th>
                  </tr>
                  <?php 

  require_once('../db.class.php');

    $id=$_SESSION['id_prof'];

    $sql = "SELECT * FROM sisoda_aulas WHERE sisoda_aulas_idProfessor='$id'";
    $objDb = new db();
    $link = $objDb->conecta_mysql();

    $resultado_id = mysqli_query($link, $sql);

    if($resultado_id){

      if($resultado_id){

        while($dados_login = mysqli_fetch_array($resultado_id, MYSQLI_ASSOC)){

          $sql2="SELECT * FROM sisoda_alunos WHERE sisoda_alunos_id = '".$dados_login['sisoda_aulas_idAluno']."'";

          $resultado_id2 = mysqli_query($link, $sql2);
          if ($resultado_id2) {
            while($dados_login2 = mysqli_fetch_array($resultado_id2, MYSQLI_ASSOC)){

              echo "<tr style='background-color:#dcdcdc;'>
                    <td>".$dados_login2['sisOda_alunos_nome']." ".$dados_login2['sisOda_alunos_sobrenome']."</td>";

            }
          }

          $sql3="SELECT * FROM sisoda_professores WHERE sisoda_professores_id = '".$dados_login['sisoda_aulas_idProfessor']."'";

          $resultado_id3 = mysqli_query($link, $sql3);
          if ($resultado_id3) {
            while($dados_login3 = mysqli_fetch_array($resultado_id3, MYSQLI_ASSOC)){

              echo "<td>".$dados_login3['sisoda_professores_nome']." ".$dados_login3['sisoda_professores_sobrenome']."</td>";

            }
          }

          $data=date_create($dados_login['sisoda_aulas_data']);

          $data2=date_format($data,'d/m/Y H:i');


          echo "<td>".$data2."</td>";
          
          $sql4="SELECT * FROM sisoda_materias WHERE sisoda_materias_id = '".$dados_login['sisoda_aulas_materia']."'";

          $resultado_id4 = mysqli_query($link, $sql4);
          if ($resultado_id4) {
            while($dados_login4 = mysqli_fetch_array($resultado_id4, MYSQLI_ASSOC)){

              echo "<td>".$dados_login4['sisoda_materias_nome']."</td>";

            }
          }

          if ($dados_login4['sisoda_aulas_comentarioAluno']!=NULL) {
            echo "<td>Feedback Feito.</td>";
          }else{
            echo "<td>Feedback Não Feito.</td>";
          }

          if ($dados_login4['sisoda_aulas_comentarioProfessor']!=NULL) {
            echo "<td>Feedback Feito.</td>";
          }else{
            echo "<td>Feedback Não Feito.</td>";
          }

          echo "

                    <td>
                      <div class='btn-group'>
                        <a class='btn btn-primary' href='aula_ind.php?id=".$dados_login['sisoda_aulas_id']."'><i class='icon_zoom-in_alt'></i></a>
                      </div>
                    </td>

          ";

        }

      }else{
      
          echo 'Erro na consulta no banco de dados!';

      }
    }
?>
                </tbody>
              </table>
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