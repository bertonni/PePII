<?php
require_once 'cabecalho.php';
connectDataBase();

$id = mysqli_real_escape_string($connection, $_GET['id']);
$sql = "SELECT pac_nome FROM pacientes WHERE pac_id = '$id'";
$result = mysqli_query($connection, $sql);
$arr = mysqli_fetch_array($result);
$nome = $arr['pac_nome'];

$sql = "DELETE FROM agendamentos WHERE agd_pac_id = '$id'";
$result = mysqli_query($connection, $sql);

if($result) {

    $sql = "DELETE FROM pacientes WHERE pac_id = '$id'";
    $result = mysqli_query($connection, $sql);

    if($result) {
        if(!isset($_SESSION['pacRemovido'])) {
            $_SESSION['pacRemovido'] = $nome;
        }
    } else {
        if(!isset($_SESSION['erro'])) {
            $_SESSION['erro'] = true;
        }
        if(!isset($_SESSION['pacRemovido'])) {
            $_SESSION['pacRemovido'] = $nome;
        }
    }
    header("location: busca.php");
}  else {
    if(!isset($_SESSION['erro'])) {
        $_SESSION['erro'] = true;
    }
    if(!isset($_SESSION['pacRemovido'])) {
        $_SESSION['pacRemovido'] = $nome;
    }
    header("location: busca.php");
}
disconnectDataBase();
require_once 'rodape.php';
?>