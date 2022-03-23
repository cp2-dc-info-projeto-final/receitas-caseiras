<?php
    include "_layout/header.php";
    include "conecta_mysql.inc";

    $idc = $_POST["idc"];
    $texto = $_POST["texto"];

    $sql = "SELECT * FROM comentarios WHERE id=$idc;";
    $res = mysqli_query($mysqli, $sql);
    $c = mysqli_fetch_array($res);
    $idpost = $c["id_post"];

    $erro = 0;

    if (strlen($texto) > 200){
        echo "<h1>Texto maior que 200 caracteres.</h1>";
        $erro = 1;
    }

    if (empty($texto)){
        echo "<h1>Postagem vazia!</h1>";
        $erro = 1;
    }

    if ($erro == 1){
        echo "<h4><a href='pagpost.php?idpost=$idpost'>Página de cadastro</a></h4>";
    }

    if ($erro == 0){
        $sql = "UPDATE comentarios SET texto = '$texto' ";
        $sql .= "WHERE id = $idc;";
        mysqli_query($mysqli, $sql);
        echo "Seu comentário foi atualizado!";

        header("Location: pagpost.php?idp=$idpost");
    }

    mysqli_close($mysqli);
?>
