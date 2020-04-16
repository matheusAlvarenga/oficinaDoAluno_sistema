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
      <?php

        $id=$_GET['id'];

        require_once('../db.class.php');

        $sql="SELECT * FROM sisoda_alunos WHERE sisOda_alunos_id='$id'";

        $objDb = new db();
        $link = $objDb->conecta_mysql();

        $resultado_id = mysqli_query($link, $sql);

        if($resultado_id){

          $dados_login = mysqli_fetch_array($resultado_id);

          if(isset($dados_login['sisOda_alunos_id'])){

            $sql2="SELECT * FROM `sisoda_ano` WHERE `sisoda_ano_id`='".$dados_login['sisOda_alunos_anoId']."'";

            $resultado_id2 = mysqli_query($link, $sql2);

            while($dados_login2 = mysqli_fetch_array($resultado_id2, MYSQLI_ASSOC)){

              $ano=$dados_login2['sisoda_ano_nome'];

            }

            if ($dados_login['sisOda_alunos_saldo'] > 0) {
                                $div_saldo="

                                  <div style='border-bottom: 1px lightgrey solid; background-color: #48C445; margin: 0 0 0 0; margin-bottom:20px;' class='text-center'>
                                    <p style='color:black; font-size: 30px;'>SALDO: R$".$dados_login['sisOda_alunos_saldo']."</p>
                                  </div>

                                ";
                              }
                              elseif ($dados_login['sisOda_alunos_saldo'] == 0) {
                                $div_saldo="

                                  <div style='border-bottom: 1px lightgrey solid; background-color: lightgray; margin: 0 0 0 0; margin-bottom:20px;' class='text-center'>
                                    <p style='color:black; font-size: 30px;'>SALDO: R$".$dados_login['sisOda_alunos_saldo']."</p>
                                  </div>

                                ";
                              }else{
                                $div_saldo="

                                  <div style='border-bottom: 1px lightgrey solid; background-color: #C44545; margin: 0 0 0 0; margin-bottom:20px;' class='text-center'>
                                    <p style='color:black; font-size: 30px;'>SALDO: R$".$dados_login['sisOda_alunos_saldo']."</p>
                                  </div>

                                ";
                              }

            $valor_aluno=$dados_login['sisOda_alunos_tipoDePlano'];

            $celular0=$dados_login['sisoda_alunos_telefone']/10000;
            $celular=number_format($celular0, 4, '-', '');
            $celular01=$dados_login['sisOda_alunos_telRepUm']/10000;
            $celular1=number_format($celular01, 4, '-', '');
            $celular02=$dados_login['sisOda_alunos_telRepDois']/10000;
            $celular2=number_format($celular02, 4, '-', '');

            $from = new DateTime($dados_login['sisOda_alunos_dataNascimento']);
            $to   = new DateTime('today');
            $age = $from->diff($to)->y;

            $data=date_create($dados_login['sisOda_alunos_dataNascimento']);

            $data2=date_format($data,'d/m/Y');
                              
            $end=$dados_login['sisOda_alunos_rua'].", ".$dados_login['sisOda_alunos_numero']." - ".$dados_login['sisOda_alunos_bairro']." - ".$dados_login['sisOda_alunos_cidade']." - ".$dados_login['sisOda_alunos_estado']." - Complemento: ".$dados_login['sisOda_alunos_complemento'];

            echo "
              <section style='margin-top:20px;' class='wrapper'>
                <!--overview start-->
                <div class='col-xs-5'>
                  <div class='row'>
                    <h3 style='border-bottom: 2px lightgrey solid; padding-bottom: 10px;'>Página do Aluno</h3>
                      <div class='row text-center' style='border-bottom: 1px lightgrey solid; margin-bottom: 10px; padding-left: 20px; font-size: 17px;'>
                        <a href='#myModal' data-toggle='modal'><button style='margin-bottom: 15px;' class='btn btn-primary'><h4 style='padding: 0px 0px 0px 0px'>Ver Foto</h4></button></a>
                        <a href='adicionar_pag2.php?id=$id'><button style='margin-bottom: 15px;' class='btn btn-success'><h4 style='padding: 0px 0px 0px 0px'>Adc. Pagamento</h4></button></a>
                        <a href='cadastro_aulas3.php?id_aluno=$id&a$id=".$dados_login['sisOda_alunos_nome']."'><button style='margin-bottom: 15px;' class='btn btn-warning'><h4 style='padding: 0px 0px 0px 0px'>Adc. Aula</h4></button></a>
                        <a href='editar_aluno.php?id=$id'><button style='margin-bottom: 15px;' class='btn btn-primary'><h4 style='padding: 0px 0px 0px 0px'>Editar</h4></button></a>
                        <a href='#myModal2' data-toggle='modal'><button style='margin-bottom: 15px;' class='btn btn-info'><h4 style='padding: 0px 0px 0px 0px'>Ver Feedbacks</h4></button></a>
                        <a href='apagar_aluno.php?id=$id'><button style='margin-bottom: 15px;' class='btn btn-danger'><h4 style='padding: 0px 0px 0px 0px'>Não Listar</h4></button></a>
                    </div>
                    <div style='overflow-x: hidden; overflow-y: scroll; height: 54%;'>
                      <div class='row' style='border-bottom: 1px lightgrey solid; margin-bottom: 10px; padding-left: 20px; font-size: 17px;'>
                      <h3 align='center' style='border-bottom: 2px lightgrey solid; padding-bottom: 10px;'>Dados do Aluno</h3>
                      $div_saldo
                        <p>Nome: ".$dados_login['sisOda_alunos_nome']." ".$dados_login['sisOda_alunos_sobrenome']."</p>
                        <p>Telefone: (11) $celular</p>
                        <p>E-mail: ".$dados_login['sisoda_alunos_email']."</p>
                        <p>Idade: $age Anos</p>
                        <p>Data de Nascimento: $data2</p>
                        <p>Colégio: ".$dados_login['sisOda_alunos_colegio']."</p>
                        <p>Ano: $ano</p>
                        <p>Endereço: $end</p>
                        <p>Observação: ".$dados_login['sisOda_alunos_obs']."</p>
                      </div>
                      <div class='row' style='border-bottom: 1px lightgrey solid; margin-bottom: 10px; padding-left: 20px; font-size: 17px;'>
                        <h4>Responsável</h4>
                        <p>Nome: ".$dados_login['sisOda_alunos_nomeRepUm']."</p>
                        <p>Telefone: (11) $celular1</p>
                        <p>E-mail: ".$dados_login['sisOda_alunos_emailRepUm']."</p>
                      </div>
                      <div class='row' style='border-bottom: 1px lightgrey solid; margin-bottom: 10px; padding-left: 20px; font-size: 17px;'>
                        <h4>Responsável Finânceiro</h4>
                        <p>Nome: ".$dados_login['sisOda_alunos_nomeRepDois']."</p>
                        <p>Telefone: (11) $celular2</p>
                        <p>E-mail: ".$dados_login['sisOda_alunos_emailRepDois']."</p>
                      </div>
                      <div class='row' style='border-bottom: 1px lightgrey solid; margin-bottom: 10px; padding-left: 20px; font-size: 17px;'>
                        <h4>Institucional</h4>
                        <p>Valor por Aula: R$".$dados_login['sisOda_alunos_tipoDePlano']."</p>
                        <p>Unidade: ".$dados_login['sisOda_alunos_unidade']."</p>
                        <p>CPF Responsável Finânceiro: ".$dados_login['sisOda_alunos_cpf']."</p>
                      </div>
                    </div>
                  </div>
                </div>
                <div style='border-right: 2px lightgrey solid; height: 76%; margin-left: -5px;' class='col-xs-1'>
                  
                </div>
                <div style='margin-right: -5px;' class='col-xs-1'>
                  
                </div>
                ";

                $hoj=date('Y-m-d H:i:s');

                $sql3="SELECT * FROM `sisoda_aulas` WHERE `sisoda_aulas_data` > '$hoj' AND `sisoda_aulas_idAluno`='$id'";

                $resultado_id3 = mysqli_query($link, $sql3);

                echo "<div class='col-xs-5'>
                    <div style='height: 42%;' class='row'>
                      <h3 style='border-bottom: 2px lightgrey solid; padding-bottom: 10px;'>Próximas Aulas</h3>
                      <div style='overflow-x: hidden;overflow-y: scroll; height: 78%;'>";

                while($dados_login3 = mysqli_fetch_array($resultado_id3, MYSQLI_ASSOC)){

                  $sql4="SELECT * FROM `sisoda_professores` WHERE `sisoda_professores_id`='".$dados_login3['sisoda_aulas_idProfessor']."'";

                  $resultado_id4 = mysqli_query($link, $sql4);

                  while($dados_login4 = mysqli_fetch_array($resultado_id4, MYSQLI_ASSOC)){

                    $professor=$dados_login4['sisoda_professores_nome'];

                  }

                  $dato=date_create($dados_login3['sisoda_aulas_data']);

                  $dato2=date_format($dato,'d/m/Y');

                  $dato3=date_format($dato,'H:i');

                  echo "
                  

                        <div class='row' style='border-bottom: 1px lightgrey solid; margin-bottom: 10px;'>

                          <div class='col-sm-10'>
                            <p>Aula com o Professor <a href='prof_ind.php?id=".$dados_login3['sisoda_aulas_idProfessor']."'>".$professor."</a></p>
                            <p>Dia $dato2 às $dato3</p>
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

                echo "
                    </div>
                  </div> 
                  <div style='height: 44%;' class='row'>
                    <div style='border-bottom: 2px lightgrey solid; margin-bottom: 10px;' class='row'>
                      <div class='col-sm-6'>
                        <h3 style=' padding-bottom: -7px;'>Débitos</h3>
                      </div>

                      <div class='col-sm-6'>
                        <h3 align='right'>Pagamentos</h3>
                      </div>
                        
                    </div>
                    
                    <div style='overflow-x: hidden;overflow-y: scroll; height: 78%;'>

                      <div class='row'>

                        <div class='col-sm-6' style='border-right: 2px solid lightgrey;'>
                        <div class='col-sm-6 text-center' style='border-bottom: 2px solid lightgrey; border-right: 1px solid lightgrey; margin-bottom:10px;'>
                        <button class='btn btn-link' onclick='showAulas()'>Aulas</button>
                        </div>
                        <div class='col-sm-6 text-center' style='border-bottom: 2px solid lightgrey; margin-bottom:10px;'>
                        <button class='btn btn-link' href='#' onclick='showExtras()'>Extras</button>
                        </div>
                        <div id='aulas'>
                        ";

                        $resultado_id6=mysqli_query($link,"SELECT * FROM `sisoda_aulas` WHERE `sisoda_aulas_idAluno`='$id'");

                        if ($resultado_id6) {
                          
                          while($dados_login6 = mysqli_fetch_array($resultado_id6, MYSQLI_ASSOC)){

                            $dato=date_create($dados_login6['sisoda_aulas_data']);

                            $dato2=date_format($dato,'d/m/Y');

                            $dato3=date_format($dato,'H:i');

                            if ($dados_login6['sisoda_aulas_recebida']==1) {
                              $pagamento='Paga';
                            }else{
                              $pagamento='Não Paga';
                            }

                            $sql8="SELECT * FROM `sisoda_professores` WHERE `sisoda_professores_id`='".$dados_login6['sisoda_aulas_idProfessor']."'";

                            $resultado_id8 = mysqli_query($link, $sql8);

                            while($dados_login8 = mysqli_fetch_array($resultado_id8, MYSQLI_ASSOC)){

                              $professor=$dados_login8['sisoda_professores_nome'];

                            }

                            echo "<div class='row' style='border-bottom: 1px lightgrey solid; margin-bottom: 10px; padding-left: 20px;'>
                                    <p>Valor R$$valor_aluno</p>
                                    <p>$pagamento</p>
                                    <p><a href='aula_ind.php?id='".$dados_login6['sisoda_aulas_id']."'>Aula com o professor $professor</a></p>
                                    <p>$dato2 às $dato3</p>
                                  </div>";

                          }

                        }

                          



                        echo "</div>
                        <div style='display: none;' id='extras'>";

                        $resultado_id7=mysqli_query($link,"SELECT * FROM `sisoda_pendencias` WHERE `sisoda_pendencias_idAluno`='$id'");

                        if ($resultado_id7) {
                          
                          while($dados_login7 = mysqli_fetch_array($resultado_id7, MYSQLI_ASSOC)){

                            $dati=date_create($dados_login3['sisoda_pendencias_data']);

                            $dati2=date_format($dati,'d/m/Y');

                            if ($dados_login7['sisoda_pendencias_paga']==1) {
                              $pagamento='Paga';
                            }else{
                              $pagamento='Não Paga';
                            }

                            echo "<div class='row' style='border-bottom: 1px lightgrey solid; margin-bottom: 10px; padding-left: 20px;'>
                                    <p>Valor R$$valor_aluno</p>
                                    <p>$pagamento</p>
                                    <p>".$dados_login7['sisoda_pendencias_comentario']."</p>
                                    <p>".$dati2."</p>
                                  </div>";

                          }

                        }

                        echo "</div>
                        </div>

                        <div class='col-sm-6'>";

                        $resultado_id5=mysqli_query($link, "SELECT * FROM `sisoda_pagamentos` WHERE `sisoda_pagamentos_idAluno`='$id'");

                        if ($resultado_id5) {
                          
                          while($dados_login5 = mysqli_fetch_array($resultado_id5, MYSQLI_ASSOC)){

                            $date=date_create($dados_login5['sisoda_pagamentos_data']);
                            $date2=date_format($date,'d/m/Y');

                            echo "<div class='row' style='border-bottom: 1px lightgrey solid; margin-bottom: 10px; padding-right: 23px; text-align: right;'>
                                    <p>Valor R$".$dados_login5['sisoda_pagamentos_valor']."</p>
                                    <p>Pago Dia $date2</p>
                                  </div>";

                          }

                        }

                        echo "
                        </div>  
                        
                      </div>


                    </div>
                  </div>
                </div>
                <div aria-hidden='true' aria-labelledby='myModalLabel' role='dialog' tabindex='-1' id='myModal' class='modal fade'>
                  <div class='modal-dialog'>
                    <div class='modal-content'>
                      <div class='modal-header'>
                        <button aria-hidden='true' data-dismiss='modal' class='close' type='button'>×</button>
                        <h4 class='modal-title'>Foto do Aluno</h4>
                      </div>
                      <div class='modal-body text-center'>

                        <img src='../admin/img/alunos/".$dados_login['sisOda_alunos_foto']."'>

                      </div>
                    </div>
                  </div>
                </div>";

                $sql9="SELECT * FROM `sisoda_aulas` WHERE `sisoda_aulas_idAluno`='$id' and `sisoda_aulas_comentarioProfessor` IS NOT NULL";

                echo "
                    <div aria-hidden='true' aria-labelledby='myModalLabel' role='dialog' tabindex='-1' id='myModal2' class='modal fade'>
                      <div class='modal-dialog'>
                        <div class='modal-content'>
                          <div class='modal-header'>
                            <button aria-hidden='true' data-dismiss='modal' class='close' type='button'>×</button>
                            <h4 class='modal-title'>Feedbacks</h4>
                          </div>
                          <div class='modal-body text-center'>";

                $resultado_id9=mysqli_query($link, $sql9);

                if ($resultado_id9) {               

                  while($dados_login9 = mysqli_fetch_array($resultado_id9, MYSQLI_ASSOC)){

                          $sql10="SELECT * FROM `sisoda_professores` WHERE `sisoda_professores_id`='".$dados_login9['sisoda_aulas_idProfessor']."'";



                            $resultado_id10 = mysqli_query($link, $sql10);

                            while($dados_login10 = mysqli_fetch_array($resultado_id10, MYSQLI_ASSOC)){

                              $professor=$dados_login10['sisoda_professores_nome'];

                            }

                            $dato=date_create($dados_login9['sisoda_aulas_data']);

                            $dato2=date_format($dato,'d/m/Y');

                            $dato3=date_format($dato,'H:i');

                            echo "<div class='row' style='border-bottom: 1px lightgrey solid; margin-bottom: 10px; padding-left: 20px;'>
                                <h4><a href=''>Aula com o professor $professor</a></h4>
                                <h4>$dato2 às $dato3</h4>
                                <div class='col-md-3'>
                                  
                                </div>
                                <div class='col-md-6'>
                                  <p>".$dados_login9['sisoda_aulas_comentarioProfessor']."</p>
                                </div>
                                <div class='col-md-3'>
                                  
                                </div>
                            </div>";

                        }
                      }

                    echo  "</div>
                    </div>
                  </div>
                </div>
              </section>

            ";


          }
        }


      ?>
      

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