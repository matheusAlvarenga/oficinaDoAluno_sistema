<?php

	$id=$_POST['id'];
	$feed=$_POST['feed'];
	

	require_once('../db.class.php');

	$objDb = new db();
    $link = $objDb->conecta_mysql();

    $resultado_id=mysqli_query($link, "UPDATE `sisoda_aulas` SET `sisoda_aulas_comentarioProfessor`='$feed' WHERE `sisoda_aulas_id`='$id'");

    if ($resultado_id) {
    	
    	echo "<script>window.location.href='aula_ind.php?id=$id'</script>";

    }

?>