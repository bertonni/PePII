<?php
require_once 'cabecalho.php';
if(isLogged()) {
	header("location: home.php");
}
?>
<title>Login</title>

<div class="container">
	<div class="container theme-showcase" role="main">
		<form class="form-signin" method="POST" action="validar_login.php">
			<h3 class="form-signin-heading">Por favor, faça o login</h3>
			<label for="user" class="sr-only">Usuário</label>
			<input type="text" id="user" class="form-control user" name="usuario" placeholder="Usuário" required autofocus>
			<label for="password" class="sr-only">Senha</label>
			<input type="password" id="password" class="form-control" name="senha" placeholder="Senha" required onkeypress="capsLock(event)">
			<div id="caps" style="visibility:hidden">&#9708; Caps Lock ativado</div>
			<button class="btn btn-lg btn-primary btn-block" type="submit">Entrar</button>
			<?php
				// Checa se a variável de sessão "$_SESSION['login_incorreto']" está setada e se é verdadeira (Se o usuário errou o login)
				// Se sim, exibe uma mensagem dizendo que o usuário ou senha estão incorretos
				if(isset($_SESSION['login_incorreto']) && $_SESSION['login_incorreto']) {
					echo '<spam class="erro">*** Usuário ou senha incorretos ***</spam>';
				}
			?>
			<div class="col col-md-12 recovery">
				<a href="recuperar_senha.php">Recuperar senha</a>
			</div>
		</form>
	</div> <!-- /container theme-showcase -->
</div> <!-- /container -->
<script>
function capsLock(e){
 kc = e.keyCode?e.keyCode:e.which;
 sk = e.shiftKey?e.shiftKey:((kc == 16)?true:false);
 if(((kc >= 65 && kc <= 90) && !sk)||((kc >= 97 && kc <= 122) && sk))
  document.getElementById('caps').style.visibility = 'visible';
 else
  document.getElementById('caps').style.visibility = 'hidden';
}
</script>
<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
<!-- <script src="../../assets/js/ie10-viewport-bug-workaround.js"></script> -->
<?php
unset($_SESSION['login_incorreto']);
require_once 'rodape.php';
?>