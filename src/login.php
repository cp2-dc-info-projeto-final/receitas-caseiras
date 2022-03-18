<?php
    // Recebe os campos do formulário
    $email = $_POST["email"];
    $senha = $_POST["senha"];

    // Realiza a consulta no banco de dados
    include "conecta_mysql.inc";
    $sql = "SELECT * FROM usuarios WHERE email = '$email';";
    $res = mysqli_query($mysqli, $sql);

    if(mysqli_num_rows($res) != 1){ // testa se não encontrou o e-mail
        echo "E-mail inválido!";
        echo "<p><a href='login.html'>Página de login</a></p>";
    }
    else{
        $usuario = mysqli_fetch_array($res);
        if(!password_verify($senha, $usuario["senha"])){ // testa se a senha está errada
            echo "Senha inválida!";
            echo "<p><a href='login.html'>Página de login</a></p>";
        }
        else{ // usuário e senha corretos, abre a sessão
            session_start();
            $_SESSION["email"] = $email;
            $_SESSION["senha"] = $usuario["senha"];
            // direciona à página inicial
            header("Location: index.php");
        }
    }
    mysqli_close($mysqli);
?>