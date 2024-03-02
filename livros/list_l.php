<h1>LISTAGEM DE USUARIOS</h1>

<?php 
        $sql = "SELECT * FROM livros;";
        $resultado = $conexao->query($sql);
        if($resultado != null){           
            echo 
            "<table class='mt-5 table table-bordered align-middle'>
                <thead class='text-center'>
                    <tr class='table-dark align-middle'>
                        <th scope='col'>Id</th>
                        <th scope='col'>Imagem</th>
                        <th scope='col'>Título</th>
                        <th scope='col'>Autor</th>
                        <th scope='col'>Categoria</th>
                        <th scope='col'>Sinopse</th>
                        <th scope='col'>Situação</th>
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
                    //echo "Não há atraso.<br>";
                    $atraso = 'table-light';}
                else{
                    //echo "Há atraso.<br>";
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
                        <td>{$data_i}</td>
                        <td>{$data_r}</td>
                        <td>
                            <div class='btn-group-vertical' role='group' aria-label='Vertical button group'>
                                <button class='btn btn-success' onclick=\"location.href='?page=edt_l&id={$livro['id']}'\">Editar</button>
                                <button class='btn btn-danger' onclick=\"location.href='?page=del_l&id={$livro['id']}'\">Excluir</button>
                            </div>
                        </td>
                    </tr>
                </tbody>";
            }
        }else{
            echo "<p class='alert alert-danger' mt-4>Não há nenhum livro cadastrado.</p>";
        };
        echo "</table>";
    ?>