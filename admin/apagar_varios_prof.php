<?php

    $id=$_POST['aluno_selec'];

	require_once('../db.class.php');

    foreach ($id as $key => $value) {
        
        $sql="INSERT INTO `sisoda_professores_off` SELECT * FROM `sisoda_professores` WHERE `sisoda_professores_id`='$value'";

        $objDb = new db();
        $link = $objDb->conecta_mysql();

        $resultado_id = mysqli_query($link, $sql);

        if ($resultado_id) {

            $sql2 = "DELETE FROM `sisoda_professores` WHERE `sisoda_professores_id`='$value'";

            $resultado_id2 = mysqli_query($link, $sql2);

            if($resultado_id2){
                echo "

            <script>

                alert('Apagados com sucesso.');
                window.history.back();

            </script>

            ";
            }
            else{
                echo "

                <script>

                    alert('Erro');
                    window.history.back();

                </script>

            ";
            }

        }else{
            echo "

                <script>

                    alert('Erro');
                    window.history.back();

                </script>

            ";
        }

    }

	

?>