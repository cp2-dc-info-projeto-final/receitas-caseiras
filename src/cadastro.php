<?php
    include "conecta_mysql.inc";

    $nome = $_POST["nome"];
    $email = $_POST["email"];
    $senha = $_POST["senha"];
    $confirmasenha = $_POST["confirmasenha"];

    $erro = 0;

    if (empty($nome) || empty($email) || empty($senha) || empty($confirmasenha)){
        echo "Preencha todos os campos. <br>";
        $erro = 1;
    }
    if(strlen($nome) < 5 OR strlen($nome) > 30){
        echo "O nome deve possuir no mínimo 5 e no máximo 30 caracteres.<br>";
        $erro = 1;
    }
    if(strlen($senha) < 5 OR strlen($senha) > 20){
        echo "A senha deve possuir no mínimo 5 e no máximo 20 caracteres.<br>";
        $erro = 1;
    }
    if ($senha != $confirmasenha){
        echo "As senhas são diferentes. <br>";
        $erro = 1;
    }
    if($nome == $senha){
        echo "O nome e a senha devem ser diferentes.<br>";
        $erro = 1;
    }
    if(strlen($nome) > 30){
        echo "O nome deve possuir no máximo 30 caracteres.<br>";
        $erro = 1;
    }
    if(strlen($email) < 8 || strstr($email,'@') == FALSE){
        echo "Favor digitar seu email corretamente. <br>";
        $erro = 1;
    }
    if(strlen($email) > 30){
        echo "O email deve possuir no máximo 30 caracteres.<br>";
        $erro = 1;
    }

    $sql = "SELECT * FROM usuarios WHERE email = '$email';";
    $res = mysqli_query($mysqli, $sql);

    if (mysqli_num_rows($res) >= 1){
        echo "Esse e-mail pertence a outra conta. <br>";
        $erro = 1;
    }

    if ($erro == 1){
        echo "<p><a href='cadastro.html'>Página de cadastro</a></p>";
    }
    // VERIFICA SE NÃO HOUVE ERRO 
    if($erro == 0) {
        $senha_cript = password_hash($senha, PASSWORD_DEFAULT);
        $sql = "INSERT INTO usuarios (nome,email,senha)";
        $sql .= "VALUES ('$nome','$email','$senha_cript');";  
        mysqli_query($mysqli,$sql);  
        echo "<br>O usuário foi cadastrado com sucesso!";
        echo "<p><a href='login.html'>Página de log in</a></p>";
    }
    mysqli_close($mysqli);
?>