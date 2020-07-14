<?php

	require_once('../db.class.php');

	$objDb = new db();
    $link = $objDb->conecta_mysql();

	$id_aluno=$_POST['aluno_selec'];
	$valor=$_POST['valor_aluno'];
	$saldo=$_POST[$id_aluno];
	$obs=$_POST['obs'];

	$hoje=date('Y-m-d');

	// ADICIONAR O PAGAMENTO A TABELA

		$resultado_id=mysqli_query($link, "INSERT INTO `sisoda_pagamentos_prof`(`sisoda_pagamentos_prof_idProfessor`, `sisoda_pagamentos_prof_valor`, `sisoda_pagamentos_prof_paga`, `sisoda_pagamentos_prof_data`, `sisoda_pagamentos_prof_obs`) VALUES ('$id_aluno','$valor','0','$hoje','$obs')");

		if ($resultado_id) {
			


		}

	// CHECAR SE ALGUMA MENSALIDADE PODE SER PAGA

		$mens_pagas=0;
	    $valor_sobra_mens=$valor;

    	$resultado_id2 = mysqli_query($link,"SELECT * FROM `sisoda_mensalidade_prof` WHERE `sisoda_mensalidade_prof_idProf`='$id_aluno' AND `sisoda_mensalidade_prof_pago`='0'");
    	if ($resultado_id2) {

    		
    		while($dados_login2 = mysqli_fetch_array($resultado_id2, MYSQLI_ASSOC)){

    			if ($valor_sobra_mens >= $dados_login2['sisoda_mensalidade_prof_valor']) {
   				
    				$resultado_id3=mysqli_query($link,"UPDATE `sisoda_mensalidade_prof` SET `sisoda_mensalidade_prof_pago`='1' WHERE `sisoda_mensalidade_prof_id`='".$dados_login2['sisoda_mensalidade_prof_id']."'");


    				if ($resultado_id3) {

    					$valor_sobra_mens=$valor_sobra_mens-$dados_login2['sisoda_mensalidade_prof_valor'];
    					$mens_pagas=$mens_pagas+1;
    				}

    			}

    		}


    	}

        // CHECAR SE ALGUMA AULA PODE SER PAGA

        $aulas_pagas=0;
        $valor_sobra_aulas=$valor_sobra_mens;

        $resultado_id4 = mysqli_query($link,"SELECT * FROM `sisoda_aulas` WHERE `sisoda_aulas_idProfessor`='$id_aluno' AND `sisoda_aulas_paga`='0'");
        if ($resultado_id4) {

            
            while($dados_login4 = mysqli_fetch_array($resultado_id4, MYSQLI_ASSOC)){

                if ($valor_sobra_aulas >= $dados_login4['sisoda_aulas_valorProfessor']) {
                
                    $resultado_id5=mysqli_query($link,"UPDATE `sisoda_aulas` SET `sisoda_aulas_paga`='1' WHERE `sisoda_aulas_id`='".$dados_login4['sisoda_aulas_id']."'");

                    if ($resultado_id5) {

                        $valor_sobra_aulas=$valor_sobra_aulas-$dados_login4['sisoda_aulas_valorProfessor'];
                        $aulas_pagas=$aulas_pagas+1;
                    }

                }

            }



        }

	// ATUALIZAR SALDO DO PROFESSOR

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
                    echo "<script>alert('O pagamento do professor foi adicionado e esses são os resultados: $aulas_pagas aulas pagas e $mens_pagas mensalidades pagas. Saldo final: R$ $saldo_final_prof'); window.history.back()</script>";
                }

?>