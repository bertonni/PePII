<?php
require_once 'cabecalho.php';
// Tira da sessão a variável "$_SESSION['usuario'], ou seja, desloga o usuário do sistema"
logout();
// Depois de deslogado, redireciona para a página de login
header("location: login.php");
?>