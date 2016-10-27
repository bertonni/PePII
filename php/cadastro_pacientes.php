<?php
require_once 'cabecalho.php';
connectDataBase();
?>
<script type="text/javascript">

jQuery(function($) {
	$.mask.definitions['~']='[+-]';
	//Inicio Mascara Telefone
	$('input[name=fone1], input[name=fone2]').focusout(function(){
		var phone, element;
		element = $(this);
		element.unmask();
		phone = element.val().replace(/\D/g, '');
		if(phone.length > 10) {
			element.mask("(99) 99999-999?9");
		} else {
			element.mask("(99) 9999-9999?9");
		}
	}).trigger('focusout');

	$("#cpf").mask("999.999.999-99");
	$("#rg").mask("99.999.99?9");
});

</script>
<style type="text/css">
.col-md-12, .user {
	margin-top: 10px;
}
</style>
<?php
// Checa se o usuário está logado (Só usuários cadastrados e devidamente autenticados podem ter acesso ao cadastro de pacientes)
if(isLogged()) {
?>
<title>Cadastro de Pacientes</title>
<div class="container marketing">
	<div class="container theme-showcase" role="main">
		<div id="cadastro_pac" class="page-header">
			<h1>Cadastro de Pacientes</h1>
			<p>Os Campos com <font color="#ce1414"> * </font>são obrigatorios</p>
		</div>
		<div class="row">
			<form method="POST" action="validar_pac.php">
				<div class="col-md-6">
					<label for="nome">Nome *</label>
					<input type="text" class="form-control maiuscula" id="nome" name="nome" required placeholder="Digite o nome">
				</div>
				<div class="col-md-3">
					<label for="nasc">Data de Nascimento *</label>
					<input type="date" class="form-control" id="nasc" max-lenght="2" name="nasc" required>
				</div>
				<div class="col-md-3">
					<label for="cpf">CPF *</label>
					<input type="text" class="form-control" id="cpf" name="cpf" required placeholder="Digite o CPF">
				</div>
				<div class="col-md-6 user">
					<label for="endereco">Endereço *</label>
					<input type="text" class="form-control maiuscula" id="endereco" name="endereco" required placeholder="Digite o endereço">
				</div>
				<div class="col-md-3 user">
					<label for="email">Email *</label>
					<input type="email" class="form-control" id="email" name="email" required placeholder="Digite o email">
				</div>
				<div class="col-md-3 user">
					<label for="rg">RG *</label>
					<input type="text" class="form-control" id="rg" name="rg" required placeholder="Digite o RG">
				</div>

				<div class="col-md-5 user">
					<label for="fone1">Telefone 1 *</label>
					<input type="text" class="form-control" class="telefone" id="fone1" name="fone1" required placeholder="Digite o telefone">
				</div>
				<div class="col-md-5 user">
					<label for="fone2">Telefone 2</label>
					<input type="text" class="form-control" class="telefone" id="fone2" name="fone2" placeholder="Digite outro telefone">
				</div>
				<div class="col-md-12">
					<button type="submit" class="btn btn-primary" title="Enviar">Enviar</button>
					<button type="reset" class="btn btn-default" title="Limpar">Limpar</button>
                    
                    <img src="../imagens/botao_voltar.png" alt="Voltar para página anterior">
                    <a href = "home.php"><img src = botao_voltar.png"></a>
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
} else {
// Se o usuário não estiver logado, exibe uma mensagem pedindo para que ele faça o login
?>
<div class="container marketing">
    <div class="container theme-showcase" role="main">
        <div id="cadastro" class="page-header">
            <h3>Por favor, faça o login para cadastrar um Paciente</h3>
        </div>
    </div>
</div>
<?php
}
disconnectDataBase();
require_once 'rodape.php';
?>