<?php
include_once 'cabecalho.php';
connectDataBase();

if(isset($_POST['texto']) && $_POST['texto'] != "") {
	$text = $_POST['texto'];
	$text = strtolower($text);
	$sql = "SELECT * FROM pacientes WHERE lower(pac_nome) like '%$text%' ";
} else {
	$sql = "SELECT * FROM pacientes";
}

$result = mysqli_query($conn, $sql);

// $arr = mysqli_fetch_array($result);
if($result) {
	$row = mysqli_num_rows($result);

	echo "<div class='container marketing'>
			<div class='container theme-showcase' role='main'>
				<div id='cadastro_pac' class='page-header'>
					<h1>Resultados da Busca</h1>
				</div>
			";
			if($row != 0) {

				echo "<table class='table table-striped table-bordered'>
					<tr>
						<th class='prev_td'>Paciente</td>
						<th class='prev_td'>Telefone</td>
						<th class='prev_td'>E-mail</td>
					</tr>";
				while($array = mysqli_fetch_array($result)) {
					echo "
					<tr>
						<td><a href='#'>" . $array['pac_nome'] . "</a></td>
						<td>" . $array['pac_telefone_1'] . "</td>
						<td>" . $array['pac_email'] . "</td>
					</tr>
					";
				}
		} else {
			echo "<h4>Não foram encontrados resultados para sua busca</h4>";
		}
		echo "</table>
				</div>
			</div>";
}

include_once 'rodape.php';
?>