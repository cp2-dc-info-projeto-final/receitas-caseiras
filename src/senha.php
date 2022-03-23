<?php
    include "_layout/header.php";
    include "conecta_mysql.inc";
?>

<div style="text-align: center; width: 40%; margin: 10% auto;">
<?php
    $id = $_POST["id"];
    $antsenha = $_POST["antsenha"];
    $novasenha = $_POST["novasenha"];
    $csenha = $_POST["confirmasenha"];

    $erro = 0;

    if (empty($antsenha) || empty($novasenha) || empty($csenha)){
        echo "<h1>Preencha todos os campos.</h1><br>";
        $erro = 1;
    }
    if(!password_verify($antsenha, $usuario["senha"])){
        echo "<h1>A senha atual está errada.</h1><br>";
        $erro = 1;
    }
    if(strlen($novasenha) < 5 OR strlen($novasenha) > 20){
        echo "<h1>A senha deve possuir no mínimo 5 e no máximo 20 caracteres.</h1><br>";
        $erro = 1;
    }
    if ($novasenha != $csenha){
        echo "<h1>As senhas são diferentes.</h1><br>";
        $erro = 1;
    }
    if($usuario["nome"] == $novasenha){
        echo "<h1>O nome e a senha devem ser diferentes.</h1><br>";
        $erro = 1;
    }

    if($erro == 1){
        echo "<h4><a href='alterasenha.php'>Alterar senha</a></h4>";
    }

    if ($erro == 0){
        $senha_cripto = password_hash($novasenha, PASSWORD_DEFAULT);
        $sql = "UPDATE usuarios SET senha = '$senha_cripto' ";
        $sql .= "WHERE id = $id;";
        mysqli_query($mysqli,$sql);
        echo "Atualização bem-sucedida. <br>";
        header("Location: index.php");
    }
?>
</div>
