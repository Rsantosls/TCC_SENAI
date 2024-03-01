<h1>CADASTRO DE ALUNO</h1>

<form action="?page=servicos_u" method="post" class="mt-5">
    <input type="hidden" name="acao" value="cadastrar" required>

    <!-- ROW1 -->
    <div class="row mb-3">
        <div class="col-6">
            <!-- NOME -->
            <label for="nome" class="form-label"> Nome:</label>
            <input type="text" name="nome" placeholder="Digite o nome do aluno" class="form-control" required>
        </div>
        <div class="col-6">
            <!-- NASCIMENTO -->
            <label for="nascimento" class="form-label"> Nascimento:</label>
            <input type="date" name="nascimento" placeholder="Exemplo: 10/12/1970" class="form-control" required>
        </div>
    </div>

    <!-- ROW2 -->
    <div class="row  mb-3">
        <div class="col-6">
            <!-- TELEFONE -->
            <label for="senha" class="form-label"> Senha:</label>
            <input type="text" name="senha" placeholder="Digite a senha" class="form-control" required>
        </div>
        <div class="col-6">
            <!-- EMAIL -->
            <label for="email" class="form-label"> Email:</label>
            <input type="email" name="email" placeholder="Digite email do aluno" class="form-control" required>
        </div>  
    </div>

    <!-- ROW3 -->
    <div class="row mb-3">       
        <div class="col-6">
            <!-- SITUAÇÃO -->
            <label for="email" class="form-label"> Email:</label>
            <input type="email" name="email" placeholder="Digite email do aluno" class="form-control" required>
        </div> 
    </div>

    <button type="submit" class="btn btn-primary mt-3 mb-5">Cadastrar</button>
</form>