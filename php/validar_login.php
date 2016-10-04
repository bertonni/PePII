<?php
require_once 'cabecalho.php';
connectDataBase();

$usuario = $_POST['usuario'];
$senha = md5($_POST['senha']);

$usuario = preg_replace('/[^[:alnum:]_]/', '',$usuario);
$senha = preg_replace('/[^[:alnum:]_]/', '',$senha);

$sql = "SELECT fun_usuario, fun_senha, fun_role FROM funcionarios WHERE fun_usuario = '$usuario' AND fun_senha = '$senha'";
$result = mysqli_query($connection, $sql);
$rows = mysqli_num_rows($result);
$result = mysqli_fetch_assoc($result);
$role = $result['fun_role'];

if($rows != 0) {
    unset($_SESSION['login_incorreto']);
    if(!isset($_SESSION['usuario'])) {
        $_SESSION['usuario'] = $usuario;
        if($role == "admin") {
          $_SESSION['admin'] = "admin";
        }

        header("location: home.php");
    }
} else {
    if(!isset($_SESSION['login_incorreto'])) {
        $_SESSION['login_incorreto'] = true;
    }
    header("location: login.php");
}

?>
<div class="container">
    <div class="container theme-showcase" role="main">

    </div> <!-- /container theme-showcase -->
</div> <!-- /container -->

<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
<!-- <script src="../../assets/js/ie10-viewport-bug-workaround.js"></script> -->
<?php
disconnectDataBase();
require_once 'rodape.php';
?>