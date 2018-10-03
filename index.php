<?php

include_once "banco.php";

$listar_usuario = Buscar($conn);

include_once "template.php";