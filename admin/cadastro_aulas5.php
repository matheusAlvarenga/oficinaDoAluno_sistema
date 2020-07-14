<?php
  session_start();
  if(!isset($_SESSION['id_admin'])){
    header('Location: ../sem_login.html');
  }

?>
<html lang="pt-br">

<head><meta http-equiv="Content-Type" content="text/html; charset=gb18030">
  
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
   
  function hoje(){
      
        var today = new Date();
        var dd = String(today.getDate()).padStart(2, '0');
        var mm = String(today.getMonth() + 1).padStart(2, '0'); //January is 0!
        var yyyy = today.getFullYear();
        var hh = today.getHours();
        var mm = today.getMinutes();
    
        today = yyyy + '/' + mm + '/' + dd;
      
      document.getElementById('data').value = today;
      
  } 
  function mudarData(){
    var aula = document.getElementById('data').value;
    document.getElementById('data2').value = aula;
  }
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

<body onload="hoje()">
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
              <li><i class="icon_document_alt"></i>Aulas</li>
              <li><i class="icon_document_alt"></i>Cadastro de Aulas</li>
            </ol>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-12">
            <section style="margin-top: -17px;" class="panel">
              <div class="panel-body">
                <form style="margin-left: -30px; margin-right: 20px;" class="form-horizontal" method="POST" action="cadastro_aulas6.php">
                   <?php

                    require_once('../db.class.php');
                    $objDb = new db();
                    $link = $objDb->conecta_mysql();

                    $url_aluno='';
                    $url_prof='';

                    if (isset($_GET['id_aluno']) and $_GET['id_aluno']!=='') {
                      
                      $id_aluno=$_GET['id_aluno'];
                      $nome_aluno=$_GET['a'.$id_aluno];
                      $url_aluno='id_aluno='.$id_aluno.'&a'.$id_aluno.'='.$nome_aluno;

                      $resultado_id2=mysqli_query($link,"SELECT * FROM `sisoda_alunos` WHERE `sisOda_alunos_id`='$id_aluno'");

                      while($dados_login2 = mysqli_fetch_array($resultado_id2, MYSQLI_ASSOC)){

                        $valor_aluno=$dados_login2['sisOda_alunos_tipoDePlano'];
                        $saldo_aluno=$dados_login2['sisOda_alunos_saldo'];

                      }

                    }

                    if (isset($_GET['id_prof']) and $_GET['id_prof']!=='') {
                      
                      $id_prof=$_GET['id_prof'];
                      $nome_prof=$_GET['p'.$id_prof];
                      $url_prof='id_prof='.$id_prof.'&p'.$id_prof.'='.$nome_prof;

                      $resultado_id=mysqli_query($link,"SELECT * FROM `sisoda_professores` WHERE `sisoda_professores_id`='$id_prof'");

                      while($dados_login = mysqli_fetch_array($resultado_id, MYSQLI_ASSOC)){

                        $valor_prof=$dados_login['sisoda_professores_valor'];
                        $saldo_prof=$dados_login['sisoda_professores_saldo'];

                      }
                      

                    }

                    if (isset($_GET['id_aluno']) and $_GET['id_aluno']!=='') {

                      echo "<h5 align='center'>Aluno selecionado: $nome_aluno ($id_aluno)</h5>";
                      echo "<a align='center' href='cadastro_aulas.php?$url_aluno'><h6>Modificar Aluno</h6></a>";
                      echo "<input type='hidden' name='id_aluno' value='$id_aluno'>";
                      echo "<input type='hidden' name='saldo_aluno' value='$saldo_aluno'>";
                      echo "<input type='hidden' name='hora_aluno' value='$valor_aluno'>";

                    }

                    if (isset($_GET['id_prof']) and $_GET['id_prof']!=='') {

                      echo "<h5 align='center'>Professor selecionado: $nome_prof ($id_prof)</h5>";
                      echo "<a align='center' href='cadastro_aulas3.php?$url_aluno'><h6>Modificar</h6></a>";
                      echo "<input type='hidden' name='id_prof' value='$id_prof'>";
                      echo "<input type='hidden' name='saldo_prof' value='$saldo_prof'>";
                      echo "<input type='hidden' name='hora_prof' value='$valor_prof'>";

                    }
                    ?><br><br>
                  <div class="form-group">
                    <h3 style="margin-top: 0px; margin-bottom:20px;" align="center">Matéria</h3>
                    <div class="col-sm-1"></div>
                    <div style="margin-left: 50px;" class="col-sm-10">
                      <ul class="ks-cboxtags">

                        <?php

                          require_once('../db.class.php');

                          $sql = "SELECT * FROM sisoda_materias";

                          $objDb = new db();
                          $link = $objDb->conecta_mysql();

                          $resultado_id = mysqli_query($link, $sql);

                            if($resultado_id){

                              while($dados_login = mysqli_fetch_array($resultado_id, MYSQLI_ASSOC)){

                                echo "

                                  <li><input name='materias[]' type='checkbox' id='".$dados_login['sisoda_materias_id']."' value='".$dados_login['sisoda_materias_id']."'><label for='".$dados_login['sisoda_materias_id']."'>".$dados_login['sisoda_materias_nome']."</label></li>

                                ";

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
                        <input type="text" name="topicos" class="form-control">
                      </div>
                    </div><br>
                    <div class="row">
                      <label style="margin-left: 0px;" class="col-sm-2 control-label">Inicio</label>
                      <div class="col-sm-4">
                        <input type="datetime-local" onBlur="mudarData()" id='data' name="data" class="form-control">
                      </div>
                      <label style="margin-left: -95px;" class="col-sm-2 control-label">Fim</label>
                      <div class="col-sm-4">
                        <input type="datetime-local" onBlur="altValores()" id='data2' name="data2" class="form-control">
                        </div>
                      </div><br>
                    <div class="row">
                    <label style='margin-left:95px;' class="col-sm-1 control-label">Unidade</label>
                      <div class="col-sm-2">
                        <select name="unid" class="form-control">
                          <option value="1">1</option>
                          <option value="2">2</option>
                        </select><br>
                      </div>
                      <label style="margin-left: 0px;" class="col-sm-2 control-label">V. Prof</label>
                      <div class="col-sm-2">
                        <input type="text" onBlur="altValores()" value=<?php echo $valor_prof ?> name="hora_prof" id="hora_prof" class="form-control">
                      </div>
                      <label style="margin-left: 0px;" class="col-sm-1 control-label">V. Aluno</label>
                      <div class="col-sm-2">
                        <input type="text" onBlur="altValores()" value=<?php echo $valor_aluno ?> name="hora_aluno" id="hora_aluno" class="form-control">
                        <br>
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
                    </div>
                  </div>
                      <div class="row">
                        <div class="form-group">
                          <label class="col-sm-2 control-label"></label>
                          <div class="col-sm-9">
                            <input type="submit" value="CADASTRAR" class="form-control btn btn-primary">
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