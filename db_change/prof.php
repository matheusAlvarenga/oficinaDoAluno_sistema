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

    $q_cont=mysqli_query($link,"SELECT COUNT(*) FROM `professor`");

    if ($q_cont) {
    	$p_cont= mysqli_fetch_array($q_cont);
		$n_de_prof_antigo=$p_cont[0];
    }else{

    	echo "<script>alert('Não foi possivel encontrar seu banco de dados.')</script>";

    }


// CALCULAR A PORCENTAGEM DE CADA ALUNO

    $porc_prof=100/$n_de_prof_antigo;

    echo "<script>document.getElementById('qntd').innerHTML='0';</script>";
    echo "<script>document.getElementById('total').innerHTML='$n_de_prof_antigo';</script>";

// WHILE DE CADA ALUNO

	$q_prof=mysqli_query($link,"SELECT * FROM `professor`");

	while($prof = mysqli_fetch_array($q_prof, MYSQLI_ASSOC)){

		// TRATAMENTO DE CADA VARIÁVEL NECESSÁRIA

		$sisoda_professores_id=$prof['id'];
		$nome = explode(" ",$prof['nome']);
		$primeiro_nome = $nome[0];
		unset($nome[0]);
		$resto = implode(" ", $nome);
		$sisoda_professores_nome=$primeiro_nome;

		if ($sisoda_professores_nome == '') {
			$sisoda_professores_nome = 'Não Informado';
		}

		$sisoda_professores_sobrenome=$resto;

		if ($sisoda_professores_sobrenome == '') {
			$sisoda_professores_sobrenome = 'Não Informado';
		}

		$sisoda_professores_cpf=preg_replace('/\D/', '', $prof['cpf']);

		if ($sisoda_professores_cpf == '') {
			$sisoda_professores_cpf = '000000000';
		}

		$sisoda_professores_data=$prof['data_nascimento'];

		if ($sisoda_professores_data == '') {
			$sisoda_professores_data = '0000/00/00';
		}

		$sisoda_professores_rua=$prof['endereco'];

		if ($sisoda_professores_rua == '') {
			$sisoda_professores_rua = 'Não Informado';
		}

		$sisoda_professores_numero=$prof['numero'];

		if ($sisoda_professores_numero == '') {
			$sisoda_professores_numero = '0';
		}

		$sisoda_professores_complemento=$prof['complemento'];

		if ($sisoda_professores_complemento == '') {
			$sisoda_professores_complemento = 'Não Informado';
		}

		$sisoda_professores_bairro=$prof['bairro'];

		if ($sisoda_professores_bairro == '') {
			$sisoda_professores_bairro = 'Não Informado';
		}

		$sisoda_professores_cep=str_replace('-', '',$prof['cep']);

		if ($sisoda_professores_cep == '') {
			$sisoda_professores_cep = '000000';
		}

		$sisoda_professores_email=$prof['email'];

		if ($sisoda_professores_email == '') {
			$sisoda_professores_email = 'Não Informado';
		}


		$celular=substr($prof['celular'], 4);
		$sisoda_professores_telefone=str_replace('-', '',$celular);

		if ($sisoda_professores_telefone == '') {
			$sisoda_professores_telefone = '00000000';
		}

		$sisoda_professores_banco=$prof['banco'];

		if ($sisoda_professores_banco == '') {
			$sisoda_professores_banco = 'Não Informado';
		}

		$sisoda_professores_agencia=str_replace('-', '',$prof['agencia']);

		if ($sisoda_professores_agencia == '') {
			$sisoda_professores_agencia = '00000';
		}

		$sisoda_professores_conta=$prof['conta'];

		if ($sisoda_professores_conta == '') {
			$sisoda_professores_conta = '0000000';
		}

		$sisoda_professores_obs=$prof['observacoes'];

		if ($sisoda_professores_obs == '') {
			$sisoda_professores_obs = 'Não Informado';
		}

		$sisoda_professores_unidade=$prof['unidade_id'];

		if ($sisoda_professores_unidade == '') {
			$sisoda_professores_unidade = '1';
		}


		// ADICIONAR NO BANCO DE DADOS NOVO

		$sql="INSERT INTO `sisoda_professores_off`(`sisoda_professores_id`, `sisoda_professores_nome`, `sisoda_professores_sobrenome`, `sisoda_professores_data`, `sisoda_professores_email`, `sisoda_professores_rua`, `sisoda_professores_numero`, `sisoda_professores_bairro`, `sisoda_professores_cidade`, `sisoda_professores_estado`, `sisoda_professores_complemento`, `sisoda_professores_cep`, `sisoda_professores_banco`, `sisoda_professores_tipoConta`, `sisoda_professores_agencia`, `sisoda_professores_conta`, `sisoda_professores_cpf`, `sisoda_professores_login`, `sisoda_professores_senha`, `sisoda_professores_ativo`, `sisoda_professores_telefone`, `sisoda_professores_obs`, `sisoda_professores_foto`, `sisoda_professores_unidade`, `sisoda_professores_mensal`, `sisoda_professores_valor`, `sisoda_professores_saldo`) VALUES ('$sisoda_professores_id','$sisoda_professores_nome','$sisoda_professores_sobrenome','$sisoda_professores_data','$sisoda_professores_email','$sisoda_professores_rua','$sisoda_professores_numero','$sisoda_professores_bairro','Não Informado','NI','$sisoda_professores_complemento','$sisoda_professores_cep', '$sisoda_professores_banco','Não Informado','$sisoda_professores_agencia','$sisoda_professores_conta','$sisoda_professores_cpf',NULL,NULL,'1','$sisoda_professores_telefone','$sisoda_professores_obs',NULL,'$sisoda_professores_unidade','0.00','0.00','0.00')";

			
			$resultado=mysqli_query($link, $sql);

			
			if ($resultado) {
				
				// ATUALIZAR PROGRESSO

				echo "<script>	var porc=document.getElementById('barra').style.width;
		    		porc = parseFloat(porc);
		    		porc=porc+$porc_prof; 
		    		porc=porc+'%'; 
		    		document.getElementById('barra').style.width=porc;</script>";

			}else{
				echo "$sql <br><br>";
			}

	}

?>