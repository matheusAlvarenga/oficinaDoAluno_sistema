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
  <meta charset="utf-8">
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
  <th>D. Nasc</th>
  <th>Telefone</th>
  <th>Colégio</th>
  <th>Ano</th>
  <th>Endereço</th>

</tr>

<?php

  require_once('../db.class.php');

  $objDb = new db();
  $link = $objDb->conecta_mysql();

  $resultado_id=mysqli_query($link,"SELECT * FROM `sisoda_alunos`");

  if ($resultado_id) {
    
    while($dados_login = mysqli_fetch_array($resultado_id, MYSQLI_ASSOC)){

      $data=date_create($dados_login['sisOda_alunos_dataNascimento']);
      $data2=date_format($data, 'd/m/Y');

      $resultado_id2=mysqli_query($link,"SELECT * FROM `sisoda_ano` WHERE `sisoda_ano_id`='".$dados_login['sisOda_alunos_anoId']."'");

      while($dados_login2 = mysqli_fetch_array($resultado_id2, MYSQLI_ASSOC)){

        $ano=$dados_login2['sisoda_ano_nome'];

      }

      $endereco="CEP: ".$dados_login['sisOda_alunos_cep'].", ".$dados_login['sisOda_alunos_numero']." ".$dados_login['sisOda_alunos_complemento'];

      echo "

      <tr>
  
        <td>".$dados_login['sisOda_alunos_id']."</td>
        <td>".$dados_login['sisOda_alunos_nome']." ".$dados_login['sisOda_alunos_sobrenome']."</td>
        <td>".$dados_login['sisoda_alunos_email']."</td>
        <td>$data2</td>
        <td>".$dados_login['sisoda_alunos_telefone']."</td>
        <td>".$dados_login['sisOda_alunos_colegio']."</td>
        <td>$ano</td>
        <td>$endereco</td>

      </tr>

      ";

    }

  }

?>

</table>

</body>
</html>