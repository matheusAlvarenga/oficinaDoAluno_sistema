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
 	

 	$resultado_id=mysqli_query($link, "UPDATE `sisoda_aulas` SET `sisoda_aulas_data`='$data',`sisoda_aulas_comentarioAluno`='$feed_aluno',`sisoda_aulas_comentarioProfessor`='$feed_prof',`sisoda_aulas_materia`='$array_mat',`sisoda_aulas_topicos`='$topicos',`sisoda_aulas_unidade`='$unidade' WHERE `sisoda_aulas_id`='$id'");

 	if ($resultado_id) {
 		
 		echo "<script>window.location.href='aula_ind.php?id=$id'</script>";

 	}

?>