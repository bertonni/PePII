<?php
require_once 'cabecalho.php';
// Salva o id do paciente passado pelo método GET
$idPaciente = $_GET['id'];

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
			<div class="col-md-12">
                <button class="btn btn-warning voltar" onClick="history.go(-1)">Voltar</button>
                <a class="btn btn-info editar" href="javascript:void(0);" onclick="javascript:introJs().setOption('showProgress', true).start();">Tutorial</a>
			</div>
                <div class="col-md-4">
                    <label for="">Especialidade *</label>

                    <select class="form-control" name="especialidade" id="especialidade" data-step="1" data-intro="Clique aqui para escolher uma especialidade" data-position='top'>
                        <option value="default">Escolher especialidade</option>
                        <option value="Endodontia">Endodontia</option>
                        <option value="Odontopediatria">Odontopediatria</option>
                        <option value="Ortodontia">Ortodontia</option>
                        <option value="Periodontia">Periodontia</option>
                        <option value="Prótese Dental">Prótese Dental</option>

					</select>
	           </div>
                    <div class="col-md-3">
                    <label for="">Médico *</label>

                    <select class="form-control" name="medico" id="medico" data-step="2" data-intro="Clique aqui para escolher o médico" data-position='top'>
                        <option value="default">Escolher médico</option>
						<option value="Ana Paula">Ana Paula</option>
						<option value="Mateus Nóbrega">Mateus Nobrega</option>
						<option value="Bertonni Paz">Bertonni Paz</option>
					</select>

				</div>
				<div class="col-md-3">
					<label for="data_consulta">Data *</label>
  					<input type="date" class="form-control" id="data_consulta" min="<?= date("Y-m-d") ?>" name="data_consulta" required data-step="3" data-intro="Digite a data desejada para a consulta" data-position='top'>
				</div>
				<div class="col-md-2">
					<label for="hora_consulta">Hora *</label>
					<br>
					<select class="form-control" name="hora_consulta" id="hora_consulta" data-step="4" data-intro="Clique aqui para escolher a hora da consulta" data-position='top'>
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

				</div>
				<div class="col-md-2">
  					<input type="hidden" class="form-control" name="id" value="<?= $idPaciente ?>">
				</div>
				<div class="col-md-12">
					<button type="submit" class="btn btn-primary" title="Enviar" data-step="5" data-intro="Depois de preencher os campos, clique aqui para marcar a consulta" data-position='top'>Enviar</button>
					<button type="reset" class="btn btn-default" title="Limpar" data-step="6" data-intro="Clique aqui para limpar o formulário (Todos os campos serão limpos)" data-position='top'>Limpar</button>
				</div>
                </div>


<?php
} else {
?>
<div class="container marketing">
    <div class="container theme-showcase" role="main">
        <div id="cadastro" class="page-header">
            <h2>Por favor, faça o login para marcar uma consulta</h2>
        </div>
    </div>
<?php
}
require_once 'rodape.php';
?>