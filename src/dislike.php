<?php
    include "autentica.inc";
    include "conecta_mysql.inc";

    $idusuario = $_GET["idu"];
    $idpost = $_GET["idp"];
    $idcom = $_GET["idc"];

    if (!empty($idpost)){
        $sql = "DELETE FROM curtidas WHERE id_usuario = " .$idusuario. " AND id_post = " .$idpost. ";";
        mysqli_query($mysqli, $sql);
    }
    elseif (!empty($idcom)){
        $sql = "DELETE FROM curtidas WHERE id_usuario = " .$idusuario. " AND id_comentario = " .$idcom. ";";
        mysqli_query($mysqli, $sql);
    }

    header("Location: index.php");

    mysqli_close($mysqli);
?>