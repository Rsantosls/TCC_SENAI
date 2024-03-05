<style>
    li{
        font-size: 1.2rem;
        list-style: none;
    }
    #boasvindas_box{
        position: relative;
    }
    #marca_dagua{
        position: absolute;
        bottom: 0;
        right: 0;
        margin-right: 1%;
        opacity: 0.3;
    }
</style>

<div id="boasvindas_box" class="text-white bg-dark p-4 rounded" style="
    background-image: url(sys_imgs/home-card-background.jpg);
    background-size: cover;
    background-blend-mode: overlay;
    background-color: rgba(0,0,0,0.2);
">
    <p class="display-5">Sistema de Biblioteca <b>Snotra VX</b></p>
    <p class="lead">O Snotra é um sistema minimalista e de fácil uso para o controle de empréstimos de livros. Nessa primeira
        versão, estão disponível as seguintes funções:
        <ul class="lead">
            <li><i class="bi bi-caret-right-fill"></i> Acesso apenas para um operador, atualmente como 'Admin'</li>
            <li><i class="bi bi-caret-right-fill"></i> Cadastro, listagem, edição e exclusão de cadastros e livros</li>
            <li><i class="bi bi-caret-right-fill"></i> Filtragem básica da lista de itens</li>
            <li><i class="bi bi-caret-right-fill"></i> Upload de imagens para capas dos livros</li>
            <li><i class="bi bi-caret-right-fill"></i> Visualização de livros em atraso (destacado em vermelho)</li>
        </ul> 
    </p>
    <p class="lead mb-3">Acesse as opções da barra de navegação, clicando em <b>Usuários</b> ou <b>Livros</b>.
    </p>
    <hr class="mt-1">
    <p class="fs-6 fw-light">
        &copy 2024 Snotra Vx - Versão 1.0
    </p>
    <img id="marca_dagua" src="sys_imgs/logo_snotravx.png">
</div>