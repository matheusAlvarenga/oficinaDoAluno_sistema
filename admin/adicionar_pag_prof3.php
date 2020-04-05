<?php

	require_once('../db.class.php');

	$id_aluno=$_GET['aluno_selec'];
	$valor=$_GET['valor_aluno'];
	$saldo=$_GET[$id_aluno];

	$valor2 = $saldo - $valor;

	$valor2=number_format($valor2, 2, '.','');

	// ATUALIZAR SALDO DO ALUNO

		$sql = "UPDATE `sisoda_professores` SET `sisoda_professores_saldo` = '$valor2' WHERE `sisoda_professores`.`sisoda_professores_id` = '$id_aluno';";

	    $objDb = new db();
	    $link = $objDb->conecta_mysql();

	    $resultado_id = mysqli_query($link, $sql);

	    if($resultado_id){
	    	echo "Saldo Atualizado";
	    	echo "<script>window.history.back()</script>";
	    }
	  	else{
	  		echo "Saldo Não Atualizado";
	  	}

	// ATUALIZAR AULAS COM PENDÊNCIA

	// ATUALIZAR OUTRAS PENDÊNCIAS

		

?>