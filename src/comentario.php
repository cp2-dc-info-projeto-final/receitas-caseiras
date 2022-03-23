<?php
    include "_layout/header.php";
    include "conecta_mysql.inc";

    $idp = $_POST["idp"];
    $idu = $_POST["idu"];
    $texto = $_POST["texto"];

    $erro = 0;

    if (strlen($texto) > 200){
        echo "<h1>Texto maior que 200 caracteres.</h1>";
        $erro = 1;
    }

    if (empty($texto)){
        echo "<h1>Postagem vazia!</h1>";
        $erro = 1;
    }

    if($erro == 1){
        echo "<h4><a href='pagpost.php?idp=$idp'>Retornar</a></h4>";
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
