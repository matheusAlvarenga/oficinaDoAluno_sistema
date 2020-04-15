<html lang="pt-br">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="Creative - Bootstrap 3 Responsive Admin Template">
  <meta name="author" content="GeeksLabs">
  <meta name="keyword" content="Creative, Dashboard, Admin, Template, Theme, Bootstrap, Responsive, Retina, Minimal">
  <link rel="shortcut icon" href="img/favicon.png">
  <title>Oficina do Aluno - Login Aluno</title>
  <!-- Bootstrap CSS -->
  <link href="admin/css/bootstrap.min.css" rel="stylesheet">
  <!-- bootstrap theme -->
  <link href="admin/css/bootstrap-theme.css" rel="stylesheet">
  <!--external css-->
  <!-- font icon -->
  <link href="admin/css/elegant-icons-style.css" rel="stylesheet" />
  <link href="admin/css/font-awesome.css" rel="stylesheet" />
  <!-- Custom styles -->
  <link href="admin/css/style.css" rel="stylesheet">
  <link href="admin/css/style-responsive.css" rel="stylesheet" />
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
  <!-- HTML5 shim and Respond.js IE8 support of HTML5 -->
  <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->
  <!-- =======================================================
      Theme Name: NiceAdmin
      Theme URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
      Author: BootstrapMade
      Author URL: https://bootstrapmade.com
    ======================================================= -->
<?php

    if(isset($_COOKIE['tent_prof'])){
      if($_COOKIE['tent_prof'] == 0){
          echo "

          <script type='text/javascript'>
            alert('Esse computador está temporariamente bloqueado de tentar fazer login, devido a muitas tentativas de conexão incompletas.')
          </script>

          ";
      }
    }

?>
  <script>
    
    var check = function() {
  if (document.getElementById('password').value ==
    document.getElementById('confirm_password').value) {
    document.getElementById('message').style.color = 'green';
    document.getElementById('message').innerHTML = '';
  } else {
    document.getElementById('message').style.color = 'red';
    document.getElementById('message').innerHTML = 'As senhas não coincidem';
  }
}

  var validateMyForm = function() {

    if (document.getElementById('password').value ==
    document.getElementById('confirm_password').value) {
      return true;
    }else{
      return false;
    }

  }

  </script>
</head>

<body class="login-img3-body">
  <div s class="container">
    <form onsubmit="return validateMyForm();" style="margin-top: 90px" class="login-form" action="definir_login_aluno2.php" method="POST">
      <div class="login-wrap">
        <p class="login-img"><i class="icon_lock_alt"></i></p>
        <h3 style="margin-top: -5px;" align="center"></h3><br>
        <div>
          <h4 align="center">Seja Bem-Vindo(a), <?php

          require_once('db.class.php');

          $objDb = new db();
          $link = $objDb->conecta_mysql();

          $id=$_GET['id']; 
          $qaluno=mysqli_query($link, "SELECT `sisOda_alunos_nome` FROM `sisoda_alunos` WHERE `sisOda_alunos_id`='$id'");

          while($aluno = mysqli_fetch_array($qaluno, MYSQLI_ASSOC)){

            $nome=$aluno['sisOda_alunos_nome'];

            echo "$nome";

          }

          ?></h4>
          <h4 align="center">Utilize os campos Abaixo para definir sua senha</h4>
        </div>
        <br>
        <?php

        echo "<input type='hidden' name='id' value='$id'>";

        ?>
        <div class="input-group">
          <span class="input-group-addon"><i class="icon_key_alt"></i></span>
          <input type='password' onkeyup='check();' name='password' id='password' class='form-control' placeholder='Senha' required>
        </div>
        <div class="input-group">
          <span class="input-group-addon"><i class="icon_key_alt"></i></span>
          <input type='password' onkeyup='check();' name='confirm_password' id="confirm_password" class='form-control' placeholder='Confirmar Senha' required>
        </div>
        <p id="message"></p>
        <br>
        <button class='btn btn-primary btn-lg btn-block' type='submit'>Login</button>
      </div>
    </form>
    <div class="text-right">
    </div>
  </div>
</body>

</html>