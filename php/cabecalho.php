<?php
// iniciando a sessão
session_start();

$connection = null;

// função para fazer a conexão com o banco de dados
function connectDataBase() {
  global $connection;
  $servername = "localhost";
  $username ="root";
  $password ="root";
  $dbname = "sistema_de_cadastro";

  $connection = mysqli_connect($servername, $username, $password, $dbname);
  if (!$connection) {
    die("Connection failed: " . mysqli_connect_error());
  }
}

// função para encerrar a conexão com o banco de dados
function disconnectDataBase() {
  global $connection;
  mysqli_close($connection);
}

// função para verificar se o usuário está logado
function isLogged() {
  return isset($_SESSION['usuario']);
}

// função para verificar se o usuário é o administrador do sistema
function isAdmin() {
  return isset($_SESSION['admin']);
}

// função para retirar o usuário da sessão
function logout() {
  unset($_SESSION['usuario']);
  unset($_SESSION['admin']);
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
    <link href="../css/signin.css" rel="stylesheet">
    <link href="../css/meuEstilo.css" rel="stylesheet">
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <link href="../css/ie10-viewport-bug-workaround.css" rel="stylesheet">
</head>
<body>
	<nav class="navbar navbar-default">
  <div class="container-fluid">
    <!-- Brand e toggle ficam agrupados para melhor vizualização em dispositivos móveis -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand logo" href="home.php"><img src="../imagens/logo.png" width="120" height="50"></a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li class="list_item"><a href="home.php">Página Inicial</a></li>
        <li class="list_item"><a href="consultas_do_dia.php">Consultas de Hoje</a></li>
        <?php
        if(isLogged() && isAdmin()) {
        ?>
        <li class="list_item"><a href="cadastro_funcionarios.php">Cadastrar Funcionário</a></li>
        <?php } ?>
        <li class="dropdown">
          <!-- <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Cadastro<span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="cadastro_pacientes.php">Cadastro de Pacientes</a></li>
            <li><a href="#">Something else here</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="#">Separated link</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="#">One more separated link</a></li>
          </ul> -->
        </li>
      </ul>
      <?php
      // se o usuário não estiver logado, exibe o botao "Entrar"
      if(!isLogged()) {
      ?>
      <ul class="nav navbar-nav navbar-right">
        <li class="list_item"><a href="login.php">Entrar</a></li>
      </ul>
      <?php

      // se estiver logado, exibe a mensagem de boas-vindas e o botao de "Sair"
      } else {
      ?>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="#">
          <?php
          // mensagem de boas-vindas ao usuário logado
          echo "Bem vindo(a), <b>" . $_SESSION['usuario'] . "</b>!!";
          ?>
          </a>
          </li>
          <li class="list_item"><a href="logout.php">Sair</a></li>
        </li>
      </ul>
      <?php
      }
      ?>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
