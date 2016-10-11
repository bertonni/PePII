<?php
ob_start();
/*Esta página é praticamente igual à página paciente.php, a diferença básica entre elas é que, ao invéns de apenas exibir os dados,
vai haver um select no campo "Situação" na tabela das consultas, onde vai ser alterada a situação da consulta. */
require_once 'cabecalho.php';
// Conexão com o banco de dados
connectDataBase();

// Salva o ID do paciente e ID da consulta, passados pelo método GET na página anterior
$id = $_GET['id'];
$id_consulta = $_GET['consulta'];

$sql = "SELECT * FROM pacientes WHERE pac_id = '$id'";
$result = mysqli_query($connection, $sql);
$array = mysqli_fetch_array($result);
$id_paciente = $array['pac_id'];
?>
<style type="text/css">
.td_one {
	width: 25%;
}
.edit, .status {
	float: right;
}
.marcar {
	float: left;
}
.hidden {
	display: none;
}
</style>
<?php
if(isLogged()) {
	?>
	<title>Dados do Paciente</title>
	<div class="container marketing">
		<div class="container theme-showcase" role="main">
			<div id="cadastro_pac" class="page-header">
				<h1>Dados do Paciente</h1>
			</div>
			<div class="row">
				<!-- Passando o id do paciente pelo método GET para as páginas de edição de dados e marcação de consultas -->
				<a href="editar_dados.php?id=<?= $id ?>" class="edit">Editar Dados do paciente</a>
				<a href="consulta.php?id=<?= $id ?>" class="marcar">Marcar Consulta</a>
				<br>
				<br>
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
						<th>Status</th>
					</tr>
					<?php
					/*Enquanto houver dados no array associativo '$consultas', salva os valores em variáveis, realiza a consulta
					para saber o nome do funcionário que realizou o agendamento e exibe-os na tabela*/
					while($consultas = mysqli_fetch_array($result)) {
						$funId = $consultas['agd_fun_id'];
						$sql = "SELECT fun_usuario FROM funcionarios WHERE fun_id = '$funId'";
						$resultado = mysqli_query($connection, $sql);
						$arr = mysqli_fetch_array($resultado);
						$funcionario = $arr['fun_usuario'];
						?>
						<tr>
							<td class='td_one'><?= date_format(new DateTime($consultas['agd_data']), "d/m/Y") ?></td>
							<td><?= $consultas['agd_hora'] ?></td>
							<td><?= $funcionario ?></td>
							<?php
					// Checa se o id da consulta exibida é igual ao id da consulta que se deseja alterar a situação
					// Se sim, exibe um select ao invés da mensagem não editável
							if($id_consulta == $consultas['agd_id']) {
								?>
								<td>
									<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">
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
								echo "<td>" . $consultas['agd_status'] . "</td>";
							}
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
		<br>
		<br>
		<?php
	} else {
		?>
		<div class="container marketing">
			<div class="container theme-showcase" role="main">
				<div id="cadastro" class="page-header">
					<h3>Por favor, faça o login para alterar a situação da consulta</h3>
				</div>
			</div>
			<?php
		}
		// Se clicou no botão "Salvar"
		if(isset($_POST['salvar'])) {
		// Salva o novo status, ID da consulta e ID do paciente em variáveis
			$new_status = $_POST['status'];
			$id_consulta = $_POST['id_consulta'];
			$id_paciente = $_POST['id_paciente'];

			// Query para alterar o status da consulta desejada
			$sql = "UPDATE `agendamentos` SET `agd_status`='$new_status' WHERE agd_id='$id_consulta'";

			// Se alterado com sucesso, redireciona para a página do paciente
			if(mysqli_query($connection, $sql)) {
				header("location: paciente.php?id=" . $id_paciente . "");
			} else {
				echo "Error: " . $sql . "<br>" . mysqli_error($connection);
			}

		} else if(isset($_POST['cancelar'])) {
			$id_paciente = $_POST['id_paciente'];
			header("location: paciente.php?id=" . $id_paciente . "");
		}
		disconnectDataBase();
		require_once 'rodape.php';
		ob_end_flush();
		?>