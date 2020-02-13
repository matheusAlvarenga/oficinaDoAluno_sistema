<?php 

	$q = $_GET['q'];
	$tipo = $_GET['tipo'];

	require_once('../../db.class.php');

	$objDb = new db();
	$link = $objDb->conecta_mysql();

	if ($tipo == 1) {
		$sql = "SELECT * FROM sisoda_alunos WHERE sisOda_alunos_nome LIKE '".$q."%'";
	}
	if ($tipo == 2) {
		$sql = "SELECT * FROM sisoda_alunos WHERE sisOda_alunos_sobrenome LIKE '".$q."%'";
	}
	if ($tipo == 3) {
		$sql = "SELECT * FROM sisoda_alunos WHERE sisOda_alunos_colegio LIKE '".$q."%'";
	}
	if ($tipo == 4) {
		$sql = "SELECT * FROM sisoda_alunos WHERE sisOda_alunos_cep LIKE '".$q."%'";
	}
	    $resultado_id = mysqli_query($link, $sql);

	    if($resultado_id){
	    	echo "Deu certo";
	    }
	    else
	    {
	    	echo "Ocorreu um Erro";
	    	echo "$sql";
	    }

?>