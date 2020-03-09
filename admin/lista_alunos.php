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
                    <th><i class="icon_profile"></i> Nome</th>
                    <th><i class="icon_calendar"></i> Saldo</th>
                    <th><i class="icon_mail_alt"></i> E-mail</th>
                    <th><i class="icon_pin_alt"></i> Unidade</th>
                    <th><i class="icon_mobile"></i> Celular</th>
                    <th><i class="icon_cogs"></i> Ações</th>
                  </tr>
                  <?php 

  require_once('../db.class.php');

  $sql = "SELECT * FROM sisoda_alunos";
    $objDb = new db();
    $link = $objDb->conecta_mysql();

    $resultado_id = mysqli_query($link, $sql);

    if($resultado_id){

      if($resultado_id){

        while($dados_login = mysqli_fetch_array($resultado_id, MYSQLI_ASSOC)){
          
          echo "<tr style='background-color:#dcdcdc;'>
                    <td>".$dados_login['sisOda_alunos_nome']." ".$dados_login['sisOda_alunos_sobrenome']."</td>";

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
                        <a class='btn btn-primary' onclick='cookies(".$dados_login['sisOda_alunos_id'].")' href='#myModal' data-toggle='modal'><i class='icon_zoom-in_alt'></i></a>
                        <a class='btn btn-success' href='#'><i class='icon_pencil-edit'></i></a>
                        <a class='btn btn-danger' href='#'><i class='icon_close_alt2'></i></a>
                      </div>
                    </td>
                  </tr>";

        }

      }else{
      
          echo 'Erro na consulta de tweets no banco de dados!';

      }
    }
