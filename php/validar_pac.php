<?php
require_once 'cabecalho.php';
connectDataBase();

$nome = $_POST['nome'];
$endereco = $_POST['endereco'];
$rg = $_POST['rg'];
$cpf = $_POST['cpf'];
$email = $_POST['email'];
$nasc = $_POST['nasc'];
$fone1 = $_POST['fone1'];
if(isset($_POST['fone2']) && $_POST['fone2'] != ""){
	$fone2 = $_POST['fone2'];
} else {
	$fone2 = "Não Cadastrado";
}

$sql = "INSERT INTO `pacientes` (`pac_nome`, `pac_endereco`, `pac_rg`, `pac_cpf`, `pac_email`, `pac_data_nasc`, `pac_telefone_1`, `pac_telefone_2`) VALUES ('$nome', '$endereco', '$rg', '$cpf', '$email', '$nasc', '$fone1', '$fone2')";

if(mysqli_query($connection, $sql)) {
	echo "<div class='container marketing'>
			<div class='container theme-showcase' role='main'>
				<h3>Paciente cadastrado com sucesso!!</h3><br>
				<a href='cadastro_pacientes.php'>Voltar à página de cadastro</a><br>
				<a href='home.php'>Voltar à página principal</a>
		  	</div>
		  </div>
	";
} else {
	echo "Error: " . $sql . "<br>" . mysqli_error($connection);
}
disconnectDataBase();
require_once 'rodape.php';
?>