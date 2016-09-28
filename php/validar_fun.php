<?php
include_once 'cabecalho.php';
connectDataBase();

$nome = $_POST['nome'];
$nasc = $_POST['nasc'];
$usuario = $_POST['usuario'];
$senha = md5($_POST['senha']);

$sql = "INSERT INTO `funcionarios` (`fun_nome`, `fun_data_nasc`, `fun_usuario`, `fun_senha`) VALUES ('$nome', '$nasc', '$usuario', '$senha')";

if(mysqli_query($connection, $sql)) {
    echo "<div class='container marketing'>
            <div class='container theme-showcase' role='main'>
                <h4>Funcionário cadastrado com sucesso!!</h4><br>
                <a href='cadastro_funcionarios.php'>Voltar à página de cadastro</a>
            </div>
          </div>
    ";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($connection);
}
mysqli_close($connection);
include_once 'rodape.php';
?>