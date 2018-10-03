<?php

$host = "localhost";
$user = "developer";
$password = "vertrigo";
$db = "meubanco";


$conn = mysqli_connect($host, $user, $password, $db) or die("Tá pegando fogo, bicho...");

function Buscar($_conn):Array {

    $query = "SELECT * FROM USUARIO";

    $result = mysqli_query($_conn, $query);

    $usuarios = [];

    while($usuario = mysqli_fetch_assoc($result)) {

        $usuarios[] = $usuario;

    }

    return $usuarios;

    // var_dump($usuarios);

}

function Salvar($_conn, $_usuario) {

    $query = "INSERT INTO USUARIO (
        NOME, EMAIL, SENHA
    ) VALUES (
        '{$_usuario['nome']}',
        '{$_usuario['email']}',
        '{$_usuario['senha']}'
    )";

    mysqli_query($_conn, $query);

}

function Editar($_conn, $_id, $_usuario) {

    $query = "UPDATE USUARIO SET
                NOME = '{$_usuario['nome']}',
                EMAIL = '{$_usuario['email']}',
                SENHA = '{$_usuario['senha']}'
            WHERE ID_USUARIO = $_id
    ";

    // echo $query;

    // exit();

    mysqli_query($_conn, $query);

}