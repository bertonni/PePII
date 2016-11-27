<?php
ob_start();
/*Esta página é praticamente igual à página paciente.php, a diferença básica entre elas é que, ao invéns de apenas exibir os dados,
vai haver um select no campo "Situação" na tabela das consultas, onde vai ser alterada a situação da consulta. */
require_once 'cabecalho.php';
// Conexão com o banco de dados
connectDataBase();
if(isset($_SESSION['erroConsulta']) && $_SESSION['erroConsulta']) {
?>
<script>
	$(function alerta() {
		bootbox.alert("Já existe uma consulta marcada para esse horário. Por favor, agende para outro dia/horário!");
		$('#data').focus();
	});
	alerta();
</script>
<?php
}
// Salva o ID do paciente e ID da consulta, passados pelo método GET na página anterior
if(isset($_GET['id']) && isset($_GET['consulta'])) {
	$id = $_GET['id'];
	$id_consulta = $_GET['consulta'];
}
$sql = "SELECT * FROM pacientes WHERE pac_id = '$id'";
$result = mysqli_query($connection, $sql);
$array = mysqli_fetch_array($result);
$id_paciente = $array['pac_id'];

if(isLogged()) {
	?>
	<script type="text/javascript">
		jQuery(function($) {
			$('#data').focus();
		});
	</script>
	<title>Dados do Paciente</title>
	<div class="container marketing">
		<div class="container theme-showcase" role="main">
			<div id="cadastro_pac" class="page-header">
				<h1>Dados do Paciente</h1>
			</div>
			<div class="row">
				<a href="busca.php" class="btn btn-warning voltar">Voltar</a>
				<a href="editar_dados.php?id=<?= $id ?>" class="btn btn-primary editar">Editar Dados</a>
			</br></br>
			<!-- Passando o id do paciente pelo método GET para as páginas de edição de dados e marcação de consultas -->
			<table class='table table-striped table-bordered'>
				<tr>
					<td class='td_one'><b>Nome</b></td>
					<td><?= $array['pac_nome'] ?></td>
				</tr>
				<tr>
					<td class='td_one'><b>CPF</b></td>
					<td><?= $array['pac_cpf'] ?></td>
				</tr>
				<tr>
					<td class='td_one'><b>RG</b></td>
					<td><?= $array['pac_rg'] ?></td>
				</tr>
				<tr>
					<td class='td_one'><b>Endereço</b></td>
					<td><?= $array['pac_endereco'] ?></td>
				</tr>
				<tr>
					<td class='td_one'><b>Data de Nascimento</b></td>
					<td><?= date_format(new DateTime($array['pac_data_nasc']), "d/m/Y") ?></td>
				</tr>
				<tr>
					<td class='td_one'><b>E-mail</b></td>
					<td><?= $array['pac_email'] ?></td>
				</tr>
				<tr>
					<td class='td_one'><b>Telefone 1</b></td>
					<td><?= $array['pac_telefone_1'] ?></td>
				</tr>
				<tr>
					<td class='td_one'><b>Telefone 2</b></td>
					<td><?= $array['pac_telefone_2'] ?></td>
				</tr>
			</table>
		</div>
		<div id="cadastro_pac" class="page-header">
			<h1>Histórico de Consultas</h1>
		</div>
		<div class="row">
			<?php
		/*Consulta para buscar todas as consultas do paciente, cujo id foi recebido pelo método GET no início do arquivo, em ordem
		crescente de data*/
		$sql = "SELECT * FROM agendamentos WHERE agd_pac_id = '$id' ORDER BY agd_data ASC";
		$result = mysqli_query($connection, $sql);
		?>
		<table class='table table-striped table-bordered'>
			<tr>
				<th>Data</th>
				<th>Hora</th>
				<th>Funcionário</th>
				<th>Médico</th>
				<th>Especialidade</th>
				<th>Situação</th>
			</tr>
			<?php
			/*Enquanto houver dados no array associativo '$consultas', salva os valores em variáveis, realiza a consulta
			para saber o nome do funcionário que realizou o agendamento e exibe-os na tabela*/
			while($consultas = mysqli_fetch_array($result)) {
				$funId = $consultas['agd_fun_id'];
				$id_func = $consultas['agd_fun_id'];
				$medico = $consultas['agd_medico'];
				$especialidade = $consultas['agd_especialidade'];
				$sql = "SELECT fun_usuario, fun_id FROM funcionarios WHERE fun_id = '$funId'";
				$resultado = mysqli_query($connection, $sql);
				$arr = mysqli_fetch_array($resultado);
				$funcionario = $arr['fun_usuario'];
				$idFuncionario = $arr['fun_id'];
				?>
				<tr>
					<?php
			// Checa se o id da consulta exibida é igual ao id da consulta que se deseja alterar a situação
			// Se sim, exibe um select ao invés da mensagem não editável
					if($id_consulta == $consultas['agd_id']) {
						?>
						<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">
							<td class='td_one'>
								<?php
								echo "<input type='date' class='form-control' id='data' min='" . date("Y-m-d") . "' name='data_consulta' value='" . $consultas['agd_data'] . "'>";
								?>
								<td>
									<select class="form-control" name="hora_consulta" id="hora_consulta">
										<option value="<?= $consultas['agd_hora'] ?>" selected><?= $consultas['agd_hora'] ?></option>
										<option value="08:00">08:00</option>
										<option value="08:30">08:30</option>
										<option value="09:00">09:00</option>
										<option value="09:30">09:30</option>
										<option value="10:00">10:00</option>
										<option value="10:30">10:30</option>
										<option value="11:00">11:00</option>
										<option value="11:30">11:30</option>
										<option value="12:00">12:00</option>
										<option value="12:30">12:30</option>
										<option value="13:00">13:00</option>
										<option value="13:30">13:30</option>
										<option value="14:00">14:00</option>
										<option value="14:30">14:30</option>
										<option value="15:00">15:00</option>
										<option value="15:30">15:30</option>
										<option value="16:00">16:00</option>
										<option value="16:30">16:30</option>
										<option value="17:00">17:00</option>
									</select>
								</td>

								<td><?= $funcionario ?></td>
								<td>
									<select class="form-control" name="medico" id="medico">
										<option value="<?= $consultas['agd_medico'] ?>"><?= $consultas['agd_medico'] ?></option>
										<option value="Ana Beatriz">Ana Beatriz</option>
										<option value="Mateus Nóbrega">Mateus Nobrega</option>
										<option value="Bertonni Paz">Bertonni Paz</option>
									</select>
								</td>
								<td>
									<select class="form-control" name="especialidade" id="especialidade">
									<!-- Deixa a opção que está salva no banco de dados selecionada por padrão -->
										<?php
										if($especialidade == "Endodontia") {
											?>
											<option value="Endodontia" selected>Endodontia</option>
											<?php } else { ?>
											<option value="Endodontia">Endodontia</option>
											<?php } if($especialidade == "Odontopediatria") { ?>
											<option value="Odontopediatria" selected>Odontopediatria</option>
											<?php } else { ?>
											<option value="Odontopediatria">Odontopediatria</option>
											<?php } if($especialidade == "Ortodontia") { ?>
											<option value="Ortodontia" selected>Ortodontia</option>
											<?php } else { ?>
											<option value="Ortodontia">Ortodontia</option>
											<?php } if($especialidade == "Periodontia") { ?>
											<option value="Periodontia" selected>Periodontia</option>
											<?php } else { ?>
											<option value="Periodontia">Periodontia</option>
											<?php } if($especialidade == "Prótese Dentária") { ?>
											<option value="Prótese Dentária" selected>Prótese Dentária</option>
											<?php } else { ?>
											<option value="Prótese Dentária">Prótese Dentária</option>
											<?php } ?>
										</select>
									</td>
									<td>
										<select class='form-control' name="status">
											<option value='Agendada'>Agendada</option>
											<option value='Realizada'>Realizada</option>
											<option value='Cancelada'>Cancelada</option>
										</select>
									</td>
								</tr>
								<tr class="hidden">
									<td><input type="hidden" name="id_consulta" value="<?= $consultas['agd_id'] ?>"></td>
									<td><input type="hidden" name="id_paciente" value="<?= $id_paciente ?>"></td>
								</tr>
								<?php
							} else {
					// Se o id da consulta não for igual ao id da consulta que se deseja alterar, o campo não fica editável
								?>
								<td class='td_one'><?= date_format(new DateTime($consultas['agd_data']), "d/m/Y") ?></td>
								<td><?= $consultas['agd_hora'] ?></td>
								<td><?= $funcionario ?></td>
								<td><?= $medico ?></td>
								<td><?= $especialidade ?></td>
								<td><?= $consultas['agd_status'] ?></td>
								<?php
							}
						}
						?>
					</table>
					<div class='col-md-12'>
						<button type="submit" class="btn btn-primary" name="salvar" title="Salvar">Salvar</button>
						<button type="submit" class="btn btn-danger" name="cancelar" title="Cancelar">Cancelar</button>
						<!-- <a href="paciente.php?id=<?= $id ?>" class="btn btn-danger" title="Cancelar">Cancelar</a> -->
					</div>
				</form>
			</div>
		</div>
		<br>
		<br>
		<?php
	} else {
		?>
		<div class="container marketing">
			<div class="container theme-showcase" role="main">
				<div id="cadastro" class="page-header">
					<h2>Por favor, faça o login para alterar a situação da consulta</h2>
				</div>
			</div>
			<?php
		}
