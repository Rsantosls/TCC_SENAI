<h1>SERVIÇO DE USUARIOS</h1>

<?php 
    $action = $_POST["acao"];
    
    switch($action){
        
        //Cadastramento de usuários
        case "cadastrar":

            //$imagem = $_POST["imagem"];

            if(isset($_FILES["imagem"]) && !empty($_FILES["imagem"]))
            {
                $imagem = "imgs/".$_FILES["imagem"]["name"]; 
                move_uploaded_file( $_FILES["imagem"]["tmp_name"], $imagem);
                //echo "<script>alert('Upload de imagem realizado!')</script>";
            }else{
                $imagem = "";
            }
            //echo $imagem;
            $titulo = $_POST["titulo"];
            $autor = $_POST["autor"];
            $categoria = $_POST["categoria"];
            $situacao = $_POST["situacao"];
            $data_inicio = $_POST["data_inicio"];
            $data_retorno = $_POST["data_retorno"];
            $sinopse = substr($_POST["sinopse"], 0, 500);
            
            $sql = "INSERT INTO livros(imagem, titulo, autor, categoria, situacao, data_inicio, data_retorno, sinopse)
            VALUES('{$imagem}', '{$titulo}', '{$autor}', '{$categoria}', '{$situacao}', '{$data_inicio}', '{$data_retorno}', '{$sinopse}')";
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
            
            if(isset($_FILES["imagem"]) && !empty($_FILES["imagem"]))
            {
                unlink($old_imagem);
                echo "unlik feito.";
                $new_imagem = "imgs/".$_FILES["imagem"]["name"]; 
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
            $data_inicio = $_POST["data_inicio"];
            $data_retorno = $_POST["data_retorno"];
            $sinopse = substr($_POST["sinopse"], 0, 500);

            $sql = "UPDATE livros SET imagem='{$imagem}', titulo='{$titulo}', autor='{$autor}', categoria='{$categoria}', situacao='{$situacao}', data_inicio='{$data_inicio}', data_retorno='{$data_retorno}', sinopse='{$sinopse}'
            WHERE id={$id};";
            $resultado = $conexao->query($sql);
            //printf($conexao->error);
            if($resultado){
                echo "<script>alert('Livro editado com sucesso!')</script>";
                echo "<script>location.href='?page=list_l'</script>";
            }else{
                "<script>
                    alert('Houve um erro ao editar o Livro. Tente novamente mais tarde!')   
                </script>";
            }
        break;

        //Exclusão de alunos no banco de dados
        case "excluir":
            $id = $_POST["id"];
            $sql = "DELETE FROM livros WHERE id={$id};";
            $resultado = $conexao->query($sql);

            if($resultado){
                echo "<script>alert('Livro removido com sucesso!')</script>";
                echo "<script>location.href='?page=list_l'</script>";
            }else{
                "<script>
                    alert('Houve um erro ao tentar remover o livro. Tente novamente mais tarde!')   
                </script>";
            };
        break;
    };

?>