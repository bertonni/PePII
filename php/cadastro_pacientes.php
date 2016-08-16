<?php
require_once 'cabecalho.php';
?>
<style type="text/css">
.col-md-12, .user {
	margin-top: 10px;
}
</style>
<title>Cadastro</title>
<div class="container marketing">
	<div class="container theme-showcase" role="main">
		<div id="artilharia" class="page-header">
			<h1>Cadastro de Pacientes</h1>
		</div>
		<div class="row">
			<form method="POST" action="validar2.php">
				<div class="col-md-6">
					<label for="nome">Nome *</label>
  					<input type="text" class="form-control" id="nome" name="nome" required placeholder="Digite o nome">
				</div>
				<div class="col-md-3">
					<label for="idade">Data de Nascimento *</label>
  					<input type="date" class="form-control" id="idade" max-lenght="2" name="idade" required>
				</div>
				<div class="col-md-3">
					<label for="usuario">CPF *</label>
  					<input type="text" class="form-control" id="usuario" name="usuario" required placeholder="Digite o CPF">
				</div>
				<div class="col-md-6 user">
					<label for="senha">Endereço *</label>
  					<input type="password" class="form-control" id="senha" name="senha" required placeholder="Digite o endereço">
				</div>
				<div class="col-md-3 user">
					<label for="senha">Email *</label>
  					<input type="password" class="form-control" id="senha" name="senha" required placeholder="Digite o email">
				</div>
				<div class="col-md-3 user">
					<label for="senha">RG *</label>
  					<input type="password" class="form-control" id="senha" name="senha" required placeholder="Digite o RG">
				</div>

				<div class="col-md-5 user">
					<label for="senha">Telefone 1 *</label>
  					<input type="password" class="form-control" id="senha" name="senha" required placeholder="Digite o telefone">
				</div>
				<div class="col-md-5 user">
					<label for="senha">Telefone 2</label>
  					<input type="password" class="form-control" id="senha" name="senha" required placeholder="Digite outro telefone">
				</div>
				<div class="col-md-4">
  					<input type="hidden" class="form-control" name="funcao" value="membro">
				</div>

				<div class="col-md-12">
					<button type="submit" class="btn btn-primary" title="Enviar">Enviar</button>
					<button type="reset" class="btn btn-default" title="Limpar">Limpar</button>
				</div>
			</form>
		</div>
	</div>
<br>
<br>
<script type="text/javascript">
$('form').on('submit', function () {
    if($(this).find('input[name="senha"]').val() != $(this).find('input[name="confirma_senha"]').val()) {
        alert("Senhas digitadas não conferem!!");
        $('#senha').focus();
        return false;
    }
});
</script>
<?php
require_once 'rodape.php';
?>