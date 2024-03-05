<div class="px-3 py-2 text-light" style="background-color: #0D3973" >
    <span class="display-6">Edição de usuário</span>
</div>

<div class="card mb-5" style="border-radius: 2px !important;">
    <div class="card-body">
        <form action="?page=servicos_u" method="post" class="mt-1">
            <input type="hidden" name="acao" value="cadastrar" required>

            <!-- ROW1 -->
            <div class="row mb-3">
                <div class="col-6">
                    <!-- NOME -->
                    <label for="nome" class="form-label"><b>Nome:</b></label>
                    <input type="text" name="nome" placeholder="Digite o nome do usuário" class="form-control" required>
                </div>
                <div class="col-6">
                    <!-- EMAIL -->
                    <label for="email" class="form-label"><b>Email:</b></label>
                    <input type="email" name="email" placeholder="Digite email" class="form-control" required>
                </div>
            </div>

            <!-- ROW2 -->
            <div class="row  mb-3">
                <div class="col-3">
                    <!-- NASCIMENTO -->
                    <label for="nascimento" class="form-label"><b>Nascimento:</b></label>
                    <input type="date" name="nascimento" placeholder="Exemplo: 10/12/1970" class="form-control"
                        required>
                </div>
                <div class="col-3">
                    <!-- TELEFONE -->
                    <label for="telefone" class="form-label"><b>Tefelone:</b></label>
                    <input type="text" maxlength="11" name="telefone" placeholder="Digite o telefone: DDD+tel" class="form-control" required>
                </div>

                <div class="col-6">
                    <!-- SITUAÇÃO -->
                    <label for="situacao" class="form-label"><b>Situação:</b></label>
                    <select name="situacao" class="form-control">
                        <option value='Normal' selected>Normal</option>
                        <option value="Irregular">Irregular</option>
                    </select>
                </div>
            </div>
            <button type='button' class='btn btn-outline-dark mt-2 mb-1' onclick="location.href='?page=list_u'"><i class="bi bi-arrow-counterclockwise" style="font-size:1.25rem"></i></button>
            <button type="submit" class="btn btn-outline-primary mt-2 mb-1" style="font-size:1.25rem">Cadastrar</button>
        </form>
    </div>
</div>