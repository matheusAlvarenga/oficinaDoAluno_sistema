<?php

    $id=$_POST['aluno_selec'];

    require_once('../db.class.php');

if ($_POST['restaurar']) {
    foreach ($id as $key => $value) {

        $sql="INSERT INTO `sisoda_professores` SELECT * FROM `sisoda_professores_off` WHERE `sisoda_professores_id`='$value'";


    $objDb = new db();
    $link = $objDb->conecta_mysql();

    $resultado_id = mysqli_query($link, $sql);

    if ($resultado_id) {

        $sql2 = "DELETE FROM `sisoda_professores_off` WHERE sisoda_professores_id='$value'";

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
        
        $sql="DELETE FROM `sisoda_professores_off` WHERE `sisoda_professores_id`='$value'";

        $objDb = new db();
        $link = $objDb->conecta_mysql();

        $resultado_id = mysqli_query($link, $sql);

        if ($resultado_id) {

           echo "Professor Apagado com Sucesso<br>";

        }else{
            echo "Ocorreu um erro<br>";
        }

    }

    echo "<script>

        alert('Os Professores foram apagados com sucesso.');

        window.history.back();

        </script>";
}

    

    

?>