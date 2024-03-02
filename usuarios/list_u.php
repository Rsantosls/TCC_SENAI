<main>
    <!-- <h1>LISTAGEM DE USUARIOS</h1> -->
    <a class="btn btn-primary" class="nav-link" href="?page=cad_u">Cadastrar Usuários</a>

    <?php 
            $sql = "SELECT * FROM usuarios;";
            $resultado = $conexao->query($sql);
            if($resultado != null){           
                echo 
                "<table class='mt-5 table table-bordered'>
                    <thead class='text-center'>
                        <tr class='table-dark'>
                            <th scope='col'>Id</th>
                            <th scope='col'>Nome</th>
                            <th scope='col'>Data de Nascimento</th>
                            <th scope='col'>Telefone</th>
                            <th scope='col'>Email</th>
                            <th scope='col'>Situação</th>
                            <th scope='col'>Ações</th>
                        </tr>
                    </thead>";
                while($usuario = $resultado->fetch_assoc()){
                    // Verificação de situação do usuário. Em vez de alterar automaticamente, 
                    // haverá uma mensagem na listagem com os usuários irregulares.
                    $data = date('d/m/Y', strtotime($usuario['nascimento']));
                    
                    if($usuario['situacao'] == 'Normal'){$check_s = 'text-primary';}
                    else{$check_s = 'text-danger';}
                    
                    echo
                    "<tbody class='text-center'>
                        <tr> 
                            <td>{$usuario['id']}</td>      
                            <td>{$usuario['nome']}</td>
                            <td>{$data}</td>
                            <td>{$usuario['telefone']}</td>
                            <td>{$usuario['email']}</td>
                            <td class='$check_s'>{$usuario['situacao']}</td>
                            <td>
                                <button class='btn btn-success' onclick=\"location.href='?page=edt_u&id={$usuario['id']}'\">Editar</button>
                                <button class='btn btn-danger' onclick=\"location.href='?page=del_u&id={$usuario['id']}'\">Excluir</button>
                            </td>
                        </tr>
                    </tbody>";
                }
            }else{
                echo "<p class='alert alert-danger' mt-4>Não há nenhum aluno cadastrado.</p>";
            };
            echo "</table>";
        ?>
       
</main>    