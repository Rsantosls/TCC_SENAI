<?php 
    session_start();
    if(empty($_SESSION)){
        echo "<script>location.href='index.php'</script>";
    };
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>tcc - home</title>
</head>
<body>
    <h1>Olá, <?php echo $_SESSION['operador'] ?> </h1>
    <a href="logout.php">sair</a>
</body>
</html>
