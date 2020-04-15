<?php

	$id=$_GET['id'];

	require_once('../db.class.php');

	$sql="DELETE FROM `sisoda_alunos_off` WHERE sisOda_alunos_id='$id'";

    echo "$sql";

    $objDb = new db();
    $link = $objDb->conecta_mysql();

    $resultado_id = mysqli_query($link, $sql);

    if ($resultado_id) {
    	
        echo "<script>

        alert('O Aluno foi apagado com sucesso.');

        window.history.back();

        </script>";

    }

?>