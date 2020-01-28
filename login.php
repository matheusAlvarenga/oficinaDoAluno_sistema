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
    
$sql = "SELECT sisoda_adm_senha FROM sisoda_adm WHERE sisoda_adm_login = '$login'";

$resultado = mysqli_query($link, $sql);

if ($resultado) {
	$string = mysqli_fetch_assoc($resultado);
	$senha_admin = $string['sisoda_adm_senha'];
	if ($senha == $senha_admin) {
		echo "ADM";
	}
	else{
		echo "Senha errada";
	}
}

?>

</body>
</html>