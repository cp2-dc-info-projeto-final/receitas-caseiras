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
                // Recebe os campos do formulário
                $email = $_POST["email"];
                $senha = $_POST["senha"];

                // Realiza a consulta no banco de dados
                include "conecta_mysql.inc";
                $sql = "SELECT * FROM usuarios WHERE email = '$email';";
                $res = mysqli_query($mysqli, $sql);

                if(mysqli_num_rows($res) != 1){ // testa se não encontrou o e-mail
                    echo "<h1>E-mail inválido!</h1>";
                    echo "<h4><a href='login.html'>Página de login</a></h4>";
                }
                else{
                    $usuario = mysqli_fetch_array($res);
                    if(!password_verify($senha, $usuario["senha"])){ // testa se a senha está errada
                        echo "<h1>Senha inválida!</h1>";
                        echo "<h4><a href='login.html'>Página de login</a></h4>";
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
        </main>
    </body>
</html>
