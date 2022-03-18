<?php
    session_start();
    if(isset($_SESSION["email"])){
        $email = $_SESSION["email"];
    }
    if(isset($_SESSION["senha"])){
        $senha = $_SESSION["senha"];
    }
    if(empty($email) OR empty($senha)){
        echo "Você não fez o login!";
        header("Location: login.html");
        exit;
    }
    else{
        include "conecta_mysql.inc";
        $sql = "SELECT * FROM usuarios WHERE email = '$email';";
        $res = mysqli_query($mysqli, $sql);

        if(mysqli_num_rows($res) != 1){ // testa se não encontrou o username
            unset($_SESSION["email"]);
            unset($_SESSION["senha"]);
            echo "Você não fez o login!";
            header("Location: login.html");
            mysqli_close($mysqli);
            exit;
        }
        else{
            $usuario = mysqli_fetch_array($res);
            if(!hash_equals($usuario["senha"], $senha)){ // testa se a senha está errada
                unset($_SESSION["email"]);
                unset($_SESSION["senha"]);
                echo "Você não fez o login!";
                header("Location: login.html");
                mysqli_close($mysqli);
                exit;
            }
        }
        mysqli_close($mysqli);
    }
?>