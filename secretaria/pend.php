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
    
    function aulaParaValor(){

      x=document.getElementById('aulas').value;

      var aluno_selec = document.forms[0];
      var txt = "";
      var i;
      for (i = 0; i < aluno_selec.length; i++) {
        if (aluno_selec[i].checked) {
          txt = aluno_selec[i].value;
        } 
      }
      z=document.getElementById(txt).value;

      y=z*x;

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
              <li><i class="icon_document_alt"></i>Alunos</li>
              <li><i class="icon_document_alt"></i>Pendências</li>
            </ol>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-12">
            <section style="margin-top: -17px;" class="panel">
              <div class="panel-body">
                <h3 align="center">Alunos Com Pendências</h3><br>
                <form action="apagar_varios_alunos.php" method="POST">
                <table class="table table-striped table-advance table-hover">
                <tbody>
                  
                    <tr>
                      <th></th>
                      <th><i class="icon_profile"></i> Nome</th>
                      <th><i class="icon_calendar"></i> Saldo</th>
                      <th><i class="icon_mail_alt"></i> E-mail</th>
                      <th><i class="icon_pin_alt"></i> Unidade</th>
                      <th><i class="icon_mobile"></i> Telefone</th>
                      <th><i class="icon_cogs"></i> Ações</th>
                    </tr>
                  <?php 

  require_once('../db.class.php');

    $sql = "SELECT * FROM `sisoda_alunos` WHERE `sisOda_alunos_saldo` < 0 ORDER BY `sisOda_alunos_id` ASC
";

    $objDb = new db();
    $link = $objDb->conecta_mysql();

    $resultado_id = mysqli_query($link, $sql);

      if($resultado_id){

        while($dados_login = mysqli_fetch_array($resultado_id, MYSQLI_ASSOC)){

          echo "<input type='hidden' name='".$dados_login['sisOda_alunos_id']."' value='".$dados_login['sisOda_alunos_saldo']."'>";
          
          echo "<tr style='background-color:#dcdcdc;'>
                    <td><input type='checkbox' name='aluno_selec[]' value='".$dados_login['sisOda_alunos_id']."'><input type='hidden' id='".$dados_login['sisOda_alunos_id']."' value='".$dados_login['sisOda_alunos_tipoDePlano']."'></td>";

          echo "<td>".$dados_login['sisOda_alunos_nome']." ".$dados_login['sisOda_alunos_sobrenome']."</td>";

            if ($dados_login['sisOda_alunos_saldo']>0) {
              echo "<td class='success' style='color:green;'>R$".$dados_login['sisOda_alunos_saldo']."</td>";
            }elseif ($dados_login['sisOda_alunos_saldo']==0) {
              echo "<td class='active' style='color:grey;'>R$".$dados_login['sisOda_alunos_saldo']."</td>";
            }else{
              echo "<td class='danger' style='color:red;'>R$".$dados_login['sisOda_alunos_saldo']."</td>";
            }
            $celular0=$dados_login['sisoda_alunos_telefone']/10000;
            $celular=number_format($celular0, 4, '-', '');
            echo "
                    
                    <td>".$dados_login['sisoda_alunos_email']."</td>
                    <td>".$dados_login['sisOda_alunos_unidade']."</td>
                    <td>".$celular."</td>
                    <td>
                      <div class='btn-group'>
                        <a data-placement='bottom' data-original-title='Ver Mais' class='btn btn-primary tooltips' href='aluno_ind.php?id=".$dados_login['sisOda_alunos_id']."'><i class='icon_zoom-in_alt'></i></a>
                        <a data-placement='bottom' data-original-title='Adicionar Pagamento' class='btn btn-success tooltips'  href='adicionar_pag2.php?id=".$dados_login['sisOda_alunos_id']."'><i class='icon_currency'></i></a>
                        <a data-placement='bottom' data-original-title='Editar Dados' class='btn btn-info tooltips'  href='editar_aluno.php?id=".$dados_login['sisOda_alunos_id']."'><i class='icon_pencil-edit'></i></a>
                        <a data-placement='bottom' data-original-title='Adicionar Pendência' class='btn btn-warning tooltips'  href='adicionar_pend2.php?id=".$dados_login['sisOda_alunos_id']."'><i class='icon_wallet'></i></a>
                        <a onclick=\"javascript: return confirm('Você tem certeza?');\" data-placement='bottom' data-original-title='Não Listar' class='btn btn-danger tooltips'  href='apagar_aluno.php?id=".$dados_login['sisOda_alunos_id']."'><i class='icon_close_alt2'></i></a>
                      </div>
                    </td>
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
                    <label style="text-align: center; margin-top: 5px; font-size: 20px;" class="col-sm-12 control-label">Não Listar Todos Os Selecionados</label>
                  </div>
                  <div class="form-group">
                    <div class="col-sm-12">
                      <input onclick="javascript: return confirm('Você tem certeza?');" type="submit" style="margin-top: 15px;" class="form-control btn btn-primary" value="CONFIRMAR">
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