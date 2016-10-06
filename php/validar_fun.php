<?php
require_once 'cabecalho.php';
connectDataBase();

$nome = $_POST['nome'];
$nasc = $_POST['nasc'];
$usuario = $_POST['usuario'];
$senha = md5($_POST['senha']);
$role = "funcionario";

$sql = "INSERT INTO `funcionarios` (`fun_nome`, `fun_data_nasc`, `fun_usuario`, `fun_senha`, `fun_role`) VALUES ('$nome', '$nasc', '$usuario', '$senha', '$role')";

if(mysqli_query($connection, $sql)) {
    echo "<div class='container marketing'>
            <div class='container theme-showcase' role='main'>
                <h3>Funcionário cadastrado com sucesso!!</h3><br>
                <a href='cadastro_funcionarios.php'>Voltar à página de cadastro</a>
            </div>
          </div>
    ";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($connection);
}
disconnectDataBase();
require_once 'rodape.php';
?>