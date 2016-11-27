<?php
require_once 'cabecalho.php';
connectDataBase();
echo "<title>Recuperar Senha</title>";
?>
<div class='container marketing'>
    <div class='container theme-showcase' role='main'>
        <div id='recuperar_senha' class='page-header'>
            <a class="btn btn-info editar" href="javascript:void(0);" onclick="javascript:introJs().setOption('showProgress', true).start();">Tutorial</a>
            <h1>Recuperar Senha (Passo 1 de 3)</h1>
        </div>
        <form action="recuperar_senha_2.php" method="POST">
            <?php
            // Se o usuário digitado no input não existir, exibe uma mensagem de alerta
            if(isset($_SESSION['usuarioNaoExiste'])) {
                ?>
                <div class="col-md-6 alert alert-danger">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    <h4>Atenção!</h4>
                    O usuário que você digitou não está cadastrado no sistema!
                </div>
                <div class="col-md-7">
                </div>
                <?php
                unset($_SESSION['usuarioNaoExiste']);
            }
            ?>
            <div class="col-md-6">
                <label for="username">Usuário</label>
                <input type="text" id ="username" class="form-control" name="username" data-step="1" data-intro="Digite aqui o seu nome de usuário para o sistema identificá-lo e iniciar o processo de recuperação da senha" data-position='top' placeholder="Digite o seu nome de usuário para iniciar a de recuperação de senha" required>
            </div>
            <div class="col-md-12">
                <button type="submit" name="enviar" class="btn btn-primary" data-step="2" data-intro="Depois de digitar o nome de usuário, clique aqui para enviar os dados e responder à pergunta secreta escolhida no momento do cadastro" data-position='top'>Enviar</button>
                <a href="login.php" class="btn btn-danger" data-step="3" data-intro="Clique aqui para cancelar a recuperação de senha (Você será redirecionado para a página de login)" data-position='top'>Cancelar</a>
            </div>
        </form>
    </div> <!-- div.container theme-showcase -->
</div> <!-- div.container marketing -->
<?php
disconnectDataBase();
require_once 'rodape.php';
?>
