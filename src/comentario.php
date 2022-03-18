<?php
    include "autentica.inc";
    include "conecta_mysql.inc";

    $idp = $_POST["idp"];
    $idu = $_POST["idu"];
    $texto = $_POST["texto"];

    $erro = 0;

    if (strlen($texto) > 200){
        echo "Texto maior que 200 caracteres.";
        $erro = 1;
    }

    if (empty($texto)){
        echo "Postagem vazia!";
        $erro = 1;
    }

    if($erro == 1){
        echo "<p><a href='pagpost.php?idp=$idp'>Retornar</a></p>";
    }

    if ($erro == 0){
        $sql = "INSERT INTO comentarios (id_usuario, id_post, texto) ";
        $sql .= "VALUES ('$idu', '$idp', '$texto');";
        mysqli_query($mysqli, $sql);
        echo "Seu comentário foi postado!";

        header("Location: pagpost.php?idp=$idp");
    }

    mysqli_close($mysqli);
?>