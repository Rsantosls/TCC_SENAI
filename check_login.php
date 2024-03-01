<?php 
    session_start();

    if(empty($_POST) or (empty($_POST["operador"])) or (empty($_POST["senha"]))){
        echo "<script>location.href='index.php'</script>";
    };

    include("config.php");

    $operador = $_POST["operador"];
    $senha = $_POST["senha"];

    $sql = "SELECT * FROM operadores WHERE operador='{$operador}' AND senha='{$senha}'";
    $res = $conexao->query($sql) or die($conexao->error);
    $login = $res->fetch_object();
    echo $login->operador;
    echo $login->senha;

    if($login){
        $_SESSION["operador"] = $login->operador;
        $_SESSION["senha"] = $login->senha;
        echo "<script>location.href='home.php'</script>";
    }else{
        //echo "<script>alert('{$usuario} / {$senha} /{$login->usuario}  {$login->senha}')</script>";
        echo "<script>alert('Erro ao fazer login. Tente novamente.')</script>";
        echo "<script>location.href='index.php'</script>";
    };
?>