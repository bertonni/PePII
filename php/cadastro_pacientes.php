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
	// $("#rg").mask("99.999.99?9");
});
document.form_pac.reset();
</script>
<?php
// Checa se o usuário está logado (Só usuários cadastrados e devidamente autenticados podem ter acesso ao cadastro de pacientes)
if(isLogged()) {
?>
<title>Cadastro de Pacientes</title>
<div class="container marketing">
	<div class="container theme-showcase" role="main">
		<div id="cadastro_pac" class="page-header">
			<h1>Cadastro de Pacientes</h1>
            <button class="btn btn-warning voltar" onClick="history.go(-1)">Voltar</button>
            <a class="btn btn-info voltar" href="javascript:void(0);" onclick="javascript:introJs().setOption('showProgress', true).start();">Tutorial</a>
			<p>Os campos com <font color="#ce1414"> * </font>são obrigatórios</p>
		</div>
		<div class="row">
			<form method="POST" name="form_pac" action="validar_pac.php">
				<div class="col-md-6">
					<label for="nome">Nome *</label>
					<input type="text" class="form-control maiuscula" id="nome" name="nome" required placeholder="Digite o nome" data-step="1" data-intro="Digite aqui o nome do paciente sem usar acentos ou cedilha" data-position='top'>
				</div>
				<div class="col-md-3">
					<label for="nasc">Data de Nascimento *</label>
					<input type="date" class="form-control" id="nasc" max-lenght="2" name="nasc" required data-step="2" data-intro="Digite aqui a data de nascimento do paciente" data-position='top'>
				</div>
				<div class="col-md-3">
					<label for="cpf">CPF</label>
					<input type="text" class="form-control" id="cpf" name="cpf" placeholder="Digite o CPF" data-step="3" data-intro="Digite aqui o CPF do paciente (Este campo não é de preenchimento obrigatório)" data-position='top'>
				</div>
				<div class="col-md-6 user">
					<label for="endereco">Endereço *</label>
					<input type="text" class="form-control maiuscula" id="endereco" name="endereco" required placeholder="Digite o endereço" data-step="4" data-intro="Digite aqui a rua/avenida da residência do paciente" data-position='top'>
				</div>
				<div class="col-md-1 user">
					<label for="numero">Número</label>
					<input type="text" class="form-control maiuscula" id="numero" name="numero" placeholder="Número" data-step="5" data-intro="Digite aqui o número da residência do paciente" data-position='top'>
				</div>
				<div class="col-md-2 user">
					<label for="bairro">Bairro *</label>
					<input type="text" class="form-control maiuscula" id="bairro" name="bairro" required placeholder="Digite o bairro" data-step="6" data-intro="Digite aqui o bairro onde o paciente reside" data-position='top'>
				</div>
				<div class="col-md-3 user">
					<label for="cidade">Cidade *</label>
					<input type="text" class="form-control maiuscula" id="cidade" name="cidade" required placeholder="Digite a cidade" data-step="7" data-intro="Digite aqui a cidade onde o paciente reside" data-position='top'>
				</div>
				<div class="col-md-3 user">
					<label for="email">Email</label>
					<input type="email" class="form-control" id="email" name="email" placeholder="Digite o email" data-step="8" data-intro="Digite aqui o email do paciente (Este campo não é de preenchimento obrigatório)" data-position='top'>
				</div>
				<div class="col-md-3 user">
					<label for="rg">RG</label>
					<input type="text" class="form-control" id="rg" name="rg" placeholder="Digite o RG" data-step="9" data-intro="Digite aqui o RG do paciente (Este campo não é de preenchimento obrigatório)" data-position='top'>
				</div>

				<div class="col-md-3 user">
					<label for="fone1">Telefone 1 *</label>
					<input type="text" class="form-control" class="telefone" id="fone1" name="fone1" required placeholder="Digite o telefone" data-step="10" data-intro="Digite aqui um número de telefone do paciente" data-position='top'>
				</div>
				<div class="col-md-3 user">
					<label for="fone2">Telefone 2</label>
					<input type="text" class="form-control" class="telefone" id="fone2" name="fone2" placeholder="Digite outro telefone" data-step="11" data-intro="Digite aqui um segundo telefone, podendo ser fixo ou celular (Este campo não é de preenchimento obrigatório)" data-position='top'>
				</div>
				<div class="col-md-12">
					<button type="submit" class="btn btn-primary" title="Enviar" data-step="12" data-intro="Depois de preencher os campos, clique aqui para concluir o cadastro" data-position='top'>Enviar</button>
					<button type="reset" class="btn btn-default" title="Limpar" data-step="13" data-intro="Clique aqui para limpar o formulário (Todos os campos serão limpos)" data-position='top'>Limpar</button>
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
            <h2>Por favor, faça o login para cadastrar um Paciente</h2>
        </div>
    </div>
</div>
<?php
}
disconnectDataBase();
require_once 'rodape.php';
?>