<?php

	$id=$_GET['id'];

	require_once('../db.class.php');

	$sql="DELETE FROM `sisoda_aulas_off` WHERE sisoda_aulas_id='$id'";

    echo "$sql";

    $objDb = new db();
    $link = $objDb->conecta_mysql();

    $resultado_id = mysqli_query($link, $sql);

    if ($resultado_id) {
    	
        echo "<script>

        alert('A aula foi apagado com sucesso.');

        window.history.back();

        </script>";

    }

?>