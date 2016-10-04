<?php
require_once 'cabecalho.php';
?>
<style type="text/css">
	.erro {
		color: red;
	}
	.form-signin-heading {
		color: gray;
		margin-left: 10%;
	}
	.form-control {
		border-radius: 0;
	}
</style>
<title>Login</title>

<div class="container">
	<div class="container theme-showcase" role="main">
		<form class="form-signin" method="POST" action="validar_login.php">
			<h3 class="form-signin-heading">Por favor, faça o login</h3>
			<label for="user" class="sr-only">Usuário</label>
			<input type="text" id="user" class="form-control" name="usuario" placeholder="Usuário" required autofocus>
			<label for="password" class="sr-only">Senha</label>
			<input type="password" id="password" class="form-control" name="senha" placeholder="Senha" required>
			<!-- <div class="checkbox">
				<label>
					<input type="checkbox" value="remember-me"> Lembre-me
				</label>
			</div> -->
			<button class="btn btn-lg btn-primary btn-block" type="submit">Entrar</button>
			<?php
				if(isset($_SESSION['login_incorreto']) && $_SESSION['login_incorreto']) {
					echo '<spam class="erro">Usuário ou login incorretos</spam>';
				}
			?>
		</form>
	</div> <!-- /container theme-showcase -->
</div> <!-- /container -->

<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
<!-- <script src="../../assets/js/ie10-viewport-bug-workaround.js"></script> -->
<?php
unset($_SESSION['login_incorreto']);
require_once 'rodape.php';
?>