<?php
    include "_layout/header.php";
    include "conecta_mysql.inc";

    $idpost = $_GET["idp"];
    $sql = "SELECT * FROM posts WHERE id = $idpost;";
    $res = mysqli_query($mysqli,$sql);
    $post = mysqli_fetch_array($res);

    if ($usuario["id"] == $post["id_usuario"]){
?>

<form id="post" method="POST" action="editarp.php" enctype="multipart/form-data" style="text-align: justify; width: 70%; margin: 1% auto;">
    <input type="hidden" name="idpost" value="<?php echo $post["id"]; ?>">
    <input type="hidden" name="img" value="<?php echo $post["img"]; ?>">
    <div class="mb-3">
        <label for="exampleFormControlTextarea1" class="form-label"><h3><?php echo $usuario["nome"]; ?></h3></label>
        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="texto" placeholder="Divulgue suas receitas, peça dicas e interaja!"><?php echo $post["texto"]; ?></textarea>
    </div>

    <img src="<?php echo $post["img"]; ?>" style="display:block; width: 50%; border-radius: 1%; margin: 0% auto 1% auto">

    <div class="input-group mb-3">
        <input type="file" class="form-control" id="inputGroupFile02" name="imgnova">
        <label class="input-group-text" for="inputGroupFile02">Upload</label>
    </div>

    <button type="submit" class="btn btn-primary">Editar postagem</button>
</form>

<?php
    }
    else{
        echo "<h3>Apenas o dono da postagem pode editá-la</h3>";
    }
    mysqli_close($mysqli);
?>