<?php
    include "autentica.inc";
    include "conecta_mysql.inc";

    $idusuario = $_GET["idu"];
    $idpost = $_GET["idp"];
    $idcom = $_GET["idc"];

    if (!empty($idpost)){
        $sql = "INSERT INTO curtidas (id_usuario, id_post) ";
        $sql .= "VALUES ('$idusuario', '$idpost');";
        mysqli_query($mysqli, $sql);
    }
    elseif (!empty($idcom)){
        $sql = "INSERT INTO curtidas (id_usuario, id_comentario) ";
        $sql .= "VALUES ('$idusuario', '$idcom');";
        mysqli_query($mysqli, $sql);

        $sql = "SELECT * FROM comentarios WHERE id=" .$idcom. ";";
        $res = mysqli_query($mysqli, $sql);
        $c = mysqli_fetch_array($res);
        $idpost = $c["id_post"];
    }

    header("Location: pagpost.php?idp=$idpost");

    mysqli_close($mysqli);
?>