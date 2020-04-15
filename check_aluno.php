<?php 

	require_once('db.class.php');

	$user=$_POST['user'];
	$pass=$_POST['pass'];

	$sql = "SELECT * FROM sisoda_alunos WHERE sisOda_alunos_email = '$user' AND sisoda_alunos_senha = '$pass'";
    $objDb = new db();
    $link = $objDb->conecta_mysql();

    $resultado_id = mysqli_query($link, $sql);

    if($resultado_id){

    	$dados_login = mysqli_fetch_array($resultado_id);

        if(isset($dados_login['sisOda_alunos_id'])){

        	session_start();
        	$_SESSION['id_admin']=$dados_login['sisOda_alunos_id'];
        	$_SESSION['nome_admin']=$dados_login['sisOda_alunos_nome'];

        	header('Location: aluno/');
        }
        else
        {

        	if (isset($_COOKIE['tent_aluno'])) {
        		if ($_COOKIE['tent_aluno'] == 2) {
        			setcookie("tent_aluno", "1", time()+1800);
        		}
        		else{
        			setcookie("tent_aluno", "0", time()+1800);
        		}
        	}else{
        		setcookie("tent_aluno", "2", time()+1800);
        	}
        	
        	header('Location: login_errado_aluno.php');
        }

    }else{
        
        echo "Erro na execução da consulta, favor entrar em contato com o admin do site";

    }

?>