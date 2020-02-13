<?php 

	$nome_aluno = $_POST['nome_aluno'];
	$sobrenome_aluno = $_POST['sobrenome_aluno'];
	$data_aluno = $_POST['data_aluno'];
	$colegio_aluno = $_POST['colegio_aluno'];
	$ano_aluno = $_POST['ano_aluno'];

	$nome_rep1 = $_POST['nome_rep1'];
	$email_rep1 = $_POST['email_rep1'];
	$tel_rep1 = $_POST['tel_rep1'];
	$nome_rep2 = $_POST['nome_rep2'];
	$email_rep2 = $_POST['email_rep2'];
	$tel_rep2 = $_POST['tel_rep2'];

	$cep = $_POST['cep'];
	$rua = $_POST['rua'];
	$numero = $_POST['numero'];
	$bairro = $_POST['bairro'];
	$cidade = $_POST['cidade'];
	$uf = $_POST['uf'];
	$complemento = $_POST['complemento'];

	$financeiro = $_POST['financeiro'];
	$plano = $_POST['plano'];
	$unidade = $_POST['unidade'];
	$obs = $_POST['obs'];

	require_once('../../db.class.php');

	$objDb = new db();
	$link = $objDb->conecta_mysql();

	 $sql = "INSERT INTO `sisoda_alunos` (`sisOda_alunos_nome`, `sisOda_alunos_sobrenome`, `sisOda_alunos_dataNascimento`, `sisOda_alunos_colegio`, `sisOda_alunos_anoId`, `sisOda_alunos_rua`, `sisOda_alunos_numero`, `sisOda_alunos_bairro`, `sisOda_alunos_cidade`, `sisOda_alunos_estado`, `sisOda_alunos_complemento`, `sisOda_alunos_cep`, `sisOda_alunos_nomeRepUm`, `sisOda_alunos_emailRepUm`, `sisOda_alunos_telRepUm`, `sisOda_alunos_nomeRepDois`, `sisOda_alunos_emailRepDois`, `sisOda_alunos_financeiro`, `sisOda_alunos_telRepDois`, `sisOda_alunos_tipoDePlano`, `sisOda_alunos_unidade`, `sisOda_alunos_ativo`, `sisOda_alunos_obs`) VALUES ('$nome_aluno', '$sobrenome_aluno', '$data_aluno', '$colegio_aluno', '$ano_aluno', '$rua', '$numero', '$bairro', '$cidade', '$uf', '$complemento', '$cep', '$nome_rep1', '$email_rep1', '$tel_rep1', '$nome_rep2', '$email_rep2', '$financeiro', '$tel_rep2', '$plano', '$unidade', '1', '$obs');";

	    $resultado_id = mysqli_query($link, $sql);

	    if($resultado_id){
	    	header('Location: index.php?page=3');
	    }
	    else
	    {
	    	echo "Ocorreu um Erro";
	    }

?>