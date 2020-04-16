<?php

	$nome=$_GET['nome'];

	require_once('../db.class.php');

	$sql = "INSERT INTO `sisoda_materias`(`sisoda_materias_nome`) VALUES ('$nome')";

    $objDb = new db();
    $link = $objDb->conecta_mysql();

    $resultado_id = mysqli_query($link, $sql);

    if ($resultado_id) {
    	echo "

    	<script>

    		alert('Adicionado com sucesso.');
    		window.location.href='materias.php';

    	</script>

    	";
    }else{
    	echo "Ocorreu um erro";
    }

?>