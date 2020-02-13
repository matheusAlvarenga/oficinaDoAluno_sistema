<html>
<head>
	<title></title>
</head>
<body style="background: url('_imagens/loading.gif') center no-repeat; background-color: #4b525d;">
<h1 align="center">Carregando...</h1>

<?php 

$login = $_POST['login'];
$senha = $_POST['senha'];

require_once('db.class.php');

$objDb = new db();
$link = $objDb->conecta_mysql();

 $sql = "SELECT * FROM sisoda_adm WHERE sisoda_adm_login = '$login' AND sisoda_adm_senha = '$senha'";

    $resultado_id = mysqli_query($link, $sql);

    if($resultado_id){

        $dados_usuario = mysqli_fetch_array($resultado_id);

        if(isset($dados_usuario['sisoda_adm_login'])){

            session_start();

            $_SESSION['login_admin'] = $login;
            $_SESSION['senha_admin'] = $senha;

            header('Location: _admin/?page=1');

        }else{

            header('Location: index.php?erro=1');

        }

    }else{
        
        echo "Erro na execução da consulta, favor entrar em contato com o admin do site";
    }
?>

</body>
</html>