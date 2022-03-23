<?php
    include "_layout/header.php";
    include "conecta_mysql.inc";
    include "upload.php";

    $idusuario = $usuario["id"];
    $texto = $_POST["texto"];
    $img = $_FILES["img"];

    $erro = 0;

    if (strlen($texto) > 400){
        echo "<h1>Texto maior que 400 caracteres.</h1><br>";
        echo "<h4><a href='index.php'>Página inicial</a></h4>";
        $erro = 1;
    }

    if ($img["size"] != 0){
        $caminho_img = upload_imagem($img);
        if($caminho_img === false){
            echo "<h1>Não foi possível carregar a imagem corretamente.</h1><br>";
            echo "<h4><a href='index.php'>Página inicial</a></h4>";
            $erro = 1;
        }
    }

    if (empty($texto) && empty($caminho_img)){
        echo "<h1>Postagem vazia!</h1><br>";
        echo "<h4><a href='index.php'>Página inicial</a></h4>";
        $erro = 1;
    }

    if ($erro == 0){
        $sql = "INSERT INTO posts (id_usuario, texto, img) ";
        $sql .= "VALUES ('$idusuario', '$texto', '$caminho_img');";
        mysqli_query($mysqli, $sql);
        echo "Sua publicação foi postada!";

        header("Location: index.php");
    }

    mysqli_close($mysqli);
?>
