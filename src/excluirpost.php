<?php
    include "autentica.inc";
    include "conecta_mysql.inc";

    $idpost = $_GET["idp"];
    $sql = "SELECT * FROM posts WHERE id = $idpost;";
    $res = mysqli_query($mysqli,$sql);
    $post = mysqli_fetch_array($res);

    $sql = "DELETE FROM comentarios WHERE id_post = '$idpost';";
    mysqli_query($mysqli, $sql);

    $sql = "DELETE FROM curtidas WHERE id_post = '$idpost';";
    mysqli_query($mysqli, $sql);

    unlink($post["img"]);

    $sql = "DELETE FROM posts WHERE id = '$idpost';";
    mysqli_query($mysqli, $sql);
    
    $sql = "SELECT * FROM posts WHERE id = '$idpost'";
    $res = mysqli_query($mysqli, $sql);
    $linhas = mysqli_num_rows($res);

    if ($linhas != 0){
        echo "Erro ao apagar!";
        echo "<p><a href='index.php'>Página inicial</a></p>";
    }else{
        echo "Excluído com sucesso!";
        header("Location: index.php");
    }
    mysqli_close($mysqli);
?>