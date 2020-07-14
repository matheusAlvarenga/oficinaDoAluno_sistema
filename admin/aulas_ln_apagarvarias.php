<?php

    $id=$_POST['aluno_selec'];

	require_once('../db.class.php');

if ($_POST['restaurar']) {
    foreach ($id as $key => $value) {

        $sql="INSERT INTO `sisoda_aulas` SELECT * FROM `sisoda_aulas_off` WHERE `sisoda_aulas_id`='$value'";;

    $objDb = new db();
    $link = $objDb->conecta_mysql();

    $resultado_id = mysqli_query($link, $sql);

    if ($resultado_id) {

        $sql2 = "DELETE FROM `sisoda_aulas_off` WHERE sisoda_aulas_id='$value'";

        $resultado_id2 = mysqli_query($link, $sql2);

        if($resultado_id2){
            
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

    echo "

            <script>

                alert('Restaurado com sucesso.');
                window.history.back();

            </script>

            ";
}
elseif ($_POST['apagar']) {
    foreach ($id as $key => $value) {
        
        $sql="DELETE FROM `sisoda_aulas_off` WHERE `sisOda_aulas_id`='$value'";

        $objDb = new db();
        $link = $objDb->conecta_mysql();

        $resultado_id = mysqli_query($link, $sql);

        if ($resultado_id) {

           echo "Aula Apagado com Sucesso<br>";

        }else{
            echo "Ocorreu um erro<br>";
        }

    }

    echo "<script>

        alert('As Aulas foram apagados com sucesso.');

        window.history.back();

        </script>";
}

    

	

?>