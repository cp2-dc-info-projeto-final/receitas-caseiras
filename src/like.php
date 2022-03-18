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
    }

    header("Location: index.php");

    mysqli_close($mysqli);
?>