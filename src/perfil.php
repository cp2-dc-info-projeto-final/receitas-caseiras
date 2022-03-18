<?php
    include "_layout/header.php";
    include "conecta_mysql.inc";

    $u = $usuario;

    if (!empty($_GET)){
        $id = $_GET["idu"];
        $sql = "SELECT * FROM usuarios WHERE id = $id;";
        $res = mysqli_query($mysqli,$sql);
        $u = mysqli_fetch_array($res);
    }
?>

<div class="container" style="margin: 1% auto; width: 50%; text-align: center">
    <h2><?php echo $u["nome"]; ?></h2>
    <p><?php echo $u["email"]; ?></p><br>
</div>

<?php
    $sql = "SELECT * FROM posts WHERE id_usuario = " .$u["id"]. " ORDER BY id DESC";
    $res = mysqli_query($mysqli,$sql);
    $linhas = mysqli_num_rows($res);

    for($i=0; $i < $linhas; $i++){
        $post = mysqli_fetch_array($res);
        $sqlu = "SELECT * FROM usuarios WHERE id = " .$post["id_usuario"]. ";";
        $resu = mysqli_query($mysqli,$sqlu);
        $u = mysqli_fetch_array($resu);
        ?>
        
        <div class="container" style="text-align: justify; width: 50%; margin: 1% auto;">
            <h6><?php echo $post["texto"]; ?></h6>
            <img src="<?php echo $post["img"]; ?>" style="width: 100%; border-radius: 1%">

            <div class="btn-group" style="margin-top: 1%">

            <?php
                $sqlc = "SELECT * FROM curtidas WHERE id_usuario = " .$usuario["id"]. " AND id_post = " .$post["id"]. ";";
                $resc = mysqli_query($mysqli, $sqlc);
                $linhasc = mysqli_num_rows($resc);

                if($linhasc != 1){ ?>

                <button type="button" class="btn btn-outline-secondary" onclick='location.href = "like.php?idu=<?php echo $usuario["id"] ?>&idp=<?php echo $post["id"] ?>"'>
                    <i class="bi bi-star"></i>
                    <span class="visually-hidden">Curtir</span>
                </button>

            <?php } else{ ?>

                <button type="button" class="btn btn-secondary" onclick='location.href = "dislike.php?idu=<?php echo $usuario["id"] ?>&idp=<?php echo $post["id"] ?>"'>
                    <i class="bi bi-star"></i>
                    <span class="visually-hidden">Descurtir</span>
                </button>
            
            <?php } ?>

                <button type="button" class="btn btn-outline-secondary" onclick='location.href = "pagpost.php?idp=<?php echo $post["id"] ?>"'>
                    <i class="bi bi-chat"></i>
                    <span class="visually-hidden">Comentar</span>
                </button>

            <?php if($usuario["id"] == $post["id_usuario"]){ ?>

                <button type="button" class="btn btn-outline-primary" onclick='location.href = "editarpost.php?idp=<?php echo $post["id"] ?>"'>
                    <i class="bi bi-pencil"></i>
                    Editar
                </button>

            <?php } ?>

            <?php if($usuario["id"] == $post["id_usuario"] || $usuario["adm"] == 1){ ?>
                <button type="button" class="btn btn-outline-danger" onclick='location.href = "excluirpost.php?idp=<?php echo $post["id"] ?>"'>
                    <i class="bi bi-trash"></i>
                    Excluir
                </button>
            <?php } ?>

            </div>
        </div>

    <?php } mysqli_close($mysqli); ?>

</main>
</body>
</html>