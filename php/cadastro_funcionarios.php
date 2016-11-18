<?php
require_once 'cabecalho.php';
?>
<style type="text/css">
.col-md-12, .user {
	margin-top: 10px;
}
.voltar {
	margin-bottom: 10px;
	float: right;
}
</style>
<?php
// Checa se o usuário está logado e se é o Administrador do Sistema
// Se sim, permite o acesso ao cadastro de funcionários
if(isLogged() && isAdmin()) {
?>
<title>Cadastro de Funcionários</title>
<div class="container marketing">
	<div class="container theme-showcase" role="main">
		<div id="cadastro" class="page-header">
			<h1>Cadastro de Funcionários</h1>
				<p>Os Campos com <font color="#ce1414"> * </font>são obrigatórios</p>
		</div>
		<div class="row">
			<form method="POST" action="validar_fun.php">
				<div class="col-md-12">
	                <button class="btn btn-warning voltar" onClick="history.go(-1)">Voltar</button>
				</div>
				<div class="col-md-8">
					<label for="nome">Nome *</label>
  					<input type="text" class="form-control" id="nome" name="nome" required placeholder="Digite seu nome">
				</div>
				<div class="col-md-4">
					<label for="nasc">Data de Nascimento *</label>
  					<input type="date" class="form-control" id="nasc" max-lenght="2" name="nasc" required>
				</div>
				<div class="col-md-4 user">
					<label for="usuario">Usuário *</label>
  					<input type="text" class="form-control" id="usuario" name="usuario" required placeholder="Digite um nome de usuário">
				</div>

				<div class="col-md-4 user">
					<label for="senha">Senha *</label>
  					<input type="password" class="form-control" id="senha" name="senha" required placeholder="Digite sua senha">
				</div>
				<div class="col-md-4 user">
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
} else {
/*Se o usuário não estiver logado e/ou não for administrador do Sistema, exibe uma mensgaem pois apenas
o administrador pode cadastrar funcionários*/
?>
<div class="container marketing">
    <div class="container theme-showcase" role="main">
        <div id="cadastro" class="page-header">
            <h3>Apenas o administrador do sistema pode cadastrar um funci6
            onário</h3>
        </div>
    </div>
</div>
<?php
}
require_once 'rodape.php';
?>