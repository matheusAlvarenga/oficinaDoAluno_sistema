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

 $sql = "SELECT * FROM sisoda_professores WHERE sisoda_professores_login = '$login' AND sisoda_professores_senha = '$senha'";

    $resultado_id = mysqli_query($link, $sql);

    if($resultado_id){

        $dados_usuario = mysqli_fetch_array($resultado_id);

        if(isset($dados_usuario['sisoda_professores_login'])){

            header('Location: _professor/');

        }else{

            header('Location: professor.php?erro=1');

        }

    }else{
        
        echo "Erro na execução da consulta, favor entrar em contato com o admin do site";
    }
?>
</body>

</html>