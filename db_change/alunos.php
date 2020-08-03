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

    $q_cont=mysqli_query($link,"SELECT COUNT(*) FROM `aluno`");

    if ($q_cont) {
    	$a_cont= mysqli_fetch_array($q_cont);
		$n_de_alunos_antigo=$a_cont[0];
    }else{

    	echo "<script>alert('Não foi possivel encontrar seu banco de dados.')</script>";

    }


// CALCULAR A PORCENTAGEM DE CADA ALUNO

    $porc_aluno=100/$n_de_alunos_antigo;

    echo "<script>document.getElementById('qntd').innerHTML='0';</script>";
    echo "<script>document.getElementById('total').innerHTML='$n_de_alunos_antigo';</script>";

// WHILE DE CADA ALUNO

	$q_aluno=mysqli_query($link,"SELECT * FROM `aluno`");

	while($aluno = mysqli_fetch_array($q_aluno, MYSQLI_ASSOC)){

		// TRATAMENTO DE CADA VARIÁVEL NECESSÁRIA

		$sisOda_alunos_id=$aluno['id'];
		$nome = explode(" ",$aluno['nome']);
		$primeiro_nome = $nome[0];
		unset($nome[0]);
		$resto = implode(" ", $nome);
		$sisOda_alunos_nome=$primeiro_nome;

		if ($sisOda_alunos_nome == '') {
			$sisOda_alunos_nome = 'Não Informado';
		}

		$sisOda_alunos_sobrenome=$resto;

		if ($sisOda_alunos_sobrenome == '') {
			$sisOda_alunos_sobrenome = 'Não Informado';
		}

		$q_colegio=mysqli_query($link, "SELECT `nome` FROM `colegio` WHERE `id`='".$aluno['colegio_id']."'");

		if ($q_colegio) {
			while($colegio = mysqli_fetch_array($q_colegio, MYSQLI_ASSOC)){

			$sisOda_alunos_colegio=$colegio['nome'];

			}
		}else{
			echo "Não achei colegio";
		}

		if ($sisOda_alunos_colegio == '') {
			$sisOda_alunos_colegio = 'Não Informado';
		}

		$sisOda_alunos_anoId=$aluno['ano_id'];

		if ($sisOda_alunos_anoId == '') {
			$sisOda_alunos_anoId = '0';
		}

		$sisOda_alunos_rua=$aluno['endereco'];

		if ($sisOda_alunos_rua == '') {
			$sisOda_alunos_rua = 'Não Informado';
		}

		$sisOda_alunos_numero=$aluno['numero'];

		if ($sisOda_alunos_numero == '') {
			$sisOda_alunos_numero = '0';
		}

		$sisOda_alunos_complemento=$aluno['complemento'];

		if ($sisOda_alunos_complemento == '') {
			$sisOda_alunos_complemento = 'Não Informado';
		}

		$sisOda_alunos_bairro=$aluno['bairro'];


		if ($sisOda_alunos_bairro == '') {
			$sisOda_alunos_bairro = 'Não Informado';
		}

		$sisOda_alunos_cep=str_replace('-', '',$aluno['cep']);

		if ($sisOda_alunos_cep == '') {
			$sisOda_alunos_cep = '00000';
		}

		$celular=substr($aluno['celular'], 4);
		$sisoda_alunos_telefone=str_replace('-', '',$celular);

		if ($sisoda_alunos_telefone == '') {
			$sisoda_alunos_telefone = '00000000';
		}

		$sisOda_alunos_dataNascimento=$aluno['data_nascimento'];

		if ($sisOda_alunos_dataNascimento == '') {
			$sisOda_alunos_dataNascimento = '0000-00-00';
		}

		$sisOda_alunos_nomeRepUm=$aluno['nome_pai'];

		if ($sisOda_alunos_nomeRepUm == '') {
			$sisOda_alunos_nomeRepUm = 'Não Informado';
		}

		$celularpai=substr($aluno['celular_pai'], 4);

		$sisOda_alunos_telRepUm=str_replace('-', '',$celularpai);

		if ($sisOda_alunos_telRepUm == '') {
			$sisOda_alunos_telRepUm = '00000000';
		}

		$sisOda_alunos_emailRepUm=$aluno['email_pai'];

		if ($sisOda_alunos_emailRepUm == '') {
			$sisOda_alunos_emailRepUm = 'Não Informado';
		}

		$sisOda_alunos_nomeRepDois=$aluno['nome_mae'];

		if ($sisOda_alunos_nomeRepDois == '') {
			$sisOda_alunos_nomeRepDois = 'Não Informado';
		}

		$celularmae=substr($aluno['celular_mae'], 4);
		$sisOda_alunos_telRepDois=str_replace('-', '',$celularmae);

		if ($sisOda_alunos_telRepDois == '') {
			$sisOda_alunos_telRepDois = '00000000';
		}

		$sisOda_alunos_emailRepDois=$aluno['email_mae'];

		if ($sisOda_alunos_emailRepDois == '') {
			$sisOda_alunos_emailRepDois = 'Não Informado';
		}

		$sisOda_alunos_obs=$aluno['observacoes'];

		if ($sisOda_alunos_obs == '') {
			$sisOda_alunos_obs = 'Não Informado';
		}

		$sisOda_alunos_unidade=$aluno['unidade_id'];

		if ($sisOda_alunos_unidade == '') {
			$sisOda_alunos_unidade = '0';
		}

		if ($aluno['responsavel_financeiro'] == $sisOda_alunos_nomeRepDois) {
			$sisOda_alunos_financeiro='2';
		}else{
			$sisOda_alunos_financeiro='1';
		}

		$sisoda_alunos_cpf=preg_replace('/\D/', '', $aluno['doc_responsavel_financeiro']);

		if ($sisoda_alunos_cpf == '') {
			$sisoda_alunos_cpf = '000000';
		}

		// ADICIONAR NO BANCO DE DADOS NOVO

		$sql="INSERT INTO `sisoda_alunos_off`(`sisOda_alunos_id`,`sisOda_alunos_nome`, `sisOda_alunos_sobrenome`, `sisoda_alunos_email`, `sisOda_alunos_dataNascimento`, `sisOda_alunos_colegio`, `sisOda_alunos_anoId`, `sisOda_alunos_rua`, `sisOda_alunos_numero`, `sisOda_alunos_bairro`, `sisOda_alunos_cidade`, `sisOda_alunos_estado`, `sisOda_alunos_complemento`, `sisOda_alunos_cep`, `sisOda_alunos_nomeRepUm`, `sisOda_alunos_emailRepUm`, `sisOda_alunos_telRepUm`, `sisOda_alunos_nomeRepDois`, `sisOda_alunos_emailRepDois`, `sisOda_alunos_financeiro`, `sisoda_alunos_cpf`, `sisOda_alunos_telRepDois`, `sisOda_alunos_tipoDePlano`, `sisoda_alunos_mensal`, `sisOda_alunos_unidade`, `sisOda_alunos_ativo`, `sisOda_alunos_obs`, `sisoda_alunos_telefone`, `sisOda_alunos_saldo`) VALUES ('$sisOda_alunos_id','$sisOda_alunos_nome','$sisOda_alunos_sobrenome','Não Informado ($sisOda_alunos_id)','$sisOda_alunos_dataNascimento','$sisOda_alunos_colegio','$sisOda_alunos_anoId','$sisOda_alunos_rua','$sisOda_alunos_numero','$sisOda_alunos_bairro','Não Informado','NI','$sisOda_alunos_complemento','$sisOda_alunos_cep','$sisOda_alunos_nomeRepUm','$sisOda_alunos_emailRepUm','$sisOda_alunos_telRepUm','$sisOda_alunos_nomeRepDois','$sisOda_alunos_emailRepDois','$sisOda_alunos_financeiro','$sisoda_alunos_cpf','$sisOda_alunos_telRepDois','0.00','0.00','$sisOda_alunos_unidade','1','$sisOda_alunos_obs','$sisoda_alunos_telefone','0.00')";

			$resultado=mysqli_query($link,$sql);

			if ($resultado) {
				
				// ATUALIZAR PROGRESSO

				echo "<script>	var porc=document.getElementById('barra').style.width;
		    		porc = parseFloat(porc);
		    		porc=porc+$porc_aluno; 
		    		porc=porc+'%'; 
		    		document.getElementById('barra').style.width=porc;</script>";

			}else{
				echo "$sql <br><br>";
			}

	}

?>