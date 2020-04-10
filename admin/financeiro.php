<div class="row">
          <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
            <div class="info-box blue-bg">
              <i class="fa fa-user"></i>
              <div class="count">
                
                <?php

                  require_once('../db.class.php');

                  $sql = "SELECT `sisOda_alunos_id` FROM sisoda_alunos";
                  $objDb = new db();
                  $link = $objDb->conecta_mysql();

                  $resultado_id = mysqli_query($link, $sql);
                  $cont=mysqli_num_rows($resultado_id);

                  echo "$cont";

                ?>

              </div>
              <div class="title">Alunos Ativos</div>
            </div>
            <!--/.info-box-->
          </div>
          <!--/.col-->
          <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
            <div class="info-box dark-bg">
              <i class="fa fa-thumbs-down"></i>
              <div class="count">

                <?php

                  require_once('../db.class.php');

                  $sql = "SELECT `sisOda_alunos_id` FROM sisoda_alunos WHERE `sisOda_alunos_saldo` < 0";
                  $objDb = new db();
                  $link = $objDb->conecta_mysql();

                  $resultado_id = mysqli_query($link, $sql);
                  $cont=mysqli_num_rows($resultado_id);

                  echo "$cont";

                ?>

              </div>
              <div class="title">Alunos com Pendências</div>
            </div>
            <!--/.info-box-->
          </div>
          <!--/.col-->
          <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
            <div class="info-box green-bg">
              <i class="fa fa-clipboard-list"></i>
              <div class="count">

                <?php

                  require_once('../db.class.php');

                  date_default_timezone_set('America/Sao_Paulo');

                  $date = date('Y/m/d', time());

                  $sql = "SELECT `sisOda_aulas_id` FROM sisoda_aulas WHERE WEEK(`sisOda_aulas_data`,0) = WEEK('$date',0)";

                  $objDb = new db();
                  $link = $objDb->conecta_mysql();

                  $resultado_id = mysqli_query($link, $sql);
                  $cont=mysqli_num_rows($resultado_id);

                  echo "$cont";

                ?>

              </div>
              <div class="title">Aulas essa Semana</div>
            </div>
            <!--/.info-box-->
          </div>
          <!--/.col-->
          <!--/.col-->
          <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
            <div class="info-box brown-bg">
              <i class="fa fa-chalkboard-teacher"></i>
              <div class="count">

                <?php

                  require_once('../db.class.php');

                  $sql = "SELECT `sisoda_professores_id` FROM sisoda_professores";
                  $objDb = new db();
                  $link = $objDb->conecta_mysql();

                  $resultado_id = mysqli_query($link, $sql);
                  $cont=mysqli_num_rows($resultado_id);

                  echo "$cont";

                ?>

              </div>
              <div class="title">Professores</div>
            </div>
            <!--/.info-box-->
          </div>
        </div>