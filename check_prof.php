<?php 

	require_once('db.class.php');

	$user=$_POST['user'];
	$pass=$_POST['pass'];

	$sql = "SELECT * FROM sisoda_professores WHERE sisoda_professores_login = '$user' AND sisoda_professores_senha = '$pass'";
    $objDb = new db();
    $link = $objDb->conecta_mysql();

    $resultado_id = mysqli_query($link, $sql);

    if($resultado_id){

    	$dados_login = mysqli_fetch_array($resultado_id);

        if(isset($dados_login['sisoda_professores_id'])){

        	session_start();
        	$_SESSION['id_prof']=$dados_login['sisoda_professores_id'];
        	$_SESSION['nome_prof']=$dados_login['sisoda_professores_nome'];

        	header('Location: professor/');
        }
        else
        {

        	if (isset($_COOKIE['tent_prof'])) {
        		if ($_COOKIE['tent_prof'] == 2) {
        			setcookie("tent_prof", "1", time()+1800);
        		}
        		else{
        			setcookie("tent_prof", "0", time()+1800);
        		}
        	}else{
        		setcookie("tent_prof", "2", time()+1800);
        	}
        	
        	header('Location: login_errado.php');
        }

    }else{
        
        echo "Erro na execução da consulta, favor entrar em contato com o admin do site";

    }

?>