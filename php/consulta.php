<?php
require_once 'cabecalho.php';
// Salva o id do paciente passado pelo método GET
$idPaciente = $_GET['id'];
?>
<style type="text/css">
.col-md-12, .user {
	margin-top: 10px;
}
</style>
<?php
if(isLogged()) {
?>
<title>Marcação de Consulta</title>

<div class="container marketing">
	<div class="container theme-showcase" role="main">
		<div id="cadastro" class="page-header">
			<h1>Marcação de Consulta</h1>
		</div>
		<div class="row">
			<form method="POST" action="validar_consulta.php">
				<div class="col-md-3">
					<label for="data_consulta">Data *</label>
  					<input type="date" class="form-control" id="data_consulta" name="data_consulta" required>
				</div>
				<div class="col-md-2">
					<label for="hora_consulta">Hora *</label>
					<br>
					<select class="form-control" name="hora_consulta" id="hora_consulta">
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
					</select>
				</div>
				<div class="col-md-4">
  					<input type="hidden" class="form-control" name="id" value="<?= $idPaciente ?>">
				</div>
				<div class="col-md-12">
					<button type="submit" class="btn btn-primary" title="Enviar">Enviar</button>
					<button type="reset" class="btn btn-default" title="Limpar">Limpar</button>
				</div>
			</form>
		</div>
	</div>
<?php
} else {
?>
<div class="container marketing">
    <div class="container theme-showcase" role="main">
        <div id="cadastro" class="page-header">
            <h3>Por favor, faça o login para marcar uma consulta</h3>
        </div>
    </div>
<?php
}
require_once 'rodape.php';
?>