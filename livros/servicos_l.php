<!-- <h1>SERVIÇO DE USUARIOS</h1> -->

<?php 
    $action = $_POST["acao"];
    
    switch($action){
        
        //Cadastramento de usuários
        case "cadastrar":

            if(isset($_FILES["imagem"]) && !empty($_FILES["imagem"]))
            {
                $imagem = "imgs/".$_FILES["imagem"]["name"]; 
                move_uploaded_file( $_FILES["imagem"]["tmp_name"], $imagem);
            }else{
                $imagem = "";
            }
            $titulo = $_POST["titulo"];
            $autor = $_POST["autor"];
            $categoria = $_POST["categoria"];
            $situacao = $_POST["situacao"];
            $usuario = $_POST["usuario"];
            $data_inicio = $_POST["data_inicio"];
            $data_retorno = $_POST["data_retorno"];
            $sinopse = substr($_POST["sinopse"], 0, 500);
            
            $sql = "INSERT INTO livros(imagem, titulo, autor, categoria, situacao, usuario, data_inicio, data_retorno, sinopse)
            VALUES('{$imagem}', '{$titulo}', '{$autor}', '{$categoria}', '{$situacao}', '{$usuario}', '{$data_inicio}', '{$data_retorno}', '{$sinopse}')";
            $resultado = $conexao->query($sql);

            if($resultado){
                echo 
                "<script>
                    alert('Livro cadastrado com sucesso!')   
                </script>";
                echo 
                "<script>
                    location.href='?page=list_l'
                </script>";
            }else{
                printf($conexao->error);
                echo 
                "<script>
                    alert('Houve um erro ao cadastrar o livro. Tente novamente mais tarde!')   
                </script>";
                echo 
                "<script>
                    location.href='?page=list_l'
                </script>";
            }
            //printf($conexao->error);
        break;

        //Edição de usuários
        case "editar":
            $id = $_POST["id"];
            $old_imagem = $_POST["old_imagem"];
            echo "<script>alert('caminho da antiga imagem: $old_imagem!')</script>";
            
            if(isset($_FILES["imagem"]["name"]) && !empty($_FILES["imagem"]["name"]))
            {
                unlink($old_imagem);
                //echo "<script>alert('$old_imagem deletada!')</script>";
                $new_imagem = "imgs/".$_FILES["imagem"]["name"]; 
                //echo "<script>alert('$new_imagem é a nova imagem!')</script>";
                move_uploaded_file( $_FILES["imagem"]["tmp_name"], $new_imagem);
                $imagem = $new_imagem;
                //echo "<script>alert('Upload de imagem realizado!')</script>";
            }else{
                echo "unlink não feito.";
                $imagem = $old_imagem;
            }
            // echo $old_imagem;
            // echo $new_imagem;
            // echo $imagem;

            $titulo = $_POST["titulo"];
            $autor = $_POST["autor"];
            $categoria = $_POST["categoria"];
            $situacao = $_POST["situacao"];
            $usuario = $_POST["usuario"];
            $data_inicio = $_POST["data_inicio"];
            $data_retorno = $_POST["data_retorno"];
            $sinopse = substr($_POST["sinopse"], 0, 500);

            $sql = "UPDATE livros SET imagem='{$imagem}', titulo='{$titulo}', autor='{$autor}', categoria='{$categoria}', situacao='{$situacao}', usuario='{$usuario}', data_inicio='{$data_inicio}', data_retorno='{$data_retorno}', sinopse='{$sinopse}'
            WHERE id={$id};";
            $resultado = $conexao->query($sql);
            //printf($conexao->error);
            if($resultado){
                echo "<script>alert('Livro editado com sucesso!')</script>";
                echo "<script>location.href='?page=list_l'</script>";
            }else{
                echo "<script>
                    alert('Houve um erro ao editar o Livro. Tente novamente mais tarde!')   
                </script>";
            }
        break;

        //Exclusão de alunos no banco de dados
        case "excluir":
            $id = $_POST["id"];
            $imagem = $_POST["imagem"];
            echo $imagem;

            if( is_file($imagem) && !empty($imagem) )
            {
                echo "<script>alert('$imagem deletada!')</script>";
                unlink($imagem);
            }else
            {echo "<script>alert('$imagem não foi encontrada!')</script>";}

            $sql = "DELETE FROM livros WHERE id={$id};";
            $resultado = $conexao->query($sql);

            if($resultado){
                echo "<script>alert('Livro removido com sucesso!')</script>";
                //echo "<script>location.href='?page=list_l'</script>";
            }else{
                echo "<script>
                    alert('Houve um erro ao tentar remover o livro. Tente novamente mais tarde!')   
                </script>";
            };
        break;

        case "buscar":
            $tipo = $_POST["tipo"]??'';
            $busca = $_POST["busca"]??'';
               
            switch($tipo){
                case "titulo":
                    echo "<script>location.href='?page=list_l&tipo={$tipo}&busca={$busca}'</script>";
                    break;
                case "autor":
                    echo "<script>location.href='?page=list_l&tipo={$tipo}&busca={$busca}'</script>";
                    break;
                case "categoria":
                    echo "<script>location.href='?page=list_l&tipo={$tipo}&busca={$busca}'</script>";
                    break;
                default:
                    echo "<script>location.href='?page=list_l'</script>";  
            }
        
    };

?>