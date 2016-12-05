<?php
require_once 'cabecalho.php';
// Chamada da função que faz a conexão com o banco de dados
connectDataBase();
?>
<style>
	.teste {
		margin-right: 0;
		float: right;
	}
</style>
<?php
// Se estiver logado, o sistema de busca funciona normalmente
if(isLogged()) {
	?>
	<div class='container marketing'>
		<div class='container theme-showcase' role='main'>
			<div id='cadastro_pac' class='page-header'>
			<a href="home.php" class="btn btn-warning voltar">Voltar</a>
			<a class="btn btn-info editar" href="javascript:void(0);" onclick="javascript:introJs().setOption('showProgress', true).start();">Tutorial</a>
				<h1>Buscar Paciente</h1>
			</div>
			<form class="navbar-form navbar-left" action="busca.php" method="POST">
				<div class="form-group">
					<input type="text" class="form-control" name="texto" placeholder="Digite o nome do paciente que deseja encontrar" size="45" data-step="1" data-intro="Digite aqui o nome ou um trecho do nome do paciente que deseja encontrar (Se não digitar nada, o sistema exibirá todos os pacientes cadastrados)" data-position='bottom'>
				</div>
				<button type="submit" class="btn btn-default" data-step="2" data-intro="Depois de digitar o nome do paciente, clique aqui para exibir os resultados da busca" data-position='bottom'>Procurar</button>
			</form>
			<br>
			<br>
			<br>
			<?php
			if(isset($_SESSION['erro'])) {
                ?>
                <div class="col-md-6 alert alert-danger">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    <h4>Atenção!</h4>
                    O paciente <?= $_SESSION['pacRemovido'] ?> não pôde ser removido! Tente novamente mais tarde.
                </div>
                <div class="col-md-7">
                </div>
                <?php
                unset($_SESSION['erro']);
                unset($_SESSION['pacRemovido']);
            } else if(isset($_SESSION['pacRemovido'])) {
                ?>
                <div class="col-md-6 alert alert-success">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    <h4>Sucesso!</h4>
                    O paciente <?= $_SESSION['pacRemovido'] ?> foi removido com sucesso!
                </div>
                <div class="col-md-7">
                </div>
                <?php
                unset($_SESSION['pacRemovido']);
            }
		// Se não está logado, precisa fazer o login
		} else {
			?>
			<div class="container marketing">
				<div class="container theme-showcase" role="main">
					<div id="cadastro" class="page-header">
						<h2>Por favor, faça o login para fazer uma busca</h2>
					</div>
				</div>
			</div>
			<?php
		}
		?>
	</div>
</div>
<?php
// Buscando e exibindo o resultado da busca dos pacientes

// Verifica se a variável $_POST['texto'] está setada e não está vazia (se o usuário digitou algo no input de busca e clicou no botão "Procurar")
if(isset($_POST['texto']) && $_POST['texto'] != "") {
	// Salva o conteúdo do input name="texto" na variável $text

	// Utiliza a função para escapar aspas simples e duplas da variável $text, previnindo a SQL Injection
	$text = mysqli_real_escape_string($connection, $_POST['texto']);
	$text = strtolower($text);

	// SQL para buscar no banco todos os dados do paciente que contenha o texto que foi digitado no input de busca e ordenar o resultado por ordem alfabética
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
	//  Se o número de linhas retornadas for maior que 0, (foram encontrados resultados)
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
							$nome = $array['pac_nome'];
							echo "
							<tr>
								<td><a href='paciente.php?id=" . $id . "' data-step='3' data-intro='Clique no nome do paciente para exibir seus dados' data-position='top'>" . $nome . "</a><a href='#' data-step='4' data-intro='Clique aqui para remover o paciente da base de dados' data-position='top' title='Remover Paciente' class='btn btn-danger teste' onclick='confirmar(\"$nome\", \"$id\")'><i class='fa fa-trash-o' aria-hidden='true'></i></a></td>
								<td>" . $array['pac_telefone_1'] . "</td>
								<td>" . $array['pac_email'] . "</td>
							</tr>
							";
						}
					} else {
						echo "<h2>Não foram encontrados resultados para sua busca</h2>";
					}
					echo "</table>
				</div>
			</div>";
		}
		?>
		<script>
			function confirmar(nome, id) {
				bootbox.confirm("Tem certeza que deseja excluir o paciente " + nome + "? (Esta ação não poderá ser desfeita)",
				function(result){
					if(result) {
						$(location).attr('href', 'remover_pac.php?id=' + id);
					}
				});
			}
		</script>
		<?php
		disconnectDataBase();
		require_once 'rodape.php';
		?>