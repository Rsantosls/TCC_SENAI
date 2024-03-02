<h1>CADASTRO DE USUARIOS</h1>

<form action="?page=servicos_u" method="post" class="mt-5">
    <input type="hidden" name="acao" value="cadastrar" required>

    <!-- ROW1 -->
    <div class="row mb-3">
        <div class="col-6">
            <!-- NOME -->
            <label for="nome" class="form-label"> Nome:</label>
            <input type="text" name="nome" placeholder="Digite o nome do aluno" class="form-control"  required>
        </div>
        <div class="col-6">
            <!-- EMAIL -->
            <label for="email" class="form-label"> Email:</label>
            <input type="email" name="email" placeholder="Digite email" class="form-control" required>
        </div> 
    </div>

    <!-- ROW2 -->
    <div class="row  mb-3">
        <div class="col-3">
            <!-- NASCIMENTO -->
            <label for="nascimento" class="form-label"> Nascimento:</label>
            <input type="date" name="nascimento" placeholder="Exemplo: 10/12/1970" class="form-control"required>
        </div>
        <div class="col-3">
            <!-- TELEFONE -->
            <label for="telefone" class="form-label"> Tefelone:</label>
            <input type="text" name="telefone" placeholder="Digite o telefone" class="form-control" required>
        </div>
    
        <div class="col-6">
            <!-- SITUAÇÃO -->
            <label for="situacao" class="form-label"> Situação:</label>
            <select name="situacao" class="form-control" required>
                <option value=''selected disabled hidden>-- escolha --</option>
                <option value="Normal">Normal</option>
                <option value="Irregular">Irregular</option>
            </select> 
            <!-- <input type="email" name="email" placeholder="Digite email do aluno" class="form-control" required> -->
        </div>  
    </div>
    <button type="submit" class="btn btn-primary mt-3 mb-5">Cadastrar</button>
</form>