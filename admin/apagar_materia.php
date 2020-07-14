<?php

	$id=$_GET['id'];

	require_once('../db.class.php');

	$sql = "DELETE FROM `sisoda_materias` WHERE sisoda_materias_id=$id";

    $objDb = new db();
    $link = $objDb->conecta_mysql();

    $resultado_id = mysqli_query($link, $sql);

    if ($resultado_id) {
    	echo "

    	<script>

    		alert('Apagado com sucesso.');
    		window.location.href='materias.php';

    	</script>

    	";
    }else{
    	echo "Ocorreu um erro";
    }

?>