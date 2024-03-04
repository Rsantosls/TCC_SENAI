<?php 
    $tipo = $_GET['tipo']??'';
    $busca = $_GET['busca']??'';

    if($tipo!='' && $busca !=''){
        $sql = "SELECT * FROM usuarios WHERE {$tipo} LIKE '{$busca}%'";
        $resultado = $conexao->query($sql);
        $qtd = $resultado->num_rows;
        if($qtd >0){
        echo "
        <div id='msg-box'>
            <i id='fechar' class='bi bi-x-square'></i>
            <p id='msg-box-txt' class='alert alert-success' role='alert' mt-4><i class='bi bi-check-circle-fill'></i> A busca retornou os resultados de ''".$busca."''.</p>
        </div>       
        ";}
        else{
        echo "
        <div id='msg-box'>
            <i id='fechar' class='bi bi-x-square'></i>
            <p class='alert alert-danger' mt-4><i class='bi bi-x-circle-fill'></i> A busca não retornou resultado.</p>
        </div>
        ";
        }
    }
    else{
        $sql = "SELECT * FROM usuarios;";
    } 
?>

<div class="row g-3">

    <div class="col-2">
        <a class="btn btn-primary" style="background-color: #071826 !important; border-color: #071826 !important;" class="nav-link" href="?page=cad_u"><i class="bi bi-plus-circle"></i> Cadastrar
            Usuario</a>
    </div>

    <div class="col-10">
        <form class="row g-3 justify-content-end" action="?page=servicos_u" method="post">
            <input type="text" name="acao" value="buscar" hidden>
            <div class="col-5">
                <input type="text" name="busca" class="form-control" placeholder="Escreva o que deseja buscar..."
                    area-label="busca">
            </div>
            <div class="col-2">
                <select name="tipo" class="form-select" area-label="tipo" required>
                    <option value=" " selected disabled hidden>-- Tipo --</option>
                    <option value="nome">Nome</option>
                    <option value="email">Email</option>
                    <option value="situacao">Situação</option>
                </select>
            </div>
            <div class="col-auto">
                <button class="btn btn-primary" style="background-color: #071826 !important; border-color: #071826 !important;" type="submit"><i class="bi bi-search"></i> Buscar</button>
            </div>

        </form>
    </div>
</div>

<?php 
    $resultado = $conexao->query($sql);
    if($resultado != null){           
        echo 
        "<table class='mt-2 table table-bordered align-middle'>
            <thead class='text-center'>
                <tr class='table-darkblue align-middle'>
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
            // Verificação de situação do usuário. 
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
                        <div class='btn-group' role='group'>                            
                            <button class='btn btn-outline-primary' onclick=\"location.href='?page=edt_u&id={$usuario['id']}'\">Editar</button>
                            <button class='btn btn-outline-danger' onclick=\"location.href='?page=del_u&id={$usuario['id']}'\">Excluir</button>
                        </div>
                    </td>
                </tr>
            </tbody>";
        }
    }else{
        echo "<p class='alert alert-danger' mt-4>Não há nenhum aluno cadastrado.</p>";
    };
    echo "</table>";
?>
<script>
function close() {
    var msg_div = document.getElementById("msg-box")
    msg_div.style.display += "none";
}
document.getElementById("fechar").addEventListener("click", close);
</script>