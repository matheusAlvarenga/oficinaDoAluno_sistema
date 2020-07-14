<?php
  session_start();
  if(!isset($_SESSION['id_admin'])){
    header('Location: ../sem_login.html');
  }

  $id=$_GET['id'];
  require_once('../db.class.php');
  $objDb = new db();
  $link = $objDb->conecta_mysql();

?>
<html lang="pt-br">

<head><meta charset="gb18030">
  
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="Creative - Bootstrap 3 Responsive Admin Template">
  <meta name="author" content="GeeksLabs">
  <meta name="keyword" content="Creative, Dashboard, Admin, Template, Theme, Bootstrap, Responsive, Retina, Minimal">
  <link rel="shortcut icon" href="img/favicon.png">
  <title>Oficina do Aluno - Dashboard Administrador</title>
  <link rel="stylesheet" type="text/css" href="css/css.css">
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
  <script type="text/javascript" >
    
    function altValores(){
      
      oldDate=document.getElementById('data').value;
      newDate=document.getElementById('data2').value;
      
        var fromDate = parseInt(new Date(oldDate).getTime()/1000); 
        var toDate = parseInt(new Date(newDate).getTime()/1000);
        var timeDiff = (toDate - fromDate)/3600;
        
        var hora_aluno=document.getElementById('hora_aluno').value;
        var hora_prof=document.getElementById('hora_prof').value;
        
        var final_aluno = timeDiff*hora_aluno;
        var final_prof = timeDiff*hora_prof;
        
        document.getElementById('al').innerHTML='R$'+final_aluno;
        document.getElementById('pr').innerHTML='R$'+final_prof;
        document.getElementById('al2').value=final_aluno;
        document.getElementById('pr2').value=final_prof;
      
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
              <li><i class="fa fa-home"></i><a href="index.php">Ínicio</a></li>
              <li><i class="icon_document_alt"></i>Alunos</li>
              <li><i class="icon_document_alt"></i>Cadastro de Professores</li>
            </ol>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-12">
            <section style="margin-top: -17px;" class="panel">
              <div class="panel-body">
                <form style="margin-right: 20px;" id="form" class="form-horizontal" method="POST" action="editar_aula2.php">
                   
                   <?php

                   echo "<input type='hidden' name='id' value='$id'>";

                   $resultado_id2=mysqli_query($link, "SELECT * FROM `sisoda_aulas` WHERE `sisoda_aulas_id`='$id'");

                   if ($resultado_id2) {
                     
                      $dados_login2 = mysqli_fetch_array($resultado_id2);

                      $materia=$dados_login2['sisoda_aulas_materia'];
                      $topicos=$dados_login2['sisoda_aulas_topicos'];
                      $data=date_create($dados_login2['sisoda_aulas_data']);
                      $data2=date_format($data,'Y-m-d');
                      $data3=date_format($data,'H:i');
                      $dato=date_create($dados_login2['sisoda_aulas_dataFinal']);
                      $dato2=date_format($dato,'Y-m-d');
                      $dato3=date_format($dato,'H:i');
                      $unidade=$dados_login2['sisoda_aulas_unidade'];
                      $unidade=$dados_login2['sisoda_aulas_unidade'];
                      $valor_aluno=$dados_login2['sisoda_aulas_valorProfessor'];
                      $valor_prof=$dados_login2['sisoda_aulas_valorAluno'];

                      if ($dados_login2['sisoda_aulas_comentarioAluno']==NULL) {
                        
                        $feedback_aluno='Nenhum feedback foi feito ainda.';

                      }else{

                        $feedback_aluno=$dados_login2['sisoda_aulas_comentarioAluno'];

                      }

                      if ($dados_login2['sisoda_aulas_comentarioProfessor']==NULL) {
                       
                        $feedback_prof='Nenhum feedback foi feito ainda.';

                      }else{

                        $feedback_prof=$dados_login2['sisoda_aulas_comentarioProfessor'];

                      }                    

                      $resultado_id3=mysqli_query($link, "SELECT `sisOda_alunos_nome` FROM `sisoda_alunos` WHERE `sisOda_alunos_id`='".$dados_login2['sisoda_aulas_idAluno']."'");

                      if ($resultado_id3) {
                        
                        while($dados_login3 = mysqli_fetch_array($resultado_id3, MYSQLI_ASSOC)){

                          echo "<h5 align='center'>Aluno: ".$dados_login3['sisOda_alunos_nome']." (".$dados_login2['sisoda_aulas_idAluno'].")</h5>";

                        }

                      }

                      $resultado_id4=mysqli_query($link, "SELECT `sisoda_professores_nome` FROM `sisoda_professores` WHERE `sisoda_professores_id`='".$dados_login2['sisoda_aulas_idProfessor']."'");

                      if ($resultado_id4) {
                        
                        while($dados_login4 = mysqli_fetch_array($resultado_id4, MYSQLI_ASSOC)){

                          echo "<h5 align='center'>Professor: ".$dados_login4['sisoda_professores_nome']." (".$dados_login2['sisoda_aulas_idProfessor'].")</h5>";

                        }

                      }

                   }

                   ?>
                   <br><br>
                  <div class="form-group">
                    <h3 style="margin-top: 0px; margin-bottom:20px;" align="center">Matéria</h3>
                    <div class="col-sm-1"></div>
                    <div style="margin-left: 50px;" class="col-sm-10">
                      <ul class="ks-cboxtags">

                        <?php
                        
                        echo "<input type='hidden' name='id_aluno' value='".$dados_login2['sisoda_aulas_idAluno']."' >";
                        echo "<input type='hidden' name='id_prof' value='".$dados_login2['sisoda_aulas_idProfessor']."' >";

                          $array_mat=explode(',', $materia);

                          $sql = "SELECT * FROM sisoda_materias";

                          $resultado_id = mysqli_query($link, $sql);

                            if($resultado_id){

                              while($dados_login = mysqli_fetch_array($resultado_id, MYSQLI_ASSOC)){

                                  if (in_array($dados_login['sisoda_materias_id'], $array_mat)) {
                                    
                                    echo "

                                      <li><input name='materias[]' type='checkbox' id='".$dados_login['sisoda_materias_id']."' value='".$dados_login['sisoda_materias_id']."' checked><label for='".$dados_login['sisoda_materias_id']."'>".$dados_login['sisoda_materias_nome']."</label></li>

                                    ";

                                  }else{

                                    echo "

                                      <li><input name='materias[]' type='checkbox' id='".$dados_login['sisoda_materias_id']."' value='".$dados_login['sisoda_materias_id']."'><label for='".$dados_login['sisoda_materias_id']."'>".$dados_login['sisoda_materias_nome']."</label></li>

                                    ";

                                  }

                                

                              }
                            }else{
                              echo "Erro";
                            }

                        ?>
                      </ul>
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="row">
                      <label style="margin-left: 0px;" class="col-sm-2 control-label">Tópicos da Aula:</label>
                      <div class="col-sm-9">
                        <input value=<?php echo "'$topicos'"; ?> type="text" name="topicos" class="form-control">
                      </div>
                    </div><br>
                    <div class="row">
                      <label style="margin-left: 0px;" class="col-sm-2 control-label">Ínicio</label>
                      <div class="col-sm-4">
                        <input id="data" value=<?php echo "'".$data2."T".$data3."'"; ?> type="datetime-local" name="data" class="form-control">
                      </div>
                      <label style="margin-left: -6px;" class="col-sm-1 control-label">Final</label>
                      <div class="col-sm-4">
                        <input id="data2" value=<?php echo "'".$dato2."T".$dato3."'"; ?> type="datetime-local" name="data2" class="form-control">
                      </div>
                    </div>
                    
                  </div>
                  <div class="form-group">
                    
                    <label style="margin-left: -12px;" class="col-sm-2 control-label">Feedback<br> Aluno</label>
                    <div class="col-sm-4">
                      
                      <textarea class="form-control" name='aluno' form="form"><?php echo "$feedback_aluno"; ?></textarea>

                    </div>
                    <label style="margin-left: -82px;" class="col-sm-2 control-label">Feedback<br> Professor</label>
                    <div class="col-sm-4">
                      
                      <textarea class="form-control" name="prof" form="form"><?php echo "$feedback_prof"; ?></textarea>

                    </div>


                  </div>
                  
                  <div class="form-group">
                    
                    <label style="margin-left: -12px;" class="col-sm-2 control-label">Valor<br> Aluno</label>
                    <div class="col-sm-4">
                      
                      <input id="hora_aluno" class="form-control" onBlur="altValores()" form="form" value=<?php echo "'".$valor_aluno."'"; ?>>

                    </div>
                    <label style="margin-left: -82px;" class="col-sm-2 control-label">Valor<br> Professor</label>
                    <div class="col-sm-4">
                      
                      <input id="hora_prof" class="form-control" onBlur="altValores()" form="form" value=<?php echo "'".$valor_prof."'"; ?>>

                    </div>
                    

                  </div>
                    <div>
                        <div class='col-md-2'></div>
                        <div class='col-md-4 text-center'>
                            <h3>Valor Aluno</h3>
                            <h2 id='al'>R$ 00,00</h2>
                            <input type='hidden' id='al2' name='valor_aluno'> 
                        </div>
                        <div class='col-md-4 text-center'>
                            <h3>Valor Professor</h3>
                            <h2 id='pr'>R$ 00,00</h2>
                            <input type='hidden' id='pr2' name='valor_prof'> 
                        </div>
                        <div class='col-md-2'></div>
                        <br><br>
                    </div>
                    
                    
                  
                      <div class="row">
                        <div class="form-group">
                          <div class="col-sm-12">
                            <input type="submit" value="ALTERAR" class="form-control btn btn-primary">
                          </div>
                        </div>
                      </div>
                    </form>
                  </div>
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