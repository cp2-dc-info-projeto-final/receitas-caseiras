<?php
    include "autentica.inc";
    include "conecta_mysql.inc";
    include "upload.php";

    $id = $_POST["idpost"];
    $texto = $_POST["texto"];
    $img = $_FILES["imgnova"];
    $caminho_img = $_POST["img"];

    $erro = 0;

    if (strlen($texto) > 400){
        echo "Texto maior que 400 caracteres.";
        echo "<p><a href='index.php'>Página inicial</a></p>";
        $erro = 1;
    }

    if ($img["size"] != 0){
        $caminho_img = upload_imagem($img);
        if($caminho_img === false){
            echo "Não foi possível carregar a imagem corretamente.<br>";
            echo "<p><a href='index.php'>Página inicial</a></p>";
            $erro = 1;
        }
    }

    if (empty($texto) && empty($caminho_img)){
        echo "Postagem vazia!";
        echo "<p><a href='index.php'>Página inicial</a></p>";
        $erro = 1;
    }

    if ($erro == 0){
        $sql = "UPDATE posts SET texto = '$texto', img = '$caminho_img'";
        $sql .= "WHERE id = $id;";
        mysqli_query($mysqli, $sql);
        echo "Sua publicação foi atualizada!";

        header("Location: index.php");
    }

    mysqli_close($mysqli);
?>