<?php
    include "autentica.inc";
    include "conecta_mysql.inc";

    $id = $_POST["id"];
    $antsenha = $_POST["antsenha"];
    $novasenha = $_POST["novasenha"];
    $csenha = $_POST["confirmasenha"];

    $erro = 0;

    if (empty($antsenha) || empty($novasenha) || empty($csenha)){
        echo "Preencha todos os campos. <br>";
        $erro = 1;
    }
    if(!password_verify($antsenha, $usuario["senha"])){
        echo "A senha atual está errada.<br>";
        $erro = 1;
    }
    if(strlen($novasenha) < 5 OR strlen($novasenha) > 20){
        echo "A senha deve possuir no mínimo 5 e no máximo 20 caracteres.<br>";
        $erro = 1;
    }
    if ($novasenha != $csenha){
        echo "As senhas são diferentes. <br>";
        $erro = 1;
    }
    if($usuario["nome"] == $novasenha){
        echo "O nome e a senha devem ser diferentes.<br>";
        $erro = 1;
    }

    if($erro == 1){
        echo "<p><a href='alterasenha.php'>Alterar senha</a></p>";
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