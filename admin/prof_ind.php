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
        <div>
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
              <h3  onclick="back()" style="position: absolute; margin-top: 0px;"><i class="far fa-arrow-alt-circle-left"></i></h3>
              <h4 align="center" class="modal-title">Mais Detalhes</h4>
              </div>
              <div style="text-align: center;" class="modal-body">
                  <?php

                    require_once('../db.class.php');

                    $a=$_GET['id'];

                    $sql = "SELECT * FROM sisoda_professores WHERE sisoda_professores_id='$a'";
                      $objDb = new db();
                      $link = $objDb->conecta_mysql();

                      $resultado_id = mysqli_query($link, $sql);

                      if($resultado_id){

                        $dados_login = mysqli_fetch_array($resultado_id);

                          if(isset($dados_login['sisoda_professores_id'])){

                              $from = new DateTime($dados_login['sisoda_professores_data']);
                              $to   = new DateTime('today');
                              $age = $from->diff($to)->y;
                              
                              $end=$dados_login['sisoda_professores_rua'].", ".$dados_login['sisoda_professores_numero']." - ".$dados_login['sisoda_professores_bairro']." - ".$dados_login['sisoda_professores_cidade']." - ".$dados_login['sisoda_professores_estado'];

                              $rg0=$dados_login['sisoda_professores_cpf']/100;
                              $rg=number_format($rg0, 2, '-', '.');
                              $celular0=$dados_login['sisoda_professores_telefone']/10000;
                              $celular=number_format($celular0, 4, '-', '');

                              if ($dados_login['sisoda_professores_saldo'] > 0) {
                                $div_saldo="

                                  <div style='border-bottom: 1px lightgrey solid; background-color: #48C445; margin: 0 0 0 0;' class='form-group'>
                                    <p style='color:black; font-size: 30px;'>SALDO: R$".$dados_login['sisoda_professores_saldo']."</p>
                                  </div>

                                ";
                              }
                              elseif ($dados_login['sisoda_professores_saldo'] == 0) {
                                $div_saldo="

                                  <div style='border-bottom: 1px lightgrey solid; background-color: lightgray; margin: 0 0 0 0;' class='form-group'>
                                    <p style='color:black; font-size: 30px;'>SALDO: R$".$dados_login['sisoda_professores_saldo']."</p>
                                  </div>

                                ";
                              }else{
                                $div_saldo="

                                  <div style='border-bottom: 1px lightgrey solid; background-color: #C44545; margin: 0 0 0 0;' class='form-group'>
                                    <p style='color:black; font-size: 30px;'>SALDO: R$".$dados_login['sisoda_professores_saldo']."</p>
                                  </div>

                                ";
                              }

                              echo "

                                <div style='border-bottom: 1px lightgrey solid;' class='form-group'>
                                  <div style='border-radius: 200px; border: 2px black solid; width: 250px; height:250px; overflow:hidden; margin-left:150px; margin-bottom: 25px;'>
                                      <img style='margin-left:-7px;' height='250' src='img/prof/".$dados_login['sisoda_professores_foto']."'>
                                  </div>
                                </div>".
                                $div_saldo
                                ."<div style='border-bottom: 1px lightgrey solid;' class='form-group'>
                                  <h3>Informações Pessoais</h3>
                                  <br>
                                  <p style='font-size:17px;'>".$dados_login['sisoda_professores_nome']." ".$dados_login['sisoda_professores_sobrenome']."</p>  
                                  <br>
                                  <p style='font-size:17px;'>(11) ".$celular."</p>  
                                  <br>
                                  <p style='font-size:17px;'>".$dados_login['sisoda_professores_email']."</p>  
                                  <br>
                                  <p style='font-size:17px;'>".$age." anos</p>  
                                  <br>
                                  <p style='font-size:17px;'>Data de Nascimento: ".$dados_login['sisoda_professores_data']."</p>  
                                  <br>
                                  <p style='font-size:17px;'>".$end."</p>     
                                  <br>
                                  <p style='font-size:17px;'>Observação: ".$dados_login['sisoda_professores_obs']."</p>     
                                  <br>
                                    
                                </div>
                                <div style='border-bottom: 1px lightgrey solid;' class='form-group'>
                                  <h3>Informações Bancárias</h3>
                                  <br>
                                  <p style='font-size:17px;'>CPF: ".$rg."</p>  
                                  <br>
                                  <p style='font-size:17px;'>Banco:".$dados_login['sisoda_professores_banco']."</p>     
                                  <br>
                                  <p style='font-size:17px;'>Tipo de conta: ".$dados_login['sisoda_professores_tipoConta']."</p>         
                                  <br>
                                  <p style='font-size:17px;'>Agência: ".$dados_login['sisoda_professores_agencia']."</p>         
                                  <br>
                                  <p style='font-size:17px;'>Conta: ".$dados_login['sisoda_professores_conta']."</p>         
                                  <br>

                                </div>
                                  

                                <div style='border-bottom: 1px lightgrey solid;' class='form-group'>
                                  <h3>Informações Institucionais</h3>
                                  <br>
                                  <p style='font-size:17px;'>Valor por Aula: R$".$dados_login['sisoda_professores_valor']." p/ aula</p>     
                                  <br>
                                  <p style='font-size:17px;'>Valor Mensal: R$".$dados_login['sisoda_professores_mensal']." p/ mês</p>     
                                  <br>
                                  <p style='font-size:17px;'>Unidade ".$dados_login['sisoda_professores_unidade']."</p>         
                                  <br>

                                </div>
                              ";


                          }
                          else
                          {

                          }

                      }else{
                          
                          echo "Erro na execução da consulta, favor entrar em contato com o admin do site";

                      }

                  ?>
                  
                
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