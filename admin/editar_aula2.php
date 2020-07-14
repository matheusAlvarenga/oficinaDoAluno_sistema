<?php

	$id=$_POST['id'];

	require_once('../db.class.php');

	$objDb = new db();
 	$link = $objDb->conecta_mysql();

 	$materia=$_POST['materias'];

 	$array_mat=implode(',', $materia);

 	$topicos=$_POST['topicos'];
 	$data=$_POST['data'];
 	$unidade=$_POST['unid'];
 	$valor_p=$_POST['valor_prof'];
 	$valor_a=$_POST['valor_aluno'];
 	$unidade=$_POST['unid'];
 	
 	$id_aluno=$_POST['id_aluno'];
 	$id_prof=$_POST['id_prof'];

 	if ($_POST['aluno'] == 'Nenhum feedback foi feito ainda.') {
 		$feed_aluno=NULL;
 	}else{
 		$feed_aluno=$_POST['aluno'];
 	}

 	if ($_POST['prof'] == 'Nenhum feedback foi feito ainda.') {
 		$feed_prof=NULL;
 	}else{
 		$feed_prof=$_POST['prof'];
 	}
 	

 	$resultado_id=mysqli_query($link, "UPDATE `sisoda_aulas` SET `sisoda_aulas_data`='$data',`sisoda_aulas_comentarioAluno`='$feed_aluno',`sisoda_aulas_comentarioProfessor`='$feed_prof',`sisoda_aulas_materia`='$array_mat',`sisoda_aulas_topicos`='$topicos',`sisoda_aulas_unidade`='$unidade', `sisoda_aulas_valorProfessor`='$valor_p', `sisoda_aulas_valorAluno`='$valor_a' WHERE `sisoda_aulas_id`='$id'");

 	if ($resultado_id) {
 		
 		

 	}
 	
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

                    $resultado_id14 = mysqli_query($link,"SELECT SUM(`sisoda_aulas_valorAluno`) FROM `sisoda_aulas` WHERE `sisoda_aulas_idAluno`='$id_aluno'");

                    $row14= mysqli_fetch_array($resultado_id14);

                    $valor_total_aulas_aluno=$row14[0];

                    // CALCULAR O SALDO FINAL

                    $saldo_final_aluno=$valor_total_pag_aluno-$valor_total_aulas_aluno-$valor_total_mens_aluno-$valor_total_pend_aluno;

                    // ATUALIZAR SALDO NA TABELA

                    $resultado_id15=mysqli_query($link,"UPDATE `sisoda_alunos` SET `sisOda_alunos_saldo`='$saldo_final_aluno' WHERE `sisOda_alunos_id`='$id_aluno'");

                    if ($resultado_id15) {
                        

                    }
 	
 	$resultado_id5 = mysqli_query($link,"SELECT SUM(`sisoda_pagamentos_prof_valor`) FROM `sisoda_pagamentos_prof` WHERE `sisoda_pagamentos_prof_idProfessor`='$id_prof'");
                $row5= mysqli_fetch_array($resultado_id5);

                $valor_total_pag_prof=$row5[0];

                // VALORES DAS AULAS

                $resultado_id6 = mysqli_query($link,"SELECT SUM(`sisoda_aulas_valorProfessor`) FROM `sisoda_aulas` WHERE `sisoda_aulas_idProfessor`='$id_prof'");
                $row6= mysqli_fetch_array($resultado_id6);

                $valor_total_aulas_prof=$row6[0];

                // VALORES DAS MENSALIDADES

                $resultado_id7 = mysqli_query($link,"SELECT SUM(`sisoda_mensalidade_prof_valor`) FROM `sisoda_mensalidade_prof` WHERE `sisoda_mensalidade_prof_idProf`='$id_prof'");
                $row7= mysqli_fetch_array($resultado_id7);

                $valor_total_mens_prof=$row7[0];

                // CALCULAR SALDO FINAL PROFESSOR

                $saldo_final_prof=$valor_total_aulas_prof+$valor_total_mens_prof-$valor_total_pag_prof;


                // ATUALIZAR SALDO NA TABELA

                $resultado_id8=mysqli_query($link,"UPDATE `sisoda_professores` SET `sisoda_professores_saldo`='$saldo_final_prof' WHERE `sisoda_professores_id`='$id_prof'");

                if ($resultado_id8) {
                    echo "<script>window.location.href='aula_ind.php?id=$id'</script>";
                }

?>