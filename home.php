<?php 
    session_start();
    if(empty($_SESSION)){
        echo "<script>location.href='index.php'</script>";
    };
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <title>tcc - home</title>
    <style>
        .btn{
            border-radius: 2px !important;
        }
        .special {
            background-color: blueviolet !important;
            color: whitesmoke !important;
            /* font-weight: bold !important; */
        }
    </style>
</head>

<body>
    <!-- Cabeçalho -->
    <header>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark ">
            <div class="container-fluid mx-5">
                
                <a class="display-5 navbar-brand" href="home.php">Biblioteca LOGO</a>
                
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                
                <div class="collapse navbar-collapse justify-content-end align-content-center" id="navbarNavAltMarkup">                    
                    <div class="navbar-nav" id="navbar">                        
                        <a id="btn-usuario" class="btn btn-dark nav-link me-4 " style="display:flex; align-items: center;" href="?page=list_u">
                        <!-- ?page=list_u -->
                            <i class="bi bi-people text-light me-2" style="font-size: 1.5rem"></i> Usuarios
                        </a>                        
                        
                        <a id="btn-livro" class="btn btn-dark nav-link" style="display:flex; align-items: center;" href="?page=list_l">
                        <!-- ?page=list_l -->
                            <i class="bi bi-book text-light me-2" style="font-size: 1.5rem"></i> Livros
                        </a>           
                        
                        <div class="text-white mx-3 vr"></div>                        
                        
                        <span class="nav-link text-light" style="display:flex; align-items: center;">
                            <i class="bi bi-person-circle text-light me-2" style="font-size: 1.5rem"></i> Olá, <?php echo $_SESSION['operador']?>
                        </span>
                        
                        <a class="btn btn-dark nav-link" href="logout.php" style="display:flex; align-items: center;">
                            <i class="bi bi-box-arrow-right text-light me-2" style="font-size: 1.5rem"></i> SAIR 
                        </a>                                                                  
                    </div>

                </div>
            </div>
        </nav>
    </header>

    <main>
        <div class="container">
            <div class="row">
                <div class="col mt-5">
                    <?php 
                        $page = $_GET["page"] ?? "nada";
                        include("config.php");
                        switch($page){
                            
                            // usuarios
                            case "servicos_u":
                                include("usuarios/servicos_u.php");
                                include("usuarios/btn_load_u.php");
                                break;
                            case "cad_u":
                                include("usuarios/cad_u.php");
                                include("usuarios/btn_load_u.php");
                                break;
                            case "list_u":
                                include("usuarios/list_u.php");
                                include("usuarios/btn_load_u.php");
                                break;
                            case "edt_u":
                                include("usuarios/edt_u.php");
                                include("usuarios/btn_load_u.php");
                                break;
                            case "del_u":
                                include("usuarios/del_u.php");
                                include("usuarios/btn_load_u.php");
                                break;
                            
                            // livros
                            case "servicos_l":
                                include("livros/servicos_l.php");
                                include("livros/btn_load_l.php");
                                break;
                            case "cad_l":
                                include("livros/cad_l.php");
                                include("livros/btn_load_l.php");
                                break;
                            case "list_l":
                                include("livros/list_l.php");
                                include("livros/btn_load_l.php");
                                break;
                            case "edt_l":
                                include("livros/edt_l.php");
                                include("livros/btn_load_l.php");
                                break;
                            case "del_l":
                                include("livros/del_l.php");
                                include("livros/btn_load_l.php");
                                break;
                            
                            // padrão
                            default:
                                include("boasvindas.php");
                        };
                    ?>
                </div>
            </div>
        </div>
    </main>
     
    
</body>

</html>