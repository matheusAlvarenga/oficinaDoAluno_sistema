<?php

session_start();

$valor=$_POST['valor'];
$id=$_SESSION['id_aluno'];

require_once('../db.class.php');

$objDb = new db();
$link = $objDb->conecta_mysql();

$data=date('Y-m-d');
$hora=date('h:i');

$data2=$data.'T'.$hora;

$sql="INSERT INTO `sisoda_pagseguro`(`sisoda_pagseguro_data`, `sisoda_pagseguro_status`, `sisoda_pagseguro_valor`,`sisoda_pagseguro_idAluno`) VALUES ('$data2','1','$valor','$id')";

$resultado_id = mysqli_query($link, $sql);

                          if($resultado_id){

                            $last_id = $link->insert_id;
                            
                            echo $last_id;
                          }

?>