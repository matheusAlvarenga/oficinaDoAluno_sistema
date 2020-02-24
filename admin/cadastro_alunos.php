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
  <script type="text/javascript" >
    
    function getEndereco() {
    // Se o campo CEP não estiver vazio
    if($.trim($("#cep").val()) != ""){
         /*
              Para conectar no serviço e executar o json, precisamos usar a função
              getScript do jQuery, o getScript e o dataType:"jsonp" conseguem fazer o cross-domain, os outros
              dataTypes não possibilitam esta interação entre domínios diferentes
              Estou chamando a url do serviço passando o parâmetro "formato=javascript" e o CEP digitado no formulário
              http://cep.republicavirtual.com.br/web_cep.php?formato=javascript&cep="+$("#cep").val()
         */
         $.getScript("http://cep.republicavirtual.com.br/web_cep.php?formato=javascript&cep="+$("#cep").val(),
function(){
            // o getScript dá um eval no script, então é só ler!
            //Se o resultado for igual a 1
            if(  resultadoCEP["resultado"] ){
               // troca o valor dos elementos
               $("#rua").val(unescape(resultadoCEP["tipo_logradouro"])+" "+unescape(resultadoCEP["logradouro"]));
               $("#bairro").val(unescape(resultadoCEP["bairro"]));
               $("#cidade").val(unescape(resultadoCEP["cidade"]));
               $("#uf").val(unescape(resultadoCEP["uf"]));
               //$("#enderecoCompleto").show("slow");
               $("#num").focus();
            }else{
               alert("Endereço não encontrado");
               return false;
            }
          });
       }
   else{
       alert('Antes, preencha o campo CEP!')
   }

}

  function focusNum(){
    $("#compl").focus();
  }

  function responsaveis(){
    document.getElementById('fin').options[0].text = document.getElementById('rep1').value;
    document.getElementById('fin').options[1].text = document.getElementById('rep2').value;
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
                <form style="margin-left: -30px; margin-right: 20px;" class="form-horizontal" method="POST" action="cadastro_alunos2.php">
                  <div class="form-group">
                    <h3 style="margin-top: 0px; margin-bottom:20px;" align="center">Informações Aluno</h3>
                    <label class="col-sm-2 control-label">Nome</label>
                    <div style="margin-right: -50px;" class="col-sm-4">
                      <input type="text" maxlength="50" name="nome_aluno" class="form-control" required>
                    </div>
                    <label style="margin-left: -50px;" class="col-sm-2 control-label">Sobrenome</label>
                    <div class="col-sm-4">
                      <input type="text" maxlength="150" name="sobrenome_aluno" class="form-control" required>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-2 control-label">Data de Nasc.</label>
                    <div style="margin-right: -50px;" class="col-sm-2">
                      <input type="date" name="dataNascimento_aluno" class="form-control" required>
                    </div>
                    <label style="margin-left: -50px;" class="col-sm-2 control-label">E-mail</label>
                    <div class="col-sm-6">
                      <input type="text" name="email_aluno" maxlength="100" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" class="form-control">
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-2 control-label">Colégio</label>
                    <div style="margin-right: -40px;" class="col-sm-3">
                      <input type="text" name="colegio_aluno" maxlength="100" class="form-control" required>
                    </div>
                    <label class="col-sm-1 control-label">RG</label>
                    <div style="margin-right: -50px;" class="col-sm-3">
                      <input type="text" name="rg_aluno" maxlength="10" class="form-control" required>
                    </div>
                    <label style="margin-left: -100px;" class="col-sm-2 control-label">Ano</label>
                    <div class="col-sm-2">
                      <select name="ano_aluno" class="form-control m-bot15" required>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                      </select>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-2 control-label">Cep</label>
                    <div style="margin-right: -26px;" class="col-sm-2">
                      <input onblur="getEndereco()" type="text" id="cep" name="cep_aluno" maxlength="9" class="form-control" required>
                    </div>
                    <label style="margin-left: -36px;" class="col-sm-1 control-label">Rua</label>
                    <div class="col-sm-4">
                      <input type="text" id="rua" name="rua_aluno" maxlength="100" class="form-control">
                    </div>
                    <label style="margin-left: -36px;" class="col-sm-1 control-label">Número</label>
                    <div class="col-sm-2">
                      <input type="text" onblur="focusNum()" name="num_aluno" id="num" maxlength="11" class="form-control">
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-2 control-label">Bairro</label>
                    <div style="margin-right: -26px;" class="col-sm-3">
                      <input type="text" id="bairro" name="bairro_aluno" maxlength="50" class="form-control" required>
                    </div>
                    <label style="margin-left: 10px;" class="col-sm-1 control-label">Cidade</label>
                    <div class="col-sm-3">
                      <input type="text" id="cidade" name="cidade_aluno" maxlength="50" class="form-control">
                    </div>
                    <label style="margin-left: 10px;" class="col-sm-1 control-label">Estado</label>
                    <div class="col-sm-1">
                      <input type="text" id="uf" name="estado_aluno" maxlength="2" class="form-control">
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-2 control-label">Complemento</label>
                    <div style="" class="col-sm-9">
                      <input type="text" id="compl" name="complemento_aluno" maxlength="150" class="form-control">
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-2 control-label">Observações</label>
                    <div style="" class="col-sm-5">
                      <input type="text" name="obs_aluno" maxlength="200" class="form-control">
                    </div>
                    <label class="col-sm-1 control-label">Telefone</label>
                    <div style="" class="col-sm-3">
                      <input type="text" name="tel_aluno" maxlength="200" class="form-control">
                    </div>
                  </div>
                  <br>
                  <div class="form-group">
                    <h3 style="margin-top: 0px; margin-bottom:20px;" align="center">Informações Responsável 1</h3>
                    <label class="col-sm-2 control-label">Nome</label>
                    <div style="margin-right: -26px;" class="col-sm-3">
                      <input id="rep1" type="text" name="nome_rep1_aluno" maxlength="200" class="form-control" required>
                    </div>
                    <label style="margin-left: -20px; margin-right: -10px;" class="col-sm-1 control-label">E-mail</label>
                    <div class="col-sm-3">
                      <input type="text" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" name="email_rep1_aluno" maxlength="100" class="form-control">
                    </div>
                    <label style="margin-left: -36px;" class="col-sm-1 control-label">Número</label>
                    <div class="col-sm-2">
                      <input type="text" name="tel_rep1_aluno" maxlength="9" class="form-control">
                    </div>
                  </div>
                  <br>
                  <div class="form-group">
                    <h3 style="margin-top: 0px; margin-bottom:20px;" align="center">Informações Responsável 2</h3>
                    <label class="col-sm-2 control-label">Nome</label>
                    <div style="margin-right: -26px;" class="col-sm-3">
                      <input id="rep2" onblur="responsaveis()" type="text" name="nome_rep2_aluno" maxlength="200" class="form-control" required>
                    </div>
                    <label style="margin-left: -20px; margin-right: -10px;" class="col-sm-1 control-label">E-mail</label>
                    <div class="col-sm-3">
                      <input type="text" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" name="email_rep2_aluno" maxlength="100" class="form-control">
                    </div>
                    <label style="margin-left: -36px;" class="col-sm-1 control-label">Número</label>
                    <div class="col-sm-2">
                      <input type="text" name="tel_rep2_aluno" maxlength="9" class="form-control">
                    </div>
                  </div>
                  <br>
                  <div class="form-group">
                    <h3 style="margin-top: 0px; margin-bottom:20px;" align="center">Informações Institucionais</h3>
                    <label class="col-sm-2 control-label">Resp. Finânceiro</label>
                    <div style="margin-right: -26px;" class="col-sm-3">
                      <select id="fin" name="financeiro_aluno" class="form-control m-bot15" required>
                        <option value="1"></option>
                        <option value="2"></option>
                      </select>
                    </div>
                    <label style="margin-left: -40px; margin-right: -10px;" class="col-sm-2 control-label">Valor Por Aula</label>
                    <div class="col-sm-3">
                      <input type="text" pattern="[0-9]+.[0-9]{2}" name="valor_aluno" maxlength="100" class="form-control">
                    </div>
                    <label style="margin-left: -16px;" class="col-sm-1 control-label">Unidade</label>
                    <div class="col-sm-1">
                      <select name="unidade_aluno" class="form-control m-bot15" required>
                        <option value="1">1</option>
                        <option value="2">2</option>
                      </select>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-2 control-label"></label>
                    <div class="col-sm-9">
                      <input type="submit" class="form-control btn btn-primary">
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