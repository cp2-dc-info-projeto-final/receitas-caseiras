<?php
    include "_layout/header.php";
    include "conecta_mysql.inc";
?>

<div style="text-align: center; width: 40%; margin: 10% auto;">
<?php
    $idu = $_POST["idu"];
    $nome = $_POST["nome"];
    $email = $_POST["email"];
    $adm = (isset($_POST["adm"])) ? 1 : 0;

    $sql = "SELECT * FROM usuarios WHERE id = $idu;";
    $res = mysqli_query($mysqli,$sql);
    $u = mysqli_fetch_array($res);

    $erro = 0;

    if (empty($nome) || empty($email)){
        echo "<h1>Preencha todos os campos.</h1><br>";
        $erro = 1;
    }
    if(strlen($nome) < 5 OR strlen($nome) > 30){
        echo "<h1>O nome deve possuir no mínimo 5 e no máximo 30 caracteres.</h1><br>";
        $erro = 1;
    }
    if($nome == $u["senha"]){
        echo "<h1>O nome e a senha devem ser diferentes.</h1><br>";
        $erro = 1;
    }
    if(strlen($email) < 8 || strstr($email,'@') == FALSE){
        echo "<h1>Favor digitar seu email corretamente.</h1><br>";
        $erro = 1;
    }
    if(strlen($email) > 30){
        echo "<h1>O email deve possuir no máximo 30 caracteres.</h1><br>";
        $erro = 1;
    }

    $sql = "SELECT * FROM usuarios WHERE email = '$email';";
    $res = mysqli_query($mysqli, $sql);
    $usuarioemail = mysqli_fetch_array($res);

    if (mysqli_num_rows($res) >= 1 && $idu != $usuarioemail["id"]){
        echo "<h1>Esse e-mail pertence a outra conta.</h1><br>";
        $erro = 1;
    }

    if ($erro == 1){
        echo "<h4><a href='editar.php?idu=$idu'>Página de edição</a></h4>";
    }

    if ($erro == 0){
        $sql = "UPDATE usuarios SET nome = '$nome', email = '$email', adm = '$adm' ";
        $sql .= "WHERE id = $idu;";
        mysqli_query($mysqli,$sql);
        echo "Atualização bem-sucedida. <br>";
        header("Location: index.php");
    }
?>
</div>
