<?php

	require_once('../db.class.php');

	$id_aluno=$_GET['aluno_selec'];
	$valor=$_GET['valor_aluno'];
	$comen=$_GET['comen_aluno'];
	$saldo=$_GET[$id_aluno];

	$valor2 = $saldo - $valor;

	// ATUALIZAR SALDO DO ALUNO

		$sql = "INSERT INTO `sisoda_pendencias` (`sisoda_pendencias_id`, `sisoda_pendencias_idAluno`, `sisoda_pendencias_valor`, `sisoda_pendencias_comentario`, `sisoda_pendencias_paga`) VALUES (NULL, '$id_aluno', '$valor', '$comen', '0')";
	    $objDb = new db();
	    $link = $objDb->conecta_mysql();

	    $resultado_id = mysqli_query($link, $sql);

	    if($resultado_id){

	    		$last_id = $link->insert_id;
		    	$sql2="UPDATE `sisoda_alunos` SET `sisOda_alunos_saldo` = '$valor2' WHERE `sisoda_alunos`.`sisOda_alunos_id` = $id_aluno;";
				$resultado_id2 = mysqli_query($link, $sql2);
				if ($resultado_id2) {

					$sql3="UPDATE `sisoda_pendencias` SET `sisoda_pendencias_paga` = '1' WHERE `sisoda_pendencias`.`sisoda_pendencias_id` = '$last_id';";
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
			  }else{
	    		$last_id = $link->insert_id;
		    	$sql2="UPDATE `sisoda_alunos` SET `sisOda_alunos_saldo` = '$valor2' WHERE `sisoda_alunos`.`sisOda_alunos_id` = $id_aluno;";	

				$resultado_id2 = mysqli_query($link, $sql2);
				if ($resultado_id2) {
					$sql3="UPDATE `sisoda_pendencias` SET `sisoda_pendencias_paga` = '1' WHERE `sisoda_pendencias`.`sisoda_pendencias_id` = '$last_id';";
					$resultado_id3 = mysqli_query($link, $sql3);
					if($resultado_id3){

					}else{
						echo "Erro";
					}
					echo "$sql2";
					}
				}
	    	}
	    	
?>