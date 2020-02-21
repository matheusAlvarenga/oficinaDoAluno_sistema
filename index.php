<html lang="pt-br">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="Creative - Bootstrap 3 Responsive Admin Template">
  <meta name="author" content="GeeksLabs">
  <meta name="keyword" content="Creative, Dashboard, Admin, Template, Theme, Bootstrap, Responsive, Retina, Minimal">
  <link rel="shortcut icon" href="img/favicon.png">
  <title>Oficina do Aluno - Login Admin</title>
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

    if(isset($_COOKIE['tent_admin'])){
      if($_COOKIE['tent_admin'] == 0){
          echo "

          <script type='text/javascript'>
            alert('Esse computador está temporariamente bloqueado de tentar fazer login, devido a muitas tentativas de conexão incompletas.')
          </script>

          ";
      }
    }

?>
</head>

<body class="login-img3-body">
  <div class="container">
    <form style="margin-top: 120px" class="login-form" action="check_admin.php" method="POST">
      <div class="login-wrap">
        <p class="login-img"><i class="icon_lock_alt"></i></p>
        <br><h3 style="margin-top: -5px;" align="center">Login Administrador</h3><br>
        <div class="input-group">
          <span class="input-group-addon"><i class="icon_profile"></i></span>
          <?php
              if(isset($_COOKIE['tent_admin'])){
                  if($_COOKIE['tent_admin'] == 0){
                      echo "<input type='text' name='user' class='form-control' placeholder='Usuário' disabled>";
                  }
                  else{
                      echo "<input type='text' name='user' class='form-control' placeholder='Usuário' required autofocus>";
                  }
              }else{
              echo "<input type='text' name='user' class='form-control' placeholder='Usuário'>";
            }
          ?>
        </div>
        <div class="input-group">
          <span class="input-group-addon"><i class="icon_key_alt"></i></span>
          <?php
              if(isset($_COOKIE['tent_admin'])){
                  if($_COOKIE['tent_admin'] == 0){
                      echo "<input type='password' name='pass' class='form-control' placeholder='Senha' disabled>";
                  }
                  else{
                      echo "<input type='password' name='pass' class='form-control' placeholder='Senha' required>";
                  }
              }else{
              echo "<input type='password' name='pass' class='form-control' placeholder='Senha'>";
            }
          ?>
        </div>
        <label class="checkbox">
          <span class="pull-right"> <a href="login-prof.php">Página do Professor<a></span>
        </label>
        <?php
              if(isset($_COOKIE['tent_admin'])){
                  if($_COOKIE['tent_admin'] == 0){
                      echo "<button class='btn btn-primary btn-lg btn-block' type='submit' disabled>Login</button>";
                  }
                  else{
                      echo "<button class='btn btn-primary btn-lg btn-block' type='submit'>Login</button>";
                  }
              }else{
              echo "<button class='btn btn-primary btn-lg btn-block' type='submit'>Login</button>";
            }
          ?>
      </div>
    </form>
    <div class="text-right">
    </div>
  </div>
</body>

</html>