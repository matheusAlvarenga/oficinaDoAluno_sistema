<?php

// Conexão com o banco de dados
   require_once('../db.class.php');
// Se o usuário clicou no botão cadastrar efetua as ações
if (isset($_POST['cadastrar'])) {
    
    // Recupera os dados dos campos
    $id = $_POST['id_prof'];
    $foto = $_FILES["file"];

    function addFoto($foto, $coluna, $nome){
    $objDb = new db();
    $link = $objDb->conecta_mysql();
    // Se a foto estiver sido selecionada
    if (!empty($foto["name"])) {
        
        // Largura máxima em pixels
        $largura = 500;
        // Altura máxima em pixels
        $altura = 500;
        // Tamanho máximo do arquivo em bytes
        $tamanho = 100000;
 
        $error = array();
 
        // Verifica se o arquivo é uma imagem
        if(!preg_match("/^image\/(pjpeg|jpeg|png|gif|bmp)$/", $foto["type"])){
           $error[1] = "Isso não é uma imagem.";
        } 
    
        // Pega as dimensões da imagem
        $dimensoes = getimagesize($foto["tmp_name"]);
    
        // Verifica se a largura da imagem é maior que a largura permitida
        if($dimensoes[0] > $largura) {
            $error[2] = "A largura da imagem não deve ultrapassar ".$largura." pixels";
        }
 
        // Verifica se a altura da imagem é maior que a altura permitida
        if($dimensoes[1] > $altura) {
            $error[3] = "Altura da imagem não deve ultrapassar ".$altura." pixels";
        }
        
        // Verifica se o tamanho da imagem é maior que o tamanho permitido
        if($foto["size"] > $tamanho) {
            $error[4] = "A imagem deve ter no máximo ".$tamanho." bytes";
        }
 
        // Se não houver nenhum erro
        if (count($error) == 0) {
        
            // Pega extensão da imagem
            preg_match("/\.(gif|bmp|png|jpg|jpeg){1}$/i", $foto["name"], $ext);
 
            // Gera um nome único para a imagem
            $nome_imagem = md5(uniqid(time())) . "." . $ext[1];
 
            // Caminho de onde ficará a imagem
            $caminho_imagem = "img/prof/" . $nome_imagem;
 
            // Faz o upload da imagem para seu respectivo caminho
            move_uploaded_file($foto["tmp_name"], $caminho_imagem);
        
            // Insere os dados no banco
            $sql = "UPDATE sisoda_professores SET $coluna = '$nome_imagem' WHERE sisoda_professores_id='$nome'";
        
            $resultado_id = mysqli_query($link, $sql);
            if($resultado_id){
            	header('Location: index.php');
            }
            else
            {
            	echo "Num deu";
            }
        }
    }
}

addFoto($foto,'sisoda_professores_foto',$id);
    }

?>
