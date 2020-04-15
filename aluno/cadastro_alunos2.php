<?php
  session_start();
  if(!isset($_SESSION['id_admin'])){
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
              <li><i class="icon_document_alt"></i>Cadastro de Alunos</li>
            </ol>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-12">
            <section style="margin-top: -17px;" class="panel">
              <div class="panel-body">
               <div class="form-group">
                  <h3 style="margin-top: 0px; margin-bottom:20px;" align="center">Foto do Aluno</h3>
                    <div class="row">
                      <label style="text-align: center; font-size: 20px;" class="col-sm-12 control-label">Foto</label>
                    </div>
                    <form enctype="multipart/form-data" action="foto_alunos.php" method="post">                    
                      <div class="row">
                        <div class="col-sm-3"></div>
                        <div style="margin-right: -50px;" class="col-sm-6">
                          <input type="file" name="file" class="form-control" required>
                        </div>
                        <div class="col-sm-3"></div>
                      </div><br>
                      <?php

                        require_once('../db.class.php');

                        $sisOda_alunos_nome=$_POST['nome_aluno'];
                        $sisOda_alunos_sobrenome=$_POST['sobrenome_aluno'];
                        $sisoda_alunos_cpf=$_POST['cpf_financeiro_aluno'];
                        $sisoda_alunos_email=$_POST['email_aluno'];
                        $sisOda_alunos_dataNascimento=$_POST['dataNascimento_aluno'];
                        $sisOda_alunos_colegio=$_POST['colegio_aluno'];
                        $sisOda_alunos_anoId=$_POST['ano_aluno'];
                        $sisOda_alunos_rua=$_POST['rua_aluno'];
                        $sisOda_alunos_numero=$_POST['num_aluno'];
                        $sisOda_alunos_bairro=$_POST['bairro_aluno'];
                        $sisOda_alunos_cidade=$_POST['cidade_aluno'];
                        $sisOda_alunos_estado=$_POST['estado_aluno'];
                        if ($_POST['complemento_aluno'] == '') {
                          $sisOda_alunos_complemento=NULL;
                        }else{
                        $sisOda_alunos_complemento=$_POST['complemento_aluno'];
                        }
                        $sisOda_alunos_cep=$_POST['cep_aluno'];
                        $sisOda_alunos_nomeRepUm=$_POST['nome_rep1_aluno'];
                        $sisOda_alunos_emailRepUm=$_POST['email_rep1_aluno'];
                        $sisOda_alunos_telRepUm=$_POST['tel_rep1_aluno'];
                        $sisOda_alunos_nomeRepDois=$_POST['nome_rep2_aluno'];
                        $sisOda_alunos_emailRepDois=$_POST['email_rep2_aluno'];
                        $sisOda_alunos_financeiro=$_POST['financeiro_aluno'];
                        $sisOda_alunos_telRepDois=$_POST['tel_rep2_aluno'];
                        

                        if (!isset($_POST['mensal_aluno'])) {
                          $sisOda_alunos_mensal=NULL;
                        }else{
                          $sisOda_alunos_mensal=$_POST['mensal_aluno'];
                        }

                        $sisOda_alunos_tipoDePlano=$_POST['valor_aluno'];
                        $sisOda_alunos_unidade=$_POST['unidade_aluno'];
                        if ($_POST['obs_aluno'] == '') {
                          $sisOda_alunos_obs=NULL;
                        }else{
                        $sisOda_alunos_obs=$_POST['obs_aluno'];
                        }
                        $sisoda_alunos_telefone=$_POST['tel_aluno'];



                        $objDb = new db();
                        $link = $objDb->conecta_mysql();

                        $sql="INSERT INTO `sisoda_alunos` (`sisOda_alunos_id`, `sisOda_alunos_nome`, `sisOda_alunos_sobrenome`, `sisoda_alunos_cpf`, `sisoda_alunos_email`, `sisOda_alunos_dataNascimento`, `sisOda_alunos_colegio`, `sisOda_alunos_anoId`, `sisOda_alunos_rua`, `sisOda_alunos_numero`, `sisOda_alunos_bairro`, `sisOda_alunos_cidade`, `sisOda_alunos_estado`, `sisOda_alunos_complemento`, `sisOda_alunos_cep`, `sisOda_alunos_nomeRepUm`, `sisOda_alunos_emailRepUm`, `sisOda_alunos_telRepUm`, `sisOda_alunos_nomeRepDois`, `sisOda_alunos_emailRepDois`, `sisOda_alunos_financeiro`, `sisOda_alunos_telRepDois`, `sisOda_alunos_tipoDePlano`, `sisOda_alunos_foto`, `sisOda_alunos_unidade`, `sisOda_alunos_ativo`, `sisOda_alunos_obs`, `sisoda_alunos_telefone`, `sisOda_alunos_saldo`,`sisOda_alunos_mensal`) VALUES (NULL, '$sisOda_alunos_nome', '$sisOda_alunos_sobrenome', '$sisoda_alunos_cpf', '$sisoda_alunos_email', '$sisOda_alunos_dataNascimento', '$sisOda_alunos_colegio', '$sisOda_alunos_anoId', '$sisOda_alunos_rua', '$sisOda_alunos_numero', '$sisOda_alunos_bairro', '$sisOda_alunos_cidade', '$sisOda_alunos_estado', '$sisOda_alunos_complemento', '$sisOda_alunos_cep', '$sisOda_alunos_nomeRepUm', '$sisOda_alunos_emailRepUm', '$sisOda_alunos_telRepUm', '$sisOda_alunos_nomeRepDois', '$sisOda_alunos_emailRepDois', '$sisOda_alunos_financeiro', '$sisOda_alunos_telRepDois', '$sisOda_alunos_tipoDePlano', NULL, '$sisOda_alunos_unidade', '1', '$sisOda_alunos_obs', '$sisoda_alunos_telefone', '0.00','$sisOda_alunos_mensal')";

                          $resultado_id = mysqli_query($link, $sql);

                          if($resultado_id){

                            $sql2="SELECT `sisOda_alunos_id` FROM `sisoda_alunos` WHERE `sisOda_alunos_nome` = '$sisOda_alunos_nome' and `sisOda_alunos_sobrenome`= '$sisOda_alunos_sobrenome' and `sisoda_alunos_cpf` = '$sisoda_alunos_cpf' and `sisoda_alunos_email` = '$sisoda_alunos_email' and `sisOda_alunos_dataNascimento` = '$sisOda_alunos_dataNascimento'";
                            $resultado_id2 = mysqli_query($link, $sql2);

                            if($resultado_id2){
                              while($dados_login = mysqli_fetch_array($resultado_id2, MYSQLI_ASSOC)){

                                echo "<input type='hidden' name='id_aluno' value='".$dados_login['sisOda_alunos_id']."'>";

                              }
                            }

                            echo "Deu certo";

                          }else{

                            echo "Não deu certo";

                          }


                      ?>
                      <div class="row">
                        <div class="col-sm-3"></div>
                        <div style="margin-right: -50px;" class="col-sm-6">
                          <input type="submit" name="cadastrar" class="form-control btn btn-primary" required>
                        </div>
                        <div class="col-sm-3"></div>
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