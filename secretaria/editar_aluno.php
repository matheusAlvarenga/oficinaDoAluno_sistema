<?php
  session_start();
  if(!isset($_SESSION['id_sec']) or $_SESSION['id_sec']==''){
    header('Location: ../sem_login.html');
  }
?>

<?php

  $id=$_GET['id'];

  require_once('../db.class.php');

  $objDb = new db();
  $link = $objDb->conecta_mysql();

  $resultado_id=mysqli_query($link,"SELECT * FROM `sisoda_alunos` WHERE `sisOda_alunos_id`='$id'");

  if ($resultado_id) {
    
    $dados_login = mysqli_fetch_array($resultado_id);
    $nome=$dados_login['sisOda_alunos_nome'];
    $sobrenome=$dados_login['sisOda_alunos_sobrenome'];
    
    $data=date_create($dados_login['sisOda_alunos_dataNascimento']);
    $data3=date_format($data,'Y-m-d');

    $email=$dados_login['sisoda_alunos_email'];
    $colegio=$dados_login['sisOda_alunos_colegio'];
    $ano=$dados_login['sisOda_alunos_anoId'];
    $cep=$dados_login['sisOda_alunos_cep'];
    $rua=$dados_login['sisOda_alunos_rua'];
    $numero=$dados_login['sisOda_alunos_numero'];
    $bairro=$dados_login['sisOda_alunos_bairro'];
    $cidade=$dados_login['sisOda_alunos_cidade'];
    $estado=$dados_login['sisOda_alunos_estado'];
    $complemento=$dados_login['sisOda_alunos_complemento'];
    $obs=$dados_login['sisOda_alunos_obs'];
    $telefone=$dados_login['sisoda_alunos_telefone'];
    $nome_rep1=$dados_login['sisOda_alunos_nomeRepUm'];
    $email_rep1=$dados_login['sisOda_alunos_emailRepUm'];
    $tel_rep1=$dados_login['sisOda_alunos_telRepUm'];
    $nome_rep2=$dados_login['sisOda_alunos_nomeRepDois'];
    $email_rep2=$dados_login['sisOda_alunos_emailRepDois'];
    $tel_rep2=$dados_login['sisOda_alunos_telRepDois'];
    $rep_fin=$dados_login['sisOda_alunos_financeiro'];
    $valor=$dados_login['sisOda_alunos_tipoDePlano'];

    if ($dados_login['sisoda_alunos_mensal'] == 0) {
      
      $mensal='0.00';

    }else{
      $mensal=$dados_login['sisoda_alunos_mensal'];
    }

    $unid=$dados_login['sisOda_alunos_unidade'];
    $cpf=$dados_login['sisoda_alunos_cpf'];
    $foto=$dados_login['sisOda_alunos_foto'];


  }else{
    echo "Deu ruim krai";
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
              <li><i class="icon_document_alt"></i>Editar Aluno</li>
            </ol>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-12">
            <section style="margin-top: -17px;" class="panel">
              <div class="panel-body">
                <form style="margin-right: 20px;" class="form-horizontal" method="POST" action="editar_aluno2.php">
                  <?php

                  echo "<input type='hidden' value='$id' name='id'>";
                  echo "<input type='hidden' value='$foto' name='foto'>";

                  ?>
                  <div class="form-group">
                    <h3 style="margin-top: 0px; margin-bottom:20px;" align="center">Informações Aluno</h3>
                    <label class="col-sm-2 control-label">Nome</label>
                    <div style="margin-right: -50px;" class="col-sm-4">
                      <input value=<?php echo "'$nome'"; ?> type="text" maxlength="50" name="nome_aluno" class="form-control" required>
                    </div>
                    <label style="margin-left: -50px;" class="col-sm-2 control-label">Sobrenome</label>
                    <div class="col-sm-4">
                      <input value=<?php echo "'$sobrenome'"; ?> type="text" maxlength="150" name="sobrenome_aluno" class="form-control" required>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-2 control-label">Data de Nasc.</label>
                    <div style="margin-right: -50px;" class="col-sm-2">
                      <input value=<?php echo "'$data3'"; ?> type="date" name="dataNascimento_aluno" class="form-control" required>
                    </div>
                    <label style="margin-left: -50px;" class="col-sm-2 control-label">E-mail</label>
                    <div class="col-sm-6">
                      <input value=<?php echo "'$email'"; ?> type="text" name="email_aluno" maxlength="100" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" class="form-control">
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-2 control-label">Colégio</label>
                    <div style="margin-right: -40px;" class="col-sm-3">
                      <input value=<?php echo "'$colegio'"; ?> type="text" name="colegio_aluno" maxlength="100" class="form-control" required>
                    </div>
                    <label style="margin-left: -60px;" class="col-sm-2 control-label">Ano</label>
                    <div class="col-sm-2">
                      <select name="ano_aluno" class="form-control m-bot15" required>
                        <?php

                          $resultado_id2=mysqli_query($link,"SELECT * FROM `sisoda_ano`");

                          while($dados_login2 = mysqli_fetch_array($resultado_id2, MYSQLI_ASSOC)){

                            if ($dados_login2['sisoda_ano_id']==$ano) {
                              
                              echo "<option value='".$dados_login2['sisoda_ano_id']."' selected>".$dados_login2['sisoda_ano_nome']."</option>";

                            }else{

                              echo "<option value='".$dados_login2['sisoda_ano_id']."'>".$dados_login2['sisoda_ano_nome']."</option>";

                            }

                          }

                        ?>
                      </select>
                    </div>
                    <label class="col-sm-1 control-label">Cep</label>
                    <div style="margin-right: -26px;" class="col-sm-2">
                      <input value=<?php echo "'$cep'"; ?> onblur="getEndereco()" type="text" id="cep" name="cep_aluno" maxlength="9" class="form-control" required>
                    </div>
                  </div>
                  <div class="form-group">
                    <label style="margin-left: 0px;" class="col-sm-2 control-label">Rua</label>
                    <div class="col-sm-6">
                      <input value=<?php echo "'$rua'"; ?> type="text" id="rua" name="rua_aluno" maxlength="100" class="form-control">
                    </div>
                    <label style="margin-left: -6px;" class="col-sm-1 control-label">Número</label>
                    <div class="col-sm-2">
                      <input value=<?php echo "'$numero'"; ?> type="text" onblur="focusNum()" name="num_aluno" id="num" maxlength="11" class="form-control">
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-2 control-label">Bairro</label>
                    <div style="margin-right: -26px;" class="col-sm-3">
                      <input value=<?php echo "'$bairro'"; ?> type="text" id="bairro" name="bairro_aluno" maxlength="50" class="form-control" required>
                    </div>
                    <label style="margin-left: 10px;" class="col-sm-1 control-label">Cidade</label>
                    <div class="col-sm-3">
                      <input value=<?php echo "'$cidade'"; ?> type="text" id="cidade" name="cidade_aluno" maxlength="50" class="form-control">
                    </div>
                    <label style="margin-left: 10px;" class="col-sm-1 control-label">Estado</label>
                    <div class="col-sm-1">
                      <input value=<?php echo "'$estado'"; ?> type="text" id="uf" name="estado_aluno" maxlength="2" class="form-control">
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-2 control-label">Complemento</label>
                    <div style="" class="col-sm-9">
                      <input value=<?php echo "'$complemento'"; ?> type="text" id="compl" name="complemento_aluno" maxlength="150" class="form-control">
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-2 control-label">Observações</label>
                    <div style="" class="col-sm-5">
                      <input value=<?php echo "'$obs'"; ?> type="text" name="obs_aluno" maxlength="200" class="form-control">
                    </div>
                    <label class="col-sm-1 control-label">Telefone</label>
                    <div style="" class="col-sm-3">
                      <input value=<?php echo "'$telefone'"; ?> type="text" name="tel_aluno" maxlength="200" class="form-control">
                    </div>
                  </div>
                  <br>
                  <div class="form-group">
                    <h3 style="margin-top: 0px; margin-bottom:20px;" align="center">Informações Responsável 1</h3>
                    <label class="col-sm-2 control-label">Nome</label>
                    <div style="margin-right: -26px;" class="col-sm-3">
                      <input value=<?php echo "'$nome_rep1'"; ?> id="rep1" type="text" name="nome_rep1_aluno" maxlength="200" class="form-control" required>
                    </div>
                    <label style="margin-left: -20px; margin-right: -10px;" class="col-sm-1 control-label">E-mail</label>
                    <div class="col-sm-3">
                      <input value=<?php echo "'$email_rep1'"; ?> type="text" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" name="email_rep1_aluno" maxlength="100" class="form-control">
                    </div>
                    <label style="margin-left: -36px;" class="col-sm-1 control-label">Número</label>
                    <div class="col-sm-2">
                      <input value=<?php echo "'$tel_rep1'"; ?> type="text" name="tel_rep1_aluno" maxlength="9" class="form-control">
                    </div>
                  </div>
                  <br>
                  <div class="form-group">
                    <h3 style="margin-top: 0px; margin-bottom:20px;" align="center">Informações Responsável 2</h3>
                    <label class="col-sm-2 control-label">Nome</label>
                    <div style="margin-right: -26px;" class="col-sm-3">
                      <input value=<?php echo "'$nome_rep2'"; ?> id="rep2" onblur="responsaveis()" type="text" name="nome_rep2_aluno" maxlength="200" class="form-control" required>
                    </div>
                    <label style="margin-left: -20px; margin-right: -10px;" class="col-sm-1 control-label">E-mail</label>
                    <div class="col-sm-3">
                      <input value=<?php echo "'$email_rep2'"; ?> type="text" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" name="email_rep2_aluno" maxlength="100" class="form-control">
                    </div>
                    <label style="margin-left: -36px;" class="col-sm-1 control-label">Número</label>
                    <div class="col-sm-2">
                      <input value=<?php echo "'$tel_rep2'"; ?> type="text" name="tel_rep2_aluno" maxlength="9" class="form-control">
                    </div>
                  </div>
                  <br>
                  <div class="form-group">
                    <h3 style="margin-top: 0px; margin-bottom:20px;" align="center">Informações Institucionais</h3>
                    <div class="row">
                      <label class="col-sm-2 control-label">Resp. Finânceiro</label>
                      <div style="margin-right: -26px;" class="col-sm-2">
                        <select id="fin" name="financeiro_aluno" class="form-control m-bot15" required>
                          <?php

                            if ($rep_fin == 1) {
                              echo "<option value='1'>$nome_rep1</option>";
                              echo "<option value='2'>$nome_rep2</option>";
                            }else{
                              echo "<option value='1'>$nome_rep1</option>";
                              echo "<option value='2' selected>$nome_rep2</option>";
                            }

                          ?>
                        </select>
                      </div>
                        <label class="col-sm-3 control-label">CPF do Resp. Finânceiro</label>
                        <div style="margin-right:17px;" class="col-sm-2">
                          <input value=<?php echo "'$cpf'"; ?> type="text" name="cpf_financeiro_aluno" maxlength="100" class="form-control">
                        </div>
                        <label style="margin-left: -16px;" class="col-sm-1 control-label">Unidade</label>
                      <div class="col-sm-2">
                        <select name="unidade_aluno" class="form-control m-bot15" required>
                          <?php

                            if ($unid == 1) {
                              echo "<option value='1'>1</option>";
                              echo "<option value='2'>2</option>";
                            }else{
                              echo "<option value='1'>1</option>";
                              echo "<option value='2' selected>2</option>";
                            }

                          ?>
                        </select>
                      </div>
                      </div><br><br>
                      <div class="row">
                        <div class="form-group">
                          <label class="col-sm-2 control-label"></label>
                          <div class="col-sm-9">
                            <input type="submit" class="form-control btn btn-primary">
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