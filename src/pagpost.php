<?php
    include "_layout/header.php";
    include "conecta_mysql.inc";

    $idp = $_GET["idp"];

    $sql = "SELECT * FROM posts WHERE id = $idp;";
    $res = mysqli_query($mysqli,$sql);
    $post = mysqli_fetch_array($res);

    $sql = "SELECT * FROM usuarios WHERE id =" .$post["id_usuario"]. ";";
    $res = mysqli_query($mysqli,$sql);
    $u = mysqli_fetch_array($res);
?>

<div class="container" style="text-align:justify; width: 50%; margin: 5% auto;">
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

    <form id="comentario" method="POST" action="comentario.php" style="text-align: justify; margin: 1% auto;">
        <input type="hidden" name="idu" value="<?php echo $usuario["id"]; ?>">
        <input type="hidden" name="idp" value="<?php echo $post["id"]; ?>">

        <div class="mb-3">
            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="texto" placeholder="Comente aqui!"></textarea>
        </div>

        <button type="submit" class="btn btn-primary">Comentar</button>
    </form>
</div>

<?php
$sql = "SELECT * FROM comentarios WHERE id_post = " .$post["id"]. " ORDER BY id DESC";
$res = mysqli_query($mysqli,$sql);
$linhas = mysqli_num_rows($res);

for($i=0; $i < $linhas; $i++){
    $c = mysqli_fetch_array($res);
    $sqlu = "SELECT * FROM usuarios WHERE id = " .$c["id_usuario"]. ";";
    $resu = mysqli_query($mysqli,$sqlu);
    $u = mysqli_fetch_array($resu);
    ?>
    
    <div class="container" style="width: 40%; margin: 5% auto;">
        <a href='perfil.php?idu=<?php echo $u["id"]; ?>' style="text-decoration:none; color: rgb(83, 83, 83)">
            <h5><?php echo $u["nome"]; ?></h5>
        </a>
        <div class="row"><p><?php echo $c["texto"]; ?></p></div>

        <div class="btn-group" style="margin-top: 1%">

        <?php
            $sqlc = "SELECT * FROM curtidas WHERE id_usuario = " .$usuario["id"]. " AND id_comentario = " .$c["id"]. ";";
            $resc = mysqli_query($mysqli, $sqlc);
            $linhasc = mysqli_num_rows($resc);

            if($linhasc != 1){ ?>

            <button type="button" class="btn btn-outline-secondary" onclick='location.href = "like.php?idu=<?php echo $usuario["id"] ?>&idc=<?php echo $c["id"] ?>"'>
                <i class="bi bi-star"></i>
                <span class="visually-hidden">Curtir</span>
            </button>

        <?php } else{ ?>

            <button type="button" class="btn btn-secondary" onclick='location.href = "dislike.php?idu=<?php echo $usuario["id"] ?>&idc=<?php echo $c["id"] ?>"'>
                <i class="bi bi-star"></i>
                <span class="visually-hidden">Descurtir</span>
            </button>
        
        <?php } ?>

        <?php if($usuario["id"] == $c["id_usuario"]){ ?>

            <button type="button" class="btn btn-outline-primary" onclick='location.href = "editarc.php?idc=<?php echo $c["id"] ?>"'>
                <i class="bi bi-pencil"></i>
                Editar
            </button>

        <?php } ?>

        <?php if($usuario["id"] == $c["id_usuario"] || $usuario["adm"] == 1 || $usuario["id"] == $post["id_usuario"]){ ?>
            <button type="button" class="btn btn-outline-danger" onclick='location.href = "excluirc.php?idc=<?php echo $c["id"] ?>"'>
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