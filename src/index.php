<?php include "_layout/header.php"; ?>
    <form id="post" method="POST" action="post.php" enctype="multipart/form-data" style="text-align: justify; width: 70%; margin: 1% auto;">
        <div class="mb-3">
            <label for="exampleFormControlTextarea1" class="form-label"><h3><?php echo $usuario["nome"]; ?></h3></label>
            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="texto" placeholder="Divulgue suas receitas, peça dicas e interaja!"></textarea>
        </div>

        <div class="input-group mb-3">
            <input type="file" class="form-control" id="inputGroupFile02" name="img">
            <label class="input-group-text" for="inputGroupFile02">Upload</label>
        </div>

        <button type="submit" class="btn btn-primary">Postar</button>
    </form>

<?php
    include "conecta_mysql.inc";

    $sql = "SELECT * FROM posts ORDER BY id DESC";
    $res = mysqli_query($mysqli,$sql);
    $linhas = mysqli_num_rows($res);

    for($i=0; $i < $linhas; $i++){
        $post = mysqli_fetch_array($res);
        $sqlu = "SELECT * FROM usuarios WHERE id = " .$post["id_usuario"]. ";";
        $resu = mysqli_query($mysqli,$sqlu);
        $u = mysqli_fetch_array($resu);
        ?>
        
        <div class="container" style="text-align: justify; width: 50%; margin: 5% auto;">
            <a href='perfil.php?idu=<?php echo $u["id"]; ?>' style="text-decoration:none; color: rgb(83, 83, 83)">
                <h4><?php echo $u["nome"]; ?></h4>
            </a>
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