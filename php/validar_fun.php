
<?php
require_once 'cabecalho.php';
//Conexão com o banco de dados
connectDataBase();

// Salva os dados preenchidos no formulário de cadastro de funcionários em variáveis para incluir no banco de dados
$nome = $_POST['nome'];
$nasc = $_POST['nasc'];
$usuario = $_POST['usuario'];
$senha = md5($_POST['senha']);
$role = "funcionario";

// Query para inserir os dados do funcionário no banco de dados
$sql = "INSERT INTO `funcionarios` (`fun_nome`, `fun_data_nasc`, `fun_usuario`, `fun_senha`, `fun_role`) VALUES ('$nome', '$nasc', '$usuario', '$senha', '$role')";

// Se a inserção foi bem sucedida, exibe uma mensagem com um link para voltar à página de cadastro
if(mysqli_query($connection, $sql)) {
    echo "<div class='container marketing'>
            <div class='container theme-showcase' role='main'>
                <h2>Funcionário cadastrado com sucesso!!</h2><br>
                <button class='btn btn-warning voltar' onClick='history.go(-1)'>Voltar</button>
                <button class='btn btn-primary voltar' onClick='history.go(-2)'>Ir à Página Inicial</button>
            </div>
          </div>
    ";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($connection);
}
disconnectDataBase();
require_once 'rodape.php';
?>