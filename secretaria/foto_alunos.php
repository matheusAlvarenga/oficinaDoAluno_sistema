<?php

// Conexão com o banco de dados
   require_once('../db.class.php');
// Se o usuário clicou no botão cadastrar efetua as ações
if (isset($_POST['cadastrar'])) {
    
    // Recupera os dados dos campos
    $id = $_POST['id_aluno'];
    $foto = $_FILES["file"];

    function addFoto($foto, $coluna, $nome){
    $objDb = new db();
    $link = $objDb->conecta_mysql();
    // Se a foto estiver sido selecionada
    if (!empty($foto["name"])) {
        
        // Largura máxima em pixels
        $largura = 1500;
        // Altura máxima em pixels
        $altura = 1500;
        // Tamanho máximo do arquivo em bytes
        $tamanho = 10000000000;
        
        $error=0;
        
        // Verifica se o arquivo é uma imagem
        if(!preg_match("/^image\/(pjpeg|jpeg|png|gif|bmp)$/", $foto["type"])){
           echo "Isso não é uma imagem.";
           $error = $error+1;
        } 

        // Pega as dimensões da imagem
        $dimensoes = getimagesize($foto["tmp_name"]);
    
        // Verifica se a largura da imagem é maior que a largura permitida
        if($dimensoes[0] > $largura) {
            echo "A largura da imagem não deve ultrapassar ".$largura." pixels";
            $error = $error+1;
        }
 
        // Verifica se a altura da imagem é maior que a altura permitida
        if($dimensoes[1] > $altura) {
            echo "Altura da imagem não deve ultrapassar ".$altura." pixels";
            $error = $error+1;
        }
        
        // Verifica se o tamanho da imagem é maior que o tamanho permitido
        if($foto["size"] > $tamanho) {
            echo "A imagem deve ter no máximo ".$tamanho." bytes";
           $error = $error+1;
        }
 
        // Se não houver nenhum erro
        if ($error == 0) {
        
            // Pega extensão da imagem
            preg_match("/\.(gif|bmp|png|jpg|jpeg){1}$/i", $foto["name"], $ext);
 
            // Gera um nome único para a imagem
            $nome_imagem = md5(uniqid(time())) . "." . $ext[1];
 
            // Caminho de onde ficará a imagem
            $caminho_imagem = "../admin/img/alunos/" . $nome_imagem;
 
            // Faz o upload da imagem para seu respectivo caminho
            move_uploaded_file($foto["tmp_name"], $caminho_imagem);
        
            // Insere os dados no banco
            $sql = "UPDATE sisoda_alunos SET $coluna = '$nome_imagem' WHERE sisOda_alunos_id='$nome'";
        
            echo $sql;
        
            $resultado_id = mysqli_query($link, $sql);
            if($resultado_id){
            	echo "<script>window.location.href='aluno_ind.php?id=$nome'</script>";
            }
            else
            {
            	echo $error[1];
            	echo $error[2];
            	echo $error[3];
            	echo $error[4];
            }
        }
    }
}

addFoto($foto,'sisOda_alunos_foto',$id);
    }

?>
