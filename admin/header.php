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
          <?php

            require_once('../db.class.php');

            $objDb = new db();
            $link = $objDb->conecta_mysql();

            date_default_timezone_set('America/Sao_Paulo');

            $date = date('m/d/Y', time());

            $sql="SELECT * FROM `sisoda_aulas` WHERE `sisoda_aulas_data`='$date'";

            $resultado_id = mysqli_query($link, $sql);

            if ($resultado_id) {
              
              $cont=mysqli_num_rows($resultado_id);

              echo "<li id='alert_notificatoin_bar' class='dropdown'>
                      <a data-toggle='dropdown' class='dropdown-toggle' href='#'>
                        <i class='icon-bell-l'></i>
                        <span class='badge bg-important'>$cont</span> 
                      </a>
                      <ul class='dropdown-menu extended notification'>
                        <div class='notify-arrow notify-arrow-blue'></div>
                        <li>
                          <p class='blue'>Existem $cont aulas hoje</p>
                        </li>";

              while($dados_login = mysqli_fetch_array($resultado_id, MYSQLI_ASSOC)){
                
                $data=date_create($dados_login['sisoda_aulas_data']);

                $data2=date_format($data,'H:i');

                $sql2="SELECT * FROM `sisoda_alunos` WHERE `sisOda_alunos_id`='".$dados_login['sisoda_aulas_idAluno']."'";

                $resultado_id2 = mysqli_query($link, $sql2);

                if ($resultado_id2) {

                  while($dados_login2 = mysqli_fetch_array($resultado_id2, MYSQLI_ASSOC)){

                    $nome_aluno=$dados_login2['sisOda_alunos_nome'];

                  }

                }

                echo "<li>
                        <a href='aula_ind.php?id=".$dados_login['sisoda_aulas_id']."'>
                          Aluno: ".$nome_aluno."<br>
                          Professor: ".$nome_aluno."<br>
                          Horário: ".$data2."
                          <span class='small italic pull-right'></span>
                        </a>
                      </li>
        ";

              }

            }

            $month = date('m');

            echo "$month";

            $sql3="SELECT * FROM `sisoda_alunos` WHERE MONTH(`sisOda_alunos_dataNascimento`) = '$month'";

            $resultado_id3 = mysqli_query($link, $sql3);

            if ($resultado_id3) {
              
              $cont2=mysqli_num_rows($resultado_id3);

              echo "    <li>
                          <p class='blue'>Existem $cont2 aniversários esse mês</p>
                        </li>";

              while($dados_login3 = mysqli_fetch_array($resultado_id3, MYSQLI_ASSOC)){

                $data=date_create($dados_login3['sisOda_alunos_dataNascimento']);
                $data2=date_format($data,'d/m/Y');

                echo "<li>
                        <a href='aula_ind.php?id=".$dados_login3['sisOda_alunos_id']."'>
                          Aluno: ".$dados_login3['sisOda_alunos_nome']."<br>
                          Data: ".$data2."
                          <span class='small italic pull-right'></span>
                        </a>
                      </li>";
              }
              echo "<br>";
            }

          ?>
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
                <a href="logout.php"><i class="icon_key_alt"></i> Sair</a>
              </li>
            </ul>
          </li>
          <!-- user login dropdown end -->
        </ul>
        <!-- notificatoin dropdown end-->
      </div>
    </header>