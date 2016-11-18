
<?php
require_once 'cabecalho.php';
// Conexão com o banco de dados
connectDataBase();

// Salva os dados preenchidos no formulário em variáveis para inserir no banco de dados
$id = $_POST['pac_id'];
$nome = strtoupper($_POST['nome']);
$rg = $_POST['rg'];
$cpf = $_POST['cpf'];
$endereco = strtoupper($_POST['endereco']);
$nasc = explode("/", $_POST['nasc']);
$dia = $nasc[0];
$mes = $nasc[1];
$ano = $nasc[2];
$nasc = $ano . "-" . $mes . "-" . $dia;
$email = $_POST['email'];
$fone1 = $_POST['fone1'];
if(isset($_POST['fone2']) && $_POST['fone2'] != ""){
	$fone2 = $_POST['fone2'];
} else {
	$fone2 = "Não Cadastrado";
}
// Query para inserção dos dados do paciente no banco de dados
$sql = "UPDATE `pacientes` SET `pac_nome`='$nome',`pac_endereco`='$endereco',`pac_rg`='$rg',`pac_cpf`='$cpf',`pac_email`='$email',`pac_data_nasc`='$nasc',`pac_telefone_1`='$fone1',`pac_telefone_2`='$fone2' WHERE `pac_id`='$id'";

// Se a query foi executada com sucesso, exibe uma mensagem e um link para voltar à página do paciente
if(mysqli_query($connection, $sql)) {
	echo "<div class='container marketing'>
			<div class='container theme-showcase' role='main'>
				<div id='cadastro_pac' class='page-header'>
				<h2>Dados alterados com sucesso!!</h2>
			</div>
				<button class='btn btn-warning voltar' onClick='history.go(-2)'>Voltar</button>
		  	</div>
		  </div>
	";
} else {
	echo "Error: " . $sql . "<br>" . mysqli_error($connection);
}
disconnectDataBase();
require_once 'rodape.php';
?>