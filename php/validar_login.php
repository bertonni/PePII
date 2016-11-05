
<?php
require_once 'cabecalho.php';
// Conexão com o banco de dados
connectDataBase();

// Salva o login e senha digitados pelo usuário no formulário de login
$usuario = $_POST['usuario'];
$senha = md5($_POST['senha']); // Aplica a função HASH para a senha

// Elimina qualquer caractere que não seja letra(maiúscula e minúscula) e número das variáveis de usuário e senha
$usuario = preg_replace('/[^[:alnum:]_]/', '',$usuario);
$senha = preg_replace('/[^[:alnum:]_]/', '',$senha);

// Consulta para buscar no banco usuário e senha que sejam iguais aos digitados no formulário de login, além do papel(role) do funcionário
$sql = "SELECT fun_usuario, fun_senha, fun_role FROM funcionarios WHERE fun_usuario = '$usuario' AND fun_senha = '$senha'";
$result = mysqli_query($connection, $sql);

// Recebe o número de linhas retornados da consulta
$rows = mysqli_num_rows($result);

// Transforma o resultado num array associativo (os índices são os campos da tabela)
$result = mysqli_fetch_assoc($result);
$role = $result['fun_role'];

// Se o número de linhas retornadas da consulta for diferente de zero, ou seja, se os dados digitados no formulário de login batem com os
// dados cadastrados no banco, vai tirar da sessão a variável '$_SESSION['login_incorreto']' e vai checar se a variável de sessão que salva
// o nome do funcionário está setada. Se não estiver, seta a variável e o valor dela é atribuído como o nome de usuário do funcionário que
// está fazendo o login
if($rows != 0) {
    unset($_SESSION['login_incorreto']);
    if(!isset($_SESSION['usuario'])) {
        $_SESSION['usuario'] = $usuario;
        // Se o papel do usuário que está fazendo o login for "admin", seta a variável de sessão '$_SESSION['admin']'
        if($role == "admin") {
          $_SESSION['admin'] = "admin";
        }
        // Redireciona para a página home
        header("location: home.php");
    }
} else {
    // Se os dados preenchidos no formulário não existirem no banco de dados, seta a variável de "login incorreto", que servirá para exibir
    // a mensagem de usuário ou senha incorretos na página de login
    if(!isset($_SESSION['login_incorreto'])) {
        $_SESSION['login_incorreto'] = true;
    }
    // Redireciona para a página de login
    header("location: login.php");
}

?>

<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
<!-- <script src="../../assets/js/ie10-viewport-bug-workaround.js"></script> -->
<?php
disconnectDataBase();
require_once 'rodape.php';
?>