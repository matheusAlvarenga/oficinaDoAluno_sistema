<?php

	require_once('db.class.php');

	$objDb = new db();
    $link = $objDb->conecta_mysql();

    $id=$_POST['id'];
	$senha=$_POST['password'];

	$resultado_id=mysqli_query($link, "UPDATE `sisoda_alunos` SET `sisoda_alunos_senha`='$senha' WHERE `sisOda_alunos_id`='$id'");

	if ($resultado_id) {
		
		echo "<script>window.location.href='login-aluno.php'</script>";

	}

?>