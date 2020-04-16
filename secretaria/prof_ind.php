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

    function showAulas(){
      document.getElementById('aulas').style='display: block';
      document.getElementById('extras').style='display: none';
    }

    function showExtras(){
      document.getElementById('aulas').style='display: none';
      document.getElementById('extras').style='display: block';
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
        
        <?php

          $id=$_GET['id'];

          require_once('../db.class.php');
          $objDb = new db();
          $link = $objDb->conecta_mysql();

          $resultado_id=mysqli_query($link,"SELECT * FROM `sisoda_professores` WHERE `sisoda_professores_id`='$id'");

          if ($resultado_id) {
            
            $dados_login = mysqli_fetch_array($resultado_id);

            if (isset($dados_login['sisoda_professores_id'])) {

              if ($dados_login['sisoda_professores_saldo'] > 0) {
                                $div_saldo="

                                  <div style='border-bottom: 1px lightgrey solid; background-color: #48C445; margin: 0 0 0 0; margin-bottom:20px;' class='text-center'>
                                    <p style='color:black; font-size: 30px;'>SALDO: R$".$dados_login['sisoda_professores_saldo']."</p>
                                  </div>

                                ";
                              }
                              elseif ($dados_login['sisoda_professores_saldo'] == 0) {
                                $div_saldo="

                                  <div style='border-bottom: 1px lightgrey solid; background-color: lightgray; margin: 0 0 0 0; margin-bottom:20px;' class='text-center'>
                                    <p style='color:black; font-size: 30px;'>SALDO: R$".$dados_login['sisoda_professores_saldo']."</p>
                                  </div>

                                ";
                              }else{
                                $div_saldo="

                                  <div style='border-bottom: 1px lightgrey solid; background-color: #C44545; margin: 0 0 0 0; margin-bottom:20px;' class='text-center'>
                                    <p style='color:black; font-size: 30px;'>SALDO: R$".$dados_login['sisoda_professores_saldo']."</p>
                                  </div>

                                ";
                              }

              $foto=$dados_login['sisoda_professores_foto'];

              if ($dados_login['sisoda_professores_login']==NULL) {
                $login='Ainda não criado.';
              }else{
                $login=$dados_login['sisoda_professores_login'];
              }

              $celular0=$dados_login['sisoda_professores_telefone']/10000;
              $celular=number_format($celular0, 4, '-', '');

              $cpf1=$dados_login['sisoda_professores_cpf']/100;
              $cpf=number_format($cpf1, 2, '-', '.');

              $from = new DateTime($dados_login['sisoda_professores_data']);
              $to   = new DateTime('today');
              $age = $from->diff($to)->y;

              $data_nasc=date_format(date_create($dados_login['sisoda_professores_data']),'d/m/Y');

              $end=$dados_login['sisoda_professores_rua']." ".$dados_login['sisoda_professores_numero'].", ".$dados_login['sisoda_professores_bairro']." - ".$dados_login['sisoda_professores_cidade']."/".$dados_login['sisoda_professores_estado']." - Complemento:".$dados_login['sisoda_professores_complemento'];

              $materias=explode(',', $dados_login['sisoda_professores_materias']);
              $str_materias='';

              foreach ($materias as $key => $value) {
                
                $resultado_id2=mysqli_query($link, "SELECT * FROM `sisoda_materias` WHERE `sisoda_materias_id`='$value'");

                while($dados_login2 = mysqli_fetch_array($resultado_id2, MYSQLI_ASSOC)){

                  $str_materias=$str_materias.$dados_login2['sisoda_materias_nome'].", ";

                }

              }

              
              echo "

                <div class='col-xs-5'>
                  <div class='row'>
                    <h3 style='border-bottom: 2px lightgrey solid; padding-bottom: 10px;'>Página da Aula</h3>
                      <div class='row text-center' style='border-bottom: 1px lightgrey solid; margin-bottom: 10px; padding-left: 20px; font-size: 17px;'>
                        <a href='#myModal' data-toggle='modal'><button style='margin-bottom: 15px;' class='btn btn-primary'><h4 style='padding: 0px 0px 0px 0px'>Ver Foto</h4></button></a>
                        <a href='adicionar_pag_prof2.php?id=$id'><button style='margin-bottom: 15px;' class='btn btn-success'><h4 style='padding: 0px 0px 0px 0px'>Adc. Pagamento</h4></button></a>
                        <a href='cadastro_aulas.php?id_prof=$id&p$id=".$dados_login['sisoda_professores_nome']."'><button style='margin-bottom: 15px;' class='btn btn-warning'><h4 style='padding: 0px 0px 0px 0px'>Adc. Aula</h4></button></a>
                        <a href='editar_prof.php?id=$id'><button style='margin-bottom: 15px;' class='btn btn-primary'><h4 style='padding: 0px 0px 0px 0px'>Editar</h4></button></a>
                        <a href='#myModal2' data-toggle='modal'><button style='margin-bottom: 15px;' class='btn btn-info'><h4 style='padding: 0px 0px 0px 0px'>Ver Feedbacks</h4></button></a>
                        <a href='apagar_prof.php?id=$id'><button style='margin-bottom: 15px;' class='btn btn-danger'><h4 style='padding: 0px 0px 0px 0px'>Não Listar</h4></button></a>
                    </div>
                    <div style='overflow-x: hidden; overflow-y: scroll; height: 54%; padding-right:23px;'>
                    <h3 align='center' style='border-bottom: 2px lightgrey solid; padding-bottom: 10px;'>Dados do Professor</h3>
                    $div_saldo
                      <div class='row' style='border-bottom: 1px lightgrey solid; margin-bottom: 10px; padding-left: 20px; font-size: 17px;'>
                      
                        <div class='row' style='border-bottom: 1px lightgrey solid; margin-bottom: 10px; padding-left: 20px; font-size: 17px;'>
                          <p>Nome: ".$dados_login['sisoda_professores_nome']." ".$dados_login['sisoda_professores_sobrenome']."</p>
                          <p>Telefone: (11) $celular</p>
                          <p>E-mail: ".$dados_login['sisoda_professores_email']."</p>
                          <p>Idade: $age Anos</p>
                          <p>Data de Nascimento: $data_nasc</p>
                          <p>Endereço: $end</p>
                          <p>Observações: ".$dados_login['sisoda_professores_obs']."</p>
                        </div>
                        <div class='row' style='border-bottom: 1px lightgrey solid; margin-bottom: 10px; padding-left: 20px; font-size: 17px;'>
                          <p>Matérias: $str_materias</p>
                          <p>Login: $login</p>
                          <p>Unidade: ".$dados_login['sisoda_professores_unidade']."</p>
                          <p>Valor Mensal: R$".$dados_login['sisoda_professores_mensal']."</p>
                          <p>Valor por Aula: R$".$dados_login['sisoda_professores_valor']."</p>

                        </div>
                        <div class='row' style='border-bottom: 1px lightgrey solid; margin-bottom: 10px; padding-left: 20px; font-size: 17px;'>
                          <h4>Finânceiro</h4>
                          <p>CPF: $cpf</p>
                          <p>Banco: ".$dados_login['sisoda_professores_banco']."</p>
                          <p>Tipo de Conta: ".$dados_login['sisoda_professores_tipoConta']."</p>
                          <p>Agência: ".$dados_login['sisoda_professores_agencia']."</p>
                          <p>Conta: ".$dados_login['sisoda_professores_conta']."</p>
                        </div>
                      </div>
                    </div>
                </div>
             </div>

              ";

            }

          }

        ?>
                



            <div style='border-right: 2px lightgrey solid; height: 76%; margin-left: -5px;' class='col-xs-1'>
                  
            </div>
            <div style='margin-right: -5px;' class='col-xs-1'>
                  
            </div>

             <div class='col-xs-5'>
              <div style='height: 43%;' class='row'>
                    <h3 align='center' style='border-bottom: 2px lightgrey solid; padding-bottom: 10px;'>Próximas Aulas</h3>
                    <div style='overflow-x: hidden;overflow-y: scroll; height: 78%;'>

              <?php

                $hoj=date('Y-m-d H:i:s');

                $resultado_id3=mysqli_query($link, "SELECT * FROM `sisoda_aulas` WHERE `sisoda_aulas_data` > '$hoj' AND `sisoda_aulas_idProfessor`='$id'");

                if ($resultado_id3) {
                  
                  while($dados_login3 = mysqli_fetch_array($resultado_id3, MYSQLI_ASSOC)){

                    $resultado_id4=mysqli_query($link,"SELECT * FROM `sisoda_alunos` WHERE `sisOda_alunos_id`='".$dados_login3['sisoda_aulas_idAluno']."'");

                    while($dados_login4 = mysqli_fetch_array($resultado_id4, MYSQLI_ASSOC)){

                      $aluno=$dados_login4['sisOda_alunos_nome'];

                    }

                    $data_aula=date_format(date_create($dados_login3['sisoda_aulas_data']),'d/m/Y');
                    $hora_aula=date_format(date_create($dados_login3['sisoda_aulas_data']),'H:i');

                    echo "

                        <div class='row' style='border-bottom: 1px lightgrey solid; margin-bottom: 10px;'>
                          <div class='col-sm-10'>
                            <p>Aula com o aluno(a) <a href='aluno_ind.php?id=".$dados_login3['sisoda_aulas_idAluno']."'>$aluno</a></p>
                            <p>Dia $data_aula às $hora_aula</p>
                          </div>
                          <div class='col-sm-2'>
                            <a href='aula_ind.php?id=".$dados_login3['sisoda_aulas_id']."'>
                              <button style='margin-top: 10px;' class='btn btn-primary'>
                                <span class='arrow_triangle-right_alt2'></span>
                              </button>
                            </a>
                          </div>
                        </div>

                    ";

                  }

                }

              ?>

                    </div>
                  </div>


                  <div style='height: 43%;' class='row'>
                    <div style='border-bottom: 2px lightgrey solid; margin-bottom: 10px;' class='row'>
                      <div class='col-sm-6'>
                        <h3 style=' padding-bottom: -7px;'>Aulas</h3>
                      </div>

                      <div class='col-sm-6'>
                        <h3 align='right'>Pagamentos</h3>
                      </div>
                        
                    </div>
                    <div style='overflow-x: hidden;overflow-y: scroll; height: 78%;'>
                      <div class='col-sm-6' style="border-right: 1px solid lightgrey;">

              <?php
                $resultado_id5=mysqli_query($link, "SELECT * FROM `sisoda_aulas` WHERE `sisoda_aulas_idProfessor`='$id'");

                if ($resultado_id5) {
                  
                  while($dados_login5 = mysqli_fetch_array($resultado_id5, MYSQLI_ASSOC)){

                    $resultado_id6=mysqli_query($link,"SELECT * FROM `sisoda_alunos` WHERE `sisOda_alunos_id`='".$dados_login5['sisoda_aulas_idAluno']."'");

                    while($dados_login6 = mysqli_fetch_array($resultado_id6, MYSQLI_ASSOC)){

                      $aluno=$dados_login6['sisOda_alunos_nome'];

                    }

                    if ($dados_login5['sisoda_aulas_paga']==1) {
                      $paga='Paga';
                    }else{
                      $paga='Não Paga';
                    }

                    $data_aula=date_format(date_create($dados_login5['sisoda_aulas_data']),'d/m/Y');
                    $hora_aula=date_format(date_create($dados_login5['sisoda_aulas_data']),'H:i');

                    echo "

                        <div class='row' style='border-bottom: 1px lightgrey solid; margin-bottom: 10px; padding-left: -20px;'>
                                    <p>Valor R$".$dados_login['sisoda_professores_valor']."</p>
                                    <p>$paga</p>
                                    <p><a href='aula_ind.php?id=".$dados_login5['sisoda_aulas_id']."'>Aula com o aluno(a) $aluno</a></p>
                                    <p>$data_aula às $hora_aula</p>
                        </div>

                    ";

                  }

                }

              ?>

                        
                      </div>
                      <div class='col-sm-6'>

              <?php

                $resultado_id7=mysqli_query($link,"SELECT * FROM `sisoda_pagamentos_prof` WHERE `sisoda_pagamentos_prof_idProfessor`='$id'");

                if ($resultado_id7) {
                  
                  while($dados_login7 = mysqli_fetch_array($resultado_id7, MYSQLI_ASSOC)){

                    $data_pag=date_format(date_create($dados_login7['sisoda_pagamentos_prof_data']),'d/m/Y');

                    echo "

                        <div class='row' style='border-bottom: 1px lightgrey solid; margin-bottom: 10px; padding-right: 10px; text-align: right;'>
                          <p>Valor R$".$dados_login7['sisoda_pagamentos_prof_valor']."</p>
                          <p>Pago Dia $data_pag</p>                        
                        </div>

                    ";

                  }

                }

              ?>
                       
                      </div>
                    </div>
                  </div>
              </div>



              <div aria-hidden='true' aria-labelledby='myModalLabel' role='dialog' tabindex='-1' id='myModal' class='modal fade'>
                  <div class='modal-dialog'>
                    <div class='modal-content'>
                      <div class='modal-header'>
                        <button aria-hidden='true' data-dismiss='modal' class='close' type='button'>×</button>
                        <h4 class='modal-title'>Foto do Professor</h4>
                      </div>
                      <div class='modal-body text-center'>

                        <img style="margin-left: -100px;" width="750" src=<?php echo "'../admin/img/prof/$foto'"; ?>>

                      </div>
                    </div>
                  </div>
                </div>
              <div aria-hidden='true' aria-labelledby='myModalLabel' role='dialog' tabindex='-1' id='myModal2' class='modal fade'>
                      <div class='modal-dialog'>
                        <div class='modal-content'>
                          <div class='modal-header'>
                            <button aria-hidden='true' data-dismiss='modal' class='close' type='button'>×</button>
                            <h4 class='modal-title'>Feedbacks</h4>
                          </div>
                          <div class='modal-body text-center'>

                            <?php 

                              $query=mysqli_query($link, "SELECT * FROM `sisoda_aulas` WHERE `sisoda_aulas_idProfessor`='$id' AND `sisoda_aulas_comentarioAluno` IS NOT NULL");
                              if ($query) {

                                while($aula = mysqli_fetch_array($query, MYSQLI_ASSOC)){

                                  $data=date_format(date_create($aula['sisoda_aulas_data']),'d/m/Y');
                                  $hora=date_format(date_create($aula['sisoda_aulas_data']),'H:i');
                                
                                  $query2=mysqli_query($link, "SELECT `sisOda_alunos_nome` FROM `sisoda_alunos` WHERE `sisOda_alunos_id`='".$aula['sisoda_aulas_idAluno']."'");

                                  if ($query2) {
                                    
                                    while($aluno = mysqli_fetch_array($query2, MYSQLI_ASSOC)){

                                      $nome_aluno=$aluno['sisOda_alunos_nome'];

                                    }

                                  }

                                  echo "

                            <div class='row' style='border-bottom: 1px lightgrey solid; margin-bottom: 10px; padding-left: 20px;'>
                                <h4><a href=''>Aula com o aluno $nome_aluno</a></h4>
                                <h4>$data às $hora</h4>
                                <div class='col-md-3'>
                                  
                                </div>
                                <div class='col-md-6'>
                                  <p>".$aula['sisoda_aulas_comentarioAluno']."</p>
                                </div>
                                <div class='col-md-3'>
                                  
                                </div>
                            </div>

                                  ";

                                }

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