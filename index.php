<?php 
    session_start();
    if(!empty($_SESSION)){
        echo "<script>location.href='home.php'</script>";
    };
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <title>Projeto TCC</title>

    <style>
        body {
            background-color: #071826;
            width: 100%;
            height: 100vh;
            align-items: center;
            justify-content: center;
            display: flex; 
            font-family: "Red Hat Display", sans-serif;           
        }

        .btn,
        .card,
        .form-control{
            border-radius: 2px !important;
        }

    </style>

</head>
<body>   
    <div class="container">
        <div class="row">
            <div class="row mb-2 justify-content-center">                                      
                <div class="col-lg-2 text-center align-self-center">
                    <img class="img-fluid" src="sys_imgs/logo_snotravx.png" >
                </div>  
                <div class="col-lg-4 text-light text-left align-self-center" style="width: fit-content; line-height: .25rem">
                    <h2 class="display-6">SNOTRA VX</h2>
                    <span class="lead"> Sistema de Biblioteca</span>                
                </div>                                   
            </div>
            <div class="col-lg-4 offset-lg-4">
                
                <div class="card">
                    <div class="card-body">                     
                        <form action="check_login.php" method="post">
                            <h3 class="mb-3 text-center">LOGIN</h3>
                            
                            <label for="usuario"><b>Operador:</b></label>
                            <input class="form-control" name="operador" type="text">

                            <label class="mt-2" for="senha"><b>Senha:</b></label>
                            <input class="form-control" name="senha" type="password">
                            
                            <button class="btn btn-primary my-3" type="submit">Entrar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>   
</body>
</html>