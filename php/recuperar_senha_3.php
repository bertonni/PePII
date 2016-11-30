<?php
require_once 'cabecalho.php';
connectDataBase();

if(isset($_POST['submeter'])) {
    if(!isset($_SESSION['username'])) {
        $_SESSION['username'] = $_POST['username'];
    }
    $username = mysqli_real_escape_string($connection, $_POST['username']);
    $pergunta = mysqli_real_escape_string($connection, $_POST['pergunta']);
    $resposta = md5($_POST['resposta']);
    // Query para saber se a resposta digitada pelo usuário corresponde à que ele salvou no momento do cadastro
    $sql = "SELECT fun_secret_question, fun_secret_answer FROM funcionarios WHERE lower(fun_usuario) = '$username' AND fun_secret_question = '$pergunta' AND fun_secret_answer = '$resposta'";

    unset($_POST['submeter']);

    $result = mysqli_query($connection, $sql);
    $rows = mysqli_num_rows($result);

    if($rows == 0) {
        if(!isset($_SESSION['respostaErrada'])) {
            $_SESSION['respostaErrada'] = true;
        }
        header("location: recuperar_senha_2.php");
    } else {
        unset($_SESSION['username']);
    }
}
?>
<div class='container marketing'>
    <div class='container theme-showcase' role='main'>
        <div id='recuperar_senha' class='page-header'>
            <a class="btn btn-info editar" href="javascript:void(0);" onclick="javascript:introJs().setOption('showProgress', true).start();">Tutorial</a>
            <h1>Recuperar Senha (Passo 3 de 3)</h1>
        </div>
        <form action="<?= $_SERVER["PHP_SELF"] ?>" method="POST">
            <div class="col-md-6">
                <label for="senha">Senha *</label>
                <input type="password" id ="senha" class="form-control" name="senha" data-step="1" data-intro="Digite aqui a nova senha a ser cadastrada" data-position='top' placeholder="Digite a nova senha">
            </div>
            <div class="col-md-6">
                <label for="confirma_senha">Confirme a Senha *</label>
                <input type="password" id ="confirma_senha" class="form-control" name="confirma_senha" data-step="2" data-intro="Confirme a senha digitada anteriormente" data-position='top' placeholder="Confirme a senha" required>
            </div>
            <div class="col-md-12">
                <input type="hidden" name="username" value="<?= $username ?>">
                <button type="submit" name="atualizar_senha" class="btn btn-primary" data-step="3" data-intro="Depois de digitar a nova senha e confirmar, clique aqui para enviar os dados e atualizar a sua senha" data-position='top'>Enviar</button>
                <a href="login.php" class="btn btn-danger" data-step="4" data-intro="Clique aqui para cancelar a recuperação de senha (Você será redirecionado para a página de login)" data-position='top'>Cancelar</a>
            </div>
        </form>
    </div> <!-- div.container theme-showcase -->
</div> <!-- div.container marketing -->
<script type="text/javascript">
    $('form').on('submit', function () {
        if($(this).find('input[name="senha"]').val() != $(this).find('input[name="confirma_senha"]').val()) {
            bootbox.alert("Senhas digitadas não conferem!!");
            $('#senha').focus();
            return false;
        }
    });
</script>
<?php
if(isset($_POST['atualizar_senha'])) {
    $usuario = mysqli_real_escape_string($connection, $_POST['username']);
    $senha = mysqli_real_escape_string($connection, $_POST['senha']);
    $senha = md5($senha);

    $sql = "UPDATE `funcionarios` SET `fun_senha`='$senha' WHERE `funcionarios`.`fun_usuario`='$usuario'";

    // Se a query foi executada com sucesso, seta a variável de sessão 'senhaAtualizada' para exibir uma mensagem dizendo que a senha foi alterada com sucesso
    if(mysqli_query($connection, $sql)) {
        ?>
        <div class='container marketing'>
            <div class='container theme-showcase' role='main'>
                <div class="col-md-6 alert alert-success">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    <h4>Sucesso!</h4>
                    Sua senha foi atualizada com sucesso!
                    <a href="login.php" class="btn btn-primary voltar" >Fazer o login</a>
                </div>
            </div>
        </div>
        <?php
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($connection);
    }
}
disconnectDataBase();
require_once 'rodape.php';
?>