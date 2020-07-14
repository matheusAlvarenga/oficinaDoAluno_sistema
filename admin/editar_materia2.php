<?php


	$id=$_GET['id'];
	$nome=$_GET['nome'];

	require_once('../db.class.php');

	$sql = "UPDATE `sisoda_materias` SET `sisoda_materias_nome`='$nome' WHERE `sisoda_materias_id`='$id'";

    $objDb = new db();
    $link = $objDb->conecta_mysql();

    $resultado_id = mysqli_query($link, $sql);

    if ($resultado_id) {
    	echo "

    	<script>

    		alert('Editado com sucesso.');
    		window.location.href='materias.php';

    	</script>

    	";
    }else{
    	echo "Ocorreu um erro";
    }

?>