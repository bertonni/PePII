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
					if($id_consulta == $consultas['agd_id']):
						?>
						<form action="<?= ($_SERVER["PHP_SELF"]);?>" name="formConsulta" id="formConsulta" method="POST">
							<td class='td_one'>
								<?php
								echo "<input type='date' class='form-control' id='data' min='" . date("Y-m-d") . "' name='data_consulta' value='" . $consultas['agd_data'] . "'>";
								?>
								<td>
									<select class="form-control" name="hora_consulta" id="hora_consulta">
										<?php for($i = 8; $i <= 17; $i += 0.5): ?>
											<?php $k = str_pad(intval($i), 2, '0', STR_PAD_LEFT) . ':' . ($i == intval($i) ? '00' : '30'); ?>
											<option value="<?= $k ?>" <?= $consultas['agd_hora'] == $k ? 'selected' : '' ?>><?= $k ?></option>
										<?php endfor ?>
									</select>
								</td>

								<td><?= $funcionario ?></td>
								<td>
									<select class="form-control" name="medico" id="medico">
										<?php
										$medicos = ["Ana Beatriz", "Mateus Nobrega", "Bertonni Paz"];

										for ($i = 0; $i < 3; $i++):
											if($consultas['agd_medico'] == $medicos[$i]): ?>
												<option value="<?= $medicos[$i] ?>" selected><?= $medicos[$i] ?></option>
												<?php else: ?>
													<option value="<?= $medicos[$i] ?>"><?= $medicos[$i] ?></option>
											<?php endif ?>
										<?php
										// if($especialidade == "Endodontia") {
										endfor
										?>
									</select>
								</td>
								<td>
									<select class="form-control" name="especialidade" id="especialidade">
									<!-- Deixa a opção que está salva no banco de dados selecionada por padrão -->
										<?php
										$especialidades = ["Endodontia", "Odontopediatria", "Ortodontia", "Periodontia", "Prótese Dentária"];

										for ($i = 0; $i < 5; $i++):
											if($consultas['agd_especialidade'] == $especialidades[$i]): ?>
												<option value="<?= $especialidades[$i] ?>" selected><?= $especialidades[$i] ?></option>
												<?php else: ?>
													<option value="<?= $especialidades[$i] ?>"><?= $especialidades[$i] ?></option>
											<?php endif ?>
										<?php
										endfor
										?>
										</select>
									</td>
									<td>
									<?php $situacao = ["Agendada", "Realizada", "Cancelada"]; ?>
										<select class='form-control' name="status" id="status">
										<?php
										for ($i = 0; $i < 3; $i++):
											if($consultas['agd_status'] == $situacao[$i]): ?>
												<option value="<?= $situacao[$i] ?>" selected><?= $situacao[$i] ?></option>
												<?php else: ?>
													<option value="<?= $situacao[$i] ?>"><?= $situacao[$i] ?></option>
											<?php endif ?>
										<?php
										endfor
										?>
										</select>
									</td>
								</tr>
								<tr class="hidden">
									<td><input type="hidden" name="id_consulta" value="<?= $consultas['agd_id'] ?>"></td>
									<td><input type="hidden" name="id_paciente" value="<?= $id_paciente ?>"></td>
								</tr>
								<?php
							else:
					// Se o id da consulta não for igual ao id da consulta que se deseja alterar, o campo não fica editável
								?>
								<td class='td_one'><?= date_format(new DateTime($consultas['agd_data']), "d/m/Y") ?></td>
								<td><?= $consultas['agd_hora'] ?></td>
								<td><?= $funcionario ?></td>
								<td><?= $medico ?></td>
								<td><?= $especialidade ?></td>
								<td><?= $consultas['agd_status'] ?></td>
								<?php
							endif;
						}
						?>
					</table>
					<div class='col-md-12'>
						<button type="submit" class="btn btn-primary" name="salvar" title="Salvar">Salvar</button>
						<button type="submit" class="btn btn-danger" name="cancelar" title="Cancelar">Cancelar</button>
					</div>
				</form>
			</div>
		</div>
		<script>
			$('#formConsulta').on('submit', function (event) {
				var submit = $(event.target).attr('submit');
			    if($('#status').val() == "Cancelada" && !submit) {
        			event.preventDefault();
			        bootbox.confirm("A consulta será cancelada e removida da base de dados, tem certeza que deseja cancelar? (Essa ação não poderá ser desfeita!)",
		        	function(result) {
		        		if(result) {
		        			$(event.target).attr('submit', true);
			    			$(event.target).submit();
		        		}
		        	});
			    }
			});
		</script>
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
// if(isset($_POST['salvar'])) {
if($_SERVER['REQUEST_METHOD'] == 'POST') {
// Salva o novo status, ID da consulta e ID do paciente em variáveis
	$status = $_POST['status'];
	$medico = $_POST['medico'];
	$data = $_POST['data_consulta'];
	$hora = $_POST['hora_consulta'];
	$especialidade = $_POST['especialidade'];
	$id_consulta = $_POST['id_consulta'];
	$id_paciente = $_POST['id_paciente'];

	// Se a situação(status) da consulta for 'Cancelada', remove essa consulta do banco de dados
	if($status == "Cancelada") {
		$sql = "DELETE FROM agendamentos WHERE agd_id = '$id_consulta'";
		$result = mysqli_query($connection, $sql);

		if($result) {
			if(!isset($_SESSION['consultaRemovida'])) {
				$_SESSION['consultaRemovida'] = true;
			}
			header("location: paciente.php?id=" . $id_paciente);
		}
	} else {

		// Consulta para saber se já existe um agendamento para o paciente que está alterando a consulta com a data/hora pretendida
		$sql = "SELECT * FROM `agendamentos` WHERE agd_id = '$id_consulta'";
		$result = mysqli_query($connection, $sql);
		$rows = mysqli_num_rows($result);

		$sql = "SELECT * FROM `agendamentos` WHERE `agd_data` = '$data' AND `agd_hora` = '$hora' AND `agd_pac_id` = '$id_paciente' AND agd_id != '$id_consulta'";
		$result = mysqli_query($connection, $sql);
		$rows1 = mysqli_num_rows($result);

		// Consulta para saber se já existe uma consulta marcada para a mesma hora/data/médico salva no banco para qualquer outro paciente
		$sql = "SELECT * FROM `agendamentos` WHERE `agd_data` = '$data' AND `agd_hora` = '$hora' AND `agd_medico` = '$medico' AND agd_pac_id != '$id_paciente'";
		$results = mysqli_query($connection, $sql);
		$rows2 = mysqli_num_rows($results);

		if($rows > 0 && $rows1 == 0 && $rows2 == 0) {
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