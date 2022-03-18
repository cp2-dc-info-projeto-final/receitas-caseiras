<?php
    include "_layout/header.php";
    include "conecta_mysql.inc";

    $idc = $_GET["idc"];
    $sql = "SELECT * FROM comentarios WHERE id = $idc;";
    $res = mysqli_query($mysqli,$sql);
    $c = mysqli_fetch_array($res);

    $sql = "SELECT * FROM posts WHERE id =" .$c["id_post"]. ";";
    $res = mysqli_query($mysqli,$sql);
    $post = mysqli_fetch_array($res);

    $sql = "SELECT * FROM usuarios WHERE id =" .$post["id_usuario"]. ";";
    $res = mysqli_query($mysqli,$sql);
    $u = mysqli_fetch_array($res);

    if ($usuario["id"] == $c["id_usuario"]){
?>

<div class="container" style="text-align: justify; width: 50%; margin: 5% auto;">
    <a href='perfil.php?idu=<?php echo $u["id"]; ?>' style="text-decoration:none; color: rgb(83, 83, 83)">
        <h4><?php echo $u["nome"]; ?></h4>
    </a>
    <h6><?php echo $post["texto"]; ?></h6>
    <img src="<?php echo $post["img"]; ?>" style="width: 100%; border-radius: 1%">

    <form id="comentario" method="POST" action="editarcom.php" style="text-align: justify; margin: 1% auto;">
        <input type="hidden" name="idc" value="<?php echo $c["id"]; ?>">

        <div class="mb-3">
            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="texto"><?php echo $c["texto"]; ?></textarea>
        </div>

        <button type="submit" class="btn btn-primary">Editar</button>
    </form>
</div>

<?php
    }
    else{
        echo "<h3>Apenas o dono do comentário pode editá-lo</h3>";
    }
    mysqli_close($mysqli);
?>