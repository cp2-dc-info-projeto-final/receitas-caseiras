<?php
    include "_layout/header.php";
    include "conecta_mysql.inc";
?>

    <form id="senha" method="POST" action="senha.php" style="text-align: center; width: 40%; margin: 1% auto;">

        <input type="hidden" name="id" value="<?php echo $usuario["id"]?>">

        <div class="form-group">
            <h3>Alteração de senha</h3>
        </div>

        <div class="form-group">
            <label for="exampleInputPassword1">Senha antiga</label>
            <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Insira sua antiga senha" name="antsenha">
        </div>

        <div class="form-group">
            <label for="exampleInputPassword1">Senha nova</label>
            <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Insira sua nova senha" name="novasenha">
            <small id="emailHelp" class="form-text text-muted">Sua senha deve ter entre 5 e 20 caracteres.</small>
        </div>

        <div class="form-group">
            <label for="exampleInputPassword1">Confirmação de senha</label>
            <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Confirme sua nova senha" name="confirmasenha">
            <small id="emailHelp" class="form-text text-muted">Preencha com a mesma senha acima.</small>
        </div>

        <br>
        
        <button type="submit" class="btn btn-primary">Alterar</button>

    </form>
<?php mysqli_close($mysqli); ?>
</main>
</body>
</html>