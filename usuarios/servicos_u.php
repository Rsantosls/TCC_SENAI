<?php 
    $action = $_POST["acao"];
    
    switch($action){
        
        //Cadastramento de usuários
        case "cadastrar":
            $nome = $_POST["nome"];
            $email = $_POST["email"];
            $nascimento = $_POST["nascimento"];
            $telefone = $_POST["telefone"];
            $situacao = $_POST["situacao"];
            
            $sql = "INSERT INTO usuarios(nome, email, nascimento, telefone, situacao)
            VALUES('{$nome}', '{$email}', '{$nascimento}', '{$telefone}', '{$situacao}')";
            $resultado = $conexao->query($sql);

            if($resultado){
                echo 
                "<script>
                    alert('Usuário cadastrado com sucesso!')   
                </script>";
                echo 
                "<script>
                    location.href='?page=list_u'
                </script>";
            }else{
                printf($conexao->error);
                echo 
                "<script>
                    alert('Houve um erro ao cadastrar o usuário. Tente novamente mais tarde!')   
                </script>";
                echo 
                "<script>
                    location.href='?page=list_u'
                </script>";
            }
            break;

        //Edição de usuários
        case "editar":
            $id = $_POST["id"];
            $nome = $_POST["nome"];
            $email = $_POST["email"];
            $nascimento = $_POST["nascimento"];
            $telefone = $_POST["telefone"];
            $situacao = $_POST["situacao"];

            $sql = "UPDATE usuarios SET nome='{$nome}', email='{$email}', nascimento='{$nascimento}', telefone='{$telefone}', situacao='{$situacao}'
            WHERE id={$id};";
            $resultado = $conexao->query($sql);
            if($resultado){
                echo "<script>alert('Usuário editado com sucesso!')</script>";
                echo "<script>location.href='?page=list_u'</script>";
            }else{
                "<script>
                    alert('Houve um erro ao editar o item. Tente novamente mais tarde!')   
                </script>";
            }
            break;

        //Exclusão de alunos no banco de dados
        case "excluir":
            $id = $_POST["id"];
            $sql = "DELETE FROM usuarios WHERE id={$id};";
            $resultado = $conexao->query($sql);

            if($resultado){
                echo "<script>alert('Usuário removido com sucesso!')</script>";
                echo "<script>location.href='?page=list_u'</script>";
            }else{
                "<script>
                    alert('Houve um erro ao tentar remover o usuário. Tente novamente mais tarde!')   
                </script>";
            };
            break;

        case "buscar":
            $tipo = $_POST["tipo"]??'';
            $busca = $_POST["busca"]??'';
                
            switch($tipo){
                case "nome":
                    echo "<script>location.href='?page=list_u&tipo={$tipo}&busca={$busca}'</script>";
                    break;
                case "email":
                    echo "<script>location.href='?page=list_u&tipo={$tipo}&busca={$busca}'</script>";
                    break;
                case "situacao":
                    echo "<script>location.href='?page=list_u&tipo={$tipo}&busca={$busca}'</script>";
                    break;
                default:
                    echo "<script>location.href='?page=list_u'</script>";  
            }
    };

?>