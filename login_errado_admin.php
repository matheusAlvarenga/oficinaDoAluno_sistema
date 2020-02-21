<html lang="pt-br">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="Creative - Bootstrap 3 Responsive Admin Template">
  <meta name="author" content="GeeksLabs">
  <meta name="keyword" content="Creative, Dashboard, Admin, Template, Theme, Bootstrap, Responsive, Retina, Minimal">
  <link rel="shortcut icon" href="img/favicon.png">
  <title>Oficina do Aluno - Login Administrador</title>
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
</head>

<body class="login-img3-body">
  <div s class="container">
    <form style="margin-top: 120px" class="login-form" action="check_prof.php" method="POST">
      <div class="login-wrap">
        <p class="login-img"><i class="icon_lock_alt"></i></p>
        <h3 style="margin-top: -5px;" align="center">Login Administrador</h3><br>
        <?php
              $tent=$_COOKIE['tent_admin'];

              if($tent > 0){
                echo "<p style='color: black;'>O Login que você digitou não foi encontrado em nosso sistema, por favor tente novamente. <br> Você tem mais $tent tentativas.</p><br><br>
                <a href='index.php'><button class='btn btn-primary btn-lg btn-block' type='button'>Tentar Novamente</button></a>";
              }
              else
              {
                echo "<p style='color: black;'>Suas chances acabaram, por favor aguarde 30 minutos para tentar novamente.</p><br><br>
                <a href='../'><button class='btn btn-primary btn-lg btn-block' type='button'>Voltar Para O Site</button></a>";
              }      
        ?>
      </div>
    </form>
    <div class="text-right">
    </div>
  </div>
</body>

</html>