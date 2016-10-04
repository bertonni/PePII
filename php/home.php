<?php
require_once 'cabecalho.php';
?>
<style type="text/css">
    .ancor:hover {
        text-decoration: none;
    }
</style>
<title>Home</title>

<div class="container">
	<div class="container theme-showcase" role="main">
		<div class="row">
            <a href="cadastro_pacientes.php" class="ancor" title="Cadastrar Paciente">
                <img src="../imagens/adcusuario.png" alt="Adicionar Usuário">
            </a>
            <a href="busca.php" class="ancor" title="Buscar Paciente">
                <img src="../imagens/busca.png" alt="Adicionar Usuário">
            </a>
		</div>
	</div> <!-- /container theme-showcase -->
</div> <!-- /container -->

<?php
require_once 'rodape.php';
?>