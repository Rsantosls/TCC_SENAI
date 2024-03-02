<!-- <h1>CADASTRO DE LIVROS</h1> -->

<form action="?page=servicos_l" method="post" class="mt-5" enctype="multipart/form-data">
    <input type="hidden" name="acao" value="cadastrar" required>

    <!-- ROW1 -->
    <div class="row mb-3">
        <div class="col-6">
            <!-- TÍTULO -->
            <label for="titulo" class="form-label"> Nome:</label>
            <input type="text" name="titulo" placeholder="Digite o título" class="form-control" required>
        </div>
        <div class="col-6">
            <!-- IMAGEM -->
            <label for="imagem" class="form-label"> Imagem:</label>
            <input type="file" name="imagem" placeholder="Adicionar imagem" accept="image/*" class="form-control"
                required>
        </div>
    </div>

    <!-- ROW2 -->
    <div class="row mb-3">
        <div class="col-6">
            <!-- AUTOR -->
            <label for="autor" class="form-label"> Autor:</label>
            <input type="text" name="autor" placeholder="Digite o autor" class="form-control" required>
        </div>
        <div class="col-6">
            <!-- CATEGORIA -->
            <label for="categoria" class="form-label"> Categoria:</label>
            <select name="categoria" class="form-select" required>
                <option value=" " selected disabled hidden>-- escolha --</option>
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
                <option value=" " selected disabled hidden>-- escolha --</option>
                <option value="Disponivel">Disponível</option>
                <option value="Ocupado">Ocupado</option>
            </select>
        </div>
        <!-- DATA INICIO -->
        <div class="col-4">
            <label for="data_inicio" class="form-label"> Data Ínicio:</label>
            <input type="date" name="data_inicio" placeholder="Data do empréstimo" class="form-control">
        </div>

        <!-- DATA RETORNO -->
        <div class="col-4">
            <label for="data_retorno" class="form-label"> Data Retorno:</label>
            <input type="date" name="data_retorno" placeholder="Data de devolução" class="form-control">
        </div>
    </div>

    <!-- ROW4 -->
    <div class="row mb-3">
        <div class="col form-floating">
            <!-- SINOPSE -->
            <textarea name="sinopse" maxlength="500" class="form-control" placeholder="Escreva a sinopse aqui..." style="height: 150px;" ></textarea>
            <label class="mx-2 mb-5"for="sinopse"> Sinopse:</label>
        </div>
    </div>
    <button type='button' class='btn btn-success mt-3 mb-5' onclick="location.href='?page=list_l'">Voltar</button>
    <button type="submit" class="btn btn-primary mt-3 mb-5">Cadastrar</button>
</form>