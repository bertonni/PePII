<?php
include_once 'cabecalho.php';

connectDataBase();
$usuario = $_POST['usuario'];
$senha = md5($_POST['senha']);

$sql = "SELECT fun_usuario, fun_senha FROM funcionarios WHERE fun_usuario = '$usuario' AND fun_senha = '$senha'";
$result = mysqli_query($connection, $sql);
$rows = mysqli_num_rows($result);

if($rows != 0) {
    unset($_SESSION['login_incorreto']);
    if(!isset($_SESSION['usuario'])) {
        $_SESSION['usuario'] = $usuario;

        header("location: cadastro_pacientes.php");
    }
} else {
    if(!isset($_SESSION['login_incorreto'])) {
        $_SESSION['login_incorreto'] = true;
    }
    header("location: login.php");
          /*echo "<script>
              alert('Usuário ou senha incorretos!!');
          </script>";*/
}

?>
<div class="container">
    <div class="container theme-showcase" role="main">

    </div> <!-- /container theme-showcase -->
</div> <!-- /container -->


<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
<!-- <script src="../../assets/js/ie10-viewport-bug-workaround.js"></script> -->
<?php
include_once 'rodape.php';
?>