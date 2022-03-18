<?php

/*
    Função que armazena no servidor a imagem contida no parâmetro $fileToUpload.
    Retorna o caminho da imagem no servidor, se o upload tiver sido feito com sucesso.
    Caso contrário, retorna falso.
    Exemplo de chamada da função:
        $fileToUpload = $_FILES["img_perfil"];
        $caminho_img = upload_imagem($fileToUpload);
*/

function upload_imagem($fileToUpload){
    $target_dir = "uploads/"; // pasta do servidor onde as imagens devem ser salvas
    $uploadOk = 1;

    // armazena a extensão do arquivo em letras minúsculas na variável $imageFileType
    $imageFileType = strtolower(pathinfo($fileToUpload["name"],PATHINFO_EXTENSION));

    // cria um nome único para o arquivo a ser gravado no servidor
    do{
        $target_file = $target_dir . uniqid("img_",true) . ".$imageFileType";
        if (!file_exists($target_file)) { // verifica se ainda não existe arquivo com esse nome
            break;
        }
    } while(true);

    // Verifica se o arquivo contém mesmo uma imagem
    if(empty($fileToUpload["tmp_name"]) or 
    getimagesize($fileToUpload["tmp_name"]) === false) {
        echo "O arquivo não é uma imagem.<br>";
        $uploadOk = 0;
    }

    // Verifica o tamanho do arquivo
    if ($fileToUpload["size"] > 500000) {
        echo "Desculpe, seu arquivo é muito grande.<br>";
        $uploadOk = 0;
    }

    // Verifica os formatos de arquivo permitidos.
    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
    && $imageFileType != "gif" ) {
        echo "Desculpe, apenas arquivos JPG, JPEG, PNG e GIF são permitidos.<br>";
        $uploadOk = 0;
    }

    // Tenta salvar o arquivo com a função move_uploaded_file
    if ($uploadOk != 0) {
        if (!move_uploaded_file($fileToUpload["tmp_name"], $target_file)) {
            echo "Desculpe, houve um erro durante o carregamento da imagem.<br>";
            $uploadOk = 0;
        }
    }

    // Retorna o caminho do arquivo se o upload foi feito corretamente.
    if ($uploadOk != 0) {
        return $target_file;
    }
    else{ // Retorna falso caso contrário.
        return false;
    }
}
?>