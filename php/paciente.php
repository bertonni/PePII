<?php
require_once 'cabecalho.php';
connectDataBase();

$id = $_GET['id'];

$sql = "SELECT * FROM pacientes WHERE pac_id = '$id'";
$result = mysqli_query($connection, $sql);

$array = mysqli_fetch_array($result);
?>
<style type="text/css">
	.td_one {
		width: 25%;
	}
	.edit {
		float: right;
	}
</style>
<title>Dados do Paciente</title>
<div class="container marketing">
	<div class="container theme-showcase" role="main">
		<div id="cadastro_pac" class="page-header">
			<h1>Dados do Paciente</h1>
		</div>
		<div class="row">
			<a href="editar_dados.php" class="edit">Clique aqui para editar</a>
			<?php
				echo "<table class='table table-striped table-bordered'>
					<tr>
						<td class='td_one'><b>Nome</b></td>
						<td>". $array['pac_nome'] . "</td>
					</tr>
					<tr>
						<td class='td_one'><b>CPF</b></td>
						<td>". $array['pac_cpf'] . "</td>
					</tr>
					<tr>
						<td class='td_one'><b>RG</b></td>
						<td>". $array['pac_rg'] . "</td>
					</tr>
					<tr>
						<td class='td_one'><b>Endereço</b></td>
						<td>". $array['pac_endereco'] . "</td>
					</tr>
					<tr>
						<td class='td_one'><b>Data de Nascimento</b></td>
						<td>". date_format(new DateTime($array['pac_data_nasc']), "d/m/Y") . "</td>
					</tr>
					<tr>
						<td class='td_one'><b>E-mail</b></td>
						<td>". $array['pac_email'] . "</td>
					</tr>
					<tr>
						<td class='td_one'><b>Telefone 1</b></td>
						<td>". $array['pac_telefone_1'] . "</td>
					</tr>
					<tr>
						<td class='td_one'><b>Telefone 2</b></td>
						<td>". $array['pac_telefone_2'] . "</td>
					</tr>
							";
			?>
		</div>
	</div>
	<br>
	<br>
<?php
disconnectDataBase();
require_once 'rodape.php';
?>