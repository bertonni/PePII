<?php
require_once 'cabecalho.php';
?>
<style type="text/css">
    .ancor:hover {
        text-decoration: none;
    }
    .add_user {
        float: left;
        margin-left: 22%;
        margin-top: 9%;
    }
    .search_user {
        margin-left: 52%;
        margin-top: 10.93%;
    }
    h3 {
        margin-left: 6%;
    }
</style>
<title>Home</title>

<div class="container">
	<div class="container theme-showcase" role="main">
		<div class="row">
            <div class="add_user">
                <h3>Cadastrar Paciente</h3><br>
                <a href="cadastro_pacientes.php" class="ancor" title="Cadastrar Paciente">
                    <img src="../imagens/adcusuario.png" alt="Adicionar Usuário">
                </a>
            </div>
            <div class="search_user">
                <h3>Procurar Paciente</h3><br>
                <a href="busca.php" class="ancor" title="Buscar Paciente">
                    <img src="../imagens/busca.png" alt="Adicionar Usuário">
                </a>
            </div>
		</div>
	</div> <!-- /container theme-showcase -->
</div> <!-- /container -->

<?php
require_once 'rodape.php';
?>