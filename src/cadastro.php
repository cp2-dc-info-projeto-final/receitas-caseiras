<!DOCTYPE HTML>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initialscale=1, shrink-to-fit=no">
        <!-- Import do CSS do Bootstrap -->
        <!--<link rel="stylesheet" href="_css/bootstrap.css">-->
        <!--<link rel="stylesheet" href="_css/style.css">-->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

        <title>InstaFood</title>
    </head>

    <body style="background-color: azure;">
        <!-- Import do jQuery + JS do Bootstrap -->
        <!--<script src="_js/bootstrap.js" type="text/javascript"></script>-->
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

        <main style="text-align: center; width: 40%; margin: 10% auto;">
            <?php
                include "conecta_mysql.inc";

                $nome = $_POST["nome"];
                $email = $_POST["email"];
                $senha = $_POST["senha"];
                $confirmasenha = $_POST["confirmasenha"];

                $erro = 0;

                if (empty($nome) || empty($email) || empty($senha) || empty($confirmasenha)){
                    echo "<h1>Preencha todos os campos. <br></h1>";
                    $erro = 1;
                }
                if(strlen($nome) < 5 OR strlen($nome) > 30){
                    echo "<h1>O nome deve possuir no mínimo 5 e no máximo 30 caracteres.<br></h1>";
                    $erro = 1;
                }
                if(strlen($senha) < 5 OR strlen($senha) > 20){
                    echo "<h1>A senha deve possuir no mínimo 5 e no máximo 20 caracteres.<br></h1>";
                    $erro = 1;
                }
                if ($senha != $confirmasenha){
                    echo "<h1>As senhas são diferentes. <br></h1>";
                    $erro = 1;
                }
                if($nome == $senha){
                    echo "<h1>O nome e a senha devem ser diferentes.<br></h1>";
                    $erro = 1;
                }
                if(strlen($nome) > 30){
                    echo "<h1>O nome deve possuir no máximo 30 caracteres.<br></h1>";
                    $erro = 1;
                }
                if(strlen($email) < 8 || strstr($email,'@') == FALSE){
                    echo "<h1>Favor digitar seu email corretamente. <br></h1>";
                    $erro = 1;
                }
                if(strlen($email) > 30){
                    echo "<h1>O email deve possuir no máximo 30 caracteres.<br></h1>";
                    $erro = 1;
                }

                $sql = "SELECT * FROM usuarios WHERE email = '$email';";
                $res = mysqli_query($mysqli, $sql);

                if (mysqli_num_rows($res) >= 1){
                    echo "<h1>Esse e-mail pertence a outra conta. <br></h1>";
                    $erro = 1;
                }

                if ($erro == 1){
                    echo "<h4><a href='cadastro.html'>Página de cadastro</a></h4>";
                }
                // VERIFICA SE NÃO HOUVE ERRO 
                if($erro == 0) {
                    $senha_cript = password_hash($senha, PASSWORD_DEFAULT);
                    $sql = "INSERT INTO usuarios (nome,email,senha)";
                    $sql .= "VALUES ('$nome','$email','$senha_cript');";  
                    mysqli_query($mysqli,$sql);  
                    echo "<br><h1>O usuário foi cadastrado com sucesso!</h1>";
                    echo "<h4><a href='login.html'>Página de log in</a></h4>";
                }
                mysqli_close($mysqli);
            ?>
        </main>
    </body>
</html>
