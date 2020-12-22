<?php

$mysql = new mysqli('localhost', 'root', '', 'donationsForEducation');
$mysql->set_charset('utf8');

if ($mysql == FALSE) {
    echo "Erro na conexão";
}
