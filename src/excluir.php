<?php
    include "autentica.inc";
    include "conecta_mysql.inc";

    $idu = $_GET["idu"];

    $sql = "DELETE FROM comentarios WHERE id_usuario = '$idu';";
    mysqli_query($mysqli, $sql);

    $sql = "DELETE FROM curtidas WHERE id_usuario = '$idu';";
    mysqli_query($mysqli, $sql);

    $sql = "SELECT * FROM posts WHERE id_usuario = $idu;";
    $res = mysqli_query($mysqli,$sql);
    $linhas = mysqli_num_rows($res);

    for($i=0; $i < $linhas; $i++){
        $post = mysqli_fetch_array($res);

        unlink($post["img"]);
    }

    $sql = "DELETE FROM posts WHERE id_usuario = '$idu';";
    mysqli_query($mysqli, $sql);

    $sql = "DELETE FROM usuarios WHERE id = '$idu';";
    mysqli_query($mysqli, $sql);

    $sql = "SELECT * FROM usuarios WHERE id = '$idu'";
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