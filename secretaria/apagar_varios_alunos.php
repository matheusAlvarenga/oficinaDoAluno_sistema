<?php

    $id=$_POST['aluno_selec'];

	require_once('../db.class.php');

    foreach ($id as $key => $value) {
        
        $sql="INSERT INTO `sisoda_alunos_off` SELECT * FROM `sisoda_alunos` WHERE `sisOda_alunos_id`='$value'";

        echo "$sql<br>";

        $objDb = new db();
        $link = $objDb->conecta_mysql();

        $resultado_id = mysqli_query($link, $sql);

        if ($resultado_id) {

            $sql2 = "DELETE FROM `sisoda_alunos` WHERE `sisOda_alunos_id`='$value'";

            echo "$sql2 <br>";

            $resultado_id2 = mysqli_query($link, $sql2);

            if($resultado_id2){
                echo "Deu certo<br>";
            }
            else{
                echo "Deu errado<br>";
            }

        }else{
            echo "Ocorreu um erro<br>";
        }

    }

	echo "<script>

                alert('Não Listados com sucesso.');
                window.history.back();

            </script>";

?>