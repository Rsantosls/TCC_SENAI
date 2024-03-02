<!-- <h1>EDIÇÃO DE USUÁRIOS</h1> -->

<?php 
    $id=$_GET['id'];
    $sql = "SELECT * FROM usuarios WHERE id = {$id}";
    $resultado = $conexao->query($sql);
    $usuario = $resultado->fetch_object();   
?>
<form action="?page=servicos_u" method="post" class="mt-5">
    <!-- ROW1 -->
    <div class="row mb-3">
        <input type="hidden" name="acao" value="editar">
        <input type="hidden" name="id" value="<?php echo $id; ?>">
        <div class="col-6">
            <!-- NOME -->
            <label for="nome" class="form-label"> Nome:</label>
            <input type="text" name="nome" placeholder="Digite o nome do aluno" class="form-control"
                value="<?php echo $usuario->nome; ?>" required>
        </div>
        <div class="col-6">
            <!-- EMAIL -->
            <label for="email" class="form-label"> Email:</label>
            <input type="email" name="email" placeholder="Digite email" class="form-control " ]
                value="<?php echo $usuario->email; ?>" required>
        </div>
    </div>

    <!-- ROW2 -->
    <div class="row  mb-3">
        <div class="col-3">
            <!-- NASCIMENTO -->
            <label for="nascimento" class="form-label"> Nascimento:</label>
            <input type="date" name="nascimento" placeholder="Exemplo: 10/12/1970" class="form-control"
                value="<?php echo $usuario->nascimento; ?>" required>
        </div>
        <div class="col-3">
            <!-- TELEFONE -->
            <label for="telefone" class="form-label"> Tefelone:</label>
            <input type="text" name="telefone" placeholder="Digite o telefone" class="form-control"
                value="<?php echo $usuario->telefone; ?>" required>
        </div>

        <div class="col-6">
            <!-- SITUAÇÃO -->
            <label for="situacao" class="form-label"> Situação:</label>
            <select name="situacao" class="form-select" required>
                <option value="<?php echo $usuario->situacao; ?>" selected hidden><?php echo $usuario->situacao; ?>
                </option>
                <option value="Normal">Normal</option>
                <option value="Irregular">Irregular</option>
            </select>
            <!-- <input type="email" name="email" placeholder="Digite email do aluno" class="form-control" required> -->
        </div>
    </div>
    <button type='button' class='btn btn-success mt-3 mb-5' onclick="location.href='?page=list_u'">Voltar</button>
    <button type="submit" class="btn btn-primary mt-3 mb-5">Concluir</button>
</form>