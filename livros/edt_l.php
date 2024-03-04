<?php 
    $id=$_GET['id'];
    $sql = "SELECT * FROM livros WHERE id = {$id}";
    $resultado = $conexao->query($sql);
    $livro = $resultado->fetch_object();   
?>

<div class="px-3 py-2 text-light" style="background-color: #0D3973" >
    <span class="display-6">Edição de Livros</span>
</div>

<div class="card mb-5" style="border-radius: 2px !important;">
    <div class="card-body">
        <form action="?page=servicos_l" method="post" class="mt-2" enctype="multipart/form-data">
            <input type="hidden" name="acao" value="editar">
            <input type="hidden" name="id" value="<?php echo $id; ?>">
            <input type="hidden" name="old_imagem" value="<?php echo $livro->imagem; ?>">         
            
            <div class="row justify-content-md-center">
                <!-- AREA DE IMAGEM -->
                
                <div class="col-4" style="max-width:320px; max-height:300px;">
                    <span><b>Capa:</b></span>
                    <img class="img-thumbnail" src="<?php echo $livro->imagem; ?>">
                </div>

                <!-- AREA DE FORMULÁRIO -->
                <div class="col-8">

                    <!-- ROW1 -->
                    <div class="row mb-3">
                        <div class="col-6">
                            <!-- TÍTULO -->
                            <label for="titulo" class="form-label"><b>Nome:</b></label>
                            <input type="text" name="titulo" placeholder="Digite o título" class="form-control"
                                value="<?php echo $livro->titulo; ?>" required>
                        </div>
                        <div class="col-6">
                            <!-- AUTOR -->
                            <label for="autor" class="form-label"><b>Autor:</b></label>
                            <input type="text" name="autor" placeholder="Digite o autor" class="form-control"
                                value="<?php echo $livro->autor; ?>" required>
                        </div>
                    </div>

                    <!-- ROW2 -->
                    <div class="row mb-3">
                        <div class="col-6">
                            <!-- IMAGEM -->
                            <label for="imagem" class="form-label"><b>Imagem:</b></label>
                            <input type="file" name="imagem" placeholder="Adicionar imagem" accept="image/*"
                                class="form-control">
                        </div>
                        <div class="col-6">
                            <!-- CATEGORIA -->
                            <label for="categoria" class="form-label"><b>Categoria:</b></label>
                            <select name="categoria" class="form-select" required>
                                <option value="<?php echo $livro->categoria; ?>" selected hidden>
                                    <?php echo $livro->categoria; ?></option>
                                <option value="Drama">Drama</option>
                                <option value="Terror">Terror</option>
                                <option value="Fantasia">Fantasia</option>
                                <option value="Ficcao Cientifica">Ficcao Cientifica</option>
                                <option value="Historia em Quadrinhos">Historia em Quadrinhos</option>
                                <option value="Outros">Outros</option>
                            </select>
                        </div>
                    </div>

                    <!-- ROW3 -->
                    <div class="row mb-3">
                        <div class="col-3">
                            <!-- SITUAÇÃO -->
                            <label for="situacao" class="form-label"><b>Situação:</b></label>
                            <select name="situacao" class="form-select" required>
                                <option value="<?php echo $livro->situacao; ?>" selected hidden><?php echo $livro->situacao; ?>
                                </option>
                                <option value="Disponivel">Disponível</option>
                                <option value="Ocupado">Ocupado</option>
                            </select>
                        </div>
                        <!-- USUARIO -->
                        <div class="col-3">
                            <label for="usuario" class="form-label"><b>Usuário:</b></label>
                            <select name="usuario" class="form-select" required>
                                <option value="<?php echo $livro->usuario; ?>" selected hidden><?php echo $livro->usuario; ?></option>
                                <!-- Catálogo de usuários -->
                                <?php
                                    $sql = "SELECT * FROM usuarios;";
                                    $resultado = $conexao->query($sql);
                                    if($resultado != null) {
                                        while($usuario = $resultado->fetch_assoc()) {
                                            if($usuario["situacao"] != "Irregular") {
                                                echo"<option value='{$usuario['nome']}'>{$usuario['nome']}</option>";
                                            }
                                        }
                                    }
                                ?>
                            </select>
                        </div>
                        <!-- DATA INICIO -->
                        <div class="col-3">
                            <label for="data_inicio" class="form-label"><b>Data Ínicio:</b></label>
                            <input type="date" name="data_inicio" placeholder="Data do empréstimo" class="form-control"
                                value="<?php echo $livro->data_inicio; ?>">
                        </div>

                        <!-- DATA RETORNO -->
                        <div class="col-3">
                            <label for="data_retorno" class="form-label"><b>Data Retorno:</b></label>
                            <input type="date" name="data_retorno" placeholder="Data de devolução" class="form-control"
                                value="<?php echo $livro->data_retorno; ?>">
                        </div>                              
                    </div>
                    <!-- ROW4 -->
                    <div class="row">                   
                        <div class="col">
                            <!-- SINOPSE -->
                            <label for="sinopse"><b>Sinopse:</b></label>
                            <textarea name="sinopse" maxlength="500" class="form-control" placeholder="Escreva a sinopse aqui..." style="height: 150px;"><?php echo $livro->sinopse;
                            ?></textarea>
                        </div>
                    </div>
                    <button type='button' class="btn btn-outline-dark mt-3" onclick="location.href='?page=list_l'"><i class="bi bi-arrow-counterclockwise" style="font-size:1.25rem"></i></button>
                    <button type="submit" class="btn btn-outline-primary mt-3" style="font-size:1.25rem">Concluir</button>
                </div>
            </div>
        </form>
    </div>
</div>