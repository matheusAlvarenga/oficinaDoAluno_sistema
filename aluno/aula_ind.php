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

          $id=$_GET['id'];

          require_once('../db.class.php');

          $objDb = new db();
          $link = $objDb->conecta_mysql();

          $resultado_id=mysqli_query($link,"SELECT * FROM `sisoda_aulas` WHERE `sisoda_aulas_id`='$id'");

          if ($resultado_id) {
            
            $dados_login = mysqli_fetch_array($resultado_id);

            if (isset($dados_login['sisoda_aulas_id'])) {

              $resultado_id2=mysqli_query($link, "SELECT * FROM `sisoda_alunos` WHERE `sisOda_alunos_id`='".$dados_login['sisoda_aulas_idAluno']."'");

              if ($resultado_id2) {
                
                while($dados_login2 = mysqli_fetch_array($resultado_id2, MYSQLI_ASSOC)){

                  $id_aluno=$dados_login2['sisOda_alunos_id'];
                  $nome_aluno=$dados_login2['sisOda_alunos_nome'];
                  $sobrenome_aluno=$dados_login2['sisOda_alunos_sobrenome'];

                }

              }

              $resultado_id3=mysqli_query($link, "SELECT * FROM `sisoda_professores` WHERE `sisoda_professores_id`='".$dados_login['sisoda_aulas_idProfessor']."'");

              if ($resultado_id3) {
                
                while($dados_login3 = mysqli_fetch_array($resultado_id3, MYSQLI_ASSOC)){

                  $id_prof=$dados_login3['sisoda_professores_id'];
                  $nome_prof=$dados_login3['sisoda_professores_nome'];
                  $sobrenome_prof=$dados_login3['sisoda_professores_sobrenome'];

                }

              }

              $materias=explode(',', $dados_login['sisoda_aulas_materia']);
              $str_materias='';

              foreach ($materias as $key => $value) {
                
                $resultado_id2=mysqli_query($link, "SELECT * FROM `sisoda_materias` WHERE `sisoda_materias_id`='$value'");

                while($dados_login2 = mysqli_fetch_array($resultado_id2, MYSQLI_ASSOC)){

                  $str_materias=$str_materias.$dados_login2['sisoda_materias_nome']." ";

                }

              }

              if ($dados_login['sisoda_aulas_paga']==1) {
                $paga='Sim';
              }else{
                $paga='Não';
              }

              if ($dados_login['sisoda_aulas_recebida']==1) {
                $recebida='Sim';
              }else{
                $recebida='Não';
              }

              if ($dados_login['sisoda_aulas_comentarioAluno']==NULL) {
                $comentario_aluno='O feedback do aluno não foi feito ainda.';
                $btn="<a href='#myModal' data-toggle='modal'><button style='margin-bottom: 15px;' class='btn btn-danger'><h4 style='padding: 0px 0px 0px 0px'>Adicionar Comentário</h4></button></a>";
              }else{
                $comentario_aluno=$dados_login['sisoda_aulas_comentarioAluno'];
                 $btn="<a href='#myModal' data-toggle='modal'><button style='margin-bottom: 15px;' class='btn btn-danger'><h4 style='padding: 0px 0px 0px 0px'>Alterar Comentário</h4></button></a>";
              }

              if ($dados_login['sisoda_aulas_comentarioProfessor']==NULL) {
                $comentario_professor='O feedback do professor não foi feito ainda.';
              }else{
                $comentario_professor=$dados_login['sisoda_aulas_comentarioProfessor'];
              }

              $data_aula=date_format(date_create($dados_login['sisoda_aulas_data']),'d/m/Y');
              $hora_aula=date_format(date_create($dados_login['sisoda_aulas_data']),'H:i');

              
              echo "

                <div class='col-xs-5'>
                  <div class='row'>
                    <h3 style='border-bottom: 2px lightgrey solid; padding-bottom: 10px;'>Página da Aula</h3>
                      <div class='row text-center' style='border-bottom: 1px lightgrey solid; margin-bottom: 10px; padding-left: 20px; font-size: 17px;'>
                        $btn
                    </div>
                    <div style='overflow-x: hidden; overflow-y: scroll; height: 64%;'>
                      <div class='row' style='border-bottom: 1px lightgrey solid; margin-bottom: 10px; padding-left: 20px; font-size: 17px;'>
                      <h3 align='center' style='border-bottom: 2px lightgrey solid; padding-bottom: 10px;'>Dados da Aula</h3>
                        <div class='row' style='border-bottom: 1px lightgrey solid; margin-bottom: 10px;'>
                          <p style='font-size: 13px; margin-bottom: -5px;' align='center'>Aluno</p>
                          <p style='font-size: 21px;' align='center'>$nome_aluno $sobrenome_aluno</p>
                          <p style='font-size: 13px; margin-bottom: -5px;' align='center'>Professor</p>
                          <p style='font-size: 21px; margin-bottom: 10px;' align='center'>$nome_prof $sobrenome_prof</p>
                          <p style='font-size: 13px; margin-bottom: -5px;' align='center'>Data</p>
                          <p style='font-size: 25px;' align='center'>$data_aula às $hora_aula</p>

                        </div>
                        <div class='row' style='border-bottom: 1px lightgrey solid; margin-bottom: 10px; padding-left: 20px; font-size: 17px;'>
                          <p>Matéria: $str_materias</p>
                          <p>Tópicos Abordados: ".$dados_login['sisoda_aulas_topicos']."</p>
                          <p>Unidade: ".$dados_login['sisoda_aulas_unidade']." </p>

                        </div>
                      </div>
                    </div>
                </div>
             </div>

              ";

            }
            
          }

        ?>

                
             <div style='border-right: 2px lightgrey solid; height: 76%; margin-left: -5px;' class='col-xs-1'>
                  
                </div>
                <div style='margin-right: -5px;' class='col-xs-1'>
                  
                </div>
             <div class='col-xs-5'>
                  <div class='row'>
                    <div style='overflow-x: hidden; overflow-y: scroll; height: 86%;border-bottom: 1px lightgrey solid; '>

              <?php



              ?>

                      <div class='row' style='margin-bottom: 10px; font-size: 17px;'>
                      <h3 align='center' style='border-bottom: 2px lightgrey solid; padding-bottom: 10px;'>Feedback do Aluno</h3>
                        <p align='center'><?php echo $comentario_aluno; ?></p>
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

                        <form name="form" id="form" action="feedback.php" method="POST">
                          
                          <div class="form-group">

                            <div class="row text-center">
                              <label class="control-label">Feedback</label>
                            </div>
                            <div class="row text-center">
                              <div class="col-sm-2"></div>
                              <div class="col-sm-8">
                                <?php

                                echo "<input type='hidden' name='id' value='$id'>";

                                ?>
                                <textarea form="form" name='feed' class="form-control"></textarea>
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
  <script src='js/jquery.js'></script>
  <script src='js/jquery-ui-1.10.4.min.js'></script>
  <script src='js/jquery-1.8.3.min.js'></script>
  <script type='text/javascript' src='js/jquery-ui-1.9.2.custom.min.js'></script>
  <!-- bootstrap -->
  <script src='js/bootstrap.min.js'></script>
  <!-- nice scroll -->
  <script src='js/jquery.scrollTo.min.js'></script>
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