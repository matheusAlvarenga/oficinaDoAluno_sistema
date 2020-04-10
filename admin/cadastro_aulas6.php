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

        $sql="INSERT INTO `sisoda_aulas`(`sisoda_aulas_idAluno`, `sisoda_aulas_idProfessor`, `sisoda_aulas_data`, `sisoda_aulas_materia`, `sisoda_aulas_topicos`, `sisoda_aulas_unidade`, `sisoda_aulas_paga`, `sisoda_aulas_recebida`) VALUES ('$id_aluno','$id_prof','$data','$materias2','$topicos','$unid','0','0')";
        $objDb = new db();
        $link = $objDb->conecta_mysql();

        $resultado_id = mysqli_query($link, $sql);

        if($resultado_id){

            $aula_id = $link->insert_id;

            echo "<h4 align='center'>AULA Adicionada</h4>";

        }

    // ALUNO


    // CHECAR SE ELA PODE SER PAGA PELO ALUNO

        if ($saldo_aluno > $valor_aluno) {
            
            $aula_id = $link->insert_id;

            $sql2="UPDATE `sisoda_aulas` SET `sisoda_aulas_recebida`='1' WHERE `sisoda_aulas_id`='$aula_id'";

            $resultado_id2 = mysqli_query($link, $sql2);

            if($resultado_id2){

                echo "<h4 align='center'>Recebida Alterada</h4>";

            }
        }

    // ATUALIZAR O SALDO

        $sql3="SELECT `sisOda_alunos_tipoDePlano` FROM `sisoda_alunos` WHERE `sisOda_alunos_id`='$id_aluno'";

        $resultado_id3 = mysqli_query($link, $sql3);

            if($resultado_id3){

                while($dados_login3 = mysqli_fetch_array($resultado_id3, MYSQLI_ASSOC)){

                    $valor_aula_aluno=$dados_login3['sisOda_alunos_tipoDePlano'];

                }

            }

        $resultado_id4 = mysqli_query($link,"SELECT COUNT(1) FROM `sisoda_aulas` WHERE `sisoda_aulas_idAluno`='$id_aluno'");
        $row = mysqli_fetch_array($resultado_id4);
        $num_aulas = $row[0];

        $valor_total_aulas_aluno=$num_aulas*$valor_aula_aluno;

        echo "Valor das Aulas: $valor_total_aulas_aluno<br>";

        // VALOR DAS PENDÊNCIAS

        $resultado_id5 = mysqli_query($link,"SELECT SUM(`sisoda_pendencias_valor`) FROM `sisoda_pendencias` WHERE `sisoda_pendencias_idAluno`='$id_aluno'");
        $row2= mysqli_fetch_array($resultado_id5);

        $valor_total_pend_aluno=$row2[0];

        echo "Valor das Pendencias: $valor_total_pend_aluno<br>";

        // VALOR DOS PAGAMENTOS

        $resultado_id6 = mysqli_query($link,"SELECT SUM(`sisoda_pagamentos_valor`) FROM `sisoda_pagamentos` WHERE `sisoda_pagamentos_idAluno`='$id_aluno'");
        $row3= mysqli_fetch_array($resultado_id6);

        $valor_total_pag_aluno=$row3[0];

        echo "Valor dos Pagamentos: $valor_total_pag_aluno<br>";

        // ATT VALOR DO SALDO

        echo "Saldo Anterior: $saldo_aluno<br>";

        $saldo_final_aluno=$valor_total_pag_aluno-$valor_total_aulas_aluno-$valor_total_pend_aluno;

        echo "Saldo Final: $saldo_final_aluno";

        $resultado_id7 = mysqli_query($link,"UPDATE `sisoda_alunos` SET `sisOda_alunos_saldo`='$saldo_final_aluno' WHERE `sisOda_alunos_id`='$id_aluno'");

        if ($resultado_id7) {
            
            echo "<h4 align='center'>Saldo Aluno Alterada</h4>";

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

        if ($saldo_prof_inv > $valor_prof) {

            $sql8="UPDATE `sisoda_aulas` SET `sisoda_aulas_paga`='1' WHERE `sisoda_aulas_id`='$aula_id'";

            $resultado_id8 = mysqli_query($link, $sql8);

            if($resultado_id8){

                echo "$sql8";

                echo "<h4 align='center'>Paga Alterada</h4>";

            }
        }

    // ATUALIZAR O SALDO

        $resultado_id9 = mysqli_query($link,"SELECT SUM(`sisoda_pagamentos_prof_valor`) FROM `sisoda_pagamentos_prof` WHERE `sisoda_pagamentos_prof_idProfessor`='$id_prof'");
        $row9= mysqli_fetch_array($resultado_id9);

        $valor_total_pag_prof=$row9[0];

        echo "Valor dos Pagamentos: $valor_total_pag_prof<br>";

        $sql10="SELECT `sisOda_professores_valor` FROM `sisoda_professores` WHERE `sisOda_professores_id`='$id_prof'";

        $resultado_id10 = mysqli_query($link, $sql10);

            if($resultado_id10){

                while($dados_login10 = mysqli_fetch_array($resultado_id10, MYSQLI_ASSOC)){

                    $valor_aula_prof=$dados_login10['sisOda_professores_valor'];

                }

            }

        $resultado_id11 = mysqli_query($link,"SELECT COUNT(1) FROM `sisoda_aulas` WHERE `sisoda_aulas_idProfessor`='$id_prof'");
        $row11 = mysqli_fetch_array($resultado_id11);
        $num_aulas_prof = $row11[0];

        $valor_total_aulas_prof=$num_aulas_prof*$valor_aula_prof;

        echo "Valor das Aulas: $valor_total_aulas_prof<br>";

        // ATT VALOR DO SALDO

        echo "Saldo Anterior: $saldo_prof<br>";

        $saldo_final_prof=$valor_total_aulas_prof-$valor_total_pag_prof;

        echo "Saldo Final: $saldo_final_prof";

        $resultado_id12 = mysqli_query($link,"UPDATE `sisoda_professores` SET `sisOda_professores_saldo`='$saldo_final_prof' WHERE `sisoda_professores_id`='$id_prof'");

        if ($resultado_id12) {
            
            echo "<h4 align='center'>Saldo Professor Alterada</h4>";

        }
?>