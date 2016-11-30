<?php
require_once 'cabecalho.php';
if(isLogged()) {
?>
<title>Home</title>

<div class="container">
	<div class="container theme-showcase" role="main">
		<div class="row">
            <div class="col-md-4 add_user">
                <h3>Cadastrar Paciente</h3><br>
                <a href="cadastro_pacientes.php" class="ancor" title="Cadastrar Paciente">
                    <img src="../imagens/adcusuario.png" class="img-responsive" alt="Adicionar Usuário">
                </a>
            </div>
            <div class="col-md-4 search_user">
                <h3>Procurar Paciente</h3><br>
                <a href="busca.php" class="ancor" title="Procurar Paciente">
                    <img src="../imagens/busca.png" class="img-responsive" alt="Adicionar Usuário">
                </a>
            </div>
		</div>
	</div> <!-- /container theme-showcase -->
</div> <!-- /container -->

<?php
} else {
// Se o usuário não estiver logado, exibe uma mensagem pedindo para que ele faça o login
?>
<div class="container marketing">
    <div class="container theme-showcase" role="main">
        <div id="cadastro" class="page-header">
            <h2>Por favor, faça o login para usar o sistema</h2>
        </div>
    </div>
</div>
<?php
}
require_once 'rodape.php';
?>