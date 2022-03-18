<?php
    include "autentica.inc";
    include "conecta_mysql.inc";

    $idc = $_GET["idc"];

    $sql = "SELECT * FROM comentarios WHERE id=" .$idc. ";";
    $res = mysqli_query($mysqli, $sql);
    $c = mysqli_fetch_array($res);
    $idpost = $c["id_post"];

    $sql = "DELETE FROM curtidas WHERE id_comentario = '$idc';";
    mysqli_query($mysqli, $sql);

    $sql = "DELETE FROM comentarios WHERE id = '$idc';";
    mysqli_query($mysqli, $sql);

    $sql = "SELECT * FROM comentarios WHERE id = '$idc'";
    $res = mysqli_query($mysqli, $sql);
    $linhas = mysqli_num_rows($res);

    if ($linhas != 0){
        echo "Erro ao apagar!";
        echo "<p><a href='pagpost.php?idp=$idpost'>Página do post</a></p>";
    }else{
        echo "Excluído com sucesso!";
        header("Location: pagpost.php?idp=$idpost");
    }
    mysqli_close($mysqli);
?>