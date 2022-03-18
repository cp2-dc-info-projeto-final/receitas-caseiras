<?php
    include "_layout/header.php";
    include "conecta_mysql.inc";

    $u = $usuario;

    if (!empty($_GET)){
        $idu = $_GET["idu"];
        $sql = "SELECT * FROM usuarios WHERE id = $idu;";
        $res = mysqli_query($mysqli,$sql);
        $u = mysqli_fetch_array($res);
    }

    if ($usuario["id"] == $u["id"] || $usuario["adm"] == 1){
?>

    <form id="editar" method="POST" action="editaru.php" style="text-align: center; width: 40%; margin: 1% auto;">

        <input type="hidden" name="idu" value="<?php echo $u["id"]; ?>">

        <div class="form-group">
            <h3>Edição de dados</h3>
        </div>

        <div class="form-group">
            <label for="exampleInputEmail1">Nome ou apelido</label>
            <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Insira seu nome ou apelido" name="nome" value="<?php echo $u["nome"]; ?>">
            <small id="emailHelp" class="form-text text-muted">Seu nome deve ter entre 5 e 30 caracteres.</small>
        </div>

        <div class="form-group">
            <label for="exampleInputEmail1">Endereço de e-mail</label>
            <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="exemplo@email.com" name="email" value="<?php echo $u["email"]; ?>">
        </div>

        <?php
            if ($usuario["adm"] == 1){
                if ($u["adm"] != 1){ ?>
                    <div class="form-check form-switch">
                        <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckDefault" name="adm">
                        <label class="form-check-label" for="flexSwitchCheckDefault">Promover/Rebaixar administrador</label>
                    </div>
                <?php }else{ ?>
                    <div class="form-check form-switch">
                        <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckChecked" name="adm" checked>
                        <label class="form-check-label" for="flexSwitchCheckChecked">Promover/Rebaixar administrador</label>
                    </div>
                <?php }
            }
        ?>

        <br>
        <button type="submit" class="btn btn-primary">Enviar</button>

    </form>

<?php
    } else{
        echo "<h2>Você não possui permissão para editar esse perfil</h2>";
    }

    mysqli_close($mysqli);
?>