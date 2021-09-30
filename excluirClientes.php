<?php
	require_once("controller/ControllerCadastro.php");

	$controller = new ControllerCadastro();
	$resultado = $controller->deletar($_GET['id']);
?>