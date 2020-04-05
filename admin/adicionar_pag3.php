<?php

	require_once('../db.class.php');

	$objDb = new db();
	$link = $objDb->conecta_mysql();

	$id_aluno=$_GET['aluno_selec'];
	$valor=$_GET['valor_aluno'];
	$saldo=$_GET[$id_aluno];
	$valor_aula=$_GET['valor_aula'];

	if ($saldo > 0) {
		$valor=$saldo+$valor;
	}

	// ATUALIZAR AULAS COM PENDÊNCIA

		$sql="SELECT * FROM sisoda_aulas WHERE `sisoda_aulas_idAluno`='$id_aluno' AND `sisoda_aulas_recebida`='0'";

        $resultado_id = mysqli_query($link, $sql);

        $aulas_p_pagar=mysqli_num_rows($resultado_id);

	    echo "Aulas não-pagas: $aulas_p_pagar <br>";

	    $aulas_possiveis_pag=$valor/$valor_aula;

	    echo "Aulas Possiveis de Pagar: $aulas_possiveis_pag<br>";

	    if ($aulas_possiveis_pag >= $aulas_p_pagar) {
	    	
	    	$sql2="UPDATE `sisoda_aulas` SET `sisoda_aulas_recebida`='1' WHERE `sisoda_aulas_idAluno`='$id_aluno'";

	    	$resultado_id2 = mysqli_query($link, $sql2);

	    	if ($resultado_id2) {
	    		echo"Aulas Pagas.<br>";
	    	}

	    	$resto_aulas=$valor-($aulas_p_pagar*$valor_aula);

	    }else{

	    	for ($i=1; $i <= $aulas_possiveis_pag; $i++) { 
	    		
	    		$sql2="UPDATE `sisoda_aulas` SET `sisoda_aulas_recebida`='1' WHERE `sisoda_aulas_idAluno`='$id_aluno' AND `sisoda_aulas_recebida`='0' ORDER BY `sisoda_aulas_data` LIMIT 1 ";

				$resultado_id2 = mysqli_query($link, $sql2);

				if ($resultado_id2) {
	    			echo"Aulas Pagas.<br>";
	    		}else{
	    			echo "Aulas Não Pagas<br>";
	    		}

	    	}

	    	$resto_aulas=$valor%$valor_aula;
	    	echo "$resto_aulas<br>";

	    }



	// ATUALIZAR OUTRAS PENDÊNCIAS

	    if ($resto_aulas==0) {
	    	echo"<script>alert('O pagamento foi utilizado apenas para aulas pendentes.'); window.history.back();</script>";
	    }else{
	    	$soma_pendencias=0;
	    	$sql3="SELECT * FROM `sisoda_pendencias` WHERE `sisoda_pendencias_idAluno`='$id_aluno' AND `sisoda_pendencias_paga`='0'";

	    	$resultado_id3 = mysqli_query($link, $sql3);

	    	if ($resultado_id3) {
	    		
	    		while($dados_login = mysqli_fetch_array($resultado_id3, MYSQLI_ASSOC)){

	    			$a=$dados_login['sisoda_pendencias_valor'];

	    			$soma_pendencias=$soma_pendencias+$a;

	    		}

	    	if ($resto_aulas >= $soma_pendencias) {
	    		
	    		$sql4="UPDATE `sisoda_pendencias` SET `sisoda_pendencias_paga`='1' WHERE `sisoda_pendencias_idAluno`='$id_aluno'";

		    	$resultado_id4 = mysqli_query($link, $sql4);

		    	if ($resultado_id4) {
		    		echo"Pendências Pagas.<br>";
		    	}

		    	$resto_pendencias=$resto_aulas-$soma_pendencias;

	    		}else{

	    			$resto_pendencias=$resto_aulas;

	    			$sql5="SELECT * FROM `sisoda_pendencias` WHERE `sisoda_pendencias_idAluno`='$id_aluno' AND `sisoda_pendencias_paga`='0'";

			    	$resultado_id5 = mysqli_query($link, $sql5);

			    	if ($resultado_id5) {
			    		
			    		while($dados_login = mysqli_fetch_array($resultado_id5, MYSQLI_ASSOC)){

			    			$valor_pend=$dados_login['sisoda_pendencias_valor'];

			    			if ($resto_pendencias >= $valor_pend) {
			    				
			    				$sql6="UPDATE `sisoda_pendencias` SET `sisoda_pendencias_paga`='1' WHERE `sisoda_pendencias_idAluno`='$id_aluno' AND `sisoda_pendencias_paga`='0' ORDER BY `sisoda_pendencias_id` LIMIT 1";

						    	$resultado_id6 = mysqli_query($link, $sql6);

						    	if ($resultado_id6) {
						    		echo"Pendências Pagas.<br>";
						    	}

						    	$resto_pendencias=$resto_pendencias-$valor_pend;

			    			}

			    		}

	    		}

	    	}

	    }
	}
		
	// ATUALIZAR SALDO

			$valor2 = $resto_pendencias + $saldo;

		$sql3 = "UPDATE `sisoda_alunos` SET `sisOda_alunos_saldo` = '$valor2' WHERE `sisoda_alunos`.`sisOda_alunos_id` = $id_aluno;
";
	    $resultado_id3 = mysqli_query($link, $sql3);

	    if($resultado_id3){
	    	echo "Saldo Atualizado";
	    }
	  	else{
	  		echo "Saldo Não Atualizado";
	  	}

?>