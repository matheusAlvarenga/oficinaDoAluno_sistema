<?php

	require_once('../db.class.php');

	$id_aluno=$_GET['aluno_selec'];
	$valor=$_GET['valor_aluno'];
	$comen=$_GET['comen_aluno'];
	$saldo=$_GET[$id_aluno];

        $hoje=date("Y-m-d");

	
	// ADICIONAR A PENDENCIA A TABELA DE PENDENCIAS

	$sql="INSERT INTO `sisoda_pendencias`(`sisoda_pendencias_idAluno`, `sisoda_pendencias_valor`, `sisoda_pendencias_comentario`, `sisoda_pendencias_paga`,`sisoda_pendencias_data`) VALUES ('$id_aluno','$valor','$comen','0','$hoje')";
	$objDb = new db();
        $link = $objDb->conecta_mysql();

        $resultado_id = mysqli_query($link, $sql);

        if($resultado_id){

        	echo "<h4 align='center'>Pendência Adicionada</h4>";

        }

	// CHECAR SE ELA PODE SER PAGA AGORA

        if ($saldo > $valor) {
        	
        	$pend_id = $link->insert_id;

        	$sql2="UPDATE `sisoda_pendencias` SET `sisoda_pendencias_paga`='1' WHERE `sisoda_pendencias_id`='$pend_id'";

        	$resultado_id2 = mysqli_query($link, $sql2);

        	if($resultado_id2){

        		echo "<h4 align='center'>Pendência Alterada</h4>";

        	}
        }

	// ATUALIZAR SALDO COM A SOMA DAS AULAS, PENDENCIAS E PAGAMENTOS

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
        			alert('Pendência alterada com sucesso');
        			window.history.back();
        		</script>

        	";

        }
        

?>