<?php

	// REQUIRED

	require_once('../db.class.php');
	$objDb = new db();
  	$link = $objDb->conecta_mysql();

	// SALDOS

  		// ALUNO

  		echo "<table border='1'>";
  		echo "<tr>

  		<th>Nome do Aluno</th>
  		<th>Aulas Pagas</th>
  		<th>Mensalidades Pagas</th>
  		<th>Pendencias Pagas</th>
  		<th>Saldo</th>

  		</tr>";

  		$query_aluno=mysqli_query($link, "SELECT * FROM `sisoda_alunos`");

  		while($aluno = mysqli_fetch_array($query_aluno, MYSQLI_ASSOC)){

  			$id_aluno=$aluno['sisOda_alunos_id'];
  			$saldo_aluno=$aluno['sisOda_alunos_saldo'];

  			// ATUALIZAÇÃO DOS RECEBIMENTOS DOS ALUNOS

  				// MENSALIDADES

  				$mens_aluno_pagas=0;

  				$query_mens_aluno=mysqli_query($link,"SELECT * FROM `sisoda_mensalidade` WHERE `sisoda_mensalidade_idAluno`='".$aluno['sisOda_alunos_id']."' AND `sisoda_mensalidade_paga`='0'");

  				while($mens_aluno = mysqli_fetch_array($query_mens_aluno, MYSQLI_ASSOC)){

  					if ($saldo_aluno > $mens_aluno['sisoda_mensalidade_valor']) {
  						
  						$query_mens_aluno_pag=mysqli_query($link, "UPDATE `sisoda_mensalidade` SET `sisoda_mensalidade_paga`='1' WHERE `sisoda_mensalidade_id`='".$mens_aluno['sisoda_mensalidade_id']."'");

  						if ($query_mens_aluno_pag) {
  							
  							$mens_aluno_pagas=$mens_aluno_pagas+1;

  							$saldo_aluno=$saldo_aluno-$mens_aluno['sisoda_mensalidade_valor'];

  						}

  					}

  				}

  				// AULAS

  				$aulas_aluno_pagas=0;

  				$query_aula_aluno=mysqli_query($link,"SELECT * FROM `sisoda_aulas` WHERE `sisoda_aulas_idAluno`='".$aluno['sisOda_alunos_id']."' AND `sisoda_aulas_recebida`='0'");

  				while($aula_aluno = mysqli_fetch_array($query_aula_aluno, MYSQLI_ASSOC)){

  					if ($saldo_aluno > $aula_aluno['sisoda_aulas_valorAluno']) {
  						
  						$query_aula_aluno_pag=mysqli_query($link, "UPDATE `sisoda_aulas` SET `sisoda_aulas_recebida`='1' WHERE `sisoda_aulas_idAluno`='".$aula_aluno['sisoda_aulas_idAluno']."'");

  						if ($query_aula_aluno_pag) {
  							
  							$aulas_aluno_pagas=$aulas_aluno_pagas+1;

  							$saldo_aluno=$saldo_aluno-$aula_aluno['sisoda_aulas_valorAluno'];

  						}

  					}

  				}

  				// PENDENCIAS

  				$pend_aluno_pagas=0;

  				$query_pend_aluno=mysqli_query($link,"SELECT * FROM `sisoda_pendencias` WHERE `sisoda_pendencias_idAluno`='".$aluno['sisOda_alunos_id']."' AND `sisoda_pendencias_paga`='0'");

  				while($pend_aluno = mysqli_fetch_array($query_pend_aluno, MYSQLI_ASSOC)){

  					if ($saldo_aluno > $pend_aluno['sisoda_pendencias_valor']) {
  						
  						$query_pend_aluno_pag=mysqli_query($link, "UPDATE `sisoda_pendencias` SET `sisoda_pendencias_paga`='1' WHERE `sisoda_pendencias_idAluno`='".$pend_aluno['sisoda_pendencias_idAluno']."'");

  						if ($query_pend_aluno_pag) {
  							
  							$pend_aluno_pagas=$pend_aluno_pagas+1;

  							$saldo_aluno=$saldo_aluno-$pend_aluno['sisoda_pendencias_valor'];

  						}

  					}

  				}

  			// ATUALIZAÇÃO DOS SALDOS DOS ALUNOS

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

                    $resultado_id15=mysqli_query($link,"UPDATE `sisoda_alunos` SET `sisOda_alunos_saldo`='$saldo_final_aluno' WHERE `sisOda_alunos_id`='$id_aluno'");

                    if ($resultado_id15) {
                        
                        echo "<tr>

				  			<td>".$aluno['sisOda_alunos_nome']."</td>
				  			<td>$aulas_aluno_pagas</td>
				  			<td>$mens_aluno_pagas</td>
				  			<td>$pend_aluno_pagas</td>
				  			<td>$saldo_final_aluno</td>

				  			</tr>";

                    }

  		}

  		echo "</table>";


  		// PROFESSOR

  		echo "<table border='1'>";
  		echo "<tr>

  		<th>Nome do Prof</th>
  		<th>Aulas Pagas</th>
  		<th>Mensalidades Pagas</th>
  		<th>Saldo</th>

  		</tr>";

  		$query_prof=mysqli_query($link, "SELECT * FROM `sisoda_professores`");

  		if ($query_prof) {
  			
  			while($prof = mysqli_fetch_array($query_prof, MYSQLI_ASSOC)){

  				$id_prof=$prof['sisoda_professores_id'];
  				$saldo_prof=$prof['sisoda_professores_saldo'];

  				// ATUALIZAÇÃO DOS PAGAMENTOS DOS PROFESSORES

  					// MENSALIDADES

  						$mens_prof_pagas=0;

		  				$query_mens_prof=mysqli_query($link,"SELECT * FROM `sisoda_mensalidade_prof` WHERE `sisoda_mensalidade_prof_idProf`='".$prof['sisoda_professores_id']."' AND `sisoda_mensalidade_prof_pago`='0'");

		  				while($mens_prof = mysqli_fetch_array($query_mens_prof, MYSQLI_ASSOC)){

		  					if ($saldo_prof > $mens_prof['sisoda_mensalidade_prof_valor']) {
		  						
		  						$query_mens_prof_pag=mysqli_query($link, "UPDATE `sisoda_mensalidade_prof` SET `sisoda_mensalidade_prof_pago`='1' WHERE `sisoda_mensalidade_prof_id`='".$mens_prof['sisoda_mensalidade_prof_id']."'");

		  						if ($query_mens_prof_pag) {
		  							
		  							$mens_prof_pagas=$mens_prof_pagas+1;

		  							$saldo_prof=$saldo_prof-$mens_prof['sisoda_mensalidade_prof_valor'];

		  						}

		  					}

		  				}

  					// AULAS

		  				$aulas_prof_pagas=0;

		  				$query_aulas_prof=mysqli_query($link,"SELECT * FROM `sisoda_aulas` WHERE `sisoda_aulas_idProfessor`='".$prof['sisoda_professores_id']."' AND `sisoda_aulas_paga`='0'");

		  				while($aulas_prof = mysqli_fetch_array($query_aulas_prof, MYSQLI_ASSOC)){

		  					if ($saldo_prof > $aulas_prof['sisoda_aulas_valorProfessor']) {
		  						
		  						$query_aulas_prof_pag=mysqli_query($link, "UPDATE `sisoda_aulas` SET `sisoda_aulas_paga`='1' WHERE `sisoda_aulas_idProfessor`='".$aulas_prof['sisoda_aulas_idProfessor']."'");

		  						if ($query_aulas_prof_pag) {
		  							
		  							$aulas_prof_pagas=$aulas_prof_pagas+1;

		  							$saldo_prof=$saldo_prof-$aulas_prof['sisoda_aulas_valorProfessor'];

		  						}

		  					}

		  				}

		  		// ATUALIZAÇÃO DOS SALDOS DOS PROFESSORES

		  		$resultado_id5 = mysqli_query($link,"SELECT SUM(`sisoda_pagamentos_prof_valor`) FROM `sisoda_pagamentos_prof` WHERE `sisoda_pagamentos_prof_idProfessor`='$id_aluno'");
                $row5= mysqli_fetch_array($resultado_id5);

                $valor_total_pag_prof=$row5[0];

                // VALORES DAS AULAS

                $resultado_id6 = mysqli_query($link,"SELECT SUM(`sisoda_aulas_valorProfessor`) FROM `sisoda_aulas` WHERE `sisoda_aulas_idProfessor`='$id_aluno'");
                $row6= mysqli_fetch_array($resultado_id6);

                $valor_total_aulas_prof=$row6[0];

                // VALORES DAS MENSALIDADES

                $resultado_id7 = mysqli_query($link,"SELECT SUM(`sisoda_mensalidade_prof_valor`) FROM `sisoda_mensalidade_prof` WHERE `sisoda_mensalidade_prof_idProf`='$id_aluno'");
                $row7= mysqli_fetch_array($resultado_id7);

                $valor_total_mens_prof=$row7[0];

                // CALCULAR SALDO FINAL PROFESSOR

                $saldo_final_prof=$valor_total_aulas_prof+$valor_total_mens_prof-$valor_total_pag_prof;

                // ATUALIZAR SALDO NA TABELA

                $resultado_id8=mysqli_query($link,"UPDATE `sisoda_professores` SET `sisoda_professores_saldo`='$saldo_final_prof' WHERE `sisoda_professores_id`='$id_aluno'");

                if ($resultado_id8) {
                    
                	echo "<tr>

				  			<td>".$prof['sisoda_professores_nome']."</td>
				  			<td>$aulas_prof_pagas</td>
				  			<td>$mens_prof_pagas</td>
				  			<td>$saldo_final_aluno</td>

				  			</tr>";

                }

  			}

  		}

  		echo "</table>";

	// NÃO LISTAR

  		// ALUNOS

  		echo "<table border='1'>";
  		echo "<tr>

  		<th>Nome do Aluno</th>
  		<th>Pagamentos Rest.</th>
  		<th>Mensalidades Rest.</th>
  		<th>Pendencias Rest.</th>

  		</tr>";

  		$query_aluno=mysqli_query($link, "SELECT * FROM `sisoda_alunos_off`");

  		if ($query_aluno) {
  			
  			while($aluno = mysqli_fetch_array($query_aluno, MYSQLI_ASSOC)){

  				$id_aluno=$aluno['sisOda_alunos_id'];

  				// NÃO LISTAR OS PAGAMENTOS ALUNOS

  				$pag_nl=0;

  				$query_pag=mysqli_query($link, "SELECT * FROM `sisoda_pagamentos` WHERE `sisoda_pagamentos_idAluno`='$id_aluno'");

  				if ($query_pag) {
  					
  					while($pag = mysqli_fetch_array($query_pag, MYSQLI_ASSOC)){

  						$query_pag_2=mysqli_query($link, "INSERT INTO `sisoda_pagamentos_off` SELECT * FROM `sisoda_pagamentos` WHERE `sisoda_pagamentos_id`='".$pag['sisoda_pagamentos_id']."'");

  						if ($query_pag_2) {
  							
  							$query_pag_3=mysqli_query($link, "DELETE FROM `sisoda_pagamentos` WHERE sisoda_pagamentos_id='".$pag['sisoda_pagamentos_id']."'");

  							if ($query_pag_3) {
  								
  								$pag_nl=$pag_nl+1;

  							}

  						}

  					}

  				}

  				// NÃO LISTAR AS PENDENCIAS ALUNOS

  				$pend_nl=0;

  				$query_pend=mysqli_query($link, "SELECT * FROM `sisoda_pendencias` WHERE `sisoda_pendencias_idAluno`='$id_aluno'");

  				if ($query_pend) {
  					
  					while($pend = mysqli_fetch_array($query_pend, MYSQLI_ASSOC)){

  						$query_pend_2=mysqli_query($link, "INSERT INTO `sisoda_pendencias_off` SELECT * FROM `sisoda_pendencias` WHERE `sisoda_pendencias_id`='".$pend['sisoda_pendencias_id']."'");

  						if ($query_pend_2) {
  							
  							$query_pend_3=mysqli_query($link, "DELETE FROM `sisoda_pendencias` WHERE sisoda_pendencias_id='".$pend['sisoda_pendencias_id']."'");

  							if ($query_pend_3) {
  								
  								$pend_nl=$pend_nl+1;

  							}

  						}

  					}

  				}

  				// NÃO LISTAR AS MENSALIDADES ALUNOS

  				$mens_nl=0;

  				$query_mens=mysqli_query($link, "SELECT * FROM `sisoda_mensalidade` WHERE `sisoda_mensalidade_idAluno`='$id_aluno'");

  				if ($query_mens) {
  					
  					while($mens = mysqli_fetch_array($query_mens, MYSQLI_ASSOC)){

  						$query_mens_2=mysqli_query($link, "INSERT INTO `sisoda_mensalidade_off` SELECT * FROM `sisoda_mensalidade` WHERE `sisoda_mensalidade_id`='".$mens['sisoda_mensalidade_id']."'");

  						if ($query_mens_2) {
  							
  							$query_mens_3=mysqli_query($link, "DELETE FROM `sisoda_mensalidade` WHERE sisoda_mensalidade_id='".$mens['sisoda_mensalidade_id']."'");

  							if ($query_mens_3) {
  								
  								$mens_nl=$mens_nl+1;

  							}

  						}

  					}

  				}

  				echo "<tr>

				  			<td>".$aluno['sisOda_alunos_nome']."</td>
				  			<td>$aulas_nl</td>
				  			<td>$mens_nl</td>
				  			<td>$pend_nl</td>

				  			</tr>";

  			}

  		}

		echo "</table>";

		
		// PROFESSORES

		echo "<table border='1'>";
  		echo "<tr>

  		<th>Nome do Aluno</th>
  		<th>Pagamentos Rest.</th>
  		<th>Mensalidades Rest.</th>

  		</tr>";

  		$query_prof=mysqli_query($link, "SELECT * FROM `sisoda_professores`");

  		if ($query_prof) {
  			
  			while($prof = mysqli_fetch_array($query_prof, MYSQLI_ASSOC)){

  				$id_prof=$prof['sisoda_professores_id'];

  				// NÃO LISTAR OS PAGAMENTOS PROFESSORES

  				$pag_nl=0;

  				$query_pag=mysqli_query($link, "SELECT * FROM `sisoda_pagamentos_prof` WHERE `sisoda_pagamentos_prof_idProfessor`='$id_prof'");

  				if ($query_pag) {
  					
  					while($pag = mysqli_fetch_array($query_pag, MYSQLI_ASSOC)){

  						$query_pag_2=mysqli_query($link, "INSERT INTO `sisoda_pagamentos_prof_off` SELECT * FROM `sisoda_pagamentos_prof` WHERE `sisoda_pagamentos_prof_id`='".$pag['sisoda_pagamentos_prof_id']."'");

  						if ($query_pag_2) {
  							
  							$query_pag_3=mysqli_query($link, "DELETE FROM `sisoda_pagamentos_prof` WHERE sisoda_pagamentos_prof_id='".$pag['sisoda_pagamentos_prof_id']."'");

  							if ($query_pag_3) {
  								
  								$pag_nl=$pag_nl+1;

  							}

  						}

  					}

  				}

  				// NÃO LISTAR AS MENSALIDADES PROFESSORES

  				$mens_nl=0;

  				$query_mens=mysqli_query($link, "SELECT * FROM `sisoda_mensalidade_prof` WHERE `sisoda_mensalidade_prof_idProf`='$id_prof'");

  				if ($query_mens) {
  					
  					while($mens = mysqli_fetch_array($query_mens, MYSQLI_ASSOC)){

  						$query_mens_2=mysqli_query($link, "INSERT INTO `sisoda_mensalidade_prof_off` SELECT * FROM `sisoda_mensalidade_prof` WHERE `sisoda_mensalidade_prof_id`='".$mens['sisoda_mensalidade_prof_id']."'");

  						if ($query_mens_2) {
  							
  							$query_mens_3=mysqli_query($link, "DELETE FROM `sisoda_mensalidade_prof` WHERE sisoda_mensalidade_prof_id='".$mens['sisoda_mensalidade_prof_id']."'");

  							if ($query_mens_3) {
  								
  								$mens_nl=$mens_nl+1;

  							}

  						}

  					}

  				}

  				echo "<tr>

				  			<td>".$prof['sisoda_professores_nome']."</td>
				  			<td>$pag_nl</td>
				  			<td>$mens_nl</td>

				  			</tr>";

  			}

  		}
  		echo "</table>";
		

		
  		echo "<script>window.history.back()</script>";
		

		

?>