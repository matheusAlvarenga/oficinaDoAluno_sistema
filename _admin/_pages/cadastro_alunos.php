<html>
<head>
	<title>Cadastro de Alunos - Oficina do Aluno</title>
	<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="css/style.css" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
     <script type="text/javascript" >
    
    function limpa_formulário_cep() {
            //Limpa valores do formulário de cep.
            document.getElementById('rua').value=("");
            document.getElementById('bairro').value=("");
            document.getElementById('cidade').value=("");
            document.getElementById('uf').value=("");
            document.getElementById('ibge').value=("");
    }

    function meu_callback(conteudo) {
        if (!("erro" in conteudo)) {
            //Atualiza os campos com os valores.
            document.getElementById('rua').value=(conteudo.logradouro);
            document.getElementById('bairro').value=(conteudo.bairro);
            document.getElementById('cidade').value=(conteudo.localidade);
            document.getElementById('uf').value=(conteudo.uf);
            document.getElementById('ibge').value=(conteudo.ibge);
        } //end if.
        else {
            //CEP não Encontrado.
            limpa_formulário_cep();
            alert("CEP não encontrado.");
        }
    }
        
    function pesquisacep(valor) {

        //Nova variável "cep" somente com dígitos.
        var cep = valor.replace(/\D/g, '');

        //Verifica se campo cep possui valor informado.
        if (cep != "") {

            //Expressão regular para validar o CEP.
            var validacep = /^[0-9]{8}$/;

            //Valida o formato do CEP.
            if(validacep.test(cep)) {

                //Preenche os campos com "..." enquanto consulta webservice.
                document.getElementById('rua').value="...";
                document.getElementById('bairro').value="...";
                document.getElementById('cidade').value="...";
                document.getElementById('uf').value="...";

                //Cria um elemento javascript.
                var script = document.createElement('script');

                //Sincroniza com o callback.
                script.src = 'https://viacep.com.br/ws/'+ cep + '/json/?callback=meu_callback';

                //Insere script no documento e carrega o conteúdo.
                document.body.appendChild(script);

            } //end if.
            else {
                //cep é inválido.
                limpa_formulário_cep();
                alert("Formato de CEP inválido.");
            }
        } //end if.
        else {
            //cep sem valor, limpa formulário.
            limpa_formulário_cep();
        }
    };

    </script>
</head>
<body>
	<h1>Cadastro de Aluno</h1>
	<form action="_php/cadastrar_aluno.php" method="POST">
		<label>Nome</label>
		<input type="text" name="nome_aluno">
		<label>Sobrenome</label>
		<input type="text" name="sobrenome_aluno">
		<label>Data de Nascimento</label>
		<input type="date" name="data_aluno"><br>
		<label>Colégio</label>
		<input type="text" name="colegio_aluno">
		<label>Ano</label>
		<select name="ano_aluno">
			<option value="1">1</option>
            <option value="2">2</option>
		</select><br>
		<label>Nome Responsável 1</label>
		<input type="text" name="nome_rep1">
		<label>Email Responsável 1</label>
		<input type="text" name="email_rep1">
		<label>Telefone Responsável 1</label>
		<input type="text" name="tel_rep1">
		<label>Nome Responsável 2</label>
		<input type="text" name="nome_rep2">
		<label>Email Responsável 2</label>
		<input type="text" name="email_rep2">
		<label>Telefone Responsável 2</label>
		<input type="text" name="tel_rep2">
		<label>Cep:
        <input name="cep" type="text" id="cep" value="" size="10" maxlength="9"
               onblur="pesquisacep(this.value);" /></label><br />
        <label>Rua:
        <input name="rua" type="text" id="rua" size="60" /></label>
        <label>Número:
        <input name="numero" type="text" id="num" size="10" /></label><br />
        <label>Bairro:
        <input name="bairro" type="text" id="bairro" size="40" /></label><br />
        <label>Cidade:
        <input name="cidade" type="text" id="cidade" size="40" /></label><br />
        <label>Estado:
        <input name="uf" type="text" id="uf" size="2" /></label><br />
        <label>Complemento:
        <input name="complemento" type="text" size="40" /></label><br />
        <label>Responsável Financeiro</label>
		<select name="financeiro">
			<option value="1">1</option>
            <option value="2">2</option>
		</select><br>
		<label>Tipo de Plano</label>
		<select name="plano">
            <option value="1">1</option>
            <option value="2">2</option>
		</select><br>
		<label>Unidade</label>
		<select name="unidade">
			<option value="1">1</option>
            <option value="2">2</option>
		</select><br>
		<label>Obs:
        <input name="obs" type="text" size="40" /></label><br />
        <input type="submit" value="ENVIA ESSA MERDA">
	</form>

</body>
</html>