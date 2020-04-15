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

            $resultado_id3=mysqli_query($link, "SELECT * FROM `sisoda_pagamentos_off` WHERE `sisoda_pagamentos_idAluno`='$id'")

            if ($resultado_id3) {
                
                while($dados_login3 = mysqli_fetch_array($resultado_id3, MYSQLI_ASSOC)){

                    $resultado_id4=mysqli_query($link, "INSERT INTO `sisoda_pagamentos` SELECT * FROM `sisoda_pagamentos_off` WHERE `sisoda_pagamentos_id`='".$dados_login3['sisoda_pagamentos_id']."'");

                    if ($resultado_id4) {
                        
                        $resultado_id5=mysqli_query($link, "DELETE FROM `sisoda_pagamentos_off` WHERE sisoda_pagamentos_id='".$dados_login3['sisoda_pagamentos_id']."'");

                    }

                }

            }

            $resultado_id6=mysqli_query($link, "SELECT * FROM `sisoda_mensalidades_off` WHERE `sisoda_mensalidades_idAluno`='$id'")

            if ($resultado_id6) {
                
                while($dados_login6 = mysqli_fetch_array($resultado_id6, MYSQLI_ASSOC)){

                    $resultado_id7=mysqli_query($link, "INSERT INTO `sisoda_mensalidades` SELECT * FROM `sisoda_mensalidades_off` WHERE `sisoda_mensalidades_id`='".$dados_login6['sisoda_mensalidades_id']."'");

                    if ($resultado_id7) {
                        
                        $resultado_id8=mysqli_query($link, "DELETE FROM `sisoda_mensalidades_off` WHERE sisoda_mensalidades_id='".$dados_login6['sisoda_mensalidades_id']."'");

                    }

                }

            }

            $resultado_id9=mysqli_query($link, "SELECT * FROM `sisoda_mensalidades_off` WHERE `sisoda_mensalidades_idAluno`='$id'")

            if ($resultado_id9) {
                
                while($dados_login9 = mysqli_fetch_array($resultado_id9, MYSQLI_ASSOC)){

                    $resultado_id10=mysqli_query($link, "INSERT INTO `sisoda_mensalidades` SELECT * FROM `sisoda_mensalidades_off` WHERE `sisoda_mensalidades_id`='".$dados_login9['sisoda_mensalidades_id']."'");

                    if ($resultado_id10) {
                        
                        $resultado_id11=mysqli_query($link, "DELETE FROM `sisoda_mensalidades_off` WHERE sisoda_mensalidades_id='".$dados_login9['sisoda_mensalidades_id']."'");

                    }

                }

            }

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