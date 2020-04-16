<?php

  require_once('../db.class.php');

  $objDb = new db();
  $link = $objDb->conecta_mysql();

  $nome=$_POST['nome'];
  $data=$_POST['data'];
  $valor=$_POST['valor'];

  $resultado_id=mysqli_query($link, "INSERT INTO `sisoda_despesas`(`sisoda_despesas_valor`, `sisoda_despesas_nome`, `sisoda_despesas_data`) VALUES ('$valor','$nome','$data')");

  if ($resultado_id) {
    
    echo "<script>alert('Despesa adicionada com sucesso.'); window.location.href='financeiro.php'</script>";

  }else{

    echo "<script>alert('Ocorreu um erro ao adicionar a despesa.'); window.location.href='financeiro.php'</script>";

  }

?>