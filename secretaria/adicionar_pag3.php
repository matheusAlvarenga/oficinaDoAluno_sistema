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

    // CHECAR SE ALGUMA MENSALIDADE PODE SER PAGA

        $mens_pagas=0;
        $valor_sobra_mens=$valor;

        $resultado_id8 = mysqli_query($link,"SELECT * FROM `sisoda_mensalidade` WHERE `sisoda_mensalidade_idAluno`='$id_aluno' AND `sisoda_mensalidade_paga`='0'");
        if ($resultado_id8) {
            
            echo"Achei uma mensalidade";

            while($dados_login8 = mysqli_fetch_array($resultado_id8, MYSQLI_ASSOC)){

                if ($valor_sobra_mens >= $dados_login8['sisoda_mensalidade_valor']) {
                
                    $resultado_id10=mysqli_query($link,"UPDATE `sisoda_mensalidade` SET `sisoda_mensalidade_paga`='1' WHERE `sisoda_mensalidade_id`='".$dados_login8['sisoda_mensalidade_id']."'");

                    if ($resultado_id10) {
                        $valor_sobra_mens=$valor_sobra_mens-$dados_login8['sisoda_mensalidade_valor'];
                        $mens_pagas=$mens_pagas+1;
                    }

                }

            }

            echo "Mens. Pagas: $mens_pagas<br>";

        }

	// CHECAR SE ALGUMA AULA PODE SER PAGA

	    $aulas_pagas=0;
	    $valor_sobra_aulas=$valor_sobra_mens;

    	$resultado_id8 = mysqli_query($link,"SELECT * FROM `sisoda_aulas` WHERE `sisoda_aulas_idAluno`='$id_aluno' AND `sisoda_aulas_recebida`='0'");
    	if ($resultado_id8) {
    		
    		while($dados_login8 = mysqli_fetch_array($resultado_id8, MYSQLI_ASSOC)){

    			if ($valor_sobra_aulas >= $valor_aula) {
   				
    				$resultado_id10=mysqli_query($link,"UPDATE `sisoda_aulas` SET `sisoda_aulas_recebida`='1' WHERE `sisoda_aulas_id`='".$dados_login8['sisoda_aulas_id']."'");

    				if ($resultado_id10) {
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

                    $resultado_id14 = mysqli_query($link,"SELECT SUM(`sisoda_aulas_tipoDePlano`) FROM `sisoda_aulas` WHERE `sisoda_aulas_idAluno`='$id_aluno'");
                    $row14= mysqli_fetch_array($resultado_id14);

                    $valor_total_aulas_aluno=$row14[0];

                    // CALCULAR O SALDO FINAL

                    $saldo_final_aluno=$valor_total_pag_aluno-$valor_total_aulas_aluno-$valor_total_mens_aluno-$valor_total_pend_aluno;

                    echo "$saldo_final_aluno";

                    // ATUALIZAR SALDO NA TABELA

                    $resultado_id15=mysqli_query($link,"UPDATE `sisoda_alunos` SET `sisOda_alunos_saldo`='$saldo_final_aluno' WHERE `sisOda_alunos_id`='$id_aluno'");

                    if ($resultado_id15) {
                        
                        echo "Saldo Atualizado";

                    }

?>