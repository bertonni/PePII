<?php
function connectDB() {
	$servername = "localhost";
	$username = "root";
	$password ="";
	$dbname = "sistema_de_cadastro";

	$conn = mysqli_connect($servername, $username, $password, $dbname);
	if (!$conn) {
		die("Connection failed: " . mysqli_connect_error());
	}
}
function isLogged($user) {
	if(isset($_SESSION['usuario']) && $_SESSION['usuario'] == $user) {
		return true;
	}
	return false;
}
?>