<?php 

	require_once('db.class.php');

	$user=$_POST['user'];
	$pass=$_POST['pass'];

	$sql = "SELECT * FROM sisoda_adm WHERE sisoda_adm_login = '$user' AND sisoda_adm_senha = '$pass'";
    $objDb = new db();
    $link = $objDb->conecta_mysql();

    $resultado_id = mysqli_query($link, $sql);

    if($resultado_id){

    	$dados_login = mysqli_fetch_array($resultado_id);

        if(isset($dados_login['sisoda_adm_id'])){

        	session_start();
        	$_SESSION['id_admin']=$dados_login['sisoda_adm_id'];
        	$_SESSION['nome_admin']=$dados_login['sisoda_adm_nome'];

        	header('Location: admin/');
        }
        else
        {

            $resultado_id2=mysqli_query($link, "SELECT * FROM sisoda_sec WHERE sisoda_sec_login = '$user' AND sisoda_sec_senha = '$pass'");

            if ($resultado_id2) {
                
                $dados_login2 = mysqli_fetch_array($resultado_id2);

                if(isset($dados_login2['sisoda_sec_id'])){

                    session_start();
                    $_SESSION['id_sec']=$dados_login2['sisoda_sec_id'];
                    $_SESSION['nome_sec']=$dados_login2['sisoda_sec_nome'];

                    header('Location: secretaria/');

            }else{

                if (isset($_COOKIE['tent_admin'])) {
                    if ($_COOKIE['tent_admin'] == 2) {
                        setcookie("tent_admin", "1", time()+1800);
                    }
                    else{
                        setcookie("tent_admin", "0", time()+1800);
                    }
                }else{
                    setcookie("tent_admin", "2", time()+1800);
                }
                
                header('Location: login_errado_admin.php');

            }
        }

    }

    }else{
        
        echo "Erro na execução da consulta, favor entrar em contato com o admin do site";

    }

?>