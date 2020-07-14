<?php

	require_once('../db.class.php');

	$objDb = new db();
    $link = $objDb->conecta_mysql();

	// CHECAR O DIA DE HOJE

	$mes=date('m');

	$dia=date('d-m-Y');

	if ($dia>=5) {
		
		// PROFESSOR

		$resultado_id=mysqli_query($link,"SELECT * FROM `sisoda_professores` WHERE `sisoda_professores_mensal` IS NOT NULL AND `sisoda_professores_mensal`!='0.00'");

		if ($resultado_id) {
			
			while($dados_login = mysqli_fetch_array($resultado_id, MYSQLI_ASSOC)){

				// ADICIONAR NA TABELA DE MENSALIDADES

				$hoje=date('Y-m-d');

				$resultado_id2=mysqli_query($link,"INSERT INTO `sisoda_mensalidade_prof`(`sisoda_mensalidade_prof_idProf`, `sisoda_mensalidade_prof_data`, `sisoda_mensalidade_prof_valor`, `sisoda_mensalidade_prof_pago`) VALUES ('".$dados_login['sisoda_professores_id']."','$hoje','".$dados_login['sisoda_professores_mensal']."','0')");

				if ($resultado_id2) {
					
					$mens_id = $link->insert_id;;

				}

				// CHECAR SE PODE SER PAGA

				$id_prof=$dados_login['sisoda_professores_id'];
				$valor_prof=$dados_login['sisoda_professores_mensal'];
				$saldo_prof=$dados_login['sisoda_professores_saldo'];

				if ($saldo_prof < 0) {
		            $saldo_prof_inv=abs($saldo_prof);
		        }
		        else{
		            $saldo_prof_inv= -$saldo_prof;
		        }

		        echo "Saldo: $saldo_prof_inv<br>";
		        echo "Valor: $valor_prof<br>";

		        if ($saldo_prof_inv >= $valor_prof) {

		            $sql3="UPDATE `sisoda_mensalidade_prof` SET `sisoda_mensalidade_prof_pago`='1' WHERE `sisoda_mensalidade_prof_id`='$mens_id'";

		            echo "$sql3";

		            $resultado_id3 = mysqli_query($link, $sql3);

		            if($resultado_id3){

		                echo "<h4 align='center'>Mensalidade Alterada</h4>";

		            }
		        }

				// ATUALIZAR SALDO DE TODOS OS PROFESSORES

		        // VALORES DOS PAGAMENTOS

		        $resultado_id4 = mysqli_query($link,"SELECT SUM(`sisoda_pagamentos_prof_valor`) FROM `sisoda_pagamentos_prof` WHERE `sisoda_pagamentos_prof_idProfessor`='$id_prof'");
		        $row4= mysqli_fetch_array($resultado_id4);

		        $valor_total_pag_prof=$row4[0];

		        // VALORES DAS AULAS

		        $resultado_id5 = mysqli_query($link,"SELECT SUM(`sisoda_aulas_valorProfessor`) FROM `sisoda_aulas` WHERE `sisoda_aulas_idProfessor`='$id_prof'");
		        $row5= mysqli_fetch_array($resultado_id5);

		        $valor_total_aulas_prof=$row5[0];

		        // VALORES DAS MENSALIDADES

		        $resultado_id6 = mysqli_query($link,"SELECT SUM(`sisoda_mensalidade_prof_valor`) FROM `sisoda_mensalidade_prof` WHERE `sisoda_mensalidade_prof_idProf`='$id_prof'");
		        $row6= mysqli_fetch_array($resultado_id6);

		        $valor_total_mens_prof=$row6[0];

		        // CALCULAR SALDO FINAL PROFESSOR

		        $saldo_final_prof=$valor_total_aulas_prof+$valor_total_mens_prof-$valor_total_pag_prof;

		        echo "Saldo Final: $saldo_final_prof";

		        // ATUALIZAR SALDO NA TABELA

		        $resultado_id7=mysqli_query($link,"UPDATE `sisoda_professores` SET `sisoda_professores_saldo`='$saldo_final_prof' WHERE `sisoda_professores_id`='".$dados_login['sisoda_professores_id']."'");
		        
			}

		}

		


		// ALUNO

		$resultado_id8=mysqli_query($link, "SELECT * FROM `sisoda_alunos` WHERE `sisoda_alunos_mensal`!='0.00' AND `sisoda_alunos_mensal` IS NOT NULL");

		if ($resultado_id8) {

			while($dados_login8 = mysqli_fetch_array($resultado_id8, MYSQLI_ASSOC)){

				// ADICIONAR NA TABELA DE MENSALIDADE

				$hoje=date('Y-m-d');

				$resultado_id9=mysqli_query($link,"INSERT INTO `sisoda_mensalidade`(`sisoda_mensalidade_idAluno`, `sisoda_mensalidade_data`, `sisoda_mensalidade_valor`, `sisoda_mensalidade_paga`) VALUES ('".$dados_login8['sisOda_alunos_id']."','$hoje','".$dados_login8['sisoda_alunos_mensal']."','0')");

				if ($resultado_id9) {
					
					$mens_id = $link->insert_id;;

				}

				// CHECAR SE PODE SER PAGA

				$id_aluno=$dados_login8['sisOda_alunos_id'];
				$valor_aluno=$dados_login8['sisoda_alunos_mensal'];
				$saldo_aluno=$dados_login8['sisOda_alunos_saldo'];

		        if ($saldo_aluno >= $valor_aluno) {

		        	echo "DAORA";

		            $sql10="UPDATE `sisoda_mensalidade` SET `sisoda_mensalidade_paga`='1' WHERE `sisoda_mensalidade_id`='$mens_id'";

		            echo "$sql10";

		            $resultado_id10 = mysqli_query($link, $sql10);

		            if($resultado_id10){

		                echo "<h4 align='center'>Mensalidade Alterada</h4>";

		            }
		        }

		            // ATUALIZAR SALDO DE TODOS OS ALUNOS

		            // VALORES DOS PAGAMENTOS

		            $resultado_id11 = mysqli_query($link,"SELECT SUM(`sisoda_pagamentos_valor`) FROM `sisoda_pagamentos` WHERE `sisoda_pagamentos_idAluno`='$id_aluno'");
			        $row11= mysqli_fetch_array($resultado_id11);

			        $valor_total_pag_aluno=$row11[0];

		            // VALORES DAS PENDÊNCIAS

		            $resultado_id12 = mysqli_query($link,"SELECT SUM(`sisoda_pendencias_valor`) FROM `sisoda_pendencias` WHERE `sisoda_pendencias_idAluno`='$id_aluno'");
			        $row12= mysqli_fetch_array($resultado_id12);

			        $valor_total_pend_aluno=$row12[0];

		            // VALORES DAS MENSALIDADES

			        $resultado_id13 = mysqli_query($link,"SELECT SUM(`sisoda_mensalidade_valor`) FROM `sisoda_mensalidade` WHERE `sisoda_mensalidade_idAluno`='$id_aluno'");
			        $row13= mysqli_fetch_array($resultado_id13);

			        $valor_total_mens_aluno=$row13[0];

		            // VALORES DAS AULAS

		            $resultado_id14 = mysqli_query($link,"SELECT SUM(`sisoda_aulas_tipoDePlano`) FROM `sisoda_aulas` WHERE `sisoda_aulas_idAluno`='$id_aluno'");
			        $row14= mysqli_fetch_array($resultado_id14);

			        $valor_total_aulas_aluno=$row14[0];

		            // CALCULAR O SALDO FINAL

			        $saldo_final_aluno=$valor_total_pag_aluno-$valor_total_aulas_aluno-$valor_total_mens_aluno-$valor_total_pend_aluno;

			        echo "$saldo_final_aluno";

		            // ATUALIZAR SALDO NA TABELA

			        $resultado_id15=mysqli_query($link,"UPDATE `sisoda_alunos` SET `sisOda_alunos_saldo`='$saldo_final_aluno' WHERE `sisOda_alunos_id`='".$dados_login8['sisOda_alunos_id']."'");

			        if ($resultado_id15) {
			        	
			        	echo "Saldo Atualizado";

			        }

		        }

			}
			
			$resultado=mysqli_query($link, "UPDATE `sisoda_mes` SET `sisoda_mes_pago` = '1' WHERE MONTH(`sisoda_mes_data`)='$mes'");

			
			if($resultado){
			    
		 echo "<script>alert('As mensalidades do mês $mes foram atualizadas nos alunos e professores. Você será redirecionado.'); window.history.back();</script>";
			    
			}

		}

		




?>
