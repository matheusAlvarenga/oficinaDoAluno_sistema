<html>

<head>
	<title>Cadastro de Alunos - Oficina do Aluno</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="css/style.css" rel="stylesheet">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	</script>
</head>

<body>
	<form action="_php/pesquisar_aluno.php" method="GET">
		<input type="text" name="q">
		<select name="tipo">
			<option value="1">NOME</option>
			<option value="2">SOBRENOME</option>
			<option value="3">COLÉGIO</option>
			<option value="4">CEP</option>
		</select>
		<input type="submit" value="pesquisar">
	</form>
</body>

</html>