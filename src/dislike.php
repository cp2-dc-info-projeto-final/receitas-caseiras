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
        
        $sql = "SELECT * FROM comentarios WHERE id=" .$idcom. ";";
        $res = mysqli_query($mysqli, $sql);
        $c = mysqli_fetch_array($res);
        $idpost = $c["id_post"];
    }

    header("Location: pagpost.php?idp=$idpost");

    mysqli_close($mysqli);
?>