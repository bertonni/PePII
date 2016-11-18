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

if(isLogged()) {
	?>
	<title>Dados do Paciente</title>
	<div class="container marketing">
		<div class="container theme-showcase" role="main">
			<div id="cadastro_pac" class="page-header">
				<h1>Dados do Paciente</h1>
			</div>
			<div class="row">
			<button class="btn btn-danger voltar" onClick="history.go(-1)">Cancelar</button>
			<form action="validar_edicao_pac.php" method="POST">

			<button class="btn btn-primary editar" type="submit">Salvar</a></button>
			<br></br>
				<!-- Passando o id do paciente pelo método GET para as páginas de edição de dados e marcação de consultas -->

				<table class='table table-striped table-bordered'>
					<tr>
						<td class='td_one'><b>Nome</b></td>
						<td><input type="text" class='form-control' name="nome" value="<?= $array['pac_nome'] ?>" size="20"></td>
					</tr>
					<tr>
						<td class='td_one'><b>CPF</b></td>
						<td><input type="text" class='form-control' name="cpf" value="<?= $array['pac_cpf'] ?>" size="20"></td>
					</tr>
					<tr>
						<td class='td_one'><b>RG</b></td>
						<td><input type="text" class='form-control' name="rg" value="<?= $array['pac_rg'] ?>" size="20"></td>
					</tr>
					<tr>
						<td class='td_one'><b>Endereço</b></td>
						<td><input type="text" class='form-control' name="endereco" value="<?= $array['pac_endereco'] ?>" size="20"></td>
					</tr>
					<tr>
						<td class='td_one'><b>Data de Nascimento</b></td>
						<?php
						echo "<td><input type='text' class='form-control' name='nasc' value='" . date_format(new DateTime($array['pac_data_nasc']), 'd/m/Y') . "' size='50'></td>";
						?>
					</tr>
					<tr>
						<td class='td_one'><b>E-mail</b></td>
						<td><input type="mail" class='form-control' name="email" value="<?= $array['pac_email'] ?>" size="20"></td>
					</tr>
					<tr>
						<td class='td_one'><b>Telefone 1</b></td>
						<td><input type="text" class='form-control' name="fone1" value="<?= $array['pac_telefone_1'] ?>" size="20"></td>
					</tr>
					<tr>
						<td class='td_one'><b>Telefone 2</b></td>
						<td><input type="text" class='form-control' name="fone2" value="<?= $array['pac_telefone_2'] ?>" size="20"></td>
					</tr>
					<tr>
					<input type="hidden" name="pac_id" value="<?= $id ?>">
					</tr>
				</table>
			</div>
			</form>
<?php
} else {
	?>
	<div class="container marketing">
		<div class="container theme-showcase" role="main">
			<div id="cadastro" class="page-header">
				<h2>Por favor, faça o login para visualizar os dados do paciente</h2>
			</div>
		</div>
		<?php
	}
	disconnectDataBase();
	require_once 'rodape.php';
	?>