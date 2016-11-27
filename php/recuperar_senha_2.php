<?php
require_once 'cabecalho.php';
connectDataBase();
if(isset($_POST['enviar'])) {
    unset($_POST['enviar']);
    // Salva o nome do usuário na variável $username
    $username = strtolower($_POST['username']);
    // Consulta para saber se há um funcionário com esse nome de usuário cadastrado no banco de dados
    $sql = "SELECT fun_usuario FROM funcionarios WHERE lower(fun_usuario) = '$username'";
    $result = mysqli_query($connection, $sql);
    // Salva o número de linhas retornadas da consulta
    $rows = mysqli_num_rows($result);

    // Se o número de linhas for igual a 0, não foi encontrado nenhum funcionário com o nome de usuário digitado
    if($rows == 0) {
        // Seta a variável de sessão para exibir uma mesnagem de alerta na página anterior
        if(!isset($_SESSION['usuarioNaoExiste'])) {
            $_SESSION['usuarioNaoExiste'] = true;
        }
        header("location: recuperar_senha.php");
    }

    // Se o usuário existe, busca a pergunta cadastrada no banco de dados para exibir no formulário
    $sql = "SELECT fun_secret_question FROM funcionarios WHERE lower(fun_usuario) = '$username'";
    $result = mysqli_query($connection, $sql);
    $array = mysqli_fetch_array($result);
    $pergunta = $array['fun_secret_question'];
} else {
    // Faz a mesma consulta anterior, mas só entrará aqui se a resposta que foi digitada foi errada
    $username = $_SESSION['username'];
    $username = strtolower($username);
    $sql = "SELECT fun_secret_question FROM funcionarios WHERE lower(fun_usuario) = '$username'";
    $result = mysqli_query($connection, $sql);
    $array = mysqli_fetch_array($result);
    $pergunta = $array['fun_secret_question'];
    unset($_SESSION['username']);
}
?>
<div class='container marketing'>
    <div class='container theme-showcase' role='main'>
        <div id='recuperar_senha' class='page-header'>
            <a class="btn btn-info editar" href="javascript:void(0);" onclick="javascript:introJs().setOption('showProgress', true).start();">Tutorial</a>
            <h1>Recuperar Senha (Passo 2 de 3)</h1>
        </div>
        <form action="recuperar_senha_3.php" method="POST">
            <?php
            if(isset($_SESSION['respostaErrada'])) {
                ?>
                <div class="col-md-6 alert alert-danger">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    <h4>Atenção!</h4>
                    A resposta que você deu está incorreta!
                </div>
                <div class="col-md-7">
                </div>
                <?php
                unset($_SESSION['respostaErrada']);
            }
            ?>
            <div class="col-md-6">
                <label for="pergunta">Pergunta Secreta</label>
                <input type="text" value="<?= $pergunta ?>" id ="pergunta" class="form-control" name="pergunta" data-step="1" data-intro="Aqui está a pergunta escolhida no momento do cadastro" data-position='top' readonly="readonly">
            </div>
            <div class="col-md-6">
                <label for="resposta">Resposta</label>
                <input type="password" id ="resposta" class="form-control" name="resposta" data-step="2" data-intro="Digite aqui a resposta para a pergunta cadastrada" data-position='top' placeholder="Digite a resposta para a pergunta" required>
            </div>
            <div class="col-md-12">
                <input type="hidden" name="username" value="<?= $username ?>">
                <button type="submit" name="submeter" class="btn btn-primary" data-step="3" data-intro="Depois de digitar a reposta, clique aqui para enviar os dados e ter acesso à página de recuperação de senha" data-position='top'>Enviar</button>
                <a href="login.php" class="btn btn-danger" data-step="4" data-intro="Clique aqui para cancelar a recuperação de senha (Você será redirecionado para a página de login)" data-position='top'>Cancelar</a>
            </div>
        </form>
    </div> <!-- div.container theme-showcase -->
</div> <!-- div.container marketing -->
<?php
disconnectDataBase();
require_once 'rodape.php';
?>