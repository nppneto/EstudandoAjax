<?php

include_once "banco.php";

$usuario = [];

$usuario['nome'] = $_POST['nome'];
$usuario['email'] = $_POST['email'];
$usuario['senha'] = $_POST['senha'];

Salvar($conn, $usuario);

$response = array("success" => true);
echo json_encode($response);