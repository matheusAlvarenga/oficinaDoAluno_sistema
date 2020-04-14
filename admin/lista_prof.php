<?php
  session_start();
  if(!isset($_SESSION['id_admin'])){
    header('Location: ../sem_login.html');
  }
?>
<html>
<head>
  <title>Oficina do Aluno - Dashboard Administrador</title>
  <script type="text/javascript">
    
    function printa(){
      document.getElementById('btn').style='display: none;';
      window.print();
      document.getElementById('btn').style='display: block; font-size: 20px; margin-bottom: 15px; padding: 10px 20px 10px 20px;';
    }

  </script>
</head>
<body>

<div align="center">
  <button id="btn" onclick="printa()" style="font-size: 20px; margin-bottom: 15px; padding: 10px 20px 10px 20px;">Imprimir</button>
</div>
  

<table width="100%" border="1">
  
<tr>
  
  <th>ID</th>
  <th>Nome</th>
  <th>E-mail</th>
  <th>Telefone</th>
  <th>Banco/TipoConta</th>
  <th>Agência</th>
  <th>Conta</th>
  <th>Endereço</th>

</tr>

<?php

  require_once('../db.class.php');

  $objDb = new db();
  $link = $objDb->conecta_mysql();

  $resultado_id=mysqli_query($link,"SELECT * FROM `sisoda_professores`");

  if ($resultado_id) {
    
    while($dados_login = mysqli_fetch_array($resultado_id, MYSQLI_ASSOC)){

      $endereco="CEP: ".$dados_login['sisoda_professores_cep'].", ".$dados_login['sisoda_professores_numero']." ".$dados_login['sisoda_professores_complemento'];

      echo "

      <tr>
  
        <td>".$dados_login['sisoda_professores_id']."</td>
        <td>".$dados_login['sisoda_professores_nome']." ".$dados_login['sisoda_professores_sobrenome']."</td>
        <td>".$dados_login['sisoda_professores_email']."</td>
        <td>".$dados_login['sisoda_professores_telefone']."</td>
        <td>".$dados_login['sisoda_professores_banco']." / ".$dados_login['sisoda_professores_tipoConta']."</td>
        <td>".$dados_login['sisoda_professores_agencia']."</td>
        <td>".$dados_login['sisoda_professores_conta']."</td>
        <td>$endereco</td>

      </tr>

      ";

    }

  }

?>

</table>

</body>
</html>