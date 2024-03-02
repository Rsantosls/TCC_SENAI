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
    <title>tcc - home</title>
</head>

<body>
    <!-- Cabeçalho -->
    <header>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark ">
            <div class="container-fluid">
                <a class="display-5 navbar-brand" href="home.php">Biblioteca</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                    <div class="navbar-nav">
                        <!-- <a class="nav-link" href="?page=cadastro">Usuarios</a> -->
                        <div class="dropdown">
                            <button class="nav-link btn btn-secondary dropdown-toggle" type="button"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                Usuários
                            </button>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="?page=cad_u">Cadastro</a></li>
                                <li><a class="dropdown-item" href="?page=list_u">Listagem</a></li>
                            </ul>
                        </div>
                        <!-- <a class="nav-link" href="?page=lista">Livros</a> -->
                        <div class="dropdown">
                            <button class="nav-link btn btn-secondary dropdown-toggle" type="button"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                Livros
                            </button>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="?page=cad_l">Cadastro</a></li>
                                <li><a class="dropdown-item" href="?page=list_l">Listagem</a></li>
                            </ul>
                        </div>                       
                            <span class="nav-link text-light">| Olá, <?php echo $_SESSION['operador'] ?></span>
                            <a class="nav-link" href="logout.php">SAIR</a>                                        
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
                                break;
                            case "cad_u":
                                include("usuarios/cad_u.php");
                                break;
                            case "list_u":
                                include("usuarios/list_u.php");
                                break;
                            case "edt_u":
                                include("usuarios/edt_u.php");
                                break;
                            case "del_u":
                                include("usuarios/del_u.php");
                                break;
                            
                            // livros
                            case "servicos_l":
                                include("livros/servicos_l.php");
                                break;
                            case "cad_l":
                                include("livros/cad_l.php");
                                break;
                            case "list_l":
                                include("livros/list_l.php");
                                break;
                            case "edt_l":
                                include("livros/edt_l.php");
                                break;
                            case "del_l":
                                include("livros/del_l.php");
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