<?php
require_once 'cabecalho.php';
//Conexão com o banco de dados
connectDataBase();

// Salva os dados preenchidos no formulário de cadastro de funcionários em variáveis para incluir no banco de dados
$nome = strtoupper($_POST['nome']);
$nasc = $_POST['nasc'];
$usuario = $_POST['usuario'];
$usuario = preg_replace('/[^[:alnum:]_]/', '',$usuario);
$senha = preg_replace('/[^[:alnum:]_]/', '',$_POST['senha']);
$senha = md5($senha);
$pergunta = $_POST['pergunta_secreta'];
$resposta = md5($_POST['resposta']);
$role = "funcionario";

// Query para inserir os dados do funcionário no banco de dados
$sql = "INSERT INTO `funcionarios` (`fun_nome`, `fun_data_nasc`, `fun_usuario`, `fun_senha`, `fun_role`, `fun_secret_question`, `fun_secret_answer`) VALUES ('$nome', '$nasc', '$usuario', '$senha', '$role', '$pergunta', '$resposta')";

// Se a inserção foi bem sucedida, exibe uma mensagem com um link para voltar à página de cadastro
if(mysqli_query($connection, $sql)) {
    echo "<div class='container marketing'>
            <div class='container theme-showcase' role='main'>
                <h2>Funcionário cadastrado com sucesso!!</h2><br>
                <a href='cadastro_funcionarios.php' class='btn btn-warning voltar'>Voltar</a>
                <a href='home.php' class='btn btn-primary voltar'>Ir à Página Inicial</a>
            </div>
          </div>
    ";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($connection);
}
disconnectDataBase();
require_once 'rodape.php';
?>