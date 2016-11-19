<?php
require_once 'cabecalho.php';
// Conexão com o banco de dados
connectDataBase();

$funcionario = $_SESSION['usuario'];

// Consulta para pegar o id do funcionário (para salvar na tabela de agendamentos de consultas mais abaixo)
$sql = "SELECT fun_id FROM funcionarios WHERE fun_usuario='$funcionario'";
$result = mysqli_query($connection, $sql);
$arr = mysqli_fetch_array($result);

$idFuncionario = $arr['fun_id'];
$idPaciente = $_POST['id'];
$data = $_POST['data_consulta'];
$hora = $_POST['hora_consulta'];
$status = "Agendada";
$medico = $_POST['medico'];
$especialidade = $_POST['especialidade'];

//Consulta para pegar o nome do paciente que está marcando a consulta para exibir uma mensagem personalizada quando a consulta for marcada
$sql = "SELECT pac_nome FROM pacientes WHERE pac_id='$idPaciente'";
$result = mysqli_query($connection, $sql);
$arr = mysqli_fetch_array($result);

$paciente = $arr['pac_nome'];

// Consulta para saber se já existe um agendamento para a data/hora pretendida
$sql = "SELECT * FROM agendamentos WHERE agd_data = '$data' AND agd_hora = '$hora' AND agd_pac_id = '$idPaciente'";
$result = mysqli_query($connection, $sql);
$rows1 = mysqli_num_rows($result);

$sql = "SELECT * FROM agendamentos WHERE agd_data = '$data' AND agd_hora = '$hora' AND agd_medico = '$medico' AND agd_pac_id <> '$id_paciente'";
$result = mysqli_query($connection, $sql);
$rows2 = mysqli_num_rows($result);

// Se não existir agendamento para essa data/hora, agenda a consulta normalmente.
if($rows1 == 0 && $rows2 == 0) {
	$sql = "INSERT INTO `agendamentos` (`agd_fun_id`, `agd_pac_id`, `agd_data`, `agd_hora`, `agd_status`, `agd_medico`, `agd_especialidade`) VALUES ('$idFuncionario', '$idPaciente', '$data', '$hora', '$status', '$medico', '$especialidade')";

	if(mysqli_query($connection, $sql)) {
	    echo "<div class='container marketing'>
	            <div class='container theme-showcase' role='main'>
	                <h2>Consulta do(a) senhor(a) " . $paciente . " foi marcada com sucesso!!</h2><br>
	                <a href='paciente.php?id=" . $idPaciente . "' class='btn btn-warning voltar'>Voltar</a>
	            </div>
	          </div>
	    ";
	} else {
	    echo "Error: " . $sql . "<br>" . mysqli_error($connection);
	}
} else {
	// Se existir um agendamento para a data/hora desejadas, exibe mensagem de erro!
	echo "<div class='container marketing'>
	            <div class='container theme-showcase' role='main'>
	                <h2>Já existe uma consulta marcada para a data, horário e médico desejados.<br> Por favor, selecione outra data ou horário!!</h2><br>
	                <button class='btn btn-warning voltar' onClick='history.go(-1)'>Voltar</button>
	            </div>
	      </div>
	    ";
}
disconnectDataBase();
require_once 'rodape.php';
?>