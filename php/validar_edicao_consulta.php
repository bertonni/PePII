<?php
require_once 'cabecalho.php';
connectDataBase();

// Salva o novo status, ID da consulta e ID do paciente em variáveis
$status = $_POST['status'];
$medico = $_POST['medico'];
$data = $_POST['data_consulta'];
$hora = $_POST['hora_consulta'];
$especialidade = $_POST['especialidade'];
$id_consulta = $_POST['id_consulta'];
$id_paciente = $_POST['id_paciente'];


// Se a situação(status) da consulta for 'Cancelada', remove essa consulta do banco de dados
if($status == "Cancelada") {
    $sql = "DELETE FROM agendamentos WHERE agd_id = '$id_consulta'";
    $result = mysqli_query($connection, $sql);

    if($result) {
        if(!isset($_SESSION['consultaRemovida'])) {
            $_SESSION['consultaRemovida'] = true;
        }
        header("location: paciente.php?id=" . $id_paciente);
    }
} else {
    // Consulta para saber se já existe um agendamento para o paciente que está alterando a consulta com a data/hora pretendida
    $sql = "SELECT * FROM `agendamentos` WHERE agd_id = '$id_consulta'";
    $result = mysqli_query($connection, $sql);
    $rows = mysqli_num_rows($result);

    $sql = "SELECT * FROM `agendamentos` WHERE `agd_data` = '$data' AND `agd_hora` = '$hora' AND `agd_pac_id` = '$id_paciente' AND agd_id != '$id_consulta'";
    $result = mysqli_query($connection, $sql);
    $rows1 = mysqli_num_rows($result);

    // Consulta para saber se já existe uma consulta marcada para a mesma hora/data/médico salva no banco para qualquer outro paciente
    $sql = "SELECT * FROM `agendamentos` WHERE `agd_data` = '$data' AND `agd_hora` = '$hora' AND `agd_medico` = '$medico' AND agd_pac_id != '$id_paciente'";
    $results = mysqli_query($connection, $sql);
    $rows2 = mysqli_num_rows($results);

    if($rows > 0 && $rows1 == 0 && $rows2 == 0) {
        unset($_SESSION['erroConsulta']);
        // Query para alterar o status da consulta desejada
        $sql = "UPDATE `agendamentos` SET `agd_data` = '$data', `agd_hora` = '$hora', `agd_status` = '$status', `agd_medico` = '$medico', `agd_especialidade` = '$especialidade' WHERE `agendamentos`.`agd_id` = '$id_consulta'";
        // Se alterado com sucesso, redireciona para a página do paciente
        if(mysqli_query($connection, $sql)) {
            header("location: paciente.php?id=" . $id_paciente);
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($connection);
        }
    } else {
        if(!isset($_SESSION['erroConsulta'])) {
            $_SESSION['erroConsulta'] = true;
            $_SESSION['idConsulta'] = $id_consulta;
            $_SESSION['idPaciente'] = $id_paciente;
        }
        header("location: paciente.php?id=" . $id_paciente);
    }
}

disconnectDataBase();
require_once 'rodape.php';
?>