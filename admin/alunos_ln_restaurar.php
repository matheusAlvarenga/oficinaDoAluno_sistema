<?php

    $id=$_GET['id'];

    require_once('../db.class.php');

    $sql="INSERT INTO `sisoda_alunos` SELECT * FROM `sisoda_alunos_off` WHERE `sisOda_alunos_id`='$id'";

    echo "$sql";

    $objDb = new db();
    $link = $objDb->conecta_mysql();

    $resultado_id = mysqli_query($link, $sql);

    if ($resultado_id) {

        $sql2 = "DELETE FROM `sisoda_alunos_off` WHERE sisOda_alunos_id='$id'";

        $resultado_id2 = mysqli_query($link, $sql2);

        if($resultado_id2){
            echo "

            <script>

                alert('Restaurado com sucesso.');
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

?>