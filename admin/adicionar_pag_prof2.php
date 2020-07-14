<?php
  session_start();
  if(!isset($_SESSION['id_admin']) or $_SESSION['id_admin']==''){
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
    
    function aulaParaValor(){

      x=document.getElementById('aulas').value;
      w=document.getElementById('meses').value;

      var aluno_selec = document.forms[0];
      var txt = "";
      var i;
      for (i = 0; i < aluno_selec.length; i++) {
        if (aluno_selec[i].checked) {
          txt = aluno_selec[i].value;
        } 
      }

      t="m"+txt;
      u=document.getElementById(t).value;
      z=document.getElementById(txt).value;

      y=(z*x)+(u*w);

      document.getElementById('valor').value=y;

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
              <li><i class="icon_document_alt"></i>Professor</li>
              <li><i class="icon_document_alt"></i>Adicionar Pagamento</li>
            </ol>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-12">
            <section style="margin-top: -17px;" class="panel">
              <div class="panel-body">
                <h3 align="center">Adicionar Pagamento</h3><br>
                <form action="adicionar_pag_prof3.php" method="POST">
                <table class="table table-striped table-advance table-hover">
                <tbody>
                  
                    <tr>
                      <th></th>
                      <th><i class="icon_profile"></i> Nome</th>
                      <th><i class="icon_calendar"></i> Saldo</th>
                      <th><i class="icon_mail_alt"></i> E-mail</th>
                      <th><i class="icon_pin_alt"></i> Valor Por Aula</th>
                      <th><i class="icon_mobile"></i> Valor Mensal</th>
                    </tr>
                  <?php 

  require_once('../db.class.php');


  if (isset($_GET['id'])) {
        $id=$_GET['id'];
        $sql = "SELECT * FROM `sisoda_professores` WHERE `sisoda_professores_id` = '$id' ORDER BY `sisoda_professores_id` ASC";
  }else{

  $nome=$_GET['nome_aluno'];
  $cpf=$_GET['cpf'];
  $data=$_GET['materia'];
  $email=$_GET['email_aluno'];

  if ($nome == NULL and $cpf == NULL and $data == NULL and $email == NULL) {
    echo "

    <script>

      alert('Nenhum dos campos foi preenchido, favor preencher pelo menos um.');
      window.history.back();

    </script>

    ";
  }
  else{

    $sql = "SELECT * FROM `sisoda_professores` WHERE `sisoda_professores_nome` LIKE '%$nome%' AND `sisoda_professores_email` LIKE '%$email%' AND `sisoda_professores_materias` LIKE '%$data%' AND `sisoda_professores_cpf` LIKE '%$cpf%' ORDER BY `sisoda_professores_id` ASC
";}}

    $objDb = new db();
    $link = $objDb->conecta_mysql();

    $resultado_id = mysqli_query($link, $sql);

      if($resultado_id){

        while($dados_login = mysqli_fetch_array($resultado_id, MYSQLI_ASSOC)){

          echo "<input type='hidden' name='".$dados_login['sisoda_professores_id']."' value='".$dados_login['sisoda_professores_saldo']."'>";
          
          echo "<tr style='background-color:#dcdcdc;'>
                    <td><input type='radio' name='aluno_selec' value='".$dados_login['sisoda_professores_id']."'><input type='hidden' id='".$dados_login['sisoda_professores_id']."' value='".$dados_login['sisoda_professores_valor']."'><input type='hidden' id='m".$dados_login['sisoda_professores_id']."' value='".$dados_login['sisoda_professores_mensal']."'></td>";

          echo "<td>".$dados_login['sisoda_professores_nome']." ".$dados_login['sisoda_professores_sobrenome']."</td>";

            if ($dados_login['sisoda_professores_saldo']>0) {
              echo "<td class='success' style='color:green;'>R$".$dados_login['sisoda_professores_saldo']."</td>";
            }elseif ($dados_login['sisoda_professores_saldo']==0) {
              echo "<td class='active' style='color:grey;'>R$".$dados_login['sisoda_professores_saldo']."</td>";
            }else{
              echo "<td class='danger' style='color:red;'>R$".$dados_login['sisoda_professores_saldo']."</td>";
            }
            $celular0=$dados_login['sisoda_professores_telefone']/10000;
            $celular=number_format($celular0, 4, '-', '');
            echo "
                    
                    <td>".$dados_login['sisoda_professores_email']."</td>
                    <td>".$dados_login['sisoda_professores_valor']."</td>
                    <td>".$dados_login['sisoda_professores_mensal']."</td>
                  </tr>";

        }

      }else{
      
          echo 'Erro no banco de dados!';

      }
              
?>

                  
                </tbody>
              </table>
                <div class="form-group">
                  <div class="row">
                    <label style="text-align: center; margin-top: 5px;" class="col-sm-2 control-label">Nº de Aulas</label>
                    <label style="text-align: center; margin-top: 5px;" class="col-sm-2 control-label">Nº de Meses</label>
                    <label style="text-align: center; margin-top: 5px;" class="col-sm-4 control-label"></label>
                    <label style="text-align: center; margin-top: 5px;" class="col-sm-6 control-label">Valor em Dinheiro</label>
                  </div>
                    
                  <div class="row">
                    <div class="col-sm-2">
                      <input type="text" id="aulas" name="aulas_aluno" class="form-control">
                    </div>
                    <div class="col-sm-2">
                      <input type="text" id="meses" name="meses_aluno" class="form-control">
                    </div>
                    <div class="col-sm-2">
                      <input type="button" onclick="aulaParaValor()" value="---->" class="form-control btn btn-primary">
                    </div>
                    <div class="col-sm-6">
                      <input type="text" name="valor_aluno" id="valor" class="form-control">
                    </div>
                  </div>
                  <br>
                  <div class='row'>
                      
                      <label style="text-align: center; margin-top: 5px;" class="col-sm-12 control-label">Observações</label>
                      
                  </div>
                  <div class='row'>
                      
                     <div class="col-sm-12">
                      <input type="text" name="obs" id="obs" class="form-control">
                    </div>
                    <br>  
                  </div>
                  <div class="row">
                  <div class="form-group">
                    <div class="col-sm-12">
                      <input type="submit" style="margin-top: 15px;" class="form-control btn btn-primary" value="ADICIONAR PAGAMENTO">
                    </div>
                  </div>
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