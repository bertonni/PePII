<?php
include_once 'cabecalho.php';
include_once 'functions.php';
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
			<h1>Cadastro de Funcionários</h1>
		</div>
		<div class="row">
			<form method="POST" action="validar.php">
				<div class="col-md-6">
					<label for="nome">Nome *</label>
  					<input type="text" class="form-control" id="nome" name="nome" required placeholder="Digite seu nome">
				</div>
				<div class="col-md-4">
					<label for="idade">Idade *</label>
  					<input type="text" class="form-control" id="idade" max-lenght="2" name="idade" required placeholder="Digite sua idade">
				</div>

				<div class="col-md-4 user">
					<label for="usuario">Usuário *</label>
  					<input type="text" class="form-control" id="usuario" name="usuario" required placeholder="Digite um nome de usuário">
				</div>
				
				<div class="col-md-3 user">
					<label for="senha">Senha *</label>
  					<input type="password" class="form-control" id="senha" name="senha" required placeholder="Digite sua senha">
				</div>
				<div class="col-md-3 user">
					<label for="confirma_senha">Confirmar Senha *</label>
  					<input type="password" class="form-control" id="confirma_senha" name="confirma_senha" required placeholder="Confirme sua senha">
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
include_once 'rodape.php';
?>