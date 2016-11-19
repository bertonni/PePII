<?php
require_once 'cabecalho.php';
connectDatabase();

if(isLogged()) {
    ?>
    <title>Consultas</title>
    <div class="container marketing">
        <div class="container theme-showcase" role="main">
            <?php
            // Pega a data de hoje
            $today = date("Y-m-d");

            // Query para pegar todas as consultas marcadas para hoje
            $sql = "SELECT * FROM `agendamentos` WHERE `agd_data` = '$today' ORDER BY `agd_hora`";
            $result = mysqli_query($connection, $sql);
            $rows = mysqli_num_rows($result);

            // Se houver consulta(s) marcada(s) para hoje, exibe a tabela
            if($rows != 0) {
                ?>
                <div id="cadastro_pac" class="page-header">
                    <h1>Consultas marcadas para hoje</h1>
                </div>
                <div class="row">
                    <table class='table table-striped table-bordered'>
                        <tr>
                            <th>Hora</th>
                            <th>Paciente</th>
                            <th>Telefone</th>
                            <th>Médico</th>
                            <th>Especialidade</th>
                        </tr>
                        <?php

            /*Enquanto houver dados no array associativo '$consultas', salva os valores em variáveis, realiza a consulta para saber o nome do funcionário que realizou o agendamento e exibe-os na tabela*/
            while($consultas = mysqli_fetch_array($result)) {
                $id_consulta = $consultas['agd_id'];
                $id_pac = $consultas['agd_pac_id'];
                $medico = $consultas['agd_medico'];
                $especialidade = $consultas['agd_especialidade'];

                $sql = "SELECT `pac_nome`, `pac_telefone_1` FROM `pacientes` WHERE `pac_id` = '$id_pac'";
                $resultado = mysqli_query($connection, $sql);
                $arr = mysqli_fetch_array($resultado);
                $paciente = $arr['pac_nome'];
                $telefone = $arr['pac_telefone_1'];
                ?>
                <tr>
                    <td><?= $consultas['agd_hora'] ?></td>
                    <td><a href='paciente.php?id=<?= $id_pac ?>'><?= $paciente ?></a></td>
                    <td><?= $telefone ?></td>
                    <td><?= $medico ?></td>
                    <td><?= $especialidade ?></td>
                </tr>
                <?php
            }
            echo "</table>";
        } else {
            // Se não tiver consultas marcadas para o dia, exibe uma mensagem ao invés de não exibir nada ou uma tabela vazia
            echo    "
            <div id='cadastro' class='page-header'>
                <h2>Não há consultas marcadas para hoje</h2>
            </div>
            ";
        }
    } else {
        // Se o usuário não estiver logado, exibe uma mensagem pedindo para que ele faça o login
        ?>
        <div class="container marketing">
            <div class="container theme-showcase" role="main">
                <div id="cadastro" class="page-header">
                    <h2>Por favor, faça o login para cadastrar um Paciente</h2>
                </div>
            </div>
        </div>
        <?php
    }
    require_once 'rodape.php';
    ?>