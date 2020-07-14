<?php
  session_start();
  if(!isset($_SESSION['id_admin'])){
    header('Location: ../sem_login.html');
  }

  require_once('../db.class.php');
  $objDb = new db();
  $link = $objDb->conecta_mysql();

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
  <script type="text/javascript">
    function showM(){

      document.getElementById('mensal').style='display: block; margin-top: -30px;';
      document.getElementById('diario').style='display: none';
      document.getElementById('semanal').style='display: none';

    }

    function showD(){
      
      document.getElementById('mensal').style='display: none';
      document.getElementById('diario').style='display: block; margin-top: -30px;';
      document.getElementById('semanal').style='display: none';

    }

    function showS(){
      
      document.getElementById('mensal').style='display: none';
      document.getElementById('diario').style='display: none';
      document.getElementById('semanal').style='display: block; margin-top: -30px;';

    }
  </script>

</head>

<body onload="data()">
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

        <div class="row">
          <div class="col-md-12 portlets">
            <div class="panel panel-default">
              <div style="height: 20px" class="panel-heading">
                <h2><strong>Extrato</strong></h2>
                <div class="panel-actions">
                  <a onclick="showM()" href="#"><i style="font-size: 20px; margin-right: 5px; padding: 0 10px 0 10px;">M</i></a>
                  <a onclick="showS()" href="#"><i style="font-size: 20px; margin-right: 5px; padding: 0 10px 0 10px;">S</i></a>
                  <a onclick="showD()" href="#"><i style="font-size: 20px; margin-right: 5px; padding: 0 10px 0 10px;">D</i></a>
                  <a href="imprimir_extrado.php"><i style="font-size: 20px; margin-right: 60px; padding: 0 10px 0 10px;">Imprimir</i></a>
                </div>
              </div><br>
              <div class="panel-body">
                
                <div style="margin-top: -30px;" class="row" id="mensal">

                  <?php

                      $mes=date('m');
                      $ano=date('Y');

                    // CALCULAR PAGAMENTOS DE ALUNOS

                        $resultado_id = mysqli_query($link,"SELECT SUM(`sisoda_pagamentos_valor`) FROM `sisoda_pagamentos` WHERE MONTH(`sisoda_pagamentos_data`) = '$mes' AND YEAR(`sisoda_pagamentos_data`) = '$ano'");
                        $row= mysqli_fetch_array($resultado_id);

                        $valor_total_pag_a=$row[0];


                    // CALCULAR PAGAMENTOS DE PROFESSORES

                        $resultado_id = mysqli_query($link,"SELECT SUM(`sisoda_pagamentos_prof_valor`) FROM `sisoda_pagamentos_prof` WHERE MONTH(`sisoda_pagamentos_prof_data`) = '$mes' AND YEAR(`sisoda_pagamentos_prof_data`) = '$ano'");
                        $row= mysqli_fetch_array($resultado_id);

                        $valor_total_pag_p=$row[0];

                    // CALCULAR DESPESAS

                        $resultado_id = mysqli_query($link,"SELECT SUM(`sisoda_despesas_valor`) FROM `sisoda_despesas` WHERE MONTH(`sisoda_despesas_data`) = '$mes' AND YEAR(`sisoda_despesas_data`) = '$ano'");
                        $row= mysqli_fetch_array($resultado_id);

                        $valor_total_desp=$row[0];

                    // CALCULAR SALDO FINAL 

                        $saldo_final=($valor_total_pag_a-$valor_total_pag_p-$valor_total_desp);
                        
                        if(strpos($saldo_final,'.') === false){
                            
                            $saldo_final=$saldo_final.'.00'; 
                            
                        }

                    // IF

                        if ($saldo_final > 0) {
                          
                          echo "

                          <div style='width: 100%; height: 40px; background-color: green; margin-left: 0;' class='row'>
                            <h3 style='margin-top: 7px; color: white;' align='center'><strong>Total do Mês: R$$saldo_final</strong></h3>
                          </div>  

                          ";

                        }elseif ($saldo_final == 0) {
                          
                          echo "

                          <div style='width: 100%; height: 40px; background-color: grey; margin-left: 0;' class='row'>
                            <h3 style='margin-top: 7px; color: black;' align='center'><strong>Total do Mês: R$$saldo_final</strong></h3>
                          </div>

                          ";

                        }else{

                          echo "

                          <div style='width: 100%; height: 40px; background-color: red; margin-left: 0;' class='row'>
                            <h3 style='margin-top: 7px; color: black;' align='center'><strong>Total do Mês: R$$saldo_final</strong></h3>
                          </div>

                          ";

                        }

                    ?>
                  
                  <h3 align="center"><?php 

                  setlocale(LC_TIME, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');
                  date_default_timezone_set('America/Sao_Paulo');
                  echo strftime('%B de %Y', strtotime('today'));

                   ?></h3>
                  <div class="col-md-4" style="border-right: 1px solid grey;">
                    <div class="row">
                      <h4 style="padding-bottom: 15px; border-bottom: 1px solid lightgrey;" align="center">Pagamentos de Aluno</h4>
                    </div>
                    
                    <?php

                      $mes=date('m');
                      $ano=date('Y');

                      $resultado_id=mysqli_query($link, "SELECT * FROM `sisoda_pagamentos` WHERE MONTH(`sisoda_pagamentos_data`) = '$mes' AND YEAR(`sisoda_pagamentos_data`) = '$ano'");

                      if ($resultado_id) {
                        
                        while($dados_login = mysqli_fetch_array($resultado_id, MYSQLI_ASSOC)){

                          $resultado_id2=mysqli_query($link, "SELECT `sisOda_alunos_nome`,`sisOda_alunos_id` FROM `sisoda_alunos` WHERE `sisOda_alunos_id`='".$dados_login['sisoda_pagamentos_idAluno']."'");

                          while($dados_login2 = mysqli_fetch_array($resultado_id2, MYSQLI_ASSOC)){

                            $id_aluno=$dados_login2['sisOda_alunos_id'];
                            $nome_aluno=$dados_login2['sisOda_alunos_nome'];

                          }

                          $data=date_format(date_create($dados_login['sisoda_pagamentos_data']),'d/m/Y');

                        if($dados_login['sisoda_pagamentos_obs']==NULL or $dados_login['sisoda_pagamentos_obs']==''){
                                
                                $obs="Nenhuma Obs";
                                
                            }else{
                                
                                $obs=$dados_login['sisoda_pagamentos_obs'];
                                
                            }

                          echo "

                            <div style='border-bottom: 1px solid lightgrey;' class='row'>
                              <h5 style='font-size: 25px;' align='center'>+ R$".$dados_login['sisoda_pagamentos_valor']."</h5>
                              <h5 align='center'>$data</h5>
                              <h5 align='center'><a style='color: black; text-decoration: underline;' href='#'>$nome_aluno ($id_aluno)</a></h5>
                              <h5 align='center'>'$obs'</h5>
                            </div>

                          ";

                        }

                      }

                    ?>

                  </div>
                  <div class="col-md-4" style="border-right: 1px solid grey;">
                    <div class="row">
                      <h4 style="padding-bottom: 15px; border-bottom: 1px solid lightgrey;" align="center">Pagamentos de Professores</h4>
                    </div>
                    
                    <?php

                      $mes=date('m');
                      $ano=date('Y');

                      $resultado_id=mysqli_query($link, "SELECT * FROM `sisoda_pagamentos_prof` WHERE MONTH(`sisoda_pagamentos_prof_data`) = '$mes' AND YEAR(`sisoda_pagamentos_prof_data`) = '$ano'");

                      if ($resultado_id) {
                        
                        while($dados_login = mysqli_fetch_array($resultado_id, MYSQLI_ASSOC)){

                          $resultado_id2=mysqli_query($link, "SELECT `sisoda_professores_nome`,`sisoda_professores_id` FROM `sisoda_professores` WHERE `sisoda_professores_id`='".$dados_login['sisoda_pagamentos_prof_idProfessor']."'");

                          while($dados_login2 = mysqli_fetch_array($resultado_id2, MYSQLI_ASSOC)){

                            $id_prof=$dados_login2['sisoda_professores_id'];
                            $nome_prof=$dados_login2['sisoda_professores_nome'];

                          }

                          $data=date_format(date_create($dados_login['sisoda_pagamentos_prof_data']),'d/m/Y');
                          
                          if($dados_login['sisoda_pagamentos_prof_obs']==NULL or $dados_login['sisoda_pagamentos_prof_obs']==''){
                                
                                $obs="Nenhuma Obs";
                                
                            }else{
                                
                                $obs=$dados_login['sisoda_pagamentos_prof_obs'];
                                
                            }

                          echo "

                            <div style='border-bottom: 1px solid lightgrey;' class='row'>
                              <h5 style='font-size: 25px;' align='center'>+ R$".$dados_login['sisoda_pagamentos_prof_valor']."</h5>
                              <h5 align='center'>$data</h5>
                              <h5 align='center'><a style='color: black; text-decoration: underline;' href='#'>$nome_prof ($id_prof)</a></h5>
                              <h5 align='center'>'$obs'</h5>
                            </div>

                          ";

                        }

                      }

                    ?>

                  </div>
                  <div class="col-md-4">
                    <div class="row">
                      <h4 style="padding-bottom: 15px; border-bottom: 1px solid lightgrey;" align="center">Despesas</h4>
                    </div>
                    
                  <?php

                      $mes=date('m');
                      $ano=date('Y');

                      $resultado_id=mysqli_query($link, "SELECT * FROM `sisoda_despesas` WHERE MONTH(`sisoda_despesas_data`) = '$mes' AND YEAR(`sisoda_despesas_data`) = '$ano'");

                      if ($resultado_id) {
                        
                        while($dados_login = mysqli_fetch_array($resultado_id, MYSQLI_ASSOC)){

                          $data=date_format(date_create($dados_login['sisoda_despesas_data']),'d/m/Y');

                          echo "

                            <div style='border-bottom: 1px solid lightgrey;' class='row'>
                              <h5 style='font-size: 25px;' align='center'>+ R$".$dados_login['sisoda_despesas_valor']."</h5>
                              <h5 align='center'>$data</h5>
                              <h5 align='center'>".$dados_login['sisoda_despesas_nome']."</h5>
                            </div>

                          ";

                        }

                      }

                    ?>

                  </div>
                </div>
                

                <div style="margin-top: -30px; display: none;" class="row" id="semanal">

                  <?php

                  setlocale(LC_TIME, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');
                  date_default_timezone_set('America/Sao_Paulo');

                  if (strftime('%a', strtotime('today'))=='dom') {
                    $domingo=strftime('%d de %B de %Y', strtotime('today'));
                    $domingo1=strftime('%Y-%m-%d', strtotime('today'));
                  }else{
                    $domingo = strftime('%d de %B de %Y', strtotime('Last Sunday'));
                    $domingo1 = strftime('%Y-%m-%d', strtotime('Last Sunday'));
                  }

                  if (strftime('%a', strtotime('today'))=='sab') {
                    $sabado=strftime('%d de %B de %Y', strtotime('today'));
                    $sabado1=strftime('%Y-%m-%d', strtotime('today'));
                  }else{
                    $sabado = strftime('%d de %B de %Y', strtotime('Next Saturday'));
                    $sabado1 = strftime('%Y-%m-%d', strtotime('Next Saturday'));
                  }

                    // CALCULAR PAGAMENTOS DE ALUNOS

                        $resultado_id = mysqli_query($link,"SELECT SUM(`sisoda_pagamentos_valor`) FROM `sisoda_pagamentos` WHERE sisoda_pagamentos_data  BETWEEN '$domingo1' AND '$sabado1'");
                        $row= mysqli_fetch_array($resultado_id);

                        $valor_total_pag_a=$row[0];


                    // CALCULAR PAGAMENTOS DE PROFESSORES

                        $resultado_id = mysqli_query($link,"SELECT SUM(`sisoda_pagamentos_prof_valor`) FROM `sisoda_pagamentos_prof` WHERE sisoda_pagamentos_prof_data BETWEEN '$domingo1' AND '$sabado1'");
                        $row= mysqli_fetch_array($resultado_id);

                        $valor_total_pag_p=$row[0];

                    // CALCULAR DESPESAS

                        $resultado_id = mysqli_query($link,"SELECT SUM(`sisoda_despesas_valor`) FROM `sisoda_despesas` WHERE sisoda_despesas_data BETWEEN '$domingo1' AND '$sabado1'");
                        $row= mysqli_fetch_array($resultado_id);

                        $valor_total_desp=$row[0];

                    // CALCULAR SALDO FINAL 

                        $saldo_final=($valor_total_pag_a-$valor_total_pag_p-$valor_total_desp).".00";

                    // IF

                        if ($saldo_final > 0) {
                          
                          echo "

                          <div style='width: 100%; height: 40px; background-color: green; margin-left: 0;' class='row'>
                            <h3 style='margin-top: 7px; color: white;' align='center'><strong>Total da Semana: R$$saldo_final</strong></h3>
                          </div>  

                          ";

                        }elseif ($saldo_final == 0) {
                          
                          echo "

                          <div style='width: 100%; height: 40px; background-color: grey; margin-left: 0;' class='row'>
                            <h3 style='margin-top: 7px; color: black;' align='center'><strong>Total da Semana: R$$saldo_final</strong></h3>
                          </div>

                          ";

                        }else{

                          echo "

                          <div style='width: 100%; height: 40px; background-color: red; margin-left: 0;' class='row'>
                            <h3 style='margin-top: 7px; color: black;' align='center'><strong>Total da Semana: R$$saldo_final</strong></h3>
                          </div>

                          ";

                        }

                    ?>

                  <h3 align="center"><?php 

                  echo "$domingo";
                  echo " / ";
                  echo "$sabado";
                  

                   ?></h3>
                  <div class="col-md-4" style="border-right: 1px solid grey;">
                    <div class="row">
                      <h4 style="padding-bottom: 15px; border-bottom: 1px solid lightgrey;" align="center">Pagamentos de Aluno</h4>
                    </div>
                    
                    <?php

                      $mes=date('m');
                      $ano=date('Y');

                      $resultado_id=mysqli_query($link, "SELECT * FROM `sisoda_pagamentos` WHERE `sisoda_pagamentos_data` BETWEEN '$domingo1' AND '$sabado1'");

                      if ($resultado_id) {
                        
                        while($dados_login = mysqli_fetch_array($resultado_id, MYSQLI_ASSOC)){

                          $resultado_id2=mysqli_query($link, "SELECT `sisOda_alunos_nome`,`sisOda_alunos_id` FROM `sisoda_alunos` WHERE `sisOda_alunos_id`='".$dados_login['sisoda_pagamentos_idAluno']."'");

                          while($dados_login2 = mysqli_fetch_array($resultado_id2, MYSQLI_ASSOC)){

                            $id_aluno=$dados_login2['sisOda_alunos_id'];
                            $nome_aluno=$dados_login2['sisOda_alunos_nome'];

                          }

                          $data=date_format(date_create($dados_login['sisoda_pagamentos_data']),'d/m/Y');

                          echo "

                            <div style='border-bottom: 1px solid lightgrey;' class='row'>
                              <h5 style='font-size: 25px;' align='center'>+ R$".$dados_login['sisoda_pagamentos_valor']."</h5>
                              <h5 align='center'>$data</h5>
                              <h5 align='center'><a style='color: black; text-decoration: underline;' href='#'>$nome_aluno ($id_aluno)</a></h5>
                            </div>

                          ";

                        }

                      }

                    ?>

                  </div>
                  <div class="col-md-4" style="border-right: 1px solid grey;">
                    <div class="row">
                      <h4 style="padding-bottom: 15px; border-bottom: 1px solid lightgrey;" align="center">Pagamentos de Professores</h4>
                    </div>
                    
                    <?php

                      $mes=date('m');
                      $ano=date('Y');

                      $resultado_id=mysqli_query($link, "SELECT * FROM `sisoda_pagamentos_prof` WHERE `sisoda_pagamentos_prof_data` BETWEEN '$domingo1' AND '$sabado1'");

                      if ($resultado_id) {
                        
                        while($dados_login = mysqli_fetch_array($resultado_id, MYSQLI_ASSOC)){

                          $resultado_id2=mysqli_query($link, "SELECT `sisoda_professores_nome`,`sisoda_professores_id` FROM `sisoda_professores` WHERE `sisoda_professores_id`='".$dados_login['sisoda_pagamentos_prof_idProfessor']."'");

                          while($dados_login2 = mysqli_fetch_array($resultado_id2, MYSQLI_ASSOC)){

                            $id_prof=$dados_login2['sisoda_professores_id'];
                            $nome_prof=$dados_login2['sisoda_professores_nome'];

                          }

                          $data=date_format(date_create($dados_login['sisoda_pagamentos_prof_data']),'d/m/Y');

                          echo "

                            <div style='border-bottom: 1px solid lightgrey;' class='row'>
                              <h5 style='font-size: 25px;' align='center'>- R$".$dados_login['sisoda_pagamentos_prof_valor']."</h5>
                              <h5 align='center'>$data</h5>
                              <h5 align='center'><a style='color: black; text-decoration: underline;' href='#'>$nome_prof ($id_prof)</a></h5>
                            </div>

                          ";

                        }

                      }

                    ?>

                  </div>
                  <div class="col-md-4">
                    <div class="row">
                      <h4 style="padding-bottom: 15px; border-bottom: 1px solid lightgrey;" align="center">Despesas</h4>
                    </div>
                    
                                        <?php

                      $mes=date('m');
                      $ano=date('Y');

                      $resultado_id=mysqli_query($link, "SELECT * FROM `sisoda_despesas` WHERE sisoda_despesas_data BETWEEN '$domingo1' AND '$sabado1'");

                      if ($resultado_id) {
                        
                        while($dados_login = mysqli_fetch_array($resultado_id, MYSQLI_ASSOC)){

                          $data=date_format(date_create($dados_login['sisoda_despesas_data']),'d/m/Y');

                          echo "

                            <div style='border-bottom: 1px solid lightgrey;' class='row'>
                              <h5 style='font-size: 25px;' align='center'>- R$".$dados_login['sisoda_despesas_valor']."</h5>
                              <h5 align='center'>$data</h5>
                              <h5 align='center'>".$dados_login['sisoda_despesas_nome']."</h5>
                            </div>

                          ";

                        }

                      }

                    ?>

                  </div>
                </div>


                <div style="margin-top: -30px; display: none;" class="row" id="diario">

                  <?php

                    $hoje=date('Y-m-d');
                  
                    // CALCULAR PAGAMENTOS DE ALUNOS

                        $resultado_id = mysqli_query($link,"SELECT SUM(`sisoda_pagamentos_valor`) FROM `sisoda_pagamentos` WHERE sisoda_pagamentos_data='$hoje'");
                        $row= mysqli_fetch_array($resultado_id);

                        $valor_total_pag_a=$row[0];


                    // CALCULAR PAGAMENTOS DE PROFESSORES

                        $resultado_id = mysqli_query($link,"SELECT SUM(`sisoda_pagamentos_prof_valor`) FROM `sisoda_pagamentos_prof` WHERE sisoda_pagamentos_prof_data='$hoje'");
                        $row= mysqli_fetch_array($resultado_id);

                        $valor_total_pag_p=$row[0];

                    // CALCULAR DESPESAS

                        $resultado_id = mysqli_query($link,"SELECT SUM(`sisoda_despesas_valor`) FROM `sisoda_despesas` WHERE sisoda_despesas_data='$hoje'");
                        $row= mysqli_fetch_array($resultado_id);

                        $valor_total_desp=$row[0];

                    // CALCULAR SALDO FINAL 

                        $saldo_final=($valor_total_pag_a-$valor_total_pag_p-$valor_total_desp).".00";

                    // IF

                        if ($saldo_final > 0) {
                          
                          echo "

                          <div style='width: 100%; height: 40px; background-color: green; margin-left: 0;' class='row'>
                            <h3 style='margin-top: 7px; color: white;' align='center'><strong>Total do Dia: R$$saldo_final</strong></h3>
                          </div>  

                          ";

                        }elseif ($saldo_final == 0) {
                          
                          echo "

                          <div style='width: 100%; height: 40px; background-color: grey; margin-left: 0;' class='row'>
                            <h3 style='margin-top: 7px; color: black;' align='center'><strong>Total do Dia: R$$saldo_final</strong></h3>
                          </div>

                          ";

                        }else{

                          echo "

                          <div style='width: 100%; height: 40px; background-color: red; margin-left: 0;' class='row'>
                            <h3 style='margin-top: 7px; color: black;' align='center'><strong>Total do Dia: R$$saldo_final</strong></h3>
                          </div>

                          ";

                        }

                    ?>

                  <h3 align="center"><?php 

                  setlocale(LC_TIME, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');
                  date_default_timezone_set('America/Sao_Paulo');

                  echo strftime('%d de %B de %Y', strtotime('today'));                  

                   ?></h3>
                  <div class="col-md-4" style="border-right: 1px solid grey;">
                    <div class="row">
                      <h4 style="padding-bottom: 15px; border-bottom: 1px solid lightgrey;" align="center">Pagamentos de Aluno</h4>
                    </div>
                    
                    <?php

                      $resultado_id=mysqli_query($link, "SELECT * FROM `sisoda_pagamentos` WHERE `sisoda_pagamentos_data`='$hoje'");

                      if ($resultado_id) {
                        
                        while($dados_login = mysqli_fetch_array($resultado_id, MYSQLI_ASSOC)){

                          $resultado_id2=mysqli_query($link, "SELECT `sisOda_alunos_nome`,`sisOda_alunos_id` FROM `sisoda_alunos` WHERE `sisOda_alunos_id`='".$dados_login['sisoda_pagamentos_idAluno']."'");

                          while($dados_login2 = mysqli_fetch_array($resultado_id2, MYSQLI_ASSOC)){

                            $id_aluno=$dados_login2['sisOda_alunos_id'];
                            $nome_aluno=$dados_login2['sisOda_alunos_nome'];

                          }

                          $data=date_format(date_create($dados_login['sisoda_pagamentos_data']),'d/m/Y');

                          echo "

                            <div style='border-bottom: 1px solid lightgrey;' class='row'>
                              <h5 style='font-size: 25px;' align='center'>+ R$".$dados_login['sisoda_pagamentos_valor']."</h5>
                              <h5 align='center'>$data</h5>
                              <h5 align='center'><a style='color: black; text-decoration: underline;' href='#'>$nome_aluno ($id_aluno)</a></h5>
                            </div>

                          ";

                        }

                      }

                    ?>

                  </div>
                  <div class="col-md-4" style="border-right: 1px solid grey;">
                    <div class="row">
                      <h4 style="padding-bottom: 15px; border-bottom: 1px solid lightgrey;" align="center">Pagamentos de Professores</h4>
                    </div>
                    
                    <?php

                      $mes=date('m');
                      $ano=date('Y');

                      $resultado_id=mysqli_query($link, "SELECT * FROM `sisoda_pagamentos_prof` WHERE `sisoda_pagamentos_prof_data`='$hoje'");

                      if ($resultado_id) {
                        
                        while($dados_login = mysqli_fetch_array($resultado_id, MYSQLI_ASSOC)){

                          $resultado_id2=mysqli_query($link, "SELECT `sisoda_professores_nome`,`sisoda_professores_id` FROM `sisoda_professores` WHERE `sisoda_professores_id`='".$dados_login['sisoda_pagamentos_prof_idProfessor']."'");

                          while($dados_login2 = mysqli_fetch_array($resultado_id2, MYSQLI_ASSOC)){

                            $id_prof=$dados_login2['sisoda_professores_id'];
                            $nome_prof=$dados_login2['sisoda_professores_nome'];

                          }

                          $data=date_format(date_create($dados_login['sisoda_pagamentos_prof_data']),'d/m/Y');

                          echo "

                            <div style='border-bottom: 1px solid lightgrey;' class='row'>
                              <h5 style='font-size: 25px;' align='center'>- R$".$dados_login['sisoda_pagamentos_prof_valor']."</h5>
                              <h5 align='center'>$data</h5>
                              <h5 align='center'><a style='color: black; text-decoration: underline;' href='#'>$nome_prof ($id_prof)</a></h5>
                            </div>

                          ";

                        }

                      }

                    ?>

                  </div>
                  <div class="col-md-4">
                    <div class="row">
                      <h4 style="padding-bottom: 15px; border-bottom: 1px solid lightgrey;" align="center">Despesas</h4>
                    </div>
                    
                                        <?php

                      $mes=date('m');
                      $ano=date('Y');

                      $resultado_id=mysqli_query($link, "SELECT * FROM `sisoda_despesas` WHERE `sisoda_despesas_data`='$hoje'");

                      if ($resultado_id) {
                        
                        while($dados_login = mysqli_fetch_array($resultado_id, MYSQLI_ASSOC)){

                          $data=date_format(date_create($dados_login['sisoda_despesas_data']),'d/m/Y');

                          echo "

                            <div style='border-bottom: 1px solid lightgrey;' class='row'>
                              <h5 style='font-size: 25px;' align='center'>- R$".$dados_login['sisoda_despesas_valor']."</h5>
                              <h5 align='center'>$data</h5>
                              <h5 align='center'>".$dados_login['sisoda_despesas_nome']."</h5>
                            </div>

                          ";

                        }

                      }

                    ?>

                  </div>
                </div>

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