<?php
require_once 'cabecalho.php';
// Chamada da função que faz a conexão com o banco de dados
connectDataBase();
?>
<style type="text/css">
	.navbar-form {
		padding-left: 0;
	}
</style>
<div class='container marketing'>
	<div class='container theme-showcase' role='main'>
		<div id='cadastro_pac' class='page-header'>
			<h1>Buscar Paciente</h1>
		</div>
		<?php
		// Verifica se não está logado. Só poderá fazer busca se estiver logado, caso contrário, o botão estará desabilitado
		if(!isLogged()) {
			?>
			<div class='navbar-form'>
				<div class='form-group'>
					<input type='text' class='form-control' name='texto' placeholder='Faça o login para buscar um paciente' size='45'>
				</div>
				<button type='submit' class='btn btn-default disabled'>Procurar</button>
			</div>
			<?php
		// Se estiver logado, o sistema de busca funciona normalmente
		} else {
			?>
			<form class="navbar-form navbar-left" action="busca.php" method="POST">
			<div class="form-group">
			<input type="text" class="form-control" name="texto" placeholder="Digite o nome do paciente que deseja encontrar" size="45">
				</div>
				<button type="submit" class="btn btn-default">Procurar</button>
			</form>
			<?php
		}
		?>
	</div>
</div>
<?php
// Buscando e exibindo o resultado da busca dos pacientes

// Verifica se a variável $_POST['texto'] está setada e o está vazia (se alguem digitou algo no input text e clicou no botão "Procurar")
if(isset($_POST['texto']) && $_POST['texto'] != "") {
	// Salva o conteúdo do input name="texto" na variável $text
	$text = $_POST['texto'];

	// Utiliza a função para salvar na variável $text apenas letras(maiúsculas e Minúsculas) e números, previnindo a SQL Injection, pois os caracteres especiais serão removidos
	$text = preg_replace('/[^[:alnum:]_]/', '',$text);
	$text = strtolower($text);

	// SQL para buscar no banco todos os dados do paciente que contenha o texto que foi digitado no input de busca e ordena o resultado por ordem alfabética
	$sql = "SELECT * FROM pacientes WHERE lower(pac_nome) like '%$text%' order by pac_nome";

} else {
	// Se o usuário clicar no botão "Procurar" sem ter digitado nada no campo, a consulta traz todos os dados de todos os usuários cadastrados no banco por ordem alfabética
	$sql = "SELECT * FROM pacientes order by pac_nome";
}
echo "<title>Resultados da Busca</title>";
// Realiza a consulta ao banco
$result = mysqli_query($connection, $sql);

if($result && isset($_POST['texto'])) {
	// Guarda o número de linhas retornadas da consulta
	$row = mysqli_num_rows($result);

	echo "<div class='container marketing'>
	<div class='container theme-showcase' role='main'>
	<br>
	";
	//  Se o número de linhas retornadas for maior que 1, (foram encontrados resultados)
	if($row != 0) {
	// Imprime a tabela
	echo "<table class='table table-striped table-bordered'>
	<tr>
		<th class='prev_td'>Paciente</td>
			<th class='prev_td'>Telefone</td>
				<th class='prev_td'>E-mail</td>
				</tr>";
		// Enquanto houver dados no array, executa os comandos a seguir
		while($array = mysqli_fetch_array($result)) {
			// Salva o ID do paciente para passar pelo método GET no link que leva à página de dados do paciente
			$id = $array['pac_id'];
			echo "
			<tr>
				<td><a href='paciente.php?id=" . $id . "'>" . $array['pac_nome'] . "</a></td>
				<td>" . $array['pac_telefone_1'] . "</td>
				<td>" . $array['pac_email'] . "</td>
			</tr>
			";
		}
	} else {
		echo "<h3>Não foram encontrados resultados para sua busca</h3>";
	}
	echo "</table>
		</div>
	</div>";
}
disconnectDataBase();
require_once 'rodape.php';
?>