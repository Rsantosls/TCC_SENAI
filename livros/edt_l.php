<!-- <h1>EDIÇÃO DE LIVROS</h1> -->

<?php 
    $id=$_GET['id'];
    $sql = "SELECT * FROM livros WHERE id = {$id}";
    $resultado = $conexao->query($sql);
    $livro = $resultado->fetch_object();   
?>
<form action="?page=servicos_l" method="post" class="mt-5" enctype="multipart/form-data">
    <input type="hidden" name="acao" value="editar">
    <input type="hidden" name="id" value="<?php echo $id; ?>">
    <input type="hidden" name="old_imagem" value="<?php echo $livro->imagem; ?>">

    <div class="row">
        <!-- AREA DE IMAGEM -->
        <div class="col-4" style="max-width:320px; max-height:300px;">
            <img class="img-thumbnail mb-5" src="<?php echo $livro->imagem; ?>">
        </div>

        <!-- AREA DE FORMULÁRIO -->
        <div class="col-8">

            <!-- ROW1 -->
            <div class="row mb-3">
                <div class="col-6">
                    <!-- TÍTULO -->
                    <label for="titulo" class="form-label"> Nome:</label>
                    <input type="text" name="titulo" placeholder="Digite o título" class="form-control"
                        value="<?php echo $livro->titulo; ?>" required>
                </div>
                <div class="col-6">
                    <!-- AUTOR -->
                    <label for="autor" class="form-label"> Autor:</label>
                    <input type="text" name="autor" placeholder="Digite o autor" class="form-control"
                        value="<?php echo $livro->titulo; ?>" required>
                </div>
            </div>

            <!-- ROW2 -->
            <div class="row mb-3">
                <div class="col-6">
                    <!-- IMAGEM -->
                    <label for="imagem" class="form-label"> Imagem:</label>
                    <input type="file" name="imagem" placeholder="Adicionar imagem" accept="image/*"
                        class="form-control">
                </div>
                <div class="col-6">
                    <!-- CATEGORIA -->
                    <label for="categoria" class="form-label"> Categoria:</label>
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
                <div class="col-4">
                    <!-- SITUAÇÃO -->
                    <label for="situacao" class="form-label"> Situação:</label>
                    <select name="situacao" class="form-select" required>
                        <option value="<?php echo $livro->situacao; ?>" selected hidden><?php echo $livro->situacao; ?>
                        </option>
                        <option value="Disponivel">Disponível</option>
                        <option value="Ocupado">Ocupado</option>
                    </select>
                </div>
                <!-- DATA INICIO -->
                <div class="col-4">
                    <label for="data_inicio" class="form-label"> Data Ínicio:</label>
                    <input type="date" name="data_inicio" placeholder="Data do empréstimo" class="form-control"
                        value="<?php echo $livro->data_inicio; ?>">
                </div>

                <!-- DATA RETORNO -->
                <div class="col-4">
                    <label for="data_retorno" class="form-label"> Data Retorno:</label>
                    <input type="date" name="data_retorno" placeholder="Data de devolução" class="form-control"
                        value="<?php echo $livro->data_retorno; ?>">
                </div>                              
            </div>
            <!-- ROW4 -->
            <div class="row">                   
                <div class="col">
                    <!-- SINOPSE -->
                    <label for="sinopse">Sinopse:</label>
                    <textarea name="sinopse" maxlength="500" class="form-control" placeholder="Escreva a sinopse aqui..." style="height: 150px;"><?php echo $livro->sinopse;
                    ?></textarea>
                </div>
            </div>
            <button type='button' class='btn btn-success mt-3 mb-5' onclick="location.href='?page=list_l'">Voltar</button>
            <button type="submit" class="btn btn-primary mt-3 mb-5">Concluir</button>
        </div>
    </div>

</form>