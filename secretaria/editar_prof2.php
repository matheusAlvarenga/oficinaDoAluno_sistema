<?php
  session_start();
  if(!isset($_SESSION['id_sec']) or $_SESSION['id_sec']==''){
    header('Location: ../sem_login.html');
  }
?>

<?php

  $foto=$_POST['foto'];

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
              <li><i class="icon_document_alt"></i>Cadastro de Professores</li>
            </ol>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-12">
            <section style="margin-top: -17px;" class="panel">
              <div class="panel-body">
               <div class="form-group">
                  <h3 style="margin-top: 0px; margin-bottom:20px;" align="center">Foto do Professor</h3>
                    <div class="row">
                      <label style="text-align: center; font-size: 20px;" class="col-sm-12 control-label">Foto</label>
                    </div>
                    <div style="margin-bottom: 20px;" class="text-center">
                      <img width="250" src=<?php echo "'img/prof/$foto'"; ?>><br>
                    </div>
                    <form enctype="multipart/form-data" action="foto_prof.php" method="post">                    
                      <div class="row">
                        <div class="col-sm-3"></div>
                        <div style="margin-right: -50px;" class="col-sm-6">
                          <input type="file" name="file" class="form-control" required>
                        </div>
                        <div class="col-sm-3"></div>
                      </div><br>
                      <?php

                        $id=$_POST['id'];

                        require_once('../db.class.php');

                       $sisoda_professores_materias=$_POST['materias'];

                       $materias=implode(',', $sisoda_professores_materias);

                       $sisoda_professores_nome=$_POST['nome_prof'];
                       $sisoda_professores_sobrenome=$_POST['sobrenome_prof'];
                       $sisoda_professores_data=$_POST['dataNascimento_prof'];
                       $sisoda_professores_email=$_POST['email_prof'];
                       $sisoda_professores_rua=$_POST['rua_prof'];
                       $sisoda_professores_numero=$_POST['num_prof'];
                       $sisoda_professores_bairro=$_POST['bairro_prof'];
                       $sisoda_professores_cidade=$_POST['cidade_prof'];
                       $sisoda_professores_estado=$_POST['estado_prof'];
                       $sisoda_professores_unidade=$_POST['estado_prof'];

                       if ($_POST['complemento_prof'] == '') {
                         
                          $sisoda_professores_complemento=$_POST['complemento_prof'];

                       }else{

                          $sisoda_professores_complemento=NULL;

                       }

                       $sisoda_professores_cep=$_POST['cep'];
                       $sisoda_professores_obs=$_POST['obs_prof'];

                       if ($_POST['obs_prof'] == '') {
                         
                          $sisoda_professores_obs=$_POST['obs_prof'];

                       }else{

                          $sisoda_professores_obs=NULL;

                       }

                       $sisoda_professores_telefone=$_POST['tel_prof'];
                       $sisoda_professores_banco=$_POST['banco_prof'];
                       $sisoda_professores_tipoConta=$_POST['tipo_prof'];
                       $sisoda_professores_agencia=$_POST['ag_prof'];
                       $sisoda_professores_conta=$_POST['cc_prof'];
                       $sisoda_professores_cpf=$_POST['cpf_prof'];
                       $sisoda_professores_valor=$_POST['valor_prof'];
                       $sisoda_professores_mensal=$_POST['mensal_prof'];
                       $sisoda_professores_unidade=$_POST['unidade_prof'];
                
                        $objDb = new db();
                        $link = $objDb->conecta_mysql();

                        $sql="UPDATE `sisoda_professores` SET `sisoda_professores_nome`='$sisoda_professores_nome',`sisoda_professores_sobrenome`='$sisoda_professores_sobrenome',`sisoda_professores_data`='$sisoda_professores_data',`sisoda_professores_email`='$sisoda_professores_email',`sisoda_professores_rua`='$sisoda_professores_rua',`sisoda_professores_numero`='$sisoda_professores_numero',`sisoda_professores_bairro`='$sisoda_professores_bairro',`sisoda_professores_cidade`='$sisoda_professores_cidade',`sisoda_professores_estado`='$sisoda_professores_estado',`sisoda_professores_complemento`='$sisoda_professores_complemento',`sisoda_professores_cep`='$sisoda_professores_cep',`sisoda_professores_materias`='$materias',`sisoda_professores_banco`='$sisoda_professores_banco',`sisoda_professores_tipoConta`='$sisoda_professores_tipoConta',`sisoda_professores_agencia`='$sisoda_professores_agencia',`sisoda_professores_conta`='$sisoda_professores_conta',`sisoda_professores_cpf`='$sisoda_professores_cpf',`sisoda_professores_telefone`='$sisoda_professores_telefone',`sisoda_professores_obs`='$sisoda_professores_obs',`sisoda_professores_unidade`='$sisoda_professores_unidade',`sisoda_professores_mensal`='$sisoda_professores_mensal',`sisoda_professores_valor`='$sisoda_professores_valor' WHERE `sisoda_professores_id`='$id'";


                          $resultado_id = mysqli_query($link, $sql);

                          if($resultado_id){

                            $last_id = $link->insert_id;
                            echo "<input type='hidden' name='id_prof' value='$id'>";

                          }
                          else{

                            echo "Deu Erro<br>";
                            echo "$sql";

                          }



                      ?>
                      <div class="row">
                        <div class="col-sm-3"></div>
                        <div class="col-sm-3">
                          <input type="submit" name="cadastrar" class="form-control btn btn-primary" value="Alterar foto">
                        </div>
                        <div class="col-sm-3">
                          <a href=<?php echo "'prof_ind.php?id=$id'"; ?> class="form-control btn btn-primary">Manter Foto</a>
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