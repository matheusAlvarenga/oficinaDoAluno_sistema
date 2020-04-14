<?php

	$id_aluno=$_POST['id_aluno'];
    $id_prof=$_POST['id_prof'];
    $topicos=$_POST['topicos'];
    $data=$_POST['data'];
    $unid=$_POST['unid'];
    $materias=$_POST['materias'];
    $saldo_aluno=$_POST['saldo_aluno'];
    $valor_aluno=$_POST['valor_aluno'];
    $saldo_prof=$_POST['saldo_prof'];
    $valor_prof=$_POST['valor_prof'];

    $materias2=implode(',', $materias);

	require_once('../db.class.php');

	// ADICIONAR AULA NA TABELA

        $sql="INSERT INTO `sisoda_aulas`(`sisoda_aulas_idAluno`, `sisoda_aulas_idProfessor`, `sisoda_aulas_data`, `sisoda_aulas_materia`, `sisoda_aulas_topicos`, `sisoda_aulas_unidade`, `sisoda_aulas_paga`, `sisoda_aulas_recebida`, `sisoda_aulas_valorProfessor`, `sisoda_aulas_valorAluno`) VALUES ('$id_aluno','$id_prof','$data','$materias2','$topicos','$unid','0','0','$valor_prof','$valor_aluno')";

        $objDb = new db();
        $link = $objDb->conecta_mysql();

        $resultado_id = mysqli_query($link, $sql);

        if($resultado_id){

            $aula_id = $link->insert_id;

            echo "<h4 align='center'>AULA Adicionada</h4>";

        }

    // ALUNO


    // CHECAR SE ELA PODE SER PAGA PELO ALUNO

        echo "Saldo: $saldo_aluno<br>";
        echo "Valor: $valor_aluno<br>";

        if ($saldo_aluno >= $valor_aluno) {

            $aula_id = $link->insert_id;

            $sql2="UPDATE `sisoda_aulas` SET `sisoda_aulas_recebida`='1' WHERE `sisoda_aulas_id`='$aula_id'";

            $resultado_id2 = mysqli_query($link, $sql2);

            if($resultado_id2){

                echo "<h4 align='center'>Recebida Alterada</h4>";

            }
        }

    // ATUALIZAR O SALDO

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

                    echo "SELECT SUM(`sisoda_aulas_valor`) FROM `sisoda_aulas` WHERE `sisoda_aulas_idAluno`='$id_aluno'";

                    $row14= mysqli_fetch_array($resultado_id14);

                    $valor_total_aulas_aluno=$row14[0];

                    // CALCULAR O SALDO FINAL

                    $saldo_final_aluno=$valor_total_pag_aluno-$valor_total_aulas_aluno-$valor_total_mens_aluno-$valor_total_pend_aluno;

                    echo "Valor pagamento: $valor_total_pag_aluno<br>";
                    echo "Valor mensalidade: $valor_total_mens_aluno<br>";
                    echo "Valor pendencia: $valor_total_pend_aluno<br>";
                    echo "Valor aulas: $valor_total_aulas_aluno<br>";
                    echo "Valor total: $saldo_final_aluno<br>";

                    // ATUALIZAR SALDO NA TABELA

                    $resultado_id15=mysqli_query($link,"UPDATE `sisoda_alunos` SET `sisOda_alunos_saldo`='$saldo_final_aluno' WHERE `sisOda_alunos_id`='$id_aluno'");

                    echo "UPDATE `sisoda_alunos` SET `sisOda_alunos_saldo`='$saldo_final_aluno' WHERE `sisOda_alunos_id`='$id_aluno'";

                    if ($resultado_id15) {
                        
                        echo "Saldo Atualizado";

                    }

    // PROFESSOR


    // CHECAR SE ELA PODE SER CONSIDERADA PAGA

        if ($saldo_prof < 0) {
            $saldo_prof_inv=abs($saldo_prof);
        }
        else{
            $saldo_prof_inv= -$saldo_prof;
        }

        echo "$saldo_prof_inv<br>";

        echo $valor_prof;

        if ($saldo_prof_inv >= $valor_prof) {

            $aula_id = $link->insert_id;

            $sql8="UPDATE `sisoda_aulas` SET `sisoda_aulas_paga`='1' WHERE `sisoda_aulas_id`='$aula_id'";

            $resultado_id8 = mysqli_query($link, $sql8);

            if($resultado_id8){

                echo "$sql8";

                echo "<h4 align='center'>Paga Alterada</h4>";

            }
        }

    // ATUALIZAR O SALDO

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

                echo "Valor Aulas: $valor_total_aulas_prof";
                echo "Valor Mens: $valor_total_mens_prof";
                echo "Valor Pag: $valor_total_pag_prof";

                echo "Saldo Final: $saldo_final_prof";

                // ATUALIZAR SALDO NA TABELA

                $resultado_id8=mysqli_query($link,"UPDATE `sisoda_professores` SET `sisoda_professores_saldo`='$saldo_final_prof' WHERE `sisoda_professores_id`='$id_prof'");

                if ($resultado_id8) {
                    echo "Saldo Atualizado";
                }
?>