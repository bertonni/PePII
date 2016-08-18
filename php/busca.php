<?php
session_start();
include_once 'functions.php';

$text = $_POST['texto'];

$sql = "SELECT nome FROM pacientes WHERE nome like '%$text%' "
?>