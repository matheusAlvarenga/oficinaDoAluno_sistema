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

	$sql="INSERT INTO `sisoda_aulas`(`sisoda_aulas_id`, `sisoda_aulas_idAluno`, `sisoda_aulas_idProfessor`, `sisoda_aulas_data`, `sisoda_aulas_comentarioAluno`, `sisoda_aulas_comentarioProfessor`, `sisoda_aulas_materia`, `sisoda_aulas_topicos`, `sisoda_aulas_unidade`) VALUES (NULL,'$id_aluno','$id_prof','$data',NULL,NULL,'$materias2','$topicos','$unid')";

    $objDb = new db();
    $link = $objDb->conecta_mysql();

    $resultado_id = mysqli_query($link, $sql);

    if ($resultado_id) {

            // SALDO ALUNO

                $valor_final_a=$saldo_aluno - $valor_aluno;

                $last_id = $link->insert_id;
                $sql2="UPDATE `sisoda_alunos` SET `sisOda_alunos_saldo` = '$valor_final_a' WHERE `sisoda_alunos`.`sisOda_alunos_id` = $id_aluno;
    ";
                $resultado_id2 = mysqli_query($link, $sql2);
                if ($resultado_id2) {

                    $sql3="UPDATE `sisoda_aulas` SET `sisoda_aulas_recebida` = '1' WHERE `sisoda_aulas`.`sisoda_aulas_id` = '$last_id';";
                    $resultado_id3 = mysqli_query($link, $sql3);
                    if($resultado_id3){

                    }else{
                        echo "Erro";
                    }
                    echo "$sql2";
                    }
                else{
                    echo "Não Foi Possível Adicionar";
                }

                // SALDO PROFESSOR

                $valor_final_p=$saldo_prof - $valor_prof;

                $last_id = $link->insert_id;
                $sql4="UPDATE `sisoda_professores` SET `sisoda_professores_saldo` = '$valor2' WHERE `sisoda_professores`.`sisoda_professores_id` = $id_prof;
    ";
                $resultado_id4 = mysqli_query($link, $sql4);
                if ($resultado_id4) {

                    $sql5="UPDATE `sisoda_aulas` SET `sisoda_aulas_paga` = '1' WHERE `sisoda_aulas`.`sisoda_aulas_id` = '$last_id';";
                    $resultado_id5 = mysqli_query($link, $sql5);
                    if($resultado_id5){

                    }else{
                        echo "Erro";
                    }
                    echo "$sql2";
                    }
                else{
                    echo "Não Foi Possível Adicionar";
                }

        }
        else{
            echo "

                <script>

                    alert('Erro');

                </script>

            ";
        }

?>