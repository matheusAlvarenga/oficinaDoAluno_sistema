<?php 

	session_start();

	if ($_GET['page'] == 1) {
		if (isset($_SESSION['login_admin'])) {
			include('_pages/dashboard.php');
		}
		else
		{
			include('_pages/acesso_negado.html');
		}
	}
	if ($_GET['page'] == 2) {
		include('_php/logout.php');
	}
	if ($_GET['page'] == 3) {
		include('_pages/cadastro_alunos.php');
	}
	if ($_GET['page'] == 4) {
		include('_pages/pesquisa_alunos.php');
	}
 ?>