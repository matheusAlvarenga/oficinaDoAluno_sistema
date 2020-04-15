<?php

	$id=$_GET['id'];

	require_once('../db.class.php');

	$sql="DELETE FROM `sisoda_professores_off` WHERE sisoda_professores_id='$id'";

    $objDb = new db();
    $link = $objDb->conecta_mysql();

    $resultado_id = mysqli_query($link, $sql);

    if ($resultado_id) {
    	
        echo "<script>

        alert('O professor foi apagado com sucesso.');

        window.history.back();

        </script>";

    }

?>