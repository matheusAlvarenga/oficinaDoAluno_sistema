<?php

	require_once('../db.class.php');

	$id_aluno=$_POST['aluno_selec'];
	$valor=$_POST['valor_aluno'];
	$comen=$_POST['comen_aluno'];
	$saldo=$_POST[$id_aluno];

        $hoje=date("Y-m-d");

	
	// ADICIONAR A PENDENCIA A TABELA DE PENDENCIAS

	$sql="INSERT INTO `sisoda_pendencias`(`sisoda_pendencias_idAluno`, `sisoda_pendencias_valor`, `sisoda_pendencias_comentario`, `sisoda_pendencias_paga`,`sisoda_pendencias_data`) VALUES ('$id_aluno','$valor','$comen','0','$hoje')";
	$objDb = new db();
        $link = $objDb->conecta_mysql();

        $resultado_id = mysqli_query($link, $sql);

        if($resultado_id){

        }

	// CHECAR SE ELA PODE SER PAGA AGORA

        if ($saldo > $valor) {
        	
        	$pend_id = $link->insert_id;

        	$sql2="UPDATE `sisoda_pendencias` SET `sisoda_pendencias_paga`='1' WHERE `sisoda_pendencias_id`='$pend_id'";

        	$resultado_id2 = mysqli_query($link, $sql2);

        	if($resultado_id2){

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

                    $resultado_id14 = mysqli_query($link,"SELECT SUM(`sisoda_aulas_valorAluno`) FROM `sisoda_aulas` WHERE `sisoda_aulas_idAluno`='$id_aluno'");
                    $row14= mysqli_fetch_array($resultado_id14);

                    $valor_total_aulas_aluno=$row14[0];

                    // CALCULAR O SALDO FINAL

                    $saldo_final_aluno=$valor_total_pag_aluno-$valor_total_aulas_aluno-$valor_total_mens_aluno-$valor_total_pend_aluno;


                    // ATUALIZAR SALDO NA TABELA

                    $resultado_id15=mysqli_query($link,"UPDATE `sisoda_alunos` SET `sisOda_alunos_saldo`='$saldo_final_aluno' WHERE `sisOda_alunos_id`='$id_aluno'");

                    if ($resultado_id15) {
                        
                        echo "<script>alert('Pendência adicionada com sucesso. Saldo atualizado: R$ $saldo_final_aluno'); window.history.back()</script>";

                    }
        

?>