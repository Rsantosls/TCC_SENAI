<?php  
    $tipo = $_GET['tipo']??'';
    $busca = $_GET['busca']??'';

    if($tipo!='' && $busca !=''){
        $sql = "SELECT * FROM livros WHERE {$tipo} LIKE '{$busca}%'";
        $resultado = $conexao->query($sql);
        $qtd = $resultado->num_rows;
        if($qtd >0){
        echo "
        <div id='msg-box'>
            <i id='fechar' class='bi bi-x-square'></i>
            <p id='msg-box-txt'  class='alert alert-success' role='alert' mt-4><i class='bi bi-check-circle-fill'></i> A busca retornou os resultados de ''".$busca."''.</p>
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
        $sql = "SELECT * FROM livros;";
    } 
?>


<div class="row g-3">

    <div class="col-2">
        <a class="btn btn-dark" class="nav-link" style="background-color: #071826 !important; border-color: #071826 !important;" href="?page=cad_l"><i class="bi bi-plus-circle"></i> Cadastrar
            Livros</a>
    </div>

    <div class="col-10">
        <form class="row g-3 justify-content-end" action="?page=servicos_l" method="post">
            <input type="text" name="acao" value="buscar" hidden>
            <div class="col-auto">
                <i id="help" data-bs-toggle="modal" data-bs-target="#helpModal" style="font-size:1.5rem"
                    class="bi bi-question-circle"></i>
            </div>
            <div class="col-5">
                <input type="text" name="busca" class="form-control" placeholder="Escreva o que deseja buscar..."
                    area-label="busca">
            </div>
            <div class="col-2">
                <select name="tipo" class="form-select" area-label="tipo" required>
                    <option value=" " selected disabled hidden>-- Tipo --</option>
                    <option value="titulo">Título</option>
                    <option value="autor">Autor</option>
                    <option value="categoria">Categoria</option>
                </select>
            </div>
            <div class="col-auto">
                <button class="btn btn-dark" style="background-color: #071826 !important; border-color: #071826 !important;" type="submit"><i class="bi bi-search"></i> Buscar</button>
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
                        <th scope='col'>Imagem</th>
                        <th scope='col'>Título</th>
                        <th scope='col'>Autor</th>
                        <th scope='col'>Categoria</th>
                        <th scope='col'>Sinopse</th>
                        <th scope='col'>Situação</th>
                        <th scope='col'>Usuário</th>
                        <th scope='col'>Entrega</th>
                        <th scope='col'>Retorno</th>
                        <th scope='col'>Ações</th>
                    </tr>
                </thead>";
            while($livro = $resultado->fetch_assoc()){
                // Verificaçãoes:
                
                // Data vazia 
                $data_i = $livro['data_inicio'];
                $data_r = $livro['data_retorno'];   
                if($data_i == "0000-00-00"){$data_i = '--';}
                else{$data_i = date('d/m/Y', strtotime($livro['data_inicio']));}
                if($data_r == "0000-00-00"){$data_r = '--';}
                else{$data_r = date('d/m/Y', strtotime($livro['data_retorno']));}
                
                // Disponibilidade
                if($livro["situacao"]== "Disponivel"){$disponibilidade = 'text-primary';}
                else{$disponibilidade = 'text-danger';}

                // Em Atraso
                date_default_timezone_set("America/Sao_Paulo");                             
                $format = "d/m/Y";
                $data_hoje = date($format);
                $d_hoje = date_create_from_format($format, $data_hoje);
                $d_r = date_create_from_format($format, $data_r);
                
                if( ($data_r == "--") || ($d_r > $d_hoje)){
                    $atraso = 'table-light';}
                else{
                    $atraso = 'table-danger';}
        
                // Redução de texto da sinopse
                $sinopse = substr($livro['sinopse'], 0, 100);
    
                echo
                "<tbody class='text-center'>
                    <tr class='$atraso'> 
                        <td>{$livro['id']}</td>      
                        <td><img style='object-fit: cover; object-position: top' src='{$livro['imagem']}' width='75' height='75'></td>
                        <td>{$livro['titulo']}</td>
                        <td>{$livro['autor']}</td>
                        <td>{$livro['categoria']}</td>
                        <td>{$sinopse}...</td>
                        <td class='$disponibilidade'>{$livro['situacao']}</td>
                        <td>{$livro['usuario']}</td>
                        <td>{$data_i}</td>
                        <td>{$data_r}</td>
                        <td>
                            <div class='btn-group-vertical' role='group' aria-label='Vertical button group'>
                                <button class='btn btn-outline-primary' onclick=\"location.href='?page=edt_l&id={$livro['id']}'\">Editar</button>
                                <button class='btn btn-outline-danger' onclick=\"location.href='?page=del_l&id={$livro['id']}'\">Excluir</button>
                            </div>
                        </td>
                    </tr>
                </tbody>";
            }
        }else{
            echo "<p class='alert alert-danger' mt-4><i class='bi bi-x-circle-fill'></i> Não há nenhum livro cadastrado.</p>";
        };
        echo "</table>";
    ?>

<!-- Modal -->
<div class="modal fade" id="helpModal" tabindex="-1" aria-labelledby="helpModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="helpModalLabel">Categorias</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <ul class="list-group">
                    <li class="list-group-item">Drama</li>
                    <li class="list-group-item">Terror</li>
                    <li class="list-group-item">Fantasia</li>
                    <li class="list-group-item">Ficção Científica</li>
                    <li class="list-group-item">História em Quadrinhos</li>
                    <li class="list-group-item">Outros</li>
                </ul>
            </div>
        </div>
    </div>
</div>

<script>
function close() {
    var msg_div = document.getElementById("msg-box")
    msg_div.style.display += "none";
    }
    document.getElementById("fechar").addEventListener("click", close);
</script>