<?php

	require_once('../db.class.php');

	$objDb = new db();
	$link = $objDb->conecta_mysql();

	$id_aluno=$_GET['aluno_selec'];
	$valor=$_GET['valor_aluno'];
	$saldo=$_GET[$id_aluno];


    $resultado_id12=mysqli_query($link, "SELECT * FROM `sisoda_alunos` WHERE `sisOda_alunos_id`='$id_aluno'");

        while($dados_login12 = mysqli_fetch_array($resultado_id12, MYSQLI_ASSOC)){

            $valor_aula=$dados_login12['sisOda_alunos_tipoDePlano'];

        }


	$hoje=date("Y-m-d");

	// ADICIONAR PAGAMENTO À TABELA DE PAGAMENTOS

		$sql="INSERT INTO `sisoda_pagamentos`(`sisoda_pagamentos_idAluno`, `sisoda_pagamentos_valor`, `sisoda_pagamentos_paga`, `sisoda_pagamentos_data`) VALUES ('$id_aluno','$valor','0','$hoje')";
		$objDb = new db();
	    $link = $objDb->conecta_mysql();

	    $resultado_id = mysqli_query($link, $sql);

	    if($resultado_id){

	        	echo "<h4 align='center'>Pagamento Adicionado</h4>";

	    }

	// CHECAR SE ALGUMA AULA PODE SER PAGA

	    $aulas_pagas=0;
	    $valor_sobra_aulas=$valor;

    	$resultado_id8 = mysqli_query($link,"SELECT * FROM `sisoda_aulas` WHERE `sisoda_aulas_idAluno`='$id_aluno' AND `sisoda_aulas_paga`='0'");
    	if ($resultado_id8) {

            echo "<script>alert('Aula Achada')</script>";
    		
    		while($dados_login8 = mysqli_fetch_array($resultado_id8, MYSQLI_ASSOC)){

    			if ($valor_sobra_aulas >= $valor_aula) {
   				
    				$resultado_id10=mysqli_query($link,"UPDATE `sisoda_aulas` SET `sisoda_aulas_recebida`='1' WHERE `sisoda_aulas_id`='".$dados_login8['sisoda_aulas_id']."'");

    				if ($resultado_id10) {
                        echo "<script>alert('Aula Paga')</script>";
    					$valor_sobra_aulas=$valor_sobra_aulas-$valor_aula;
    					$aulas_pagas=$aulas_pagas+1;
    				}

    			}

    		}

    		echo "Aulas Pagas: $aulas_pagas<br>";

    	}

	// CHECAR SE ALGUMA PENDENCIA PODE SER PAGA

    	$valor_sobra_pend=$valor_sobra_aulas;
    	$pend_pagas=0;

    	$resultado_id9 = mysqli_query($link,"SELECT * FROM `sisoda_pendencias` WHERE `sisoda_pendencias_idAluno`='$id_aluno' AND `sisoda_pendencias_paga`='0'");
    	if ($resultado_id9) {
    		
    		echo "<script>alert('Pendencia Achada')</script>";

    		while($dados_login9 = mysqli_fetch_array($resultado_id9, MYSQLI_ASSOC)){

    			$valor_pend=$dados_login9['sisoda_pendencias_valor'];

    			if ($valor_sobra_pend >= $valor_pend) {
    				
    				$resultado_id11=mysqli_query($link,"UPDATE `sisoda_pendencias` SET `sisoda_pendencias_paga`='1' WHERE `sisoda_pendencias_id`='".$dados_login9['sisoda_pendencias_id']."'");

    				echo "UPDATE `sisoda_pendencias` SET `sisoda_pendencias_paga`='1' WHERE `sisoda_pendencias_id`='".$dados_login9['sisoda_pendencias_id']."'";

    				if ($resultado_id11) {
    					echo "<script>alert('Pendencia Achada 2')</script>";
    					$valor_sobra_pend=$valor_sobra_pend-$valor_pend;
    					$pend_pagas = $pend_pagas + 1;
    				}

    			}

    		}

    		echo "Pendencias Pagas: $pend_pagas<br>";

    	}

	// ATUALIZAR SALDO

	// VALOR DAS AULAS

        $sql3="SELECT `sisOda_alunos_tipoDePlano` FROM `sisoda_alunos` WHERE `sisOda_alunos_id`='$id_aluno'";

        $resultado_id3 = mysqli_query($link, $sql3);

        	if($resultado_id3){

        		while($dados_login3 = mysqli_fetch_array($resultado_id3, MYSQLI_ASSOC)){

        			$valor_aula=$dados_login3['sisOda_alunos_tipoDePlano'];

        		}

        	}

        $resultado_id4 = mysqli_query($link,"SELECT COUNT(1) FROM `sisoda_aulas` WHERE `sisoda_aulas_idAluno`='$id_aluno'");
        $row = mysqli_fetch_array($resultado_id4);
        $num_aulas = $row[0];

        $valor_total_aulas=$num_aulas*$valor_aula;

        echo "Valor das Aulas: $valor_total_aulas<br>";

        // VALOR DAS PENDÊNCIAS

        $resultado_id5 = mysqli_query($link,"SELECT SUM(`sisoda_pendencias_valor`) FROM `sisoda_pendencias` WHERE `sisoda_pendencias_idAluno`='$id_aluno'");
        $row2= mysqli_fetch_array($resultado_id5);

        $valor_total_pend=$row2[0];

        echo "Valor das Pendencias: $valor_total_pend<br>";

        // VALOR DOS PAGAMENTOS

        $resultado_id6 = mysqli_query($link,"SELECT SUM(`sisoda_pagamentos_valor`) FROM `sisoda_pagamentos` WHERE `sisoda_pagamentos_idAluno`='$id_aluno'");
        $row3= mysqli_fetch_array($resultado_id6);

        $valor_total_pag=$row3[0];

        echo "Valor dos Pagamentos: $valor_total_pag<br>";

        // ATT VALOR DO SALDO

        echo "Saldo Anterior: $saldo<br>";

        $saldo_final=$valor_total_pag-$valor_total_aulas-$valor_total_pend;

        echo "Saldo Final: $saldo_final";

        $resultado_id7 = mysqli_query($link,"UPDATE `sisoda_alunos` SET `sisOda_alunos_saldo`='$saldo_final' WHERE `sisOda_alunos_id`='$id_aluno'");

        if ($resultado_id7) {
        	
        	echo "

        		<script>
        			alert('Pagamento adicionado com sucesso');
        			window.history.back();
        		</script>

        	";

        }

?>