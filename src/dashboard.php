<?php
    include "_layout/header.php";
    include "conecta_mysql.inc";

    if($usuario["adm"] == 1){
        $sql = "SELECT * FROM usuarios";
        $res = mysqli_query($mysqli,$sql);
        $linhas = mysqli_num_rows($res); ?>
        <div class="container" style="margin-top: 1%;">
    <?php for($j=0; $j < $linhas; $j++){ ?>
            <div class="row">
        <?php
            for($i=0; $i < 3; $i++){
                $u = mysqli_fetch_array($res); ?>
                
                <div class="col" style="text-align:center; margin: 1% auto">
                    <a href='perfil.php?idu=<?php echo $u["id"]; ?>' style="text-decoration:none; color: rgb(83, 83, 83)">
                        <h2><?php echo $u["nome"]; ?></h2>
                        <p><?php echo $u["email"]; ?></p>
                    </a>

                    <?php if($usuario["id"] == $u["id"] || $usuario["adm"] == 1 && !empty($u)){ ?>
                        <button type="button" class="btn btn-outline-primary" onclick='location.href = "editar.php?idu=<?php echo $u["id"] ?>"'>
                            <i class="bi bi-pencil"></i>
                            Editar
                        </button>

                        <button type="button" class="btn btn-outline-danger" onclick='location.href = "excluir.php?idu=<?php echo $u["id"] ?>"'>
                            <i class="bi bi-trash"></i>
                            Excluir
                        </button>
                    <?php } ?>
                </div>
        <?php } ?>
            </div>
        <?php } ?>
        </div>
        <?php
            } else{
                echo "<h2>O acesso ao dashboard é restrito aos administradores da rede social.</h2>";
            }
            mysqli_close($mysqli);
        ?>
    </main>
    </body>
</html>