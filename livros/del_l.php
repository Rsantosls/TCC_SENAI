<div>
    <?php 
        $id=$_GET['id'];
        $sql = "SELECT * FROM livros WHERE id = {$id}";
        $resultado = $conexao->query($sql);
        $livro = $resultado->fetch_object();

        if($livro){ 
            $data_i = $livro->data_inicio;
            $data_r = $livro->data_retorno;   
            if($data_i == "0001-01-01"){$data_i = '--';}
            else{$data_i = date('d/m/Y', strtotime($livro->data_inicio));}
            if($data_r == "0001-01-01"){$data_r = '--';}
            else{$data_r = date('d/m/Y', strtotime($livro->data_retorno));}
            $sinopse = substr($livro->sinopse, 0, 100);
            echo
            "<h4 class='alert alert-danger mb-3'>Tem certeza que deseja excluir este livro?</h4>  
                <div class='card mt-4 mb-4'>    
                    <div class='card-body'>
                        <form action='?page=servicos_l' method='post'>
                            <div class='row'>
                                <div class='col-6' style='max-width:220px; max-height:200px;'>                               
                                    <img class='img-thumbnail mb-5' src='{$livro->imagem}'>                            
                                </div>
                                <div class='col-6'>
                                    <input type='hidden' name='acao' value='excluir'>
                                    <input type='hidden' name='id' value='{$livro->id}'>
                                    <input type='hidden' name='imagem' value='{$livro->imagem}'>
                                    <p><b>Nome</b>: {$livro->titulo}</p>
                                    <p><b>Autor</b>: {$livro->autor}</p>
                                    <p><b>Categoria</b>: {$livro->categoria}</p>
                                    <p><b>Sinopse</b>: {$sinopse}</p>
                                    <p><b>Situação</b>: {$livro->situacao}</p>
                                    <p><b>Usuário</b>: {$livro->usuario}</p>
                                    <p><b>Data de Entrega</b>: {$data_i}</p>
                                    <p><b>Data de Retorno</b>: {$data_r}</p>
                                    <button type='button' class='btn btn-outline-primary' onclick=\"location.href='?page=list_l'\">Cancelar</button>
                                    <button type='submit' class='btn btn-outline-danger'>Excluir definitivamente</button>   
                                </div>
                            </div>                                         
                        </form>
                    </div>
                </div>";
        }else{
            echo "<h4 class='alert alert-danger mb-3'>Nenhum aluno foi encontrado.</h4> ";
        };     
    ?>
</div>