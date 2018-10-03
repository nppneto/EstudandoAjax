<?php

include_once "banco.php";

$usuario = [];

// $usuario['id'] = $_GET['id'];

$usuario['nome'] = $_POST['nome'];
$usuario['email'] = $_POST['email'];
$usuario['senha'] = $_POST['senha'];

// var_dump($usuario['senha']);

Editar($conn, $_POST['id'], $usuario);

$response = array("success" => true);
echo json_encode($response);