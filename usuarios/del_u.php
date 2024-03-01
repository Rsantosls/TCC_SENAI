<!-- <h1>EXCLUSÃO DE USUARIOS</h1> -->
<div>
    <?php 
        $id=$_GET['id'];
        $sql = "SELECT * FROM usuarios WHERE id = {$id}";
        $resultado = $conexao->query($sql);
        $usuario = $resultado->fetch_object();

        if($usuario){ 
            $data = date('d/m/Y', strtotime($usuario->nascimento));
            echo
            "<h4 class='alert alert-danger mb-3'>Tem certeza que deseja excluir este usuário?</h4>  
                <div class='card mt-4 mb-4'>    
                    <div class='card-body'>
                        <form action='?page=servicos_u' method='post'>
                        <input type='hidden' name='acao' value='excluir'>
                        <input type='hidden' name='id' value='{$usuario->id}'>
                            <p><b>Nome</b>: {$usuario->nome}</p>
                            <p><b>Data de nascimento</b>: {$data}</p>
                            <p><b>Telefone</b>: {$usuario->telefone}</p>
                            <p><b>Email</b>: {$usuario->email}</p>
                            <p><b>Situação</b>: {$usuario->situacao}</p>
                            <button type='button' class='btn btn-success' onclick=\"location.href='?page=list_u'\">Cancelar</button>
                            <button type='submit' class='btn btn-danger'>Excluir definitivamente</button>                        
                        </form>
                    </div>
                </div>";
        }else{
            echo "<h4 class='alert alert-danger mb-3'>Nenhum aluno foi encontrado.</h4> ";
        };     
    ?>
</div>
