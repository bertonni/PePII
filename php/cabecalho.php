<?php
session_start();

$conn = null;
function connectDataBase() {
  global $conn;
  $servername = "localhost";
  $username = "root";
  $password ="";
  $dbname = "sistema_de_cadastro";

  $conn = mysqli_connect($servername, $username, $password, $dbname);
  if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
  }
}
function disconnectDataBase() {
  global $conn;
  mysqli_close($conn);
}
function isLogged() {
  return isset($_SESSION['usuario']);
}
function logout() {
  unset($_SESSION['usuario']);
}

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- As 3 meta tags acima *precisam* vir primeiro no head; qualquer outro conteúdo head vem *depois* destas tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <script src="../js/jquery-1.12.0.min.js"></script>
    <script src="../js/jquery.maskedinput.js"></script>
    <!-- Bootstrap core CSS -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <!-- <script src="../js/jquery-1.12.0.min.js"></script> -->
    <link href="../css/signin.css" rel="stylesheet">
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <link href="../css/ie10-viewport-bug-workaround.css" rel="stylesheet">
    <!--<style>
      .maiuscula {
        text-transform: uppercase;
      }
    </style>-->
</head>
<body>
	<nav class="navbar navbar-default">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#">Sistema de Cadastro</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li class="active"><a href="#">Home <span class="sr-only">(current)</span></a></li>
        <!-- <li><a href="#">Link</a></li> -->
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Cadastro<span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="cadastro_pacientes.php">Cadastro de Pacientes</a></li>
            <li><a href="cadastro.php">Cadastro de Funcionários</a></li>
            <!-- <li><a href="#">Something else here</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="#">Separated link</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="#">One more separated link</a></li> -->
          </ul>
        </li>
      </ul>
      <form class="navbar-form navbar-left" action="busca.php" method="POST">
        <div class="form-group">
          <input type="text" class="form-control" name="texto" placeholder="Procurar Paciente">
        </div>
        <button type="submit" class="btn btn-default">Procurar</button>
      </form>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="login.php">Login</a></li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>