// Se clicou no botão "Salvar"
if(isset($_POST['salvar'])) {
// Salva o novo status, ID da consulta e ID do paciente em variáveis
	$status = $_POST['status'];
	$medico = $_POST['medico'];
	$data = $_POST['data_consulta'];
	$hora = $_POST['hora_consulta'];
	$especialidade = $_POST['especialidade'];
	$id_consulta = $_POST['id_consulta'];
	$id_paciente = $_POST['id_paciente'];

	// Consulta para saber se já existe um agendamento para o paciente que está alterando a consulta com a data/hora pretendida
	$sql = "SELECT * FROM `agendamentos` WHERE `agd_data` = '$data' AND `agd_hora` = '$hora' AND `agd_pac_id` = '$id_paciente'";
	$result = mysqli_query($connection, $sql);
	$rows1 = mysqli_num_rows($result);

	// Consulta para saber se já existe uma consulta marcada para a mesma hora/data/médico salva no banco para qualquer outro paciente
	$sql = "SELECT * FROM `agendamentos` WHERE `agd_data` = '$data' AND `agd_hora` = '$hora' AND `agd_medico` = '$medico'";
	$results = mysqli_query($connection, $sql);
	$rows2 = mysqli_num_rows($results);

	if($rows1 == 0 && $rows2 == 0) {
		unset($_SESSION['erroConsulta']);
	// Query para alterar o status da consulta desejada
		$sql = "UPDATE `agendamentos` SET `agd_data` = '$data', `agd_hora` = '$hora', `agd_status` = '$status', `agd_medico` = '$medico', `agd_especialidade` = '$especialidade' WHERE `agendamentos`.`agd_id` = '$id_consulta'";
	// Se alterado com sucesso, redireciona para a página do paciente
		if(mysqli_query($connection, $sql)) {
			header("location: paciente.php?id=" . $id_paciente);
		} else {
			echo "Error: " . $sql . "<br>" . mysqli_error($connection);
		}
	} else {
		if(!isset($_SESSION['erroConsulta'])) {
			$_SESSION['erroConsulta'] = true;
			$_SESSION['idConsulta'] = $id_consulta;
			$_SESSION['idPaciente'] = $id_paciente;
		}
		header("location: paciente.php?id=" . $id_paciente);
	}
} else if(isset($_POST['cancelar'])) {
	unset($_SESSION['erroConsulta']);
	$id_paciente = $_POST['id_paciente'];
	header("location: paciente.php?id=" . $id_paciente);
}
disconnectDataBase();
require_once 'rodape.php';
ob_end_flush();
?>