?>
                </tbody>
              </table>
          </div>
        </div>
        <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="myModal" class="modal fade">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
                <h4 align="center" class="modal-title">Mais Detalhes</h4>
              </div>
              <div style="text-align: center;" class="modal-body">
                  <?php

                    require_once('../db.class.php');

                    $a=$_COOKIE['pagina'];

                    $sql = "SELECT * FROM sisoda_alunos WHERE sisOda_alunos_id='$a'";
                      $objDb = new db();
                      $link = $objDb->conecta_mysql();

                      $resultado_id = mysqli_query($link, $sql);

                      if($resultado_id){

                        $dados_login = mysqli_fetch_array($resultado_id);

                          if(isset($dados_login['sisOda_alunos_id'])){

                              $from = new DateTime($dados_login['sisOda_alunos_dataNascimento']);
                              $to   = new DateTime('today');
                              $age = $from->diff($to)->y;
                              
                              $end=$dados_login['sisOda_alunos_rua'].", ".$dados_login['sisOda_alunos_numero']." - ".$dados_login['sisOda_alunos_bairro']." - ".$dados_login['sisOda_alunos_cidade']." - ".$dados_login['sisOda_alunos_estado'];

                              $rg0=$dados_login['sisoda_alunos_rg']/10;
                              $rg=number_format($rg0, 1, '-', '.');
                              $celular0=$dados_login['sisoda_alunos_telefone']/10000;
                              $celular=number_format($celular0, 4, '-', '');
                              $celular01=$dados_login['sisOda_alunos_telRepUm']/10000;
                              $celular1=number_format($celular01, 4, '-', '');
                              $celular02=$dados_login['sisOda_alunos_telRepDois']/10000;
                              $celular2=number_format($celular02, 4, '-', '');

                              if ($dados_login['sisOda_alunos_saldo'] > 0) {
                                $div_saldo="

                                  <div style='border-bottom: 1px lightgrey solid; background-color: #48C445; margin: 0 0 0 0;' class='form-group'>
                                    <p style='color:black; font-size: 30px;'>SALDO: R$".$dados_login['sisOda_alunos_saldo']."</p>
                                  </div>

                                ";
                              }
                              elseif ($dados_login['sisOda_alunos_saldo'] == 0) {
                                $div_saldo="

                                  <div style='border-bottom: 1px lightgrey solid; background-color: lightgray; margin: 0 0 0 0;' class='form-group'>
                                    <p style='color:black; font-size: 30px;'>SALDO: R$".$dados_login['sisOda_alunos_saldo']."</p>
                                  </div>

                                ";
                              }else{
                                $div_saldo="

                                  <div style='border-bottom: 1px lightgrey solid; background-color: #C44545; margin: 0 0 0 0;' class='form-group'>
                                    <p style='color:black; font-size: 30px;'>SALDO: R$".$dados_login['sisOda_alunos_saldo']."</p>
                                  </div>

                                ";
                              }

                              echo "

                                <div style='border-bottom: 1px lightgrey solid;' class='form-group'>
                                  <div style='border-radius: 200px; border: 2px black solid; width: 250px; height:250px; overflow:hidden; margin-left:150px; margin-bottom: 25px;'>
                                      <img style='margin-left:-7px;' height='250' src='img/alunos/".$dados_login['sisOda_alunos_foto']."'>
                                  </div>
                                </div>".
                                $div_saldo
                                ."<div style='border-bottom: 1px lightgrey solid;' class='form-group'>
                                  <h3>Informações Pessoais</h3>
                                  <br>
                                  <p style='font-size:17px;'>".$dados_login['sisOda_alunos_nome']." ".$dados_login['sisOda_alunos_sobrenome']."</p>  
                                  <br>
                                  <p style='font-size:17px;'>RG: ".$rg."</p>  
                                  <br>
                                  <p style='font-size:17px;'>".$celular."</p>  
                                  <br>
                                  <p style='font-size:17px;'>".$dados_login['sisoda_alunos_email']."</p>  
                                  <br>
                                  <p style='font-size:17px;'>".$age."</p>  
                                  <br>
                                  <p style='font-size:17px;'>".$dados_login['sisOda_alunos_dataNascimento']."</p>  
                                  <br>
                                  <p style='font-size:17px;'>".$dados_login['sisOda_alunos_colegio']."</p>     
                                  <br>
                                  <p style='font-size:17px;'>".$dados_login['sisOda_alunos_anoId']."</p>     
                                  <br>
                                  <p style='font-size:17px;'>".$end."</p>     
                                  <br>
                                  <p style='font-size:17px;'>".$dados_login['sisOda_alunos_obs']."</p>     
                                  <br>
                                    
                                </div>

                                <div style='border-bottom: 1px lightgrey solid;' class='form-group'>
                                  <h3>Informações Responsável 1</h3>
                                  <br>  
                                  <p style='font-size:17px;'>".$dados_login['sisOda_alunos_nomeRepUm']."</p>     
                                  <br>
                                  <p style='font-size:17px;'>".$dados_login['sisOda_alunos_emailRepUm']."</p>     
                                  <br>
                                  <p style='font-size:17px;'>".$celular1."</p>     
                                  <br>
                                </div>

                                <div style='border-bottom: 1px lightgrey solid;' class='form-group'>
                                  <h3>Informações Responsável 2</h3>
                                  <br>  
                                  <p style='font-size:17px;'>".$dados_login['sisOda_alunos_nomeRepDois']."</p>     
                                  <br>
                                  <p style='font-size:17px;'>".$dados_login['sisOda_alunos_emailRepDois']."</p>     
                                  <br>
                                  <p style='font-size:17px;'>".$celular2."</p>     
                                  <br>
                                </div>          

                                <div style='border-bottom: 1px lightgrey solid;' class='form-group'>
                                  <h3>Informações Institucionais</h3>
                                  <br>
                                  <p style='font-size:17px;'> R$".$dados_login['sisOda_alunos_tipoDePlano']." p/ aula</p>     
                                  <br>
                                  <p style='font-size:17px;'>Unidade ".$dados_login['sisOda_alunos_unidade']."</p>         
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