<?php

    $id=$_GET['id'];

    require_once('../db.class.php');

    $sql="INSERT INTO `sisoda_professores` SELECT * FROM `sisoda_professores_off` WHERE `sisoda_professores_id`='$id'";

    $objDb = new db();
    $link = $objDb->conecta_mysql();

    $resultado_id = mysqli_query($link, $sql);

    if ($resultado_id) {

        $sql2 = "DELETE FROM `sisoda_professores_off` WHERE sisoda_professores_id='$id'";

        $resultado_id2 = mysqli_query($link, $sql2);

        if($resultado_id2){

            $resultado_id3=mysqli_query($link, "SELECT * FROM `sisoda_pagamentos_prof_off` WHERE `sisoda_pagamentos_prof_idAluno`='$id'")

            if ($resultado_id3) {
                
                while($dados_login3 = mysqli_fetch_array($resultado_id3, MYSQLI_ASSOC)){

                    $resultado_id4=mysqli_query($link, "INSERT INTO `sisoda_pagamentos_prof` SELECT * FROM `sisoda_pagamentos_prof_off` WHERE `sisoda_pagamentos_prof_id`='".$dados_login3['sisoda_pagamentos_prof_id']."'");

                    if ($resultado_id4) {
                        
                        $resultado_id5=mysqli_query($link, "DELETE FROM `sisoda_pagamentos_prof_off` WHERE sisoda_pagamentos_prof_id='".$dados_login3['sisoda_pagamentos_prof_id']."'");

                    }

                }

            }

            $resultado_id6=mysqli_query($link, "SELECT * FROM `sisoda_mensalidades_prof_off` WHERE `sisoda_mensalidades_prof_idAluno`='$value'")

            if ($resultado_id6) {
                
                while($dados_login6 = mysqli_fetch_array($resultado_id6, MYSQLI_ASSOC)){

                    $resultado_id7=mysqli_query($link, "INSERT INTO `sisoda_mensalidades_prof` SELECT * FROM `sisoda_mensalidades_prof_off` WHERE `sisoda_mensalidades_prof_id`='".$dados_login6['sisoda_mensalidades_prof_id']."'");

                    if ($resultado_id7) {
                        
                        $resultado_id8=mysqli_query($link, "DELETE FROM `sisoda_mensalidades_prof_off` WHERE sisoda_mensalidades_prof_id='".$dados_login6['sisoda_mensalidades_prof_id']."'");

                    }

                }

            }
            
            echo "

            <script>

                alert('Restaurado com sucesso.');
                window.location.href='editar_prof.php?id=$id&mail=1';

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