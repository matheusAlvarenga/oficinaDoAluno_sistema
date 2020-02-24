<?php
  session_start();
  if(!isset($_SESSION['id_admin'])){
    header('Location: ../sem_login.html');
  }

?>
<?php

  require_once('../db.class.php');

  $nome_aluno = $_POST['nome_aluno'];
  $sobrenome_aluno = $_POST['sobrenome_aluno'];
  $dataNascimento_aluno = $_POST['dataNascimento_aluno'];
  $email_aluno = $_POST['email_aluno'];
  $colegio_aluno = $_POST['colegio_aluno'];
  $ano_aluno = $_POST['ano_aluno'];
  $cep_aluno = $_POST['cep_aluno'];
  $rua_aluno = $_POST['rua_aluno'];
  $num_aluno = $_POST['num_aluno'];
  $bairro_aluno = $_POST['bairro_aluno'];
  $cidade_aluno = $_POST['cidade_aluno'];
  $estado_aluno = $_POST['estado_aluno'];
  $complemento_aluno = $_POST['complemento_aluno'];
  $obs_aluno = $_POST['obs_aluno'];
  $nome_rep1_aluno = $_POST['nome_rep1_aluno'];
  $email_rep1_aluno = $_POST['email_rep1_aluno'];
  $tel_rep1_aluno = $_POST['tel_rep1_aluno'];
  $nome_rep2_aluno = $_POST['nome_rep2_aluno'];
  $email_rep2_aluno = $_POST['email_rep2_aluno'];
  $tel_rep2_aluno = $_POST['tel_rep2_aluno'];
  $financeiro_aluno = $_POST['financeiro_aluno'];
  $valor_aluno = $_POST['valor_aluno'];
  $unidade_aluno = $_POST['unidade_aluno'];
  $rg_aluno = $_POST['rg_aluno'];
  $tel_aluno = $_POST['tel_aluno'];

    $sql = "INSERT INTO `sisoda_alunos`(`sisOda_alunos_nome`, `sisOda_alunos_sobrenome`, `sisoda_alunos_email`, `sisOda_alunos_dataNascimento`, `sisOda_alunos_colegio`, `sisOda_alunos_anoId`, `sisOda_alunos_rua`, `sisOda_alunos_numero`, `sisOda_alunos_bairro`, `sisOda_alunos_cidade`, `sisOda_alunos_estado`, `sisOda_alunos_complemento`, `sisOda_alunos_cep`, `sisOda_alunos_nomeRepUm`, `sisOda_alunos_emailRepUm`, `sisOda_alunos_telRepUm`, `sisOda_alunos_nomeRepDois`, `sisOda_alunos_emailRepDois`, `sisOda_alunos_financeiro`, `sisOda_alunos_telRepDois`, `sisOda_alunos_tipoDePlano`, `sisOda_alunos_unidade`, `sisOda_alunos_ativo`, `sisOda_alunos_obs`, `sisOda_alunos_rg`, `sisOda_alunos_telefone`) VALUES ('$nome_aluno','$sobrenome_aluno','$email_aluno', '$dataNascimento_aluno','$colegio_aluno','$ano_aluno','$rua_aluno','$num_aluno','$bairro_aluno','$cidade_aluno','$estado_aluno','$complemento_aluno','$cep_aluno','$nome_rep1_aluno','$email_rep1_aluno','$tel_rep1_aluno','$nome_rep2_aluno','$email_rep2_aluno','$financeiro_aluno','$tel_rep2_aluno','$valor_aluno','$unidade_aluno','1','$obs_aluno', '$rg_aluno', '$tel_aluno')";

    $objDb = new db();
    $link = $objDb->conecta_mysql();

    $resultado_id = mysqli_query($link, $sql);

    if($resultado_id){

        $sql2 = "SELECT * FROM sisoda_alunos WHERE sisoda_alunos_rg='$rg_aluno'";

        $resultado_id2 = mysqli_query($link, $sql2);

        if($resultado_id2){

          $dados_login = mysqli_fetch_array($resultado_id2);

            if(isset($dados_login['sisOda_alunos_id'])){
              session_start();
              $_SESSION['id_aluno']=$dados_login['sisOda_alunos_id'];

            }
            else{
              echo "erro 3";
            }
        }
        else{
          echo "Erro 2";
        }
    }
    else{
      echo "Houve um Erro.";
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
    <header class="header dark-bg">
      <div class="toggle-nav">
        <div class="icon-reorder tooltips" data-original-title="Toggle Navigation" data-placement="bottom"><i class="icon_menu"></i></div>
      </div>
      <!--logo start-->
      <a style="margin-top: 8px" href="index.html" class="logo"><img height="45" src="img/logo.png"></a>
      <!--logo end-->
      <div class="top-nav notification-row">
        <!-- notificatoin dropdown start-->
        <ul class="nav pull-right top-menu">
          <!-- alert notification start-->
          <li id="alert_notificatoin_bar" class="dropdown">
            <a data-toggle="dropdown" class="dropdown-toggle" href="#">
              <i class="icon-bell-l"></i>
              <span class="badge bg-important">7</span> 
            </a>
            <ul class="dropdown-menu extended notification">
              <div class="notify-arrow notify-arrow-blue"></div>
              <li>
                <p class="blue">You have 4 new notifications</p>
              </li>
              <li>
                <a href="#">
                  <span class="label label-primary"><i class="icon_profile"></i></span>
                  Friend Request
                  <span class="small italic pull-right">5 mins</span>
                </a>
              </li>
              <li>
                <a href="#">
                  <span class="label label-warning"><i class="icon_pin"></i></span>
                  John location.
                  <span class="small italic pull-right">50 mins</span>
                </a>
              </li>
              <li>
                <a href="#">
                  <span class="label label-danger"><i class="icon_book_alt"></i></span>
                  Project 3 Completed.
                  <span class="small italic pull-right">1 hr</span>
                </a>
              </li>
              <li>
                <a href="#">
                  <span class="label label-success"><i class="icon_like"></i></span>
                  Mick appreciated your work.
                  <span class="small italic pull-right"> Today</span>
                </a>
              </li>
              <li>
                <a href="#">See all notifications</a>
              </li>
            </ul>
          </li>
          <!-- alert notification end-->
          <!-- user login dropdown start-->
          <li class="dropdown">
            <a data-toggle="dropdown" class="dropdown-toggle" href="#">
              <span class="profile-ava">
                <img style="margin-top: -5px;" height="35" alt="" src="img/avatar1_small.jpg">
              </span>
              <span style="margin-top: -5px;" class="username">
                

                <?php 

                    echo $_SESSION['nome_admin'];

                 ?>


              </span>
              <b class="caret"></b>
            </a>
            <ul class="dropdown-menu extended logout">
              <div class="log-arrow-up"></div> 
              <li>
                <a href="login.html"><i class="icon_key_alt"></i> Log Out</a>
              </li>
            </ul>
          </li>
          <!-- user login dropdown end -->
        </ul>
        <!-- notificatoin dropdown end-->
      </div>
    </header>
    <!--header end-->
    <!--sidebar start-->
    <aside>
      <div id="sidebar" class="nav-collapse ">
        <!-- sidebar menu start-->
        <ul class="sidebar-menu">
          <li class="">
            <a class="" href="index.php">
              <i class="icon_house_alt"></i>
              <span>Dashboard</span>
            </a>
          </li>
          <li class="sub-menu active">
            <a href="javascript:;" class="">
              <i class="icon_document_alt"></i>
              <span>Alunos</span>
              <span class="menu-arrow arrow_carrot-right"></span>
            </a>
            <ul class="sub">
              <li><a class="" href="lista_alunos.php">Listagem de Alunos</a></li>
              <li><a class="" href="cadastro_alunos.php">Cadastro de Alunos</a></li>
              <li><a class="" href="form_validation.html">Adicinar Pagamento</a></li>
            </ul>
          </li>
          <li class="sub-menu">
            <a href="javascript:;" class="">
              <i class="icon_desktop"></i>
              <span>Professores</span>
              <span class="menu-arrow arrow_carrot-right"></span>
            </a>
            <ul class="sub">
              <li><a class="" href="general.html">Listagem de Prof.</a></li>
              <li><a class="" href="buttons.html">Cadastro de Prof.</a></li>
              <li><a class="" href="buttons.html">Categorias de Prof.</a></li>
            </ul>
          </li>
          <li class="sub-menu">
            <a href="javascript:;" class="">
              <i class="icon_table"></i>
              <span>Aulas</span>
              <span class="menu-arrow arrow_carrot-right"></span>
            </a>
            <ul class="sub">
              <li><a class="" href="basic_table.html">Listagem de Aulas</a></li>
              <li><a class="" href="basic_table.html">Cadastro de Aulas</a></li>
            </ul>
          </li>
          <li class="sub-menu">
            <a href="" class="">
              <i class="fa fa-cash-register"></i>
              <span>Fechar Pagamentos</span>
            </a>
          </li>
        </ul>
        <!-- sidebar menu end-->
      </div>
    </aside>
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
              <li><i class="icon_document_alt"></i>Cadastro de Alunos</li>
            </ol>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-12">
            <section style="margin-top: -17px;" class="panel">
              <div class="panel-body">
                <form style="margin-left: -30px; margin-right: 20px;" class="form-horizontal" method="POST" action="foto_alunos.php"  enctype="multipart/form-data">
                  <div class="form-group">
                    <h3 style="margin-top: 0px; margin-bottom:20px;" align="center">Foto do Aluno</h3>
                    <label class="col-sm-2 control-label">Foto</label>
                    <div style="margin-right: -50px;" class="col-sm-9">
                      <input type="hidden" name="id_aluno" value=


                          <?php

                              echo $_SESSION['id_aluno'];

                          ?>


                      >
                      <input type="file" name="foto" class="form-control" required>
                      <span class="help-block">A foto deve estar em formato .jpg ou .png , ter tamanho máximo 500x500 e no máximo 100 kB.</span>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-2 control-label"></label>
                    <div style="margin-right: -50px;" class="col-sm-9">
                      <input type="submit" name="cadastrar" class="form-control btn btn-primary" value="ENVIAR">
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