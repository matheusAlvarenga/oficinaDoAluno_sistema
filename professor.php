<html lang="pt-br">
    <head>
        <title>Sistema - Oficina do Aluno</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="css/style.css" rel="stylesheet">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    </head>
    <body>
        <div class='container'>
            <div class="row">
                <div class="col-md-4">
                    
                </div> 
                <div class="col-md-4">
                    <div class="row">
                        <img src="_imagens/logo.png">
                    </div>
                    <div class="row">
                        <form action="loginProf.php" method="POST">
                            <input type="text" name="login">
                            <input type="password" name="senha"><br>
                            <input type="submit" value="LOGIN">
                            <?php 

                                if (isset($_GET['erro'])) {
                                    if ($_GET['erro'] == '1') {
                                        echo "<p align='center'>Login ou senha não encontrados.</p>";
                                    }
                                }

                             ?>
                        </form>
                    </div>
                </div> 
                <div class="col-md-4">
                </div>  
            </div>          
        </div>
    </body>
</html>