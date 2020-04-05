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
                <form style="margin-left: -30px; margin-right: 20px;" class="form-horizontal" method="POST" action="cadastro_aulas6.php">
                   <?php

                    $url='';
                    $url2='';

                    if (isset($_GET['saldo_aluno'])) {
                      $saldo_aluno=$_GET['saldo_aluno'];
                      echo "<input type='text' name='saldo_aluno' value='$saldo_aluno'>";

                    }

                    if (isset($_GET['valor_aluno'])) {
                      $valor_aluno=$_GET['valor_aluno'];
                      echo "<input type='text' name='valor_aluno' value='$valor_aluno'>";

                    }

                    if (isset($_GET['saldo_prof'])) {
                      $saldo_prof=$_GET['saldo_prof'];
                      echo "<input type='text' name='saldo_prof' value='$saldo_prof'>";

                    }

                    if (isset($_GET['valor_prof'])) {
                      $valor_prof=$_GET['valor_prof'];
                      echo "<input type='text' name='valor_prof' value='$valor_prof'>";

                    }

                    if (isset($_GET['id_aluno'])) {

                      $id_aluno=$_GET['id_aluno'];
                      $nome_aluno=$_GET['nome_aluno2'];

                      $url=$url."id_aluno=$id_aluno&nome_aluno2=$nome_aluno";
                    }else{
                      $url=$url."id_aluno=&nome_aluno2=";
                    }
                    if (isset($_GET['id_prof'])) {

                      $id_prof=$_GET['id_prof'];
                      $nome_prof=$_GET['nome_prof2'];

                      $url2=$url2."id_prof=$id_prof&nome_prof2=$nome_prof";
                    }else{
                      $url2=$url2."id_prof=&nome_prof2=";
                    }

                    if (isset($_GET['id_aluno'])) {
                      echo "<h4 align='center'>Aluno selecionado: $nome_aluno ($id_aluno)</h4>";
                      echo "<a align='center' href='cadastro_aulas.php?".$url."&".$url2."'><h5>Modificar Aluno</h5></a>";
                      echo "<input type='hidden' name='id_aluno' value='$id_aluno'>";
                      echo "<input type='hidden' name='nome_aluno2' value='$nome_aluno'>";

                    }
                    if (isset($_GET['id_prof'])) {
                      echo "<h4 align='center'>Professor selecionado: $nome_prof ($id_prof)</h4>";
                      echo "<a align='center' href='cadastro_aulas3.php?".$url."&".$url2."'><h5>Modificar Professor</h5></a>";
                      echo "<input type='hidden' name='id_prof' value='$id_prof'>";
                      echo "<input type='hidden' name='nome_prof2' value='$nome_prof'>";

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
                      <label style="margin-left: 0px;" class="col-sm-2 control-label">Rua</label>
                      <div class="col-sm-4">
                        <input type="datetime-local" name="data" class="form-control">
                      </div>
                      <label style="margin-left: -6px;" class="col-sm-1 control-label">Unidade</label>
                      <div class="col-sm-4">
                        <select name="unid" class="form-control">
                          <option value="1">1</option>
                          <option value="2">2</option>
                        </select>
                      </div>
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