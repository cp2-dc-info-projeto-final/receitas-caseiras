<?php
    include "autentica.inc";
    include "conecta_mysql.inc";

    $idu = $_POST["idu"];
    $nome = $_POST["nome"];
    $email = $_POST["email"];
    $adm = (isset($_POST["adm"])) ? 1 : 0;

    $sql = "SELECT * FROM usuarios WHERE id = $idu;";
    $res = mysqli_query($mysqli,$sql);
    $u = mysqli_fetch_array($res);

    $erro = 0;

    if (empty($nome) || empty($email)){
        echo "Preencha todos os campos. <br>";
        $erro = 1;
    }
    if(strlen($nome) < 5 OR strlen($nome) > 30){
        echo "O nome deve possuir no mínimo 5 e no máximo 30 caracteres.<br>";
        $erro = 1;
    }
    if($nome == $u["senha"]){
        echo "O nome e a senha devem ser diferentes.<br>";
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
    $usuarioemail = mysqli_fetch_array($res);

    if (mysqli_num_rows($res) >= 1 && $idu != $usuarioemail["id"]){
        echo "Esse e-mail pertence a outra conta. <br>";
        $erro = 1;
    }

    if ($erro == 1){
        echo "<p><a href='editar.php?idu=$idu'>Página de edição</a></p>";
    }

    if ($erro == 0){
        $sql = "UPDATE usuarios SET nome = '$nome', email = '$email', adm = '$adm' ";
        $sql .= "WHERE id = $idu;";
        mysqli_query($mysqli,$sql);
        echo "Atualização bem-sucedida. <br>";
        header("Location: index.php");
    }