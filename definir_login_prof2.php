<?php

	require_once('db.class.php');

	$objDb = new db();
    $link = $objDb->conecta_mysql();

    $id=$_POST['id'];
	$senha=$_POST['password'];
	$user=$_POST['user'];

	$query=mysqli_query($link, "SELECT COUNT(*) FROM `sisoda_professores` WHERE `sisoda_professores_login`='$user'");

	$row= mysqli_fetch_array($query);
	$cont=$row[0];

	if ($cont == 0) {
		$resultado_id=mysqli_query($link, "UPDATE `sisoda_professores` SET `sisoda_professores_senha`='$senha',`sisoda_professores_login`='$user' WHERE `sisoda_professores_id`='$id'");

		if ($resultado_id) {
			
			echo "<script>window.location.href='login-prof.php'</script>";

		}
	}else{

		echo "<script>alert('Esse usuário já está sendo utilizado'); window.history.back()</script>";

	}

	

?>