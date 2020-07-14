<?php

	require_once('../db.class.php');

	$objDb = new db();
    $link = $objDb->conecta_mysql();

?>

<!DOCTYPE html>
<html>
<head>
	<title>Extrato feito dia <?php setlocale(LC_TIME, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');
                  date_default_timezone_set('America/Sao_Paulo'); echo strftime('%d de %B de %Y', strtotime('today')); ?> - Oficina do Aluno</title>
    <meta charset="utf-8">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/bootstrap-theme.css" rel="stylesheet">

    <style type="text/css">
    	*{
    		margin: 5px 5px 5px 5px;
    	}
    </style>

</head>
<body>

	<div class="text-center" id="btn_grupo">
		<button id="btn" onclick="showM()" style="font-size: 20px; margin-bottom: 15px; padding: 10px 20px 10px 20px;">Mensal</button>
		<button id="btn" onclick="showS()" style="font-size: 20px; margin-bottom: 15px; padding: 10px 20px 10px 20px;">Semanal</button>
		<button id="btn" onclick="showD()" style="font-size: 20px; margin-bottom: 15px; padding: 10px 20px 10px 20px;">Diário</button>
		<button id="btn" onclick="printa()" style="font-size: 20px; margin-bottom: 15px; padding: 10px 20px 10px 20px;">Imprimir</button>
	</div>

	<div id="mensal">
		<table border="1" width="100%">
			
			<tr>
				
				<th width="33%" style="text-align: center;">Pagamentos de Alunos</th>
				<th width="33%" style="text-align: center;">Pagamentos de Professores</th>
				<th width="33%" style="text-align: center;">Despesas</th>

			</tr>
			<tr>
				
				<td>
					
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

                          echo "

                            <div style='border-bottom: 1px solid black; margin-right: -1px; margin-left: -1px; text-align: center;'>
								<p style='font-size: 17px; margin-top: 0px; margin-bottom: 0px;'>+ R$".$dados_login['sisoda_pagamentos_valor']."</p>
								<p style='margin-top: 0px; margin-bottom: 0px;'>$data</p>
								<p style='margin-top: 0px; margin-bottom: 10px;'>$nome_aluno ($id_aluno)</p>
							</div>

                          ";

                        }

                      }

                    ?>

					

				</td>

				<td>
					
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

                          echo "

                            <div style='border-bottom: 1px solid black; margin-right: -1px; margin-left: -1px; text-align: center;'>
								<p style='font-size: 17px; margin-top: 0px; margin-bottom: 0px;'>- R$".$dados_login['sisoda_pagamentos_prof_valor']."</p>
								<p style='margin-top: 0px; margin-bottom: 0px;'>$data</p>
								<p style='margin-top: 0px; margin-bottom: 10px;'>$nome_prof ($id_prof)</p>
							</div>

                          ";

                        }

                      }

                    ?>

				</td>

				<td>
					
					<?php

                      $mes=date('m');
                      $ano=date('Y');

                      $resultado_id=mysqli_query($link, "SELECT * FROM `sisoda_despesas` WHERE MONTH(`sisoda_despesas_data`) = '$mes' AND YEAR(`sisoda_despesas_data`) = '$ano'");

                      if ($resultado_id) {
                        
                        while($dados_login = mysqli_fetch_array($resultado_id, MYSQLI_ASSOC)){

                          $data=date_format(date_create($dados_login['sisoda_despesas_data']),'d/m/Y');

                          echo "

                            <div style='border-bottom: 1px solid black; margin-right: -1px; margin-left: -1px; text-align: center;'>
								<p style='font-size: 17px; margin-top: 0px; margin-bottom: 0px;'>- R$".$dados_login['sisoda_despesas_valor']."</p>
								<p style='margin-top: 0px; margin-bottom: 0px;'>$data</p>
								<p style='margin-top: 0px; margin-bottom: 10px;'>".$dados_login['sisoda_despesas_nome']."</p>
							</div>

                          ";

                        }

                      }

                    ?>

				</td>

			</tr>

		</table>
	</div>
	<div id="diario">
		
	</div>
	<div id="semanal">
		
	</div>

</body>
</html>