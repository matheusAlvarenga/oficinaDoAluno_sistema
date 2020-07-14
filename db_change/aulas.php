<html>
<head>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>

	<h1 align="center"><span id="qntd"></span>/<span id="total"></span><h1>

<div class="container">
  <div class="progress">
    <div class="progress-bar" id="barra" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width:0%">
      <span id="texto" class="sr-only">0% Complete</span>
    </div>
  </div>
</div>

</body>
</html>

<?php

	require_once('../db.class.php');

	$objDb = new db();
    $link = $objDb->conecta_mysql();

// FAZER CONTAGEM DE TODOS OS ALUNOS DO DB ANTIGO

    $q_cont=mysqli_query($link,"SELECT COUNT(*) FROM `aula_particular` WHERE `data_inicio`>'2019/06/01'");

    if ($q_cont) {
    	$a_cont= mysqli_fetch_array($q_cont);
		$n_de_aulas_antigo=$a_cont[0];
    }else{

    	echo "<script>alert('Não foi possivel encontrar seu banco de dados.')</script>";

    }


// CALCULAR A PORCENTAGEM DE CADA ALUNO

    $porc_aulas=100/$n_de_aulas_antigo;

    echo "<script>document.getElementById('qntd').innerHTML='0';</script>";
    echo "<script>document.getElementById('total').innerHTML='$n_de_aulas_antigo';</script>";

// WHILE DE CADA ALUNO

	$q_aulas=mysqli_query($link,"SELECT * FROM `aula_particular` WHERE `data_inicio`>'2019/06/01'");

	while($aula = mysqli_fetch_array($q_aulas, MYSQLI_ASSOC)){

		// TRATAMENTO DE CADA VARIÁVEL NECESSÁRIA

		$sisoda_aulas_id=$aula['id'];
		$sisoda_aulas_idAluno=$aula['aluno_id'];
		$sisoda_aulas_idProfessor=$aula['professor_id'];
		$sisoda_aulas_data=$aula['data_inicio'];
		$sisoda_aulas_comentarioAluno=NULL;
		$sisoda_aulas_comentarioProfessor=NULL;
		$sisoda_aulas_materia=$aula['materia_id'];
		$sisoda_aulas_topicos='Não Informado';
		$sisoda_aulas_unidade=$aula['unidade_id'];
		$sisoda_aulas_paga='1';
		$sisoda_aulas_recebida='1';
		$sisoda_aulas_valorProfessor='0.00';
		$sisoda_aulas_valorAluno='0.00';

		// ADICIONAR NO BANCO DE DADOS NOVO

		$sql="INSERT INTO `sisoda_aulas_off`(`sisoda_aulas_id`, `sisoda_aulas_idAluno`, `sisoda_aulas_idProfessor`, `sisoda_aulas_data`, `sisoda_aulas_comentarioAluno`, `sisoda_aulas_comentarioProfessor`, `sisoda_aulas_materia`, `sisoda_aulas_topicos`, `sisoda_aulas_unidade`, `sisoda_aulas_paga`, `sisoda_aulas_recebida`, `sisoda_aulas_valorProfessor`, `sisoda_aulas_valorAluno`) VALUES ('$sisoda_aulas_id','$sisoda_aulas_idAluno','$sisoda_aulas_idProfessor','$sisoda_aulas_data','$sisoda_aulas_comentarioAluno','$sisoda_aulas_comentarioProfessor','$sisoda_aulas_materia','$sisoda_aulas_topicos','$sisoda_aulas_unidade','$sisoda_aulas_paga','$sisoda_aulas_recebida','$sisoda_aulas_valorProfessor','$sisoda_aulas_valorAluno')";

			
			$resultado=mysqli_query($link, $sql);

			
			if ($resultado) {
				
				// ATUALIZAR PROGRESSO

				echo "<script>	var porc=document.getElementById('barra').style.width;
		    		porc = parseFloat(porc);
		    		porc=porc+$porc_aulas; 
		    		porc=porc+'%'; 
		    		document.getElementById('barra').style.width=porc;</script>";

			}else{
				echo "$sql <br><br>";
			}

	}

?>