<?php
require_once 'cabecalho.php';
// Conexão com o banco de dados
connectDataBase();

// Salva o id do paciente (que foi passado pelo método GET)
$id = $_GET['id'];

// Consulta para buscar todos os dados do paciente desejado
$sql = "SELECT * FROM pacientes WHERE pac_id = '$id'";
$result = mysqli_query($connection, $sql);
// Salva os dados do paciente num array associativo(Os índices são as colunas da tabela paciente e os valores são os valores salvos no banco)
$array = mysqli_fetch_array($result);
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
				
				<table class='table table-striped table-bordered'>
					<tr>
						<td class='td_one'><b>Nome</b></td>
						<td><?= $array['pac_nome'] ?>
							<a href="editar_dados.php?id=<?= $id ?>" class="edit">Editar Dados do paciente</a>
						</td>
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
			<a href="consulta.php?id=<?= $id ?>" class="marcar">Marcar Consulta</a>
			<br></br>
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
						<th>Situação</th>
					</tr>
					<?php	
			/*Enquanto houver dados no array associativo '$consultas', salva os valores em variáveis, realiza a consulta
			para saber o nome do funcionário que realizou o agendamento e exibe-os na tabela*/
			while($consultas = mysqli_fetch_array($result)) {
				$id_consulta = $consultas['agd_id'];
				$id_func = $consultas['agd_fun_id'];
				$sql = "SELECT fun_usuario FROM funcionarios WHERE fun_id = '$id_func'";
				$resultado = mysqli_query($connection, $sql);
				$arr = mysqli_fetch_array($resultado);
				$funcionario = $arr['fun_usuario'];
				?>
				<tr>
					<td class='td_one'><?= date_format(new DateTime($consultas['agd_data']), "d/m/Y") ?></td>
					<td><?= $consultas['agd_hora'] ?></td>
					<td><?= $funcionario ?></td>
					<td><?= $consultas['agd_status'] ?><a class='status' href='editar_status_consulta.php?id=<?= $id ?>&consulta=<?= $id_consulta ?>'>alterar</a></td>
				</tr>
				<?php
			}
			?>
		</table>
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
				<h3>Por favor, faça o login para visualizar os dados do paciente</h3>
			</div>
		</div>
		<?php
	}
	disconnectDataBase();
	require_once 'rodape.php';
	?>